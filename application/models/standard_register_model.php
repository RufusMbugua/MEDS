<?php
class Standard_Register_Model extends CI_Model{
 
 function __construct(){

  parent::__construct();
 }
 
 //Function that calls all post fields of the Standard Register Form
 function process(){

 //Data Insertion
  $data = array(
   
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
   'type'=>$this->input->post('type'),
   'quantity'=>$this->input->post('quantity'),
   'qty_type'=>$this->input->post('qty_type'),
   'initial_quantity'=>$this->input->post('quantity'),
   'intended_use'=>$this->input->post('intended_use')
   
  );
  $this->db->insert('standard_register',$data);
 }
}
?>
