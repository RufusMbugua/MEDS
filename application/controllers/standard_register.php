<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standard_Register extends CI_Controller {
function __construct()
 {
   parent::__construct();
 }
//Function for Loading standard Register Form 
function index(){
	$this->load->helper(array('form'));
	$this->load->view('standard_register_form');
        }

//Function for adding Standard Register Data
function save(){
	$this->load->model('standard_register_model');        
	 
	//Condition for checking whether the post function was successful 
	if($this->input->post('submit')){

		$this->standard_register_model->process();
	
	}
	redirect('standard_register_records/Get');
}
	
}
?>