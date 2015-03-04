<?php
class Coa_Model extends CI_Model{
	function Coa_Model(){
		parent::__construct();
	}

	function process(){
		//The varibles from the view
		$test_request = $this->input->post('test_request');
		$assignment = $this->input->post('assignment');
		$request_status = 2;

		$data =array(
			'test_request_id'=>$this->input->post('test_request'),
			'test_request_name'=>$this->input->post('test_request_name'),
			'conclusions'=>$this->input->post('conclusions'),
			'done_by'=>$this->input->post('done_by'),
			);
		$data_2  = array('request_status' =>$request_status );
		$this->db->insert('coa',$data);
		$this->db->update('test_request',$data_2, array('id'=>$test_request));
		redirect('test/index/'.$assignment.'/'.$test_request);

	}

	function save_approval_model(){
		//The variables from the view

		$test_request_id = $this->input->post('test_request');		
		$status = 1;
		$result_data =array(

			'approve_status'=>$status,
			'supervisor'=>$this->input->post('approved_by'),
			'date_appproved'=>$this->input->post('date_approved'),
			'conclusions'=>$this->input->post('conclusions'),
			);
		$this->db->update('coa',$result_data, array('test_request_id'=>$test_request_id));

		if ($this->input->post('add_test_name')!= '') {			
		
			$result_data_2 =array(

				'test_request_id'=>$test_request_id,
				'test_name'=>$this->input->post('add_test_name'),
				'method'=>$this->input->post('add_method'),
				'specifications'=>$this->input->post('add_specification'),
				'results'=>$this->input->post('add_results'),
				'remarks'=>$this->input->post('add_remarks'),
				);
			$this->db->insert('test_results',$result_data_2);
		}
	//echo "<pre>";	print_r($result_data);echo "<pre>"; print_r($result_data_2); die;

		redirect('coa_list/records');

	}
}

?>