 <?php $__env->startSection('title'); ?> Add Privilege <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="wrapper main-wrapper row privilege" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Functional Features</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
             <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/privileges')); ?>"><i class="fa fa-home"></i>Functional Features</a> </li>
              <li class="active"> Create </li>
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
		<div class="clearfix"></div>  <div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
  <div class="clearfix"></div>
		<br/>
		
        <div id="pills" class='wizardpills' >
                    <ul class="form-wizard nav nav-pills">
                        <li class="complete"><a href="#" data-toggle="tab" aria-expanded="false"><span>Permissions</span></a></li>
                        <li class="active"><a href="#pills-tab2" data-toggle="tab" aria-expanded="true"><span>Functional Features</span></a></li>
                        <li><a href="#" data-toggle="tab"><span>Roles</span></a></li>
                       
                    </ul>
                     <div id="bar" class="progress active">
                        <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60.6667%;"></div>
                    </div>
<div class="tab-content">
                        <div class="tab-pane active" id="pills-tab2">
                        
                        <br/>
					
                        <div class="col-md-12 text-right"> 
                         <button class="btn btn-primary" id="create">Create</button></div>
                           <br/><div class="clearfix"></div> 
                           <br/>
		<div id="open" style="display:none">					
   <?php echo e(Form::open( ['role' => 'form','id'=>'priv_validate','class'=>'form-horizontal' ,'route' => ['privileges.store'],'name' => 'usercreateform','data-toggle'=>'validator'])); ?>

          	
   <?php echo e(csrf_field()); ?>


  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	   	

<br/>
  <div class="col-md-6 "> <h4>Create Functional Feature</h4>  </div>
                        <div class="col-md-6 text-right"> 
                         <span  class="btn btn-primary"id="close">X</span></div>
                        	 <div class="clearfix"></div>  
       
                         <div class="form-group">
                        <label class="form-label col-sm-12 control-label">
                        <?php echo e(trans('privileges.heading1')); ?> <span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
                          
      <?php echo e(Form::text('privilege_action', null, ['class' => 'form-control col-md-7 col-xs-12','data-error'=>'This is required filedd'])); ?>

					 <?php if($errors->has('privilege_action')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('privilege_action')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>

                                            <div class="clearfix"></div>   
                         <div class="form-group">
						<label class="form-label col-sm-12 control-label">
                        <?php echo e(trans('privileges.heading2')); ?> <span class="required">*</span>
                        </label>
                        <div class="controls col-sm-12">
    <?php echo e(Form::text('privilege_desc', null, ['class' => 'form-control col-md-7 col-xs-12','data-error'=>'This is required filedd'])); ?>

                    
                     <?php if($errors->has('privilege_desc')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('privilege_desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                      </div>

                    
                    
                      <div class="form-group">
                        <div class="col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    
                    
   <?php echo e(Form::close()); ?>  
   			  </div>				
              <div >
            <div class="row">
               <div class="col-xs-12 ">
               <form method="POST" id="searchform" action="<?php echo e(url('/privileges/searchres')); ?>" role="form"  >	
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
   
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
                      
                         <tr id="<?php echo e($row->privilege_id); ?>1">
	                            <td><?php echo e($row->privilege_desc); ?></td>
                          <td><?php echo e($row->privilege_desc); ?></td>
                     <td>
                          <a href="<?php echo e(route('privileges.edit',$row->privilege_id)); ?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                          <a onClick="showdiv(<?php echo e($row->privilege_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                          <a href="<?php echo e(route('privileges.destroy',$row->privilege_id)); ?>" class="delete" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn CmmTab" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                          
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
                            <li class="previous"><a href="<?php echo e(url('/permissions/create')); ?>" class="btn btn-primary">Previous</a></li>
                            <li class="next"><a href="<?php echo e(url('/roles/create')); ?>"  class="btn btn-primary">Next</a></li>
                           </ul>
                    </div>
                </div>
          
        </div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
     <?php if($results): ?>
 <?php foreach($results as $row): ?>
                      
        <section class="box closeopen" id="<?php echo e($row->privilege_id); ?>" style="display:none;"> <br/>
          <div>
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Name:</strong><?php echo e($row->privilege_action); ?></div>
    <div><strong>Description:</strong><?php echo e($row->privilege_desc); ?></div>
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($row->privilege_action); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->privilege_action); ?> </strong></a> <span>Updated by</span><p></p>
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
                        <h2><a href="#"><strong><?php echo e($row->privilege_action); ?> </strong></a> <span>Updated at</span></h2>
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
                         <h2><a href="#"><strong><?php echo e($row->privilege_action); ?>  </strong></a> <span>Created at</span></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i><?php echo e($row->created_at); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->privilege_action); ?> </strong></a> <span>Create by</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> <?php echo e($row->createduser); ?></span></p>
						<div class="clearfix"></div>
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