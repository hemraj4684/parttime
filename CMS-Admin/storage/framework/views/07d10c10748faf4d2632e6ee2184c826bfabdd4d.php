<?php $__env->startSection('content'); ?>

<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Edit Permission</div>
                <div class="panel-body">
                    <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session()->get('success')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session()->get('error')); ?>

                    </div>
                    <?php endif; ?>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('role.permission.save')); ?>">
                   
                        <?php echo e(csrf_field()); ?>



                        <div class="form-group<?php echo e($errors->has('role_id') ? ' has-error' : ''); ?>">
                            <label for="role_id" class="col-md-2 control-label">Role Name</label>

                            <div class="col-md-6">
                                <select id="role_id" type="text" class="form-control" name="role_id">
                                    <option value="">Please select</option> 
                                <?php foreach(App\Models\Role::all() as $role): ?>
                                    <option value="<?php echo e($role->role_id); ?>"><?php echo e($role->role_name); ?></option>
                                <?php endforeach; ?>
                                </select>    
                                <?php if($errors->has('role_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('role_id')); ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-2 control-label">Permissions</label>
                            <div class="col-md-10" id="permission">
                                <div class="row">
                                <?php foreach($routeName as $route): ?>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="permission_id[]" value="<?php echo e($route->id); ?>"><?php echo e($route->name); ?></label>
                                        </div>    
                                    </div>
                            <?php endforeach; ?>
                            </div>
                            
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
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/permission.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>