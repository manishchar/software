<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends CI_Model {
public function __construct()
{
parent::__construct();
}
function getDateTimeOnly()
{
return date("Y-m-d H:i:s");
}
function getDateOnly()
{
return date("Y-m-d");
}
function getTimeOnly()
{
return date("H:i:s");
}

################## Compnay Sevices ###############
	public function addUserReg()
	{
		$data=array('userName'=>addslashes($this->input->post('userName')),
				'emailId'=>$this->input->post('emailId'),
				'branchId'=>$this->input->post('branchId'),
				'mobile'=>$this->input->post('mobile'),
				'userId'=>$this->input->post('userId'),
				'password'=>md5($this->input->post('user_password')),
				'role'=>3
				);

		if(empty($data['userId']))
		{
		$result=$this->db->query("SELECT emailId FROM user where emailId='".$data['emailId']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			$this->db->insert('user',$data);
			// $this->db->query("INSERT INTO ub_login set user_email='".$data['user_email']."',user_name='".$data['user_name']."',user_password='".$data['user_password']."',user_role='".$data['user_role']."',status=1");
			// $lastId=$this->db->insert_id();

			// $this->db->query("INSERT INTO ub_add_provider set user_login_id='".$lastId."' ,user_full_name='".$data['user_full_name']."',user_mobile='".$data['user_mobile']."',user_address='".$data['user_address']."',city='".$data['city']."',state='".$data['state']."',country='".$data['country']."',zip='".$data['zip']."'");
			
			// $msg=array('message'=>'Your Account Has Been Created',"email"=>$data['user_email'],"subject"=>"New Registation");

			// $this->sendEmailByActivity($msg);
			// echo $send;
			return true;
		}
		else
		{
			return false;
		}
	  }
	  else
	  {
	  				
		$result=$this->db->query("SELECT emailId FROM user where emailId='".$data['emailId']."' and userId!='".$data['userId']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			if(empty($this->input->post('password')))
			{
				$this->db->query("UPDATE user set userName='".$data['userName']."',emailId='".$data['emailId']."',mobile='".$data['mobile']."' where userId='".$data['userId']."'");
			}
			else
			{
				$this->db->query("UPDATE user set userName='".$data['userName']."',emailId='".$data['emailId']."',mobile='".$data['mobile']."',password='".$data['password']."' where userId='".$data['userId']."'");
			}
			
			// $msg=array('message'=>'Your Account Has Been Updated',"email"=>$data['user_email'],"subject"=>"Update Successful");

			// $this->sendEmailByActivity($msg);
			return true;
		}
		else
		{
			return false;
		}
	  
	  }
	}


public function editProfileData()
{

if($this->session->userdata("adminType")==1)
		{
			$tbl='ub_admin';
		}
		else
		{
			$tbl="ub_add_provider";
		}
		$data=array('user_full_name'=>$this->input->post('user_full_name'),
				'user_email'=>$this->input->post('user_email'),
				'user_login_id'=>$this->input->post('regKey'),
				'user_name'=>$this->input->post('user_email'),
				'user_mobile'=>$this->input->post('user_mobile'),
				'user_address'=>$this->input->post('user_address'),
				'user_password'=>md5($this->input->post('user_password'))
				
				);

			  				
		$result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."' and user_login_id!='".$data['user_login_id']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			if(empty($this->input->post('user_password')))
			{
			 $this->db->query("UPDATE  ub_login as ul join ".$tbl." as uap on uap.user_login_id=ul.user_login_id set ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			else
			{
				
				$this->db->query("UPDATE  ub_login as ul join ".$tbl." as uap on uap.user_login_id=ul.user_login_id set ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.user_password='".$data['user_password']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			
			$msg=array('message'=>'Your Profile Has Been Updated',"email"=>$data['user_email'],"subject"=>"Profile Updated");

			$this->sendEmailByActivity($msg);
			return true;
		}
		else
		{
			return false;
		}
	  
	  
	
}

 public function addFields()
 {
 	if(empty($_POST['dynamic_field_id']))
 	{
 		$numrows=$this->db->query("SELECT * FROM dynamic_fields where field_name='".$_POST['field_name']."'")->num_rows();
 	if($numrows==0)
 	{

 		$this->db->query(" INSERT INTO dynamic_fields set field_name='".$_POST['field_name']."',is_required='".$_POST['is_required']."',field_type='".$_POST['field_type']."'");
 		return true;
 	}
 	else
 	{
 		return false;
 	}
 	}
 	else
 	{
 		$numrows=$this->db->query("SELECT * FROM dynamic_fields where field_name='".$_POST['field_name']."' AND dynamic_field_id!='".$_POST['dynamic_field_id']."'")->num_rows();
 	if($numrows==0)
 	{

 		$this->db->query(" UPDATE dynamic_fields set field_name='".$_POST['field_name']."',is_required='".$_POST['is_required']."',field_type='".$_POST['field_type']."' where dynamic_field_id='".$_POST['dynamic_field_id']."'");
 		return true;
 	}
 	else
 	{
 		return false;
 	}
 	}
 	
 }

	public function companyEdit()
	{

		return $this->db->query("SELECT * From ub_login as ul join ub_add_provider as adp on adp.user_login_id=ul.user_login_id where ul.user_login_id='".$_REQUEST['regKey']."'")->result();
	}

	public function editCoupon()
	{
		return $this->db->query("SELECT * From ub_add_provider as adp join ub_coupon as uc on adp.user_login_id=uc.ownerId where uc.couponId='".$_REQUEST['couponId']."'")->result();
	}
	public function editCategory()
	{
		return $this->db->query("SELECT * From ub_category  where category_id='".$_REQUEST['category_id']."'")->result();
	}
	public function editCampaign()
	{
		return $this->db->query("SELECT * From ub_campaign as uc join ub_campaign_location as ucd on uc.campaignId=ucd.campaignId WHERE uc.campaignId='".$_GET['campaignId']."'")->result();
	}
	public function editProfileCommon()
	{
		if($this->session->userdata("adminType")==1)
		{
			$tbl='ub_admin';
		}
		else
		{
			$tbl="ub_add_provider";
		}
		// echo "SELECT * From ub_login as ul join ".$tbl." as adp on adp.user_login_id=ul.user_login_id where ul.user_login_id='".$this->session->userdata('adminId')."'";
		return $this->db->query("SELECT * From ub_login as ul join ".$tbl." as adp on adp.user_login_id=ul.user_login_id where ul.user_login_id='".$this->session->userdata('adminId')."'")->result();
	}

	public function userList()
	{
		return $this->db->query("SELECT ul.user_login_id,ul.user_email,uad.user_full_name FROM ub_login as ul join ub_add_provider as uad on uad.user_login_id=ul.user_login_id  where ul.status=1 and user_role=2")->result();
	}

	public function createAdd()
	{
		$isupload=1;
		if($_POST['add_id']=='')
		{
			
		$vp=explode('.',$_FILES["add_img"]["name"]);
		$thumfile= basename($_FILES["add_img"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='adimg_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;
		
		if (move_uploaded_file($_FILES["add_img"]["tmp_name"],$targetpaththum)) 
		{
       $data=array('user_login_id'=>$_POST['user_login_id'],
					'add_create_by_id'=>$this->session->userdata('adminId'),
					'add_name'=>$_POST['add_name'],
					'add_campaign_date'=>date('Y-m-d',strtotime($_POST['add_campaign_date'])),
					'add_img'=>$imgName
			        );
		$this->db->insert('ub_add_create',$data);
		$lastId=$this->db->insert_id();
		$sessionIDSTEMP = array('addId' => $lastId );
		 $this->session->set_userdata($sessionIDSTEMP);
		 return "1";
       }
     else
      {
        return "2";
      }
	   }
	   else
	   {
	   return "3";
	   }

			
		}
		else
		{
			if(!empty($_FILES["add_img"]["name"]))
			{
				$vp=explode('.',$_FILES["add_img"]["name"]);
		$thumfile= basename($_FILES["add_img"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='adimg_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;
		
		if (move_uploaded_file($_FILES["add_img"]["tmp_name"],$targetpaththum)) 
		{
       $this->db->query("UPDATE ub_add_create set add_name='".$_POST['add_name']."', add_campaign_date='".date('Y-m-d',strtotime($_POST['add_campaign_date']))."',add_img='".$imgName."' where add_id='".$_POST['add_id']."'");
		 return "1";
       }
     else
      {
        return "2";
      }
	   }
	   else
	   {
	   return "3";
	   }
			}

			else
				{
				$this->db->query("UPDATE ub_add_create set add_name='".$_POST['add_name']."', add_campaign_date='".date('Y-m-d',strtotime($_POST['add_campaign_date']))."' where add_id='".$_POST['add_id']."'");
				}
			
		}

		
		
	}

	public function couponDetailsForCampaign()
	{
		return $this->db->query("SELECT * FROM `ub_coupon` as uc join ub_add_provider as uap on uc.ownerId=uap.user_login_id where uc.couponId='".$_GET['couponId']."'")->result();
	}


	public function addCoupon()
	{
		$isupload=1;
		$data=array('ownerId'=>$this->input->post('user_login_id'),
					'restaurantId'=>$this->input->post('restaurant'),
					'couponTitle'=>addslashes($this->input->post('couponTitle')),
					'ubgohashTag'=>addslashes($this->input->post('ubgohashTag')),
					'ubgoText'=>addslashes($this->input->post('ubgoText')),
					'couponCode'=>$this->input->post('couponCode'),
					'couponUse'=>$this->input->post('couponUse'),
					'couponActualPrice'=>$this->input->post('couponActualPrice'),
					'couponDiscountPrice'=>$this->input->post('couponDiscountPrice'),
					'couponType'=>$this->input->post('couponType'),
					'optionRate'=>$this->input->post('optionRate'),
					'couponDescription'=>addslashes($this->input->post('couponDscription')),
					);
		$email=$this->db->query("SELECT * from ub_login where user_login_id='".$data['ownerId']."'")->row_array();
		if(!empty($_FILES["couponTemplate1"]["name"]))
		{
			
			$vp=explode('.',$_FILES["couponTemplate1"]["name"]);
		$thumfile= basename($_FILES["couponTemplate1"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
              }

		if($isupload==1)
		{
			 $imgName='adimg_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;
		
		if (move_uploaded_file($_FILES["couponTemplate1"]["tmp_name"],$targetpaththum)) 
			{ 
				$img=array('couponTemplate1'=>$imgName);
				$data=array_merge($data,$img);
			} 
			else
			{
				return 3; // file save error
			}
		}
		else
		{
			return 2; // image file extension error
		}

		
		}

		
		if($_POST['couponId']=='')
		{
			$this->db->insert('ub_coupon',$data);
			$msg=array('message'=>'Your Coupon Has Been Created',"email"=>$email['user_email'],"subject"=>"New Coupon Created");

			$this->sendEmailByActivity($msg);
		}
		else
		{
			$this->db->where('couponId', $_POST['couponId']);
    		$this->db->update('ub_coupon', $data);
    		$msg=array('message'=>'Your Coupon Has Been Updated',"email"=>$email['user_email'],"subject"=>"Update Coupon");

			$this->sendEmailByActivity($msg);
		}
		return true;
	}

	public function uploadCouponFile()
	{
		$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
		$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
		if(!empty($_FILES["zip_file"]["name"]) && !empty($_FILES['couponCsv']['name']) && in_array($_FILES['couponCsv']['type'],$csvMimes)) 
		{
			$filename = $_FILES["zip_file"]["name"];
			$source = $_FILES["zip_file"]["tmp_name"];
			$type = $_FILES["zip_file"]["type"];
	
	$name = explode(".", $filename);
	
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "The file you are trying to upload is not a .zip file. Please try again.";
	}

	$target_path = "./resources/upload/".$filename;  // change this to the correct site path
	if(move_uploaded_file($source, $target_path) && is_uploaded_file($_FILES['couponCsv']['tmp_name'])) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);

		$csvFile = fopen($_FILES['couponCsv']['tmp_name'], 'r');
           
            fgetcsv($csvFile);

		if ($x === true) {
			
			$zip->extractTo("./resources/upload/");
			if(is_dir('./resources/upload/'.$name[0]))
				{
					while(($line = fgetcsv($csvFile)) !== FALSE)
					{

						$newName=explode('.',$line[8]);
						$rename='coupon_'.time().'.'.end($newName);
						rename('./resources/upload/'.$name[0].'/'.$line[8], './resources/upload/'.$name[0].'/'.$rename);

						$data=array('ownerId'=>$this->input->post('user_login_id'),
					'restaurantId'=>$this->input->post('restaurant'),
					'couponTitle'=>addslashes($line[0]),
					'couponDescription'=>addslashes($line[1]),
					'couponCode'=>$line[2],
					'couponUse'=>$line[3],
					'couponType'=>$line[4],
					'ubgohashTag'=>addslashes($line[5]),
					'ubgoText'=>addslashes($line[6]),
					'couponActualPrice'=>$line[7],
					'couponDiscountPrice'=>$line[8],
					'optionRate'=>$line[9],
					'couponTemplate1'=>$name[0].'/'.$rename,
					
					);
						$this->db->insert('ub_coupon',$data);
					}

					
				}
			else
			{
				while(($line = fgetcsv($csvFile)) !== FALSE)
					{

						$newName=explode('.',$line[8]);
						$rename='coupon_'.time().'.'.end($newName);
						rename('./resources/upload/'.$line[8], './resources/upload/'.$rename);

						$data=array('ownerId'=>$this->input->post('user_login_id'),
					'restaurantId'=>$this->input->post('restaurant'),
					'couponTitle'=>addslashes($line[0]),
					'couponDescription'=>addslashes($line[1]),
					'couponCode'=>$line[2],
					'couponUse'=>$line[3],
					'couponType'=>$line[4],
					'ubgohashTag'=>addslashes($line[5]),
					'ubgoText'=>addslashes($line[6]),
					'couponActualPrice'=>$line[7],
					'couponDiscountPrice'=>$line[8],
					'optionRate'=>$line[9],
					'couponTemplate1'=>$rename,
					
					);
						$this->db->insert('ub_coupon',$data);
					}

			}
			$zip->close();
	
			unlink($target_path);
		}
		$message = "Your .zip file was uploaded and unpacked.";
	} else {

		$message = "There was a problem with the upload. Please try again.";
		return 2;
	}
return 1;
}
else
{
	return 2;
}


	}
	public function deleteCoupon()
	{
		$this->db->query("DELETE from ub_coupon where couponId='".$_REQUEST['couponId']."'");
		return true;
	
	}

	public function deleteCategory()
	{
		$this->db->query("DELETE from ub_category where category_id='".$_REQUEST['category_id']."'");
			return true;
		
	}
    
    public function deleteCampaign()
	{
		$this->db->query("DELETE FROM ub_campaign where campaignId='".$_GET['campaignId']."'");
		$this->db->query("DELETE FROM  ub_campaign_location where campaignId='".$_GET['campaignId']."'");
		$this->db->query("UPDATE ub_coupon set campaign_status=0 where couponId='".$_GET['couponId']."'");
		return true;

	
    }
	public function addBranch()
	{


		$data=array('branchName'=>addslashes($this->input->post('branchName')),
					'branchCode'=>addslashes($this->input->post('branchCode')),
					'address'=>addslashes($this->input->post('address')),
					'ifsc'=>$this->input->post('ifsc')
					);
		$this->db->insert("branch",$data);
		return true;
	}

public function branchDelete()
{
	$res=$this->db->query("SELECT * FROM ub_branch where id='".$_REQUEST['id']."'")->result();
	if(unlink('./resources/coupon/'.$res[0]->smallLogo) && unlink('./resources/coupon/'.$res[0]->bigLogo))
	{
		$this->db->query("DELETE FROM ub_branch where id='".$_REQUEST['id']."'");
		return 1;
	}
	else
	{
		return 0;
	}
}

	public function sendRequestToDriver()
	{
		//print_r($_POST['user_login_id']);
		for($i=0;$i<count($_POST['user_login_id']);$i++)
		{
			$this->db->query("INSERT INTO ub_driver_list_against_of_add SET add_id='".$this->session->userdata('addId')."',user_login_id='".$_POST['user_login_id'][$i]."'");
		}
		return true;
	}

	public function sendRequestToDriverbySubAdmin()
	{
		//print_r($_POST['user_login_id']);
		for($i=0;$i<count($_POST['user_login_id']);$i++)
		{
			$this->db->query("INSERT INTO ub_driver_list_against_of_add SET add_id='".$this->session->userdata('addId')."',user_login_id='".$_POST['user_login_id'][$i]."'");
		}
		return true;
	}

	public function driverListForAssignTask()
	{
		return $this->db->query("SELECT * FROM ub_login as ul join ub_driver as ud on ud.user_login_id=ul.user_login_id where ul.status=1")->result();
	}


	public function ApprovedStatus()
	{
		$this->db->query("UPDATE ub_driver_list_against_of_add set approved_status='1' where tbl_id='".$_REQUEST['key']."'");
		return true;
	}
	##################### Compnay End #####################


	##################### Driver Services #####################

	public function DriverEdit()
	{
		return $this->db->query("SELECT * From ub_login as ul join ub_driver as adp on adp.user_login_id=ul.user_login_id where ul.user_login_id='".$_REQUEST['regKey']."'")->result();
	}

	public function editFormFieldsData($ids)
	{
		return $this->db->query("SELECT * FROM dynamic_fields where dynamic_field_id IN($ids)")->result();
	}

	public function addDriverReg()
	{

		$data=array('user_full_name'=>$this->input->post('user_full_name'),
				'user_email'=>$this->input->post('user_email'),
				'user_DOB'=>$this->input->post('user_DOB'),
				'user_login_id'=>$this->input->post('regKey'),
				'user_name'=>$this->input->post('user_email'),
				'user_mobile'=>$this->input->post('user_mobile'),
				'user_licence_number'=>$this->input->post('user_licence_number'),
				'user_address'=>$this->input->post('user_address'),
				'user_state'=>$this->input->post('user_state'),
				'user_city'=>$this->input->post('user_city'),
				'user_post_code'=>$this->input->post('user_post_code'),
				'user_password'=>md5($this->input->post('user_password')),
				'user_role'=>3
				);
		if(empty($data['user_login_id']))
		{
		$result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			//$this->db->insert('ub_login',$data);
			$this->db->query("INSERT INTO ub_login set user_email='".$data['user_email']."',user_name='".$data['user_name']."',user_password='".$data['user_password']."',user_role='".$data['user_role']."'");
			$lastId=$this->db->insert_id();
			$this->db->query("INSERT INTO ub_driver set user_login_id='".$lastId."',user_DOB='".$data['user_DOB']."',user_full_name='".$data['user_full_name']."',user_address='".$data['user_address']."',user_mobile='".$data['user_mobile']."',user_state='".$data['user_state']."',user_city='".$data['user_city']."',user_post_code='".$data['user_post_code']."',user_licence_number='".$data['user_licence_number']."'");
			
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
	  				
		$result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."' and user_login_id!='".$data['user_login_id']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			if(empty($data['user_password']))
			{
				$this->db->query("UPDATE  ub_login as ul join ub_driver as uap on uap.user_login_id=ul.user_login_id set 
					ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."',uap.user_DOB='".$data['user_DOB']."',uap.user_state='".$data['user_state']."',uap.user_city='".$data['user_city']."',uap.user_post_code='".$data['user_post_code']."',user_licence_number='".$data['user_licence_number']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			else
			{
				$this->db->query("UPDATE  ub_login as ul join ub_driver as uap on uap.user_login_id=ul.user_login_id set 
					ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.user_password='".$data['user_password']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."',uap.user_DOB='".$data['user_DOB']."',uap.user_state='".$data['user_state']."',uap.user_city='".$data['user_city']."',uap.user_post_code='".$data['user_post_code']."',user_licence_number='".$data['user_licence_number']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			return true;
		}
		else
		{
			return false;
		}
	  
	  }
}


################### Driver End ###############
#################### Common ###############

public function setRouteByAdmin()
{
		//echo count($_REQUEST['lat']);
	$row=$this->db->query("SELECT * FROM ub_routes_main where route_id='".$_REQUEST['route_id']."'")->result();
	$this->db->query("UPDATE ub_routes_main set add_id=0 where route_id='".$_REQUEST['route_id']."'");
	$this->db->query("INSERT INTO ub_routes_main set add_id='".$row[0]->add_id."',driver_id='".$row[0]->driver_id."'");
	$lastId=$this->db->insert_id();
	$count=count($_REQUEST['lat']);
	$add=$this->input->post('address');
	//print_r($add);
	$this->db->query("INSERT ub_routes_sub set route_id='".$lastId."',lat='".$_REQUEST['lat'][0]."',lng='".$_REQUEST['lng'][0]."',address='".$add[0]."',indexing=0");
	$this->db->query("INSERT ub_routes_sub set route_id='".$lastId."',lat='".$_REQUEST['lat'][$count-1]."',lng='".$_REQUEST['lng'][$count-1]."',address='".$add[$count-1]."',indexing=1");
	for($i=1;$i<count($_REQUEST['lat'])-1;$i++)
	{	
		$this->db->query("INSERT ub_routes_sub set route_id='".$lastId."',lat='".$_REQUEST['lat'][$i]."',lng='".$_REQUEST['lng'][$i]."',address='".$add[$i]."',indexing=$i");
	}
	$this->db->query("UPDATE ub_driver_list_against_of_add set status=0,route_status='".$lastId."',change_route=1 where add_id='".$row[0]->add_id."' and user_login_id='".$row[0]->driver_id."'");
	return true;

}

public function UserBlockUnBlock()
{
	$this->db->query("UPDATE ub_login set status='".$_REQUEST['status']."' where user_login_id='".$_REQUEST['regKey']."'");
	return $_REQUEST['status'];
}
public function driverDelete()
{
	$this->db->query("DELETE FROM ub_driver  where user_login_id='".$_REQUEST['driver_id']."'");
	$this->db->query("DELETE FROM ub_login  where user_login_id='".$_REQUEST['driver_id']."'");
	$this->db->query("DELETE FROM ub_driver_list_against_of_add  where user_login_id='".$_REQUEST['driver_id']."'");
	$this->db->query("DELETE FROM ub_routes_main  where driver_id='".$_REQUEST['driver_id']."'");
	return true;
}

public function appUserDelete()
{

	// $this->db->query("DELETE ul,ue FROM ub_login as ul JOIN ub_end_user as ue on ue.user_login_id=ul.user_login_id  where ul.user_login_id='".$_REQUEST['user_id']."'");
	$this->db->query("DELETE FROM ub_end_user  where user_login_id='".$_REQUEST['user_id']."'");
	$this->db->query("DELETE FROM ub_login  where user_login_id='".$_REQUEST['user_id']."'");
	
	return true;
}

public function viewRoutes()
{
	return $this->db->query("SELECT * FROM `ub_routes_sub` where route_id='".$_REQUEST['key']."' ")->result();
}

public function assignedDriverList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc") {



if($this->session->userdata('adminType')==1)
	{
		
			//print_r($condition);
		if(!empty($condition) && sizeof($condition) > 0){
			$str ='where  1';
			foreach ($condition as $key => $value) {
				if($key == "deals.addName"){
					$str .=" AND uac.add_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.compnayName")
				{
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverName")
				{
					$str .=" AND ud.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverMobile")
				{
					$str .=" AND ud.user_mobile LIKE '%".$value."%' ";
				}
				else if($key == "deals.status")
				{
					$str .=" AND uda.status LIKE '%".$value."%' ";
				}

			}
		}

									
		return $this->db->query("SELECT uda.tbl_id,uda.add_id,uda.user_login_id as uda_driverId,uda.status,uda.route_status,uda.approved_status,ud.user_full_name as driverName,ud.user_mobile,uac.user_login_id,uap.user_full_name as compnayName,uac.add_name FROM `ub_driver_list_against_of_add` as uda JOIN ub_driver as ud ON uda.user_login_id=ud.user_login_id JOIN ub_add_create as uac on uac.add_id=uda.add_id JOIN ub_add_provider as uap on uap.user_login_id=uac.user_login_id $str ORDER by uda.tbl_id DESC LIMIT $offset,$noofrow")->result();
	}
	else
	{
		if(!empty($condition) && sizeof($condition) > 0){
			$str ='';
			foreach ($condition as $key => $value) {
				if($key == "deals.addName"){
					$str .=" AND uac.add_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.compnayName")
				{
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverName")
				{
					$str .=" AND ud.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverMobile")
				{
					$str .=" AND ud.user_mobile LIKE '%".$value."%' ";
				}
				else if($key == "deals.status")
				{
					$str .=" AND uda.status LIKE '%".$value."%' ";
				}

			}
		}
		return $this->db->query("SELECT uda.tbl_id,uda.add_id,uda.user_login_id as uda_driverId,uda.status,uda.route_status,uda.approved_status,ud.user_full_name as driverName,ud.user_mobile,uac.user_login_id,uap.user_full_name as compnayName,uac.add_name FROM `ub_driver_list_against_of_add` as uda JOIN ub_driver as ud ON uda.user_login_id=ud.user_login_id JOIN ub_add_create as uac on uac.add_id=uda.add_id JOIN ub_add_provider as uap on uap.user_login_id=uac.user_login_id where uac.user_login_id='".$this->session->userdata('adminId')."' $str ORDER by uda.tbl_id DESC LIMIT $offset,$noofrow")->result();
		
	}

  
	}

public function count_rows()
{
	if($this->session->userdata('adminType')==1)
	{
		if(!empty($condition) && sizeof($condition) > 0){
			$str ='where  1';
			foreach ($condition as $key => $value) {
				if($key == "deals.addName"){
					$str .=" AND uac.add_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.compnayName")
				{
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverName")
				{
					$str .=" AND ud.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverMobile")
				{
					$str .=" AND ud.user_mobile LIKE '%".$value."%' ";
				}
				else if($key == "deals.status")
				{
					$str .=" AND uda.status LIKE '%".$value."%' ";
				}

			}
		}
		return $this->db->query("SELECT uda.tbl_id,uda.add_id,uda.user_login_id as uda_driverId,uda.status,ud.user_full_name as driverName,ud.user_mobile,uac.user_login_id,uap.user_full_name as compnayName,uac.add_name FROM `ub_driver_list_against_of_add` as uda JOIN ub_driver as ud ON uda.user_login_id=ud.user_login_id JOIN ub_add_create as uac on uac.add_id=uda.add_id JOIN ub_add_provider as uap on uap.user_login_id=uac.user_login_id $str ORDER by uda.tbl_id DESC")->num_rows();
	}
	else
	{
		if(!empty($condition) && sizeof($condition) > 0){
			$str ='';
			foreach ($condition as $key => $value) {
				if($key == "deals.addName"){
					$str .=" AND uac.add_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.compnayName")
				{
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverName")
				{
					$str .=" AND ud.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.driverMobile")
				{
					$str .=" AND ud.user_mobile LIKE '%".$value."%' ";
				}
				else if($key == "deals.status")
				{
					$str .=" AND uda.status LIKE '%".$value."%' ";
				}

			}
		}
		return $this->db->query("SELECT uda.tbl_id,uda.add_id,uda.user_login_id as uda_driverId,uda.status,ud.user_full_name as driverName,ud.user_mobile,uac.user_login_id,uap.user_full_name as compnayName,uac.add_name FROM `ub_driver_list_against_of_add` as uda JOIN ub_driver as ud ON uda.user_login_id=ud.user_login_id JOIN ub_add_create as uac on uac.add_id=uda.add_id JOIN ub_add_provider as uap on uap.user_login_id=uac.user_login_id where uac.user_login_id='".$this->session->userdata('adminId')."' $str ORDER by uda.tbl_id DESC")->num_rows();
		
	}
}

#################### END ##################
#################### Branch ##################
public function branchEdit()
{
	return $this->db->query("SELECT * FROM ub_branch where id='".$_REQUEST['id']."'")->result();
}
public function branchListForCouponAdd($id)
{
	//echo "SELECT * FROM ub_branch where user_login_id='".$id."'";
	return $this->db->query("SELECT * FROM ub_branch where user_login_id='".$id."'")->result();
}
public function fieldList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='where 1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.field_name"){
					$str .=" AND field_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.field_type")
				{
					$str .=" AND field_type LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM dynamic_fields ".$str." LIMIT $offset,$noofrow")->result();
}
public function CountadList($condition)
{
	$str ='Where 1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.field_name"){
					$str .=" AND field_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.field_type")
				{
					$str .=" AND field_type LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM dynamic_fields ".$str."")->num_rows();
}
public function branchListForSuperAdmin($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.branchName"){
					$str .=" AND branchName LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branchCode")
				{
					$str .=" AND ifsc LIKE '%".$value."%' ";
				}

				else if($key == "deals.ifsc")
				{
					$str .=" AND ifsc LIKE '%".$value."%' ";
				}
				 

			}
		}
		//echo "SELECT * FROM ub_add_provider as uac join ub_branch as uap on uap.user_login_id=uac.user_login_id ".$str."";
	return $this->db->query("SELECT * FROM branch ".$str." LIMIT $offset,$noofrow")->result();
}

public function formCount($condition)
{
	$str ='Where  dfv2.dynamic_field_id=1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.field_name"){
					$str .=" AND field_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.field_type")
				{
					$str .=" AND field_type LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM dynamic_fields_value as dfv JOIN dynamic_fields_value2 as dfv2 ON dfv.dynamic_fields_value_id=dfv2.dynamic_fields_value_id JOIN form_name as fn on fn.form_Id=dfv.form_id ".$str."")->num_rows();
}

public function formfiledList($condition)
{
	$str ='Where  dfv2.dynamic_field_id=1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.field_name"){
					$str .=" AND field_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.field_type")
				{
					$str .=" AND field_type LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM dynamic_fields_value as dfv JOIN dynamic_fields_value2 as dfv2 ON dfv.dynamic_fields_value_id=dfv2.dynamic_fields_value_id JOIN form_name as fn on fn.form_Id=dfv.form_id ".$str."")->result();
}



public function count_branchList($condition)
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.branchName"){
					$str .=" AND branchName LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branchCode")
				{
					$str .=" AND ifsc LIKE '%".$value."%' ";
				}

				else if($key == "deals.ifsc")
				{
					$str .=" AND ifsc LIKE '%".$value."%' ";
				}
				 
				 

			}
		}
	return $this->db->query("SELECT * FROM branch ".$str."")->num_rows();
}


