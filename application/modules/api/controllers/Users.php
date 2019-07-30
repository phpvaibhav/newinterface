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
        ($userType ==1)?$this->user_model->set_data(array('userType'=>2)):"";
        $list = $this->user_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = '<img src='.base_url($serData->profileImage).' alt="user profile" style="height:50px;width:50px;" >';
        $row[] = display_placeholder_text($serData->fullName); 
        $row[] = display_placeholder_text($serData->email); 
        $row[] = display_placeholder_text($serData->contactNumber); 
        if($serData->status){
        $row[] = '<label class="label label-success">'.$serData->statusShow.'</label>';
        }else{ 
        $row[] = '<label class="label label-danger">'.$serData->statusShow.'</label>'; 
        } 
            $link  ='javascript:void(0)';
            $action .= "";
        if($serData->status){

            $action .= '<a href="'.$link.'" onclick="statusChangeuser(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-check" aria-hidden="true"></i></a>';
        }else{
             $action .= '&nbsp;&nbsp;<a href="'.$link.'" onclick="statusChangeuser(this);" data-message="You want to change status!" data-useid="'.encoding($serData->id).'"  class="on-default edit-row table_action" title="status"><i class="fa fa-times" aria-hidden="true"></i></a>';
        }
        $userLink = base_url().'users/userDetail/'.encoding($serData->id);
        $action .= '&nbsp;&nbsp;<a href="'.$userLink.'"  class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a>';
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
    
        $where = array('id'=>$userId);
         $dataExist=$this->common_model->is_data_exists('users',$where);
        if($dataExist){
            $status = $dataExist->status ?0:1;

             $dataExist=$this->common_model->updateFields('users',array('status'=>$status),$where);
              $showmsg  =($status==1)? "User request is Active" : "User request is Inactive";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
        public function changePassword_post()
    {

        $authCheck = $this->check_service_auth();
        $authToken = $this->authData->authToken;
        $userId = $this->authData->id;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('npassword', 'new password', 'trim|required|matches[rnpassword]|min_length[6]');
        $this->form_validation->set_rules('rnpassword', 'retype new password ','trim|required|min_length[6]');

        
       if($this->form_validation->run($this) == FALSE){
           $messages = (validation_errors()) ? validation_errors() : '';
           $response = array('status' => 0, 'message' => $messages);
        }
        else 
        {
            $password =$this->input->post('password');
            $npassword =$this->input->post('npassword');
            $select = "password";
            $where = array('id' => $userId); 
            $admin = $this->common_model->getsingle('users', $where,'password');
            if(password_verify($password, $admin['password'])){
                $set =array('password'=> password_hash($this->input->post('npassword') , PASSWORD_DEFAULT)); 
                $update = $this->common_model->updateFields('users', $set, $where);
                if($update){
                    $res = array();
                    if($update){
                        $response = array('status' =>SUCCESS, 'message' => 'Successfully Updated', 'url' => base_url('users/userDetail'));
                    }
                    else{
                         $response = array('status' => FAIL, 'message' => 'Failed! Please try again', 'url' => base_url('users/userDetail'));
                        
                    }
                    
                } 
            }else{
                 $response = array('status' =>FAIL, 'message' => 'Your Current Password is Wrong !', 'url' => base_url('users/userDetail'));                 
            }
        }
       $this->response($response);
    }//End Function
    function updateUser_post(){
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('fullName', 'full Name', 'trim|required|min_length[2]');
        
     /*   if (empty($_FILES['profileImage']['name'])) {
            $this->form_validation->set_rules('profileImage', 'profile image', 'trim|required');
        }*/
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }
        else{
        
            $userid          =  $this->post('userauth');
            $userauth          =  decoding($userid);
            $email          =  $this->post('email');
            $fullName       =  $this->post('fullName');
          
            $isExist = $this->common_model->is_data_exists('users',array('id'=>$userauth));
            if($isExist){
                $isExistEmail = $this->common_model->is_data_exists('users',array('id  !='=>$userauth,'email'=>$email));
                if(!$isExistEmail){
                    //update
                              //user info
                        $userData['fullName']           =   $fullName;
                        $userData['email']              =   $email;
                        $userData['contactNumber']      =   $this->post('contact');
                        //user info
                        // profile pic upload
                        $this->load->model('Image_model');

                        $image = array(); $profileImage = '';
                        if (!empty($_FILES['profileImage']['name'])) {
                        $folder     = 'users';
                        $image      = $this->Image_model->upload_image('profileImage',$folder); //upload media of Seller

                        //check for error
                        if(array_key_exists("error",$image) && !empty($image['error'])){
                            $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In user Image)'));
                           $this->response($response);die;
                        }

                        //check for image name if present
                        if(array_key_exists("image_name",$image)):
                            $profileImage = $image['image_name'];
                        endif;

                        }
                        if(!empty($profileImage)){
                            $userData['profileImage']           =   $profileImage;
                        }
                        
                    //update
                    $result = $this->common_model->updateFields('users',$userData,array('id'=>$userauth));
                   
                    if($result){
                        $response = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(123),'url'=>$userid);


                    }else{
                    $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118),'userDetail'=>array());
                    }  

                }else{
                    $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(117),'userDetail'=>array());
                }
              

            }else{
                $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(126),'userDetail'=>array()); 
            }
           
        
        }
         $this->response($response);
    }//end function
   


}//End Class 

