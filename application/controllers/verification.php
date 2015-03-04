<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verification extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE){
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
   }
 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $user_type = $this->input->post('level');
   

   //query the database
   $result = $this->user->login($username,$password,$user_type);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'fname'=> $row->fname,
         'lname'=> $row->lname,
         'user_type'=> $row->user_type,
         'department_id'=> $row->department_id,
         'role'=> $row->role,
         'acc_status'=> $row->acc_status
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     //return TRUE;
    if($user_type==0){
     //Go to private area
     redirect('home', 'refresh');
    }
    else if($user_type!=1 && $user_type==8){
     //Go to private area
     redirect('home', 'refresh');
    }
    else if($user_type!=1 && $user_type==6){
      //Go to private area
      redirect('home', 'refresh');
    }
    else if($user_type!=1 && $user_type==5){
     //Go to private area
     redirect('home', 'refresh');
    }
    else if($user_type!=1 && $user_type==7){
     //Go to private area
     redirect('home', 'refresh');
    }
    else if($user_type==1){
     //Go to private area
     redirect('user_accounts/Get', 'refresh');
    }
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Error! That User Does not Exist');
     return false;
   }
 }
}
?>