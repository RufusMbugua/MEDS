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
  <!--<script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>-->
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
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
      var equipmentid=$(this).find(":selected").data("equipmentid");
      $("#equipmentid").val(equipmentid);
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
    <div id="form_wrapper">
     <div id="forms">
      <?php echo validation_errors(); ?>
      <?php echo form_open('out_of_specification/save',array('id'=>'out_of_specification_view'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
        <input type="hidden" name="test_type_id" value="<?php echo $query['test_type_id'];?>"></input>
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$request[0]['a'].'/'.$query['tr'].'/'.$query['test_type_id'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Worksheet View</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table border="0" class="table_form" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Document: Form</td>
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: Out of Specification Investigation</td>
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
                  <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="text" name="reference_number" id="reference_number"></td>
              </tr>
              <tr>
                    <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE:</td>
                    <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;"><?php echo date("d/m/Y")?></td>
                    <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">REVISION NUMBER</td>
                     <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
                </tr>
                <tr>
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
                    <td colspan="0" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Jane Masiga</td>
                    <td colspan="0" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">USER TYPE</td>
                    <td colspan="0" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Head of Operations</td>
                </tr>
                <!-- <tr>
                    <td colspan="0" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL No.</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $hplc_internal_method[0]['serial_number']?></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></td>
                </tr> -->
            </table>
          </td>
        </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>A. Results</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;">Sample Name:</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;text-align:left;background-color:#ffffff;"><?php echo $query['active_ingredients'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analytical procedure:</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $hplc_internal_monograph[0]['monograph'];?></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>B. NATURE OF OUT OF SPECIFICATION (Tick Appropriately)</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="measurement_out_side_linear_range" value="Measurement out side linear range"> Measurement Out Side linear Range</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="values_below_limit_of_detection_or_quantitation" value="Values Below Limit of Detection or Quantitation"> Values Below Limit of Detection or Quantitation</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="blank_value_ignored" value="Blank Value Ignored"> Blank Value Ignored</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="environmental_conditions" value="Environmental Conditions"> Environmental Conditions (Inadequate Temperature, Moisture etc)</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="system_suitability_test_missing_or_failed" value="System Suitability Test Missing or Failed"> System Suitability Test Missing or Failed</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="instrument_calibration_missing" value="Instrument Calibration Missing"> Instrument Calibration Missing</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="wrong_instrument_parameters" value="Wrong Instrument Parameters"> Wrong Instrument Parameters</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="wrong_instrument_used" value="Wrong Instrument Used"> Wrong Instrument Used</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="deviation_from_the_specified_method" value="Deviation From The Specified Method"> Deviation From The Specified Method</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>C. Wrong Method Used</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="measurement_out_side_linear_range" value="Measurement out side linear range"> Measurement Out Side linear Range</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>D. Mistakes of General Character</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="weighing_error" value="Weighing Error"> Weighing Error</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="use_of_wrong_reagents" value="Use of Wrong Reagents"> Use of Wrong Reagents</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="impurity_of_solvents" value="Impurity of Solvents"> Impurity of Solvents</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="improper_storage_of_reagents" value="Improper Storage of Reagents"> Improper Storage of Reagents</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="improper_storage_of_solutions" value="Improper Storage of Solutions"> Improper Storage of Solutions</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="solutions_or_reaggents_expired" value="Solutions or Reagents Expired"> Solutions or Reagents Expired</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="reagents_not_dissolved_completely" value="Reagents Not Dissolved Completely"> Reagents Not Dissolved Completely</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="error_during_filtration" value="Error During Filtration"> Error During Filtration</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="carry_over_of_reagents" value="Carry Over of Reagents"> Carry Over of Reagents</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>E. Mistakes With Standards</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="wrong_reference_standard_used" value="Wrong Reference Standard Used"> Wrong Reference Standard Used</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="reference_standard_without_required_quality_used" value="Reference Standard Without Required Quality Used"> Reference Standard Without Required Quality Used</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="dilution_error_with_standard_solutions" value="Dilution Error With Standard Solutions"> Dilution Error With Standard Solutions</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="inappropriate_storage_of_reference_standard" value="Inappropriate Storage of Referance Standard"> Inappropriate Storage of Referance Standard</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="reference_standard_expired" value="Reference Standard Expired"> Reference Standard Expired</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="carry_over_of_reagents_two" value="Carry Over of Reagents"> Carry Over of Reagents</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>G. Mistakes In Result Calculation</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="calculation_error" value="Calculation Error"> Calculation Error</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="wrong_formula" value="Wrong Formula"> Wrong Formula</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="wrong_factor_used" value="Wrong Factor Used"> Wrong Factor Used</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="data_transfer_error" value="Data Transfer Error"> Data Transfer Error</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>H. Mistakes In Pipetting or Dilution</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="glassware_or_popetting_device_with_wrong_volume" value="Glassware or Pipetting Device With Wrong Volume"> Glassware or Pipetting Device With Wrong Volume</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="pipettes_with_broken_top" value="Pipettes With Broken Top"> Pipettes With Broken Top</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="uncalibrated_or_substandard_glassware" value="uncalibrated_or_substandard_glassware"> Uncalibrated or Substandard Glassware</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="dilution_error" value="dilution_error"> Dilution Error</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="carry_over" value="Carry Over"> Carry Over</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>E. Other Possible Reasons For OOS-Results</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><textarea name="other_reasons" rows="5" cols="170"></textarea></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>E. Conclusion</b></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="reasons_found" value="During The Present Failure investigation, The Reasons for the OOS Result Were Found"> During The Present Failure investigation, The Reason(s) for The OOS Result Were Found</td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-top:solid 1px #bfbfbf;border-bottom:dotted 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="checkbox" name="no_reasons_found" value="During The Present Failure investigation, No Reasons for the OOS Result Were Found"> During The Present Failure investigation, No Reason(s) for The OOS Result Were Found</td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table border="0" class="table_form" width="100%" cellpadding="8px" align="center">
                  <tr>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Investigated By <input type="text" id="investigated_by" name="investigated_by"></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date <input type="date"  id="date_investigated" name="date_investigated"></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Approved By <input type="text" id="approved_by" name="approved_by"></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date <input type="date"  id="date_approved" name="date_approved"></td>
                  </tr>
                </table>
              </td>
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
