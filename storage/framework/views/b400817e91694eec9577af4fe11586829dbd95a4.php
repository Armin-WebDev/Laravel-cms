<?php $__env->startSection('content_header'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->has('user_delete')): ?>
    <div class="alert alert-danger">
        <div><?php echo e(session('user_delete')); ?></div>
    </div>
    <?php endif; ?>
    <?php if(session()->has('user_add')): ?>
        <div class="alert alert-success">
            <div><?php echo e(session('user_add')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session()->has('user_update')): ?>
        <div class="alert alert-success">
            <div><?php echo e(session('user_add')); ?></div>
        </div>
    <?php endif; ?>

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
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
          <?php if($user->photo_id != null): ?>
              <td><img src="<?php echo e($user->photo->path); ?>" width="80"></td>
          <?php else: ?>
              <td><img src="<?php echo e(asset('images/person.png')); ?>" width="80"></td>
          <?php endif; ?>
        <td><a href="<?php echo e(route('users.edit' , $user->id)); ?>"><?php echo e($user->name); ?></a></td>
        <td><?php echo e($user->email); ?></td>
          <td>
              <ul>
                  <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($role->name); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </td>
          <?php if($user->status == 0): ?>
          <td><span class="badge badge-danger">غیرفعال </span></td>
          <?php else: ?>
              <td><span class="badge badge-success">فعال </span></td>
          <?php endif; ?>
        <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-course\cms\cms\resources\views/admin/users/index.blade.php ENDPATH**/ ?>