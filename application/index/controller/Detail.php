<?php

namespace app\index\controller;

use think\Request;

class Detail extends BaseController
{
    public function index(Request $request)
    {
        //动态传递title
        $this->assign("title", "o2oeshop团购网 商品详情页");

        $dealId = $request->param("dealId");
        if (!intval($dealId)) {
            $this->error("商品ID错误！不存在该商品！请重新选购，谢谢您的合作。", '/');
        }

        //根据ID查询相应的商品信息并传递数据给前端商品详情页面
        $dealData = model("Deal")->find($dealId);
        if (!$dealData)
        {
            $this->error("该商品不存在，请重新选购别的商品，谢谢您的合作。", "/");
        }
        else if ($dealData["status"] != 1)
        {
            $this->error("该商品已经下架，请重新选购别的商品，谢谢您的合作。", "/");
        }
        $this->assign("dealData",$dealData);

        //查询商品对应商家相应的商品信息并传递给前端商品详情页面
        $bisData = model("Bis")->find($dealData["bis_id"]);
        $this->assign("bisData",$bisData);

        //获取商品支持的门店的信息
        $locationIds = explode("|",$dealData["location_ids"]);
        $locationData = [];
        foreach ($locationIds as $k => $v)
        {
            $locationData[] = model("BisLocation")->find($v);
        }
        //dump($locationData); exit;
        $this->assign("locationData",$locationData);

        return $this->fetch();
    }
}