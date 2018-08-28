<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	const CODE_ERROR = 0;

    const CODE_SUCCESS = 1;

    const CODE_USER_INACTIVE = 2;

	

public function __construct() {

        parent::__construct();

		$this->load->model('Admin_login');
		$this->load->library('email');
        
    //     if (isset($_SERVER['HTTP_ORIGIN'])) {
    //     header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //     header('Access-Control-Allow-Credentials: true');
    //     header('Access-Control-Max-Age: 86400');    // cache for 1 day
    // }
 
    // // Access-Control headers are received during OPTIONS requests
    // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
    //     if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    //         header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
    //     if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    //         header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
    //     exit(0);
    // }
		
 error_reporting(0);

}

############################## user login #########################################	


public function userLogin()
{
 //echo "hello";
$email = $_POST['emailId'];
$password = $_POST['password'];

//$user_device_id = $_REQUEST['user_device_id'];
     $result = $this->Api_model->user_login($email, $password); 
     if(!empty($result))
	{
		if(empty($result[0]->user_pic))
		{
			$userProfilePicture=base_url("resources/user/defaultUser.png");
		}
		else
		{
			$userProfilePicture=base_url("resources/user/").$result[0]->user_pic;
		}
		$response[]=array('loginId'=>$result[0]->loginId,
			'emailId'=>$result[0]->emailId,
			'mobileNo'=>$result[0]->mobileNo,
			'socialType'=>$result[0]->socialType,
			'socialKey'=>$result[0]->socialKey,
			'role'=>$result[0]->role,
			'roleType'=>$result[0]->roleType,
			'profilePic'=>$userProfilePicture,
			'user_bg_img'=>"",
			'lastLoginTime'=>$result[0]->lastLoginTime,
			'name'=>$result[0]->name,
			'age'=>$result[0]->age,
			'city'=>$result[0]->city,
			'state'=>$result[0]->state,
			'country'=>$result[0]->country,
			'lat'=>$result[0]->lat,
			'lng'=>$result[0]->lng,
			
			);
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Login successfull','data'=>$response];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=>'Email Or Password Mismatched'];
	}
	draw_json_encode($arr_response);
}

public function checkSessionCredential()
{
	$result=$this->Api_model->checkSessionCredential();
	if(empty($result))
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Session Out Please Login'];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Login successfull'];
	}
	draw_json_encode($arr_response);
}

public function userSignOut()
{
	$result=$this->Api_model->userSignOut();
	if($result)
	{
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Logout successfull'];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=>'Logout Error'];
	}
	
	draw_json_encode($arr_response);
	
}

################## end ################

public function endUserRegistation()
{
	$result=$this->Api_model->endUserRegistation();
	// print_r($result);
	// exit;
	if(!empty($result))
	{
		if(empty($result[0]->user_pic))
		{
			$userProfilePicture=base_url("resources/user/defaultUser.png");
		}
		else
		{
			$userProfilePicture=base_url("resources/user/").$result[0]->user_pic;
		}
		$response[]=array('loginId'=>$result[0]->loginId,
			'emailId'=>$result[0]->emailId,
			'mobileNo'=>$result[0]->mobileNo,
			'socialType'=>$result[0]->socialType,
			'socialKey'=>$result[0]->socialKey,
			'role'=>$result[0]->role,
			'roleType'=>$result[0]->roleType,
			'profilePic'=>$userProfilePicture,
			'user_bg_img'=>"",
			'lastLoginTime'=>$result[0]->lastLoginTime,
			'name'=>$result[0]->name,
			'age'=>$result[0]->age,
			'city'=>$result[0]->city,
			'state'=>$result[0]->state,
			'country'=>$result[0]->country,
			'lat'=>$result[0]->lat,
			'lng'=>$result[0]->lng,
			
			);
		// $data['user_email']=$_REQUEST['user_email'];
		// $data['link']=base_url('api/verified').'?key='.md5($toemail);
						// $fromemail=	'support@ebunch.ca';
      //           		$toemail=$_REQUEST['user_email'];
          
###########################

  //     $data['sender_mail'] = 'info@ebunchapps.ca';
      
  //       $this->load->library('email');
		// $config = array(
		// 'protocol'  => 'smtp',
		// 'smtp_host' => 'ssl://ebunchapps.ca',
		// 'smtp_port' => 465,
		// 'smtp_user' => 'info@ebunchapps.ca',
		// 'smtp_pass' => 'ebunch825',
		// 'mailtype'  => 'html',
		// 'charset'   => 'utf-8',
		// 'wordwrap'	=> TRUE
		// );	
  //       $this->email->initialize($config);
       
  //       $this->email->set_mailtype("html");
  //       $this->email->set_newline("\r\n");

  //       $htmlContent = '<h1>Sending email via UBGO</h1>';

		// $htmlContent .= '<p><a href="'.base_url('api/verified').'?key='.md5($toemail).'">Click Here To Verify</a></p>';

		// $htmlContent='<div class="" style="width: 600px; margin: auto; box-sizing: border-box;    background-color: #f7f7f7;"> <div style="background-color: #6fa019; padding: 7px;"> <img src="'.base_url('resources/icons/').'logoUbgo.png" style="width: 38px; padding:4px; vertical-align: middle;background-color: #fff; border-radius: 8px;"/> <span style="display: inline-block; vertical-align: middle; color: #fff; font-size: 20px; margin-left: 12px;">UBGO Verification</span></div> <div style="background-color:#6FA019; min-height: 200px; padding:15px;margin-bottom: 30px;"> <div style="color: #fff;"> <span style="border: 0px solid #999; width: 120px; height: 120px; background-color: #fff; border-radius: 17px; text-align: center; vertical-align: middle; display: block; margin: auto;"> <img src="'.base_url('resources/icons/').'logoUbgo.png" style="width: 110px; margin-top: 4px"/> </span> <h2 style="text-align:center;font-weight: 400;">Welcome to UBGO</h2> <p  style="text-align: center; margin-bottom: 5px;">Thank you for signing up for your new account as UBGO <p style="text-align: center; margin-bottom:5px;margin-top: 8px;">follow the link below to confirm your account</p> </p> <a href="'.base_url('api/verified').'?key='.md5($toemail).'" style="background-color: #eab932;border: 0; padding: 10px 30px;font-size: 18px;border-radius: 53px;margin: auto; display: block;color: #fff; margin-bottom: 0px;text-decoration: none;width: 170px;">Verify Your Account</a> </div> </div> <div style="padding: 15px; color:#444"> <h3 style="font-weight: 400;margin-bottom: 13px;">Your account information</h3> <div style="margin-bottom: 6px;"> <label style="font-weight: 600;width: 118px;display: inline-block;font-size: 14px;">Account </label> :<span style="font-size: 15px;color: #777;margin-left: 20px;">'.$toemail.'</span></div> <div> <label style="font-weight: 600; width: 118px; display: inline-block; font-size: 14px;">Verify Link </label> :<a  style="font-size: 15px; color: #777;text-decoration:none;margin-left: 20px;" href="'.base_url('api/verified').'?key='.md5($toemail).'">'.base_url('api/verified').'?key='.md5($toemail).'</a> </div> </div> <div style="padding: 15px; color:#444"> <hr /> <h3 style="font-weight: 400;margin-bottom: 9px;">Need Support?</h3> <p style="font-size: 15px; color: #777; line-height: 24px; margin-top: 9px;">feel free to email us if you have any, questions, comment or suggestions. We will be happy resolve all your issues.</p> </div> <div style="background-color: #6fa019; padding: 7px;"> <span style=" vertical-align: middle; color: #233306; font-size: 12px; margin-left: 12px; text-align: center; display: block;">Copyright &copy; All Right Reserved by UBGO</span></div> </div>';
		//  $this->email->to($toemail);
  //       $this->email->from($data['sender_mail'], 'UBGO');
  //       $this->email->subject('Verify');
        // $message ='<table><tr><td>UBGO Verify</td></tr>';
        // $message .='<tr><td><a href="'.base_url('api/verified').'?key='.md5($toemail).'">Click Here To Verify</a></td></tr></table>';
       
       // $this->email->message($htmlContent);
       
//$success=$this->email->send();
###############################################

                // for($i=0;$i<10;$i++)
                // {
                // 	//$test=mail($to, $subject, $message, implode("\r\n", $headers));
                // 	$success=$this->email->send();
                // 	if($success)
                // 	{
                // 		break;
                // 	}
                // }
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Registration successfull',"data"=>$response];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=>'User Already Registered'];
	}
	draw_json_encode($arr_response);
}

