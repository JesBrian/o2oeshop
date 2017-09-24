<?php

namespace app\common\validate;

use think\Validate;

class Featured extends Validate
{
    protected $rule = [
        'title'     =>  'require|max:25',
        'image'     =>  'require',
        'type'      =>  'in:0,1',
        'url'       =>  'require',
    ];


    protected $scene = [

    ];
}