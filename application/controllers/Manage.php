<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Manage extends Common_Front_Controller {
 
    /**
     * load list modal 
     */
     function __Construct(){
       parent::__Construct();
			$this->load->library('smtp_email');
			$this->load->library('background');
     }
	
	function mailSent(){
		//die("hii");
		$email 		= trim($this->input->post('email'));
		$subject 	= trim($this->input->post('subject'));
		$path 		= trim($this->input->post('path'));
		$data 		= $this->input->post('msg');
		$message 	= $this->load->view('email/'.$path,$data,TRUE);
		$response=$this->smtp_email->send_mail($email,$subject,$message); 
		log_event($response,'background_log.txt');  //create log of notifcation
	}//ENd FUnction
	
}
?>