public function updateProfile()
{
	$result=$this->Api_model->updateProfile();
// print_r($result);
// echo $result;
	$res=array();
	if(!empty($result))
	{
		if(empty($result[0]->user_pic))
		{
			$userProfilePicture=base_url("resources/user/defaultUser.png");
		}
		else
		{
			$userProfilePicture=base_url("resources/user/").$result[0]->user_pic;
		}

		if(empty($result[0]->user_bg_img))
		{
			$user_bg_img=base_url("resources/user/profile_header.png");
		}
		else
		{
			$user_bg_img=base_url("resources/user/").$result[0]->user_bg_img;
		}
		
		$res[]=array('user_login_id'=>$result[0]->user_login_id,
					'user_email'=>$result[0]->user_email,
					'user_api_key'=>$result[0]->user_api_key,
					'user_full_name'=>$result[0]->user_full_name,
					'user_mobile'=>$result[0]->user_mobile,
					'user_pic'=>$userProfilePicture,
					'user_bg_img'=>$user_bg_img,
					'aoi'=>$result[0]->aoi,
					'user_DOB'=>$result[0]->user_DOB,
					'user_pic'=>base_url('resources/user/').$result[0]->user_pic,
					'user_social_type'=>$result[0]->user_social_type,
					'UsersPoint'=>$result[0]->remaningPoints
					);

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Profile Updated','result'=>$res,'ss'=>$result];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Profile Did Not Update. May Be Email Id Already Used Or Token Mismatched','ss'=>$result];
	}
	draw_json_encode($arr_response);
}



