<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Accounts extends CI_Controller {
    
  function User_Accounts(){
     parent::__construct();
   }
   	
  
  function Get(){
      $this->load->model('useraccount_listmodel');
      
      $data['query'] = 
	  $this->useraccount_listmodel->accounts_list_get();
	  
	  $this->load->view('user_account_list',$data);
      
  }
  function logs(){
      $id = $this->uri->segment(3);
      $this->load->model('user_log_model');
      
      $data['query'] = 
	  $this->user_log_model->user_log_list_get($id);
  }
}
?>