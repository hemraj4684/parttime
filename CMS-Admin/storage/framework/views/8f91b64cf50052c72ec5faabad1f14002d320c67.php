 <?php $__env->startSection('title'); ?> Create Service <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	 <?php $curent_role = Auth::user()->role_id; ?>

<section class="wrapper main-wrapper row permitions" style=''>

    <div class='col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <!-- PAGE HEADING TAG - START -->
                <h1 class="title">Services</h1>
                
                <!-- PAGE HEADING TAG - END -->
                </div>

             <div class="pull-right hidden-xs">
            <ol class="breadcrumb">
              <li> <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i>Home</a> </li>
              <li> <a href="<?php echo e(url('/services/create')); ?>">Services</a> </li>
              
			   <li class="active">
                            <strong>Create Service</strong>
                        </li>
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
             <div class="clearfix"></div>
          <div class="flash-message">
    <?php foreach(['danger', 'warning', 'success', 'info'] as $msg): ?>
      <?php if(Session::has('alert-' . $msg)): ?>

      <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> <!-- end .flash-message -->
   <div class="clearfix"></div><br/><br/>
   <div class="col-md-12 text-right"> 
                         <button class="btn btn-primary" id="create">Create</button></div>
                           <br/><div class="clearfix"></div> 
                           <br/>
		<div id="open" style="display:none">					
   <?php echo e(Form::open( ['role' => 'form', 'route' => ['services.store'],'files'=>true])); ?>



  <input type="hidden" name="created_by" value="<?php echo Auth::user()->id; ?>">
  <input type="hidden" name="updated_by" value="<?php echo Auth::user()->id; ?>">	
  <input type="hidden" name="Userparent" value="<?php echo Auth::user()->parent_id; ?>">	
  
  
                  <div class="col-xs-12 col-sm-8">
<br/>
  <div class="col-md-6 "> <h4>Create Service</h4>  </div>
                        <div class="col-md-6 text-right"> 
                         <span  class="btn btn-primary"id="close">X</span></div>
                        	 <div class="clearfix"></div>  
                  
                  
                  <div class="form-group">
                    <label class="form-label" ><?php echo e(trans('services.name')); ?></label>
                    <span class="desc"></span>
                    <div class="controls">
                     <?php echo e(Form::text('service_name', null, ['class' => 'form-control ',])); ?>

                      <?php if($errors->has('service_name')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('service_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" ><?php echo e(trans('services.desc')); ?></label>
                    <span class="desc"></span>
                    <div class="controls">
                     <?php echo e(Form::text('service_desc', null, ['class' => 'form-control '])); ?> 
                     <?php if($errors->has('service_desc')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('service_desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                      </div>
                  </div>
                    <div class="clearfix"></div>
                   <div class="form-group">
                    <label class="form-label" ><?php echo e(trans('services.logo')); ?></label>
                    <span class="desc"></span>
                    <div class="controls">
                 <input type="file" name="service_logo" class="form-control col-md-7 col-xs-12">          <?php if($errors->has('service_logo')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('service_logo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                  </div>
                 
                 
                   <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-5 col-md-offset-5 padding-bottom-30">
                    <div class="text-left">
            
                        <input type="submit" class="btn btn-primary btn-large"  value="Save">
                    </div>
					<div class="clearfix"></div>
                  </div>
				   
				   
				   </div>
                    
					
				
                <?php echo e(Form::close()); ?>

 			  </div>
  	
		<br>        
                          
          	<div class="clearfix"></div> 
              <div >
			  <br>
            <div class="row">
                        <div class="col-xs-12 ">
               <form method="POST" id="searchform" action="<?php echo e(url('/services/searchres')); ?>" role="form"  >	
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
                        <th>Logo</th>
                         <th>Actions</th>
                        </thead>
                          <?php if($list): ?>
                      <?php foreach($list as $row): ?>
                                            
                                <tr id="<?php echo e($row->service_id); ?>1">
                          <td><?php echo e($row->service_name); ?></td>
                          <td><?php echo e($row->service_desc); ?></td>
                          <td><img alt="image" class="img-circle" src="<?php echo e(URL::asset('public/services/'.$row->service_logo)); ?>" style="width: 62px"> </td>
                          
                          <td><a  href="<?php echo e(route('services.edit',$row->service_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                            <a onClick="showdiv(<?php echo e($row->service_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
            
                          <a href="<?php echo e(route('services.destroy',$row->service_id)); ?>" class="delete" style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a></td>
                          </tr>
   				 <?php endforeach; ?>
                          <?php else: ?>
                     <tr><td colspan="3" style="text-align:center">No Records Found</td> </tr>
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
        </section>
      </div>
      <div class="col-lg-4" id="rightdiv" style="display:none;">
             <?php if($list): ?>
                      <?php foreach($list as $row): ?>
                                  
                          
        <section class="box closeopen" id="<?php echo e($row->service_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
              <div class="col-md-12 ">
                
                
                   <div><strong>Name:</strong><?php echo e($row->service_name); ?></div>
    <div><strong>Description:</strong><?php echo e($row->service_desc); ?></div>
    
     <div><img alt="image" class="img-circle" src="<?php echo e(URL::asset('public/services/'.$row->service_logo)); ?>" style="width: 300px"> </div>
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