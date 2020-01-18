<?php $__env->startSection('title', 'Home page'); ?>


<?php $__env->startSection('sidebar'); ?>
   
                    <ul>
                    <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        
                        <li><?php echo e(robot->name); ?></li>
                  
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
            

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>