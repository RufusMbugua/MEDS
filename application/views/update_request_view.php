<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon"/>
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
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link active">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link active">Analysis Test Request</a>
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
    <div id="form_wrapper">
    <div id="forms">
        <?php echo validation_errors();?>
        <?php echo form_open('update_request_record/update_request/'.$query['id'].'/'.$user_type_id, array('id'=>'update_request_view'));?>
        <table class="table_form" bgcolor="#c4c4ff" width="65%"  border="0" cellpadding="8px" align="center">
        <!-- <input type="hidden" id="id" value="<?php echo"$user_type_id";?>" class="id" name="id"/> -->
        <input type="hidden" id="id" value="<?php echo"$user_id";?>" class="id" name="user_id"/>
        <input type="hidden" id="test_req" value="<?php echo $query['id'];?>"name="test_req"/>
        <tr>
          <td colspan="8" style="padding:8px;text-align:right;"><a href="<?php echo base_url().'home';?>"><img src="<?php echo base_url().'images/icons/view.png';?>"height="20px" width="20px">Back To Test Request Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" style="text-align:center;padding:8px;">
            <table width="100%" cellpadding="8px" border="0" align="center">
                  
                  <tr>
                      <td rowspan="2" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                      <td colspan="2" height="25px" style="border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: Form</b></td>
                      <td width="150px" height="25px" colspan="2" style="border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
                      <td colspan="3" style="border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                        <input type="text" id="reference_number" name="reference_number" value="<?php echo $query['reference_number'];?>" class="field"/>
                        <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                        <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
                      <td height="25px"colspan="2" style="border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
                      <td height="25px" colspan="3" style="border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
                  </tr>
                  <tr>
                      <td width="150px" height="25px" style="border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
                      <td colspan="2" height="25px" style="border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
                      <td colspan="2" style="border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
                      <td colspan="3" style="border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
                  </tr>
            </table>
          </td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:right;padding:4px;border-bottom: solid 10px #c4c4ff;color:#0000fb;background-color:#ffffff;"><!-- <input class="btn" type="button" name="refresh" id="refresh" value="Refresh"/> --></td>
        </tr>
        <tr>    
          <td height="25px" colspan="2" style="padding:4px;background-color:#ffffff;">Name of Applicant</td>
          <td height="25px" colspan="6" style="padding:4px;background-color:#ffffff;"><input type="text" class="field" size="80" id="applicant_name"  name="applicant_name" value="<?php echo $query['applicant_name'];?>"/><span id="applicant_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png'?>" height="10px" width="10px"></span><span id="applicant_name_r" style="color:red; display:none">Fill in this field</span></td>
        </tr>
        <tr>
          <td height="25px" colspan="2" style="padding:4px;background-color:#ffffff;">Address of Applicant</td>
          <td height="25px" colspan="6" style="padding:4px;background-color:#ffffff;"><input type="text" class="field" size="80" class="field" id="applicant_address" name="applicant_address" value="<?php echo $query['applicant_address'];?>"/><span id="applicant_address_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="applicant_address_r" style="color:red; display:none">Fill in this field</span></td>
        </tr>
        <tr>
          <td colspan="8" style="padding:4px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;"><b>Sample Description</b></td>
        </tr>
        <tr>
          <td height="25px" style="padding:8px;border-bottom:solid 10px #c4c4ff;background-color:#ffffff;text-align:left;" colspan="8"><b>(*Provide International Non-Proprietary Name of Active Ingredient'(s) if available)</b></td>
        </tr>
        <tr>
        <td colspan="8" style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;">
          <table  class="inner_table" width="100%"  cellpadding="8px" align="center" border="0">
              <tr>
                  <td style="padding:4px;text-align: left;">Active Ingredients</td>
                  <td colspan="4"style="text-align:left;padding:4px;"><input type="text" class="field" size="80"  name="active_ingredients" id="active_ingredients" value="<?php echo $query['active_ingredients'];?>"><span id="active_ingredients_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="active_ingredients_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align:left;">Label Claim</td>
                  <td colspan="4" style="padding:4px;text-align:left;"><input type="text" class="field" size="80" name="label_claim" id="lable_claim" value="<?php echo $query['label_claim'];?>"><span id="lable_claim_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="lable_claim_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align: left;">Dosage form</td>
                  <td style="text-align:left;padding:4px;"><input type="text" class="field" name="dosage_form" id="dosage_from" value="<?php echo $query['dosage_form'];?>"><span id="dosage_from_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="dosage_from_r" style="color:red; display:none">Fill this</span></td>
                  <td style="padding:4px;"></td>
                  <td style="padding:4px;text-align:left;">Strength or concentration</td>
                  <td style="padding:4px;text-align:left;"><input type="text" class="field"  name="strength_concentration" id="strength_concentration" value="<?php echo $query['strength_concentration'];?>"><span id="strength_concentration_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="strength_concentration_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align: left;">Pack size</td>
                  <td style="text-align:left;padding:4px;"><input type="text" class="field"  name="pack_size" id="pack_size" value="<?php echo $query['pack_size'];?>"><span id="pack_size_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="pack_size_r" style="color:red; display:none">Fill this</span></td>
                  <td style="padding:4px;"></td>
                  <td style="padding:4px;text-align:left;">Name of Manufacturer</td>
                  <td style="padding:4px;text-align:left;" ><input type="text" class="field" name="manufacturer_name"  id="manufacturer_name" value="<?php echo $query['manufacturer_name'];?>"/><span id="manufacturer_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_name_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align:left;">Address of Manufacturer</td>
                  <td style="padding:4px;text-align:left;"><input type="text" class="field" id="manufacturer_address" name="manufacturer_address" value="<?php echo $query['manufacturer_address'];?>"/><span id="manufacturer_address_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_address_r" style="color:red; display:none">Fill this</span></td>
                  <td style="padding:4px;"></td>
                  <td style="padding:4px;:#ffffff;text-align:left;">Brand Name</td>
                  <td style="padding:4px;text-align:left;"><input class="field" type="text" name="brand_name" id="brand_name" value="<?php echo $query['brand_name'];?>"><span id="brand_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="brand_name_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>    
                  <td style="padding:4px;text-align:left;">Marketing Authorization Number</td>
                  <td style="padding:4px;text-align:left;"><input type="text" id="marketing_authorization_number" name="marketing_authorization_number" value="<?php echo $query['marketing_authorization_number'];?>"></td>
                  <td style="padding:4px;"></td>
                  <td style="padding:4px;text-align:left;">Batch/Lot Number</td>
                  <td style="padding:4px;text-align:left;"><input type="text" class="field" name="batch_lot_number" id="batch_lot_number" value="<?php echo $query['batch_lot_number'];?>"><span id="batch_lot_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="batch_lot_number_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align:left;">Date of Manufacture</td>
                  <td style="padding:4px;text-align:left;"><input type="text" class="datepicker" name="date_of_manufacture" id="datepicker" value="<?php echo $query['date_manufactured'];?>"><span id="date_of_manufacture_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="date_of_manufacture_r" style="color:red; display:none">Fill this</span></td>
                  <td style="padding:4px;"></td>
                  <td style="padding:4px;text-align:left;">Expiry/Retest Date</td>
                  <td style="padding:4px;text-align:left;"><input type="text" class="field datepicker" id="expiry_retest_date" name="expiry_retest_date" value="<?php echo $query['expiry_date'];?>"><span id="expiry_retest_date_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="expiry_retest_date_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align: left;">Quantity Submitted</td>
                  <td colspan="2"style="padding:4px;text-align: left;"><input type="text" class="field" id="quantity_submitted" name="quantity_submitted" value="<?php echo $query['quantity_submitted'];?>"><span id="quantity_submitted_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="quantity_submitted_r" style="color:red; display:none">Fill this</span>
                    <select name="quantity_type">
                      <option value="<?php echo $query['quantity_type'];?>"><?php echo $query['quantity_type'];?></option>
                      <option>-------</option>
                      <option value="Tablets">Tablets</option>
                      <option value="Capsules">Capsules</option>
                       <option value="Syrup">Syrup</option>
                      <option value="Injections">Injections</option>
                       <option value="Suspensions">Suspensions</option>
                      <option value="Bottles">Bottles</option>
                    </select>
                  </td>
                  <td style="padding:4px;text-align:left;">Storage Conditions</td>
                  <td style="padding:4px;text-align:left;"><input type="text"  id="storage_conditions" name="storage_conditions" value="<?php echo $query['storage_conditions'];?>"></td>
              </tr>
              <tr>
                  <td style="padding:4px;text-align: left;">Applicant's Reference Number</td>
                  <td colspan="4" style="padding:4px;text-align:left;"><input type="text" id="applicant_reference_number" name="applicant_reference_number" value="<?php echo $query['applicant_ref_number'];?>"></td>
              </tr>
              <tr>
                  <td height="25px" style="padding:4px;text-align:left;">Sample Source</td>
                  <td height="25px" colspan="4" style="padding:4px;text-align:left;"><input type="text" size="80" class="field" id="sample_source" name="sample_source" value="<?php echo $query['sample_source'];?>"><span id="sample_source_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="sample_source_r" style="color:red; display:none">Fill this</span></td>
            </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;">Reason for Requesting Analysis(Tick as appropriate)</td>
        </tr>
        <tr>
          <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['testing_reason']=='Compliance Testing'){echo"<input type='radio' name='reason' id='compliance_testing' value='Compliance Testing' checked>";}else{echo"<input type='radio' name='reason' id='compliance_testing' value='Compliance Testing'>";};?>Compliance Testing</td>
        </tr>
        <tr>
          <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['testing_reason']=='Investigative Testing'){echo"<input type='radio' name='reason' id='investigative_testing' value='Investigative Testing' checked>";}else{echo"<input type='radio' name='reason' id='investigative_testing' value='Investigative Testing'>";};?>Investigative Testing</td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;">Other(Please Specify)</td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;"><textarea rows="3" cols="130" name='other_reason' id='other_reason'></textarea></td>
        </tr>
        <tr>
          <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h6><b>Test(s) Required:</b> (Tick as appropriate)</h6></td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;background-color:#ffffff;">
              <table class ="inner_table" width="100%" cellpadding="8px" height="150px" align="center" border="0">
                <tr>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>No</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Test</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Requirement</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>No</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Test</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Requirement</b></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">i.</td>
                  <td>Identification</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(1, $test)){echo "<input type='checkbox' name='tests[]' id='tests[]' value='1' checked>";}else{echo "<input type='checkbox' name='tests[]' id='tests[]' value='1'>";}?></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">vii.</td>
                  <td>Dissolution</td>
                  <td style="border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(7, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='7' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='7'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">ii.</td>
                  <td>Friability</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(2, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='2' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='2'>";}?></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">viii.</td>
                  <td>Assay</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(8, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='8' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='8'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">iii.</td>
                  <td>Disintegration</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(3, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='3' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='3'>";}?></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">ix.</td>
                  <td>Content Uniformity</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(9, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='9' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='9'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">iv.</td>
                  <td>ph(Acidity/Alkalinity)</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(4, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='4' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='4'>";}?></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">x.</td>
                  <td>Full Monograph</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(10, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='10' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='10'>";}?></td>
                </tr>
                 <tr>
                  <td style="padding:4px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">v.</td>
                  <td>Related Substances</td>
                  <td style="padding:4px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(5, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='5' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='5'>";}?></td>
                  <td style="padding:4px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xi.</td>
                  <td>Uniformity of Dosage</td>
                  <td style="padding:4px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(11, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='11' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='11'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:4px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">vi</td>
                  <td>Weight Variation/Mass Uniformity</td>
                  <td style="padding:4px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(6, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='6' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='6'>";}?></td>
                  <td style="padding:4px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xii.</td>
                  <td>Karl Fisher</td>
                  <td style="padding:4px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(12, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='12' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='12'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xiii.</td>
                  <td>Microbiology</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(13, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='13' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='13'>";}?></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xiv.</td>
                  <td>Loss and Drying</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><?php if(in_array(14, $test)){echo"<input type='checkbox' name='tests[]' id='tests[]' value='14' checked>";}else{echo"<input type='checkbox' name='tests[]' id='tests[]' value='14'>";}?></td>
                </tr>
            </table>
          </td>
          <tr>
            <td height="25px" colspan="8"  style="padding:4px;background-color:#ffffff;">Other(Please specify)</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><textarea rows="3" cols="130" name="other_test" id="other_test" ></textarea></td>
          </tr>
          <tr>
            <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;"><b>Specifications to be used for testing:</b>(Tick as appropriate)</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['test_specification']=='USP'){echo"<input type='radio' name='specification' id='usp' value='USP' checked>";}else{echo"<input type='radio' name='specification' id='usp' value='USP'>";}?>USP</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['test_specification']=='BP'){echo"<input type='radio' name='specification' id='bp' value='BP' checked>";}else{echo"<input type='radio' name='specification' id='bp' value='BP'>";}?>BP</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['test_specification']=='European Pharmacopoeia'){echo"<input type='radio' name='specification' id='european_pharmacopeia' value='European Pharmacopoeia' checked>";}else{echo"<input type='radio' name='specification' id='european_pharmacopeia' value='European Pharmacopoeia'>";}?>European Pharmacopoeia</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['test_specification']=='International Pharmacopoeia'){echo"<input type='radio' name='specification' id='international_pharmacopeia' value='International Pharmacopoeia' checked>";}else{echo"<input type='radio' name='specification' id='international_pharmacopeia' value='International Pharmacopoeia'>";}?>International Pharmacopoeia</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:4px;background-color:#ffffff;"><?php if($query['test_specification']=='Manufacturer Specifications'){echo"<input type='radio' name='specification' id='manufacturers_specs' value='Manufacturer Specifications' checked>";}else{echo"<input type='radio' name='specification' id='manufacturers_specs' value='Manufacturer Specifications'>";}?>Manufacturer's Specifications</td>
          </tr>
          <tr>
            <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;">Other(Please specify)</td>
          </tr>
          <tr>
           <td colspan="8" style="padding:4px;background-color:#ffffff;"><textarea rows="3" cols="130" id="other_specification" name="other_specification"></textarea></td>
          </tr>  
          <tr>
            <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h6><b><p>Note:</b> If manufacturer's or 'other', please provide methods of analysis and specifications</p></h6></td>
          </tr>
          <tr>
            <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 10px #c4c4ff;"><b>Details of person authorizing request for analysis</b></td>
          </tr>
          <tr>
            <td height="25px" style="padding:4px;background-color:#ffffff;">Name</td>
            <td height="25px" style="padding:4px;background-color:#ffffff;"><input type="text" class="field" id="authorizing_name" name="authorizing_name" value="<?php echo $query['authorizer_name'];?>"/><span id="authorizing_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="authorizing_name_r" style="color:red; display:none">Fill this</span></td>
            <td height="25px" style="padding:4px;text-align:right;background-color:#ffffff;">Designation</td>
            <td height="25px" colspan="5" style="padding:4px;background-color:#ffffff;"><input type="text" class="field" id="designation" name="designation" value="<?php echo $query['authorizer_designation'];?>"/><span id="designation_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="designation_r" style="color:red; display:none">Fill this</span></td>
          </tr>
          <tr>
            <td height="25px" width="120px" style="padding:4px;text-align:left;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;">Lab Registration No</td>
            <td height="25px" colspan="7" style="padding:4px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><input type="text" class="field" id="lab_reg_number" name="lab_reg_number" value="<?php echo $query['laboratory_number'];?>"/><span id="lab_reg_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="lab_reg_number_r" style="color:red; display:none">Fill this</span></td>
            <input height="25px" type="hidden" id="received_by" name="received_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"/>
          <tr>
            <td height="25px" colspan="8" width="120px" style="padding:4px;text-align:left;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h6><b>Comments</b><span id="findings_comment_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="findings_comment_r" style="color:red; display:none">Fill this</span></h6></td>
          </tr>
          <tr>  
            <td height="25px" colspan="8" style="padding:4px;background-color:#ffffff;"><textarea rows="3" cols="130" type="text" class="field" id="findings_comment" name="findings_comment"><?php echo $query['findings_comments'];?></textarea></td>
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