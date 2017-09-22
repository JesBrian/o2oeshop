<?php

namespace app\bis\controller;

use think\Session;

class Index extends BaseController
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