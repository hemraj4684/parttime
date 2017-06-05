<?php $__env->startSection('content'); ?>
<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Edit Permission</div>
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
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('permission.update',$recId->id)); ?>">
                   
                        <?php echo e(csrf_field()); ?>


                        <?php echo e(method_field('PATCH')); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Permission Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(isset($recId->name) ? $recId->name : old('name')); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('routeName') ? ' has-error' : ''); ?>">
                            <label for="routeName" class="col-md-4 control-label">Route Name</label>

                            <div class="col-md-6">
                                <input id="routeName" type="text" class="form-control" name="routeName" value="<?php echo e(isset($recId->routeName) ? $recId->routeName : old('routeName')); ?>">

                                <?php if($errors->has('routeName')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('routeName')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>                       

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit
                                </button>
                                <a href="<?php echo e(route('permission.index')); ?>" class="btn btn-primary">View</a>
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