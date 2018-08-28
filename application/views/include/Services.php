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
	public function addCompnayReg()
	{
		$data=array('user_full_name'=>addslashes($this->input->post('user_full_name')),
				'user_email'=>$this->input->post('user_email'),
				'user_login_id'=>$this->input->post('regKey'),
				'user_name'=>$this->input->post('user_email'),
				'user_mobile'=>$this->input->post('user_mobile'),
				'user_address'=>$this->input->post('user_address'),
				'city'=>$this->input->post('city'),
				'state'=>$this->input->post('state'),
				'country'=>$this->input->post('country'),
				'zip'=>$this->input->post('zip'),
				'user_password'=>md5($this->input->post('user_password')),
				'user_role'=>$this->input->post('utype')
				);

		if(empty($data['user_login_id']))
		{
		$result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			
			$this->db->query("INSERT INTO ub_login set user_email='".$data['user_email']."',user_name='".$data['user_name']."',user_password='".$data['user_password']."',user_role='".$data['user_role']."',status=1");
			$lastId=$this->db->insert_id();

			$this->db->query("INSERT INTO ub_add_provider set user_login_id='".$lastId."' ,user_full_name='".$data['user_full_name']."',user_mobile='".$data['user_mobile']."',user_address='".$data['user_address']."',city='".$data['city']."',state='".$data['state']."',country='".$data['country']."',zip='".$data['zip']."'");
			
			$msg=array('message'=>'Your Account Has Been Created',"email"=>$data['user_email'],"subject"=>"New Registation");

			$this->sendEmailByActivity($msg);
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
	  				
		$result=$this->db->query("SELECT user_email FROM ub_login where user_email='".$data['user_email']."' and user_login_id!='".$data['user_login_id']."'");
		$show_count =$result->num_rows();
		if($show_count==0)
		{
			if(empty($this->input->post('user_password')))
			{
				$this->db->query("UPDATE  ub_login as ul join ub_add_provider as uap on uap.user_login_id=ul.user_login_id set 
					ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."',uap.city='".$data['city']."',uap.state='".$data['state']."',uap.country='".$data['country']."',zip='".$data['zip']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			else
			{
				$this->db->query("UPDATE  ub_login as ul join ub_add_provider as uap on uap.user_login_id=ul.user_login_id set 
					ul.user_email='".$data['user_email']."',ul.user_name='".$data['user_name']."',ul.user_password='".$data['user_password']."',ul.update_date='".date('Y-m-d H:i:s')."',uap.user_full_name='".$data['user_full_name']."',uap.user_mobile='".$data['user_mobile']."',uap.user_address='".$data['user_address']."',uap.city='".$data['city']."',uap.state='".$data['state']."',uap.country='".$data['country']."',zip='".$data['zip']."' where ul.user_login_id='".$data['user_login_id']."'");
			}
			
			$msg=array('message'=>'Your Account Has Been Updated',"email"=>$data['user_email'],"subject"=>"Update Successful");

			$this->sendEmailByActivity($msg);
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
					'optionRate'=>$line[7],
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
					'optionRate'=>$line[7],
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
		

		$data=array('branch_name'=>addslashes($this->input->post('branch_name')),
						'branch_address'=>addslashes($this->input->post('branch_address')),
						'displayAddress'=>addslashes($this->input->post('displayAddress')),
						'bussinessCategoryId'=>$this->input->post('bussinessCategory'),
						'fb_page_url'=>$this->input->post('fb_page_url'),
						'website_url'=>$this->input->post('website_url'),
						'about_business'=>addslashes($this->input->post('about_business')),
						'add_text'=>addslashes($this->input->post('add_text')),
						'openingTime'=>$this->input->post('openingTime'),
						'closingTime'=>$this->input->post('closingTime'),
						'lat'=>$this->input->post('lat'),
						'lng'=>$this->input->post('lng')
						);
		$isupload=1;
		if($_POST['id']=='')
		{
			
				$vp=explode('.',$_FILES["img1"]["name"]);
				$vp1=explode('.',$_FILES["img2"]["name"]);
				$vp2=explode('.',$_FILES["img3"]["name"]);
		        $thumfile= basename($_FILES["img1"]["name"]);
		        $thumfile1= basename($_FILES["img2"]["name"]);
		        $thumfile2= basename($_FILES["img3"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		$imageFileType2 = pathinfo($thumfile1,PATHINFO_EXTENSION);
		$imageFileType3 = pathinfo($thumfile2,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" && $imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='resSmallLogo'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
			 $imgName1='resBigLogo'.time().'.'.pathinfo($thumfile1, PATHINFO_EXTENSION);
			 $imgName2='resBannerLogo'.time().'.'.pathinfo($thumfile2, PATHINFO_EXTENSION);
		$targetpaththum="./resources/coupon/".$imgName;
		$targetpaththum1="./resources/coupon/".$imgName1;
		$targetpaththum2="./resources/coupon/".$imgName2;

		
		if (move_uploaded_file($_FILES["img1"]["tmp_name"],$targetpaththum)) 
		{
			if(move_uploaded_file($_FILES["img2"]["tmp_name"],$targetpaththum1) && move_uploaded_file($_FILES["img3"]["tmp_name"],$targetpaththum2))
			{
				$this->db->query("INSERT ub_branch set user_login_id = '".$this->input->post('user_login_id')."',branch_name='".$data['branch_name']."',smallLogo='".$imgName."',bigLogo='".$imgName1."',bannerLogo='".$imgName2."',branch_address='".$data['branch_address']."',displayAddress='".$data['displayAddress']."',lat='".$data['lat']."',lng='".$data['lng']."',businessCategoryId='".$data['bussinessCategoryId']."',fb_page_url='".$data['fb_page_url']."',website_url='".$data['website_url']."',about_business='".$data['about_business']."',add_text='".$data['add_text']."',openingTime='".$data['openingTime']."',closingTime='".$data['closingTime']."'");
		
		 return "1";
			}
			else
			{
				unlink($targetpaththum.$imgName);
				return "2";
			}
       
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
			if(!empty($_FILES["img1"]["name"]))
			{
				$vp=explode('.',$_FILES["img1"]["name"]);
		$thumfile= basename($_FILES["img1"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='resSmallLogo'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/coupon/".$imgName;
		
		if (move_uploaded_file($_FILES["img1"]["tmp_name"],$targetpaththum)) 
		{
       $this->db->query("UPDATE ub_branch set user_login_id = '".$this->input->post('user_login_id')."',branch_name='".$data['branch_name']."',smallLogo='".$imgName."',branch_address='".$data['branch_address']."',displayAddress='".$data['displayAddress']."',lat='".$data['lat']."',lng='".$data['lng']."', businessCategoryId='".$data['bussinessCategoryId']."',fb_page_url='".$data['fb_page_url']."',website_url='".$data['website_url']."',about_business='".$data['about_business']."',add_text='".$data['add_text']."',openingTime='".$data['openingTime']."',closingTime='".$data['closingTime']."' where id='".$_POST['id']."'");
		 
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
if(!empty($_FILES["img2"]["name"]))
{

				$vp=explode('.',$_FILES["img2"]["name"]);
		$thumfile= basename($_FILES["img2"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='resBigLogo'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/coupon/".$imgName;
		
		if (move_uploaded_file($_FILES["img2"]["tmp_name"],$targetpaththum)) 
		{
       $this->db->query("UPDATE ub_branch set user_login_id = '".$this->input->post('user_login_id')."',branch_name='".$data['branch_name']."',bigLogo='".$imgName."',branch_address='".$data['branch_address']."',displayAddress='".$data['displayAddress']."',lat='".$data['lat']."',lng='".$data['lng']."', businessCategoryId='".$data['bussinessCategoryId']."',fb_page_url='".$data['fb_page_url']."',website_url='".$data['website_url']."',about_business='".$data['about_business']."',add_text='".$data['add_text']."',openingTime='".$data['openingTime']."',closingTime='".$data['closingTime']."' where id='".$_POST['id']."'");
		 
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
if(!empty($_FILES["img3"]["name"]))
{

				$vp=explode('.',$_FILES["img3"]["name"]);
		$thumfile= basename($_FILES["img3"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='resBannerLogo'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/coupon/".$imgName;
		
		if (move_uploaded_file($_FILES["img3"]["tmp_name"],$targetpaththum)) 
		{
       $this->db->query("UPDATE ub_branch set user_login_id = '".$this->input->post('user_login_id')."',branch_name='".$data['branch_name']."',bannerLogo='".$imgName."',branch_address='".$data['branch_address']."',displayAddress='".$data['displayAddress']."',lat='".$data['lat']."',lng='".$data['lng']."', businessCategoryId='".$data['bussinessCategoryId']."',fb_page_url='".$data['fb_page_url']."',website_url='".$data['website_url']."',about_business='".$data['about_business']."',add_text='".$data['add_text']."',openingTime='".$data['openingTime']."',closingTime='".$data['closingTime']."' where id='".$_POST['id']."'");
		 
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
			if(empty($_FILES["img1"]["name"]) && empty($_FILES["img2"]["name"]) && empty($_FILES["img3"]["name"]))
				{
				$this->db->query("UPDATE ub_branch set user_login_id = '".$this->input->post('user_login_id')."',branch_name='".$data['branch_name']."',branch_address='".$data['branch_address']."',displayAddress='".$data['displayAddress']."',lat='".$data['lat']."',lng='".$data['lng']."', businessCategoryId='".$data['bussinessCategoryId']."',fb_page_url='".$data['fb_page_url']."',website_url='".$data['website_url']."',about_business='".$data['about_business']."',add_text='".$data['add_text']."',openingTime='".$data['openingTime']."',closingTime='".$data['closingTime']."' where id='".$_POST['id']."'");
				}

			return "1";
		}

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
	$this->db->query("DELETE ul,ue FROM ub_end_user as ul JOIN ub_login as ue on ue.user_login_id=ul.user_login_id  where ul.user_login_id='".$_REQUEST['user_id']."'");
	//$this->db->query("DELETE FROM ub_end_user  where user_login_id='".$_REQUEST['user_id']."'");
	
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
public function branchList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.branch_name"){
					$str .=" AND branch_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branch_address")
				{
					$str .=" AND branch_address LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_branch where user_login_id='".$this->session->userdata('adminId')."' ".$str." LIMIT $offset,$noofrow")->result();
}
public function CountadList($condition)
{
	$str ='';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.addName"){
					$str .=" AND add_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.add_campaign_date")
				{
					$str .=" AND add_campaign_date LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_branch where user_login_id='".$this->session->userdata('adminId')."' ".$str."")->num_rows();
}
public function branchListForSuperAdmin($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branch_name")
				{
					$str .=" AND uap.branch_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branch_address")
				{
					$str .=" AND uap.branch_address LIKE '%".$value."%' ";
				}
				 

			}
		}
		//echo "SELECT * FROM ub_add_provider as uac join ub_branch as uap on uap.user_login_id=uac.user_login_id ".$str."";
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_branch as uap on uap.user_login_id=uac.user_login_id ".$str." LIMIT $offset,$noofrow")->result();
}

public function count_branchList($condition)
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branch_name")
				{
					$str .=" AND uap.branch_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.branch_address")
				{
					$str .=" AND uap.branch_address LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_branch as uap on uap.user_login_id=uac.user_login_id ".$str."")->num_rows();
}


public function appUserList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.user_mobile")
				{
					$str .=" AND uac.user_mobile LIKE '%".$value."%' ";
				}
				 else if($key == "deals.user_email")
				{
					$str .=" AND uap.user_email LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_login as uac join ub_end_user as uap on uap.user_login_id=uac.user_login_id ".$str." LIMIT $offset,$noofrow")->result();
}

public function count_appUserList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uap.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.user_mobile")
				{
					$str .=" AND uac.user_mobile LIKE '%".$value."%' ";
				}
				 else if($key == "deals.user_email")
				{
					$str .=" AND uap.user_email LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_login as uac join ub_end_user as uap on uap.user_login_id=uac.user_login_id ".$str."")->num_rows();
}



public function couponList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}

				 

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id ".$str." order by uap.couponId desc LIMIT $offset,$noofrow")->result();
}
public function count_couponList($condition)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id ".$str."")->num_rows();
}

public function redeemList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}

				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_coupon as uc join ub_redeem_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str." order by urc.redeemId desc LIMIT $offset,$noofrow")->result();
}


public function count_redeemList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}


				 

			}
		}
	
		
		return $this->db->query("SELECT * FROM ub_coupon as uc join ub_redeem_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str."")->num_rows();
}


public function redeemRewardCardList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.user_login_id = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.branchId = '".$value."' ";
				}

				 else if($key == "deals.rewardCardNumber")
				{
					$str .=" AND uc.rewardCardNumber LIKE '%".$value."%' ";
				}

				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_rewards_cards as uc join ub_redeem_reward_card as urc on uc.rewardsId=urc.rewardsId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str." LIMIT $offset,$noofrow")->result();
}


public function count_redeemRewardCardList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.user_login_id = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.branchId = '".$value."' ";
				}

				 else if($key == "deals.rewardCardNumber")
				{
					$str .=" AND uc.rewardCardNumber LIKE '%".$value."%' ";
				}
			 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_rewards_cards as uc join ub_redeem_reward_card as urc on uc.rewardsId=urc.rewardsId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str."")->num_rows();
}


