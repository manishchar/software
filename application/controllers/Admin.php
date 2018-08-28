<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('Admin_login');

error_reporting(E_ALL);
if($this->session->userdata('adminId')=="")
{
//redirect(base_url().'Login'); 
redirect('Login');
//echo "hello";
}
}
public function index()
{
	//print_r($this->session->userdata('adminType'));
	$data['page_title']="Dashboard";
	$data['adminName']=$this->session->userdata('adminName');
	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('index.php');
	$this->load->view('include/footer');
}
public function adminLogout()
{
	$user_data = $this->session->all_userdata();
	foreach ($user_data as $key => $value) {
	//echo $this->session->userdata($key).'<br>';
	$this->session->unset_userdata($key);
	}
	$this->session->sess_destroy();
	redirect();
}
public function changePassword()
{
	$data['title']='Change Password';
	$data['adminName']=$this->session->userdata('adminName');
	$data['result']=$this->Services->groupList($data1);
	$this->load->view('include/header.php',$data);
	$this->load->view('superadmin/changePassword.php',$data);
	$this->load->view('include/footer.php');
}

######### Compnay ###########

public function AddUserRegistationPage()
{
$data['page_title']="User Registation";
$data['heading']="User Registation Form";
$data['heading2']="User List";
$data['result']=forallData('','','branch');
if(isset($_GET['regKey']))
{
	$data['result2']=forallData('userId',$_GET['regKey'],"user");
}
else
{
	$data['result2']="";
}

	$data['adminName']=$this->session->userdata('adminName');

	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('sub_admin/registationPage');
	$this->load->view('include/footer');
}

public function addUserReg()
{
	$result=$this->Services->addUserReg();
	if($result)
	{
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Registation Successfull
              </div>');

     // redirect('admin/userList');
		
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               Email Already Registerd.
              </div>');
		
		
	}
	redirect($_SERVER['HTTP_REFERER']);
	
}

public function AddCompanyEditPage()
{
$data['page_title']="Company Registation";
$data['heading']="Company Edit Page";
$data['heading2']="Compnay List";
$data['editData']=$this->Services->companyEdit();

//$data['result']=allDataList('ub_login','ub_add_provider');
	$data['adminName']=$this->session->userdata('adminName');
	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('sub_admin/editPage');
	$this->load->view('include/footer');
}



