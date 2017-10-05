<?php

namespace app\common\validate;

use think\Validate;

class Order extends Validate
{
    protected $rule = [
        'deal_id'               =>  'require|number',
        'deal_count'            =>  'require|number',
        'total_price'           =>  'require|number',
        'name'                  =>  'require|max:20',
        'tel'                   =>  'require|number|min:11|max:11',
        'address'               =>  'require',
        'bank_number'           =>  'require|number'

    ];


    protected $scene = [

    ];

    protected $message = [
        'name.require'          => '真实姓名必须填写',
        'name.max'              => '名称最多不能超过20个字符',
        'tel.number'            => '电话必须是数字',
        'tel.min'               => '电话长度必须为11位数字',
        'address.require'       => '收货地址不能为空',
        'bank_number|require'   => '银行账号不能为空',
        'bank_number|number'    => '银行账号只能为数字',
    ];
}