<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    private $categoryModel;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->categoryModel = model("Category");
    }

    public function getCategoryByParentId(Request $request)
    {
        $categoryParentId = $request->post("id");
        //return $categoryParentId;//测试是否能够获取Ajax传来的值
        if(!$categoryParentId){
            $this->error("分类ID不能为空");
        }

        $secondCategoryData =  $this->categoryModel->getNormalSecondCategory($categoryParentId);
        //print_r($secondCategoryData);

        if(!$secondCategoryData){
            return ["status" => 0, "message" => "error"];
        }
        return [ "status" => 1, "message" => "success", "data" => $secondCategoryData];
    }
}