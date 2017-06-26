<?php $__env->startSection('content'); ?>

<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Assign Permissions to Role</div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                    <select id="role_id" type="text" class="form-control" name="role_id">
                                        <option value="">Please select</option> 
                                    <?php foreach(App\Models\Role::all() as $role): ?>
                                        <option value="<?php echo e($role->role_id); ?>"><?php echo e($role->role_name); ?></option>
                                    <?php endforeach; ?>
                                    </select>    
                                    </div>
                                    <div class="col-md-6">
                                    <span class="label label-danger">Note: First Select role for assign new permission or view old permissions </span>
                                    </div>
                                </div>
                                <?php if($errors->has('role_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('role_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <div class="checkbox">
                                      <label><input type="checkbox" id="adminCheckAll">Select All</label>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-2 control-label">Permissions</label>
                            <div class="col-md-10" id="permission"><!--Main permission box started  -->
                                <?php foreach($routeName as $key => $module): ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading"><?php echo e($key); ?></div>
                                  <div class="panel-body">
                                        <div class="row">
                                          <?php foreach($module as $modulekey => $route): ?>  
                                          <div class="col-lg-3" style="margin-bottom: 1%">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <input type="checkbox" name="permission_id[]" aria-label="..." value="<?php echo e(implode(',',array_column($route,'permission_id'))); ?>" class="permissionChkBox">
                                              </span>
                                                <input type="text" class="form-control" aria-label="..." value="<?php echo e($modulekey); ?>" readonly>
                                            </div><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          <?php endforeach; ?>
                                        </div><!-- /.row -->
                                  </div>
                                </div>
                                <?php endforeach; ?>

                            </div><!--Main permission box exnded  -->
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
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
<script>
$(document).on('change','#role_id',function(index,value){
  var roleId = $(this).val();
 
  var url = "<?php echo e(url('role/permission/')); ?>";
 alert(url); 
    $.ajax({
        method: 'get',
        url: url+"/"+roleId,
        dataType: 'html',
        success: function(data) {

            
            //var value = eval(msg);
                $("#permission").html(data);

        }
    });
    //$('#confirm').attr('action',url);
});

$("#adminCheckAll").click(function(){
    $(".permissionChkBox").prop('checked', $(this).prop("checked"));
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>