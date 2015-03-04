<?php
class Test_Dissolution_Model extends CI_Model{

	function Test_Dissolution_Model(){
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

	function save_worksheet_uv(){
		$test =$this->input->post('test');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$status =1;
		$test_name='Dissolution';
		$analyst= $this->input->post('analyst');
		$test_type = $this->input->post('test_type');

		$data=$this->db->select_max('id')->get('diss_data')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$results = 'Range from '.$this->input->post('range_min').' to '.$this->input->post('range_max').'. <br/>Average: '.$this->input->post('average');
		
		
		$data =array(
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_no'=>$this->input->post('equipment_number'),
			'hcl_prepaparation'=>$this->input->post('hcl_prepaparation'),
			
			'apparatus'=>$this->input->post('apparatus'),
			'actual_apparatus'=>$this->input->post('actual_apparatus'), 
			'apparatus_comment'=>$this->input->post('apparatus_comment'), 
			'rotation'=>$this->input->post('rotation'),
			'actual_rotation'=>$this->input->post('actual_rotation'), 
			'rotation_comment'=>$this->input->post('rotation_comment'),
			'time'=>$this->input->post('time'), 
			'actual_time'=>$this->input->post('actual_time,'), 
			'time_comment'=>$this->input->post('time_comment'),
			'temperature'=>$this->input->post('temperature'),
			'actual_temperature'=>$this->input->post('actual_temperature'),
			'temperature_comment'=>$this->input->post('temperature_comment'),
			
			'equipment_make_2'=>$this->input->post('equipment_make_2'),
			'equipment_number_2'=>$this->input->post('equipment_number_2'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no') ,
			'potency_standard_container'=>$this->input->post('potency_standard_container'),
			'potency_container'=>$this->input->post('potency_container'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_dilution'=>$this->input->post('standard_dilution'),
			'sample_preparation'=>$this->input->post('sample_preparation'),
			'dilution_factor'=>$this->input->post('dilution_factor'),			
			
			'first_absorbance'=>$this->input->post('first_absorbance'),
			'second_absorbance'=>$this->input->post('second_absorbance') ,
			'difference_standard'=>$this->input->post('difference_standard'), 
			'difference_s1'=>$this->input->post('difference_s1'),
			'difference_s2'=>$this->input->post('difference_s2'),
			'difference_s3'=>$this->input->post('difference_s3'),
			'difference_s4'=>$this->input->post('difference_s4'),
			'difference_s5'=>$this->input->post('difference_s5'),
			'difference_s6'=>$this->input->post('difference_s6'),
			
			'content'=>$this->input->post('content'),
			'average'=>$this->input->post('average'), 
			'equivalent'=>$this->input->post('equivalent'),
			'range_min'=>$this->input->post('range_min'), 
			'range_max'=>$this->input->post('range_max'), 
			'rsd'=>$this->input->post('rsd'),
			'content_from'=>$this->input->post('content_from'),  
			'content_to'=>$this->input->post('content_to'),  
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),  
			'results'=>$this->input->post('results'), 
			'comment'=>$this->input->post('comment'),		
			'test_request'=>$test_request,
			'assignment'=>$assignment,
			'status' =>$status,
			'choice'=>$this->input->post('choice')
			
			);
		$this->db->insert('diss_data', $data);

		$determination_data = array(
			'test_request'=>$test_request,
			'status' =>$status,
			'uv_id'=>$test_id,
			'uv_type'=>$this->input->post('uv_type'),
			'det_1_pkt'=>$this->input->post('det_1_pkt'),
			'det_1_wstd'=>$this->input->post('det_1_wstd'),
			'det_1_df'=>$this->input->post('det_1_df'),
			'det_1_potency'=>$this->input->post('det_1_potency'),
			'det_1_pkstd'=>$this->input->post('det_1_pkstd'),
			'det_1_lc'=>$this->input->post('det_1_lc'),
			'determination_1'=>$this->input->post('determination_1'),

			'det_2_pkt'=>$this->input->post('det_2_pkt'),
			'det_2_wstd'=>$this->input->post('det_2_wstd'),
			'det_2_df'=>$this->input->post('det_2_df'),
			'det_2_potency'=>$this->input->post('det_2_potency'),
			'det_2_pkstd'=>$this->input->post('det_2_pkstd'),
			'det_2_lc'=>$this->input->post('det_2_lc'),
			'determination_2'=>$this->input->post('determination_2'),

			'det_3_pkt'=>$this->input->post('det_3_pkt'),
			'det_3_wstd'=>$this->input->post('det_3_wstd'),
			'det_3_df'=>$this->input->post('det_3_df'),
			'det_3_potency'=>$this->input->post('det_3_potency'),
			'det_3_pkstd'=>$this->input->post('det_3_pkstd'),
			'det_3_lc'=>$this->input->post('det_3_lc'),
			'determination_3'=>$this->input->post('determination_3'),

			'det_4_pkt'=>$this->input->post('det_4_pkt'),
			'det_4_wstd'=>$this->input->post('det_4_wstd'),
			'det_4_df'=>$this->input->post('det_4_df'),
			'det_4_potency'=>$this->input->post('det_4_potency'),
			'det_4_pkstd'=>$this->input->post('det_4_pkstd'),
			'det_4_lc'=>$this->input->post('det_4_lc'),
			'determination_4'=>$this->input->post('determination_4'),

			'det_5_pkt'=>$this->input->post('det_5_pkt'),
			'det_5_wstd'=>$this->input->post('det_5_wstd'),
			'det_5_df'=>$this->input->post('det_5_df'),
			'det_5_potency'=>$this->input->post('det_5_potency'),
			'det_5_pkstd'=>$this->input->post('det_5_pkstd'),
			'det_5_lc'=>$this->input->post('det_5_lc'),
			'determination_5'=>$this->input->post('determination_5'),

			'det_6_pkt'=>$this->input->post('det_6_pkt'),
			'det_6_wstd'=>$this->input->post('det_6_wstd'),
			'det_6_df'=>$this->input->post('det_6_df'),
			'det_6_potency'=>$this->input->post('det_6_potency'),
			'det_6_pkstd'=>$this->input->post('det_6_pkstd'),
			'det_6_lc'=>$this->input->post('det_6_lc'),
			'determination_6'=>$this->input->post('determination_6'),

			// 'second_det_1_pkt'=>$this->input->post('second_det_1_pkt'),
			// 'second_det_1_df'=>$this->input->post('second_det_1_df'),
			// 'second_det_1_lc'=>$this->input->post('second_det_1_lc'),
			// 'second_determination_1'=>$this->input->post('second_determination_1'),
			
			// 'second_det_2_pkt'=>$this->input->post('second_det_2_pkt'),
			// 'second_det_2_df'=>$this->input->post('second_det_2_df'),
			// 'second_det_2_lc'=>$this->input->post('second_det_2_lc'),
			// 'second_determination_2'=>$this->input->post('second_determination_2'),
			
			// 'second_det_3_pkt'=>$this->input->post('second_det_3_pkt'),
			// 'second_det_3_df'=>$this->input->post('second_det_3_df'),
			// 'second_det_3_lc'=>$this->input->post('second_det_3_lc'),
			// 'second_determination_3'=>$this->input->post('second_determination_3'),
			
			// 'second_det_4_pkt'=>$this->input->post('second_det_4_pkt'),
			// 'second_det_4_df'=>$this->input->post('second_det_4_df'),
			// 'second_det_4_lc'=>$this->input->post('second_det_4_lc'),
			// 'second_determination_4'=>$this->input->post('second_determination_4'),
			
			// 'second_det_5_pkt'=>$this->input->post('second_det_5_pkt'),
			// 'second_det_5_df'=>$this->input->post('second_det_5_df'),
			// 'second_det_5_lc'=>$this->input->post('second_det_5_lc'),
			// 'second_determination_5'=>$this->input->post('second_determination_5'),
			
			// 'second_det_6_pkt'=>$this->input->post('second_det_6_pkt'),
			// 'second_det_6_df'=>$this->input->post('second_det_6_df'),
			// 'second_det_6_lc'=>$this->input->post('second_det_6_lc'),
			// 'second_determination_6'=>$this->input->post('second_determination_6'),
			
			);

			$this->db->insert('diss_uv_determinations', $determination_data);

			$q = "select results, remarks from test_results where test_request_id = '$test_request' and test_type = '$test_type'";
	        $r = $this->db->query($q)->result_array();
	        $result_prev = $r[0]['results'];

	        $result_next =$result_prev." <br/>". $results;
		

			$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'remarks'=>$this->input->post('conclusion'),
			'method'=>$this->input->post('method'),
			'results'=>$result_next,
			);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));

