<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($fromDate = $validated['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($toDate));
        }

        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }


        $posts = $query->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact('posts'));
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, quidem.',
        ];

        return view('blog.show',compact('post'));
    }
}
