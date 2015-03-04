<?php
class Test_Related_Substances_Model extends CI_Model{

	function Test_Related_Substances_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$coa_method_used=$this->input->post('coa_method_used');
		$coa_results=$this->input->post('coa_results');
		$coa_specification=$this->input->post('coa_specification');
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Related Substances';
		$analyst= $this->input->post('analyst');
		$test_type = '5';

		$data=$this->db->select_max('id')->get('related_substances')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$data =array(
			
			'balance_make'=>$this->input->post('balance_make'),
			'balance_number'=>$this->input->post('balance_number'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),
			'potency_2'=>$this->input->post('potency_2'),
			'lot_no_2'=>$this->input->post('lot_no_2'),
			'id_no_2'=>$this->input->post('id_no_2'),
			'standard_container'=>$this->input->post('potency_standard_container'),
			'standard_container_2'=>$this->input->post('potency_standard_container_2'),
			'container'=>$this->input->post('potency_container'),
			'container_2'=>$this->input->post('potency_container_2'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_weight_2'=>$this->input->post('standard_weight_2'),
			'standard_dilution'=>$this->input->post('standard_dilution'),
			'chromatographic_system'=>$this->input->post('chromatographic_system'),
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'sample_weight_container'=>$this->input->post('sample_container'),
			'sample_container'=>$this->input->post('container'),
			'sample_weight'=>$this->input->post('sample_weight'),
			'sample_dilution'=>$this->input->post('sample_dilution'),
			//'sample_container'=>$this->input->post('sample_container_2'),
			// 'container_2'=>$this->input->post('container_2'),
			// 'sample_weight_2'=>$this->input->post('sample_weight_2'),
			// 'sample_dilution_2'=>$this->input->post('sample_dilution_2'),
			// 'sample_container_3'=>$this->input->post('sample_container_3'),	
			// 'container_3'=>$this->input->post('container_3'),		
			// 'sample_weight_3'=>$this->input->post('sample_weight_3'),
			// 'sample_dilution_3'=>$this->input->post('sample_dilution_3'),
			'mobile_phase'=>$this->input->post('mobile_phase'),
			'name'=>$this->input->post('name'),
			'length'=>$this->input->post('length'),
			'manufacturer'=>$this->input->post('manufacturer'),
			'column_pressure'=>$this->input->post('column_pressure'),
			'column_oven_temp'=>$this->input->post('column_oven_temp'),
			'flow_rate'=>$this->input->post('flow_rate'),
			'wavelength'=>$this->input->post('wavelength'),

			// 'sample_container_4'=>$this->input->post('sample_container_4'),
			// 'sample_container_5'=>$this->input->post('sample_container_5'),
			// 'sample_container_6'=>$this->input->post('sample_container_6'),
			// 'container_4'=>$this->input->post('container_4'),
			// 'container_5'=>$this->input->post('container_5'),
			// 'container_6'=>$this->input->post('container_6'),
			// 'sample_weight_4'=>$this->input->post('sample_weight_4'),
			// 'sample_weight_5'=>$this->input->post('sample_weight_5'),
			// 'sample_weight_6'=>$this->input->post('sample_weight_6'),

			// 'standard_weight_3'=>$this->input->post('standard_weight_3'),
			// 'standard_description_2'=>$this->input->post('standard_description_2'),
			// 'potency_3'=>$this->input->post('potency_3'),
			// 'lot_no_3'=>$this->input->post('lot_no_3'),
			// 'id_no_3'=>$this->input->post('id_no_3'),
			// 'potency_4'=>$this->input->post('potency_4'),
			// 'lot_no_4'=>$this->input->post('lot_no_4'),
			// 'id_no_4'=>$this->input->post('id_no_4'),
			// 'potency_standard_container_3'=>$this->input->post('potency_standard_container_3'),
			// 'potency_standard_container_4'=>$this->input->post('potency_standard_container_4'),
			// 'potency_container_3'=>$this->input->post('potency_container_3'),
			// 'potency_container_4'=>$this->input->post('potency_container_4'),
			// 'standard_weight_4'=>$this->input->post('standard_weight_4'),
			// 'standard_dilution_2'=>$this->input->post('standard_dilution_2'),

			'standard_1'=>$this->input->post('standard_1'),
			'sample_1'=>$this->input->post('sample_1'),
			'impurity_1_1'=>$this->input->post('impurity_1_1'),
			'impurity_1_2'=>$this->input->post('impurity_1_2'),
			'impurity_1_3'=>$this->input->post('impurity_1_3'),

			'standard_2'=>$this->input->post('standard_2'),
			'sample_2'=>$this->input->post('sample_2'),
			'impurity_2_1'=>$this->input->post('impurity_2_1'),
			'impurity_2_2'=>$this->input->post('impurity_2_2'),
			'impurity_2_3'=>$this->input->post('impurity_2_3'),
			
			'standard_3'=>$this->input->post('standard_3'),
			'sample_3'=>$this->input->post('sample_3'),
			'impurity_3_1'=>$this->input->post('impurity_3_1'),
			'impurity_3_2'=>$this->input->post('impurity_3_2'),
			'impurity_3_3'=>$this->input->post('impurity_3_3'),

			'standard_4'=>$this->input->post('standard_4'),
			'sample_4'=>$this->input->post('sample_4'),
			'impurity_4_1'=>$this->input->post('impurity_4_1'),
			'impurity_4_2'=>$this->input->post('impurity_4_2'),
			'impurity_4_3'=>$this->input->post('impurity_4_3'),

			'standard_5'=>$this->input->post('standard_5'),
			'sample_5'=>$this->input->post('sample_5'),
			'impurity_5_1'=>$this->input->post('impurity_5_1'),
			'impurity_5_2'=>$this->input->post('impurity_5_2'),
			'impurity_5_3'=>$this->input->post('impurity_5_3'),

			'standard_avg'=>$this->input->post('standard_avg'),
			'sample_avg'=>$this->input->post('sample_avg'),
			'impurity_1_avg'=>$this->input->post('impurity_1_avg'),
			'impurity_2_avg'=>$this->input->post('impurity_2_avg'),
			'impurity_3_avg'=>$this->input->post('impurity_3_avg'),

			'calculations'=>$this->input->post('calculations'),
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),
			'results'=>$this->input->post('results'),
			'comment'=>$this->input->post('comment'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,		

			'choice'=>$this->input->post('choice'),
			'done_by'=>$this->input->post('done_by'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),		

			);
		$this->db->insert('related_substances', $data);
		
		$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'remarks'=>$this->input->post('choice'),
			'method'=>$this->input->post('method'),
			'results'=>$this->input->post('results'),
			);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));

		redirect('test/index/'.$assignment.'/'.$test_request);	
	}
		function save_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Related Substances';
		$analyst= $this->input->post('analyst');
		$test_type= '5';

		$data=$this->db->select_max('id')->get('related_substances')->result();
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