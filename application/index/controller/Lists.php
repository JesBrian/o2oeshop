<?php

namespace app\index\controller;

class Lists extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }
}