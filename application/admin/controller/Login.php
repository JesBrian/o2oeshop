<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 管理员登录
     */
    public function login(Request $request)
    {
        $data = $request->post();
        $validate = validate("admin");
        if(!$validate->check($data))
        {
            $this->error($validate->getError());
        }


        $adminInfo = model("Admin")->where("adminname","EQ",$data["adminname"])->find();
        if($adminInfo === null)
        {
            $this->error("管理员账户不存在！");
        }
        else
        {
            if(sha1(md5($data["password"])) == $adminInfo["password"])
            {
                Session::set("adminAccount", $adminInfo);
                $this->success("欢迎 " . $data["adminname"] . "登录",url("index/index"));
            }
            else
            {
                $this->error("用户名或者密码错误！");
            }
        }
    }

    /**
     * 管理员退出登录
     */
    public function logout()
    {
        Session::delete("adminAccount");
        $this->redirect("login/index");
    }

}