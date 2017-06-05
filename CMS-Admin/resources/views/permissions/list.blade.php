@extends('layouts.app')
 @section('title') Roles @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">
                Permissions</h1><!-- PAGE HEADING TAG - END -->                   </div>         

                            <div class="pull-right">
                 
                    <a href="{{ url('/permissions/create') }}" title="Add Permission" class="btn btn-primary">{{ trans('permissions.add')}}</a>
                
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
<div class="col-lg-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left"> {{ trans('permissions.plural')}}</h2>
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
                          <th>{{ trans('permissions.heading1')}}</th>
                          <th>{{ trans('permissions.heading2')}}</th>
                          <th>{{ trans('permissions.heading3')}}</th>
                          <th>{{ trans('permissions.heading4')}}</th>
                          <th>{{ trans('permissions.heading5')}}</th>
                          <th>{{ trans('permissions.heading6')}}</th>
                          <th>{{ trans('permissions.heading7')}}</th>
                          </tr>
                      </thead>
                      <tbody>
                      @if($permissions)
                      @foreach($permissions as $row)
                      
                        <tr id="{{ $row->permission_id }}1">

                          <td>{{ $row->permission_action }}</td>
                          <td>{{ $row->permission_desc }}</td>
                          <td>{{ $row->createduser }}</td>
                          <td>{{ $row->updateduser }}</td>
                          <td>{{ $row->updated_at }}</td>
                          <td>{{ $row->created_at }}</td>
                          
                          <td>
                          <a  href="{{route('permissions.edit',$row->permission_id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                          
                          <a href="{{route('permissions.show',$row->permission_id)}}"  style="margin-right: 3px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                          
                          <a href="{{route('permissions.destroy',$row->permission_id)}}" class="delete" style="margin-right: 3px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
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
