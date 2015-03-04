<?php
class Update_Requestmodel extends CI_Model {
// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


function update_data($trid){
    //$test_request_id= $trid;
    // $user_type_id = $utid;
    $testsa=$this->input->post('tests');
    $tests= implode( ",", $testsa );
    
    $data = array(

   'reference_number'=>$this->input->post('reference_number'),
   'applicant_name'=>$this->input->post('applicant_name'),
   'applicant_address'=>$this->input->post('applicant_address'),
   'active_ingredients'=>$this->input->post('active_ingredients'),
   'dosage_form'=>$this->input->post('dosage_form'),
   'strength_concentration'=>$this->input->post('strength_concentration'),
   'measure'=>$this->input->post('measure'),
   'pack_size'=>$this->input->post('pack_size'),
   'label_claim'=>$this->input->post('label_claim'),
   'manufacturer_name'=>$this->input->post('manufacturer_name'),
   'manufacturer_address'=>$this->input->post('manufacturer_address'),
   'brand_name'=>$this->input->post('brand_name'),
   'marketing_authorization_number'=>$this->input->post('marketing_authorization_number'),
   'batch_lot_number'=>$this->input->post('batch_lot_number'),
   'date_manufactured'=>$this->input->post('date_of_manufacture'),
   'expiry_date'=>$this->input->post('expiry_retest_date'),
   'storage_conditions'=>$this->input->post('storage_conditions'),
   'quantity_submitted'=>$this->input->post('quantity_submitted'),
   'quantity_remaining'=>$this->input->post('quantity_submitted'),
   'quantity_type'=>$this->input->post('quantity_type'),
   'applicant_ref_number'=>$this->input->post('applicant_reference_number'),
   'sample_source'=>$this->input->post('sample_source'),
   'testing_reason'=>$this->input->post('reason'),
   'other_reason'=>$this->input->post('other_reason'),
   'other_test_required'=>$this->input->post('other_test'),
   'other_specification'=>$this->input->post('other_specification'),
   'tests'=>$tests,
   'test_specification'=>$this->input->post('specification'),
   'authorizer_name'=>$this->input->post('authorizing_name'),
   'authorizer_designation'=>$this->input->post('designation'),
   'date_authorized'=>$this->input->post('date_authorized'),
   'findings_comments'=>$this->input->post('findings_comment'),
   'received_by'=>$this->input->post('received_by'),
   'date_received'=>$this->input->post('date_received'),
   'laboratory_number'=>$this->input->post('lab_reg_number')
   );

    $this->db->update('test_request', $data,array('id' => $trid));
    //var_dump($data);
    redirect('home');
}
}
?>