<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_login extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function AdminLogin($email,$password)
    {
		$this->db->where("adminEmail",$email);
        $this->db->where("adminPassword",$password);
            
        $query=$this->db->get("adminLogin");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'adminId' 		=> $rows->adminId,
                    	'adminName' 	=> $rows->adminName,
		                'adminName'    => $rows->adminEmail,
	                    'loggedIn' 	   => TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
	public function add_user()
	{
		$data=array(
			'username'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email_address'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
}
?>