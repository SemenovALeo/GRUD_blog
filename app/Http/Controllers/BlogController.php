<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->latest('published_at')->paginate(12,['id','title','published_at']);

        $categories = [null=>__('Все категории'),
            1 => __('Первая категория'), 2 => __('Вторая категория')];


        return view('blog.index',compact('posts','categories'));
    }

    public function show(Post $post)
    {
        return view('blog.show',compact('post'));
    }
}
