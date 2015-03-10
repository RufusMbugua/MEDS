<?php
class Coa extends CI_Controller{
	public function Coa(){
		parent::__construct();
	} 

	function index(){

    $data['coa']=
    $this->db->select('*')->get_where('coa')->result_array();


    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
   
    $results=$query->result_array();
    $data['query']=$results[0];

		$this->load->view('coa_view');

	}
function records(){
    $this->load->model('coa_model_list');
    
    $data['query'] = $this->coa_model_list->records_list();
    $query = $this->db->select('*')->get('coa')->result_array();
    $return= array();
        foreach ($query as $key => $value) {
              $return[]=$value['approve_status'];
        }

     $data['return']= $return;
    
    $this->load->view('coa_view_list', $data);
  }
	function view(){
    $aid = $this->uri->segment(3);
    $data['test_request_id'] = $this->uri->segment(4);
	  $test_request_id = $this->uri->segment(4);
    $data['aid'] = $this->uri->segment(3);
    $user_id=6;
  
    $data['users']=
    $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
 
    $data['coa']=
    $this->db->select('*')->get_where('coa', array('test_request_id' => $test_request_id))->result_array();

    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request_id))->result_array();

    $data['test_results']=
    $this->db->select('*')->get_where('test_results', array('test_request_id' => $test_request_id))->result_array();
    
    
    $data['assignment']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $aid))->result_array();
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    
    $results=$query->result_array();
    $data['query']=$results[0];

		$this->load->view('coa_view', $data);
	}
  function approve(){

    $aid = $this->uri->segment(3);
    $test_request_id = $this->uri->segment(4);
    $data['trid'] = $this->uri->segment(4);
    $data['aid'] = $this->uri->segment(3);
    $user_id=6;

     $data['users']=
    $this->db->select('*')->get_where('user', array('user_type' => $user_id))->result_array();
 
    $data['coa']=
    $this->db->select('*')->get_where('coa', array('test_request_id' => $test_request_id))->result_array();

    $data['monograph_specifications']=
    $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request_id))->result_array();

    $data['test_results']=
    $this->db->select('*')->get_where('test_results', array('test_request_id' => $test_request_id))->result_array();
    
    
    $data['assignment']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.assigner_user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $aid))->result_array();
    
    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
    
    $results=$query->result_array();
    $data['query']=$results[0];
    

    $this->load->view('coa_approve_view', $data);
  }
	function submit(){			

		$this->load->model('coa_model');

		if ($this->input->post('save_coa')) {
			$this->coa_model->process();
		}
	}
    function coa_approval(){      
       
        $id = $this->uri->segment(4);
        $this->load->model('coa_model');

        if ($this->input->post('save_coa_model')) {
            $this->coa_model->save_approval_model();
        }
    }
    function final_coa(){
        // $aid = $this->uri->segment(3);
        $data['test_request_id'] = $this->uri->segment(4);
        $trid = $this->uri->segment(4);
        $approve_status=1;

        $data['tests'] =$this->db->select('*')->get_where('test_results', array('test_request_id' => $trid))->result_array();    
       
        $data['coa'] =  $this->db->select('*')->get_where('coa', array('test_request_id' => $trid, 'approve_status'=> $approve_status))->result_array();    
   
        $data['monograph_specifications']= $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $trid))->result_array();

        $results=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    
       $data['query']=$results[0];
       
        // echo "<pre>"; print_r($results);die;
        $this->load->view('coa_final_view', $data);

    }
