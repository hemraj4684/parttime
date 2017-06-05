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
              <li> <a href="{{ url('/orgprofusers') }}">Professional Service Users</a> </li>
              
			  
            </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Professional Service Users	</h2>
			
                	
                    <a href="{{ url('/orgprofusers/create') }}" title="Add User" class="btn btn-primary btn-sm pull-right title addUser">Add Professional Service User</a>
                
          </header>
          <div class="content-body">
            <div class="row">
              <div class="col-xs-12 ">
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
                    <label class="form-label" >First Nanme</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="firstname" value="" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" >Last Nanme</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="lastname" value="" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" >Role</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="role" value="" class="form-control" >
                    </div>
                  </div>
				   <div class="form-group">
                    <label class="form-label" >Organization</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="org" value="" class="form-control" >
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
                        
                         @if($users)
                      @foreach($users as $user)
                      
                        <tr>
                        <td class="client-avatar"><img alt="" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" class="img-responsive img-circle" width="22px"> <i class="fa fa-circle online"> </i></td>
                          <td style="text-transform:capitalize;"><b>{{ $user->firstname }} {{ $user->lastname }}</b></td>
                          <td>{{ $user->org_name }}</td>
                  
                          <td><i class="fa fa-envelope"> </i>{{ $user->email }}</td>
                                                  
                          
                          <td>
                          <a href="{{route('users.edit',$user->id)}}" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                          <a onClick="showdiv({{ $user->id }})" style="cursor:pointer;">show</a>
                          <a href="{{route('users.destroy',$user->id)}}" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn CmmTab" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                          
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
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
        @if($users)
                      @foreach($users as $user)
                      
        <section class="box closeopen" id="{{ $user->id }}" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-4 text-center">
                
                <div class="m-b-sm"> <img alt="image" class="img-circle" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" style="width: 62px"> </div>
				<div><strong> {{ $user->firstname }} {{ $user->lastname }} </strong></div>
				<div>{{ $user->gender }} </div>
              </div>
              <div class="col-lg-8"> 
			  
			  <div><i class="fa fa-suitcase"></i> Professional Service User,Aadhya CMS</div>
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
                         <h2><a href="#"><strong>{{ $user->username }}  </strong></a> <span>Updated at</span></h2>
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
    function showdiv(x)
	{
		$(".closeopen").hide();
		$('.col-lg-12').addClass('col-lg-8').removeClass('col-lg-12')
		$("#rightdiv").show();
		$("#"+x).show();
	}
    </script>




@endsection
