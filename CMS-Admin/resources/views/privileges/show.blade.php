@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')

<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3>{{ trans('privileges.show')}}</h3>
            <div class="content-body" id="printcontract">
    <div class="row">

						
                    
            <p>{{ trans('privileges.heading1')}}: {{ $privileges->privilege_action }}</p>
            <p>{{ trans('privileges.heading2')}}: {{ $privileges->privilege_desc }}</p>
            <p>{{ trans('privileges.heading3')}}: {{ $privileges->createduser }}</p>
            <p>{{ trans('privileges.heading4')}}: {{ $privileges->updateduser }}</p>
            <p>{{ trans('privileges.heading5')}}: {{ $privileges->created_at}}</p>
            <p>{{ trans('privileges.heading6')}}: {{ $privileges->updated_at}}</p>
                </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
      
@endsection
