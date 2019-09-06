<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//General service API class 
class Service extends Common_Service_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    // For service 
    function addService_post(){
        
        $authCheck = $this->check_service_auth();
        $authToken = $this->authData->authToken;
        $userId = $this->authData->id;
        $this->form_validation->set_rules('productName', 'product name', 'trim|required');
        $this->form_validation->set_rules('vendor', 'manufacture', 'trim|required');
        $this->form_validation->set_rules('modelName', 'model name', 'trim|required');
        $this->form_validation->set_rules('serialNumber', 'serial number', 'trim|required');
        $this->form_validation->set_rules('purchaseDate', 'date of purchase', 'trim|required');
        $this->form_validation->set_rules('faultDescription', 'fault description', 'trim|required');
        $this->form_validation->set_rules('contactNumber', 'contact number', 'trim|required');
    
        if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }
        else{
        	 $data_val = array();
        	 $data_val['productName'] 	= $this->post('productName');
        	 $data_val['vendor'] 		= $this->post('vendor');
             $data_val['modelName']        = $this->post('modelName');
        	 $data_val['serialNumber'] 	= $this->post('serialNumber');
        	 $purchaseDate 				= $this->post('purchaseDate');
        	 $data_val['purchaseDate'] 	= date('Y-m-d',strtotime($purchaseDate));
        	 $data_val['faultDescription'] 		= $this->post('faultDescription');
        	 $data_val['contactNumber'] = $this->post('contactNumber');
        	 $data_val['userId'] = $userId;
          
            // profile pic upload
            $this->load->model('image_model');
          
           $serviceImage = $images= array();
        //   pr($_FILES);
            if (!empty($_FILES['serviceImage']['name'])) {
                $folder     = 'service';
                $images      = $this->image_model->updateGallery('serviceImage',$folder); //upload media of Seller
             
                //check for error
            /*    if(array_key_exists("error",$image) && !empty($image['error'])){
                    $response = array('status' => FAIL, 'message' => strip_tags($image['error'].'(In service Image)'));
                   $this->response($response);
                }*/
                
                //check for image name if present
               /* if(array_key_exists("image_name",$image)):
                    $serviceImage = $image['image_name'];
                endif;*/
            
            }
           // $image_data['profileImage']           =   $serviceImage;

            $result = $this->common_model->insertData('service',$data_val);
            if($result){
                
                  if(!empty($images)):
                    $j=0;
                
                    for ($i=0; $i <sizeof($images) ; $i++) { 
                        if(isset($images[$i]['name']) && isset($images[$i]['type'])):
                            $imageType = explode("/",$images[$i]['type']);
                            $serviceImage[$j]['image'] =  $images[$i]['name'];
                            $serviceImage[$j]['type'] =  isset($imageType[0]) ?$imageType[0]:'image';
                            $serviceImage[$j]['serviceId'] =  $result;
                            $j++;
                        endif;
                    }
                    if(!empty($serviceImage)):
                     
                        $this->common_model->insertBatch('images',$serviceImage);
                    endif;
               endif;//images
                //email send
                                        //send mail
                        $maildata['title']    = $this->authData->fullName." has been  created Interface service";
                        $maildata['message']  = "<table><tr><td>Product</td><td>".$data_val['productName']."</td></tr><tr><td>Manufacture</td><td>".$data_val['vendor']."</td></tr><tr><td>Serial number</td><td>".$data_val['serialNumber']."</td></tr><tr><td>Date of Purchase</td><td>".$purchaseDate."</td></tr><tr><td>Contact number</td><td>".$data_val['contactNumber']."</td></tr><tr><td>Fault Description</td><td>".$data_val['faultDescription']."</td></tr></table>";
                        $subject = "Service Request";
                        $message=$this->load->view('emails/email',$maildata,TRUE);
                        $emails = $this->common_model->adminEmails();
                        if(!empty($emails)){
                        $this->load->library('smtp_email');
                       $this->smtp_email->send_mail_multiple($emails,$subject,$message);
                        }
                    //send mail
                //email send
        	  	$response = array('status'=>SUCCESS,'message'=>ResponseMessages::getStatusCodeMessage(122));
         
             }else{
                $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));
            }   
            
        }
        $this->response($response);
    } //End Function
 
    function addServiceList_post(){
        
        $authCheck = $this->check_service_auth();
        $authToken = $this->authData->authToken;
        $userId = $this->authData->id;
        $userType = $this->authData->userType;
        $this->load->helper('text');
        $this->load->model('service/service_model');
        ($userType !=1)?$this->service_model->set_data(array('userId'=>$userId)):"";
        $list = $this->service_model->get_list();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $serData) { 
        $action ='';
        $no++;
        $row = array();
        $row[] = $no;
      //  $row[] = '<img src='.make_user_img_url($usersData->profileImage).' alt="user profile" width="65%">';
        $row[] = display_placeholder_text($serData->productName); 
        $row[] = display_placeholder_text($serData->vendor); 
        $row[] = display_placeholder_text($serData->modelName); 
        $row[] = display_placeholder_text($serData->serialNumber); 
        $row[] = display_placeholder_text($serData->purchaseDate); 
        $row[] = display_placeholder_text($serData->contactNumber); 
        $row[] = display_placeholder_text(substr($serData->faultdescription,6)); 
     
         $applyStatus = 1;
            $applyMsg = "";
            switch ($serData->status) {
                case '0':
                    $applyStatus =1;
                    $applyMsg = 'Click to Process';
                       $row[] = '<span class="badge badge bg-color-red">'.display_placeholder_text($serData->statusShow).'</span>'; 
                    break;
                case '1':
                    $applyStatus =2;
                    $applyMsg = 'Click to Complete';
                       $row[] = '<span class="badge badge bg-color-blue">'.display_placeholder_text($serData->statusShow).'</span>'; 
                    break;
                 case '2': 
                     $row[] = '<span class="badge bg-color-green">'.display_placeholder_text($serData->statusShow).'</span>'; 
                    break;
                
                default:
                    $applyStatus =0;
                    break;
            }
            $link  ='javascript:void(0)';
          
            if($applyStatus){
          //  $link = base_url('api/serivce/serviceDetails/'.encoding($serData->serviceId).'/'.encoding($applyStatus));
            }

            $linkDtail = base_url('service/serviceDetail/'.encoding($serData->serviceId));
            if($userType==1):
            if($serData->status!=2):
            $action .= '<a href="'.$link.'" onclick="statusChange(this);" data-message="You want to change service!" data-serid="'.encoding($serData->serviceId).'" data-sid="'.encoding($applyStatus).'"  class="on-default edit-row table_action" title="View user">'.$applyMsg.'</a>&nbsp;&nbsp;|';
            endif;
            endif;
            $action .= '&nbsp;&nbsp;<a href="'.$linkDtail.'" class="on-default edit-row table_action" title="Detail"><i class="fa fa-eye"></i></a>';
               
            // $clk_edit =  "editFn('admin/categoryCtrl','editGenres','$usersData->id');" ;
            // $action .= '<a href="javascript:void(0)" onclick="'.$clk_edit.'" class="on-default edit-row table_action" title="Edit Event"><i class="fa fa-pencil-square-o"></i></a>';          

        $row[] = $action;
        $data[] = $row;

        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->service_model->count_all(),
            "recordsFiltered" => $this->service_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
       
        $this->response($output);
    } //End Function
    function changeStatus_post(){
        $serviceId  = decoding($this->post('srv'));
        $status     = decoding($this->post('srs'));
        $where = array('serviceId'=>$serviceId);
         $dataExist=$this->common_model->is_data_exists('service',$where);
        if($dataExist){
             $update=$this->common_model->updateFields('service',array('status'=>$status),$where);
                    //send mail
                     $maildata['title']    = "Service Status";
                    $maildata['message']  = "Your service request is ".($status==2)? " Completed" : "in progress";
                  
                    $subject = "Service Process";
                    $message=$this->load->view('emails/email',$maildata,TRUE);
                   
                    $email = $this->common_model->is_data_exists('users',array('id'=>$dataExist->userId))->email;
                    $this->load->library('smtp_email');
                    $this->smtp_email->send_mail($email,$subject,$message);
                    
                    //send mail
                      $showmsg  = "Service request is ".($status==2)? " Completed" : "in progress";
                $response = array('status'=>SUCCESS,'message'=>$showmsg);
        }else{
           $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118));  
        }
        $this->response($response);
    }//end function
    function serviceComment_post(){
        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');
          if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $data_val['comment']    = $this->post('comment');
            $data_val['serviceId']  = $this->post('serviceId');
            $data_val['userId']     = $userId ;
            $result = $this->common_model->insertData('comments',$data_val);
            if($result){
                 $response = array('status'=>SUCCESS,'message'=>"comment added successfully.");
            }else{
                $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118)); 
            }
        }
        $this->response($response);
    }//endfunction
 function internalserviceComment_post(){
        $authCheck  = $this->check_service_auth();
        $authToken  = $this->authData->authToken;
        $userId     = $this->authData->id;
        $this->form_validation->set_rules('notes', 'internal comment', 'trim|required');
          if($this->form_validation->run() == FALSE){
            $response = array('status' => FAIL, 'message' => strip_tags(validation_errors()));
           
        }else{
            $data_val['notes']    = $this->post('notes');
            $serviceId  = $this->post('serviceId');
            
            $result = $this->common_model->updateFields('service',$data_val,array('serviceId'=>$serviceId));
            if($result){
                 $response = array('status'=>SUCCESS,'message'=>"Internal comment added successfully.");
            }else{
                $response = array('status'=>FAIL,'message'=>ResponseMessages::getStatusCodeMessage(118)); 
            }
        }
        $this->response($response);
    }//endfunction



}//End Class 

