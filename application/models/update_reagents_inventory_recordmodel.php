<?php
class Update_Reagents_Inventory_Recordmodel extends CI_Model {
// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


function Update($id){
    //Variable Set
    $item_name=$this->input->post('item_description');
    $msd=$this->input->post('msds');
    $msds=implode(',',$msd);
    $new_data = array(
        
    'item_description'=>$this->input->post('item_description'),
    'certificate_number'=>$this->input->post('certificate_number'),
    'msds'=>$msds,
    'expiry_date'=>$this->input->post('expiry_date'),    
    'batch_number'=>$this->input->post('batch_number'),
    'card_number'=>$this->input->post('card_number'),
    'package_size'=>$this->input->post('package_size'),
    'package_units'=>$this->input->post('package_units'),
    'location'=>$this->input->post('location'),
    'comments'=>$this->input->post('comments'),
    'manufacturer_supplier'=>$this->input->post('manufacturer_supplier'),
    'reorder_quantity'=>$this->input->post('reorder_quantity'),
    'reorder_units'=>$this->input->post('reorder_units'),
    'status'=>$this->input->post('status')
    );
    $this->db->update('reagents_inventory_record', $new_data,array('id' => $id));
    
    $data = array(
       'reagent_name'=>$item_name 
    );
    $this->db->update('inventory', $data,array('reagent_name' => $item_name));
    
    redirect('reagents_inventory_record/Get');
}
}
?>