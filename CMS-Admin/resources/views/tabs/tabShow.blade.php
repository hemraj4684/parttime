@extends('layouts.app')
 @section('title') Show Location Details @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Location Details</h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
						
                    
                    <h3>Location Name: {{ $location->loc_name }}</h3>
            <p>Alias Name: {{ $location->loc_alias_name }}</p>
              <p>Longitude: {{ $location->langitude }}</p>
                <p>latitude: {{ $location->latitude }}</p>
            <p>Created User: {{ $location->user_created }}</p>
                        <p>Updated User: {{ $location->user_updated }}</p>

            <p>Uploaded at: {{ $location->dateCreated }}</p>
          
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
