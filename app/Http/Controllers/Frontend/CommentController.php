<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request , $postId)
    {
        $post = Post::findOrFail($postId);

        if ($post)
        {
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->status = 0;
            $comment->post_id = $postId;

            $comment->save();
        }
        session()->flash('add_comment', 'نظر شما در انتظار تایید مدیران قرار گرفت');
        return back();
    }
}
