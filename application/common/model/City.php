<?php

namespace app\common\model;

use think\Model;

class City extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * 通过父ID获取正城市的数据[不分页]
     */
    public function getNormalCityByParentID($parentId = 0)
    {
        $data = [
            "status"    =>  1,
            "parent_id" =>  $parentId,
        ];
        $order = [
            "id"           =>  "asc"
        ];
        return $this->where($data)->order($order)->select();
    }
}