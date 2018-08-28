  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content">
  		<?php if($this->session->userdata('adminType')=="1") { 
        $date=date('Y-m-d');
        // $appUserCount=forCountDataSingleTable('where user_role=3','ub_login');
        // $CouponProviderCount=forCountDataSingleTable('where user_role=2','ub_login');
        // $CampaignCount=forCountDataSingleTable('where 1','ub_campaign');
        // $ActiveCampaignCount=forCountDataSingleTable("where endDate>='$date'",'ub_campaign');

        //  $UsedRewardCards=forallcon('where rewardUseStatus!=0','ub_rewards_cards','sum(rewardUseStatus) as useRCard');
        //  if(empty($UsedRewardCards["useRCard"]))
        //   {
        //     $urc=0;
        //   }
        // else
        //   {
        //     $urc=$UsedRewardCards["useRCard"]; 
        //   }

        //   $ActiveRewardCard=forCountDataSingleTable("where expireDate>='$date'",'ub_rewards_cards');

       ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$appUserCount?></h3>

              <p>All User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?=base_url('admin/appUserList')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

      </div>
  	<?php } ?>
  	<?php if($this->session->userdata('adminType')=="2") { 
      $date=date('Y-m-d');
  		$result=forsingleData("user_login_id",$this->session->userdata('adminId'),"ub_add_provider","totalUbGoDollar,remaningUbGoDollar");


       $CampaignCount=forCountDataSingleTable('where uc1.ownerId='.$this->session->userdata('adminId'),'ub_campaign as uc join ub_coupon as uc1 on uc1.couponId=uc.couponId');
        $ActiveCampaignCount=forCountDataSingleTable("where uc.endDate>='$date' and uc1.ownerId=".$this->session->userdata('adminId'),'ub_campaign as uc join ub_coupon as uc1 on uc1.couponId=uc.couponId');

         $UsedRewardCards=forallcon('where rewardUseStatus!=0 and user_login_id='.$this->session->userdata('adminId'),'ub_rewards_cards','sum(rewardUseStatus) as useRCard');
         if(empty($UsedRewardCards["useRCard"]))
          {
            $urc=0;
          }
        else
          {
            $urc=$UsedRewardCards["useRCard"]; 
          }

          $ActiveRewardCard=forCountDataSingleTable("where expireDate>='$date' and user_login_id=".$this->session->userdata('adminId'),'ub_rewards_cards');


  		?>
    <div class="row">
    	
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total UbGo Dollars</span>
              <span class="info-box-number"><?=$result['totalUbGoDollar']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->	
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Remanig UbGo Dollars</span>
              <span class="info-box-number"><?=$result['remaningUbGoDollar']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<div class="clearfix"></div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?=$CampaignCount?></h3>

              <p>All Campaign</p>
            </div>
            <div class="icon">
              <i class="ion  glyphicon-tent"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$ActiveCampaignCount?></h3>

              <p>All Active Campaign</p>
            </div>
            <div class="icon">
              <i class="ion glyphicon-tent"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$CampaignCount-$ActiveCampaignCount?></h3>
              <p>All Expiered Campaign</p>
            </div>
            <div class="icon">
              <i class="ion glyphicon-tent"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?=$urc?></h3>
              <p>Used Reward Cards</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-credit-card"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$ActiveRewardCard?></h3>
              <p>Active Reward Cards</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-credit-card"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

    </div>
    </section>
    <?php } ?>
  </div>
  <!-- /.content-wrapper -->
  


