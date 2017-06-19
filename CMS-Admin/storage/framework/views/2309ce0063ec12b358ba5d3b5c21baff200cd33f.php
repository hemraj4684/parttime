 <?php $__env->startSection('title'); ?> Roles <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">
                Permissions</h1><!-- PAGE HEADING TAG - END -->                   </div>         

                            <div class="pull-right">
                 
                    <a href="<?php echo e(url('/permissions/create')); ?>" title="Add Permission" class="btn btn-primary"><?php echo e(trans('permissions.add')); ?></a>
                
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
<div class="col-lg-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"> <?php echo e(trans('permissions.plural')); ?></h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
            <div class="content-body">    <div class="row">
        <div class="col-xs-12">


                    <table id="example" class="display table table-hover table-condensed">
                      <thead>
                        <tr>
                          <th><?php echo e(trans('permissions.heading1')); ?></th>
                          <th><?php echo e(trans('permissions.heading2')); ?></th>
                          <th><?php echo e(trans('permissions.heading3')); ?></th>
                          <th><?php echo e(trans('permissions.heading4')); ?></th>
                          <th><?php echo e(trans('permissions.heading5')); ?></th>
                          <th><?php echo e(trans('permissions.heading6')); ?></th>
                          <th><?php echo e(trans('permissions.heading7')); ?></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php if($permissions): ?>
                      <?php foreach($permissions as $row): ?>
                      
                        <tr id="<?php echo e($row->permission_id); ?>1">

                          <td><?php echo e($row->permission_action); ?></td>
                          <td><?php echo e($row->permission_desc); ?></td>
                          <td><?php echo e($row->createduser); ?></td>
                          <td><?php echo e($row->updateduser); ?></td>
                          <td><?php echo e($row->updated_at); ?></td>
                          <td><?php echo e($row->created_at); ?></td>
                          
                          <td>
                          <a  href="<?php echo e(route('permissions.edit',$row->permission_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                          
                          <a href="<?php echo e(route('permissions.show',$row->permission_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                          
                          <a href="<?php echo e(route('permissions.destroy',$row->permission_id)); ?>" class="delete" style="margin-right: 3px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                          </tr>
                          <?php endforeach; ?>
                      <?php endif; ?>
                      </tbody>
                    </table>

        </div>
    </div>
    </div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>