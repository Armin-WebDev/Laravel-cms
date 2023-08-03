@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ثبت دسته بندی</h1>
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
        {!! Form::open(['method' => 'POST' , 'action' => ['\App\Http\Controllers\Admin\AdminCategoryController@store']]) !!}
        <div class="form-group">
            <label class="control-label" for="status">عنوان</label>
            {!! Form::text('title' , null , ['class'=>'form-control']) !!}
            @error('title') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">نام مستعار</label>
            {!! Form::text('slug' , null , ['class'=>'form-control']) !!}
            @error('slug') <span class="text-danger"> {{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="status">متا توضیحات</label>
            {!! Form::text('meta_description' , null , ['class'=>'form-control']) !!}
            @error('description') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">متا برچسب ها</label>
            {!! Form::text('meta_keywords' , null , ['class'=>'form-control']) !!}
            @error('description') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت' , ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>


@endsection
