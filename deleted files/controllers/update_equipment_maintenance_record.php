<?php
class Update_Equipment_Maintenance_Record extends CI_Controller {

public function Update_Equipment_Maintenance_Record()
{
        parent::__construct();

}

function Update() 
{
    $id = $this->uri->segment(3);
    $data=array();
    $this->load->database();
    $query = $this->db->get_where('equipment_maintenance', array('id' => $id));
    $results=$query->result_array();
    /*
    echo "<pre>";
    print_r($results[0]);
    echo "</pre>";
    die();
    */
    $data['query']=$results[0];
   
    $this->load->view('update_equipment_maintenance_view',$data);
    
}
function Submit()
{
    $id = $this->input->post('my_id');
    /*
    echo $id;
     die();
    */
    $this->load->model('update_equipment_maintenance_recordmodel');        
	
	if($this->input->post('submit')){
		$this->update_equipment_maintenance_recordmodel->Update($id);                
	}
	//redirect('home');
}
}

?>