<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

       
        function __construct(){
                 parent::__construct();
		 
        }
	
       
	public function index()
	{
	       if($this->session->userdata('username_session'))
		 {
			redirect('/websoul');
		 }

	       $this->template->load('websoul_template_login', 'websoul/login');
	}
	
	public function post(){
	       if($this->session->userdata('username_session'))
		 {
			redirect('/websoul');
		 }
	       
	       $email = $this->input->post('txt_email');
	       $password = $this->input->post('pwd_password');
	       
	       $this->load->model('Auth');
               $result = $this->Auth->validate_login($email,$password);
	       
	       //echo $result;
	       //echo $this->session->userdata('username_session');
               
	       if($this->session->userdata('username_session'))
		 {
			redirect('/websoul');
		 }else{
                        redirect('/websoul/login');  	      	       
		 }
	}
	
	public function logout(){
	       $this->session->sess_destroy();
	       $this->session->unset_userdata('username_session');	       
               redirect('/websoul/login');
	}
	
	
}