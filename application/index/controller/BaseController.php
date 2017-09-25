<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

class BaseController extends Controller
{
    protected $fiCategory;
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub

        //获取城市数据
        $cityData = model("City")->where(["status"=>1,"parent_id"=>0])->select();
        $this->assign("cityData", $cityData);

        //当前选中的城市或者默认的城市
        $this->assign("nowCity",$this->getCity($cityData));


        //获取一,二级分类的数据
        $this->fiCategory = model("Category")->getNormalFiCategory();
        //二级分类 -- 在一级分类新开一个数组属性，存放对应的二级分类
        foreach($this->fiCategory as $k => $v)
        {
            $this->fiCategory[$k]["seCategory"] = model("Category")->getNormalSecondCategory($v["id"]);
        }

        $this->assign("categoryData", $this->fiCategory);
    }


    public function getCity($cityData)
    {
        $defaultId = "";
        /* 获取默认选择的城市或者选择了的城市的id */
        foreach ($cityData as $city) {
            $city = $city->toArray();
            if ($city['is_default'] == 1) {
                $defaultId = $city['id'];
                break; // 终止foreach
            }
        }
        $defaultId = $defaultId ? $defaultId : 8;

        //将默认的城市或者点击了的城市的ID保存到session中
        if (Session::get("cityId") && !input('param.cityId')) {
            $cityId = Session::get("cityId");
        } else {
            $cityId = input('param.cityId', $defaultId, 'trim');
            Session::set('cityId', $cityId);
        }

        return model('City')->where(['id' => $cityId])->find();
    }
}