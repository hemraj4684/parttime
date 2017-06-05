@extends('layouts.app')
 @section('title') Edit Location @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Edit Location</h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				{{ Form::model($locations, ['role' => 'form','data-parsley-validate'=>'', 'route' => ['locations.update', $locations->location_id], 'method' => 'PUT']) }}		
  <input type="hidden" name="user_created" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="user_updated" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="fullname">Locaiton Name :</label>
                       {{ Form::text('loc_name', null, ['class' => 'form-control','required'=>'required']) }}
       
                        </div>
                           <div class="clearfix"></div>                 
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="fullname">Alias Name :</label>
                     
				       {{ Form::text('loc_alias_name', null, ['class' => 'form-control','required'=>'required']) }}
                        </div>
                        <div class="clearfix"></div>                 
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="fullname">Zip Code :</label>
                     
				       {{ Form::text('zipcode', null, ['class' => 'form-control','required'=>'required']) }}
                        </div>                            
                    </div><!-- row ends here -->
                    
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    
                    <br/>
                    
                    <div class="clearfix"></div>                                         
                    <div class='form-group'>
          {{ Form::submit('Update Message',array('class'=>'btn btn-small btn-success')) }}
    </div>
                          {{ Form::close() }}  
                        
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
