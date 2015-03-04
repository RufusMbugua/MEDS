<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index(){
  
   if($this->session->userdata('logged_in')){
     $user=$this->session->userdata;
     $user_id=$user['logged_in']['id'];
     $user_type_id=$user['logged_in']['user_type'];
     $department_id=$user['logged_in']['department_id'];
     $username=$user['logged_in']['username'];
     
     
     $this->load->model('test_requestlistmodel');
    if($user_type_id==5){
        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_get_assigned($user_type_id,$department_id,$user_id);
        $this->load->view('test_request_list',$data);  
    }elseif($user_type_id==6||$user_type_id==7){
        $data['query'] = 
        $this->test_requestlistmodel->test_request_list_get_unassigned($user_type_id,$department_id,$user_id);
        $this->load->view('test_request_list',$data);
    }
      
   }
   else
   {
     //If no session, redirect to login page
     redirect('login');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home');
 }

}

?>