public function orderList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uap.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uap.user_login_id = '".$value."' ";
				}
				
				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_dollars_purchase as upc join ub_add_provider as uap on upc.user_login_id=uap.user_login_id".$str." LIMIT $offset,$noofrow")->result();
}


public function homeScreenOrderTrack($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uap.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uap.user_login_id = '".$value."' ";
				}
			
			}
		}
	
		return $this->db->query("SELECT * FROM ub_featured_list_history as upc join ub_add_provider as uap on upc.user_login_id=uap.user_login_id join ub_coupon as uc on uc.couponId=upc.couponId".$str." LIMIT $offset,$noofrow")->result();
}

public function count_homeScreenOrderTrack($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uap.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uap.user_login_id = '".$value."' ";
				}
			
			}
		}
	
		return $this->db->query("SELECT * FROM ub_featured_list_history as upc join ub_add_provider as uap on upc.user_login_id=uap.user_login_id join ub_coupon as uc on uc.couponId=upc.couponId".$str."")->num_rows();
}

public function remaningUbGoDollarList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND user_login_id = '".$value."' ";
				}
				
				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_add_provider ".$str." LIMIT $offset,$noofrow")->result();
}

public function count_orderList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uap.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uap.user_login_id = '".$value."' ";
				}
				

				//  else if($key == "deals.couponCode")
				// {
				// 	$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				// }

				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_dollars_purchase as upc join ub_add_provider as uap on upc.user_login_id=uap.user_login_id".$str."")->num_rows();
}

