@extends('layouts.app')

@section('content')
<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Edit Permission</div>
                <div class="panel-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('message')}}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('error')}}
                    </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('permission.update',$recId->permission_id) }}">
                   
                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Permission Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $recId->name or old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('routeName') ? ' has-error' : '' }}">
                            <label for="routeName" class="col-md-4 control-label">Route Name</label>

                            <div class="col-md-6">
                                <input id="routeName" type="text" class="form-control" name="routeName" value="{{ $recId->routeName or old('routeName') }}">

                                @if ($errors->has('routeName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('routeName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       
                        <div class="form-group{{ $errors->has('module_id') ? ' has-error' : '' }}">
                            <label for="module_id" class="col-md-4 control-label">Module</label>
                            <div class="col-md-6">
                              <select name="module_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach(App\Models\Module::all() as $module)
                                    @if($module->module_id==$recId->module_id)
                                      <option value="{{$module->module_id}}" selected>{{$module->name}}</option>
                                    @else
                                      <option value="{{$module->module_id}}">{{$module->name}}</option>
                                    @endif
                                  @endforeach
                                    
                              </select>
                                @if ($errors->has('module_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('module_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit
                                </button>
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
