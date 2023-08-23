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

    public function actions(Request $request , $id)
    {
        if ($request->has('action')){
            if ($request->input('action') == 'approved'){
                $comment = Comment::findOrFail($id);
                $comment->status = 1;
                $comment->save();
                session()->flash('comment_approved' , 'نظر کاربر با موفقیت تایید شد');
            }else{
                $comment = Comment::findOrFail($id);
                $comment->status = 0;
                $comment->save();
                session()->flash('comment_rejected' , 'نظر کاربر رد شد');
            }
        }
        return redirect('comments/');
    }
}
