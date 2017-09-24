<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class BaseController extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }



    public function status(Request $request)
    {
        /* 需要验证的话可添加 */
        $data = $request->param();
        if(empty($data["id"]))
        {
            $this->error("ID不合法！！");
        }
        if(!is_numeric($data["status"]))
        {
            $this->error("状态不合法！！");
        }

        //使用ThinkPHP的request对象获取当前调用的类名
        $res = model($request->controller())->update(["status" => $data["status"]], ["id" => $data["id"]]);

        if ($res) {
            $this->success("状态修改成功");
        } else {
            $this->error("状态修改失败");
        }
    }
}