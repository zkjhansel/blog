@extends('layout.admin')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 文章列表
    </div>


    <!--面包屑导航 结束-->
    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{ url('admin/article/create') }}"><i class="fa fa-plus"></i>新增文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>

                        <th class="tc" width="5%">ID</th>
                        <th>文章标题</th>
                        <th>作者</th>
                        <th>关键词</th>
                        <th>浏览量</th>
                        <th>审核状态</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $value)
                    <tr>

                        <td class="tc">{{ $value['art_id'] }}</td>
                        <td>
                            <a href="#">{{ $value['art_title'] }}</a>
                        </td>
                        <td>{{ $value['art_author'] }}</td>
                        <td>{{ $value['art_tags'] }}</td>
                        <td>{{ $value['art_view'] }}</td>
                        <td>{{ $value['art_status'] }}</td>
                        <td>{{ date('Y-m-d H:i:s',$value['art_time']) }}</td>
                        <td>
                            <a href="{{ url('admin/article/'.$value['art_id'].'/edit') }}">修改</a>
                            <a href="javascript:;" data-id="{{ $value['art_id'] }}" class="del">删除</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<div class="page_list" style="float:right;padding-right: 50px;">
    {{ $data->links() }}
</div>


<script>
    $(function () {

        $('.del').click(function () {

            var cate_id = $(this).attr('data-id');
            var csrf_token = '{{ csrf_token() }}';
            var url = "{{ url('admin/category/')  }}"+'/'+cate_id;

            layer.confirm('确定删除改分类么？', {
                btn: ['确定','取消']
            }, function(){
                $.ajax({
                    type : 'POST',
                    url : url,
                    data : {
                        '_method' : 'DELETE',
                    },
                    dataType : 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    },
                    success : function (data) {
                        if (data.status == 1) {
                            //修改成功
                            layer.alert(data.msg, {icon: 6});
                            setTimeout(function () {
                                window.location.reload();
                            },1500);
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
                //layer.msg('的确很重要', {icon: 1});
            }, function(){

            });


        });
    });

    //文章新增成功的弹窗
    var tip = "{{ session('successTip') }}";
    if (tip) {
        layer.alert(tip, {icon: 6});
    }

</script>
@endsection('content')