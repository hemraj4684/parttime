@extends('layouts.app')
 @section('title') Add Role @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">{{ trans('org.module')}}</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs"></div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('org.add')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
   <div class="col-xs-12">
          <form id="commentForm">
          <div id="pills" class='wizardpills' >
          <ul class="form-wizard">
            <li><a href="#pills-tab1" data-toggle="tab"><span>Creating organization</span></a></li>
            <li><a href="#pills-tab2" data-toggle="tab"><span>Creating Admin</span></a></li>
            <li><a href="#pills-tab3" data-toggle="tab"><span>Select Services</span></a></li>
            <li><a href="#pills-tab4" data-toggle="tab"><span>Contract terms</span></a></li>
            <li><a href="#pills-tab5" data-toggle="tab"><span>Choose billing </span></a></li>
            <li><a href="#pills-tab6" data-toggle="tab"><span>Assigning POC</span></a></li>
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
            <div>
			
			
              <div class="panel-group transparent" id="accordion-3" role="tablist" aria-multiselectable="true">
                
				 <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo3">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo-3">
                                        <i class='fa fa-check'></i>  Organization Basic Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-6">
                          <div class="row">
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">
                              {{ trans('org.heading1')}}
                              </label>
                              <div class="controls col-sm-12 col-lg-9">
                       {{ Form::text('org_name', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
             </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading2')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                                                 {{ Form::text('org_url', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
       </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading3')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                              {!! Form::select('account_status_id',  ['' => 'Select Account Type'] + $acstatus, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}
                 </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading4')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                                  {!! Form::select('org_type_id',  ['' => 'Select Organization type'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}
                        </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading5')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                     {{ Form::text('org_headquarters', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}

                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="row">
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading6')}} </label>
                              <div class="controls col-sm-12 col-lg-9">
                              
  {{ Form::text('org_num_employees', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
           </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading6')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                        
                        {{ Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading7')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                                                 
                        {{ Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
     </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading9')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                          {{ Form::text('org_facebook', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading10')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                                         {{ Form::text('org_twitter', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}

                              </div>
                            </div>
                            <div class="clearfix"></div>
                          <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12">{{ trans('org.heading8')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                                                 <input type="file" name="org_logo_image" class="form-control col-md-7 col-xs-12">

                              </div>
                            </div>
                            <div class="clearfix"></div>
                          
                          </div>
                        </div>
                        <div class="clearfix"></div>	
                        <div class="clearfix"></div>
                      </div>
                    </div>
                            </div>
                        </div>
				<div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3"> <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseOne-3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-6">
                          <div class="row">
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >
                              {{ trans('org.address1')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                          
                       <input class="form-control" required="required" name="address_line11" type="text">

                              </div>
                            </div>
                            <div class="clearfix"></div>
							<div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >
                              {{ trans('org.address1')}}</label>
                              <div class="controls col-sm-12 col-lg-9">
                     <input class="form-control" required="required" name="city1" type="text">
         </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >URL</label>
                              <div class="controls col-sm-12 col-lg-9">
               <input class="form-control" required="required" name="city1" type="text">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >Account Status</label>
                              <div class="controls col-sm-12 col-lg-9">
               <input class="form-control" required="required" name="city1" type="text">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >Organization Type</label>
                              <div class="controls col-sm-12 col-lg-9">
               <input class="form-control" required="required" name="city1" type="text">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                              <label class="form-label control-label col-lg-3 col-sm-12" >Headquarters</label>
                              <div class="controls col-sm-12 col-lg-9">
               <input class="form-control" required="required" name="city1" type="text">
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                                          
					<div >
						<div class="">
							<form role="form" method="post" id="address-search">
								<div class="input-group primary">
									<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</span>
									<input type="text" class="form-control" placeholder="Enter address">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default">Search</button>
									</span>
								</div>
							</form>

						</div> 
						<div class="clearfix"></div><br>
						<div class="gmap1 full-page-google-map">
							<div id="map-1" style='max-height:400px;'></div>
						</div>
						<!-- start -->
						<div class="clearfix"></div><br>
						<div class="map-toolbar">
							<div class="row">
								<div class="col-sm-8 text-right">
									<div class="btn-group">
										<button type="button" class="btn btn-warning" id="map-unzoom">-</button>
										<button type="button" class="btn btn-warning" id="map-resetzoom">Reset</button>
										<button type="button" class="btn btn-warning" id="map-zoom">+</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end -->
			

				
						
						</div>
                        <div class="clearfix"></div>	
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo0">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-0" aria-expanded="false" aria-controls="collapseTwo-0"> <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseTwo-0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo0">
                    <div class="panel-body">
                        <div class="row">
					<div class="col-xs-5">
						<div class="">
							<form role="form" method="post" id="address-search">
								<div class="input-group primary">
									<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</span>
									<input type="text" class="form-control" placeholder="Enter address">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default">Search</button>
									</span>
								</div>
							</form>

						</div> 
						<div class="clearfix"></div><br>
						<div class="gmap1 full-page-google-map">
							<div id="map-1" style='max-height:200px;'></div>
						</div>
						<!-- start -->
						<div class="clearfix"></div><br>
						<div class="map-toolbar">
							<div class="row">
								<div class="col-sm-8 text-right">
									<div class="btn-group">
										<button type="button" class="btn btn-warning" id="map-unzoom">-</button>
										<button type="button" class="btn btn-warning" id="map-resetzoom">Reset</button>
										<button type="button" class="btn btn-warning" id="map-zoom">+</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end -->
				</div>

				
					</div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree3">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseThree-3" aria-expanded="false" aria-controls="collapseThree-3"> <i class='fa fa-check'></i> Collapsible Group Item #3 </a> </h4>
                  </div>
                  <div id="collapseThree-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree3">
                    <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Accordion END --> 
            
          </div>
    
    <div class="clearfix"></div>
    <ul class="pager wizard">
      <li class="previous first" style="display:none;"><a href="javascript:;">First</a></li>
      <li class="previous"><a href="javascript:;">Previous</a></li>
      <li class="next last" style="display:none;"><a href="javascript:;">Last</a></li>
      <li class="next"><a href="javascript:;">Next</a></li>
      <li class="finish"><a href="javascript:;">Finish</a></li>
    </ul>
  </div>
</div>
</form>
</div>
  
    <form id="demo-form2" method="POST" action="{{ url('/org') }}" data-parsley-validate accept-charset="UTF-8" role="form" class="form-horizontal form-label-left">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
   
    <div class="panel-group transparent" id="accordion-3" role="tablist" aria-multiselectable="true">
                
				 <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo3">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo-3">
                                        <i class='fa fa-check'></i>  Organization Basic Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                                <div class="panel-body">
                      <div class="row">
                       
                           <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org.heading1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
      {{ Form::text('org_name', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.heading2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                          {{ Form::text('org_url', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('org.heading3')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            {!! Form::select('account_status_id',  ['' => 'Select Account Type'] + $acstatus, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}
                          </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading4')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                            {!! Form::select('org_type_id',  ['' => 'Select Organization type'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}

                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading5')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         
  {{ Form::text('org_headquarters', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>

                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading6')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
           
  {{ Form::text('org_num_employees', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading7')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                        {{ Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading9')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         
                          {{ Form::text('org_facebook', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading10')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                          {{ Form::text('org_twitter', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>

<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.heading8')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                          <input type="file" name="org_logo_image" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      
                  </div>
                        
                      
                      </div>
                    </div>
                            </div>
                        </div>
				<div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3"> <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseOne-3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org.address1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" required="required" name="address_line11" type="text">
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.address2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="address_line21" type="text"> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.city')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" required="required" name="city1" type="text">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('org.state')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="state1" type="text">
                         
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" required="required" name="zipcode1" type="text">
                        
                        </div>
                      </div>
                      
                      


                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.email')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="email1" type="email">
                         
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.telephone')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" required="required" name="telephone1" type="text">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.fax')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" required="required" name="fax1" type="text">
                          
                        </div>
                      </div>
                      
                     
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                  
                  	<div class="">
								<div class="input-group primary">
									<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</span>
<input type="text" class="form-control" id="txtAddress" placeholder="Enter address" >
									<span class="input-group-btn">
										<a class="btn btn-primary" onclick="GetLocation()">Search</a>
									</span>
								</div>
						

						</div> 
						<div class="clearfix"></div><br>
						<div class="gmap1 full-page-google-map">
							<div id="map-1" style='max-height:400px;'></div>
						</div>
                        
                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.langitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" required="required" name="longitude1" id="longitude1" type="text">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.latitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="latitude1" id="latitude1" type="text">
                          
                        </div>
                      </div>
                     


                  </div>
                        	
                     
                     
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-31" aria-expanded="true" aria-controls="collapseOne-31"> <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseOne-31" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org.address1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" required="required" name="address_line12" type="text">
                          
                        </div>
                      </div>
                                           
 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.address2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="address_line22" type="text"> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.city')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" required="required" name="city2" type="text">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('org.state')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="state2" type="text">
                         
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12" required="required" name="zipcode2" type="text">
                        
                        </div>
                      </div>
                      
 

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.email')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="email2" type="email">
                         
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.telephone')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" required="required" name="telephone2" type="text">
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.fax')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" required="required" name="fax2" type="text">
                          
                        </div>
                      </div>
                      
                     
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                  
                  	<div class="">
								<div class="input-group primary">
									<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</span>
<input type="text" class="form-control" id="txtAddress2" placeholder="Enter address" >
									<span class="input-group-btn">
										<a class="btn btn-primary" onclick="GetLocation1()">Search</a>
									</span>
								</div>
						

						</div> 
						<div class="clearfix"></div><br>
						<div class="gmap1 full-page-google-map">
							<div id="map-1" style='max-height:400px;'></div>
						</div>
                        
                         <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.langitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" required="required" name="longitude2" id="longitude2" type="text">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.latitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" required="required" name="latitude2" id="latitude2" type="text">
                          
                        </div>
                      </div>
                  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <input type="hidden" name="loop" id="loop" value="2">
                  
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                        
                          <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
  </form>                    
</div></div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>


    
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

        function GetLocation() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("txtAddress").value;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
					$("#latitude1").val(latitude);$("#longitude1").val(longitude);
                   // alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                } else {
                    alert("Request failed.")
                }
            });
        };
		
		function GetLocation1() {
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("txtAddress2").value;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
					$("#latitude2").val(latitude);$("#longitude2").val(longitude);
                   // alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                } else {
                    alert("Request failed.")
                }
            });
        };
        
    </script>
       
        
        
        

    
@endsection