		redirect('test/index/'.$assignment.'/'.$test_request);

	}
	function save_second_worksheet(){
		$test =$this->input->post('test');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$second_status =2;
		$test_name='Dissolution by Uv Normal Tablets';
		$analyst= $this->input->post('analyst');
		$test_type = '7a';

		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;
        
		$results = 'Range from '.$this->input->post('range_min').' to '.$this->input->post('range_max');
		
		$data =array(
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'hcl_prepaparation'=>$this->input->post('hcl_prepaparation'),
			
			'apparatus'=>$this->input->post('apparatus'),
			'actual_apparatus'=>$this->input->post('actual_apparatus'), 
			'apparatus_comment'=>$this->input->post('apparatus_comment'), 
			'rotation'=>$this->input->post('rotation'),
			'actual_rotation'=>$this->input->post('actual_rotation'), 
			'rotation_comment'=>$this->input->post('rotation_comment'),
			'time'=>$this->input->post('time'), 
			'actual_time'=>$this->input->post('actual_time,'), 
			'time_comment'=>$this->input->post('time_comment'),
			'temperature'=>$this->input->post('temperature'),
			'actual_temperature'=>$this->input->post('actual_temperature'),
			'temperature_comment'=>$this->input->post('temperature_comment'),
			
			// 'equipment_make_2'=>$this->input->post('equipment_make_2'),
			'equipment_number_2'=>$this->input->post('equipment_number_2'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no') ,
			'potency_standard_container'=>$this->input->post('potency_standard_container'),
			'potency_container'=>$this->input->post('potency_container'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_dilution'=>$this->input->post('standard_dilution'),
			'sample_preparation'=>$this->input->post('sample_preparation'),
			'dilution_factor'=>$this->input->post('dilution_factor'),			
			
			'first_absorbance'=>$this->input->post('first_absorbance'),
			'second_absorbance'=>$this->input->post('second_absorbance') ,
			'difference_standard'=>$this->input->post('difference_standard'), 
			'difference_s1'=>$this->input->post('difference_s1'),
			'difference_s2'=>$this->input->post('difference_s2'),
			'difference_s3'=>$this->input->post('difference_s3'),
			'difference_s4'=>$this->input->post('difference_s4'),
			'difference_s5'=>$this->input->post('difference_s5'),
			'difference_s6'=>$this->input->post('difference_s6'),
			
			'content'=>$this->input->post('content'),
			'average'=>$this->input->post('average'), 
			'equivalent'=>$this->input->post('equivalent'),
			'range_min'=>$this->input->post('range_min'), 
			'range_max'=>$this->input->post('range_max'), 
			'rsd'=>$this->input->post('rsd'),
			'content_from'=>$this->input->post('content_from'),  
			'content_to'=>$this->input->post('content_to'),  
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),  
			'results'=>$this->input->post('results'), 
			'comment'=>$this->input->post('comment'),		
			'test_request'=>$test_request,
			'assignment'=>$assignment,
			'status' =>$second_status,
			'choice'=>$this->input->post('choice'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'analyst'=>$this->input->post('analyst'),	
			'date_done'=>$this->input->post('date_done'),	
			'further_comments'=>$this->input->post('further_comments'),	
			);
		$this->db->insert('diss_data', $data);

		$determination_data = array(
			'test_request'=>$test_request,
			'status' =>$second_status,
			'uv_id'=>$test_id,
			'uv_type'=>$this->input->post('uv_type'),	
			'det_1_pkt'=>$this->input->post('det_1_pkt'),
			'det_1_wstd'=>$this->input->post('det_1_wstd'),
			'det_1_df'=>$this->input->post('det_1_df'),
			'det_1_potency'=>$this->input->post('det_1_potency'),
			'det_1_pkstd'=>$this->input->post('det_1_pkstd'),
			'det_1_lc'=>$this->input->post('det_1_lc'),
			'determination_1'=>$this->input->post('determination_1'),

			'det_2_pkt'=>$this->input->post('det_2_pkt'),
			'det_2_wstd'=>$this->input->post('det_2_wstd'),
			'det_2_df'=>$this->input->post('det_2_df'),
			'det_2_potency'=>$this->input->post('det_2_potency'),
			'det_2_pkstd'=>$this->input->post('det_2_pkstd'),
			'det_2_lc'=>$this->input->post('det_2_lc'),
			'determination_2'=>$this->input->post('determination_2'),

			'det_3_pkt'=>$this->input->post('det_3_pkt'),
			'det_3_wstd'=>$this->input->post('det_3_wstd'),
			'det_3_df'=>$this->input->post('det_3_df'),
			'det_3_potency'=>$this->input->post('det_3_potency'),
			'det_3_pkstd'=>$this->input->post('det_3_pkstd'),
			'det_3_lc'=>$this->input->post('det_3_lc'),
			'determination_3'=>$this->input->post('determination_3'),

			'det_4_pkt'=>$this->input->post('det_4_pkt'),
			'det_4_wstd'=>$this->input->post('det_4_wstd'),
			'det_4_df'=>$this->input->post('det_4_df'),
			'det_4_potency'=>$this->input->post('det_4_potency'),
			'det_4_pkstd'=>$this->input->post('det_4_pkstd'),
			'det_4_lc'=>$this->input->post('det_4_lc'),
			'determination_4'=>$this->input->post('determination_4'),

			'det_5_pkt'=>$this->input->post('det_5_pkt'),
			'det_5_wstd'=>$this->input->post('det_5_wstd'),
			'det_5_df'=>$this->input->post('det_5_df'),
			'det_5_potency'=>$this->input->post('det_5_potency'),
			'det_5_pkstd'=>$this->input->post('det_5_pkstd'),
			'det_5_lc'=>$this->input->post('det_5_lc'),
			'determination_5'=>$this->input->post('determination_5'),

			'det_6_pkt'=>$this->input->post('det_6_pkt'),
			'det_6_wstd'=>$this->input->post('det_6_wstd'),
			'det_6_df'=>$this->input->post('det_6_df'),
			'det_6_potency'=>$this->input->post('det_6_potency'),
			'det_6_pkstd'=>$this->input->post('det_6_pkstd'),
			'det_6_lc'=>$this->input->post('det_6_lc'),
			'determination_6'=>$this->input->post('determination_6'),
			'second_det_1_pkt'=>$this->input->post('second_det_1_pkt'),
			'second_det_1_df'=>$this->input->post('second_det_1_df'),
			'second_det_1_lc'=>$this->input->post('second_det_1_lc'),
			'second_determination_1'=>$this->input->post('second_determination_1'),
			
			'second_det_2_pkt'=>$this->input->post('second_det_2_pkt'),
			'second_det_2_df'=>$this->input->post('second_det_2_df'),
			'second_det_2_lc'=>$this->input->post('second_det_2_lc'),
			'second_determination_2'=>$this->input->post('second_determination_2'),
			
			'second_det_3_pkt'=>$this->input->post('second_det_3_pkt'),
			'second_det_3_df'=>$this->input->post('second_det_3_df'),
			'second_det_3_lc'=>$this->input->post('second_det_3_lc'),
			'second_determination_3'=>$this->input->post('second_determination_3'),
			
			'second_det_4_pkt'=>$this->input->post('second_det_4_pkt'),
			'second_det_4_df'=>$this->input->post('second_det_4_df'),
			'second_det_4_lc'=>$this->input->post('second_det_4_lc'),
			'second_determination_4'=>$this->input->post('second_determination_4'),
			
			'second_det_5_pkt'=>$this->input->post('second_det_5_pkt'),
			'second_det_5_df'=>$this->input->post('second_det_5_df'),
			'second_det_5_lc'=>$this->input->post('second_det_5_lc'),
			'second_determination_5'=>$this->input->post('second_determination_5'),
			
			'second_det_6_pkt'=>$this->input->post('second_det_6_pkt'),
			'second_det_6_df'=>$this->input->post('second_det_6_df'),
			'second_det_6_lc'=>$this->input->post('second_det_6_lc'),
			'second_determination_6'=>$this->input->post('second_determination_6'),
			);

			$this->db->insert('diss_uv_determinations', $determination_data);
			$conclusion= $this->input->post('choice');
			if ($conclusion == "The Test Passed") {			

			// $coa_data = array(			
			// 'test_request_id'=>$test_request,
			// 'assignment_id'=>$assignment,
			// 'test_type'=>$test_name,
			// 'test_id'=>$test_id,
			// 'remarks'=>$this->input->post('choice'),
			// 'date_done'=>$this->input->post('date_done'),
			// 'done_by'=>$analyst,
			// );
			// $this->db->insert('coa', $coa_data);

			$result_data = array(			
			'test_request_id'=>$test_request,
			'test_type'=>$test_type,
			'test_id'=>$test_id,
			'results'=>$results,
			);
		
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));
		// $this->db->insert('test_results', $result_data);
		}

		redirect('test/index/'.$assignment.'/'.$test_request);
	}
	function save_third_worksheet(){
		$test =$this->input->post('test');
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$third_status =3;
		$test_name='Dissolution by Uv Normal Tablets: Third Stage';
		$analyst= $this->input->post('analyst');
		$test_type = '7a';

		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;

		$results = 'Range from '.$this->input->post('range_min').' to '.$this->input->post('range_max');
		$data =array(
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'hcl_prepaparation'=>$this->input->post('hcl_prepaparation'),
			
			'apparatus'=>$this->input->post('apparatus'),
			'actual_apparatus'=>$this->input->post('actual_apparatus'), 
			'apparatus_comment'=>$this->input->post('apparatus_comment'), 
			'rotation'=>$this->input->post('rotation'),
			'actual_rotation'=>$this->input->post('actual_rotation'), 
			'rotation_comment'=>$this->input->post('rotation_comment'),
			'time'=>$this->input->post('time'), 
			'actual_time'=>$this->input->post('actual_time,'), 
			'time_comment'=>$this->input->post('time_comment'),
			'temperature'=>$this->input->post('temperature'),
			'actual_temperature'=>$this->input->post('actual_temperature'),
			'temperature_comment'=>$this->input->post('temperature_comment'),
			
			// 'equipment_make_2'=>$this->input->post('equipment_make_2'),
			'equipment_number_2'=>$this->input->post('equipment_number_2'),
			'standard_weight'=>$this->input->post('standard_weight'),
			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no') ,
			'potency_standard_container'=>$this->input->post('potency_standard_container'),
			'potency_container'=>$this->input->post('potency_container'),
			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_dilution'=>$this->input->post('standard_dilution'),
			'sample_preparation'=>$this->input->post('sample_preparation'),
			'dilution_factor'=>$this->input->post('dilution_factor'),			
			
			'first_absorbance'=>$this->input->post('first_absorbance'),
			'second_absorbance'=>$this->input->post('second_absorbance') ,
			'difference_standard'=>$this->input->post('difference_standard'), 
			'difference_s1'=>$this->input->post('difference_s1'),
			'difference_s2'=>$this->input->post('difference_s2'),
			'difference_s3'=>$this->input->post('difference_s3'),
			'difference_s4'=>$this->input->post('difference_s4'),
			'difference_s5'=>$this->input->post('difference_s5'),
			'difference_s6'=>$this->input->post('difference_s6'),
			
			'content'=>$this->input->post('content'),
			'average'=>$this->input->post('average'), 
			'equivalent'=>$this->input->post('equivalent'),
			'range_min'=>$this->input->post('range_min'), 
			'range_max'=>$this->input->post('range_max'), 
			'rsd'=>$this->input->post('rsd'),
			'content_from'=>$this->input->post('content_from'),  
			'content_to'=>$this->input->post('content_to'),  
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),  
			'results'=>$this->input->post('results'), 
			'comment'=>$this->input->post('comment'),		
			'test_request'=>$test_request,
			'assignment'=>$assignment,
			'status' =>$second_status,
			'choice'=>$this->input->post('choice'),
			'supervisor'=>$this->input->post('supervisor'),
			'date'=>$this->input->post('date'),
			'analyst'=>$this->input->post('analyst'),	
			'date_done'=>$this->input->post('date_done'),	
			'further_comments'=>$this->input->post('further_comments'),	
			);
		$this->db->insert('diss_data', $data);

		$determination_data = array(
			'test_request'=>$test_request,
			'status' =>$third_status,
			'uv_id'=>$test_id,
			'uv_type'=>$this->input->post('uv_type'),
			'det_1_pkt'=>$this->input->post('det_1_pkt'),
			'det_1_wstd'=>$this->input->post('det_1_wstd'),
			'det_1_df'=>$this->input->post('det_1_df'),
			'det_1_potency'=>$this->input->post('det_1_potency'),
			'det_1_pkstd'=>$this->input->post('det_1_pkstd'),
			'det_1_lc'=>$this->input->post('det_1_lc'),
			'determination_1'=>$this->input->post('determination_1'),

			'det_2_pkt'=>$this->input->post('det_2_pkt'),
			'det_2_wstd'=>$this->input->post('det_2_wstd'),
			'det_2_df'=>$this->input->post('det_2_df'),
			'det_2_potency'=>$this->input->post('det_2_potency'),
			'det_2_pkstd'=>$this->input->post('det_2_pkstd'),
			'det_2_lc'=>$this->input->post('det_2_lc'),
			'determination_2'=>$this->input->post('determination_2'),

			'det_3_pkt'=>$this->input->post('det_3_pkt'),
			'det_3_wstd'=>$this->input->post('det_3_wstd'),
			'det_3_df'=>$this->input->post('det_3_df'),
			'det_3_potency'=>$this->input->post('det_3_potency'),
			'det_3_pkstd'=>$this->input->post('det_3_pkstd'),
			'det_3_lc'=>$this->input->post('det_3_lc'),
			'determination_3'=>$this->input->post('determination_3'),

			'det_4_pkt'=>$this->input->post('det_4_pkt'),
			'det_4_wstd'=>$this->input->post('det_4_wstd'),
			'det_4_df'=>$this->input->post('det_4_df'),
			'det_4_potency'=>$this->input->post('det_4_potency'),
			'det_4_pkstd'=>$this->input->post('det_4_pkstd'),
			'det_4_lc'=>$this->input->post('det_4_lc'),
			'determination_4'=>$this->input->post('determination_4'),

			'det_5_pkt'=>$this->input->post('det_5_pkt'),
			'det_5_wstd'=>$this->input->post('det_5_wstd'),
			'det_5_df'=>$this->input->post('det_5_df'),
			'det_5_potency'=>$this->input->post('det_5_potency'),
			'det_5_pkstd'=>$this->input->post('det_5_pkstd'),
			'det_5_lc'=>$this->input->post('det_5_lc'),
			'determination_5'=>$this->input->post('determination_5'),

			'det_6_pkt'=>$this->input->post('det_6_pkt'),
			'det_6_wstd'=>$this->input->post('det_6_wstd'),
			'det_6_df'=>$this->input->post('det_6_df'),
			'det_6_potency'=>$this->input->post('det_6_potency'),
			'det_6_pkstd'=>$this->input->post('det_6_pkstd'),
			'det_6_lc'=>$this->input->post('det_6_lc'),
			'determination_6'=>$this->input->post('determination_6'),
			'second_det_1_pkt'=>$this->input->post('second_det_1_pkt'),
			'second_det_1_df'=>$this->input->post('second_det_1_df'),
			'second_det_1_lc'=>$this->input->post('second_det_1_lc'),
			'second_determination_1'=>$this->input->post('second_determination_1'),
			
			'second_det_2_pkt'=>$this->input->post('second_det_2_pkt'),
			'second_det_2_df'=>$this->input->post('second_det_2_df'),
			'second_det_2_lc'=>$this->input->post('second_det_2_lc'),
			'second_determination_2'=>$this->input->post('second_determination_2'),
			
			'second_det_3_pkt'=>$this->input->post('second_det_3_pkt'),
			'second_det_3_df'=>$this->input->post('second_det_3_df'),
			'second_det_3_lc'=>$this->input->post('second_det_3_lc'),
			'second_determination_3'=>$this->input->post('second_determination_3'),
			
			'second_det_4_pkt'=>$this->input->post('second_det_4_pkt'),
			'second_det_4_df'=>$this->input->post('second_det_4_df'),
			'second_det_4_lc'=>$this->input->post('second_det_4_lc'),
			'second_determination_4'=>$this->input->post('second_determination_4'),
			
			'second_det_5_pkt'=>$this->input->post('second_det_5_pkt'),
			'second_det_5_df'=>$this->input->post('second_det_5_df'),
			'second_det_5_lc'=>$this->input->post('second_det_5_lc'),
			'second_determination_5'=>$this->input->post('second_determination_5'),
			
			'second_det_6_pkt'=>$this->input->post('second_det_6_pkt'),
			'second_det_6_df'=>$this->input->post('second_det_6_df'),
			'second_det_6_lc'=>$this->input->post('second_det_6_lc'),
			'second_determination_6'=>$this->input->post('second_determination_6'),
			);

			$this->db->insert('diss_uv_determinations', $determination_data);
			$coa_data = array(			
			'test_request_id'=>$test_request,
			'assignment_id'=>$assignment,
			'test_type'=>$test_type,
			// 'test_specification'=>$test_specification,
			// 'results'=>$this->input->post('further_comments'),
			'remarks'=>$this->input->post('choice'),
			'date_done'=>$this->input->post('date_done'),
			'done_by'=>$analyst,
			);
		$this->db->insert('coa', $coa_data);	
			
			$result_data = array(			
			'test_request_id'=>$test_request,
			'test_type'=>$test_type,
			'test_id'=>$test_id,
			'results'=>$results,
			);
		
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));
		// $this->db->insert('test_results', $result_data);
	

		redirect('test/index/'.$assignment.'/'.$test_request);
	

	}
	
	function save_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_type=$this->input->post('test_type');
		$analyst= $this->input->post('analyst');

		$data=$this->db->select_max('id')->get('diss_data')->result();
        $test_id=$data[0]->id;
        $test_id++;

        $monograph_specifications = $this->input->post('specification');
		$component = $this->input->post('component_name');

		for ($i=0; $i <sizeof($component) ; $i++) { 
			$value[] = $component[$i].': '.$monograph_specifications[$i];
		}
		
 
		$data = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_id' => $test_id,
			'test_type' => $test_type,
			'monograph_specifications' => implode(';', $value),
			
			);
		$data2 = array(
			'test_request_id' => $this->input->post('test_request'),
			'test_type' => $test_type,
			'specifications' => implode(';', $value),

			);

		$this->db->insert('monograph_specifications', $data);
		$this->db->insert('test_results', $data2);
		('test/index/'.$assignment.'/'.$test_request);	

	}

}

?> 