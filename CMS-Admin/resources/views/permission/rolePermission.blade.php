@extends('layouts.app')

@section('content')

<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">Assign Permissions to Role</div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                    <select id="role_id" type="text" class="form-control" name="role_id">
                                        <option value="">Please select</option> 
                                    @foreach (App\Models\Role::all() as $role)
                                        <option value="{{ $role->role_id}}">{{ $role->role_name}}</option>
                                    @endforeach
                                    </select>    
                                    </div>
                                    <div class="col-md-6">
                                    <span class="label label-info">Note: First Select role for assign new permission or view old permissions </span>
                                    </div>
                                </div>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                                <div class="checkbox">
                                      <label><input type="checkbox" id="adminCheckAll">Select All</label>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Permissions</label>
                            <div class="col-md-10" id="permission"><!--Main permission box started  -->
                                @foreach($routeName as $key => $module)
                                <div class="panel panel-default">
                                  <div class="panel-heading">{{$key}}</div>
                                  <div class="panel-body">
                                        <div class="row">
                                          @foreach($module as $modulekey => $route)  
                                          <div class="col-lg-3" style="margin-bottom: 1%">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <input type="checkbox" name="permission_id[]" aria-label="..." value="{{implode(',',array_column($route,'permission_id'))}}" class="permissionChkBox">
                                              </span>
                                                <input type="text" class="form-control" aria-label="..." value="{{$modulekey}}" readonly>
                                            </div><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          @endforeach
                                        </div><!-- /.row -->
                                  </div>
                                </div>
                                @endforeach

                            </div><!--Main permission box exnded  -->
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
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
<script>
$(document).on('change','#role_id',function(index,value){
  var roleId = $(this).val();
 
  var url = "{{url('role/permission/')}}";
 //alert(url); 
    $.ajax({
        method: 'get',
        url: url+"/"+roleId,
        dataType: 'html',
        success: function(data) {

            
            //var value = eval(msg);
                $("#permission").html(data);

        }
    });
    //$('#confirm').attr('action',url);
});

$("#adminCheckAll").click(function(){
    $(".permissionChkBox").prop('checked', $(this).prop("checked"));
});
</script>
@endsection
