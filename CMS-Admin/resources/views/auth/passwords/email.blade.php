@extends('layouts.login')

<!-- Main Content -->
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top:150px;">
                <div class="panel-heading"><h2>Reset Password</h2></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 <div class="flash-message">
   @if ($errors->has('question'))
                   
                    <p class="alert alert-danger">{{ $errors->first('question') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                   
                    @endif
                  
  </div> <!-- end .flash-message -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/forgotreset') }}">
                        {{ csrf_field() }}
                         
                        
                        
 To reset your password, Please fill the below questions:
  						<div class="form-group{{ $errors->has('question_id1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 1</label>

                            <div class="col-md-6">
                                 {!! Form::select('question_id1',  ['' => 'Select Questions'] + $questions, null, ['class' => 'form-control col-md-7 col-xs-12 mySelect','onchange'=>'toggleDisability(this);']) !!}
                         @if ($errors->has('question_id1'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    {{ Form::text('user_answer1', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                    @if ($errors->has('user_answer1'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('question_id2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 2</label>

                            <div class="col-md-6">
                                 {!! Form::select('question_id2',  ['' => 'Select Questions'] + $questions, null, ['class' => 'form-control col-md-7 col-xs-12 mySelect','onchange'=>'toggleDisability(this);']) !!}
                         @if ($errors->has('question_id2'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    {{ Form::text('user_answer2', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                    @if ($errors->has('user_answer2'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('question_id3') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 3</label>

                            <div class="col-md-6">
                                 {!! Form::select('question_id3',  ['' => 'Select Questions'] + $questions, null, ['class' => 'form-control col-md-7 col-xs-12 mySelect','onchange'=>'toggleDisability(this);']) !!}
                         @if ($errors->has('question_id3'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    {{ Form::text('user_answer3', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                    @if ($errors->has('user_answer3'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function toggleDisability(selectElement){
   //Getting all select elements
   var arraySelects = document.getElementsByClassName('mySelect');
   //Getting selected index
   var selectedOption = selectElement.selectedIndex;
   //Disabling options at same index in other select elements
   for(var i=0; i<arraySelects.length; i++) {
    if(arraySelects[i] == selectElement)
     continue; //Passing the selected Select Element

    arraySelects[i].options[selectedOption].disabled = true;
   }
  }
 </script>
             
@endsection