public function count_remaningUbGoDollarList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND user_login_id = '".$value."' ";
				}
				
				 

			}
		}
	
		return $this->db->query("SELECT * FROM ub_add_provider ".$str."")->num_rows();
}

public function viewedCouponList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_coupon as uc join ub_view_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str." LIMIT $offset,$noofrow")->result();
}

public function count_viewedCouponList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_coupon as uc join ub_view_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str."")->num_rows();
}

public function sharedCouponList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_coupon as uc join ub_social_share_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str." LIMIT $offset,$noofrow")->result();
}

public function count_sharedCouponList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where uc.ownerId='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uc.ownerId = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND uc.restaurantId = '".$value."' ";
				}

				 else if($key == "deals.couponCode")
				{
					$str .=" AND uc.couponCode LIKE '%".$value."%' ";
				}
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_coupon as uc join ub_social_share_coupon as urc on uc.couponId=urc.couponId join ub_end_user as uec on uec.user_login_id=urc.user_login_id".$str."")->num_rows();
}

public function campaignList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}
				else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId ".$str." order by uc.campaignId desc LIMIT $offset,$noofrow")->result();
}

public function count_campaignList($condition)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}
				 else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId ".$str."")->num_rows();
}


public function campaignListForHomeScreen($condition,$offset,$noofrow)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}



	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			

			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uac.user_login_id LIKE '%".$value."%' ";
				}
				 else if($key == "deals.ownerId")
				{
					$str .=" AND uap.ownerId LIKE '%".$value."%' ";
				}
				else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}
				 

			}

		}


	return $this->db->query("SELECT uac.*,uap.*,uc.*,uhs.campaignId as cId FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId left join ub_home_screen as uhs on uhs.campaignId=uc.campaignId ".$str." and uc.serviceType=1 and uc.startDate<='".date('Y-m-d')."' and uc.endDate>='".date('Y-m-d')."' order by uc.campaignId desc LIMIT $offset,$noofrow")->result();

}

