<?php

namespace app\common\validate;

use think\Validate;

class Bis extends Validate
{
    protected $rule = [
        'name'          =>  'require|max:25',
        'email'         =>  'email',
        'logo'          =>  'require',
        'city_id'       =>  'require|number',
        'bank_info'     =>  'require',
        'bank_name'     =>  'require',
        'bank_user'     =>  'require',
        'faren'         =>  'require',
        'faren_tel'     =>  'require',
    ];


    protected $scene = [

    ];
}