public function getFields()
{
	return $this->db->query("SELECT * FROM dynamic_fields where status=1")->result();
}

public function getForms()
{
	return $this->db->query("SELECT * FROM form_name where status=1")->result();
}

public function createForm()
{

	$num=$this->db->query("SELECT * FROM form_name where form_name='".$_POST['form_name']."'")->num_rows();
	if($num==0)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO form_name set form_name='".$_POST['form_name']."',dynamic_field_id='".implode(',', $_POST['fields'])."'");
		if($this->db->trans_complete())
		{
		return 1;
		}
		else
		{
		return 2;
		}
	}
	else
	{
		return 3;
	}
	
}

public function getSelectedFields($id)
{
	//$ids=implode(',', $_POST['fields']);
	$ids=$this->db->query("SELECT * FROM form_name where form_Id='".$id."'")->result();
	$idss=$ids[0]->dynamic_field_id;

		
	$data= $this->db->where_in('dynamic_field_id',explode(',', $idss))->get('dynamic_fields')->result();
	$obj['form']=$ids;

	$obj['fields']=$data;
	return $obj;
}

public function getSelectedHeaders($id)
{
	$final =array();
	//$ids=implode(',', $_POST['fields']);
	$ids=$this->db->query("SELECT * FROM form_name where form_Id='".$id."'")->result();
	$idss=$ids[0]->dynamic_field_id;
	
	$data= $this->db->query("SELECT field_name FROM dynamic_fields where dynamic_field_id IN($idss)")->result();
	$obj['form']=$ids;
foreach($data as $row){
	$final[] =  $row->field_name;
}
	// print_r($final);
	// die;
	$obj['fields']=$data;
	return $final;
}

