<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ __('login.Welcome To Easy Medical Records')}}</title>
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600italic,600,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--<link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">-->
  </head>
  <!--/head-->
  <body class="gray">
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 loginbox gap-top-5 center">
              <img src="images/logo.png" alt="logo" width="50%"><br />
              <h3>Manage and own your health records</h3>
              <a href="" class="btn-block btn-social btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);">
                <i class="fa fa-facebook"></i> Sign in with Facebook
              </a>
              <a href="" class="btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
                <i class="fa fa-google-plus"></i> Sign in with Google
              </a>
              <hr />
              <br />
              <form action="/" method="post">
                @csrf
                <?php 
                  if(session('error') !== null){ 
                    echo '<span class="error" style="color:red">'.session('error').'</span>';  
                  }
                ?>
                <?php // echo form_error('email','<span class="error" style="color:red">', '</span>'); ?>
                <input name="email" id="email" type="text" class="form-control" placeholder="Enter Email ID">
                @error('email')
                  <span class="error" style="color:red">{{ $message }}</span> <br/><br/>
                @enderror
                <?php // echo form_error('password','<span class="error" style="color:red">', '</span>'); ?>
                <input name="password" id="password" type="password" class="form-control" placeholder="Enter Password">
                @error('password')
                  <span class="error" style="color:red">{{ $message }}</span> <br/><br/>
                @enderror
                <a href="#">Forgot Password</a><br /><br />
                <button class="btn btn-gray btn-cust-lg center btn-block" type="submit">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><br /><br />
    <!--<section id="lfooter" class="lfblack">
      <p class="center">&copy; 2017 Easy Medical Records | All Rights Reserved</p>
    </section>-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript">
      $(document).ready(
        function () {
          $('.nav1').scrollToFixed();
        }
      );
    </script>
    <script>
      wow = new WOW(
        {
          animateClass: 'animated',
          offset: 100,
          callback: function (box) {
            console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
          }
        }
      );
      wow.init();
      document.getElementById('moar').onclick = function () {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
      };
    </script>
  </body>
</html>
