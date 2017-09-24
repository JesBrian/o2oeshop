<?php

namespace app\common\model;

class Featured extends BaseModel
{
    public function getFeaturedsByType($type = 0)
    {
        $res = $this->where("type","EQ",$type)->where("status","NEQ",-1)->order("id","asc")->paginate();
        return $res;
    }

    /**
     * 根据limit条数还有类型查询推荐位数据
     */
    public function getFeaturedsByTypeLimit($type = 0, $limit = 1)
    {
        $res = $this->where(["type"=>$type,"status"=>1])->order(["listorder"=>"desc","id"=>"asc"])->limit($limit)->select();
        return $res;
    }
}