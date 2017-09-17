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
        return "欢迎来到o2oeshop主后台页面";
    }

    /**
     * 测试各种拓展类
     */
    public function test()
    {
        //return \Map::staticImage("广东佛山禅城雾岗路4座402");

        //echo \phpmail\Email::send("2675862735@qq.com","666","666");


    }
}