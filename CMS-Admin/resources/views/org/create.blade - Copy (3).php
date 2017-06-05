@extends('layouts.app')
 @section('title') Create Organization @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">{{ trans('org.module')}}</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
              <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/org') }}">Organizations</a> </li>
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
  
        <form method="POST" action="{{ url('/org') }}" role="form" class="form-horizontal" enctype="multipart/form-data" >	
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
    
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
			
              <div class="panel-group transparent" id="accordion-3" role="tablist" aria-multiselectable="true">
             	 <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo3">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-3" aria-expanded="@if (isset($errors) && count($errors) > 0) true @else false @endif" aria-controls="collapseTwo-3">
                                        <i class='fa fa-check'></i>  Organization Basic Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-3" class="panel-collapse collapse @if (isset($errors) && count($errors) > 0) in @else '' @endif" role="tabpanel" aria-labelledby="headingTwo3">
                                <div class="panel-body">
                                
                      <div class="row">
                       <div class="col-md-6 col-sm-12 col-xs-12">
                        
                            <div class="">
                              <label class="form-label">
                              {{ trans('org.heading1')}}
                              </label>
                              <div class="controls">
                       {{ Form::text('org_name', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
 						@if ($errors->has('org_name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Name</strong>
                                    </span>
                                @endif                       
             </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading2')}}</label>
                              <div class="controls">
                                                 {{ Form::text('org_url', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                                 @if ($errors->has('org_url'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Url</strong>
                                    </span>
                                @endif   
       </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading3')}}</label>
                              <div class="controls">
                              {!! Form::select('account_status_id',  ['' => 'Select Account Type'] + $acstatus, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                               @if ($errors->has('account_status_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Account Type</strong>
                                    </span>
                                @endif  
                 </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading4')}}</label>
                              <div class="controls">
                                  {!! Form::select('org_type_id',  ['' => 'Select Organization type'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                         @if ($errors->has('org_type_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organisation Type</strong>
                                    </span>
                                @endif 
                        </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading5')}}</label>
                              <div class="controls">
                     {{ Form::text('org_headquarters', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
 @if ($errors->has('org_headquarters'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Organisation Head quarters</strong>
                                    </span>
                                @endif 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                      
                            <div class="">
                              <label class="form-label">{{ trans('org.heading6')}} </label>
                              <div class="controls">
                              
  {{ Form::text('org_num_employees', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
  @if ($errors->has('org_num_employees'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter No of Employees</strong>
                                    </span>
                                @endif 
           </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading7')}}</label>
                              <div class="controls">
                        
                        {{ Form::text('org_annual_budget', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                        @if ($errors->has('org_annual_budget'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Annual Budget</strong>
                                    </span>
                                @endif 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            
                            <div class="">
                              <label class="form-label">{{ trans('org.heading9')}}</label>
                              <div class="controls">
                          {{ Form::text('org_facebook', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                           @if ($errors->has('org_facebook'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Facebook Id</strong>
                                    </span>
                                @endif 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="">
                              <label class="form-label">{{ trans('org.heading10')}}</label>
                              <div class="controls">
                                         {{ Form::text('org_twitter', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
 @if ($errors->has('org_twitter'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Twitter Id</strong>
                                    </span>
                                @endif 
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          <div class="">
                              <label class="form-label">{{ trans('org.heading8')}}</label>
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
                   
                     
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="@if (isset($errors) && count($errors) > 0) true @else false @endif" aria-controls="collapseTwo-3">
                     
                      <i class='fa fa-check'></i> Address </a> </h4>
                    
                  </div>
                  
                  <div id="collapseOne-3" class="panel-collapse collapse @if (isset($errors) && count($errors) > 0) in @else '' @endif" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                        
                      
                      <div class="">
                        <label class="form-label" for="org-name">{{ trans('org.address1')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  name="address_line11" type="text"> @if ($errors->has('address_line11'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                @endif 
                          
                        </div>
                      </div>
                       <div class="">
                        <label class="form-label" for="org-url">{{ trans('org.address2')}}<span class="required"></span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="address_line21" type="text"> @if ($errors->has('address_line21'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address</strong>
                                    </span>
                                @endif 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url">{{ trans('org.city')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                <input class="form-control col-md-7 col-xs-12"  name="city1" type="text">
                          @if ($errors->has('city1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter City</strong>
                                    </span>
                                @endif 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id">{{ trans('org.state')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="state1" type="text">
                         @if ($errors->has('state1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State</strong>
                                    </span>
                                @endif 
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  name="zipcode1" type="text">
                         @if ($errors->has('zipcode1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter zipcode</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      


                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.email')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="email1" type="email">
                          @if ($errors->has('email1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Email Address</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.telephone')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  name="telephone1" type="text">
                             @if ($errors->has('telephone1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Telephone </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.fax')}}<span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  name="fax1" type="text">
                          @if ($errors->has('fax1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax number </strong>
                                    </span>
                                @endif
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
                        
						
                         <div class="">
                        <label class="form-label" for="org">{{ trans('org.langitude')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  name="longitude1" id="longitude1" type="text">
                           @if ($errors->has('longitude1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Longitude Missing </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.latitude')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="latitude1" id="latitude1" type="text">  @if ($errors->has('latitude1'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Latitude Missing </strong>
                                    </span>
                                @endif
                          
                        </div>
                      </div>
                     		<div class="clearfix"></div><br>
<div class="gmap1 full-page-google-map">
		<input id="pac-input"  class="controls" type="text" placeholder="Search Box">
    <div id="map" style="position:initial !important; overflow:visible !important"></div>
						</div>
                        <br/><br/>

                  </div>
                        	
                     
                     
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title">
                     
                       <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-31" aria-expanded="@if (isset($errors) && count($errors) > 0) true @else false @endif" aria-controls="collapseTwo-3">
                      <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseOne-31" class="panel-collapse collapse @if (isset($errors) && count($errors) > 0) in @else '' @endif" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                        <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="">
                        <label class="form-label" for="org-name">{{ trans('org.address1')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  name="address_line12" type="text">
                           @if ($errors->has('address_line12'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                                           
 <div class="">
                        <label class="form-label" for="org-url">{{ trans('org.address2')}}<span class="required"></span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="address_line22" type="text"> @if ($errors->has('address_line22'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Address </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org-url">{{ trans('org.city')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                <input class="form-control col-md-7 col-xs-12"  name="city2" type="text">
                          @if ($errors->has('city2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter City </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="	account_status_id">{{ trans('org.state')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="state2" type="text">
                            @if ($errors->has('state2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter State </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                         <input class="form-control col-md-7 col-xs-12"  name="zipcode2" type="text">
                          @if ($errors->has('zipcode2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Zipcode </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
 

                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.email')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="email2" type="email">
                          @if ($errors->has('email2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Email Address </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.telephone')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  name="telephone2" type="text">
                           @if ($errors->has('telephone2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Telephone </strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.fax')}}<span class="required"></span>
                        </label>
                        <div class="controls">
            <input class="form-control col-md-7 col-xs-12"  name="fax2" type="text">
                          @if ($errors->has('fax2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Fax number </strong>
                                    </span>
                                @endif
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
                        
                         <div class="">
                        <label class="form-label" for="org">{{ trans('org.langitude')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                          <input class="form-control col-md-7 col-xs-12"  name="longitude2" id="longitude2" type="text">
                           @if ($errors->has('longitude2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Langitude is missing </strong>
                                    </span>
                                @endif 
                        </div>
                      </div>
                      <div class="">
                        <label class="form-label" for="org">{{ trans('org.latitude')}}<span class="required">*</span>
                        </label>
                        <div class="controls">
                           <input class="form-control col-md-7 col-xs-12"  name="latitude2" id="latitude2" type="text">  @if ($errors->has('latitude2'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Latitude is missing </strong>
                                    </span>
                                @endif
                          
                        </div>
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
      <h4>Choose billing type</h4>
      <br>
      
      
    </div>
    <div class="tab-pane" id="pills-tab6">
      <h4>Assigning profession service user to account</h4>
      <br>
      
    </div>
    
    
    <div class="clearfix"></div>
     
    <div class="clearfix"></div>
     <ul class="pager wizard">
        <li > </li>
    </ul>
    <button type="submit" class="btn btn-success">Next</button>
  </div>
</div>
 {{ Form::close() }}
</div>
  
                        
</div></div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxkgvsyRBZRDiIPM2KUDKwS6y8cRwCj6A&libraries=places&callback=initAutocomplete"
         async defer></script>
         <style>
      
      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
	  #map{
	  max-height:300px;
	  max-width:400px;
	  }
         </style>
    <script type="text/javascript">
	
	
	 function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
 			
            document.getElementById('latitude1').value = place.geometry.location.lat();
            document.getElementById('longitude1').value = place.geometry.location.lng();
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

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