public function couponLike()
 {
	$result=$this->Api_model->couponLike();
	//print_r($result);
	if($result)
	{
		
		$arr_response = ['response_code' => self::CODE_SUCCESS];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
 }

 public function branchLike()
 {
	$result=$this->Api_model->branchLike();
	//print_r($result);
	if($result)
	{
		
		$arr_response = ['response_code' => self::CODE_SUCCESS];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
 }	

 public function couponSocialShare()
 {
	$result=$this->Api_model->couponSocialShare();
	//print_r($result);
	if($result)
	{
		$this->redeemCouponChange($result);
		// $arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$result];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'result'=>$result];
	}
	draw_json_encode($arr_response);
 }	

 public function couponShare()
 {
	$result=$this->Api_model->couponShare();
	//print_r($result);
	if($result)
	{
		
		$arr_response = ['response_code' => self::CODE_SUCCESS];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
 }	

public function couponList()
{

	$result1=$this->Api_model->homeScreenCouponList();
	$result=$this->Api_model->couponList();
	$topRated=$this->Api_model->couponListTopRated();
	$res1=array();
	$res2=array();
	$res3=array();
	if(!empty($result1))
	{
		for($i=0;$i<count($result1);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result1[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result1[$i]->couponId);
				
#'RestaurantName'=>$result1[$i]->user_full_name,

				$res3[]=array('couponId'=>$result1[$i]->couponId,
					'couponCode'=>$result1[$i]->couponCode,
					'couponUse'=>$result1[$i]->couponUse,
					'couponType'=>$result1[$i]->couponType,
					'optionRate'=>$result1[$i]->optionRate,
					'couponActualPrice'=>$result1[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result1[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result1[$i]->ubgohashTag,
					'promoText'=>$result1[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result1[$i]->couponTitle,
					'couponDescription'=>$result1[$i]->couponDescription,
					'RestaurantName'=>$result1[$i]->branch_name,
					'RestaurantBranchName'=>$result1[$i]->branch_name,
					'branchDisplayAddress'=>$result1[$i]->displayAddress,
					'branchId'=>$result1[$i]->id,
					'lat'=>$result1[$i]->lat,
					'lng'=>$resulrt1[$i]->lng,
					'max_price_per_day'=>$result1[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result1[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result1[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result1[$i]->bannerLogo),
					'startDate'=>$result1[$i]->startDate,
					'endDate'=>$result1[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result1[$i]->endDate)),
					);
			}
	}


	//$divide=ceil(count($result)/2);
	if(!empty($result))
	{
		
			for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate)),
					);
			}
			for($j=0;$j<count($topRated);$j++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$topRated[$j]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($topRated[$j]->couponId);
				$res2[]=array('couponId'=>$topRated[$j]->couponId,
					'couponCode'=>$topRated[$j]->couponCode,
					'couponUse'=>$topRated[$j]->couponUse,
					'couponType'=>$topRated[$j]->couponType,
					'optionRate'=>$topRated[$j]->optionRate,
					'couponActualPrice'=>$result[$j]->couponActualPrice,
					'couponDiscountPrice'=>$result[$j]->couponDiscountPrice,
					'couponTitle'=>$topRated[$j]->couponTitle,
					'ubgohashTag'=>$topRated[$j]->ubgohashTag,
					'promoText'=>$topRated[$j]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponDescription'=>$topRated[$j]->couponDescription,
					'RestaurantName'=>$topRated[$j]->branch_name,
					'RestaurantBranchName'=>$topRated[$j]->branch_name,
					'branchDisplayAddress'=>$topRated[$j]->displayAddress,
					'branchId'=>$topRated[$j]->id,
					'lat'=>$topRated[$j]->lat,
					'lng'=>$topRated[$j]->lng,
					'max_price_per_day'=>$topRated[$j]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$topRated[$j]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$topRated[$j]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$topRated[$j]->bannerLogo),
					'startDate'=>$topRated[$j]->startDate,
					'endDate'=>$topRated[$j]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($topRated[$j]->endDate)),
					);
			}
		
shuffle($res3);
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','popular'=>$res2,'latest'=>$res1,'featured'=>$res3];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
}


public function couponDetails()
{
	$result=$this->Api_model->couponDetails();


				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$_REQUEST['couponId']);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($_REQUEST['couponId']);
				
#'RestaurantName'=>$result1[$i]->user_full_name,

				$res1[]=array('couponId'=>$result[0]->couponId,
					'couponCode'=>$result[0]->couponCode,
					'couponUse'=>$result[0]->couponUse,
					'couponType'=>$result[0]->couponType,
					'optionRate'=>$result[0]->optionRate,
					'couponActualPrice'=>$result[0]->couponActualPrice,
					'couponDiscountPrice'=>$result[0]->couponDiscountPrice,
					'ubgohashTag'=>$result[0]->ubgohashTag,
					'promoText'=>$result[0]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[0]->couponTitle,
					'couponDescription'=>$result[0]->couponDescription,
					'RestaurantName'=>$result[0]->branch_name,
					'RestaurantBranchName'=>$result[0]->branch_name,
					'branchDisplayAddress'=>$result[0]->displayAddress,
					'branchId'=>$result[0]->id,
					'lat'=>$result[0]->lat,
					'lng'=>$result[0]->lng,
					'max_price_per_day'=>$result[0]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[0]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[0]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[0]->bannerLogo),
					'startDate'=>$result[0]->startDate,
					'endDate'=>$result[0]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[0]->endDate)),
					);
				if(!empty($result))
				{
				$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon Details','result'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
			
}

public function couponListFav()
{
	$result=$this->Api_model->couponListFav();
	$res1=array();
	$res2=array();
	
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponTitle'=>$result[$i]->couponTitle,
					'couponLike'=>"1",
					'couponLikeCount'=>"$LikeCount",
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate)),
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
}


public function couponListBranchWise()
{
	$result=$this->Api_model->couponListBranchWise($_REQUEST['branchId']);
	//$result1=$this->Api_model->couponList();
	$res1=array();
	$res2=array();
	//print_r($result1);
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate))
					);
			
			}
			
//$res1=array_merge($res2);
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
}


public function couponListCat()
{
	$result=$this->Api_model->couponList();
	$res1=array();
	$res2=array();
	//echo count($result);
	$divide=ceil(count($result)/2);
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'couponTitle'=>$result[$i]->couponTitle,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate))
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
}

public function couponListTopRated()
{
	$result=$this->Api_model->couponListTopRated();
	$res1=array();
	$res2=array();
	//echo count($result);
	$divide=ceil(count($result)/2);
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate))
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);
}

