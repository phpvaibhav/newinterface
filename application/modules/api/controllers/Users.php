<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Users extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    function userList_post(){
        
        $authCheck = $this->check_service_auth();
        $authToken = $this->authData->authToken;
        $userId = $this->authData->id;
        $userType = $this->authData->userType;
        $this->load->helper('text');
        $this->load->model('user_model');
        ($userType ==1)?$this->service_model->set_data(array('userType'=>1)):"";
        $list = $this->user_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img src='.make_user_img_url($serData->profileImage).' alt="user profile" width="65%">';
        $row[] = display_placeholder_text($serData->fullName); 
        $row[] = display_placeholder_text($serData->email); 
        $row[] = display_placeholder_text($serData->contactNumber); 
        $row[] = display_placeholder_text($serData->statusShow); 
         
            $link  ='javascript:void(0)';
            $action .= "";
        if($serData->statusShow){

            $action .= '<a href="'.$link.'" onclick="statusChangeuser(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }else{
             $action .= '<a href="'.$link.'" onclick="statusChangeuser(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>';
        }
          /*  $action .= '<a href="'.$link.'" onclick="statusChange(this);" data-message="You want to change status!" data-serid="'.encoding($serData->serviceId).'" data-sid="'.encoding($applyStatus).'"  class="on-default edit-row table_action" title="View user">'.$applyMsg.'</a>';*/
               
            // $clk_edit =  "editFn('admin/categoryCtrl','editGenres','$usersData->id');" ;
            // $action .= '<a href="javascript:void(0)" onclick="'.$clk_edit.'" class="on-default edit-row table_action" title="Edit Event"><i class="fa fa-pencil-square-o"></i></a>';          

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user_model->count_all(),
            "recordsFiltered" => $this->user_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    } //End Function
    function changeStatus_post(){
        $userId  = decoding($this->post('use'));
    
        $where = array('serviceId'=>$serviceId);
         $dataExist=$this->common_model->is_data_exists('users',$where);
        if($dataExist){
            $status = $dataExist->status ?0:1;
             $dataExist=$this->common_model->updateFields('users',array('status'=>$status),$where);
                $response = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(200));
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
   


}//End Class 

