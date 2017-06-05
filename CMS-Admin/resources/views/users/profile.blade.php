@extends('layouts.app')
 @section('title') Show User @stop
@section('content')

 <section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START --><h1 class="title">User Profile</h1><!-- PAGE HEADING TAG - END -->                            </div>

                            <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>User Profile</strong>
                        </li>
                    </ol>
                </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    

<section class="box nobox ">
                <div class="content-b`ody">  
                  <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="uprofile-image">
                <img alt="" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" class="img-responsive">
            </div>
            <div class="uprofile-name">
                <h3>
                <a href="#" style="text-transform:capitalize">{{ $user->firstname }} {{ $user->firstname }}</a>
                    <!-- Available statuses: online, idle, busy, away and offline -->
                  
                </h3>
                <p class="uprofile-title">
				<span> {{ $user->gender}}</span>
				
				</p>
				
            </div>
            <div class="uprofile-info">
			
			<div class="uprofile_wall_posts col-xs-12">
			<div class="comment row">
			
			<div class="pic-wrapper col-xs-1 text-center">
                                    <i class='fa fa-suitcase'></i> 
                                </div>
                                <div class="info-wrapper col-xs-10 col-sm-11">					
                                   
                                    <div class="info text-muted">
                                        <span> {{ $user->rolename}}</span>
                                    </div>	
                                </div>								
				
                            </div>
							<div class="clearfix"></div>
                                <div class="pic-wrapper col-xs-1 text-center">
                                    <i class='fa fa-home'></i> 
                                </div>
                                <div class="info-wrapper col-xs-10 col-sm-11">					
                                   
                                    <div class="info text-muted">
                                        <span class="line1"> {{ $user->address_line1}}</span>, <span> {{ $user->address_line2}}</span>,
             <span class="city">  {{ $user->city}}</span>, <span class="state">  {{ $user->state}} <span class="pin">{{ $user->zipcode}}</span></span>
			 <br/>
			 <abbr title="Phone">Phone:</abbr><span> {{ $user->phone_number}}</span>
                                    </div>	
                                 

                                </div>	
                                <div class="clearfix"></div>	
								<div class="pic-wrapper col-xs-1 text-center">
                                    <i class='fa fa-envelope'></i> 
                                </div>
                                <div class="info-wrapper col-xs-10 col-sm-11">	
                                    <div class="text-muted">
                                        <span> {{ $user->email}}</span>
                                    </div>	
                                </div>
<div class="clearfix"></div><br/>

                                									
								
							<div class=" uprofile-social">

                <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>

            </div> 	
