 <?php $__env->startSection('title'); ?> Add Role <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
 
<section class="wrapper main-wrapper row createRole" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Roles</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
               <li class="active"> Roles </li>
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
          <div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
  <div class="clearfix"></div>
		<br/>
			  
          
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
                          <?php if($rolelist): ?>
                      <?php foreach($rolelist as $row): ?>
                      
                       <tr id="<?php echo e($row->role_id); ?>1">
	                            <td><?php echo e($row->role_name); ?></td>
                          <td><?php echo e($row->role_desc); ?></td>
                     <td>
                          
                          <a onClick="showdiv(<?php echo e($row->role_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                         
                          
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
         
                        

                        <div class="clearfix"></div>

         
        <div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
     <?php if($rolelist): ?>
 <?php foreach($rolelist as $row): ?>
                      
        <section class="box closeopen" id="<?php echo e($row->role_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Name:</strong><?php echo e($row->role_name); ?></div>
    <div><strong>Description:</strong><?php echo e($row->role_desc); ?></div>
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($row->role_name); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->role_name); ?> </strong></a> <span>Updated by</span><p></p>
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
                        <h2><a href="#"><strong><?php echo e($row->role_name); ?> </strong></a> <span>Updated at</span></h2>
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
                         <h2><a href="#"><strong><?php echo e($row->role_name); ?>  </strong></a> <span>Created at</span></h2>
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
                        <h2><a href="#"><strong><?php echo e($row->role_name); ?> </strong></a> <span>Create by</span><p></p>
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


  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>