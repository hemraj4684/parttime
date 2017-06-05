 <?php $__env->startSection('title'); ?> Edit Permission <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row permitions" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Permissions</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
                        <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/permissions')); ?>"><i class="fa fa-home"></i>Permissions</a> </li>
              <li class="active"> Edit </li>
            </ol>
</div>
                                
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- MAIN CONTENT AREA STARTS -->
    
     <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
		<div class="content-body">
		<div class="clearfix"></div>	
		<br>        
        <div id="pills" class='wizardpills' >
                    <ul class="form-wizard">

                        <li><a href="#pills-tab1" data-toggle="tab"><span>Permissions</span></a></li>
                        <li><a href="#" data-toggle="tab"><span>Functional Features</span></a></li>
                        <li><a href="#" data-toggle="tab"><span>Roles</span></a></li>
                       
                    </ul>
                    <div id="bar" class="progress active">
                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
					
                    <div class="tab-content">
                        <div class="tab-pane active" id="pills-tab1">
						
						
                        <h4>Edit Permission</h4><br/>
                          
	                          
<?php echo e(Form::model($permissions, ['role' => 'form', 'class'=>'form-horizontal', 'route' => ['permissions.update', $permissions->permission_id], 'method' => 'PUT'])); ?>	
				
   <?php echo e(csrf_field()); ?>



  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	   	
       
                         <div class="form-group">
                        <label class="form-label  col-sm-12 col-lg-1 col-xs-12">
                        <?php echo e(trans('permissions.heading1')); ?> <span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12 ">
                          
      <?php echo e(Form::text('permission_action', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

   <?php if($errors->has('permission_action')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('permission_action')); ?></strong>
                                    </span>
                                <?php endif; ?>
                  
                        </div>
                      </div>

                                            <div class="clearfix"></div>   
                         <div class="form-group">
						<label class="form-label  col-sm-12">
                        <?php echo e(trans('permissions.heading2')); ?> <span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12 ">
    <?php echo e(Form::text('permission_desc', null, ['class' => 'form-control col-md-7 col-xs-12'])); ?>

   <?php if($errors->has('permission_desc')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('permission_desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                  
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
               <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                      </div>
                    
   <?php echo e(Form::close()); ?>  
              <div >
			  <br>
            <div class="row" style="display:none">
                <div class="col-xs-12 ">
               <form method="POST" id="searchform" action="<?php echo e(url('/permissions/searchress')); ?>" role="form">	
             <?php echo e(csrf_field()); ?>

   
                      <div class="input-group primary"> 
                  <input  class="form-control" placeholder="Search" name="search" type="text" >
                  
				
                   <span class="input-group-addon" id="basic-addon1" onClick="submitform()" style="cursor:pointer;">
      
                     <span class="arrow"></span><i class="fa fa-search"></i></span>
                    
				  <div class="clearfix"></div>
				  
				  
                </div>
                		 </form>
                <br>
              </div>
            </div>
            <div class="row ">
              <div class="col-xs-12">
			 <!-- <p class="text-right">1208 Users</p>-->
                <div class="search_data">
                  <div class="vertical">
                    <div class="tab-pane">
                      <table class="table  table-hover table-striped">
                        <tbody>
                         <thead> 
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                        </thead>
    
                          <?php if($results): ?>
                      <?php foreach($results as $row): ?>                      
                         <tr id="<?php echo e($row->permission_id); ?>1">
                            <td><?php echo e($row->permission_action); ?></td>
                          <td><?php echo e($row->permission_desc); ?></td>
                     <td>
                          <a href="<?php echo e(route('permissions.edit',$row->permission_id)); ?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                          <a onClick="showdiv(<?php echo e($row->permission_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                          <a href="<?php echo e(route('permissions.destroy',$row->permission_id)); ?>" class="delete" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn CmmTab" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                          
                          </td>
                          
                          </tr>
                          <?php endforeach; ?>
                      <?php endif; ?>
                                                   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
                      

					  </div>
                        
                        

                        <div class="clearfix"></div>

                        <ul class="pager wizard">
                            <li class="previous"><a href="javascript:;" class="btn btn-primary">Previous</a></li>
                            <li class="next"><a href="<?php echo e(url('/privileges/create')); ?>"  class="btn btn-primary">Next</a></li>
                           </ul>
                    </div>
                </div>
          
        </div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
    
                          <?php if($results): ?>
                      <?php foreach($results as $row): ?>                      
        <section class="box closeopen" id="<?php echo e($row->permission_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Name:</strong><?php echo e($row->permission_action); ?></div>
    <div><strong>Description:</strong><?php echo e($row->permission_desc); ?></div>
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($row->permission_action); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->permission_action); ?> </strong></a> <span>Updated by</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> <?php echo e($row->updateduser); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-success"> <i class="fa fa-tint"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->permission_action); ?> </strong></a> <span>Updated at</span></h2>
						<p><span class="text-muted small pull-right"><i class="fa fa-clock-o"></i> <?php echo e($row->updated_at); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-secondary"> <i class="fa fa-suitcase"></i> </div>
                      <div class="timeline2-label">
                         <h2><a href="#"><strong><?php echo e($row->permission_action); ?>  </strong></a> <span>Created by</span></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i><?php echo e($row->createduser); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->permission_action); ?> </strong></a> <span>Create at</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> <?php echo e($row->created_at); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-warning"> <i class="fa fa-camera"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->permission_action); ?> </strong></a> <span>changed his</span> <a href="#">Profile Picture</a></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> 4:10 pm - 12.06.2016</span></p>
						<div class="clearfix"></div>
						<br/>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry begin">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon"> <i class="fa fa-plus" style="color: #cccccc;position: relative;top: 3px;"></i> </div>
                    </div>
                  </article>
				  
                </div>
                
                <!-- end --> 
                
              </div>

		   </div>
            </div>
			</div>
			</div>
		  <div class="clearfix"></div>         
		 <br/>
		  
		  </div>
        </section>
      
	   <?php endforeach; ?>
                      <?php endif; ?>
	  </div>
      
      
    


<!-- MAIN CONTENT AREA ENDS -->
    </section>
    
    
<script>
function submitform()
{

$("#searchform").submit();
}
</script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>