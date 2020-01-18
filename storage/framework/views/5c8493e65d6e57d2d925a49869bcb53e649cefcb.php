<?php $__env->startSection('title'); ?>



<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('robot.index')); ?>">liste robot </a>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>