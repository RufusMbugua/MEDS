<?php
class Test_Loss_Drying extends CI_Controller{
	
	function Test_Loss_Drying(){
		parent::__construct();
	}

	function index(){
		$data['assignment'] = $this->uri->segment(3);
		$data['test_request'] = $this->uri->segment(4);
		$test_request = $this->uri->segment(4);
		$status=0; 
		$test_type='14';

		$sql = "SELECT * FROM test_request WHERE id =$test_request";
		$query = $this->db->query($sql);
		$result =$query->result_array();

		$data['results']=$result[0];		

		$query_e=$this->db->get_where('equipment_maintenance', array('status' =>0));
	    $results_e=$query_e->result_array();	    
	    $data['query_e']=$results_e;

	    $data['sql_standards']=
    	$this->db->select('standard_register.reference_number,standard_register.potency,standard_register.item_description,standard_register.batch_number,standard_register.manufacturer_supplier,standard_register.status')->get_where('standard_register', array('status' => $status))->result_array();
		
		$q = "select * from monograph_specifications where test_request_id = $test_request and test_type = '$test_type' ";
		$data['specs']=$this->db->query($q)->result_array();
		
		$this->load->view('tests/loss_drying/test_loss_drying_view', $data);		
	}
	function worksheet(){	

		$this->load->model('test_loss_drying_model');

		if ($this->input->post('save_loss_dying_hplc')) {
			$this->test_loss_drying_model->save_worksheet();
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
				
		$this->load->view('tests/loss_drying/test_loss_drying_monograph_view',$data);
	}
	function save_monograph(){	

		$this->load->model('test_loss_drying_model');

		if ($this->input->post('save_loss_dying_monograph')) {
			$this->test_loss_drying_model->save_monograph();
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

		$query_e=$this->db->get_where('loss_drying', array('test_request' =>$test_request));
	    $results_e=$query_e->result_array();
	    $data['query_e']=$results_e[0];

	    $result_monograph = $this->db->get_where('loss_drying_monograph', array('test_request_id' => $test_request))->result_array();
	    $data['query_monograph'] = $result_monograph[0];
		//var_dump($results_e);
		// die;

		$this->load->view('tests/loss_drying/test_loss_drying_view_worksheet', $data);	
	}
}
?>