function coa_pdf(){
    $trid = $this->uri->segment(3);
    $approve_status=1;

    $tests =$this->db->select('*')->get_where('test_results', array('test_request_id' => $trid))->result_array();    
   
    $coa =  $this->db->select('*')->get_where('coa', array('test_request_id' => $trid, 'approve_status'=> $approve_status))->result_array();    

    $monograph_specifications = $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $trid))->result_array();

    $results=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    // print_r($results)
    $query=$results[0];
    	
  $this->load->library('mpdf/mpdf');
  $print = "";
  $i=1;

  $img=base_url().'images/meds_logo.png';// MEDS Logo
  
 //please debug this
  $print .='
     <link href="'.base_url().'style/core.css" rel="stylesheet" type="text/css" />

   <table width="100%" bgcolor="#ffffff" cellpadding="8px" align="center" border="0">
   <tr>
        <td colspan="12" style="font-size:10px;text-align:right;">MEDS/QC/RE/04-01</td>
   </tr>
    <tr>
        <td colspan="2" style="font-size:12px;padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;"><img src="'.$img.'" height="80px" width="90px"/></td>
        <td colspan="2" height="25px" style="font-size:8px;padding:4px;border-top:solid 1px #bfbfbf;text-align:right;"></td>
        <td colspan="4" style="font-size:12px;padding:8px;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:center;color:#000000;"><b><h3><i>Quality Control Laboratory</i></h3><b></td>
    </tr>
    <tr>
        <td height="25px" colspan="4" style="font-size:12px;padding:8px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;"><b><h4>MISSION FOR ESSENTIAL DRUGS & SUPPLIES</h4></b></td>
        <td height="25px" colspan="4" style="font-size:12px;padding:8px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;color:#ff0000;"><b><h5><i>Assuring Quality of Medicines</i></h5></b></td>
    </tr>
    <tr>
        <td colspan="8" align="center" style="padding:8px;border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h2><b><u>CERTIFICATE OF ANALYSIS</u></b></h2></td>
    </tr>
  </table>
  <table align="center" width="100%" bgcolor="#ffffff">
    <tr>
        <td align="left" style="font-size:12px;padding:8px;"><b><u>REGISTRATION NUMBER:</u></b></td>
        <td align="left" style="font-size:12px;padding:8px;">'. $query['reference_number'].' </td>
        <td align="left" style="font-size:12px;padding:8px;"><b><u>Request Date:</u></b></td>
        <td align="left" style="font-size:12px;padding:8px;">'. $query['date_time'].'</td>
        <td align="left" style="font-size:12px;padding:8px;"><b><u>Test Date:</u></b></td>
        <td align="left" style="font-size:12px;padding:8px;">'. date("d/m/Y").'</td>
    </tr>  
    <tr>
         <td colspan="6" align="left" style="font-size:12px;padding:8px;"><b><u>NAME OF PRODUCT:</u></b>&nbsp;&nbsp;&nbsp; <b>'. $query['active_ingredients'] .'</b></td>       
    </tr>
    <tr>
        <td colspan="3" align="left" style="font-size:12px;padding:8px;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>CLIENT:</u></b></br></br>'. $query['applicant_name'].'</td>       
        <td colspan="3" align="left" style="font-size:12px;padding:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>MANUFACTURER:</u></b></br></br>'. $query['manufacturer_name'].'</td>
    </tr>
    <tr>
      <td colspan="6"style="font-size:12px;padding:8px;border-bottom: solid 1px #bfbfbf;"><b><u>LABEL CLAIM:</u></b></td>
    </tr>
    <tr>
      <td colspan="6" style ="text-align:left;font-size:12px;padding:8px;">'. $query['label_claim'].'&nbsp;,'. $query['batch_lot_number'].'&nbsp;,Manufactured '. $query['date_manufactured'].'&nbsp;,Expires '. $query['expiry_date'].'</td>
    </tr>
  </table>      
    
    <table width="950px" bgcolor="#ffffff" border="" cellfont-size:12px;padding="4px" align="center"> 
        <tr>
      <td align= "center" style="font-size:12px;padding:8px;text-align:center;font-size:12px;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;">
        <u><h3><b>RESULTS OF ANALYSIS</b></h3></u></td>      
    </tr>
    <tr>
      <td align="left" style="font-size:12px;padding:8px;border-top: dotted 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;"><b>Appearance:</b>&nbsp;'.$query['active_ingredients'].'</td>
    </tr>
    </table>
        <table width="950px" bgcolor="#ffffff" style="border 1px solid #bfbfbf" cellpadding="4px" align="center">
          <tr>
            <td align="left" style="font-size:8px;border-bottom: solid 1px #bfbfbf;color:#0000ff;">TEST</th>
            <td align="left" style="font-size:8px;border-bottom: solid 1px #bfbfbf;color:#0000ff;">METHOD</th> 
            <td align="left" style="font-size:8px;border-bottom: solid 1px #bfbfbf;color:#0000ff;">SPECIFICATIONS</th>  
            <td align="left" style="font-size:8px;border-bottom: solid 1px #bfbfbf;color:#0000ff;">RESULTS</th>
            <td align="left" style="font-size:8px;border-bottom: solid 1px #bfbfbf;color:#0000ff;">REMARKS</th>     

          </tr>';
           foreach($tests as $row){
          $print .="<tr>";
          $print.='<td style="font-size:8px;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;">'.$row['test_name'].' </td>';      
          $print.='<td style="font-size:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;">'.$row['method'].'</td> ';      
          $print.='<td style="font-size:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;">'.$row['specifications'].'</td>';
          $print.='<td style="font-size:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;">'.$row['results'].'</td>';    
          $print.='<td style="font-size:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;">'.$row['remarks'].'</td></tr>';
          } 
        $print.='
        <tr>
        <td colspan="2" style="font-size:12px;border-bottom: solid 1px #bfbfbf;"><b>CONCLUSION: <b></td> 
        <td colspan="10" style ="border-bottom: solid 1px #bfbfbf;font-size:12px;">'. $coa[0]['conclusions'].'</td>
      </tr>
      </table>     
      <table bgcolor="#ffffff"> 
      <tr>    
        <td colspan="12" style="font-size:10px;padding-bottom:80px;background-color:#ffffff"><b>*Results given are specific to the indicated batch</b></td>
      </tr>
      <tr>    
         <td colspan ="4" style="font-size:12px;"><b>Prepared by: '. $coa[0]['done_by'].'</td>
         <td colspan ="4" style="font-size:12px;"><b>Reviewed by: '. $coa[0]['supervisor'].'</td>   
         <td colspan ="4" style="font-size:12px;"><b>Approved by: Stephen Kigera</td>   
      </tr>
      <tr>    
         <td colspan ="4" style="font-size:12px;">_______________________</td>
         <td colspan ="4" style="font-size:12px;"> _______________________</td>   
         <td colspan ="4" style="font-size:12px;">_______________________</td>   
      </tr>
      <tr>    
         <td colspan ="4" style="font-size:12px;">Laboratory Analyst</td>
         <td colspan ="4" style="font-size:12px;">Laboratory Supervisor</td>   
         <td colspan ="4" style="font-size:12px;">Quality Assurance Manager</td>   
      </tr>
      <tr>
        <td colspan="12" align="center" style="font-size:10px;padding-top:20px; ">
        <b>A Joint Service of the Kenya Conference of Catholic Bishops (KCCB) and Christian Health Association of Kenya (CHAK)<b></td> 
      </tr>
      <tr>
        <td colspan="6" style="font-size:8px;"><b>P.O. Box 78040, VIWANDANI 00507<br>NAIROBI, KENYA<br>Website: <u>www.meds.or.ke<u></b></td>
        <td colspan="6" style="text-align:right;font-size:8px;"><b>TEL: (+254) 20-3920000, 0734-600310, 0722-202106, 0726-937222<br>WIRELESS: 0202124453, 0202532216, 0202460022, 02032214<br/>E-mail: sahibu@africaonline.co.ke,lab@meds.or.ke</b></td>
      </tr>   
      <tr>
        <td colspan="12" align ="center" style="font-size:8px;border-top: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>MEDS Quality Control Laboratory is Pre-Qualified by WHO<br/>ISO 9001:2008 Certified<b></td> 
      </tr>
      
    </table>';


  // echo $print;
  // die;
  $this->load->library('mpdf/mpdf');// Load the library
  $this->mpdf->WriteHTML($print); // Output the results in the browser
  $this->mpdf->Output($filename,'D'); //bring up "Save as Dialog"

  }
}
?>