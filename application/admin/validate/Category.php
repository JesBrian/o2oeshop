<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'name'          =>  'require|max:10',
        'parent_id'     =>  'require',
        'id'            =>  'require|number',
        'status'        =>  'number|in:-1,0,1',
        'listorder'     =>  'number',
    ];

    protected $message  =   [
        'name.require'          =>  '分类名称不能为空',
        'name.max'              =>  '分类名称最多不能超过10个字符',
        'parent_id.require'     =>  '分类栏目不能为空',
        'id.require'            =>  '分类ID不能为空',
        'id.number'             =>  '分类只能为数字',
        'status.number'         =>  '分类状态只能为数字',
        'status.in'             =>  '分类状态只能-1、0、1内的一个',
        'listorder.number'      =>  '排序只能为数字',
    ];

    protected $scene = [
        'add'       =>  ['name','parent_id'],
        'update'    =>  ['id','name','parent_id'],
        'status'    =>  ['id','status'],
    ];
}