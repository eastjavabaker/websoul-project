<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
     
         
        function __construct()
	{
		parent::__construct();
		$this->load->library('develious_fb');
	}
	
	private function fb(){
		$dev = new Develious_fb();
		return $dev;
	}
	
	public function index()
	{
	    
	    echo "Bould n Loud Frontend";
	    //$this->template->load('page/template', 'page/reg', $dta); 
	    
	}
	
	
}