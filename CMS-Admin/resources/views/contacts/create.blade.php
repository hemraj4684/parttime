@extends('layouts.app')
 @section('title') Add Contact @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Bulk upload Contacts</h3>
                       
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
   {{ Form::open( ['role' => 'form','data-parsley-validate'=>'', 'route' => ['contacts.store'],'files'=>true]) }}
  <input type="hidden" name="user_created" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="user_updated" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="userparent" value="<?php echo Auth::user()->parent_id; ?>">
  <input type="hidden" name="client_id" value="<?php echo Auth::user()->client_id; ?>">	
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">

                          <input type="file" id="fileUpload" name="contacts" class="form-control col-md-7 col-xs-12" required="required">
        <div style="clear:both"><br/></div>
                        <span id="lblError" style="color: red;"></span>
                       	   
                        </div><!-- column 1 -->
                        
                              </div><br/>  <div class='form-group'>

                         <input type="submit" class="btn btn-primary btn-large" onclick="return ValidateExtension()" name="bulksubmit"  value="Upload Data">
                             </div>



    {{ Form::close() }}
    
  
    <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Add Single Contact</h3>
                       
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
    {{ Form::open( ['role' => 'form', 'route' => ['contacts.store'],'files'=>true]) }}
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
            
      		{{ Form::label('zipcode', ' Zipcode') }}
			{{ Form::text('zipcode', null, ['class' => 'form-control','required'=>'required']) }}
            
            
       
       
                              
                        </div><!-- column 1 -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-4">
       
            {{ Form::label('city', ' City') }}
			{{ Form::text('city', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('country', ' Country') }}
			{{ Form::text('country', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Mobile Number', ' Mobile Number') }}
			{{ Form::text('mobilenumber', null, ['class' => 'form-control','required'=>'required']) }}
			{{ Form::label('landline', ' Landline') }}
			{{ Form::text('landline', null, ['class' => 'form-control','required'=>'required']) }}
                  
    

                        </div><!-- column 1 -->
                        

                        <div class="col-xs-12 col-sm-6 col-md-4">
            {{ Form::label('State', ' State') }}
			{{ Form::text('state', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Facebook Id', ' Facebook ID') }}
            {{ Form::text('facebook', null, ['class' => 'form-control','required'=>'required']) }}
            {{ Form::label('Twitter ID', ' Twitter ID') }}
            {{ Form::text('twitter', null, ['class' => 'form-control','required'=>'required']) }}
                                                                     
                        </div><!-- column 1 -->
                        

                        
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <p>&nbsp;</p>
        {{ Form::label('preferedContactBy', ' Prefered Contact By') }}<br/>
			{{ Form::checkbox('preferedContactBy[]', 'sms', ['class' => 'form-control']) }}SMS
            {{ Form::checkbox('preferedContactBy[]', 'email', ['class' => 'form-control']) }}EMail
            {{ Form::checkbox('preferedContactBy[]', 'socialmedia') }}Social Media
            {{ Form::checkbox('preferedContactBy[]', 'wEcastApp') }}wEcastApp
             {{ Form::checkbox('preferedContactBy[]', 'whatsapp') }}Whatsapp
</div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                           <p>&nbsp;</p>
     
                                <label>
{{ Form::checkbox('status', '1') }} Active
                                                       </label>
                            </div>                    
                            
         
            </div>
                     </div>
                       <div class='form-group'>
         <input type="submit" class="btn btn-primary btn-large" name="submit"  value="Add Contact">
    </div>

    {{ Form::close() }}

                        </div>                                                                   
                    </div>
                    

                        
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
	
<script type="text/javascript">
    function ValidateExtension() {
        var allowedFiles = [".csv"];
        var fileUpload = document.getElementById("fileUpload");
        var lblError = document.getElementById("lblError");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.value.toLowerCase())) {
            lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
            return false;
        }
        lblError.innerHTML = "";
        return true;
    }
</script>