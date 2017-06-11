 <?php $__env->startSection('title'); ?> Edit User <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START --><h1 class="title">Edit Users</h1><!-- PAGE HEADING TAG - END -->                            </div>

                            <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/users')); ?>">Users</a>
                        </li>
                        <li class="active">
                            <strong>Edit User</strong>
                        </li>
                    </ol>
                </div>
                                
        </div>
    </div>
    
     <div class="row">
      <div class="col-md-8" > 
    
    <!-- MAIN CONTENT AREA STARTS -->
	 <?php echo e(Form::model($users, ['role' => 'form', 'route' => ['users.update', $users->id],'class'=>'form-horizontal', 'method' => 'PUT'])); ?>

  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="parent_id" value="<?php echo Auth::user()->parent_id; ?>">	
	
	<div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">General Information</h2>
                  <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

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
                      <?php echo e(Form::text('email', null, ['class' => 'form-control','readonly'=>'readonly'])); ?>

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
              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

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

              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

            </header>
            <div class="content-body">
              <div class="row">
       
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.uname')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                      <?php echo e(Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                    <?php if($errors->has('username')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                    <?php endif; ?>

                      </div>
					  <div class="clearfix"></div>
                    </div>
				 <div class="">
                        <label class="form-label" for="org">Status<span class="required">*</span>
                        </label>
                        <div class="controls">
                         
 <?php echo Form::select('status',  ['' => 'Select Status','1'=>'Active','0'=>'In Active'], null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

 
                        <?php if($errors->has('status')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Status of User</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
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
              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

            </header>
		  
             <div class="content-body">
              <div class="row">
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.org')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                       <?php echo Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

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
                                <?php echo Form::select('role_id',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

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
              <?php if($org_sup): ?>
           
				<?php foreach($org_sup as $rowsp): ?>
                          
 
                    
                      <div class="row" >
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.org')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                  
                       
                       <select class="form-control col-md-7 col-xs-12" name="org_id_array[]">
                       <option value="" selected="selected">Select Organization</option>
                       <?php foreach($orgtype1 as $row): ?>
                    
                       <option value="<?php echo $row->org_id; ?>" <?php if($row->org_id == $rowsp->org_id) { echo 'selected="selected"';} ?>><?php echo $row->org_name; ?></option>
                       <?php endforeach; ?>
                       
                       </select>
                   

                      </div>
                    </div>
					
                  </div>
				  <div class="col-xs-6">
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.role')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                                 <?php echo Form::select('role_id',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                    

                      </div>
                    </div>
					
                  </div>
				  <br/>
				  <div class="clearfix"></div>
				  </div>
				<?php endforeach; ?>                  
                  
                  
             <?php else: ?>
          <div class="row">
                  <div class="col-md-12 text-right" >
                  <a class="child1" onClick="opendiv('child1')">Add More</a>
                  </div>
               </div>
               
                <div class="row" id="child1" style="display:none">
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.org')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                       <?php echo Form::select('org_id_array[]',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                   

                      </div>
                    </div>
					
                  </div>
				  <div class="col-xs-6">
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.role')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                                <?php echo Form::select('role_id_array[]',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                    

                      </div>
                    </div>
					
                  </div>
				  <br/>
				  <div class="clearfix"></div>
				  
              
                  <div class="col-md-12 text-right" >
                  <a  class="child2" onClick="opendiv('child2')">Add More</a>
                  </div>
               </div>
                  <div class="row" id="child2" style="display:none">
                  <div class="col-xs-6" >
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.org')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                       <?php echo Form::select('org_id_array[]',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                   

                      </div>
                    </div>
					
                  </div>
				  <div class="col-xs-6">
                    <div class="">
                      <label class="form-label" ><?php echo e(trans('users.role')); ?></label>
                      <span class="desc"></span>
                      <div class="controls">
                                <?php echo Form::select('role_id_array[]',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                   

                      </div>
                    </div>
					
                  </div>
				  <br/>
				  <div class="clearfix"></div>
				  
             
                 
               </div>
             <?php endif; ?>
          
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
                      <button type="submit" class="btn btn-primary">Update</button>

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
	  <div class="col-md-4">
        <div class="col-xs-12">
          <section class="box "> <br/>
            <div>
              <div class="uprofile-image"> <img src="<?php echo e(URL::asset('public/theme/data/doctors/doctor-1.jpg')); ?>" class="img-responsive"> </div>
              <div class="uprofile-name">
                <h3> <a href="#"><?php echo e($users->username); ?></a> 
                  <!-- Available statuses: online, idle, busy, away and offline --> 
                  <span class="uprofile-status online"></span> </h3>
                  <!-- Available statuses: online, idle, busy, away and offline --> 
                  <span class="uprofile-status online"></span> </h3>
                <p class="uprofile-title">ID: <span>1234567</span> <br/> <span><button type="button" class="btn btn-info btn-xs">Active</button></span> </p>
              </div>
              <div class="uprofile-info">
                <ul class="list-unstyled">
                  <li><i class="fa fa-home"></i> Reports To:&nbsp<span>Vijay</span></li>
                  <li><i class="fa fa-user"></i> User Name:&nbsp<span><?php echo e($users->username); ?></span></li>
                </ul>
              </div>
              <div class="uprofile-buttons" style="display:none">
               <a class="btn btn-md btn-primary">Forgot Password?</a>
               <a class="btn btn-md btn-primary">Delet User</a> </div>
            </div>
            <div class="clearfix"></div>
            <header class="panel_header">
              <h2 class="title pull-left">Audit Information</h2>
            </header>
            <div class="content-body">
              <div class="row">
                 <ul class="list-group clear-list timeline-ul">
                  <li class="list-group-item fist-item"> <span class="pull-right"><?php echo e($users->created_at); ?> </span> Created Date</li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($users->createduser); ?> </span> Created By </li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($users->updated_at); ?> </span> Last Update </li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($users->updateduser); ?> </span> Last Updated By </li>
                  <li class="list-group-item"> <span class="pull-right"> 13/10/16 </span> Last Login on </li>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
	  </div>
   
 
	
	
	</section>


     <script type="text/javascript">
	 function opendiv(divid)
	 {
		 $('#'+divid).show();
		  $('.'+divid).hide();
	 }
function evalGroup()
{
var group = document.usereditform.role_id;
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
      jQuery(document).ready(function() {
        jQuery('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>