public function saveFormData()
{
	
	$this->db->trans_start();
	$this->db->query("INSERT INTO dynamic_fields_value SET form_id='".$_POST['form_id']."',user_id='".$this->session->userdata('adminId')."'");
	$lastId=$this->db->insert_id();
	for ($i=0;$i<count($_POST['dynamic_field_id']);$i++) {
		$this->db->query("INSERT INTO dynamic_fields_value2 SET dynamic_fields_value_id='".$lastId."',dynamic_field_id='".$_POST['dynamic_field_id'][$i]."',field_value='".$_POST['field_value'][$i]."'");
	
	}
	if($this->db->trans_complete())
	{
		return true;
	}
	else
	{
		return false;
	}
}


// public function TotalCouponLike()
// {
// 	return $this->db->query("");
// }
public function sendEmailNotification()
{
	$to = "jaiprakash201019@gmail.com"; // note the comma

				$subject = 'UbGo Password Reset';

				// Message
				$message = '
				<html>
				<head>
				<title>Test</title>
				</head>
				<body>
				<a href="#">Click Here To Reset Password</a>
				</body>
				</html>
				';

				// To send HTML mail, the Content-type header must be set
				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				// Additional headers
				$headers[] = 'To: Rahul <'.$to.'>';
				$headers[] = 'From: Test <info@ebunch.ca>';


				// Mail it
				$test=mail($to, $subject, $message, implode("\r\n", $headers));
				return $test;


}

