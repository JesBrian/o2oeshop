<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'adminname'          =>  'require',
        'password'           =>  'require',
        'captcha|验证码'      =>   'require|captcha',
    ];

    protected $message  =   [
        'adminname.require'   =>  '管理员名称不能为空',
        'password.require'    =>  '管理员密码不能为空',
        'captcha.require'     =>  '验证码不能为空',
    ];
}