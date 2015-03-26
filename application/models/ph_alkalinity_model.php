<?php
class Ph_Alkalinity_Model extends CI_Model{
   
   function __construct()
   {
    parent::__construct();
   }

   function process_specifications(){

    $assignment_id=$this->input->post('assignment_id');
    $test_request_id=$this->input->post('tr_id');
    $test_name="ph";
    $test_type="22";


    $data=$this->db->select_max('id')->get('ph_alkalinity')->result();
    $test_id=$data[0]->id;
    $test_id++;

    $sql=$this->db->select_max('id')->get('full_monograph')->result();
    $monograph_id=$sql[0]->id;
    //$monograph_id++;
     //Sample Insertion
    
    
    $data_two = array(
     'monograph_id'=>$monograph_id,
     'test_type'=>$test_type,
     'test_request_id'=>$test_request_id,
     'monograph_specifications'=>$this->input->post('monograph_specifications')
    );

    $data_three = array( 
     'test_id'=>$test_id,
     'test_type'=>$test_type,
     'test_request_id'=>$test_request_id,
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
     $status=1;
     $test_name="ph Alkalinity";
     $test_type="d";

    $sql=$this->db->select_max('id')->get('ph_alkalinity')->result();
    $test_id=$sql[0]->id;
    $test_id++;
  //Sample Insertion
    $data= array(
    'assignment_id'=>$assignment_id,
    'test_request_id'=>$test_request_id,
    'reference_number'=>$this->input->post('reference_number'),
    'serial_number'=>$this->input->post('serial_number'),
    'method'=>$this->input->post('method'),
    'observation'=>$this->input->post('observation'),
    'status'=>$status
     
    );
    $data_two = array(
     
     
     'test_request_id'=>$test_request_id,
     'test_id'=>$test_id,
     'test_type'=>$test_type,
     'test_name'=>$test_name,
     'results'=>$this->input->post('observation'),
     'method'=>$this->input->post('method'),
     'remarks'=>$this->input->post('comments')

    );
     //$this->db->insert('test_results',$data_two);
     $this->db->insert('ph_alkalinity',$data);
     $this->db->update('test_results', $data_two,array('test_type' => $test_type,'test_request_id'=>$test_request_id));
     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
  }
}
?>
