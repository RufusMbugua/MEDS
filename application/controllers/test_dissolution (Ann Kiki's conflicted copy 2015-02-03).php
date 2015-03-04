<?php
class Test_Dissolution extends CI_Controller{
	function Test_Dissolution(){
		parent::__construct();
		$this->load->model('test_dissolution_model');		
	}

	function index(){

		$results = $this->test_dissolution_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		$results_=array();
		
		foreach ($results['monograph_specs'] as $key => $value) {
		
		if ($value['test_type']==31) {
			$results_ = $value;
		}

		}
		if (!empty($results_)) {
			$data['specs'] = $results_;
		}
		else{
			$data['specs'] = "No info";
		}		
		$this->load->view('tests/dissolution/test_dissolution_view', $data);		
	}
	function index_second_stage_uv(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $test_type='7a';
		$status_first_stage =1;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();
		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$query_dissolution = $this->db->get_where('diss_data', array('status' => $status_first_stage))->result_array();
    	$data['sql_dissolution']= $query_dissolution[0];
		
		$query_dissolution_det = $this->db->get_where('diss_uv_determinations', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$q = "select * from monograph_specifications where test_request_id = $test_request and test_type = '$test_type' ";
		$data['specs']=$this->db->query($q)->result_array();
		
		// var_dump($query_dissolution_det);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_uv_second_stage_view', $data);		
	}
	function index_third_stage_uv(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $test_type='7a';
		$status_second_stage =2;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();
		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$query_dissolution = $this->db->get_where('diss_data', array('status' => $status_second_stage))->result_array();
    	$data['sql_dissolution']= $query_dissolution[0];
		
		$query_dissolution_det = $this->db->get_where('diss_uv_determinations', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$q = "select * from monograph_specifications where test_request_id = $test_request and test_type = '$test_type' ";
		$data['specs']=$this->db->query($q)->result_array();
		
		// var_dump($query_dissolution);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_uv_third_stage_view', $data);		
	}
	function outofspecification(){
    $assignment_id= $this->uri->segment(3);
    $test_request_id=$this->uri->segment(4);
    $test_type_id=$this->uri->segment(5);
    $status=0; 

    $data['hplc_internal_monograph']=
    $this->db->select('assay_monograph_hplc_internal_method.id AS m,assay_monograph_hplc_internal_method.assignment_id,assay_monograph_hplc_internal_method.test_request_id,assay_monograph_hplc_internal_method.assay_hplc_internal_method_id,assay_monograph_hplc_internal_method.monograph')->get_where('assay_monograph_hplc_internal_method', array('id' => $test_type_id))->result_array();
    
    $data['hplc_internal_method']=
    $this->db->select('*')->get_where('assay_hplc_internal_method', array('id' => $test_type_id))->result_array();
    
    $data['hplc_internal_method_reagents']=
    $this->db->select('*')->get_where('assay_hplc_internal_method_reagents', array('assay_hplc_internal_method_id' => $test_type_id))->result_array();

    $data['hplc_internal_method_peak_area_chromatograms']=
    $this->db->select('*')->get_where('assay_hplc_internal_method_peak_area_chromatograms', array('assay_hplc_internal_method_id' => $test_type_id))->result_array();

    $data['hplc_internal_method_chromatograms']=
    $this->db->select('*')->get_where('assay_hplc_internal_method_chromatograms', array('assay_hplc_internal_method_id' => $test_type_id))->result_array();
    
    $data['hplc_internal_method_chromatography_checklist']=
    $this->db->select('*')->get_where('assay_hplc_internal_method_chromatography_checklist', array('assay_hplc_internal_method_id' => $test_type_id))->result_array();

    // $data['hplc_internal_method_chromatographic_conditions']=
    // $this->db->select('*')->get_where('assay_hplc_internal_method_chromatographic_conditions', array('assay_hplc_internal_method_id' => $test_type_id))->result_array();

    $data['request']=
    $this->db->select('assignment.id AS a,assignment.test_request_id,assignment.user_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();

    $data['sql_equipment']=
    $this->db->select('equipment_maintenance.description,equipment_maintenance.id_number,equipment_maintenance.status,equipment_maintenance.manufacturer,equipment_maintenance.model')->get_where('equipment_maintenance', array('status' => $status))->result_array();

    $data['sql_standards']=
    $this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    $data['sql_columns']=
    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


    $query=$this->db->select('test_request.id AS tr,test_request.client_id,test_request.test_type_id,test_request.assignment_name,test_request.active_ingredients,test_request.brand_name,test_request.applicant_address,test_request.date_time,test_request.manufacturer_name,test_request.manufacturer_address,test_request.batch_lot_number,
    test_request.sample_source,test_request.expiry_date,test_request.date_manufactured,test_request.quantity_type,test_request.sample_source,test_request.laboratory_number,test_request.applicant_name,
    test_request.quantity_remaining,test_request.quantity_submitted,test_request.reference_number,test_request.applicant_ref_number,test_request.identification,test_request.friability,test_request.dissolution,test_request.assay,test_request.test_specification,
    test_request.disintegration,test_request.ph_alkalinity,test_request.full_monograph,test_request.content_uniformity,test_request.microbiology,test_request.request_status')->get_where('test_request', array('id' => $test_request_id));
     

    $results=$query->result_array();
    $data['query']=$results[0];
    $this->load->view('tests/dissolution/out_of_specification_investigation_view',$data);
    $this->load->helper(array('form'));

    }
	function index_delayed_release(){
		$results = $this->test_dissolution_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];
		$data['monograph'] = $results['full_monograph'];

		foreach ($results['monograph_specs'] as $key => $value) {
		
		if ($value['test_type']==34) {
			$results_ = $value;
		}

		}
		if (!empty($results_)) {
			$data['specs'] = $results_;
		}
		else{
			$data['specs'] = "No info";
		}
		// print_r($data['specs']);
		// die;
		// $this->load->view('header/header', $data);		
		$this->load->view('tests/dissolution/test_dissolution_delayed_release_view', $data);		
	}
	function index_titration_other(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type=6;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		// var_dump($results_e);
		// die;
    	$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();


		$this->load->view('tests/dissolution/dissolution_titration_other_view', $data);		
	}
	function index_titration_iodometric(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_titration_iodometric', $data);		
	}
	function index_delayed_release_second_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type = 6;
		$status_first_stage =1;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$data['query_e']=$this->db->get_where('equipment_maintenance', array('status' =>0))->result_array();

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    	$query_dissolution_det = $this->db->get_where('diss_enteric_coated_determinations', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$query_dissolution_sample = $this->db->get_where('diss_enteric_coated_samples', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_sample']= $query_dissolution_sample[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

    	$query_dissolution = $this->db->get_where('diss_delayed_release', array('status' => $status_first_stage))->result_array();
    	$data['sql_dissolution']= $query_dissolution[0];
		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_delayed_release_second_view', $data);		
	}
	function index_delayed_release_third_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type =6;
		$status_second_stage =2;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$data['query_e']=$this->db->get_where('equipment_maintenance', array('status' =>0))->result_array();

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    	
    	$query_dissolution = $this->db->get_where('diss_delayed_release', array('status' => $status_second_stage))->result_array();
    	$data['sql_dissolution']= $query_dissolution[0];

    	$query_dissolution_det = $this->db->get_where('diss_enteric_coated_determinations', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$query_dissolution_sample = $this->db->get_where('diss_enteric_coated_samples', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_sample']= $query_dissolution_sample[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_delayed_release_third_view', $data);		
	}
	function index_enteric_coated(){
		$results = $this->test_dissolution_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$data['component_names'] = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];
		
		foreach ($results['monograph_specs'] as $key => $value) {
		
		if ($value['test_type']==31) {
			$results_ = $value;
		}

		}
		if (!empty($results_)) {
			$data['specs'] = $results_;
		}
		else{
			$data['specs'] = "No info";
		}

		$this->load->view('tests/dissolution/test_dissolution_enteric_coated_view', $data);		
	}
	function index_enteric_coated_second_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0;$user_type =6;
		$status_first_stage = 1; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$query_dissolution = $this->db->get_where('diss_enteric_coated', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		// var_dump($query_dissolution);
		// die;
		$query_dissolution_det = $this->db->get_where('diss_enteric_coated_determinations', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$query_dissolution_sample = $this->db->get_where('diss_enteric_coated_samples', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_sample']= $query_dissolution_sample[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		$this->load->view('tests/dissolution/test_dissolution_enteric_coated_second_view', $data);		
	}
	function index_enteric_coated_third_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type=6;
		$status_second_stage = 2; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
    	$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$query_dissolution = $this->db->get_where('diss_enteric_coated', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		
		$query_dissolution_det = $this->db->get_where('diss_enteric_coated_determinations', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$query_dissolution_sample = $this->db->get_where('diss_enteric_coated_samples', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_sample']= $query_dissolution_sample[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		// var_dump($query_dissolution);
		// die;
		$this->load->view('tests/dissolution/test_dissolution_enteric_coated_third_view', $data);		
	}
	function index_normal(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $test_type='31';

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$results = $this->db->query($sql)->result_array();
		$data['results']=$results[0];
	    	    
	    $data['components']= $this->db->select('*')->get_where('components', array('test_request_id' => $test_request))->result_array();

	    $data['query_e']=$this->db->get_where('equipment_maintenance', array('status' =>0))->result_array();

	    $data['sql_columns']= $this->db->select('*')->get_where('columns', array('status' => $status))->result_array();
 
	    $data['sql_standards']=	$this->db->select('*')->get_where('standard_register', array('status' => $status))->result_array();
		
		$q = "select * from monograph_specifications where test_request_id = $test_request and test_type = '$test_type' ";
		$data['specs']=$this->db->query($q)->result_array();
		 
		$this->load->view('tests/dissolution/test_dissolution_hplc_normal_view', $data);		
	}
	function index_second_normal(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type=6;
		$status_first_stage =1;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
	    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
    	$query_dissolution = $this->db->get_where('diss_normal', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		
		$query_dissolution_det = $this->db->get_where('diss_normal_hplc_determinations', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		// print_r($data['sql_approved']);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_hplc_normal_second_view', $data);		
	}
	function index_third_normal(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0;$user_type=6;
		$status_second_stage=2; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
	    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();


	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$query_dissolution = $this->db->get_where('diss_normal', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		
		$query_dissolution_det = $this->db->get_where('diss_normal_hplc_determinations', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_det']= $query_dissolution_det[0];
		
		$data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_hplc_normal_third_view', $data);		
	}
	function index_two_components(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; $user_type=6;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
    	$data['sql_columns']=
	    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

		// var_dump($results_e);
		// die;

	    $data['sql_approved']=
    	$this->db->select('user.fname,user.lname,user.user_type')->get_where('user', array('user_type' => $user_type))->result_array();

		$this->load->view('tests/dissolution/test_dissolution_two_components_view', $data);		
	}
		function index_two_components_second_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status_first_stage=1; 
		$status=0; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
    	$data['sql_columns']=
	    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $query_dissolution = $this->db->get_where('diss_two_components', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		$query_dissolution_two = $this->db->get_where('diss_two_component_two', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_two']= $query_dissolution_two[0];
		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_two_components_second_view', $data);		
	}
	function index_two_components_third_stage(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status_second_stage=2; 
		$status=0; 

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
    	$data['sql_columns']=
	    $this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $query_dissolution = $this->db->get_where('diss_two_components', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution']= $query_dissolution[0];
		$query_dissolution_two = $this->db->get_where('diss_two_component_two', array('status' => $status_second_stage))->result_array();
		$data['sql_dissolution_two']= $query_dissolution_two[0];
		// var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_two_components_third_view', $data);		
	}

	function worksheet_uv_normal(){
	 // var_dump($this->input->post());		
		$this->load->model('test_dissolution_model');

		if ($this->input->post()) {
			$this->test_dissolution_model->save_worksheet_uv();
		}
	}
	function worksheet_second_stage(){
		$this->load->model('test_dissolution_model');

		if ($this->input->post('save_dissolution')) {
			$this->test_dissolution_model->save_second_worksheet();
		}
	}
	function worksheet_third_stage(){
		$this->load->model('test_dissolution_model');

		if ($this->input->post('save_dissolution')) {
			$this->test_dissolution_model->save_third_worksheet();
		}
	}
	function index_hplc(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$assignment = $this->uri->segment(3);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();
	    
	    $data['query_e']=$results_e;

		$this->load->view('tests/dissolution/test_dissolution_hplc_view', $data);
	}
	
	function worksheet_normal_hplc(){
	 // var_dump($this->input->post());
		$this->load->model('test_dissolution_normal_model');

		if ($this->input->post()) {
			$this->test_dissolution_normal_model->save_worksheet();
		}
	}
	function worksheet_normal_second_hplc(){			

		$this->load->model('test_dissolution_normal_model');

		if ($this->input->post()) {
			$this->test_dissolution_normal_model->save_second_worksheet();
		}
	}
	function worksheet_normal_third_hplc(){	

		$this->load->model('test_dissolution_normal_model');

		if ($this->input->post('save_normal_hplc')) {
			$this->test_dissolution_normal_model->save_third_worksheet();
		}
	}
	function worksheet_enteric_coated_hplc(){	
		var_dump($this->input->post());

		$this->load->model('test_dissolution_enteric_coated_model');

		if ($this->input->post()) {
			$this->test_dissolution_enteric_coated_model->save_worksheet();
		}
	}
	function worksheet_enteric_coated_hplc_second_stage(){	

		$this->load->model('test_dissolution_enteric_coated_model');

		if ($this->input->post('save_enteric_coated_hplc')) {
			$this->test_dissolution_enteric_coated_model->save_second_stage_worksheet();
		}
	}
	function worksheet_enteric_coated_hplc_third_stage(){	

		$this->load->model('test_dissolution_enteric_coated_model');

		if ($this->input->post('save_enteric_coated_hplc')) {
			$this->test_dissolution_enteric_coated_model->save_third_stage_worksheet();
		}
	}
	function worksheet_two_components_hplc(){	

		$this->load->model('test_dissolution_two_components_model');

		if ($this->input->post('save_two_components_hplc')) {
			$this->test_dissolution_two_components_model->save_worksheet();
		}
	}
	function worksheet_two_components_hplc_second_stage(){	

		$this->load->model('test_dissolution_two_components_model');

		if ($this->input->post('save_two_components_hplc')) {
			$this->test_dissolution_two_components_model->save_second_worksheet();
		}
	}
	function worksheet_two_components_hplc_third_stage(){	

		$this->load->model('test_dissolution_two_components_model');

		if ($this->input->post('save_two_components_hplc')) {
			$this->test_dissolution_two_components_model->save_third_worksheet();
		}
	}
	function worksheet_delayed_release_hplc(){	

		$this->load->model('test_dissolution_delayed_release_model');

		if ($this->input->post()) {
			$this->test_dissolution_delayed_release_model->save_worksheet();
		}
	}
	function worksheet_delayed_release_second_stage_hplc(){	

		$this->load->model('test_dissolution_delayed_release_model');

		if ($this->input->post('save_delayed_release_hplc')) {
			$this->test_dissolution_delayed_release_model->save_second_worksheet();
		}
	}
	function worksheet_delayed_release_third_stage_hplc(){	

		$this->load->model('test_dissolution_delayed_release_model');

		if ($this->input->post('save_delayed_release_hplc')) {
			$this->test_dissolution_delayed_release_model->save_third_worksheet();
		}
	}
	function monograph_uv(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$component_names= $this->db->select('*')->get_where('components', array('test_request_id' => $test_request))->result_array();
		foreach ($component_names as $key => $value) {
			$c_names[] = $value['component'];
		}

		$c_name = implode(', ', $c_names);
		$data['components']= $c_name;

		$data['results']=$result[0];
				
		$this->load->view('tests/dissolution/test_dissolution_monograph_uv_view',$data);
	}
	function monograph_normal_hplc(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

	    //$full_monograph= $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();

	    //$data['full_monograph'] = $full_monograph[0]['components'];

	    $component_names= $this->db->select('*')->get_where('components', array('test_request_id' => $test_request))->result_array();
		foreach ($component_names as $key => $value) {
			$c_names[] = $value['component'];
		}

		$c_name = implode(', ', $c_names);
		$data['components']= $c_name;
				
		$this->load->view('tests/dissolution/test_dissolution_monograph_normal_hplc_view',$data);
	}
	function monograph_enteric_coated(){
		$results = $this->test_dissolution_model->general();
		
		$data['results'] = $results['test_request'][0];
		$data['sql_standards'] = $results['standards'];
		$data['sql_reagents'] = $results['reagents'];
		$component_names = $results['component_names'];
		$data['component_category'] = $results['component_category'];
		$data['query_e'] = $results['equipment'];

		foreach ($component_names as $key => $value) {
			$c_names[] = $value['component'];
		}

		$c_name = implode(', ', $c_names);
		$data['components']= $c_name;
				
		$this->load->view('tests/dissolution/test_dissolution_monograph_enteric_coated_view',$data);
	}
	function monograph_two_components(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];
				
		$this->load->view('tests/dissolution/test_dissolution_monograph_two_components_view',$data);
	}
	function monograph_delayed_release(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];
				
		$this->load->view('tests/dissolution/test_dissolution_monograph_delayed_release_view',$data);
	}
	function monograph_hplc(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

				
		$this->load->view('tests/dissolution/test_dissolution_monograph_hplc_view',$data);
	}
	function save_delayed_release_monograph(){	

		$this->load->model('test_dissolution_delayed_release_model');

		if ($this->input->post('save_delayed_release')) {
			$this->test_dissolution_delayed_release_model->save_monograph();
		}
	}
	function save_enteric_coated_monograph(){	

		$this->load->model('test_dissolution_enteric_coated_model');

		if ($this->input->post('save_enteric_coated_monograph')) {
			$this->test_dissolution_enteric_coated_model->save_monograph();
		}
	}
	function save_normal_monograph(){	

		$this->load->model('test_dissolution_normal_model');

		if ($this->input->post('save_normal_monograph')) {
			$this->test_dissolution_normal_model->save_monograph();
		}
	}
	function save_two_components_monograph(){	

		$this->load->model('test_dissolution_two_components_model');

		if ($this->input->post('save_two_components_monograph')) {
			$this->test_dissolution_two_components_model->save_monograph();
		}
	}
	function save_uv_monograph(){	

		$this->load->model('test_dissolution_model');

		if ($this->input->post('save_uv_monograph')) {
			$this->test_dissolution_model->save_monograph();
		}
	}
	function view_worksheet_uv(){
		$data['assignment'] = $this->uri->segment(3);
		$assignment_id = $this->uri->segment(3);

		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('diss_data', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];
	    $result_monograph = $this->db->get_where('diss_uv_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];

	    $query_determination=$this->db->get_where('diss_uv_determinations', array('test_request' =>$test_request));
	    $results_determination=$query_determination->result_array();
	    $data['query_determination']=$results_determination[0];
	    $data['request']=
    	$this->db->select('assignment.id AS a,assignment.test_request_id,assignment.client_id,assignment.reference_number,assignment.assigner_name,assignment.analyst_name,assignment.sample_issued')->get_where('assignment', array('id' => $assignment_id))->result_array();


		//var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_view_worksheet_uv', $data);	
	}
	function view_worksheet_delayed_release(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('diss_delayed_release', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $query_determination=$this->db->get_where('diss_delayed_release_determinations', array('test_request' =>$test_request));
	    $results_determination=$query_determination->result_array();
	    $data['query_determination']=$results_determination[0];

	    $result_monograph = $this->db->get_where('diss_delayed_release_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_view_worksheet_delayed_release', $data);	
	}
	function view_worksheet_enteric_coated(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);
		$status_first_stage = 1;

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('diss_enteric_coated', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $query_determination=$this->db->get_where('diss_enteric_coated_determinations', array('test_request' =>$test_request));
	    $results_determination=$query_determination->result_array();
	    $data['query_determination']=$results_determination[0];

	    $query_dissolution_sample = $this->db->get_where('diss_enteric_coated_samples', array('status' => $status_first_stage))->result_array();
		$data['sql_dissolution_sample']= $query_dissolution_sample[0];
		

	    $result_monograph = $this->db->get_where('diss_enteric_coated_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_view_worksheet_enteric_coated', $data);	
	}
	function view_worksheet_normal(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('diss_normal', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $query_determination=$this->db->get_where('diss_normal_hplc_determinations', array('test_request' =>$test_request));
	    $results_determination=$query_determination->result_array();
	    $data['query_determination']=$results_determination[0];

	    $result_monograph = $this->db->get_where('diss_normal_hplc_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_view_worksheet_normal', $data);	
	}
	function view_worksheet_two_component(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('diss_two_components', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $query_two=$this->db->get_where('diss_two_component_two', array('test_request' =>$test_request));
	    $results_two=$query_two->result_array();
	    $data['query_etwo']=$results_two[0];

	    $query_determination=$this->db->get_where('diss_two_component_determinations', array('test_request' =>$test_request));
	    $results_determination=$query_determination->result_array();
	    $data['query_determination']=$results_determination[0];

	    $result_monograph = $this->db->get_where('diss_two_component_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		// var_dump($results_determination);
		// die;

		$this->load->view('tests/dissolution/test_dissolution_view_worksheet_two_component', $data);	
	}
}
?>