function mapViewData()
{
	$result=$this->Api_model->branchDataWithLatLng('');
	//$result1=$this->Api_model->couponList();
	$res1=array();
	$res2=array();
	//print_r($result);
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res2=array();
				 $rad=haversineGreatCircleDistance($_REQUEST['lat'], $_REQUEST['lng'], $result[$i]->lat,$result[$i]->lng);
				 if($rad>=0)   ###  for all insted of rad<=5000
				 {

			$result1=$this->Api_model->couponListBranchWise($result[$i]->id);
		for($k=0;$k<count($result1);$k++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$k]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result1[$k]->couponId);
				$res2[]=array('couponId'=>$result1[$k]->couponId,
					'couponCode'=>$result1[$k]->couponCode,
					'couponUse'=>$result1[$k]->couponUse,
					'couponType'=>$result1[$k]->couponType,
					'optionRate'=>$result1[$k]->optionRate,
					'couponActualPrice'=>$result1[$k]->couponActualPrice,
					'couponDiscountPrice'=>$result1[$k]->couponDiscountPrice,
					'ubgohashTag'=>$result1[$k]->ubgohashTag,
					'promoText'=>$result1[$k]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result1[$k]->couponTitle,
					'couponDescription'=>$result1[$k]->couponDescription,
					'RestaurantName'=>$result1[$k]->branch_name,
					'RestaurantBranchName'=>$result1[$k]->branch_name,
					'branchDisplayAddress'=>$result1[$k]->displayAddress,
					'branchId'=>$result1[$k]->id,
					'lat'=>$result1[$k]->lat,
					'lng'=>$result1[$k]->lng,
					'max_price_per_day'=>$result1[$k]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result1[$k]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result1[$k]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result1[$k]->bannerLogo),
					'startDate'=>$result1[$k]->startDate,
					'endDate'=>$result1[$k]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result1[$k]->endDate))
					);
			
			}
				 	### 'couponList'=>$res2 #####

				 	$res1[]=array(
					
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'couponCount'=>$result[$i]->couponCount,
					'couponList'=>$res2
					
					);
				 }
				
				
			
			}
			

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Data List','result'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Data Not Availble'];
	}
	draw_json_encode($arr_response);	
}

public function notificationList()
{
	$result=$this->Api_model->notificationList();
	//print_r($result);
	$res1=array();
	//$iconAr=array("free.jpeg","sale1.png","sale2.png","per.png");
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array(
					'notificationId'=>$result[$i]->notificationId,
					'notificationText'=>$result[$i]->notificationText,
					'nTitle'=>$result[$i]->nTitle,
					'notificationDate'=>$result[$i]->notificationDate,
					'icons'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate))
					);


				
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Notification List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Notification Not Availble'];
	}
	draw_json_encode($arr_response);
}

public function catList()
{
	$result=$this->Api_model->catList();
	$res1=array();
	
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res1[]=array('category_id'=>$result[$i]->category_id,
					'category_name'=>strtoupper($result[$i]->category_name),
					'icon'=>base_url("resources/upload/").$result[$i]->icon,
				'colorCode'=>$result[$i]->colorCode
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Category List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Category Not Availble'];
	}
	draw_json_encode($arr_response);
}
public function catBasedCouponList()
{
	$result=$this->Api_model->catBasedCouponList();
	$res1=array();
	
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result[$i]->endDate))
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Category List','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Category Not Availble'];
	}
	draw_json_encode($arr_response);
}

public function viewBranch() ## Bussiness Page Api
{
	//$result=$this->Api_model->viewBranch();
	$result=$this->Api_model->branchDataWithLatLng($_REQUEST['branchId']);
	$res1=array();
	//print_r($result);
	if(!empty($result))
	{

		for($i=0;$i<count($result);$i++)
			{
				$res2=array();
				$branchLike=$this->Api_model->checkBranchLike();
				//print_r($branchLike);
				if(empty($branchLike[0]->userLike))
				{
					$like="0";
				}
				else
				{
					$like="1";
				}

				$result1=$this->Api_model->couponListBranchWise($result[$i]->id);
		for($k=0;$k<count($result1);$k++)
			{
				
				
				$res2[]=array('couponId'=>$result1[$k]->couponId,
					'couponCode'=>$result1[$k]->couponCode,
					'couponUse'=>$result1[$k]->couponUse,
					'couponType'=>$result1[$k]->couponType,
					'optionRate'=>$result1[$k]->optionRate,
					'couponActualPrice'=>$result1[$k]->couponActualPrice,
					'couponDiscountPrice'=>$result1[$k]->couponDiscountPrice,
					'ubgohashTag'=>$result1[$k]->ubgohashTag,
					'promoText'=>$result1[$k]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result1[$k]->couponTitle,
					'couponDescription'=>$result1[$k]->couponDescription,
					'RestaurantName'=>$result1[$k]->branch_name,
					'RestaurantBranchName'=>$result1[$k]->branch_name,
					'branchDisplayAddress'=>$result1[$k]->displayAddress,
					'branchId'=>$result1[$k]->id,
					'lat'=>$result1[$k]->lat,
					'lng'=>$result1[$k]->lng,
					'max_price_per_day'=>$result1[$k]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result1[$k]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result1[$k]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result1[$k]->bannerLogo),
					'startDate'=>$result1[$k]->startDate,
					'endDate'=>$result1[$k]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($result1[$k]->endDate))
					);
			
			}
			$timeTable=unserialize($result[$i]->timeTable);
				if(!is_array($timeTable))
				{
					$timeTable=array();
				}

				$res1[]=array(
					'branch_address'=>$result[$i]->branch_address,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'openingTime'=>$result[$i]->openingTime,
					'closingTime'=>$result[$i]->closingTime,
					'contactEmail'=>$result[$i]->contactEmail,
					'contactNumber'=>$result[$i]->contactNumber,
					'secondContactNumber'=>$result[$i]->secondContactNumber,
					'timeTable'=>$timeTable,
					'fb_page_url'=>$result[$i]->fb_page_url,
					'website_url'=>$result[$i]->website_url,
					'about_business'=>$result[$i]->about_business,
					'add_text'=>$result[$i]->add_text,
					'lng'=>$result[$i]->lng,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchId'=>$result[$i]->id,
					'userLike'=>$like,
					'couponCount'=>$result[$i]->couponCount,
					'couponList'=>$res2,
					'smallLogo'=>base_url('resources/coupon/'.$result[$i]->smallLogo),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo)
					
					);
			}

		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Branch Details','list'=>$res1];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Branch Not Availble'];
	}
	draw_json_encode($arr_response);
}

public function SendNotificationForOffer()
{
	$result=$this->Api_model->SendNotificationForOffer();
	//print_r($result);
	if($result)
	{
		
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$result];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}

public function AOIList()
{
	$result=$this->Api_model->AOIList();
	//print_r($result);
	$res=array();
	if($result)
	{
		foreach ($result as $row) {
			$res[]=array('AOIname'=>strtoupper($row->category_name),
				'category_id'=>$row->category_id,

			);
		}
		
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$res];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}


