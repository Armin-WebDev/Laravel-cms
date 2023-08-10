@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست نظرات</h1>
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
    @if(session()->has('comment_delete'))
        <div class="alert alert-danger">
            <div>{{ session('comment_delete') }}</div>
        </div>
    @endif
    @if(session()->has('comment_update'))
        <div class="alert alert-success">
            <div>{{ session('comment_update') }}</div>
        </div>
    @endif
<table class="table table-hover">
    <thead>
      <tr>
          <th>شناسه</th>
          <th>توضیحات</th>
          <th>مطلب مرتبط</th>
          <th>وضعیت</th>
          <th>تاریخ ایجاد</th>

      </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
            <tr>

                <td>{{ $comment->id }}</td>

                <td><a href="{{ route('comments.edit' , $comment->id) }}">{{ $comment->description}}</a></td>
                <td>{{ $comment->post->title}}</td>
                <td>{{ $comment->status}}</td>

                <td>{{ \Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
            </tr>
      @endforeach
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center">{{ $comments->links() }}</div>

@endsection
