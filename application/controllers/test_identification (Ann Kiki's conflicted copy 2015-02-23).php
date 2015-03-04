<?php
class Test_Identification extends CI_Controller{
	
	function Test_Identification(){
		parent::__construct();
       $this->load->model('test_identification_model');
	}	

	function index(){			

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($results['monograph_specs'][0]['test_type']==25) {
			$data['specs'] = $results['monograph_specs'];
			
		}else{
			$data['specs'] = "No info";
		}}		
				
		$this->load->view('tests/identification/test_identification_view', $data);
		
	}
	function index_chemical(){			

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($results['monograph_specs'][0]['test_type']==29) {
			$data['specs'] = $results['monograph_specs'];
			
		}else{
			$data['specs'] = "No info";
		}}
		
		$this->load->view('tests/identification/test_identification_chemical_view', $data);
		
	}
	function index_hplc(){			

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($results['monograph_specs'][0]['test_type']==28) {
			$data['specs'] = $results['monograph_specs'];
			
		}else{
			$data['specs'] = "No info";
		}}
		
		$this->load->view('tests/identification/test_identification_hplc_view', $data);
		
	}
	function index_thin_layer(){			

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($value['test_type']==27) {

			$data['specs'] = $value;

		}else{
			$data['specs'] = "No info";

		}
		}
		
		$this->load->view('tests/identification/test_identification_thin_layer_view', $data);
		
	}
	function index_uv($sql_standards){		

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($value['test_type']==26) {
			$data['specs'] = $value;
			
		}else{
			$data['specs'] = "No info";
		}}
		$this->load->view('tests/identification/test_identification_uv_view', $data);
	}
	function index_infrared(){		

        $results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($results['monograph_specs'] as $key => $value) {
		if ($value['test_type']==30) {
			$data['specs'] = $value;
			
		}else{
			$data['specs'] = "No info";
		}}
		$this->load->view('tests/identification/test_identification_infrared_view', $data);
	}
	function monograph_assay(){		

   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];	
		$data['component_category'] = $results['component_category'];
		$data['components'] = $results['components'];	
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'25'))->result_array();
					
		$this->load->view('tests/identification/test_identification_monograph_assay_view',$data);
	}
	function monograph_chemical(){

   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];		
		$data['components'] = $results['components'];				
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'29'))->result_array();
				
		$this->load->view('tests/identification/test_identification_monograph_chemical_view',$data);
	}
	function monograph_hplc(){
		
   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];		
		$data['components'] = $results['components'];		
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'28'))->result_array();
				
		$this->load->view('tests/identification/test_identification_monograph_hplc_view',$data);
	}
	function monograph_infrared(){
		
   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];		
		$data['components'] = $results['components'];	
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'30'))->result_array();
		
		$this->load->view('tests/identification/test_identification_monograph_infrared_view',$data);
	}
	function monograph_thin_layer(){
		
   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];		
		$data['components'] = $results['components'];			
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'27'))->result_array();
				
		$this->load->view('tests/identification/test_identification_monograph_thin_layer_view',$data);
	}
	
	function monograph_uv(){
		
   $test_request = $this->uri->segment(4);
		$results = $this->test_identification_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['component_category'] = $results['component_category'];		
		$data['components'] = $results['components'];	
		$data['monograph_specs']=	$this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type'=>'26'))->result_array();
		
		$this->load->view('tests/identification/test_identification_monograph_uv_view',$data);
	}
	function view_worksheet(){
		
		$test_request =$this->uri->segment(4);
		$test_id =$this->uri->segment(5);

		$result = $this->db->get_where('test_request', array('id'=>$test_request))->result_array();
		$data['results']=$result[0];

		$sql=$this->db->get_where('identification', array('test_request' =>$test_request))->result_array();	    
	    $data['info']=$sql[0];

		$full_monograph=$this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();
		$data['full_monograph']=$full_monograph[0];

		$this->load->view('tests/identification/test_identification_view_worksheet', $data);	
	}
	function view_worksheet_uv(){
		
		$test_request =$this->uri->segment(4);

		$query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.active_ingredients,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
	    test_request.sample_source,test_request.expiry_date,test_request.quantity_type,test_request.reference_number,test_request.applicant_address,test_request.date_time,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
	    test_request.quantity_remaining,test_request.strength_concentration,test_request.quantity_submitted,test_request.applicant_ref_number,test_request.test_specification,test_request.brand_name,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
	    $results=$query->result_array();
	    $data['query']=$results[0];

		$query_e=$this->db->get_where('identification_uv', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('monograph_specifications', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_uv', $data);	
	} 
	function view_worksheet_infrared(){
		
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('identification_infrared', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('identification_infrared_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_infrared', $data);	
	}
	function view_worksheet_tlc(){
		
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('tlc', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('identification_tlc_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_tlc', $data);	
	}
	function view_worksheet_hplc(){
		
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('identification_hplc', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('identification_hplc_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_hplc', $data);	
	}
	function view_worksheet_chemical(){
		
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('identification_chemical_method', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('identification_chemical_method_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_chemical', $data);	
	}
	function view_worksheet_thin_layer(){
		
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('identification_thin_layer', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('identification_thin_layer_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/identification/test_identification_view_worksheet_thin_layer', $data);	
	}
	
	function worksheet_assay(){	
	// var_dump($this->input->post());	
		if ($this->input->post()) {
			$this->test_identification_model->save_assay();
		}		
	}
	function worksheet_uv(){
	var_dump($this->input->post());

		if ($this->input->post()) {
			$this->test_identification_model->save_uv();
		}
		
	}
	function worksheet_infrared(){
		
		if ($this->input->post()) {
			$this->test_identification_model->save_infrared();
		}
	}
	
	function worksheet_thin_layer(){
		
		if ($this->input->post()) {
			$this->test_identification_model->save_thin_layer();
		}
	}
	function worksheet_chemical_method(){

		if ($this->input->post()) {
			$this->test_identification_model->save_chemical();
		}
	}
	function worksheet_hplc(){	

		if ($this->input->post()) {
			$this->test_identification_model->save_hplc();
		}
	}

	function save_chemical_monograph(){			

		if ($this->input->post('save_chemical_monograph')) {
			$this->test_identification_model->save_chemical_monograph();
		}
	}
	function save_assay_monograph(){		

		if ($this->input->post('save_assay_monograph')) {
			$this->test_identification_model->save_assay_monograph();
		}
	}
	function save_hplc_monograph(){	

		if ($this->input->post('save_hplc_monograph')) {
			$this->test_identification_model->save_hplc_monograph();
		}
	}
	function save_thin_layer_monograph(){	

		if ($this->input->post('save_thin_layer_monograph')) {
			$this->test_identification_model->save_thin_layer_monograph();
		}
	}	
	function save_uv_monograph(){			

		if ($this->input->post('save_uv_monograph')) {
			$this->test_identification_model->save_uv_monograph();
		}
	}
	function save_infrared_monograph(){			

		if ($this->input->post('save_infrared_monograph')) {
			$this->test_identification_model->save_infrared_monograph();
		}
	}

}
?>