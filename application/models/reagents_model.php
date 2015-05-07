<?php
class Reagents_Model extends CI_Model{
   
     function __construct()
     {
      parent::__construct();
     }

    function process_tests_reagents(){

    	$assignment_id=$this->input->post('assignment_id');
      	$test_request_id=$this->input->post('tr_id');

	    $data = array(
	     
	     'test_request_id'=>$test_request_id,
	     'assignment_id'=>$assignment_id,
	     'test'=>$this->input->post('test'),
	     'chemical_reagent'=>$this->input->post('chemical_reagent'),
	     'batch_number'=>$this->input->post('batch_number'),
	     'manufacturer'=>$this->input->post('manufacturer'),
	     'done_by'=>$this->input->post('done_by'),
	     'date_done'=>$this->input->post('date_done')

	     
	    );
	    
	     $this->db->insert('test_reagents',$data);
	     redirect('test/index/'.$assignment_id.'/'.$test_request_id);
    }
}