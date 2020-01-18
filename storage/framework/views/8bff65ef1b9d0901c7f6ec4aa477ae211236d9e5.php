<?php $__env->startSection('title'); ?>

<?php $__env->startSection('content'); ?>
<?php if(count($errors) > 0): ?>
   <div class="alert alert-danger">
     <p>Une erreur est survenue dans le formulaire</p>
   </div>
<?php endif; ?>

   
 <form action="<?php echo e(route('robot.update', $robot->id)); ?>" method="post" enctype="multipart/form-data">
   <?php echo e(csrf_field()); ?>

   <?php echo e(method_field('PUT')); ?>

   <!--<input type="hidden" name="_method" value="PUT">-->
   <div class="row">
     <div class="input-field col s3">
   <input type="text" name="name" value="<?php echo e($robot->name); ?>">
    	<?php if($errors->has('name')): ?> <span><?php echo e($errors->first('name')); ?></span>
   		 <?php endif; ?>
     </div>
   </div>
   
   
   <div class="row">        
           <div class="input-field col s12">
             <textarea  class="materialize-textarea" name="description"  >
             	<?php echo e($robot->description); ?>

             </textarea>
             <label >Description</label>
           </div>    
   </div>

    
   <div class="row">
       <p><label class="input-field col s12">Tags du robot</label></p>
       <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
         <div class="col s3">
           <input id="<?php echo e($id); ?>" <?php echo e($robot->isTag($id)? 'checked' : ''); ?> type="checkbox" name="tags[]" value="<?php echo e($id); ?>"/>
           <label for="<?php echo e($id); ?>"> <?php echo e($name); ?> </label>
         </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </div>

     
   <div class="row">
     <div class="input-field col s12">
           <select class="prisc" name="category_id">
               <option value="0" <?php echo e($robot->category? '' : 'selected'); ?>>Non catégorisé</option>
               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$title): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
               <option <?php echo e(($robot->category? $robot->category->id == $id : false)? 'selected':''); ?> value="<?php echo e($id); ?>" ><?php echo e($title); ?></option>          
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
             </select>
             <label>Selection des catégories</label>
     </div>
   </div>

  
  <?php if($robot->link != null): ?>
 <div class="row">

    <img src="<?php echo e(url('images',$robot->link)); ?>">
     <p>
      <input type="checkbox" id="supp" name="supp" />
      <label for="supp">Suprimer</label>
    </p>

    
 </div>
  <?php endif; ?>  
 

        <div class="file-field input-field">
          <div class="btn">
              <span>File</span>
                <input type="file" name="link">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
      </div>
    
   
     
   <div class="row">
       <div class="col s12">
         <div class="switch">
           <label>
             Unpublished
             <input type="checkbox" name="published_at" value="on" <?php echo e(($robot->published_at!= null)?  'checked' : ''); ?>>
             <span class="lever"></span>
             Published
           </label>
         </div>
       </div>
     </div>

     
     <div class="row">
       <div class="col s12">
           <button class="btn waves-effect waves-light" type="submit" name="action">Update
               <i class="material-icons right"></i>
           </button>
       </div>
     </div>




   
 </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>