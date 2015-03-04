<?php
class Standard_Register_Model extends CI_Model{
 function __construct()
 {
  parent::__construct();
 }
 function process(){
  $level=1;
 //Data Insertion
  $data = array(
   
   'level'=>$level,
   'reference_number'=>$this->input->post('reference_number'),
   'item_description'=>$this->input->post('item_description'),
   'manufacturer_supplier'=>$this->input->post('source'),
   'expiry_date'=>$this->input->post('expiry_date'),
   'date_received'=>$this->input->post('date_received'),
   'certificate_number'=>$this->input->post('certificate_number'),
   'msds'=>$this->input->post('msds'),
   'batch_number'=>$this->input->post('batch_number'),
   'physical_appearance'=>$this->input->post('physical_appearance'),
   'location_store'=>$this->input->post('location_store'),
   'status'=>$this->input->post('status'),
   'quantity'=>$this->input->post('quantity'),
   'intended_use'=>$this->input->post('intended_use')
   
  );
  $this->db->insert('standard_register',$data);
 }
 function process_secondary(){
  $level=2;
 //Data Insertion
  $data = array(
   'level'=>$level,
   'reference_number'=>$this->input->post('reference_number'),
   'item_description'=>$this->input->post('item_description'),
   'manufacturer_supplier'=>$this->input->post('source'),
   'expiry_date'=>$this->input->post('expiry_date'),
   'date_received'=>$this->input->post('date_received'),
   'certificate_number'=>$this->input->post('certificate_number'),
   'msds'=>$this->input->post('msds'),
   'batch_number'=>$this->input->post('batch_number'),
   'physical_appearance'=>$this->input->post('physical_appearance'),
   'location_store'=>$this->input->post('location_store'),
   'status'=>$this->input->post('status'),
   'quantity'=>$this->input->post('quantity'),
   'intended_use'=>$this->input->post('intended_use')
   
  );
  $this->db->insert('standard_register',$data);
 }
}
?>
