<?php

namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        "username"      =>   "require|max:25",
        "password"      =>   "require",
        "repassword"    =>   "require",
        "email"         =>   "email",
        'captcha|验证码' =>   'require|captcha',
    ];


    protected $scene = [
        "login"     =>      ["username","password","captcha|验证码"],
    ];
}