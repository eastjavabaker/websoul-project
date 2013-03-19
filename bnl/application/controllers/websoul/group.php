<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

        
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
		$this->load->model('Groupmodel');
               	$this->load->library('pagination');

                $config['base_url'] = site_url("group/index");
                $config['total_rows'] = $this->Groupmodel->get_count_group_list();
                $config['per_page'] = 3;
		$config['cur_page'] = $page;
                $this->pagination->initialize($config);
		
		$data['query'] = $this->Groupmodel->get_group_list($page, $config['per_page']);		
                $data['paging'] = $this->pagination->create_links();		
		$this->template->load('websoul_template', 'websoul/group/index', $data);
	}
        
        public function add()
	{		
                
                if($this->input->post()){                      
                      $this->load->model('Groupmodel'); 
                      $this->Groupmodel->insert();
                      $this->session->set_flashdata('notification', 'New group has been created.');
                      redirect('/websoul/group');
                }else{
                      $this->template->load('websoul_template', 'websoul/group/add');
                }
	}
        
        public function edit($id=null)
	{		
                $this->load->model('Groupmodel');
                if($this->input->post()){
                      $this->Groupmodel->update($this->input->post('f_entity_id'));
                      $this->session->set_flashdata('notification', 'Selected record(s) has been modified.');
                      redirect('/websoul/group');
                }else{  
                      $data['query'] = $this->Groupmodel->get_all_group_field($id);
                      $this->template->load('websoul_template', 'websoul/group/edit', $data);
                }
	}
        
        public function delete()
	{
            
            if($this->input->post()){
               $this->load->model('Groupmodel');
               $this->Groupmodel->delete($this->input->post('chk'));               
               $this->session->set_flashdata('notification', 'Selected record(s) has been deleted.');
            }else{   
	       $this->session->set_flashdata('notification', 'No data selected.');
            }   
               redirect('/websoul/group');
        }
        
        
}
