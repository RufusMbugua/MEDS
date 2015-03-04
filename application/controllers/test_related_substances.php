<?php
class Test_Related_Substances extends CI_Controller{

	public function Test_Related_Substances(){
		parent::__construct();
	}
	function index(){	
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0;
		$test_type='5';

		$query=$this->db->get_where('test_request', array('id' =>$test_request));
	    $results=$query->result_array();	    
	    $data['results']=$results[0];

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_columns']=
   		$this->db->select('columns.column_type,columns.serial_number,columns.column_dimensions,columns.manufacturer,columns.column_number')->get_where('columns', array('status' => $status))->result_array();

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number, standard_register.potency, standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();

    	$q = "select * from monograph_specifications where test_request_id = $test_request and test_type = '$test_type' ";
		$data['specs']=$this->db->query($q)->result_array();
		
		$this->load->view('tests/related_substances/test_related_substances_view', $data);
	}
	function worksheet(){			
		$this->load->model('test_related_substances_model');
		if ($this->input->post('save_related_substances')) {
			$this->test_related_substances_model->save_worksheet();
		}
	}
	function index_manufacture_linear(){			
		$this->load->view('tests/related_substances/test_manufacturer_specification');
	}
	function index_manufacture_precision(){			
		$this->load->view('tests/related_substances/test_manufacturer_specification_precision');
	}
	function monograph(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];
				
		$this->load->view('tests/related_substances/test_related_substances_monograph_view',$data);
	}	
	function save_monograph(){	

		$this->load->model('test_related_substances_model');

		if ($this->input->post('save_related_substances')) {
			$this->test_related_substances_model->save_monograph();
		}
	}
	function view_worksheet_related_substances(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request =$this->uri->segment(4);

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];

		$query_e=$this->db->get_where('related_substances', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('related_substances_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/related_substances/test_related_substances_view_worksheet', $data);	
	}
}
?>