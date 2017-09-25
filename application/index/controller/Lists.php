<?php

namespace app\index\controller;

class Lists extends BaseController
{
    public function index()
    {
        //动态传递title
        $this->assign("title","o2oeshop团购网 商品查询页");

        return $this->fetch();
    }
}