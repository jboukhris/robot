<?php $__env->startSection('title', 'Home page'); ?>



<?php $__env->startSection('content'); ?>

    <div class="row">
        <form class="col s12" method="POST" action="<?php echo e(url('login')); ?>" >
          <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="email" class="validate">
                    <?php if($errors->has('email')): ?> <span><?php echo e($errors->first('email')); ?></span><?php endif; ?>
                    <label for="email">Email</label>
                </div>
        
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" type="password" class="validate">
                    <?php if($errors->has('password')): ?> <span><?php echo e($errors->first('password')); ?></span><?php endif; ?>
                    <label for="password">Password</label>
                </div>
            </div>
      
        </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
          </button>
      </form>
    </div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>