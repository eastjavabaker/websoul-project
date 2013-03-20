<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

        
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
		$this->load->model('Membermodel');
               	$this->load->library('pagination');

                $config['base_url'] = site_url("websoul/member/index");
                $config['total_rows'] = $this->Membermodel->get_count_member_list();
                $config['per_page'] = 10;
		$config['cur_page'] = $page;
                $this->pagination->initialize($config);
		
		$data['publish'] = array('Unpublish', 'Publish');
		$data['query'] = $this->Membermodel->get_member_list($page, $config['per_page']);		
                $data['paging'] = $this->pagination->create_links();		
		$this->template->load('websoul_template', 'websoul/member/index', $data);
	}
        
        public function add()
	{		
                
                if($this->input->post()){
			
			
                      $this->load->model('Membermodel');
		      
		$newname = "";
		if($_FILES['picture']['size']>0){
		
		$ext = substr($_FILES['picture']['name'], -4);
		$newname = "pic".md5(date("Y-m-d H:i:s")).$ext;
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/belia/data/member/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000';
		$config['file_name'] = $newname;
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
			
		}
		      
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('picture'))
		{
                        //$this->session->set_flashdata('notification', 'Error picture upload.');
		}else{
			
			$filedata = $this->upload->data();
			$this->session->set_flashdata('notification', 'New page has been created.');
		}
                
		        $this->Membermodel->insert($newname);
                        
				                   
                      redirect('/websoul/member');
                }else{
		      
                      $this->template->load('websoul_template', 'websoul/member/add', $data);
                }
	}
        
        public function view($id=null)
	{		
                $this->load->model('Membermodel');
                $data['query'] = $this->Membermodel->get_all_member_field($id);
                $this->template->load('websoul_template', 'websoul/member/view', $data);

	}
        
        public function delete()
	{
            
            if($this->input->post()){
               $this->load->model('Membermodel');
               $this->Membermodel->delete($this->input->post('chk'));               
               $this->session->set_flashdata('notification', 'Selected record(s) has been deleted.');
            }else{   
	       $this->session->set_flashdata('notification', 'No data selected.');
            }   
               redirect('/websoul/member');
        }
        
        
}
