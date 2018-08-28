<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
public function __construct()
{
parent::__construct();
// $this->load->model('Admin_login');
// $this->load->model('Services');
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
	    $data['page_title']="Dollar Settings";
		$data['heading']="Dollar Settings";
		// if($this->session->userdata('adminType')=='1')
		// {
		// 	$data['userList']=$this->Services->userList();
		// }
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->dollerVsPoint();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('settings/dollerVsPoint');
		$this->load->view('include/footer');
}

public function ubgoDollarSettingHomeScreen()
{
	    $data['page_title']="Home Screen Dollar Settings";
		$data['heading']="Home Screen Dollar Settings";
		// if($this->session->userdata('adminType')=='1')
		// {
		// 	$data['userList']=$this->Services->userList();
		// }
		
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->ubgoDollarSettingHomeScreen();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('settings/ubgoDollarSettingHomeSecreen');
		$this->load->view('include/footer');
}

public function marketingServiceSettings()
{
	    $data['page_title']="Marketing Service Settings";
		$data['heading']="Marketing Service Settings";
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->marketingServiceSettings();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('settings/marketingServiceSetting');
		$this->load->view('include/footer');
}

public function socialShareSettings()
{
	    $data['page_title']="Marketing Service Settings";
		$data['heading']="Marketing Service Settings";
		$data['adminName']=$this->session->userdata('adminName');
		$data['result']=$this->Services->socialShareSettings();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('settings/socialShareSetting');
		$this->load->view('include/footer');
}

public function updateMarketingService()
{
	//print_r($_POST);
	$result=$this->Services->updateMarketingService();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Settings Update SuccessFully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Settings Update
              </div>');
	}
	redirect($_SERVER['HTTP_REFERER'],'refresh');
}

public function updateSocialSharePoint()
{
	//print_r($_POST);
	$result=$this->Services->updateSocialSharePoint();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Settings Update SuccessFully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Settings Update
              </div>');
	}
	redirect($_SERVER['HTTP_REFERER'],'refresh');
}


public function addDollerSettings()
{
	$result=$this->Services->addDollerSettings();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Settings Update SuccessFully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Settings Update
              </div>');
	}
	redirect('settings','refresh');
}

public function homeScreenSettings()
{
	$result=$this->Services->homeScreenSettings();
	if($result)
	{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Settings Update SuccessFully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Error ..! Settings Update
              </div>');
	}
	redirect($_SERVER['HTTP_REFERER']);
}





################################## end  #########################
}
