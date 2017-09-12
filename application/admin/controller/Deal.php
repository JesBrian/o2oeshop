<?php

namespace app\admin\controller;

use think\Controller;

class Deal extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}