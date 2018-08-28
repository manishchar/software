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

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
        <!-- Css files -->
        <!-- Icons -->

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


        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body>

<div id="header">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index-2.html">
                Admin.<span class="slogan">Panel</span>
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
                                        <li><a href="#"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a>
                                        </li>
                                        <li><a href="#"><i class="s16 icomoon-icon-bubble-2"></i>Comments</a>
                                        </li>
                                        <li><a href="#"><i class="s16 icomoon-icon-plus"></i>Add user</a>
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
                                    <li><a href="index-2.html"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>
                                    </li>
                                   
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>
                                  <ul class="sub">
                                            <li><a href="<?php echo base_url('index.php/admin/groupList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Group</span></a>
                                            </li>
                                            <li><a href="<?php echo base_url('index.php/admin/createAdminForGroup');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    
                                    
                                    <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Buyer</span></a>
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