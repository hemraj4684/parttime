@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3>{{ trans('services.show')}}</h3>
            <div class="content-body" id="printcontract">
    <div class="row">
						
                    
                    <p>{{ trans('services.heading1')}}: {{ $services->service_name }}</p>
            <p>{{ trans('services.heading2')}}: {{ $services->service_desc }}</p>
            <p>{{ trans('services.heading3')}}: {{ $services->createduser }}</p>
                        <p>{{ trans('services.heading4')}}: {{ $services->updateduser }}</p>

            <p>{{ trans('services.heading5')}}: {{ $services->created_at}}</p>
                        <p>{{ trans('services.heading6')}}: {{ $services->updated_at}}</p>
                 </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
