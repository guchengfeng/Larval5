@extends('artBaseView')

@section('js')

    <script type="text/javascript" charset="utf-8" src="/laravel-u-editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/laravel-u-editor/ueditor.all.min.js"> </script>

    <script type="text/javascript">

        var category = '原创美文';
        var encryp = 'none';
        var arrayCategory=new Array("原创美文","经典文章","优美风景","伤感文章","美文随笔","感人文章","现代诗歌","古代诗词","武侠世界","奇幻文章","科幻世界","太空文明");


        $(document).ready(function(){

        });

        var ue = UE.getEditor('editor');

        function postData() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var name = document.getElementById('name').value;
            var cotent = document.getElementsByName('editor')[0].value;

            alert(category);

            $.post('artStore',{'_token':'{{csrf_token()}}','article_name':name,'article_content':cotent,'category':category,'encryp':encryp},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
            {
                if(data['status'] == 0) {

                        window.location = "http://localhost:8000/artShow";
                }
                else
                {
                    alert('文章添加失败!');
                }

            });

        }

        function getCategory(value) {
            var lastNum = value.charAt(value.length-1);
            category = arrayCategory[lastNum];
        }

        function isEncrypted(value) {

            alert('hjello');

            var encryInput = document.getElementById('pwd');
            var encryValue = encryInput.text;

            alert(encryValue);
            alert(value);

            if(value == 'isEncrypted') {
                encryp = encryValue;
                encryInput.hidden = false;
            }
            else
                encryp = 'none';
                encryInput.hidden = true;
        }

    </script>

@endsection

@section('title')

添加文章

@endsection

@section('main')

    <form role="form" action="{{url('artStore')}}" method="post">

        {{csrf_field()}}

        <div class="form-group" style="width: 1024px;">
            <label for="name">标题</label>
            <input type="text" class="form-control" id="name"
                   placeholder="请输入名称">
        </div>

        <div class="form-group">
            <p><label for="name">分类</label></p>
            <p>

                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios1" value="option1"  onclick="getCategory(this.value)" checked>原创美文
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios2"  value="option2" onclick="getCategory(this.value)"> 经典文章
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios3"  value="option3" onclick="getCategory(this.value)"> 优美风景
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="option4" onclick="getCategory(this.value)"> 伤感文章
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios5"  value="option5" onclick="getCategory(this.value)"> 美文随笔
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios6"  value="option6" onclick="getCategory(this.value)"> 感人文章
                </label>

            </p>

            <p>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios7" value="option7" onclick="getCategory(this.value)"> 现代诗歌
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios8"  value="option8" onclick="getCategory(this.value)"> 古代诗词
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios9"  value="option9" onclick="getCategory(this.value)"> 武侠世界
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios10" value="option10" onclick="getCategory(this.value)"> 奇幻文章
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios11"  value="option11" onclick="getCategory(this.value)"> 科幻世界
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline" id="optionsRadios12"  value="option12" onclick="getCategory(this.value)"> 太空文明
                </label>

            </p>


            <label for="name">加密</label>
            <p>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline1" id="optionsRadios8"  value="NoEncrypted" onclick="isEncrypted(this.value)"> 否
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="optionsRadiosinline1" id="optionsRadios7" value="isEncrypted" onclick="isEncrypted(this.value)"> 是
                </label>
                <input style="width: 100px;height: 25px;margin-left: 10px; display: inline;" type="password" class="form-control" id="pwd"
                       placeholder="请输入密码" hidden>
            </p>


        </div>

        <div class="form-group">

            <p>内容(百度编辑器，支持拖放/粘贴上传图片)</p>

            <textarea id="myEditor" style="width: 1024px;height: 500px;" name="editor" )></textarea>

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