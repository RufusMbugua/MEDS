<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_Details extends CI_Controller {
    
function client_details()
 {
   parent::__construct();
 }	

function records(){
	$client_id = $this->uri->segment(3);
    $client_ref = $this->uri->segment(4);
    
    
    $data['invoice']=
    $this->db->select('*')->get_where('invoice',array('customer_reference' => $client_ref))->result_array();

    $data['query'] = 
    $this->db->select('*')->get_where('test_request',array('applicant_ref_number' => $client_ref))->result_array();
  
    $this->load->view('client_account_details',$data);
    
}
function invoices(){
	$client_id = $this->uri->segment(3);
    $client_ref = $this->uri->segment(4);
    
    $this->load->model('client_listmodel');

    $data['invoice']=$this->db->select('*')->get_where('invoice',array('customer_reference' => $client_ref))->result_array();

    $data['query'] =
    	$this->client_listmodel->client_invoices_get($client_ref);

        $this->load->view('client_account_invoices',$data);
    
}

}
?>