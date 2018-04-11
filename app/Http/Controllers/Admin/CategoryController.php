<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    /* 显示列表
     * GET url:admin/category
     * return view
     */
    public function index() {

        $cate = (new Category)->tree();
        return view('admin.list',[
            'data'=>$cate
        ]);
    }
    
    /*
     * 排序功能
     */
    public function changeOrder(Request $request)
    {
        $result = ['status'=>0, 'msg'=>''];
        $input = $request->all();
        if (!is_numeric($input['cate_id']) || !is_numeric($input['cate_order'])) {
            $result['msg'] = '参数错误';
            return $result;
        }
        if (intval($input['cate_order']) < 0) {
            $result['msg'] = '排序数字必须大于0';
            return $result;
        }

        $category = Category::find($input['cate_id']);
        if (!$category) {
            $result['msg'] = '数据不存在';
            return $result;
        }

        $category->cate_order = $input['cate_order'];
        $res = $category->save();
        if (!$res) {
            $result['msg'] = '排序更新失败';
            return $result;
        }
        $result['status'] = 1;
        $result['msg'] = '排序成功';
        return $result;

    }

    /* 显示新增页面
     * GET url:admin/category/create
     */
    public function create() {

        $cate = Category::where( ['cate_pid'=>0] )->pluck('cate_name','cate_id');
        return view('admin.add',[
            'cate'=>$cate
        ]);
    }

    /* 写入存储数据
     * POST url:admin/category
     */
    public function store(Request $request) {

        $input = $request->except(['_token']);
        $rules = [
            'cate_name'=>'required',
            'cate_title'=>'required',
            'cate_keywords'=>'required',
            'cate_desc'=>'required'
        ];
        $message = [
            'cate_name.required'=>'请输入分类名称',
            'cate_title.required'=>'请输入分类标题',
            'cate_keywords.required'=>'请输入关键词',
            'cate_desc.required'=>'请输入分类描述'
        ];
        $validate = Validator::make($input, $rules, $message);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        //withInput数据保持 模板使用old接收
        $isHave = Category::where( ['cate_name'=>$input['cate_name']] )->first();
        if ($isHave) {
            return back()->with('errorMsg','该分类名称已存在')->withInput();
        }
        //写入数据
        $input['create_time'] = $input['update_time'] = time();
        $res = Category::create($input);
        if (!$res) {
            return back()->with('errorMsg','文章内容写入失败');
        }
        return redirect('admin/category')->with('successTip','文章新增成功');


    }

    /* 显示一条信息
     * GET url:admin/category/{category}
     */
    public function show() {

    }

    /* 编辑页面
     * GET admin/category/{category}/edit
     */
    public function edit() {

    }

    /* 更新操作
     * PUT admin/category/{category}
     */
    public function update() {

    }

    /* 删除方法
     * DELETE   | admin/category/{category}
     */
    public function destroy() {

    }

}
