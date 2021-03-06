@extends('layouts.app')
 @section('title') Users @stop
@section('content')

	 <?php $curent_role = Auth::user()->role_id; ?>
<section class="wrapper main-wrapper row">
      <div class="col-xs-12">
        <div class="page-title">
          <div class="pull-left"> 
            <!-- PAGE HEADING TAG - START -->
            <h1 class="title">Organization Admins </h1>
            <!-- PAGE HEADING TAG - END --> </div>
          <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/orgadmin') }}">Organization Admins</a> </li>
              
			  
            </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Organization Admins	</h2>
						<?php if($curent_role == 1) {?>
                	
                    <a href="{{ url('/orgadmin/adduser') }}" title="Add Organization Admin" class="btn btn-primary btn-sm pull-right title addUser">Add Organization Admin</a>
                   <?php }?>
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
 <form method="POST" id="searchform" action="{{ url('/orgadmin/searchres') }}" role="form"  >	
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                       <div class="input-group primary"> 
                  <input  class="form-control" placeholder="Search" name="search" type="text" >
                  
				
                   <span class="input-group-addon" id="basic-addon1" onClick="submitform()" style="cursor:pointer;">
      
                     <span class="arrow"></span><i class="fa fa-search"></i></span>
                   
                     <span class="input-group-addon btn-advsearch" id="basic-addon1" style="border-left:solid 1px #fff;" onclick="toggle('menu', event);"><span class="arrow"></span><i class="fa fa-ellipsis-v"></i></span>
				  <div class="clearfix"></div>
				  
				  
                </div>
                		  <div class="clearfix"></div>
                  	  
                  
                  
     		 </form>
				
                  <div id="menu" style="display: none" class=" col-md-8 col-xs-12 advsearch" >
				    
            <header class="panel_header">
              <h2 class="title pull-left">Advanced Search</h2>
            </header>
            <div class="content-body">
              <div class="row">
     <form method="POST" action="{{ url('/orgadmin/adsearch') }}" role="form"  >	
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="col-xs-12">
				  <div class="form-group">
                    <label class="form-label" >Organization</label>
                    <span class="desc"></span>
                    <div class="controls">
                       {!! Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label" >Role</label>
                    <span class="desc"></span>
                    <div class="controls">
                     {!! Form::select('role_id',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                    </div>
                  </div>
                 
                </div>
			  <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                    <div class="text-left">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </div>
            </form>
            </div>
         
        </div>
        
				  </div>
            
                <br><br><br>
  <div class="clearfix"></div>
                
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
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                       
                         @if($users)
                      @foreach($users as $user)
                      
                      <tr id="{{ $user->id }}1">
                        <td class="client-avatar"><img alt="" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" class="img-responsive img-circle" width="22px"> <i class="fa fa-circle offline"> </i></td>
                          <td style="text-transform:capitalize;"><b>{{ $user->firstname }} {{ $user->lastname }}</b></td>
                          <td>{{ $user->org_name }}</td>
                  
                          <td><i class="fa fa-envelope"> </i>{{ $user->email }}</td>
                          <td><?php if($user->status == 1) echo 'Active'; else echo 'Inactive'; ?></td>
                                                 
                          
                          <td>
                          	<?php if($curent_role == 1) {?>
                                <a href="{{route('orgadmin.edit',$user->id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                                <?php }?>
                            <a onClick="showdiv({{ $user->id }})" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                            	<?php if($curent_role == 1) {?>
                          <a href="{{route('orgadmin.destroy',$user->id)}}" class="delete" style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                          <?php }?>
                          </td>
                          
                          </tr>
                          @endforeach
                      @else
                     <tr><td colspan="7" style="text-align:center">No Records Found</td> </tr>
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
        @if($users)
                      @foreach($users as $user)
                      
        <section class="box closeopen" id="{{ $user->id }}" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-xs-12 ">
                <div class="text-center">
                <div class="m-b-sm"> <img alt="image" class="img-circle" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" style="width: 62px"> </div>
				<div><strong> {{ $user->firstname }} {{ $user->lastname }} </strong></div>
				<div>{{ $user->gender }} </div>
                <span class="btn btn-success btn-xs">@if($user->status == 1)Active @else InActive @endif</span>
              </div>
			    <div class="clearfix"></div>
			  <hr>
			  <div><i class="fa fa-suitcase"></i> Organization Admin</div>
			  <div><i class='fa fa-home'></i> {{ $user->address_line1 }},{{ $user->address_line2 }}</div>
              <div><i class='fa fa-envelope'></i> {{ $user->email }}</div>
			  <div><i class='fa fa-phone'></i>&nbsp<span>{{ $user->phone_number }},</span></div>
              </div>
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong>{{ $user->username }} Timeline </strong></p>
                <div class="timeline2-centered">
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-success"> <i class="fa fa-tint"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $user->username }} </strong></a> <span>Updated address</span></h2>
						<p><span class="text-muted small pull-right"><i class="fa fa-clock-o"></i> {{ $user->updated_at }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-secondary"> <i class="fa fa-suitcase"></i> </div>
                      <div class="timeline2-label">
                         <h2><a href="#"><strong>{{ $user->username }}  </strong></a> <span>Updated First Name</span></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i>{{ $user->updated_at }}</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $user->username }} </strong></a> <span>Last logged in</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> 4:10 pm - 12.06.2016</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-warning"> <i class="fa fa-camera"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong>{{ $user->username }} </strong></a> <span>changed his</span> <a href="#">Profile Picture</a></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> 4:10 pm - 12.06.2016</span></p>
						<div class="clearfix"></div>
						<br/>
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
   
  <script>
function submitform()
{

$("#searchform").submit();
}
</script>

@endsection
