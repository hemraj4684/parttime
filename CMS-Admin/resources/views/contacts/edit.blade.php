@extends('layouts.app')
 @section('title') Edit Contact @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Edit Contact</h3>
                       
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div >{{ $error }}</div>
        @endforeach
    @endif
  {{ Form::model($contacts, ['role' => 'form','data-parsley-validate'=>'', 'route' => ['contacts.update', $contacts->contact_id], 'method' => 'PUT']) }}	
  <input type="hidden" name="user_created" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="user_updated" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	  <input type="hidden" name="client_id" value="<?php echo Auth::user()->id; ?>">	
                  
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
            {{ Form::label('firstname', ' First Name') }}
			{{ Form::text('firstname', null, ['class' => 'form-control','required'=>'required']) }}
    {{ Form::label('lastname', ' Last Name') }}
			{{ Form::text('lastname', null, ['class' => 'form-control','required'=>'required']) }}
    
       {{ Form::label('address', ' Address') }}
			{{ Form::text('address', null, ['class' => 'form-control','required'=>'required']) }}
       {{ Form::label('landline', ' Landline') }}
			{{ Form::text('landline', null, ['class' => 'form-control','required'=>'required']) }}
             {{ Form::label('zipcode', ' Zipcode') }}
			{{ Form::text('zipcode', null, ['class' => 'form-control','required'=>'required']) }}
            
            {{ Form::label('preferedContactBy', ' preferedContactBy') }}
			{{ Form::text('preferedContactBy', null, ['class' => 'form-control','required'=>'required']) }}
       
       
                              
                        </div><!-- column 1 -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-4">
       
            {{ Form::label('city', ' City Name') }}
			{{ Form::text('city', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('country', ' Country') }}
			{{ Form::text('country', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Mobile Number', ' Mobile Number') }}
			{{ Form::text('mobilenumber', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Whatsapp', ' Whatsapp') }}
			{{ Form::text('whatsapp', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('sms', ' SMS') }}
			{{ Form::text('sms', null, ['class' => 'form-control','required'=>'required']) }}

    

                        </div><!-- column 1 -->
                        

                        <div class="col-xs-12 col-sm-6 col-md-4">
            {{ Form::label('State', ' State') }}
			{{ Form::text('state', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Facebook Id', ' Facebook ID') }}
            {{ Form::text('facebook', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Twitter ID', ' Twitter ID') }}
            {{ Form::text('twitter', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('wEcastApp ', ' wEcastApp') }}
            {{ Form::text('wEcastApp', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('socialMedia', ' SocialMedia') }}
            {{ Form::text('socialMedia', null, ['class' => 'form-control','required'=>'required']) }}
                                                             
                        </div><!-- column 1 -->
                        

                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <p>&nbsp;</p>
                            <div class="">
                                <label>
{{ Form::checkbox('status', '1') }} Active
                                                       </label>
                            </div>                    
                            <p>&nbsp;</p> 
                            
                                <div class='form-group'>
          {{ Form::submit('Update Contact',array('class'=>'btn btn-small btn-info')) }}
    </div>
            </div>
                     </div><!-- row ends here -->
                    
 {{ Form::close() }}
                        
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
