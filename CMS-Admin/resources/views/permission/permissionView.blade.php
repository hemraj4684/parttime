@extends('layouts.app')
 @section('title') Show Role @stop
@section('content')

<div class="container wrapper main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        All Permissions
                         <!-- <a href="{{ route('permission.sync') }}" class="btn btn-primary pull-right" style="margin-left: 1%">Sync</a>  -->   
                         <a href="{{ route('permission.create') }}" class="btn btn-primary pull-right">New</a>    
                     <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="row">
  <div class="col-lg-6">
    <!-- <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for...">
    </div> --><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <form action="" method="get">
  <div class="col-lg-6">
    <div class="input-group primary">
     
      <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{$search}}">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  </form>
</div><!-- /.row -->



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
                    <div class="table-responsive">
                        <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                          <thead>
                            <tr>
                             <th>#</th>     
                             <th>Permission Display Name</th>
                             <th>Permission Route Name</th>
                             <th>Module Name</th>
                             <th colspan="2" style="width:10%; text-align: center">Action</th>
                           </tr>
                         </thead>
                         <tbody>
                         @if(isset($permissions))
                         <?php $i = (($permissions->currentPage()-1)*PAGINATENO)+1; ?>
                         @foreach($permissions as $perm)
                           <tr>
                             <td>{{$i++}}</td>     
                             <td>{{$perm->permissionName}}</td>
                             <td>{{$perm->routeName}}</td>
                             <td>{{$perm->moduleName}}</td>
                             <td><a href="{{route('permission.edit',$perm->permission_id)}}" class="btn btn-xs btn-danger"><i class="fa fa-edit"></i></a></td>
                             <td>
                                <button class="btn btn-xs btn-danger delete_po" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete" data-url="{{route('permission.destroy',$perm->permission_id)}}">
                                <i class="fa fa fa-trash-o" ></i>
                                </button>
                             </td>
                           </tr>
                         @endforeach
                         </tbody>
                      </table>
                   </div>
                    {!! $permissions->render() !!} 
                    @endif  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- modal start  -->
 <form action="" method="post" id="confirm">
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
     
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
          <div class="modal-body">
            <p>Are you sure you want to delete this?</p>
          </div>
      
      <div class="modal-footer">
      <input type="hidden" class="route_url">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-default">Delete</a>
      </div>
    </div>
   </div>
  </div>
  </form>
<!-- modal end -->

           