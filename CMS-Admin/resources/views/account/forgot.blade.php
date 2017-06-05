@extends('layouts.login')

@section('content')

<div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
              <h1>CMS</h1>
              
               <h3>Forgot Password</h3>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        


                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Password
                                </button>

                                <a class="btn btn-link" href="{{ url('/login') }}">Login</a>
                        </div>
                    </form>
                    
          </section>
        </div>

        
      </div>

@endsection
