@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')
<section class="wrapper main-wrapper row" style=''>

   
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
        <div class="col-xs-12">
        <div class="page-title">
          <div class="pull-left"> 
            <!-- PAGE HEADING TAG - START -->
            <h1 class="title">Organization Details</h1>
            <!-- PAGE HEADING TAG - END --> </div>
          <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="{{ url('/org') }}"> Orgs</a> </li>
              <li class="active"> <strong>View Organisation</strong> </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
	 
	  <div class="row">
      <div class="col-md-8" > 
        
        <!-- MAIN CONTENT AREA STARTS -->
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">General Information</h2>
            </header>
            <div class="content-body">
              <div class="row">
                <p>{{ trans('org.heading1')}}: {{ $orgs->org_name }}</p>
            <p>{{ trans('org.heading2')}}: {{ $orgs->org_url }}</p>
            <p>Org Type: {{ $orgs->org_type_id }}</p>
            <p>Account Status: {{ $orgs->account_status_id }}</p>
            <p>Head Quarters: {{ $orgs->org_headquarters }}</p>
            <p>No of Employees: {{ $orgs->org_num_employees }}</p>
            <p>Annual Budget: {{ $orgs->org_annual_budget }}</p>
            <p>Facebook id: {{ $orgs->org_facebook }}</p>
             <p>Twitter id: {{ $orgs->org_twitter }}</p>				
              </div>
            </div>
          </section>
        </div>
        
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Address</h2>
            </header>
            <div class="content-body">
              <div class="row">
              @if($address)
                      @foreach($address as $row)
                <div class="col-xs-6">
                <p>Email: {{ $row->email }}</p>
                 <p>Contact: {{ $row->telephone }}</p>
                    <p>fax: {{ $row->fax }}</p>
                <p>address_line1: {{ $row->address_line1 }}</p>
            <p>address_line2: {{ $row->address_line2 }}</p>
            <p>city: {{ $row->city }}</p>
            <p> State: {{ $row->state }}</p>
            <p>zipcode: {{ $row->zipcode }}</p>
            <p>latitude: {{ $row->latitude }}</p>
            <p>longitude: {{ $row->longitude }}</p>
           
          				
              </div>
                 @endforeach
                      @endif
              
               </div>
            </div>
          </section>
        </div>
        
        
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Services</h2>
            </header>
            <div class="content-body">
              <div class="row">
              @if($services)
                      @foreach($services as $row)
                <div class="col-xs-6">
                 <p>Service Name: {{ $row->service_name }}</p>
           
          				
              </div>
                 @endforeach
                      @endif
              
               </div>
            </div>
          </section>
        </div>
        
         <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Contracts</h2>
            </header>
            <div class="content-body">
              <div class="row">
              @if($contract)
                      @foreach($contract as $row)
                <div class="col-xs-6">
                <p>Service: {{ $row->service_name }}</p>
                 <p>Contract Start Date: {{ $row->contract_start_date }}</p>
                 <p>Contract End Date: {{ $row->contract_end_date }}</p>
              			
              </div>
                 @endforeach
                      @endif
              
               </div>
            </div>
          </section>
        </div>
        
        <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Billingtype</h2>
            </header>
            <div class="content-body">
              <div class="row">
              @if($billtype)
                      @foreach($billtype as $row)
                <div class="col-xs-6">
                <p>Billing Type: {{ $row->bill_type }}</p>
                 <p>Billing Date: {{ $row->bill_date }}</p>
                 </div>
                 @endforeach
                      @endif
              
               </div>
            </div>
          </section>
        </div>
        
          <div class="col-xs-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title pull-left">Support Users</h2>
            </header>
            <div class="content-body">
              <div class="row">
              @if($profuser)
                      @foreach($profuser as $row)
                <div class="col-xs-6">
                <p>Support User: {{ $row->professional_user }}</p>
                <p>Email: {{ $row->email }}</p>
                <p>Phone number: {{ $row->phone_number }}</p>
                 </div>
                 @endforeach
                      @endif
              
               </div>
            </div>
          </section>
        </div>
        
        
        <!-- MAIN CONTENT AREA ENDS --> 
     
      
	  </div>
	  <div class="col-md-4">
        <div class="col-xs-12">
          <section class="box "> <br/>
            <div>
              <div class="uprofile-image"> <img src="{{ URL::asset('public/theme/data/doctors/doctor-1.jpg') }}" class="img-responsive"> </div>
              <div class="uprofile-name">
                <h3> <a href="#">{{ $orgs->org_name }}</a> 
                  <!-- Available statuses: online, idle, busy, away and offline --> 
                  <span class="uprofile-status online"></span> </h3>
                <p class="uprofile-title">ID: <span>1234567</span> <br/> <span><button type="button" class="btn btn-info btn-xs">Active</button></span> </p>
              </div>
             
              
            </div>
            <div class="clearfix"></div>
            <header class="panel_header">
              <h2 class="title pull-left">Audit Information</h2>
            </header>
            <div class="content-body">
              <div class="row">
                <ul class="list-group clear-list timeline-ul">
                  <li class="list-group-item fist-item"> <span class="pull-right">{{ $orgs->created_at }} </span> Created Date</li>
                  <li class="list-group-item"> <span class="pull-right"> {{ $orgs->createduser }} </span> Created By </li>
                  <li class="list-group-item"> <span class="pull-right"> {{ $orgs->updated_at }} </span> Last Update </li>
                  <li class="list-group-item"> <span class="pull-right"> {{ $orgs->updateduser }} </span> Last Updated By </li>
                  <li class="list-group-item"> <span class="pull-right"> 13/10/16 </span> Last Login on </li>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
	  </div>
	  
    
 
       


<!-- MAIN CONTENT AREA ENDS -->
    </section>
@endsection
