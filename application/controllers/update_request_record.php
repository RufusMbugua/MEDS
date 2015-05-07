<?php
class Update_Request_Record extends CI_Controller {

public function Update_Request_Record()
{
        parent::__construct();

}

function Update() 
{
    $id = $this->uri->segment(3);
    $data=array();
    $this->load->database();
    $query = $this->db->get_where('test_request', array('id' => $id));
    $results=$query->result_array();
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $id))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['test']=$return;

    $data['query']=$results[0];
    

    $this->load->view('update_request_view',$data);
    
}
function print_testrequestform(){

    $trid = $this->uri->segment(3);
    $approve_status=1;

    // $tests =$this->db->select('*')->get_where('test_results', array('test_request_id' => $trid))->result_array();    
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $trid))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['test']=$return;
    // var_dump($test);
    // die;
    if(in_array(1, $data['test'])){
      $test_one="<br> Identification </br>";
    }else{}

    if(in_array(2, $data['test'])){
      $test_two="Friability </br>";
    }else{}

    if(in_array(3, $data['test'])){
      $test_three="Disintegration </br>";
    }else{}

    if(in_array(4, $data['test'])){
      $test_four="ph(alkalinity) </br>";
    }else{}

    if(in_array(5, $data['test'])){
      $test_five="Related Substances </br>";
    }else{}

    if(in_array(6, $data['test'])){
      $test_six="Weight Variation/ Mass Uniformity </br>";
    }else{}

    if(in_array(7, $data['test'])){
      $test_seven="Dissolution </br>";
    }else{}

    if(in_array(8, $data['test'])){
      $test_eight="Assay </br>";
    }else{}

    if(in_array(9, $data['test'])){
      $test_nine="Content Uniformity </br>";
    }else{}

    if(in_array(10, $data['test'])){
      $test_ten="Full Monograph </br>";
    }else{}

    if(in_array(11, $data['test'])){
      $test_eleven="Uniformity of Dosage </br>";
    }else{}

    if(in_array(12, $data['test'])){
      $test_twelve="Karl Fisher </br>";
    }else{}

    if(in_array(13, $data['test'])){
      $test_thirteen="Microbiology </br>";
    }else{}

    if(in_array(14, $data['test'])){
      $test_fourteen="Loss and Drying </br>";
    }else{}

    $coa =  $this->db->select('*')->get_where('coa', array('test_request_id' => $trid, 'approve_status'=> $approve_status))->result_array();    

    $full_monograph = $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $trid))->result_array();

    $monograph_specifications = $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $trid))->result_array();

    $results=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.brand_name,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.brand_name,test_request.quantity_submitted,test_request.authorizer_name,test_request.authorizer_designation,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    // print_r($results)
    $query=$results[0];
       
    $user=$this->session->userdata;
    $user_type_id=$user['logged_in']['user_type'];
    $user_id=$user['logged_in']['id'];
    $department_id=$user['logged_in']['department_id'];
    $acc_status=$user['logged_in']['acc_status'];
       
    $this->load->library('mpdf/mpdf');
    $print = "";
    $i=1;

    $img=base_url().'images/meds_logo.png';// MEDS Logo
    $style=base_url().'style/table.css';
    $date=substr($query['date_time'],0,10);
    //$date_f=date_format($date,'d/m/y');
    //please debug this
    $print .='
        <link href="'.$style.'" rel="stylesheet" type="text/css" />
        <table width="100%"  border="0" cellpadding="8px" align="center">        
          <tr>
              <td rowspan="2" style="font-family:Arial;font-size:12px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="'.$img.'" height="80px" width="90px"/></td>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: TEST REQUEST FORM</b></td>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
              <td colspan="3" style="font-family:Arial;font-size:12px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">'.$query['reference_number'].'</td>
          </tr>
          <tr>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE:'.$date.'</b></td>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
              <td colspan="3" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
          </tr>
          <tr>
              <td style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b>'.$user['logged_in']['fname']." ".$user['logged_in']['lname'].'</b></td>
              <td colspan="2" style="font-family:Arial;font-size:12px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
              <td colspan="3" style="font-family:Arial;font-size:12px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>'.$user['logged_in']['role'].'</td>
          </tr>
        <tr>    
          <td height="25px" colspan="2" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">Name of Applicant</td>
          <td height="25px" colspan="6" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['applicant_name'].'</td>
        </tr>
        <tr>
          <td height="25px" colspan="2" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">Address of Applicant</td>
          <td height="25px" colspan="6" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['applicant_address'].'</td>
        </tr>
        <tr>
          <td colspan="8" style="font-family:Arial;font-size:12px;padding:4px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;"><b>Sample Description</b></td>
        </tr>
        <tr>
          <td height="25px" style="font-family:Arial;font-size:12px;padding:8px;border-bottom:solid 10px #c4c4ff;background-color:#ffffff;text-align:left;" colspan="8"><b>(*Provide International Non-Proprietary Name of Active Ingredient(s) if available)</b></td>
        </tr>
        <tr>
        <td colspan="8" style="font-family:Arial;font-size:12px;padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;">
          <table  class="label" width="100%"  cellpadding="8px" align="center" border="1">
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">Active Ingredients</td>
                  <td colspan="4" style="font-family:Arial;font-size:12px;text-align:left;padding:4px;">'.$query['active_ingredients'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Label Claim</td>
                  <td colspan="4" style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['label_claim'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">Dosage form</td>
                  <td style="font-family:Arial;font-size:12px;text-align:left;padding:4px;">'.$query['dosage_form'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Strength or concentration</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['strength_concentration'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">Pack size</td>
                  <td style="font-family:Arial;font-size:12px;text-align:left;padding:4px;">'.$query['pack_size'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Name of Manufacturer</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;" >'.$query['manufacturer_name'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Address of Manufacturer</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['manufacturer_address'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;:#ffffff;text-align:left;">Brand Name</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['brand_name'].'</td>
              </tr>
              <tr>    
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Marketing Authorization Number</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['marketing_authorization_number'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Batch/Lot Number</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['batch_lot_number'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Date of Manufacture</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['date_manufactured'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Expiry/Retest Date</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['expiry_date'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">Quantity Submitted</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">'.$query['quantity_submitted'].'</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Storage Conditions</td>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['storage_conditions'].'</td>
              </tr>
              <tr>
                  <td style="font-family:Arial;font-size:12px;padding:4px;text-align: left;">Applicant Reference Number</td>
                  <td colspan="4" style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['applicant_ref_number'].'</td>
              </tr>
              <tr>
                  <td height="25px" style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">Sample Source</td>
                  <td height="25px" colspan="4" style="font-family:Arial;font-size:12px;padding:4px;text-align:left;">'.$query['sample_source'].'</td>
            </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="font-family:Arial;font-size:12px;padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;">Reason for Requesting Analysis(Tick as appropriate)</td>
        </tr>
        <tr>
            <td colspan="8" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['testing_reason'].'</td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h6><b>Test(s) Required:</b> (Tick as appropriate)</h6></td>
        </tr>
        <tr>
          <td colspan="8" style="font-family:Arial;font-size:12px;border-right:solid 1px #f2f2f2;text-align:left;">'.$test_one.$test_seven.$test_two.$test_eight.$test_three.$test_nine.$test_four.$test_ten.$test_five.$test_eleven.$test_six.$test_twelve.$test_thirteen.$test_fourteen.'</td>
        </tr>  
        <tr>
            <td height="25px" colspan="8" style="font-family:Arial;font-size:12px;padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;"><b>Specifications to be used for testing:</b>(Tick as appropriate)</td>
        </tr>
         <tr>
            <td colspan="8" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['test_specification'].'</td>
        </tr> 
        <tr>
            <td height="25px" colspan="8" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h6><b><p>Note:</b> If manufacturer or "other", please provide methods of analysis and specifications</p></h6></td>
        </tr>
          <tr>
            <td height="25px" colspan="8" style="font-family:Arial;font-size:12px;padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;"><b>Details of person authorizing request for analysis</b></td>
          </tr>
          <tr>
            <td height="25px" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">Name</td>
            <td colspan="3" height="25px" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['authorizer_name'].'</td>
            <td height="25px" style="font-family:Arial;font-size:12px;padding:4px;text-align:right;background-color:#ffffff;">Designation</td>
            <td colspan="3" height="25px" colspan="5" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['authorizer_designation'].'<td>
          </tr>
          <tr>
            <td style="font-family:Arial;font-size:12px;padding:4px;text-align:left;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;">Lab Registration No</td>
            <td colspan="3" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;">'.$query['laboratory_number'].'</td>
            <td style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;">Received By</td>
            <td colspan="3" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;">'.$user['logged_in']['fname']." ".$user['logged_in']['lname'].'</td>
          </tr>
          <tr>  
            <td colspan="8" style="font-family:Arial;font-size:12px;text-align:left;padding:4px;background-color:#ffffff;">Comments</td>
          </tr>    
          <tr>  
            <td colspan="8" style="font-family:Arial;font-size:12px;padding:4px;background-color:#ffffff;">'.$query['findings_comments'].'</td>
          </tr>
        </table>';

    $this->load->library('mpdf/mpdf');// Load the library
    $this->mpdf->WriteHTML($print); // Output the results in the browser
    $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"

}
function update_request()
{
    $trid = $this->uri->segment(3);
    $this->load->model('update_requestmodel');        
	
	if($this->input->post('submit')){
		$this->update_requestmodel->update_data($trid);                
	}
}
}

?>