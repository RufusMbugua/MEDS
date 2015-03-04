<?php
class Coa_List extends CI_Controller{
	public function Coa_List(){
		parent::__construct();
	}

	function index(){
		$this->load->view('coa_view_list');
	}
	function records(){
		$this->load->model('coa_model_list');
    
		$data['query'] = $this->coa_model_list->records_list();
		$query = $this->db->select('*')->get('coa')->result_array();
		$return= array();
		    foreach ($query as $key => $value) {
		          $return[]=$value['approve_status'];
		    }

		 $data['return']= $return;
		
		$this->load->view('coa_view_list', $data);
	}
}
?>