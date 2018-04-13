<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    /*
     * 图片上传
     */
    public function upload(Request $request)
    {
        //key : Filedata为系统生成的key
        $file = $request->file('Filedata');
        if ($file->isValid()) {

            $extension = $file->getClientOriginalExtension(); //获取原文件后缀
            $newName = date('YmdHis').mt_rand(100,999).'.'.$extension;
            $file->move(public_path().'/uploads',$newName);
            return '/uploads/'.$newName;

        }
    }
}
