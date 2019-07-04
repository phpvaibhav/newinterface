<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
      //  $this->load->model('admin_model');
    }

    public function index() { 
        
        $data['title'] = "Service";
        $this->load->admin_render('service', $data);
    } 
    public function add_service() { 
        
        $data['title'] = "Service";
        $this->load->admin_render('add_service', $data);
    }
   
}