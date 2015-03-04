<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS Admin Account</title>
  <link rel="icon" href="" />
  
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>
  
  <script src="<?php echo base_url().'js/jquery-1.9.1.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  
  <script src="<?php //echo base_url().'js/authentication.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"250px",
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
   
   //var_dump($user);
  ?>
  <div id="header"> 
   <div id="logo" style="color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></br><p><b>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</b></p></div>
  </div>
   
  <div id="log_bar">
    <table bgcolor="f2f2f2" border="0" cellpadding="8px" align="center" width="100%">
      <tr>
        
        <td colspan="4" style="text-align: right;background-color: #ffffff;" >
         <a href="<?php echo base_url().'home/logout'?>"><b>Logout</b><img src="<?php echo base_url().'images/icons/exit.png';?>" height="25px" width="25px"><img src="<?php echo base_url().'images/icons/door.png';?>" height="25px" width="25px"></a>
        </td>
      </tr>
      <tr>
         <td style="background-color: #ffffff;" width="125px"><a href="<?php echo base_url().'account_settings/index/'.$user_type_id.'/'.$user_id;?>"><img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"> Account Settings</a></td>
         <td style="text-align: center;background-color: #ffffff;" width="20px">
           <img src="<?php echo base_url().'images/user.png';?>" height="24px" width="24px">
         </td>
         <td style="text-align: left;background-color: #80ffff;" width="130px"><b>
            <?php 
             echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);
            ?>
           
         </td>
         <td  style="background-color: #ffffff;"><?php 
             echo("Logged in as <b>".$user['logged_in']['role']);
            ?>
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
        <a href="<?php echo base_url().'temperature_humidity_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Temperature & Humidity</b></a>
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
        <a href="<?php echo base_url().'temperature_humidity_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Temperature & Humidity</b></a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Out of Tolerance</b></a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link"><b>Complaints</b></a>
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
    <form action="<?php echo base_url().'issue/save/'.$id."/".$item_name?>" method="POST" >
    <table class="table_form" width="950px" height="250px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">
        <td><input type="hidden" name="item_name" value="<?php echo $item_name;?>"/></td>
        <td><input type="hidden" name="id" value="<?php echo $id;?>"/></td>
        <tr>
	    <td colspan="4" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'inventory_record/Get/'.$id.'/'.$item_name;?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
	</tr>
	<tr>
	    <td colspan="4" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #d5d5ff;color: #0000fb;background-color: #e8e8ff;">
                <b><h3>Inventory Record Form</h3></b>
            </td>
	</tr>
	<tr>
	    <td height="5px" width="450px" align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Issued By</b></td>
	    <td style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="issued_by" /></td>
	    <td height="5px" width="450px" align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Quantity Issued</b></td>
	    <td style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="quantity_issued" /></td>

	</tr>
	<tr>
	    <td height="5px" width="450px" align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Issued To</b></td>
	    <td style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="issued_to" /></td>
	    <td height="5px" width="450px" align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Balance</b></td>
	    <td style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="balance" /></td>
	    
	</tr>
	
	<tr>
	    <td  style="background-color:#ffffff;text-align: center;" colspan="4" ><input type="submit" name="submit_i" value="Submit"></td>
	</tr>
    </table>
</div>
</div>
</body>
</html>