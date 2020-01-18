<div class="row">
<nav>
    <div class="container">
    <div class="nav-wrapper">

        <a href="<?php echo e(route('home')); ?>" class="brand-logo">ROBOT</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                
                <li><a href="<?php echo e(url('category', [$category->id,$category->slug])); ?>"><?php echo e($category->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <li><a href="<?php echo e(url('login')); ?>">sign in </a></li>

        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <li><a href="<?php echo e(url('category', $category->id )); ?>"><?php echo e($category->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <li><a href="<?php echo e(url('login')); ?>">sign in </a></li>
        </ul>
    </div>
    </div>
</nav>
</div>