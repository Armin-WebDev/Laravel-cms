<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {

        $post = Post::with('user' , 'category' , 'photo')
            ->where('slug' , $slug)
            ->where('status' , 1)
            ->first();
        $categories = Category::all();
        $recent_posts = Post::with('photo' , 'user')
            ->orderBy('created_at' , 'desc')
            ->limit(3)
            ->get();
        $photo = Photo::where('id' , $post->user->photo_id)->first();
        return view('frontend.main.show' , compact(['post' , 'categories' , 'recent_posts' , 'photo']));
    }
}
