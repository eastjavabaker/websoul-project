<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

        
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
		$this->load->model('Pagemodel');
               	$this->load->library('pagination');

                $config['base_url'] = site_url("websoul/page/index");
                $config['total_rows'] = $this->Pagemodel->get_count_page_list();
                $config['per_page'] = 10;
		$config['cur_page'] = $page;
                $this->pagination->initialize($config);
		
		$data['publish'] = array('Unpublish', 'Publish');
		$data['query'] = $this->Pagemodel->get_page_list($page, $config['per_page']);		
                $data['paging'] = $this->pagination->create_links();		
		$this->template->load('websoul_template', 'websoul/page/index', $data);
	}
        
        public function add()
	{		
                
                if($this->input->post()){                      
                      $this->load->model('Pagemodel'); 
                      $this->Pagemodel->insert();
                      $this->session->set_flashdata('notification', 'New page has been created.');
                      redirect('/websoul/page');
                }else{
                      $this->template->load('websoul_template', 'websoul/page/add');
                }
	}
        
        public function edit($id=null)
	{		
                $this->load->model('Pagemodel');
                if($this->input->post()){
                      $this->Pagemodel->update($this->input->post('f_entity_id'));
                      $this->session->set_flashdata('notification', 'Selected record(s) has been modified.');
                      redirect('/websoul/page');
                }else{  
                      $data['query'] = $this->Pagemodel->get_all_page_field($id);
                      $this->template->load('websoul_template', 'websoul/page/edit', $data);
                }
	}
        
        public function delete()
	{
            
            if($this->input->post()){
               $this->load->model('Pagemodel');
               $this->Pagemodel->delete($this->input->post('chk'));               
               $this->session->set_flashdata('notification', 'Selected record(s) has been deleted.');
            }else{   
	       $this->session->set_flashdata('notification', 'No data selected.');
            }   
               redirect('/websoul/page');
        }
        
        
}
