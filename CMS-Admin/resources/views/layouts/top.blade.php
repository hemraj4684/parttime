<!-- START TOPBAR -->
<div class='page-topbar '>
  <div class='logo-area'> </div>
  <div class='quick-area'>
    <div class='pull-left'>
      <ul class="info-menu left-links list-inline list-unstyled">
        <li class="sidebar-toggle-wrap"> <a href="#" data-toggle="sidebar" class="sidebar_toggle"> <i class="fa fa-bars"></i> </a> </li>
        <li class="message-toggle-wrapper"> <a href="#" data-toggle="dropdown" class="toggle"> <i class="fa fa-envelope"></i> <span class="badge badge-accent">7</span> </a>
          <ul class="dropdown-menu messages animated fadeIn">
            <li class="list">
              <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                <li class="unread status-available"> <a href="javascript:;">
                  <div class="user-img"> <img src="{{ URL::asset('public/theme/data/profile/avatar-1.png') }}" alt="user-image" class="img-circle img-inline"> </div>
                  <div> <span class="name"> <strong>Clarine Vassar</strong> <span class="time small">- 15 mins ago</span> <span class="profile-status available pull-right"></span> </span> <span class="desc small"> Sometimes it takes a lifetime to win a battle. </span> </div>
                  </a> </li>
                
               
                
                <li class=" status-away"> <a href="javascript:;">
                  <div class="user-img"> <img src="{{ URL::asset('public/theme/data/profile/avatar-1.png') }}" alt="user-image" class="img-circle img-inline"> </div>
                  <div> <span class="name"> <strong>Araceli Boatright</strong> <span class="time small">- 16th Mar</span> <span class="profile-status away pull-right"></span> </span> <span class="desc small"> Sometimes it takes a lifetime to win a battle. </span> </div>
                  </a> </li>
              </ul>
            </li>
            <li class="external"> <a href="javascript:;"> <span>Read All Messages</span> </a> </li>
          </ul>
        </li>
        <li class="notify-toggle-wrapper"> <a href="#" data-toggle="dropdown" class="toggle"> <i class="fa fa-bell"></i> <span class="badge badge-accent">3</span> </a>
          <ul class="dropdown-menu notifications animated fadeIn">
            <li class="total"> <span class="small"> You have <strong>3</strong> new notifications. <a href="javascript:;" class="pull-right">Mark all as Read</a> </span> </li>
            <li class="list">
              <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                <li class="unread available"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-check"></i> </div>
                  <div> <span class="name"> <strong>Server needs to reboot</strong> <span class="time small">15 mins ago</span> </span> </div>
                  </a> </li>
                <li class="unread away"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-envelope"></i> </div>
                  <div> <span class="name"> <strong>45 new messages</strong> <span class="time small">45 mins ago</span> </span> </div>
                  </a> </li>
                <li class=" busy"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-times"></i> </div>
                  <div> <span class="name"> <strong>Server IP Blocked</strong> <span class="time small">1 hour ago</span> </span> </div>
                  </a> </li>
                <li class=" offline"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-user"></i> </div>
                  <div> <span class="name"> <strong>10 Orders Shipped</strong> <span class="time small">5 hours ago</span> </span> </div>
                  </a> </li>
                <li class=" offline"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-user"></i> </div>
                  <div> <span class="name"> <strong>New Comment on blog</strong> <span class="time small">Yesterday</span> </span> </div>
                  </a> </li>
                <li class=" available"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-check"></i> </div>
                  <div> <span class="name"> <strong>Great Speed Notify</strong> <span class="time small">14th Mar</span> </span> </div>
                  </a> </li>
                <li class=" busy"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-times"></i> </div>
                  <div> <span class="name"> <strong>Team Meeting at 6PM</strong> <span class="time small">16th Mar</span> </span> </div>
                  </a> </li>
              </ul>
            </li>
            <li class="external"> <a href="javascript:;"> <span>Read All Notifications</span> </a> </li>
          </ul>
        </li>
        <li class="hidden-sm hidden-xs searchform">
          <form action="{{ url('/') }}" method="post">
            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-search"></i> </span>
              <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
            </div>
            <input type='submit' value="">
          </form>
        </li>
      </ul>
    </div>
    @if(Auth::user())
    <div class='pull-right'>
      <ul class="info-menu right-links list-inline list-unstyled">
        <li class="profile"> <a href="#" data-toggle="dropdown" class="toggle"> <img src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" alt="user-image" class="img-circle img-inline"> <span>{{ Auth::user()->username }} <i class="fa fa-angle-down"></i></span> </a>
          <ul class="dropdown-menu profile animated fadeIn">
           <li> <a href="{{ url('/users/'.Auth::user()->id) }}/profile"> <i class="fa fa-wrench"></i> Settings </a> </li>
 			  <li> <a href="#help"> <i class="fa fa-info"></i> Help </a> </li>
            <li class="last"> <a href="{{ url('/logout') }}"> <i class="fa fa-lock"></i> Logout </a> </li>
          </ul>
        </li>
        
      </ul>
    </div>
    @endif
  </div>
</div>
<!-- END TOPBAR -->