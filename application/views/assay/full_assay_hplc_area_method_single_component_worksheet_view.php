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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <!--<script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>-->
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
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
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
        <input type="hidden" name="test_type_id" value="<?php echo $query['test_type_id'];?>"></input>
        <tr>
            <td colspan="4" style="text-align:left;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php  echo base_url().'assay/outofspecification/'.$request[0]['a'].'/'.$query['tr'].'/'.$query['test_type_id'];?>"><img src="<?php echo base_url().'images/icons/ot.png';?>" height="25px" width="25px">Raise an Out of Specification Investigation</a></td>
            <td colspan="4" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'].'/'.$query['test_type_id'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table border="0" class="table_form" align="center" cellpadding="8px" width="100%" >
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
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $hplc_area_method_single_component_monograph[0]['serial_number']?></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></td>
                </tr>
            </table>
          </td>
        </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
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
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <?php echo date("d/m/Y");?></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" align="center" class="table_form" cellpadding="8px" width="100%">
                    <tr>
                      <td colspan="2"height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;color: #0000fb;"><b><h5>MONOGRAPH DETAILS</h5></b></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $hplc_area_method_single_component_monograph[0]['monograph'];?></td>
                    </tr>
  
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>HPLC Area Method Single Component Results Worksheet</h5></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Balance Details</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="table_form" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance Make</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component[0]['balance_make']?></td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance ID Number</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component[0]['balance_id']?></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <table border="0" class="table_form" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>    
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 5</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w1'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w2'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w3'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w4'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w5'];?></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_container_w1'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_container_w2'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_container_w3'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_container_w4'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_container_w5'];?></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w1'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w2'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w3'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w4'];?></td>
                      <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w5'];?></td>
                  </tr>
                  <tr>
                    <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Dilution: </td>
                  </tr>
                  <tr>
                    <td colspan="6"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><textarea rows="5" cols="160"><?php echo $hplc_area_method_single_component[0]['dilution_one'];?></textarea></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Preparation:</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">
                <table border="0" class="table_form" width="80%" cellpadding="8px" align="center">
                  <tr>
                    <td>
                      <textarea cols="160" rows="5"><?php echo $hplc_area_method_single_component[0]['weight_of_standard_preparation'];?></textarea>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php echo $hplc_area_method_single_component[0]["standard_description_one"];?></td>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php echo $hplc_area_method_single_component[0]["standard_description_two"];?></td>
                </tr>
                 <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['potency_one'];?></td>
                    <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['potency_two'];?></td>
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_container_of_std_one'];?></td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_container_of_std_two'];?></td>
                  
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_container_of_std_one'];?></td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_container_of_std_two'];?></td>
                    
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_of_standard_one'];?></td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <?php  echo $hplc_area_method_single_component[0]['weight_of_standard_two'];?></td> 
                </tr>
                <tr>
                  <td colspan="4" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                </tr>  
                <tr>
                  <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="dilution_standard_one" row="4" cols="40"><?php  echo $hplc_area_method_single_component[0]['dilution_standard_one'];?></textarea></td>
                  <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="dilution_standard_two" row="4" cols="40"><?php  echo $hplc_area_method_single_component[0]['dilution_standard_two'];?></textarea></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="table_form" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['equipment_make'];?>
                    </td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">ID Number</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component[0]['equipment_id'];?></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
              <td colspan="8" align="center">
                <table class="table_form" width="80%" align="center" cellpadding="8px">
                    <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 5</td>
                    </tr>
                    <tr>
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Sample + container(g)</td>
                        <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w1_two'];?></td>
                        <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w2_two'];?></td>
                        <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w3_two'];?></td>
                        <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w3_two'];?></td>
                        <td  colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_container_w4_two'];?></td>
                      
                    </tr>
                    <tr>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of container(g)</td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_container_w1_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_container_w2_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_container_w3_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_container_w4_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_container_w5_two'];?></td>
                        
                    </tr>
                    <tr>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Sample(g)</td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w1_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w2_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w3_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w4_two'];?></td>
                        <td colspan="0" height="25px" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <?php echo $hplc_area_method_single_component[0]['weight_of_sample_w5_two'];?></td>
                        
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Mobile Phase Preparation:</b></td>
            </tr>
            <tr>
                <td colspan="8" align="center" style="padding:8px;">
                  <table class="table_form" width="80%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="5"><?php echo $hplc_area_method_single_component[0]['mobile_phase_preparation'];?></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System-Suitability requirements</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">From Chromatograms</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="table_form" border="0" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;">No.</td>
                      <td style="text-align:center;padding:8px;">Retention time (minutes)</td>
                      <td style="text-align:center;padding:8px;">Peak Area</td>
                      <td style="text-align:center;padding:8px;">Asymmetry</td>
                      <td style="text-align:center;padding:8px;">Resolution</td>
                      <td style="text-align:center;padding:8px;">Relative retention time</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;">1.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_one'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">2.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_two'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">3.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_three'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">4.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_four'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">5.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_five'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">6.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['retention_time_six'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['peak_area_six'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['asymmetry_six'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['resolution_six'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['relative_retention_time_six'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">Average</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['average_retention_time'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['average_peak_area'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['average_asymmetry'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['average_resolution'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['average_relative_retention_time'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">SD</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['sd_retention_time'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['sd_peak_area'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['sd_asymmetry'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['sd_resolution'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['sd_relative_retention_time'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">RSD</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['rsd_retention_time'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['rsd_peak_area'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['rsd_asymmetry'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['rsd_resolution'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['rsd_relative_retention_time'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NLT 3.0%</td>
                      <td style="padding:4px;text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">Comment</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['comment_retention_time'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['comment_peak_area'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['comment_asymmetry'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['comment_resolution'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_chromatograms[0]['comment_relative_retention_time'];?></td>
                    </tr>
                  </table>
                </td>
            </tr>

            
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic Conditions</b></td>
            </tr>
            <tr>
                <td colspan="8" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="table_form" width="80%" align="center">
                  <tr>
                    <td rowspan="4" align="left" style="color:#000;padding:8px;color: #0000fb;background-color: #ffffff;">
                    -A stainless Steel Column</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Name:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">
                      <?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['name'];?>
                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Length:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['length'];?></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Lot/Serial No.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['lot_serial_number'];?></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Manufacturer:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['manufacturer'];?></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table width="80%" class="table_form" border="0" cellpadding="8px" align="center">
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Pressure</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['column_pressure'];?></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Oven Temperature</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['column_oven_temperature'];?></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['mobile_phase_flow_rate'];?></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $hplc_area_method_single_component_chromatographic_conditions[0]['detection_wavelength'];?></td>
                  </tr>
                </table>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><b>Calculations</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Peak Area From Chromatograms-</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <div class="scroll">
                  <table border="0" class="table_form" width="90%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Sample 4</td>
                      <td style="text-align:center;padding:8px;">Sample 5</td>
                      <td style="text-align:center;padding:8px;">Sample 6</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;">1.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sd_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;border-top:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_one_six'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">2.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sd_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_two_six'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">3.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sd_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_three_six'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">4.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sd_four'];?></input></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_four_six'];?></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">5.</td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sd_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['sample_five_six'];?></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;">Average</td>

                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_std'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_one'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_two'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_three'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_four'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_five'];?></td>
                      <td style="text-align:center;padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_peak_area_chromatograms[0]['average_sample_six'];?></td>

                    </tr>
                  </table>
                </div>
                </td>
            </tr>
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
            </tr>
             <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" class="table_form" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA RATIO OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTO X POTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;padding:8px;text-align:center;">PEAK AREA RATIO OF STANDARD x WT TAKEN x LABEL CLAIM</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" class="table_form" width="90%" cellpadding="8" align="center">
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_one_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_one_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_one_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_one_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_one_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_one'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_one_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_one_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_one_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_two_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_two_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_two_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_two_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_two_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_two'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_two_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_two_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_two_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_three_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_three_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_three_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_three_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_three_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_three'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_three_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_three_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_three_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 4</td>
                    </tr>
                   <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_four_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_four_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_four_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_four_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_four_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_four'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_four_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_four_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_four_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 5</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_five_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_five_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_five_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_five_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_five_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_five'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_five_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_five_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_five_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 6</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_six_pkt'];?> (PKT RATIO) x <?php echo $hplc_area_method_single_component[0]['d_six_wstd'];?> (WSTD)x <?php echo $hplc_area_method_single_component[0]['d_six_awt'];?> (AWT) x 100 x <?php echo $hplc_area_method_single_component[0]['d_six_df'];?> (DF) x <?php echo $hplc_area_method_single_component[0]['d_six_potency'];?>(P)</td>
                      <td style="padding:8px;">=<?php echo $hplc_area_method_single_component[0]['determination_six'];?>(L%)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><?php echo $hplc_area_method_single_component[0]['d_six_pkstd'];?> (PKSTD RATIO) x <?php echo $hplc_area_method_single_component[0]['d_six_wt'];?> (WT) x <?php echo $hplc_area_method_single_component[0]['d_six_lc'];?> (LC)</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="border-bottom:dotted 1px #c4c4ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hplc_area_method_single_component[0]['determination_average'];?></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="border-bottom:dotted 1px #c4c4ff;padding:8px;">Equivalent To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hplc_area_method_single_component[0]['determination_equivalent_to'];?></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="border-bottom:dotted 1px #c4c4ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hplc_area_method_single_component[0]['determination_sd'];?></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="border-bottom:solid 1px #c4c4ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hplc_area_method_single_component[0]['determination_rsd'];?></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="1" class="table_form" width="90%" cellpadding="8px" align="center">
                    <tr>
                      <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;">Content</td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['content_from'];?>% to <?php echo $hplc_area_method_single_component[0]['content_to'];?>% of the stated amount</input></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['content_results'];?></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['content_comment'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;">SD</td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['determination_sd'];?></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['sd_results'];?></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['sd_comment'];?></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;">RSD</td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['determination_rsd'];?></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['rsd_results'];?></td>
                      <td style="text-align:center;padding:8px;"><?php echo $hplc_area_method_single_component[0]['rsd_comment'];?></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" class="table_form" cellpadding="8px" width="80%" align="center">
                    <tr>
                      <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Requirement Selected</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">System Suitability Sequence</td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['system_suitability_sequence_requirement'];?></td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['system_suitability_sequence_comment'];?></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Sample Injection sequence</td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['sample_injection_sequence_requirement'];?></td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['sample_injection_sequence_comment'];?></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Chromatograms Attached</td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['chromatograms_attached_requirement'];?></td>
                      <td style="color:#0000ff;padding:8px;"><?php echo $hplc_area_method_single_component_chromatography_checklist[0]['chromatograms_attached_comment'];?></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>  
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" class="table_form" width="60%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Test</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Chemical/Reagent</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Batch No.</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Manufacturer</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;text-align:center;border-bottom:dottted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_reagents[0]['test'];?></td>
                      <td style="padding:8px;text-align:center;border-bottom:dottted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_reagents[0]['chemical_reagent'];?></td>
                      <td style="padding:8px;text-align:center;border-bottom:dottted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_reagents[0]['batch_number'];?></td>
                      <td style="padding:8px;text-align:center;border-bottom:dottted 1px #c4c4ff;"><?php echo $hplc_area_method_single_component_reagents[0]['manufacturer'];?></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
                <table border="0" class="table_form" width="50%" cellpadding="8px" align="center">
                  <tr>    
                    <td style="color:#00ff00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><b><?php if($hplc_area_method_single_component[0]['choice']==1){echo "TEST PASSED";}else{echo"TEST FAILED";}?></b></td>
                  </tr>
                </table>
            </tr>
            
            <tr>
              <td colspan="8" style="padding:8px;">
                <table border="0" class="table_form" width="80%" cellpadding="8px" align="center">
                  <tr>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;"><?php echo $hplc_area_method_single_component[0]['supervisor'];?></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;"><?php echo $hplc_area_method_single_component[0]['analysis_date'];?></td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" style="padding:4px;">Further Comments:</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:8px;text-align:center;"><textarea cols="140" rows="5" name="further_comments"><?php echo $hplc_area_method_single_component[0]['further_comments'];?></textarea></td>
                  </tr>
                </table>
              </td>
            </tr>
       </table>
</div>
</div>
</body>
</html>
