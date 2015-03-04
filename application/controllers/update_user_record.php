<?php
class Update_User_Record extends CI_Controller {

function Update_User_Record()
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
    $data['query']=$results[0];
   
    $this->load->view('update_user_view',$data);
    
}
function Submit(){
    $id = $this->input->post('my_id');
    $this->load->model('update_usermodel');        
	
	if($this->input->post('submit')){
		$this->update_usermodel->Update($id);                
	}
}
}

?>