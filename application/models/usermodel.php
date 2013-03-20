<?php

class Usermodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    
    function get_user_profile($user_entity_id){
             $this->db->select('*');
             $this->db->where('user_entity_id', $user_entity_id);
             $query = $this->db->get('sys_user_profiles');
             return $query->result();
    }
    
    function get_user_list($page, $pagenumber){
             $this->db->select('sys_user_entity.entity_id, sys_user_entity.email, sys_user_entity.status, sys_user_profiles.contact_person, sys_user_profiles.company, sys_user_profiles.city, sys_user_profiles.created, sys_user_group.group_name, sys_user_status_description.status_name');
             $this->db->from('sys_user_entity');
             $this->db->join('sys_user_profiles', 'sys_user_profiles.user_entity_id = sys_user_entity.entity_id', 'INNER');
             $this->db->join('sys_user_group', 'sys_user_group.entity_id = sys_user_entity.group_entity_id', 'INNER');
             $this->db->join('sys_user_status_description', 'sys_user_status_description.entity_id = sys_user_entity.status', 'INNER');
             $this->db->order_by("entity_id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_user_list(){             
             $this->db->select("count(1) as 'num'");
             $this->db->from('sys_user_entity');
             $query = $this->db->get();
             $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function get_group_list(){
             $this->db->select('entity_id, group_name');
             $this->db->from('sys_user_group');
             $this->db->order_by("entity_id", "asc"); 
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_status_list(){
             $this->db->select('entity_id, status_name');
             $this->db->from('sys_user_status_description');
             $this->db->order_by("entity_id", "asc"); 
             $query = $this->db->get();
             return $query->result();
    }
    
    function insert()
    {
        $this->db->trans_begin();
        
        $data = array();        
        $data['full_name'] = $this->input->post('f_contact_person');
        $data['email'] = $this->input->post('f_email');
        $data['password'] = $this->encrypt->sha1(mysql_escape_string(trim($this->input->post('f_password'))));
        $data['group_entity_id'] = $this->input->post('sel_group_id');
        $data['status'] = $this->input->post('sel_status_id');
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('sys_user_entity', $data);
        
        $data = array();
        $data['user_entity_id'] = $this->db->insert_id();
        $data['company'] = $this->input->post('f_company');
        $data['company_address'] = $this->input->post('f_company_address');
        $data['city'] = $this->input->post('f_city');
        $data['contact_person'] = $this->input->post('f_contact_person');
        $data['department'] = $this->input->post('f_department');
        $data['phone'] = $this->input->post('f_phone');
        $data['mobile_phone'] = $this->input->post('f_mobile_phone');
        $data['position'] = $this->input->post('f_position');
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert('sys_user_profiles', $data);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
        
    }
    
    function get_all_user_field($id){
             $this->db->select('sys_user_entity.entity_id, sys_user_entity.email, sys_user_entity.group_entity_id, sys_user_entity.status, sys_user_profiles.contact_person, sys_user_profiles.company, sys_user_profiles.city, sys_user_profiles.position, sys_user_profiles.created, sys_user_profiles.company_address, sys_user_profiles.department, sys_user_profiles.phone, sys_user_profiles.mobile_phone, sys_user_group.group_name, sys_user_status_description.status_name');
             $this->db->from('sys_user_entity');
             $this->db->join('sys_user_profiles', 'sys_user_profiles.user_entity_id = sys_user_entity.entity_id', 'INNER');
             $this->db->join('sys_user_group', 'sys_user_group.entity_id = sys_user_entity.group_entity_id', 'INNER');
             $this->db->join('sys_user_status_description', 'sys_user_status_description.entity_id = sys_user_entity.status', 'INNER');
             $this->db->where('sys_user_entity.entity_id',$id); 
             $query = $this->db->get();
             return $query->result();
    }
    
    function update($id)
    {
        
        $data = array();        
        $data['full_name'] = $this->input->post('f_contact_person');
        $data['email'] = $this->input->post('f_email');
        if($this->input->post('f_password')){
           $data['password'] = $this->encrypt->sha1(mysql_escape_string(trim($this->input->post('f_password'))));
        }        
        if($this->input->post('sel_group_id')){
           $data['group_entity_id'] = $this->input->post('sel_group_id');
        }
        
        if($this->input->post('sel_status_id')){
           $data['status'] = $this->input->post('sel_status_id');
        }
        
        $data['modified'] = date('Y-m-d H:i:s');
        
        $this->db->trans_begin();
         
        $this->db->update('sys_user_entity', $data, array('entity_id' => mysql_escape_string($id)));
        
        $data = array();
        $data['company'] = $this->input->post('f_company');
        $data['company_address'] = $this->input->post('f_company_address');
        $data['city'] = $this->input->post('f_city');
        $data['contact_person'] = $this->input->post('f_contact_person');
        $data['department'] = $this->input->post('f_department');
        $data['phone'] = $this->input->post('f_phone');
        $data['mobile_phone'] = $this->input->post('f_mobile_phone');
        $data['position'] = $this->input->post('f_position');
        $data['modified'] = date('Y-m-d H:i:s');
       
        $this->db->update('sys_user_profiles', $data, array('user_entity_id' => mysql_escape_string($id)));
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
        
    }
    
    function delete($id)
    {
             foreach($id as $v){
                     $this->db->trans_begin();
                
                     $table1 = array('sys_user_profiles');
                     $this->db->where('user_entity_id', $v);
                     $this->db->delete($table1);
                     
                     $table2 = array('sys_user_entity');
                     $this->db->where('entity_id', $v);
                     $this->db->delete($table2);
                     
                     if ($this->db->trans_status() === FALSE)
                     {
                         $this->db->trans_rollback();
                     }
                     else
                     {
                         $this->db->trans_commit();
                     }
             }
    }

}

?>