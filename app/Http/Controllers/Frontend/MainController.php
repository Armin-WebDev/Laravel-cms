<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::with('photo' , 'user', 'category')
            ->orderBy('created_at' , 'desc')
            ->paginate(5);
        return view('frontend.main.index' , compact(['posts']));
    }
}
