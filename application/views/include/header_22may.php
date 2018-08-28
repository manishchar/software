<!doctype html>



<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->



<html class="no-js">



    <head>



    <meta charset="utf-8">



    <title>



    <?=$title ?>



    </title>



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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


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



input[type=text] {



	width: 150px !important;



}



.ui-datepicker-trigger {



	margin-top: -55px!important;



	margin-left: 137px!important;



}



</style>



    <style>



.bold {



	font-weight: bold !important;



}



.bg {



	border: 1px solid #c0c0c0;



	margin: 0 2px;



	padding: 0.35em 0.625em 0.75em;



	margin-top: 10px;



	background: #FFFFE0;



}



</style>



    <style type="text/css">



body {



	font-family: Arial;



	font-size: 10pt;



}



.modal {



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



.center {



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



.center img {



	height: 128px;



	width: 128px;



}



.modal-backdrop {



	z-index: 1;



}



</style>



    </head>



    <body>



<div class="modal" id="ajaxLoader" style="display: none">



      <div class="center"> <img alt="" src="<?=base_url('Admin_resources/img/')?>loader.gif" /> </div>



    </div>



<?php if($this->session->userdata('adminType')==1) { ?>



<div id="header">



      <nav class="navbar navbar-default" role="navigation">



    <div class="navbar-header"> <a class="navbar-brand" href="#">Group Admin.<span class="slogan">Panel</span> </a> </div>



    <div id="navbar-no-collapse" class="navbar-no-collapse">



          <ul class="nav navbar-nav">



        <li class="active"><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i>Dashboard</a></li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Master Entry <span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('admin/addHeadquaters');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Headquater</span></a> </li>



            <li><a href="<?php echo base_url('admin/userListForSuperAdmin');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a> </li>



            <li><a href="<?php echo base_url('admin/userLists');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">User Details</span></a> </li>



          </ul>



            </li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Report<span class="caret"></span></a>



              <ul class="dropdown-menu">



              



            <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Activity</span></a>



      <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=daily&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Daily Report</span></a></li>



               <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=week&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Weekly Report</span></a></li>



                <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=month&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Monthly Report</span></a></li>



       

<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>





           <!-- <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Checkebox Based Activity</span></a></li>-->



            <!--<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>



            <li><a href="<?php echo base_url('Ohewiringreport?type=all&activity=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Wiring Progress</span></a></li>



            <li><a href="<?php echo base_url('activity/graph');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Group</span></a></li>
-->


          <!--   <li><a href="<?php echo base_url('activity/graph');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Graph</span></a></li>
 -->


          </ul>



            </li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Create User For Report<span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('report/userListForReport');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a> </li>



          </ul>



            </li>
<li class="dropdown"><a  href="<?php echo base_url('adminviewmasterdata/masterview');?>"><i class="s16 icon icomoon-icon-user"></i>View Master Data<span class="caret"></span></a>

</li>
<!-- <li class="dropdown"><a  href="<?php echo base_url('admin_log');?>"><i class="s16 icon icomoon-icon-user"></i>View log<span class="caret"></span></a>

</li> -->
<!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i> Backup<span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('backup');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Database Backup</span></a> </li>



          </ul>



            </li>-->

      </ul>



          <ul class="nav navbar-right usernav">



        <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" /> <span class="txt">



          <?=$adminName?>



          </span> <b class="caret"></b> </a>



              <ul class="dropdown-menu right">



            <li class="menu">



                  <ul>



                <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a> </li>



              </ul>



                </li>



          </ul>



            </li>



        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a> </li>



      </ul>



        </div>



    <!-- /.nav-collapse --> 



  </nav>



      <!-- /navbar --> 



    </div>



<div id="wrapper">



<?php } ?>







<?php if($this->session->userdata('adminType')==2) { ?>



<div id="header">



      <nav class="navbar navbar-default" role="navigation">



    <div class="navbar-header"> <a class="navbar-brand" href="#"> Group Admin.<span class="slogan">Panel</span> </a> </div>



    <div id="navbar-no-collapse" class="navbar-no-collapse">



          <ul class="nav navbar-nav">



        <li class="active"><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i>Dashboard</a></li>



        



                                            <li><a href="<?php echo base_url('admin/groupList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Group</span></a>



                                            </li>



                                            <li><a href="<?php echo base_url('admin/userListForGroup');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>



                                            </li>



                                            

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Report<span class="caret"></span></a>



              <ul class="dropdown-menu">



              



            <li><a href="<?php echo base_url('activity?from_date=&to_date=&type='.$this->session->userdata('hqId').'&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Activity</span></a>



      <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=daily&type='.$this->session->userdata('hqId').'&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Daily Report</span></a></li>



               <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=week&type='.$this->session->userdata('hqId').'&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Weekly Report</span></a></li>



                <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=month&type='.$this->session->userdata('hqId').'&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Monthly Report</span></a></li>



       

<li><a href="<?php echo base_url('activity/averagetime?from_date=&to_date=&type='.$this->session->userdata('hqId').'&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>





           <!-- <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Checkebox Based Activity</span></a></li>-->



            <!--<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>



            <li><a href="<?php echo base_url('Ohewiringreport?type=all&activity=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Wiring Progress</span></a></li>



            <li><a href="<?php echo base_url('activity/graph');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Group</span></a></li>



            <li><a href="<?php echo base_url('report');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Graph</span></a></li>-->



          </ul>



            </li>

                                        



        



       



      </ul>



          <ul class="nav navbar-right usernav">



        



        <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" /> <span class="txt">



          <?=$adminName?>



          </span> <b class="caret"></b> </a>



              <ul class="dropdown-menu right">



            <li class="menu">



                  <ul>



                <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a> </li>



              </ul>



                </li>



          </ul>



            </li>



        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a> </li>



      </ul>



        </div>



    <!-- /.nav-collapse --> 



  </nav>



      <!-- /navbar --> 



    </div>



<div id="wrapper">



<?php } ?>











<?php if($this->session->userdata('adminType')==3) { ?>



<div id="header">



      <nav class="navbar navbar-default" role="navigation">



    <div class="navbar-header"> <a class="navbar-brand" href="#"> Group Admin.<span class="slogan">Panel</span> </a> </div>



    <div id="navbar-no-collapse" class="navbar-no-collapse">



          <ul class="nav navbar-nav">



        <li class="active"><a href="<?=base_url('admin')?>"><i class="s16 icomoon-icon-screen-2"></i>Dashboard</a></li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Master Entry <span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('admin/locationList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Location</span></a> </li>



            <li><a href="<?php echo base_url('admin/sectionList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Station</span></a> </li>



            <li><a href="<?php echo base_url('section');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Section</span></a> </li>



            <li><a href="<?php echo base_url('division');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Division</span></a> </li>



            <li><a href="<?php echo base_url('railway');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Railway</span></a> </li>



            <li><a href="<?php echo base_url('state');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add State</span></a> </li>

            <li><a href="<?php echo base_url('buildingtype');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Buliding Type</span></a> </li>

            <li><a href="<?php echo base_url('admin/userList');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a> </li>



          </ul>



            </li>

            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Report<span class="caret"></span></a>



              <ul class="dropdown-menu">



              



            <li><a href="<?php echo base_url('activity?from_date=&to_date=&type='.$this->session->userdata('hqId').'&activity=all&group='.$this->session->userdata('groupId'));?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Activity</span></a>



      <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=daily&type='.$this->session->userdata('hqId').'&activity=all&group='.$this->session->userdata('groupId'));?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Daily Report</span></a></li>



               <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=week&type='.$this->session->userdata('hqId').'&activity=all&group='.$this->session->userdata('groupId'));?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Weekly Report</span></a></li>



                <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=month&type='.$this->session->userdata('hqId').'&activity=all&group='.$this->session->userdata('groupId'));?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Monthly Report</span></a></li>



       

<li><a href="<?php echo base_url('activity/averagetime?from_date=&to_date=&type='.$this->session->userdata('hqId').'&activity=all&group='.$this->session->userdata('groupId'));?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>





           <!-- <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Checkebox Based Activity</span></a></li>-->



            <!--<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>



            <li><a href="<?php echo base_url('Ohewiringreport?type=all&activity=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Wiring Progress</span></a></li>



            <li><a href="<?php echo base_url('activity/graph');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Group</span></a></li>



            <li><a href="<?php echo base_url('report');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Graph</span></a></li>-->



          </ul>



            </li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Work Master Entry<span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('admin/ohe1List') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE MASTER</span></a></li>



            <li><a href="<?php echo base_url('admin/ohe2List') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WIRING Master</span></a></li>



            <li><a href="<?php echo base_url('admin/yardList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">YARD Master</span></a></li>



            <li><a href="<?php echo base_url('admin/swsList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">SWS Master</span></a></li>



            <li><a href="<?php echo base_url('admin/tssList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TSS Master</span></a></li>



            <li><a href="<?php echo base_url('admin/trList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TR LINE Master</span></a></li>



            <li><a href="<?php echo base_url('admin/htxingList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Xing Master</span></a></li>



            <li><a href="<?php echo base_url('admin/ltModList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">LT Mod Master</span></a></li>



            <li><a href="<?php echo base_url('admin/psList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">PS to CLS Master</span></a></li>

            <li><a href="<?php echo base_url('civilbuilding') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Civil Building</span></a></li>

            <li><a href="<?php echo base_url('fob_rob/fobList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">FOB</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/robList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">ROB</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/fobraisedList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Raising Of FOB</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/robraisedList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Raising Of ROB</span></a></li>
            <li><a href="<?php echo base_url('htgauge/htgaugeList') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Gauge</span></a></li>

          </ul>



            </li>



        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Work Entry <span class="caret"></span></a>



              <ul class="dropdown-menu">



            <li><a href="<?php echo base_url('admin/ohe1WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WORK</span></a></li>



            <li><a href="<?php echo base_url('admin/ohe2WorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">OHE WIRING Work</span></a></li>



            <li><a href="<?php echo base_url('admin/yardWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">YARD Work</span></a></li>



            <li><a href="<?php echo base_url('admin/swsWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">SWS Work</span></a></li>



            <li><a href="<?php echo base_url('admin/tssWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TSS Work</span></a></li>



            <li><a href="<?php echo base_url('admin/trWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">TR LINE Work</span></a></li>



            <li><a href="<?php echo base_url('admin/htXingWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Xing Work</span></a></li>



            <li><a href="<?php echo base_url('admin/ltModWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">LT Mod Work</span></a></li>



            <li><a href="<?php echo base_url('admin/psWorkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">PS to CLS Work</span></a></li>

            <li><a href="<?php echo base_url('civilbuilding/civilbuildingworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Civil Building Work</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/fobworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">FOB Work</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/robworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">ROB Work</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/fobraisedworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Raising FOB Work</span></a></li>
            <li><a href="<?php echo base_url('fob_rob/robraisedworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Raising ROB Work</span></a></li>
            <li><a href="<?php echo base_url('htgauge/htgaugeworkProgressForm') ?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">HT Gauge Work</span></a></li>

          </ul>



            </li>



      </ul>



          <ul class="nav navbar-right usernav">



       



        <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" /> <span class="txt">



          <? echo substr($adminName,0,8);?>



          </span> <b class="caret"></b> </a>



              <ul class="dropdown-menu right">



            <li class="menu">



                  <ul>



                <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a> </li>



              </ul>



                </li>



          </ul>



            </li>



        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a> </li>



      </ul>



        </div>



    <!-- /.nav-collapse --> 



  </nav>



      <!-- /navbar --> 



    </div>



<div id="wrapper">



<?php } ?>







<?php if($this->session->userdata('adminType')==4) { $data=getPermission($this->session->userdata('userId'));



$permission=explode(',', $data['workModulePermission']) ?>



<div id="header">



      <nav class="navbar navbar-default" role="navigation">



    <div class="navbar-header"> <a class="navbar-brand" href="#"> Group Admin.<span class="slogan">Panel</span> </a> </div>



    <div id="navbar-no-collapse" class="navbar-no-collapse">



          <ul class="nav navbar-nav">



                                    <li><a href="<?php echo base_url('admin/index')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>



                                    </li>



                                   



                                    



                                    



                                   <!--  <li><a href="#"><i class="s16 icon icomoon-icon-user"></i><span class="txt">&nbsp;&nbsp;&nbsp;Master Entry</span></a>



                                  <ul class="sub">



                                            <li><a href="#"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Add Section</span></a>



                                            </li>



                                            <li><a href="#"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Create User</span></a>



                                            </li>



                                            



                                        </ul>



                                    </li> -->



                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Work Entry<span class="caret"></span></a>



                                    <ul class="dropdown-menu">







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



          <ul class="nav navbar-right usernav">



        



        <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" /> <span class="txt">



          <?=$adminName?>



          </span> <b class="caret"></b> </a>



              <ul class="dropdown-menu right">



            <li class="menu">



                  <ul>



                <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a> </li>



              </ul>



                </li>



          </ul>



            </li>



        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a> </li>



      </ul>



        </div>



    <!-- /.nav-collapse --> 



  </nav>



      <!-- /navbar --> 



    </div>



<div id="wrapper">



<?php } ?>







<?php if($this->session->userdata('adminType')==5) {?>



<div id="header">



      <nav class="navbar navbar-default" role="navigation">



    <div class="navbar-header"> <a class="navbar-brand" href="#"> Group Admin.<span class="slogan">Panel</span> </a> </div>



    <div id="navbar-no-collapse" class="navbar-no-collapse">



          <ul class="nav navbar-nav">



                                    <li><a href="<?php echo base_url('admin/index')?>"><i class="s16 icomoon-icon-screen-2"></i><span class="txt">Dashboard</span> </a>



                                    </li>



                                                                 



                                    



                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="s16 icon icomoon-icon-user"></i>Report<span class="caret"></span></a>



                                 <ul class="dropdown-menu">



              



            <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Activity</span></a>



      <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=daily&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Daily Report</span></a></li>



               <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=week&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Weekly Report</span></a></li>



                <li style="padding-left:15px;"><a href="<?php echo base_url('dailyreport?dateType=month&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Monthly Report</span></a></li>



       

<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>





           <!-- <li><a href="<?php echo base_url('activity?from_date=&to_date=&type=all&activity=all&group=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Checkebox Based Activity</span></a></li>-->



            <!--<li><a href="<?php echo base_url('activity/averagetime');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Average Time</span></a></li>



            <li><a href="<?php echo base_url('Ohewiringreport?type=all&activity=all');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Wiring Progress</span></a></li>



            <li><a href="<?php echo base_url('activity/graph');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Group</span></a></li>



            <li><a href="<?php echo base_url('report');?>"><i class="s16 icomoon-icon-arrow-right-3"></i><span class="txt">Graph</span></a></li>-->



          </ul>


                                </li>



                                   



                                    



                                </ul>



          <ul class="nav navbar-right usernav">



        



        <li class="dropdown"> <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"> <img src="<?php echo base_url('Admin_resources/img/avatar.jpg');?>" alt="" class="image" /> <span class="txt">



          <?=$adminName?>



          </span> <b class="caret"></b> </a>



              <ul class="dropdown-menu right">



            <li class="menu">



                  <ul>



                <li><a href="<?=base_url('admin/editProfilePage')?>"><i class="s16 icomoon-icon-user-plus"></i>Edit profile</a> </li>



              </ul>



                </li>



          </ul>



            </li>



        <li><a href="<?=base_url('admin/adminLogout')?>"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a> </li>



      </ul>



        </div>



    <!-- /.nav-collapse --> 



  </nav>



      <!-- /navbar --> 



    </div>



<div id="wrapper">



<?php } ?>