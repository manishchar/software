<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct()

    {

        parent::__construct();
        error_reporting(0);
    }

public function user_login($email, $password)
{
    if(empty($_POST['socialKey']))
    {

        if(!empty($email))
        {

        $result=$this->db->query("SELECT emailId,loginId FROM login where emailId='".$email."' AND password='".md5($password)."' AND status=1");
   $show_count =$result->num_rows();

    if($show_count==1)
    {
     $rows=$result->result();

     // $apiKey='key_'.strtotime(date('Y-m-d H:i:s'));   

     $this->db->query("UPDATE device_token set deviceType='".$_POST['deviceType']."',token='".$_POST['token']."',deviceId='".$_POST['deviceId']."' where loginId='".$rows[0]->loginId."'");
        
      return $this->db->query("SELECT * FROM login as ul join user as ubd on ubd.loginId=ul.loginId Join address as ad on ul.loginId=ad.loginId where ul.loginId='".$rows[0]->loginId."' and ul.status=1")->result();
   
    }
    else
    {
        return false;
    } 
        }
        else
        {
            return false;
        }
	

}
else
{
    
    $result=$this->db->query("SELECT emailId,loginId FROM login where emailId='".$email."' AND status=1");
    $show_count =$result->num_rows();
    if($show_count==1)
    {
     $rows=$result->result();

     $apiKey='key_'.strtotime(date('Y-m-d H:i:s')); 
        
        $lastId=$rows[0]->loginId;

        $this->db->query("UPDATE login set emailId='".$_POST['emailId']."',socialType='".$_POST['socialType']."',socialKey='".$_POST['socialKey']."' where loginId='".$lastId."'");

     $this->db->query("UPDATE device_token set token='".$_POST['token']."',deviceId='".$_POST['deviceId']."',deviceType='".$_POST['deviceType']."' where loginId='".$lastId."'");
               
      return $this->db->query("SELECT * FROM login as ul join user as ubd on ubd.loginId=ul.loginId Join address as ad on ul.loginId=ad.loginId where ul.loginId='".$lastId."' and ul.status=1")->result();
   
    }
    else
    {
        $this->db->query("INSERT INTO login set emailId='".$_POST['emailId']."',mobileNo='".$_POST['mobileNo']."',password='".md5($_POST['socialKey'])."',socialType='".$_POST['socialType']."',socialKey='".$_POST['socialKey']."',roleType='USER',role=3");
            
            $lastId=$this->db->insert_id();

            $this->db->query("INSERT INTO device_token set loginId='".$lastId."' ,token='".$_POST['token']."',deviceId='".$_POST['deviceId']."',deviceType='".$_POST['deviceType']."'");

            $this->db->query("INSERT INTO user set loginId='".$lastId."',name='".$_POST['name']."',age='".$_POST['age']."'");

                
            $userId=$this->db->insert_id();

            $this->db->query("INSERT INTO address set loginId='".$lastId."' ,userId='".$userId."',lat='".$_POST['lat']."',lng='".$_POST['lng']."'");


             return $this->db->query("SELECT * FROM login as ul join user as ubd on ubd.loginId=ul.loginId Join address as ad on ul.loginId=ad.loginId where ul.loginId='".$lastId."' and ul.status=1")->result();
        return false;
    }
}
    	
}
public function checkSessionCredential()
{
    return $this->db->query("SELECT user_email from ub_login where user_login_id='".$_REQUEST['user_login_id']."'")->result();
}

public function userSignOut()
{
    $this->db->query("UPDATE ub_login set user_token_id='' where user_login_id='".$_REQUEST['user_login_id']."' and user_api_key='".$_REQUEST['user_api_key']."'");
        return true;
    
}

