    <div class="row">
        @foreach($routeName as $route)
            <div class="col-md-3">
                <div class="checkbox">
                  <label><input type="checkbox" name="permission_id[]" value="{{$route->id}}"
                  @if(in_array("$route->id", $permissionPerRole)) checked @endif>{{$route->name}}</label>
                </div>    
            </div>
        @endforeach
    </div>
                        
