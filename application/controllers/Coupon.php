<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coupon extends CI_Controller {
public function __construct()
{
parent::__construct();

error_reporting(0);
if($this->session->userdata('adminId')=="")
{
//redirect(base_url().'Login'); 
redirect('Login'); 
//echo "hello";
}

}

public function index()
{
	    $data['page_title']="Add Coupon";
		$data['heading']="Add Coupon";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/addCoupon');
		$this->load->view('include/footer');
}

public function uploadZipCoupon()
{
	    $data['page_title']="Add Coupon";
		$data['heading']="Add Coupon";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/uploadZipCoupon');
		$this->load->view('include/footer');
}

public function testImg()
{
	$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/testImg');
		$this->load->view('include/footer');
}

public function addCampaign()
{
	    $data['page_title']="Add Campaign";
		$data['heading']="Add Campaign";
		$data['result']=$this->Services->couponDetailsForCampaign();
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/campaign');
		$this->load->view('include/footer');
}

public function addCompaignData()
{


	$result=$this->Services->addCompaignData();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Created Successfully
              </div>');
			redirect('coupon/couponList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Does Not Created
              </div>');
		//redirect();
	}
	redirect($_SERVER['HTTP_REFERER']);
	
}

public function editCouponPage()
{
	    $data['page_title']="Edit Coupon";
		$data['heading']="Edit Coupon";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		$data['result']=$this->Services->editCoupon();
		
		$data['result1']=$this->Services->branchListForCouponAdd($data['result'][0]->user_login_id);
		$data['adminName']=$this->session->userdata('adminName');

		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/editCoupon');
		$this->load->view('include/footer');
}

public function viewCouponPage()
{
	    $data['page_title']="View Coupon";
		$data['heading']="View Coupon";
		$data['result']=$this->Services->editCoupon();
		$data['result1']=$this->Services->branchListForCouponAdd($data['result'][0]->user_login_id);
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/viewCoupon');
		$this->load->view('include/footer');
}

public function editCampaignPage()
{
	    $data['page_title']="Edit Campaign";
		$data['heading']="Edit Campaign";
		$data['result']=$this->Services->couponDetailsForCampaign();
		$data['result1']=$this->Services->editCampaign();
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/editCampaignPage');
		$this->load->view('include/footer');
}

public function viewCampaignPage()
{
	    $data['page_title']="View Campaign";
		$data['heading']="Viw Campaign";
		$data['result']=$this->Services->couponDetailsForCampaign();
		$data['result1']=$this->Services->editCampaign();
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/viewCampaignPage');
		$this->load->view('include/footer');
}

public function addCoupon()
{
	$result=$this->Services->addCoupon();
	if($result==1)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Coupon Created Successfully
              </div>');
		redirect('coupon/couponList','refresh');
	}
	else
	{
		if($result==2)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                File Format Not Supported
              </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($result==3)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Image Upload Error
              </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
}

	//redirect('coupon/couponList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}

public function uploadCouponFile()
{
	$result=$this->Services->uploadCouponFile();
	if($result==1)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Coupon Created Successfully
              </div>');
		redirect('coupon/couponList','refresh');
	}
	else
	{
		if($result==2)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                File Format Not Supported
              </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		// if($result==3)
		// {
		// 	$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
  //               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  //               <h4><i class="icon fa fa-check"></i> Alert!</h4>
  //               Image Upload Error
  //             </div>');
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }
}

	//redirect('coupon/couponList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}

public function editCoupon()
{
	$result=$this->Services->addCoupon();
	if($result==1)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Coupon Created Successfully
              </div>');
		redirect('coupon/couponList','refresh');
	}
	else
	{
		if($result==2)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Image Upload Error
              </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($result==3)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                File Format Not Supported
              </div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		

			
	}

	//redirect('coupon/couponList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon/couponList','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}

public function editCampaign()
{
	//print_r($_SERVER['HTTP_REFERER']);
	$result=$this->Services->addCompaignData();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Created Successfully
              </div>');
			redirect('coupon/campaignList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Does Not Created..!! Beacause Of Other Business Runs Between These Date And Radius.
              </div>');
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}

	
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon/couponList','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}


public function deleteCoupon()
{
	$result=$this->Services->deleteCoupon();
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Coupon Deleted Successfully
              </div>');
	}
	else
	{
		
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Coupon Delete error.
              </div>');

			
	}
	redirect($_SERVER['HTTP_REFERER']);
	//redirect('coupon/couponList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon/couponList','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}

public function deleteCampaign()
{
	$result=$this->Services->deleteCampaign();
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Deleted Successfully
              </div>');
	}
	else
	{
		
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Campaign Delete error.
              </div>');

			
	}
	redirect($_SERVER['HTTP_REFERER']);
	//redirect('coupon/campaignList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon/couponList','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}


public function couponList()
{
	    $data['page_title']="Coupon List";
		$data['heading2']="Coupon List";
		
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/couponList');
		$this->load->view('include/footer');
}

