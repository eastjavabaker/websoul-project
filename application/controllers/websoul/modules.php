<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CI_Controller {

        
        function __construct()
	{
		parent::__construct();
		
                if(!$this->session->userdata('username_session'))
		 {
			redirect('/websoul/login');
		 }
	}
        
	public function index($page=0)
	{
		$this->load->model('Modulemodel');
               	$this->load->library('pagination');

                $config['base_url'] = site_url("modules/index");
                $config['total_rows'] = $this->Modulemodel->get_count_module_list();
                $config['per_page'] = 10;
		$config['cur_page'] = $page;
                $this->pagination->initialize($config);
		
		$data['query'] = $this->Modulemodel->get_module_list($page, $config['per_page']);		
                $data['paging'] = $this->pagination->create_links();		
		$this->template->load('template', 'websoul/modules/index', $data);
	}
        
        public function add()
	{		
                
                if($this->input->post()){                      
                      $this->load->model('Modulemodel'); 
                      $this->Modulemodel->insert();
                      $this->session->set_flashdata('notification', 'New module has been created.');
                      redirect('/websoul/modules');
                }else{
                      $this->template->load('template', 'websoul/modules/add');
                }
	}
        
        public function edit($id=null)
	{		
                $this->load->model('Modulemodel');
                if($this->input->post()){
                      $this->Modulemodel->update($this->input->post('f_entity_id'));
                      $this->session->set_flashdata('notification', 'Selected record(s) has been modified.');
                      redirect('/modules');
                }else{  
                      $data['query'] = $this->Modulemodel->get_all_group_field($id);
                      $this->template->load('template', 'websoul/modules/edit', $data);
                }
	}
        
        public function delete()
	{
            
            if($this->input->post()){
               $this->load->model('Modulemodel');
               $this->Modulemodel->delete($this->input->post('chk'));               
               $this->session->set_flashdata('notification', 'Selected record(s) has been deleted.');
            }else{   
	       $this->session->set_flashdata('notification', 'No data selected.');
            }   
               redirect('/websoul/modules');
        }
        
        
}
