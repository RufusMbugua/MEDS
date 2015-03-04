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
  <?php include_once('application/views/header_links.php') ?>
  <div id="form_wrapper_lists">
    <div id="analysis_request" >
        <?php echo validation_errors(); ?>
        <?php echo form_open('equipment_maintenance_records/update_equipment');?>
        <table class="table_form" width="65%" bgcolor="#c4c4ff" height="250px" border="0" cellpadding="4px" align="center">
            <input type="hidden" name="my_id" value="<?php echo $query['id']; ?>"/>
            <tr>
                <td colspan="7" height="25px" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" width="20px">Back</a></td>
            </tr>
            <tr>
              <td rowspan="2" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="2" height="25px" style="border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document:Equipment Maintenance Updating Form</b></td>
              <td width="150px" height="25px" colspan="2" style="border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
              <td colspan="3" style="border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                <input type="text" id="reference_number" name="reference_number" class="field"/>
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
            <tr>
              <td colspan="8" height="25px" align="center" style="border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #c4c4ff;border-right:solid 1px #bfbfbf;">
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" style="border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:right;border-bottom:solid 2px #bfbfbf;"></td>
            </tr>
            <tr>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;border-left:solid 1px #bfbfbf;"><b>ID Number</b></td>
                <td colspan="" style="padding:4px;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><input type="text" size="50" name="id_number" value="<?php echo $query['id_number'];?>"/></td>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Serial Number</b></td>
                <td colspan="" style="padding:4px;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><input type="text" size="50" name="serial_number" value="<?php echo $query['serial_number'];?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;border-left:solid 1px #bfbfbf;"><b>Manufacturer</b></td>
                <td colspan="" style="padding:4px;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><input type="text" size="50" name="manufacturer" value="<?php echo $query['manufacturer'];?>"/></td>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;"><b>Model</b></td>
                <td colspan="" style="padding:4px;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><input type="text" size="50"name="model" value="<?php echo $query['model'];?>"></td>
            </tr>
            <tr>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;border-left:solid 1px #bfbfbf;"><b>Location</b></td>
                <td colspan="" style="padding:4px;border-right:solid 1px #bfbfbf;"><input type="text" size="50" name="location" value="<?php  if($query['location']==""){echo"Not Set";}else{echo $query['location'];}?>"></td>
                <td colspan="2" height="5px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;fbfbf; border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Status</b></td>
                <td colspan="" style="padding:4px;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;">
                 <select type="text" name="status">
                   <option value="<?php if($query['status']==0){echo "In Use";}elseif($query['status']==1){echo "Scheduled for Maintenance/Calibration";}elseif($query['status']==2){echo "Withdrawn/Damaged";}?>"></option>
                   <option value="0">In Use</option>
                   <option value="1">Scheduled for Maintenance/Calibration</option>
                   <option value="2">Withdrawn/Damaged</option>
                 </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" height="25px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><b>Description</b></td>
                <td colspan="4" height="25px" width="450px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;"><b>Comments</b></td>
            </tr>
            <tr>
                <td colspan="3" style="padding:4px;text-align: left;border-bottom: dotted 1px #bfbfbf;background-color:#e8ffe8;border-left:solid 1px #bfbfbf;"><textarea cols="80" rows="4" name="description"><?php echo $query['description'];?></textarea></td>
                <td colspan="4" style="padding:4px;text-align: left;border-bottom: dotted 1px #bfbfbf;background-color:#e8ffe8;border-right:solid 1px #bfbfbf;"><textarea cols="80" rows="4" name="comments"><?php echo $query['comments'];?></textarea></td>
            </tr>
            <tr>
                <td  style="padding:8px;background-color:#ffffff;text-align: center;" colspan="7" ><input class="btn" type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
        </form>
    </div>
  </div>
  </div>
 </body>
</html>
