<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller{

function __construct(){

   parent::__construct();
}

function Withdraw_record(){
    
    $test_request_id=$this->uri->segment(3);
    $assignment_id= $this->uri->segment(4);
    $department_id=$this->uri->segment(5);

    $sql=$this->db->select('*')->get_where('test_request', array('id' => $test_request_id))->result();
    $request_id=$sql[0]->id;
     // var_dump($request_id);
     // die;

    $this->load->model('withdraw_model');        

    $this->withdraw_model->process($request_id,$assignment_id,$department_id);                
    }	
}
?>