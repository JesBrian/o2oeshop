<?php

namespace app\bis\controller;

use think\Request;
use think\Session;

class Order extends BaseController
{
    /**
     * 展示该商户非删除的所有订单列表功能函数
     */
    public function index(Request $request)
    {
        $bisId = Session::get("bisId");

        $orderData = model("Order")->where(["bis_id"=>$bisId,"status"=>["NEQ",-1]])->paginate();
        $this->assign("orderData", $orderData);

        return $this->fetch();
    }

    public function detail(Request $request)
    {
        //获取商品信息
        $dealId = $request->param("id");
        $dealData = model("Deal")->find($dealId);
        $this->assign("dealData", $dealData);

        //获取商品对应商户的门店信息
        $locationIds = explode("|",$dealData["location_ids"]);
        $locationData = model("BisLocation")->where("id","IN",$locationIds)->select();
        $this->assign("locationData", $locationData);

        //获取一级城市的数据
        $fiCityData = model("City")->getNormalCityByParentID();
        $this->assign("fiCityData",$fiCityData);

        //获取二级城市的数据
        $seCityData = model("City")->find($dealData["se_city_id"]);
        $this->assign("seCityData", $seCityData);

        //获取一级分类数据
        $fiCategoryData = model("Category")->getNormalFirstCategory();
        $this->assign("fiCategoryData",$fiCategoryData);

        //获取二级分类数据
        $dealData["se_category_id"] = explode("|",$dealData["se_category_id"]);
        $seCategoryData = model("Category")->where("id","IN",$dealData["se_category_id"])->select();
        $this->assign("seCategoryData",$seCategoryData);

        return $this->fetch();
    }


    public function status(Request $request)
    {
        /* 需要验证的话可添加 */

        $res = model("Deal")->update(["status" => $request->param("status")], ["id" => $request->param("id")]);

        if ($res) {
            $this->success("状态修改成功");
        } else {
            $this->error("状态修改失败");
        }
    }
}