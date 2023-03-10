<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentForm;
use App\Models\Post;

class PostController extends Controller
{
    public function home() {

        $posts = Post::orderBy("created_at", "DESC")->paginate(3);

        return view('posts.index', [
            "posts" => $posts,
        ]);

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $comment = $post->comments()->create($request->validated());

        event(new CommentCreated($comment));

        return redirect(route("posts.show", $id));
    }
}
