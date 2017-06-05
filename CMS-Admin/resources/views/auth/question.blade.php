@extends('layouts.login')

<!-- Main Content -->
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top:150px;">
                <div class="panel-heading"><h2>Questions</h2></div>
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
                  
  </div> 
  Please Answer these Security Questions
    
            
 {{ Form::open( ['role' => 'form', 'route' => ['question.store'],'files'=>true]) }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">
                                <div class="row" >
                  <div class="col-md-12" >
                  
                  
                  <div class=" mbmargin form-group{{ $errors->has('question_id1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 1</label>

                            <div class="col-md-8">
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
				<br/>				  <div class="clearfix"></div>
                  <div class="mbmargin form-group{{ $errors->has('question_id2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 2</label>

                            <div class="col-md-8">
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
<br/>				  <div class="clearfix"></div>
                  <div class=" mbmargin form-group{{ $errors->has('question_id3') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 3</label>

                            <div class="col-md-8">
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
<br/>				  <div class="clearfix"></div>
                  <div class="mbmargin form-group{{ $errors->has('question_id4') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 4</label>

                            <div class="col-md-8">
                                 {!! Form::select('question_id4',  ['' => 'Select Questions'] + $questions, null, ['class' => 'form-control col-md-7 col-xs-12 mySelect','onchange'=>'toggleDisability(this);']) !!}
                         @if ($errors->has('question_id4'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    {{ Form::text('user_answer4', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                    @if ($errors->has('user_answer4'))
                    <span class="help-block">
                    <strong>The Answer field is required.</strong>
                    </span>
                    @endif
                            </div>
                        </div>
<br/>				  <div class="clearfix"></div>
                  <div class="mbmargin form-group{{ $errors->has('question_id5') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Question 5</label>

                            <div class="col-md-8">
                                 {!! Form::select('question_id5',  ['' => 'Select Questions'] + $questions, null, ['class' => 'form-control col-md-7 col-xs-12 mySelect','onchange'=>'toggleDisability(this);']) !!}
                         @if ($errors->has('question_id5'))
                    <span class="help-block">
                    <strong>Choose Question is Required</strong>
                    </span>
                    @endif
                    {{ Form::text('user_answer5', null, ['class' => 'form-control col-md-7 col-xs-12']) }}
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
            
                        <input type="submit" class="btn btn-primary btn-large"  value="Save">
                    </div>
					<div class="clearfix"></div>
                  </div>
			<div class="clearfix"></div>
			
        {{ Form::close() }}
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
          <style>
          .mbmargin 
		  {
			  margin-bottom:70px;
		  }
          </style>   
@endsection





