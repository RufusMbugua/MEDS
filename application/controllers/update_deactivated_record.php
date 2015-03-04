<?php
class Update_Deactivated_Record extends CI_Controller {

public function Update_Deactivated_Record()
{
        parent::__construct();

}

function Update() 
{
    $id = $this->uri->segment(3);
    $data=array();
    $this->load->database();
    $query = $this->db->get_where('user', array('id' => $id));
    $results=$query->result_array();
    /*
    echo "<pre>";
    print_r($results[0]);
    echo "</pre>";
    die();
    */
    $data['query']=$results[0];
   
    $this->load->view('update_deactivated_user_view',$data);
    
}
function Submit()
{
    $id = $this->input->post('my_id');
     /* 
    echo $id;
     die();
    */
    $this->load->model('update_deactivated_usermodel');        
	
	if($this->input->post('submit')){
		$this->update_deactivated_usermodel->Update($id);                
	}
	//redirect('home');
}
}

?>