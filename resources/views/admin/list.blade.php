@extends('layout.admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--面包屑导航 结束-->
    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{ url('admin/category/create') }}"><i class="fa fa-plus"></i>新增文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>

                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th>浏览量</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $value)
                    <tr>

                        <td class="tc">
                            <input type="text" class="setOrder" data-id="{{ $value['cate_id'] }}" maxlength="5" value="{{ $value['cate_order'] }}">
                        </td>
                        <td class="tc">{{ $value['cate_id'] }}</td>
                        <td>
                            <a href="#">{{ $value['cate_name'] }}</a>
                        </td>
                        <td>{{ $value['cate_title'] }}</td>
                        <td>{{ $value['cate_scan'] }}</td>
                        <td>{{ date('Y-m-d H:i:s',$value['update_time']) }}</td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#">删除</a>
                        </td>
                    </tr>
                    @endforeach



                </table>


                <div class="page_nav">
                <div>
                <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
                <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                <span class="current">8</span>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
                <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
                <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
                <span class="rows">11 条记录</span>
                </div>
                </div>



            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script>
    $(function () {

        $('.setOrder').change(function () {

            var cate_id = parseInt($(this).attr('data-id'));
            var cate_order = parseInt($(this).val());

            if (isNaN(cate_id) || isNaN(cate_order)) {
                layer.alert('排序请填写数字', {icon: 5});
                return false;
            }
            if ( cate_id < 0 || cate_order < 0 ) {
                layer.alert('排序数字必须大于0', {icon: 5});
                return false;
            }

            var csrf_token = '{{ csrf_token() }}';
            var url = "{{ url('admin/category/changeOrder')  }}";

            $.ajax({
                type : 'POST',
                url : url,
                data : {
                    'cate_id' : cate_id,
                    'cate_order' : cate_order
                },
                dataType : 'JSON',
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                },
                success : function (data) {
                    if (data.status == 1) {
                        //修改成功
                        layer.alert(data.msg, {icon: 6});
                        return false;
                    } else {
                        //修改失败
                        layer.alert(data.msg, {icon: 5});
                        return false;
                    }
                },
                error : function () {
                    layer.alert('排序更新失败', {icon: 5});
                    return false;
                }

            })

        })

    });

    //文章新增成功的弹窗
    var tip = "{{ session('successTip') }}";
    if (tip) {
        layer.alert(tip, {icon: 6});
    }

</script>
@endsection('content')