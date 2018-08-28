<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <title>User Login</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
       <!--  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css"> -->
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
    <body class="login-page" style="background-image: url(<?php echo base_url('Admin_resources/img/railelectrification.jpg');?>);background-size:cover;">
        <div id="header" class="animated fadeInDown">
            <div class="row">
                <div class="navbar">
                    <div class="container text-center">
<marquee  id='scroll_news' behavior="scroll" direction="left" onMouseOver="document.getElementById('scroll_news').stop();" onMouseOut="document.getElementById('scroll_news').start();" style="font-size:26px; font-weight:bold ; color:#000066">Online Progress Monitoring Module For CORE/Allahabad </marquee>
 
 
                    </div>
                </div>
                <!-- /navbar -->
            </div>
           
          <div style="text-align:center; font-size:20px ; font-weight:bold" >
          
      </span>
          
        
          </div>        
              <!-- End .row -->
        </div>
        <!-- End #header -->
        <!-- Start login container -->
        <div class="container login-container">
          <img src="<?php echo base_url('Admin_resources/img/logo.png');?>"  style="width:250px; height:250px;margin-left: 20px; margin-top:60px;">
            <div class="login-panel panel panel-default plain animated bounceIn" style="margin-top: 0px;">
                <!-- Start .panel -->
                 
                <div class="panel-body">
                  <span style="text-align:center; font-size:18px; font-weight:bold;padding-left: 90px;"> User Login</span>
                  <hr>
                 <div class="error"><?php if(isset($error)){ ?>
                     <p><span style="color:blue;">Email Or Password Mismatch </span></p>
                     <p> <span style="color:red;">Login Attemp remaning <?php echo 3-$error; } ?></span></p>
                     <?php if(isset($deactivate)) { ?>
                     <p><span style="color:red;"><?php echo $deactivate ;?></span> </p>
                     <?php } ?>
                 </div>
               
                    <form class="form-horizontal mt0" action="<?php echo base_url('index.php/login/login'); ?>" id="login-form" role="form" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- col-md-12 start here -->
                                <label for="">Email Id:</label>
                            </div>
                            <!-- col-md-12 end here -->
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <input type="email" name="adminEmail" id="adminEmail" class="form-control" value="" placeholder="Enter email id" required>
                                    <span class="input-group-addon"><i class="icomoon-icon-user s16"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- col-md-12 start here -->
                                <label for="">Password:</label>
                            </div>
                            <!-- col-md-12 end here -->
                            <div class="col-lg-12">
                                <div class="input-group input-icon">
                                    <input type="password" name="adminPassword" id="adminPassword" class="form-control" value="" placeholder="Your password">
                                    <span class="input-group-addon"><i class="icomoon-icon-lock s16"></i></span> 
                                </div>
                               <!--  <span class="help-block text-right"><a href="lost-password.html">Forgot password ?</a></span>  -->
                            </div>
                        </div>
						
                        <div class="form-group mb0">
                         
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                                <button class="btn btn-default " type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="seperator">
                        
                        <hr>
                         <span style="font-size:8px">© 2017 CopyWrite CORE/Allhabad Develope by <a href="http://alinasoftwares.com/" target="_blank">Alina Softwares</a></span>
                    </div>
                  
                </div>
             
            </div>
            <!-- End .panel -->
            
        
         
        </div>
        
        
        <!-- End login container -->
     
        <!-- Javascripts -->
        <!-- Important javascript libs(put in all pages) -->
           <script src="<?php echo base_url('Admin_resources/plugins/core/pace/pace.min.js')?>"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="<?php echo base_url('Admin_resources/js/jquery-2.1.1.min.js')?>"></script>
        <script>
        window.jQuery || document.write('<script src="<?php echo base_url('Admin_resources/js/libs/jquery-2.1.1.min.js')?>">\x3C/script>')
        </script>
        <script src="<?php echo base_url('Admin_resources/js/ui/1.10.4/jquery-ui.js')?>"></script>
        <script>
        window.jQuery || document.write('<script src="<?php echo base_url('Admin_resources/js/libs/jquery-ui-1.10.4.min.js')?>">\x3C/script>')
        </script>
        <script src="<?php echo base_url('Admin_resources/js/jquery-migrate-1.2.1.min.js')?>"></script>
        <script>
        window.jQuery || document.write('<script src="<?php echo base_url('Admin_resources/Admin_resources/js/libs/jquery-migrate-1.2.1.min.js')?>">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="<?php echo base_url('Admin_resources/js/bootstrap/bootstrap.js')?>"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="<?php echo base_url('Admin_resources/js/libs/modernizr.custom.js')?>"></script>
        <!-- Handle responsive view functions -->
        <script src="<?php echo base_url('Admin_resources/js/jRespond.min.js')?>"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="<?php echo base_url('Admin_resources/plugins/core/slimscroll/jquery.slimscroll.min.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js')?>"></script>
        <!-- Remove click delay in touch -->
        <script src="<?php echo base_url('Admin_resources/plugins/core/fastclick/fastclick.js')?>"></script>
        <!-- Increase jquery animation speed -->
        <script src="<?php echo base_url('Admin_resources/plugins/core/velocity/jquery.velocity.min.js')?>"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="<?php echo base_url('Admin_resources/plugins/core/quicksearch/jquery.quicksearch.js')?>"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="<?php echo base_url('Admin_resources/plugins/ui/bootbox/bootbox.js')?>"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="<?php echo base_url('Admin_resources/plugins/charts/sparklines/jquery.sparkline.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/knob/jquery.knob.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.custom.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.pie.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.resize.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.time.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.growraf.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.categories.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.stack.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.orderBars.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/charts/flot/jquery.flot.tooltip.min.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/ui/waypoint/waypoints.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/plugins/forms/autosize/jquery.autosize.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/js/jquery.supr.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/js/main.js')?>"></script>
        <script src="<?php echo base_url('Admin_resources/js/pages/dashboard.js')?>"></script>
    </body>

</html>