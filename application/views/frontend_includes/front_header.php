<!DOCTYPE html>
<html>
<head>
    <title>Reservision | <?php if(!empty($page_title)){echo $page_title;}?></title>
    <?php
        $frontend_assets =  base_url().'frontend_asset/';
    ?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For gmail login -->
    <meta name="google-site-verification" content="AIzaSyAM78GyD9NIlxt74JkfwOXDIoqglnjAC8Q" />

    <link rel="icon" type="image/png" href="<?php echo $frontend_assets; ?>img/index.png" /> 
    <link href="<?php echo $frontend_assets; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/flaticon.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/Linearicons.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>css/responsive.css" rel="stylesheet">
    <link href="<?php echo $frontend_assets; ?>custom/css/custom.css" rel="stylesheet">
    <!-- here is angularjs related links -->
    <link href="<?php echo $frontend_assets; ?>css/toaster.css" rel="stylesheet">

    <!-- Dynamic css add -->
    <?php if(!empty($front_styles)) { load_css($front_styles); } //load required page styles ?>

    <!-- Here is all script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $frontend_assets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $frontend_assets; ?>js/moment.min.js"></script>
    <script src="<?php echo $frontend_assets; ?>js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo $frontend_assets; ?>js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="<?php echo $frontend_assets; ?>js/custom.js"></script>
    <script src="<?php echo $frontend_assets; ?>custom/js/custom.js"></script>

    <!-- Dynamic Js add -->
    <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>
    <!-- here is angularjs related links -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/main_before_login.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/services/services.js"></script>
   
    <script src="<?php echo $frontend_assets; ?>js/toaster.js"></script>
    <!-- for gmail login -->
    <script src="https://apis.google.com/js/api:client.js"></script>
</head>
<body ng-app="myAppBeforeLogin" data-base-url="<?php echo base_url() ?>">
<toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
<div id="preloader" ng-show="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>
<nav class="navbar navbar-default mainHeader">
    <div class="topBar">
        <div class="container header-user">
                <div class="header-user-email pull-left">
                    <i class="fa fa-envelope-o"></i>
                    <a class="u-url" href="mailto:info@example.com">INFO@EXAMPLE.COM <span ng-show="preloader">{{preloader}}</span></a>
                </div>
                <div class="header-user-tel pull-left">
                    <i class="fa fa-mobile-phone fa-lg"></i>
                   <a class="u-url" href="#">+012 345 6789</a>
                </div>
                <div class="header-tour-package pull-right">
                    <a href="<?php echo base_url('make-trip'); ?>" class="text-w quote">Plan A Trip</a>
                    <!-- <i class="fa fa-bars"></i> -->
                </div>
                <div class="header-user-name pull-right sLink">
                    <!-- <i class="fa fa-mobile-phone fa-lg"></i> -->
                    <a href="<?php echo base_url('signup'); ?>" class="tel text-w ">Signup</a>
                </div> 
                <div class="header-user-name pull-right">
                    <!-- <i class="fa fa-mobile-phone fa-lg"></i> -->
                    <a href="<?php echo base_url('login')?>" class="tel text-w">Login</a>
                </div>         
            </div>
    </div>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="innerHeader">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo $frontend_assets; ?>img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right mainMenu">
        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div>
  </div><!-- /.container-fluid -->
</nav>
