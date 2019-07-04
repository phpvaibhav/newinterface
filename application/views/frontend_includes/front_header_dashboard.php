<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Reservision | <?php if(!empty($page_title)){echo $page_title;}?></title>
    <?php
        $frontend_dashboard_assets =  base_url().'frontend_asset/dashboard/';
        $frontend_assets =  base_url().'frontend_asset/';
    ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo $frontend_dashboard_assets; ?>img/index.png">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!--   <link href="../../../../../../maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.html" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/chat-application.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/style-dash.css">    
    <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/responsive.css">
     <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/dragtable.css">

     <link rel="stylesheet" type="text/css" href="<?php echo $frontend_dashboard_assets; ?>css/select2.min.css">
    <link href="<?php echo $frontend_dashboard_assets; ?>css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="<?php echo $frontend_dashboard_assets; ?>custom/css/custom.css" rel="stylesheet">
   
    <!-- here is angularjs related links -->
    <link href="<?php echo $frontend_assets; ?>css/toaster.css" rel="stylesheet">

    <!-- Script load -->
    <!-- BEGIN VENDOR JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA223w1qLKjEHffGjXrcchOZqpEf5ii9WE&libraries=places,geometry,drawing" type = "text/javascript" defer="defer"></script> 
  
  <!-- here is angularjs related links -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular-sanitize.js"></script>
  
    <!-- angularjs -->
        <!-- ui-select files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-sortable/0.15.0/sortable.min.js"></script>
    <script src="<?php echo $frontend_assets; ?>ui-select/select.js"></script>
   
    <script src="<?php echo $frontend_assets; ?>angular/main_after_login.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/directive/country_code_select.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/directive/airline_code_select.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/directive/allow_number.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/directive/fileUpload.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/filter/search.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/services/services.js"></script>
  <!--   <script src="<?php echo $frontend_assets; ?>angular/controller/bookingCtrl.js"></script> -->
    <script src="<?php echo $frontend_assets; ?>angular/controller/estimationCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/rideCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/vehicleCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/driverCtrl.js"></script>
  
    <script src="<?php echo $frontend_assets; ?>angular/controller/PermissionCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/rulesCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/DispatcherCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/zoneCtrl.js"></script>
<!--     <script src="<?php echo $frontend_assets; ?>angular/controller/zoneCtrl.js"></script> -->
    <script src="<?php echo $frontend_assets; ?>angular/controller/distanceCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/notifyCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/serviceCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/messageCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/luggageCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/priceCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/timeCrtl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/evenCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/invoiceCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/affiliatesCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/controller/userTypeCtrl.js"></script>
    <script src="<?php echo $frontend_assets; ?>angular/directive/autocomplete_api.js"></script>


 <!-- angularjs -->
   

    <script src="<?php echo $frontend_assets; ?>js/toaster.js"></script>
    <script src="<?php echo $frontend_dashboard_assets; ?>custom/js/dirPagination.js"></script>
    <script src="<?php echo $frontend_dashboard_assets; ?>custom/js/checklist-model.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">
    <link rel="stylesheet" href="<?php echo $frontend_assets; ?>ui-select/select.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap2.css"> -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.bootstrap3.css">--> 
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body ng-app="myAppAfterLogin" id="OverFlow" class="iframe-container vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-red-pink" data-col="2-columns" data-base-url="<?php echo base_url() ?>">
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
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light"> 
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right"> 
              <li class="dropdown dropdown-notification nav-item"  ng-controller="notifyCtrl"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell bell-shake" id="notification-navbar-link"></i>
             
				<span class="badge badge-pill badge-sm badge-danger badge-default badge-up badge-glow">{{notifyCount}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <div class="arrow_box_right">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
                    </li>
                    <li class="scrollable-container media-list w-100">
						<a href="#"  ng-repeat="noteData in notifyDataList" ng-Click="readClick(noteData.id)">
						
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-share info font-medium-4 mt-2"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading info">{{noteData.type}}</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">{{noteData.message}}</p>
<!--
                            <small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">3:30 PM</time>
                              </small>
-->
                          </div>
                        </div></a>
<!--
                        <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-save font-medium-4 mt-2 warning"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading warning">New User Registered</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Aliquam tincidunt mauris eu risus.</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">10:05 AM</time></small>
                          </div>
                        </div>
                        </a>
-->
<!--
                        <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-repeat font-medium-4 mt-2 danger"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading danger">New Purchase</h6>
                            <p class="notification-text font-small-3 text-muted text-bold-600">Lorem ipsum dolor sit ametest?</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                          </div>
                        </div></a>
-->
<!--
                        <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-shopping-cart font-medium-4 mt-2 primary"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading primary">New Item In Your Cart</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                          </div>
                        </div></a>
-->
<!--
                        <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-heart font-medium-4 mt-2 info"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading info">New Sale</h6><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                          </div>
                        </div></a>
-->
                        
                        </li>
                    <li class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1" href="#">Read all</a></li>
                  </div>
                  
                </ul>
              
              </li>
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             
                <span class="avatar avatar-online">
                <img src="<?php echo get_user_session_data()['image']; ?>" alt=""> 
              <!--  <img src="<?php echo $companyInfo['logo']; ?>" alt="<?php echo $companyInfo['companyName']; ?>"> -->
                 
                </span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right">
                    <!-- <a class="dropdown-item" href="#"><span class="noti-span avatar avatar-online"><span class="user-name text-bold-700 noti-span ml-1"><?php //echo get_user_session_data()['email']; ?></span></span></a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>/logout"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true" data-img="<?php echo base_url(); ?>frontend_asset/dashboard/img/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="brand-logo" alt="Chameleon admin logo" src="<?php echo base_url(); ?>frontend_asset/dashboard/img/logo.png" />
                    <h3 class="brand-text">Reservision</h3></a>

            </li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <div class="main-menu-content" id="mynav">
       <ul class="navigation navigation-main nav-pd" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- <a href="javascript:void(0)" onclick="openNav2()">
                <button class="new-book"><span class="ft-plus"></span>New Booking</button>
          </a>  -->
        <?php foreach ($menu as $key => $value) {
           

         ?>

              <li class=" nav-item"><a href="<?php echo (!empty($value->link)) ? base_url($value->link) : '#'; ?>" <?php if($value->menuName=="New Booking"){?> onclick="navsideOpn('OverFlow','NewBooking')" <?php }?>><i class="<?php echo $value->icon; ?>"></i><span class="menu-title"><?php echo $value->menuName; ?></span></a>
                    <?php  if($value->subMenu){?>
                    <ul class="menu-content">
                        <?php foreach ($value->subMenu as $k => $val) { ?>
                            <li><a class="menu-item" href="<?php echo (!empty($val->link)) ? base_url($val->link) : '#'; ?>"><?php echo $val->title; ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php }?>
                </li>

         <?php  } ?>

      <!--  -->
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>
