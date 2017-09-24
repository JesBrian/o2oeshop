<?php

namespace app\common\model;

class User extends BaseModel
{
    public function add($data = [])
    {
        // 如果提交的数据不是数组
        if (!is_array($data)) {
            exception('传递的数据不是数组');
        }

        $data['status'] = 1;
        return $this->data($data)->allowField(true)->save();
    }

    public function getUserByUsername($username)
    {
        if($username === null)
        {
            exception('用户名不合法');
        }

        return $this->where("username",$username)->find();
    }
}