public function endUserRegistation()
{   
        $result=array();
        $count=0;
        $apiKey='key_'.strtotime(date('Y-m-d H:i:s'));
       
if(!empty($_POST['emailId']))
{
        
     $result=$this->db->query("SELECT emailId FROM login where emailId='".$_POST['emailId']."'");
        $show_count =$result->num_rows();
        if($show_count==0)
        {
                 
            $this->db->query("INSERT INTO login set emailId='".$_POST['emailId']."',mobileNo='".$_POST['mobileNo']."',password='".md5($_POST['password'])."',roleType='USER',role=3");
            
            $lastId=$this->db->insert_id();

            $this->db->query("INSERT INTO device_token set loginId='".$lastId."' ,token='".$_POST['token']."',deviceId='".$_POST['deviceId']."',deviceType='".$_POST['deviceType']."'");

           $this->db->query("INSERT INTO user set loginId='".$lastId."',name='".$_POST['name']."',age='".$_POST['age']."'");
            
            $userId=$this->db->insert_id();

            $this->db->query("INSERT INTO address set loginId='".$lastId."' ,userId='".$userId."',lat='".$_POST['lat']."',lng='".$_POST['lng']."'");


             return $this->db->query("SELECT * FROM login as ul join user as ubd on ubd.loginId=ul.loginId Join address as ad on ul.loginId=ad.loginId where ul.loginId='".$lastId."' and ul.status=1")->result();
            //return true;
            
        }
        else
        {
            return false;
         
        }
    }
    else
    {
        return false;
    }

}
 public function updateProfile_old()
 {
    $isupload=1;
    $result=$this->db->query("SELECT user_email from ub_login where user_email='".$_REQUEST['user_email']."' and user_login_id!='".$_REQUEST['user_login_id']."'");
    $coun1t=$result->num_rows();
    if($count1==0)
    {
        if(!empty($_FILES["user_pic"]["name"]))
        {
             $vp=explode('.',$_FILES["user_pic"]["name"]);
             $thumfile= basename($_FILES["user_pic"]["name"]);

        $imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
       
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
    
                   $isupload=0;
    
              }
        if($isupload==1)
        {
             $imgName='user_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
        $targetpaththum="./resources/user/".$imgName;
        
        if (move_uploaded_file($_FILES["user_pic"]["tmp_name"],$targetpaththum)) 
        {

             if(empty($_REQUEST['user_password']))
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ud.user_pic='".$imgName."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }
        else
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ul.user_password='".md5($_REQUEST['user_password'])."',ud.user_pic='".$imgName."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }
    
         }
     }
        }
        else
        {
            if(empty($_REQUEST['user_password']))
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ud.user_pic='".$imgName."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }
        else
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ul.user_password='".md5($_REQUEST['user_password'])."',ud.user_pic='".$imgName."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }
        }
              
    return $this->db->query("SELECT * from ub_login as ul join ub_end_user as ud on ud.user_login_id=ul.user_login_id where ul.user_login_id='".$_REQUEST['user_login_id']."' AND ul.user_api_key='".$_REQUEST['user_api_key']."'")->result();
 }
 else
 {
    return false;
 }

}

public function updateProfile()
{

    $isupload=1;
    $result=$this->db->query("SELECT * from ub_login where user_email='".$_REQUEST['user_email']."' and user_login_id!='".$_REQUEST['user_login_id']."'");
    $count1=$result->num_rows();
    
    if($count1==0)
    {
        $row=$this->db->query("SELECT * from ub_end_user where user_login_id='".$_REQUEST['user_login_id']."'")->row_array();
    $coun1t=$result->num_rows();
        if(!empty($_FILES["user_pic"]["name"]))
        {
             $vp=explode('.',$_FILES["user_pic"]["name"]);
        $thumfile= basename($_FILES["user_pic"]["name"]);

        $imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
       
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
    
                   $isupload=0;
    
               }
               
        if($isupload==1)
        {
             $imgName='user_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
        $targetpaththum="./resources/user/".$imgName;
        move_uploaded_file($_FILES["user_pic"]["tmp_name"],$targetpaththum);
        }
        }
        else
        {
            $imgName=$row['user_pic'];
        }


        if(!empty($_FILES["user_bg_img"]["name"]))
        {
             $vp=explode('.',$_FILES["user_bg_img"]["name"]);
        $thumfile= basename($_FILES["user_bg_img"]["name"]);

        $imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
       
        if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
    
                   $isupload=0;
    
               }
               
        if($isupload==1)
        {
             $imgName1='user_bg_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
        $targetpaththum="./resources/user/".$imgName1;
        if(!move_uploaded_file($_FILES["user_bg_img"]["tmp_name"],$targetpaththum))
        {
            $imgName1=$row['user_bg_img'];
        }
       }
        }
        else
        {
            $imgName1=$row['user_bg_img'];
        }


        if(empty($_REQUEST['user_password']))
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ud.user_pic='".$imgName."',ud.user_bg_img='".$imgName1."',ud.aoi='".$_REQUEST['aoi']."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }
        else
        {
            
            $this->db->query("UPDATE ub_login as ul JOIN ub_end_user as ud on ud.user_login_id=ul.user_login_id set ul.user_email='".$_REQUEST['user_email']."',ud.user_full_name='".$_REQUEST['user_full_name']."',ud.user_mobile='".$_REQUEST['user_mobile']."',ul.user_password='".md5($_REQUEST['user_password'])."',ud.user_pic='".$imgName."',ud.user_bg_img='".$imgName1."',ud.aoi='".$_REQUEST['aoi']."' where ul.user_login_id='".$_REQUEST['user_login_id']."'");
        }

        return $this->db->query("SELECT * from ub_login as ul join ub_end_user as ud on ud.user_login_id=ul.user_login_id where ul.user_login_id='".$_REQUEST['user_login_id']."' AND ul.user_api_key='".$_REQUEST['user_api_key']."'")->result();
       
 }
 else
 {
    return false;
 }


}

