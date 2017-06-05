@extends('layouts.app')
 @section('title') Add Role @stop
@section('content')
 
 
<section class="wrapper main-wrapper row createRole" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Roles</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
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
        <div id="pills" class='wizardpills' >
                    <ul class="form-wizard nav nav-pills">
                        <li class="complete"><a href="#" data-toggle="tab" aria-expanded="false"><span>Permissions</span></a></li>
                        <li class="complete"><a href="#" data-toggle="tab" aria-expanded="false"><span>Privilileges</span></a></li>
                        <li class="active"><a href="#pills-tab3" data-toggle="tab" aria-expanded="true"><span>Roles</span></a></li>
                       
                    </ul>
                     <div id="bar" class="progress active">
                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
<div class="tab-content">
                        <div class="tab-pane active" id="pills-tab3">
                        
                       
                        <h4>Roles</h4><br/>
                          
                          
                     {{ Form::open( ['role' => 'form','class'=>'form-horizontal' ,'route' => ['roles.store'],'name' => 'usercreateform']) }}
     {{ csrf_field() }}
       <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">
  
  <!-- Accordion START -->  
			
              <div class="panel-group transparent" id="accordion-3" role="tablist" aria-multiselectable="true">
             	 <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo3">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo-3">
                                        <i class='fa fa-check'></i>  Organization Basic Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                                <div class="panel-body">
                      <div class="row">
                        
                        
                        <div class="clearfix"></div>	
                        <div class="clearfix"></div>
                      </div>
                    </div>
                            </div>
                        </div>
			  <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                  
                    <h4 class="panel-title">
                   
                     
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="false" aria-controls="collapseTwo-3">
                     
                      <i class='fa fa-check'></i> Address </a> </h4>
                    
                  </div>
                  
                  <div id="collapseOne-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                        	
                     
                     
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne3">
                    <h4 class="panel-title">
                     
                       <a class="collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-31" aria-expanded="false" aria-controls="collapseTwo-3">
                      <i class='fa fa-check'></i> Address </a> </h4>
                  </div>
                  <div id="collapseOne-31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne3">
				  
                    <div class="panel-body">
                      <div class="row">
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <!-- Accordion END -->
   
                    
                    
                <br>  <br>
                
                 
                
                     
                      <div class="clearfix"></div> 
                    
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn  btn-primary">Submit</button>
                        </div>
                      </div>

                   {{ Form::close() }}  
   							
         
            <div class="row">
              <div class="col-xs-12 ">
                <div class="input-group primary"> <span class="input-group-addon"> <span class="arrow"></span> <i class="fa fa-search"></i> </span>
                  <input  class="form-control search-page-input inputAdvSearch" placeholder="Search" value="Search Roles" type="submit"  onmousedown="toggle('menu', event);" onclick="toggle('menu', event);">
				  
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
                    <label class="form-label" >Role Name </label>
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
                        
                          @if($rolelist)
                      @foreach($rolelist as $row)
                      
                       <tr id="{{ $row->role_id }}1">
	                            <td>{{ $row->role_name }}</td>
                          <td>{{ $row->role_desc }}</td>
                     <td>
                          <a href="{{route('roles.edit',$row->role_id)}}" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                          <a onClick="showdiv({{ $row->role_id }})" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                          <a href="{{route('roles.destroy',$row->role_id)}}" class="delete" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn CmmTab" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                          
                          </td>
                          
                          </tr>
                          @endforeach
                      @endif
                                                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       
      
                        </div>
                        
                        

                        <div class="clearfix"></div>

                        <ul class="pager wizard">
                            <li class="previous"><a href="{{ url('/privileges/create') }}" class="btn btn-primary">Previous</a></li>
                           
                           </ul>
                    </div>
                </div>
          
      </div>
        </section>
        </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
     @if($rolelist)
 @foreach($rolelist as $row)
                      
        <section class="box closeopen" id="{{ $row->role_id }}" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Name:</strong>{{ $row->role_name }}</div>
    <div><strong>Description:</strong>{{ $row->role_desc }}</div>
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong>{{ $row->role_name }} Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $row->role_name }} </strong></a> <span>Updated by</span></h2>
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
                        <h2><a href="#"><strong>{{ $row->role_name }} </strong></a> <span>Updated at</span></h2>
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
                         <h2><a href="#"><strong>{{ $row->role_name }}  </strong></a> <span>Created at</span></h2>
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
                        <h2><a href="#"><strong>{{ $row->role_name }} </strong></a> <span>Create by</span></h2>
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
<script type="application/javascript">

function checkdata()
{
	if( document.MyForm.permission_action.value == "" )
         {
            document.MyForm.permission_action.focus() ;
			document.getElementById("input1").innerHTML = 'Please Enter Permission name';
            return false;
         }
		 
		 if( document.MyForm.permission_desc.value == "" )
         {
            alert( "Please provide your name!" );
            document.MyForm.permission_desc.focus() ;
          document.getElementById("input2").innerHTML = txt;
		    return false;
         }
		 return( true );	
}
</script>

  
@endsection
