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
    public function serviceDetail() { 
        
        $data['title'] = "Service";
        $serviceId  = decoding($this->uri->segment(3));

        $service = $this->common_model->getsingle('service',array('serviceId'=>$serviceId));
       
        if(empty($service)){
            redirect('service');
        }
        $data['service'] = $service;
        $data['images'] = $this->common_model->getAll('images',array('serviceId'=>$serviceId));
        $this->load->admin_render('serviceDetail', $data);
    }
   
}