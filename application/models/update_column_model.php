<?php
class Update_Column_Model extends CI_Model {
// model constructor function
function __construct() {
    parent::__construct(); // call parent constructor
    $this->load->database();
}


function Update()
{
    $id = $this->input->post('my_id');

    $new_data = array(
        
    'column_type'=>$this->input->post('column_type'),
    'serial_number'=>$this->input->post('serial_number'),
    'column_dimensions'=>$this->input->post('column_dimensions'),
    'manufacturer'=>$this->input->post('manufacturer'),
    'column_status'=>$this->input->post('column_status'),
    'column_number'=>$this->input->post('column_number'),
    'reserved_for'=>$this->input->post('reserved_for'),
    'issued_to'=>$this->input->post('issued_to'),
    'comment'=>$this->input->post('comment')
    
    
    );
    $this->db->update('columns', $new_data,array('id' => $id));
    
    redirect('columns/Get');
}
}
?>