public function sendEmailByActivity($msg)
{
	
	// $config=array(
	// 				'protocol'=>'sendmail',
	// 				'mailtype'=>'html'
	// 			 );
	// $this->email->initialize($config);
	// $this->email->from('info@ebunch.ca', 'UbGo');
 //    $this->email->to('jaiprakash201019@gmail.com');
   
 //    $this->email->subject($msg['subject']);
 //    $this->email->message($msg['message']);
 //    $this->email->send();

	$to = $msg['email']; // note the comma
	//$to = 'jaiprakash201019@gmail.com';

				$subject = $msg['subject'];

				// Message
				$message = '<div style="background: #9ADA3B; width:auto;height: auto;margin-top: 0px;"> <table> <tbody> <tr> <td></td> </tr> </tbody> </table> <table border="0" style="background: #fff;width: 60%;margin-left: 18%;padding: 35px;border-radius: 15px;"> <tbody> <tr> <td colspan="2"><img src="'.base_url("resources/icons/").'logoUbgo.png"></td> </tr> <tr> <td colspan="2"><h3>Greetings !</h3></td> </tr> <tr> <td colspan="2"> <p>'.$msg['message'].'</p> </td> </tr> <tr> <td colspan="2"> <h3>UB GO App is available on:</h3> <br> <img src="'.base_url("resources/icons/").'pstore.png"> </td> </tr> </tbody> </table> <table> <tbody> <tr> <td></td> </tr> </tbody> </table> </div>';

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

#################### END ##################
}



?>