public function redeemedCouponList()
{
	    $data['page_title']="Redeemed Coupon List";
		$data['heading2']="Redeemed Coupon List";
		$data['adminName']=$this->session->userdata('adminName');
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/redeemCouponList');
		$this->load->view('include/footer');
}

public function viewedCouponList()
{
	    $data['page_title']="View Coupon List";
		$data['heading2']="View Coupon List";
		$data['adminName']=$this->session->userdata('adminName');
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/viewedCouponList');
		$this->load->view('include/footer');
}

public function sharedCouponList()
{
	    $data['page_title']="Shared Coupon List";
		$data['heading2']="Shared Coupon List";
		$data['adminName']=$this->session->userdata('adminName');
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/sharedCouponList');
		$this->load->view('include/footer');
}

public function campaignList()
{
	    $data['page_title']="Campaign List";
		$data['heading2']="Campaign List";
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/campaignList');
		$this->load->view('include/footer');
}
public function locationListForTiming()
{
	    $data['page_title']="Location List";
		$data['heading']="Location List";
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->locationListForTiming();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/locationListForTiming');
		$this->load->view('include/footer');
}

public function addTiming()
{
	    $data['page_title']="Add Timing";
		$data['heading']="Add Timing";
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->timeData();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/addTiming');
		$this->load->view('include/footer');
}



public function addLocationTiming()
{
	$result=$this->Services->addLocationTiming();
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Location Added Successfully
              </div>');
	}
	else
	{
		
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Location Added error.
              </div>');

			
	}
	redirect($_SERVER['HTTP_REFERER']);
	//redirect('coupon/campaignList','refresh');
}
public function resturantListForCoupon()
{
	$result = $this->Services->branchListForCouponAdd($_REQUEST['user_login_id']);
	$opt='<option value="">Select</option>';
	foreach ($result as $row) 
	{
		$opt.='<option value="'.$row->id.'">'.$row->branch_name.'</option>';
	}
	echo $opt;

}

