<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post $post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }
    
    /**
     * Post詳細を表示する
     *
     * @param Object Post
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}
