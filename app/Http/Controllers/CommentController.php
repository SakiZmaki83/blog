<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);

        $this->validate(request(),
        [
            'text'=>'required|min:15'
        ]);

        $post->comments()->create(request()->all());

        return redirect()->back();
    }
}
