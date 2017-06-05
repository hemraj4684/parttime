 <?php $__env->startSection('title'); ?> Add User <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section class="wrapper main-wrapper row" style=''>

       <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START --><h1 class="title">Add Org admin</h1><!-- PAGE HEADING TAG - END -->                            </div>

                            <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/orgadmin')); ?>">Org Admins</a>
                        </li>
                        <li class="active">
                            <strong>Add Org admin</strong>
                        </li>
                    </ol>
                </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">

    
          <div id="pills" class='wizardpills' >
          <ul class="form-wizard nav nav-pills">
            <li class="complete"><a href="#pills-tab1" data-toggle="tab" aria-expanded="false"><span>Creating organization</span></a></li>
            <li class="active"><a href="#pills-tab2" data-toggle="tab" aria-expanded="true"><span>Creating Admin</span></a></li>
            <li><a href="#" data-toggle="tab"><span>Select Services</span></a></li>
            <li><a href="#" data-toggle="tab"><span>Contract terms</span></a></li>
            <li><a href="#" data-toggle="tab"><span>Functional Support</span></a></li>
            <li><a href="#" data-toggle="tab"><span>Review</span></a></li>
          </ul>
          
          <div id="bar" class="progress active">
            <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
          </div>
          <div class="clearfix"></div>
          <br>
          <br>
          <div class="tab-content">
          <div class="tab-pane" id="pills-tab1">
            <h4>Creating organization</h4>
            <div class="clearfix"></div>
            <br>           
           
            
          </div>
          
          <!-- MAIN CONTENT AREA STARTS -->
	  <?php echo e(Form::open( ['role' => 'form','class'=>'form-horizontal' ,'route' => ['orgadmin.store']])); ?>

  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="parent_id" value="<?php echo Auth::user()->parent_id; ?>">	
	
	<div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">General Information</h2>
            </header>
            <div class="content-body">
              <div class="row">
              
                 <div class="col-xs-12 col-sm-6" >
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.fname')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('firstname', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('firstname')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('firstname')); ?></strong>
                    </span>
                    <?php endif; ?>
                    
                    </div>
                  </div>
                 
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.mname')); ?><span class="required"></span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('middlename', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('middlename')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('middlename')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.gender')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                     
                       
                       <?php echo Form::select('gender',  ['' => 'Choose Gender','male'=>'Male','female'=>'Female'], null, ['class' => 'form-control']); ?>

                    <?php if($errors->has('gender')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('gender')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  
                  
                  
                    
                 
				   
				   
				   </div>
                    
					<div class="col-xs-12 col-sm-6">
                    
					<div class="">
                    <label class="form-label" ><?php echo e(trans('users.lname')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      <?php echo e(Form::text('lastname', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('lastname')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('lastname')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
				   
				  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.email')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      <?php echo e(Form::text('email', null, ['autocomplete'=>'off','class' => 'form-control','onkeyup'=>'addusername(this.value)'])); ?>

                        <?php if($errors->has('email')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.phone')); ?><span class="required">*</span></label> <span class="desc">e.g. "(534) 253-5353"</span>
                    <span class="desc"></span>
                    <div class="controls">
                      <?php echo e(Form::text('phone_number', null, ['class' => 'form-control','placeholder'=>'(999) 999-9999'])); ?>

                    <?php if($errors->has('phone_number')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('phone_number')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
               
					</div>
				
              </div>
			  <div class="clearfix"></div>
			
            </div>
			<div class="clearfix"></div>
          </section>
        </div>
        
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Address</h2>
            </header>
            <div class="content-body">
              <div class="row">
              
                 <div class="col-xs-12 col-sm-6" >
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.address1')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('address_line1', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('address_line1')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('address_line1')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                 
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.city')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('city', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('city')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('city')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.country')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('country', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('country')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('country')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>			   
				   
				   </div>
                    
					<div class="col-xs-12 col-sm-6">
                    
					<div class="">
                    <label class="form-label" ><?php echo e(trans('users.address2')); ?><span class="required"></span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      <?php echo e(Form::text('address_line2', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('address_line2')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('address_line2')); ?></strong>
                    </span>
                    <?php endif; ?>
                      
                    </div>
                  </div>
				   
				  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.state')); ?><span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      <?php echo e(Form::text('state', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('state')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('state')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
                  <div class="">
                    <label class="form-label" ><?php echo e(trans('users.zipcode')); ?><span class="required">*</span></label> 
                    <span class="desc"></span>
                    <div class="controls">
                       <?php echo e(Form::text('zipcode', null, ['class' => 'form-control'])); ?>

                    <?php if($errors->has('zipcode')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('zipcode')); ?></strong>
                    </span>
                    <?php endif; ?>

                    </div>
                  </div>
               
					</div>
				
              </div>
			  <div class="clearfix"></div>
			
            </div>
			<div class="clearfix"></div>
          </section>
        </div>
        
        
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Account details</h2>
            </header>
            <div class="content-body">
              <div class="row">
       
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.uname')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                  <?php echo e(Form::text('username', null, ['id'=>'unamee','readonly'=>'readonly','class' => 'form-control col-md-7 col-xs-12'])); ?>   <?php if($errors->has('username')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                    <?php endif; ?>

                      </div>
					  <div class="clearfix"></div>
                    </div>
                
                  </div>
				  <div class="col-xs-6">
                    
					<div class="">
                      <label class="form-label" >Security Questions Count</label>
                      <span class="desc"></span>
                      <div class="controls">
                       <?php echo Form::select('ques_count',  ['' => 'Choose Question Count','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], null, ['class' => 'form-control']); ?>

                        
                      </div>
                    </div>
                  </div>
				  
				  
              </div>
            </div>
          </section>
        </div>
        <div class="col-xs-12">
          <section class="box ">
		  
		  <header class="panel_header">
              <h2 class="title pull-left">Assign Role</h2>
            </header>
		  
             <div class="content-body">
              <div class="row">
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.org')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                       <?php echo Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, $curorg, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                    <?php if($errors->has('org_id')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('org_id')); ?></strong>
                    </span>
                    <?php endif; ?>

                      </div>
                    </div>
					
                  </div>
				  <div class="col-xs-6">
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.role')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                       <select class="form-control col-md-7 col-xs-12" name="role_id">
                      <option value="" selected="selected">Select Role</option>                    
                    <option value="5">Organization Admin</option>
                    </select>
                              <!--  <?php echo Form::select('role_id',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>-->
                    <?php if($errors->has('role_id')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('role_id')); ?></strong>
                    </span>
                    <?php endif; ?>

                      </div>
                    </div>
					
                  </div>
				  <br/>
				  <div class="clearfix"></div>
				  
              </div>
            </div>
          </section>
        </div>
		
		
		<div class="col-xs-12">
          <section class="box ">
		  <br/>
             <div class="content-body">
              <div class="row">
       
                   <div class="col-xs-5 col-md-offset-5 padding-bottom-30">
                    <div class="text-left">
                      <button type="submit" class="btn btn-primary">Next</button>

                    </div>
					<div class="clearfix"></div>
                  </div>
				  
				  
			  </div>
			  </div>
			  </section>
			   </div>
		
         <br/>
        
        	 
        
          <?php echo e(Form::close()); ?>

        <!-- MAIN CONTENT AREA ENDS --> 
        
  </div>
</div>



    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
  
    <script type="text/javascript">
function evalGroup()
{
var group = document.usercreateform.role_id;
for (var i=0; i<group.length; i++) {
if (group[i].checked)
break;
}
if (i==group.length)
{
$('#roleerror').show();
return false;
}else{
	$('#roleerror').hide();
}

}
</script>
<script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
	  
	  function addusername(x)
{
	console.log(x);
	$('#unamee').val(x);
}
    </script>
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>