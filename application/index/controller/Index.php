<?php

namespace app\index\controller;

class Index extends BaseController
{
    public function index()
    {
        $featuredDataType0 = model("Featured")->getFeaturedsByTypeLimit(0,3);
        $this->assign("featuredDataType0", $featuredDataType0);

        $featuredDataType1 = model("Featured")->getFeaturedsByType(1,1);
        $this->assign("featuredDataType1", $featuredDataType1);

        return $this->fetch();
    }
}
