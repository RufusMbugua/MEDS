<?php
class Test_Loss_Drying_Model extends CI_Model{

	function Test_Loss_Drying_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$coa_method_used=$this->input->post('coa_method_used');
		$coa_results=$this->input->post('coa_results');
		$coa_specification=$this->input->post('coa_specification');
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Loss on Drying';
		$analyst= $this->input->post('analyst');
		$test_type = '14';

		$data=$this->db->select_max('id')->get('loss_drying')->result();
        $test_id=$data[0]->id;
        $test_id++;

        $results= $this->input->post('range_min') .' to '.$this->input->post('range_max');
		
		$data =array(
			
			'balance_make'=>$this->input->post('balance_make'),
			'balance_number'=>$this->input->post('balance_number'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),
			
			'standard_container'=>$this->input->post('standard_container'),
			'container'=>$this->input->post('container'),
			'standard_weight'=>$this->input->post('standard_weight_1'),
			'standard_dilution'=>$this->input->post('standard_dilution'),
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'time'=>$this->input->post('time'),
			'actual_time'=>$this->input->post('actual_time'),
			'time_comment'=>$this->input->post('time_comment'),
			'temperature'=>$this->input->post('temperature'),
			'actual_temperature'=>$this->input->post('actual_temperature'),
			'temperature_comment'=>$this->input->post('temperature_comment'),

			'sample_container_1'=>$this->input->post('sample_container_1'),
			'sample_container_2'=>$this->input->post('sample_container_2'),
			'sample_container_3'=>$this->input->post('sample_container_3'),			
			'container_1'=>$this->input->post('container_1'),
			'container_2'=>$this->input->post('container_2'),
			'container_3'=>$this->input->post('container_3'),
			'sample_weight_1'=>$this->input->post('sample_weight_1'),
			'sample_weight_2'=>$this->input->post('sample_weight_2'),
			'sample_weight_3'=>$this->input->post('sample_weight_3'),

			'time_11'=>$this->input->post('time_11'),
			'time_12'=>$this->input->post('time_12'),
			'time_13'=>$this->input->post('time_13'),
			'time_21'=>$this->input->post('time_21'),
			'time_22'=>$this->input->post('time_22'),
			'time_23'=>$this->input->post('time_23'),
			'time_31'=>$this->input->post('time_31'),
			'time_32'=>$this->input->post('time_32'),
			'time_33'=>$this->input->post('time_33'),

			'det_1_initial'=>$this->input->post('det_1_initial'),
			'det_1_weight'=>$this->input->post('det_1_weight'),
			'det_1_initial_weight'=>$this->input->post('det_1_initial_weight'),
			'determination_1'=>$this->input->post('determination_1'),

			'det_2_initial'=>$this->input->post('det_2_initial'),
			'det_2_weight'=>$this->input->post('det_2_weight'),
			'det_2_initial_weight'=>$this->input->post('det_2_initial_weight'),
			'determination_2'=>$this->input->post('determination_2'),

			'det_3_initial'=>$this->input->post('det_3_initial'),
			'det_3_weight'=>$this->input->post('det_3_weight'),
			'det_3_initial_weight'=>$this->input->post('det_3_initial_weight'),
			'determination_3'=>$this->input->post('determination_3'),

			'det_4_initial'=>$this->input->post('det_4_initial'),
			'det_4_weight'=>$this->input->post('det_4_weight'),
			'det_4_initial_weight'=>$this->input->post('det_4_initial_weight'),
			'determination_4'=>$this->input->post('determination_4'),

			'det_6_initial'=>$this->input->post('det_6_initial'),
			'det_6_weight'=>$this->input->post('det_6_weight'),
			'det_6_initial_weight'=>$this->input->post('det_6_initial_weight'),
			'determination_6'=>$this->input->post('determination_6'),

			'det_5_initial'=>$this->input->post('det_5_initial'),
			'det_5_weight'=>$this->input->post('det_5_weight'),
			'det_5_initial_weight'=>$this->input->post('det_5_initial_weight'),
			'determination_5'=>$this->input->post('determination_5'),

			'average'=>$this->input->post('average'),
			'equivalent'=>$this->input->post('equivalent'),
			'range_min'=>$this->input->post('range_min'),
			'range_max'=>$this->input->post('range_max'),
			'rsd'=>$this->input->post('rsd'),

			'min_tolerance'=>$this->input->post('min_tolerance'),
			'max_tolerance'=>$this->input->post('max_tolerance'),
			'min_tolerance_comment'=>$this->input->post('min_tolerance_comment'),
			'max_tolerance_comment'=>$this->input->post('max_tolerance_comment'),
			'tolerance_range_from'=>$this->input->post('tolerance_range_from'),
			'tolerance_range_to'=>$this->input->post('tolerance_range_to'),
			'tolerance_range_comment'=>$this->input->post('tolerance_range_comment'),

			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),
			'results'=>$this->input->post('results'),
			'comment'=>$this->input->post('comment'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,	
			
			'choice'=>$this->input->post('choice'),
			'done_by'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),	

			);
		$this->db->insert('loss_drying', $data);
		
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
		$assignment=$this->input->post('assignment');
		$test_name='Loss on Drying';
		$analyst= $this->input->post('analyst');
		$test_type= '14';

		$data=$this->db->select_max('id')->get('loss_drying')->result();
        $test_id=$data[0]->id;
        $test_id++;

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