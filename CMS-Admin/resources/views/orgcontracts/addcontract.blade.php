@extends('layouts.app')
 @section('title') Create Contract @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                </div>

             <div class="pull-right hidden-xs">
             
             <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/orgcontracts') }}">Org Contracts</a> </li>
              <li class="active"> Add Org Contract </li>
              </ol>
             </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('contracts.add')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    
     {{ Form::open( ['role' => 'form','class'=>'form-horizontal', 'route' => ['orgcontracts.saveuser']]) }}	

  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">		   
                    <div class="col-xs-12 col-sm-9 col-md-8">
                  <div class="form-group">
        <label class="form-label">{{ trans('contracts.heading1')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('org_id',  ['' => 'Select Organisation'] + $orgs, null, ['class' => 'form-control']) !!}
                           @if ($errors->has('org_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Organisation</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">{{ trans('contracts.service')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('service_id',  ['' => 'Select Service'] + $services, null, ['class' => 'form-control' ]) !!}
                           @if ($errors->has('service_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose service</strong>
                                    </span>
                                @endif
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">{{ trans('contracts.heading2')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
 {{ Form::text('contract_start_date', null, ['class' => 'datepicker form-control','onkeyup' => 'lastdate()','id'=>'lastdate']) }} @if ($errors->has('contract_start_date'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Start date of Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="form-label">{{ trans('contracts.heading3')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                     
    {{ Form::text('contract_end_date', null, ['class' => 'datepicker form-control ','id'=>'yeardate' ]) }}
                             @if ($errors->has('contract_end_date'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select End date of Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                     <div class="form-group">
        <label class="form-label">Contracts <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('contract_id',  ['' => 'Select Contract'] + $contracts, '', ['class' => 'form-control']) !!}
                           @if ($errors->has('contract_id'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Choose Contract</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="form-label">{{ trans('contracts.heading5')}} <span class="required">*</span>
                        </label>
                        <div class="controls">
                           {!! Form::select('status',  ['' => 'Select Status','1'=>'Active','0'=>'In Active'] , null, ['class' => 'form-control' ]) !!}
                                                   @if ($errors->has('contract_status'))
                                    <span class="help-block" style="color:red;">
                                        <strong>Select Status of Contract</strong>
                                    </span>
                                @endif        </div>
                      </div>
                                          
                  </div>
              
                      <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                            	<div class="text-left">
                                <button type="submit" class="btn btn-primary">Create</button>
                                     </div>
                        </div>

                   
 {{ Form::close() }}
     
                    
    </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
  

@endsection
