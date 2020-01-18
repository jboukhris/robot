<?php $__env->startSection('title', 'Home page'); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo e(url('images',$robot->link)); ?>" alt="...">
                        <div class="caption">
                            <h3><?php echo e($robot->name); ?></h3>
                            <p><?php echo e($robot->category->title); ?></p>
                            <p><a href="<?php echo e(url('robot', $robot->id)); ?>" class="btn btn-primary" role="button">Button</a></p>
                            <?php echo $__env->make('partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
                    
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>