public function count_campaignListForHomeScreen($condition)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}
				 else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}

			}
		}
	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId ".$str." and uc.serviceType=1 and startDate<='".date('Y-m-d')."' and endDate>='".date('Y-m-d')."'")->num_rows();
}


public function homeScreenList($condition,$offset=0,$noofrow=5,$sort_column="deals.id",$sort_type="desc")
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	//$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_login_id"){
					$str .=" AND uac.user_login_id LIKE '%".$value."%' ";
				}
				 else if($key == "deals.ownerId")
				{
					$str .=" AND uap.ownerId LIKE '%".$value."%' ";
				}
				else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}
				 

			}
		}


	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId join ub_home_screen as uhs on uhs.campaignId=uc.campaignId  ".$str." and uc.serviceType=1 and uc.startDate<='".date('Y-m-d')."' and uc.endDate>='".date('Y-m-d')."' order by uc.campaignId desc LIMIT $offset,$noofrow")->result();


}

public function count_homeScreenList($condition)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = 'where uac.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str ='where  1';
	}
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.user_full_name"){
					$str .=" AND uac.user_full_name LIKE '%".$value."%' ";
				}
				 else if($key == "deals.couponCode")
				{
					$str .=" AND uap.couponCode LIKE '%".$value."%' ";
				}
				 else if($key == "deals.optionRate")
				{
					$str .=" AND uap.optionRate LIKE '%".$value."%' ";
				}

			}
		}

	return $this->db->query("SELECT * FROM ub_add_provider as uac join ub_coupon as uap on uap.ownerId=uac.user_login_id join ub_campaign as uc ON uc.couponId=uap.couponId join ub_home_screen as uhs on uhs.campaignId=uc.campaignId  ".$str." and uc.serviceType=1 and uc.startDate<='".date('Y-m-d')."' and uc.endDate>='".date('Y-m-d')."'")->num_rows();
}



public function categoryList($condition,$offset=0,$noofrow=100)
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.category_name"){
					$str .=" AND category_name LIKE '%".$value."%' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_category ".$str." LIMIT ".$offset.",".$noofrow."")->result();
}

public function count_categoryList()
{
	$str ='where  1';
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.category_name"){
					$str .=" AND category_name LIKE '%".$value."%' ";
				}
		}
		}
	return $this->db->query("SELECT * FROM ub_category ".$str." ")->num_rows();
}

public function rewardCardsList($condition,$offset,$noofrow)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where urc.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {

				 if($key == "deals.user_login_id")
				{
					$str .=" AND ub.user_login_id = '".$value."' ";
				}
				else if($key == "deals.branchId"){
					$str .=" AND ub.id = '".$value."' ";
				}
				
				
				 

			}
		}
		
	return $this->db->query("SELECT * FROM ub_rewards_cards as urc JOIN ub_branch as ub on ub.id=urc.branchId $str ORDER by rewardsId DESC LIMIT $offset,$noofrow")->result();
}
public function count_rewardCardsList($condition)
{
	if($this->session->userdata('adminType')=='2')
	{
		$str = ' where urc.user_login_id='.$this->session->userdata('adminId');
	}
	else
	{
		$str =' where  1';
	}
	//$str ='where  1';
	//print_r($condition);
	if(!empty($condition) && sizeof($condition) > 0){
			
			foreach ($condition as $key => $value) {
				if($key == "deals.branchId"){
					$str .=" AND ub.id = '".$value."' ";
				}
				else if($key == "deals.user_login_id")
				{
					$str .=" AND ub.user_login_id = '".$value."' ";
				}
				 

			}
		}
	return $this->db->query("SELECT * FROM ub_rewards_cards as urc JOIN ub_branch as ub on ub.id=urc.branchId $str")->num_rows();
}

public function dollerVsPoint()
{
	return $this->db->query("SELECT * FROM ub_dollar_settings limit 1")->result();
}

public function ubgoDollarSettingHomeScreen()
{
	return $this->db->query("SELECT * FROM ub_home_screen_dollar_settings limit 1")->result();
}

public function editReward()
{
	return $this->db->query("SELECT * FROM ub_rewards_cards where rewardsId='".$_REQUEST['reward_id']."'")->result();
}

