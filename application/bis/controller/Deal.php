<?php

namespace app\bis\controller;

use think\Request;
use think\Session;

class Deal extends BaseController
{
    /**
     * 展示该商户非删除的所有商品列表功能函数
     */
    public function index(Request $request)
    {
        $bisId = Session::get("bisId");

        $dealData = model("Deal")->where(["bis_id"=>$bisId,"status"=>["NEQ",-1]])->paginate();
        $this->assign("dealData", $dealData);

        return $this->fetch();
    }

    /**
     * 添加商品功能函数[并且进行处理添加商品请求]
     */
    public function add(Request $request)
    {
        $bisId = Session::get("bisId");

        if($request->isPost())//是post提交，处理添加商品请求
        {
            $data = $request->post();

            //验证数据
            $validate = validate("Deal");
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $data["bis_id"] = $bisId;
            $data["start_time"] = strtotime($data["start_time"]);
            $data["end_time"] = strtotime($data["end_time"]);
            $data["coupons_start_time"] = strtotime($data["coupons_start_time"]);
            $data["coupons_end_time"] = strtotime($data["coupons_end_time"]);

            $temp = "";
            if(!empty($data['se_category_id']))//处理二级分类数据[将数据以‘|’合并成字符串]
            {
                $temp = implode("|", $data["se_category_id"]);
            }
            $data["se_category_id"] = $temp;

            if(!empty($data['location_ids']))//处理location_ids数据[将数据以‘|’合并成字符串]
            {
                $temp = implode("|", $data["location_ids"]);
            }
            $data["location_ids"] = $temp;

            if (model("Deal")->add($data)) {
                $this->success('商品上架成功!');
            } else {
                $this->error('商品上架失败!');
            }
        }

        //获取门店信息
        $locationData = model("BisLocation")->getBisNormalLocationByBisId($bisId);
        $this->assign("locationData", $locationData);

        //获取一级城市的数据
        $fiCityData = model("City")->getNormalCityByParentID();
        $this->assign("fiCityData",$fiCityData);

        //获取分类
        $fiCategoryData = model("Category")->getNormalFirstCategory();
        $this->assign("fiCategoryData",$fiCategoryData);

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