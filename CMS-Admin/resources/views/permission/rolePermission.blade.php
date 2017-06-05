@extends('layouts.app')

@section('content')

<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Edit Permission</div>
                <div class="panel-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('error')}}
                    </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('role.permission.save')}}">
                   
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-2 control-label">Role Name</label>

                            <div class="col-md-6">
                                <select id="role_id" type="text" class="form-control" name="role_id">
                                    <option value="">Please select</option> 
                                @foreach (App\Models\Role::all() as $role)
                                    <option value="{{ $role->role_id}}">{{ $role->role_name}}</option>
                                @endforeach
                                </select>    
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Permissions</label>
                            <div class="col-md-10" id="permission">
                                <div class="row">
                                @foreach($routeName as $route)
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                          <label><input type="checkbox" name="permission_id[]" value="{{$route->id}}">{{$route->name}}</label>
                                        </div>    
                                    </div>
                            @endforeach
                            </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit
                                </button>
                                <a href="{{ route('permission.index') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/permission.js') }}"></script>
@endsection
