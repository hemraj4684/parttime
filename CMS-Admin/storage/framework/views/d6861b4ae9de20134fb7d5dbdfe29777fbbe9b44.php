 <?php $__env->startSection('title'); ?> Create Contract <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                 <h1 class="title"><?php echo e(trans('org.module')); ?></h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             
             <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/contracts')); ?>">Contracts</a> </li>
              <li class="active"> Add Contract </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"><?php echo e(trans('contracts.add')); ?></h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
     <form method="POST" action="<?php echo e(url('/contracts')); ?>" role="form" class="form-horizontal" enctype="multipart/form-data" >	
	
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
    
          <div class="col-xs-12 col-sm-9 col-md-8">
                  
                       
                     <div class="">
                    <label class="form-label" >Contract Title<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('contract_title', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('contract_title')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('contract_title')); ?></strong>
                    </span>
                    <?php endif; ?>
                    
                    </div>
                  </div>
                  
                   <div class="">
                    <label class="form-label" >Contract Desc<span class="required"></span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('contract_desc', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('contract_desc')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('contract_desc')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  <div class="form-group">
                            <label class="form-label">Contract Template Doc</label>
                            <span class="desc"></span>
                              <div class="controls">
                                <input type="file" name="contract_doc_file" class="form-control">
                                <?php if($errors->has('contract_doc_file')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('contract_doc_file')); ?></strong>
                    </span>
                    <?php endif; ?>
                            </div>
                        </div>
                  
                                          
                  
                  <div class="clearfix"></div>
						
						
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div></div>
     </form>
                    
    </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
         
       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>