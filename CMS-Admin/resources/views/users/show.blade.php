@extends('layouts.app')
 @section('title') Show User @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    <div class="col-xs-12">
    <section class="box ">
           <h3>User</h3>
            <div class="content-body" id="printcontract">
    <div class="row">
		
                    
                    <h3>Name: {{ $user->username }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>User Role: {{ $user->rolename }}</p>

            <p>Firstname: {{ $user->firstname }}</p>
            <p>Last Name: {{ $user->lastname }}</p>
          <p>gender: {{ $user->gender }}</p>
         
            <p>Created User: {{ $user->createduser }}</p>
          <p>Updated User: {{ $user->updateduser }}</p>

            <p>Uploaded at: {{ $user->created_at }}</p>
             <p>Last updated: {{ $user->updated_at }}</p>
           
                  </div>
    		</div>
        </section></div>


<!-- MAIN CONTENT AREA ENDS -->
    </section>
      
@endsection
