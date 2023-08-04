<?php $__env->startSection('content_header'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->has('post_delete')): ?>
        <div class="alert alert-danger">
            <div><?php echo e(session('post_delete')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session()->has('post_add')): ?>
        <div class="alert alert-success">
            <div><?php echo e(session('post_add')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session()->has('post_update')): ?>
        <div class="alert alert-success">
            <div><?php echo e(session('post_update')); ?></div>
        </div>
    <?php endif; ?>
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
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php if($post->photo_id): ?>
                    <td><img src="<?php echo e($post->photo->path); ?>" width="80"></td>
                <?php else: ?>
                    <td><img src="<?php echo e(asset('images/person.png')); ?>" width="80"></td>
                <?php endif; ?>
                <td><a href="<?php echo e(route('posts.edit' , $post->id)); ?>"><?php echo e($post->title); ?></a></td>
                <td><?php echo e($post->user->name); ?></td>
                <td><?php echo e(Str::limit($post->description , 35)); ?></td>
                <td><?php echo e($post->category->title); ?></td>
                <?php if($post->status == 0): ?>
                    <td><span class="badge badge-danger">غیرفعال </span></td>
                <?php else: ?>
                    <td><span class="badge badge-success">فعال </span></td>
                <?php endif; ?>
                <td><?php echo e(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))); ?></td>
            </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
    <div class="col-md-12" style="text-align: center"><?php echo e($posts->links()); ?></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-course\cms\cms\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>