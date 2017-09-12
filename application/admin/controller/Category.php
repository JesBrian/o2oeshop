<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Validate;

class Category extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 添加分类页面的功能函数
     */
    public function add()
    {
        return $this->fetch();
    }

    /**
     * 处理添加分类的功能函数
     */
    public function save(Request $request)
    {
        //print_r($_POST); //测试传输数据

        /*验证传输的数据，若不符合规格则提示错误*/
        $validate = validate("Category");
        if(!$validate->scene("add")->check($request->post()))
        {
            $this->error($validate->getError());
        }


    }
}