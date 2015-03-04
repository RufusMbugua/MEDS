<?php
class Assignment_Model extends CI_Model{
 function __construct()
 {
  parent::__construct();
 }
 function process($tr_id){
  $status=1;
  $data_query=$this->db->select('new_quantity')->get('test_request')->result();
  $nw_qty= $data_query[0]->new_quantity;

  $data_sub=$this->db->select('quantity_submitted')->get('test_request')->result();
  $submitted_qty= $data_sub[0]->quantity_submitted;

  $data_remaining=$this->db->select('quantity_remaining')->get_where('test_request',array('test_request.id' => $tr_id))->result_array();
  $remaining_qty= $data_remaining[0]['quantity_remaining'];
  //echo $remaining_qty;
  //var_dump($data_remaining);
  // echo $nw_qty;
  

if($nw_qty==0 || $nw_qty=="" || $nw_qty=="NULL" ){

  $difference="";
  $reference_number= $this->input->post('reference_number');
  $assignment_status=1;
  $user_id = $this->input->post('user_id');
  $analyst_assigned_id= $this->input->post('assigneruserid');
  $test_request_id = $this->input->post('tr_id');
  $analyst_name= $this->input->post('analyst');
  $client_id= $this->input->post('client_id');
  $request_type= $this->input->post('request_type');
  $sample_quantity= $this->input->post('sample_quantity');
  $samples_issued= $this->input->post('samples_issued');

 //function that calculates the remainder
  $difference=$submitted_qty-$samples_issued;

 //Data Insertion
  $data = array( 
   'reference_number'=>$reference_number,
   'analyst_name'=>$analyst_name,
   'assigner_name'=>$this->input->post('user_name'),
   'test_request_id'=>$test_request_id,
   'assigner_user_id'=>$user_id,
   'analyst_assigned_id'=>$analyst_assigned_id,
   'client_id'=>$client_id,
   'sample_issued'=>$samples_issued
   );
  
  $data_two = array(
   'test_request_id'=>$test_request_id,
   'assigner_id'=>$user_id
  );
  
  $data_three = array(

   'request_status'=>$status,
   'quantity_remaining'=>$difference,
   'assignment_status'=>$assignment_status,
   'new_quantity'=>$difference
   
  );
  // $data_four = array(
  //  'analyst_name'=>$analyst_name
   
  // );
 $this->db->insert('assignment',$data);
 $this->db->update('test_request', $data_three,array('id' => $test_request_id));
}else if($remaining_qty!=0 || $remaining_qty!="" || $remaining_qty!="NULL" ){

  $difference="";
  $reference_number= $this->input->post('reference_number');
  $assignment_status=1;
  $user_id = $this->input->post('user_id');
  $analyst_assigned_id= $this->input->post('assigneruserid');
  $test_request_id = $this->input->post('tr_id');
  $analyst_name= $this->input->post('analyst');
  $client_id= $this->input->post('client_id');
  $request_type= $this->input->post('request_type');
  $sample_quantity= $this->input->post('sample_quantity');
  $samples_issued= $this->input->post('samples_issued');

 //function that calculates the remainder
  $difference=$remaining_qty-$samples_issued;

 //Data Insertion
  $data = array( 
   'reference_number'=>$reference_number,
   'analyst_name'=>$analyst_name,
   'assigner_name'=>$this->input->post('user_name'),
   'test_request_id'=>$test_request_id,
   'assigner_user_id'=>$user_id,
   'analyst_assigned_id'=>$analyst_assigned_id,
   'client_id'=>$client_id,
   'sample_issued'=>$samples_issued
   );
  
  $data_two = array(
   'test_request_id'=>$test_request_id,
   'assigner_id'=>$user_id
  );
  
  $data_three = array(
   'request_status'=>$status,
   'quantity_remaining'=>$difference,
   'assignment_status'=>$assignment_status,
   'new_quantity'=>$difference
   
  );
  // $data_four = array(
  //  'analyst_name'=>$analyst_name
   
  // );

 $this->db->insert('assignment',$data);
 $this->db->update('test_request', $data_three,array('id' => $test_request_id));

 //var_dump($data_three);
  //var_dump ($data);
 
 }
}
}
?>
