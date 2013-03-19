<?php

class Commentmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_comment_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('mod_comments');             
             $this->db->order_by("id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_comment_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_comments');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function get_final_list($data){
             $newarr = array();
             $in = array();
             foreach($data as $v){
                     $in[]=$v->comment_to;
             }
             
             $this->db->select('entity_id,name');
             $this->db->from('mod_finalist');             
             $this->db->where_in('entity_id', $in);
             
             $query = $this->db->get();
            /* echo $this->db->last_query();
             print_r($query->result());die();*/
                          
             foreach($query->result() as $v2){
                     $newarr[$v2->entity_id] = $v2->name;
             }             
             
             return $newarr;             
    }
    
    function get_all_comment_field($id){
             $this->db->select('*');
             $this->db->from('mod_comments');
             $this->db->where('id',$id); 
             $query = $this->db->get();
             return $query->result();
    }
    
    
   
    function update($id)
    {
        $data = array();
        
      foreach($id as $v){
         //print_r($v);die();
         $data['publish'] = 1;
         $this->db->update('mod_comments', $data, array('id' => mysql_escape_string($v)));
         //$this->db->last_query();die();
      }
    }
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('mod_comments');
                     $this->db->where('id', $v);
                     $this->db->delete($table);
             }
    }

}

?>