<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . "third_party/phpmailer/class.phpmailer.php"; //php smtp mailer library
class Smtp_email{

    protected $CI;
   
    var $host = 'outthinkcoders.com', //server hostname
        $from_mail = 'no-reply@outthinkcoders.com', 
        $pwd = 'EsEyCb7Tii2K', // email a/c password
        $port = 25, //or 25(depends or server email configuration)
        $from_name = 'Interface';
    
    public function __construct(){

        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->Host = $this->host;
        $this->mail->SMTPAuth = true;
       //$this->mail->SMTPSecure = "ssl";//
        $this->mail->Port = $this->port;
        $this->mail->Username = $this->from_mail;
        $this->mail->Password = $this->pwd;
        $this->mail->From = $this->from_mail;
        $this->mail->FromName = $this->from_name;
    }

    public function send_mail($to,$subject,$message){
        
        $this->mail->AddAddress($to); //change it to yours
        //$mail->AddReplyTo("mail@mail.com");
        $this->mail->IsHTML(true);        //keep this true to allow HTML in your mail body
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        
        if(!$this->mail->Send()){
            echo $this->mail->ErrorInfo; die;
            return FALSE;       // for debug-   $mail->ErrorInfo;
        }
        return TRUE;
    }
    
}
