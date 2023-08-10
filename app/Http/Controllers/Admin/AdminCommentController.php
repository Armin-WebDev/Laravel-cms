<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')
            ->orderBy('created_at' , 'desc')
            ->paginate(10);

        return view('admin.comments.index' , compact(['comments']));
    }
}
