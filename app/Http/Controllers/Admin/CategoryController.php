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

    /* 显示新增页面
     * GET url:admin/category/create
     */
    public function create() {

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
    public function destory() {

    }

}
