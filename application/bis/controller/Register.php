<?php

namespace app\bis\controller;

use think\Controller;
use think\Request;

class Register extends Controller
{
    /**
     * 展示商家入驻的页面
     */
    public function index()
    {
        /*需要获取各种数据：一级城市数据、一级分类数据[Ajax联动获取二级数据]*/

        //一级城市数据
        $firstNormalCity = model("City")->getNormalCityByParentID();
        $this->assign("firstNormalCity", $firstNormalCity);

        //一级分类数据
        $firstNormalCategory = model("Category")->getNormalFirstCategory();
        $this->assign("firstNormalCategory", $firstNormalCategory);

        return $this->fetch();
    }

    /**
     * 添加商家入驻的功能函数
     */
    public function add(Request $request)
    {
        if(!$request->isPost())
        {
            $this->error("请求错误",url('register/index'));
        }

        //获取表单的值
        $data = $request->post();
        //print_r($data);

        //验证商家基本信息、总店信息、商家账户信息
        $bisValidate = validate("Bis");
        if (!$bisValidate->check($data)) {
            $this->error($bisValidate->getError());
        }
        $bisLocationValidate = validate("BisLocation");
        if (!$bisLocationValidate->check($data)) {
            $this->error($bisLocationValidate->getError());
        }
        $bisAccountValidate = validate("BisAccount");
        if (!$bisAccountValidate->scene("add")->check($data)) {
            $this->error($bisAccountValidate->getError());
        }

        //获取经纬度
        $lnglat = \Map::getLngLat($data["address"]);
        if(empty($lnglat) || $lnglat["status"]!=0 || $lnglat["result"]["precise"]!=1) {
            //非空、状态不正确、精确度不足
            $this->error("无法获取数据域 或 匹配的地址值不精确");
        }

        /*如果用户已经存在则提示错误并停止进行下一步*/
        if(model("BisAccount")->get(["username"=>$data["username"]])) {
            $this->error("该用户已经存在，请重新分配");
        }

        //商家基本信息入数据库
        $bisData = [
            "name"          =>  $data["name"],
            "city_id"       =>  $data["city_id"],
            "city_path"     =>  empty($data["se_city_id"])?$data["se_city_id"]:$data["city_id"] . ',' .$data["se_city_id"],
            "logo"          =>  $data["logo"],
            "licence_logo"  =>  $data["licence_logo"],
            'description'   =>  empty($data['description']) ? '' : $data['description'],
            'bank_info'     =>  $data['bank_info'],
            'bank_user'     =>  $data['bank_user'],
            'bank_name'     =>  $data['bank_name'],
            'faren'         =>  $data['faren'],
            'faren_tel'     =>  $data['faren_tel'],
            'email'         =>  $data['email'],
        ];
        $bisId = model('Bis')->add($bisData);

        //总店信息入数据库
        $data["cat"] = "";
        if(!empty($data['se_category_id']))//处理二级分类数据[将数据以‘|’合并成字符串]
        {
            $data["cat"] = implode("|", $data["se_category_id"]);
        }
        $locationData = [
            'bis_id'        =>    $bisId,
            'name'          =>    $data["name"],
            'tel'           =>    $data['tel'],
            "logo"          =>    $data["logo"],
            'contact'       =>    $data['contact'],
            'category_id'   =>    $data['category_id'],
            'category_path' =>    $data["cat"] == "" ? "" : $data['category_id'] . ',' . $data['cat'],
            'city_id'       =>    $data['city_id'],
            'city_path'     =>    empty($data['se_city_id']) ? $data['city_id'] : $data['city_id'].','.$data['se_city_id'],
            'address'       =>    $data['address'],
            'open_time'     =>    $data['open_time'],
            'content'       =>    empty($data['content']) ? '' : $data['content'],
            'is_main'       =>    1,    // 1 代表的是总店信息
            'xpoint'        =>    empty($lnglat['result']['location']['lng']) ? '' : $lnglat['result']['location']['lng'],
            'ypoint'        =>    empty($lnglat['result']['location']['lat']) ? '' : $lnglat['result']['location']['lat'],
        ];
        $locationId = model('BisLocation')->add($locationData);

        //商家账户信息入数据库
        $data['code'] = mt_rand(100, 10000);// 自动生成密码的加密字符串
        $accountData = [
            'bis_id' => $bisId,
            'username' => $data['username'],
            'code' => $data['code'],
            'password' => md5($data['password'] . $data['code']),   //混合着自动生成的code生成md5密码
            'is_main' => 1, // 代表的是总管理员
        ];
        $accountId = model('BisAccount')->add($accountData);


        //是否提交申请资料成功
        if(!$accountId) {
            $this->error('申请失败');
        }
        // 发送邮件
        $url = $request->domain().url('/bis/register/waiting', ['id'=>$bisId]);
        $title = "o2o商户入驻申请提交成功通知";
        $content = "您提交的入驻申请以成功上传至系统，请耐心等待平台方审核，您可以通过点击链接 <a href='".$url."' target='_blank'>查看链接</a> 查看审核状态";
        \phpmail\Email::send($data['email'], $title, $content);  // 线上关闭 发送邮件服务
        $this->success('申请成功，请耐心等待系统管理员审核通过！', url('register/waiting',['id'=>$bisId]));
    }

    /**
     * 商家查看注册进度
     */
    public function waiting(Request $request)
    {
        $id = $request->param("id");
        if(empty($id))
        {
            $this->error("请求错误");
        }

        $detail = model("Bis")->get($id);
        if(empty($detail))
        {
            $this->error("请求错误",url('register/index'));
        }
        $this->assign("detail",$detail);

        return $this->fetch();
    }
}