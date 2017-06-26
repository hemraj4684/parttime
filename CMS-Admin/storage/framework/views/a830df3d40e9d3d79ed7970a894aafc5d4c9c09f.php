 <?php $__env->startSection('title'); ?> Edit User  <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title"></h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/orgsupport')); ?>">Professional Service Users</a> </li>
              <li class="active"> Add Professional Service User </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Edit Org Support User</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    

				<?php echo e(Form::model($users, ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgsupport.update', $users->org_sup_id], 'method' => 'PUT'])); ?>		
                
            
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	     	
 <div class="form-group">
                        <label class="form-label col-sm-12" for="org-name"><?php echo e(trans('org_service.heading1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
    
<?php echo Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

 <?php if($errors->has('org_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Organization selection is required</strong>
                                    </span>
                                <?php endif; ?>

                        </div>
                      </div>
<div class="form-group">
                        <label class="form-label col-sm-12" for="User-name"><?php echo e(trans('org_service.heading2')); ?><span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
    
<?php echo Form::select('user_id',  ['' => 'Select Professional Service'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

<?php if($errors->has('user_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Professional service user selection is required</strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>


                    
                    <br/>
                    
                    <div class="clearfix"></div>                                        

                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
   <?php echo e(Form::close()); ?>

                    
    </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>