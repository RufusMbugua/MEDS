<?php

class Outoftolerance_Model extends CI_Model{
 function __construct(){

      parent::__construct();
    }
    
 function process(){
  
  $data=$this->db->select_max('out_id')->get('outoftolerance')->result();
  $ot= $data[0]->out_id;
  $ot++;
  
   //Get the input fields and assing it to variables
  $assessment_date=$this->input->post('date');
  $equipment_id=$this->input->post('equipment_id');
  $ref_no=$this->input->post('ref_no');
  $instrument_state=$this->input->post('instrument_state');
  $reporter=$this->input->post('reporter');
  $comments=$this->input->post('comments');
  $equipment_used=$this->input->post('equipment_used');
  $standard_reading=$this->input->post('standard_reading');
  $instrument_reading=$this->input->post('instrument_reading');
  $deviation=$this->input->post('deviation');
  $specification_limits=$this->input->post('specification_limits');
  $conducted_by=$this->input->post('conducted_by');
  $user=$this->input->post('user');
  $approved='Yes';
  $status='1';  
  //the variables are passed to the db
  $data= array(
 
   'equipment_maintenance_id'=>$equipment_id,
   'equipment_name'=>$this->input->post('equipment_name'),
   'ref_no'=>$ref_no,
   'instrument_state'=>$instrument_state,
   'reporter'=>$reporter,
   'comments'=>$comments,
   'equipment_used'=>$equipment_used,
   'deviation'=>$deviation,
   'instrument_reading'=>$instrument_reading,
   'standard_reading'=>$standard_reading,
   'specification_limits'=>$specification_limits,
   'conducted_by'=>$conducted_by,
   'assessment_date'=>$assessment_date,
   'approved'=>$approved,
   'who'=>$user
  
  );

   $data_two= array(
   'out_id'=>$ot,
   'status'=>$status
  );
   
  $this->db->insert('outoftolerance',$data);
  $this->db->update('equipment_maintenance', $data_two,array('id' => $equipment_id));

  redirect('outoftolerance/records');
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
 redirect('outoftolerance/oot_list');
 
 }
 

}
?>