public function viewCoupon()
{

	$result=$this->Api_model->viewCoupon();
	$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=>"Coupon Viewed",'socialShareCount'=>$result];
	
	draw_json_encode($arr_response);
}

public function redeemCouponChange($result)
{

	$result=$this->Api_model->redeemCoupon();
	
	if($result)
	{
		$arr_response = ['response_code' => self::CODE_SUCCESS,'heading'=>"Congratulations you have redeemed this great offer!", 'message'=>"Offer is in your UBGO wallet along with redeem code, please provide code to the business in order to avail the coupon. Enjoy!",'result'=>$result];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=>"Coupon Already Used"];
	}
	draw_json_encode($arr_response);
}

public function redeemRewardCard()
{

	$result=$this->Api_model->redeemRewardCard();
	
	if($result)
	{
		$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=>"Reward Card Redeemed Successfull"];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=>"Reward Card Redeemed error_log(message)"];
	}
	draw_json_encode($arr_response);
}


public function userPoints()
{
	$result=forsingleData('user_login_id',$_REQUEST['user_login_id'],'ub_end_user','remaningPoints');

	if($result)
	{
		$res[]=array('UsersPoint'=>$result['remaningPoints']);
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$res];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}

public function walletData()
{
	$a1=array();
	$a2=array();
	$a3=array();
	//$points=array();
	$userPoints=forsingleData('user_login_id',$_REQUEST['user_login_id'],'ub_end_user','remaningPoints');
	$points[]=array('UsersPoint'=>$userPoints['remaningPoints']);
	

	$redeemCoupon=$this->Api_model->redeemCouponList();

		for($i=0;$i<count($redeemCoupon);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$redeemCoupon[$i]->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($redeemCoupon[$i]->couponId);
			$a1[]=array('couponId'=>$redeemCoupon[$i]->couponId,
					'couponCode'=>$redeemCoupon[$i]->couponCode,
					'couponUse'=>$redeemCoupon[$i]->couponUse,
					'couponType'=>$redeemCoupon[$i]->couponType,
					'optionRate'=>$redeemCoupon[$i]->optionRate,
					'couponActualPrice'=>$redeemCoupon[$i]->couponActualPrice,
					'couponDiscountPrice'=>$redeemCoupon[$i]->couponDiscountPrice,
					'ubgohashTag'=>$redeemCoupon[$i]->ubgohashTag,
					'promoText'=>$redeemCoupon[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$redeemCoupon[$i]->couponTitle,
					'couponDescription'=>$redeemCoupon[$i]->couponDescription,
					'RestaurantName'=>$redeemCoupon[$i]->branch_name,
					'RestaurantBranchName'=>$redeemCoupon[$i]->branch_name,
					'branchDisplayAddress'=>$redeemCoupon[$i]->displayAddress,
					'branchId'=>$redeemCoupon[$i]->id,
					'lat'=>$redeemCoupon[$i]->lat,
					'lng'=>$redeemCoupon[$i]->lng,
					'max_price_per_day'=>$redeemCoupon[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$redeemCoupon[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$redeemCoupon[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$redeemCoupon[$i]->bannerLogo),
					'startDate'=>$redeemCoupon[$i]->startDate,
					'endDate'=>$redeemCoupon[$i]->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($redeemCoupon[$i]->endDate)),
					'date'=>$redeemCoupon[$i]->redeemDate
					);
			}



	$redeemRewardCard=$this->Api_model->redeemRewardList();

	foreach ($redeemRewardCard as $row) {

			$redeemPoints=$row->ubGoDollars*$row->rewardCardsValue;
			$remaningQunatity=$row->rewardCardQuantity-$row->rewardUseStatus;

			$a2[]=array('rewardsId'=>$row->rewardsId,
					'rewardCardsValue'=>$row->rewardCardsValue,
					'actualDollar'=>$row->actualDollar,
					'ubGoDollars'=>$row->ubGoDollars,
					'redeemPoints'=>$redeemPoints,
					'rewardCardNumber'=>$row->rewardCardNumber,
					'rewardUseStatus'=>$row->rewardUseStatus,
					'rewardCardQuantity'=>$row->rewardCardQuantity,
					'remaningQunatity'=>$remaningQunatity,
					'expireDate'=>date('d-m-Y',strtotime($row->expireDate)),
					'RestaurantName'=>$row->branch_name,
					'RestaurantBranchName'=>$row->branch_name,
					'branchDisplayAddress'=>$row->displayAddress,
					'branchId'=>$row->id,
					'lat'=>$row->lat,
					'lng'=>$row->lng,
					'smallLogo'=>base_url('resources/upload/'.$row->rewardCardSmallLogo),
					'bigLogo'=>base_url('resources/upload/'.$row->rewardCardBigLogo),
					'spentPoints'=>$row->spentPoints,
					'redeemDate'=>$row->redeemDate,
					'date'=>$row->redeemDate
				);
		}


	$shareCouponPoints=$this->Api_model->shareCouponPointsList();

	foreach ($shareCouponPoints as $row1) {
		$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$row1->couponId);
				if(empty($res))
				{
					$res=0;
				}
				else
				{
					$res=1;
				}
				$LikeCount=$this->Api_model->LikeCount($row1->couponId);
				


				$a3[]=array('couponId'=>$row1->couponId,
					'couponCode'=>$row1->couponCode,
					'couponUse'=>$row1->couponUse,
					'couponType'=>$row1->couponType,
					'optionRate'=>$row1->optionRate,
					'couponActualPrice'=>$row1->couponActualPrice,
					'couponDiscountPrice'=>$row1->couponDiscountPrice,
					'ubgohashTag'=>$row1->ubgohashTag,
					'promoText'=>$row1->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$row1->couponTitle,
					'couponDescription'=>$row1->couponDescription,
					'RestaurantName'=>$row1->branch_name,
					'RestaurantBranchName'=>$row1->branch_name,
					'branchDisplayAddress'=>$row1->displayAddress,
					'branchId'=>$row1->id,
					'lat'=>$row1->lat,
					'lng'=>$row1->lng,
					'max_price_per_day'=>$row1->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$row1->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$row1->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$row1->bannerLogo),
					'startDate'=>$row1->startDate,
					'endDate'=>$row1->endDate,
					'footerMsg'=>"Deals Expiar On ".date('l jS \of F Y',strtotime($row1->endDate)),
					'date'=>$row1->socialShareDate,
					'receivedPoints'=>$row1->recivedPoints,
					'socialShareId'=>$row1->socialShareId
					);
	}


	$allArray=array_merge($a2,$a3);
	
$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>['all'=>$allArray,'shareCouponPointsList'=>$a3,'redeemRewardCardList'=>$a2,'userPoints'=>$points]];
draw_json_encode($arr_response);

}


