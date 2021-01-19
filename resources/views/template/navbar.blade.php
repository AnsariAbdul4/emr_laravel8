<!-- Navigation bar start -->
<header class="navbar navbar-inverse blue" role="banner">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="dropdown">
            <a href="/dashboard" class="dropdown-toggle" data-delay="50" data-close-others="true">
              <i class="fa fa-home icon-2x"></i>Dashboard
            </a>
          </li>
          <li class="dropdown">
            <a href="/profile" class="dropdown-toggle" data-close-others="true"><i class="fa fa-address-card-o"></i> My Profile</a>
          </li>
          <li class="dropdown">
            <a href="relatives/relatives" class="dropdown-toggle" data-close-others="true"><i class="fa fa-address-card-o"></i> Family Members</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="50" data-close-others="true"><i class="fa fa-medkit"></i> Logs Data <i class="fa fa-1x fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="bloodsugar">Blood Sugar Data</a></li>
              <li><a href="bloodpressure">Blood Pressure Data</a></li>
              <li><a href="measurements">Reports & Measurements</a></li>
              <li><a href="medication">Medication</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-close-others="true"><i class="fa fa-address-card-o"></i> Appointments</a>
          </li>
          <?php
            // echo 'Role Id Is As Follow.',$session['role_id'];
            if ($user_detail->role_id == 1) {
              ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="50" data-close-others="true" aria-expanded="true">
                  <i class="fa fa-user"></i> User Management <i class="fa fa-1x fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="individuals">Individuals</a></li>
                  <li><a href="families">Families</a></li>
                  <li><a href="doctors">Doctors</a></li>
                  <li><a href="hospitals">Hospitals</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="50" data-close-others="true" aria-expanded="false">
                  <i class="fa fa-cog"></i> Control Panel <i class="fa fa-1x fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="country/countries">Manage Country</a></li>
                  <li><a href="state/states">Manage State</a></li>
                  <li><a href="city/cities">Manage City</a></li>
                </ul>
              </li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </header>
  <!-- Navgation end -->