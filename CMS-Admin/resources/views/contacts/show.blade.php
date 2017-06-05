@extends('layouts.app')
 @section('title') Show Contact @stop
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Contact Details</h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
						
                    
            <h3>Organization Name: {{ $contact->client_id }}</h3>
            <p>First Name: {{ $contact->firstname }}</p>
            <p>Last Name: {{ $contact->lastname }}</p>
            <p>Address: {{ $contact->address }}</p>
            <p>City: {{ $contact->city }}</p>
            <p>State: {{ $contact->state }}</p>
            <p>Country: {{ $contact->country }}</p>
            <p>Zip code: {{ $contact->zipcode }}</p>
            <p>Mobile Number: {{ $contact->mobilenumber }}</p>
            <p>Whatsapp: {{ $contact->whatsapp }}</p>
            <p>sms: {{ $contact->sms }}</p>
            <p>wEcastApp: {{ $contact->wEcastApp }}</p>
            <p>Social Media: {{ $contact->socialMedia }}</p>
            <p>Facebook: {{ $contact->facebook }}</p>            
            <p>Twitter: {{ $contact->twitter }}</p>
            <p>Landline: {{ $contact->landline }}</p>
            <p>Prefered contact By: {{ $contact->preferedContactBy }}</p>
             <p>Active: {{ $contact->status }}</p>
            <p>Created User: {{ $contact->user_created }}</p>
             <p>Updated User: {{ $contact->user_updated }}</p>
            <p>Uploaded at: {{ $contact->dateCreated }}</p>
            <p>Last updated at: {{ $contact->dateUpdated }}</p>
           
                  </div>
                </div>
              </div>
            
    </div>
</div>
@endsection
