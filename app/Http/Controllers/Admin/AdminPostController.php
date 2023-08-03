<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo' , 'user' , 'category')->paginate(2);

        return view('admin.posts.index' , ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title' , 'id');
        return view('admin.posts.create' , ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images' , $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id =$photo->id;

        }

        $post->title = $request->input('title');
        if ($request->input('slug')){
            $post->slug = make_slug($request->input('slug'));
        }else{
            $post->slug = make_slug($post->title);
        }
        $post->description = $request->input('description');
        $post->category_id = $request->input('categories');
        $post->status = $request->input('status');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->user_id = Auth::id();
        $post->save();
        session()->flash('post_add' , 'پست جدید با موفقیت ساخته شد');

        return redirect('posts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('title' , 'id');
        return view('admin.posts.edit' , ['post'=>$post , 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images' , $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $post->photo_id =$photo->id;

        }

        $post->title = $request->input('title');
        if ($request->input('slug')){
            $post->slug = make_slug($request->input('slug'));
        }else{
            $post->slug = make_slug($post->title);
        }
        $post->description = $request->input('description');
        $post->category_id = $request->input('categories');
        $post->status = $request->input('status');
        $post->meta_description = $request->input('meta_description');
        $post->meta_keywords = $request->input('meta_keywords');
        session()->flash('post_update' , 'پست با موفقیت ویرایش شد');
        $post->save();

        return redirect('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $photo = Photo::findOrFail($post->photo_id);
        unlink(public_path() . $post->photo->path);
        $photo->delete();
        $post->delete();
        session()->flash('post_delete' , 'پست با موفقیت حذف شد');

        return redirect('posts/');
    }
}
