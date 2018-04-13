@extends('layout.admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; <a href="{{ url('admin/article') }}">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

    @include('layout.tip')
    
    <div class="result_wrap">
        <form action="{{ url('admin/article') }}" method="post" onsubmit ="getElementById('sub').disabled=true;return true;">
            @csrf
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">主分类：</th>
                        <td>
                            <select name="category_id" style="height: 30px;">
                                @if(count($cate)>0)
                                    @foreach($cate as $value)
                                        <option value="{{$value['cate_id']}}"> {{ $value['cate_name']}} </option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" style="padding:8px 5px;" value="{{ old('art_title') ?? ''}}" placeholder="请填写文章标题" name="art_title">
                        </td>
                    </tr>

                    <tr>
                        <th>文章作者：</th>
                        <td>
                            <input type="text" class="lg" style="width: 150px;padding:8px 5px;" value="{{ old('art_author') ?? ''}}" placeholder="请填写文章作者" name="art_author">
                        </td>
                    </tr>

                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="text" class="lg" style="padding:8px 5px;" value="{{ old('art_thumb') ?? ''}}" placeholder="上传文章缩略图" name="art_thumb">
                        </td>
                    </tr>


                    <tr>
                        <th>SEO关键词：</th>
                        <td>
                            <textarea class="lg" name="art_keywords" placeholder="请填写文章SEO关键词">{{ old('art_keywords') ?? ''}}</textarea>
                            <p></p>
                        </td>
                    </tr>

                    <tr>
                        <th>文章SEO描述：</th>
                        <td>
                            <textarea name="atr_desc" placeholder="请填写文章SEO描述">{{ old('atr_desc') ?? '' }}</textarea>
                        </td>
                    </tr>

                    <script type="text/javascript" charset="utf-8" src="{{ asset('plugins/ueditor/ueditor.config.js') }}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{ asset('plugins/ueditor/ueditor.all.min.js') }}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{ asset('plugins/ueditor/lang/zh-cn/zh-cn.js') }}"></script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                    <tr>
                        <th><i class="require">*</i>文章内容：</th>
                        <td>
                            <script id="editor" name="atr_content" style="width: 1024px;height: 400px;" type="text/plain"></script>
                            <script type="text/javascript">
                                //实例化编辑器
                                UE.getEditor('editor');
                            </script>
                        </td>
                    </tr>


                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交" id="sub">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection