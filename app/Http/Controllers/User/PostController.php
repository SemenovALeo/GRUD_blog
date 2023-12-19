<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, quidem.',
        ];
        $posts = array_fill(0,10,$post);

        return view('user.posts.index', compact('posts'));
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, quidem.',
        ];

        return view('user.posts.show', compact('post'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function edit($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, quidem.',
        ];
        return view('user.posts.edit', compact('post'));
    }
}
