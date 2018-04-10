<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

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
     * 
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
    public function store() {

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
