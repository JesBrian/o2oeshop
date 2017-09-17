<?php

namespace app\common\model;

class BisAccount extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * 根据商户Id获取商户账户信息
     */
    public function getBisAccountByBisId($bisId)
    {
        $data = [
            "bis_id"    =>  $bisId,
            "is_main"   =>  1
        ];
        return $this->where($data)->find();
    }
}