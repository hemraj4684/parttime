               
 <?php foreach($routeName as $key => $module): ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading"><?php echo e($key); ?></div>
                                  <div class="panel-body">
                                        <div class="row">
                                          <?php foreach($module as $route): ?>  
                                          <div class="col-lg-3" style="margin-bottom: 1%">
                                            <div class="input-group">
                                              <span class="input-group-addon">
                                                <input type="checkbox" name="permission_id[]" value="<?php echo e($route['permission_id']); ?>" class="permissionChkBox" <?php if(in_array($route['routeName'], $permissionPerRole)): ?> checked <?php endif; ?>>
                                              </span>
                                                <input type="text" class="form-control" aria-label="..." value="<?php echo e($route['perName']); ?>" readonly>
                                            </div><!-- /input-group -->
                                          </div><!-- /.col-lg-6 -->
                                          <?php endforeach; ?>
                                        </div><!-- /.row -->
                                  </div>
                                </div>
                                <?php endforeach; ?>