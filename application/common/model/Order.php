<?php

namespace app\common\model;

class Order extends BaseModel
{

    public function add($data)
    {
        $data['status'] = 1;
        $this->allowField(true)->save($data);
        return $this->id;
    }
}