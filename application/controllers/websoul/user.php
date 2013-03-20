<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

        
        function __construct()
	{
		parent::__construct();
		
                if(!$this->session->userdata('username_session'))
		 {
			redirect('/websoul/login');
		 }
	}
	
        
        private function grouplist(){
                $this->load->model('Usermodel');
                return $this->Usermodel->get_group_list();  
        }
        
        private function statuslist(){
                $this->load->model('Usermodel');
                return $this->Usermodel->get_status_list();  
        }        
        
	public function index($page=0)
	{
		$this->load->model('Usermodel');
                $this->load->library('pagination');
                
                $config['base_url'] = site_url("websoul/user/index");
                $config['total_rows'] = $this->Usermodel->get_count_user_list();
		$config['anchor_class'] = 'class="number" ';
                $config['per_page'] = 3;
		$config['cur_page'] = $page;
                $this->pagination->initialize($config);
                
                $data['query'] = $this->Usermodel->get_user_list($page, $config['per_page']);
                $data['paging'] = $this->pagination->create_links();
                $this->template->load('websoul_template', 'websoul/user/index', $data);
	}
        
        public function add()
	{		
                
                if($this->input->post()){                      
                      $this->load->model('Usermodel'); 
                      $this->Usermodel->insert();
                      $this->session->set_flashdata('notification', 'New user has been created.');
                      redirect('/websoul/user');
                }else{
                      $data['grouplist'] = $this->grouplist();
                      $data['statuslist'] = $this->statuslist();
                      $this->template->load('websoul_template', 'websoul/user/add', $data);
                }
	}
        
        public function edit($id=null)
	{		
                $this->load->model('Usermodel');
                if($this->input->post()){
                      $this->Usermodel->update($this->input->post('f_id'));
                      $this->session->set_flashdata('notification', 'Selected record(s) has been modified.');
                      redirect('/websoul/user');
                }else{  
                      $data['query'] = $this->Usermodel->get_all_user_field($id);
                      $data['grouplist'] = $this->grouplist();
                      $data['statuslist'] = $this->statuslist();
                      $this->template->load('websoul_template', 'websoul/user/edit', $data);
                }
	}
        
        public function delete()
	{
            
            if($this->input->post()){
               $this->load->model('Usermodel');
               $this->Usermodel->delete($this->input->post('chk'));               
               $this->session->set_flashdata('notification', 'Selected record(s) has been deleted.');
            }else{   
	       $this->session->set_flashdata('notification', 'No data selected.');
            }   
               redirect('/websoul/user');
        }
        
        
}
