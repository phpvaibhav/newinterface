<?php 
 /**
 * 
 */
 class Test extends CI_Controller
 {
  
  function __construct()
  {
    parent::__construct();
  }

  function test(){
    $this->load->library('background');
        $subject = 'New Service';
        $email   =  "php.vaibhav@gmail.com";
        $urlMail            = base_url()."manage/mailSent";
        $maildata['title'] ="test demo";
        $maildata['message'] ="mail send successfully";
        $paramMail = array('email' =>$email,'subject' =>$subject,'path'=>'email','msg'=>$maildata);

        $this->background->do_in_background($urlMail, $paramMail);
        echo "done";
  }
 }
 ?>