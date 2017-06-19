 <?php $__env->startSection('title'); ?> Org Bills <?php $__env->stopSection(); ?>
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
              <li> <a href="<?php echo e(url('/orgbills')); ?>">Org Bills</a> </li>
              </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Org Bills	</h2>
			
                	
                    <a href="<?php echo e(url('/orgbills/create')); ?>" title="Add Org bills" class="btn btn-primary btn-sm pull-right title addUser">Add Org Bill</a>
                
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
  <div class="clearfix"></div>
                <div class="input-group primary"> <span class="input-group-addon"> <span class="arrow"></span> <i class="fa fa-search"></i> </span>
                  <input  class="form-control search-page-input inputAdvSearch" placeholder="Search" value="Search Users" type="submit"  onmousedown="toggle('menu', event);" onclick="toggle('menu', event);">
				  
				  <div class="clearfix"></div>
				  
				  <div id="menu" style="display: none" class=" col-md-8 col-xs-12 advsearch" >
				    
            <header class="panel_header">
              <h2 class="title pull-left">Advanced Search</h2>
            </header>
            <div class="content-body">
              <div class="row">
                <form action ="#" method="post">
                  <div class="col-xs-12">
                  <div class="form-group">
                    <label class="form-label" >Org Service Name</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="firstname" value="" class="form-control" >
                    </div>
                  </div>
                 
                </div>
			  <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                    <div class="text-left">
                      <button type="button" class="btn btn-primary">Search</button>
                    </div>
                  </div>
            </form>
            </div>
         
        </div>
        
				  </div>
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
                        <th>Org Name</th>
                        <th>Bill Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                         <?php if($orgbills): ?>
                      <?php foreach($orgbills as $row): ?>
                      
                         <tr id="<?php echo e($row->org_bill_id); ?>1">
                          <td><?php echo e($row->org_name); ?></td>
                          <td><?php echo e($row->bill_type); ?></td>
                         <td><?php if($row->status == 1) echo 'Active'; else echo 'Inactive'; ?></td>
                         
                          
                          <td><a  href="<?php echo e(route('orgbills.edit',$row->org_bill_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                          
                          <a onClick="showdiv(<?php echo e($row->org_bill_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
          
                          <a href="<?php echo e(route('orgbills.destroy',$row->org_bill_id)); ?>" class="delete"  style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a></td>
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
            <?php if($orgbills): ?>
                      <?php foreach($orgbills as $row): ?>
                                  
                          
        <section class="box closeopen" id="<?php echo e($row->org_bill_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-lg-12 ">                
                
                   <div><strong>Org Name:</strong><?php echo e($row->org_name); ?></div>
   				 <div><strong>Bill Type:</strong><?php echo e($row->bill_type); ?></div>
            <div><strong>Bill Status:</strong><?php if($row->status == 1): ?>Active <?php else: ?> InActive <?php endif; ?></div>
  
              </div>
             
            </div>
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
              <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($row->org_name); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($row->bill_type); ?> </strong></a> <span>Updated by</span><p></p>
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
                        <h2><a href="#"><strong><?php echo e($row->bill_type); ?> </strong></a> <span>Updated at</span></h2>
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
                         <h2><a href="#"><strong><?php echo e($row->bill_type); ?>  </strong></a> <span>Created at</span></h2>
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
                        <h2><a href="#"><strong><?php echo e($row->bill_type); ?> </strong></a> <span>Create by</span><p></p>
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
   


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>