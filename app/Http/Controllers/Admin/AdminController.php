<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends CommonController
{
    /*
     * 后台登录方法
     * @param Request $request
     * return view
     */
    public function login(Request $request) {

        if ($request->isMethod('POST')) {

            $data = $request->all();
            if (empty($data['name'])) return back()->with('errorMsg','用户名不能为空');
            if (empty($data['password'])) return back()->with('errorMsg','密码不能为空');
            if (empty($data['code'])) return back()->with('errorMsg','验证码不能为空');
            //验证码验证失败
            if (!captcha_check($data['code'])) {
                return back()->with('errorMsg','验证码不正确');
            }
            $admin = Admin::first();
            if ($data['name']!= $admin['name'] || $data['password']!= Crypt::decrypt($admin['password'])) {
                return back()->with('errorMsg','用户名或者密码不正确');
            }

            session(['admin'=>$admin]);
            return redirect('admin/index');

        }

        return view('admin.login');

    }

    public function check(Request $request) {

        //验证码验证码方法
        //$str = '123456';
        //echo Crypt::encrypt($str);die;
        //dd($res);



    }


}
