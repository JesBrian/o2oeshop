<?php

namespace app\api\controller;

use think\Controller;
use think\Request;

class Image extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        //将上传的文件放到给定的一个目录
        $uploadInfo = $file->move('upload');
        //print_r($uploadInfo);

        if($uploadInfo && $uploadInfo->getPathname())
        {
            return ["status"=>1, "message"=>'success', "data"=>'/' . $uploadInfo->getPathname()];
        }
        return ["status"=>0, "message"=>'upload error'];
    }
}