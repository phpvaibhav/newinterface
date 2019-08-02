<?php 
 /**
 * 
 */
 class Test extends CI_Controller
 {
  
  function __construct()
  {
    parent::__construct();
      ini_set("display_errors", "1");
        error_reporting(E_ALL);
  }

  function index(){
   $subject = 'New Service';
        $email   =  "vaibhavsharma.otc@gmail.com";
        $urlMail            = base_url()."manage/mailSent";
        $maildata['full_name'] ="test demo";
        $maildata['title'] ="test demo";
        $maildata['message'] ="mail send successfully";
      
            $message=$this->load->view('emails/forgot_password',$maildata,TRUE);

            $subject = "Forgot Password";

            $this->load->library('smtp_email');
            $response=$this->smtp_email->send_mail($email,$subject,$message); // Send email For Forgot password
            print_r($response);
            if ($response)
            {  

                echo  "ES emailSend";
            }
            else
            { 
                  echo  "NS NotSend"; //NS NotSend
            }
  } 
  function test(){
    $this->load->library('background');
        $subject = 'New Service background';
        $email   =  "vaibhavsharma.otc@gmail.com";
        $urlMail            = base_url()."manage/mailSent";
        $maildata['title'] ="test demo";
        $maildata['message'] ="mail send successfully";
        $paramMail = array('email' =>$email,'subject' =>$subject,'path'=>'email','msg'=>$maildata);

        $s= $this->background->do_in_background($urlMail, $paramMail);print_r($s);
        echo "done";
  }
 }
 ?>