<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outoftolerance extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
 //Display the form to add out of tolerance details
 function index(){
  $id= $this->uri->segment(3);
  $data['query']= $this->db->get_where('equipment_maintenance', array('id'=>$id))->result();  
  
  $this->load->view('outoftolerance_form',$data);
 }

 // function records(){  
 //  $data['query']= $this->db->get_where('outoftolerance', array('status'=>0))->result();
 //  // echo "<pre>"; print_r($data['query']);die;

 //  $this->load->view('outoftolerance_listform', $data);
 // }

 //this functions loads the data queried from the model and saves it in the db, get the info from the form and push it to the 'process, function in model
 function submit(){
 	die;
 
 $this->load->model('outoftolerance_model');

  if ($this->input->post('save_outoftolerance')) {	 
   $this->outoftolerance_model->process();
  }
 }
 
 function oot_list(){
 $data['query'] = $this->db->select('*')->get('outoftolerance')->result_array();

  $this->load->view('outoftolerance_listform', $data);
 }

 function details(){
  $data['id'] = $this->uri->segment(3);
  $data['equipment_id'] = $this->uri->segment(4);
   
  $data['sql'] = $this->db->get_where('equipment_maintenance', array('id' => $data['id']))->result_array();
  $results= $this->db->get_where('outoftolerance', array('out_id' => $data['id']))->result_array();  
 // echo "<pre>"; print_r($results);die;
  
  $data['query']=$results[0];
 
  $this->load->view('outoftolerance_detailsform',$data);
 
  }
  function edit(){
  $data['id'] = $this->uri->segment(3);
   
  $data['sql'] =
  $this->db->get_where('equipment_maintenance', array('out_id' => $data['id']))->result_array();
  $results=$this->db->get_where('outoftolerance', array('out_id' => $data['id']))->result_array();
  
  $data['query']=$results[0];
  $this->load->view('outoftolerance_editform',$data);
 
  }  

  function update(){
   $out_id = $this->input->post('out_id');
   $this->load->model('outoftolerance_model');        
       
   if($this->input->post('update_outoftolerance')){

   $this->outoftolerance_model->details($out_id);  
   }

}
   function logs(){
    $id = $this->uri->segment(3);
    
    $data['query'] = $this->db->get_where('outoftolerance_log', array('out_id' => $id))->result_array(); 

    $this->load->view('outoftolerance_logform',$data);
}
}
