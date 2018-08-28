<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ordertrack extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('Admin_login');
$this->load->model('Services');
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
	    $data['page_title']="Order List";
		$data['heading']="Order List";
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
		$this->load->view('order/orderList');
		$this->load->view('include/footer');
}

public function remaningUbGoDollarList()
{
	    $data['page_title']="Remaning UbGo Dollar List";
		$data['heading']="Remaning UbGo Dollar List";
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
		$this->load->view('order/remaningUbGoDollarList');
		$this->load->view('include/footer');
}

public function homeScreenOrderTrack()
{
	    $data['page_title']="Home Screen Order List";
		$data['heading']="Home Screen Order List";
		if($this->session->userdata('adminType')=='1')
		{
			$data['userList']=$this->Services->userList();
		}
		else
		{
			$data['branchList']=$this->Services->branchListForCouponAdd($this->session->userdata('adminId'));
		}
		
		$data['adminName']=$this->session->userdata('adminName');
		//$data['result']=$this->Services->dollerVsPoint();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('order/homeScreenOrderTrack');
		$this->load->view('include/footer');
}



public function orderListAjax()
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
        $count_rows = $this->Services->count_orderList($condition);
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
        $records = $this->Services->orderList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = '$'.$singleRow->purchaseAmount;
            $temp[] =$singleRow->purchaseUbGoDollars;
            $temp[] = $singleRow->transectionDate;
            
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function homeScreenOrderTrackAjax()
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
        $count_rows = $this->Services->count_homeScreenOrderTrack($condition);
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
        $records = $this->Services->homeScreenOrderTrack($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = $singleRow->couponCode;
            $temp[] = '$'.$singleRow->ubGoDollars/$singleRow->forDays.' X '.$singleRow->forDays.' = $'.$singleRow->ubGoDollars;
            $temp[] = $singleRow->forDays;
            $temp[] = $singleRow->recordDate;
            
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

public function remaningUbGoDollarListAjax()
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
        $count_rows = $this->Services->count_remaningUbGoDollarList($condition);
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
        $records = $this->Services->remaningUbGoDollarList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = '$'.$singleRow->remaningUbGoDollar;
           
            
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}


################################## end  #########################
}
