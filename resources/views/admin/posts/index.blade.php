@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست پست ها</h1>
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
    @if(session()->has('post_delete'))
        <div class="alert alert-danger">
            <div>{{ session('post_delete') }}</div>
        </div>
    @endif
    @if(session()->has('post_add'))
        <div class="alert alert-success">
            <div>{{ session('post_add') }}</div>
        </div>
    @endif
    @if(session()->has('post_update'))
        <div class="alert alert-success">
            <div>{{ session('post_update') }}</div>
        </div>
    @endif
<table class="table table-hover">
    <thead>
      <tr>
          <th></th>
        <th>عنوان</th>
        <th>کاربر</th>
        <th>توضیحات</th>
          <th>دسته بندی</th>
        <th>تاریخ ایجاد</th>
          <th>تاریخ بروزرسانی</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                @if($post->photo_id)
                    <td><img src="{{ $post->photo->path }}" width="80"></td>
                @else
                    <td><img src="{{ asset('images/person.png') }}" width="80"></td>
                @endif
                <td><a href="{{ route('posts.edit' , $post->id) }}">{{ $post->title}}</a></td>
                <td>{{ $post->user->name}}</td>
                <td>{{ Str::limit($post->description , 35)  }}</td>
                <td>{{ $post->category->title }}</td>
                @if($post->status == 0)
                    <td><span class="badge badge-danger">غیرفعال </span></td>
                @else
                    <td><span class="badge badge-success">فعال </span></td>
                @endif
                <td>{{ \Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
            </tr>
      @endforeach
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center">{{ $posts->links() }}</div>

@endsection
