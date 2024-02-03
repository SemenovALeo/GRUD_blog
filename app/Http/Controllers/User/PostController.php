<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class PostController extends Controller
{
    public function index()
    {
       $posts = Post::query()->paginate(12);

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

    public function store(Request $request)
    {
        $validated = validate($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'published_at' => ['nullable', 'string', 'date'],
            'published' => ['nullable', 'boolean'],
        ]);

        $post = Post::query()->firstOrCreate([
            'user_id' => User::query()->value('id'),
            'title' => $validated['title'],],
            ['content' => $validated['content'],
            'published_at' => new Carbon($validated['published_at']) ?? null,
            'published' => $validated['published'] ?? null,
        ]);

        return 'Страница создания поста';
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

    public function update(Request $request, $post)
    {
        $validated = validate($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
        ]);

        return redirect()->back();
    }
}
