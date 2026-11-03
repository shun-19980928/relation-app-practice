<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 投稿一覧
    public function index(Request $request)
    {
        $query = Post::with('tags')->withCount('comments');

        if ($request->has('tag')) {
            $tagName = $request->tag;

            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $posts = $query->latest()->get();

        return view('posts.index', compact('posts'));
    }
    // 投稿詳細
    public function show($id)
    {
        $post = Post::with(['comments', 'tags'])->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
