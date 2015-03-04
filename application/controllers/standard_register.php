<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standard_Register extends CI_Controller {
function __construct()
 {
   parent::__construct();
 }
function index(){
	$this->load->helper(array('form'));
	$this->load->view('standard_register_form');
        }

function save(){
	$this->load->model('standard_register_model');        
	
	if($this->input->post('submit')){
		$this->standard_register_model->process();
	
	}
	redirect('standard_register_records/Get');
	}	
function save_secondary(){
$this->load->model('standard_register_model');        

if($this->input->post('submit')){
	$this->standard_register_model->process_secondary();

}
redirect('standard_register_records/Get');
}	
}
?>