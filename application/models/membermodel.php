<?php

class Membermodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_member_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('mod_members');
             $this->db->where("name <> '-' and name is not NULL ", NULL);
             $this->db->order_by("post_date", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_member_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_members');
             $this->db->where("name <> '-' and name is not NULL ", NULL);
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function insert_allow_apps($arr=array())
    {
        
        //print_r($arr);exit();
        $data = array();
        
        $arrdate = explode('/', $arr[0]['birthday_date']);
        
        $data['fb_uid'] = $arr[0]['uid'];
        $data['name'] = $arr[0]['name'];
        //$data['phone'] = $arr[0][''];
        $data['email'] = $arr[0]['email'];
        $data['gender'] = $arr[0]['sex'];
        $data['birthdate'] = $arrdate[2].'-'.$arrdate[0].'-'.$arrdate[1];
        $data['hometown'] = serialize($arr[0]['hometown_location']);
        $data['education'] = serialize($arr[0]['education']);
        $data['work'] = serialize($arr[0]['work']);
        $data['current_location'] = serialize($arr[0]['current_location']);
        $data['pic1'] = $arr[0]['pic'];
        $data['pic2'] = $arr[0]['pic_square_with_logo'];
        $data['devices'] = serialize($arr[0]['devices']);
        $data['yourtext'] = $this->input->post('text');
        $data['post_date'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_members', $data);
      
    }
    
    function insert($img="")
    {
        $data = array();        
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $data['publish'] = $this->input->post('publish');
        $data['fb_uid'] = $this->input->post('editor');
        if($img){
           $data['picture'] = $img;
        }
        $data['post_date'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_members', $data);
      
    }
    
   
    function get_all_member_field($id){
             $this->db->select('*');
             $this->db->from('mod_members');
             $this->db->where('fb_uid',$id); 
             $query = $this->db->get();
             return $query->result();
    }   
    
    
    function get_all_member_field2($id){
             $this->db->select('*');
             $this->db->from('mod_members');
             $this->db->where('fb_uid',$id);
             $this->db->where("name <> '-' and name is not NULL ", NULL);
             $query = $this->db->get();
             return $query->result();
    }
    
    function update($id, $img)
    {
        
        $data = array();        
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['email'] = $this->input->post('email');
        $this->db->update('mod_members', $data, array('fb_uid' => mysql_escape_string($id)));
        
    }
    
    function update2($id)
    {
        
        $data = array();        
        $data['yourtext'] = $this->input->post('text');
        $this->db->update('mod_members', $data, array('fb_uid' => mysql_escape_string($id)));
        
    }
    
    
    function update3($id)
    {
        $friendlist = $this->input->post('friendlist');
        $n = $this->input->post('qty');
        $arrfriend = explode(",", $friendlist);
        $data = array();
        for($i=0;$i<$n;$i++){
           $data['friend'.($i+1)] = $arrfriend[$i];
        }
        $this->db->update('mod_members', $data, array('fb_uid' => mysql_escape_string($id)));
        
    }
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('mod_members');
                     $this->db->where('fb_uid', $v);
                     $this->db->delete($table);
             }
    }

}

?>