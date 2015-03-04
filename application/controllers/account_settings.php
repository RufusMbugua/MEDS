<?php
class Account_Settings extends CI_Controller {

public function Account_Settings(){
        parent::__construct();
    }
function index(){
    $id = $this->uri->segment(3);
    $usertype_id = $this->uri->segment(4);
    $user_id = $this->uri->segment(5);
    
    $query=$this->db->get_where('user', array('id'=>$user_id));
    $results=$query->result_array();
    $data['query']=$results[0];

    $this->load->view('account_settings_form',$data);
   
}
function Update(){
    $id = $this->uri->segment(3);
    $usertype_id = $this->uri->segment(4);
    $user_id = $this->uri->segment(5);
        
    $query = $this->db->get_where('client', array('id' => $uid));
    $results=$query->result_array();
    
    $data['query']=$results[0];
   
    $this->load->view('update_client_view',$data);
    
}
function Submit()
{
    $id = $this->input->post('my_id');
    $this->load->model('account_settingsmodel');        
	
	if($this->input->post('submit')){
		$this->account_settingsmodel->Update($id);                
	}
}
}

?>