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
     $("#equipment_make").change(function(){
         var id_number=$(this).val();
         //append to textbox
         $("#equipment_number").val(id_number);
    });
   });
  </script>

  </head
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
<?php echo form_open('test_dissolution/worksheet', array('id'=>'test_dissolution_view'));?>

<table width="950px" class ="table_form" border="0" cellpadding="4px" align="center">
    <tr>
     
     <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
     <tr>
     <td colspan ="6">
      <table width="100%" class="table_form" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
        <tr>
            <td rowspan="2" colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="6" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
        </tr>
        <tr>    
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
            <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'] ;?></td>
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
        <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
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
          <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Dissolution Test Form: By UV</td>
    </tr>       
     <tr> 
      <td colspan ="6" align ="left" style="padding: 12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"> <b>Monograph</b></td>
     </tr> 
     <tr> 
      <td colspan ="6" align ="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid #f0f0ff;"><?php echo $query_monograph['monograph'];?> </td>
     </tr>     
    <tr>
           <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"></td>
    </tr>
    
    <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Equipment to be used:</b></td>
    </tr>
    
    <tr>
        <td colspan = "" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['equipment_make'];?> </td>          
        <td align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  Equipment Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['equipment_number'];?></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Medium Preparation</b></td>
      </tr>
       <tr>
        <td align="center" colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['hcl_prepaparation'];?></td>
      </tr>
      
      <tr>
        <td align = "right" colspan = "2"style="padding: 8px;" ><b>Requirements</b></td><td align = "center"style="padding: 8px;" ><b>Actual</b></td><td align = "left"style="padding: 8px;" colspan = "6"><b>Comment</b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Apparatus</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['apparatus'];?> </td>        
        <td align ="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_apparatus'];?> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['apparatus_comment'];?></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Rotation</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rotation'];?></td>        
        <td align ="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_rotation'];?></td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rotation_comment'];?> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Time</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['time'];?></td>        
        <td align ="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_time'];?></td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['time_comment'];?> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Temperarture</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['temperature'];?></td>        
        <td align ="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['actual_temperature'];?></td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['temperature_comment'];?></td>
      </tr>
      <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Sample Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['sample_preparation'];?></td>
      </tr>
      <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Standard Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;">Weight of Standard</td>
      </tr>
       <tr>
        <td colspan = "6"align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_weight'];?></td>
      </tr>
      <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_description'];?></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['potency'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['lot_no'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['id_no'];?></td>
      </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['potency_standard_container'];?> </td>
      </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['potency_container'];?></td>
      </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight_1'];?></td>
      </tr>  
      <tr> 
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_dilution'];?></td>
      </tr>  
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>        
      <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Absorbance at <?php echo $query_e['first_absorbance'];?> nm and <?php echo $query_e['second_absorbance'];?> nm</td>
      </tr>
      <tr>
       <td colspan ="6">
          <div class="scroll">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
            <tr>
              <td align="center" style="padding: 8px;"><b>Absorbance</b></td>
              <td align="center" style="padding: 8px;"><b>Std 1</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
            </tr>
         
            <tr>
              <td align="center" style="padding: 8px;">Wavelength</td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_standard'];?></td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s1'];?></td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s2'];?>n</td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s3'];?>n</td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s4'];?>n</td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s5'];?>n</td>
              <td align="center" style="padding: 8px;"><?php echo $query_e['difference_s6'];?>n</td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>      
        <tr><td colspan="6"
        <?php 
          if($query_determination['uv_type']=="std"){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>>
        <table border="0" class="inner_table" samplepowder ="std" width="80%" cellpadding="8px" align="center">
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Content</td>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <?php echo $query_e['content'];?></td>
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination one:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_1_pkt']?> x <?php echo $query_determination['det_1_wstd']?> x <?php echo $query_determination['det_1_df']?> x 
         <?php echo $query_determination['det_1_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_1_pkstd']?> x <?php echo $query_determination['det_1_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_1']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination two:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_2_pkt']?> x <?php echo $query_determination['det_2_wstd']?> x <?php echo $query_determination['det_2_df']?> x 
         <?php echo $query_determination['det_2_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_2_pkstd']?> x <?php echo $query_determination['det_2_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_2']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination three:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_3_pkt']?> x <?php echo $query_determination['det_3_wstd']?> x <?php echo $query_determination['det_3_df']?> x 
         <?php echo $query_determination['det_3_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_3_pkstd']?> x <?php echo $query_determination['det_3_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_3']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination four:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_4_pkt']?> x <?php echo $query_determination['det_4_wstd']?> x <?php echo $query_determination['det_4_df']?> x 
         <?php echo $query_determination['det_4_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_4_pkstd']?> x <?php echo $query_determination['det_4_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_4']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination five:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_5_pkt']?> x <?php echo $query_determination['det_5_wstd']?> x <?php echo $query_determination['det_5_df']?> x 
         <?php echo $query_determination['det_5_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_5_pkstd']?> x <?php echo $query_determination['det_5_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_5']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination six:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['det_6_pkt']?> x <?php echo $query_determination['det_6_wstd']?> x <?php echo $query_determination['det_6_df']?> x 
         <?php echo $query_determination['det_6_potency']?> x 100 <br/><hr/><?php echo $query_determination['det_6_pkstd']?> x <?php echo $query_determination['det_6_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['determination_6']?> % LC</td>      
      </tr> 
      </table></td></tr>      
        <tr><td colspan="6"
        <?php 
          if($query_determination['uv_type']=="no_std"){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>>
        <table border="0" class="inner_table" samplepowder ="std" width="80%" cellpadding="8px" align="center">
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Content</td>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <?php echo $query_e['content'];?></td>
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination one:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_1_pkt']?> x 10 x <?php echo $query_determination['second_det_1_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_1_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_1']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination two:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_2_pkt']?> x 10 x <?php echo $query_determination['second_det_2_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_2_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_2']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination three:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_3_pkt']?> x 10 x <?php echo $query_determination['det_3_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_3_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_3']?> % LC</td>      
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination four:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_4_pkt']?> x 10 x <?php echo $query_determination['second_det_4_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_4_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_4']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination five:</td>                
       <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_5_pkt']?> x 10 x <?php echo $query_determination['second_det_5_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_5_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_5']?> % LC</td>      
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination six:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $query_determination['second_det_6_pkt']?> x 10 x <?php echo $query_determination['second_det_6_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $query_determination['second_det_6_lc']?>
         <td> =&nbsp &nbsp <?php echo $query_determination['second_determination_6']?> % LC</td>      
      </tr>   
      </table></td></tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>

      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['average'];?> </td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['equivalent'];?></td>
      </tr>
       <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">from <?php echo $query_e['range_min'];?> to <?php echo $query_e['range_max'];?></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rsd'];?></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Acceptance Criteria</td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['acceptance_criteria'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Results </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['results'];?></td>  
      </tr>
      <tr>      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Comments</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['comment'];?> </td>
      </tr>
             
      <tr>
        <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><?php if ($query_e['choice'] = 0){echo "Failed";}elseif($query_e['choice'] = 1){echo "Passed";}?></td>
         <tr>
       <td colspan="8" style="padding:8px;">
        <table border="0" width="90%" cellpadding="8px" align="center">
          <tr>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Analyst: <?php echo $query_e['analyst'];?></td>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date: <?php echo $query_e['date_done'];?></td>
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