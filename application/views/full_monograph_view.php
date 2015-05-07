<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
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
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
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
     <div id="account_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open('content_uniformity/save_friability_monograph',array('id'=>'content_uniformity_view'));?>
       <table width="100%" cellpadding="8px" border="0" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input> 
        <tr>
            <td style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px">Back</a></td>
          </tr>
       </table>
       <table width="75%" border="0" cellpadding="4px" align="center">
          <tr>
              <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
          </tr>
          <tr>    
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $query['active_ingredients']."".$query['test_specification'];?></td>
              <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
              <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="text" id="reference_number" name="reference_number" class="field"/><span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="reference_number_r" style="color:red; display:none">Fill this field</span></td>
          </tr>
          <tr>
                <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
                <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
                <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
                <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
            </tr>
            <tr>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL No.</td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="batch_number"></input></td>
                
            </tr>
            <tr>
                <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
                <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">USER TYPE</td>
                <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $user['logged_in']['role'];?></td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
              <a href="<?php echo base_url().'assay/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="current sub_menu sub_menu_link first_link">Assay test</a>
              <a href="<?php echo base_url().'content_uniformity/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Content Uniformity Test</a>
              <a href="<?php echo base_url().'disintegration/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Disintegration Test</a>
              <a href="<?php echo base_url().'dissolution/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Dissolution Test</a>
              <a href="<?php echo base_url().'identification/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Identification Test</a>
              <a href="<?php echo base_url().'friability/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Friability Test</a>
              <a href="<?php echo base_url().'microbiology/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">Microbiology Test</a>
              <a href="<?php echo base_url().'ph_alkalinity/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="sub_menu sub_menu_link first_link">PH Alkalinity Test</a>
              </td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Assay Test</h5></td>
            </tr>
            <tr>
              <td colspan="0" height="25px"  style="text-align:center;padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Balance Make</td>
              <td colspan="7" height="25px"  style="text-align:left;padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input name="balance" type="text" size="40"></input></td>
            </tr> 
            <tr>
              <td colspan="0" height="25px" align="center" style="text-align:center;padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Number</td>
              <td colspan="7" height="25px" align="center" style="text-align:left;padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input name="number" type="text" size="40"></input></td>
            </tr>  
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Weight of Samples</td>
            </tr>
            <tr>
                <td  colspan="0" height="20px" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <b></b></td>
                <td  colspan="0" height="20px" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <b></b></td>
                <td  colspan="2" height="20px" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <b>1</b></td>
                <td  colspan="2" height="20px" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <b>2</b></td>
                <td  colspan="2" height="20px" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <b>3</b></td>
                
            </tr>
            <tr>
                <td  colspan="0" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="w_tablets_containers" size="40" value="Wieght of 20tablets and container(g)"></td>
                <td height="25px" align="center" style="padding:4px;color: #0000fb;background-color: #ffffff;">
                  <select name="w_tablets_containers_state">
                    <option value="whole">Whole</option>
                    <option value="crushed">Crushed</option>
                  </select>
                </td>
                <td  colspan="2" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="bf_rotation_one"></td>
                <td  colspan="3" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="af_rotation_one"></td>
                <td colspan="0" height="25px" align="left" style="padding:4px;color: #0000fb;background-color: #ffffff;"><input type="text" name="third_try_lw">
                </td>
              
            </tr>
            <tr>
                <td colspan="2" height="25px" align="left" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="w_container" value="weight of container(g)" size="60"></td>
                <td colspan="2" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="bf_rotation_two"></td>
                <td colspan="3" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="af_rotation_two"></td>
                <td colspan="0" height="25px" align="left" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="third_try_lw">
                </td>
                
            </tr>
            <tr>
                <td colspan="0" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="w_tablets" value="Weight of sample(g)" size="40"></td>
                <td height="25px" align="center" style="padding:4px;color: #0000fb;background-color: #ffffff;">
                  <select name="w_tablets_state">
                    <option value="whole">Whole</option>
                    <option value="crushed">Crushed</option>
                  </select>
                </td>
                <td colspan="2" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="bf_rotation_three"></td>
                <td colspan="3" height="25px" align="center" style="padding:4px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <input type="text" name="af_rotation_three"></td>
                <td colspan="0" height="25px" align="left" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="third_try_lw">
                </td>
                
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Sample Preparation</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea name="sample_preparation" cols="160" rows="4"></textarea></td>
            </tr>
             <tr>
              <td colspan="0" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Equipment Make</td>
              <td colspan="7" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="equipment_make" size="50"></input></td>
            </tr>
            <tr>
              <td colspan="0" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">ID No.</td>
              <td colspan="7" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="id_number" size="50"></input></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Average of Areas</td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;border-bottom: solid 5px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0">
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">No.</td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">STD</td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">S1</td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">S2</td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">S3</td>
                  </tr>

                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">1.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">2.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">3.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">4.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">5.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Average</td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                    <td style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" align="center"  style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Results of Analysis</td>
            </tr>
            <tr>
              <td align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Specifications</td>
              <td colspan="5" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="specification" size="50"></input></td>
              <td align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Method Used</td>
              <td style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="text" name="method" ></input></td>
            </tr>
            <tr>
              <td  align="left"colspan="8" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Results</textarea></td>
            </tr>
            <tr>
              <td  align="center"colspan="8" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea cols="160" rows="4" name="results"></textarea></td>
            </tr>
            <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
       </table>
      </form>
</div>
</div>
</body>
</html>

