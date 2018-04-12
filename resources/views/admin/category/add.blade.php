@extends('layout.admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; <a href="{{ url('admin/category') }}">分类管理</a> &raquo; 添加分类
    </div>
    <!--面包屑导航 结束-->

    @include('layout.tip')
    
    <div class="result_wrap">
        <form action="{{ url('admin/category') }}" method="post" onsubmit ="getElementById('sub').disabled=true;return true;">
            @csrf
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>主分类：</th>
                        <td>
                            <select name="cate_pid" style="height: 30px;">
                                <option value="0">==请选择==</option>
                                @if(count($cate)>0)
                                    @foreach($cate as $kid=>$name)
                                        <option value="{{$kid}}">== {{ $name }} ==</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" class="lg" style="padding:8px 5px;" value="{{ old('cate_name') ?? ''}}" placeholder="请填写分类名称" name="cate_name">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>分类标题：</th>
                        <td>
                            <input type="text" class="lg" style="padding:8px 5px;" placeholder="请填写分类标题" value="{{ old('cate_title') ?? '' }}" name="cate_title">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>关键词：</th>
                        <td>
                            <textarea class="lg" name="cate_keywords" placeholder="请填写分类关键词">{{ old('cate_keywords') ?? ''}}</textarea>
                            <p></p>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>描述：</th>
                        <td>
                            <textarea name="cate_desc" placeholder="请填写分类描述">{{ old('cate_desc') ?? '' }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>分类排序：</th>
                        <td>
                            <input type="text" class="sm" name="cate_order" value="{{ old('cate_order') ?? 0 }}">
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