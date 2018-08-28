<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BuyPoints extends CI_Controller {
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
	    $data['page_title']="Buy Points";
		$data['heading']="Buy Points";
		// if($this->session->userdata('adminType')=='1')
		// {
		// 	$data['userList']=$this->Services->userList();
		// }
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->dollerVsPoint();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('settings/buyPoints');
		$this->load->view('include/footer');
}



public function buyPoints()
{
	$result=$this->Services->buyPoints();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Congratulations ! Your Points Has Been Creadited In You Acounts.
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
	redirect('buyPoints','refresh');
}





################################## end  #########################
}
