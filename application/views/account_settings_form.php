<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>

  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
   });
  </script>
 </head>
 <body>
  <?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=1;
   //var_dump($user);
  ?>
  <div id="header"> 
   <div id="logo" style="padding:8px;color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="35px" width="40px"/>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</div>
  </div>
  <div id="log_bar" class="subdivider">
  <table  border="0" cellpadding="2px" align="center" width="100%">
      <tr>
        
        <td style="border-bottom: solid 1px #c4c4ff;padding:4px;text-align: center;background-color: #ffffff;" width="20px">
           <img src="<?php echo base_url().'images/icons/user_blue.png';?>" height="25px" width="24px">
        </td>
       <td style="border-bottom: solid 1px #c4c4ff;padding:2px;text-align: left;background-color: #ffffff;" width="130px">
          <?php 
           echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);
         ?> 
       </td>
         <td height="10px"  style="border-bottom: solid 1px #c4c4ff;padding:8px;background-color: #ffffff;">
          
        </td>
        <td style="border-bottom: solid 1px #c4c4ff;padding:4px;background-color: #ffffff;" width="200px"></td>
         <td style="background-color:#ffffff;border-bottom: solid 1px #c4c4ff;padding:2px;" >
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> 
              <?php 
               echo($user['logged_in']['role']);
              ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url().'account_settings/index/'.$user_type_id.'/'.$user_id.'/'.$department_id;?>"><i class="icon-wrench"></i> Settings <img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"></a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url().'home/logout'?>"><i class="icon-share"></i>Logout</b> <img src="<?php echo base_url().'images/icons/door.png';?>" height="25px" width="25px"></a></li>
            </ul>
          </div>
        </td>
      </tr>
  </table> 
  </div>
  
   <?php 
    echo "<div id='system_nav'";
      if($user['logged_in']['user_type'] !=6 && $user['logged_in']['user_type'] !=8){
       echo"style='display:none'";
      }
      else{
       echo "style='display:block;'>";
      }
     ?>
     <a href="<?php echo base_url().'user_accounts/Get';?>" class="system_nav system_nav_link ">User Accounts</a>
     <a href="<?php echo base_url().'client_list/Get';?>" class="system_nav system_nav_link">Client List</a>
    </div>
    
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        &nbsp;&nbsp;<a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"class="sub_menu sub_menu_link first_link"><b>Analysis Test Request</b></a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link"><b>Equipment & Maintenance</b></a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link"><b>Reagents & Inventory</b></a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link"><b>Reference Standard Register</b></a>
        <a href="<?php echo base_url().'temperature_humidity/records';?>"class="sub_menu sub_menu_link first_link"><b>Temperature & Humidity</b></a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Out of Tolerance</b></a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Complaints</b></a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==7 && $user['logged_in']['department_id'] ==1){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        &nbsp;&nbsp;<a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"class="sub_menu sub_menu_link first_link"><b>Analysis Test Request</b></a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==8){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        &nbsp;&nbsp;<a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"class="sub_menu sub_menu_link first_link"><b>Analysis Test Request</b></a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link"><b>Equipment & Maintenance</b></a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link"><b>Reagents & Inventory</b></a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link"><b>Reference Standard Register</b></a>
        <a href="<?php echo base_url().'temperature_humidity/records';?>"class="sub_menu sub_menu_link first_link"><b>Temperature & Humidity</b></a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Out of Tolerance</b></a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Complaints</b></a>rst_link"><b>Complaints</b></a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==3){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        &nbsp;&nbsp;<a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"class="sub_menu sub_menu_link first_link"><b>Analysis Test Request</b></a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link"><b>Reagents & Inventory</b></a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        &nbsp;&nbsp;<a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"class="sub_menu sub_menu_link first_link"><b>Analysis Test Request</b></a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link"><b>Equipment & Maintenance</b></a>
    </div>
  <div id="form_wrapper_lists">
<div id="analysis_request" class="analysis_request" >
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url().'account_settings/Submit/'?>" method="POST" >
    <table class="table_form" bgcolor="#f0f0ff" width="100%" height="250px" border="0" cellpadding="4px" align="center">
            <input type="hidden" name="my_id" value="<?php echo $query['id']; ?>"/>
            <tr>
                <td colspan="6" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'test_request_list/GetA/'.$user_type_id;?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" width="20px">Back</a></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="padding:8px;border-bottom: solid 10px #00ffff;color: #0000ff;background-color:#ffffff ;">
                    <b><h3>UPDATING ACCOUNT Details</h3></b>
                </td>
            </tr>
            <tr>
                <td style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Account Status</b></td>
                <td style="text-align: right;background-color:#ffffff;border-right: solid 1px #bfbfbf;color: #0000ff;"><?php if($query['acc_status']==1){echo "Active";}?></td>
            </tr>
            <tr>
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Role</b></td>
               <td style="text-align: right;background-color:#ffffff;border-right: solid 1px #bfbfbf;"><?php echo $query['role'];?></td>
            </tr>
            <tr>
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>First Name</b></td>
               <td style="background-color:#ddffff;"><input id="fname" name="fname" value="<?php echo $query['fname'];?>"></td>
            </tr>
            <tr>
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Last Name</b></td>
               <td style="background-color:#ddffff;"><input id="lname" name="lname" value="<?php echo $query['lname'];?>"></td>
            </tr>
            <tr>
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Email</b></td>
               <td style="background-color:#ddffff;"><input id="email" name="email" value="<?php echo $query['email'];?>"></td>
            </tr>
            <tr>
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Username</b></td>
                <td style="background-color:#ddffff;"><input id="username" name="username" value="<?php echo $query['username'];?>"></td>
            </tr>
            <tr>   
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>Telephone</b></td>
               <td style="background-color:#ddffff;"><input id="telephone" name="telephone" value="<?php echo $query['telephone'];?>"></td>
            </tr>
            <tr>   
               <td height="20px" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b>New Password</b></td>
               <td style="background-color:#ddffff;"><input id="password" name="password"></td>
            </tr>
            <tr>
                <td  style=" background-color:#ffffff;border-top: dotted 1px #bfbfbf;text-align: center;" colspan="6" ><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</div>
  </div>
 </body>
</html>