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
  
  <!-- bootstrap reference links  
  <link href="<?php echo base_url().'bootstrap/css/bootstrap-theme.css.map';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'bootstrap/css/bootstrap-theme.min.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css.map'; ?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'bootstrap/css/bootstrap-theme.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css"/>  
   -->
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  
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
   </script>
  </head>
  <body>
      <?php
   $user=$this->session->userdata;
   $test_request_id=$user['logged_in']['test_request_id'];
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=1;
   //var_dump($user);
  ?>  
  <div id="header"> 
  <div id="logo" style="padding:8px;color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="35px" width="40px"/><b>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</b></div>
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
         <td height="10px"  style="border-bottom: solid 1px #c4c4ff;padding:8px;background-color: #ffffff;"></td>
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
              <li><a href="<?php echo base_url().'account_settings/index/'.$test_request_id.'/'.$user_type_id.'/'.$user_id.'/'.$department_id;?>"><i class="icon-wrench"></i> Settings <img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"></a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url().'home/logout'?>"><i class="icon-share"></i>Logout</b> <img src="<?php echo base_url().'images/icons/door.png';?>" height="25px" width="25px"></a></li>
            </ul>
          </div>
        </td>
      </tr>
  </table> 
  </div>
</div>
<div id="form_wrapper">
 <div id="forms">
