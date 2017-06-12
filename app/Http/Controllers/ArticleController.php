<?php

namespace App\Http\Controllers;

use App\Artical;
use Illuminate\Support\Facades\Input;
use Request;


class ArticleController extends Controller
{
    public function add()
    {
        return view('Article.add');
    }

    public function store()
    {
        $input = Request::all();
        $input['article_time'] =time();
        $input['article_type'] =0;

        $re = Artical::create($input);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章添加成功！',
            ];
        }
        else{
            $data = [
                'status' => 1,
                'msg' => '文章添加失败，请稍后重试！',
            ];
        }

        return $data;
    }

    public function show()
    {
        $data = Artical::orderBy('article_id','asc')->paginate(10);
        return view('Article.show')->with('data',$data);
    }

    public function detail($id)
    {
        $field = Artical::find($id);
        return view('Article.detail')->with('data',$field);
    }

    public function delete($id)
    {
        $re = Artical::where('article_id',$id)->delete();
        $data = Artical::orderBy('article_id','asc')->paginate(100);
        return view('Article.show')->with('data',$data);
    }

    public function edit($id)
    {
        $article = Artical::findOrFail($id);
        return view('Article.edit')->with('article',$article);
    }

    public function update($id)
    {
        $input = Request::all();
        $input['article_time'] =time();
        $input['article_type'] =0;
        $article = Artical::find($id);
        $re = $article->update($input);

        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章修改成功！',
            ];
        }
        else{
            $data = [
                'status' => 1,
                'msg' => '文章修改失败，请稍后重试！',
            ];
        }

        return $data;
    }

    public function art($id)
    {
        $dir = 'artShow';
        if($id == 1)
        {
            $id = 'artShow';
        }
        else if($dir == 2)
        {
            $id = 'artAdd';
        }
        if($id == 3)
        {
            $id = 'artDelete';
        }
        if($dir == 1)
        {
            $id = 'artDetail';
        }
        else
        {
            $id = 'artShow';
        }

        return view('Article.artical')->with('data',$dir);
    }

    public function viewCount()
    {
        $input = Request::all();
        $article = Artical::find($input['article_id']);
        $count = $article->viewCount;
        $count = $count+1;

        $input['article_id'] =$article['article_id'];
        $input['article_name'] =$article['article_name'];
        $input['article_content'] =$article['article_content'];
        $input['viewCount'] =$count;
        $input['article_time'] =time();
        $input['article_type'] =0;


        $re  = $article->update($input);

        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章统计成功！',
            ];
        }
        else{
            $data = [
                'status' => 1,
                'msg' => '文章统计失败，请稍后重试！',
            ];
        }

        return $data;
    }

    public function comment($id)
    {
        $input = Request::all();
        $input['article_time'] =time();
        $input['article_type'] =0;
        $article = Artical::find($id);
        $re = $article->update($input);

        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章修改成功！',
            ];
        }
        else{
            $data = [
                'status' => 1,
                'msg' => '文章修改失败，请稍后重试！',
            ];
        }

        return $data;
    }


}
