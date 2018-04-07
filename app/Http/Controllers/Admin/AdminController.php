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
    public function index(Request $request) {

        //$res = DB::table('admin')->get();
        //dd($res);

        return view('admin.login');

    }
}
