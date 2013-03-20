<?php

class Subscribemodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_subscribe_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('mod_tickets');             
             $this->db->order_by("created", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_subscribe_export($datefrom, $dateto){
             
             $this->db->select('*');
             $this->db->from('mod_tickets');
             $this->db->where('created BETWEEN "'. date('Y-m-d H:i:s', strtotime($datefrom." 00:00:00")). '" and "'. date('Y-m-d H:i:s', strtotime($dateto." 23:59:59")).'"');
             $this->db->order_by("created", "desc");
             $query = $this->db->get();
             //echo $this->db->last_query();
             return $query->result();
    }
    
    function get_all_subscribe_list(){
             
             $this->db->select('*');
             $this->db->from('mod_tickets');             
             $this->db->order_by("created", "desc");
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_subscribe_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_tickets');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
   
    function get_all_subscribe_field($id){
             $this->db->select('*');
             $this->db->from('mod_tickets');
             $this->db->where('fbuid',$id); 
             $query = $this->db->get();
             return $query->result();
    }
    
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('mod_tickets');
                     $this->db->where('fbuid', $v);
                     $this->db->delete($table);
             }
    }

}

?>