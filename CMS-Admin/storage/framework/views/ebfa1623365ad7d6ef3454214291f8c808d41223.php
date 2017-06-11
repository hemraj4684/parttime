 <?php $__env->startSection('title'); ?> Organisation List <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php $curent_role = Auth::user()->role_id; ?>
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
              <li class="active"> Organizations </li>
              
			  
            </ol>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12" id="leftdiv">
        <section class="box clients-list">
          <header class="panel_header">
            <h2 class="title pull-left"> <i class="fa fa-user"></i> &nbsp; Organizations	</h2>
				<?php if($curent_role == 1) {?>
                	<a href="<?php echo e(url('/org/create')); ?>" title="Add Organization" class="btn btn-primary btn-sm pull-right title addUser"><?php echo e(trans('org.add')); ?></a>
                <?php }?>
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
 <form method="POST" id="searchform" action="<?php echo e(url('/org/searchres')); ?>" role="form"  >	
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
   
                <div class="input-group primary"> 
                  <input  class="form-control" placeholder="Search" name="search" type="text" >
                  
				
                   <span class="input-group-addon" id="basic-addon1" onClick="submitform()" style="cursor:pointer;">
      
                     <span class="arrow"></span><i class="fa fa-search"></i></span>
                   
                     <span class="input-group-addon btn-advsearch" id="basic-addon1" style="border-left:solid 1px #fff;" onclick="toggle('menu', event);"><span class="arrow"></span><i class="fa fa-ellipsis-v"></i></span>
				  <div class="clearfix"></div>
				  
				  
                </div>
                		
				  
                  <div id="menu" style="display: none" class=" col-md-8 col-xs-12 advsearch" >
				    
            <header class="panel_header">
              <h2 class="title pull-left">Advanced Search</h2>
            </header>
            <div class="content-body">
              <div class="row">
     <form method="POST" action="<?php echo e(url('/org/adsearch')); ?>" role="form"  >	
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                 <div class="col-xs-12">
				   <div class="form-group">
                    <label class="form-label" >Organization</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="org" class="form-control" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-label" >ORG Unique id</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="orgunique" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" >Head quarters</label>
                    <span class="desc"></span>
                    <div class="controls">
                      <input type="text" name="headquarter" class="form-control" >
                    </div>
                  </div>
				 
                </div>
			  <div class="clearfix"></div>
			  <hr>
			  <div class="col-xs-12 col-sm-9 col-md-8 padding-bottom-30">
                    <div class="text-left">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                  </div>
            </form>
            </div>
         
        </div>
        
				  </div>
             </form>
                <br><br><br>
  <div class="clearfix"></div>
  
  

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
                        <th>Unique id</th>
                       
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
 					 <?php if($orgs): ?>
                      <?php foreach($orgs as $org): ?>
                        <tr id="<?php echo e($org->org_id); ?>1">
 							<td><?php echo e($org->org_name); ?></td>
                          <td><?php echo e($org->org_unique_id); ?></td>
              
                           <td><?php if($org->status == 1) echo 'Active'; else echo 'Inactive'; ?></td>
                      
                          
                          <td>
                          	<?php if($curent_role == 1) {?>
                          <a  href="<?php echo e(route('org.edit',$org->org_id)); ?>"  style="margin-right: 3px;"><i class="fa fa-pencil icon-xs CmmTab"></i></a>
                             <?php }?>
                           <a onClick="showdiv(<?php echo e($org->org_id); ?>)" style="cursor:pointer;"><i class="glyphicon glyphicon-eye-open CmmTab"></i></a>
                           	<?php if($curent_role == 1) {?>
                          <a href="<?php echo e(route('org.destroy',$org->org_id)); ?>" class="delete" style="margin-right: 3px;"><i class="fa fa-trash icon-xs CmmTab"></i></a>
                             <?php }?>
                          </td>
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
           <?php if($orgs): ?>
                      <?php foreach($orgs as $org): ?>
        <section class="box closeopen" id="<?php echo e($org->org_id); ?>" style="display:none;"> <br/>
          <div class="content-body">
            <div class="row">
                  <div class="col-lg-12 text-center">
				  
                <div class="m-b-sm"> <img alt="image" class="img-circle" src="<?php echo e(URL::asset('public/orgimages/'.$org->org_logo_image)); ?>" style="width: 62px">  </div>
				<div><strong> <?php echo e($org->org_name); ?> </strong>
                <strong> <?php echo e($org->org_unique_id); ?> </strong><div class="clearfix"></div>
				
                 <span class="btn btn-success btn-xs"><?php if($org->status == 1): ?>Active <?php else: ?> InActive <?php endif; ?></span>
				
              </div>
              
              </div>
              <div class="clearfix"></div>
			  
			  <hr>
			  
              <div class="col-lg-12">  
			  
			  <div><i class="fa fa-globe">&nbsp;&nbsp;</i><?php echo e($org->org_url); ?></div>
			  <div><i class="fa fa-building">&nbsp;&nbsp;</i><?php echo e($org->org_headquarters); ?></div>
			  <div><i class="fa fa-users">&nbsp;&nbsp;</i><?php echo e($org->org_num_employees); ?> Employees</div>
			  <div><i class="fa fa-money">&nbsp;&nbsp;</i><?php echo e($org->org_annual_budget); ?> Budget/ Annum</div>
			  <div><i class="fa fa-suitcase">&nbsp;&nbsp;</i>Private Account</div>
			  
	

                <a href="https://www.facebook.com/<?php echo e($org->org_facebook); ?>" class="btn btn-primary btn-md facebook btn-xs" target="_blank"><i class="fa fa-facebook icon-xs"></i></a>
                <a href="https://twitter.com/<?php echo e($org->org_twitter); ?>" class="btn btn-primary btn-md twitter  btn-xs" target="_blank"><i class="fa fa-twitter icon-xs"></i></a>
                
                

              </div>
              <div class="clearfix"></div>
			  <hr>
            </div>
			<br/>
			
			 <div class="row">
			 
			
		<div class="col-xs-12"><strong>Services and Contracts</strong>
		
		
		<table class="table small">
                <thead>
                    <tr>
                       
                        <th>Services</th>
                        <th>Contract Term</th>
                    </tr>
                </thead>
                <tbody>
               <?php if($contract): ?>
                      <?php foreach($contract as $row): ?>
                      <?php if($row->org_id == $org->org_id): ?>
             		  <tr>
                        <td><?php echo e($row->service_name); ?></td>
                        <td><?php echo e($row->contract_start_date); ?> to <?php echo e($row->contract_end_date); ?></td>
                    </tr>
                    <?php endif; ?>
                 <?php endforeach; ?>
                      <?php endif; ?>
                   
                   
                </tbody>
            </table>
		
		
        </div>
		
		<div class="col-xs-12"><strong>Support</strong>
            <address class="margin-bottom-20 margin-top-10 small">
            <?php if($profuser): ?>
                      <?php foreach($profuser as $row): ?>
                      <?php if($row->org_id == $org->org_id): ?>
                        <span class="sName"><?php echo e($row->professional_user); ?></span><br>
                <abbr title="Phone">Phone:</abbr><span> <?php echo e($row->phone_number); ?></span>
				<abbr title="Email">Email:</abbr><span> <?php echo e($row->email); ?></span>
                
                   <?php endif; ?>
                 <?php endforeach; ?>
                      <?php endif; ?>
              
				 
            </address>	
        </div>
			 
			 <?php if($address): ?>
                      <?php foreach($address as $row): ?>
                           <?php if($row->org_id == $org->org_id): ?>
                      	 <div class="col-xs-12"><strong>Office Address</strong>
            <address class="margin-bottom-20 margin-top-10 small">
                <span class="line1"><?php echo e($row->address_line1); ?></span>, <span><?php echo e($row->address_line2); ?></span>,
             <span class="city"><?php echo e($row->city); ?></span>, <span class="state"><?php echo e($row->state); ?></span>, <span class="pin"><?php echo e($row->zipcode); ?></span><br>
                <abbr title="Phone">Phone:</abbr><span> <?php echo e($row->telephone); ?></span>, 
                      <?php if($row->fax): ?><abbr title="FAX">FAX:</abbr><span> <?php echo e($row->fax); ?></span>  <?php endif; ?>
				<abbr title="Email">Email:</abbr><span> <?php echo e($row->email); ?></span>
				 <div><i class="fa fa-map-marker"></i>&nbsp; <span>latitude: <?php echo e($row->latitude); ?></span> &nbsp; <span>longitude: <?php echo e($row->longitude); ?></span></div>
            </address>	
        </div>
                 <div class="clearfix"></div>
                    <?php endif; ?> <?php endforeach; ?> <?php endif; ?>
		
		
		
			 </div>
			
			
            <hr>
			
			<div class="search_data">
			<div class="vertical">
			<div class="tab-pane">
			
            <div class="row">
               <div class="col-xs-12"> 
                
                <!-- start -->
                <p><strong><?php echo e($org->org_name); ?> Timeline </strong></p>
                <div class="timeline2-centered">
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-success"> <i class="fa fa-tint"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($org->org_name); ?> </strong></a> <span>Updated </span></h2>
						<p><span class="text-muted small pull-right"><i class="fa fa-clock-o"></i> <?php echo e($org->updated_at); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-secondary"> <i class="fa fa-suitcase"></i> </div>
                      <div class="timeline2-label">
                         <h2><a href="#"><strong><?php echo e($org->org_name); ?>  </strong></a> <span>Updated </span></h2>
						<p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i><?php echo e($org->updated_at); ?></span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-info"> <i class="fa fa-dashboard"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($org->org_name); ?> </strong></a> <span>Last logged in</span><p></p>
                        <p><span class="text-muted small pull-right"> <i class="fa fa-clock-o"></i> 4:10 pm - 12.06.2016</span></p>
						<div class="clearfix"></div>
						<p></p>
                      </div>
                    </div>
                  </article>
                  <article class="timeline2-entry">
                    <div class="timeline2-entry-inner">
                      <div class="timeline2-icon bg-warning"> <i class="fa fa-camera"></i> </div>
                      <div class="timeline2-label">
                        <h2><a href="#"><strong><?php echo e($org->org_name); ?> </strong></a> <span>changed his</span> <a href="#">Profile Picture</a></h2>
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
      </section>
    
  
<script>
function submitform()
{

$("#searchform").submit();
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>