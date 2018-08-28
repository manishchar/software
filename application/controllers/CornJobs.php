<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class CornJobs extends CI_Controller {

	public function __construct(){
       parent::__construct();
      
       $this->load->library('email');
       //$this->load->model('Model_main');
   }
 
  

############################## Corn Jobs #########################################	


public function sendEmailNotification()
{
 $result=$this->Api_model->sendEmailNotification();
	  //echo "call successFull";

}

public function sendEmailToCouponProvider()
{
	$email=$this->Services->userList();
	//print_r($email);
	foreach ($email as $row) {
		$result=forCountDataSingleTable('where uc.ownerId='.$row->user_login_id,'ub_fav_coupon as ufc join ub_coupon as uc on uc.couponId=ufc.couponId');
		$result2=forCountDataSingleTable('where uc.ownerId='.$row->user_login_id,'ub_redeem_coupon as ufc join ub_coupon as uc on uc.couponId=ufc.couponId');

		$msg=array('message'=>'Your Overall Coupon Likes is/are'.$result.'And Overall Redeemed Coupon is/are'.$result2,"email"=>$row->user_email,"subject"=>"Coupon Likes");

			$this->sendEmailByActivity($msg);
	}
	
}


}

