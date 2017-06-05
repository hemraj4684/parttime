@extends('layouts.login')

@section('content')
<div class="container-fluid">
    <div class="login-wrapper row">
        <div id="login" class="login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4">
            <h1><a href="#" title="Login Page" tabindex="-1">{{ trans('login.heading') }}</a></h1>
    
            <form name="loginform" id="loginform" action="{{ url('/login') }}" method="post">

                        {{ csrf_field() }}

                <p>
                    <label for="user_login">Username<br />

                        <input type="email" name="email" id="user_login" class="input" placeholder="yourid@company.com" size="20" value="{{ old('email') }}"/></label>
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                </p>
                <p>
                    <label for="user_pass">Password<br />
                        <input type="password" name="password" id="user_pass" class="input" size="20" /></label>
                                @if ($errors->has('password'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                </p>
				<p>
                    <label for="user_pass">Select your Language<br />
					<select class="form-control input input-lg m-bot15" name="lang">
                <option>English</option>
                <option>Hindi</option>
                <option>Telugu</option>
            </select>
                </p>
				
				<div class="row">
				<div class="col-xs-6"> 
				 <p>
                    <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="icheck-minimal-aero" checked> Remember me</label>
                </p>
				
				</div>
				
				<div class="col-xs-6"> 
				<p id="nav">
                <a class="pull-right" href="{{ url('/password/forgot') }}" title="Password Lost and Found">Forgot password?</a>
               
            </p>

				
				</div>
				
				</div>
				
               
				
				 


                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-accent btn-block" value="Sign In" />
                </p>
            </form>

           
			<div class="clearfix"></div>
			


        </div>
    </div>
	<div class=" text-center login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4"  >
				 Copyright © 2016 CMS, Powerd By Aadhya Analytics. All rights reserved.
				 <br>
			</div>
</div>




@endsection
