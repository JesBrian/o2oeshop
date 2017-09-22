<?php

namespace app\common\model;

class BisLocation extends BaseModel
{
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

    /**
     * 根据商户Id获取正常门店信息
     */
    public function getBisNormalLocationByBisId($bisId)
    {
        $data = [
            "bis_id"    =>  $bisId,
            "status"    =>  1
        ];
        return $this->where($data)->order("id")->select();
    }
}