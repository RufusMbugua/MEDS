<?php
class Update_Request_Record extends CI_Controller {

public function Update_Request_Record()
{
        parent::__construct();

}

function Update() 
{
    $id = $this->uri->segment(3);
    $data=array();
    $this->load->database();
    $query = $this->db->get_where('test_request', array('id' => $id));
    $results=$query->result_array();
    
    $result=$this->db->select('test_request.tests')->get_where('test_request', array('id' => $id))->result_array();
    $return= explode( ",", $result[0]['tests'] );
    $data['test']=$return;

    $data['query']=$results[0];
    

    $this->load->view('update_request_view',$data);
    
}
function update_request()
{
    $trid = $this->uri->segment(3);
    $this->load->model('update_requestmodel');        
	
	if($this->input->post('submit')){
		$this->update_requestmodel->update_data($trid);                
	}
}
}

?>