<div class="clearfix"></div><br/>

			</div>
			
			
                <div class="clearfix"></div>
            </div>
        </div>		
		
		 
                <div class="col-md-8 col-sm-8 col-xs-12">
                
                 <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
     @if ($errors->has('npmatch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('npmatch') }}</strong>
                                    </span>
                                @endif
  </div> <!-- end .flash-message -->
                    <div class="panel-group panel-default" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne1">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-check"></i> Profile Settings
                                    </a>
                                </h4>
                            </div>
                             {{ Form::model($user, ['role' => 'form', 'route' => ['users.profileupdate', $user->id],'class'=>'form-horizontal', 'method' => 'PUT']) }}
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="parent_id" value="<?php echo Auth::user()->parent_id; ?>">	
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne1">
                                <div class="panel-body">
                                    <div class="row ">
                		  <div class="col-xs-12 col-md-6">
					    
						
						 <div class="">
                    <label class="form-label" >{{ trans('users.fname')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('firstname', null, ['class' => 'form-control']) }}
                    @if ($errors->has('firstname'))
                    <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                    @endif
                    
                    </div>
                  </div>
                  
                   <div class="">
                    <label class="form-label" >{{ trans('users.mname')}}<span class="required"></span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('middlename', null, ['class' => 'form-control']) }}
                    @if ($errors->has('middlename'))
                    <span class="help-block">
                    <strong>{{ $errors->first('middlename') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
                  
                  <div class="">
                    <label class="form-label" >{{ trans('users.gender')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                     
                       
                       {!! Form::select('gender',  ['' => 'Choose Gender','male'=>'Male','female'=>'Female'], null, ['class' => 'form-control']) !!}
                    @if ($errors->has('gender'))
                    <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
                  </div>
					 <div class="col-xs-12 col-md-6">
					    	
							<div class="">
                    <label class="form-label" >{{ trans('users.lname')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                    @if ($errors->has('lastname'))
                    <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
				   
				  <div class="">
                    <label class="form-label" >{{ trans('users.email')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      {{ Form::text('email', null, ['class' => 'form-control','readonly'=>'readonly']) }}
                     @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif


                    </div>
                  </div>
                  <div class="">
                    <label class="form-label" >{{ trans('users.phone')}}<span class="required">*</span></label> <span class="desc">e.g. "(534) 253-5353"</span>
                    <span class="desc"></span>
                    <div class="controls">
                      {{ Form::text('phone_number', null, ['class' => 'form-control','placeholder'=>'(999) 999-9999']) }}
                    @if ($errors->has('phone_number'))
                    <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
						 </div><br>
                         <div class="clearfix" style="margin-top:10px;"></div><hr>
                         <div class="clearfix"></div>				
						
						
			          <div class="col-xs-12 col-md-6" >
                     <div class="">
                    <label class="form-label" >{{ trans('users.address1')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('address_line1', null, ['class' => 'form-control']) }}
                    @if ($errors->has('address_line1'))
                    <span class="help-block">
                    <strong>{{ $errors->first('address_line1') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
                 
                  <div class="">
                    <label class="form-label" >{{ trans('users.city')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('city', null, ['class' => 'form-control']) }}
                    @if ($errors->has('city'))
                    <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
                  
                  <div class="">
                    <label class="form-label" >{{ trans('users.country')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('country', null, ['class' => 'form-control']) }}
                    @if ($errors->has('country'))
                    <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>			   
				   
					
				  </div>
                  
				  
				   <div class="col-xs-12 col-md-6" >
				 <div class="">
                    <label class="form-label" >{{ trans('users.address2')}}<span class="required"></span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      {{ Form::text('address_line2', null, ['class' => 'form-control']) }}
                    @if ($errors->has('address_line2'))
                    <span class="help-block">
                    <strong>{{ $errors->first('address_line2') }}</strong>
                    </span>
                    @endif
                      
                    </div>
                  </div>
				   
				  <div class="">
                    <label class="form-label" >{{ trans('users.state')}}<span class="required">*</span></label>
                    <span class="desc"></span>
                    <div class="controls">
                      {{ Form::text('state', null, ['class' => 'form-control']) }}
                    @if ($errors->has('state'))
                    <span class="help-block">
                    <strong>{{ $errors->first('state') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
                  <div class="">
                    <label class="form-label" >{{ trans('users.zipcode')}}<span class="required">*</span></label> 
                    <span class="desc"></span>
                    <div class="controls">
                       {{ Form::text('zipcode', null, ['class' => 'form-control']) }}
                    @if ($errors->has('zipcode'))
                    <span class="help-block">
                    <strong>{{ $errors->first('zipcode') }}</strong>
                    </span>
                    @endif

                    </div>
                  </div>
               
        			</div>
		<div class="clearfix"></div>
		
        		<br/>

                        <div class="col-xs-12 col-sm-9 col-md-12 padding-bottom-30">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    
                            
                            </div>
                            </div>
                        </div>
                        
                          {{ Form::close() }}
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo1">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-check"></i> Update Password
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo1">
                                <div class="panel-body">
                                    	<div class="row ">
<form class="form-horizontal" role="form" method="POST" action="{{ url('users/setupdate/') }}">
                        {{ csrf_field() }}
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="form-label">New Password</label>
                            <span class="desc"></span>
                            <div class="controls">
                               <input  type="password" class="form-control" name="new_password">

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <span class="desc"></span>
                            <div class="controls">
         <input type="password" class="form-control" name="confirm_password">

                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-refresh"></i> Reset Password
                                        </button>
                                    </div>
                                </div>
                        </div>
                 </div>
                 </form>

    									</div>
       
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" style="display:none;">
                            <div class="panel-heading" role="tab" id="headingThree1">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-check"></i>Update Profile Picture
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree1">
                      <div class="panel-body">
								
       
								<div class="row">
								
						 <form method="POST" action="{{ url('/users/addimage/') }}" role="form" class="form-horizontal" enctype="multipart/form-data" >	
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
    
   		                <div class="col-xs-12  padding-bottom-30">
						
						
						
								<div class="form-group">
                            <label class="form-label">Profile Image</label>
                            <span class="desc"></span>
                              <div class="controls">
                                <input type="file" name="user_image" class="form-control">
                            </div>
                        </div>
						<div class="clearfix"></div>
						
						
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </div>
						</form>
						
	                		    </div>
                                </div>
                            </div>
                        </div>
                         <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree4">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-check"></i> Security Questions
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree4">
                                <div class="panel-body">
                                    <div class="row ">
		<form method="POST" action="{{ url('/question/update') }}" role="form" class="form-horizontal">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">
  
  <input  name="oldq1" type="hidden" value="<?php echo $exuser[0]->user_question_id;?>">
  <input  name="oldq2" type="hidden" value="<?php echo $exuser[1]->user_question_id;?>">
  <input  name="oldq3" type="hidden" value="<?php echo $exuser[2]->user_question_id;?>">
  <input  name="oldq4" type="hidden" value="<?php echo $exuser[3]->user_question_id;?>">
  <input  name="oldq5" type="hidden" value="<?php echo $exuser[4]->user_question_id;?>">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="form-label">Security Question 1?</label>
                            <span class="desc"></span>
							
							<div class="controls">
                      <select class="form-control input-md m-bot15" name="question_id1">
							 <?php 
								 foreach($questions as $ques) {?>
<option value="<?php echo $ques->question_id;?>" <?php if($ques->question_id == $exuser[0]->question_id) { echo 'selected="selected"'; } ?>><?php echo $ques->question_desc;?></option>
                                 <?php }?>
						</select>
                        @if ($errors->has('question_id1'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    </div>
                            <div class="controls">
                                <input type="text"  class="form-control userAns" name="user_answer1" value="<?php echo $exuser[0]->user_answer;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label">Security Question 2?</label>
                            <span class="desc"></span>
							
							<div class="controls">
                      <select class="form-control input-md m-bot15" name="question_id2">
							 <?php 
								 foreach($questions as $ques) {?>
<option value="<?php echo $ques->question_id;?>" <?php if($ques->question_id == $exuser[1]->question_id) { echo 'selected="selected"'; } ?>><?php echo $ques->question_desc;?></option>
                                 <?php }?>
						</select>
                        @if ($errors->has('question_id2'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    </div>
                            <div class="controls">
                                <input type="text"  class="form-control userAns" name="user_answer2" value="<?php echo $exuser[1]->user_answer;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label">Security Question 3?</label>
                            <span class="desc"></span>
							
							<div class="controls">
                      <select class="form-control input-md m-bot15" name="question_id3">
							 <?php 
								 foreach($questions as $ques) {?>
<option value="<?php echo $ques->question_id;?>" <?php if($ques->question_id == $exuser[2]->question_id) { echo 'selected="selected"'; } ?>><?php echo $ques->question_desc;?></option>
                                 <?php }?>
						</select>
                        @if ($errors->has('question_id3'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    </div>
                            <div class="controls">
                                <input type="text"  class="form-control userAns" name="user_answer3" value="<?php echo $exuser[2]->user_answer;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label">Security Question 4?</label>
                            <span class="desc"></span>
							
							<div class="controls">
                      <select class="form-control input-md m-bot15" name="question_id4">
							 <?php 
								 foreach($questions as $ques) {?>
<option value="<?php echo $ques->question_id;?>" <?php if($ques->question_id == $exuser[3]->question_id) { echo 'selected="selected"'; } ?>><?php echo $ques->question_desc;?></option>
                                 <?php }?>
						</select>
                        @if ($errors->has('question_id4'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    </div>
                            <div class="controls">
                                <input type="text"  class="form-control userAns" name="user_answer4" value="<?php echo $exuser[3]->user_answer;?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label">Security Question 5?</label>
                            <span class="desc"></span>
							
							<div class="controls">
                      <select class="form-control input-md m-bot15" name="question_id5">
							 <?php 
								 foreach($questions as $ques) {?>
<option value="<?php echo $ques->question_id;?>" <?php if($ques->question_id == $exuser[4]->question_id) { echo 'selected="selected"'; } ?>><?php echo $ques->question_desc;?></option>
                                 <?php }?>
						</select>
                        @if ($errors->has('question_id5'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    </div>
                            <div class="controls">
                                <input type="text"  class="form-control userAns" name="user_answer5" value="<?php echo $exuser[4]->user_answer;?>">
                            </div>
                        </div>
                     
                            
                            
                        <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                            <div class="text-left">
                                <input type="submit" class="btn btn-primary btn-large"  value="Update">
                            </div>
                        </div>
			    </div>
                   
    </div>
 </form>

    </div>
       
                                </div>
                            </div>
                        </div>
						
						
						 

                </div>
  </div>
  </div>   </div>
  </div>
  </section>  


<!-- MAIN CONTENT AREA ENDS -->
    </section>

   

@endsection
