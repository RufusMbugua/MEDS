<?php
class Oxidisable_Model extends CI_Model{
   
   function __construct()
   {
    parent::__construct();
   }
   function process_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Oxidisables";
    $test_type="p";

    $sql=$this->db->select_max('id')->get('oxidisable')->result();
    $test_id=$sql[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;
    
    
    $data_two = array( 
     'monograph_id'=>$monograph_id,
     'test_request_id'=>$test_request_id,
     'test_type'=>$test_type,
     'monograph_specifications'=>$this->input->post('monograph_specifications')
    );

    $data_three = array( 
     'test_request_id'=>$test_request_id,
     'test_id'=>$test_id,
     'test_type'=>$test_type,
     'test_name'=>$test_name,
     'specifications'=>$this->input->post('monograph_specifications')
    );

    $this->db->insert('monograph_specifications',$data_two);
    $this->db->insert('test_results',$data_three);
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    
   }

   function process(){
    
     $assignment_id=$this->input->post('assignment_id');
     $test_request_id=$this->input->post('tr_id');
     $test_type="p";
     $status=1;
    
     
    $data = array(
     
     'serial_number'=>$this->input->post('serial_number'),
     'test_request_id'=>$test_request_id,
     'assignment_id'=>$assignment_id,
     'observation'=>$this->input->post('observation'),
     'status'=>$status
    );

    $data_two = array(
     'results'=>$this->input->post('observation')
     // 'method'=>$this->input->post('method'),
     // 'remarks'=>$this->input->post('comment')

    );
    
    $this->db->insert('oxidisable', $data);
    $this->db->update('test_results', $data_two,array('test_type' => $test_type,'test_request_id'=>$test_request_id));
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
}
?>
