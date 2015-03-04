<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>  
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
 
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

      if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
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
      <?php echo validation_errors(); ?>
      <?php echo form_open('assay/save_internal_method',array('id'=>'assay_view'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>    
        <input type="hidden" name="test_type_id" value="<?php echo $query['test_type_id'];?>"></input>
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'].'/'.$query['test_type_id'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table class="table_form" border="0" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?><input type="hidden" name="test_specification" value="<?php echo $query['test_specification'];?>"></td>
                  <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
                  <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $query['reference_number'];?></td>
              </tr>
              <tr>
                    <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
                    <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
                    <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
                    <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
                </tr>
                <tr>
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL No.</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $uniformity_monograph_weight_variation_single_component[0]['serial_number']?></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></td>
                </tr>
            </table>
          </td>
        </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table class="table_form" border="0" align="center" cellpadding="8px" width="100%">
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
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" name="analysis_date" value="<?php echo date("d/m/Y");?>"></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Weight Variation Two Components</h5></td>
            </tr>
            
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Assay Results</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>No.</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>weight of Tablet*(g)</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Estimated % content **</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>weight of Tablet*(g)</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Estimated % content **</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>weight of Tablet*(g)</b></td>
                      <td style="text-align:left;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Estimated % content **</b></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="retention_time_one" name="weight_of_tablet_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="estimated_per_content_one"></input></td>
                      <td><input type="text" id="retention_time_one" name="weight_of_tablet_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="estimated_per_content_one"></input></td>
                      <td><input type="text" id="retention_time_one" name="weight_of_tablet_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="estimated_per_content_one"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="weight_of_tablet_two" name="weight_of_tablet_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_two" name="estimated_per_content_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_two" name="weight_of_tablet_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_two" name="estimated_per_content_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_two" name="weight_of_tablet_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_two" name="estimated_per_content_two" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="weight_of_tablet_three" name="weight_of_tablet_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_three" name="estimated_per_content_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_three" name="weight_of_tablet_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_three" name="estimated_per_content_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_three" name="weight_of_tablet_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_three" name="estimated_per_content_three" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="weight_of_tablet_four" name="weight_of_tablet_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_four" name="estimated_per_content_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_four" name="weight_of_tablet_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_four" name="estimated_per_content_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_four" name="weight_of_tablet_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_four" name="estimated_per_content_four" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="weight_of_tablet_five" name="weight_of_tablet_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_five" name="estimated_per_content_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_five" name="weight_of_tablet_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_five" name="estimated_per_content_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_five" name="weight_of_tablet_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_five" name="estimated_per_content_five" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="weight_of_tablet_six" name="weight_of_tablet_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_six" name="estimated_per_content_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_six" name="weight_of_tablet_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_six" name="estimated_per_content_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_six" name="weight_of_tablet_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_six" name="estimated_per_content_six" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">7.</td>
                      <td><input type="text" id="weight_of_tablet_seven" name="weight_of_tablet_seven" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_seven" name="estimated_per_content_seven" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_seven" name="weight_of_tablet_seven" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_seven" name="estimated_per_content_seven" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_seven" name="weight_of_tablet_seven" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_seven" name="estimated_per_content_seven" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">8.</td>
                      <td><input type="text" id="weight_of_tablet_eight" name="weight_of_tablet_eight" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_eight" name="estimated_per_content_eight" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_eight" name="weight_of_tablet_eight" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_eight" name="estimated_per_content_eight" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_eight" name="weight_of_tablet_eight" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_eight" name="estimated_per_content_eight" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">9.</td>
                      <td><input type="text" id="weight_of_tablet_nine" name="weight_of_tablet_nine" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_nine" name="estimated_per_content_nine" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_nine" name="weight_of_tablet_nine" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_nine" name="estimated_per_content_nine" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_nine" name="weight_of_tablet_nine" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_nine" name="estimated_per_content_nine" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">10.</td>
                      <td><input type="text" id="weight_of_tablet_ten" name="weight_of_tablet_ten" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_ten" name="estimated_per_content_ten" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_ten" name="weight_of_tablet_ten" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_ten" name="estimated_per_content_ten" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="weight_of_tablet_ten" name="weight_of_tablet_ten" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="estimated_per_content_ten" name="estimated_per_content_ten" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td style="color:#0000ff;"><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()" disabled></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()" disabled></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()" disabled></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic Conditions</b></td>
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
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Pressure</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_pressure"/> <select name="column_pressure_units">
                      <option></option><option value="Bar">Bar</option><option value="MPA">MPA</option><option value="PSI">PSI</option></select></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Oven Temperature</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_oven_temperature"/> <select name="column_oven_temperature_units">
                      <option></option><option value="Celsius">Celsius</option><option value="Fahrenheit">Fahrenheit</option><select></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate (ml/min)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_mp_flow_rate"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength (nm)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_detection_wavelength"></input></td>
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
                  <table border="0" class="inner_table" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Internal Std</td>
                      <td style="text-align:center;padding:8px;">Ratio Std/IS</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Internal Std</td>
                      <td style="text-align:center;padding:8px;">Ratio Samples/IS</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Internal Std</td>
                      <td style="text-align:center;padding:8px;">Ratio Samples/IS</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Internal Std</td>
                      <td style="text-align:center;padding:8px;">Ratio Samples/IS</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" class="std" name="std_one" size="10"></input></td>
                      <td><input type="text" class="internal_std_one" name="internal_std_a_one" size="10"></input></td>
                      <td><input type="text" class="ratio_std_one" name="ratio_std_a_one" size="10"></input></td>

                      <td><input type="text" class="sample_one" name="sample_a_one" size="10"></input></td>
                      <td><input type="text" class="internal_std_two" name="internal_std_b_one" size="10"></input></td>
                      <td><input type="text" class="ratio_std_two" name="ratio_std_b_one" size="10"></input></td>

                      <td><input type="text" class="sample_two" name="sample_b_one" size="10"></input></td>
                      <td><input type="text" class="internal_std_three" name="internal_std_c_one" size="10"></input></td>
                      <td><input type="text" class="ratio_std_three" name="ratio_std_c_one" size="10"></input></td>

                      <td><input type="text" class="sample_three" name="sample_c_one" size="10"></input></td>
                      <td><input type="text" class="internal_std_four" name="internal_std_d_one" size="10"></input></td>
                      <td><input type="text" class="ratio_std_four" name="ratio_std_d_one" size="10"></input></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" class="std" name="std_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_one" name="internal_std_a_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_one" name="ratio_std_a_two" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_one" name="sample_a_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_two" name="internal_std_b_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_two" name="ratio_std_b_two" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_two" name="sample_b_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_three" name="internal_std_c_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_three" name="ratio_std_c_two" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_three" name="sample_c_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_four" name="internal_std_d_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_four" name="ratio_std_d_two" onChange="" size="10"></input></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" class="std" name="std_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_one" name="internal_std_a_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_one" name="ratio_std_a_three" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_one" name="sample_a_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_two" name="internal_std_b_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_two" name="ratio_std_b_three" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_two" name="sample_b_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_three" name="internal_std_c_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_three" name="ratio_std_c_three" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_three" name="sample_c_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_four" name="internal_std_d_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_four" name="ratio_std_d_three" onChange="" size="10"></input></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" class="std" name="std_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_one" name="internal_std_a_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_one" name="ratio_std_a_four" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_one" name="sample_a_four" onChange=" " size="10"></input></td>
                      <td><input type="text" class="internal_std_two" name="internal_std_b_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_two" name="ratio_std_b_four" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_two" name="sample_b_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_three" name="internal_std_c_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_three" name="ratio_std_c_four" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_three" name="sample_c_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_four" name="internal_std_d_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_four" name="ratio_std_d_four" onChange="" size="10"></input></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" class="std" id="std_five" name="std_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_one" id="internal_std_a_five" name="internal_std_b_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_one" id="ratio_std_a_five" name="ratio_std_five_one" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_one" id="sample_a_five" name="sample_a_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_two" id="internal_std_b_five" name="internal_std_b_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_two" id="ratio_std_b_five" name="ratio_std_five_two" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_two" id="sample_b_five" name="sample_d_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_three" id="internal_std_c_five" name="internal_std_c_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_three" id="ratio_std_c_five" name="ratio_std_five_three" onChange="" size="10"></input></td>

                      <td><input type="text" class="sample_three" id="sample_c_five" name="sample_c_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="internal_std_four" id="internal_std_d_five" name="internal_std_d_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="ratio_std_four" id="ratio_std_d_five" name="ratio_std_five_four" onChange="" size="10"></input></td>

                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>

                      <td><input type="text"  class="std_average" id="std_average" name="std_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="internal_std_one_average" id="internal_std_a_average" name="internal_std_a_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="ratio_std_one_average" id="ratio_std_a_average" name="ratio_std_a_average" onChange="" size="10" disabled></input></td>

                      <td><input type="text"  class="sample_one_average" id="sample_a_average" name="sample_a_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="internal_std_two_average" id="internal_std_b_average" name="internal_std_b_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="ratio_std_two_average" id="ratio_std_b_average" name="ratio_std_b_average" onChange="" size="10" disabled></input></td>

                      <td><input type="text"  class="sample_two_average" id="sample_b_average" name="sample_b_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="internal_std_three_average" id="internal_std_c_average" name="internal_std_c_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="ratio_std_three_average" id="ratio_std_c_average" name="ratio_std_c_average" onChange="" size="10" disabled></input></td>

                      <td><input type="text"  class="sample_three_average" id="sample_c_average" name="sample_c_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="internal_std_four_average" id="internal_std_d_average" name="internal_std_d_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="ratio_std_four_average" id="ratio_std_d_average" name="ratio_std_d_average" onChange="" size="10" disabled></input></td>

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
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA RATIO OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOR X POTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;padding:8px;text-align:center;">(PEAK AREA RATIO OF STANDARD x WT TAKEN x LABEL CLAIM</td>
                    </tr>
                  </table>
                </td>
                
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><input type="text" id="a" name="a" size="5"> x <input type="text" id="b" name="b" size="5"> =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><input type="text" id="d_factor" name="d_factor" size="5" disabled> Dilution Factor</td>
                    </tr>
                    <tr>
                      <td style="color:#0000ff;text-align:center;padding:8px;"><input type="text" id="factor" name="factor" onChange="calc_d_factor()" size="5"></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_one_pkt" name="d_one_pkt"  placeholder="(PKT)" size="5"/ disabled> x <input type="text" id="d_one_wstd" name="d_one_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_one_awt" name="d_one_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_one_df" name="d_one_df" placeholder="(DF)" size="5" disabled/> x <input type="text" id="d_one_potency" name="d_one_potency" placeholder="(P)" size="5" disabled/></td>
                      <td style="padding:8px;">=<input type="text" id="d_one_p_lc" name="d_one_p_lc" onCHange="calc_determination()" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_one_pkstd" name="d_one_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_one_wt" name="d_one_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_one_lc" name="d_one_lc" placeholder="(LC)" size="5" onCHange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_two_pkt" name="d_two_pkt"  placeholder="(PKT)" size="5" onChange="calc_determination()" disabled/> x <input type="text" id="d_two_wstd" name="d_two_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_two_awt" name="d_two_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_two_df" name="d_two_df" placeholder="(DF)" size="5" disabled/> x <input type="text" id="d_two_potency" name="d_two_potency" placeholder="(P)" size="5" disabled></td>
                      <td style="padding:8px;">=<input type="text" id="d_two_p_lc" name="d_two_p_lc" onCHange="calc_determination()" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_two_pkstd" name="d_two_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_two_wt" name="d_two_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_two_lc" name="d_two_lc" placeholder="(LC)" size="5" /></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_three_pkt" name="d_three_pkt"  placeholder="(PKT)" size="5" onChange="calc_determination()" disabled/> x <input type="text" id="d_three_wstd" name="d_three_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_three_awt" name="d_three_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_three_df" name="d_three_df" placeholder="(DF)" size="5" disabled/> x <input type="text" id="d_three_potency" name="d_three_potency" placeholder="(P)" size="5" disabled/></td>
                      <td style="padding:8px;">=<input type="text" id="d_three_p_lc" name="d_three_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_three_pkstd" name="d_three_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_three_wt" name="d_three_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_three_lc" name="d_three_lc" placeholder="(LC)" size="5" /></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_average" name="determination_average"  disabled></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">Equivalent To &nbsp;<input type="hidden" id="equivalent_to_lc"/><input type="text" id="determination_equivalent_to" name="determination_equivalent_to" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">Range %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="det_min" name="range_det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled></input> - <input type="text" id="det_max" name="range_det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">SD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_sd" name="determination_sd" disabled></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">RSD %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_rsd" name="determination_rsd"  disabled></input></td>
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
                      <td><input type="checkbox" id="min">Not Less than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance" placeholder="min%" size="5"  onChange="calc_determination()" /></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="nlt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance_comment" name="min_tolerance_comment" disabled/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="max">Not Greater than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance" placeholder="max%" size="5"  onChange="calc_determination()"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="ngt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
                      <td style="color:#00ff00;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance_comment" name="max_tolerance_comment" disabled/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="range">Tolerance Range</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="new_min_tolerance_det" name="content_from" placeholder="min%" size="5" onChange="calc_determination()"> - <input type="text" range="tolerance_range" id="new_max_tolerance_det" name="content_to" placeholder="max%" size="5" onChange="calc_determination()"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_tolerance_comment" name="range_tolerance_comment" disabled/></td>
                    </tr>
                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_sd" name="determination_sd"  disabled/></td>
                      <td style="padding:8px;"><input type="text" name="sd_results"></input></td>
                    </tr>
                    <tr>
                      <td>RSD %</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_rsd" name="determination_rsd"  disabled/></td>
                      <td style="padding:8px;"><input type="text" name="rsd_comment" disable/></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" cellpadding="8px" width="80%" align="center">
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
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
                <table border="0"  class="table_form" width="100%" cellpadding="8px" align="center">
                  <tr>    
                    <td style="color:#00CC00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" id="test_conclusion" name="test_conclusion" size="30" disabled/></td>
                  </tr>
                </table>
            </tr>
            
            <tr>
              <td colspan="8" style="padding:8px;">
                <table  class="table_form"border="0" width="100%" cellpadding="8px" align="center">
                  <tr>
                    <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:left;">Done By <input type="hidden" id="done_by" name="done_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
                    <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date Conducted <input type="hidden"  id="date" name="date_done" value="<?php echo date("d/m/Y")?>"><?php echo date("d/M/Y")?></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:left;">Approved By <input type="text" id="supervisor" name="supervisor"></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date Approved <input type="text"  id="datepicker" name="date_appproved"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:4px;">Further Comments:</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5" name="further_comments"></textarea></td>
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
<script>
$(document).ready(function() {
        
      $(".std").keyup(function(){
        var text_avg_std = $("#std_average").val();

        $("#d_one_pkstd").val(text_avg_std);$("#d_two_pkstd").val(text_avg_std);$("#d_three_pkstd").val(text_avg_std);   

        }); 

       $(".sample_one").keyup(function(){
        var text_avg_sample_one = $("#sample_a_average").val();
        $("#d_one_pkt").val(text_avg_sample_one);

        }); 

       $(".sample_two").keyup(function(){
        var text_avg_sample_two = $("#sample_b_average").val();  
        $("#d_two_pkt").val(text_avg_sample_two); 
         
        });

       $(".sample_three").keyup(function(){
        var text_avg_sample_three = $("#sample_c_average").val(); 
        $("#d_three_pkt").val(text_avg_sample_three); 
         
        });

       $("#potency_one").keyup(function(){
        var text_potency = $("#potency_one").val();
        $("#d_one_potency").val(text_potency); $("#d_two_potency").val(text_potency);$("#d_three_potency").val(text_potency); 
         
        });


        $("#factor").change(function(){
        var text_df = $("#d_factor").val();    

        $("#d_one_df").val(text_df);$("#d_two_df").val(text_df); $("#d_three_df").val(text_df);
        }); 

        $("#d_one_lc").change(function(){

        var text_wstd = $("#d_one_wstd").val();
        var text_awt = $("#d_one_awt").val();     
            
        var text_wt = $("#d_one_wt").val();     
        var text_lc = $("#d_one_lc").val();     

        $("#d_two_wstd").val(text_wstd);$("#d_two_awt").val(text_awt);$("#d_two_wt").val(text_wt);$("#d_two_lc").val(text_lc);$("#equivalent_to_lc").val(text_lc);
        $("#d_three_wstd").val(text_wstd);$("#d_three_awt").val(text_awt);$("#d_three_wt").val(text_wt);$("#d_three_lc").val(text_lc);
        }); 
    });
</script>
<script>
  $('#min').change(function() {
    if($('#min').is(':checked')){
       $("input[min='min_tolerance']").show();
       $("#max").prop('disabled', true);
       $("#range").prop('disabled', true);

    } else {
        $("input[min='min_tolerance']").hide();
        $("#max").prop('disabled', false);
        $("#range").prop('disabled', false);
    }
  }).change();
  $('#max').change(function() {
    if($('#max').is(':checked')){
       $("input[max='max_tolerance']").show();
       $("#min").prop('disabled', true);
       $("#range").prop('disabled', true);
    } else {
        $("input[max='max_tolerance']").hide();
        $("#min").prop('disabled', false);     
        $("#range").prop('disabled', false);
    }
  }).change();
  $('#range').change(function() {
    if($('#range').is(':checked')){
       $("input[range='tolerance_range']").show();
       $("#max").prop('disabled', true);
       $("#min").prop('disabled', true);
    } else {
        $("input[range='tolerance_range']").hide();
        $("#max").prop('disabled', false);
        $("#min").prop('disabled', false);
    }
  }).change();
</script>
</html>
