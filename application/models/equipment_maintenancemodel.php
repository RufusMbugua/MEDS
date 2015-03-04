<?php
class Equipment_Maintenancemodel extends CI_Model{
 function __construct()
    {
      parent::__construct();
    }
    
 function process(){
  //Variable Sets
  $id=$this->input->post('id_number');
  $des=$this->input->post('description');
  $com=$this->input->post('comments');
  $manu=$this->input->post('manufacturer');
  $ser=$this->input->post('serial_number');
  $mo=$this->input->post('model');
  $user=$this->input->post('user');
  $equipment_type=$this->input->post('equipment_type');
  
  
  //Equipment Insertion
  $data= array(
   'id_number'=>$id,
   'description'=>$des,
   'comments'=>$com,
   'manufacturer'=>$manu,
   'serial_number'=>$ser,
   'model'=>$mo,
   'equipment_type'=>$equipment_type,
   'who'=>$user
   
  );
  $this->db->insert('equipment_maintenance',$data);
 
 }
}
?>