public function viewCoupon()
{
    $this->db->query("INSERT INTO ub_view_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',viewCount=1  ON DUPLICATE KEY UPDATE viewCount=viewCount+1");
    
    return $this->db->query("SELECT * from ub_social_share_coupon where user_login_id='".$_REQUEST['user_login_id']."' AND couponId='".$_REQUEST['couponId']."'")->num_rows();
}
public function redeemCoupon()
{
    $date=date('Y-m-d');
        
    $result= $this->db->query("SELECT * FROM ub_coupon as uap JOIN ub_campaign as uc ON uc.couponId=uap.couponId  where uc.startDate<='".$date."' and uc.endDate>='".$date."'")->result();
    if($result)
    {
        $result1=$this->db->query("SELECT * FROM ub_redeem_coupon where user_login_id='".$_REQUEST['user_login_id']."' and couponId='".$_REQUEST['couponId']."'")->result();
        if($result1)
        {
            $res=$this->db->query("SELECT * from ub_login as ul join ub_coupon as uc on uc.ownerId=ul.user_login_id where uc.couponId='".$_REQUEST['couponId']."'")->result();
            
             $msg=array('message'=>'This Coupon'.$res->ub_coupon.' Redeemed',"email"=>$res->user_email,"subject"=>"New Registation");

            if($result[0]->useValue==$result1[0]->couponUseTimes)
            {
                return false;
            }
            else
            {
                // $this->db->query("UPDATE ub_redeem_coupon set couponUseTimes=couponUseTimes+1 where redeemId='".$result1[0]->redeemId."'");
                $this->db->query("INSERT INTO ub_redeem_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',couponUseTimes=1");

              $this->sendEmailMobileActivity($msg);

                return $result;
            }
        }
        else
        {
            $this->db->query("INSERT INTO ub_redeem_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',couponUseTimes=1");

            
            return $result;
        }
    }
    else
    {
        return false;
    }
    
}

