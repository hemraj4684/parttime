@extends('layouts.app')
 @section('title') Edit Org Bills @stop
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
              <li> <a href="{{ url('/orgbills') }}">Org Bills</a> </li>
              <li class="active"> Edit Org Bill </li>
              </ol>
             
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('org_bills.edit')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
				{{ Form::model($orgbills, ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgbills.update', $orgbills->org_bill_id], 'method' => 'PUT']) }}		
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
       	     <div class="col-xs-12 col-sm-6 col-md-6">
     <div class="form-group">
                    <label class="form-label" >{{ trans('org_bills.heading1')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
                    {!! Form::select('org_id',  ['' => 'Select Organization'] + $orgs, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                       @if ($errors->has('org_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Organization</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                  
 <div class="form-group">
                    <label class="form-label" >{{ trans('org_bills.heading2')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
                 {!! Form::select('bill_type_id',  ['' => 'Select Bill Type'] + $bill_type, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                  @if ($errors->has('bill_type_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Billing type</strong>
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
                      </div>
  {{ Form::close() }}
                    
    </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
