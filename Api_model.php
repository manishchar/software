<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {

    public function __construct()

    {

        parent::__construct();
        error_reporting(0);
    }

public function user_login($email, $password,$role,$user_device_id)
{
    if(empty($_REQUEST['user_social_id']))
    {
        if(!empty($_REQUEST['user_email']))
        {
           $result=$this->db->query("SELECT user_email,user_login_id FROM ub_login where user_email='".$email."' AND user_password='".md5($password)."' AND user_role='".$role."' AND status=1");
$show_count =$result->num_rows();
    if($show_count==1)
    {
     $rows=$result->result();

     $apiKey='key_'.strtotime(date('Y-m-d H:i:s'));   

     $this->db->query("UPDATE ub_login set user_api_key='".$apiKey."',user_token_id='".$_REQUEST['user_token_id']."',user_device_id='".$user_device_id."' where user_login_id='".$rows[0]->user_login_id."'");
        
     return $this->db->query("SELECT * FROM ub_login as ul join ub_end_user as ubd on ubd.user_login_id=ul.user_login_id where ul.user_login_id='".$rows[0]->user_login_id."' and ul.status=1")->result();
   
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
    $result=$this->db->query("SELECT user_email,user_login_id FROM ub_login where user_social_id='".$_REQUEST['user_social_id']."' AND user_role='".$role."' AND status=1");
$show_count =$result->num_rows();
    if($show_count==1)
    {
     $rows=$result->result();

     $apiKey='key_'.strtotime(date('Y-m-d H:i:s'));   

     $this->db->query("UPDATE ub_login set user_api_key='".$apiKey."',user_token_id='".$_REQUEST['user_token_id']."',user_device_id='".$user_device_id."' where user_login_id='".$rows[0]->user_login_id."'");
        
     return $this->db->query("SELECT * FROM ub_login as ul join ub_end_user as ubd on ubd.user_login_id=ul.user_login_id where ul.user_login_id='".$rows[0]->user_login_id."' and ul.status=1")->result();
   
    }
    else
    {
        return false;
    }
}
    	
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
        $data=array('user_full_name'=>$_REQUEST['user_full_name'],
                'user_email'=>$_REQUEST['user_email'],
                'aoi'=>$_REQUEST['aoi'],
                'user_post_code'=>$_REQUEST['user_post_code'],
                'user_DOB'=>$_REQUEST['user_DOB'],
                'user_post_code'=>$_REQUEST['user_post_code'],
                'user_social_type'=>$_REQUEST['user_social_type'],
                'user_social_id'=>$_REQUEST['user_social_id'],
                'user_api_key'=>$apiKey,
                'user_name'=>$_REQUEST['user_email'],
                'user_mobile'=>$_REQUEST['user_mobile'],
                'user_token_id'=>$_REQUEST['user_token_id'],
                'user_device_name'=>$_REQUEST['user_device_name'],
                'user_device_id'=>$_REQUEST['user_device_id'],
                'user_address'=>$_REQUEST['user_address'],
                'user_state'=>$_REQUEST['user_state'],
                'user_city'=>$_REQUEST['user_city'],
                'user_password'=>md5($_REQUEST['user_password']),
                'user_role'=>3
                );
if(!empty($data['user_email']))
{
        
     $result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."'");
        $show_count =$result->num_rows();
        if($show_count==0)
        {
                 
            $this->db->query("INSERT INTO ub_login set user_email='".$data['user_email']."',user_name='".$data['user_name']."',user_password='".$data['user_password']."',user_social_type='".$data['user_social_type']."',user_social_id='".$data['user_social_id']."',user_api_key='".$data['user_api_key']."',user_token_id='".$data['user_token_id']."',user_device_name='".$data['user_device_name']."',user_device_id='".$data['user_device_id']."',status=1,user_role='".$data['user_role']."'");
            
            $lastId=$this->db->insert_id();

            $this->db->query("INSERT INTO ub_end_user set user_login_id='".$lastId."' ,user_full_name='".$data['user_full_name']."',user_address='".$data['user_address']."',user_mobile='".$data['user_mobile']."',user_post_code='".$data['user_post_code']."',user_DOB='".$data['user_DOB']."',user_state='".$data['user_state']."',user_city='".$data['user_city']."',aoi='".$data['aoi']."'");

             return $this->db->query("SELECT * FROM ub_login as ul join ub_end_user as ubd on ubd.user_login_id=ul.user_login_id where ul.user_login_id='".$lastId."' and ul.status=1")->result();
            
            
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
 public function updateProfile()
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
            if($result[0]->useValue==$result1[0]->couponUseTimes)
            {
                return false;
            }
            else
            {
                $this->db->query("UPDATE ub_redeem_coupon set couponUseTimes=couponUseTimes+1 where redeemId='".$result1[0]->redeemId."'");
                return true;
            }
        }
        else
        {
            $this->db->query("INSERT INTO ub_redeem_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',couponUseTimes=1");
            return true;
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
       
            $res=$this->db->query("INSERT INTO ub_redeem_reward_card set rewardsId='".$_REQUEST['rewardsId']."',user_login_id='".$_REQUEST['user_login_id']."',spentPoints='".$_REQUEST['spentPoints']."'");
            if($res)
            {
                $this->db->query("UPDATE ub_rewards_cards set rewardUseStatus=rewardUseStatus+1 
                                where 
                                rewardsId='".$_REQUEST['rewardsId']."'
                                    ");
                $this->db->query("UPDATE ub_end_user set remaningPoints=remaningPoints-'".$_REQUEST['spentPoints']."' where user_login_id='".$_REQUEST['user_login_id']."'");
                return true;
            }
            else
            {
                return false;
            }
 
}



public function notificationList()
{
    
    return $this->db->query("SELECT * FROM notificationHistory where user_login_id= '".$_REQUEST['user_login_id']."' order by notificationId desc limit 0,30")->result();
}

public function catList()
{
    return $this->db->query("SELECT * FROM ub_category where status=1")->result();
}
public function viewBranch()
{
    //return $this->db->query("SELECT * FROM ub_branch where id='".$_REQUEST['branchId']."' and status=1")->result();

    return $this->db->query("SELECT * FROM ub_branch as ub LEFT JOIN ub_fav_branch as ufb on ub.id=ufb.branchId where id='".$_REQUEST['branchId']."' and status=1")->result();
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
public function checkCouponLike($user_login_id,$couponId)
{               
    return $this->db->query("SELECT * FROM ub_fav_coupon where user_login_id='".$user_login_id."' and couponId='".$couponId."'")->num_rows();
}
public function catBasedCouponList()
{
    $date=date('Y-m-d');
    
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId  where startDate<='".$date."' and endDate>='".$date."' and areaOfIntrest like '%".$_REQUEST['category_id']."%'")->result();
}

public function couponListFav()
{
    $date=date('Y-m-d');
       return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId join ub_fav_coupon as ufc on ufc.couponId=uap.couponId  where uc.startDate<='".$date."' and uc.endDate>='".$date."' and ufc.user_login_id='".$_REQUEST['user_login_id']."'")->result();
}
public function couponListBranchWise()
{
    $date=date('Y-m-d');
       return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId where uc.startDate<='".$date."' and uc.endDate>='".$date."' and uap.restaurantId='".$_REQUEST['branchId']."' ")->result();
}
public function couponListTopRated()
{
    $date=date('Y-m-d');
    return $this->db->query("SELECT *,count(ufc.favId) as cntFavId FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_branch as ub on ub.id=uap.restaurantId join ub_campaign as uc ON uc.couponId=uap.couponId join ub_fav_coupon as ufc on ufc.couponId=uap.couponId  where uc.startDate<='".$date."' and uc.endDate>='".$date."' group by ufc.couponId ORDER BY cntFavId")->result();
}

public function rewardCardList()
{
    $date=date('Y-m-d');
        
    return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_rewards_cards as urc on uac.user_login_id=urc.user_login_id join ub_branch as ub on ub.id=urc.branchId ORDER by urc.ubGoDollars desc,urc.expireDate DESC")->result();
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
       $this->db->query("INSERT INTO ub_fav_coupon set user_login_id='".$_REQUEST['user_login_id']."',couponId='".$_REQUEST['couponId']."',userLike='".$_REQUEST['couponId']."'"); 
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
        $points=$this->db->query("SELECT * from social_share_point_settings where social_Name='".ucwords($soc)."'")->result();

    $this->db->query("UPDATE ub_end_user
                      set totalPoints=totalPoints+'".$points[0]->point."',
                      remaningPoints=remaningPoints+'".$points[0]->point."'
                       where user_login_id='".$_REQUEST['user_login_id']."'");
    return true;
    
}

public function couponShare()
{

    $this->db->query("INSERT INTO ub_share_coupon set couponId='".$_REQUEST['couponId']."',user_login_id='".$_REQUEST['user_login_id']."',couponShare=1  ON DUPLICATE KEY UPDATE couponShare=couponShare+1");
    // $this->db->query("INSERT INTO ub_share_coupon set user_login_id='".$_REQUEST['user_login_id']."',couponId='".$_REQUEST['couponId']."',couponShare=1"); 
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
               
                if($rad<=$row->radius)
                {
                   $resultarray[]=$rad;

 $res=$this->db->query("SELECT * FROM notificationHistory where user_login_id='".$_REQUEST['user_login_id']."' and couponId='".$row->couponId."' and status=1")->result();
                    // print_r($res);
                   if(count($res)==0)
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

### DISTANCE #############
// $distancesql = "(6371  acos(cos(radians($latitude))  cos(radians(latitude))  cos(radians(longitude) - radians($longitude)) + sin(radians($latitude))  sin(radians(latitude))))”where $distancesql <= $radius

}

?>