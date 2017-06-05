 <?php $__env->startSection('title'); ?> Create Organization <?php $__env->stopSection(); ?>
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
              <li> <a href="<?php echo e(url('/org')); ?>">Organizations</a> </li>
              <li class="active"> Add Organization </li>
              </ol>
             
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"><?php echo e(trans('org.add')); ?></h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
   <div class="col-xs-12">
  
        <form method="POST" action="<?php echo e(url('/org')); ?>" role="form" class="form-horizontal" enctype="multipart/form-data" >	
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
    
          <div id="pills" class='wizardpills' >
          <ul class="form-wizard">
            <li><a href="#pills-tab1" data-toggle="tab"><span>Creating organization</span></a></li>
            <li><a href="#pills-tab2" data-toggle="tab"><span>Creating Admin</span></a></li>
            <li><a href="#pills-tab3" data-toggle="tab"><span>Select Services</span></a></li>
            <li><a href="#pills-tab4" data-toggle="tab"><span>Contract terms</span></a></li>
            <li><a href="#pills-tab5" data-toggle="tab"><span>Functional Support</span></a></li>
            <li><a href="#pills-tab6" data-toggle="tab"><span>Review</span></a></li>
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
            
            <!-- Accordion START -->  
			
              <div class="panel-group transparent" id="accordion-3" role="tablist" aria-multiselectable="true">
             	 <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo3">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-3" aria-expanded="<?php if(isset($errors) && count($errors) > 0): ?> true <?php else: ?> false <?php endif; ?>" aria-controls="collapseTwo-3">
                                        <i class='fa fa-check'></i>  Organization Basic Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-3" class="panel-collapse collapse <?php if(isset($errors) && count($errors) > 0): ?> in <?php else: ?> '' <?php endif; ?>" role="tabpanel" aria-labelledby="headingTwo3">
                                <div class="panel-body">
                                
                      <div class="row">
                       <div class="col-md-6 col-sm-12 col-xs-12">
                        
                            <div class="">
                              <label class="form-label">
                              <?php echo e(trans('org.heading1')); ?>

                              </label>
                              <div class="controls">
                       <?php echo e(Form::text('org_name', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

 						<?php if($errors->has('org_name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Name</strong>
                                    </span>
                                <?php endif; ?>                       
             </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading2')); ?></label>
                              <div class="controls">
                                                 <?php echo e(Form::text('org_url', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                                                 <?php if($errors->has('org_url')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Url</strong>
                                    </span>
                                <?php endif; ?>   
       </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading3')); ?></label>
                              <div class="controls">
                              <?php echo Form::select('account_status_id',  ['' => 'Select Account Type'] + $acstatus, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                               <?php if($errors->has('account_status_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Account Type</strong>
                                    </span>
                                <?php endif; ?>  
                 </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading4')); ?></label>
                              <div class="controls">
                                  <?php echo Form::select('org_type_id',  ['' => 'Select Organization type'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']); ?>

                         <?php if($errors->has('org_type_id')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organisation Type</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading5')); ?></label>
                              <div class="controls">
                     <?php echo e(Form::text('org_headquarters', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

 <?php if($errors->has('org_headquarters')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Head quarters</strong>
                                    </span>
                                <?php endif; ?> 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                      
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading6')); ?> </label>
                              <div class="controls">
                              
  <?php echo e(Form::text('org_num_employees', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

  <?php if($errors->has('org_num_employees')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter No of Employees</strong>
                                    </span>
                                <?php endif; ?> 
           </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading7')); ?></label>
                              <div class="controls">
                        
                        <?php echo e(Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                        <?php if($errors->has('org_annual_budget')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Annual Budget</strong>
                                    </span>
                                <?php endif; ?> 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading9')); ?></label>
                              <div class="controls">
                          <?php echo e(Form::text('org_facebook', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

                           <?php if($errors->has('org_facebook')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Facebook Id</strong>
                                    </span>
                                <?php endif; ?> 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading10')); ?></label>
                              <div class="controls">
                                         <?php echo e(Form::text('org_twitter', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

 <?php if($errors->has('org_twitter')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Twitter Id</strong>
                                    </span>
                                <?php endif; ?> 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          <div class="">
                              <label class="form-label"><?php echo e(trans('org.heading8')); ?></label>
                              <div class="controls">
           <input type="file" name="org_logo_image" class="form-control col-md-7 col-xs-12">

                              </div>
                            </div>
                            <div class="clearfix"></div>
                          
                          </div>
                      
                        <div class="clearfix"></div>	
                        <div class="clearfix"></div>
                      </div>
                    </div>
                            </div>
                        </div>
			  <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                  
                    <h4 class="panel-title">
                   
                     
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="<?php if(isset($errors) && count($errors) > 0): ?> true <?php else: ?> false <?php endif; ?>" aria-controls="collapseTwo-3">
                     
                      <div id="ad1"><i class='fa fa-check'></i> Address </div> </a> </h4>
                    
                  </div>
                  
                  <div id="collapseOne-3" class="panel-collapse collapse <?php if(isset($errors) && count($errors) > 0): ?> in <?php else: ?> '' <?php endif; ?>" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                        
                    <div class="">
                        <label class="form-label" for="org-name">Address Name<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12" id="address_1_name"  name="address_1_name" type="text" onKeyUp="changename1(this.value)" maxlength="30"> 
                         <?php if($errors->has('address_1_name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address1 Name</strong>
                                    </span>
                                <?php endif; ?> 
                          
                        </div>
                      </div>
                        
                      <div class="">
                        <label class="form-label" for="org-name"><?php echo e(trans('org.address1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  name="address_line11" type="text" id="adl1">
                          <?php if($errors->has('address_line11')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                <?php endif; ?> 
                          
                        </div>
                      </div>
                       <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.address2')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="address_line21" type="text" id="adl2"> <?php if($errors->has('address_line21')): ?>
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
                <input class="form-control col-md-7 col-xs-12"  name="city1" type="text" id="city1">
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
        <input class="form-control col-md-7 col-xs-12"  name="state1" type="text" id="state1">
                         <?php if($errors->has('state1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
  
                        <div class="">
                        <label class="form-label" for="	account_status_id">Country<span class="required">*</span>
                        </label>
                        <div class="controls">
             <select class="form-control col-md-7 col-xs-12" name="country1" id="country1" onChange="selectedcountry1(this.value)">
             <option value="">Select Country</option>
             <option value="91">India</option>
             <option value="1">USA</option>
             </select>         
         
                         <?php if($errors->has('country1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Country</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.zipcode')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
        <input class="form-control col-md-7 col-xs-12"  name="zipcode1" type="text" id="zipcode1">
                         <?php if($errors->has('zipcode1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter zipcode</strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      


                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.email')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="email1" type="email">
                          <?php if($errors->has('email1')): ?>
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
                        <div class="input-group">
                        
                        <input type="text" style="width:15%" class="form-control" id="tele_prefix1" maxlength="2" name="tele_prefix1" readonly>
                          <input class="form-control col-md-7 col-xs-12" style="width:85%"   name="telephone1" placeholder="9999999999" type="text" maxlength="10">
                          </div>
                             <?php if($errors->has('telephone1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Telephone </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.fax')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  name="fax1" type="text">
                          <?php if($errors->has('fax1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax number </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                     
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                
                           <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.langitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12 cityLang"  name="longitude1" id="longitude1" type="text">
                           <?php if($errors->has('longitude1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Longitude Missing </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.latitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12 cityLat"  name="latitude1" id="latitude1" type="text">  <?php if($errors->has('latitude1')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Latitude Missing </strong>
                                    </span>
                                <?php endif; ?>
                          
                        </div>
                      </div>
                      
                      <div class="clearfix"></div><br>
                        <div class="">
                        <label class="form-label" for="org">Enter Address 
                        </label>
                        </div>
                  	<a onClick="getLocation()" class="btn btn-primary">Get Geo details</a>
						<div class="clearfix"></div><br>
                        <div  style='max-height:400px;'>
					
     <div id="map1" class="gmap"></div>
                   </div>
						
                
                      


                  </div>
                        	
                     
                     
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title">
                     
                       <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-31" aria-expanded="<?php if(isset($errors) && count($errors) > 0): ?> true <?php else: ?> false <?php endif; ?>" aria-controls="collapseTwo-3">
                      <div id="ad21"><i class='fa fa-check'></i> Address </div> </a> </h4>
                  </div>
                  <div id="collapseOne-31" class="panel-collapse collapse <?php if(isset($errors) && count($errors) > 0): ?> in <?php else: ?> '' <?php endif; ?>" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                        
                                       <div class="">
                        <label class="form-label" for="org-name">Address Name<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12" id="address_2_name"  name="address_2_name" type="text" onKeyUp="changename2(this.value)" maxlength="30"> 
                         <?php if($errors->has('address_2_name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address2 Name</strong>
                                    </span>
                                <?php endif; ?> 
                          
                        </div>
                      </div>
     
                      <div class="">
                        <label class="form-label" for="org-name"><?php echo e(trans('org.address1')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
   <input class="form-control col-md-7 col-xs-12" id="adl12"  name="address_line12" type="text">
                           <?php if($errors->has('address_line12')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                                           
 <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.address2')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12" id="adl22"  name="address_line22" type="text"> <?php if($errors->has('address_line22')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url"><?php echo e(trans('org.city')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                <input class="form-control col-md-7 col-xs-12"  name="city2" id="city2" type="text">
                          <?php if($errors->has('city2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter City </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id"><?php echo e(trans('org.state')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="state2" id="state2" type="text">
                            <?php if($errors->has('state2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                       <div class="">
                        <label class="form-label" for="	account_status_id">Country<span class="required">*</span>
                        </label>
                        <div class="controls">
             <select class="form-control col-md-7 col-xs-12" name="country2" id="country2" onChange="selectedcountry2(this.value)">
             <option value="">Select Country</option>
             <option value="91">India</option>
             <option value="1">USA</option>
             </select>         
         
                         <?php if($errors->has('country2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Country</strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.zipcode')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  id="zipcode2" name="zipcode2" type="text">
                          <?php if($errors->has('zipcode2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Zipcode </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
 

                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.email')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="email2" type="email">
                          <?php if($errors->has('email2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Email Address </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.telephone')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                         <div class="input-group">
                        
                        <input type="text" style="width:15%" class="form-control" id="tele_prefix2"  maxlength="2" name="tele_prefix2" readonly  >
                          <input class="form-control col-md-7 col-xs-12" style="width:85%"   name="telephone2" placeholder="9999999999" type="text" maxlength="10">
                          </div>
                          <?php if($errors->has('telephone2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Telephone </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.fax')); ?><span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  name="fax2" type="text">
                          <?php if($errors->has('fax2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax number </strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>
                      
                     
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                  
                  
                             <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.langitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12 cityLang"  name="longitude2" id="longitude2" type="text">
                           <?php if($errors->has('longitude2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Langitude is missing </strong>
                                    </span>
                                <?php endif; ?> 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org"><?php echo e(trans('org.latitude')); ?><span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12 cityLat"  name="latitude2" id="latitude2" type="text">  <?php if($errors->has('latitude2')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong>Latitude is missing </strong>
                                    </span>
                                <?php endif; ?>
                          
                        </div>
                      </div>
                      <div class="clearfix"></div><br>
                      	<div class="">
                        <label class="form-label" for="org">Enter Address 
                        </label>
                        </div>
                  	<a onClick="getLocation1()" class="btn btn-primary">Get Geo details</a>                  	
						<div class="clearfix"></div><br>
                        <div  style='max-height:400px;'>
    
      <div id="map2" class="gmap"></div>
                   </div>
                        
                   
                 </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <!-- Accordion END --> 
            
          </div>
          <div class="tab-pane" id="pills-tab2">
            <h4>Creating org admin user and assign org admin role to user</h4>
            <br>
            
          </div>
      <div class="tab-pane" id="pills-tab3">
      <h4>Assigning service to organization</h4>
      <br>
          
    </div>
    <div class="tab-pane" id="pills-tab4">
      <h4>Contract terms for service </h4>
      <br>
      
    </div>
    <div class="tab-pane" id="pills-tab5">
      <h4>Assigning Functional Supporttype</h4>
      <br>
      
      
    </div>
    <div class="tab-pane" id="pills-tab6">
      <h4>Assigning profession service user to account</h4>
      <br>
      
    </div>
    <div id='div_session_write'> </div>
    
    <div class="clearfix"></div>
     
    <div class="clearfix"></div>
     <ul class="pager wizard">
        <li > </li>
    </ul>
    <button type="submit" class="btn btn-success">Next</button>
  </div>
</div>
 <?php echo e(Form::close()); ?>

</div>
  
                        
</div></div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOZWm9pvPElf9ef2J-RUpH8_JOXqkiUWA&sensor=false"></script>
  
    
  <script type="text/javascript">
         function initfirst(lat,lang) {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(lat,lang), // New York
                    mapTypeId: 'satellite'
					            };
            var mapElement = document.getElementById('map1');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,lang),
                map: map,
                title: 'Flat'
            });
        }

 function initsecond(lat,lang) {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(lat,lang), // New York
mapTypeId: 'satellite'
       };
            var mapElement = document.getElementById('map2');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat,lang),
                map: map,
                title: 'Flat'
            });
        }
     function getLocation() {
		    var geocoder = new google.maps.Geocoder();
             var adl1 = document.getElementById("adl1").value;
			//var adl2 = document.getElementById("adl2").value;
			var city1 = document.getElementById("city1").value;
			var state1 = document.getElementById("state1").value;
			var zipcode1 = document.getElementById("zipcode1").value;
			var address = adl1+','+city1+','+state1+','+zipcode1;
			
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
					$("#latitude1").val(latitude);$("#longitude1").val(longitude);
                   // alert("Latitude: " + latitude + "\nLongitude: " + longitude);
					 initfirst(latitude,longitude);
	            } else {
                      alert("Address Not found. Please check it once")
                }
            });
        };
		
		function getLocation1() {
		 
            var geocoder = new google.maps.Geocoder();
            var adl12 = document.getElementById("adl12").value;
			//var adl22 = document.getElementById("adl22").value;
			var city2 = document.getElementById("city2").value;
			var state2 = document.getElementById("state2").value;
			var zipcode2 = document.getElementById("zipcode2").value;
			var address = adl12+','+city2+','+state2+','+zipcode2;
			console.log(address);
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
					$("#latitude2").val(latitude);$("#longitude2").val(longitude);
                   // alert("Latitude: " + latitude + "\nLongitude: " + longitude);
					initsecond(latitude,longitude);	
                } else {
                    alert("Address Not found. Please check it once")
                }
            });
        };

  function changename1(x)
  {
	  $("#ad1").html('<i class="fa fa-check"></i> Address: '+x);
  }
  function changename2(x)
  {
	  $("#ad21").html('<i class="fa fa-check"></i> Address: '+x);
  }
       
	   function selectedcountry1(x)
	   {
		    $("#tele_prefix1").val('+'+x);
       }
	    function selectedcountry2(x)
	   {
		    $("#tele_prefix2").val('+'+x);
       }
	   
	   
	   
    </script>
       
        
        
<style type="text/css">
    /* Set a size for our map container, the Google Map will take up 100% of this container */
   .gmap {
        width: 100%;
        height: 400px;
    }
</style>
        

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>