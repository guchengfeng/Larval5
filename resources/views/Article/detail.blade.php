@extends('artBaseView')


<!-- JS -->
@section('js')

    <script src="/MyJS/christmassnow.js" type="text/javascript"></script>
    <script src="/MyJS/mainJS.js" type="text/javascript"></script>

    <script type="text/javascript">

        snow1();

    function postData() {

        var id="<?php echo $data['article_id'];?>";


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.post('{{url('artViewCount')}}',{'_token':'{{csrf_token()}}','article_id':id},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            if(data['status'] == 0) {

              //  alert('文章统计成功!'+id);

            }
            else
            {
              //  alert('文章统计失败!');
            }

        });

    }

    postData();

    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            }
        }
    };

    function  test() {
        alert('test');
    }

</script>

    <script>
        $(document).ready(function() {

            alert('ready');

            $('body').christmassnow({
                snowflaketype: 23, // 1 to 25 types of flakes are available change the number from 1 to 25. each one contain different images.
                snowflakesize: 2, //snowflakesize is 1 then it get the size of the image as random , if the snowflakesize is 2 means size of the image as custom
                snowflakedirection: 1, // 1 means default no wind (top to bottom), 2 means random, 3 means left to right and 4 means  right to left
                snownumberofflakes: 4, // number of flakes is user option
                snowflakespeed:5, //
                flakeheightandwidth: 30 //
            });
        });
    </script>


@endsection


<!-- Main content -->
@section('main')

    <div class="drop"></div>


    <h3 style="text-align: center">{{$data->article_name}}</h3>

    <div style="margin-left: 100px;margin-right: 100px;height: 50px;text-align: center;color: #00a65a">


        <p>作者:古成风 发布时间:{{date('Y-m-d',$data->article_time)}}</p>

        <p>阅读数量:{{$data->viewCount}}     评论数量:0</p>

    </div>

    <br>

    <div>

        <?php echo $data['article_content']?>

    </div>

    <div>

        <h3>发表评论</h3>

        <iframe style="margin-left: 0%;width: 90%;" src="/comment/index.html" frameborder="0" scrolling="no"
                id="external-frame" onload="setIframeHeight(this)">

        </iframe>

    </div>




@endsection