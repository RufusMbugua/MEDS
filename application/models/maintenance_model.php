<?php
class Maintenance_Model extends CI_Model{
 function __construct(){
      parent::__construct();
 }
 
 function update(){
 
  //Variable Sets
  $id=$this->input->post('id');
  $status=0;
  $comments=$this->input->post('comments');
  
  $data= array(
   'equipment_maintenance_id'=>$id,
   'maintenance_requirement'=>$this->input->post('maintenance_requirement'),
   'maintenance_start'=>$this->input->post('maintenance_schedule_start'),
   'maintenance_next'=>$this->input->post('next_maintenance_schedule_start'),
   'maintenance_interval_start'=>$this->input->post('maintenance_interval'),
   'maintenance_specification'=>$this->input->post('maintenance_specification'),
   'maintenance_comments'=>$this->input->post('maintenance_comments'),

   'calibration_requirement'=>$this->input->post('calibration_requirement'),
   'calibration_start'=>$this->input->post('calibration_schedule_start'),
   'calibration_next'=>$this->input->post('next_calibration_schedule_start'),
   'calibration_interval_start'=>$this->input->post('calibration_interval'),
   'calibration_specification'=>$this->input->post('calibration_specification'),
   'calibration_comments'=>$this->input->post('calibration_comments'),
  
  );
  
  $this->db->insert('maintenance',$data);
  redirect('maintenance/index/'.$id);
 }

 function save_calibration_maintenance(){

  $id=$this->input->post('equipment_id');
  $data= array(
   'equipment_id '=>$this->input->post('equipment_id'),  
   'calibration_date'=>$this->input->post('calibration_date'),  
   'specification'=>$this->input->post('specification'),  
   'first_reading'=>$this->input->post('first_reading'),  
   'second_reading'=>$this->input->post('second_reading'),  
   'third_reading'=>$this->input->post('third_reading'),  
   'fourth_reading'=>$this->input->post('fourth_reading'),  
   'fifth_reading'=>$this->input->post('fifth_reading'),  
   'range_from'=>$this->input->post('range_from'),  
   'range_to'=>$this->input->post('range_to'),  
   'comments'=>$this->input->post('comments'),  
   'next_date'=>$this->input->post('next_date'), 
   'person_reporting'=>$this->input->post('person_reporting')  
  );

  $this->db->insert('calibration_maintenance',$data);
  redirect('maintenance/index/'.$id);
 }
 // function maintenanceoutoftolerance(){
 
 //  //Variable Sets
 //  $id=$this->input->post('id');
 //  $out_id=$this->input->post('out_id');
 //  $start=$this->input->post('maintenance_schedule_start');
 //  $maintenance_requirement=$this->input->post('maintenance_requirement');
 //  $interval=$this->input->post('maintenance_interval');
 //  $specification=$this->input->post('maintenance_specification');
 //  $comments=$this->input->post('comments');
 //  $next_date=$this->input->post('next_maintenance_schedule_start');
 //  $status=0;
 //  //Equipment Insertion
 //  $data= array(
 //   'id'=>$id,
 //   'maintenance_start'=>$start,
 //   'maintenance_requirement'=>$maintenance_requirement,
 //   'interval_start'=>$interval,
 //   'specification'=>$specification,
 //   'comments'=>$comments,
 //   'status'=>$status
  
 //  );
 
 //  $data_two= array(
 //   'equipment_maintenance_id'=>$id,
 //   'out_id'=>$out_id,
 //   'start_date'=>$start,
 //   'requirement'=>$maintenance_requirement,
 //   'interval'=>$interval,
 //   'specification'=>$specification,
 //   'comments'=>$comments,
 //   'next_date'=>$next_date
 //  );
 //  $this->db->update('equipment_maintenance', $data,array('id' => $id));
 //   $this->db->insert('maintenance',$data_two);
 //  redirect('maintenance/index/'.$id);
 // }
 
 // function calibrationoutoftolerance(){
 
 //  //Variable Sets
 //  $id=$this->input->post('id');
 //  $out_id=$this->input->post('out_id');
 //  $start=$this->input->post('maintenance_schedule_start');
 //  $maintenance_requirement=$this->input->post('maintenance_requirement');
 //  $interval=$this->input->post('maintenance_interval');
 //  $specification=$this->input->post('maintenance_specification');
 //  $comments=$this->input->post('comments');
 //  $next_date=$this->input->post('next_maintenance_schedule_start');
 //  $status=0;
 //  //Equipment Insertion
 //  $data= array(
 //   'id'=>$id,
 //   'maintenance_start'=>$start,
 //   'maintenance_requirement'=>$maintenance_requirement,
 //   'interval_start'=>$interval,
 //   'specification'=>$specification,
 //   'comments'=>$comments,
 //   'status'=>$status
  
 //  );
 
 //  $data_two= array(
 //   'c_equipment_maintenance_id'=>$id,
 //   'c_out_id'=>$out_id,
 //   'c_start_date'=>$start,
 //   'c_requirement'=>$maintenance_requirement,
 //   'c_interval'=>$interval,
 //   'c_specification'=>$specification,
 //   'c_comments'=>$comments,
 //   'c_next_date'=>$next_date
 //  );
 //  $this->db->update('equipment_maintenance', $data,array('id' => $id));
 //   $this->db->insert('maintenance',$data_two);
 //  redirect('maintenance/index/'.$id);
 // }
}
?>
