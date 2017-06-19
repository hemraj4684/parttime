<?php $__env->startSection('title'); ?> Edit Module <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container wrapper main-wrapper">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="page-title">
                <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
           <h1 class="title">Edit Module</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>
                <div class="pull-right hidden-xs">
                   <ol class="breadcrumb">
                    <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
                    <li> <a href="<?php echo e(route('module.index')); ?>">Module</a> </li>
                    <li class="active">
                        <strong>Edit Module</strong>
                    </li>
                   </ol>
               </div>
              </div>

            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                
                <div class="panel-body">
                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session()->get('error')); ?>

                    </div>
                    <?php endif; ?>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('module.update',$recId->module_id)); ?>">
                   
                        <?php echo e(csrf_field()); ?>


                        <?php echo e(method_field('PATCH')); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Module Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(isset($recId->name) ? $recId->name : old('name')); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea  id="description" type="text" class="form-control" name="description"><?php echo e(isset($recId->description) ? $recId->description : old('description')); ?></textarea>
                                <?php if($errors->has('description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>                       
                        <div class="form-group<?php echo e($errors->has('tab_id') ? ' has-error' : ''); ?>">
                            <label for="tab_id" class="col-md-4 control-label">Tab</label>
                            <div class="col-md-6">
                              <select name="tab_id" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php foreach(App\Models\Tab::all() as $tab): ?>
                                        <?php if($tab->tab_id==$recId->tab_id): ?>
                                            <option value="<?php echo e($tab->tab_id); ?>" selected><?php echo e($tab->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($tab->tab_id); ?>"><?php echo e($tab->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                              </select>
                                <?php if($errors->has('tab_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tab_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
                                </button>
                                <a href="<?php echo e(route('module.index')); ?>" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>