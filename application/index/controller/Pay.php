<?php

namespace app\index\controller;

use think\Request;
use think\Session;

class Pay extends BaseController
{
    public function index(Request $request)
    {
        //判断用户是否已经登陆了
        if(!Session::get("user"))
        {
            $this->error("请先登录，不要做越权行为，这是不好的！","/index/user/login");
        }

        //获取传递的参数
        $dealId = $request->param("dealId","","intval");
        $buyCount = $request->param("buyCount","","intval");
        $dealData = model("Deal")->find($dealId);

        //判断商品是否能够购买
        if(empty($dealData))
        {
            $this->error("商品ID错误！","/");
        }
        if(($dealData["status"] != 1) && ($dealData["end_time"] < time()))
        {
            $this->error("商品已经下架了！","/");
        }

        //判断数量
        if($buyCount < 0)
        {
            $this->error("商品购买数量不能为负数！", "/");
        }


        $this->assign("dealData",$dealData);
        $this->assign("buyCount",$buyCount);


        //动态传递title
        $this->assign("title","o2oeshop团购网 商品付款页");

        return $this->fetch();
    }


    public function surePay(Request $request)
    {
        $data = $request->post();

        //校验订单数据是否正确
        $validate = validate("Order");
        if(!$validate->check($data))
        {
            return ["status" => 0, "message" => $validate->getError()];
        }

        //查看商品剩余数量足够不
        $dealData = model("Deal")->find($data["deal_id"]);
        if(($dealData["total_count"] - $dealData["buy_count"]) < $data["deal_count"])
        {
            return ["status" => 0, "message" => "商品剩余数量不足！"];
        }

        //将订单数据入库
        $data["user_id"] = Session::get("user")["id"];
        $data["username"] = Session::get("user")["username"];
        $data["out_trade_no"] = md5(time());

        $orderId = model("Order")->add($data);

        //将商品购买数量+1
        $temp = model("Deal")->where("id","EQ",$data["deal_id"])->setInc("buy_count",$data["deal_count"]);

        if($orderId && $temp)
        {
            return ["status" => 1, "message" => "订单支付成功!"];
        }
        else
        {
            return ["status" => 0, "message" => "订单支付失败! 请关闭窗口再重新尝试"];
        }
    }
}