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

        {!! Form::open(['method' => 'POST' , 'action' => '\App\Http\Controllers\Admin\AdminUserController@store' , 'files'=>true]) !!}
        <div class="form-group">
            <label class="control-label" for="status">نام و نام خانوادگی</label>
            {!! Form::text('name' , null , ['class'=>'form-control']) !!}
            @error('name') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">ایمیل</label>
            {!! Form::text('email' , null , ['class'=>'form-control']) !!}
            @error('email') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">نقش</label>
            {!! Form::select('roles[]', $roles , null, ['multiple'=>'multiple' , 'class'=>'form-control']) !!}
            @error('role') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">وضعیت</label>
            {!! Form::select('status', [0=>'غیرفعال' , 1=>'فعال'] , 0 , ['class'=>'form-control']) !!}
            @error('status') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">تصویر پروفایل</label>
            {!! Form::file('avatar',null , ['class'=>'form-control']) !!}
            @error('status') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="status">رمز عبور</label>
            {!! Form::password('password' , ['class'=>'form-control']) !!}
            @error('password') <span class="text-danger"> {{$message}}</span> @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ذخیره' , ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>


@endsection