public function redeemRewardCard()
{
    $date=date('Y-m-d');
        
   // $result= $this->db->query("")->result();
    $result=$this->db->query("SELECT * from ub_rewards_cards where rewardsId='".$_REQUEST['rewardsId']."'")->row_array();
       
       if($result['rewardUseStatus']-$result['rewardCardQuantity']!=0)
       {
            $res=$this->db->query("INSERT INTO ub_redeem_reward_card set rewardsId='".$_REQUEST['rewardsId']."',user_login_id='".$_REQUEST['user_login_id']."',spentPoints='".$_REQUEST['spentPoints']."'");
            if($res)
            {
                $this->db->query("UPDATE ub_rewards_cards set rewardUseStatus=rewardUseStatus+1 
                                where 
                                rewardsId='".$_REQUEST['rewardsId']."'
                                    ");
                $this->db->query("UPDATE ub_end_user set remaningPoints=remaningPoints-'".$_REQUEST['spentPoints']."' where user_login_id='".$_REQUEST['user_login_id']."'");

                $this->db->query("UPDATE ub_add_provider set remaningUbGoDollar=remaningUbGoDollar+'".($result['actualDollar']*3)."' where user_login_id='".$result['user_login_id']."'");

                return true;
            }
            else
            {
                return false;
            }
       }
       else
       {
        return false;
       }
            
 
}



public function notificationList()
{
    $date=date('Y-m-d');
    
    
    return $this->db->query("SELECT * FROM notificationHistory as nh join ub_coupon as uc on uc.couponId=nh.couponId join ub_campaign as uc1 on uc1.couponId=uc.couponId join ub_add_provider as uap on uap.user_login_id=uc.ownerId join ub_branch as ub on ub.id=uc.restaurantId where nh.user_login_id= '".$_REQUEST['user_login_id']."' and uc1.endDate>='".$date."' order by nh.notificationId desc limit 0,50")->result();
}

public function catList()
{
    return $this->db->query("SELECT * FROM ub_category where status=1")->result();
}
public function viewBranch()
{
    return $this->db->query("SELECT * FROM ub_branch where id='".$_REQUEST['branchId']."' and status=1")->result();

    // return $this->db->query("SELECT * FROM ub_branch as ub LEFT JOIN ub_fav_branch as ufb on ub.id=ufb.branchId where ub.id='".$_REQUEST['branchId']."' and ufb.user_login_id='".$_REQUEST['user_login_id']."' and ub.status=1")->result();
}
public function checkBranchLike()
{               
    return $this->db->query("SELECT * FROM ub_fav_branch where user_login_id='".$_REQUEST['user_login_id']."' and branchId='".$_REQUEST['branchId']."'")->result();
}
public function homeScreenCouponList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId join ub_home_screen as uhs on uhs.campaignId=uc.campaignId where uhs.startDate<='".$date."' and uhs.endDate>='".$date."'")->result();
}
public function couponList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where startDate<='".$date."' and endDate>='".$date."'")->result();
}

public function redeemCouponList()
{
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId JOIN ub_redeem_coupon as urc on urc.couponId=uap.couponId where urc.user_login_id='".$_REQUEST['user_login_id']."'")->result();
}
public function shareCouponPointsList()
{
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId JOIN ub_social_share_coupon as urc on urc.couponId=uap.couponId where urc.user_login_id='".$_REQUEST['user_login_id']."'")->result();
}

public function couponDetails()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where uap.couponId='".$_REQUEST['couponId']."'")->result();
}

public function couponSearchApi()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where startDate<='".$date."' and endDate>='".$date."' and (uap.couponTitle LIKE '%".$_REQUEST['searchText']."%' OR uap.couponDescription LIKE '%".$_REQUEST['searchText']."%' OR uap.couponCode LIKE '%".$_REQUEST['searchText']."%' OR ub.branch_name LIKE '%".$_REQUEST['searchText']."%')")->result();
}

public function checkCouponLike($user_login_id,$couponId)
{               
    return $this->db->query("SELECT * FROM ub_fav_coupon where user_login_id='".$user_login_id."' and couponId='".$couponId."'")->num_rows();
}
public function LikeCount($couponId)
{               
    
    return $this->db->query("SELECT * FROM ub_fav_coupon where couponId='".$couponId."'")->num_rows();
}
public function catBasedCouponList()
{
    $date=date('Y-m-d');
    
   // echo "SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where startDate<='".$date."' and endDate>='".$date."' and uc.areaOfIntrest like '%".$_REQUEST['category_id']."%'";
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where startDate<='".$date."' and endDate>='".$date."' and uc.areaOfIntrest = '".$_REQUEST['category_id']."'")->result();
}

public function couponListFav()
{
    $date=date('Y-m-d');
       return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId join ub_fav_coupon as ufc on ufc.couponId=uap.couponId  where uc.startDate<='".$date."' and uc.endDate>='".$date."' and ufc.user_login_id='".$_REQUEST['user_login_id']."'")->result();
}
public function couponListBranchWise($branchId)
{
    $date=date('Y-m-d');
       return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId where uc.startDate<='".$date."' and uc.endDate>='".$date."' and uap.restaurantId='".$branchId."'" )->result();
}




