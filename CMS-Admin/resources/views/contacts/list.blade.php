@extends('layouts.app')
 @section('title') Contacts @stop
@section('content')
<div class="container">
    <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Contacts</h3>
                      </div>
        
                      <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search text-right">
                            <a href="{{ url('/contacts/create') }}" title="Add Contacts" class="btn btn-dark">Add Contacts</a>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Orgname</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>zipcode</th>                          
                          <th>mobilenumber</th>
                          <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      @if($contacts)
                      @foreach($contacts as $contact)
                      
                        <tr>
                          <td>{{ $contact->contact_id }}</td>
                          <td>{{ $contact->orgname }}</td>
                          <td>{{ $contact->firstname }} {{ $contact->lastname }} </td>
                          <td>{{ $contact->address }}<br/>{{ $contact->city }}<br/>{{ $contact->state }}<br/>{{ $contact->country }}</td>
                          <td>{{ $contact->zipcode }}</td>
                          <td>{{ $contact->mobilenumber }}</td>
                          
                          <td><a href="{{route('contacts.edit',$contact->contact_id)}}"  style="margin-right: 3px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a><a href="{{route('contacts.show',$contact->contact_id)}}"  style="margin-right: 3px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a><a href="{{route('contacts.destroy',$contact->contact_id)}}"  style="margin-right: 3px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a></td>
                        
                          </tr>
                          @endforeach
                      @endif
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
      </div>
</div>
@endsection
