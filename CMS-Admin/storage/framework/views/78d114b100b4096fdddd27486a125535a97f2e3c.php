<div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

<!-- USER INFO - START -->
<div class="profile-info row">
<div class="profile-image col-xs-4"> <a href="<?php echo e(url('/')); ?>"> <img alt="" src="<?php echo e(URL::asset('public/theme/data/profile/profile.jpg')); ?>" class="img-responsive img-circle"> </a> </div>
<div class="profile-details col-xs-8">
<h3> <a href="<?php echo e(url('/')); ?>"><?php echo e(Auth::user()->username); ?></a> 

<!-- Available statuses: online, idle, busy, away and offline --> 
<span class="profile-status online"></span> </h3>
<p class="profile-title"></p>
</div>
</div>
<!-- USER INFO - END -->

<ul class='wraplist'>
<li> <a href="<?php echo e(url('/home/web')); ?>"> <i class="fa fa-home"></i> <span class="title">Home</span> </a> </li>
<li class='menusection'> <i class="fa fa-dashboard"></i> <span class="title">Dashboard</span></li>

<li class='menusection'><i class="fa fa-key fa-lg"></i> <span class="title">Access</span></li>
<?php $curent_role = Auth::user()->role_id; ?>
<?php if($curent_role == 2) {?>
<li> <a href="<?php echo e(url('/roles')); ?>"> 
<i class="fa fa-check-square"></i> <span class="title">Roles</span>
</a>  </li>
<?php } if($curent_role == 1) {?>
<li> <a href="<?php echo e(url('/permissions/create')); ?>"> 
<i class="fa fa-check-square"></i> <span class="title">Roles</span>
</a>  </li>
<?php } ?> 
<?php if($curent_role == 2 || $curent_role == 1) {?>
<li><a href="<?php echo e(url('/users')); ?>"><i class="fa fa-user"></i> <span class="title">Users </span> </a> </li>
<?php }?>
<li class='menusection'><i class="fa fa-users fa-lg"></i> <span class="title">Accounts</span></li>
<?php if($curent_role == 2 || $curent_role == 1) {?>
<li><a href="<?php echo e(url('/org')); ?>"><i class="fa fa-institution"></i> <span class="title">Organizations </span> </a> </li>
<li><a href="<?php echo e(url('/orgadmin')); ?>"><i class="fa fa-institution"></i> <span class="title">Organization Admins </span> </a> </li>
<li><a href="<?php echo e(url('/orgcontracts')); ?>"><i class="fa fa-institution"></i> <span class="title">Organization Contracts </span> </a> </li>

<?php }?>
<?php if($curent_role == 2) {?>
<li><a href="<?php echo e(url('/services')); ?>"><i class="fa fa-cogs"></i> <span class="title">Services </span> </a> </li>
<?php } if($curent_role == 1) {?>
<li><a href="<?php echo e(url('/services/create')); ?>"><i class="fa fa-cogs"></i> <span class="title">Services </span> </a> </li>
<?php } ?> 

<?php if($curent_role == 2 || $curent_role == 1 || $curent_role== 4) {?>
<li class=""> <a href="<?php echo e(url('/contracts')); ?>"> <i class="fa fa-calendar"></i> <span class="title">Contracts</span> </a> </li>
<?php }?>
<?php if($curent_role == 1 || $curent_role == 4) {?>
<li class=""> <a href="<?php echo e(url('/orgbills')); ?>"> <i class="fa fa-money"></i> <span class="title">Billings</span> </a> </li>
<?php } ?> 
<?php if($curent_role == 4) {?>
<li><a href="<?php echo e(url('/org')); ?>"><i class="fa fa-institution"></i> <span class="title">Organizations </span> </a> </li>
<?php } ?>
<?php if($curent_role == 3) {?>
 <li class='menusection'><i class="fa fa-gear"></i> <span class="title">Settings</span></li>

<li><a href="#"><i class="fa fa-user"></i> <span class="title">General </span> </a> </li>
<li><a href="#"><i class="fa fa-user"></i> <span class="title"> Alerts</span> </a> </li>
<li><a href="#"><i class="fa fa-user"></i> <span class="title">Site Preferences </span> </a> </li>

<li class='menusection'><i class="fa fa-gear"></i> <span class="title"> Portal Settings</span></li>

<?php }?>

</ul>
</div>