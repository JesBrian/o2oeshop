<?php

namespace app\common\model;

class BisLocation extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * 根据商户Id获取商户总店信息
     */
    public function getBisLocationByBisId($bisId)
    {
        $data = [
            "bis_id"    =>  $bisId,
            "is_main"   =>  1
        ];
        return $this->where($data)->find();
    }
}