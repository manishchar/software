
        <!-- / #header -->
        
            <!-- End #sidebar -->
            <!--Sidebar background-->
            <div id="right-sidebarbg" class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
            <!-- Start #right-sidebar -->
            
            <!-- End #right-sidebar -->
            <!--Body content-->
            <div id="content" class="page-content clearfix">
                <div class="contentwrapper">
                    <!--Content wrapper-->
                    <div class="heading">
                        <!--  .heading-->
                        <h3>Dashboard</h3>
                        <div class="resBtnSearch">
                            <a href="#"><span class="s16 icomoon-icon-search-3"></span></a>
                        </div>
                    
                        <!--  /search -->
                  
                    </div>
                    <!-- End  / heading-->
                    <?php if($this->session->userdata('adminType')==1) {
						
	//$user=allusers();
	$user=admindata();
	$headquaters=allheadquaters();
	$location=adminalldata('location');
	$station=adminalldata('station');
						?>
                    <div class="row">
                        <!-- .row -->
                        <div class="col-md-8">
                            <!-- col-md-8 start here -->
                            <div class="row">
                                <!-- .row start -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/addHeadquaters" title="Total Headquaters" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Headquaters</span>
                                        <span class="notification"><?php echo $headquaters; ?></span>
                                    </a>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/userLists" title="Total Users" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Users</span>
                                        <span class="notification blue"><?php echo $user; ?></span>
                                    </a>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="#" title="Total Stations" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Stations</span>
                                        <span class="notification green"><?php echo $station; ?></span>
                                    </a>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="#" title="Total Locations" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Locations</span>
                                        <span class="notification blue"><?php echo $location; ?></span>
                                    </a>
                                </div>
                               
                            </div>
                            <!-- / .row -->
                        </div>
                      
                    </div>
                    <?php } ?>

                    <?php if($this->session->userdata('adminType')==2) {					
	$group=forall('hqId',$this->session->userdata('hqId'),'groups');
	$user=forall('createdBy',$this->session->userdata('adminId'),'adminlogin');
	$location=groupdata($this->session->userdata('adminId'),'location');
	$station=groupdata($this->session->userdata('adminId'),'station');					
						?>
                    <div class="row">
                        <!-- .row -->
                        <div class="col-md-8">
                            <!-- col-md-8 start here -->
                            <div class="row">
                                <!-- .row start -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/groupList" title="Total Groups" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Groups</span>
                                        <span class="notification"><?php echo $group; ?></span>
                                    </a>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/userListForGroup" title="Total Users" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Users</span>
                                        <span class="notification"><?php echo $user; ?></span>
                                    </a>
                                </div>
                                <!-- / .col-md-3 -->
                               
                                <!-- / .col-md-3 -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/userListForGroup?con=station" title="Total Stations" class="stats-btn pattern tipB mb20">
                                        <i class="icon icomoon-icon-stop"></i>
                                        <span class="txt">Total Stations</span>
                                        <span class="notification green"><?php echo $station ?></span>
                                    </a>
                                </div>

                                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/userListForGroup?con=location" class="stats-btn tipB mb20" title="Total Location">
                                        <i class="icon icomoon-icon-location" ></i>
                                        <span class="txt">Total Location</span>
                                        <span class="notification blue"><?php echo $location; ?></span>
                                    </a>
                                </div>
                                <!-- / .col-md-3 -->
                                
                                <!-- / .col-md-3 -->
                            </div>
                            <!-- / .row -->
                        </div>
                        <!-- col-md-8 end here -->
                        
                        <!-- col-md-4 end here -->
                    </div>
                    <?php } ?>

                    <?php if($this->session->userdata('adminType')==3) {
						
	$user=forall('createdBy',$this->session->userdata('adminId'),'adminlogin');
	$location=forall('groupId',$this->session->userdata('groupId'),'location');
	$station=forall('groupId',$this->session->userdata('groupId'),'station');					
						?>
                    <div class="row">
                        <!-- .row -->
                        <div class="col-md-8">
                            <!-- col-md-8 start here -->
                            <div class="row">
                                <!-- .row start -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/userList" title="Total Users" class="stats-btn tipB mb20">
                                        <i class="icon icomoon-icon-users"></i>
                                        <span class="txt">Total Users</span>
                                        <span class="notification"><?php echo $user; ?></span>
                                    </a>
                                </div>
                                <!-- / .col-md-3 -->

                                <!-- / .col-md-3 -->
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/sectionList" title="Total Stations" class="stats-btn pattern tipB mb20">
                                        <i class="icon icomoon-icon-stop"></i>
                                        <span class="txt">Total Stations</span>
                                        <span class="notification green"><?php echo $station ?></span>
                                    </a>
                                </div>

                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <!-- .col-md-3 -->
                                    <a href="<?php echo base_url(); ?>admin/locationList" class="stats-btn tipB mb20" title="Total Location">
                                        <i class="icon icomoon-icon-location" ></i>
                                        <span class="txt">Total Location</span>
                                        <span class="notification blue"><?php echo $location; ?></span>
                                    </a>
                                </div>
                                <!-- / .col-md-3 -->
                                
                                <!-- / .col-md-3 -->
                            </div>
                            <!-- / .row -->
                        </div>
                        <!-- col-md-8 end here -->
                        
                        <!-- col-md-4 end here -->
                    </div>
                    <?php } ?>

                    <?php if($this->session->userdata('adminType')==4 OR $this->session->userdata('adminType')==5) {?>
                    <div class="row">
                        <!-- .row -->
                        
                                <!-- .row start -->
                                <div class="col-md-12" style="text-align:center;">
                                    <h2>Welcome's You <span style="color:#ED7A53"><?=strtoupper($adminName)?></span></h2>

                                
                            <!-- / .row -->
                        </div>
                       
                        <!-- col-md-4 end here -->
                    </div>
                    <?php } ?>

                    <!-- / .row -->
               
                    <!-- / .row -->
                </div>
                <!-- End contentwrapper -->
            </div>
            <!-- End #content -->
         