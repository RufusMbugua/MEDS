<?php
class Test_Identification_Hplc_Model extends CI_Model{

	function Test_Identification_Hplc_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification Test: HPLC Method';
		$analyst= $this->input->post('analyst');
		$test_type = '1e';

		$data=$this->db->select_max('id')->get('identification_hplc')->result();
        $test_id=$data[0]->id;
        $test_id++;

		
		$data =array(			
			'sample_container'=>$this->input->post('sample_container'),
			'container'=>$this->input->post('container'),
			'sample_weight'=>$this->input->post('sample_weight'),
			'sample_dilution'=>$this->input->post('sample_dilution'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_dilution_2'=>$this->input->post('standard_dilution'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			// 'potency_2'=>$this->input->post('potency_2'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),
			'lot_no_2'=>$this->input->post('lot_no_2'),
			'id_no_2'=>$this->input->post('id_no_2'),
			
			'standard_container'=>$this->input->post('standard_container'),
			'container_1'=>$this->input->post('container_1'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),

			// 'balance_make'=>$this->input->post('balance_make'),
			// 'balance_number'=>$this->input->post('balance_number'),
			'standard_container_2'=>$this->input->post('standard_container_2'),
			'container_2'=>$this->input->post('container_2'),
			'standard_weight_2'=>$this->input->post('standard_weight_2'),

			// 'standard_container_3'=>$this->input->post('standard_container_3'),
			// 'container_3'=>$this->input->post('container_3'),
			// 'standard_weight_3'=>$this->input->post('standard_weight_3'),

			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'reagents'=>$this->input->post('reagents'),
			'reagents_2'=>$this->input->post('reagents_2'),
			'reagents_3'=>$this->input->post('reagents_3'),
			'reagents_4'=>$this->input->post('reagents_4'),

			'reagent_weight_container_1'=>$this->input->post('reagent_weight_container_1'),
			'reagent_container_1'=>$this->input->post('reagent_container_1'),
			'reagent_weight_1'=>$this->input->post('reagent_weight_1'),

			'reagent_weight_container_2'=>$this->input->post('reagent_weight_container_2'),
			'reagent_container_2'=>$this->input->post('reagent_container_2'),
			'reagent_weight_2'=>$this->input->post('reagent_weight_2'),

			'reagent_weight_container_3'=>$this->input->post('reagent_weight_container_3'),
			'reagent_container_3'=>$this->input->post('reagent_container_3'),
			'reagent_weight_3'=>$this->input->post('reagent_weight_3'),

			'reagent_weight_container_4'=>$this->input->post('reagent_weight_container_4'),
			'reagent_container_4'=>$this->input->post('reagent_container_4'),
			'reagent_weight_4'=>$this->input->post('reagent_weight_4'),

			'mobile_phase'=>$this->input->post('mobile_phase'),
			'name'=>$this->input->post('name'),
			'length'=>$this->input->post('length'),
			'serial_no'=>$this->input->post('serial_no'),
			'manufacturer'=>$this->input->post('manufacturer'),
			'column_pressure'=>$this->input->post('column_pressure'),
			'column_pressure_select'=>$this->input->post('column_pressure_select'),
			'column_oven_temp'=>$this->input->post('column_oven_temp'),
			'column_oven_temp_select'=>$this->input->post('column_oven_temp_select'),
			'flow_rate'=>$this->input->post('flow_rate'),
			'wavelength'=>$this->input->post('wavelength'),

			'rt_1'=>$this->input->post('rt_1'),
			'peak_area_1'=>$this->input->post('peak_area_1'),
			'asymmetry_1'=>$this->input->post('asymmetry_1'),
			'resolution_1'=>$this->input->post('resolution_1'),
			'rt_2'=>$this->input->post('rt_2'),
			'peak_area_2'=>$this->input->post('peak_area_2'),
			'asymmetry_2'=>$this->input->post('asymmetry_2'),
			'resolution_2'=>$this->input->post('resolution_2'),
			'rt_3'=>$this->input->post('rt_3'),
			'peak_area_3'=>$this->input->post('peak_area_3'),
			'asymmetry_3'=>$this->input->post('asymmetry_3'),
			'resolution_3'=>$this->input->post('resolution_3'),
			'rt_4'=>$this->input->post('rt_4'),

			'peak_area_4'=>$this->input->post('peak_area_4'),
			'asymmetry_4'=>$this->input->post('asymmetry_4'),
			'resolution_4'=>$this->input->post('resolution_4'),
			'rt_5'=>$this->input->post('rt_5'),
			'peak_area_5'=>$this->input->post('peak_area_5'),
			'asymmetry_5'=>$this->input->post('asymmetry_5'),
			'resolution_5'=>$this->input->post('resolution_5'),
			'rt_6'=>$this->input->post('rt_6'),
			'peak_area_6'=>$this->input->post('peak_area_6'),
			'asymmetry_6'=>$this->input->post('asymmetry_6'),
			'resolution_6'=>$this->input->post('resolution_6'),
			'rt_avg'=>$this->input->post('rt_avg'),
			'peak_area_avg'=>$this->input->post('peak_area_avg'),
			'asymmetry_avg'=>$this->input->post('asymmetry_avg'),
			'resolution_avg'=>$this->input->post('resolution_avg'),
			'rt_sd'=>$this->input->post('rt_sd'),
			'peak_area_sd'=>$this->input->post('peak_area_sd'),
			'asymmetry_sd'=>$this->input->post('asymmetry_sd'),
			'resolution_sd'=>$this->input->post('resolution_sd'),

			'rt_rsd'=>$this->input->post('rt_rsd'),
			'peak_area_rsd'=>$this->input->post('peak_area_rsd'),
			'asymmetry_rsd'=>$this->input->post('asymmetry_rsd'),
			'resolution_rsd'=>$this->input->post('resolution_rsd'),

			'rt_ac'=>$this->input->post('rt_ac'),
			'peak_area_ac'=>$this->input->post('peak_area_ac'),
			'asymmetry_ac'=>$this->input->post('asymmetry_ac'),
			'resolution_ac'=>$this->input->post('resolution_ac'),

			'rt_comment'=>$this->input->post('rt_comment'),
			'peak_area_comment'=>$this->input->post('peak_area_comment'),
			'asymmetry_comment'=>$this->input->post('asymmetry_comment'),
			'resolution_comment'=>$this->input->post('resolution_comment'),

			// 'other_type_1'=>$this->input->post('other_type_1'),
			// 'other_1'=>$this->input->post('other_1'),
			// 'other_2'=>$this->input->post('other_2'),
			// 'other_3'=>$this->input->post('other_3'),

			// 'other_4'=>$this->input->post('other_4'),
			// 'other_5'=>$this->input->post('other_5'),
			// 'other_6'=>$this->input->post('other_6'),
			// 'other_avg'=>$this->input->post('other_avg'),

			// 'other_sd'=>$this->input->post('other_sd'),
			// 'other_rsd'=>$this->input->post('other_rsd'),
			// 'other_ac'=>$this->input->post('other_ac'),
			// 'other_comment'=>$this->input->post('other_comment'),

			'sample_rt_1'=>$this->input->post('sample_rt_1'),
			'sample_peak_area_1'=>$this->input->post('sample_peak_area_1'),
			'sample_asymmetry_1'=>$this->input->post('sample_asymmetry_1'),
			'sample_theoretical_1'=>$this->input->post('sample_theoretical_1'),
			'sample_resolution_1'=>$this->input->post('sample_resolution_1'),

			'sample_rt_2'=>$this->input->post('sample_rt_2'),
			'sample_peak_area_2'=>$this->input->post('sample_peak_area_2'),
			'sample_asymmetry_2'=>$this->input->post('sample_asymmetry_2'),
			'sample_theoretical_2'=>$this->input->post('sample_theoretical_2'),
			'sample_resolution_2'=>$this->input->post('sample_resolution_2'),

			'sample_rt_3'=>$this->input->post('sample_rt_3'),
			'sample_peak_area_3'=>$this->input->post('sample_peak_area_3'),
			'sample_asymmetry_3'=>$this->input->post('sample_asymmetry_3'),
			'sample_theoretical_3'=>$this->input->post('sample_theoretical_3'),
			'sample_resolution_3'=>$this->input->post('sample_resolution_3'),

			'sample_rt_4'=>$this->input->post('sample_rt_4'),
			'sample_peak_area_4'=>$this->input->post('sample_peak_area_4'),
			'sample_asymmetry_4'=>$this->input->post('sample_asymmetry_4'),
			'sample_theoretical_4'=>$this->input->post('sample_theoretical_4'),
			'sample_resolution_4'=>$this->input->post('sample_resolution_4'),

			'sample_rt_5'=>$this->input->post('sample_rt_5'),
			'sample_peak_area_5'=>$this->input->post('sample_peak_area_5'),
			'sample_asymmetry_5'=>$this->input->post('sample_asymmetry_5'),
			'sample_theoretical_5'=>$this->input->post('sample_theoretical_5'),
			'sample_resolution_5'=>$this->input->post('sample_resolution_5'),

			'sample_rt_6'=>$this->input->post('sample_rt_6'),
			'sample_peak_area_6'=>$this->input->post('sample_peak_area_6'),
			'sample_asymmetry_6'=>$this->input->post('sample_asymmetry_6'),
			'sample_theoretical_6'=>$this->input->post('sample_theoretical_6'),
			'sample_resolution_6'=>$this->input->post('sample_resolution_6'),

			'sample_rt_avg'=>$this->input->post('sample_rt_avg'),
			'sample_peak_area_avg'=>$this->input->post('sample_peak_area_avg'),
			'sample_asymmetry_avg'=>$this->input->post('sample_asymmetry_avg'),
			'sample_theoretical_avg'=>$this->input->post('sample_theoretical_avg'),
			'sample_resolution_avg'=>$this->input->post('sample_resolution_avg'),

			'sample_rt_sd'=>$this->input->post('sample_rt_sd'),
			'sample_peak_area_sd'=>$this->input->post('sample_peak_area_sd'),
			'sample_asymmetry_sd'=>$this->input->post('sample_asymmetry_sd'),
			'sample_theoretical_sd'=>$this->input->post('sample_theoretical_sd'),
			'sample_resolution_sd'=>$this->input->post('sample_resolution_sd'),

			'sample_rt_rsd'=>$this->input->post('sample_rt_rsd'),
			'sample_peak_area_rsd'=>$this->input->post('sample_peak_area_rsd'),
			'sample_asymmetry_rsd'=>$this->input->post('sample_asymmetry_rsd'),
			'sample_theoretical_rsd'=>$this->input->post('sample_theoretical_rsd'),
			'sample_resolution_rsd'=>$this->input->post('sample_resolution_rsd'),

			'sample_rt_ac'=>$this->input->post('sample_rt_ac'),
			'sample_peak_area_ac'=>$this->input->post('sample_peak_area_ac'),
			'sample_asymmetry_ac'=>$this->input->post('sample_asymmetry_ac'),
			'sample_theoretical_ac'=>$this->input->post('sample_theoretical_ac'),
			'sample_resolution_ac'=>$this->input->post('sample_resolution_ac'),

			'sample_rt_comment'=>$this->input->post('sample_rt_comment'),
			'sample_peak_area_comment'=>$this->input->post('sample_peak_area_comment'),
			'sample_asymmetry_comment'=>$this->input->post('sample_asymmetry_comment'),
			'sample_theoretical_comment'=>$this->input->post('sample_theoretical_comment'),
			'sample_resolution_comment'=>$this->input->post('sample_resolution_comment'),

			'sample_rrt_avg'=>$this->input->post('sample_rrt_avg'),
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),
			'results'=>$this->input->post('results'),
			'comment'=>$this->input->post('comment'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			
			'status'=>$status,		
			'sysytem_suitability_sequence'=>$this->input->post('sysytem_suitability_sequence'),
			'sysytem_suitability_sequence_comment'=>$this->input->post('sysytem_suitability_sequence_comment'),
			'sample_injection_sequence'=>$this->input->post('sample_injection_sequence'),
			'chromatograms_attached_comment'=>$this->input->post('chromatograms_attached_comment'),
			'chromatograms_attached'=>$this->input->post('chromatograms_attached'),
			'sample_injection_sequence_comment'=>$this->input->post('Sample_injection_sequence_comment'),
			'choice'=>$this->input->post('choice'),
			'analyst'=>$this->input->post('done_by'),
			'date_done'=>$this->input->post('date_done'),
			'further_comments'=>$this->input->post('further_comments'),		

			);
		$this->db->insert('identification_hplc', $data);

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
	function save_hplc_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification: HPLC';
		$analyst= $this->input->post('analyst');
		$test_type= '1e';

		$data=$this->db->select_max('id')->get('identification_hplc')->result();
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
