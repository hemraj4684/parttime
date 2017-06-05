@extends('layouts.app')
 @section('title') Add Role @stop
@section('content')
  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>{{ trans('org.edit')}}</h2>
    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
 {{ Form::model($orgs, ['role' => 'form','data-parsley-validate'=>'', 'class'=>'form-horizontal form-label-left' ,'route' => ['org.update', $orgs->org_id], 'method' => 'PUT']) }}	
 
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	   	

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
                        
                          <input type="file" name="org_logo_image" class="form-control col-md-7 col-xs-12">
                          </div>
                      </div>
                      
                  </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                      </div>
                      
				  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org.address1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         
                          {{ Form::text('address_line1', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.city')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
            
                          {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('org.state')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        
                          {{ Form::text('zipcode', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.latitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          {{ Form::text('latitude', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>

                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-url">{{ trans('org.address2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
{{ Form::text('address_line2', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.email')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          
                          {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.telephone')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         
                          {{ Form::text('telephone', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.fax')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
           
                          {{ Form::text('fax', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org">{{ trans('org.langitude')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         
                          {{ Form::text('longitude', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>


                  </div>
                      
                  </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>


    {{ Form::close() }}
                  </div>
                </div>
              </div>
            </div>

        

    
@endsection
