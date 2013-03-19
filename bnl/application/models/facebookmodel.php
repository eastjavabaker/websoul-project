<?php

class Facebookmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    private function my_entity_id(){
            $arrdata = $this->session->userdata('userprofile');
            return $arrdata['userprofile_id'];
    }
    
    function get_group_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('user_group');             
             $this->db->order_by("entity_id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_group_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('user_group');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function post_fb_stream($data=array())
    {
        
                
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('fb_stream_posts', $data);   
              
    }
    
    function insert_main_fb_account($uid, $name, $token, $pic)
    {
        if(!$this->get_fb_account_detil($uid)){ 
        
        $data = array();        
        $data['user_entity_id'] = $this->my_entity_id();
        $data['uid'] = $uid;
        $data['picture'] = ($pic)?$pic:"";
        $data['account_name'] = $name;
        $data['access_token'] = $token;
        $data['status'] = '1';
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('socmed_fb_accounts', $data);   
             return 1;
        }else{
             return 0;
        }
      
    }
    
    function insert_main_fb_page($arrpage = array())
    {
        if($arrpage){ 
        
        $data = array();        
        
        
           foreach($arrpage as $key=>$v){
                   foreach($v as $key2=>$v2){
                           $data['entity_id'] = $this->my_entity_id();
                           $data['parent_fb_id'] = $key;
                           $data['page_id'] = $key2;
                           $data['page_category'] = $v2['category'];
                           $data['page_name'] = $v2['name'];
                           $data['access_token'] = $v2['access_token'];
                           $data['picture'] = ($v2['picture'])?$v2['picture']:"";
                           $data['status'] = '1';
                           $data['created'] = date('Y-m-d H:i:s');
                           $this->db->insert('socmed_fb_page_accounts', $data);
                   }
           }
           
             return 1;
        }else{
             return 0;
        }
      
    }
    
    function get_main_fb_account($status=-1){
             $this->db->select('*');
             $this->db->from('socmed_fb_accounts');
             if($status>-1){
                $this->db->where('status', '1');
             }
             $this->db->where('user_entity_id', $this->my_entity_id());
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_main_fb_page($status=-1){
             $this->db->select('*');
             $this->db->from('socmed_fb_page_accounts');
             if($status>-1){
                $this->db->where('status', '1');
             }
             //$this->db->order('page_name', 'asc');
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_page_token($pageid){
             $this->db->select('access_token');
             $this->db->from('socmed_fb_page_accounts');
             $this->db->where('page_id', $pageid);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_fb_account_detil($uid){
             $this->db->select('*');
             $this->db->from('socmed_fb_accounts');
             $this->db->where('status', '1');
             $this->db->where('user_entity_id', $this->my_entity_id());
             $this->db->where('uid', $uid);
             $query = $this->db->get();
             return $query->result();
    }
    
    function fb_account_token_update($uid, $newtoken)
    {
        
        try {
           //echo $uid." = ".$newtoken;exit();
           $data = array();        
           $data['access_token'] = $newtoken;
           $this->db->update('socmed_fb_accounts', $data, array('uid' => mysql_escape_string($uid)));
                      
           $status = 1;
        } catch (Exception $e) {
           $status = 0; 
        }
        
        return $status;        
    }
    
    function fb_page_token_update($arrpage=array(), $arrtoken=array()){
             
             try{
                 foreach($arrpage as $key=>$v){
                   foreach($v as $key2=>$v2){                                                      
                           $data = array();        
                           $data['access_token'] = $v2['access_token'];
                           $this->db->update('socmed_fb_page_accounts', $data, array('entity_id' => $this->my_entity_id() , 'parent_fb_id' => $key, 'page_id' => $key2 ));
                   }
                 }
             } catch (Exception $e) {
                  
             }
             
    }
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('user_group');
                     $this->db->where('entity_id', $v);
                     $this->db->delete($table);
             }
    }

}

?>