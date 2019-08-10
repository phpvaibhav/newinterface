<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Common_Back_Controller {

    public $data = "";

    function __construct() {
        parent::__construct();
        $this->check_admin_user_session();
        $this->load->library('pdf');
      //  $this->load->model('admin_model');
    }

    public function index() { 
        
        $data['title'] =    ($_SESSION[ADMIN_USER_SESS_KEY]['userType']==1)?"Service Information" :"My Services";
          $data['recordSet'] = array('<li class="sparks-info"><h5>Service PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'service/servicePdf" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>',);
        $this->load->admin_render('service', $data);
    } 
    public function add_service() { 
        
        $data['title'] = "Add Service";
        $this->load->admin_render('add_service', $data);
    } 
    public function serviceDetail() { 
        
        $data['title'] = "Service Information";
         $data['recordSet'] = array('<li class="sparks-info"><h5>Report PDF<span class="txt-color-blue"><a class="anchor-btn" href="'.base_url().'service/serviceDetailPdf/'.$this->uri->segment(3).'" target="_blank" ><i class="fa fa-file-pdf-o"></i></a></span></h5></li>',);
        $serviceId  = decoding($this->uri->segment(3));

        $service = $this->common_model->getsingle('service',array('serviceId'=>$serviceId));
       
        if(empty($service)){
            redirect('service');
        }
        $data['service'] = $service;
        $data['images'] = $this->common_model->getAll('images',array('serviceId'=>$serviceId));
        $data['serviceUser'] = $this->common_model->userInfo(array('id'=>$service['userId']));
         $this->load->model('service_model');
        $data['comments'] = $this->service_model->getComments(array('comments.serviceId'=>$serviceId));
        $this->load->admin_render('serviceDetail', $data);
    }//end function
    public function servicePdf()
   {

    ob_start();
    // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Interface');
      $pdf->SetTitle('Service Information');
      $pdf->SetSubject('Interface');
      $pdf->SetKeywords('Interface,service');

      // set default header data
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      // set some language-dependent strings (optional)
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
         require_once(dirname(__FILE__).'/lang/eng.php');
         $pdf->setLanguageArray($l);
      }
      // ---------------------------------------------------------

      // set font
      $pdf->SetFont('helvetica', 'N', 10);

      // add a page
      $pdf->AddPage();
        // print a line
        $pdf->Cell(0, 12, 'Services',0, 0, 'C');

        $pdf->Ln(5);
         $pdf->Ln(5);
      $pdf->Write(0, 'Date: '. date('m/d/Y') , '', 0, 'L', false, 0, true, false, 0);
     

      // Logged in username
      $userName = $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];

      $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);
        $pdf->Ln(5);
       
      $pdf->SetFont('helvetica', '', 9);
      // -----------------------------------------------------------------------------
      $content = '';
      
     
        $content .= '
            
            <table border="0" cellspacing="1" cellpadding="4">
                <tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
                <th>Product Name</th>
                <th>Vendor</th>
                <th>Serial Number</th>
                <th>Date</th>
                <th>Contact Number</th>
                <th>Status</th>
                
                </tr>';
            //$content .= $this->fetch_employeePdf_info();
          $content .= '</table>';
      
          $services =  $this->common_model->getAll('service');

       foreach ($services as $k => $service) {
        if($k++%2 == 1){
             $colr = "background-color:#f1f1f1!important;";
         }else{
            $colr = "background-color:#fff!important;;";
         }
                    
           $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
           $content .='<td>'.$service->productName.'</td>';
           $content .='<td>'.$service->vendor.'</td>';
           $content .='<td>'.$service->serialNumber.'</td>';
           $content .='<td>'.date('d-m-Y',strtotime($service->purchaseDate)).'</td>';
           $content .='<td>'.$service->contactNumber.'</td>';
        
           switch ($service->status) {
               case 0:
                   $content .='<td>Pending</td>';
                   break;
               case 1:
                   $content .='<td>In Progress</td>';
                   break;
               case 2:
                   $content .='<td>Completed</td>';
                   break;
               
               default:
                   $content .='<td>Pending</td>';
                   break;
           }
         
       
          
           $content .='</tr>';
       }

        $content .='</table>';
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "service-".strtotime(date("Y-m-d H:i:s")).".pdf";
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
   }
   // End job PFD     
   public function serviceDetailPdf()
   {
    $serviceId  = decoding($this->uri->segment(3));

        $service = $this->common_model->getsingle('service',array('serviceId'=>$serviceId));
       
        if(empty($service)){
            redirect('service');
        }
        
        $images = $this->common_model->getAll('images',array('serviceId'=>$serviceId));
        $serviceUser = $this->common_model->userInfo(array('id'=>$service['userId']));
         //$this->load->model('service_model');
       // $comments = $this->service_model->getComments(array('comments.serviceId'=>$serviceId));
    ob_start();
    // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetCreator(PDF_CREATOR);
      $pdf->SetAuthor('Interface');
      $pdf->SetTitle('Service Information');
      $pdf->SetSubject('Interface');
      $pdf->SetKeywords('Interface,service');

      // set default header data
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);
      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      // set some language-dependent strings (optional)
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
         require_once(dirname(__FILE__).'/lang/eng.php');
         $pdf->setLanguageArray($l);
      }
      // ---------------------------------------------------------

      // set font
      $pdf->SetFont('helvetica', 'N', 10);

      // add a page
      $pdf->AddPage();
        // print a line
        $pdf->Cell(0, 12, 'Service',0, 0, 'C');

        $pdf->Ln(5);
         $pdf->Ln(5);
      $pdf->Write(0, 'Date: '. date('m/d/Y') , '', 0, 'L', false, 0, true, false, 0);
     

      // Logged in username
      $userName = $_SESSION[ADMIN_USER_SESS_KEY]['fullName'];

      $pdf->Write(0, 'By: '.$userName, '', 0, 'R', true, 0, false, false, 0);
        $pdf->Ln(5);
       
      $pdf->SetFont('helvetica', '', 9);
      // -----------------------------------------------------------------------------
      $content = '';
      
     
        $content .= '
            
            <table border="0" cellspacing="1" cellpadding="4">
                <tr style="background-color:#707070;color:#FFFFFF;"  nobr="true">
                <th>Product Name</th>
                <th>Vendor</th>
                <th>Serial Number</th>
                <th>Date</th>
                <th>Contact Number</th>
                <th>Status</th>
                
                </tr>';
           
          $content .= '</table>';
      
   
       
            $colr = "background-color:#fff!important;;";
         
                    
           $content .='<tr nobr="true" style="color:#000; '.$colr.'">';
           $content .='<td>'.$service['productName'].'</td>';
           $content .='<td>'.$service['vendor'].'</td>';
           $content .='<td>'.$service['serialNumber'].'</td>';
           $content .='<td>'.date('d-m-Y',strtotime($service['purchaseDate'])).'</td>';
           $content .='<td>'.$service['contactNumber'].'</td>';
        
           switch ($service['status']) {
               case 0:
                   $content .='<td>Pending</td>';
                   break;
               case 1:
                   $content .='<td>In Progress</td>';
                   break;
               case 2:
                   $content .='<td>Completed</td>';
                   break;
               
               default:
                   $content .='<td>Pending</td>';
                   break;
           }
         
       
          
           $content .='</tr>';
       

        $content .='</table>';
        $content .='<br/>
        <dl>
    <dt><b>Comment</b></dt>
    <dd>'.trim($service['comment']).'</dd>';
    if(!empty($images)):
         $content .= '</dl><dl><dt><b>Service Image</b></dt></dl>
<div><br />';
    endif;
    foreach ($images as $k => $img) {
        $image1 = base_url().'uploads/service/'.$img->image;
 $content .= '<img src="'.$image1.'" alt="" width="100" height="100" border="0" />&nbsp;';
    }
   $content .= '</div>';
        $pdf->writeHTML($content, true, false, true, false, '');
        // reset pointer to the last page
        $pdf->lastPage();
        $fileName = "service-".strtotime(date("Y-m-d H:i:s")).".pdf";
        $pdf->Output($fileName, 'I');
        ob_end_flush();
      //Close and output PDF document


      //============================================================+
      // END OF FILE
      //============================================================+
   }
   // End job PFD 
   
}//end Class
