<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller {
	function __construct()
	{
	  parent::__construct();
	}
	
	function index(){
		$data['id'] = $this->uri->segment(3);
		
		$data['sql'] = $this->db->get_where('maintenance', array('equipment_maintenance_id' => $data['id']))->result_array();

		//$data['calib'] = $this->db->get_where('calibration', array('c_equipment_maintenance_id' => $data['id']))->result_array();
		$data['calib_main'] = $this->db->get_where('calibration_maintenance', array('equipment_id' => $data['id']))->result_array();
		$results=$this->db->get_where('equipment_maintenance', array('id' => $data['id']))->result_array();
		$data['query']=$results[0];
		// echo "<pre>"; print_r($data['query']);die;
	$this->load->view('maintenance_form', $data);
	}
	
	function save(){
	    $this->load->model('maintenance_model');
	    
		if($this->input->post('submit')){
			$this->maintenance_model->update();  
		}else if($this->input->post('submit_cm')){
			$this->maintenance_model->save_calibration_maintenance();
		}
		redirect('maintenance_records/Get/');
	}

	
	function saveoutoftolerance(){

	    $this->load->model('maintenance_model');
	    
		if($this->input->post('submit_m')){
			$this->maintenance_model->maintenanceoutoftolerance();                
		}else if($this->input->post('submit_c')){
			$this->maintenance_model->calibrationoutoftolerance();                
		}
		redirect('maintenance_records/Get/');
	}

	//Printing displayed records
function print_maintenance_records(){
 		$id = $this->uri->segment(3);
		
		$sql =$this->db->get_where('maintenance', array('equipment_maintenance_id' => $id));
		$calib =$this->db->get_where('calibration', array('c_equipment_maintenance_id' => $id));
		$query=$this->db->get_where('equipment_maintenance', array('id' => $id));

		$results_main=$sql->result_array();
		$results_calib=$calib->result_array();
		$results_equip=$query->result_array();
		
				
		//print_r($results_main);
		//print_r($results_calib);
		//print_r($results);
		//die;

  $this->load->library('mpdf/mpdf');
  $print = "";
  $i=1;

  //Printing data from the equipment table
  $print.='<table  border="0" align="center" bgcolor="e8e8ff">
	  <tr><td > <b>Equipment Maintenance and Calibration History for'.$results_equip['description'].'</b></td> </tr> 
      <tr>
          <td height="25px"  style="text-align: center;background-color:#ffffff;border-right: dotted  1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>ID Number</b></td>
	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Description</b></td>
	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Manufacturer</b></td>
	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Serial Number</b></td>
	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Model</b></td>
      </tr>';
            foreach($results_equip as $row){
              
           // if($i==2){
                 
                $print .="<tr>";
            //} 
           
	        $print .='<td height="15px" style="text-align: center;border-left: dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;">'.$row['id_number'].'</td>';
		    $print .='<td height="15px" style="text-align: center;border-left: dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;">'.$row['description'].'</td>';
		    $print .='<td height="15px" style="text-align: center;border-left: dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;">'.$row['manufacturer'].'</td>';
		    $print .='<td height="15px" style="text-align: center;border-left: dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;">'.$row['serial_number'].'</td>';
		  	$print .='<td height="15px" style="text-align: center;border-left: dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;">'.$row['model'].'</td>';

           // $i++;

            $print .="</tr>";
            }

  $print .="</table>";

  //Printing data from calibration table
  $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">
  	  <tr><td > <b>Equipment Maintenance History</b></td> </tr>
      <tr>
          <th style="text-align:center;border-right: dotted 1px #ddddff;">No</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Maintenance Requirement</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Maintenance Interval</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Maintenance Specification</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Maintenance Start Date</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Next Maintenance Date</th>
      </tr>';
            foreach($results_main as $row){
              
           // if($i==2){
                 
                $print .="<tr>";
            //} 
            $print .='<td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px">'.$i.'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['requirement'].'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['interval'].'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['specification'].'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['start_date'].'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['next_date'].'</td>';
	        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;"></td>';

           // $i++;

            $print .="</tr>";
            }

  $print .="</table>";
  //Printing data from Maintenance table
  $print.='<table width="580" border="0" align="center" bgcolor="e8e8ff">
  	  <tr><td> <b>Equipment Calibration History</b></td> </tr>
      <tr>
        <th style="text-align:center;border-right: dotted 1px #ddddff;">No</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Requirement</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Specification</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Interval</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Start Date</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Next Calibration Date</th>  
      </tr>';
            foreach($results_calib as $row){
              
           // if($i==2){
                 
                $print .="<tr>";
            //} 
        $print .=' <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px">'.$i.'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['c_requirement'].'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['c_interval'].'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['c_specification'].'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['c_start_date'].'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;">'.$row['c_next_date'].'</td>';
        $print .='<td style="text-align: center;border-bottom: solid 1px #c0c0c0;"></td>';

           // $i++;

            $print .="</tr>";
            }

  $print .="</table>";
  /*echo $print;
  die;*/
  $this->load->library('mpdf/mpdf');// Load the library
  $this->mpdf->WriteHTML($print); // Output the results in the browser
  $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
                
}
function print_label(){	
	$data['id'] = $this->uri->segment(3);
	$no_of_prints = $this->uri->segment(4);

	$calib_main = $this->db->get_where('calibration_maintenance', array('equipment_id' => $data['id']))->result_array();
	$results=$this->db->get_where('equipment_maintenance', array('id' => $data['id']))->result_array();
	$query=$results[0];
	
	$next_date = $calib_main[0]['next_date'];
    $next_date_final = substr($next_date,0, 15);

   
	 // if ($this->input->post('print_btn')) {
    
		$this->load->library('mpdf/mpdf');
	    $print = ""; 
	    $new_line=1;
			
 
		  $print .='
 			 <link href="'.base_url().'style/core.css" rel="stylesheet" type="text/css" />
 			 <table align="center" width="40%"><tr> ';
		 			for ($i=0; $i < $no_of_prints; $i++) { 
		 			if ($i%2 == 0) {$print .="</tr><tr>";}

				  	$print .='
				  	<td>	<table align="center" class="print_data" width="100%">
					      <tr>
					        <td colspan="2" class = "print_data">'.$query['id_number'].'</td>
					      </tr>
					      <tr>
					        <td colspan="2" class = "print_data"> '.$query['model'].'</td>
					      </tr>
					      <tr>
					        <td class = "print_data"> Service</td>
					        <td class = "print_data"> Calibration</td>
					      </tr>
					      <tr>
					        <td class="print_data"> Date </td>
					        <td class="print_data"> Next Date </td>
					      </tr>
					       <tr>
					        <td class="print_data"> '. $calib_main[0]['calibration_date'].' </td>
					        <td class="print_data"> '. $next_date_final.' </td>
					      </tr>
					      <tr>
					        <td class="print_data" colspan="2"> '. $calib_main[0]['person_reporting'].'</td>
					      </tr>      
					    </table>
				 	</td>';

				 	$new_line++;
				 }
		 	$print .='</tr></table>';
		
		  //echo $print;die;
		
		  $this->load->library('mpdf/mpdf');// Load the library
		  $this->mpdf->WriteHTML($print); // Output the results in the browser
		  $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"
	 // }
}
// function cmoutoftolerance(){
	// 	$data['id'] = $this->uri->segment(3);
		
	// 	$data['sql'] =
	// 	$this->db->get_where('maintenance', array('equipment_maintenance_id' => $data['id']))->result_array();
	// 	//$data['sqlb'] =
	// 	//$this->db->get_where('outoftolerance', array('out_id' => $data['id']))->result_array();
	// 	$data['calib'] =
	// 	$this->db->get_where('calibration', array('c_out_id' => $data['id']))->result_array();
	// 	$query=$this->db->get_where('equipment_maintenance', array('out_id' => $data['id']));
	// 	$results=$query->result_array();
		
	// 	$data['query']=$results[0];
	// 	$this->load->view('outoftolerance_maintenance_form', $data);
	// }
}
?>