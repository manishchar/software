<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    

<head>
        <meta charset="utf-8">
        <title><?=$title ?></title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
       <!-- <?php //include("include/includecss.php"); ?> -->

       <!--  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css"> -->
        <!-- Css files -->
        <!-- Icons -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
        <link href="<?php echo base_url('Admin_resources/css/icons.css'); ?>" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="<?php echo base_url('Admin_resources/css/bootstrap.css');?>" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="<?php echo base_url('Admin_resources/css/plugins.css');?>" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="<?php echo base_url('Admin_resources/css/main.css');?>" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="<?php echo base_url('Admin_resources/css/custom.css');?>" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('Admin_resources/img/ico/apple-touch-icon-144-precomposed.html');?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('Admin_resources/img/ico/apple-touch-icon-114-precomposed.html');?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('Admin_resources/img/ico/apple-touch-icon-72-precomposed.html');?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('Admin_resources/img/ico/apple-touch-icon-57-precomposed.html');?>">
        <link rel="icon" href="<?php echo base_url('Admin_resources/img/ico/favicon.html');?>" type="image/png">
        <link rel="stylesheet" href="<?php echo base_url('Admin_resources/choosen/chosen.css');?>">

        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
        <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->




        <script>
            var str="";
            var res;
        </script>
        <style>



  .bold
  {
    font-weight: bold !important;
  }
  .bg
  {

    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
    margin-top: 10px;
    background: #FFFFE0;
}
  
