<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
       $validated = $request->validate([
           'search' => ['nullable','string','max:50']
       ]);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        $posts = $query->latest('published_at')
            ->paginate(12);




//        $posts = Post::query()->when($validated['search'] ?? null,
//                function (Builder $query, string $search){
//                    $query->where('title','like', "%{$search}%");
//                })->latest('published_at')->paginate(12,['id','title','published_at']);



        return view('blog.index',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show',compact('post'));
    }
}
