<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "vendor/autoload.php"; //php smtp mailer library
//require  "vendor/autoload.php"; //php smtp mailer library
use \Twilio\Rest\Client;
class Text_sms{

    protected $CI;
  
            
      
   
    
    public function __construct(){

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
  
    }

     function sendSMS($phoneNumber,$body) {
		 
          // Your Account SID and Auth Token from twilio.com/console
		
			$sid = 'ACf4059030ad8a95cc237663c045eaa105'; //Rservision
			$token = '6614e44bf73e8457cb33e0cf1f2fe766';//Rservision
            $fromNumber = "+19726656359";//Rservision
            $client = new Client($sid, $token);
           
            // Use the client to do fun stuff like send text messages!
            try {
            $result =$client->messages->create(
                // the number you'd like to send the message to
                $phoneNumber,
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    "from" => $fromNumber,
                    // the body of the text message you'd like to send
                    'body' => $body
                   
                )
            );
              if(isset($result)){
                switch ($result->status) {
                    case 'queued':
                     $responce = array('status'=>SUCCESS,'message'=>'The '.$phoneNumber.' number  is sms sent successfully.','result'=>$fromNumber);
                        break;
                    case 'sent':
                     $responce = array('status'=>SUCCESS,'message'=>'The '.$phoneNumber.' number  is sms sent successfully.','result'=>$fromNumber);
                        break;
                    case 'delivered':
                     $responce = array('status'=>SUCCESS,'message'=>'The '.$phoneNumber.' number  is sms sent successfully.','result'=>$fromNumber);
                        break;
                     case 'undelivered':
                     $responce = array('status'=>SUCCESS,'message'=>'The '.$phoneNumber.' number  is sms sent successfully.','result'=>$fromNumber);
                        break;
                    
                    default://failed
                        $responce = array('status'=>FAIL,'message'=>'The '.$phoneNumber.' number  is sms sent failed/');
                        break;
                }
            }
        }catch (Exception $e) {
        // If a 404 exception was encountered return false.
        
            // print_r($e->getTrace()[0]['args'][0]->getContent());
            if($e->getStatusCode() == 400) {
                $responce = array('status'=>FAIL,'message'=>$e->getMessage());
            } else {
                $responce = array('status'=>FAIL,'message'=>$e->getMessage());
            // throw $e;
            }
        }
         
        return $responce;
    }

}
