<?php
class Test_Water extends CI_Controller{

	public function Test_Water(){
		parent::__construct();
	}
	function index(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status =0;
		$test_type='50';
			
		$data['component_category'] = $this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;		

	    $query=$this->db->get_where('test_request', array('id' =>$test_request));
	    $results=$query->result_array();	    
	    $data['results']=$results[0];

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

		$data['specs'] = $this->db->select('*')->get_where('monograph_specifications', array('test_request_id' => $test_request,'test_type' => $test_type))->result_array();

		
		$this->load->view('tests/water_method/test_water_method', $data);
	}
	function index_manufacture_linear(){			
		$this->load->view('tests/water_method/test_manufacturer_specification');
	}
	function index_manufacture_precision(){			
		$this->load->view('tests/water_method/test_manufacturer_specification_precision');
	}	
	function worksheet(){
	$this->load->model('test_water_method_model');			
	if ($this->input->post('save_water_method')) {
		$this->test_water_method_model->save_worksheet();
		
		}				
	}	
	function monograph(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$data['full_monograph']=	
		$this->db->select('*')->get_where('full_monograph', array('test_request_id' => $test_request))->result_array();

		$this->load->view('tests/water_method/test_water_method_monograph_view',$data);
	}
	function save_monograph(){	

		$this->load->model('test_water_method_model');

		if ($this->input->post('save_water_method_monograph')) {
			$this->test_water_method_model->save_monograph();
		}
	}
	function view_worksheet(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('water_method', array('test_request_id' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('water_method_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/water_method/test_water_method_view_worksheet', $data);	
	}
}
?>