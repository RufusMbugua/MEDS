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
  <link href="datatables/extensions/Tabletools/css/dataTables.tableTools.css" type="text/css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"> -->
  <link rel="stylesheet" href="<?php echo base_url().'jquery-ui.css';?>">
  
  
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script src="datatables/extensions/Tabletools/js/dataTables.tableTools.js" type="text/javascript"></script>
  <script src="datatables/extensions/Tabletools/js/ZeroClipboard.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sDom": "T lfrtip",
     "sScrollY":"270px",
     "sScrollX":"100%",
     "oTableTools": {
      "aButtons": [      
      
      {
        "sExtends": "collection",
        "sButtonText": 'Save',
        "aButtons": ["csv", "xls", "pdf"]
      }
      ],
      "sSwfPath": "/meds/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
    }
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
     <a href="<?php echo base_url().'home';?>"class="system_nav system_nav_link ">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'client_billing/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'client_billing/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
  <div id="form_wrapper_lists">
    <div id="account_lists" style="display: block" name="menu">
        <table bgcolor="#ffffff" class="subdivider" border="0" width="100%" cellpadding="4px">
            <tr>
                <td colspan="4" align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Deactivated User Accounts</h5></td>
            </tr>
            <tr>
                <td style="text-align:left;background-color:#ffffff;text-color:#00ff00;" width="140px">&nbsp;&nbsp;<a href="<?php echo base_url().'user_accounts/Get';?>">Active Accounts</a></td>
                <td style="text-align:left;background-color:#ffffff;text-color:#00ff00;" width="140px"><a href="<?php echo base_url().'inactive_users/Get';?>">Inactive Accounts</a></td>
                <td style="text-align:left;background-color:#ffffff;text-color:#00ff00;" width="240px"><a class ="current" href="<?php echo base_url().'deactivated_users/Get';?>">Decativated Accounts</a></td>
                <td style="padding:4px;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="javascript:slide('test_request');"><img src="<?php echo base_url().'images/icons/add_client.png'?>" height="20px" width="20px">Add User</a></td>
            </tr>
            
        </table>
        <table id="list" width="100%" class="list_view_header"   bgcolor="#ffffff" cellpadding="4px">
            <thead>
                <tr>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width=""></th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Name</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Email</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Username</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Telephone</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">User Role</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Status</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Created</th>
                    <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Edit</th>
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
                <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="16px"><?php echo $i; ?>.</td>
                <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->fname." ".$row->lname;?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->email;?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->username;?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->telephone;?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php if ($row->user_type==1){echo "MEDS System Administrator";}else if($row->user_type==2){echo"Laboratory Supervisor";}else if($row->user_type==5){echo"Laboratory Analyst";}else if($row->user_type==6){echo"Documentation";}else if($row->user_type==7){echo"Laboratory Assistant";}else if($row->user_type==8){echo"Quality Assurance Manager";}else if($row->user_type==3){echo"MEDS Client";}?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php if ($row->acc_status==0){echo "Deactivated";}?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->created_at;?></td>
                <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><a href="<?php echo base_url().'update_deactivated_record/Update/'.$row->id;?>"><img src="../images/icons/client_edit.png" height="20px" width="20px"/>Edit</a></td>
             <?php
             
                $i++;
            ?>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="test_request" name="menu" style="display:none;"><?php include_once "application/views/new_user_form.php";?></div>      
</div>
</body>
</html>