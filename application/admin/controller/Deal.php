<?php

namespace app\admin\controller;

use think\Request;

class Deal extends BaseController
{
    public function index(Request $request)
    {
        if ($request->post()) {
            $data = $request->post();

            $searchData = [];
            if (!empty($data["start_time"]) && !empty($data["end_time"]) && strtotime($data["start_time"]) < strtotime($data["end_time"])) {
                $searchData["create_time"] = [
                    ["gt", strtotime($data["start_time"])],
                    ["lt", strtotime($data["end_time"])]
                ];
            }
            if ($data["category_id"] != 0) {
                $searchData["category_id"] = $data["category_id"];
            }
            if ($data["city_id"] != 0) {
                $searchData["se_city_id"] = $data["city_id"];
            }
            if (!empty($data["name"])) {
                $searchData["name"] = ["like", "%" . $data["name"] . "%"];
            }
            $searchData["status"] = ["NEQ", -1];
            $dealData = model("Deal")->where($searchData)->paginate();

            $this->assign("data", $data);
        } else {
            $data = [
                "category_id"  => 0,
                "city_id"      => 0,
                "start_time"   => "",
                "end_time"     => "",
                "name"         => "",
            ];
            $this->assign("data", $data);
            $dealData = model("Deal")->where("status", "NEQ", "-1")->paginate();
        }

        //获取分类信息
        $categoryData = model("Category")->getNormalFirstCategory();
        $this->assign("categoryData", $categoryData);

        //获取城市信息
        $cityData = model("City")->getNormalCity();
        $this->assign("cityData", $cityData);

        //向模板传递商品信息
        $this->assign("dealData", $dealData);

        return $this->fetch();
    }


    public function check(Request $request)
    {
        if ($request->post()) {
            $data = $request->post();

            $searchData = [];
            if (!empty($data["start_time"]) && !empty($data["end_time"]) && strtotime($data["start_time"]) < strtotime($data["end_time"])) {
                $searchData["create_time"] = [
                    ["gt", strtotime($data["start_time"])],
                    ["lt", strtotime($data["end_time"])]
                ];
            }
            if ($data["category_id"] != 0) {
                    $searchData["category_id"] = $data["category_id"];
            }
            if ($data["city_id"] != 0) {
                $searchData["se_city_id"] = $data["city_id"];
            }
            if (!empty($data["name"])) {
                $searchData["name"] = ["like", "%" . $data["name"] . "%"];
            }
            $searchData["status"] = ["EQ", 0];
            $dealData = model("Deal")->where($searchData)->paginate();

            $this->assign("data", $data);

        } else {
            $dealData = model("Deal")->where("status", "EQ", 0)->paginate();

            $data = [
                "category_id"  => 0,
                "city_id"      => 0,
                "start_time"   => "",
                "end_time"     => "",
                "name"         => "",
            ];
            $this->assign("data", $data);
        }

        //获取分类信息
        $categoryData = model("Category")->getNormalFirstCategory();
        $this->assign("categoryData", $categoryData);

        //获取城市信息
        $cityData = model("City")->getNormalCity();
        $this->assign("cityData", $cityData);

        //向模板传递商品信息
        $this->assign("dealData", $dealData);

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

        //获取一级分类
        $fiCategoryData = model("Category")->getNormalFirstCategory();
        $this->assign("fiCategoryData",$fiCategoryData);

        //获取二级分类数据
        $dealData["se_category_id"] = explode("|",$dealData["se_category_id"]);
        $seCategoryData = model("Category")->where("id","IN",$dealData["se_category_id"])->select();
        $this->assign("seCategoryData",$seCategoryData);

        return $this->fetch();
    }
}