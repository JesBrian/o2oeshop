<?php

namespace app\index\controller;

use think\Request;

class Lists extends BaseController
{
    public function index(Request $request)
    {
        //获取所有一级分类数据
        $categorys = model("Category")->getNormalFirstCategory();
        $this->assign("categorys", $categorys);


        //获取传递过来的排序的参数
        $orderData = [
            "buy_count"     =>  "",
            "current_price" =>  "",
            "create_time"   =>  "",
            "id"            =>  "asc",
        ];
        if($request->param("buy_count"))
        {
            $orderData["buy_count"] = $request->param("buy_count");
        }
        if($request->param("current_price"))
        {
            $orderData["current_price"] = $request->param("current_price");
        }
        if($request->param("create_time"))
        {
            $orderData["create_time"] = $request->param("create_time");
        }


        $fiCategoryIds = [];
        foreach ($categorys as $k)
        {
            $fiCategoryIds[] = $k["id"];
        }
        //接受传来的分类ID，如果没有就默认给 0 -- 即全部 [ 然后查询对应分类的商品 ]
        $categoryId = $request->param("categoryId",0,"intval");
        if($categoryId == 0)    //默认，全部分类
        {
            $seCategorys = model("Category")->where("status","EQ","1")->order(["listorder"=>"desc","id"=>"asc"])->limit(18)->select();

            $dealData = model("Deal")->where("status","EQ","1")->order($orderData)->paginate(15);

            $this->assign("fiCategoryId", $categoryId);
            $this->assign("seCategoryId", 0);
        }
        else if(in_array($categoryId, $fiCategoryIds)) //如果传来的分类ID是一级分类
        {
            $seCategorys = model("Category")->getNormalSecondCategory($categoryId);

            $dealData = model("Deal")->where(["status"=>1,"category_id"=>$categoryId])->order($orderData)->paginate(15);

            $this->assign("fiCategoryId", $categoryId);
            $this->assign("seCategoryId", 0);
        }
        else    //传来的分类ID是二级分类
        {
            $tempData = model("Category")->field("parent_id,status")->find($categoryId);
            if(!$tempData || $tempData["status"] != 1)
            {
                $this->error("分类数据错误！","/");
            }
            $parentId = $tempData["parent_id"];
            $seCategorys = model("Category")->getNormalSecondCategory($parentId);

            $dealData = model("Deal")->where(["status"=>1,"se_category_id"=>["like","%".$categoryId."%"]])->order($orderData)->paginate(15);

            $this->assign("fiCategoryId", $parentId);
            $this->assign("seCategoryId", $categoryId);
        }
        $this->assign("seCategorys", $seCategorys);
        $this->assign("dealData", $dealData);


        //传递现在点击的分类ID -- 为了排序能够保持现在的分类
        $this->assign("nowCategoryId",$categoryId);


        //传递现在的排序号
        $this->assign("orderData",$orderData);


        //动态传递title
        $this->assign("title","o2oeshop团购网 商品查询页");


        return $this->fetch();
    }
}