public function forgotPassword()
	{
		$user_email=$_REQUEST['user_email'];
		//$user_email="jaiprakash201019@gmail.com";
		$result=$this->Admin_login->forgotPassword($user_email);
		if(!empty($result))
        {
				$to = $user_email; // note the comma

				$subject = 'UbGo Password Reset';

				// Message
				$message = '
				<html>
				<head>
				<title>Test</title>
				</head>
				<body>
				<a href="'.base_url('login/ResetPasswordPage').'?ForgotPasswordKey='.md5($result[0]->user_email).'">Click Here To Reset Password</a>
				</body>
				</html>
				';

				// To send HTML mail, the Content-type header must be set
				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				// Additional headers
				$headers[] = 'To: <'.$to.'>';
				$headers[] = 'From: Test <info@ebunch.ca>';


				// Mail it
				$test=mail($to, $subject, $message, implode("\r\n", $headers));

			if($test)
			{
				$response=['response_code'=>"1",'result' =>"1" ,'message'=>"Password Reset Link Sent On Your Registered Email ID",'data'=> md5($result[0]->user_email)];
			}
			else
			{
				$response=['response_code'=>"0",'result' =>"0" ,'message'=>"Sorry ! Some Server Issues We are Unable To Provide Password Reset. Please Try After Some Time."];
			}
		}
		else
		{
				$response=['response_code'=>"0",'result' =>"0" ,'message'=>"Email Id Does Not Exist"];

			}
            
        
       //  $response=['result' =>"0" ,'message'=>$user_email];
		draw_json_encode($response);
	}

############################## end ################



public function shareCustom()
{
	$data['title']=$_REQUEST['title'];
	$data['description']=$_REQUEST['description'];
	$data['img']=base_url('resources/coupon/'.$_REQUEST[img]);
	$this->load->view('share',$data);
}
//common api facebook array(shareWithCoupon) ,twitter array()  

public function shareWithCoupon()
{
$result=forallData('couponId',$_REQUEST['couponId'],'ub_coupon');
// print_r($result);$_REQUEST['couponId']
$couponsubtitle = "A PURCHES OF $ 12 OR MORE";
$coupondes = $result[0]->couponDescription;
$ext=explode('.',$result[0]->couponTemplate1);
$cimgname=$ext[0].'.png';
$coupontitle = $result[0]->couponTitle;
$data['title']=$result[0]->couponTitle.' '.$result[0]->ubgohashTag;
$data['description']=$result[0]->couponDescription;
$stamp = imagecreatefrompng('resources/upload/logo.png');
$imagePath = 'resources/upload/'.$result[0]->couponTemplate1;
$newPath = "resources/shareimg/";
$newName  = $newPath.$result[0]->couponTemplate1;
$copied = copy($imagePath , $newName);
$im = imagecreatefromjpeg('resources/shareimg/'.$result[0]->couponTemplate1);
imagecopy($im, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp));
$filename = 'resources/shareimg/'.$cimgname;
imagepng($im, $filename);
imagedestroy($im);

$image = imagecreatefrompng('resources/shareimg/'.$cimgname);
imagealphablending($image, true);


$font = 'resources/shareimg/arial.ttf';
//font size
$font_size = 12;
//image width
$width = 700;
//text margin
$margin = 5;

//explode text by words
$text_a = explode(' ', $coupondes);
$text_new = '';
foreach($text_a as $word){
    //Create a new text, add the word, and calculate the parameters of the text
    $box = imagettfbbox($font_size, 0, $font, $text_new.' '.$word);
    //if the line fits to the specified width, then add the word with a space, if not then add word with new line
    if($box[2] > $width - $margin*2){
        $text_new .= "\n".$word;
    } else {
        $text_new .= " ".$word;
    }
}
//trip spaces
$text_new = trim($text_new);
//new text box parameters
$box = imagettfbbox($font_size, 0, $font, $text_new);
//new text height 214 122 13 
$height = $box[1] + $font_size + $margin * 2;
$im = $image;

// First we create our stamp image manually from GD
$stamp = imagecreatetruecolor(700, 200);
imagestring($stamp, 7, 20, 20, $coupontitle, 0xFFFFFF);
imagestring($stamp, 5, 20, 40, $text_new, 0xFFFFFF);
// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

imagepng($im, 'resources/shareimg/'.$cimgname);
imagedestroy($im);
unlink('resources/shareimg/'.$result[0]->couponTemplate1);
$data['img']=base_url('resources/shareimg/'.$cimgname);
$this->load->view('fbShare',$data);

// $arr_response = ['response_code' => self::CODE_SUCCESS,'FACEBOOK'=>$this->load->view('fbShare',$data),'INSTAGRAM'=>$data['img']];
// draw_json_encode($arr_response);

}


