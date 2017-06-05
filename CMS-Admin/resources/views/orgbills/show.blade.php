@extends('layouts.app')
 @section('title') Show Details @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3>{{ trans('orgservice.show')}}</h3>
            <div class="content-body" id="printcontract">
    <div class="row">
						
                    
                <p>Service: {{ $orgservices->service_name }}</p>
                <p>Organisation: {{ $orgservices->org_name }}</p>
                <p>Created User: {{ $orgservices->createduser }}</p>
                <p>Updated User: {{ $orgservices->updateduser }}</p>
                
                <p>Uploaded at: {{ $orgservices->updated_at }}</p>
                
                 </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
      
@endsection
