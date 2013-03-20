<?php

class Contactmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_contact_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('mod_contact');             
             $this->db->order_by("id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_contact_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_contact');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function insert($fbuid=0)
    {
        $data = array();        
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['msg'] = $this->input->post('pesan');
        $data['fbuid'] = $fbuid;
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_contact', $data);
      
    }

    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('mod_contact');
                     $this->db->where('id', $v);
                     $this->db->delete($table);
             }
    }

}

?>