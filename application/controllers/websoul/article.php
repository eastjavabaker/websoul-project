<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('username_session')) {
            redirect('/websoul/login');
        }
    }
    
    private function upload_pic($name, $action, $allowed_extension = 'gif|jpg|png'){
            $newname = "";
            $config = array();
            if ($_FILES['picture']['size'] > 0) {

                $ext = "." . end(explode('.', $_FILES['picture']['name']));
                $newname = "pic_" . md5(date("Y-m-d H:i:s")) . $ext;
                $config['upload_path'] = './data/'.$name.'s/';
                $config['allowed_types'] = $allowed_extension;
                $config['max_size'] = '5000';
                $config['file_name'] = $newname;
            }

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {
                $this->session->set_flashdata('notification_error', $name.' picture upload failed.');
            } else {

                $filedata = $this->upload->data();
                $status = ($action=='add')?"created":"modified";
                $this->session->set_flashdata('notification', 'New '.$name.' has been '.$status.'.');
            }
            
            return $newname;
    }
    
    public function index($page = 0) {
        $this->load->model('Articlemodel');
        $this->load->library('pagination');

        $config['base_url'] = site_url("websoul/article/index");
        $config['total_rows'] = $this->Articlemodel->get_count_article_list();
        $config['per_page'] = 10;
        $config['cur_page'] = $page;
        $this->pagination->initialize($config);

        $data['publish'] = array('Unpublish', 'Publish');
        $data['cur_page'] = $page;
        $data['query'] = $this->Articlemodel->get_article_list($page, $config['per_page']);
        $data['paging'] = $this->pagination->create_links();
        $this->template->load('websoul_template', 'websoul/article/index', $data);
    }

    public function add() {

        $this->load->model('Articlemodel');

        if ($this->input->post()) {

            $newname = $this->upload_pic('Article', 'add');

            $this->Articlemodel->insert($newname);

            redirect('/websoul/article');
        } else {
            $arrmonth = array('- Month -', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember');
            $data['arrmonth'] = $arrmonth;

            $data['cat'] = $this->Articlemodel->get_all_article_category_list();

            $this->template->load('websoul_template', 'websoul/article/add', $data);
        }
    }

    public function edit($id = null) {
        $this->load->model('Articlemodel');
        if ($this->input->post()) {
            //print_r($_FILES);die();
            $newname = $this->upload_pic('Article', 'edit');

            $this->Articlemodel->update($this->input->post('f_id'), $newname);
            redirect('/websoul/article');
        } else {

            $data['query'] = $this->Articlemodel->get_all_article_field($id);
            $arrmonth = array('- Month -', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember');
            $data['arrmonth'] = $arrmonth;
            
            $data['cat'] = $this->Articlemodel->get_all_article_category_list();
            
            $this->template->load('websoul_template', 'websoul/article/edit', $data);
        }
    }


    public function delete() {

        if ($this->input->post()) {
            $this->load->model('Articlemodel');
            $this->Articlemodel->delete($this->input->post('chk'));
            $this->session->set_flashdata('notification', 'Selected article(s) has been deleted.');
        } else {
            $this->session->set_flashdata('notification', 'No data selected.');
        }
        redirect('/websoul/article');
    }

}
