<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    private $categoryModel;
    private $categoryValidate;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->categoryModel = model("Category");
        $this->categoryValidate = validate("Category");
    }

    public function index(Request $request)
    {
        $parentId = $request->param("parent_id", 0);
        $categoryData = $this->categoryModel->getCategory($parentId);
        $this->assign("categoryData", $categoryData);
        return $this->fetch();
    }

    /**
     * 展示添加分类页面的功能函数
     * 添加分类页面的功能函数
     */
    public function add()
    {
        $normalFirstCategory = $this->categoryModel->getNormalFirstCategory();
        $this->assign("normalFirstCategory", $normalFirstCategory);
        return $this->fetch();
    }

    /**
     * 处理添加分类的功能函数
     */
    public function save(Request $request)
    {
        //print_r($_POST); //测试传输数据

        /*验证传输的数据，若不符合规格则提示错误*/
        $data = $request->post();
        $data["status"] = 1;
        if (!$this->categoryValidate->scene("add")->check($data)) {
            $this->error($this->categoryValidate->getError());
        }

        /*添加数据到MySQL数据库*/
        $res = $this->categoryModel->add($data);
        if ($res) {
            $this->success("分类添加成功");
        } else {
            $this->error("分类添加失败");
        }
    }


    /**
     * 展示修改分类页面的功能函数
     */
    public function edit(Request $request)
    {
        $categoryId = $request->param("id");
        if ($categoryId < 1) {
            $this->error("参数不合法");
        }

        /*获取id对应的分类信息*/
        $categoryData = $this->categoryModel->get($categoryId);
        //print_r($categoryData);
        $this->assign("categoryData", $categoryData);

        /*所有正常一级分类的数据*/
        $normalFirstCategory = $this->categoryModel->getNormalFirstCategory();
        $this->assign("normalFirstCategory", $normalFirstCategory);
        return $this->fetch();
    }

    /**
     *  处理修改分类的功能函数
     */
    public function updateData(Request $request)
    {
        $data = $request->post();

        if (!$this->categoryValidate->scene("update")->check($data)) {
            $this->error($this->categoryValidate->getError());
        }

        /*直接更新数据并且依照返回值判断更新情况*/
        if ($this->categoryModel->update($data)) {
            $this->success("分类数据更新成功");
        } else {
            $this->error("分类数据更新失败");
        }
    }

    /**
     *  处理修改分类状态的功能函数
     */
    public function status(Request $request)
    {
        $data = $request->param();

        if (!$this->categoryValidate->scene("status")->check($data)) {
            $this->error($this->categoryValidate->getError());
        }

        /*直接更新数据并且依照返回值判断更新情况*/
        if ($this->categoryModel->update($data)) {
            $this->success("分类数据状态更新成功");
        } else {
            $this->error("分类数据状态更新失败");
        }
    }

    /**
     * 展示被删除的分类的功能函数
     */
    public function delCategoryList()
    {
        $delCategoryData = $this->categoryModel->getDelCategory();
        $this->assign("delCategoryData", $delCategoryData);
        return $this->fetch();
    }

    /**
     *  Ajax实现分类排序的功能函数
     */
    public function listorder(Request $request)
    {
        $data = $request->post();
        //print_r($data);//测试Ajax数据是否能够传递过来并且返回回去

        //保存修改后的排序
        if ($this->categoryModel->update($data)) {
            $this->result($_SERVER["HTTP_REFERER"], 1, "success");
        } else {
            $this->result($_SERVER["HTTP_REFERER"], 0, "error");
        }
    }
}