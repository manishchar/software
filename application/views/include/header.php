<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$page_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('resources/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('resources/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('resources/dist/css/skins/_all-skins.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/iCheck/flat/blue.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/morris/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/jvectormap/jquery-jvectormap-1.2.2.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/datepicker/datepicker3.css')?>">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/daterangepicker/daterangepicker.css')?>">
  <link rel="stylesheet" href="<?=base_url('resources/plugins/timepicker/bootstrap-timepicker.css')?>">
  <link rel="stylesheet" href="<?=base_url('resources/choosen/chosen.css')?>">
  <!-- <link rel="stylesheet" href="<?=base_url('resources/plugins/datatables/dataTables.bootstrap.css')?>"> -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.css">
  <script src="<?=base_url('resources/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.js"></script>
  <script src="http://js.nicedit.com/nicEdit-latest.js"></script>
  

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFfqB8rFDpiWs3sj1DUTgv9T-ETsuKz60"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaqhLPZfssUAhIYjSfJHmQCoTI0EwUuCY&libraries=places&callback=initAutocomplete"
         ></script> -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
  .box-body , .box ,.box-primary{
    min-height:600px;
  }
#mapContainer {
    height: 400px;
    
}
.dataTables_length{
  margin-top: 10px;
}

 #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    .map {
        height: 100%;
      }

/*#mapCanvas {
    width: 100%;
    height: 100%;
}*/
#assigndDriverList_filter,#DriverList_filter,#UserList_filter,#branchList_filter,#couponList_filter,#adList1_filter,#sharedCouponList_filter,#viewdCouponList_filter,#redeemCouponList_filter,#categoryList_filter,#orderList_filter,#campaignList_filter,#remaningUbGoDollarList_filter,#rewardCardsList_filter,#redeemRewardCardList_filter,#campaignListForHomeScreen_filter,#homeScreenList_filter,#homeScreenTrack_filter,#appUserList_filter
{
  display: none !important;
}


.bigBanner
{
background-image: url(bigBanner.png);
    display: block;
    width: 230px;
    height: 465px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    margin: auto;
    position: relative;
    display: inline-block;
    margin: 20px;
}

.bigBanner .banner300x100
{
    border: 1px solid #999;
    width: 204px;
    height: 120px;
    position: relative;
    background-color: #999;
    margin-top: 0px;
    top: 103px;
    left: 12px; 
}

.bigBanner .banner1020x767
{
    border: 1px solid #999;
    width: 204px;
    height: 123px;
    position: relative;
    background-color: #999;
    margin-top: 0px;
    top: 75px;
    left: 12px; 
}

.bigBanner .banner150x100
{
    border: 1px solid #999;
    width: 56px;
    height: 37px;
    position: relative;
    background-color: #999;
    margin-top: 0px;
    top: 369px;
    left: 16px;
  
}

.mainBanner
{
text-align:center;  
}


</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('admin')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Data</b>Entry</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('resources/dist/img/defautUser.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$adminName?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('resources/dist/img/defautUser.png')?>" class="img-circle" alt="User Image">

                <p>
                  <?=$adminName?> - Admin
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url('admin/editProfile')?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('admin/adminLogout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>