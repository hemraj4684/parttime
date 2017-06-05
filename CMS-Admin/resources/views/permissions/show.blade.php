@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3>{{ trans('permissions.show')}}</h3>
            <div class="content-body" id="printcontract">
    <div class="row">
						  
                    
            <p>{{ trans('permissions.heading1')}}: {{ $permissions->permission_action }}</p>
            <p>{{ trans('permissions.heading2')}}: {{ $permissions->permission_desc }}</p>
            <p>{{ trans('permissions.heading3')}}: {{ $permissions->createduser }}</p>
            <p>{{ trans('permissions.heading4')}}: {{ $permissions->updateduser }}</p>
            <p>{{ trans('permissions.heading5')}}: {{ $permissions->created_at}}</p>
            <p>{{ trans('permissions.heading6')}}: {{ $permissions->updated_at}}</p>
                   </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
