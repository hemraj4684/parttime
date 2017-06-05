@extends('layouts.app')
 @section('title') Edit Org service @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Org Services</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             
              <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/orgservice') }}">Org Services</a> </li>
                 <li class="active">
                            <strong>Edit Service</strong>
                        </li>
			  
            </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="row">
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('org_service.edit')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
   
 

				{{ Form::model($orgservices, ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgservice.update', $orgservices->org_ser_id], 'method' => 'PUT']) }}		
                
            
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">
  
  <div class="form-group">
                    <label class="form-label" >{{ trans('org_service.heading1')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
           {!! Form::select('org_id',  ['' => 'Select Organization'] + $orgs, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
            @if ($errors->has('org_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organization</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label" >{{ trans('org_service.heading2')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
    
{!! Form::select('service_id',  ['' => 'Select Service'] + $services, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
@if ($errors->has('service_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Service </strong>
                                    </span>
                                @endif

                    </div>
                  </div>
                        <div class="form-group">
                    <label class="form-label" >Status</label>
                    <span class="desc"></span>
                    <div class="controls">
    
 {!! Form::select('status',  ['' => 'Select Status','1'=>'Active','0'=>'In Active'], null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
 
                        @if ($errors->has('status'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Enter Status of Service</strong>
                                    </span>
                                @endif 

                    </div>
                  </div>

                    
                    <br/>
                    
                    <div class="clearfix"></div>                                        

                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
   {{ Form::close() }}
                 
    


    </div>
        </section></div>
        </div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
