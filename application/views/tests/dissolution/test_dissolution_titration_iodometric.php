<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/query.tooltip.css';?>" rel="stylesheet" type="text/css"/>
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
  <!--<script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>-->
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
    tinymce.init({
      selector: "textarea"
     });
      
    
    $("#column_name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#column_dimensions").val(dimensions);
      $("#column_serial_number").val(serial_number);
      $("#column_manufacturer").val(manufacturer);
    });
   

        // key up event to trigger computation 
  $('.compute').keyup(function() {

      var total=0;
      var class_="."+$(this).attr('id');

      var count=1;
      $(class_).each(function() {
       
     if(count==1){
          total= parseInt($(this).val());
         }else{
           total= total-parseInt($(this).val());
         }
         count=count+1;
   });
       $(class_+"_total").val(total);
       //alert(class_+"_total");
  });
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
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; 

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
      <?php echo form_open('assay/save_titration_other',array('id'=>'assay_titration_other_view'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type ="hidden" id = "label_claim" value=" <?php echo $results['label_claim'];?>">

        <tr>
        <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="6" align="center" style="padding:8px;">
            <table border="0" align="center" class="table_form" cellpadding="8px" width="100%" >
              <tr>
                  <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td colspan="0" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients']." "." ".$results['test_specification'];?></td>
                  <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
                  <td colspan="0" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'];?></td>
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
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number']?></input></td>
                </tr>
            </table>
          </td>
        </tr>
            <tr><td colspan="6" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="6" align="center" style="padding:8px;">
                <table border="0" align="center" class="table_form" cellpadding="8px" width="100%">
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Registration Number: <?php echo $results['laboratory_number'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Request Date: <?php echo $results['date_time'];?></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Label Claim: <?php echo $results['active_ingredients'];?></td>
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
            <tr><td colspan="6" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="6" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Dissolution - Iodometric Titration of Penicillins </h5></td>
            </tr>
            <tr>
              <td colspan="6" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Balance Details</b></td>
          </tr>
          <tr>
              <td colspan="6" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
                  <tr>
                   <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance ID Number</td>
                   <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="equipment_id" name="balance_id" >
                      <option selected></option>
                       <?php
                       foreach($query_e as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['id_number'];?>" data-equipmentbalance="<?php echo $bl_name['description']; ?>"><?php  echo $bl_name['id_number'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance Make</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="80" id="equipmentbalance" name="equipmentbalance"></input></td>
                    
                  </tr>
                </table>
              </td>
            </tr>            
            <tr>
              <td colspan="6" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Blank Titration Preparation:</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="padding:8px;">
                  <table class="inner_table" width="90%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="6" type="text" name="blank_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
           <tr>
            <td colspan="1" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume of solution</td>
            <td colspan="2" align = "center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="8" id="solution_volume_one" name="solution_volume_one"></input></td>
            <td colspan="1" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Factor</td>
            <td colspan="2" align = "center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="8" id="factor_one" name="solution_volume_one"></input></td>
           </tr>
           <tr>
            <td colspan="1" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">against volume of solution</td>
            <td colspan="2" align = "center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="8" id="solution_volume_two" name="solution_volume_one"></input></td>
            <td colspan="1" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Factor</td>
            <td colspan="2" align = "center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="8" id="factor_two" name="solution_volume_one"></input></td>
            </tr>
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Final Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_one" name="final_burette_volume_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_two" name="final_burette_volume_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_three" name="final_burette_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_four" name="final_burette_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_five" name="final_burette_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="final_burette_volume_six" name="final_burette_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Initial Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_one" name="initial_burette_volume_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_two" name="initial_burette_volume_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_three" name="initial_burette_volume_three" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_four" name="initial_burette_volume_four" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_five" name="initial_burette_volume_five" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="initial_burette_volume_six" name="initial_burette_volume_six" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume Used(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_one" name="volume_used_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_two" name="volume_used_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_three" name="volume_used_three" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_four" name="volume_used_four" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_five" name="volume_used_five" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_used_six" name="volume_used_six" onChange="calculate_difference()"></td>
                  </tr>
                  
                </table>
              </td>
            </tr>
             <tr>
              <td colspan="6" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Average:</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="padding:8px;">
                  <table class="inner_table" width="90%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="8" type="text" name="average_volume_used"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>

            <tr>
              <td align="left" colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>STANDARD PREPARATION</b></td>
            </tr>
            <tr>
              <td align="center" colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
              <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                  <select id="standard_description" name="standard_description" >
                    <option selected></option>
                     <?php
                     foreach($sql_standards as $s_name):
                    ?>
                     
                     <option value="<?php  echo $s_name['item_description'];?>" data-idno="<?php  echo $s_name['reference_number'];?>" data-lotno="<?php  echo $s_name['batch_number'];?>"><?php  echo $s_name['item_description'];?></option>
                      <?php
                      endforeach
                      ?>
                  </select>
              </td>
              <td align="center" colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
              <td colspan = "3" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                  <select id="standard_description_2" name="standard_description_2" >
                    <option selected></option>
                     <?php
                     foreach($sql_standards as $s_name):
                    ?>
                     
                     <option value="<?php  echo $s_name['item_description'];?>" data-idnotwo="<?php  echo $s_name['reference_number'];?>" data-lotnotwo="<?php  echo $s_name['batch_number'];?>"><?php  echo $s_name['item_description'];?></option>
                      <?php
                      endforeach
                      ?>
                  </select>
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
              <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency" id = "potency"> </td>
              <td colspan = "3" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency_2" id = "potency_2"> </td>
            </tr>
            <tr>
              <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
              <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no" id ="lot_no"></td>
              <td colspan = "3" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no_2" id ="lot_no_2"></td>
            </tr>
            <tr>  
              <td align="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
              <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no" id ="id_no"> </td>
              <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no_2" id ="id_no_2"> </td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container" id ="standard_container"> </td>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container" id ="container" > </td>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1" id ="standard_weight_1" > </td>
            </tr>
            <tr>
              <td align="left" style="padding: 12px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;color:#0000fb;">Preparation: Inactivation</td>
            </tr>
            <tr>  
              <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="standard_dilution"></textarea> </td>
            </tr> 
            <tr>
              <td align="left" style="padding: 12px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;color:#0000fb;">Preparation: Activation</td>
            </tr>
            <tr>
              <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="standard_dilution"></textarea> </td>
            </tr> 
            <tr>
              <td colspan="6"  align="left" style="padding:12px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>SAMPLE PREPARATION</b></td>
            </tr> 
            <tr>
              <td colspan ="3" style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;color:#0000fb;"><input type="checkbox" id="samplepowder" name="samplepowder" value="podwer" />  <b>For Powders</b></td>
              <td colspan ="3" style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;color:#0000fb;"><input type="checkbox" id="sampleliquid" name="sampleliquid" value="liquid" />  <b>For Liquids</b></td>
            </tr>           
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" samplepowder ="powders" width="80%" cellpadding="8px" align="center">
                  <tr>
                    <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
                  </tr>
                  <tr>
                    <td colspan=""  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b></b></td>
                    <td colspan="3"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Inactivation</b></td>
                    <td colspan="3"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Activation</b></td>
                  </tr>
                  <tr>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;background-color: #ffffff;"> 1.</td>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"> 2.</td>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"> 3.</td>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;background-color: #ffffff;"> 1.</td>
                      <td  colspan="" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"> 2.</td>
                      <td  colspan="2" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"> 3.</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container" name="weight_of_sample_container_w1"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container_2" name="weight_of_sample_container_w2"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container_3" name="weight_of_sample_container_w3" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container_4" name="weight_of_sample_container_w4" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container_5" name="weight_of_sample_container_w5" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_container_6" name="weight_of_sample_container_w6" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container" name="weight_of_container_w1" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container_2" name="weight_of_container_w2" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container_3" name="weight_of_container_w3" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container_4" name="weight_of_container_w4" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container_5" name="weight_of_container_w5" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_container_6" name="weight_of_container_w6" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight" name="weight_of_sample_w1" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_2" name="weight_of_sample_w2" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_3" name="weight_of_sample_w3" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_4" name="weight_of_sample_w4" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_5" name="weight_of_sample_w5" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="sample_weight_6" name="weight_of_sample_w6" onChange="calculate_difference()"></td>
                  </tr>
                  
                </table>
              </td>
            </tr>
            <tr>
            <td colspan="6">
                <table border="0" class="inner_table" sampleliquid ="liquids" width="80%" cellpadding="8px" align="center">
                <tr>
                  <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Volume of Sample taken (ml)</b></td>
                </tr>
                <tr>
                    <td colspan=""  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b></b></td>
                    <td colspan="3"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Inactivation</b></td>
                    <td colspan="3"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Activation</b></td>
                  </tr>
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;background-color: #ffffff;">1.</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">2.</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">3.</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;border-left: dotted 1px #c4c4ff;background-color: #ffffff;">1.</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">2.</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">3.</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume of Sample</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_one" name="volume_of_sample_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_two" name="volume_of_sample_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_three" name="volume_of_sample_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_four" name="volume_of_sample_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_five" name="volume_of_sample_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="volume_of_sample_six" name="volume_of_sample_six" ></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="6" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Preparation: Inactivation</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="padding:8px;">
                  <table class="inner_table" width="90%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="8" type="text" name="weight_of_standard_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="6" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Preparation: Activation</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="padding:8px;">
                  <table class="inner_table" width="90%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="8" type="text" name="weight_of_standard_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>TITRATIONS</b></td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Titration Volumes: Standard:</b></td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Inactivated</b></td>
            </tr>
            
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Final Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_1" id="titration_final_burette_volume_1" name="titration_final_burette_volume_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_2" id="titration_final_burette_volume_2" name="titration_final_burette_volume_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_3" id="titration_final_burette_volume_3" name="titration_final_burette_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_4" id="titration_final_burette_volume_4" name="titration_final_burette_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_5" id="titration_final_burette_volume_5" name="titration_final_burette_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_6" id="titration_final_burette_volume_6" name="titration_final_burette_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Initial Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_1 compute"id="i_std_volume_1" name="i_std_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;boi_std_volumerder-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_2 compute"id="i_std_volume_2" name="i_std_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_3 compute"id="i_std_volume_3" name="i_std_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_4 compute"id="i_std_volume_4" name="i_std_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_5 compute"id="i_std_volume_5" name="i_std_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_6 compute"id="i_std_volume_6" name="i_std_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume Used(ml)[D]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_1_total"id="titration_volume_1" name="titration_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_2_total"id="titration_volume_2" name="titration_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_3_total"id="titration_volume_3" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_4_total"id="titration_volume_4" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_5_total"id="titration_volume_5" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_std_volume_6_total"id="titration_volume_6" name="titration_volume_three" ></td>
                  </tr>               
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Activated</b></td>
            </tr>
            
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Final Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_1"id="titration_final_burette_volume_1" name="titration_final_burette_volume_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_2"id="titration_final_burette_volume_2" name="titration_final_burette_volume_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_3"id="titration_final_burette_volume_3" name="titration_final_burette_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_4"id="titration_final_burette_volume_4" name="titration_final_burette_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_5"id="titration_final_burette_volume_5" name="titration_final_burette_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_6"id="titration_final_burette_volume_6" name="titration_final_burette_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Initial Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_1 compute"id="a_std_volume_1" name="titration_initial_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_2 compute"id="a_std_volume_2" name="titration_initial_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_3 compute"id="a_std_volume_3" name="titration_initial_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_4 compute"id="a_std_volume_4" name="titration_initial_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_5 compute"id="a_std_volume_5" name="titration_initial_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_6 compute"id="a_std_volume_6" name="titration_initial_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume Used(ml)[E]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_1_total" id="titration_volume_1" name="titration_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_2_total" id="titration_volume_2" name="titration_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_3_total" id="titration_volume_3" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_4_total" id="titration_volume_4" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_5_total" id="titration_volume_5" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_std_volume_6_total" id="titration_volume_6" name="titration_volume_three" ></td>
                  </tr>               
                </table>
              </td>
            </tr>
             <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Volume used: = Activated(E) - Inactivated(D)</b></td>
            </tr>
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Volume(ml) [E]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class="std_volume_1 a_std_volume_1_total"id="sample_one_volume_used_one" name="sample_one_volume_used_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class="std_volume_2 a_std_volume_2_total"id="sample_one_volume_used_two" name="sample_one_volume_used_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class="std_volume_3 a_std_volume_3_total"id="sample_one_volume_used_three" name="sample_one_volume_used_three"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class="std_volume_4 a_std_volume_4_total"id="sample_one_volume_used_four" name="sample_one_volume_used_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text"class="std_volume_5 a_std_volume_5_total" id="sample_one_volume_used_five" name="sample_one_volume_used_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class="std_volume_6 a_std_volume_6_total"id="sample_one_volume_used_six" name="sample_one_volume_used_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume(ml) [D]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_1 i_std_volume_1_total compute"id="std_volume_1" name="sample_two_volume_used_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_2 i_std_volume_2_total compute"id="std_volume_2" name="sample_two_volume_used_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_3 i_std_volume_3_total compute"id="std_volume_3" name="sample_two_volume_used_three" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_4 i_std_volume_4_total compute"id="std_volume_4" name="sample_two_volume_used_four" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_5 i_std_volume_5_total compute"id="std_volume_5" name="sample_two_volume_used_five" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "std_volume_6 i_std_volume_6_total compute"id="std_volume_6" name="sample_two_volume_used_six" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_1_total"id="sample_three_volume_used_one" name="sample_three_volume_used_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_2_total"id="sample_three_volume_used_two" name="sample_three_volume_used_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_3_total"id="sample_three_volume_used_three" name="sample_three_volume_used_three" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_4_total"id="sample_three_volume_used_four" name="sample_three_volume_used_four" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_5_total"id="sample_three_volume_used_five" name="sample_three_volume_used_five" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="std_volume_6_total"id="sample_three_volume_used_six" name="sample_three_volume_used_six" onChange="calculate_difference()"></td>
                  </tr>               
                </table>
              </td>
            </tr>
             <tr>
              <td  colspan="6" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculations</b></td>
            </tr>
             <tr>
                <td colspan="6" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" class="table_form"  align="center">
                    <tr>
                      <td style="padding:8px;">Calculate the microgram (or unit) equivalent (F) of each mL of 0.01 N sodium thiosulfate consumed by the Standard Preparation by the formula:</td>
                    </tr>
                    <tr>
                      <td style="color:#0000ff;padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;"><u>(2CP)=</u></br>(B - I)</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align:center;">in which C is the concentration (mg/ml), of Reference Standard in the Standard Preparation, </br>P is the potency, in µg (or units) per mg, of the Reference Standard, </br>B is the volume(mL), of 0.01 N sodium thiosulfate consumed in the Blank determination, </br> and I is the volume(mL), of 0.01 N sodium thiosulfate consumed in the Inactivation and titration.</br> </br>Calculate the potency of the specimen under test by the formula given in the individual monograph</td>
                    </tr>
                  </table>
                </td>
              border-bottom:dotted 1px #c4c4ff;</tr>
              <tr>
                <td colspan="6" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">1.</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_1" name="d_one_pkt"  placeholder="(C)" size="5"/> x 
                      <input type="text" id="det_p_1" name="d_one_wstd" placeholder="(P)" size="5"/></br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_1" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_1" name="d_one_potency" placeholder="(I)" size="5" onchange="titration_microgram()"/></td>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff;">=<input type="text" id="determination_1" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">2.</td>
                    </tr>              
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_2" name="d_one_pkt"  placeholder="(C)" size="5"/> x 
                      <input type="text" id="det_p_2" name="d_one_wstd" placeholder="(P)" size="5"/>  </br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_2" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_2" name="d_one_potency" placeholder="(I)" size="5" onchange="determination_titration()"/></td>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff;">=<input type="text" id="determination_2" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">3.</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_3" name="d_one_pkt"  placeholder="(C)" size="5"/> x 
                      <input type="text" id="det_p_3" name="d_one_wstd" placeholder="(P)" size="5"/></br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_3" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_3" name="d_one_potency" placeholder="(I)" size="5" onchange="determination_titration()"/></td>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff;">=<input type="text" id="determination_3" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">4.</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_4" name="d_one_pkt"  placeholder="(C)" size="5"/> x 
                      <input type="text" id="det_p_4" name="d_one_wstd" placeholder="(P)" size="5"/></br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_4" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_4" name="d_one_potency" placeholder="(I)" size="5" onchange="determination_titration()"/></td>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff;">=<input type="text" id="determination_4" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">5.</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_5" name="d_one_pkt"  placeholder="(C)" size="5"/> x
                      <input type="text" id="det_p_5" name="d_one_wstd" placeholder="(P)" size="5"/></br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_5" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_5" name="d_one_potency" placeholder="(I)" size="5" onchange="determination_titration()"/></td>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff;">=<input type="text" id="determination_5" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">6.</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;">2 x
                      <input type="text" id="det_c_6" name="d_one_pkt"  placeholder="(C)" size="5"/> x 
                      <input type="text" id="det_p_6" name="d_one_wstd" placeholder="(P)" size="5"/></br></br> &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" id="det_b_6" name="d_one_df" placeholder="(B)" size="5"/> - 
                      <input type="text" id="det_i_6" name="d_one_potency" placeholder="(I)" size="5" onchange="determination_titration()"/></td>
                      <td style="padding:8px;">=<input type="text" id="determination_6" name="d_one_p_lc" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Titration Samples:</b></td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Inactivated</b></td>
            </tr>
            
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Final Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_1" id="titration_final_burette_volume_one" name="titration_final_burette_volume_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_2" id="titration_final_burette_volume_two" name="titration_final_burette_volume_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_3" id="titration_final_burette_volume_three" name="titration_final_burette_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_4" id="titration_final_burette_volume_four" name="titration_final_burette_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_5" id="titration_final_burette_volume_five" name="titration_final_burette_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_6" id="titration_final_burette_volume_six" name="titration_final_burette_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Initial Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_1 compute" id="i_sample_volume_1" name="titration_initial_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_2 compute" id="i_sample_volume_2" name="titration_initial_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_3 compute" id="i_sample_volume_3" name="titration_initial_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_4 compute" id="i_sample_volume_4" name="titration_initial_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_5 compute" id="i_sample_volume_5" name="titration_initial_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="i_sample_volume_6 compute" id="i_sample_volume_6" name="titration_initial_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume Used(ml)[F]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_1_total" id="titration_volume_one" name="titration_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_2_total" id="titration_volume_two" name="titration_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_3_total" id="titration_volume_three" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_4_total" id="titration_volume_four" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_5_total" id="titration_volume_five" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "i_sample_volume_6_total" id="titration_volume_six" name="titration_volume_three" ></td>
                  </tr>               
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Activated</b></td>
            </tr>
            
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Final Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="a_sample_volume_1" id="titration_final_burette_volume_one" name="titration_final_burette_volume_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="a_sample_volume_2" id="titration_final_burette_volume_two" name="titration_final_burette_volume_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="a_sample_volume_3" id="titration_final_burette_volume_three" name="titration_final_burette_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="a_sample_volume_4" id="titration_final_burette_volume_four" name="titration_final_burette_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text"class ="a_sample_volume_5"  id="titration_final_burette_volume_five" name="titration_final_burette_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="a_sample_volume_6" id="titration_final_burette_volume_six" name="titration_final_burette_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Initial Burette Reading(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_1 compute" id="a_sample_volume_1" name="titration_initial_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_2 compute" id="a_sample_volume_2" name="titration_initial_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_3 compute" id="a_sample_volume_3" name="titration_initial_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_4 compute" id="a_sample_volume_4" name="titration_initial_volume_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_5 compute" id="a_sample_volume_5" name="titration_initial_volume_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_6 compute" id="a_sample_volume_6" name="titration_initial_volume_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume Used(ml)[G]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_1_total" id="titration_volume_one" name="titration_volume_one" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_2_total" id="titration_volume_two" name="titration_volume_two" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_3_total" id="titration_volume_three" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_4_total" id="titration_volume_four" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_5_total" id="titration_volume_five" name="titration_volume_three" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class = "a_sample_volume_6_total" id="titration_volume_six" name="titration_volume_three" ></td>
                  </tr>               
                </table>
              </td>
            </tr>
             <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Volume used: = Activated(G) - Inactivated(F)</b></td>
            </tr>
            <tr>
              <td colspan="6">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 3</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 4</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 5</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Volume 6</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                     Volume(ml) [G]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_1 a_sample_volume_1_total"id="sample_one_volume_used_one" name="sample_one_volume_used_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_2 a_sample_volume_2_total"id="sample_one_volume_used_two" name="sample_one_volume_used_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_3 a_sample_volume_3_total"id="sample_one_volume_used_three" name="sample_one_volume_used_three"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_4 a_sample_volume_4_total"id="sample_one_volume_used_four" name="sample_one_volume_used_four" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_5 a_sample_volume_5_total"id="sample_one_volume_used_five" name="sample_one_volume_used_five" ></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_6 a_sample_volume_6_total"id="sample_one_volume_used_six" name="sample_one_volume_used_six" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume(ml) [F]</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_1 i_sample_volume_1_total compute" id="sample_volume_1" name="sample_volume_1ne" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_2 i_sample_volume_2_total compute" id="sample_volume_2" name="sample_volume_1wo" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_3 i_sample_volume_3_total compute" id="sample_volume_3" name="sample_volume_1hree" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_4 i_sample_volume_4_total compute" id="sample_volume_4" name="sample_volume_1our" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_5 i_sample_volume_5_total compute" id="sample_volume_5" name="sample_volume_1ive" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_6 i_sample_volume_6_total compute" id="sample_volume_6" name="sample_two_volume_used_six" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Volume(ml)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_1_total" id="sample_three_volume_used_one" name="sample_three_volume_used_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_2_total" id="sample_three_volume_used_two" name="sample_three_volume_used_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_3_total" id="sample_three_volume_used_three" name="sample_three_volume_used_three" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_4_total" id="sample_three_volume_used_four" name="sample_three_volume_used_four" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_5_total" id="sample_three_volume_used_five" name="sample_three_volume_used_five" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" class ="sample_volume_6_total" id="sample_three_volume_used_six" name="sample_three_volume_used_six" onChange="calculate_difference()"></td>
                  </tr>               
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="6"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Calculations as per the monograph</td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 1.</b> <input type = "text" name="molarity_1" id="molarity_1"></td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 2.</b> <input type = "text" name="molarity_2" id="molarity_2"></td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 3.</b> <input type = "text" name="molarity_3" id="molarity_3"></td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 4.</b> <input type = "text" name="molarity_4" id="molarity_4"></td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 5.</b> <input type = "text" name="molarity_5" id="molarity_5"></td>
            </tr>
            <tr>
              <td  colspan="6" align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Determination 6.</b> <input type = "text" name="molarity_6" id="molarity_6"></td>
            </tr>
           
               
                    <tr>
                      <td colspan="3" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="average" id="determination_avg"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="equivalent_to" id ="equivalent"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sd" id="determination_sd"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rsd" id = "determination_rsd"></input></td>
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
                      <td><input type="checkbox" id="min" />Not Less than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance" placeholder="min%" size="5"  onChange="calculation_determinations()" /></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="nlt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance_comment" name="min_tolerance_comment" disable/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="max" />Not Greater than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance" placeholder="max%" size="5"  onChange="calculation_determinations()"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="ngt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id ="max_tolerance_comment" name="max_tolerance_comment" disable/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="range" />Tolerance Range</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id = "tolerance_range_from" name="tolerance_range_from" placeholder="min%" size="5" onChange="calculation_determinations()"> - <input type="text" range="tolerance_range" name="tolerance_range_to" id = "tolerance_range_to" placeholder="max%" size="5" onChange="calculation_determinations()"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="tolerance_range" id ="tolerance_range" disable/></td>
                    </tr>

                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd" name="determination_sd" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
                    </tr>
                    <tr>
                      <td>RSD %</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_rsd" name="determination_rsd" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disable/></td>
                    </tr>
                  </table>
                </td>
            </tr>       
      <tr>
            <tr>
              <td colspan="6" style="padding:8px;">
                <table border="0" width="90%" cellpadding="8px" align="center">
                  <tr>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Supervisor <input type="text" id="supervisor" name="supervisor"></td>
                    <td style="padding:4px;text-align:left;">Date <input type="date"  id="date" name="date"></td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" style="padding:4px;">Further Comments:</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5"></textarea></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="6" ><input class="btn" type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
       </table>
      </form>
</div>
</div>
</body>
<script>
  $('#min').change(function() {
    if($('#min').is(':checked')){
       $("input[min='min_tolerance']").show();
       $('#max').prop('disabled', true);
       $('#range').prop('disabled', true);
    } else {
        $("input[min='min_tolerance']").hide();
       $('#max').prop('disabled', false);
       $('#range').prop('disabled', false);
    }
  }).change();
  $('#max').change(function() {
    if($('#max').is(':checked')){
       $("input[max='max_tolerance']").show();
       $('#min').prop('disabled', true);
       $('#range').prop('disabled', true);
    } else {
        $("input[max='max_tolerance']").hide();
       $('#min').prop('disabled', false);
       $('#range').prop('disabled', false);
    }
  }).change();
  $('#range').change(function() {
    if($('#range').is(':checked')){
       $("input[range='tolerance_range']").show();
       $('#min').prop('disabled', true);
       $('#max').prop('disabled', true);
    } else {
        $("input[range='tolerance_range']").hide();
       $('#max').prop('disabled', false);
       $('#min').prop('disabled', false);
    }
  }).change();
  $('#blank').change(function() {
    if($('#blank').is(':checked')){
       $("table[blank='blank_required']").show();
    } else {
        $("table[blank='blank_required']").hide();
    }
  }).change();
  $('#samplepowder').change(function() {
    if($('#samplepowder').is(':checked')){
       $("table[samplepowder='powders']").show();
       $('#sampleliquid').prop('disabled', true);
    } else {
        $("table[samplepowder='powders']").hide();
       $('#sampleliquid').prop('disabled', false);
    }
  }).change();
  $('#sampleliquid').change(function() {
    if($('#sampleliquid').is(':checked')){
       $("table[sampleliquid='liquids']").show();
       $('#samplepowder').prop('disabled', true);
    } else {
        $("table[sampleliquid='liquids']").hide();
       $('#samplepowder').prop('disabled', false);
    }
  }).change();
</script>
</html>
