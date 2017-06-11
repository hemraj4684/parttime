 <?php $__env->startSection('title'); ?> Show Role <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3><?php echo e(trans('permissions.show')); ?></h3>
            <div class="content-body" id="printcontract">
    <div class="row">
						  
                    
            <p><?php echo e(trans('permissions.heading1')); ?>: <?php echo e($permissions->permission_action); ?></p>
            <p><?php echo e(trans('permissions.heading2')); ?>: <?php echo e($permissions->permission_desc); ?></p>
            <p><?php echo e(trans('permissions.heading3')); ?>: <?php echo e($permissions->createduser); ?></p>
            <p><?php echo e(trans('permissions.heading4')); ?>: <?php echo e($permissions->updateduser); ?></p>
            <p><?php echo e(trans('permissions.heading5')); ?>: <?php echo e($permissions->created_at); ?></p>
            <p><?php echo e(trans('permissions.heading6')); ?>: <?php echo e($permissions->updated_at); ?></p>
                   </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>