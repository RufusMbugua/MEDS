<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outoftolerance_Details extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('outoftolerance_detailsmodel','',TRUE);
 }
  /*function index(){
  //$id = $this->uri->segment(3);
  $sql="SELECT * FROM equipment_maintenance,outoftolerance WHERE 'equipment_maintenance.id'='outoftolerance.equipment_maintenance_id'";    
  $query=$this->db->query($sql);
  $results=$query->result_array();
  //$this->load->model('outoftolerance_detailsmodel');
 //$data['query'] = $this->outoftolerance_detailsmodel->getdetails($id);
  $data['query'] =$results;
  var_dump($data);
  die;
  $this->load->view('outoftolerance_detailsform',$data);
  }*/

  function Get(){
  $data['id'] = $this->uri->segment(3);
   
  $data['sql'] =
  $this->db->get_where('equipment_maintenance', array('out_id' => $data['id']))->result_array();
  $query=$this->db->get_where('outoftolerance', array('out_id' => $data['id']));
  $results=$query->result_array();
  
  $data['query']=$results[0];
      $this->load->view('outoftolerance_editform',$data);
 
  }
  

  function Update(){
   $out_id = $this->input->post('out_id');
   $this->load->model('outoftolerance_detailsmodel');        
       
   if($this->input->post('update_outoftolerance')){

   $this->outoftolerance_detailsmodel->details($out_id);  
   }
}

}

?>
