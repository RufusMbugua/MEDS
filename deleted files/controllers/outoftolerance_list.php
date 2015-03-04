<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outoftolerance_List extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }
 function index(){
  $this->load->view('outoftolerance_listform');
 }
 

 function addressed(){
  $this->load->model('outoftolerance_listmodel');
  $data['query']= $this->outoftolerance_listmodel->get_addressed_list();
  $this->load->view('outoftolerance_listform', $data);
 }


}
?>