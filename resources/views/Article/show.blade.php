@extends('artBaseView')

<style type="text/css">

    tr td{
        height: 50px;
        text-align: left;
        font-size: 15px;
        line-height: 50px;
        vertical-align: middle!important;
    }

    tr th{
        height: 50px;
        text-align: left;
        font-size: 15px;
        line-height: 50px;
        vertical-align: middle!important;
    }

    tr:hover {background-color: #a4b9cf;}

</style>


@section('title')

    <div>

        <h3>文章列表
           <a href="{{url('artAdd')}}">
               <button style="width: 150px;height: 30px;margin-right: 200px; float: right;font-size: 15px;background-color: #00a65a;color: white">
                   添加文章
               </button>
           </a>
        </h3>


    </div>

@endsection

@section('js')

    <script type="text/javascript" src="MyJS/mainJS.js"></script>

    <script type="text/javascript">



        //弹出一个询问框，有确定和取消按钮
        function firm(id) {
            //利用对话框返回的值 （true 或者 false）
            if (confirm("你确定删除吗？")) {
                var del = document.getElementById('delete');
                window.location = "http://localhost:8000/artDelete/"+id;
            }
            else {

            }

         }

         function toDetail(v) {
             var location = "http://localhost:8000/artDetail/"+v;
             window.location = location;
         }


    </script>



@endsection


@section('main')

<table class="table">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>分类</th>
            <th>发布时间</th>
            <th>阅读量</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
            <tr onclick="toDetail('{{$v->article_id}}')">
                <td>{{$v->article_id}}</td>
                <td>{{$v->article_name}}</td>
                <td>

                  @if($v->category)
                        {{$v->category}}
                    @else
                         暂无
                    @endif


                      </td>
                <td>{{date('Y-m-d',$v->article_time)}}</td>
                <td>{{$v->viewCount}}</td>
                <td>
                    <a href="{{url('artDetail/'.$v->article_id)}}">查看</a>
                    <a href="{{url('artEdit/'.$v->article_id)}}">编辑</a>
                    <a href="javascript:void(0);" id='delete' onclick="firm('{{$v->article_id}}')">删除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>

<?php echo $data->render(); ?>

    {{--<image height="300px" src="MyJS/zhangmeng1.jpg" width="300px"></image>--}}

@endsection






