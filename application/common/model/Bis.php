<?php

namespace app\common\model;

class Bis extends BaseModel
{
    /**
     * 根据状态获取B商户信息
     */
    public function getBisByStatus($status = 0)
    {
        return $this->where("status", "EQ",$status)->order("id","asc")->paginate();
    }


}