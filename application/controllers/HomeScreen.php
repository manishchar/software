<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeScreen extends CI_Controller {
public function __construct()
{
parent::__construct();

error_reporting(1);
if($this->session->userdata('adminId')=="")
{
//redirect(base_url().'Login'); 
redirect('Login'); 
//echo "hello";
}
}


public function linkCampgainToHomeScreen()
{
	    $data['page_title']="Add Campaign Into HomeScreen";
		$data['heading']="Add Campaign Into HomeScreen";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result3']=$this->Services->ubgoDollarSettingHomeScreen();
		$data['result']=$this->Services->couponDetailsForCampaign();
        $data['result1']=$this->Services->editCampaign();
		//print_r($data['result1']);
		$data['branchList']=$this->Services->branchListForCouponAdd($data['result1'][0]->user_login_id);
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('homescreen/linkCampgainToHomeScreen');
		$this->load->view('include/footer');
}

public function linkToHomeScreen()
{
	$result=$this->Services->linkToHomeScreen();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Congratulations ! You Have SuccessFully Added.
              </div>');
            redirect('homeScreen/campaignListForHomeScreen','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! You Have Insufficient Bal Please Check Your Balance And Buy Or Server Error.
              </div>');
        redirect($_SERVER['HTTP_REFERER']);
	}
	
}

public function editRewardCard()
{
	$result=$this->Services->editRewardCard();
	if($result=="1")
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Congratulations ! You Have Generated Reward Cards SuccessFully.
              </div>');
	}
	else if($result=="2")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Image Upload Error.
              </div>');
	}
else if($result=="2")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Image File Format Not Supported.
              </div>');
	}
else if($result=="10")
{ 
	$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! You Have Insufficient Bal Please Check Your Balance And Buy Or Server Error.
              </div>');
}

	redirect($_SERVER['HTTP_REFERER']);
}

public function deleteRewardCard()
{
	$result=$this->Services->deleteRewardCard();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Congratulations ! You Have Deleted Reward Cards SuccessFully.
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..!
              </div>');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function campaignListForHomeScreen()
{
	    $data['page_title']="Campaign List For HomeScreen";
		$data['heading2']="Campaign List For HomeScreen";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		// $data['result']=$this->Services->ub_rewards_cards();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('homescreen/campaignListForHomeScreen');
		$this->load->view('include/footer');
}
public function homeScreenList()
{
        $data['page_title']="Home Screen List";
        $data['heading2']="Home Screen List";
        if($this->session->userdata('adminType')=='1')
        {
            $data['userList']=$this->Services->userList();
        }
        else
        {
            $data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
        }
        
        $data['adminName']=$this->session->userdata('adminName');
        // $data['result']=$this->Services->ub_rewards_cards();
        $this->load->view('include/header',$data);
        $this->load->view('include/side_menu');
        $this->load->view('homescreen/homeScreenList');
        $this->load->view('include/footer');
}


public function redeemedRewardCardList()
{
	    $data['page_title']="Redeemed Reward Card List";
		$data['heading2']="Redeemed Reward Card List";
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
		$this->load->view('reward/redeemRewardCardList');
		$this->load->view('include/footer');
}



public function campaignListForHomeScreenAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);   
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_login_id","deals.ownerId","deals.optionRate","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
            if(!empty($getdata['sSearch_'.$i])){
                    $condition[$column_array[$i]] = $getdata['sSearch_'.$i];
                }
        }
        //print_r($condition);
        $count_rows = $this->Services->count_campaignListForHomeScreen($condition);
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
        $records = $this->Services->campaignListForHomeScreen($condition,$offset,$noofrow,$sort_column,$sort_type);
        
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
            if($singleRow->campaignId!=$singleRow->cId)
            {
                $src1='<a href="'.base_url('homeScreen/linkCampgainToHomeScreen').'?couponId='.$singleRow->couponId.'&campaignId='.$singleRow->campaignId.'"><span class="glyphicon glyphicon-link" data-toggle="tooltip" title="" data-original-title="Link To HomeScreen"></span></a>';
            }
            else
            {
                $src1='<span style="background:green;color:#fff;padding:5px">Linked To HomeScreen</span>';
            }
            
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
            $temp[] =$src1; 
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}


public function homeScreenListAjax()
{

       $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);   
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_login_id","deals.branchId","deals.optionRate","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
            if(!empty($getdata['sSearch_'.$i])){
                    $condition[$column_array[$i]] = $getdata['sSearch_'.$i];
                }
        }
        //print_r($condition);
        $count_rows = $this->Services->count_homeScreenList($condition);
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
        $records = $this->Services->homeScreenList($condition,$offset,$noofrow,$sort_column,$sort_type);
        
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
           // $temp[] = '<a href="'.$src1.'"><span class="glyphicon glyphicon-link" data-toggle="tooltip" title="" data-original-title="Link To HomeScreen"></span></a>';
             $temp[] = '';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

################################## end  #########################
}
