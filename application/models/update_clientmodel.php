<?php
class Update_Clientmodel extends CI_Model {
// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


function Update($id){
    $new_data = array(
        
        'email'=>$this->input->post('email'),
        'telephone'=>$this->input->post('telephone'),
        'location'=>$this->input->post('location'),
        'status'=>$this->input->post('status'),
        'client_reference_number'=>$this->input->post('client_reference_number')
        
    );
    $this->db->update('client', $new_data,array('id' => $id));
    
    redirect('client_list/Get');
    }
}
?>