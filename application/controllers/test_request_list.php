<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_Request_List extends CI_Controller {
    
function Test_Request_List()
 {
   parent::__construct();
 }
 function Get(){
    
    $this->load->model('test_requestlistmodel');
    
    $data['query'] = 
        $this->test_requestlistmodel->test_request_list_get_unassigned();
    
        $this->load->view('unassigned_test_request_list',$data);
    
}	
function GetA(){
       

        $this->load->model('test_requestlistmodel');
        // $data['assignment']=$this->db->select('assignment.status')->get_where('assignment', array('assignment.test_request' => $trid))->result_array();
        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_get();
        $this->load->view('assigned_test_requests',$data);
    
}
function GetC(){
       

        $this->load->model('test_requestlistmodel');

        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_getc();
        $this->load->view('completed_test_requests',$data);
    
}
function GetQ(){
       

        $this->load->model('test_requestlistmodel');

        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_getq();
        $this->load->view('quarantined_test_requests',$data);
    
}
function GetW(){
       

        $this->load->model('test_requestlistmodel');

        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_getw();
        $this->load->view('withdrawn_test_requests',$data);
    
}

}
?>