public function couponListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_full_name","deals.couponCode","deals.couponType","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_couponList($condition);
        //print_r($count_rows);
        $response_array['iTotalRecords']=$count_rows;
        $response_array['iTotalDisplayRecords']=$count_rows;
        $response_array['aaData']=array();

		// Limit
		$offset = $getdata['iDisplayStart'];
		$noofrow = $getdata['iDisplayLength'];
		
		// Sorting
		$sort_column = "";
		if(!empty($getdata['iSortCol_0'])){
			$sort_column = $column_array[$getdata['iSortCol_0']-1];
		}
		$sort_type = "";
		if(!empty($getdata['sSortDir_0'])){
			$sort_type = $getdata['sSortDir_0'];
		}

        $sr_no = $offset+1;
        $records = $this->Services->couponList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	if($singleRow->couponUse==1)
        	{
        		$type="One Time Use";
        	}
        	else
        	{
        		$type="Multiple Time Use";
        	}
        	if($singleRow->couponType==1)
        	{
        		$opt="Flat";
        	}
        	else
        	{
        		$opt="Percentage";
        	}
        	if($singleRow->campaign_status==1)
        	{
        		$src1='<span style="background:green;color:#fff;padding:5px">Used In Campaign</span> | <a href="'.base_url('coupon/viewCouponPage').'?couponId='.$singleRow->couponId.'&view=true"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View" ></span></a>';
        		// $src2="#";
        		// $src3="#";
        		$dis="disabled";
        		$del="";
        	}
        	else
        	{
        		$dis="";
        		//$del='onclick="return checks()"';
        		$src1='<a href="'.base_url('coupon/editCouponPage').'?couponId='.$singleRow->couponId.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.base_url('coupon/deleteCoupon').'?couponId='.$singleRow->couponId.'" onclick="return checks()"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete Record"></i></a> | <a href="'.base_url('coupon/addCampaign').'?couponId='.$singleRow->couponId.'" ><span class="glyphicon glyphicon-link" data-toggle="tooltip" title="Link To Campaign" ></span></a> | <a href="'.base_url('coupon/viewCouponPage').'?couponId='.$singleRow->couponId.'&view=true"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View" ></span></a>';
        		// $src2=base_url('coupon/deleteCoupon').'?couponId='.$singleRow->couponId;
        		// $src3=base_url('coupon/addCampaign').'?couponId='.$singleRow->couponId;
        		
        	}
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = $singleRow->couponCode;
            $temp[] =$type;
            $temp[] =$opt;
            $temp[] =$singleRow->optionRate;
            $temp[] =$singleRow->couponTitle;
            $temp[] = $src1 .'';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function campaignListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_full_name","deals.couponCode","deals.optionRate","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_campaignList($condition);
        //print_r($count_rows);
        $response_array['iTotalRecords']=$count_rows;
        $response_array['iTotalDisplayRecords']=$count_rows;
        $response_array['aaData']=array();

		// Limit
		$offset = $getdata['iDisplayStart'];
		$noofrow = $getdata['iDisplayLength'];
		
		// Sorting
		$sort_column = "";
		if(!empty($getdata['iSortCol_0'])){
			$sort_column = $column_array[$getdata['iSortCol_0']-1];
		}
		$sort_type = "";
		if(!empty($getdata['sSortDir_0'])){
			$sort_type = $getdata['sSortDir_0'];
		}

        $sr_no = $offset+1;
        $records = $this->Services->campaignList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	if($singleRow->couponUse==1)
        	{
        		$type="One Time Use";
        	}
        	else
        	{
        		$type="Multiple Time Use";
        	}
        	if($singleRow->couponType==1)
        	{
        		$opt="Flat";
        	}
        	else
        	{
        		$opt="Percentage";
        	}
        	
        	$src1=base_url('coupon/editCampaignPage').'?couponId='.$singleRow->couponId.'&campaignId='.$singleRow->campaignId;
        		$src2=base_url('coupon/deleteCampaign').'?couponId='.$singleRow->couponId.'&campaignId='.$singleRow->campaignId;
        		$src3=base_url('coupon/viewCampaignPage').'?couponId='.$singleRow->couponId.'&campaignId='.$singleRow->campaignId.'&view=ture';
        		$src4=base_url('coupon/locationListForTiming').'?couponId='.$singleRow->couponId.'&campaignId='.$singleRow->campaignId.'&view=ture';
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = $singleRow->couponCode;
            $temp[] =$type;
            $temp[] =$opt;
            $temp[] =$singleRow->optionRate;
            $temp[] =date('d-m-Y',strtotime($singleRow->startDate));
            $temp[] =date('d-m-Y',strtotime($singleRow->endDate));
            // $temp[] ='<img src="'.base_url('resources/coupon/'.$singleRow->couponTemplate1).'"  style="width:100px;height:100px">';
            $temp[] = '<a href="'.$src1.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.$src2.'" onclick="return checks()"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete Record"></i></a> | <a href="'.$src3.'"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="View" ></span></a> ';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function redeemListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_login_id","deals.branchId","deals.couponCode","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
       // print_r($condition);
        $count_rows = $this->Services->count_redeemList($condition);
        //print_r($count_rows);
        $response_array['iTotalRecords']=$count_rows;
        $response_array['iTotalDisplayRecords']=$count_rows;
        $response_array['aaData']=array();

		// Limit
		$offset = $getdata['iDisplayStart'];
		$noofrow = $getdata['iDisplayLength'];
		
		// Sorting
		$sort_column = "";
		if(!empty($getdata['iSortCol_0'])){
			$sort_column = $column_array[$getdata['iSortCol_0']-1];
		}
		$sort_type = "";
		if(!empty($getdata['sSortDir_0'])){
			$sort_type = $getdata['sSortDir_0'];
		}

        $sr_no = $offset+1;
        $records = $this->Services->redeemList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->couponCode;
            $temp[] =$singleRow->redeemDate;
            $temp[] = $singleRow->user_full_name;
            $temp[] = '';
          
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function viewCouponListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_login_id","deals.branchId","deals.couponCode","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_viewedCouponList($condition);
        //print_r($count_rows);
        $response_array['iTotalRecords']=$count_rows;
        $response_array['iTotalDisplayRecords']=$count_rows;
        $response_array['aaData']=array();

		// Limit
		$offset = $getdata['iDisplayStart'];
		$noofrow = $getdata['iDisplayLength'];
		
		// Sorting
		$sort_column = "";
		if(!empty($getdata['iSortCol_0'])){
			$sort_column = $column_array[$getdata['iSortCol_0']-1];
		}
		$sort_type = "";
		if(!empty($getdata['sSortDir_0'])){
			$sort_type = $getdata['sSortDir_0'];
		}

        $sr_no = $offset+1;
        $records = $this->Services->viewedCouponList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->couponCode;
            $temp[] =$singleRow->viewCount;
            $temp[] = $singleRow->user_full_name;
            $temp[] = '';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function sharedCouponListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_login_id","deals.branchId","deals.couponCode","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_sharedCouponList($condition);
        //print_r($count_rows);
        $response_array['iTotalRecords']=$count_rows;
        $response_array['iTotalDisplayRecords']=$count_rows;
        $response_array['aaData']=array();

		// Limit
		$offset = $getdata['iDisplayStart'];
		$noofrow = $getdata['iDisplayLength'];
		
		// Sorting
		$sort_column = "";
		if(!empty($getdata['iSortCol_0'])){
			$sort_column = $column_array[$getdata['iSortCol_0']-1];
		}
		$sort_type = "";
		if(!empty($getdata['sSortDir_0'])){
			$sort_type = $getdata['sSortDir_0'];
		}

        $sr_no = $offset+1;
        $records = $this->Services->sharedCouponList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->couponCode;
            $temp[] =$singleRow->user_full_name;
            $temp[] = $singleRow->socialPlatform;
            $temp[] = '';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}



}
?>