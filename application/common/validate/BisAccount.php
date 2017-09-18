<?php

namespace app\common\validate;

use think\Validate;

class BisAccount extends Validate
{
    protected $rule = [
        "username"      =>   "require|max:25",
        "password"      =>   "require",
        'captcha|验证码' =>   'require|captcha'
    ];


    protected $scene = [
        "add"       =>      ["username","password"]
    ];
}