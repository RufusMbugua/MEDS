<?php
class Finance_Model extends CI_Model{
    
    function Finance_Model(){
      parent::__construct();
    }

    function process_proforma_invoice(){
     
     
     //Data Insertion
     $data= array(

      'customer_reference'=>$this->input->post('customer_reference'),
      'enquiry_date'=>$this->input->post('enquiry_date'),
      'tender_date'=>$this->input->post('tender_date'),
      'ship_date'=>$this->input->post('ship_date'),
      'amount_in'=>$this->input->post('amount_in'),
      'serial_number'=>$this->input->post('serial_number'),
      'item_code'=>$this->input->post('item_code'),
      'quantity'=>$this->input->post('quantity'),
      'unit_price'=>$this->input->post('unit_price'),
      'amount'=>$this->input->post('amount'),
      
     );
     $this->db->insert('proforma_invoice',$data);
     redirect('client_billing');
    }
    function process($test_request_id){
      $Q=1;
      $data_one=$this->db->select_max('id')->get('invoice')->result();
      $invoice_id=$data_one[0]->id;
      $invoice_id++;
      
      $data_two=$this->db->select('test_request_id')->get_where('invoice', array('id' => $invoice_id))->result();
      $invoice_test_request_id=$data_two[0]->test_request_id;
     
     //Data Insertion
     $data= array(

      'test_request_id'=>$test_request_id,
      'customer_reference'=>$this->input->post('customer_reference'),
      'batch_lot_number'=>$this->input->post('batch_lot_number'),
      'reference_number'=>$this->input->post('reference_number'),
      'active_ingredients'=>$this->input->post('active_ingredients'),
      'quantity_submitted'=>$this->input->post('quantity_submitted'),
      'enquiry_date'=>$this->input->post('enquiry_date'),
      'tender_date'=>$this->input->post('tender_date'),
      'expiry_date'=>$this->input->post('expiry_date'),
      'ship_date'=>$this->input->post('ship_date'),
      'unit_price_identification_cost'=>$this->input->post('unit_price_identification_cost'),
      'unit_price_friability_cost'=>$this->input->post('unit_price_friability_cost'),
      'unit_price_ph_alkalinity_cost'=>$this->input->post('unit_price_ph_alkalinity_cost'),
      'unit_price_assay_cost'=>$this->input->post('unit_price_assay_cost'),
      'unit_price_disintegration_cost'=>$this->input->post('unit_price_disintegration_cost'),
      'unit_price_dissolution_cost'=>$this->input->post('unit_price_dissolution_cost'),
      'unit_price_content_uniformity_cost'=>$this->input->post('unit_price_content_uniformity_cost'),
      'unit_price_full_monograph'=>$this->input->post('unit_price_full_monograph'),
      'unit_price_microbiology_cost'=>$this->input->post('unit_price_microbiology_cost'),
      'unit_price_uniformity_of_dosage_cost'=>$this->input->post('unit_price_weight_variation'),
      'unit_price_weight_variation'=>$this->input->post('unit_price_weight_variation'),
      'unit_price_water_method_cost'=>$this->input->post('unit_price_water_method_cost'),
      'unit_price_loss_drying_cost'=>$this->input->post('unit_price_loss_drying_cost'),
      'total_amount'=>$this->input->post('total_amount'),
      'amount_in'=>$this->input->post('amount_in'),
      'comments'=>$this->input->post('comments')
      
     );
     $data_three = array(
     'quotation_status'=>$Q,
    );
     $this->db->insert('invoice',$data);
     $this->db->update('test_request', $data_three,array('id' => $test_request_id));
     redirect('home');
    }
}
?>