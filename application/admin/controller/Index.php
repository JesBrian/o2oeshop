<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome()
    {
        return "欢迎来到o2o主后台页面";
    }
}