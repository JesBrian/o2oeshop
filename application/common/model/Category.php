<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * 添加数据功能
     */
    public function add($data)
    {
        $data["status"] = 1;
        return $this->save($data);
    }

    /**
     * 获取正常一级分类的数据[不分页]，由于知识浅薄只能做到二级栏目
     */
    public function getNormalFirstCategory()
    {
        $data = [
            "status"    =>  1,
            "parent_id" =>  0,
        ];
        $order = [
            "id"    =>  "desc",
        ];
        return $this->where($data)->order($order)->select();
    }

    /**
     * 获取正常二级分类的数据[不分页]
     */
    public function getNormalSecondCategory($parent_id = 0)
    {
        $data = [
            "status"    =>  1,
            "parent_id" =>  $parent_id,
        ];
        $order = [
            "id"    =>  "desc",
        ];
        return $this->where($data)->order($order)->select();
    }

    /**
     * 获取非删除分类的数据[分页]
     */
    public function getCategory($parentId)
    {
        $data = [
            "status"    =>  ["NEQ", -1],
            "parent_id" =>  $parentId,
        ];
        $order = [
            "listorder"    =>  "desc",
            "id"           =>  "asc"
        ];
        return $this->where($data)->order($order)->paginate();
    }

    /**
     * 获取删除状态分类的数据[分页]
     */
    public function getDelCategory()
    {
        $data = [
            "status"    =>  ["EQ", -1],
        ];
        $order = [
            "listorder"    =>  "desc",
            "id"           =>  "asc"
        ];
        return $this->where($data)->order($order)->paginate();
    }

    /**
     * 获取首页5种一级分类
     */
    public function getNormalFiCategory($parent_id = 0)
    {
        $data = [
            "parent_id"     =>  $parent_id,
            "status"        =>  1,
        ];
        $order = [
            "listorder"     =>  "desc",
            "id"            =>  "asc"
        ];
        return $this->where($data)->order($order)->limit(5)->select();
    }

}