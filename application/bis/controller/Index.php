<?php

namespace app\bis\controller;

use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        return "欢迎 " . Session::get('bisAccountUsername') . " 登陆 O2O ESHOP 商户后台";
    }
}