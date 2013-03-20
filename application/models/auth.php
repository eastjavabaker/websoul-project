<?php

class Auth extends CI_Model {

  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function validate_login($email, $password)
    {
                
        //echo $this->encrypt->sha1(mysql_escape_string(trim($password))); exit();
        
        $this->db->select('entity_id, full_name, email, password, group_entity_id');
        $this->db->where('email', mysql_escape_string(trim($email)));
        $this->db->where('password', $this->encrypt->sha1(mysql_escape_string(trim($password))));
        $this->db->where('status', 1);
        $query = $this->db->get('sys_user_entity');
        
        if($query->result()){
            $profile = array();
            foreach($query->result() as $v){
                $this->session->set_userdata('username_session', $v->full_name);
                $this->session->set_userdata('username_email', $v->email);
                $this->session->set_userdata('username_group', $v->group_entity_id);
                
                $this->load->model('Usermodel');
                $profile = $this->Usermodel->get_user_profile($v->entity_id);
            }
            
            foreach($profile as $v2){
                    $data_profile = array(
                                    'userprofile_id' => $v2->user_entity_id,
                                    'userprofile_company' => $v2->company,
                                    'userprofile_company_address' => $v2->company_address,
                                    'userprofile_city' => $v2->city,
                                    'userprofile_phone' => $v2->phone,
                                    'userprofile_mobile_phone' => $v2->mobile_phone
                    );
                    $this->session->set_userdata('userprofile', $data_profile);
            }
            
            
                        
            return true;
        }else{
            return false;
        }
    }
    
    function modules_privillages(){
                    
    }
    

}

?>