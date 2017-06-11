 <?php $__env->startSection('title'); ?> Edit Organisation <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Edit Organization</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             
             <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/org')); ?>">Organizations</a> </li>
              <li class="active"> Edit Organization </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
     <div class="row">
      <div class="col-md-8" > 
    
    <!-- MAIN CONTENT AREA STARTS -->

    <?php echo e(Form::model($orgs, ['role' => 'form','class'=>'form-horizontal' ,'route' => ['org.update', $orgs->org_id], 'method' => 'PUT','enctype'=>'multipart/form-data'])); ?>	
 
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	   	
  <input type="hidden" name="ad1_id" value="<?php echo $address1->org_address_id;?>">	   	
  <input type="hidden" name="ad2_id" value="<?php echo $address2->org_address_id;?>">	   	

    	
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
                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-name">
                        <?php echo e(trans('org.heading1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
      <?php echo e(Form::text('org_name', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?> <?php if($errors->has('org_name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Name</strong>
                                    </span>
                                <?php endif; ?>   
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.heading2')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        
                          <?php echo e(Form::text('org_url', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>               <?php if($errors->has('org_url')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Url</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id"><?php echo e(trans('org.heading3')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
           
                 <?php echo Form::select('account_status_id',  ['' => 'Select Account Type'] + $acstatus, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                                   <?php if($errors->has('account_status_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Account Type</strong>
                                    </span>
                                <?php endif; ?>  </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading4')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        
                            <?php echo Form::select('org_type_id',  ['' => 'Select Organization type'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

 <?php if($errors->has('org_type_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organisation Type</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading5')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         
  <?php echo e(Form::text('org_headquarters', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                        <?php if($errors->has('org_headquarters')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Head quarters</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org">Status<span class="required">*</span>
                        </label>
                        <div class="controls">
                         
 <?php echo Form::select('status',  ['' => 'Select Status','1'=>'Active','0'=>'In Active'], null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

 
                        <?php if($errors->has('status')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Status of Organisation</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>

                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading6')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
       
<?php echo e(Form::text('org_num_employees', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                        <?php if($errors->has('org_num_employees')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter No of Employees</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading7')); ?>

                        </label>
                        <div class="controls">
                        
                        <?php echo e(Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                         <?php if($errors->has('org_annual_budget')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Annual Budget</strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading9')); ?>

                        </label>
                        <div class="controls">
                         
                          <?php echo e(Form::text('org_facebook', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                          <?php if($errors->has('org_facebook')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Facebook Id</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading10')); ?>

                        </label>
                        <div class="controls">
                        
                          <?php echo e(Form::text('org_twitter', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                          <?php if($errors->has('org_twitter')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Twitter Id</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>

<div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.heading8')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        <img alt="image"  src="<?php echo e(URL::asset('public/orgimages/'.$orgs->org_logo_image)); ?>" style="width: 62px"> 
                          <input type="file" name="org_logo_image" class="form-control col-md-7 col-xs-12">
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
              <h2 class="title pull-left">Address: <?php echo $address1->address_name;?></h2>
                              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

            </header>
            <div class="content-body">
              <div class="row">
              
                 
                				  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-name">
                        <?php echo e(trans('org.address1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->address_line1;?>" name="address_line11" type="text">
                         <?php if($errors->has('address_line11')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                <?php endif; ?> 
                          </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.city')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
             <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->city;?>" name="city1" type="text">
                     <?php if($errors->has('city1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter City</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id"><?php echo e(trans('org.state')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->state;?>" name="state1" type="text">
                      <?php if($errors->has('state1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.zipcode')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                      <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->zipcode;?>" name="zipcode1" type="text">
              <?php if($errors->has('zipcode1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Zipcode</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.latitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                   <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->latitude;?>" name="latitude1" type="text"> 
                     <?php if($errors->has('latitude1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Latitude is Missing</strong>
                                    </span>
                                <?php endif; ?>       
                        </div>
                      </div>

                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.address2')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
                       <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->address_line2;?>" name="address_line21" type="text">
                         <?php if($errors->has('address_line2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                <?php endif; ?>    
                        </div>
                      </div>

                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.email')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->email;?>" name="email1" type="text">  
                        <?php if($errors->has('email1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Email</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.telephone')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->telephone;?>" name="telephone1" type="text"> 
                         <?php if($errors->has('telephone1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Phone Number</strong>
                                    </span>
                                <?php endif; ?>    
                         </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.fax')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->fax;?>" name="fax1" type="text"> 
             <?php if($errors->has('fax1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax Number</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.langitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address1->longitude;?>" name="longitude1" type="text"> 
                         <?php if($errors->has('longitude1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>langitude is missing</strong>
                                    </span>
                                <?php endif; ?>   
                 
                        </div>
                      </div>


                  </div>
                      
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                      </div>
             <hr/>
              <h2 class="title pull-left">Address: <?php echo $address2->address_name;?></h2>
<div class="clearfix"></div>

                       <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-name"><?php echo e(trans('org.address1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->address_line1;?>" name="address_line12" type="text">
                          <?php if($errors->has('address_line12')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                <?php endif; ?> 
                          </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.city')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
             <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->city;?>" name="city2" type="text">
                      <?php if($errors->has('city2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter City</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id"><?php echo e(trans('org.state')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->state;?>" name="state2" type="text">
                      <?php if($errors->has('state2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.zipcode')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                      <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->zipcode;?>" name="zipcode2" type="text">
               <?php if($errors->has('zipcode2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Zipcode</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.latitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                   <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->latitude;?>" name="latitude2" type="text"> 
                    <?php if($errors->has('latitude2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Latitude</strong>
                                    </span>
                                <?php endif; ?>       
                        </div>
                      </div>
                      
                      

                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.address2')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
                       <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->address_line2;?>" name="address_line22" type="text">

                        <?php if($errors->has('address_line22')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>

                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.email')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->email;?>" name="email2" type="text">  
                        <?php if($errors->has('email2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Email Address</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.telephone')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->telephone;?>" name="telephone2" type="text">
                         <?php if($errors->has('telephone2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Phone number</strong>
                                    </span>
                                <?php endif; ?>     
                         </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.fax')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->fax;?>" name="fax2" type="text"> 
             <?php if($errors->has('fax2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax Number</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.langitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                        <input class="form-control col-md-7 col-xs-12"  value="<?php echo $address2->longitude;?>" name="longitude2" type="text">   
                  <?php if($errors->has('longitude2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Langitude</strong>
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
              <h2 class="title pull-left">Services details</h2>
                              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

            </header>
            <div class="content-body">
              <div class="row">
        <?php if($errors->has('service_details')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('service_details')); ?></strong>
                                    </span>
                                <?php endif; ?>  
              <div class="form-group">        
				<?php 
//				print_r($orgservices);
				 if($orgservices){
					foreach($orgservices as $ukey=>$uvalue){
						$fserv[]=$uvalue->service_id;
						?>
                        <input type="hidden" name="service_old_ids[]" value="<?php echo $uvalue->service_id;?>"/>
					<?php	}
					 }
					

                foreach($services as $row)
                {
					$priv_details = array();
					$rname = $row['service_name'];
					 $rid = $row['service_id'];

                ?>

                 <div class="col-md-6 col-sm-12 col-xs-12">
                 <label for="Add"><input id="chkBox"  class="chkBox" name="service_details[]" value="<?php echo $rid; ?>" type="checkbox" <?php if(in_array($row['service_id'],$fserv)) echo "checked"; ?>  /><?php echo $rname; ?></label>
                </div>
                <?php
                }
                ?>
                     </div>
                      
				  
				  
				  
              </div>
            </div>
          </section>
        </div>
        <div class="col-xs-12">
          <section class="box ">
		  
		  <header class="panel_header">
              <h2 class="title pull-left">Support Users Details</h2>
                              <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>

            </header>
		  
             <div class="content-body">
              <div class="row">
                  
              <?php if($profuser): ?>
                      <?php foreach($profuser as $row): ?>
                <div class="col-xs-6">
                <p>Support User: <?php echo e($row->professional_user); ?></p>
                <p>Email: <?php echo e($row->email); ?></p>
                <p>Phone number: <?php echo e($row->phone_number); ?></p>
                <p>Role: Professional Service User</p>
                 </div>
                 <?php endforeach; ?>
                      <?php endif; ?>
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
                      <button type="submit" class="btn btn-primary">Update</button>

                    </div>
					<div class="clearfix"></div>
                  </div>
				  
				  
			  </div>
			  </div>
			  </section>
			   </div>
		
        
        <br/>       
      
	 </div>
	  <div class="col-md-4 col-xs-12">

          <section class="box "> 
            
              <div class="uprofile-image"> <img src="<?php echo e(URL::asset('public/orgimages/'.$orgs->org_logo_image)); ?>" class="img-responsive"> </div>
              <div class="uprofile-name">
                <h3> <a href="#"><?php echo e($orgs->org_name); ?></a> 
                  <!-- Available statuses: online, idle, busy, away and offline --> 
                  <span class="uprofile-status online"></span> </h3>
                  <!-- Available statuses: online, idle, busy, away and offline --> 
                  <span class="uprofile-status online"></span> </h3>
                <p class="uprofile-title">ID: <span><?php echo e($orgs->org_unique_id); ?></span> <br/> <span><button type="button" class="btn btn-info btn-xs"><?php if($orgs->status == 1) echo 'Active'; else echo 'Inactive'; ?></button></span> </p>
              </div>
             <div class="clearfix"></div>
            <header class="panel_header">
              <h2 class="title pull-left">Audit Information</h2>
            </header>
            <div class="content-body">
              <div class="row">
                 <ul class="list-group clear-list timeline-ul">
                  <li class="list-group-item fist-item"> <span class="pull-right"><?php echo e($orgs->created_at); ?> </span> Created Date</li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($orgs->createduser); ?> </span> Created By </li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($orgs->updated_at); ?> </span> Last Update </li>
                  <li class="list-group-item"> <span class="pull-right"> <?php echo e($orgs->updateduser); ?> </span> Last Updated By </li>
      
                </ul>
              </div>
            </div>
          </section>
      </div>
	  </div>
   
    
    <?php echo e(Form::close()); ?>




        
    </div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
 
        

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>