@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست فایل ها</h1>
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
    @if(session()->has('photo_delete'))
        <div class="alert alert-danger">
            <div>{{ session('photo_delete') }}</div>
        </div>
    @endif
    @if(session()->has('photo_add'))
        <div class="alert alert-success">
            <div>{{ session('photo_add') }}</div>
        </div>
    @endif

<table class="table table-hover">
    <thead>
      <tr>
          <th>شناسه</th>
          <th>کاربر</th>
          <th>تصویر</th>
          <th>تاریخ ایجاد</th>
          <th>عملیات</th>

      </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
            <tr>

                <td>{{ $photo->id }}</td>
                <td>{{ $photo->user->name }}</td>

                <td><img src="{{ $photo->path}}" alt="" width="80"></td>

                <td>{{ \Hekmatinasser\Verta\Verta::instance($photo->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE' , 'action' => ['\App\Http\Controllers\Admin\AdminPhotoController@destroy' , $photo->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('حذف' , ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
      @endforeach
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center">{{ $photos->links() }}</div>
@endsection
