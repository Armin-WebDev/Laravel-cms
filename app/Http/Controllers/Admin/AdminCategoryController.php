<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(2);

        return view('admin.categories.index' , ['categories'=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = new Category();

        $category->title = $request->input('title');
        if ($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');

        $category->save();


        return redirect('categories/')->with('category_add' , 'دسته بندی جدید اضافه شد');

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
        $category = Category::findOrFail($id);

        return view('admin.categories.edit' , ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->title = $request->input('title');
        if ($request->input('slug')){
            $category->slug = make_slug($request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');

        $category->save();

        session()->flash('category_update' , 'دسته بندی بروز رسانی شد');

        return redirect('categories/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('category_delete' , 'دسته بندی حدف شد');

        return redirect('categories/');

    }
}
