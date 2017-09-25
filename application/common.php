<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status($status)
{
    if ($status == 1) {
        $str = "<span class='label label-success radius'>正常</span>";
    } else if ($status == 0) {
        $str = "<span class='label label-danger radius'>待审</span>";
    } else {
        $str = "<span class='label label-danger radius'>删除</span>";
    }

    return $str;
}


function doCurl($url, $type = 0, $data = [])
{
    $ch = curl_init();  //初始化

    //设置选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//如果成功只返回结果
    curl_setopt($ch, CURLOPT_HEADER, 0);        //返回Head头数据数值非零，0代表不需返回head头数据

    if ($type == 1) // post请求方式
    {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    //执行并获取内容
    $output = curl_exec($ch);

    // 释放curl句柄
    curl_close($ch);

    //返回访问url后的值
    return $output;
}


/**
 * 展示通用的分页样式
 */
function pagination($obj)
{
    if(empty($obj))
    {
        return "";
    }
    else
    {
        return "<div class='cl pd-5 bg-1 bk-gray mt-20 tp5-o2o'>" . $obj->render() . "</div>";
    }
}


/**
 * 计算商品支持的分店数量
 */
function countLocation($locationIds)
{
    $arr = explode("|",$locationIds);
    return count($arr);
}


/**
 * 得到商品二级城市的名字
 */
function getSeCityName($seCityId)
{
    $seCityName = model("City")->field("name")->find($seCityId);
    return $seCityName["name"];
}


/**
 * 计算商品还有多久开始出售
 */
function countDown($time)
{
    $time = $time - time();
    if($time <=0 )
        return "该商品已经开始出售啦！";
    else
        return floor($time/31536000) . "年" . floor($time%31536000/2592000) . "月" . floor($time%31536000%2592000/86400) . "天&nbsp;&nbsp;"
            . floor($time%31536000%2592000%86400/3600) . "小时" . floor($time%31536000%2592000%86400%3600/60) . "秒";
}