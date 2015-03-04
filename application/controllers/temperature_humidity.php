<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temperature_Humidity extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
 function index()
 {
  $status=0;
  $data['sql_equipment']=
  $this->db->select('*')->get_where('equipment_maintenance', array('status' => $status))->result_array();

  $this->load->view('humidtemp_form',$data);
 }
 function submit(){
  $this->load->model('temperature_humidity_model');

  if ($this->input->post('save_humidtemp')) {	  
   $this->temperature_humidity_model->process();
  }
 }
}
