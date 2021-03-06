@extends('layouts.app')
 @section('title') ORG Services @stop
@section('content')
<section class="wrapper main-wrapper row">
      <div class="col-xs-12">
        <div class="page-title">
          <div class="pull-left"> 
            <!-- PAGE HEADING TAG - START -->
            <h1 class="title"> </h1>
           
            <!-- PAGE HEADING TAG - END --> </div>
          <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/services') }}">Services</a> </li>
              
			  
            </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Org Services	</h2>
			
                	
                    <a href="{{ url('/orgservice/create') }}" title="Add Org Service" class="btn btn-primary btn-sm pull-right title addUser">Add Org Service</a>
                
          </header>
          <div class="content-body">
            <div class="row">
              <div class="col-xs-12 ">
              
                <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  <div class="clearfix"></div>
                <div class="input-group primary"> <span class="input-group-addon"> <span class="arrow"></span> <i class="fa fa-search"></i> </span>
                  <input  class="form-control search-page-input inputAdvSearch" placeholder="Search" value="Search Users" type="submit"  onmousedown="toggle('menu', event);" onclick="toggle('menu', event);">
				  
				  <div class="clearfix"></div>
				  
				  <div id="menu" style="display: none" class=" col-md-8 col-xs-12 advsearch" >
				    
            <header class="panel_header">
              <h2 class="title pull-left">Advanced Search</h2>
            </header>
            <div class="content-body">
              <div class="row">
                <form action ="#" method="post">
                  <div class="col-xs-12">
                  <div class="form-group">
                    <label class="form-label" >Org Service Name</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="firstname" value="" class="form-control" >
                    </div>
                  </div>
                 
                </div>
			  <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                    <div class="text-left">
                      <button type="button" class="btn btn-primary">Search</button>
                    </div>
                  </div>
            </form>
            </div>
         
        </div>
        
				  </div>
                </div>
                <br>
              </div>
            </div>
            <div class="row ">
              <div class="col-xs-12">
			 <!-- <p class="text-right">1208 Users</p>-->
                <div class="search_data">
                  <div class="vertical">
                    <div class="tab-pane">
                      <table class="table  table-hover table-striped">
                        <tbody>
                         <thead>
                        <th></th>
                        <th>Org Name</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                         @if($services)
                      @foreach($services as $role)
                      
                       <tr id="{{ $role->org_ser_id }}1">
                          <td>{{ $role->org_name }}</td>
                          <td>{{ $role->service_name }}</td>
                         <td><?php if($role->status == 1) echo 'Active'; else echo 'Inactive'; ?></td>
                          
                          <td><a  href="{{route('orgservice.edit',$role->org_ser_id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                         <a onClick="showdiv({{ $role->org_ser_id }})" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
          
             <a href="{{route('orgservice.destroy',$role->org_ser_id)}}" class="delete" style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a></td>
                          </tr>
                          @endforeach
                      @else
                     <tr><td colspan="5" style="text-align:center">No Records Found</td> </tr>
                      @endif
                        
                     
                                                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
             @if($services)
                      @foreach($services as $row)
                                  
                          
        <section class="box closeopen" id="{{ $row->org_ser_id }}" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Org Name:</strong>{{ $row->org_name }}</div>
    <div><strong>Service Name:</strong>{{ $row->service_name }}</div>
      <div><strong>Service Status:</strong>@if($row->status == 1)Active @else InActive @endif</div>
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong>{{ $row->service_name }} Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $row->service_name }} </strong></a> <span>Updated by</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> {{ $row->updateduser }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-success"> <i class="fa fa-tint"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $row->service_name }} </strong></a> <span>Updated at</span></h2>
						<p><span class="text-muted small pull-right"><i class="fa fa-clock-o"></i> {{ $row->updated_at }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-secondary"> <i class="fa fa-suitcase"></i> </div>
                      <div class="timeline2-label">
                         <h2><a href="#"><strong>{{ $row->service_name }}  </strong></a> <span>Created at</span></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i>{{ $row->created_at }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $row->service_name }} </strong></a> <span>Create by</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> {{ $row->createduser }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry begin">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon"> <i class="fa fa-plus" style="color: #cccccc;position: relative;top: 3px;"></i> </div>
                    </div>
                  </article>
				  
                </div>
                
                <!-- end --> 
                
              </div>

		   </div>
            </div>
			</div>
			</div>
		  <div class="clearfix"></div>         
		 <br/>
		  
		  </div>
        </section>
    
      
	   @endforeach
                      @endif
	  </div>
      
      <!-- MAIN CONTENT AREA STARTS --> 
      
      <!-- MAIN CONTENT AREA ENDS --> 
    </section>
   


@endsection
