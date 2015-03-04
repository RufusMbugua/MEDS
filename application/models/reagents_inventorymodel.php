<?php
class Reagents_Inventorymodel extends CI_Model{
 function __construct()
    {
      parent::__construct();
    }
    
 function process(){
    
  //Variable Sets
  
  $batch_number=$this->input->post('batch_number');
  $manufacturer_supplier=$this->input->post('manufacturer_supplier');
  $certificate_number=$this->input->post('certificate_number');
  $msd=$this->input->post('msds');
  $msds=implode(',',$msd);
  $item_description=$this->input->post('item_description');
  $card_number=$this->input->post('card_number');
  $package_size=$this->input->post('package_size');
  $package_units=$this->input->post('package_units');
  $quantity=$this->input->post('total_quantity');
  $expiry_date=$this->input->post('expiry_date');
  $location=$this->input->post('location');
  $reorder_quantity=$this->input->post('reorder_quantity');
  $reorder_units=$this->input->post('reorder_units');
  $comments=$this->input->post('comments');
 
  
  //Data Insertion
  $data= array(
   'batch_number'=>$batch_number,
   'manufacturer_supplier'=>$manufacturer_supplier,
   'certificate_number'=>$certificate_number,
   'msds'=>$msds,
   'item_description'=>$item_description,
   'card_number'=>$card_number,
   'package_size'=>$package_size,
   'package_units'=>$package_units,
   'quantity'=>$quantity,
   'expiry_date'=>$expiry_date,
   'location'=>$location,
   'reorder_quantity'=>$reorder_quantity,
   'reorder_units'=>$reorder_units,
   'comments'=>$comments
   
   
  );
  $this->db->insert('reagents_inventory_record',$data);
  
 }
 function process_print($id){

 $data['query']=$this->db->select('*')->get_where('reagents_inventory_record',array('id'=>$id))->result_array();
  
}
}
?>
