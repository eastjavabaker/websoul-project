<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facebookc extends CI_Controller {

        
         
        function __construct()
	{
		parent::__construct();
		 $this->load->model('Facebookmodel');
		 $this->load->library('curl');
                 $this->load->library('facebook',array(
                        'appId'  => $this->config->item('facebook_application_id'),
                        'secret' => $this->config->item('facebook_secret_key'),
                        'cookie' => true,
                 ));
		
                 if(!$this->session->userdata('username_session'))
		 {
			redirect('/login');
		 }
		 
	}
	
	private function fb(){
		$fb = new Facebook(array(
        'appId'  => $this->config->item('facebook_application_id'),
        'secret' => $this->config->item('facebook_secret_key'),
        'cookie' => true,));
		return $fb;
	}
	
       
	public function ajax_post_fb_account()
	{	     
	     
	     $status = $this->Facebookmodel->insert_main_fb_account(mysql_escape_string($this->input->post('uid')), mysql_escape_string($this->input->post('name')), mysql_escape_string($this->input->post('token')), mysql_escape_string($this->input->post('pic')));
	     
	     if($status==1){
		  
		  $this->Facebookmodel->insert_main_fb_page($this->get_pages_list());
		  
	     }
	     echo $status;
	}
	
	
	public function testpage(){
		
		//echo $this->Facebookmodel->insert_main_fb_page($this->get_pages_list());
		
	}
	
	private function ajax_get_fb_data_account($status=-1){
	       return $this->Facebookmodel->get_main_fb_account($status);	       
	}
	
	
	private function get_pages()
   {
        
	$fb = $this->fb();
	
	//setcookie('fbs_'.$this->config->item('facebook_application_id'), '', time()-100, '/', 'localhost');
	
	$fan_pages = array();
	//print_r($this->ajax_get_fb_data_account());exit();
	foreach($this->ajax_get_fb_data_account(1) as $v){ // start fb account loop


    $temp_pages = $fb->api('/'.$v->uid.'/accounts','GET',array('access_token'=>$v->access_token));
    
    if(count($temp_pages['data']) > 0)
    {
        foreach($temp_pages['data'] as $page)
        {
            if($page["category"] != "Application"){
                $fan_pages[$v->uid.''][$page['id']]['access_token'] = $page['access_token'];
                $fan_pages[$v->uid.''][$page['id']]['name']=$page['name'];
                $fan_pages[$v->uid.''][$page['id']]['picture']=(isset($page['picture']))?$page['picture']:"";
                $fan_pages[$v->uid.''][$page['id']]['category']=$page['category']; }
        }
    }
         
	} //----------------------- end fb account loop ---- 
	 
        return $fan_pages;
    }
	
	
	private function get_pages_list()
	{   
	   return $this->get_pages();	   
        }
	
	
	public function ajax_set_new_token(){
		$status = 0;
		try{
			$uid = $this->input->post('uid');
			$access_token = $this->input->post('token');
			//print_r($this->input->post());
			$status = $this->Facebookmodel->fb_account_token_update($uid, $access_token);
			
			if($status==1){
				$statuspage = $this->Facebookmodel->fb_page_token_update($this->get_pages_list());
			}
			
			//print_r($this->input->post());
		} catch (Exception $e) {
			$status = $e->getMessage();
		}
		echo $status;
	}
	

public function cek(){
	

	$app_id = $this->config->item('facebook_application_id');
        $app_secret = $this->config->item('facebook_secret_key'); 
        $my_url = site_url('facebookc/cek');
	
	
	$access_token = "AAAFLAxHghtwBADnuEyg1FUzdsiHOIygBL6GsBmyjfUBvmgaoZCQqBKR3SZBJwWppGUouZATmiUXBZBfCKrNrPeBUOZAo1NKXFD9e01TMzDgztUsRBPx9q";

  $code = @$_GET["code"];
    
  // If we get a code, it means that we have re-authed the user 
  //and can get a valid access_token. 
  if (isset($code)) {
    $token_url="https://graph.facebook.com/oauth/access_token?client_id="
      . $app_id . "&redirect_uri=" . urlencode($my_url) 
      . "&client_secret=" . $app_secret 
      . "&code=" . $code . "&display=popup";
    $response = file_get_contents($token_url);
    $params = null;
    parse_str($response, $params);
    $access_token = $params['access_token'];
  }

        
  // Attempt to query the graph:
  $graph_url = "https://graph.facebook.com/me?"
    . "access_token=" . $access_token;
  $response = $this->curl_get_file_contents($graph_url);
  $decoded_response = json_decode($response);
    
  //Check for errors 
  if (@$decoded_response->error) {
  // check to see if this is an oAuth error:
    if ($decoded_response->error->type== "OAuthException") {
      // Retrieving a valid access token. 
      $dialog_url= "https://www.facebook.com/dialog/oauth?"
        . "client_id=" . $app_id 
        . "&redirect_uri=" . urlencode($my_url);
      echo("<script> top.location.href='" . $dialog_url 
      . "'</script>");
    }
    else {
      echo "other error has happened";
    }
  } 
  else {
  // success
    echo("success" . @$decoded_response->name);
    echo($access_token);
  }
	
}

	
  private function curl_get_file_contents($URL) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_URL, $URL);
    $contents = curl_exec($c);
    $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
    curl_close($c);
    if ($contents) return $contents;
    else return FALSE;
  }
  
  public function post_upload($path, $message, $fb_id=0){
		//print_r($this->input->post());exit();
		$facebook = new Facebook(array(
        'appId'  => $this->config->item('facebook_application_id'),
        'secret' => $this->config->item('facebook_secret_key'),
        'cookie' => true,));
		
		$facebook->setFileUploadSupport(true);
                $args = array('message' => $message, 'access_token' => 'AAAFLAxHghtwBAOa8TMaVN5A9e5MIbhjUR1tqaAZCthx2krXRZAfbvf0zQKdheppTyy6G4mpZB1T6AOeyNh4zZA23wcizhCJ8uJL2fMSi2uRquzmSAABw');
                $args['image'] = '@' . realpath($path);

                $data = $facebook->api('/149251038471792/photos', 'post', $args);
                print_r($data);
	}
  
  public function post_stream(){
	   
	   $my_url = site_url('facebookc/stream');	
	   $mymessage = $this->input->post('post_stream');
	   $date = $this->input->post('txtdate');
	   $time = $this->input->post('txttime');
	   $arrpage = $this->input->post('sel_page');
	   
	   
	   if($_FILES['f_upload']){
	
	        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/socialnesia/data/img_uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('f_upload'))
		{
			$info = array('error' => $this->upload->display_errors());

			//print_r($error);
		}
		else
		{
			$info = array('upload_data' => $this->upload->data());
                        
			$this->post_upload($config['upload_path'].$_FILES['f_upload'], $mymessage);
			//print_r($data);
		}
	
	 
	   }else{
	 
	 $fb = $this->fb();
	 $app_id = $this->config->item('facebook_application_id');
         $app_secret = $this->config->item('facebook_secret_key'); 
         
         
	 //echo "message : ".$mymessage;
	 
	 foreach($arrpage as $pi){
	 
	 $page_id = $pi;	 
	 $arrtoken = $this->Facebookmodel->get_page_token($page_id);
	 $page_access_token = $arrtoken[0]->access_token;

	 $sendcontent = array( 'message' => $mymessage );
	 
	 
	 $status = $this->curlmessage($sendcontent, $page_id, $page_access_token);

	 /*$status = $this->curlmessage(array( 'message'	 => 'The status header',
						  'link'		=> 'http://theurltopoint.to',
						  'picture'	 => 'http://thepicturetoinclude.jpg',
						  'name'		=> 'Name of the picture, shown just above it',
						  'description' => 'Full description explaining whether the header or the picture' ) );*/
	 
	 $d = json_decode($status);
	 //print_r($d);
	 if(isset($d->error->message)){
		echo $d->error->message;
	 }else{
		$data['stream_id'] = $d->id;
		$data['message'] = $mymessage;
		$data['publish_at'] = $date;
		$this->Facebookmodel->post_fb_stream($data);
		
	 }
	 
	 
	 
	 }
	 
	 
	 }
	 //$data['stream_id'] = ;
	 
	 //echo $status;
  
  }
  	 
	/**
	 * Constructor, sets the url's
	 */
	private function post_url($pageid)
	{
		return 'https://graph.facebook.com/'.$pageid.'/feed';
	}
 
	/**
	 * Manages the POST message to post an update on a page wall
	 *
	 * @param array $data
	 * @return string the back-end response
	 * @private
	 */
        private function curlmessage($data, $pageid, $pageaccess)
	{
		// need token
		$data['access_token'] = $pageaccess;
 
		// init
		$ch = curl_init();
 
		curl_setopt($ch, CURLOPT_URL, $this->post_url($pageid));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $contents = curl_exec($ch);
                $err  = curl_getinfo($ch,CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($contents) return $contents;
                else return FALSE;
	}
 
        public function ajax_select_page_list(){
		        $select = "<select name='sel_page' size='5' multiple='multiple' id='select'>";
			foreach($this->Facebookmodel->get_main_fb_page(1) as $v){
				   $select .= "<option value='".$v->page_id."'>".$v->page_name."</option>";
			}
			$select .= "</select>";
			echo $select;
	}
	
	
	public function test123(){

$facebook   =   $this->fb();
 
$status      =   "Sample Status";
$pageid      =   XXXXXXXXX; 
   try {
      $status = $facebook->api_client->users_setStatus($status, $pageid);
   }
       catch(Exception $o ){
         print_r($o);
   }
 
/*if you want to publish wall post in facebook page, then you have to use another method and remember for this method call you've set your user id and session key, here i just shown how to publish status using stream_publish method, but you can also publish video, image as wall post using stream_publish method
$user = your user id and $session_key = your facebook session key, you can obtain them by
$user = $_REQUEST['fb_sig_user'];
$session_key = $_REQUEST['fb_sig_session_key'];
And don't forget to save them in database, because you'll need them when you will use cron.php from offline
*/
        try {
               $facebook->set_user($user, $session_key);
               $facebook->api_client->stream_publish($status, null, null,  $item['pageid']);
        }
                catch(Exception $o ){
                   print_r($o);
                }
	}
	
}

