@extends('layouts.app')
 @section('title') Edit User @stop
@section('content')



 <section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START --><h1 class="title">Update Password</h1><!-- PAGE HEADING TAG - END -->                            </div>

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
     @if ($errors->has('npmatch'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('npmatch') }}</strong>
                                    </span>
                                @endif
  </div> <!-- end .flash-message -->
                 <div class="col-xs-12 col-sm-12" >
                 
      <form class="form-horizontal" role="form" method="POST" action="{{ url('users/setupdate/') }}">
                        {{ csrf_field() }}
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="old_password">

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br/>
 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="new_password">

                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br/>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="confirm_password">

                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br/>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
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
