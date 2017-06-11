 <?php $__env->startSection('title'); ?> Add Location <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="wrapper main-wrapper row">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Add Location</h3>
                       
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <?php echo e(Form::open( ['role' => 'form','data-parsley-validate'=>'', 'route' => ['tab.store']])); ?>	
                  <input type="hidden" name="user_created" value="<?php echo e(Auth::user()->id); ?>">
                  <input type="hidden" name="user_updated" value="<?php echo e(Auth::user()->id); ?>">	
                  <input type="text" name="userparent" value="<?php echo e(Auth::user()->client_id); ?>">	     	     	
                  <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="fullname">Location Name :</label>
                            <input type="text" class="form-control" name="loc_name" required />
                        </div>
                                            <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="Description">Alias Name :</label>
                              <input type="text" class="form-control" name="loc_alias_name" required />
                                </div>        
                                <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="Description">Zipcode :</label>
                              <input type="text" class="form-control" name="zipcode" required />
                                </div>                            
                                               <div class="clearfix"></div>
                    
                    </div><!-- row ends here -->
                    
                    <br/>
                    
                    <div class="clearfix"></div>                                        

                     <div class='form-group'>
          <?php echo e(Form::submit('Add Location',array('class'=>'btn btn-small btn-success'))); ?>

    </div>
                          <?php echo e(Form::close()); ?>  
                  </div>
                </div>
              </div>
            
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>