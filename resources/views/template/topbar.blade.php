<!-- topbar start -->
<div class="row neg-mar-lr-0">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="logo" width="100%">
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
        <br />
        <div class="input-group">
          <input type="text" class="form-control input-sm" placeholder="Search All" />
          <span class="input-group-btn">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </div>
      <div class="col-lg-4 col-md-2 col-sm-8 col-xs-12 head-section">
        <a href=""><i class="fa fa-question-circle-o pull-right"></i></a>
        <div class="user-btn pull-right">
          <a href="#" class="user-btn" data-toggle="dropdown" data-hover="dropdown" data-delay="50" data-close-others="true" aria-haspopup="true" aria-expanded="false">  <?php echo $user_detail->first_name; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Account</a></li>
            <li><a href="changepassword">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout">Sign Out</a></li>
          </ul>
          <span class="font-bold">|</span>
        </div>
        <p class="pull-right"><span class="font-bold">|</span> Logged in at  
        <?php echo session('user_data')['logged_in_time']; // echo $session['logged_in_time']; ?> &nbsp;<span class="font-bold">|</span>&nbsp;</p>
        <div class="btn-group pull-right">
          <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="sr-only">Toggle Dropdown</span>
          </a>&nbsp;&nbsp;
          <ul class="dropdown-menu">
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Notifications</a></li>
          </ul>                    
        </div>
      </div>
    </div>
  </div>
  <!-- topbar end -->