<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
  function index()
  {
    $test_request_id= $this->uri->segment(3);
    
    $data['request']=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $test_request_id))->result_array();
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $test_request_id))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['tests']=$return;

    $this->load->view('invoice_form',$data);
  }
  function quote()
  {
    $invoice_id= $this->uri->segment(3);
    $test_request_id= $this->uri->segment(4);
    $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request_id))->result_array();
    
    $data['invoice']=$this->db->select('*')->get_where('invoice',array('id' => $invoice_id))->result_array();

    $data['request']=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.request_status')->get_where('test_request', array('id' => $test_request_id))->result_array();
    
    
    $this->load->view('view_quote',$data);
  }

  function submit(){
    $test_request_id= $this->uri->segment(3);

   $this->load->model('finance_model');

   if ($this->input->post('submit')){
      $this->finance_model->process($test_request_id);
   }
  }
}
?>