<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>

  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <!--<script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>-->
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
      function calc_avg_asymmetry(){

      var average = (Math.abs(document.getElementById('asymmetry_one').value) + Math.abs(document.getElementById('asymmetry_two').value) + Math.abs(document.getElementById('asymmetry_three').value) + Math.abs(document.getElementById('asymmetry_four').value) + Math.abs(document.getElementById('asymmetry_five').value) + Math.abs(document.getElementById('asymmetry_six').value))/6;
      document.getElementById('average_asymmetry').value = average;

      }
      function calc_avg_retention_time(){

      var average = (Math.abs(document.getElementById('retention_time_one').value) + Math.abs(document.getElementById('retention_time_two').value) + Math.abs(document.getElementById('retention_time_three').value) + Math.abs(document.getElementById('retention_time_four').value) + Math.abs(document.getElementById('retention_time_five').value) + Math.abs(document.getElementById('retention_time_six').value))/6;
      document.getElementById('average_retention_time').value = average;

      }
      function standard_dev(){
        var mean = (Math.abs(document.getElementById('retention_time_one').value) + Math.abs(document.getElementById('retention_time_two').value) + Math.abs(document.getElementById('retention_time_three').value) + Math.abs(document.getElementById('retention_time_four').value) + Math.abs(document.getElementById('retention_time_five').value) + Math.abs(document.getElementById('retention_time_six').value))/6;
        document.getElementById('average_retention_time').value = mean;
        

      }

      function calc_avg_resolution(){

      var average = (Math.abs(document.getElementById('resolution_one').value) + Math.abs(document.getElementById('resolution_two').value) + Math.abs(document.getElementById('resolution_three').value) + Math.abs(document.getElementById('resolution_four').value) + Math.abs(document.getElementById('resolution_five').value) + Math.abs(document.getElementById('resolution_six').value))/6;
      document.getElementById('average_resolution').value = average;

      }
      function calc_avg_peak_area(){

      var average = (Math.abs(document.getElementById('peak_area_one').value) + Math.abs(document.getElementById('peak_area_two').value) + Math.abs(document.getElementById('peak_area_three').value) + Math.abs(document.getElementById('peak_area_four').value) + Math.abs(document.getElementById('peak_area_five').value) + Math.abs(document.getElementById('peak_area_six').value))/6;
      document.getElementById('average_peak_area').value = average;

      }
      
      function calc_avg_relative_retention_time(){

      var average = (Math.abs(document.getElementById('relative_retention_time_one').value) + Math.abs(document.getElementById('relative_retention_time_two').value) + Math.abs(document.getElementById('relative_retention_time_three').value) + Math.abs(document.getElementById('relative_retention_time_four').value) + Math.abs(document.getElementById('relative_retention_time_five').value) + Math.abs(document.getElementById('relative_retention_time_six').value))/6;
      document.getElementById('average_relative_retention_time').value = average;

      }

      function calc_avg_std(){

      var average = (Math.abs(document.getElementById('std_one').value) + Math.abs(document.getElementById('std_two').value) + Math.abs(document.getElementById('std_three').value) + Math.abs(document.getElementById('std_four').value) + Math.abs(document.getElementById('std_five').value))/5;
      document.getElementById('std_average').value = average;

      }
      function calc_avg_sample_one(){

      var average = (Math.abs(document.getElementById('sample_one_one').value) + Math.abs(document.getElementById('sample_two_one').value) + Math.abs(document.getElementById('sample_three_one').value) + Math.abs(document.getElementById('sample_four_one').value) + Math.abs(document.getElementById('sample_five_one').value))/5;
      document.getElementById('sample_one_average').value = average;

      }
      function calc_avg_sample_two(){

      var average = (Math.abs(document.getElementById('sample_one_two').value) + Math.abs(document.getElementById('sample_two_two').value) + Math.abs(document.getElementById('sample_three_two').value) + Math.abs(document.getElementById('sample_four_two').value) + Math.abs(document.getElementById('sample_five_two').value))/5;
      document.getElementById('sample_two_average').value = average;

      }
      function calc_avg_sample_three(){

      var average = (Math.abs(document.getElementById('sample_one_three').value) + Math.abs(document.getElementById('sample_two_three').value) + Math.abs(document.getElementById('sample_three_three').value) + Math.abs(document.getElementById('sample_four_three').value) + Math.abs(document.getElementById('sample_five_three').value))/5;
      document.getElementById('sample_three_average').value = average;

      }
       function calc_avg_relative(){

      var average = (Math.abs(document.getElementById('relative_one').value) + Math.abs(document.getElementById('relative_two').value) + Math.abs(document.getElementById('relative_three').value) + Math.abs(document.getElementById('relative_four').value) + Math.abs(document.getElementById('relative_five').value))/5;
      document.getElementById('relative_average').value = average;

      }
      
       
  </script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
     $("#equipment_balance").on('change',function(){
      var idnumber=$(this).find(":selected").data("idnumber");
      $("#idnumber").val(idnumber);
      
    });
      $("#equipment_make").on('change',function(){
      var idnumberb=$(this).find(":selected").data("idnumberb");
      $("#idnumberb").val(idnumberb);
    });
    
    $("#column_name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#column_dimensions").val(dimensions);
      $("#column_serial_number").val(serial_number);
      $("#column_manufacturer").val(manufacturer);
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
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link active">Analysis Test Request</a>
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
    </div>
    <div id="form_wrapper_lists">
     <div id="account_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open('assay/save',array('id'=>'assay_view'));?>
       <table width="100%" cellpadding="8px" border="0" align="center">
          <tr>
            <td style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="25px" width="20px">Back</a></td>
          </tr>
       </table>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
          <tr>
              <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
          </tr>
          <tr>    
              <td colspan="0" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
              <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?></td>
              <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
              <td colspan="0" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $query['reference_number'];?></td>
          </tr>
          <tr>
                <td colspan="0" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
                <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
                <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
                <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
            </tr>
            <tr>
                <td colspan="0" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL No.</td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></input></td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Registration Number: <?php echo $query['laboratory_number'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Request Date: <?php echo $query['date_time'];?></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Label Claim: <?php echo $query['active_ingredients'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Brand Name: <?php echo $query['brand_name'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Method/Specifications: <?php echo $query['test_specification'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Details:<br><br> <?php echo $query['manufacturer_name'];?><br><?php echo $query['manufacturer_address'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Clients Details:<br><br> <?php echo $query['applicant_name'];?><br><?php echo $query['applicant_address'];?> </td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Date: <?php echo $query['date_manufactured'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Expiry Date: <?php echo $query['expiry_date'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis Start Date: <?php echo date("d/m/Y")?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" value="<?php echo date("d/m/Y");?>"></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Assay -HPLC Area Method Two Components</h5></td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;">
                <a href="<?php echo base_url().'assay/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class=" current mid_sub_menu mid_sub_menu_link first_link">Area Method-Two Components</a>
                <a href="<?php echo base_url().'assay/worksheet_uv/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link">Area Method-Two Components Different</a>
                <a href="<?php echo base_url().'assay/worksheet_titration/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link ">Area Method-Single Components</a>
                <a href="<?php echo base_url().'assay/worksheet_karl_fisher/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link ">Internal Method</a>
                <a href="<?php echo base_url().'assay/worksheet_titration/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link ">Titration</a></td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>System Stability</b></td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table align="center" width="90%" border="0" cellpadding="8px">
                <tr>
                  <td colspan="0" height="25px" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Balance Make</td>
                  <td colspan="0" height="25px" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">
                     <select id="equipment_balance" name="equipment_balance" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['description'];?>" data-idnumber="<?php echo $bl_name['id_number']; ?>"><?php  echo $bl_name['description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                  </td>
                  <td colspan="0" height="25px" align="center" style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">ID Number</td>
                  <td colspan="0" height="25px" align="center" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;"><input type="text" id="idnumber" name="idnumber">
                  </td>
                </tr>
              </table>
              </td>
            </tr>  
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Preparation</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea name="sample_preparation" cols="160" rows="4"></textarea></td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td colspan="0"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td colspan="0"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="standard_description" name="standard_description" >
                      <option selected></option>
                       <?php
                       foreach($sql_standards as $s_name):
                      ?>
                       
                       <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                </tr>
                 <tr>
                    <td  colspan="0" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td  colspan="0" height="20px" align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="potency" size="100" ></input></td>
                </tr>
                <tr>
                    <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_one"></td>
                  
                </tr>
                <tr>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_two"></td>
                    
                </tr>
                <tr>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_three"></td>
                    
                </tr>
                <tr>
                  <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="dilution" size="30"></input></td>
                </tr>
              </table>
            </td>
          </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System-Mobile Phase</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea rows="4" cols="160" name="c_mobile_phase"></textarea></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="equipment_make" name="equipment_make" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['description'];?>" data-idnumberb="<?php echo $bl_name['id_number']; ?>"><?php  echo $bl_name['description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">ID Number</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" id="idnumberb" name="idnumberb"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic Conditions</b></td>
            </tr>
            <tr>
                <td colspan="8" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" width="80%" align="center">
                  <tr>
                    <td rowspan="4" align="left" style="color:#000;padding:8px;color: #0000fb;background-color: #ffffff;">
                    -A stainless Steel Column</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Name:</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">
                      <select id="column_name" name="column_name" >
                      <option selected></option>
                       <?php
                       foreach($sql_columns as $c_name):
                      ?>
                       <option value="<?php  echo $c_name['column_type'];?>" data-dimensions="<?php echo $c_name['column_dimensions']; ?>" data-serialnumber="<?php echo $c_name['serial_number']; ?>" data-manufacturer="<?php echo $c_name['manufacturer']; ?>" ><?php  echo $c_name['column_type'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Length:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_dimensions" name="column_dimensions"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Lot/Serial No.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_serial_number" name="column_serial_number"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Manufacturer:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_manufacturer" name="column_manufacturer"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table width="90%" class="inner_table" border="0" cellpadding="8px" align="center">
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Pressure</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_pressure"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Oven Temperature</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_over_temperature"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="mp_flow_rate"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="d_wavelength"></input></td>
                  </tr>
                </table>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System Stability requirements</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-solid: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">From Chromatograms</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" widt="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;">No.</td>
                      <td style="text-align:center;padding:8px;">Retention time (minutes)</td>
                      <td style="text-align:center;padding:8px;">Peak Area</td>
                      <td style="text-align:center;padding:8px;">Asymmetry</td>
                      <td style="text-align:center;padding:8px;">Resolution</td>
                      <td style="text-align:center;padding:8px;">Relative retention time</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="retention_time_one" name="retention_time_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="peak_area_one"0></input></td>
                      <td><input type="text" id="asymmetry_one" name="asymmetry_one"></input></td>
                      <td><input type="text" id="resolution_one" name="resolution_one"></input></td>
                      <td><input type="text" id="relative_retention_time_one" name="relative_retention_time_one"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="retention_time_two" name="retention_time_two" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="peak_area_two" name="peak_area_two" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="asymmetry_two" name="asymmetry_two" onChange="calc_avg_asymmetry()"></input></td>
                      <td><input type="text" id="resolution_two" name="resolution_two" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_two" name="relative_retention_time_two" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="retention_time_three" name="retention_time_three" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="peak_area_three" name="peak_area_three" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="asymmetry_three" name="asymmetry_three" onChange="calc_avg_asymmetry())"></input></td>
                      <td><input type="text" id="resolution_three" name="resolution_three" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_three" name="relative_retention_time_three" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="retention_time_four" name="retention_time_four" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="peak_area_four" name="peak_area_four" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="asymmetry_four" name="asymmetry_four" onChange="calc_avg_asymmetry()"></input></td>
                      <td><input type="text" id="resolution_four" name="resolution_four" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_four" name="relative_retention_time_four" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="retention_time_five" name="retention_time_five" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="peak_area_five" name="peak_area_five" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="asymmetry_five" name="asymmetry_five" onChange="calc_avg_asymmetry()"></input></td>
                      <td><input type="text" id="resolution_five" name="resolution_five" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_five" name="relative_retention_time_five" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="retention_time_six" name="retention_time_six" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="peak_area_six" name="peak_area_six" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="asymmetry_six" name="asymmetry_six" onChange="calc_avg_asymmetry()"></input></td>
                      <td><input type="text" id="resolution_six" name="resolution_six" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_six" name="relative_retention_time_six" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="average_retention_time" name="average_retention_time" onChange="calc_avg_retention_time()"></input></td>
                      <td><input type="text" id="average_peak_area" name="average_peak_area" onChange="calc_avg_peak_area()"></input></td>
                      <td><input type="text" id="average_asymmetry" name="average_asymmetry" onChange="calc_avg_asymmetry()"></input></td>
                      <td><input type="text" id="average_resolution" name="average_resolution" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="average_relative_retention_time" name="average_relative_retention_time" onChange="calc_avg_relative_retention_time()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NLT 3.0%</td>
                      <td style="text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
             <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                   <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_sc_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_sc_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_sc_three"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_c_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_c_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_c_three"></td>
                      
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_s_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_s_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="w_s_three"></td>
                      
                  </tr>
                </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Chromatographic System- As Per System Stability</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><b>Calculations</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Peak Area From Chromatograms-</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" class="inner_table" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Relative retention 95%-105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="std_one" name="std_one"></input></td>
                      <td><input type="text" id="sample_one_one" name="sample_one_one"></input></td>
                      <td><input type="text" id="sample_one_two" name="sample_one_two"></input></td>
                      <td><input type="text" id="sample_one_three" name="sample_one_three"></input></td>
                      <td><input type="text" id="relative_one" name="relative_one"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="std_two" name="std_two" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_two_one" name="sample_two_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_two_two" name="sample_two_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_two_three" name="sample_two_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="relative_two" name="relative_two" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="std_three" name="std_three" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_three_one" name="sample_three_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_three_two" name="sample_three_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_three_three" name="sample_three_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="relative_three" name="relative_three" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="std_four" name="std_four" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_four_one" name="sample_four_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_four_two" name="sample_four_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_four_three" name="sample_four_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="relative_four" name="relative_four" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="std_five" name="std_five" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_five_one" name="sample_five_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_five_two" name="sample_five_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_five_three" name="sample_five_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="relative_five" name="relative_five" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="std_average" name="std_average" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_one_average" name="sample_one_average" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_two_average" name="sample_two_average" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_three_average" name="sample_three_average" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="relative_average" name="relative_average" onChange="calc_avg_relative()"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;"><b>Where:</b></td>
                      <td style="color:#0000ff;padding:8px;">relative retention =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">retention time of peak of interest</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></input></td>
                      <td style="color:#0000ff;padding:8px;">Retention time of reference peak</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
            </tr>
             <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOXPOTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;text-align:center;">PEAK AREA OF STANDARD x WT OF POWDER TAKEN x LABEL CLAIM</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 1 &nbsp;<input type="text" name="determination_one"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 2 &nbsp;<input type="text" name="determination_two"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 3 &nbsp;<input type="text" name="determination_three"></input></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="average"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="equivalent_to"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sd"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rsd"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
                    </tr>
                    <tr>
                      <td>Content</td>
                      <td style="color:#0000ff;padding:8px;">92.5 to 107.5% of the stated amount</input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                    <tr>
                      <td>RSD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Tick</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">System Suitability Sequence</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="sysytem_suitability_sequence" value="Sysytem Suitability Sequence"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="sysytem_suitability_sequence_comment" size="50"></input></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Sample Injection sequence</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="sample_injection_sequence" value="Sample Injection Sequence"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="Sample_injection_sequence_comment" size="50"></input></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Chromatograms Attached</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="chromatograms_attached" value="Chromatograms Attached"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="chromatograms_attached_comment" size="50"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Test</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Chemical/Reagent</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Batch No.</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Manufacturer</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                <table border="0" width="30%" cellpadding="8px" align="center">
                  <tr>    
                    <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:right;">PASS</input></td>
                    <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="pass"></input></td>
                    <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:right;">FAIL</input></td>
                    <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="fail"></input></td>
                  </tr>
                </table>
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
