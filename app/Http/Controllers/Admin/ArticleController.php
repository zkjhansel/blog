<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    /* 显示列表
     * GET url:admin/article
     * return view
     */
    public function index() {

        $list = Article::orderBy('art_id','DESC')->paginate('2');
        return view('admin.article.list',[
            'data' => $list
        ]);
    }


    /* 显示新增页面
     * GET url:admin/article/create
     */
    public function create() {

        $cate = (new Category)->tree();
        return view('admin.article.add',[
            'cate'=>$cate
        ]);
    }

    /*
     * check方法
     */
    protected function check($input) {

        $result = ['status' => 0];
        $rules = [
            'art_title'=>'required',
            'art_thumb'=>'required',
            'art_content'=>'required',
        ];
        $message = [
            'art_title.required'=>'请输入文章标题',
            'art_thumb.required'=>'请上传文章缩略图',
            'art_content.required'=>'请填写文章内容',
        ];
        $validate = Validator::make($input, $rules, $message);
        if ($validate->fails()) {
            $result['obj'] = $validate;
            return $result;
        }
        $result['status'] = 1;
        return $result;
    }

    /* 写入存储数据
     * POST url:admin/article
     */
    public function store(Request $request) {

        $input = $request->except(['_token']);
        //check验证
        $rs = $this->check($input);
        if (!$rs['status']) {
            return back()->withErrors($rs['obj'])->withInput();
        }
        //withInput数据保持 模板使用old接收
        $isHave = Article::where( ['art_title'=>$input['art_title']] )->first();
        if ($isHave) {
            return back()->with('errorMsg','该文章标题已存在')->withInput();
        }
        //写入数据
        if (!$input['art_author']) $input['art_author'] = 'Admin';
        $input['art_time'] =  time();
        $res = Article::create($input);
        if (!$res) {
            return back()->with('errorMsg','文章内容写入失败');
        }
        return redirect('admin/article/create')->with('successTip','文章新增成功');


    }

    /* 编辑页面
     * GET admin/category/{category}/edit
     */
    public function edit($id) {

        if (!is_numeric($id) || intval($id)<=0) {
            return back()->with('errorMsg','参数错误');
        }
        $info = Category::find($id);
        if (!$info) return back()->with('errorMsg','数据不存在');

        $cate = Category::where( ['cate_pid'=>0] )->pluck('cate_name','cate_id');
        return view('admin.category.edit',[
            'cate' => $cate,
            'info' => $info
        ]);
    }

    /* 更新操作
     * PUT admin/category/{category}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token','_method']);
        //check验证
        $rs = $this->check($input);
        if (!$rs['status']) {
            return back()->withErrors($rs['obj'])->withInput();
        }
        $info = Category::find($id);
        if (!$info) return back()->with('errorMsg','数据不存在');
        //withInput数据保持 模板使用old接收
        $isHave = Category::where([
                    ['cate_name', '=', $input['cate_name']],
                    ['cate_id', '<>', $id],
                ])->first();
        if ($isHave) {
            return back()->with('errorMsg','该分类名称已被占用')->withInput();
        }

        $res = Category::where('cate_id','=',$id)->update($input);
        if (!$res) {
            return back()->with('errorMsg','文章信息更新失败')->withInput();
        }
        return redirect('admin/category')->with('successTip','文章信息修改成功');

    }

    /* 删除方法
     * DELETE   | admin/category/{category}
     */
    public function destroy($id) {

        $result = ['status' => 0, 'msg'=>''];
        if (!is_numeric($id) || intval($id)<=0) {
            $result['msg'] = '参数错误';
            return $result;
        }
        $info = Category::find($id);
        if (!$info) {
            $result['msg'] = '信息不存在';
            return $result;
        }
        //此分类下是否有下级分类。如果有则不能删除
        $has = Category::where('cate_pid','=',$info['cate_id'])->first();
        if ($has) {
            $result['msg'] = '该分类下还有子分类，请先删除子分类';
            return $result;
        }

        $res = Category::where('cate_id','=',$id)->delete();
        if (!$res) {
            $result['msg'] = '信息不存在';
            return $result;
        }

        $result['status'] = 1;
        $result['msg'] = '分类删除成功';
        return $result;
    }

}