public function branchDataWithLatLng($branchId)
{
        $date=date('Y-m-d');
        if(empty($branchId))
        {
            return $this->db->query("SELECT *,count(uc.couponId) as couponCount from ub_branch as ubb join ub_coupon as uc on uc.restaurantId=ubb.id join ub_campaign as ucc ON uc.couponId=ucc.couponId where ucc.startDate<='".$date."' and ucc.endDate>='".$date."' and ubb.status=1 group by uc.restaurantId")->result();
        }
        else
        {
            return $this->db->query("SELECT *,count(uc.couponId) as couponCount from ub_branch as ubb join ub_coupon as uc on uc.restaurantId=ubb.id join ub_campaign as ucc ON uc.couponId=ucc.couponId where ucc.startDate<='".$date."' and ucc.endDate>='".$date."' and ubb.status=1 and ubb.id='".$branchId."' group by uc.restaurantId")->result();
        }
       
}
 
public function couponListTopRated()
{
    $date=date('Y-m-d');
    return $this->db->query("SELECT *,count(ufc.favId) as cntFavId FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId join ub_fav_coupon as ufc on ufc.couponId=uap.couponId  where uc.startDate<='".$date."' and uc.endDate>='".$date."' group by ufc.couponId ORDER BY cntFavId DESC")->result();
}

public function rewardCardList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_rewards_cards as urc on uac.user_login_id=urc.user_login_id join ub_branch as ub on ub.id=urc.branchId ORDER by urc.ubGoDollars desc,urc.expireDate DESC")->result();
}

public function redeemRewardList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_rewards_cards as urc on uac.user_login_id=urc.user_login_id join ub_branch as ub on ub.id=urc.branchId JOIN ub_redeem_reward_card as urrc on urrc.rewardsId=urc.rewardsId where urrc.user_login_id='".$_REQUEST['user_login_id']."'")->result();
}

public function viewRewardCard()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_rewards_cards as urc on uac.user_login_id=urc.user_login_id join ub_branch as ub on ub.id=urc.branchId where urc.rewardsId='".$_REQUEST['rewardsId']."'")->result();
}

public function topRewardCardList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_rewards_cards as urc on uac.user_login_id=urc.user_login_id join ub_branch as ub on ub.id=urc.branchId where urc.expireDate>='".$date."' order by urc.ubGoDollars DESC limit 0,4")->result();
}

public function couponLike()
{
    
   
    if($_REQUEST['userLike']==1)
    {
       $this->db->query("INSERT INTO ub_fav_coupon set user_login_id='".$_REQUEST['user_login_id']."',couponId='".$_REQUEST['couponId']."',userLike='".$_REQUEST['userLike']."'"); 

       $res=$this->db->query("SELECT * FROM ub_fav_branch where user_login_id='".$_REQUEST['user_login_id']."' and branchId='".$_REQUEST['branchId']."'")->result();
       if(empty($res))
       {
        $this->db->query("INSERT INTO ub_fav_branch set user_login_id='".$_REQUEST['user_login_id']."',branchId='".$_REQUEST['branchId']."',userLike='".$_REQUEST['userLike']."'");
       }
       
    }
    else
    {
        $this->db->query("DELETE FROM ub_fav_coupon where user_login_id='".$_REQUEST['user_login_id']."' and couponId='".$_REQUEST['couponId']."'");
    }
    return true;
    
}

public function branchLike()
{  
    if($_REQUEST['userLike']==1)
    {
       $this->db->query("INSERT INTO ub_fav_branch set user_login_id='".$_REQUEST['user_login_id']."',branchId='".$_REQUEST['branchId']."',userLike='".$_REQUEST['userLike']."'"); 
    }
    else
    {
        $this->db->query("DELETE FROM ub_fav_branch where user_login_id='".$_REQUEST['user_login_id']."' and branchId='".$_REQUEST['branchId']."'");
    }
    return true;
    

}

