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
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class=" sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
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
        <a href="<?php echo base_url().'home';?>"class=" sub_menu sub_menu_link first_link">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class=" sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
</div>
  <div id="form_wrapper_lists">
    <div id="account_lists">
        <div div="list_view_navbar">
            <table class="rl_header" border="0" bgcolor="#ffffff"  width="100%" cellpadding="8px" align="center">
                <tr>
                    <td colspan="2" align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>User Log Records</h5></td>
                </tr>
                <tr>
                    <td style="padding:4px;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'user_accounts/Get';?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px">Back</a></td>
                </tr>
            </table>
        </div>
        <table id="list" class="list_view_header" width="100%" cellpadding="4px">
            <thead bgcolor="#efefef">
                <tr>
                    <th style="border-right: dotted 1px #ddddff;">No.</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old First Name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New First Name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Last Name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Last Name</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Username</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Username</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Telephone</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Telephone</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Created At</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Created At</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Role</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Role</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Status</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Status</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Logdate</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Action</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Who</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
                $i=1;
                foreach($query as $row):
                        
                if($i==0){
                     
                    echo"<tr>";
                }
                ?>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i;?>.</td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['old_fname'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php echo $row['new_fname'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['old_fname'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['new_fname'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php echo $row['old_username'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['new_username'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['old_telephone'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['new_telephone'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php echo $row['old_created_at'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['new_created_at'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['old_role'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php echo $row['new_role'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;">
                    <?php
                    if($row['new_acc_status']=='NULL'){
                        echo"NONE EXISTENT";
                        }else if($row['old_acc_status']==0){
                            echo"Deactivated";
                            }else if($row['old_acc_status']==1){
                                echo"Active";
                                }else if($row['old_acc_status']==2){
                                    echo"Inactive";
                                    }
                    ?>
                    </td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;">
                    <?php
                    if($row['new_acc_status']==0){
                        echo"Deactivated";
                        }else if($row['new_acc_status']==1){
                            echo"Active";
                            }else if($row['new_acc_status']==2){
                                echo"Inactive";
                                }
                    ?>
                    </td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php echo $row['log_date'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['action'];?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['who'];?></td>
                        
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