@extends('layouts.app')
@section('title') Add Module @stop
@section('content')
<div class="container wrapper main-wrapper">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="page-title">
                <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
           <h1 class="title">Create Module</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>
                <div class="pull-right hidden-xs">
                   <ol class="breadcrumb">
                    <li> <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a> </li>
                    <li> <a href="{{ route('module.index') }}">Module</a> </li>
                    <li class="active">
                        <strong>Add Module</strong>
                    </li>
                   </ol>
               </div>
              </div>

            </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('module.store') }}">
                   
                        {{ csrf_field() }}

                        

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Module Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="descriptiondescription" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea  id="description" type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group{{ $errors->has('tab_id') ? ' has-error' : '' }}">
                            <label for="tab_id" class="col-md-4 control-label">Tab</label>
                            <div class="col-md-6">
                              <select name="tab_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach(App\Models\Tab::all() as $tab)
                                      <option value="{{$tab->tab_id}}">{{$tab->name}}</option>
                                    @endforeach
                              </select>
                                @if ($errors->has('tab_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tab_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                    

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
                                </button>
                                <a href="{{ route('module.index') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