public function couponSocialShare()
{
    $soc=explode('_',$_REQUEST['socialPlatform']);

    $this->db->query("INSERT INTO ub_social_share_coupon set user_login_id='".$_REQUEST['user_login_id']."',couponId='".$_REQUEST['couponId']."',socialPlatform='".ucwords($_REQUEST['socialPlatform'])."'"); 
    $lastId=$this->db->insert_id();
        $points=$this->db->query("SELECT * from social_share_point_settings where social_Name='".ucwords($_REQUEST['socialPlatform'])."'")->result();

    $this->db->query("UPDATE ub_end_user
                      set totalPoints=totalPoints+'".$points[0]->point."',
                      remaningPoints=remaningPoints+'".$points[0]->point."'
                       where user_login_id='".$_REQUEST['user_login_id']."'");
    $this->db->query("UPDATE ub_social_share_coupon set recivedPoints='".$points[0]->point."' where socialShareId='".$lastId."'");
    return $points[0]->point;
    
}

public function couponShare()
{

    $this->db->query("INSERT INTO ub_share_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',couponShare=1  ON DUPLICATE KEY UPDATE couponShare=couponShare+1");
    
    return true;
    
}


public function SendNotificationForOffer()
{
   
 $Time=date('H:i:s');
 $date=date('Y-m-d');
 
                    
$resultarray=array();
$serviceCharge=$this->db->query("SELECT * FROM ub_marketing_area where marketingName='Push Notification'")->result();
// $bussinessId=$this->db->query("SELECT * FROM ub_fav_branch where user_login_id='".$_REQUEST['user_login_id']."'")->result();

$result = $this->db->query("SELECT * FROM `ub_campaign` as uc join ub_campaign_location as ucd on ucd.campaignId=uc.campaignId join ub_campaign_time as uct on uct.campaign_data_id=ucd.campaign_data_id join ub_coupon as ucc on ucc.couponId=uc.couponId where uc.startDate<='".$date."' and uc.endDate>='".$date."' and uc.serviceType=1 ")->result();


// $result = $this->db->query("SELECT * FROM `ub_campaign` as uc join ub_campaign_location as ucd on ucd.campaignId=uc.campaignId join ub_campaign_time as uct on uct.campaign_data_id=ucd.campaign_data_id join ub_coupon as ucc on ucc.couponId=uc.couponId join ub_fav_branch as ufb on ufb.branchId=ucc.restaurantId   where uc.startDate<='".$date."' and uc.endDate>='".$date."' and uc.serviceType=1 and ufb.user_login_id='".$_REQUEST['user_login_id']."'")->result();
### first check time to or from 
### radius according to lat lng 

        foreach ($result as $row) {
           
            if(date('H:i:s',strtotime($row->fromTime))<=$Time and date('H:i:s',strtotime($row->toTime))>=$Time)
            {
                #haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
                $rad=haversineGreatCircleDistance($_REQUEST['lat'], $_REQUEST['lng'], $row->lat, $row->lng);
                 // fwrite($fp,$rad.'<='.$row->radius.'latlng='.$_REQUEST['lat'].','.$_REQUEST['lng'].'secLatlng='.$row->lat.',' .$row->lng.'\n');
                
                if($rad<=$row->radius)
                {
                   $resultarray[]=$rad;

 $res=$this->db->query("SELECT * FROM notificationHistory where user_login_id='".$_REQUEST['user_login_id']."' and couponId='".$row->couponId."' and status=1")->result();
                    // print_r($res);
                   if(count($res)>=0 )
                   {
                    $countDollars=$this->db->query("SELECT notificationId from notificationHistory where couponId='".$row->couponId."' and status=1 ")->num_rows();
                    if($countDollars>=$row->max_price_per_day)
                    {
                        continue;
                    }
                    $res=$this->db->query("SELECT * FROM ub_login where user_login_id='".$_REQUEST['user_login_id']."' and user_api_key='".$_REQUEST['user_api_key']."'")->result();
                        $target=$res[0]->user_token_id;
                        $msg=$row->couponDescription;
                        $couponTitle=$row->couponTitle;
                        $title="UbGo";

                        $message=array("title"=>$title,"message"=>$msg,"couponTitle"=>$couponTitle);

                        if(sendMessage($message,$target))
                        {
                            //$resultarray[]=$row;
                            $this->db->query("INSERT INTO notificationHistory set user_login_id='".$_REQUEST['user_login_id']."',couponId='".$row->couponId."',nTitle='".$row->couponTitle."',notificationText='".$msg."',status=1,notificationDate='".date('Y-m-d H:i:s')."'");
                            $this->db->query("UPDATE ub_add_provider set remaningUbGoDollar=remaningUbGoDollar-'".($serviceCharge[0]->ubGoDollarsPerMarketing)."' where user_login_id='".$row->ownerId."'");
                        }
                    
                   }
                }
            }
           
        }

        return true;
   
}


public function sendEmailNotification()
{
  
 
 $Time=date('H:i:s');
 $date=date('Y-m-d');
$resultarray=array();
$serviceCharge=$this->db->query("SELECT * FROM ub_marketing_area where marketingName='sendEmailNotification'")->result();


$result = $this->db->query("SELECT * FROM `ub_campaign` as uc join ub_coupon as ucc on ucc.couponId=uc.couponId where uc.startDate<='".$date."' and uc.endDate>='".$date."' and uc.serviceType=2")->result();

### first check time to or from 
### radius according to lat lng 
$userEmail=$this->db->query("SELECT user_email FROM ub_login where status=1 and user_role=3 order by user_login_id desc")->result();
        foreach ($result as $row) {

foreach ($userEmail as $email) {

 $res=$this->db->query("SELECT * FROM emailHistory where emailId='".$email->user_email."' and couponId='".$row->couponId."' and status=1")->result();
                    // print_r($res);
                   if(count($res)==0)
                   {
                    $countDollars=$this->db->query("SELECT emailHistoryId from emailHistory where couponId='".$row->couponId."' and status=1 and notificationDate='".$date."'")->num_rows();
                    if($countDollars>=$row->max_price_per_day)
                    {
                        continue;
                       // break;
                    }

                    
                   
                        $msg=$row->couponDescription;
                        $couponTitle=$row->couponTitle;
                        $title="UbGo";

                        $this->email->from('info@ebunch.ca', 'UbGo');
                        $this->email->to($email->user_email);
                        // $this->email->cc('another@another-example.com');
                        // $this->email->bcc('them@their-example.com');

                        $this->email->subject($row->couponTitle);
                        $this->email->message($msg);
                
                        $test=$this->email->send();
                       
                        if($test)
                        {
                            //$resultarray[]=$row;
                            $this->db->query("INSERT INTO emailHistory set emailId='".$email->user_email."',couponId='".$row->couponId."',nTitle='".$row->couponTitle."',notificationText='".$msg."',status=1,notificationDate='".date('Y-m-d H:i:s')."'");
                            
                            $this->db->query("UPDATE ub_add_provider set remaningUbGoDollar=remaningUbGoDollar-'".($serviceCharge[0]->ubGoDollarsPerMarketing)."' where user_login_id='".$row->ownerId."'");
                        }
                    
                   }
                
           }
           
           
        }
       
        return true;
   
}


public function AOIList()
{
    return $this->db->query("SELECT * FROM ub_category where status=1")->result();
}


public function sendEmailMobileActivity($msg)
{
    
    // $config=array(
    //              'protocol'=>'sendmail',
    //              'mailtype'=>'html'
    //           );
    // $this->email->initialize($config);
    // $this->email->from('info@ebunch.ca', 'UbGo');
 //    $this->email->to('jaiprakash201019@gmail.com');
   
 //    $this->email->subject($msg['subject']);
 //    $this->email->message($msg['message']);
 //    $this->email->send();

    $to = $msg['email']; // note the comma

                $subject = $msg['subject'];

                // Message
                $message = '
                <html>
                <head>
                <title>Test</title>
                </head>
                <body>
                <div><h3>'.$msg['message'].'</h3></div>
                </body>
                </html>
                ';

                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // Additional headers
                $headers[] = 'To:  <'.$to.'>';
                $headers[] = 'From: UbGO <info@ebunch.ca>';


                // Mail it
                $test=mail($to, $subject, $message, implode("\r\n", $headers));
                //return $test;
     
}

### DISTANCE #############
// $distancesql = "(6371  acos(cos(radians($latitude))  cos(radians(latitude))  cos(radians(longitude) - radians($longitude)) + sin(radians($latitude))  sin(radians(latitude))))”where $distancesql <= $radius

}

?>