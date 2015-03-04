<?php
class Test_Identification_Chemical_Model extends CI_Model{

	function Test_Identification_Chemical_Model(){
		parent::__construct();
	}

	function save_worksheet(){
				
		$status =1;
		$test_request=$this->input->post('test_request');
		$assignment=$this->input->post('assignment');
		$test_name='Identification: Chemical Method';
		$analyst= $this->input->post('analyst');
		$test_type = '1f';

		$data=$this->db->select_max('id')->get('identification_chemical_method')->result();
        $test_id=$data[0]->id;
        $test_id++;

		
		$data =array(			
			
			'chemical_test'=>$this->input->post('chemical_test'),
			'equipment_number'=>$this->input->post('equipment_number'),
			'equipment_make'=>$this->input->post('equipment_make'),
			'sample_container'=>$this->input->post('sample_container'),
			'container'=>$this->input->post('container'),
			'sample_weight'=>$this->input->post('sample_weight'),
			'sample_dilution'=>$this->input->post('sample_dilution'),

			'standard_description'=>$this->input->post('standard_description'),
			'potency'=>$this->input->post('potency'),
			'lot_no'=>$this->input->post('lot_no'),
			'id_no'=>$this->input->post('id_no'),

			'standard_container_2'=>$this->input->post('standard_container_2'),
			'container_2'=>$this->input->post('container_2'),
			'standard_weight_2'=>$this->input->post('standard_weight_2'),
			'standard_dilution'=>$this->input->post('standard_dilution'),

			'reagent_description'=>$this->input->post('reagent_description'),
			'reagent_weight_container_1'=>$this->input->post('reagent_weight_container_1'),
			'reagent_container_1'=>$this->input->post('reagent_container_1'),
			'reagent_weight_1'=>$this->input->post('reagent_weight_1'),
			'reagent_dilution'=>$this->input->post('reagent_dilution'),

			'calculation_mobile'=>$this->input->post('calculation_mobile'),
			'observation'=>$this->input->post('observation'),
			'acceptance_criteria'=>$this->input->post('acceptance_criteria'),
			'results'=>$this->input->post('results'),
			'comment'=>$this->input->post('comment'),
			'test_request'=>$this->input->post('test_request'),
			'assignment'=>$this->input->post('assignment'),
			'status'=>$status,
			
			'choice'=>$this->input->post('choice'),
			'date_done'=>$this->input->post('date_done'),
			'analyst'=>$this->input->post('analyst'),
			'date_done'=>$this->input->post('date_done'),
			'further_comments'=>$this->input->post('further_comments'),				

			);
		$this->db->insert('identification_chemical_method', $data);

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
		$test_name='Chemical Method';
		$analyst= $this->input->post('analyst');
		$test_type= '1f';


		$data=$this->db->select_max('id')->get('identification_chemical_method')->result();
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
