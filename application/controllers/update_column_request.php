<?php
class Update_Column_Request extends CI_Controller {

public function Update_Column_Request()
{
        parent::__construct();

}

function Update() 
{
    $id = $this->uri->segment(3);
    $data=array();
    $this->load->database();
    $query = $this->db->get_where('columns', array('id' => $id));
    $results=$query->result_array();
    /*
    echo "<pre>";
    print_r($results[0]);
    echo "</pre>";
    die();
    */
    $data['query']=$results[0];
   
    $this->load->view('update_column_request_form',$data);
    
}
function Submit()
{
    /*
    echo $id;
     die();
    */
    $this->load->model('update_column_model');        
	
	if($this->input->post('submit')){
		$this->update_column_model->Update();                
	}
	//redirect('home');
}
}

?>