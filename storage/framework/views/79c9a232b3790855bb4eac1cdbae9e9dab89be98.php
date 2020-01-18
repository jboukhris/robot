<div class="collection">


    <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    
        <a href="<?php echo e(url('robot/user', $users->id)); ?>" class="collection-item"><?php echo e($users->name); ?> <small>number robots <?php echo e($users->robots? $users->robots->count() : 0); ?></small></a>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

  </div>
            