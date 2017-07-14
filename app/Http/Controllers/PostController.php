<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Psy\Output\ProcOutputPager;

class PostController extends Controller
{
    //
    //文章列表
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
//        return view("post/index", ['posts' => $posts]);
        return view("post/index", compact('posts'));
    }

    public function show(Post $post)
    {
        return view("post/show", compact('post'));
    }

    //创建文章
    public function create()
    {
        return view("post/create");

    }

    //创建逻辑
    public function store()
    {
        //#####========= OK
//        $post = new Post();
//        $post->title = request('title');
//        $post->content = request('content');
//        $post->save();

//        $params = ['title' => request('title'), 'content' => request('content')];
//        $params = request(['title', 'content']);

        ##表单提交， 先数据验证 http://d.laravel-china.org/docs/5.4/validation
        $this->validate(request(), [
            'title' => 'required|string|min:2|max:100',
            'content' => 'required|string|min:10'
        ]);
        //解析HTML标签


        Post::create(request(['title', 'content'])); //Post内必须定义： protected $fillable=['title','content'];//可以使用数组注入字段
        return redirect("/posts");//前端的URI:/posts(和view('/post/edit不是一个概念')) ;也可以返回html

//        dd(requet());//dump and die;
//        dd($params);//dump and die;
    }

    //文章编辑
    public function edit(Post $post)
    {
        return view('/post/edit', compact('post'));
    }

    //编辑逻辑
    public function update(Post $post)
    {
        ##TODO 权限验证
        ## 验证
        ##表单提交， 先数据验证 http://d.laravel-china.org/docs/5.4/validation
        $this->validate(request(), [
            'title' => 'required|string|min:2|max:100',
            'content' => 'required|string|min:10'
        ]);

        ##逻辑
//        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        ##渲染
        return redirect("/posts/{$post->id}");
    }

    //删除文章
    public function delete(Post $post)
    {
        ##todo 权限验证
        $post->delete();
        return redirect('/posts');
    }


    public function imageUpload(Request $request)
    {

        //todo 系统文件配置 改成 选择 public驱动
        //D:\Projects\mylaravel54\config\filesystems.php
        // 'default' => env('FILESYSTEM_DRIVER', 'public'),
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));

        return asset('storage/' . $path);

    }

}
