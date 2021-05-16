<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
    
}
