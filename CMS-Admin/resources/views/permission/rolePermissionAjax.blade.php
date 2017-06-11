               
 @foreach($routeName as $key => $module)
                                <div class="panel panel-default">
                                  <div class="panel-heading">{{$key}}</div>
                                  <div class="panel-body">
                                        <div class="row">
                                          @foreach($module as $route)  
                                          <div class="col-lg-3" style="margin-bottom: 1%">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <input type="checkbox" name="permission_id[]" value="{{$route['permission_id']}}" class="permissionChkBox" @if(in_array($route['routeName'], $permissionPerRole)) checked @endif>
                                              </span>
                                                <input type="text" class="form-control" aria-label="..." value="{{$route['perName']}}" readonly>
                                            </div><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          @endforeach
                                        </div><!-- /.row -->
                                  </div>
                                </div>
                                @endforeach