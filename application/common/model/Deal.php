<?php

namespace app\common\model;

class Deal extends BaseModel
{
    /**
     * 根据类型、城市、限制数量来查询商品 -- 保证下架时间大于现在时间
     */
    public function getNormalDealByCategoryCityNum($categoryId = 0, $cityId, $num = 10)
    {
        $data = [
            "category_id"   =>  $categoryId,
            "city_id"    =>  $cityId,
            "status"        =>  1,
            "end_time"      =>  ["GT", time()]
        ];
        $order = [
            "listorder"     =>  "desc",
            "id"            =>  "asc",
        ];

        return $this->where($data)->order($order)->limit($num)->select();
    }
}