public function marketingServiceSettings()
{
	return $this->db->query("SELECT * FROM ub_marketing_area")->result();
}
public function socialShareSettings()
{
	return $this->db->query("SELECT * FROM social_share_point_settings")->result();
}
public function addDollerSettings()
{
	return $this->db->query(
							" INSERT INTO ub_dollar_settings
								set price='".$_POST['price']."',
								ubGoDollar='".$_POST['point']."'
								 ON DUPLICATE KEY UPDATE
								 price='".$_POST['price']."',
								ubGoDollar='".$_POST['point']."'
							 ");
}

public function homeScreenSettings()
{
	return $this->db->query(
							" INSERT INTO ub_home_screen_dollar_settings
								set 
								ubGoDollar='".$_POST['point']."'
								 ON DUPLICATE KEY UPDATE
								 
								ubGoDollar='".$_POST['point']."'
							 ");
}

public function updateMarketingService()
{

	for($i=0;$i<count($_POST['marketingName']);$i++)
	{
		if($_POST['marketingId'][$i]=='')
		{
			$this->db->query(
							"INSERT INTO ub_marketing_area
								set marketingName='".$_POST['marketingName'][$i]."',
								ubGoDollarsPerMarketing='".$_POST['ubGoDollarsPerMarketing'][$i]."'
								 
							 ");
		}
		else
		{
			$this->db->query(
							"UPDATE  ub_marketing_area
								set marketingName='".$_POST['marketingName'][$i]."',
								ubGoDollarsPerMarketing='".$_POST['ubGoDollarsPerMarketing'][$i]."'
								 WHERE marketingId='".$_POST['marketingId'][$i]."'
							 ");
		}
		
	}
	return true;
}

public function updateSocialSharePoint()
{

	for($i=0;$i<count($_POST['social_Name']);$i++)
	{
		if($_POST['social_share_point_setting_id'][$i]=='')
		{
			$this->db->query(
							"INSERT INTO social_share_point_settings
								set social_Name='".$_POST['social_Name'][$i]."',
								point='".$_POST['point'][$i]."'
								 
							 ");
		}
		else
		{
			$this->db->query(
							"UPDATE  social_share_point_settings
								set social_Name='".$_POST['social_Name'][$i]."',
								point='".$_POST['point'][$i]."'
								 WHERE social_share_point_setting_id='".$_POST['social_share_point_setting_id'][$i]."'
							 ");
		}
		
	}
	return true;
}
public function buyPoints()
{
	$data=array('user_login_id'=>$this->session->userdata('adminId'),
				'purchaseUbGoDollars'=>$this->input->post('Purachasepoint'),
				'purchaseAmount'=>$this->input->post('PurchasePrice'),
				'baseUbGoDollars'=>$this->input->post('point'),
				'basePrice'=>$this->input->post('price'),
				'transectionId'=>uniqid(),
				'transectionStatus '=>1,
				);
	if($this->db->insert('ub_dollars_purchase',$data))
	{
		$this->db->query("UPDATE ub_add_provider 
								set totalUbGoDollar=totalUbGoDollar+'".$data['purchaseUbGoDollars']."',
								remaningUbGoDollar=remaningUbGoDollar+'".$data['purchaseUbGoDollars']."'
								where user_login_id='".$data['user_login_id']."'
							"
						);
	}
	return true;
}
public function linkToHomeScreen()
{
	
	$data= array('campaignId' =>$_POST['campaignId'],
					'user_login_id'=>$_POST['user_login_id'],
					'couponId'=>$_POST['couponId'],
					'branchId'=>$_POST['branchId'],	
					'forDays'=>$_POST['forDays'],	
					'Purachasepoint'=>$_POST['Purachasepoint'],
					'startDate'=>date('Y-m-d',strtotime($_POST['startDate'])),
					'endDate'=>date('Y-m-d',strtotime($_POST['endDate']))

	 			);

	$res=$this->db->query("SELECT * FROM ub_add_provider where remaningUbGoDollar>='".$data['Purachasepoint']."' and user_login_id='".$data['user_login_id']."'")->num_rows();
	if($res==1)
	{
		$res=$this->db->query("INSERT INTO ub_home_screen set campaignId='".$data['campaignId']."',startDate='".$data['startDate']."',endDate='".$data['endDate']."'");
		$lastId=$this->db->insert_id($res);
		$this->db->query("INSERT INTO ub_featured_list_history set home_screen_id='".$lastId."',user_login_id='".$data['user_login_id']."',campaignId='".$data['campaignId']."',branchId='".$data['branchId']."',couponId='".$data['couponId']."',ubGoDollars='".$data['Purachasepoint']."',forDays='".$data['forDays']."'");
		$this->db->query("UPDATE ub_add_provider set remaningUbGoDollar=remaningUbGoDollar-'".$data['Purachasepoint']."' where user_login_id='".$data['user_login_id']."'");
		return true;
	}
	else
	{
		return false;
	}
		
}
public function generateRewardCard()
{
	if($this->session->userdata(adminId)==1)
	{
		$user_login_id=$_POST['user_login_id'];
	}
	else
	{
		$user_login_id=$this->session->userdata('adminId');
	}
	$number='RC'.strtotime(date('H:i:s'));
		$isupload=1;
		$vp1=explode('.',$_FILES["rewardCardSmallLogo"]["name"]);
		$thumfile1= basename($_FILES["rewardCardSmallLogo"]["name"]);
		$vp2=explode('.',$_FILES["rewardCardBigLogo"]["name"]);
		$thumfile2= basename($_FILES["rewardCardBigLogo"]["name"]);

		$imageFileType1 = pathinfo($thumfile1,PATHINFO_EXTENSION);
		$imageFileType2 = pathinfo($thumfile2,PATHINFO_EXTENSION);
		
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif") 
              { 
	
	               $isupload=0;
	
               }
               if($isupload==1)
		{
			 $imgName1='rewardSmallLogo_'.time().'.'.pathinfo($thumfile1, PATHINFO_EXTENSION);
			 $imgName2='rewardBigLogo_'.time().'.'.pathinfo($thumfile2, PATHINFO_EXTENSION);
		$targetpaththum1="./resources/upload/".$imgName1;
		$targetpaththum2="./resources/upload/".$imgName2;
		if (move_uploaded_file($_FILES["rewardCardSmallLogo"]["tmp_name"],$targetpaththum1) && move_uploaded_file($_FILES["rewardCardBigLogo"]["tmp_name"],$targetpaththum2) )
			{
				$data=array('user_login_id'=>$user_login_id,
				'ubGoDollars'=>$this->input->post('Purachasepoint'),
				'actualDollar'=>$this->input->post('PurchasePrice'),
				'rewardCardNumber'=>$number,
				'rewardCardSmallLogo'=>$imgName1,
				'rewardCardBigLogo'=>$imgName2,
				'rewardCardQuantity'=>$_POST['rewardCardQuantity'],
				'expireDate'=>date('Y-m-d',strtotime($_POST['expireDate'])),
				'branchId'=>$this->input->post('branchId')
				
				);
			}
	   }

	
	

	$res=$this->db->query("SELECT * FROM ub_add_provider 
							where user_login_id='".$data['user_login_id']."' and remaningUbGoDollar > '".($data['ubGoDollars']*$data['rewardCardQuantity'])."' 
						")->num_rows();
if($res==1)
{


	if($this->db->insert('ub_rewards_cards',$data))
	{
		$this->db->query("UPDATE ub_add_provider 
								set 
								remaningUbGoDollar=remaningUbGoDollar-'".($data['ubGoDollars']*$data['rewardCardQuantity'])."'
								where user_login_id='".$data['user_login_id']."'
							"
						);
	}

	return true;
}
else
{

	return false;
}
}
public function editRewardCard()
{
	$isupload=1;
	if($this->session->userdata(adminId)==1)
	{
		$user_login_id=$_POST['user_login_id'];
	}
	else
	{
		$user_login_id=$this->session->userdata('adminId');
	}
	

	if(empty($_FILES["rewardCardSmallLogo"]["name"]) AND empty($_FILES["rewardCardBigLogo"]["name"]))
	{
		$data=array('user_login_id'=>$user_login_id,
				'ubGoDollars'=>$this->input->post('Purachasepoint'),
				'actualDollar'=>$this->input->post('PurchasePrice'),
				'rewardCardQuantity'=>$_POST['rewardCardQuantity'],
				'expireDate'=>date('Y-m-d',strtotime($_POST['expireDate'])),
				'branchId'=>$this->input->post('branchId')
				
				);
	}
	else
	{
		if(empty($_FILES["rewardCardSmallLogo"]["name"]))
		{
			$vp=explode('.',$_FILES["rewardCardBigLogo"]["name"]);
		$thumfile= basename($_FILES["rewardCardBigLogo"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='rewardBigLogo_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;
			if (move_uploaded_file($_FILES["rewardCardBigLogo"]["tmp_name"],$targetpaththum))
			{
				$data=array('user_login_id'=>$user_login_id,
				'ubGoDollars'=>$this->input->post('Purachasepoint'),
				'actualDollar'=>$this->input->post('PurchasePrice'),
				'rewardCardQuantity'=>$_POST['rewardCardQuantity'],
				'rewardCardBigLogo'=>$imgName,
				'expireDate'=>date('Y-m-d',strtotime($_POST['expireDate'])),
				'branchId'=>$this->input->post('branchId')
				
				);
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
			$vp=explode('.',$_FILES["rewardCardSmallLogo"]["name"]);
		$thumfile= basename($_FILES["rewardCardSmallLogo"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='rewardSmallLogo_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;
			if (move_uploaded_file($_FILES["rewardCardSmallLogo"]["tmp_name"],$targetpaththum))
			{
				$data=array('user_login_id'=>$user_login_id,
				'ubGoDollars'=>$this->input->post('Purachasepoint'),
				'actualDollar'=>$this->input->post('PurchasePrice'),
				'rewardCardQuantity'=>$_POST['rewardCardQuantity'],
				'rewardCardSmallLogo'=>$imgName,
				'expireDate'=>date('Y-m-d',strtotime($_POST['expireDate'])),
				'branchId'=>$this->input->post('branchId')
				
				);
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
	}

	if(!empty($_FILES["rewardCardSmallLogo"]["name"]) AND !empty($_FILES["rewardCardBigLogo"]["name"]))
	{
		
			$vp1=explode('.',$_FILES["rewardCardSmallLogo"]["name"]);
		$thumfile1= basename($_FILES["rewardCardSmallLogo"]["name"]);
		$vp2=explode('.',$_FILES["rewardCardBigLogo"]["name"]);
		$thumfile2= basename($_FILES["rewardCardBigLogo"]["name"]);

		$imageFileType1 = pathinfo($thumfile1,PATHINFO_EXTENSION);
		$imageFileType2 = pathinfo($thumfile2,PATHINFO_EXTENSION);
		
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif") 
              { 
	
	               $isupload=0;
	
               }
               if($isupload==1)
		{
			 $imgName1='rewardSmallLogo_'.time().'.'.pathinfo($thumfile1, PATHINFO_EXTENSION);
			 $imgName2='rewardBigLogo_'.time().'.'.pathinfo($thumfile2, PATHINFO_EXTENSION);
		$targetpaththum1="./resources/upload/".$imgName1;
		$targetpaththum2="./resources/upload/".$imgName2;
		if (move_uploaded_file($_FILES["rewardCardSmallLogo"]["tmp_name"],$targetpaththum1) && move_uploaded_file($_FILES["rewardCardBigLogo"]["tmp_name"],$targetpaththum2) )
			{
				$data=array('user_login_id'=>$user_login_id,
				'ubGoDollars'=>$this->input->post('Purachasepoint'),
				'actualDollar'=>$this->input->post('PurchasePrice'),
				'rewardCardNumber'=>$number,
				'rewardCardSmallLogo'=>$imgName1,
				'rewardCardBigLogo'=>$imgName2,
				'rewardCardQuantity'=>$_POST['rewardCardQuantity'],
				'expireDate'=>date('Y-m-d',strtotime($_POST['expireDate'])),
				'branchId'=>$this->input->post('branchId')
				
				);
			}
	   }
		
	}
	
	

$ubReward=$this->db->query("SELECT * from ub_rewards_cards where rewardsId='".$_POST['reward_id']."'")->result();


$resUbreward=($ubReward[0]->ubGoDollars*$ubReward[0]->rewardCardQuantity)-($data['ubGoDollars']*$data['rewardCardQuantity']);
$res=$this->db->query("SELECT * FROM ub_add_provider 
							where user_login_id='".$data['user_login_id']."' and remaningUbGoDollar > '".$resUbreward."' 
						")->num_rows();
if($res==0)
{
	return "10";
}
else
{
	$this->db->where('rewardsId', $_POST['reward_id']);
	if($this->db->update('ub_rewards_cards',$data))
	{
		$this->db->query("UPDATE ub_add_provider 
								set 
								remaningUbGoDollar=remaningUbGoDollar+'".($resUbreward)."'
								where user_login_id='".$data['user_login_id']."'
							"
						);
	}

	return "1";
}

     

}



public function deleteRewardCard()
{
	
	
$ubReward=$this->db->query("SELECT * from ub_rewards_cards where rewardsId='".$_REQUEST['reward_id']."'")->result();
$resUbreward=($ubReward[0]->ubGoDollars)*$ubReward[0]->rewardCardQuantity;
     $this->db->where('rewardsId', $_REQUEST['reward_id']);
	if($this->db->delete('ub_rewards_cards'))
	{
		$this->db->query("UPDATE ub_add_provider 
								set 
								remaningUbGoDollar=remaningUbGoDollar+'".($resUbreward)."'
								where user_login_id='".$this->session->userdata('adminId')."'
							"
						);
	}

	return true;
}





public function addCompaignData()
{
	$txt="";
	if($_POST['serviceType']==2)
	{
		$txt=$this->input->post('emailText');
	}
	if($_POST['serviceType']==3)
	{
		$txt=$this->input->post('smsText');
	}
	$data=array('couponId'=>$this->input->post('couponId'),
				'startDate'=>date('Y-m-d',strtotime($this->input->post('startDate'))),
				'endDate'=>date('Y-m-d',strtotime($this->input->post('endDate'))),
				'serviceType'=>$this->input->post('serviceType'),
				'areaOfIntrest'=>implode(',',$this->input->post('areaOfIntrest')),
				'texts'=>addslashes($txt),
				'location'=>$this->input->post('location'),
				'lat'=>$this->input->post('lat'),
				'lng'=>$this->input->post('lng'),
				'fromTime'=>$this->input->post('fromTime'),
				'toTime'=>$this->input->post('toTime'),
				'max_price_per_day'=>$this->input->post('max_price_per_day'),
				'time_range'=>$this->input->post('time_range'),
				'radius'=>$this->input->post('radius')
				);

	$email=$this->db->query("SELECT * FROM ub_login as ul JOIN ub_coupon as uc on uc.ownerId=ul.user_login_id where uc.couponId='".$data['couponId']."'")->row_array();
	
	if($_POST['campaignId']=='')
	{
		
		
	$this->db->query("INSERT INTO ub_campaign set couponId='".$data['couponId']."',startDate='".$data['startDate']."',endDate='".$data['endDate']."',max_price_per_day='".$data['max_price_per_day']."',areaOfIntrest='".$data['areaOfIntrest']."',useValue='".$data['time_range']."',serviceType='".$data['serviceType']."',text='".$data['texts']."'");
	$lastId=$this->db->insert_id();
	
	for($i=0;$i<count($data['location']);$i++)
	{
		
		$this->db->query("INSERT INTO ub_campaign_location set campaignId='".$lastId."',location='".addslashes($data['location'][$i])."',radius='".$data['radius'][$i]."',lat='".$data['lat'][$i]."',lng='".$data['lng'][$i]."'");
		$lastId1=$this->db->insert_id();
		for($k=0;$k<count($data['fromTime'][$i]);$k++)
		{
			
			$this->db->query("INSERT INTO ub_campaign_time set campaign_data_id='".$lastId1."',fromTime='".$data['fromTime'][$i][$k]."',toTime='".$data['toTime'][$i][$k]."'");
		}
	}
	// $this->db->insert('ub_campaign',$data);
	 $this->db->query("UPDATE ub_coupon set campaign_status=1 where couponId='".$data['couponId']."'");

	 $msg=array('message'=>'Your Campaign Has Been Created',"email"=>$email['user_email'],"subject"=>"New Campaign");

			$this->sendEmailByActivity($msg);
		
	 }
	 else
	 {
	

	 	$this->db->query("UPDATE ub_campaign set couponId='".$data['couponId']."',startDate='".$data['startDate']."',endDate='".$data['endDate']."',max_price_per_day='".$data['max_price_per_day']."',areaOfIntrest='".$data['areaOfIntrest']."',useValue='".$data['time_range']."',serviceType='".$data['serviceType']."',text='".$data['texts']."' where campaignId='".$_POST['campaignId']."'");
	 	$res=$this->db->query("SELECT * FROM ub_campaign_location where campaignId='".$_POST['campaignId']."'")->result();
	 	$loc=count($data['location']);
	 	$rescount=count($res);
	 	for($i=0;$i<$loc;$i++)
			{
				if($loc<=$rescount)
				{
					$this->db->query("UPDATE ub_campaign_location set location='".addslashes($data['location'][$i])."',radius='".$data['radius'][$i]."',lat='".$data['lat'][$i]."',lng='".$data['lng'][$i]."' where campaign_data_id='".$res[$i]->campaign_data_id."' ");

					    $this->db->query("DELETE FROM ub_campaign_time where campaign_data_id='".$res[$i]->campaign_data_id."'");

					    for($k=0;$k<count($data['fromTime'][$i]);$k++)
							{

							$this->db->query("INSERT INTO ub_campaign_time set campaign_data_id='".$res[$i]->campaign_data_id."',fromTime='".$data['fromTime'][$i][$k]."',toTime='".$data['toTime'][$i][$k]."'");
							}

				}
				else
				{
					if($i<$rescount)
					{
						$this->db->query("UPDATE ub_campaign_location set location='".addslashes($data['location'][$i])."',radius='".$data['radius'][$i]."',lat='".$data['lat'][$i]."',lng='".$data['lng'][$i]."' where campaign_data_id='".$res[$i]->campaign_data_id."' ");

						$this->db->query("DELETE FROM ub_campaign_time where campaign_data_id='".$res[$i]->campaign_data_id."'");
					    
					    for($k=0;$k<count($data['fromTime'][$i]);$k++)
							{

							$this->db->query("INSERT INTO ub_campaign_time set campaign_data_id='".$res[$i]->campaign_data_id."',fromTime='".$data['fromTime'][$i][$k]."',toTime='".$data['toTime'][$i][$k]."'");
							}

					}
					else
					{
						$this->db->query("INSERT INTO ub_campaign_location set campaignId='".$_POST['campaignId']."',location='".addslashes($data['location'][$i])."',radius='".$data['radius'][$i]."',lat='".$data['lat'][$i]."',lng='".$data['lng'][$i]."'");

						$lastId=$this->db->insert_id();
					    
					    for($k=0;$k<count($data['fromTime'][$i]);$k++)
							{

							$this->db->query("INSERT INTO ub_campaign_time set campaign_data_id='".$lastId."',fromTime='".$data['fromTime'][$i][$k]."',toTime='".$data['toTime'][$i][$k]."'");
							}
					}
					
				}
				
			}
			if($i<$rescount-1)
			{
				for($j=$i;$j<$rescount;$j++)
				{
					$this->db->query("DELETE  FROM ub_campaign_location where campaign_data_id='".$res[$j]->campaign_data_id."' ");
				}
				
			}
			$msg=array('message'=>'Your Campaign Has Been Updated',"email"=>$email['user_email'],"subject"=>"Campaign Updated");

			$this->sendEmailByActivity($msg);
	 }
	return true;
}
public function addCategoryData()
{
	$isupload=1;
	$data=array('category_name'=>$this->input->post('category_name'),'colorCode'=>$this->input->post('color_code'));
	if($_POST['category_id']=='')
	{
		for($i=0;$i<count($data['category_name']);$i++)
			{

				$vp=explode('.',$_FILES["icon"]["name"][$i]);
		$thumfile= basename($_FILES["icon"]["name"][$i]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "png") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='catIcon_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;

		if (move_uploaded_file($_FILES["icon"]["tmp_name"][$i],$targetpaththum)) 
		{
      	$this->db->query("INSERT INTO ub_category set category_name='".$data['category_name'][$i]."',colorCode='".$data['colorCode'][$i]."',icon='".$imgName."'");
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
	}
	else
	{
		if(empty($_FILES['icon']['name']))
		{
			$this->db->query("UPDATE ub_category set category_name='".$data['category_name']."',colorCode='".$data['colorCode']."' where category_id='".$_POST['category_id']."'");
		}
		else
		{
				$vp=explode('.',$_FILES["icon"]["name"]);
		$thumfile= basename($_FILES["icon"]["name"]);

		$imageFileType1 = pathinfo($thumfile,PATHINFO_EXTENSION);
		// $ext = array('ext' => $_FILES["add_img"]["name"]);
		//  $this->session->set_userdata($ext);
		if($imageFileType1 != "png") 
              { 
	
	               $isupload=0;
	
               }
		if($isupload==1)
		{
			 $imgName='catIcon_'.time().'.'.pathinfo($thumfile, PATHINFO_EXTENSION);
		$targetpaththum="./resources/upload/".$imgName;

		if (move_uploaded_file($_FILES["icon"]["tmp_name"],$targetpaththum)) 
		{
      	$this->db->query("UPDATE ub_category set category_name='".$data['category_name']."',colorCode='".$data['colorCode']."',icon='".$imgName."' where category_id='".$_POST['category_id']."'");
		 return true;
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

		
	}
	
	return true;
}
public function locationListForTiming()
{
	return $this->db->query("SELECT * FROM ub_campaign_location where campaignId='".$_REQUEST['campaignId']."'")->result();
}
public function timeData()
{
	return $this->db->query("SELECT * FROM ub_campaign_time where campaign_data_id='".$_REQUEST['campaign_data_id']."'")->result();
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
