<nav>
    <div class="collection">
        <a class="collection-item" href="">Engineers Robots</a>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <a class="collection-item" href="<?php echo e(url('robot/user', $user->id)); ?>"><?php echo e($user->name); ?>, <small>number robots <?php echo e($user->robots? $user->robots->count() : 0); ?></small></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
</nav>