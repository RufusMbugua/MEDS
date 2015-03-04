<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment extends CI_Controller {
function __construct()
 {
   parent::__construct();
 }
function index(){
    $id= $this->uri->segment(3);
    $type_id= 5;

    $data['request']=
    $this->db->select('test_request.id AS tid,test_request.client_id,test_request.request_type,test_request.quantity_remaining,test_request.quantity_submitted,test_request.quantity_type,test_request.pack_size')->get_where('test_request', array('id' => $id))->result_array();
    $query=$this->db->get_where('user', array('user_type' => $type_id));
    $results=$query->result_array();
    
    $data['query']=$results;
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $id))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['tests']=$return;
    
    $this->load->view('assignment_form',$data);
    $this->load->helper(array('form'));
}

function save(){
    $tr_id=$this->uri->segment(3);
    
    $this->load->model('assignment_model');        
	
    if($this->input->post('submit')){
        $this->assignment_model->process($tr_id);                
    }
    redirect('test_request_list/GetA');
}
function Get(){
    $this->load->model('new_assignmentmodel');
    
    $data['query'] = 
        $this->new_assignmentmodel->assignment_list_getall();
	
        $this->load->view('assignment_list',$data);
}
}
?>