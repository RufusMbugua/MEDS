<?php
class Test_Identification_Thin_Layer_Model extends CI_Model{

	function Test_Identification_Thin_Layer_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification Test: Thin Layer Chromatography Method';
		$analyst= $this->input->post('analyst');
		$test_type = '1d';

		$data=$this->db->select_max('id')->get('identification_thin_layer')->result();
        $test_id=$data[0]->id;
        $test_id++;
		
		$data =array(			
			'equipment_number'=>$this->input->post('equipment_number'),
			'equipment_make'=>$this->input->post('equipment_make'),
			'sample_weight_container'=>$this->input->post('sample_weight_container'),
			'sample_container'=>$this->input->post('sample_container'),
			'sample_weight'=>$this->input->post('sample_weight'),
			'sample_dilution'=>$this->input->post('sample_dilution'),

			'standard_description_1'=>$this->input->post('standard_description'),
			// 'standard_description_2'=>$this->input->post('standard_description_2'),
			// 'standard_description_3'=>$this->input->post('standard_description_3'),
			// 'standard_description_4'=>$this->input->post('standard_description_4'),

			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),

			'standard_container'=>$this->input->post('standard_container'),
			'container'=>$this->input->post('container'),
			'standard_weight'=>$this->input->post('standard_weight'),

			// 'standard_container_3'=>$this->input->post('standard_container_3'),
			// 'container_3'=>$this->input->post('container_3'),
			// 'standard_weight_3'=>$this->input->post('standard_weight_3'),

			// 'standard_container_4'=>$this->input->post('standard_container_4'),
			// 'container_4'=>$this->input->post('container_4'),
			// 'standard_weight_4'=>$this->input->post('standard_weight_4'),

			'reagent_1'=>$this->input->post('reagent_1'),
			// 'reagent_2'=>$this->input->post('reagent_2'),
			// 'reagents_3'=>$this->input->post('reagent_3'),
			// 'reagents_4'=>$this->input->post('reagent_4'),

			'reagent_weight_container_1'=>$this->input->post('reagent_weight_container_1'),
			'reagent_container_1'=>$this->input->post('reagent_container_1'),
			'reagent_weight_1'=>$this->input->post('reagent_weight_1'),

			// 'standard_container_6'=>$this->input->post('standard_container_6'),
			// 'reagent_container_1'=>$this->input->post('reagent_container_1'),
			// 'standard_weight_6'=>$this->input->post('standard_weight_6'),

			// 'standard_container_7'=>$this->input->post('standard_container_7'),
			// 'container_7'=>$this->input->post('container_7'),
			// 'standard_weight_7'=>$this->input->post('standard_weight_7'),

			// 'standard_container_8'=>$this->input->post('standard_container_8'),
			// 'container_8'=>$this->input->post('container_8'),
			// 'standard_weight_8'=>$this->input->post('standard_weight_8'),

			// 'standard_container_9'=>$this->input->post('standard_container_9'),
			// 'container_9'=>$this->input->post('container_9'),
			// 'standard_weight_9'=>$this->input->post('standard_weight_9'),

			'mobile_phase'=>$this->input->post('mobile_phase'),
			'impurity_1'=>$this->input->post('impurity_1'),
			'impurity_2'=>$this->input->post('impurity_2'),

			'solvent_std_1'=>$this->input->post('solvent_std_1'),
			'solvent_std_2'=>$this->input->post('solvent_std_2'),
			'solvent_sample'=>$this->input->post('solvent_sample'),
			'solvent_impurity_1'=>$this->input->post('solvent_impurity_1'),
			'solvent_impurity_2'=>$this->input->post('solvent_impurity_2'),

			'substance_std_1'=>$this->input->post('substance_std_1'),
			'substance_std_2'=>$this->input->post('substance_std_2'),
			'substance_sample'=>$this->input->post('substance_sample'),
			'substance_impurity_1'=>$this->input->post('substance_impurity_1'),
			'substance_impurity_2'=>$this->input->post('substance_impurity_2'),

			'rf_std_1'=>$this->input->post('rf_std_1'),
			'rf_std_2'=>$this->input->post('rf_std_2'),
			'rf_sample'=>$this->input->post('rf_sample'),
			'rf_impurity_1'=>$this->input->post('rf_impurity_1'),
			'rf_impurity_2'=>$this->input->post('rf_impurity_2'),

			'rr_value'=>$this->input->post('rr_value'),
			
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),
			'results'=>$this->input->post('results'),
			'comment'=>$this->input->post('comment'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,
			
			'choice'=>$this->input->post('choice'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),				

			);
		$this->db->insert('identification_thin_layer', $data);

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
	function save_thin_layer_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification: Thin Layer';
		$analyst= $this->input->post('analyst');
		$test_type= '1d';


		$data=$this->db->select_max('id')->get('identification_thin_layer')->result();
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