public function addCompnayEditData()
{
	$result=$this->Services->addCompnayReg();
	if($result)
	{
$this->session->set_flashdata('messagea','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Update Successfull
              </div>');
		redirect('admin/userList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               Email Already Registerd.
              </div>');
		//redirect('admin/userList','refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}

public function profileEditData()
{
	$result=$this->Services->editProfileData();
	if($result)
	{
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Update Successfull
              </div>');
		//redirect('admin/editProfile','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Already Registerd.
              </div>');
		//redirect('admin/editProfile','refresh');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function AddCompanyBlockUnBlock()
{
	$result=$this->Services->UserBlockUnBlock();
	if($result==1)
	{
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                User Unblocked Successfull
              </div>');
		// $msg=array('message'=>'Your Account Has Been Activated Now You Can Login',"email"=>$data['user_email'],"subject"=>"New Registation");

		// 	$this->Services->sendEmailByActivity($msg);
		//redirect('admin/userList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                User Blocked Successfull
              </div>');
		//redirect('admin/userList','refresh');
		// $msg=array('message'=>'Your Account Has Been Deactivated Now You Can Not Login',"email"=>$data['user_email'],"subject"=>"New Registation");

		// 	$this->sendEmailByActivity($msg);
	}
	redirect($_SERVER['HTTP_REFERER']);
}


public function CreateBranchBySuperAdmin()
{
		$data['page_title']="Add Business";
		$data['heading']="Add Business";
		// $data['heading2']="Compnay List";
		// $data['userList']=$this->Services->userList();
		// $data['result']=$this->Services->categoryList();
       	$data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('super_admin/addBranch');
		$this->load->view('include/footer');
}

public function CreateBranchBySubAdmin()
{
		$data['page_title']="Add Branch";
		$data['heading']="Add Branch";
		// $data['heading2']="Compnay List";
		//$data['result']=$this->Services->adList();
        $data['adminName']=$this->session->userdata('adminName');
        $data['result']=$this->Services->categoryList();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('sub_admin/addBranch');
		$this->load->view('include/footer');
}

public function editBranchBySubAdmin()
{
		$data['page_title']="Edit Bussiness";
		$data['heading']="Edit Bussiness";
		// $data['heading2']="Compnay List";
		$data['result']=$this->Services->branchEdit();
        $data['adminName']=$this->session->userdata('adminName');
        $data['categoryList']=$this->Services->categoryList();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('sub_admin/editBranch');
		$this->load->view('include/footer');
}

public function editBranchBySuperAdmin()
{
		$data['page_title']="Edit Bussiness";
		$data['heading']="Edit Bussiness";
		// $data['heading2']="Compnay List";
		$data['userList']=$this->Services->userList();
		$data['result']=$this->Services->branchEdit();
		$data['categoryList']=$this->Services->categoryList();
        $data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('super_admin/editBranch');
		$this->load->view('include/footer');
}

public function branchListForSubAdmin()
{
	    $data['page_title']="Bussiness List";
		$data['heading']="Bussiness List";
		// $data['heading2']="Compnay List";
		//$data['result']=$this->Services->adList();
        $data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('sub_admin/branchListForSubAdmin');
		$this->load->view('include/footer');
}

public function branchListForSuperAdmin()
{
	    $data['page_title']="Branch List";
		$data['heading']="Branch List";
		// $data['heading2']="Compnay List";
		//$data['result']=$this->Services->branchListForSuperAdmin();
        $data['adminName']=$this->session->userdata('adminName');
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('super_admin/branchListForSuperAdmin');
		$this->load->view('include/footer');
}


public function addBranch()
{
	$result=$this->Services->addBranch();
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Branch Saved Successfully
              </div>');
		// if($this->session->userdata('adminType')==1)
		// {
			
		// }
		// else
		// {
		// 	redirect('admin/branchListForSubAdmin','refresh');
		// }
		redirect('admin/CreateBranchBySubAdmin','refresh');
	}
	else
	{

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Branch Saved Failed
              </div>');
	}
	

}
public function branchDelete()
{
	$result=$this->Services->branchDelete();
	
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Bussiness Deleted Successfully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 Bussiness Deleted Error
              </div>');
	}
		
		// if($this->session->userdata('adminType')==1)
		// {
		// 	redirect('admin/branchListForSuperAdmin','refresh');
		// }
		// else
		// {
		// 	redirect('admin/branchListForSubAdmin','refresh');
		// }	
	redirect($_SERVER['HTTP_REFERER']);
	}

public function addFieldsPage()
{
		$data['page_title']="Add Fields";
		$data['heading']="Add Fields";
		// $data['heading2']="Compnay List";
		
        $data['adminName']=$this->session->userdata('adminName');
      
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('addFields');
		$this->load->view('include/footer');
}

public function selectFields()
{
		$data['page_title']="Select Fields";
		$data['heading']="Select Fields";
		// $data['heading2']="Compnay List";
		unset($_SESSION['ids']);
        $data['adminName']=$this->session->userdata('adminName');
        $data['forms']=$this->db->get('form_name')->result();
        $data['dynamic_array'] = array();
        if(isset($_GET['form'])){
        	$id = $_GET['form'];
        	$formData=$this->db->where('form_id',$id)->get('form_name')->row();
        	$data['dynamic_array'] = explode(',', $formData->dynamic_field_id);
        	$data['form_id'] = $id;
        	$data['formData'] = $formData;
        }
      	$data['result']=$this->Services->getFields();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('selectFields');
		$this->load->view('include/footer');
}

public function selectForm()
{
		$data['page_title']="Select Form";
		$data['heading']="Select Form";
		// $data['heading2']="Compnay List";
		unset($_SESSION['ids']);
        $data['adminName']=$this->session->userdata('adminName');
      	$data['result']=$this->Services->getForms();
      	$data['branches']=$this->db->get('branch')->result();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('selectform');
		$this->load->view('include/footer');
}

public function createForm()
{
	if($_POST['form_id']!= ''){
		$num=$this->db->query("SELECT * FROM form_name where form_Id!='".$_POST['form_id']."' AND form_name='".$_POST['form_name']."'")->num_rows();
		if($num==0)
		{
			$this->db->trans_start();
			$arr['dynamic_field_id']= implode(',', $_POST['fields']);
			$arr['form_name']= $_POST['form_name'];
			$this->db->where('form_Id',$_POST['form_id'])->update('form_name',$arr);
			if($this->db->trans_complete())
			{
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                Form Update
	              </div>');
			}
			else
			{
					$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                 Form Update failed..!
	              </div>');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                 Form available
	              </div>');
		}
		
	}else{
		$result=$this->Services->createForm();
	
		if($result==1)
		{
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                Form created
	              </div>');
		}
		else if($result==2)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                 Form creatation failed..!
	              </div>');
		}
		else if($result==3)
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                 Form available
	              </div>');
		}
}
		
	redirect($_SERVER['HTTP_REFERER']);
}

public function form($id)
{

		$data['page_title']="Fill Form";
		$data['heading']="Fill Form";
		// $data['heading2']="Compnay List";
		if(empty($id))
		{
			if(isset($_POST['form_id']) && isset($_POST['branch_id'])){
				$id=$_POST['form_id'];
				$bid=$_POST['branch_id'];
			}else{
				redirect('admin/selectForm');
			}
		}

		if($id == ''){
			redirect('admin/selectForm');
		}

        $data['adminName']=$this->session->userdata('adminName');
        $data['result']=$this->Services->getSelectedFields($id);
        $data['form_id'] = $id;
        $data['branch'] = $this->db->where('branchId',$bid)->get('branch')->row();
        //print_r($data['result']);
        //die;
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('form');
		$this->load->view('include/footer');
}
public function addForm()
{
	if(isset($_POST['search'])){
		echo "search";
	}
	if(isset($_POST['save'])){
		echo "search";
	}
	die;
	$result=$this->Services->saveFormData();
	
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Form Save Successfully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 Form Save Error.!!
              </div>');
	}
	$this->form($_POST['form_id']);
	//redirect($_SERVER['HTTP_REFERER']);
}
public function deleteFieldsPage(){
	if(isset($_GET['id'])){
		if($this->db->where('dynamic_field_id',$_GET['id'])->delete('dynamic_fields'))
		{
			$this->session->set_flashdata('message','Record Delete Successfully');
		}else{
			$this->session->set_flashdata('error','Record Delete Failed');	
		}
	}else{
		$this->session->set_flashdata('error','Invalid Record');		
	}
	
	redirect('admin/filedList');
}
public function editFieldsPage()
{
		$data['page_title']="Edit Fields";
		$data['heading']="Edit Fields";
		// $data['heading2']="Compnay List";
		
        $data['adminName']=$this->session->userdata('adminName');
      	$data['result']=forallData("dynamic_field_id",$_GET['id'],"dynamic_fields");
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('editField');
		$this->load->view('include/footer');
}

public function addFields()
{
	$result=$this->Services->addFields();
	
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Fields Save Successfully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 Field Name Already Exist
              </div>');
	}
		
		
	redirect($_SERVER['HTTP_REFERER']);
}

public function editFields()
{
	$result=$this->Services->addFields();
	
	if($result)
	{
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Fields Update Successfully
              </div>');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                 Field Name Already Exist
              </div>');
	}
		
		
	redirect($_SERVER['HTTP_REFERER']);
}


public function formFieldList()
{
	    $data['page_title']="List";
		$data['heading']="List";
		//$condition 
		// $data['heading2']="Compnay List";
		//$data['result']=$this->Services->branchListForSuperAdmin();
        $data['adminName']=$this->session->userdata('adminName');
        $data['forms']=$this->db->get('form_name')->result();
        $data['dynamicRecords']=$this->db->select('tab1.*,tab2.form_name,tab3.branchName')
        ->join('form_name as tab2','tab1.form_id=tab2.form_Id')
        ->join('branch as tab3','tab1.branch_id=tab3.branchId')
        ->get('dynamicrecords as tab1')->result();
		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('formfieldlist');
		$this->load->view('include/footer');
}

public function editFormfieldsData()
{
		$data['page_title']="Edit Form";
		$data['heading']="Edit Form";
		// $data['heading2']="Compnay List";
		
        $data['adminName']=$this->session->userdata('adminName');
      	$data['result']=forallData("dynamic_fields_value_id",$_GET['id'],"dynamic_fields_value");
      	$data['result1']=forallData("form_Id",$data['result'][0]->form_id,"form_name");
      	$data['result2']=forallData("dynamic_fields_value_id",$_GET['id'],"dynamic_fields_value2");
      	$ids=$data['result1'][0]->dynamic_field_id;
      	$data['result3']=$this->Services->editFormFieldsData($ids);

		$this->load->view('include/header',$data);
		$this->load->view('include/side_menu');
		$this->load->view('editform');
		$this->load->view('include/footer');
}

################ END ################

############ Driver ##############





public function userList()
{
	$data['page_title']="User List";
$data['heading']="User List";
$data['heading2']="User List";
//$data['result']=allDataList('ub_login','ub_driver');
 $data['adminName']=$this->session->userdata('adminName');

	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('super_admin/companyList');
	$this->load->view('include/footer');
}



public function filedList()
{
	$data['page_title']="Fields List";
	$data['heading']="Fields List";
	$data['heading2']="Fields List";
	//$data['result']=allDataList('ub_login','ub_driver');
 	$data['adminName']=$this->session->userdata('adminName');

	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('fieldsList');
	$this->load->view('include/footer');
}




public function DriverBlockUnBlock()
{
	$result=$this->Services->UserBlockUnBlock();
	if($result==1)
	{
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                User Unblocked Successfull
              </div>');
		//redirect('admin/driverList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                User Blocked Successfull
              </div>');
		//redirect('admin/driverList','refresh');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function driverDelete()
{
	$result=$this->Services->driverDelete();
	if($result)
	{
          $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Driver Deleted Successfully
              </div>');
		//redirect('admin/driverList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Driver Deleted Error
              </div>');
		//redirect('admin/driverList','refresh');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function appUserDelete()
{
	$result=$this->Services->appUserDelete();
	if($result)
	{
          $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                User Deleted Successfully
              </div>');
		//redirect('admin/driverList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                User Delete Error
              </div>');
		//redirect('admin/driverList','refresh');
	}
	redirect($_SERVER['HTTP_REFERER']);
}

public function ApprovedStatus()
{
	$result=$this->Services->ApprovedStatus();
	if($result)
	{
$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Approved By You
              </div>');
		//redirect('admin/assignedDriverList','refresh');
	}
	else
	{
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                User Blocked Successfull
              </div>');
		//redirect('admin/DriverRegistationPage','refresh');
	}
	redirect($_SERVER['HTTP_REFERER']);
}


############ END ##############


    public function driverCompnayListAjax($page){
        $response_array = array();
        $getdata = $this->input->get();

        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.useName","deals.mobile","deals.emailId");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
		
		$count_rows = count_rowsForCompnayDriver($condition,'user','branch');
        // if($page=='user')
        // {
     
        // }
        // else if($page=='driver')
        // {
        // 	$count_rows = count_rowsForCompnayDriver($condition,'ub_login','ub_driver');
        // }
        
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
        //$records = $this->Services->assignedDriverList($condition,$offset,$noofrow,$sort_column,$sort_type);
       $records =allDataList($condition,$offset,$noofrow,$sort_column,$sort_type,'user','branch');
        	$con='admin/AddUserRegistationPage';
        	$con2='admin/AddCompanyBlockUnBlock';
        	
        
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
		
        	$del=' | <a href="'.base_url('admin/driverDelete').'?driver_id='.$singleRow->userId.'"><i class="fa fa-fw fa-trash"></i></a>';

        	$edit='<a data-toggle="tooltip" title="Edit" href="'.base_url($con).'?regKey='.$singleRow->userId.'"><i class="glyphicon glyphicon-edit"></i></a> | ';
        	if($singleRow->status==1)
        	{
        		$block='<a data-toggle="tooltip" title="Block User" href="'.base_url($con2).'?regKey='.$singleRow->userId.'&status=0"><i class="glyphicon glyphicon-ban-circle"></i></a>';
        	}
        	else
        	{
        		$block='<a data-toggle="tooltip" title="Unblock User" href="'.base_url($con2).'?regKey='.$singleRow->userId.'&status=1"><i class="glyphicon glyphicon-ok"></i></a>';
        	}
        	     	

            $temp = array();
            $temp[] = $sr_no++;
             $temp[] = $singleRow->branchName.' ('.$singleRow->branchCode.')';
            $temp[] = $singleRow->userName;
            $temp[] = $singleRow->emailId;
           	$temp[] = $singleRow->mobile;
            $temp[] = $edit . $block .$del;
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    }


public function appUserListAjax(){
        $response_array = array();
        $getdata = $this->input->get();

        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.user_full_name","deals.user_mobile","deals.user_email");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
		
        $count_rows = $this->Services->count_appUserList($condition);
        
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
        //$records = $this->Services->assignedDriverList($condition,$offset,$noofrow,$sort_column,$sort_type);
       $records =$this->Services->appUserList($condition,$offset,$noofrow,$sort_column,$sort_type);
        	$con='admin/AddCompanyEditPage';
        	$con2='admin/AddCompanyBlockUnBlock';
        
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){

		$del='  <a href="'.base_url('admin/appUserDelete').'?user_id='.$singleRow->user_login_id.'"><i class="fa fa-fw fa-trash" onclick="return checks()"></i></a>';

        	// $edit='<a data-toggle="tooltip" title="Edit" href="'.base_url($con).'?regKey='.$singleRow->user_login_id.'"><i class="glyphicon glyphicon-edit"></i></a> | ';

        	// if($singleRow->status==1)
        	// {
        	// 	$block='<a data-toggle="tooltip" title="Block User" href="'.base_url($con2).'?regKey='.$singleRow->user_login_id.'&status=0"><i class="glyphicon glyphicon-ban-circle"></i></a>';
        	// }
        	// else
        	// {
        	// 	$block='<a data-toggle="tooltip" title="Unblock User" href="'.base_url($con2).'?regKey='.$singleRow->user_login_id.'&status=1"><i class="glyphicon glyphicon-ok"></i></a>';
        	// }
        	     	

            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->user_full_name;
            $temp[] = $singleRow->user_email;
            $temp[] = $singleRow->user_mobile;
            $temp[] = $del;
            
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    }








public function editProfile()
{
	$data['page_title']="Edit Profile";
    $data['heading']="Edit Profile";
	$data['adminName']=$this->session->userdata('adminName');
	$data['editData']=$this->Services->editProfileCommon();
	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('common_pages/editProfile');
	$this->load->view('include/footer');
}


public function branchListForSuperAdminAjax(){
        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.branchName","deals.branchCode","deals.ifsc","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->count_branchList($condition);
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
        $records = $this->Services->branchListForSuperAdmin($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->branchName;
            $temp[] = $singleRow->branchCode;
            $temp[] =$singleRow->ifsc;
            $temp[] =$singleRow->address;
            
            $temp[] = '<a href="'.base_url('admin/editBranchBySuperAdmin').'?id='.$singleRow->branchId.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.base_url('admin/branchDelete').'?id='.$singleRow->branchId.'" onclick="return checks()"><i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete Record"></i></a>';
           
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    }


    public function fieldsListAjax(){
        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.field_name","deals.field_type","deals.driverName","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->CountadList($condition);
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
        $records = $this->Services->fieldList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->field_name;
            $temp[] =$singleRow->field_type;
            if($singleRow->is_required==1)
            {
            	$temp[]="Required Field";
            }
            else
            {
            	$temp[]="Free Field";
            }

             
            $temp[] = '<a href="'.base_url('admin/editFieldsPage').'?id='.$singleRow->dynamic_field_id.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> | <a href="'.base_url('admin/deleteFieldsPage').'?id='.$singleRow->dynamic_field_id.'" onclick="return confirm(\'Are you Sure to Delete?\');"><i class="text text-danger glyphicon glyphicon-trash" data-toggle="tooltip" title="Edit"></i></a> ';
           
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    }

    public function formfieldsListAjax(){
        $response_array = array();
        $getdata = $this->input->get();
        // print_r($getdata);	
        $response_array['sEcho']=$getdata['sEcho'];

        $column_array=array("deals.field_name","deals.field_type","deals.driverName","deals.driverMobile","deals.status");
        $condition = array();
        for($i=0;$i<6;$i++){
			if(!empty($getdata['sSearch_'.$i])){
					$condition[$column_array[$i]] = $getdata['sSearch_'.$i];
				}
        }
        //print_r($condition);
        $count_rows = $this->Services->formCount($condition);
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
        $records = $this->Services->formfiledList($condition,$offset,$noofrow,$sort_column,$sort_type);
        //print_r($records);exit;
		//$path = $this->config->item("deal_category_image_path", "application");
        foreach($records as $singleRow){
        	
        	
            $temp = array();
            $temp[] = $sr_no++;
            $temp[] = $singleRow->form_name;
            //$temp[] = $singleRow->form_name;
            $temp[] = $singleRow->field_value;
            
             
            $temp[] = '<a href="'.base_url('admin/editFormfieldsData').'?id='.$singleRow->dynamic_fields_value_id.'"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i></a> ';
           
            $response_array['aaData'][] = $temp;
        }

        echo json_encode($response_array);
        exit;
    }
################################## view user details #########################
public function view_details()
{
$uid=$_REQUEST['uid'];	
$res=$this->Services->view_details($uid);
?>
            <table style="width:100%">
              <tr>
                <td>
                  <b>Name : 
                  </b>
                </td>
                <td>
                  <?php echo $res['FullName']; ?>
                </td>
                <td>
                  <b>Email : 
                  </b>
                </td>
                <td>
                  <?php echo $res['userEmail']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Mobile : 
                  </b>
                </td>
                <td>
                  <?php echo $res['userMobile']; ?>
                </td>
                <td>
                  <b>Designation : 
                  </b>
                </td>
                <td>
                  <?php echo $res['userDegignation']; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <b>Address : 
                  </b>
                </td>
                <td>
                  <?php echo $res['userAddress']; ?>
                </td>
              </tr>
            </table>
            <?php
}

public function testMail()
{
	// echo "mail";
	// $msg=array('message'=>'Your Account Has Been Created',"email"=>"jaiprakash201019@gmail.com","subject"=>"New Registation");
	// $this->Services->sendEmailByActivity($msg);
	
	$this->load->view('email2');
}
################################## end  #########################

////////////////////////////////
public function uploadHeader()
{

		ini_set('max_execution_time', 5000);
			$this->load->library('excel');
            $path = 'resources/header/';
            $config['upload_path']   = $path;
            $config['allowed_types'] = '*';
            //$config['allowed_types'] = 'xlsx|csv|xls';
            $config['file_name'] = time();

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('files')){
            $data = array('upload_data' => $this->upload->data());

            if(!empty($data['upload_data']['file_name'])){
                $import_xls_file = $data['upload_data']['file_name'];
            }else{
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            $inputfilename = $inputFileName;
            $exceldata = array();

            //  Read your Excel workbook
            try
            {
                $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                $objPHPExcel = $objReader->load($inputfilename);
            }catch(Exception $e){

                die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();

            //  Loop through each row of the worksheet in turn
            for ($row = 1; $row <= $highestRow; $row++)
            { 
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    $exceldata[] = $rowData[0];
                    break;
            }
            $headers = $exceldata[0];
            $final = array();
            $header = array();
            foreach ($headers as $key => $value) {
            	if($value =='')
            	continue;
            	$IsExist = $this->db->where('field_name',$value)->get(' dynamic_fields')->row();
   				if(empty($IsExist)){
   					$header = array(
   						'field_name'=>$value,
   						'is_required'=>1,
   						'field_type'=>'text',
   						);
   					$final[] = $header;
   				}
            }
			if($final){
				if($this->db->insert_batch('dynamic_fields', $final)){
				$response = array('result'=>'success','status'=>'1','message'=>'Records Save Successfull','data'=>'');
				}else{
				$response = array('result'=>'failed','status'=>'0','message'=>'Record save Failed');
				}
			}else{
				$response = array('result'=>'failed','status'=>'0','message'=>'Already Uploaed','data'=>'');
			}
	}else{
	        	$response = array('result'=>'failed','status'=>'0','message'=>'File uploading Error','data'=>'');
	}
        echo json_encode($response);
}



/////////////////////////////
public function uploadData(){
//ini_set('max_execution_time', 5000);
//ini_set('memory_limit', '512M');
//ini_set('max_execution_time', '1024');
$id = $_POST['form_id'];
$bid = $_POST['branch_id'];
$account = trim($_POST['uaccount']);
$fileNo = trim($_POST['ufileNo']);
$oldFileNo = trim($_POST['uoldFileNo']);
$updateflag = $saveflag = $selectedFlag = false;
$accountFlag = $fileNoFlag = $oldFileNoFlag = false;
if($account != ''){
	$accountFlag = true;
	$selectedFlag = true;
}
if($fileNo != ''){
	$fileNoFlag = true;
	$selectedFlag = true;
}
if($oldFileNo != ''){
	$oldFileNoFlag = true;
	$selectedFlag = true;
}



$filled=$this->Services->getSelectedHeaders($id);

	// $a = array('2','3','7');
	// $b = array('5','1','2','3','4');

	// if (count(array_diff($a, $b)) === 0) {
	// 	echo "matched";
	//   // No values from array1 are in array 2
	// } else {
	// 	echo "unmatched";
	//   // There is at least one value from array1 present in array2
	// }
	$userId = ($this->session->userdata('adminId'));
	//die;
			$this->load->library('excel');
            $path = 'resources/file/data/';
            $config['upload_path']   = $path;
            $config['allowed_types'] = '*';
            //$config['allowed_types'] = 'xlsx|csv|xls';
            $config['file_name'] = time();

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('files')){
            $data = array('upload_data' => $this->upload->data());

            if(!empty($data['upload_data']['file_name'])){
                $import_xls_file = $data['upload_data']['file_name'];
            }else{
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            $inputfilename = $inputFileName;
            $exceldata = array();

            //  Read your Excel workbook
            try
            {
                $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
                $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
                $objPHPExcel = $objReader->load($inputfilename);
            }catch(Exception $e){

                die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
				if($highestRow > 501){
					$response = array('result'=>'failed','status'=>'0','message'=>'File To Large');
					unlink($inputFileName);
					echo json_encode($response);
					die;
				}
                //  Read a row of data into an array
                $row = 1;
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                    $exceldata[] = $rowData[0];
                   
            $headers = $exceldata[0];
           // echo $row;die;

	if (count(array_diff($filled, $headers)) === 0) {
	
            $selectedHeader = array_intersect($headers, $filled);
			$selectedIndex = array_keys($selectedHeader);
            $dataType = $exceldata[1];
            $final = array();
            $header = array();
            $ja = array(); 

 for ($key = 2; $key <= $highestRow; $key++)
            { 
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $key . ':' . $highestColumn . $key, NULL, TRUE, FALSE);
               
                    $value = $rowData[0];
            //foreach ($exceldata as $key => $value) {

            	if($key != '0'){
            		//
					if($accountFlag){
						if($value[1] != $account){
							continue;
						}
					} 
					if($fileNoFlag){
						if($value[0] != $fileNo){
							continue;
						}
					}
					if($oldFileNoFlag){
						if($value[2] != $oldFileNo){
							continue;
						}
					}

            		foreach($selectedIndex as $k => $v){
            			$ja[$filled[$k]] = $value[$v];
            		}
					$record = array(
						'form_id'		=>$id,
						'branch_id'		=>$bid,
						'user_id'		=>$userId,
						'fileNumber'	=>$value[0],
						'accountNumber'	=>$value[1],
						'oldFileNumber'	=>$value[2],
						'data'			=>json_encode($ja)
					);

            
					$condition = "form_id = ".$id; 	
					$condition .= " AND accountNumber = ".$value[1];
					//$condition .= " && oldFileNumber == ".$value[2];
					//$condition .= " && fileNumber == ".$value[0];
			
					$isExist = $this->db->where($condition)->get('dynamicrecords')->result();
		
					if($isExist){
						$updateflag = $this->db->where($condition)->update('dynamicrecords',$record);
						//$response = array('result'=>'success','status'=>'1','message'=>'Records Update Successfull','data'=>'');
						//update
					}else{
						//save
						//$saveflag=1;
						$saveflag = $this->db->insert('dynamicrecords',$record);
						//$response = array('result'=>'success','status'=>'1','message'=>'Records Save Successfull','data'=>'');
					}
            	}	
            }
           
			if($saveflag || $updateflag){
					$response = array('result'=>'success','status'=>'1','message'=>'File data upload','data'=>'');
			}else{
					$response = array('result'=>'failed','status'=>'0','message'=>'Nothig to be upload','data'=>'');
			}
			
	}else{
		$response = array('result'=>'failed','status'=>'0','message'=>'File not comfortable selected Form');
		$this->session->set_flashdata('error','Form field not matched in excel....');
	}

			
}else{
        $response = array('result'=>'failed','status'=>'0','message'=>'File uploading Error','data'=>'');
       	$this->session->set_flashdata('error','File uploading Error');
}
		echo json_encode($response);
        //redirect('admin/selectForm');
}




public function saveRecord(){
	$userId = ($this->session->userdata('adminId'));
	$form_id = $_POST['form_id'];
	$dynamic_field_id = $_POST['dynamic_field_id'];
	$dynamic_field_name = $_POST['dynamic_field_name'];
	$field_values = $_POST['field_value'];
	// $response = array('result'=>'success222','status'=>'1','message'=>$_POST);
	// echo json_encode($response);
	// die;
	if(isset($_POST['record_id'])){

		if($_POST['record_id'] !=''){

			foreach ($field_values as $key => $field_value) {
				$data[$dynamic_field_name[$key]] = $field_value;
			}
			$saveRecord= array(
				'user_id'=>$userId,
				'fileNumber'=>$field_values[0],
				'accountNumber'=>$field_values[1],
				'oldFileNumber'=>$field_values[2],
				'data'=>json_encode($data),
			);
			if($this->db->where('dynamic_fields_value_id',$_POST['record_id'])->update('dynamicrecords',$saveRecord)){
				$response = array('result'=>'success','status'=>'1','message'=>'Record Update','data'=>$record);
			}else{
				$response = array('result'=>'failed','status'=>'2','message'=>'Record Update Failed','data'=>$saveRecord);
			}

			$response = array('result'=>'success','status'=>'1','message'=>'Record Update');
		}
		else if($_POST['record_id'] =='')
		{
			foreach ($field_values as $key => $field_value) {
				$data[$dynamic_field_name[$key]] = $field_value;
			}
			$saveRecord= array(
				'form_id'=>$form_id,
				'user_id'=>$userId,
				'fileNumber'=>$field_values[0],
				'accountNumber'=>$field_values[1],
				'oldFileNumber'=>$field_values[2],
				'data'=>json_encode($data),
			);
			if($this->db->insert('dynamicrecords',$saveRecord)){
				$response = array('result'=>'success','status'=>'1','message'=>'Record Save','data'=>$record);
			}else{
				$response = array('result'=>'failed','status'=>'2','message'=>'Record Save Failed','data'=>$saveRecord);
			}
		}
	}else{
		$response = array('result'=>'failed','status'=>'0','message'=>'Invalid Operation');
	}


echo json_encode($response);
die;
}
public function getRecord(){
	//echo $_POST['account'];die;
	if(isset($_POST['account']) || isset($_POST['fileNumber']) || isset($_POST['oldFileNumber'])){
	$account = $_POST['account'];
	$oldFileNumber = $_POST['oldFileNumber'];
	$fileNumber = $_POST['fileNumber'];
	$form_id = $_POST['form_id'];
	if($oldFileNumber){
	$this->db->where('oldFileNumber',$oldFileNumber);	
	}
	if($fileNumber){
	$this->db->where('fileNumber',$fileNumber);
	}
	if($account){
	$this->db->where('accountNumber',$account);
	}
	$this->db->where('form_id',$form_id);
	$results = $this->db->get('dynamicrecords')->row();
	if($results){
	$response = array('result'=>'success','status'=>'1','data'=>$results);
}else{
	$response = array('result'=>'success','status'=>'2','message'=>'new records');
}
	}else{
		$response = array('result'=>'failed','status'=>'0','message'=>'Invalid Account');
	}

	echo json_encode($response);
	die;
}

public function search(){
	$searchTerm = $_GET['term'];
	$form_id = $_GET['form_id'];
	

	$results =$this->db->query("SELECT * FROM dynamicrecords WHERE form_id = $form_id AND accountNumber LIKE '%".$searchTerm."%'")->result();
	if($results){	
	foreach ($results as $key => $result) {
	 	$data[] = $result->accountNumber;
	}
	}else{
		$data[] = "No Result";	
	}
	//return json data
	echo json_encode($data);
}


public function fileNoSearch(){
	$searchTerm = $_GET['term'];
	$form_id = $_GET['form_id'];
	

	$results =$this->db->query("SELECT * FROM dynamicrecords WHERE form_id = $form_id AND fileNumber LIKE '%".$searchTerm."%'")->result();
	if($results){	
	foreach ($results as $key => $result) {
	 	$data[] = $result->fileNumber;
	}
	}else{
		$data[] = "No Result";	
	}
	//return json data
	echo json_encode($data);
}

public function oldFileNoSearch(){
	$searchTerm = $_GET['term'];
	$form_id = $_GET['form_id'];
	

	$results =$this->db->query("SELECT * FROM dynamicrecords WHERE form_id = $form_id AND oldFileNumber LIKE '%".$searchTerm."%'")->result();
	if($results){	
	foreach ($results as $key => $result) {
	 	$data[] = $result->oldFileNumber;
	}
	}else{
		$data[] = "No Result";	
	}
	//return json data
	echo json_encode($data);
}

//////////////////

public function setting(){

$data['page_title']="Setting";

	$data['adminName']=$this->session->userdata('adminName');
	if($_GET){
		if($_GET['table'] == '1'){
			$tableName = " dynamic_fields";
		}
		if($_GET['table'] == '2'){
			$tableName = "form_name";	
		}
		if($_GET['table'] == '3'){
			$tableName = "dynamicrecords";
		}
		if($this->db->truncate($tableName)){
$this->session->set_flashdata('message','table Empty Successfully');
		}else{
			$this->session->set_flashdata('error','table Empty Failed');
		}
		redirect('admin/setting');
	}else{
	$this->load->view('include/header',$data);
	$this->load->view('include/side_menu');
	$this->load->view('setting.php');
	$this->load->view('include/footer');
	}
//TRUNCATE TABLE tablename	
}




}
