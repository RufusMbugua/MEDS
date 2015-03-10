<?php
class Test_Identification_Model extends CI_Model{

	function Test_Identification_Model(){
		parent::__construct();
	}
	public function general(){
		
		$test_request = $this->uri->segment(4);

		
		$query['component_category'] = $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();
		
		$query['test_request'] = $this->db->select('*')->get_where('test_request', array('id' => $test_request))->result_array();
		
		$component_names = $this->db->select('*')->get_where('components', array('test_request_id' => $test_request))->result_array();

		$query['standards']=$this->db->select('*')->get_where('standard_register', array('status' => 0))->result_array();
		
		$query['reagents']=	$this->db->select('*')->get_where('reagents_inventory_record', array('status' => 0))->result_array();

		$query['equipment']=	$this->db->select('*')->get_where('equipment_maintenance', array('status' =>0))->result_array();

		$query['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request))->result_array();
		
		$query['full_monograph']=	$this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();
		
		$query['component_names'] = $component_names;	

		foreach ($component_names as $key => $value) {
			$c_names[] = $value['component'];
		}
		$c_name = implode(', ', $c_names);
		$query['components']= $c_name;
		
		return $query;
	}

	function save_assay(){

		$results=$this->input->post('results');
		$component_name=$this->input->post('component_name');
		$comment_assay=$this->input->post('comments');
		$test_request=$this->input->post('test_request');
		$test_type=$this->input->post('test_type');
		$remarks = $this->input->post('choice');
		$assignment=$this->input->post('assignment');
		$status =1;
		$test_name='Identification';
		$analyst= $this->input->post('analyst');

      

		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;

        $q = "select results, remarks from test_results where test_request_id = '$test_request' and test_type = '$test_type'";
        $r = $this->db->query($q)->result_array();
        $result_prev = $r[0]['results'];
        $remark_prev = $r[0]['remarks'];

        $result_next = $result_prev." ".$component_name;

        if ($remark_prev == "Does not Comply" || $remarks =="Does not Comply" ) {
        	$remark_next = "Does Not Comply";
        }else{
        	$remark_next = "Complies";
        }
		
		$data_i =array(
			'results_assay'=>$this->input->post('results'),
			'comment_assay'=>$this->input->post('comments'),
			'choice'=>$this->input->post('conclusion'),
			'date'=>$this->input->post('date_done'),
			'status' =>$status,
			'test_request'=>$test_request,
			'assignment'=>$assignment,
			'analyst'=>$analyst,
			);
		//var_dump($data_i);die;
		$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'remarks'=>$remark_next,
			'method'=>$this->input->post('method'),
			'results'=>$result_next,
			);		
		
		$c_data = array(			
			'status'=>1,
			);
// var_dump($test_type);
		$this->db->insert('identification', $data_i);		
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));
		$this->db->update('components', $c_data, array('component'=>$component_name));

		redirect('test/index/'.$assignment.'/'.$test_request);


	}
	function save_uv(){
		$status =1;
		
		$component_name=$this->input->post('component_name');
		$remarks = $this->input->post('choice');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_specification=$this->input->post('test_specification');
		$test_name='Identification';
		$test_type=$this->input->post('test_type');		

		$analyst= $this->input->post('analyst');
		$results = $this->input->post('uv_results');

		$q = "select results, remarks from test_results where test_request_id = '$test_request'";
        $r = $this->db->query($q)->result_array();
        $result_prev = $r[0]['results'];
        $remark_prev = $r[0]['remarks'];

        $result_next = $result_prev." ".$component_name;

        if ($remark_prev == "Does not Comply" || $remarks =="Does not Comply" ) {
        	$remark_next = "Does not Comply";
        }else{
        	$remark_next = "Complies";
        }

		$data=$this->db->select_max('id')->get('identification_uv')->result();
        $test_id=$data[0]->id;
        $test_id++;
				
		
		$data =array(
			'uv_sample_weight'=>$this->input->post('uv_sample_weight'),
			'uv_calculation'=>$this->input->post('uv_calculation'),
			'uv_sample_container'=>$this->input->post('uv_sample_container'),
			'uv_container'=>$this->input->post('uv_container'),
			'uv_sample_weight_1'=>$this->input->post('uv_sample_weight_1'),
			'uv_sample_dilution'=>$this->input->post('uv_sample_dilution'),
			'uv_standard_description'=>$this->input->post('uv_standard_description'),
			'uv_potency'=>$this->input->post('uv_potency'),
			'uv_lot_no'=>$this->input->post('uv_lot_no'),
			'uv_id_no'=>$this->input->post('uv_id_no'),

			'uv_potency_standard_container'=>$this->input->post('uv_potency_standard_container'),
			'uv_potency_standard_container_2'=>$this->input->post('uv_potency_standard_container_2'),
			'uv_potency_container'=>$this->input->post('uv_potency_container'),
			'uv_potency_container_2'=>$this->input->post('uv_potency_container_2'),
			'uv_standard_weight'=>$this->input->post('uv_standard_weight'),
			'uv_standard_weight_2'=>$this->input->post('uv_standard_weight_2'),
			'uv_standard_dilution'=>$this->input->post('uv_standard_dilution'),

			'uv_potency_reagent_container'=>$this->input->post('uv_potency_reagent_container'),
			'uv_potency_reagent_container_2'=>$this->input->post('uv_potency_reagent_container_2'),
			'uv_potency_reagent_container_3'=>$this->input->post('uv_potency_reagent_container_3'),
			'uv_potency_reagent_container_4'=>$this->input->post('uv_potency_reagent_container_4'),
			'uv_reagent_container'=>$this->input->post('uv_reagent_container'),
			'uv_reagent_container_2'=>$this->input->post('uv_reagent_container_2'),
			'uv_reagent_container_3'=>$this->input->post('uv_reagent_container_3'),
			'uv_reagent_container_4'=>$this->input->post('uv_reagent_container_4'),
			'uv_reagent_weight'=>$this->input->post('uv_reagent_weight'),
			'uv_reagent_weight_2'=>$this->input->post('uv_reagent_weight_2'),
			'uv_reagent_weight_3'=>$this->input->post('uv_reagent_weight_3'),
			'uv_reagent_weight_4'=>$this->input->post('uv_reagent_weight_4'),
			
			'uv_acceptance_criteria'=>$this->input->post('uv_acceptance_criteria'),
			'uv_results'=>$this->input->post('uv_results'),
			'uv_comment'=>$this->input->post('uv_comment'),

			'choice'=>$this->input->post('choice'),
			'done_by'=>$this->input->post('done_by'),
			'date_done'=>$this->input->post('date_done'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),
			'status' =>$status,
			'test_request'=>$test_request,
			'assignment'=>$assignment,				

			);
		$this->db->insert('identification_uv', $data);

		$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'remarks'=>$remark_next,
			'method'=>$this->input->post('method'),
			'results'=>$result_next,
			);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));

		redirect('test/index/'.$assignment.'/'.$test_request);

	}
	
	function save_infrared(){
		$status =1;		
		$remarks = $this->input->post('choice');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_specification=$this->input->post('test_specification');
		$test_name='Identification by Infrared';
		$test_type=$this->input->post('test_type');
		

		$analyst= $this->input->post('analyst');
		$results = $this->input->post('infrared_results');


		$data=$this->db->select_max('id')->get('identification_infrared')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$data =array(
			
			'equipment_make'=>$this->input->post('equipment_make'),
			'balance_number'=>$this->input->post('balance_number'),
			'infrared_sample_weight'=>$this->input->post('infrared_sample_weight'),
			'infrared_calculation'=>$this->input->post('infrared_calculation'),
			'infrared_sample_container'=>$this->input->post('infrared_sample_container'),
			'infrared_container'=>$this->input->post('infrared_container'),
			'infrared_sample_weight_1'=>$this->input->post('infrared_sample_weight_1'),
			'infrared_sample_dilution'=>$this->input->post('infrared_sample_dilution'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),
			'infrared_standard_container'=>$this->input->post('infrared_standard_container'),
			'infrared_container_2'=>$this->input->post('infrared_container_2'),
			'infrared_standard_weight'=>$this->input->post('infrared_standard_weight'),
			'infrared_standard_dilution'=>$this->input->post('infrared_standard_dilution'),
			'infrared_acceptance_criteria'=>$this->input->post('infrared_acceptance_criteria'),
			'infrared_results'=>$this->input->post('infrared_results'),
			'infrared_comment'=>$this->input->post('infrared_comment'),
			'choice'=>$this->input->post('choice'),
			'analyst'=>$this->input->post('done_by'),
			'date_done'=>$this->input->post('date_done'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'further_comments'=>$this->input->post('further_comments'),
			'status' =>$status,
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment')
			);
		$this->db->insert('identification_infrared', $data);	

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
	function save_hplc(){
		
		$status =1;
		$remarks = $this->input->post('choice');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification';
		$analyst= $this->input->post('analyst');
		$test_type=$this->input->post('test_type');   
		$component_name=$this->input->post('component_name');
		
		$data=$this->db->select_max('id')->get('identification_hplc')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$q = "select results, remarks from test_results where test_request_id = '$test_request' and test_type = '$test_type'";
        $r = $this->db->query($q)->result_array();
        $result_prev = $r[0]['results'];
        $remark_prev = $r[0]['remarks'];

        $result_next = $result_prev." ".$component_name;

        if ($remark_prev == "Does not Comply" || $remarks =="Does not Comply" ) {
        	$remark_next = "Does not Comply";
        }else{
        	$remark_next = "Complies";
        }     
		
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
			'remarks'=>$remark_next,
			'method'=>$this->input->post('method'),
			'results'=>$result_next,
			);
		//var_dump($result_data);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));

		redirect('test/index/'.$assignment.'/'.$test_request);	
	}
	function save_hplc_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_type=$this->input->post('test_type');
		
		$data=$this->db->select_max('id')->get('identification_hplc')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$data = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_id' => $test_id,
			'test_type' => $test_type,		
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
	
	function save_assay_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');		
		$analyst= $this->input->post('analyst');
		$test_type=$this->input->post('test_type');


		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;


		$mono_data=$this->db->select_max('id')->get('full_monograph')->result();
        $monograph_id=$mono_data[0]->id;
        $monograph_id++;

		$data = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_id' => $test_id,
			'test_type' => $test_type,
			'monograph_id'=>$monograph_id,
			'monograph_specifications' => $this->input->post('specification'),

			);
		$this->db->insert('monograph_specifications', $data);
		$data2 = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_type' => $test_type,
			'specifications' => $this->input->post('components'),

			);
		$this->db->insert('test_results', $data2);
		redirect('test/index/'.$assignment.'/'.$test_request);	

	}
	function save_infrared_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification: Infrared';
		$analyst= $this->input->post('analyst');
		$test_type=$this->input->post('test_type');


		$data=$this->db->select_max('id')->get('identification')->result();
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
	
	function save_uv_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_type=$this->input->post('test_type');
		$analyst= $this->input->post('analyst');
		

		$data=$this->db->select_max('id')->get('identification_uv')->result();
        $test_id=$data[0]->id;
        $test_id++;


		$mono_data=$this->db->select_max('id')->get('full_monograph')->result();
        $monograph_id=$mono_data[0]->id;
        $monograph_id++;

		$data = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_id' => $test_id,
			'test_type' => $test_type,
			'monograph_id'=>$monograph_id,
			'monograph_specifications' => $this->input->post('specification'),

			);
		$this->db->insert('monograph_specifications', $data);

		$data2 = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_type' => $test_type,
			'specifications' => $this->input->post('components'),

			);
		$this->db->insert('test_results', $data2);
		redirect('test/index/'.$assignment.'/'.$test_request);	

	}

}

?> 