@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ویرایش کاربر</h1>
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
    <div class="row">
{{--        <div class="col-md-3">--}}
{{--            <img src="{{ $user->photo ? $user->photo->path : asset('images/person.png')}}" width="150">--}}
{{--        </div>--}}

        <div class="col-md-10 offset-md-3">
            <img src="{{ $user->photo ? $user->photo->path : asset('images/person.png')}}" width="150" class="m-5">

            {!! Form::model([$user , 'method' => 'PATCH' , 'action' => ['\App\Http\Controllers\Admin\AdminUserController@update' , $user->id] , 'files'=>true]) !!}
            <div class="form-group">
                <label class="control-label" for="status">نام و نام خانوادگی</label>
                {!! Form::text('name' , $user->name , ['class'=>'form-control']) !!}
                @error('name') <span class="text-danger"> {{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="status">ایمیل</label>
                {!! Form::text('email' , $user->email , ['class'=>'form-control']) !!}
                @error('email') <span class="text-danger"> {{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="status">نقش</label>
                {!! Form::select('roles[]', $roles , $user->roles , ['multiple'=>'multiple' , 'class'=>'form-control']) !!}
                @error('roles') <span class="text-danger"> {{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="status">وضعیت</label>
                {!! Form::select('status', [0=>'غیرفعال' , 1=>'فعال'] , $user->status , ['class'=>'form-control']) !!}
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
                {!! Form::submit('بروزرسانی' , ['class'=>'btn btn-success col-md-3']) !!}
            </div>

            {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE' , 'action' => ['\App\Http\Controllers\Admin\AdminUserController@destroy' , $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف' , ['class'=>'btn btn-danger col-md-3']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>



@endsection

