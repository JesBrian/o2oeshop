<?php

namespace app\index\controller;

use think\Session;

class Index extends BaseController
{
    public function index()
    {
        //获取推荐位的信息 -- type0表示大图、type1表示广告
        $featuredDataType0 = model("Featured")->getFeaturedsByTypeLimit(0,3);
        $this->assign("featuredDataType0", $featuredDataType0);
        $featuredDataType1 = model("Featured")->getFeaturedsByType(1,1);
        $this->assign("featuredDataType1", $featuredDataType1);


        //根据一级分类循环来获取具体商品的信息 [ 限定只取四个分类 ]
        $flag = 0;
        foreach ($this->fiCategory as $k => $v)
        {
            $this->fiCategory[$k]["dealData"] =  model("Deal")->getNormalDealByCategoryCityNum($v["id"], Session::get("cityId"));
            if(++$flag > 4 )
            {
                break;
            }
        }

        return $this->fetch();
    }
}
