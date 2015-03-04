<?php
class Test_Disintergration_Model extends CI_Model{

	function Test_Disintegration_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		$equipment_make=$this->input->post('equipment_make');
		$equipment_no=$this->input->post('equipment_no');
		$highest_hours=$this->input->post('highest_hours');
		$highest_mins=$this->input->post('highest_mins');
		$highest_seconds=$this->input->post('highest_seconds');
		$mean_hours=$this->input->post('mean_hours');
		$mean_mins=$this->input->post('mean_mins');
		$mean_seconds=$this->input->post('mean_seconds');
		$medium=$this->input->post('medium');
		$actual_medium=$this->input->post('actual_medium');
		$medium_comment=$this->input->post('medium_comment');
		$medium_temperature=$this->input->post('medium_temperature');
		$actual_medium_temperature=$this->input->post('actual_medium_temperature');
		$medium_temperature_comment=$this->input->post('medium_temperature_comment');
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Disintegration';
		$analyst= $this->input->post('analyst');
		$test_type = '3';

		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$results = $actual_medium .' and ' .$actual_medium_temperature ;
		
		$data =array(
			'equipment_make'=>$equipment_make,
			'equipment_no'=>$equipment_no,
			'highest_hours'=>$highest_hours,
			'highest_mins'=>$highest_mins,
			'highest_seconds'=>$highest_seconds, 
			'mean_hours'=>$mean_hours,
			'mean_mins'=>$mean_mins,
			'mean_seconds'=>$mean_seconds, 
			'dis_medium'=>$medium,
			'actual_medium'=>$actual_medium,
			'medium_comment'=>$medium_comment,
			'medium_temperature'=>$medium_temperature,
			'actual_medium_temperature'=>$actual_medium_temperature,
			'medium_temperature_comment'=>$medium_temperature_comment,
			'test_request'=>$test_request,
			'assignment'=>$assignment,
			'status'=>$status,
			'choice'=>$this->input->post('choice'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'analyst'=>$this->input->post('done_by'),
			'date_done'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),			

			);
		$this->db->insert('disintegration', $data);
				
		$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'remarks'=>$this->input->post('choice'),
			'method'=>$this->input->post('method'),
			'results'=>$results,
			);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));


		redirect('test/index/'.$assignment.'/'.$test_request);	
	}
	function save_monograph(){
		$test_request=$this->input->post('test_request');
		$disintegration_id =1;	

		$data=$this->db->select_max('id')->get('disintegration')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$assignment=$this->input->post('assignment');
		$test_name='Disintegration';
		$test_type = '3';
		$analyst= $this->input->post('analyst');
		$disintegration_id= 1;

		$data = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_id' => $test_id,
			'test_type' => $test_type,
			'test_name' => $test_name,
			'monograph_specifications' => $this->input->post('specification'),

			);
		$this->db->insert('monograph_specifications', $data);

		$data2 = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_type' => $test_type,
			'specifications' => $this->input->post('specification'),

			);
		$this->db->insert('test_results', $data2);
		redirect('test/index/'.$assignment.'/'.$test_request);	

	}
}

?> 