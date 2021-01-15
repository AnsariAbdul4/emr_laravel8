<!-- Left side panel start -->
<section id="services" class="gray">
  <div class="row neg-mar-lr-15 row-eq-height">
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 sidepanel"> <br /> 
      <div class="center">
        <?php $image = ''; // $this->Users_model->getImageById($session['user_id'])->image; ?>
        <div class="loading" style="display: none">
          <img src="images/spinner.gif" >
        </div>
        <?php if ($image != '') { ?>
          <img src="uploads/profile/<?php echo $image; //echo $session['image'] ;  ?>" id="profile_image" class="img-round-border">
        <?php } else { ?>    
          <img src="images/defaultuser.png" class="img-round-border">
        <?php } ?>
        <span class="gap-top-60 prof-img btn btn-primary btn-sm  btn-circle btn-file"><i class="fa fa-camera"></i><input type="file" name="image" id="image"></span>
        <h1 class="headnode"> <?php echo $user_detail->first_name; ?> </h1>
        <p> Last Login: 
            <?php
              /*
                if ($session['last_login'] == '') {
                  echo '';
                } else {
                  echo date('d M Y', strtotime($session['last_login']));
                }
              */
            ?>
        </p>
      </div><hr />
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><strong>Birth Date:</strong></p>
          <p>
            <?php
              if ($user_detail->DOB != '') {
                echo date_format(date_create($user_detail->DOB), "d/m/Y");
              } else {
                echo '';
              }
            ?>
          </p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><strong>Email:</strong></p>
          <p><?php echo $user_detail->email; ?></p>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><strong>Mobile:</strong></p>
          <p><?php echo $user_detail->mobile; ?></p>
        </div>
      </div>
    </div>
    <!-- Content area start -->
    @yield('content')
    <!-- Content area end -->
  </div>
  <!-- <input type="hidden" name="baseurl" id="baseurl" value="/"> -->
</section>
<!-- Left side panel end -->