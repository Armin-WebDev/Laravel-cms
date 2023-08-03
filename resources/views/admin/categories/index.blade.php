@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">لیست دسته بندی ها</h1>
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
    @if(session()->has('category_delete'))
        <div class="alert alert-danger">
            <div>{{ session('category_delete') }}</div>
        </div>
    @endif
    @if(session()->has('category_add'))
        <div class="alert alert-success">
            <div>{{ session('category_add') }}</div>
        </div>
    @endif
    @if(session()->has('category_update'))
        <div class="alert alert-success">
            <div>{{ session('category_update') }}</div>
        </div>
    @endif
<table class="table table-hover">
    <thead>
      <tr>
          <th>شناسه</th>
        <th>عنوان</th>

      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>

                <td>{{ $category->id }}</td>

                <td><a href="{{ route('categories.edit' , $category->id) }}">{{ $category->title}}</a></td>

                <td>{{ \Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
            </tr>
      @endforeach
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center">{{ $categories->links() }}</div>

@endsection
