<?php
class Withdraw_Model extends CI_Model{

	function Withdraw_Model(){
		parent::__construct();
	}

	function process($request_id,$assignment_id,$department_id){
		//The varibles from the view
		$request_status = 5;

		$data =array(
			'request_status'=>$request_status
		);
		
		$this->db->update('test_request',$data, array('id'=>$request_id));
		redirect('test_request_list/GetQ/'.$assignment_id.'/'.$department_id);

	}

}

?>