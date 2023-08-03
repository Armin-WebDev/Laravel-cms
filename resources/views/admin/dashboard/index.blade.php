@extends('admin.layouts.master')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">داشبورد</h1>
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
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $postsCount }}</h3>

                    <p>پست ها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $photosCount }}<sup style="font-size: 20px"></sup></h3>

                    <p>فایل ها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>

                    <p>کاربران ثبت شده</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $categoriesCount }}</h3>

                    <p>دسته بندی ها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <h6> اخرین پست ها</h6>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>دسته بندی</th>
                    <th>تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><a href="{{ route('posts.edit' , $post->id) }}">{{ $post->title}}</a></td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ \Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>تاریخ عضویت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>

                        <td><a href="{{ route('users.edit' , $user->id) }}">{{ $user->name}}</a></td>
                        <td>{{ $user->email}}</td>

                        <td>{{ \Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
