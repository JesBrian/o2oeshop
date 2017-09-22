<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class BisLocation extends Controller
{
    public function index()
    {
        $bisLocation = model("BisLocation")->where("status","EQ","0")->where("is_main","EQ","0")->order("id")->paginate();
        $this->assign("bisLocation", $bisLocation);

        return $this->fetch();
    }


    public function detail(Request $request)
    {
        //获取商户总店信息并传递给模板
        $bisLocationData = model("BisLocation")->find($request->param("id"));
        $this->assign("bisLocationData", $bisLocationData);

        //获取一级城市信息并传递给模板
        $fiCityData = model("City")->find($bisLocationData["city_id"]);
        $this->assign("fiCityData",$fiCityData);

        //判断是否有二级城市，如果有的话获取二级城市信息并传递给模板
        if($bisLocationData["city_path"] != 0)//是否有二级城市
        {
            $seCityDataId = explode(",", $bisLocationData["city_path"])[1];
            $seCityData = model("City")->find($seCityDataId);
            //dump($seCityData);
        }
        else
        {
            $seCityData = ["name"=>'暂无详细信息'];
        }
        $this->assign("seCityData",$seCityData);

        //获取分类信息并传递给模板
        $fiCategoryData = model("Category")->find($bisLocationData["category_id"]);
        $this->assign("fiCategoryData", $fiCategoryData);
        if($bisLocationData["category_path"] != "") {
            $seCategoryIdStr = explode(",", $bisLocationData["category_path"])[1];
            $seCategoryIdArr = explode("|", $seCategoryIdStr);
            $seCategoryData = model("Category")->where("id","in", $seCategoryIdArr)->select();
        }
        else
        {
            $seCategoryData = [];
        }
        $this->assign("seCategoryData", $seCategoryData);

        return $this->fetch();
    }



    public function status(Request $request)
    {
        /* 需要验证的话可添加 */

        $res = model("BisLocation")->update(["status" => $request->param("status")], ["id" => $request->param("id")]);

        if ($res) {
            $this->success("状态修改成功");
        } else {
            $this->error("状态修改失败");
        }
    }
}