</style>
 <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        .modal
        {
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: Black;
            filter: alpha(opacity=60);
            opacity: 0.6;
            -moz-opacity: 0.8;
        }
        .center
        {
            z-index: 1000;
            margin: 300px auto;
            padding: 10px;
            width: 11%;
            background-color: White;
            border-radius: 10px;
            filter: alpha(opacity=100);
            opacity: 1;
            -moz-opacity: 1;
        }
        .center img
        {
            height: 128px;
            width: 128px;
        }
        .modal-backdrop
        {
             z-index: 1;
        }
    </style>
    </head>
    <body>
    <div class="modal" style="display: none">
        <div class="center">
            <img alt="" src="<?=base_url('Admin_resources/img/')?>loader.gif" />
        </div>
    </div>
  <div id="header"> 
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
</
<?php if($this->session->userdata('adminType')==1) { ?>
<div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                Super Admin.<span class="slogan">Panel</span>
            </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href="#" class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="s16 icomoon-icon-earth"></i><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-user-plus"></i></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-bubble-3"></i></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-new"></i></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <i class="s16 fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" />
                                <span class="txt"><?=$adminName?></span>
                                <b class="caret"></b>
                            </a>
                            <!-- <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul>
                                        <li><a href="<?php echo base_url('admin/changePassword') ?>"><i class="s16 icomoon-icon-user-plus"></i>Chnage Password</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul> -->
                        </li>
                        <li><a href="<?=base_url('index.php/admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
            
        </div>

        <div id="wrapper">
        
            <!-- #wrapper -->
            <!--Sidebar background-->
            <div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
            <!--Sidebar content-->
            
         <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <!--<div class="shortcuts">
                    <ul>
                        <li><a href="support.html" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
                        </li>
                        <li><a href="#" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
                        </li>
                        <li><a href="charts.html" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
                        </li>
                        <li><a href="#" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="sidenav">
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class="mainnav">
                                <ul>
                                    <li><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                   
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>
                                  <ul class="sub">
                                            <li><a href="<?php echo base_url('admin/addHeadquaters');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Headquater</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('admin/userListForSuperAdmin');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('admin/userLists');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">User Details</span></a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    
                                    <li><a href="<?php echo base_url('report');?>"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Report</span></a>
                                    
                                    </li>
                                   
                                   <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Create User For Report</span></a>
                                  <ul class="sub">
                                    <li><a href="<?php echo base_url('report/userListForReport');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                    </li>
                                      </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- End sidenav -->
              
                 
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
          
            <?php } ?>

             <?php if($this->session->userdata('adminType')==2) { ?>

             <div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                HQ Admin.<span class="slogan">Panel</span>
            </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href="#" class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="s16 icomoon-icon-earth"></i><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-user-plus"></i></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-bubble-3"></i></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-new"></i></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <i class="s16 fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" />
                                <span class="txt"><?=$adminName?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul>
                                        <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>
        <div id="wrapper">
            <!-- #wrapper -->
            <!--Sidebar background-->
            <div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
                <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <!--<div class="shortcuts">
                    <ul>
                        <li><a href="support.html" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
                        </li>
                        <li><a href="#" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
                        </li>
                        <li><a href="charts.html" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
                        </li>
                        <li><a href="#" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="sidenav">
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class="mainnav">
                                <ul>
                                    <li><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                   
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>
                                  <ul class="sub">
                                            <li><a href="<?php echo base_url('admin/groupList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Group</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('admin/userListForGroup');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    
                                   <!--  <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Buyer</span></a>
                                    </li> -->
                                   
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- End sidenav -->
              
                 
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
            
             <?php } ?>
              <?php if($this->session->userdata('adminType')==3) { ?>

              <div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                Group Admin.<span class="slogan">Panel</span>
            </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href="#" class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="s16 icomoon-icon-earth"></i><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-user-plus"></i></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-bubble-3"></i></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-new"></i></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <i class="s16 fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" />
                                <span class="txt"><?=$adminName?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul>
                                        <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>

<div id="wrapper">
            <!-- #wrapper -->
            <!--Sidebar background-->
            <div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
                <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <!--<div class="shortcuts">
                    <ul>
                        <li><a href="support.html" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
                        </li>
                        <li><a href="#" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
                        </li>
                        <li><a href="charts.html" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
                        </li>
                        <li><a href="#" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="sidenav">
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class="mainnav">
                                <ul>
                                    <li><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                   
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>
                                  <ul class="sub">

                                            <li><a href="<?php echo base_url('admin/locationList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Location</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('admin/sectionList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Station</span></a>
                                            </li>
                                            
                                            <li><a href="<?php echo base_url('section');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Section</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('division');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Division</span></a>
                                            </li>

                                            <li><a href="<?php echo base_url('railway');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Railway</span></a>
                                            </li>

                                            <li><a href="<?php echo base_url('state');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add State</span></a>
                                            </li>

                                            <li><a href="<?php echo base_url('admin/userList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Work Master Entry</span></a>
                                    <ul class="sub">
                                        <li><a href="<?php echo base_url('admin/ohe1List') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE MASTER</span></a></li>

                                        

                                         <li><a href="<?php echo base_url('admin/ohe2List') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WIRING Master</span></a></li>
                                         
                                          <li><a href="<?php echo base_url('admin/yardList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">YARD Master</span></a></li>
                                          
                                          <li><a href="<?php echo base_url('admin/swsList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">SWS Master</span></a></li>

                                          

                                          <li><a href="<?php echo base_url('admin/tssList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TSS Master</span></a></li>

                                          
                                          <li><a href="<?php echo base_url('admin/trList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TR LINE Master</span></a></li>

                                          

                                          <li><a href="<?php echo base_url('admin/htxingList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Xing Master</span></a></li>

                                          

  <li><a href="<?php echo base_url('admin/ltModList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">LT Mod Master</span></a></li>



  <li><a href="<?php echo base_url('admin/psList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">PS to CLS Master</span></a></li>

  

                                    </ul>
                                    </li>
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Work Entry</span></a>
                                    <ul class="sub">
                                        <li><a href="<?php echo base_url('admin/ohe1WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WORK</span></a></li>

                                        <li><a href="<?php echo base_url('admin/ohe2WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WIRING Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/yardWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">YARD Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/swsWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">SWS Work</span></a></li>
                                        <li><a href="<?php echo base_url('admin/tssWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TSS Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/trWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TR LINE Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/htXingWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Xing Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/ltModWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">LT Mod Work</span></a></li>

                                        <li><a href="<?php echo base_url('admin/psWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">PS to CLS Work</span></a></li>

                                    </ul>

                                    </li>
                                    <!-- <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Work Peogress Entry</span></a>
                                    <ul class="sub">
                                        <li><a href="<?php echo base_url('admin/#') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE</span></a></li>
                                    </ul>
                                    </li> -->
                                   <!-- <li>
                                       <a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Work List</span></a>
                                       <ul class="sub">
                                           <li>
                                               <a href="<?php echo base_url('admin/ohe1List')?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE I List</span></a>
                                           </li>
                                       </ul>
                                   </li> -->
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- End sidenav -->
              
                 
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
           
             <?php } ?>
             <?php 

             if($this->session->userdata('adminType')==4) { $data=getPermission($this->session->userdata('userId'));
$permission=explode(',', $data['workModulePermission']) ?>
                        <div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                Operator Admin.<span class="slogan">Panel</span>
            </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href="#" class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="s16 icomoon-icon-earth"></i><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-user-plus"></i></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-bubble-3"></i></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-new"></i></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <i class="s16 fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" />
                                <span class="txt"><?=$adminName?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                     <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul>
                                        <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url('index.php/admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>
<div id="wrapper">
            <!-- #wrapper -->
            <!--Sidebar background-->
            <div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
                <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <!--<div class="shortcuts">
                    <ul>
                        <li><a href="support.html" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
                        </li>
                        <li><a href="#" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
                        </li>
                        <li><a href="charts.html" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
                        </li>
                        <li><a href="#" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="sidenav">
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class="mainnav">
                                <ul>
                                    <li><a href="<?php echo base_url('admin/index')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                   
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>
                                  <ul class="sub">
                                            <!-- <li><a href="#"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Section</span></a>
                                            </li>
                                            <li><a href="#"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                            </li> -->
                                            
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Work Entry</span></a>
                                    <ul class="sub">

                                    <?php //$arr=explode(',', $this->session->userdata('workModulePermission')); ?>

                                        <?php if(in_array('ohe1', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/ohe1WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WORK</span></a></li>
                                        <?php } ?>

                                        <?php if(in_array('ohe2', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/ohe2WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WIRING Work</span></a></li>
                                        <?php } ?>
                                        <?php if(in_array('YARD', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/yardWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">YARD Work</span></a></li>
                                        <?php } ?>
                                        <?php if(in_array('SWS', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/swsWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">SWS Work</span></a></li>
                                        <?php } ?>

                                        <?php if(in_array('TSS', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/tssWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TSS Work</span></a></li>
                                            <?php } ?>

                                            <?php if(in_array('TR', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/trWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TR LINE Work</span></a></li>
                                            <?php } ?>
                                            <?php if(in_array('HT', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/htXingWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Xing Work</span></a></li>
                                            <?php } ?>
                                            <?php if(in_array('LT', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/ltModWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">LT Mod Work</span></a></li>
                                        <?php } ?>
                                        <?php if(in_array('PS', $permission)) { ?>
                                        <li><a href="<?php echo base_url('admin/psWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">PS to CLS Work</span></a></li>
                                        <?php } ?>

                                    </ul>

                                    </li>
                                    
                                    <!-- <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Buyer</span></a>
                                    </li> -->
                                   
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- End sidenav -->
              
                 
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
             <?php } ?>

             <?php 

             if($this->session->userdata('adminType')==5) { $data=getPermission($this->session->userdata('userId'));
$permission=explode(',', $data['workModulePermission']) ?>
                        <div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                Operator Admin.<span class="slogan">Panel</span>
            </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href="#" class="collapseBtn leftbar"><i class="s16 minia-icon-list-3"></i></a>
                        </li>
                        
                        
                        
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="s16 icomoon-icon-earth"></i><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-user-plus"></i></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-bubble-3"></i></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><i class="s16 icomoon-icon-new"></i></span>
                                                <span class="event">admin Julia added post with a long description</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <i class="s16 fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" />
                                <span class="txt"><?=$adminName?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul class="dropdown-menu right">
                                <li class="menu">
                                    <ul>
                                        <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url('index.php/admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>
<div id="wrapper">
            <!-- #wrapper -->
            <!--Sidebar background-->
            <div id="sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
                <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <!--<div class="shortcuts">
                    <ul>
                        <li><a href="support.html" title="Support section" class="tip"><i class="s24 icomoon-icon-support"></i></a>
                        </li>
                        <li><a href="#" title="Database backup" class="tip"><i class="s24 icomoon-icon-database"></i></a>
                        </li>
                        <li><a href="charts.html" title="Sales statistics" class="tip"><i class="s24 icomoon-icon-pie-2"></i></a>
                        </li>
                        <li><a href="#" title="Write post" class="tip"><i class="s24 icomoon-icon-pencil"></i></a>
                        </li>
                    </ul>
                </div>-->
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="sidenav">
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class="mainnav">
                                <ul>
                                    <li><a href="<?php echo base_url('admin/index')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                      <li><a href="<?php echo base_url('report');?>"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Report</span></a>
                                    
                                    </li>
                                   
                                  </ul>
                            </div>
                        </div>
                        <!-- End sidenav -->
              
                 
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
             <?php } ?>