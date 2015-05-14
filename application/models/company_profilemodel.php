<?php
class Company_Profilemodel extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}


function save(){
	$id=$this->input->post('id');
	$address=$this->input->post('address');
	$phone=$this->input->post('phone');
	$region=$this->input->post('region');
	$wireless=$this->input->post('wireless');
	$website=$this->input->post('website');
	$email=$this->input->post('email');


	$data= array(
		'id'=>$id,
		'address'=>$this->input->post('address'),
		'phone'=>$this->input->post('phone'),
		'region'=>$this->input->post('region'),
		'wireless'=>$this->input->post('wireless'),
		'website'=>$this->input->post('website'),
		'email'=>$this->input->post('email')
		);

	$this->db->update('company_profile',$data, array('id' => $id));
 	}
	}
?>