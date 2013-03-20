<?php

class Groupmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_group_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('sys_user_group');             
             $this->db->order_by("entity_id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_group_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('sys_user_group');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function insert()
    {
        $data = array();        
        $data['entity_id'] = $this->input->post('f_entity_id');
        $data['group_name'] = $this->input->post('f_group_name');
        $data['description'] = $this->input->post('f_description');
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('sys_user_group', $data);
      
    }
    
    function get_all_group_field($id){
             $this->db->select('*');
             $this->db->from('sys_user_group');
             $this->db->where('entity_id',$id); 
             $query = $this->db->get();
             return $query->result();
    }
    
    function update($id)
    {
        
        $data = array();        
        //$data['entity_id'] = $this->input->post('f_entity_id');
        $data['group_name'] = $this->input->post('f_group_name');
        $data['description'] = $this->input->post('f_description');
        //$data['created'] = date('Y-m-d H:i:s');

        $this->db->update('sys_user_group', $data, array('entity_id' => mysql_escape_string($id)));
        
    }
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('sys_user_group');
                     $this->db->where('entity_id', $v);
                     $this->db->delete($table);
             }
    }

}

?>