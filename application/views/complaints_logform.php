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
 
  <div id="log_bar">
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="current sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
    </div>    
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==4){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
   <div id="form_wrapper_lists">
    <div id="account_lists" style="display: block" name="menu">
            <table class="rl_header" border="0" bgcolor="#ffffff" width="100%" cellpadding="8px" align="center">
                <tr>
                    <td style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'complaints_list/records';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
                </tr>
                <tr>
                    <td align="center" style="background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"><h4><b>Complaints Log List</b></h4></td>
                </tr>
            </table>
        <table id="list" class="list_view_header" width="100%" cellpadding="4px">
            <thead bgcolor="#efefef">
                <tr>
                    <th style="border-right: dotted 1px #ddddff;" align="center"></th>   
                      <th style="border-right: dotted 1px #ddddff;" align="center"> New REF No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old REF No</th>
                      <th style="border-right: dotted 1px #ddddff;" align="center">Updated Client Name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Client name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Complaint From</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Complaint From</th>                    
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Address</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Address</th>
                     <th style="border-right: dotted 1px #ddddff;" align="center">Updated Telephone No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Min Telephone No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Email Address</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Email Address</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Order REF No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Order REF No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Complaint Nature</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Complaint Nature</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Complaint Details</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Complaint Details</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Person Responsible</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Person Responsible</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Action Taken</th>    
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Max Action Taken</th> 
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Investigated By</th>    
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Investigated By</th>                  
                     <th style="border-right: dotted 1px #ddddff;" align="center">Updated Approved</th>    
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Approved</th>

                    <th  align="center">Edited By</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Action</th>
                </tr>
            </thead>
            
            <tbody>        
            <?php
            
                $i=1;
                foreach($query as $row):
                        
                //if($i==0){
                     
                    echo"<tr>";
                //}
            ?>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $i;?>.</td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_ref_no']=="NULL"){echo"Not Yet Set";}elseif($row['new_ref_no']=="0"){echo "Not Yet Set";}elseif($row['new_ref_no']==""){echo"No Previous Data";}else{echo $row['new_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['old_ref_no']=="NULL"){echo"No previous entry";}elseif($row['old_ref_no']==""){echo "No previous entry";}elseif($row['old_ref_no']=="0"){echo "Not yet set";}else{echo $row['old_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_client_name']=="NULL"){echo"Not Yet Set";}elseif($row['new_client_name']=="0"){echo "Not Yet Set";}elseif($row['new_client_name']==""){echo"No Previous Data";}else{echo $row['new_client_name'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_client_name']=="NULL"){echo"No previous entry";}elseif($row['old_client_name']==""){echo "No previous entry";}elseif($row['old_client_name']=="0"){echo "Not yet set";}else{echo $row['old_client_name'];}?></td>
                     <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_received_by']=="NULL"){echo"Not Yet Set";}elseif($row['new_received_by']=="0"){echo "Not Yet Set";}elseif($row['new_received_by']==""){echo"No Previous Data";}else{echo $row['new_received_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_received_by']=="NULL"){echo"No previous entry";}elseif($row['old_received_by']==""){echo "No previous entry";}elseif($row['old_received_by']=="0"){echo "Not yet set";}else{echo $row['old_received_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['new_address']=="NULL"){echo"Not Yet Set";}elseif($row['new_address']=="0"){echo "Not Yet Set";}elseif($row['new_address']==""){echo"No Previous Data";}else{echo $row['new_address'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_address']=="NULL"){echo"No previous entry";}elseif($row['old_address']==""){echo "No previous entry";}elseif($row['old_address']=="0"){echo "Not yet set";}else{echo $row['old_address'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_telephone_no']=="NULL"){echo"Not Yet Set";}elseif($row['new_telephone_no']=="0"){echo "Not Yet Set";}elseif($row['new_telephone_no']==""){echo"No Previous Data";}else{echo $row['new_telephone_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['old_telephone_no']=="NULL"){echo"No previous entry";}elseif($row['old_telephone_no']==""){echo "No previous entry";}elseif($row['old_telephone_no']=="0"){echo "Not yet set";}else{echo $row['old_telephone_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_email']=="NULL"){echo"Not Yet Set";}elseif($row['new_email']=="0"){echo "Not Yet Set";}elseif($row['new_email']==""){echo"No Previous Data";}else{echo $row['new_email'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_email']=="NULL"){echo"No previous entry";}elseif($row['old_email']==""){echo "No previous entry";}elseif($row['old_email']=="0"){echo "Not yet set";}else{echo $row['old_email'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['new_order_ref_no']=="NULL"){echo"Not Yet Set";}elseif($row['new_order_ref_no']=="0"){echo "Not Yet Set";}elseif($row['new_order_ref_no']==""){echo"No Previous Data";}else{echo $row['new_order_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_order_ref_no']=="NULL"){echo"No previous entry";}elseif($row['old_order_ref_no']==""){echo "No previous entry";}elseif($row['old_order_ref_no']=="0"){echo "Not yet set";}else{echo $row['old_order_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_complaint_nature']=="NULL"){echo"Not Yet Set";}elseif($row['new_complaint_nature']=="0"){echo "Not Yet Set";}elseif($row['new_complaint_nature']==""){echo"No Previous Data";}else{echo $row['new_complaint_nature'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_complaint_nature']=="NULL"){echo"No previous entry";}elseif($row['old_complaint_nature']==""){echo "No previous entry";}elseif($row['old_complaint_nature']=="0"){echo "Not yet set";}else{echo $row['old_complaint_nature'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_complaint_details']=="NULL"){echo"Not Yet Set";}elseif($row['new_complaint_details']=="0"){echo "Not Yet Set";}elseif($row['new_complaint_details']==""){echo"No Previous Data";}else{echo $row['new_complaint_details'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_complaint_details']=="NULL"){echo"No previous entry";}elseif($row['old_complaint_details']==""){echo "No previous entry";}elseif($row['old_complaint_details']=="0"){echo "Not yet set";}else{echo $row['old_complaint_details'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_responsible_person']=="NULL"){echo"Not Yet Set";}elseif($row['new_responsible_person']=="0"){echo "Not Yet Set";}elseif($row['new_responsible_person']==""){echo"No Previous Data";}else{echo $row['new_responsible_person'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_responsible_person']=="NULL"){echo"No previous entry";}elseif($row['old_responsible_person']==""){echo "No previous entry";}elseif($row['old_responsible_person']=="0"){echo "Not yet set";}else{echo $row['old_responsible_person'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_action_taken']=="NULL"){echo"Not Yet Set";}elseif($row['new_action_taken']=="0"){echo "Not Yet Set";}elseif($row['new_action_taken']==""){echo"No Previous Data";}else{echo $row['new_action_taken'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_action_taken']=="NULL"){echo"No previous entry";}elseif($row['old_action_taken']==""){echo "No previous entry";}elseif($row['old_action_taken']=="0"){echo "Not yet set";}else{echo $row['old_action_taken'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_investigated_by']=="NULL"){echo"Not Yet Set";}elseif($row['new_investigated_by']=="0"){echo "Not Yet Set";}elseif($row['new_investigated_by']==""){echo"No Previous Data";}else{echo $row['new_investigated_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_investigated_by']=="NULL"){echo"No previous entry";}elseif($row['old_investigated_by']==""){echo "No previous entry";}elseif($row['old_investigated_by']=="0"){echo "Not yet set";}else{echo $row['old_investigated_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_approved']=="0"){echo"Not yet approved";}elseif($row['new_approved']=="1"){echo "Approved";}else{echo $row['new_approved'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_approved']=="NULL"){echo"No previous entry";}elseif($row['old_approved']==""){echo "No previous entry";}elseif($row['old_approved']=="0"){echo "Not yet approved";}elseif($row['old_approved']=="1"){echo "Approved";}else{echo $row['old_approved'];}?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['new_who'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['action'];?></td>

            <?php             
                $i++;
            ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>
</body>
</html>