<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


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

    public function pass(Request $request) {

        if ($request->isMethod('POST')) {

            $input = $request->all();
            $rules = [
                'old_pass'=>'required',
                'new_pass'=>'required|between:6,20|confirmed'
            ];
            $message = [
                'old_pass.required'=>'请输入原密码',
                'new_pass.required'=>'请输入新密码',
                'new_pass.between'=>'新密码长度必须是6-20位之间',
                'new_pass.confirmed'=>'确认密码和新密码不一致',
            ];
            $validate = Validator::make($input, $rules, $message);
            if ($validate->fails()) {
                return back()->withErrors($validate);
            }
            //如果原密码输入错误
            $admin = Admin::first();
            if (Crypt::decrypt($admin['password']) != $input['old_pass']) {
                return back()->with('errorMsg','原密码输入错误');
            }
            //更新密码
            $admin->password = Crypt::encrypt($input['new_pass']);
            $admin->update();
            return redirect('admin/info');

        }

        return view('admin/pass');
    }

}