<?php echo form_open('test_dissolution/worksheet_enteric_coated_hplc', array('id'=>'test_dissolution_view'));?>
  <table width="75%"  class="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <tr>
       <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
      <td colspan ="6" style="padding:8px;">
       <table width="100%" class="table_form" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
       <tr>
          <td colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
          <td colspan="6" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
      </tr>
      <tr>    
          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
          <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
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
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number'] ;?></td>          
      </tr>
      <tr>
            <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
            <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">USER TYPE</td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $user['logged_in']['role'];?></td>
      </tr> 
      </table>   
    </td>
    </tr>
    <tr>
      <td colspan="6" align="center" style="padding:8px;">
        <table border="0" align="center" class="table_form" cellpadding="8px" width="100%">
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Registration Number: <?php echo $results['laboratory_number'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Request Date: <?php echo $results['date_time'];?></td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Label Claim: <?php echo $results['active_ingredients'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Brand Name: <?php echo $results['brand_name'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Method/Specifications: <?php echo $results['test_specification'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Details:<br><br> <?php echo $results['manufacturer_name'];?><br><?php echo $results['manufacturer_address'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Clients Details:<br><br> <?php echo $results['applicant_name'];?><br><?php echo $results['applicant_address'];?> </td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Date: <?php echo $results['date_manufactured'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Expiry Date: <?php echo $results['expiry_date'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis Start Date: <?php echo date("d/m/Y")?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" value="<?php echo date("d/m/Y");?>"></td>
            </tr>
        </table>
      </td>
    </tr>  
    <tr>
        <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"> MEDS Dissolution Test Form: Enteric Coated Capsules</td>
    </tr>       
     <tr> 
      <td colspan ="6" align ="left" style="padding: 12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"> <b>Monograph</b></td>
     </tr> 
     <tr> 
      <td colspan ="6" align ="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid #f0f0ff;"><?php echo $query_monograph['monograph'];?> </td>
     </tr> 
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['equipment_make'];?></td>          
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['equipment_number'];?></td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Preparation of Dissolution Medium</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['dissolution_prepaparation'];?></td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Dissolution System Setup</b></td>
      </tr>
      <tr>
        <td align = "center" colspan = "2"style="padding: 8px;" ><b>Requirements</b></td><td align = "center"style="padding: 8px;" ><b>Actual</b></td><td align = "left"style="padding: 8px;" colspan = "6"><b>Comment</b></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Apparatus</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <?php echo $query_e['apparatus'];?></td>
        <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <?php echo $query_e['actual_apparatus'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $query_e['apparatus_comment'];?></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Rotation</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rotation'];?></td>
        <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_rotation'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rotation_comment'];?></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Time</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['time'];?></td>
        <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_time'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['time_comment'];?></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Temperarture</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['temperature'];?></td>
        <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['actual_temperature'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['temperature_comment'];?></td>
      </tr> 
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['balance_make'];?></td>         
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['balance_number'];?></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_weight'];?></td>
      </tr>
      <tr>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_description'];?></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['potency'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['lot_no'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['id_no'];?></td>
      </tr>
       <tr>
        <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_container'];?></td>
     </tr>
       <tr>
        <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['container'];?> </td>
     </tr>
       <tr>
        <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight_1'];?></td>
       </tr>  
      <tr>  
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="5" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_dilution'];?></td>
      </tr>
      <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Sample Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['sample_preparation'];?></td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution Factor</td>
        <td colspan ="" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_dilution'];?></td>
      </tr>    
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Determination of content- HPLC</b></td>
      </tr> 
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" >System suitability </td>
      </tr> 
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['mobile_phase'];?></td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>The chromatographic conditions:</b></td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Chromatographic System</b></td>
      </tr>
      <tr>
        <td rowspan = "2" colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>A stainless steel column:</b></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Name:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['name'];?></td>       
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Length:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"><?php echo $query_e['length'];?></td>
      </tr> 
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot/Serial No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['serial_no'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Manufacturer:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"><?php echo $query_e['manufacturer'];?> </td>
      </tr>
      <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Pressure:</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"<?php echo $query_e['column_pressure'];?>> </td>
       </tr>
      <tr>
        <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Oven Temperature:</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['column_oven_pressure'];?></td>       
      </tr>
      <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Mobile Phase Flow rate:</td>
        <td colspan ="2"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['flow_rate'];?></td>       
      </tr>
      <tr>
        <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Detection of Wavelength:</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['wavelength'];?></td>       
      </tr>  
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Suitability summary</b><br/>From chromatograms on -  </td>
      </tr> 
      <tr>
        <td colspan ="6">
        <table align="center" width="80%" cellpadding="8px" class="inner_table" border="0">      
          <tr>
            <td align="center" style="padding:8px;"><b>No.</b></td>
            <td align="center" style="padding:8px;"><b>Retention Time (minutes)</b></td>
            <td align="center" style="padding:8px;"><b>Peak Area</b></td>
            <td align="center" style="padding:8px;"><b>Asymmetry</b></td>
            <td align="center" style="padding:8px;"><b>Resolution</b></td>
          </tr>
       
         <tr>
            <td align="center"style="padding: 8px;">1.</td>
            <td align="center"align="center"align="center"style="padding: 8px;"><?php echo $query_e['rt_1'];?></td>
            <td align="center"align="center"align="center"style="padding: 8px;"><?php echo $query_e['peak_area_1'];?></td>
            <td align="center"align="center"align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_1'];?></td>
            <td align="center"align="center"align="center"style="padding: 8px;"><?php echo $query_e['resolution_1'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">2.</td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['rt_2'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['peak_area_2'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_2'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['resolution_2'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">3.</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_3'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_3'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_3'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_3'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">4.</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_4'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_4'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_4'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_4'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">5.</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_5'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_5'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_5'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_5'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">6.</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_6'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_6'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_6'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_6'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Average</td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['rt_avg'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['peak_area_avg'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_avg'];?></td>
            <td align="center"align="center"style="padding: 8px;"><?php echo $query_e['resolution_avg'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">SD</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_sd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_sd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_sd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_sd'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">RSD</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_rsd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_rsd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_rsd'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_rsd'];?></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Acceptance Criteria</td>
            <td align="center"align="center"style="padding: 8px;">NMT 2.0%</td>
            <td align="center"align="center"style="padding: 8px;">NMT 2.0%</td>
            <td align="center"align="center"style="padding: 8px;">NMT 2.0%</td>
            <td align="center"align="center"style="padding: 8px;">NLT 5.0%</td>
            
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Comment</td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['rt_comment'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['peak_area_comment'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['asymmetry_comment'];?></td>
            <td align="center"style="padding: 8px;"><?php echo $query_e['resolution_comment'];?></td>
          </tr>
        </table>
      </td>
      </tr>
      <tr>
        <td align="center" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Acid Stage</td>
      </tr>
      <tr>
      <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
        <tr>
          <td colspan="6" style="padding:8px;">
            <div class="scroll">
            <table border="0" class="inner_table" cellpadding="8px" align="center">
              <tr>
                <td><b></b></td>
                <td align="center" style="padding: 8px;"><b>Std 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
              </tr>
           
              <tr>
                <td align="center"style="padding: 8px;">1.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_1_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">2.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_2_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">3.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_3_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">4.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_4_s6'];?></td>
              </tr>
               <tr>
                <td align="center"style="padding: 8px;">5.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['sample_5_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Average</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['avg_s6'];?></td>
              </tr>
         </table>
        </div>
       </td>
      </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_1_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_1_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_1_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_1_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_1_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_1_lc'];?></td>
        <td> =&nbsp &nbsp<?php echo $query_determination['determination_1'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_2_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_2_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_2_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_2_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_2_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_2_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['determination_2'];?>% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_3_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_3_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_3_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_3_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_3_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_3_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['determination_3'];?>% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_4_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_4_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_4_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_4_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_4_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_4_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['determination_4'];?>% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_5_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_5_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_5_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_5_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_5_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_5_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['determination_5'];?>% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['det_6_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_6_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_6_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_6_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['det_6_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['det_6_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['determination_6'];?>% LC </td>
      </tr> 
      <tr> 
        <td align="center"colspan ="6"style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td align="center" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Buffer Stage</td>
      </tr>
      <tr>
      <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
        <tr>
          <td colspan="6" style="padding:8px;">
            <div class="scroll">
            <table border="0" class="inner_table" cellpadding="8px" align="center">
              <tr>
                <td><b></b></td>
                <td align="center" style="padding: 8px;"><b>Std 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
              </tr>
           
              <tr>
                <td align="center"style="padding: 8px;">1.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_1_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">2.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_2_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">3.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_3_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">4.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_4_s6'];?></td>
              </tr>
               <tr>
                <td align="center"style="padding: 8px;">5.</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_sample_5_s6'];?></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Average</td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s1'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s2'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s3'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s4'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s5'];?></td>
                <td style="padding: 8px;"><?php echo $sql_dissolution_sample['buffer_avg_s6'];?></td>
              </tr>
         </table>
        </div>
       </td>
      </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_1_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_1_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_1_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_1_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_1_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_1_lc'];?></td>
        <td> =&nbsp &nbsp<?php echo $query_determination['buffer_determination_1'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_2_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_2_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_2_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_2_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_2_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_2_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['buffer_determination_2'];?>% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_3_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_3_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_3_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_3_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_3_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_3_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['buffer_determination_3'];?>% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_4_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_4_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_4_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_4_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_4_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_4_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['buffer_determination_4'];?>% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_5_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_5_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_5_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_5_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_5_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_5_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['buffer_determination_5'];?>% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <?php echo $query_determination['buffer_det_6_pkt'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_6_wstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_6_df'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_6_potency'];?> x 100 <br/><br/>
          <?php echo $query_determination['buffer_det_6_pkstd'];?>&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;
          <?php echo $query_determination['buffer_det_6_lc'];?></td>        
        <td>=&nbsp &nbsp <?php echo $query_determination['buffer_determination_6'];?>% LC </td>
      </tr> 
      <tr> 
        <td align="center"colspan ="6"style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> </td>
      </tr>
      
      <tr> 
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['average'];?></td>
    
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['equivalent'];?></td>
      </tr>
      <tr> 
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> from <?php echo $query_e['range_min'];?> to <?php echo $query_e['range_max'];?></td>
      
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['rsd'];?></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
          <table border="0" cellpadding="8px" width="60%" align="center">
            <tr>
              <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Tick</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">System Suitability Sequence</td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['sysytem_suitability_sequence'];?></td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['sysytem_suitability_sequence_comment'];?></td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">Sample Injection sequence</td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['sample_injection_sequence'];?></td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['sample_injection_sequence_comment'];?></td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">Chromatograms Attached</td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['chromatograms_attached'];?></td>
              <td style="color:#000;padding:8px;"><?php echo $query_e['chromatograms_attached_comment'];?></td>
            </tr>
          </table>
        </td>
       </tr>         
      <tr>
        <td colspan="8"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><?php echo $query_e['choice'];?></td>
         <tr>
       <td colspan="8" style="padding:8px;">
        <table border="0" width="90%" cellpadding="8px" align="center">
          <tr>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Analyst <?php echo $query_e['supervisor'];?></td>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date <?php echo $query_e['date'];?></td>
          </tr>
          
          <tr>
            <td colspan="2" style="padding:4px;">Further Comments:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding:4px;text-align:center;"><?php echo $query_e['further_comments'];?></td>
          </tr>
        </table>
      </td>
    </tr>
    </table>
   </form> 
 </div>
</div>
  </body>
  </html>