<?php

//Controller
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->library('form_validation');
        
    }

	public function index()
	{
		// $this->load->view('login/login');
		if($this->Sys_auth->check_logged()=== TRUE) redirect(base_url().'project');

			$data['login_failed'] ='';
			$data['title'] = 'Login';

			if($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'username', 'trim|required|valid_email|min_length[3]|max_length[50]');
				$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[35]');
				$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');

				if ($this->form_validation->run() == FALSE){

					$this->load->view('login/login', $data);
				}else{
					$login_array = array($this->input->post('username'), $this->input->post('password'));
					if($this->Sys_auth->login_process($login_array))
					{
						//login successfull
						redirect(base_url().'project');
					}else{
						$data['login_failed'] = "Invalid username or password";

						$this->load->view('login/login', $data);
					}
				}
		}
		else{
			$this->load->view('login/login', $data);
		}
	}
	
	public function logout()
	{
	   
	    $this->session->sess_destroy();
		redirect('login/');
	    
	}

	
}
