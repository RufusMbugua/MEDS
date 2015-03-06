<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standard_Register_Records extends CI_Controller {
	function __construct()
	{
	  parent::__construct();
	}
	  
    function Get(){
      
      $this->load->model('standard_register_recordsmodel');  
      $data['query'] = $this->standard_register_recordsmodel->standard_register_list_get();
    	$this->load->view('standard_register_records',$data);
        
    }
    
    function getExhausted (){
    	$this->load->model('standard_register_recordsmodel');
    	
    	$data['query'] = $this->standard_register_recordsmodel->exhausted();
        $this->load->view('standard_register_exhausted_records',$data);
    }
    function getDamaged(){
    	$this->load->model('standard_register_recordsmodel');
    	
    	$data['query'] =  $this->standard_register_recordsmodel->damaged();
        $this->load->view('standard_register_damaged_records',$data);
    }
    function getExpired(){
    	$this->load->model('standard_register_recordsmodel');

    	$data['query'] = $this->standard_register_recordsmodel->expired();
        $this->load->view('standard_register_expired_records',$data);
    }
    function print_records(){
      $this->load->model('standard_register_recordsmodel');	
      $query = $this->standard_register_recordsmodel->standard_register_list_get();
    	

      $this->load->library('mpdf/mpdf');
      $print = "";
      $i=1;
      //$print .="<table>";
      $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">

          <tr>
              <th style="border-right: dotted 1px #c0c0c0;" align="center"></th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Batch/Lot No</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Reference No</th>                    
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Item Description</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Manufacturer</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Physical Appearance</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Intended Use</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Expiry Date</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">MSDS</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Location/Store</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Date Received</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Initial</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Current Quantity</th> 
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Progress Bar</th>         
          </tr>';
                foreach($query as $row){
                  
               // if($i==0){
                     
                    $print .="<tr>";
            //    } 
                $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;">'.$i.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->batch_number.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->reference_number.'</td>';
    			$print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->item_description.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->manufacturer_supplier.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->physical_appearance.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->intended_use.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->expiry_date,0,-8).'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->msds.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->location_store.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->date_received,0,-8).'</td>';
    			$print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->initial_quantity.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->quantity.'</td>';          
                $i++;
                $print .="</tr>";
                }

      $print .="</table>";
      /*echo $print;
      die;*/
      $this->load->library('mpdf/mpdf');// Load the library
      $this->mpdf->WriteHTML($print); // Output the results in the browser
      $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                    
    }
    function print_damaged_records(){
      $this->load->model('standard_register_recordsmodel'); 
      $query =$this->standard_register_recordsmodel->damaged();
      

      $this->load->library('mpdf/mpdf');
      $print = "";
      $i=1;
      //$print .="<table>";
      $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">

          <tr>
              <th style="border-right: dotted 1px #c0c0c0;" align="center"></th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Batch/Lot No</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Reference No</th>                    
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Item Description</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Manufacturer</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Physical Appearance</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Intended Use</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Expiry Date</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">MSDS</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Location/Store</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Date Received</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Initial</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Current Quantity</th> 
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Progress Bar</th>         
          </tr>';
                foreach($query as $row){
                  
               // if($i==0){
                     
                    $print .="<tr>";
            //    } 
                $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;">'.$i.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->batch_number.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->reference_number.'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->item_description.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->manufacturer_supplier.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->physical_appearance.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->intended_use.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->expiry_date,0,-8).'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->msds.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->location_store.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->date_received,0,-8).'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->initial_quantity.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->quantity.'</td>';          
                $i++;
                $print .="</tr>";
                }

      $print .="</table>";
      /*echo $print;
      die;*/
      $this->load->library('mpdf/mpdf');// Load the library
      $this->mpdf->WriteHTML($print); // Output the results in the browser
      $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                    
    }
    function print_exhausted_records(){
      $this->load->model('standard_register_recordsmodel'); 
      $query = $this->standard_register_recordsmodel->exhausted();
      

      $this->load->library('mpdf/mpdf');
      $print = "";
      $i=1;
      //$print .="<table>";
      $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">

          <tr>
              <th style="border-right: dotted 1px #c0c0c0;" align="center"></th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Batch/Lot No</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Reference No</th>                    
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Item Description</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Manufacturer</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Physical Appearance</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Intended Use</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Expiry Date</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">MSDS</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Location/Store</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Date Received</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Initial</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Current Quantity</th> 
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Progress Bar</th>         
          </tr>';
                foreach($query as $row){
                  
               // if($i==0){
                     
                    $print .="<tr>";
            //    } 
                $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;">'.$i.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->batch_number.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->reference_number.'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->item_description.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->manufacturer_supplier.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->physical_appearance.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->intended_use.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->expiry_date,0,-8).'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->msds.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->location_store.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->date_received,0,-8).'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->initial_quantity.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->quantity.'</td>';          
                $i++;
                $print .="</tr>";
                }

      $print .="</table>";
      /*echo $print;
      die;*/
      $this->load->library('mpdf/mpdf');// Load the library
      $this->mpdf->WriteHTML($print); // Output the results in the browser
      $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                    
    }
    function print_expired_records(){
      $this->load->model('standard_register_recordsmodel'); 
      $query = $this->standard_register_recordsmodel->expired();
      

      $this->load->library('mpdf/mpdf');
      $print = "";
      $i=1;
      //$print .="<table>";
      $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">

          <tr>
              <th style="border-right: dotted 1px #c0c0c0;" align="center"></th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Batch/Lot No</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Reference No</th>                    
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Item Description</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Manufacturer</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Physical Appearance</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Intended Use</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Expiry Date</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">MSDS</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Location/Store</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Date Received</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Initial</th>
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Current Quantity</th> 
                        <th style="border-right: dotted 1px #c0c0c0;background-color:c4c4ff;" align="center">Progress Bar</th>         
          </tr>';
                foreach($query as $row){
                  
               // if($i==0){
                     
                    $print .="<tr>";
            //    } 
                $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;">'.$i.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->batch_number.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->reference_number.'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->item_description.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->manufacturer_supplier.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->physical_appearance.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->intended_use.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->expiry_date,0,-8).'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->msds.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->location_store.'</td>';
                $print .='<td width="100px" style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.substr($row->date_received,0,-8).'</td>';
          $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->initial_quantity.'</td>';
                $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row->quantity.'</td>';          
                $i++;
                $print .="</tr>";
                }

      $print .="</table>";
      /*echo $print;
      die;*/
      $this->load->library('mpdf/mpdf');// Load the library
      $this->mpdf->WriteHTML($print); // Output the results in the browser
      $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                    
    }
}
?>