<?php

namespace app\common\validate;

use think\Validate;

class Deal extends Validate
{
    protected $rule = [
        'name'                  =>  'require|max:25',
        'category_id'           =>  'require|number',
        'location_ids'          =>  'require',
        'image'                 =>  'require',
        'start_time'            =>  'require',
        'end_time'              =>  'require',
        'origin_price'          =>  'require',
        'current_price'         =>  'require',
        'city_id'               =>  'require',
        'total_count'           =>  'require',
        'coupons_start_time'    =>  'require',
        'coupons_end_time'      =>  'require',
    ];


    protected $scene = [

    ];
}