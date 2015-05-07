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

    $data['full_monograph']=
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();

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
        
        $data['full_monograph'] = $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $trid))->result_array();

        $data['coa'] =  $this->db->select('*')->get_where('coa', array('test_request_id' => $trid, 'approve_status'=> $approve_status))->result_array();    
   
        $data['monograph_specifications']= $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $trid))->result_array();

        $results=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
        test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
        test_request.quantity_remaining,test_request.brand_name,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    
       $data['query']=$results[0];
       
        // echo "<pre>"; print_r($results);die;
        $this->load->view('coa_final_view', $data);

    }
function coa_pdf(){

    $trid = $this->uri->segment(3);
    $approve_status=1;

    $tests =$this->db->select('*')->get_where('test_results', array('test_request_id' => $trid))->result_array();    
   
    $coa =  $this->db->select('*')->get_where('coa', array('test_request_id' => $trid, 'approve_status'=> $approve_status))->result_array();    

    $full_monograph = $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $trid))->result_array();

    $monograph_specifications = $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $trid))->result_array();

    $results=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.brand_name,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.brand_name,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.label_claim,test_request.request_status')->get_where('test_request', array('id' => $trid))->result_array();
    // print_r($results)
    $query=$results[0];
    	
  $this->load->library('mpdf/mpdf');
  $print = "";
  $i=1;

  $img=base_url().'images/header.png';// MEDS Logo
  $style=base_url().'style/table.css';
  $date=$query['date_time'];
  $date_f=date_format($date,'d/m/y');
 //please debug this
  $print .='

  <link href="'.$style.'" rel="stylesheet" type="text/css" />

   <table width="100%" bgcolor="#ffffff" cellpadding="8px" align="center" border="0">
     <tr>
        <td colspan="8" style="padding:8px;text-align:center;">
          <table width="100%" bgcolor="#ffffff" cellpadding="8px" align="center" border="1">
             <tr>
                <td colspan="8" style="padding:4px;"><img src="'.$img.'" height="280px" width="1000px"/></td>
             </tr>
            </table>
        </td>
    </tr>
  </table>
  <table align="center" width="100%" bgcolor="#ffffff">
    <tr>
        <td align="left" colspan="2" style="font-family:Arial;font-size:10px;padding:8px;"><b><u>REGISTRATION NUMBER:</u></b>'." ". $query['laboratory_number'].' </td>
        <td align="left" colspan="2" style="font-family:Arial;font-size:10px;padding:8px;"><b><u>Request Date:</u></b>'." ".substr($date,0,10).'</td>
        <td align="left" colspan="2" style="font-family:Arial;font-size:10px;padding:8px;"><b><u>Test Date:</u></b>'." ". date("Y-m-d").'</td>
    </tr>  
    <tr>
         <td colspan="6" align="left" style="font-family:Arial;font-size:11px;padding:8px;"><b><u>NAME OF PRODUCT:</u></b>&nbsp;&nbsp;&nbsp; <b>'. $query['active_ingredients'] .'['.$query['brand_name'].']'.'</b></td>       
    </tr>
    <tr>
        <td colspan="3" align="left" style="font-family:Arial;font-size:10px;padding:8px;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>CLIENT:</u></b><br>'. $query['applicant_name'].'</br><br>'. $query['applicant_address'].'</br></td>       
        <td colspan="3" align="left" style="font-family:Arial;font-size:10px;padding:8px;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>MANUFACTURER:</u></b><br>'. $query['manufacturer_name'].'</br><br>'.$query['manufacturer_address'].'</br></td>
    </tr>
    <tr>
      <td colspan="6" align="left" style="font-family:Arial;font-size:11px;padding:8px;"><b><u>LABEL CLAIM:</u></b></td>
    </tr>
    <tr>
      <td colspan="6" style ="font-family:Arial;text-align:left;font-size:10px;padding:8px;">'. $query['label_claim'].'&nbsp;,Batch Number:'. $query['batch_lot_number'].'&nbsp;,Manufactured-'. $query['date_manufactured'].'&nbsp;,Expires-'. $query['expiry_date'].'</td>
    </tr>
  </table>      
    
    <table width="950px" bgcolor="#ffffff" border="" cellfont-size:12px;padding="4px" align="center"> 
        <tr>
      <td align= "center" style="font-family:Arial;font-size:16px;padding:8px;text-align:center;font-size:12px;padding-right:40px;">
        <u><h2><b>RESULTS OF ANALYSIS</b></h2></u></td>      
    </tr>
    <tr>
      <td align="left" style="font-family:Arial;font-size:12px;padding:8px;text-transform: capitalize;"><b>Appearance:</b>&nbsp;'.$full_monograph[0]['appearance'].'</td>
    </tr>
    </table>
    <table width="100%" class="results" align="center" border="1">
          <tr>
            <td align="center" style="font-family:Arial;font-size:10px;"><b>TEST</b></th>
            <td align="center" style="font-family:Arial;font-size:10px;padding:2px;"><b>METHOD</b></th> 
            <td align="center" style="font-family:Arial;font-size:10px;padding:2px;"><b>SPECIFICATIONS</b></th>  
            <td align="center" style="font-family:Arial;font-size:10px;padding:2px;"><b>RESULTS</b></th>
            <td align="center" style="font-family:Arial;font-size:10px;padding:2px;"><b>REMARKS</b></th>     

          </tr>';
           foreach($tests as $row){
          $print.="<tr>";
          $print.='<td style="font-family:Arial;font-size:10px;padding:2px;"><b>'.$row['test_name'].'</b></td>';      
          $print.='<td style="font-family:Arial;font-size:10px;padding:2px;">'.$row['method'].'</td> ';      
          $print.='<td style="font-family:Arial;font-size:10px;padding:2px;">'.$row['specifications'].'</td>';
          $print.='<td style="font-family:Arial;font-size:10px;padding:2px;">'.$row['results'].'</td>';    
          $print.='<td style="font-family:Arial;font-size:10px;padding:2px;"><b>'.$row['remarks'].'</b></td>';
          $print.="<tr>";
          } 
        $print.='
      </table> 
      <table bgcolor="#ffffff" border="0">   
        <tr>
        <td colspan="2" style="font-family:Arial;font-size:11px;padding:8px;"><b>CONCLUSION: <b></td> 
        <td colspan="10" style ="font-family:Arial;font-size:10px;padding:8px;">'. $coa[0]['conclusions'].'</td>
      </tr>
      </table>     
      <table bgcolor="#ffffff" border="0"> 
      <tr>    
        <td colspan="12" style="font-family:Arial;font-size:12px;padding-bottom:40px;background-color:#ffffff"><b>*Results given are specific to the indicated batch</b></td>
      </tr>
      </table>
      <table bgcolor="#ffffff" class="conclusion" border="0"> 
      
      <tr>    
         <td colspan ="4" style="padding:8px;font-family:Arial;font-size:14px;border-right:1px solid #000;"><b>PREPARED BY: '. $coa[0]['done_by'].'</td>
         <td colspan ="4" style="padding:8px;font-family:Arial;font-size:14px;border-right:1px solid #000;"><b>REVIEWED BY: '. $coa[0]['supervisor'].'</td>   
         <td colspan ="4" style="padding:8px;font-family:Arial;font-size:14px;"><b>APPROVED BY: Stephen Kigera</td>   
      </tr>
      <tr>    
         <td colspan ="2" style="padding:10px;font-family:Arial;font-size:12px;">_______________________</td><td colspan ="2" style="padding:10px;font-family:Arial;font-size:11px;border-right:1px solid #000;"> _______________________</td>
         <td colspan ="2" style="padding:10px;font-family:Arial;font-size:12px;"> _______________________</td><td colspan ="2" style="padding:10px;font-family:Arial;font-size:11px;border-right:1px solid #000;"> _______________________</td>   
         <td colspan ="2" style="padding:10px;font-family:Arial;font-size:12px;">_______________________</td><td colspan ="2" style="padding:10px;font-family:Arial;font-size:11px;"> _______________________</td>   
      </tr>
      <tr>    
         <td colspan ="2" style="padding:8px;font-family:Arial;font-size:12px;"><b>Laboratory Analyst</b></td><td colspan ="2" style="font-family:Arial;text-align:center;font-size:12px;border-right:1px solid #000;"><b>Date</b></td>
         <td colspan ="2" style="padding:8px;font-family:Arial;font-size:12px;"><b>Laboratory Supervisor</b></td><td colspan ="2" style="font-family:Arial;text-align:center;font-size:12px;border-right:1px solid #000;"><b>Date</b></td>   
         <td colspan ="2" style="padding:8px;font-family:Arial;font-size:12px;"><b>Quality Assurance Manager</b></td><td colspan ="2" style="font-family:Arial;text-align:center;font-size:12px;"><b>Date</b></td>   
      </tr>
      </table>
      <table bgcolor="#ffffff" border="0"> 
      <tr>
        <td colspan="12" align="center" style="padding:8px;font-family:Arial;font-size:10px;padding-top:20px; ">
        <b>A Joint Service of the Kenya Conference of Catholic Bishops (KCCB) and Christian Health Association of Kenya (CHAK)<b></td> 
      </tr>
      <tr>
        <td colspan="6" style="padding:8px;font-family:Arial;font-size:10px;"><b>P.O. Box 78040, VIWANDANI 00507<br>NAIROBI, KENYA<br>Website: <u>www.meds.or.ke<u></b></td>
        <td colspan="6" style="padding:8px;font-family:Arial;text-align:right;font-size:10px;"><b>TEL: (+254) 20-3920000, 0734-600310, 0722-202106, 0726-937222<br>WIRELESS: 0202124453, 0202532216, 0202460022, 02032214<br/>E-mail: sahibu@africaonline.co.ke,lab@meds.or.ke</b></td>
      </tr>   
      <tr>
        <td colspan="12" align ="center" style="padding:8px;font-family:Arial;font-size:10px;color:#0000ff;"><b>MEDS Quality Control Laboratory is Pre-Qualified by WHO</b></td> 
      </tr>
      <tr>
        <td colspan="12" align ="center" style="padding:8px;font-family:Arial;font-size:10px;color:#ff0000;"><b>ISO 9001:2008 Certified</b></td> 
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