public function shareCouponFbInsta()
{
$result=forallData('couponId',$_REQUEST['couponId'],'ub_coupon');
// print_r($result);$_REQUEST['couponId']
$couponsubtitle = "A PURCHES OF $ 12 OR MORE";
$coupondes = $result[0]->couponDescription;
$ext=explode('.',$result[0]->couponTemplate1);
$cimgname=$ext[0].'.png';
$coupontitle = $result[0]->couponTitle;
$data['title']=$result[0]->couponTitle.' '.$result[0]->ubgohashTag;
$data['description']=$result[0]->couponDescription;
$stamp = imagecreatefrompng('resources/upload/logo.png');
$imagePath = 'resources/upload/'.$result[0]->couponTemplate1;
$newPath = "resources/shareimg/";
$newName  = $newPath.$result[0]->couponTemplate1;
$copied = copy($imagePath , $newName);
$im = imagecreatefromjpeg('resources/shareimg/'.$result[0]->couponTemplate1);
imagecopy($im, $stamp, 0, 0, 0, 0, imagesx($stamp), imagesy($stamp));
$filename = 'resources/shareimg/'.$cimgname;
imagepng($im, $filename);
imagedestroy($im);

$image = imagecreatefrompng('resources/shareimg/'.$cimgname);
imagealphablending($image, true);


$font = 'resources/shareimg/arial.ttf';
//font size
$font_size = 12;
//image width
$width = 700;
//text margin
$margin = 5;

//explode text by words
$text_a = explode(' ', $coupondes);
$text_new = '';
foreach($text_a as $word){
    //Create a new text, add the word, and calculate the parameters of the text
    $box = imagettfbbox($font_size, 0, $font, $text_new.' '.$word);
    //if the line fits to the specified width, then add the word with a space, if not then add word with new line
    if($box[2] > $width - $margin*2){
        $text_new .= "\n".$word;
    } else {
        $text_new .= " ".$word;
    }
}
//trip spaces
$text_new = trim($text_new);
//new text box parameters
$box = imagettfbbox($font_size, 0, $font, $text_new);
//new text height 214 122 13 
$height = $box[1] + $font_size + $margin * 2;
$im = $image;

// First we create our stamp image manually from GD
$stamp = imagecreatetruecolor(700, 200);
imagestring($stamp, 7, 20, 20, $coupontitle, 0xFFFFFF);
imagestring($stamp, 5, 20, 40, $text_new, 0xFFFFFF);
// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Merge the stamp onto our photo with an opacity of 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

imagepng($im, 'resources/shareimg/'.$cimgname);
imagedestroy($im);
unlink('resources/shareimg/'.$result[0]->couponTemplate1);
$data['img']=base_url('resources/shareimg/'.$cimgname);
if($_REQUEST['sharewith']=="FB")
{
	$this->load->view('fbShare',$data);
}
else
{
	$arr_response = ['response_code' => self::CODE_SUCCESS,'INSTAGRAM'=>$data['img']];
draw_json_encode($arr_response);
}




}

public function rewardCardList()
{
	$result=$this->Api_model->rewardCardList();
	//print_r($result);
	$res=array();
	if($result)
	{
		foreach ($result as $row) {

			$redeemPoints=$row->ubGoDollars*$row->rewardCardsValue;
			$remaningQunatity=$row->rewardCardQuantity-$row->rewardUseStatus;

			$res[]=array('rewardsId'=>$row->rewardsId,
					'rewardCardsValue'=>$row->rewardCardsValue,
					'actualDollar'=>$row->actualDollar,
					'ubGoDollars'=>$row->ubGoDollars,
					'redeemPoints'=>$redeemPoints,
					'rewardCardNumber'=>$row->rewardCardNumber,
					'rewardUseStatus'=>$row->rewardUseStatus,
					'rewardCardQuantity'=>$row->rewardCardQuantity,
					'remaningQunatity'=>$remaningQunatity,
					'expireDate'=>date('d-m-Y',strtotime($row->expireDate)),
					'RestaurantName'=>$row->branch_name,
					'RestaurantBranchName'=>$row->branch_name,
					'branchDisplayAddress'=>$row->displayAddress,
					'branchId'=>$row->id,
					'lat'=>$row->lat,
					'lng'=>$row->lng,
					'smallLogo'=>base_url('resources/upload/'.$row->rewardCardSmallLogo),
					'bigLogo'=>base_url('resources/upload/'.$row->rewardCardBigLogo)
				);
		}
		
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$res];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}

public function viewRewardCard()
{
	$result=$this->Api_model->viewRewardCard();
	$res=array();
	if($result)
	{
		foreach ($result as $row) {

			$redeemPoints=$row->ubGoDollars*$row->rewardCardsValue;
			$remaningQunatity=$row->rewardCardQuantity-$row->rewardUseStatus;

			$res[]=array('rewardsId'=>$row->rewardsId,
					'rewardCardsValue'=>$row->rewardCardsValue,
					'actualDollar'=>$row->actualDollar,
					'ubGoDollars'=>$row->ubGoDollars,
					'redeemPoints'=>$redeemPoints,
					'rewardCardNumber'=>$row->rewardCardNumber,
					'rewardUseStatus'=>$row->rewardUseStatus,
					'rewardCardQuantity'=>$row->rewardCardQuantity,
					'remaningQunatity'=>$remaningQunatity,
					'expireDate'=>date('d-m-Y',strtotime($row->expireDate)),
					'RestaurantName'=>$row->branch_name,
					'RestaurantBranchName'=>$row->branch_name,
					'branchDisplayAddress'=>$row->displayAddress,
					'branchId'=>$row->id,
					'lat'=>$row->lat,
					'lng'=>$row->lng,
					'smallLogo'=>base_url('resources/upload/'.$row->rewardCardSmallLogo),
					'bigLogo'=>base_url('resources/upload/'.$row->rewardCardBigLogo)
				);
		}
		
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$res];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}

