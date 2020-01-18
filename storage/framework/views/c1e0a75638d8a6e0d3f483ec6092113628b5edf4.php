<?php $__env->startSection('title'); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col l2">
           <a href="<?php echo e(route('robot.create')); ?>" class="waves-effect waves-light btn">creation</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
          
	
            <?php if( $flash = session('flashMessage') ): ?>
                <div class="container flash">
                    <div class="col s12"><?php echo e($flash); ?></div>
                </div>
            <?php endif; ?>
            
            <table>

    			<th>Robot</th>
    			<th>User</th>
    			<th>Category</th>
    			<th>Tags</th>
    			<th>action</th>
					
                    <?php $__currentLoopData = $robots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $robot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        		          <tr>
        				    <td>
                                <a href="#"><?php echo e($robot->name); ?></a>
                            </td>
        				    <td>
                                <?php if( $robot->user != null ): ?> <?php echo e($robot->user->name); ?> <?php else: ?> pas d'user 
                                <?php endif; ?> 
                            </td>
        		
    				        <td>
                                <?php if( $robot->category != null ): ?> <?php echo e($robot->category->title); ?>

                                <?php else: ?> non catégorisé
                                <?php endif; ?>
                            </td>
    				        <td>	
    				              <?php $__empty_1 = true; $__currentLoopData = $robot->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
    				               <?php echo e($tag->name); ?>

    				              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
    				                   <p>NULL</p>
    				              <?php endif; ?>
        				    </td>
                            <td>
                                <?php if( $robot->published_at != null ): ?> <?php echo e($robot->published_at); ?> 
                                <?php else: ?> pas de date 
                                <?php endif; ?>
                            </td>
						
                            <td>
                                <button class="btn" >
                                     <a href="<?php echo e(route('robot.edit', $robot->id)); ?>" > update</a>
                                </button>
                            </td>

                            <td>
                                <button class="btn" > Suprimer </button>
                            </td>
        		          </tr>
            			
            	       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            		
			</table>
         
        </div>
      
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>