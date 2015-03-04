<?php
class Test_Water_Method_Model extends CI_Model{

	function Test_Water_Method_Model(){
		parent::__construct();
	}

	function save_worksheet(){
		
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$status =1;
		$test_name='Karl Fisher(Water)';  
		$analyst= $this->input->post('analyst');
		$test_type = 41;

		$data=$this->db->select_max('id')->get('identification')->result();
        $test_id=$data[0]->id;
        $test_id++;

        $results = 'RSD results: '.$this->input->post('std_rsd_result').'.</br> Determination result from '.$this->input->post('range_min') .' to '.$this->input->post('range_max').' </br> Average ='.$this->input->post('average');
		
		$data =array(
			'equipment_make'=>$this->input->post('equipment_make'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'burette_id'=>$this->input->post('burrette_id'),
			'burette_volume'=>$this->input->post('burette_volume'),
			'balance_make'=>$this->input->post('balance_make'),
			'balance_number'=>$this->input->post('balance_number'),
			'standard_description'=>$this->input->post('standard_description'),
			'standard_container_1'=>$this->input->post('standard_container_1'),
			'standard_container_2'=>$this->input->post('standard_container_2'),
			'standard_container_3'=>$this->input->post('standard_container_3'),
			'standard_container_4'=>$this->input->post('standard_container_4'),
			'standard_container_5'=>$this->input->post('standard_container_5'),
			'standard_container_6'=>$this->input->post('standard_container_6'),

			'container_1'=>$this->input->post('container_1'),
			'container_2'=>$this->input->post('container_2'),
			'container_3'=>$this->input->post('container_3'),
			'container_4'=>$this->input->post('container_4'),
			'container_5'=>$this->input->post('container_5'),
			'container_6'=>$this->input->post('container_6'),

			'standard_weight_1'=>$this->input->post('standard_weight_1'),
			'standard_weight_2'=>$this->input->post('standard_weight_2'),
			'standard_weight_3'=>$this->input->post('standard_weight_3'),
			'standard_weight_4'=>$this->input->post('standard_weight_4'),
			'standard_weight_5'=>$this->input->post('standard_weight_5'),
			'standard_weight_6'=>$this->input->post('standard_weight_6'),

			'initial_temperature'=>$this->input->post('initial_temperature'),
			'final_temperature'=>$this->input->post('final_temperature'),

			'kf_volume_1'=>$this->input->post('kf_volume_1'),
			'kf_volume_2'=>$this->input->post('kf_volume_2'),
			'kf_volume_3'=>$this->input->post('kf_volume_3'),
			'kf_volume_4'=>$this->input->post('kf_volume_4'),
			'kf_volume_5'=>$this->input->post('kf_volume_5'),
			'kf_volume_6'=>$this->input->post('kf_volume_6'),

			'titer_1'=>$this->input->post('titer_1'),
			'titer_2'=>$this->input->post('titer_2'),
			'titer_3'=>$this->input->post('titer_3'),
			'titer_4'=>$this->input->post('titer_4'),
			'titer_5'=>$this->input->post('titer_5'),
			'titer_6'=>$this->input->post('titer_6'),
			// 'rsd_acceptance_criteria'=>$this->input->post('rsd_acceptance_criteria'),
			'rsd_result'=>$this->input->post('std_rsd_result'),
			'rsd_comment'=>$this->input->post('std_rsd_comment'),

			'sample_tier_container_1'=>$this->input->post('sample_tier_container_1'),
			'sample_tier_container_2'=>$this->input->post('sample_tier_container_2'),
			'sample_tier_container_3'=>$this->input->post('sample_tier_container_3'),
			'sample_tier_container_4'=>$this->input->post('sample_tier_container_4'),
			'sample_tier_container_5'=>$this->input->post('sample_tier_container_5'),
			'sample_tier_container_6'=>$this->input->post('sample_tier_container_6'),

			'tier_container_1'=>$this->input->post('sample_tier_container_1'),
			'tier_container_2'=>$this->input->post('sample_tier_container_2'),
			'tier_container_3'=>$this->input->post('sample_tier_container_3'),
			'tier_container_4'=>$this->input->post('sample_tier_container_4'),
			'tier_container_5'=>$this->input->post('sample_tier_container_5'),
			'tier_container_6'=>$this->input->post('sample_tier_container_6'),
			
			'sample_tier_weight_1'=>$this->input->post('sample_tier_weight_1'),
			'sample_tier_weight_2'=>$this->input->post('sample_tier_weight_2'),
			'sample_tier_weight_3'=>$this->input->post('sample_tier_weight_3'),
			'sample_tier_weight_4'=>$this->input->post('sample_tier_weight_4'),
			'sample_tier_weight_5'=>$this->input->post('sample_tier_weight_5'),
			'sample_tier_weight_6'=>$this->input->post('sample_tier_weight_6'),

			'sample_tier_kf_volume_1'=>$this->input->post('sample_tier_kf_volume_1'),
			'sample_tier_kf_volume_2'=>$this->input->post('sample_tier_kf_volume_2'),
			'sample_tier_kf_volume_3'=>$this->input->post('sample_tier_kf_volume_3'),

			'volume_sample_1'=>$this->input->post('volume_sample_1'),
			'volume_sample_2'=>$this->input->post('volume_sample_2'),
			'volume_sample_3'=>$this->input->post('volume_sample_3'),			
			
			'average'=>$this->input->post('average'),
			'equivalent'=>$this->input->post('equivalent'),
			'range_min'=>$this->input->post('range_min'),
			'range_max'=>$this->input->post('range_max'),
			'rsd'=>$this->input->post('rsd'),
			// 'content_ac'=>$this->input->post('content_ac'),
			// 'content_result'=>$this->input->post('content_result'),
			// 'content_comment'=>$this->input->post('content_comment'),
			// // 'sd_ac'=>$this->input->post('sd_ac'),
			// 'sd_result'=>$this->input->post('sd_result'),
			// 'sd_comment'=>$this->input->post('sd_comment'),
			// // 'rsd_ac'=>$this->input->post('rsd_ac'),
			// 'rsd_result_2'=>$this->input->post('rsd_result_2'),
			// 'rsd_comment_2'=>$this->input->post('rsd_comment_2'),
			'test_request_id'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,	
			
			'choice'=>$this->input->post('choice'),
			'done_by'=>$this->input->post('analyst'),		

			);
		$this->db->insert('water_method', $data);
		
		$result_data = array(
			'test_id'=>$test_id,
			'test_name'=>$test_name,
			'method'=>$this->input->post('method'),
			'remarks'=>$this->input->post('choice'),
			'results'=>$results,
			);
		$this->db->update('test_results', $result_data, array('test_request_id'=>$test_request,'test_type'=>$test_type));
		
		$data_detrminations = array(
			'det_1_kfv'=>$this->input->post('det_1_kfv'),
			'det_1_f'=>$this->input->post('det_1_f'),
			'det_1_wt'=>$this->input->post('det_1_wt'),
			'determination_1'=>$this->input->post('determination_1'),
			
			'det_2_kfv'=>$this->input->post('det_2_kfv'),
			'det_2_f'=>$this->input->post('det_2_f'),
			'det_2_wt'=>$this->input->post('det_2_wt'),			
			'determination_2'=>$this->input->post('determination_2'),

			'det_3_kfv'=>$this->input->post('det_3_kfv'),
			'det_3_f'=>$this->input->post('det_3_f'),
			'det_3_wt'=>$this->input->post('det_3_wt'),
			'determination_3'=>$this->input->post('determination_3'),
			
			'det_4_kfv'=>$this->input->post('det_4_kfv'),
			'det_4_f'=>$this->input->post('det_4_f'),
			'det_4_wt'=>$this->input->post('det_4_wt'),
			'determination_4'=>$this->input->post('determination_4'),

			'det_5_kfv'=>$this->input->post('det_5_kfv'),
			'det_5_f'=>$this->input->post('det_5_f'),
			'det_5_wt'=>$this->input->post('det_5_wt'),
			'determination_5'=>$this->input->post('determination_5'),

			'det_6_kfv'=>$this->input->post('det_6_kfv'),
			'det_6_f'=>$this->input->post('det_6_f'),
			'det_6_wt'=>$this->input->post('det_6_wt'),			
			'determination_6'=>$this->input->post('determination_6')
			);

		$this->db->insert('water_method_determinations', $data_detrminations);
		redirect('test/index/'.$assignment.'/'.$test_request);	
	}
		function save_monograph(){
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Karl Fisher';
		$analyst= $this->input->post('analyst');
		$test_type= '41';

		// $data=$this->db->select_max('id')->get('water_method')->result();
        $test_id=1;
  //       $test_id++;

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