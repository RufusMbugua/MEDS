<?php
class Friability_Model extends CI_Model{
   
   function __construct()
   {
    parent::__construct();
   }
   function process_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="Friability";
    $test_type=18;

    $sql=$this->db->select_max('id')->get('friability')->result();
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
     $test_type=18;
     $status=1;
    
     
    $data = array(
     
     'serial_number'=>$this->input->post('serial_number'),
     'test_request_id'=>$test_request_id,
     'assignment_id'=>$assignment_id,
     'time'=>$this->input->post('time'),
     'revolutions'=>$this->input->post('revolutions'),
     'w_tablets_containers_bf_rotation'=>$this->input->post('w_tablets_containers_bf_rotation'),
     'w_tablets_containers_af_rotation'=>$this->input->post('w_tablets_containers_af_rotation'),
     'w_containers_bf_rotation'=>$this->input->post('w_container_bf_rotation'),
     'w_containers_af_rotation'=>$this->input->post('w_container_af_rotation'),
     'w_tablets_bf_rotation'=>$this->input->post('w_tablets_bf_rotation'),
     'w_tablets_af_rotation'=>$this->input->post('w_tablets_af_rotation'),
     'loss_in_weight'=>$this->input->post('loss_in_weight'),
     'actual'=>$this->input->post('actual'),
     'comment'=>$this->input->post('comment'),
     'specification'=>$this->input->post('specification'),
     'method'=>$this->input->post('method'),
     'results'=>$this->input->post('results'),
     'test_status'=>$status
    );

    $data_two = array(
     'results'=>$this->input->post('loss_in_weight').'% Weight Loss',
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('results')

    );
    
    $this->db->insert('friability', $data);
    $this->db->update('test_results', $data_two,array('test_type' => $test_type,'test_request_id'=>$test_request_id));
   
    redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
}
?>
