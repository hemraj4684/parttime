@extends('layouts.app')
 @section('title') Edit Service @stop
@section('content')
	 <?php $curent_role = Auth::user()->role_id; ?>

<section class="wrapper main-wrapper row permitions" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Services</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/services/create') }}">Services</a> </li>
              
			   <li class="active">
                            <strong>Edit Service</strong>
                        </li>
            </ol>
          </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
     <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
		<div class="content-body">
		<div class="clearfix"></div>	
		<br>        
   <h4>Edit Service</h4><br/>
                          
							
 {{ Form::model($services, ['role' => 'form','enctype'=>'multipart/form-data', 'class'=>'form-horizontal' ,'route' => ['services.update', $services->service_id], 'method' => 'PUT']) }}
 


  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
  
  
                  <div class="col-xs-12 col-sm-6">
                  
                  
                  <div class="form-group">
                    <label class="form-label" >{{ trans('services.heading1')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
                     {{ Form::text('service_name', null, ['class' => 'form-control']) }}
                      @if ($errors->has('service_name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('service_name') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" >{{ trans('services.heading2')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
                     {{ Form::text('service_desc', null, ['class' => 'form-control']) }}  
                      @if ($errors->has('service_desc'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('service_desc') }}</strong>
                                    </span>
                                @endif
                     </div>
                  </div>
                        <div class="clearfix"></div>
                   <div class="form-group">
                    <label class="form-label" >{{ trans('services.logo')}}</label>
                    <span class="desc"></span>
                    <div class="controls">
                    <img alt="image"  src="{{ URL::asset('public/services/'.$services->service_logo) }}" style="width: 62px">
                 <input type="file" name="service_logo" class="form-control col-md-7 col-xs-12">          @if ($errors->has('service_logo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('service_logo') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
             
                   <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-5 col-md-offset-5 padding-bottom-30">
                    <div class="text-left">
            
                        <input type="submit" class="btn btn-primary btn-large"  value="Update">
                    </div>
					<div class="clearfix"></div>
                  </div>
				   
				   
				   </div>
                    
					
				
                {{ Form::close() }}
          	<div class="clearfix"></div> 
              <div >
			  <br>
            <div class="row">
                        <div class="col-xs-12 ">
               <form method="POST" id="searchform" action="{{ url('/services/searchres') }}" role="form"  >	
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                 <div class="input-group primary"> 
                  <input  class="form-control" placeholder="Search" name="search" type="text" >
                  
				
                   <span class="input-group-addon" id="basic-addon1" onClick="submitform()" style="cursor:pointer;">
      
                     <span class="arrow"></span><i class="fa fa-search"></i></span>
                   
                     
				  <div class="clearfix"></div>
				  
				  
                </div>
                		 </form>
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
                        
                        <th>Name</th>
                        <th>Description</th>
                        <th>Logo</th>
                         <th>Actions</th>
                        </thead>
                          @if($list)
                      @foreach($list as $row)
                                            
                                <tr id="{{ $row->service_id }}1">
                          <td>{{ $row->service_name }}</td>
                          <td>{{ $row->service_desc }}</td>
                          <td><img alt="image" class="img-circle" src="{{ URL::asset('public/services/'.$row->service_logo) }}" style="width: 62px"> </td>
                          
                          <td><a  href="{{route('services.edit',$row->service_id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                            <a onClick="showdiv({{ $row->service_id }})" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
            
                          <a href="{{route('services.destroy',$row->service_id)}}" class="delete" style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a></td>
                          </tr>
   				 @endforeach
                          @else
                     <tr><td colspan="3" style="text-align:center">No Records Found</td> </tr>
                      @endif
                                               
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
            
          
        </div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
             @if($list)
                      @foreach($list as $row)
                                  
                          
        <section class="box closeopen" id="{{ $row->service_id }}" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Name:</strong>{{ $row->service_name }}</div>
    <div><strong>Description:</strong>{{ $row->service_desc }}</div>
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
      
      
    


<!-- MAIN CONTENT AREA ENDS -->
    </section>

<script>
function submitform()
{

$("#searchform").submit();
}
</script>
@endsection





