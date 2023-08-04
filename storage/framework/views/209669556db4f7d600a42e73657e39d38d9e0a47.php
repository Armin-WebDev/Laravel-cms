<?php $__env->startSection('content_header'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->has('photo_delete')): ?>
        <div class="alert alert-danger">
            <div><?php echo e(session('photo_delete')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session()->has('photo_add')): ?>
        <div class="alert alert-success">
            <div><?php echo e(session('photo_add')); ?></div>
        </div>
    <?php endif; ?>

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
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($photo->id); ?></td>
                <td><?php echo e($photo->user->name); ?></td>

                <td><img src="<?php echo e($photo->path); ?>" alt="" width="80"></td>

                <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($photo->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))); ?></td>
                <td>
                    <?php echo Form::open(['method' => 'DELETE' , 'action' => ['\App\Http\Controllers\Admin\AdminPhotoController@destroy' , $photo->id]]); ?>

                    <div class="form-group">
                        <?php echo Form::submit('حذف' , ['class'=>'btn btn-danger']); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center"><?php echo e($photos->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-course\cms\cms\resources\views/admin/photos/index.blade.php ENDPATH**/ ?>