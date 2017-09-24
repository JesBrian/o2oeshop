<?php

namespace app\bis\controller;

class Admin extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }
}