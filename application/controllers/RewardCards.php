<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RewardCards extends CI_Controller {
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
public function index()
{
	    $data['page_title']="Generate Reward Card";
		$data['heading']="Generate Reward Card";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->dollerVsPoint();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('reward/generateRewardCard');
		$this->load->view('include/footer');
}

public function editRewardCardPage()
{
	    $data['page_title']="Edit Reward Card";
		$data['heading']="Edit Reward Card";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->dollerVsPoint();
		$data['result1']=$this->Services->editReward();
		//print_r($data['result1']);
		$data['branchList']=$this->Services->branchListForCouponAdd($data['result1'][0]->user_login_id);
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('reward/editRewardCardPage');
		$this->load->view('include/footer');
}

public function generateRewardCard()
{
	$result=$this->Services->generateRewardCard();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Congratulations ! You Have Generated Reward Cards SuccessFully.
              </div>');
			redirect('rewardCards/rewardCardsList');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! You Have Insufficient Bal Please Check Your Balance And Buy Or Server Error.
              </div>');
	}
	redirect('rewardCards','refresh');
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
			redirect('rewardCards/rewardCardsList','refresh');
	}
	else if($result=="2")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Image Upload Error.
              </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
else if($result=="3")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Image File Format Not Supported.
              </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
else if($result=="10")
{ 
	$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! You Have Insufficient Bal Please Check Your Balance And Buy Or Server Error.
              </div>');
	redirect($_SERVER['HTTP_REFERER']);
}

	
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
                Error ..! .
              </div>');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function rewardCardsList()
{
	    $data['page_title']="Reward Cards List";
		$data['heading2']="Reward Cards List";
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
		$this->load->view('reward/rewardCardsList');
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



public function rewardCardListAjax()
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
        $count_rows = $this->Services->count_rewardCardsList($condition);
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
        $records = $this->Services->rewardCardsList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	if($singleRow->expireDate < date('Y-m-d'))
        	{
        		$btn='<button class="btn btn-danger">Expired</button>';
        	}
        	else
        	{
        		$btn="";
        	}
        	if($singleRow->rewardUseStatus>0)
        	{
        		$src='<button class="btn btn-success">Used</button>';
        	}
        	else
        	{
        		$src='<a href="'.base_url('rewardCards/editRewardCardPage?reward_id=').$singleRow->rewardsId.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.base_url('rewardCards/deleteRewardCard?reward_id=').$singleRow->rewardsId.'" onclick="return checks()"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete Record"></i></a> <em> Unused You Can Edit</em>';
        	}
        	
            $temp = array();

            $temp[] = $sr_no++;
            $temp[] = $singleRow->branch_name;
            $temp[] = '$'.$singleRow->actualDollar;
            $temp[] =$singleRow->ubGoDollars;
            $temp[] = $singleRow->rewardCardQuantity;
            $temp[] = $singleRow->rewardCardQuantity-$singleRow->rewardUseStatus;
            $temp[] = $singleRow->rewardCardNumber;
            $temp[] = $singleRow->expireDate.' '.$btn;
            $temp[] = $src;
            
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}


public function redeemRewardCardListAjax()
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
        $count_rows = $this->Services->count_redeemRewardCardList($condition);
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
        $records = $this->Services->redeemRewardCardList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->rewardCardNumber;
            $temp[] =$singleRow->redeemDate;
            $temp[] = $singleRow->user_full_name;
            $temp[] = '';
           
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

################################## end  #########################
}
