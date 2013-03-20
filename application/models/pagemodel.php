<?php

class Pagemodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_gallery_list($page, $pagenumber){             
             $this->db->select('*');
             $this->db->from('mod_finalist');             
             $this->db->order_by("entity_id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    
    function get_gallery_detil($id){             
             $this->db->select('*');
             $this->db->from('mod_finalist');           
             $this->db->where('entity_id', $id);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_next($id){             
             $this->db->select('entity_id');
             $this->db->from('mod_finalist');           
             $this->db->where('entity_id >', $id);
             $this->db->order_by('entity_id asc');
             $this->db->limit(1);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_prev($id){             
             $this->db->select('entity_id');
             $this->db->from('mod_finalist');           
             $this->db->where('entity_id <', $id);
             $this->db->order_by('entity_id desc');
             $this->db->limit(1);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_gallery_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_finalist');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    
    function get_comment_byid($page, $pagenumber, $id){             
             $this->db->select('*');
             $this->db->from('mod_comments');
             $this->db->where("comment_to", $id);
             $this->db->where("publish", 1);
             $this->db->order_by("id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    
    function get_count_comments($id){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_comments');
             $this->db->where("comment_to", $id);
             $this->db->where("publish", 1);
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    
    function insert($txtfilename, $flag = 'w')
    {
        $data = array();        
        $data['fb_uid'] = $this->input->post('fbuid');
        $data['name'] = $this->input->post('txtname');
        $data['email'] = $this->input->post('txtemail');
        $data['caption'] = $this->input->post('txtcaption');
        $data['photo'] = $txtfilename;
        $data['flag'] = $flag;
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_finalist', $data);
      
    }
    
    function is_ticket($id){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_tickets');
             $this->db->where("fbuid", $id);
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    
    function post_ticket($fbuid)
    {
        
        if($this->is_ticket($fbuid)==0){
        $data = array();
        $data['fbuid'] = $fbuid;
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['hp'] = $this->input->post('hp');
        $data['prov'] = $this->input->post('prov');
        $data['kota'] = $this->input->post('kota');
        $data['alamat'] = $this->input->post('alamat');
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_tickets', $data);
            return 1;
        }else{
            return 0;            
        }
      
    }
    
    function post_comment($fbuid)
    {
        $data = array();
        $data['fbuid'] = $fbuid;
        $data['comment_to'] = $this->input->post('comment_to');
        $data['name'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['hp'] = $this->input->post('hp');
        $data['photo'] = $this->input->post('photo');
        $data['comment'] = $this->input->post('komen');
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_comments', $data);
      
    }
    
    function get_count_vote_detil($photoid){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_votes');
             $this->db->where('photo_entity_id', $photoid);
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }    
    
    function get_all_voted(){
             $this->db->select("photo_entity_id, count(1) as 'num'");
             $this->db->from('mod_votes');
             //$this->db->where('fb_uid', $this->session->userdata('fbuid'));
             $this->db->group_by('photo_entity_id');
             $query = $this->db->get(); $num = array();
             foreach($query->result() as $v){                     
                     $num["".$v->photo_entity_id] = $v->num;
             }
             
             return $num;
    }
    
    function get_isvoted($fbuid,$id){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_votes');
             $this->db->where('fb_uid', $fbuid);
             $this->db->where('photo_entity_id', $id);
                          
             $query = $this->db->get(); $num = 0;
             //echo $this->db->last_query();die();
             //echo $query->num_rows();die();
             
             foreach($query->result() as $v){
                     $num = $v->num;
             }

             return $num;
    }
    
    function is_upload(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_finalist');
             $this->db->where('fb_uid', $this->input->post('fbuid'));
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             
             return $num;
    }
    
    function add_vote($id, $fbuid)
    {
       
       if($this->get_isvoted()==0){
        
        $data = array();                 
        $data['photo_entity_id'] = $id;
        $data['fb_uid'] = $fbuid;
        $data['created'] = date("Y-m-d H:i:s");
        $this->db->insert('mod_votes', $data);
        
       }
           
    }


}

?>