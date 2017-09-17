<?php

namespace app\common\validate;

use think\Validate;

class BisLocation extends Validate
{
    protected $rule = [
        "tel"           =>   "require|number",
        "contact"       =>   "require",
        "category_id"   =>   "require|number",
        "address"       =>   "require",
        "open_time"     =>   "require",
    ];


    protected $scene = [

    ];
}