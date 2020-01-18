<div class="row">
	 

	<?php $__currentLoopData = $robot->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="col-sm-6 col-md-2">
		
			<?php if(!empty($name)  && $name == $tag->name): ?>
				l<a  href="<?php echo e(url('tags', $tag->id)); ?>"  class="btn-large disabled"><?php echo e($tag->name); ?></a>
			<?php else: ?>
				<a  href="<?php echo e(url('tags', $tag->id)); ?>" class="waves-effect waves-light btn"><?php echo e($tag->name); ?></a>
			<?php endif; ?>
		
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
</div>


             