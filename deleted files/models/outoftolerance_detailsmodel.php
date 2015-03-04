<?php
class Outoftolerance_Detailsmodel extends CI_Model{

 function Outoftolerance_Detailsmodel(){
  parent::__construct();
 }
 
 function details($out_id){
  $status=1;
  $instrument_state=$this->input->post('instrument_state');
  $data = array(
  'ref_no'=>$this->input->post('ref_no'),
  'instrument_state'=>$instrument_state,
  'reporter'=>$this->input->post('reporter'),
  'comments'=>$this->input->post('comments'),
  'status'=>$status,
  'equipment_used'=>$this->input->post('equipment_used'),
  'who'=>$this->input->post('user')
  );
 
 $this->db->update('outoftolerance', $data,array('out_id' => $out_id));
 redirect('outoftolerance_list/records');
 
 }
}
?>