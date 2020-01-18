<?php $__env->startSection('title'); ?>


<?php $__env->startSection('content'); ?>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
      <p>Une erreur est survenue dans le formulaire</p>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('robot.store')); ?>" method="POST" enctype="multipart/form-data">
 <?php echo e(csrf_field()); ?>

	<div class="row">
		<div class="input-field col s12">
			<input type="text" name="name" class="validate" value="<?php echo e(old('name')); ?>">
			<label class="active" for="first">Name</label>
		</div>
		
		<div class="input-field col s12">
			<textarea name="description" class="materialize-textarea"><?php echo e(old('description')); ?></textarea>
			<label for="textarea1">Description</label>
		</div>

		
       <div class="input-field col s12">
           <select class="prisc"  name="category_id" >
             <option value="" disabled selected>Choose your category</option>
              <option value="0">Non catégorisé</option>
             <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $title): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
             <option <?php echo e((old('category_id') == $id) ? 'selected' : ''); ?> value="<?php echo e($id); ?>"><?php echo e($title); ?></option>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
           </select>
           <label>Category</label>
            <?php if($errors->has('category_id')): ?> <span><?php echo e($errors->first('category_id')); ?></span><?php endif; ?>
       </div>
    <div class="row">
		<div class="input-field col s12">
			<label for="tags">Tags</label><br>
			<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<p>
      			<input <?php echo e(( !empty(old('tags')) && in_array($key,old('tags')) == true )? 'checked' : ''); ?> type="checkbox" name="tags[]" id="<?php echo e($key); ?>" value="<?php echo e($key); ?>" />
      			<label for="<?php echo e($key); ?>"><?php echo e($value); ?></label>
    		</p>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</div>
		<!-- upload de la photo -->

	
    		<div class="file-field input-field">
     		 	<div class="btn">
        			<span>File</span>
        				<input type="file" name="link">
      			</div>
      			<div class="file-path-wrapper">
        			<input class="file-path validate" type="text" placeholder="Upload one or more files">
      			</div>
    	</div>
  	
        
		
		<!-- Checkbox publier le robot -->
		<div class="col s12"><br>
		<label for="publier">Publier</label><br><br>
			<input type="checkbox" id="published_at" name="published_at" <?php echo e(( !empty(old('published_at')) && old('published_at') == 'on' )? 'checked' : ''); ?>/>
     		<label for="published_at">Publier</label>
		</div>
    

		<!-- Bouton submit -->
		<div class="col s12"><br>
			<button class="btn waves-effect waves-light" type="submit" name="action">Créer
    			<i class="material-icons right">send</i>
  			</button>
        </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>