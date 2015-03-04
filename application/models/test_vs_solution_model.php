<?php
class Test_Vs_Solution_Model extends CI_Model{

	function Test_Vs_Solution(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$coa_method_used=$this->input->post('coa_method_used');
		$coa_results=$this->input->post('coa_results');
		$coa_specification=$this->input->post('coa_specification');
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_type='VS Solution';
		$analyst= $this->input->post('analyst');
		
		$data =array(
			
			'balance_make'=>$this->input->post('balance_make'),
			'balance_number'=>$this->input->post('balance_number'),
			'standardization'=>$this->input->post('standardization'),
			'standard_container'=>$this->input->post('standard_container'),
			'standard_container_1'=>$this->input->post('standard_container_1'),
			'standard_container_2'=>$this->input->post('standard_container_2'),
			'container'=>$this->input->post('container'),
			'container_1'=>$this->input->post('container_1'),
			'container_2'=>$this->input->post('container_2'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_weight_2'=>$this->input->post('standard_weight_2'),

			'final_reading'=>$this->input->post('final_reading'),
			'final_reading_1'=>$this->input->post('final_reading_1'),
			'final_reading_2'=>$this->input->post('final_reading_2'),
			'initial_reading'=>$this->input->post('initial_reading'),
			'initial_reading_1'=>$this->input->post('initial_reading_1'),
			'initial_reading_2'=>$this->input->post('initial_reading_2'),
			'volume'=>$this->input->post('volume'),
			'volume_1'=>$this->input->post('volume_1'),
			'volume_2'=>$this->input->post('volume_2'),

			'det_1_weight'=>$this->input->post('det_1_weight'),
			'det_1_volume'=>$this->input->post('det_1_volume'),			
			'det_1_equiv_weight'=>$this->input->post('det_1_equiv_weight'),
			'determination_1'=>$this->input->post('determination_1'),

			'det_2_weight'=>$this->input->post('det_2_weight'),
			'det_2_volume'=>$this->input->post('det_2_volume'),			
			'det_2_equiv_weight'=>$this->input->post('det_2_equiv_weight'),
			'determination_2'=>$this->input->post('determination_2'),			


			'det_3_weight'=>$this->input->post('det_3_weight'),
			'det_3_volume'=>$this->input->post('det_3_volume'),			
			'det_3_equiv_weight'=>$this->input->post('det_3_equiv_weight'),
			'determination_3'=>$this->input->post('determination_3'),			

			'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
			'rsd_results'=>$this->input->post('rsd_results'),
			'rsd_comments'=>$this->input->post('rsd_comments'),
			'sd_acceptance_criteria'=>$this->input->post('sd_acceptance_criteria'),
			'sd_results'=>$this->input->post('sd_results'),
			'sd_comments'=>$this->input->post('sd_comments'),

			'final_burette_3'=>$this->input->post('final_burette_3'),
			'final_burette_4'=>$this->input->post('final_burette_4'),
			'final_burette_5'=>$this->input->post('final_burette_5'),
			'initial_reading_3'=>$this->input->post('initial_reading_3'),
			'initial_reading_4'=>$this->input->post('initial_reading_4'),
			'initial_reading_5'=>$this->input->post('initial_reading_5'),
			'volume_3'=>$this->input->post('volume_3'),

			'volume_4'=>$this->input->post('volume_4'),
			'volume_5'=>$this->input->post('volume_5'),

			'second_det_1_weight'=>$this->input->post('second_det_1_weight'),
			'second_det_1_volume'=>$this->input->post('second_det_1_volume'),
			'second_det_1_equiv_weight'=>$this->input->post('second_det_1_equiv_weight'),
			'second_determination_1'=>$this->input->post('second_determination_1'),


			'second_det_2_weight'=>$this->input->post('second_det_2_weight'),
			'second_det_2_volume'=>$this->input->post('second_det_2_volume'),
			'second_det_2_equiv_weight'=>$this->input->post('second_det_2_equiv_weight'),
			'second_determination_2'=>$this->input->post('second_determination_2'),


			'second_det_3_weight'=>$this->input->post('second_det_3_weight'),
			'second_det_3_volume'=>$this->input->post('second_det_3_volume'),
			'second_det_3_equiv_weight'=>$this->input->post('second_det_3_equiv_weight'),
			'second_determination_3'=>$this->input->post('second_determination_3'),

			'second_average'=>$this->input->post('second_average'),
			'second_equivalent'=>$this->input->post('second_equivalent'),
			'second_rsd'=>$this->input->post('second_rsd'),
			'second_acceptance_criteria'=>$this->input->post('second_acceptance_criteria'),
			'second_results'=>$this->input->post('second_results'),
			'second_comments'=>$this->input->post('second_comments'),
			'second_acceptance_criteria_1'=>$this->input->post('second_acceptance_criteria_1'),
			'second_results_1'=>$this->input->post('second_results_1'),
			'second_comments_1'=>$this->input->post('second_comments_1'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,	

			'choice'=>$this->input->post('choice'),
			'done_by'=>$this->input->post('done_by'),
			'date_done'=>$this->input->post('date_done'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),			

			);
		$this->db->insert('vs_solution', $data);
		


		$coa_data = array(
			'coa_method_used'=>$coa_method_used,
			'coa_results'=>$coa_results,
			'coa_specification'=>$coa_specification,
			'test_request_id'=>$test_request,
			'assignment_id'=>$assignment,
			'test_type'=>$test_type,
			'analyst'=>$analyst,
			);
		//$this->db->insert('coa', $coa_data);

		redirect('test/index/'.$assignment.'/'.$test_request);	
	}
	function save_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Volumetric Solution';
		$analyst= $this->input->post('analyst');
		$volumetric_solution_id= 1;


		$data = array(
			'monograph' => $this->input->post('vs_monograph'),
			'test_request_id' => $this->input->post('test_request'),
			'assignment_id' => $this->input->post('assignment'),
			'test_name' => $test_name,
			'analyst' => $this->input->post('analyst'),
			'volumetric_solution_id' => $volumetric_solution_id


			);
		$this->db->insert('volumetric_solution_monograph', $data);
		redirect('test/index/'.$assignment.'/'.$test_request);	

	}
}

?> 