<?php

namespace app\admin\controller;

use think\Controller;

class Category extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 添加分类
     */
    public function add()
    {
        return $this->fetch();
    }
}