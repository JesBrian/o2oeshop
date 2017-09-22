<?php

namespace app\bis\controller;

use think\Request;
use think\Session;

class Location extends BaseController
{
    /**
     * 展示该商户非删除的所有门店列表功能函数
     */
    public function index()
    {
        //获取商户Id
        $bisId = session("bisId");
        $bisLocationData = model("BisLocation")->where("bis_id", "EQ", $bisId)->where("status", "NEQ", -1)->paginate();
        $this->assign("bisLocationData", $bisLocationData);
        return $this->fetch();
    }

    /**
     * 添加门店列功能函数[并且进行处理添加门店请求]
     */
    public function add(Request $request)
    {
        if($request->isPost())//如果请求为post则进行添加门店处理
        {
            $data = $request->post();

            //检验数据
            $validate = validate("BisLocation");
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            //获取经纬度
            $lnglat = \Map::getLngLat($data["address"]);
            if (empty($lnglat) || $lnglat["status"] != 0 || $lnglat["result"]["precise"] != 1) {
                $this->error("无法获取地址数据，或者地址匹配不精确");
            }

            //获取商户Id
            $bisId = Session::get("bisId");

            // 门店入库操作
            $data["cat"] = "";
            if(!empty($data['se_category_id']))//处理二级分类数据[将数据以‘|’合并成字符串]
            {
                $data["cat"] = implode("|", $data["se_category_id"]);
            }
            $locationData = [
                'bis_id'        =>    $bisId,
                'name'          =>    $data["name"],
                'tel'           =>    $data['tel'],
                'logo'          =>    $data['logo'],
                'contact'       =>    $data['contact'],
                'category_id'   =>    $data['category_id'],
                'category_path' =>    $data["cat"] == "" ? "" : $data['category_id'] . ',' . $data['cat'],
                'city_id'       =>    $data['city_id'],
                'city_path'     =>    empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
                'address'       =>    $data['address'],
                'open_time'     =>    $data['open_time'],
                'content'       =>    empty($data['content']) ? '' : $data['content'],
                'is_main'       =>    0,    // 1 代表的是总店信息 0 代表分店
                'xpoint'        =>    empty($lnglat['result']['bis_location']['lng']) ? '' : $lnglat['result']['bis_location']['lng'],
                'ypoint'        =>    empty($lnglat['result']['bis_location']['lat']) ? '' : $lnglat['result']['bis_location']['lat'],
            ];
            $locationId = model('BisLocation')->add($locationData);

            if ($locationId) {
                $this->success('门店申请成功');
            } else {
                $this->error('门店申请失败');
            }
        }

        //获取一级城市的数据
        $fiCityData = model("City")->getNormalCityByParentID();
        $this->assign("fiCityData",$fiCityData);

        //获取分类
        $fiCategoryData = model("Category")->getNormalFirstCategory();
        $this->assign("fiCategoryData",$fiCategoryData);

        return $this->fetch();
    }


    public function detail(Request $request)
    {
        //获取商户总店信息并传递给模板
        $bisLocationData = model("BisLocation")->find($request->param("id"));
        $this->assign("bisLocationData", $bisLocationData);

        //获取一级城市信息并传递给模板
        $fiCityData = model("City")->find($bisLocationData["city_id"]);
        $this->assign("fiCityData",$fiCityData);

        //判断是否有二级城市，如果有的话获取二级城市信息并传递给模板
        if($bisLocationData["city_path"] != 0)//是否有二级城市
        {
            $seCityDataId = explode(",", $bisLocationData["city_path"])[1];
            $seCityData = model("City")->find($seCityDataId);
            //dump($seCityData);
        }
        else
        {
            $seCityData = ["name"=>'暂无详细信息'];
        }
        $this->assign("seCityData",$seCityData);

        //获取分类信息并传递给模板
        $fiCategoryData = model("Category")->find($bisLocationData["category_id"]);
        $this->assign("fiCategoryData", $fiCategoryData);
        if($bisLocationData["category_path"] != "") {
            $seCategoryIdStr = explode(",", $bisLocationData["category_path"])[1];
            $seCategoryIdArr = explode("|", $seCategoryIdStr);
            $seCategoryData = model("Category")->where("id","in", $seCategoryIdArr)->select();
        }
        else
        {
            $seCategoryData = [];
        }
        $this->assign("seCategoryData", $seCategoryData);

        return $this->fetch();
    }



    public function status(Request $request)
    {
        /* 需要验证的话可添加 */

        $res = model("BisLocation")->update(["status" => $request->param("status")], ["id" => $request->param("id")]);

        if ($res) {
            $this->success("状态修改成功");
        } else {
            $this->error("状态修改失败");
        }
    }
}