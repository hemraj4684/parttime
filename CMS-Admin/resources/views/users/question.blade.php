@extends('layouts.app')
 @section('title') Edit User Questions @stop
@section('content')



 <section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START --><h3 class="title">Update Security Questions</h3><!-- PAGE HEADING TAG - END -->                            </div>

                            <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                        </li>
                       
                        <li class="active">
                            <strong>Update Password</strong>
                        </li>
                    </ol>
                </div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    

<div class="col-lg-12">
    <section class="box nobox ">
                <div class="content-body"> 
                
                   <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="uprofile-image">
                <img alt="" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" class="img-responsive">
            </div>
            <div class="uprofile-name">
                <h3>
                    <a href="#" style="text-transform:capitalize">{{ $user->firstname }} {{ $user->firstname }}</a>
                    <!-- Available statuses: online, idle, busy, away and offline -->
                    <span class="uprofile-status online"></span>
                </h3>
                <p class="uprofile-title">&nbsp;</p>
            </div>
            <div class="uprofile-info" style="display:none">
                <ul class="list-unstyled">
                    <li><i class='fa fa-home'></i> New York, USA</li>
                    <li><i class='fa fa-user'></i> 340 Contacts</li>
                    <li><i class='fa fa-suitcase'></i> Tech Lead, YIAM</li>
                </ul>
            </div>
            <div class="uprofile-buttons">
                <a class="btn btn-md btn-primary" href="{{ url('/users/'.Auth::user()->id) }}/profile">User Profile</a>
                <a class="btn btn-md btn-primary" href="{{ url('/question/'.Auth::user()->id) }}/edit">Change Security Questions</a>
            </div>
            <div class=" uprofile-social">

                <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>

            </div> 

        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">

            <div class="uprofile-content row">
                <div class="enter_post col-xs-12">

                     <div class="row">
                <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
     @if ($errors->has('error'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('error') }}</strong>
                                    </span>
                                @endif
  </div> <!-- end .flash-message -->
                 <div class="col-xs-12 col-sm-12" >
                 
      Please Answer these Security Questions
    
            

<form method="POST" action="{{ url('/question/update') }}" role="form" class="form-horizontal">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">
  
  <input  name="oldq1" type="hidden" value="<?php echo $exuser[0]->user_question_id;?>">
  <input  name="oldq2" type="hidden" value="<?php echo $exuser[1]->user_question_id;?>">
  <input  name="oldq3" type="hidden" value="<?php echo $exuser[2]->user_question_id;?>">
  <input  name="oldq4" type="hidden" value="<?php echo $exuser[3]->user_question_id;?>">
  <input  name="oldq5" type="hidden" value="<?php echo $exuser[4]->user_question_id;?>">
                                <div class="row" >
                  <div class="col-md-12" >
                  
                  
                  <div class=" mbmargin form-group{{ $errors->has('question_id1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 1</label>

                            <div class="col-md-8">
                              
                                 <select name="question_id1" class="form-control">
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
                    <input class="form-control col-md-7 col-xs-12" name="user_answer1" type="text" value="<?php echo $exuser[0]->user_answer;?>">
                    
                    @if ($errors->has('user_answer1'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
                        <br/>
				  <div class="clearfix"></div>
				  <br/>
                  <div class=" mbmargin form-group{{ $errors->has('question_id2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 2</label>

                            <div class="col-md-8">
                                <?php 
								// print_r($exuser);exit;
								 ?>
                                 <select name="question_id2" class="form-control">
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
                    <input class="form-control col-md-7 col-xs-12" name="user_answer2" type="text" value="<?php echo $exuser[1]->user_answer;?>">
                    
                    @if ($errors->has('user_answer2'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
				 <br/>
				  <div class="clearfix"></div> <br/>
                  <div class=" mbmargin form-group{{ $errors->has('question_id3') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 3</label>

                            <div class="col-md-8">
                                <?php 
								// print_r($exuser);exit;
								 ?>
                                 <select name="question_id3" class="form-control">
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
                    <input class="form-control col-md-7 col-xs-12" name="user_answer3" type="text" value="<?php echo $exuser[2]->user_answer;?>">
                    
                    @if ($errors->has('user_answer3'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
				 <br/>
				  <div class="clearfix"></div> <br/>
                  <div class=" mbmargin form-group{{ $errors->has('question_id4') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 4</label>

                            <div class="col-md-8">
                                <?php 
								// print_r($exuser);exit;
								 ?>
                                 <select name="question_id4" class="form-control">
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
                    <input class="form-control col-md-7 col-xs-12" name="user_answer4" type="text" value="<?php echo $exuser[3]->user_answer;?>">
                    
                    @if ($errors->has('user_answer4'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
				 <br/>
				  <div class="clearfix"></div> <br/>
                  <div class=" mbmargin form-group{{ $errors->has('question_id5') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 5</label>

                            <div class="col-md-8">
                                <?php 
								// print_r($exuser);exit;
								 ?>
                                 <select name="question_id5" class="form-control">
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
                    <input class="form-control col-md-7 col-xs-12" name="user_answer5" type="text" value="<?php echo $exuser[4]->user_answer;?>">
                    
                    @if ($errors->has('user_answer5'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
				  
					
                  </div>
                   
				  
				  <br/>
				  <div class="clearfix"></div>
				  
              
                  
               </div>
               
                <hr>
			  <div class="col-xs-5 col-md-offset-5 padding-bottom-30">
                    <div class="text-left">
            
                        <input type="submit" class="btn btn-primary btn-large"  value="Update">
                    </div>
					<div class="clearfix"></div>
                  </div>
			<div class="clearfix"></div>
			
     </form>
                  
                </div>

   </div>

        </div>
    </div>
    </div>
    </div></div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>


</div>
@endsection
