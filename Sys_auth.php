<?php
//model
class Sys_auth extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function login_process($login_array_input = NULL){
		
		if(!isset($login_array_input) OR count($login_array_input) != 2)
			return false;

			$email = $login_array_input[0];
			$password = $login_array_input[1];
			
			$query = $this->db->query("SELECT * FROM `users`
					WHERE users.user_email= '".$email."'
					LIMIT 1");
			if ($query->num_rows() > 0)
			{
				$row 		= $query->row();
				$user_id 	= $row->user_id;
				$user_fname = $row->user_fname;
				$user_lname = $row->user_lname;
				$user_email = $row->user_email;
				$user_pass 	= $row->user_password;
				$user_salt 	= $row->user_salt;
				

				if($this->Sys_encrypt->encryptUserPwd($password, $user_salt) === $user_pass){

					$this->session->set_userdata('logged_user', $user_id);
					$this->session->set_userdata('logged_user_fname', $user_fname);
					$this->session->set_userdata('logged_user_lname', $user_lname);
					$this->session->set_userdata('logged_user_email', $user_email);
					$this->session->set_userdata('logged_user_role', $user_role);
					$this->session->set_userdata('logged_user_pic', $user_pic);

					return true;

				}
				return false;
			}
		return false;
		
	}
	
	function check_logged(){
		return ($this->session->userdata('logged_user')) ? TRUE : FALSE;
	}
	
}