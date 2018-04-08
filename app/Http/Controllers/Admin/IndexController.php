<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends CommonController
{

    /*
     * 进入后台首页
     */
    public function index() {
        return view('admin.index');
    }

    /*
     * iframe载入模板
     */
    public function info() {
        return view('admin.info');
    }

}
