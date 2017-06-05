@extends('layouts.app')
 @section('title') Edit User @stop
@section('content')



<section class="wrapper main-wrapper row" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Org Admins</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs"></div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{ trans('users.edit')}}</h2>
                <div class="actions panel_actions pull-right">
                	<a class="box_toggle fa fa-chevron-down"></a>
                    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                    <a class="box_close fa fa-times"></a>
                </div>
            </header>
            <div class="content-body">
    <div class="row">
    
   
  
{{ Form::model($users, ['role' => 'form','novalidate'=>'','name' => 'usereditform', 'route' => ['orgadmin.update', $users->id],'class'=>'form-horizontal','id'=>'general_validate', 'method' => 'PUT']) }}		
                          <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="parent_id" value="<?php echo Auth::user()->parent_id; ?>">	
  
  
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users-name">{{ trans('users.fname')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
      {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users-url">{{ trans('users.lname')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('users.mname')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       {{ Form::text('middlename', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                            </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.uname')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.email')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
  {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>

                  
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.gender')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                     <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select>
                        
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.phone')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        {{ Form::text('phone_number', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users-name">{{ trans('users.address1')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                          {{ Form::text('address_line1', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users-url">{{ trans('users.address2')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
{{ Form::text('address_line2', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users-url">{{ trans('users.city')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
            
                          {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('users.state')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="	account_status_id">{{ trans('users.country')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          {{ Form::text('country', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.zipcode')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          {{ Form::text('zipcode', null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.role')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                         {!! Form::select('role_id',  ['' => 'Select Role'] + $roles, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}
                      
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="users">{{ trans('users.org')}}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         {!! Form::select('org_id',  ['' => 'Select Organization'] + $orgtype, null, ['class' => 'form-control col-md-7 col-xs-12','required'=>'required']) !!}
                         
                        </div>
                      </div>

              
                      <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Update Details</button>
                        </div>
                      </div>
                     
                      
			  

      {{ Form::close() }}

                                                                                                  
                     </div>
                 </div>


    </div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
     <script type="text/javascript">
function evalGroup()
{
var group = document.usereditform.role_id;
for (var i=0; i<group.length; i++) {
if (group[i].checked)
break;
}
if (i==group.length)
{
$('#roleerror').show();
return false;
}else{
	$('#roleerror').hide();
}

}
</script>


<script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

@endsection
