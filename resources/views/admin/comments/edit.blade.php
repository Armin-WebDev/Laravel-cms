@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ثبت کاربر</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    <li class="breadcrumb-item active">داشبورد ورژن 2</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="col-md-6 offset-md-3">
        {!! Form::model($category ,['method' => 'PATCH' , 'action' => ['\App\Http\Controllers\Admin\AdminCategoryController@update', $category->id]]) !!}
        <div class="form-group">
            <label class="control-label" for="status">عنوان</label>
            {!! Form::text('title' , $category->title , ['class'=>'form-control']) !!}
            @error('title') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">نام مستعار</label>
            {!! Form::text('slug' , $category->slug , ['class'=>'form-control']) !!}
            @error('slug') <span class="text-danger"> {{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="status">متا توضیحات</label>
            {!! Form::text('meta_description' , $category->meta_description , ['class'=>'form-control']) !!}
            @error('description') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">متا برچسب ها</label>
            {!! Form::text('meta_keywords' , $category->meta_keywords , ['class'=>'form-control']) !!}
            @error('description') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('بروزرسانی' , ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
        {!! Form::open(['method' => 'DELETE' , 'action' => ['\App\Http\Controllers\Admin\AdminCategoryController@destroy' , $category->id]]) !!}
        <div class="form-group">
            {!! Form::submit('حذف' , ['class'=>'btn btn-danger col-md-3']) !!}
        </div>
        {!! Form::close() !!}
    </div>


@endsection
