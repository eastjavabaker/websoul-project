<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Develious_fb {
		
		
		private $CI;
		
		public function __construct(){
                   
                    $this->CI = &get_instance();
		    $this->CI->load->library('facebook',array(
                        'appId'  => $this->CI->config->item('facebook_application_id'),
                        'secret' => $this->CI->config->item('facebook_secret_key'),
			'domain'=> $this->CI->config->item('domain'),
                        'cookie' => false,
                     ));
                }
		
		private function fb(){
		    $fb = new Facebook(array(
        'appId'  => $this->CI->config->item('facebook_application_id'),
        'secret' => $this->CI->config->item('facebook_secret_key'),
	'domain'=> $this->CI->config->item('domain'),
        'cookie' => false,));
		     return $fb;
	        }
		
		public function get_access_token(){
	                   $facebook = $this->fb();
	                   $access_token = $facebook->getAccessToken();
	     
	                   return $access_token;
	        }
		

	public function get_uid(){
	     $facebook = $this->fb();
             $uid = $facebook->getUser();
	     
	     return $uid;	     
	}
	
	
	public function stream_post($name='', $message='', $desc='', $picture = '', $to='me'){
		 
		 $facebook = $this->fb();		 
		 $attachment = array('name' => $name, 
 'message' => $message,
 'description' => $desc,
 'picture' => $picture, 
 'access_token' => $this->get_access_token()
 );

			     try {
			        $facebook->api('/'.$to.'/feed', 'POST', $attachment);
			        //echo 'result=1';
			     } catch(FacebookApiException $e) {
			         echo $e->getMessage();
			     }

		
	}
	
	public function get_login_url($url) {
	     $facebook = $this->fb();
	     $params = array(
  'scope' => 'email,user_likes,user_activities,publish_actions,publish_stream',
  'redirect_uri' => $url
);

             $loginUrl = $facebook->getLoginUrl($params);
	     return $loginUrl;
	}
	
	
	public function get_logout_url($url){
	     $facebook = $this->fb();
	     $params = array( 'next' => $url );
             $logouturl = $facebook->getLogoutUrl($params); // $params is optional.
	     return $logouturl;
	}
	
	
	public function get_fql($fqlquery){
	$facebook = $this->fb();
	       //Create Query
	$params = array(
	    'method' => 'fql.query',
	    'query' => "$fqlquery",
	    'access_token' => $this->get_access_token()
	);

	//Run Query
	$result = $facebook->api($params);
	      
	      return $result;
	
	}
		
		
		
}


?>