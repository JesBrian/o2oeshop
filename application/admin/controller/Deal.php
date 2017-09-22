<?php

namespace app\admin\controller;

use think\Controller;

class Deal extends Controller
{
    public function index()
    {
        $dealData = model("Deal")->where("status","NEQ","-1")->paginate();
        $this->assign("dealData", $dealData);

        
        return $this->fetch();
    }
}