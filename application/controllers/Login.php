<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

		public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_login');	
		error_reporting(0);
		if($this->session->userdata('adminId')!="")
{
//redirect(base_url().'Login'); 
redirect('admin'); 
//echo "hello";
}
	}


	public function index()
	{
		
	$this->load->view('login.php');
			
				
	}

public function login()
	{
		//echo "hello";
		$email=$this->input->post('adminEmail');

		//$password=md5($this->input->post('pass'));
		$password=$this->input->post('adminPassword');

		$result=$this->Admin_login->AdminLogin($email,$password);
		
		if($result==false)
		{
			$this->session->set_flashdata('message', 'Email Or password Missmatched');
			redirect('login','refresh');
		}
		
	}

public function ResetPasswordPage()
	{
		
	$this->load->view('forgotPassword.php');
			
				
	}
	public function forgotPassword()
	{
		$user_email=$_REQUEST['user_email'];
		//$user_email="jaiprakash201019@gmail.com";
		$result=$this->Admin_login->forgotPassword($user_email);
		if(!empty($result))
        {
				$to = $user_email; // note the comma

				$subject = 'UbGo Password Reset';

				// Message
				$message = '
				<html>
				<head>
				<title>Test</title>
				</head>
				<body>
				<a href="'.base_url('login/ResetPasswordPage').'?ForgotPasswordKey='.md5($result[0]->user_email).'">Click Here To Reset Password</a>
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

			if($test)
			{
				$response=['response_code'=>"1",'result' =>"1" ,'message'=>"Password Reset Link Sent On Your Registered Email ID",'data'=> md5($result[0]->user_email)];
			}
			else
			{
				$response=['response_code'=>"0",'result' =>"0" ,'message'=>"Sorry ! Some Server Issues We are Unable To Provide Password Reset. Please Try After Some Time."];
			}
		}
		else
		{
				$response=['response_code'=>"0",'result' =>"0" ,'message'=>"Email Id Does Not Exist"];

			}
            
        
       //  $response=['result' =>"0" ,'message'=>$user_email];
		draw_json_encode($response);
	}

	public function resetPasssword()
	{
		$result=$this->Admin_login->resetPasssword();
		echo $result;
		// if($result)
		// {
		// 	echo "1";
		// }
		// else
		// {
		// 	echo "0";
		// }

	}

}