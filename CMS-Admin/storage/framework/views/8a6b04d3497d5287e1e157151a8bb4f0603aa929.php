 <?php $__env->startSection('title'); ?> Tabs <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="wrapper main-wrapper row">
    <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Tabs</h3>
                      </div>
        
                      <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search text-right">
                            <a href="<?php echo e(route('tab.create')); ?>" title="Add Location" class="btn btn-primary">Add Tab</a>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Tab Name</th>
                          <th>Description</th>
                          <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php if($tabs): ?>
                      <?php foreach($tabs as $tab): ?>
                      
                        <tr>
                          <td><?php echo e($tab->tab_id); ?></td>
                          <td><?php echo e($tab->name); ?></td>
                          <td><?php echo e($loc->description); ?></td>
                          <td><a  href="<?php echo e(route('tab.edit',$tab->tab_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a><a href="<?php echo e(route('tab.show',$tab->tab_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a><a href="<?php echo e(route('tab.destroy',$tab->tab_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                          </tr>
                          <?php endforeach; ?>
                      <?php endif; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
      </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>