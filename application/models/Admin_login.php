<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    

function get_ip() {
//Just get the headers if we can or else use the SERVER global
if ( function_exists( 'apache_request_headers' ) ) {
$headers = apache_request_headers();
} else {
$headers = $_SERVER;
}
//Get the forwarded IP if it exists
if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
$the_ip = $headers['X-Forwarded-For'];
} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
) {
$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
} else {
$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
}
return $the_ip;
}


function getDateTimeOnly()
{
    return date("Y-m-d H:i:s");
}

	function AdminLogin($email,$password)
    {
         
        $ip=$this->get_ip();
    

    $result=$this->db->query("SELECT * FROM user where md5(emailId)='".md5($email)."' AND password='".md5($password)."' AND status=1");
    
    
    $show_count =$result->num_rows();
    if($show_count==1)
    {
		    $rows=$result->row();
			  $newdata = array(
                        'adminId'       => $rows->userId,
                        'adminName'     => $rows->userName,
                        'adminEmail'    => $rows->emailId,
                        'adminType'     =>  $rows->role,
                        'loggedIn'     => TRUE,
                   );
        $this->session->set_userdata($newdata);
        
        redirect('admin');
       }
    else
    {
      return false;
    }
      }

      public function forgotPassword($user_email)
      {
        // echo "SELECT user_email from ub_login where user_email='".$_REQUEST['user_email']."' and status=1";
        return $this->db->query("SELECT user_email from ub_login where user_email='".$user_email."' and status=1")->result();
        
      }

      public function resetPasssword()
      {
        // echo "UPDATE ub_login set user_password='".md5($_REQUEST['user_password'])."' where md5(user_email)='".$_REQUEST['ForgotPasswordKeys']."'";
        $result=$this->db->query("UPDATE ub_login set user_password='".md5($_REQUEST['user_password'])."' where md5(user_email)='".$_REQUEST['ForgotPasswordKeys']."'");
        return $this->db->affected_rows();
         // if($result)
         // {
         //    return true;
         // }
         // else
         // {
         //    return false;
         // }
      }

}
?>