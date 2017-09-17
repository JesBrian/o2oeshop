<?php

namespace app\common\validate;

use think\Validate;

class BisAccount extends Validate
{
    protected $rule = [
        "username"    =>   "require|max:25",
        "password"    =>   "require"
    ];


    protected $scene = [
        "add"       =>      ["username","password"]
    ];
}