<?php

namespace app\bis\controller;

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
     * 商户登录功能函数
     */
    public function login(Request $request)
    {
        $data = $request->post();
        //dump($data);exit;
        if(empty($data)){
            $this->error("请求错误！",url('bis/login/index'));
        }

        //验证商户登陆输入数据
        if(!validate("BisAccount")->check($data))
        {
            $this->error(validate("BisAccount")->getError());
        }

        $bisAccountInfo = model("BisAccount")->where("username","EQ",$data["username"])->find();
        if($bisAccountInfo === null)
        {
            $this->error("用户不存在！");
        }
        else
        {
            if($bisAccountInfo["status"] != 1)
            {
                $this->error("用户审核未通过，请耐心等待平台方管理员审核");
            }
            if(md5($data["password"] . $bisAccountInfo["code"]) == $bisAccountInfo["password"])
            {
                session("bisAccountUsername",$data["username"]);
                session("bisId",$bisAccountInfo["bis_id"]);
                $this->success("欢迎 " . $data["username"] . "登录",url("index/index"));
            }
            else
            {
                $this->error("用户名或者密码错误！");
            }
        }
    }

    /**
     * 商户退出登录功能函数
     */
    public function logout()
    {
        //将保存的Session删除，并且将页面跳转到登录页面
        Session::delete('bisAccountUsername');
        Session::delete('bisAccountId');
        $this->redirect("/bis/login/index");
    }
}