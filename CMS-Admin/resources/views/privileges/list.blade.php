@extends('layouts.app')
 @section('title') Roles @stop
@section('content')


<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">{{ trans('privileges.plural')}}</h1><!-- PAGE HEADING TAG - END -->                   </div>         

                            <div class="pull-right">
                 
                    <a href="{{ url('/privileges/create') }}" title="Add Privilege" class="btn btn-primary">{{ trans('privileges.add')}}</a>
                
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
<div class="col-lg-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">   <h3>{{ trans('privileges.privileges')}}</h3></h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
            <div class="content-body">    <div class="row">
        <div class="col-xs-12">


                      <table id="example" class="display table table-hover table-condensed">
                      <thead>
                        <tr>
                          <th>{{ trans('privileges.heading1')}}</th>
                          <th>{{ trans('privileges.heading2')}}</th>
                          <th>{{ trans('privileges.heading3')}}</th>
                          <th>{{ trans('privileges.heading4')}}</th>
                          <th>{{ trans('privileges.heading5')}}</th>
                          <th>{{ trans('privileges.heading6')}}</th>
                          <th>{{ trans('privileges.heading7')}}</th>
                          </tr>
                      </thead>
                      <tbody>
                      @if($privileges)
                      @foreach($privileges as $privilege)
                      
                         <tr id="{{ $privilege->privilege_id }}1">

                          <td>{{ $privilege->privilege_action }}</td>
                          <td>{{ $privilege->privilege_desc }}</td>
                          <td>{{ $privilege->createduser }}</td>
                          <td>{{ $privilege->updateduser }}</td>
                          <td>{{ $privilege->updated_at }}</td>
                          <td>{{ $privilege->created_at }}</td>
                          
                          <td><a  href="{{route('privileges.edit',$privilege->privilege_id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a><a href="{{route('privileges.show',$privilege->privilege_id)}}"  style="margin-right: 3px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a><a href="{{route('privileges.destroy',$privilege->privilege_id)}}"  style="margin-right: 3px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                          </tr>
                          @endforeach
                      @endif
                      </tbody>
                    </table>

                  
        </div>
    </div>
    </div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
