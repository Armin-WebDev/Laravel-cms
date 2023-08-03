<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::with('user' , 'category' , 'photo')->where('id' , $id)->first();

        return view('frontend.main.single' , compact(['post']));
    }
}
