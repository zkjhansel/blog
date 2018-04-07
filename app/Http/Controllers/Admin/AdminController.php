<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends CommonController
{
    /*
     * 后台登录方法
     * @param Request $request
     * return view
     */
    public function login(Request $request) {

        //$res = DB::table('admin')->get();
        //dd($res);

        return view('admin.login');

    }

    public function check(Request $request) {

        //验证码验证码方法
        $res = captcha_check('nfzn');

        dd($res);



    }


}
