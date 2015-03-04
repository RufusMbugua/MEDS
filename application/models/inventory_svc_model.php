<?php
class Inventory_Svc_Model extends CI_Model{
 function __construct()
    {
      parent::__construct();
    }
    
 function process(){

  $item_name = $this->input->post('item_name');
    
  //Variable Sets
  $requisition=$this->input->post('requisition');
  $lpo=$this->input->post('lpo');
  $received_by=$this->input->post('received_by');
  $issued_by=$this->input->post('issued_by');
  $quantity_issued=$this->input->post('quantity_issued');
  $balance=$this->input->post('balance');
  $svc_id=$this->input->post('id');
 
  
  //Data Insertion
  $data= array(
   'requisition'=>$requisition,
   'lpo'=>$lpo,
   'received_by'=>$received_by,
   'issued_by'=>$issued_by,
   'balance'=>$balance,
   'quantity_issued'=>$quantity_issued,
   'svc_id'=>$svc_id,
   'svc_name'=>$item_name
  );
  $this->db->insert('inventory_svc',$data);

  $data_b= array(
    'quantity'=>$balance   
  );

  $this->db->update('standard_register',$data_b, array('id' => $svc_id));
  
 }

 function getDetails($id){
    $sql = "SELECT quantity FROM standard_register WHERE id =$id";
    $query=$this->db->query($sql);          
    return $query->result();

 }
}
?>
