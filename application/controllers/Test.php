
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
 
    public function index()
    {
       error_reporting(E_ALL);
ini_set("display_errors", 1);
        $phoneNumber = "+919009585194";
       // $phoneNumber = "+918319990292";
        $text = "http://reservision.org check number";
         
			
            $this->load->library('text_sms');
            $response=$this->text_sms->sendSMS($phoneNumber,$text);
            
            echo json_encode($response); 
//~ $this->load->library('background');
//~ $url = base_url()."manage/textSms";
//~ $param = array('phoneNumber' => "9009585194",'countryCode' => "+91",'message'=>"test background" );
              
 
               //~ $this->background->do_in_background($url, $param);
               //~ echo "hiii";
    }
    function checkNumber(){
		  $this->load->library('text_sms');
		  $phoneNumber='+919009585194';
            $response=$this->text_sms->isValidNumber($phoneNumber);
            pr($response);
		
	}
 
  
}
//Qs+1OdHa!tiB
