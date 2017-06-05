@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
   <h3>{{ trans('roles.show')}}</h3>
            <div class="content-body" id="printcontract">
    <div class="row">
						
                    
                    <p>{{ trans('roles.heading1')}}: {{ $role->role_name }}</p>
            <p>{{ trans('roles.heading2')}}: {{ $role->role_desc }}</p>
            <p>{{ trans('roles.heading3')}}: {{ $role->created_by }}</p>
                        <p>{{ trans('roles.heading4')}}: {{ $role->updated_by }}</p>

            <p>{{ trans('roles.heading5')}}: {{ $role->created_at}}</p>
                        <p>{{ trans('roles.heading6')}}: {{ $role->updated_at}}</p>
                   </div>
    		</div>
        </section></div>
<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
