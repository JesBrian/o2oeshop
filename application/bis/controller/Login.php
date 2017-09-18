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
            if(md5($data["password"] . $bisAccountInfo["code"]) == $bisAccountInfo["password"])
            {
                session("bisAccountUsername",$data["username"]);
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
        Session::delete('bisAccountUsername');
        $this->redirect("/bis/login/index");
    }
}