<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
     
    }

    public function index() { 
        
        $data['title'] = "Users";
        $this->load->admin_render('users', $data);
    } 
    public function add_user() { 
        
        $data['title'] = "Users";
        $this->load->admin_render('add_user', $data);
    }
     public function user_profile(){
        $userId  = decoding($this->post('use'));
        $data['title'] = "Profile";
        $where = array('id'=>$userId);
        $result = $this->common_model->getsingle('users',$where);
        $data['userData'] = $result;
        $this->load->admin_render('admin_profile', $data, '');
    }   
}