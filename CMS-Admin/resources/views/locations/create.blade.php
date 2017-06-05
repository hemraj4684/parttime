@extends('layouts.app')
 @section('title') Add Location @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Add Location</h3>
                       
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  {{ Form::open( ['role' => 'form','data-parsley-validate'=>'', 'route' => ['locations.store']]) }}	
  <input type="hidden" name="user_created" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="user_updated" value="<?php echo Auth::user()->id; ?>">	
 <input type="text" name="userparent" value="<?php echo Auth::user()->client_id; ?>">	     	     	
   <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="fullname">Location Name :</label>
                            <input type="text" class="form-control" name="loc_name" required />
                        </div>
                                            <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="Description">Alias Name :</label>
                              <input type="text" class="form-control" name="loc_alias_name" required />
                                </div>        
                                <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label for="Description">Zipcode :</label>
                              <input type="text" class="form-control" name="zipcode" required />
                                </div>                            
                                               <div class="clearfix"></div>
                    
                    </div><!-- row ends here -->
                    
                    <br/>
                    
                    <div class="clearfix"></div>                                        

                     <div class='form-group'>
          {{ Form::submit('Add Location',array('class'=>'btn btn-small btn-success')) }}
    </div>
                          {{ Form::close() }}  
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
