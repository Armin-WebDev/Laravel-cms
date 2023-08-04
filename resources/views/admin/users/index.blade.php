@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست کاربران</h1>
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
    @if(session()->has('user_delete'))
    <div class="alert alert-danger">
        <div>{{ session('user_delete') }}</div>
    </div>
    @endif
    @if(session()->has('user_add'))
        <div class="alert alert-success">
            <div>{{ session('user_add') }}</div>
        </div>
    @endif
    @if(session()->has('user_update'))
        <div class="alert alert-success">
            <div>{{ session('user_add') }}</div>
        </div>
    @endif

<table class="table table-hover">
    <thead>
      <tr>
          <th></th>
        <th>نام</th>
        <th>ایمیل</th>
        <th>نقش کاربر</th>
          <th>وضعیت کاربر</th>
        <th>تاریخ عضویت</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
          @if($user->photo_id != null)
              <td><img src="{{ $user->photo->path }}" width="80"></td>
          @else
              <td><img src="{{ asset('images/person.png') }}" width="80"></td>
          @endif
        <td><a href="{{ route('users.edit' , $user->id) }}">{{ $user->name}}</a></td>
        <td>{{ $user->email}}</td>
          <td>
              <ul>
                  @foreach($user->roles as $role)
                      <li>{{ $role->name}}</li>
                  @endforeach
              </ul>
          </td>
          @if($user->status == 0)
          <td><span class="badge badge-danger">غیرفعال </span></td>
          @else
              <td><span class="badge badge-success">فعال </span></td>
          @endif
        <td>{{ \Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
