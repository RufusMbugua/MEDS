<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temperature_Humidity_List extends CI_Controller {

   function __construct()
   {
     parent::__construct();
   }

   function records(){
    $id = $this->uri->segment(3);
    
    if($id==1){
    $this->load->model('temperature_humidity_listmodel');
    $data['query']= $this->temperature_humidity_listmodel->get_freezer_records();
    $this->load->view('freezer_temp_list', $data); 
    }
    elseif($id==2){
    $this->load->model('temperature_humidity_listmodel');        
    $data['query']= $this->temperature_humidity_listmodel->get_sample_store_records();
    $this->load->view('sample_store_list', $data); 
    }
    elseif($id==3){
    $this->load->model('temperature_humidity_listmodel');        
    $data['query']= $this->temperature_humidity_listmodel->get_laboratory_area_records();
    $this->load->view('laboratory_area_list', $data);  
    }
    elseif($id==4){
    $this->load->model('temperature_humidity_listmodel');        
    $data['query']= $this->temperature_humidity_listmodel->get_instrument_room_records();
    $this->load->view('instrument_room_list', $data); 
    }
    elseif($id==5){
    $this->load->model('temperature_humidity_listmodel');        
    $data['query']= $this->temperature_humidity_listmodel->get_refrigerator_records();
    $this->load->view('refrigerator_listform', $data); 
    }else{
        
    }
    
   }
   
   function records_humidity(){
    $id = $this->uri->segment(3);
    if($id==2){
    $this->load->model('humidity_listmodel');
    $data['query']= $this->humidity_listmodel->get_sample_store_humidity_record_list();
    $this->load->view('sample_store_humidity_list', $data); 
    }
    elseif($id==4){
    $this->load->model('humidity_listmodel');
    $data['query']= $this->humidity_listmodel->get_instrument_room_record_list();
    $this->load->view('instrument_room_humidity_list', $data); 
    }
   }
}
?>