<?php
Class New_Usermodel extends CI_Model{
 function __construct()
 {
  parent::__construct();
 }
 function process(){
   $role="";
   $department_id="";
   
   $user_type = $this->input->post('user_type');
   $additional_role = $this->input->post('additional_role');

    if($user_type==3){
    $role='MEDS Client';
    }if($user_type==5 ){
    $role='Laboratory Analyst';
    $department_id=2;
    }if($user_type==5){
    $role='Laboratory Analyst';
    $department_id=3;
    }if($user_type==5){
    $role='Laboratory Analyst';
    $department_id=4;
    }if($user_type==6){
    $role='Laboratory Supervisor';
    $department_id=0;
    }if($user_type==7){
    $role='Laboratory Assistant ';
    $department_id=1;
    }if($user_type==8){
    $role='Quality Assurance Manager';
    }
  
 //Data Insertion
  $data = array(
   
   'fname'=>$this->input->post('fname'),
   'lname'=>$this->input->post('lname'),
   'username'=>$this->input->post('uname'),
   'email'=>$this->input->post('email'),
   'telephone'=>$this->input->post('telephone'),
   'user_type'=>$this->input->post('user_type'),
   'role'=>$role,
   'department_id'=>$department_id

   );
 
    
  $this->db->insert('user',$data);
 }
}
?>