public function topRewardCardList()
{
	$result=$this->Api_model->topRewardCardList();
	//print_r($result);
	$res=array();
	if($result)
	{
		foreach ($result as $row) {

			$redeemPoints=$row->ubGoDollars*$row->rewardCardsValue;
			$remaningQunatity=$row->rewardCardQuantity-$row->rewardUseStatus;

			$res[]=array('rewardsId'=>$row->rewardsId,
					'rewardCardsValue'=>$row->rewardCardsValue,
					'actualDollar'=>$row->actualDollar,
					'ubGoDollars'=>$row->ubGoDollars,
					'redeemPoints'=>$redeemPoints,
					'rewardCardNumber'=>$row->rewardCardNumber,
					'rewardUseStatus'=>$row->rewardUseStatus,
					'rewardCardQuantity'=>$row->rewardCardQuantity,
					'remaningQunatity'=>$remaningQunatity,
					'expireDate'=>date('d-m-Y',strtotime($row->expireDate)),
					'RestaurantName'=>$row->branch_name,
					'RestaurantBranchName'=>$row->branch_name,
					'branchDisplayAddress'=>$row->displayAddress,
					'branchId'=>$row->id,
					'lat'=>$row->lat,
					'lng'=>$row->lng,
					'smallLogo'=>base_url('resources/upload/'.$row->rewardCardSmallLogo),
					'bigLogo'=>base_url('resources/upload/'.$row->rewardCardBigLogo)
				
					
					);
		}
		
		$arr_response = ['response_code' => self::CODE_SUCCESS,'result'=>$res];
		//echo $message_status;
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR];
	}
	draw_json_encode($arr_response);
}

public function couponSearchApi()
{


	//$result1=$this->Api_model->homeScreenCouponList();
	$result=$this->Api_model->couponSearchApi();
	$res1=array();
	$res2=array();
	$res3=array();
	if(!empty($result))
	{
		for($i=0;$i<count($result);$i++)
			{
				$res=$this->Api_model->checkCouponLike($_REQUEST['user_login_id'],$result[$i]->couponId);
				$LikeCount=$this->Api_model->LikeCount($result[$i]->couponId);
				
				$res1[]=array('couponId'=>$result[$i]->couponId,
					'couponCode'=>$result[$i]->couponCode,
					'couponUse'=>$result[$i]->couponUse,
					'couponType'=>$result[$i]->couponType,
					'optionRate'=>$result[$i]->optionRate,
					'couponActualPrice'=>$result[$i]->couponActualPrice,
					'couponDiscountPrice'=>$result[$i]->couponDiscountPrice,
					'ubgohashTag'=>$result[$i]->ubgohashTag,
					'promoText'=>$result[$i]->ubgoText,
					'couponLike'=>"$res",
					'couponLikeCount'=>"$LikeCount",
					'couponTitle'=>$result[$i]->couponTitle,
					'couponDescription'=>$result[$i]->couponDescription,
					'RestaurantName'=>$result[$i]->branch_name,
					'RestaurantBranchName'=>$result[$i]->branch_name,
					'branchDisplayAddress'=>$result[$i]->displayAddress,
					'branchId'=>$result[$i]->id,
					'lat'=>$result[$i]->lat,
					'lng'=>$result[$i]->lng,
					'max_price_per_day'=>$result[$i]->max_price_per_day,
					'smallLogo'=>base_url('resources/upload/'.$result[$i]->couponTemplate1),
					'bigLogo'=>base_url('resources/coupon/'.$result[$i]->bigLogo),
					'bannerLogo'=>base_url('resources/coupon/'.$result[$i]->bannerLogo),
					'startDate'=>$result[$i]->startDate,
					'endDate'=>$result[$i]->endDate
					);
			}
			$arr_response = ['response_code' => self::CODE_SUCCESS,'message'=> 'Coupon List','popular'=>$res1,'latest'=>$res2,'featured'=>$res3];
	}
	else
	{
		$arr_response = ['response_code' => self::CODE_ERROR,'message'=> 'Coupon Not Availble'];
	}
	draw_json_encode($arr_response);

}

public function testPush()
{
	$title="Ub Go Test";
	$msg= "Message Test Successfull..!!!";
	$target="fCYfvSbnH7Y:APA91bHwkHsU22D0oOXAVV9YSq4nlkzeHQ9dZ28nJtWNFG6cx2hytNpqiAodzECKzI8v9mEfnPeHeYDgOzAtYxSlfi1v60xRrpKAp3GUoARBszSw1vxj4_zCQCFaTeIGoYKg6bhcVW2k";
$message=array("title"=>$title,"message"=>$msg);
$message_status = sendMessage($message,$target);
echo $message_status;
}


public function testArr()
{
	
	$Msgarray=array("Static LED High Performance Lighting System ($1100.00 value)", " Parking Pilot with Parking Assist PARKTRONIC ($900.00 value)", "18 AMG 5-Twin-Spoke Bi-Colour Wheels ($500.00 value)","test Wheels ($1000.00 value)");
	
	for($i=0;$i<count($Msgarray);$i++)
	{
		$v=explode('$',$Msgarray[$i]);
		$r[]=$v[1];
	}
	print_r($Msgarray);
	arsort($r,SORT_NUMERIC);
	print_r($r);
		
}

public function testMail()
{

	$to = 'jai@ebunch.ca'; // note the comma

                $subject = 'UbGo Verified Link';

                // Message
                $message = '
                <html>
                <head>
                <title>Test</title>
                </head>
                <body>
                <a href="'.base_url('api/verified').'?key='.md5($to).'">Click Here To Verify</a>
                </body>
                </html>
                ';

                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // Additional headers
                $headers[] = 'To: <'.$to.'>';
                $headers[] = 'From: Test <info@ebunch.ca>';


                // Mail it
                echo mail($to, $subject, $message, implode("\r\n", $headers));

}


public function verified()
{
	$email=$_REQUEST['key'];
	$result=$this->db->query("UPDATE ub_login set status=1 where md5(user_email)='".$email."'");
	$this->load->view('email2');
}
public function shareApp()
{
	$this->load->view('common_pages/shareApp');
}
public function testDateFormat()
{
	  $date=strtotime(date('Y-m-d'));
	echo date('l jS \of F Y',$date);
}

}

