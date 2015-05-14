<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Profile extends CI_Controller {
function __construct()
 {
   parent::__construct();
 }
function Get(){
	$id=1;

	$data['query']=
    $this->db->select('*')->get_where('company_profile', array('id' => $id))->result_array();

	$this->load->view('company_profile_form',$data);
    $this->load->helper(array('form'));
	}

function Save(){
	$this->load->model('company_profilemodel');

	if($this->input->post('submit')){
	$this->company_profilemodel->save();
	}
	redirect('home');
	}
}

