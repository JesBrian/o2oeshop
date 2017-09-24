<?php

namespace app\index\controller;

use think\Controller;
use think\Exception;
use think\Request;
use think\Session;

class User extends Controller
{
    /**
     * 用户登录功能
     */
    public function login(Request $request)
    {
        //如果已经登陆过了就直接跳转到主页
        if (Session::get("user")) {
            $this->redirect("/");
        }

        //处理用户登录的逻辑
        if ($request->isPost()) {
            $data = $request->post();

            //验证数据
            $validate = validate("User");
            if (!$validate->scene("login")->check($data)) {
                $this->error($validate->getError());
            }

            try {
                $userdata = model("User")->getUserByUsername($data["username"]);
            } catch (Exception $e) {
                $this->error($e->getMessage());
            }

            if(!$userdata || $userdata["status"] != 1) {
                $this->error("用户不存在！");
            }

            if(md5($data["password"] . $userdata["code"]) != $userdata["password"]) {
                $this->error("用户密码错误！");
            }

            // 登录成功
            model('User')->updateById(['last_login_time'=>time()], $userdata["id"]);

            //把用户信息记录到session
            Session::set("user",$userdata);

            $this->success('登录成功', url('/index'));
        }

        return $this->fetch();
    }

    /**
     * 普通用户注册功能
     */
    public function register(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->post();

            //验证数据
            $validate = validate("User");
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            if ($data['password'] != $data['repassword']) {
                $this->error('两次输入的密码不一样');
            }
            // 自动生成 密码的随机字符串
            $data['code'] = mt_rand(100, 10000);
            $data['password'] = md5($data['password'] . $data['code']);

            try {
                $res = model('User')->add($data);
            } catch (Exception $e) {
                $this->error($e->getMessage()); //可以抛出unique异常
            }

            if ($res) {
                $this->success('注册成功', url('user/login'));
            } else {
                $this->error('注册失败');
            }
        }
        return $this->fetch();
    }

    /**
     * 用户退出登录功能
     */
    public function logout()
    {
        Session::delete("user");
        $this->redirect('user/login');
    }
}