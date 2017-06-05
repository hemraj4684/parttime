@extends('layouts.app')
 @section('title') Add User @stop
@section('content')

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
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/orgsupport') }}">Org Professional Service Users</a> </li>
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
                <h2 class="title pull-left">Add Professional Service User</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    
{{ Form::open( ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgsupport.store']]) }}	
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">		
    
          <div id="pills" class='wizardpills' >
          <ul class="form-wizard nav nav-pills">
            <li class="complete"><a href="#pills-tab1" data-toggle="tab" aria-expanded="false"><span>Creating organization</span></a></li>
            <li class="complete"><a href="#pills-tab2" data-toggle="tab" aria-expanded="false"><span>Creating Admin</span></a></li>
            <li class="complete"><a href="#pills-tab3" data-toggle="tab" aria-expanded="false"><span>Select Services</span></a></li>
           <li class="complete"><a href="#pills-tab4" data-toggle="tab" aria-expanded="false"><span>Contract terms</span></a></li>
            <li class="active"><a href="#pills-tab5" data-toggle="tab" ><span>Functional Support</span></a></li>
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
          </div>
          <div class="tab-pane" id="pills-tab2">
            <h4>Creating org admin user and assign org admin role to user</h4>
            <br>
            
          </div>
      <div class="tab-pane active" id="pills-tab6">
      <h4>Assigning Professional service user to organization</h4>
      <br>
      
      
          <div class="form-group">
                        <label class="form-label col-sm-12 " for="org-name">{{ trans('org_service.heading1')}}<span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
    
{!! Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, $curorg, ['class' => 'form-control col-md-7 col-xs-12']) !!}
					 @if ($errors->has('org_id'))
                                    <span class="help-block" style="color:red;">
                                       <strong>Organization selection is required</strong>
                                   </span>
                                @endif

                        </div>
                      </div>
<div class="form-group">
                        <label class="form-label col-sm-12" for="org-name">{{ trans('org_service.heading2')}}<span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
    
{!! Form::select('user_id',  ['' => 'Select Service User'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
					@if ($errors->has('user_id'))
                                    <span class="help-block" style="color:red;">
                                    <strong>Professional service user selection is required</strong>  </span>
                                @endif

                        </div>
                      </div>


    </div>
    <div class="tab-pane" id="pills-tab4">
      <h4>Contract terms for service </h4>
      <br>
      
    </div>
    <div class="tab-pane" id="pills-tab5">
      <h4>Assigning Functional Supporttype</h4>
      <br>
      
      
    </div>
    <div class="tab-pane" id="pills-tab3">
      <h4>Assigning profession service user to account</h4>
      <br>
      
    </div>
    
    
    <div class="clearfix"></div>
    <ul class="pager wizard">
        <li class="next"> <button type="submit" class="btn btn-primary">Next</button></li>
    </ul>
  </div>
</div>
 {{ Form::close() }}

				       	
 
                    
                   
                  </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
