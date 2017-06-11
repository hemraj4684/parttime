 <?php $__env->startSection('title'); ?> Modules <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container wrapper main-wrapper">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="page-title">
                <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
           <h1 class="title">Modules</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>
                <div class="pull-right hidden-xs">
                   <ol class="breadcrumb">
                    <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
                    <li> <a href="<?php echo e(route('module.index')); ?>">Modules</a> </li>
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
                <div class="panel-heading">
                       
                         <a href="<?php echo e(route('module.create')); ?>" class="btn btn-primary pull-right">Create Module</a>    
                     <div class="clearfix"></div>
                </div>
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
                    <div class="table-responsive">
                        <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                          <thead>
                            <tr>
                             <th>#</th>
                             <th>Module Name</th>
                             <th>Description</th>
                             <th>Tab Name</th>
                             <th colspan="2" style="width:10%; text-align: center">Action</th>
                           </tr>
                         </thead>
                         <tbody>
                         <?php $i = (($modules->currentPage()-1)*PAGINATENO)+1; ?>
                         <?php if($modules): ?>
                         <?php foreach($modules as $module): ?>
                           <tr>
                             <td><?php echo e($i++); ?></td>     
                             <td><?php echo e($module->moduleName); ?></td>
                             <td><?php echo e($module->description); ?></td>
                             <td><?php echo e($module->tabName); ?></td>
                             <td><a href="<?php echo e(route('module.edit',$module->module_id)); ?>" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i></a></td>
                             <td>
                                <button class="btn btn-xs btn-danger delete_po" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete" data-url="<?php echo e(route('module.destroy',$module->module_id)); ?>">
                                <i class="fa fa fa-trash-o" ></i>
                                </button>
                             </td>
                           </tr>
                         <?php endforeach; ?>
                         </tbody>
                      </table>
                   </div>
                    <?php echo $modules->render(); ?>

                  <?php endif; ?>   
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<!-- modal start  -->
 <form action="" method="post" id="confirm">
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
     
         <?php echo e(csrf_field()); ?>

         <?php echo e(method_field('DELETE')); ?>

          <div class="modal-body">
            <p>Are you sure you want to delete this?</p>
          </div>
      
      <div class="modal-footer">
      <input type="hidden" class="route_url">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-default">Delete</a>
      </div>
    </div>
   </div>
  </div>
  </form>
<!-- modal end -->


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>