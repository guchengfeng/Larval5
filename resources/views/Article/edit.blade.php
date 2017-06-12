@extends('artBaseView')

@section('js')

    <script type="text/javascript" charset="utf-8" src="/laravel-u-editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/laravel-u-editor/ueditor.all.min.js"> </script>
    <script src="/MyJS/Article.js" type="text/javascript"></script>

    <script type="text/javascript">

        var ue = UE.getEditor('editor');

        function postData() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var name = document.getElementById('name').value;
            var cotent1 = document.getElementsByName('editor')[0].value;


            $.post('{{url('artUpdate/'.$article->article_id)}}',{'_token':'{{csrf_token()}}','article_name':name,'article_content':cotent1},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
            {
                alert(data['msg']);

                if(data['status'] == 0) {

                    window.location = "http://localhost:8000/artShow";

                }

            });

        }

    </script>

@endsection

@section('title')

    添加文章

@endsection

@section('main')

    <form role="form" action="{{url('artUpdate/'.$article->article_id)}}" method="post">

        {{csrf_field()}}

        <div class="form-group" style="width: 1024px;">
            <label for="name">标题</label>
            <input type="text" class="form-control" id="name"
                   placeholder="请输入名称" value="{{$article->article_name}}}">
        </div>

        <div class="form-group">

            <textarea id="myEditor" style="width: 1024px;height: 500px;" name="editor")>{{$article->article_content}}</textarea>

            <script type="text/javascript">
                var editor = new baidu.editor.ui.Editor();
                editor.render("myEditor");
            </script>


        </div>

        <div class="form-group">

            <button type="button" onclick="postData()" >发表文章</button>

        </div>

    </form>

@endsection









