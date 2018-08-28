<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
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
	    $data['page_title']="Add Area Of Intrest";
		$data['heading']="Add Area Of Intrest";
		// if($this->session->userdata('adminType')=='1')
		// {
		// 	$data['userList']=$this->Services->userList();
		// }
		
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('category/addCategory');
		$this->load->view('include/footer');
}



public function addCategoryData()
{
	//print_r($_FILES);
	$result=$this->Services->addCategoryData();
	if($result=="1")
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                AOI Added Successfully
              </div>');
		redirect('category/categoryList','refresh');
	}
	else if($result=="2")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! file does not move
              </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	else if($result=="3")
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! fileformat not support
              </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}

public function editcategoryPage()
{
	    $data['page_title']="Edit Area Of Intrest";
		$data['heading']="Edit Area Of Intrest";
		$data['result']=$this->Services->editCategory();
		$data['adminName']=$this->session->userdata('adminName');

		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('category/editCategory');
		$this->load->view('include/footer');
}

public function editCategoryData()
{
	$result=$this->Services->addCategoryData();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                AOI Update Successfully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! AOI Does Not Updated
              </div>');
	}
	redirect('category/categoryList','refresh');
}

public function viewCouponPage()
{
	    $data['page_title']="View Coupon";
		$data['heading']="View Coupon";
		$data['result']=$this->Services->editCoupon();
		$data['adminName']=$this->session->userdata('adminName');

		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('coupon/viewCoupon');
		$this->load->view('include/footer');
}



public function deleteCategory()
{
	$result=$this->Services->deleteCategory();
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                AOI Deleted Successfully
              </div>');
	}
	else
	{
		
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                AOI Delete error.
              </div>');

			
	}
	redirect('category/categoryList','refresh');
	// if($this->session->userdata('adminType')==1)
	// 	{
			
	// 		redirect('coupon/couponList','refresh');
	// 	}
	// 	else
	// 	{
	// 		//redirect('admin/CreateAddBySubAdmin','refresh');
	// 	}
}



public function categoryList()
{
	    $data['page_title']="AOI List";
		$data['heading2']="AOI List";
		
		$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('category/categoryList');
		$this->load->view('include/footer');
}

public function categoryListAjax()
{

        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.category_name","deals.couponCode","deals.couponType","deals.couponOption","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_categoryList($condition);
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
        $records = $this->Services->categoryList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	$src1=base_url('category/editCategoryPage').'?category_id='.$singleRow->category_id;
        	 	$src2=base_url('category/deleteCategory').'?category_id='.$singleRow->category_id;
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->category_name;
            
            $temp[] = '<a href="'.$src1.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.$src2.'" onclick="return checks()"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete Record"></i></a> ';
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    
}

}
?>