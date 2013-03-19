<?php

class Articlemodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_article_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('mod_articles');             
             $this->db->order_by("id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_article_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('mod_articles');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function get_all_article_category_list(){             
             $this->db->select('*');
             $this->db->from('ref_articles_categories');             
             $this->db->order_by("category", "asc");
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_article_category_list($page, $pagenumber){
             
             $this->db->select('*');
             $this->db->from('ref_articles_categories');             
             $this->db->order_by("id", "desc");
             $this->db->limit($pagenumber, $page);
             $query = $this->db->get();
             return $query->result();
    }
    
    function get_count_article_category_list(){
             $this->db->select("count(1) as 'num'");
             $this->db->from('ref_articles_categories');
             $query = $this->db->get(); $num = 0;
             foreach($query->result() as $v){
                     $num = $v->num;
             }
             return $num;
    }
    
    function insert($img="")
    {
        $data = array();        
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('txtcontent');
        $data['publish'] = ($this->input->post('publish'))?$this->input->post('publish'):0;
        $data['seo_title'] = $this->input->post('seotitle');
        $data['short_content'] = $this->input->post('txtsortcontent');
        $data['meta_description'] = $this->input->post('meta_desc');
        $data['meta_keyword'] = $this->input->post('meta_key');
        if($img){
           $data['picture'] = $img;
        }
        $data['publish_date_from'] = $this->input->post('yearfrom')."-".$this->input->post('monthfrom')."-".$this->input->post('dayfrom');
        $data['publish_date_to'] = $this->input->post('yearto')."-".$this->input->post('monthto')."-".$this->input->post('dayto');
        $data['post_date'] = date('Y-m-d H:i:s');
        $this->db->insert('mod_articles', $data);
      
    }
    
   
    function get_all_article_field($id){
             $this->db->select('*');
             $this->db->from('mod_articles');
             $this->db->where('id',$id); 
             $query = $this->db->get();
             return $query->result();
    }
    
    function update($id, $img="")
    {
        
        $data = array();        
        $data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('txtcontent');
        $data['publish'] = $this->input->post('publish');
        $data['seo_title'] = $this->input->post('seotitle');
        $data['short_content'] = $this->input->post('txtsortcontent');
        $data['meta_description'] = $this->input->post('meta_desc');
        $data['meta_keyword'] = $this->input->post('meta_key');
        if($img){
           $data['picture'] = $img;
        }
        $data['publish_date_from'] = $this->input->post('yearfrom')."-".$this->input->post('monthfrom')."-".$this->input->post('dayfrom');
        $data['publish_date_to'] = $this->input->post('yearto')."-".$this->input->post('monthto')."-".$this->input->post('dayto');
        $this->db->update('mod_articles', $data, array('id' => mysql_escape_string($id)));
        
    }
    
    function delete($id)
    {
             foreach($id as $v){                     
                     $table = array('mod_articles');
                     $this->db->where('id', $v);
                     $this->db->delete($table);
             }
    }
    
    function update_article_category($article_id = 0){
             $table = array('mod_articles');
             $this->db->where('id', $v);
             $this->db->delete($table);
             
             
    }
    

}

?>