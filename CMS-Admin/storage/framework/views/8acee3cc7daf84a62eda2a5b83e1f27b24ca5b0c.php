 <?php $__env->startSection('title'); ?> Contracts <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="wrapper main-wrapper row">
      <div class="col-xs-12">
        <div class="page-title">
          <div class="pull-left"> 
            <!-- PAGE HEADING TAG - START -->
            <h1 class="title"> </h1>
           
            <!-- PAGE HEADING TAG - END --> </div>
          <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/orgcontracts')); ?>"> Org Contracts</a> </li>
              </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Org Contracts	</h2>
			
                	
                    <a href="<?php echo e(url('/orgcontracts/addcontract')); ?>" title="Add Org Contract" class="btn btn-primary btn-sm pull-right title addUser">Add Org Contract</a>
                
          </header>
          <div class="content-body">
            <div class="row">
              <div class="col-xs-12 ">
               <div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
             <div class="col-xs-12 ">
           <form method="POST" id="searchform" action="<?php echo e(url('/orgcontracts/searchres')); ?>" role="form"  >	
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
                        
                        <th> Org Name</th>
                        <th>Service</th>
                       
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                         <?php if($contracts): ?>
                      <?php foreach($contracts as $row): ?>
                      
                     
                        <tr id="<?php echo e($row->contract_id); ?>1">
                        <td><?php echo e($row->org_name); ?></td>
                          <td><?php echo e($row->service_name); ?></td>
                       <td><?php if($row->status == 1): ?> Active <?php else: ?> InActive <?php endif; ?></td>
                         
                     
                          <td><a  href="<?php echo e(route('orgcontracts.edit',$row->org_con_id)); ?>"  style="margin-right: 5px;" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                         
                          <a onClick="showdiv(<?php echo e($row->org_con_id); ?>)" style="cursor:pointer; margin-right: 5px;" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Show" data-placement="left"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
          
                          <a href="<?php echo e(route('orgcontracts.destroy',$row->org_con_id)); ?>" class="delete"  style="margin-right: 5px;" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fa fa-trash icon-xs CmmTab"></i></a></td>
                         
                     
                         <tr id="collapseTwo-<?php echo e($row->org_con_id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3" aria-expanded="true">
                         <td colspan="10">
                         testride
                         </td>
                         </tr>
                         </tr>
                          <?php endforeach; ?>
                      <?php else: ?>
                     <tr><td colspan="5" style="text-align:center">No Records Found</td> </tr>
                      <?php endif; ?>
                                                    
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
            <?php if($contracts): ?>
                      <?php foreach($contracts as $row): ?>
                                  
                          
        <section class="box closeopen" id="<?php echo e($row->contract_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">
                
                
                   <div><strong>Org Name:</strong><?php echo e($row->org_name); ?></div>
    <div><strong>Service Name:</strong><?php echo e($row->service_name); ?></div>
     <div><strong>Start Date:</strong><?php echo e($row->contract_start_date); ?></div>
      <div><strong>End Date:</strong><?php echo e($row->contract_end_date); ?></div>
    
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($row->service_name); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->service_name); ?> </strong></a> <span>Updated by</span><p></p>
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
                        <h2><a href="#"><strong><?php echo e($row->service_name); ?> </strong></a> <span>Updated at</span></h2>
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
                         <h2><a href="#"><strong><?php echo e($row->service_name); ?>  </strong></a> <span>Created at</span></h2>
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
                        <h2><a href="#"><strong><?php echo e($row->service_name); ?> </strong></a> <span>Create by</span><p></p>
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
      
      <!-- MAIN CONTENT AREA STARTS --> 
      
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