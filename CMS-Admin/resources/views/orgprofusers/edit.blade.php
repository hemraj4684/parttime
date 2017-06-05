@extends('layouts.app')
 @section('title') Edit  @stop
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
              <li> <a href="{{ url('/orgprofusers') }}">Org profusers</a> </li>
              <li class="active"> Add Org Professional User </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Edit Org Professional service User</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    

				{{ Form::model($users, ['role' => 'form','novalidate'=>'','id'=>'general_validate1','class'=>'form-horizontal', 'route' => ['orgprofusers.update', $users->org_prof_id], 'method' => 'PUT']) }}		
                
            
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	     	
 <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org_service.heading1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
    
{!! Form::select('org_id',  ['' => 'Select Organisation'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}

                        </div>
                      </div>
<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="org-name">{{ trans('org_service.heading2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
    
{!! Form::select('user_id',  ['' => 'Select Professional Service'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}

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


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
