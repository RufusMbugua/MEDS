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
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  
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
     tinymce.init({
    selector: "textarea"
   });
    $("#equipment_make").change(function(){
         var id_number=$(this).val();
         //append to textbox
         $("#balance_number").val(id_number);
    });
    $("#name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#length").val(dimensions);
      $("#serial_no").val(serial_number);
      $("#manufacturer").val(manufacturer);
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
<?php echo form_open('test_dissolution/worksheet_two_components_hplc_third_stage', array('id'=>'test_dissolution_view'));?>

<table width="950" class ="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <input type ="hidden" id = "label_claim" value=" <?php echo $results['label_claim'];?>">
      <tr>
       <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
     <td colspan ="6">
      <table width="100%" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
         <tr>
            <td rowspan="2" colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
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
        <table border="0" align="center" cellpadding="8px" width="100%">
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
          <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Dissolution Test:Two Components Capsules Form</td>
    </tr> 
    <tr>
        <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"></td>
    </tr>
         <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_make" name="equipment_make" value = "<?php echo $sql_dissolution['']?>">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>"><?php echo $equipment['model'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="equipment_number" id="balance_number" value = "<?php echo $sql_dissolution['equipment_number']?>"></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Preparation of Dissolution Medium</b></td>
      </tr>
       <tr>
        <td colspan = "6" align ="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name = "dissolution_prepaparation"> <?php echo $sql_dissolution['dissolution_prepaparation']?></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Dissolution System Setup</b></td>
      </tr>
      <tr>
        <td align = "" colspan = "2"style="padding: 8px;" ><b>Requirements</b></td><td align = "center"style="padding: 8px;" ><b>Actual</b></td><td align = "left"style="padding: 8px;" colspan = "6"><b>Comment</b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Apparatus</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus" value = "<?php echo $sql_dissolution['apparatus']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="actual_apparatus" value = "<?php echo $sql_dissolution['actual_apparatus']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus_comment" value = "<?php echo $sql_dissolution['apparatus_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Rotation</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation" value = "<?php echo $sql_dissolution['rotation']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_rotation" value = "<?php echo $sql_dissolution['actual_rotation']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation_comment" value = "<?php echo $sql_dissolution['rotation_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Time</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time" value = "<?php echo $sql_dissolution['time']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_time" value = "<?php echo $sql_dissolution['actual_time']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time_comment" value = "<?php echo $sql_dissolution['time_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Temperarture</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature" value = "<?php echo $sql_dissolution['temperature']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_temperature" value = "<?php echo $sql_dissolution['actual_temperature']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature_comment" value = "<?php echo $sql_dissolution['temperature_comment']?>"> </td>
      </tr>
      <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Sample Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6" align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "sample_preparation"><?php echo $sql_dissolution['sample_preparation']?></textarea></td>
      </tr>
       <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6" align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name ="standard_weight"><?php echo $sql_dissolution['standard_weight']?></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
            <select id="standard_description" name="standard_description" value = "<?php echo $sql_dissolution['standard_description']?>">
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
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency" value = "<?php echo $sql_dissolution['potency']?>"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no" value = "<?php echo $sql_dissolution['lot_no']?>"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no" value = "<?php echo $sql_dissolution['id_no']?>"> </td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container" id ="standard_container" value = "<?php echo $sql_dissolution['standard_container']?>"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container" id ="container" value = "<?php echo $sql_dissolution['container']?>"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1" id ="standard_weight_1" value = "<?php echo $sql_dissolution['standard_weight_1']?>"> </td>
       </tr>  
      <tr>  
        <td colspan ="2"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="standard_dilution"><?php echo $sql_dissolution['standard_dilution']?></textarea> </td>
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Determination of content- HPLC</b></td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" >System suitability </td>
      </tr> 
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_make" name="balance_make" value = "<?php echo $sql_dissolution['balance_make']?>">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>"><?php echo $equipment['model'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="balance_number" id="balance_number"value = "<?php echo $sql_dissolution['balance_number']?>"></td>
      </tr>
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Standard Description:<b></td>
       
      </tr>
      <tr>
        <td align="center" colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="standard_description" name="standard_description_1" value = "<?php echo $sql_dissolution['standard_description_1']?>">
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency: <input type ="text" name="potency_1" value = "<?php echo $sql_dissolution['potency_1']?>"></td><td> Lot No.:<input type ="text" name="lot_no_1" value = "<?php echo $sql_dissolution['lot_no_1']?>"> </td><td>ID No.:<input type ="text" name="id_no_1" value = "<?php echo $sql_dissolution['id_no_1']?>"> </td>       
      </tr>
       <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>         
        <td colspan="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_1" id ="standard_container_2" value = "<?php echo $sql_dissolution['standard_container_1']?>"> </td>
      </tr>
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_1" id ="container_2" value = "<?php echo $sql_dissolution['container_1']?>"> </td>
      </tr>
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_2" id ="standard_weight_2" value = "<?php echo $sql_dissolution['standard_weight_2']?>"> </td>
      </tr> 
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="standard_dilution"> <?php echo $sql_dissolution['standard_dilution']?></textarea> </td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6" ALIGN ="CENTER" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name = "mobile_phase"> <?php echo $sql_dissolution['mobile_phase']?></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>The chromatographic conditions:</b></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Chromatographic System</b></td>
      </tr>
      <tr>
        <td colspan ="6">
           <table border="0" align="center" cellpadding="8px" width="100%">
              <tr>
                  <td rowspan = "2" colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>A stainless steel column:</b></td>
                  <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Name:</td>
                  <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
                    <select id="name" name="name" value = "<?php echo $sql_dissolution['name']?>">
                      <option selected></option>
                       <?php
                       foreach($sql_columns as $c_name):
                      ?>
                       <option value="<?php  echo $c_name['column_type'];?>" data-dimensions="<?php echo $c_name['column_dimensions']; ?>" data-serialnumber="<?php echo $c_name['serial_number']; ?>" data-manufacturer="<?php echo $c_name['manufacturer']; ?>" ><?php  echo $c_name['column_type'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select></td>       
                  <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Length:</td>
                  <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="length" id ="length" value = "<?php echo $sql_dissolution['length']?>"> </td>       
                </tr> 
                <tr>
                  <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot/Serial No.:</td>
                  <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="serial_no" id ="serial_no" value = "<?php echo $sql_dissolution['serial_no']?>"> </td>       
                  <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Manufacturer:</td>
                  <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="manufacturer" id ="manufacturer" value = "<?php echo $sql_dissolution['manufacturer']?>"> </td>       
                </tr>
           </table>
        </td>
      </tr>
      <tr>
        <td colspan ="3"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Pressure:</td>
        <td colspan ="3"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_pressure" value = "<?php echo $sql_dissolution['column_pressure']?>"> <select name="column_pressure_select"><option value="Bar">Bar</option><option value="MPA">MPA</option><option value="PSI">PSI</option></select> </td>       
      </tr>       
      <tr>  
        <td colspan ="3"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Oven Pressure:</td>
        <td colspan ="3"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_oven_pressure" value = "<?php echo $sql_dissolution['column_oven_pressure']?>"> <select name="column_oven_pressure_select"><option value="F">F</option><option value="C">C</option></select></td>       
      </tr>
      <tr>
        <td colspan ="3"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Mobile Phase Flow rate:</td>
        <td colspan ="3"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="flow_rate" value = "<?php echo $sql_dissolution['flow_rate']?>"> mls/min</td>       
      </tr>       
      <tr>
        <td colspan ="3"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Detection of Wavelength:</td>
        <td colspan ="3"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="wavelength" value = "<?php echo $sql_dissolution['wavelength']?>"> nm</td>       
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Suitability summary</b><br/>From chromatograms on -  </td>
      </tr>       
      <tr>
        <td colspan ="6">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">       
              <tr>
                <td align="center"><b></b></td>
                <td align="center"><b>Retention Time (minutes)</b></td>
                <td align="center"><b>Peak Area</b></td>
                <td align="center"><b>Asymmetry</b></td>
                <td align="center"><b>Resolution</b></td>
                <td align="center"><b>Other</b></td>
              </tr>
           
              <tr>
                <td align="center"style="padding: 8px;">1.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_1" id ="rt_1" value = "<?php echo $sql_dissolution['rt_1']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_1" id ="peak_area_1" value = "<?php echo $sql_dissolution['peak_area_1']?>" onchange="calculation_average(); calculation_sd()"></td >
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_1" id="asymmetry_1" value = "<?php echo $sql_dissolution['asymmetry_1']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_1" id ="resolution_1" value = "<?php echo $sql_dissolution['resolution_1']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_1" id ="other_1" value = "<?php echo $sql_dissolution['other_1']?>" onchange="calculation_average(); calculation_sd()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">2.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_2" id ="rt_2" value = "<?php echo $sql_dissolution['rt_2']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_2" id ="peak_area_2" value = "<?php echo $sql_dissolution['peak_area_2']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_2" id="asymmetry_2" value = "<?php echo $sql_dissolution['asymmetry_2']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_2" id ="resolution_2" value = "<?php echo $sql_dissolution['resolution_2']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_2" id ="other_2" value = "<?php echo $sql_dissolution['other_2']?>"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">3.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_3" id ="rt_3" value = "<?php echo $sql_dissolution['rt_3']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_3" id ="peak_area_3" value = "<?php echo $sql_dissolution['peak_area_3']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_3" id="asymmetry_3" value = "<?php echo $sql_dissolution['asymmetry_3']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_3" id ="resolution_3" value = "<?php echo $sql_dissolution['resolution_3']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_3" id ="other_3" value = "<?php echo $sql_dissolution['other_3']?>" onchange="calculation_average(); calculation_sd()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">4.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_4" id ="rt_4" value = "<?php echo $sql_dissolution['rt_4']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_4" id ="peak_area_4" value = "<?php echo $sql_dissolution['peak_area_4']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_4" id="asymmetry_4" value = "<?php echo $sql_dissolution['asymmetry_4']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_4" id ="resolution_4" value = "<?php echo $sql_dissolution['resolution_4']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_4" id ="other_4" value = "<?php echo $sql_dissolution['other_4']?>"  onchange="calculation_average(); calculation_sd()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">5.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_5" id="rt_5" value = "<?php echo $sql_dissolution['rt_5']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_5" id ="peak_area_5" value = "<?php echo $sql_dissolution['peak_area_5']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_5" id="asymmetry_5" value = "<?php echo $sql_dissolution['asymmetry_5']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_5" id ="resolution_5" value = "<?php echo $sql_dissolution['resolution_5']?>"  onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_5" id ="other_5" value = "<?php echo $sql_dissolution['other_5']?>"  onchange="calculation_average(); calculation_sd()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">6.</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_6" id="rt_6" value = "<?php echo $sql_dissolution['rt_6']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_6" id ="peak_area_6" value = "<?php echo $sql_dissolution['peak_area_6']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_6" id ="asymmetry_6" value = "<?php echo $sql_dissolution['asymmetry_6']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_6"id ="resolution_6"value = "<?php echo $sql_dissolution['resolution_6']?>" onchange="calculation_average(); calculation_sd()"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_6"id ="other_6"value = "<?php echo $sql_dissolution['other_6']?>" onchange="calculation_average(); calculation_sd()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Average</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_avg" id ="rt_avg" value = "<?php echo $sql_dissolution['rt_avg']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_avg" id ="peak_area_avg"  value = "<?php echo $sql_dissolution['peak_area_avg']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_avg" id="asymmetry_avg" value = "<?php echo $sql_dissolution['asymmetry_avg']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_avg" id ="resolution_avg" value = "<?php echo $sql_dissolution['resolution_avg']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_avg" id ="other_avg" value = "<?php echo $sql_dissolution['other_avg']?>"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">SD</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_sd" id ="rt_sd" value = "<?php echo $sql_dissolution['rt_sd']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_sd" id ="peak_area_sd" value = "<?php echo $sql_dissolution['peak_area_sd']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_sd" id ="asymmetry_sd" value = "<?php echo $sql_dissolution['asymmetry_sd']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_sd" id ="resolution_sd" value = "<?php echo $sql_dissolution['resolution_sd']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_sd" id ="other_sd" value = "<?php echo $sql_dissolution['other_sd']?>"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">RSD</td>
                <td style="padding: 8px;"><input type = "text" id = "rt_rsd" name ="rt_rsd" value = "<?php echo $sql_dissolution['rt_rsd']?>"></td>
                <td style="padding: 8px;"><input type = "text" id = "peak_area_rsd" name ="peak_area_rsd" value = "<?php echo $sql_dissolution['peak_area_rsd']?>"></td>
                <td style="padding: 8px;"><input type = "text" id = "asymmetry_rsd" name ="asymmetry_rsd" value = "<?php echo $sql_dissolution['asymmetry_rsd']?>"></td>
                <td style="padding: 8px;"><input type = "text" id = "resolution_rsd" name ="resolution_rsd" value = "<?php echo $sql_dissolution['resolution_rsd']?>"></td>
                <td style="padding: 8px;"><input type = "text" id = "other_rsd" name ="other_rsd" id ="other_rsd" value = "<?php echo $sql_dissolution['other_rsd']?>"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Acceptance Criteria</td>
                <td style="padding: 8px;">NMT 2.0%</td>
                <td style="padding: 8px;">NMT 2.0%</td>
                <td style="padding: 8px;">NMT 2.0%</td>
                <td style="padding: 8px;">NLT 5.0%</td>
                
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Comment</td>
                <td style="padding: 8px;"><input type = "text" name ="rt_comment" value = "<?php echo $sql_dissolution['rt_comment']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="peak_area_comment" value = "<?php echo $sql_dissolution['peak_area_comment']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="asymmetry_comment" value = "<?php echo $sql_dissolution['asymmetry_comment']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="resolution_comment" value = "<?php echo $sql_dissolution['resolution_comment']?>"></td>
                <td style="padding: 8px;"><input type = "text" name ="other_comment" id ="other_comment" value = "<?php echo $sql_dissolution['other_comment']?>"></td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: sollid 1px #bfbfbf;color:#0000fb;" ><b>Component 1: <input type ="text" name ="component_1"></td>
      </tr>
      <tr>
        <td align="center" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>After <input type ="text" name ="minutes"> minutes</td>
      </tr>
      <tr><td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
      <tr>
       <td colspan ="6">
          <div class="scroll">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
            <tr>
                <td><b></b></td>
                <td align="center" style="padding: 8px;"><b>Std 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 7</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 8</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 9</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 10</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 11</b></td>
                <td align="center" style="padding: 8px;"><b>Sample 12</b></td>
              </tr>
            <tr>
                <td align="center"style="padding: 8px;">1.</td>
                <td style="padding: 8px;"><input type = "text" class ="standard" name ="sample_1" id ="sample_1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_1_s1" id ="sample_1_s1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_1_s2" id ="sample_1_s2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_1_s3" id ="sample_1_s3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_1_s4" id ="sample_1_s4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_1_s5" id ="sample_1_s5"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_1_s6" id ="sample_1_s6"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7" name ="sample_1_s7" id ="sample_1_s7"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8"  name ="sample_1_s8" id ="sample_1_s8"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9" name ="sample_1_s9" id ="sample_1_s9"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10"  name ="sample_1_s10" id ="sample_1_s10"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11" name ="sample_1_s11" id ="sample_1_s11"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12" name ="sample_1_s12" id ="sample_1_s12"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">2.</td>
                <td style="padding: 8px;"><input type = "text" class ="standard" name ="sample_2" id ="sample_2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_2_s1" id ="sample_2_s1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_2_s2" id ="sample_2_s2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_2_s3" id ="sample_2_s3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_2_s4" id ="sample_2_s4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_2_s5" id ="sample_2_s5"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_2_s6" id ="sample_2_s6"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7" name ="sample_2_s7" id ="sample_2_s7"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8" name ="sample_2_s8" id ="sample_2_s8"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9" name ="sample_2_s9" id ="sample_2_s9"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10" name ="sample_2_s10" id ="sample_2_s10"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11" name ="sample_2_s11" id ="sample_2_s11"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12" name ="sample_2_s12" id ="sample_2_s12"></td>
              </tr>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">3.</td>
                <td style="padding: 8px;"><input type = "text" class ="standard" name ="sample_3" id ="sample_3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_3_s1" id ="sample_3_s1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_3_s2" id ="sample_3_s2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_3_s3" id ="sample_3_s3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_3_s4" id ="sample_3_s4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_3_s5" id ="sample_3_s5"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_3_s6" id ="sample_3_s6"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7" name ="sample_3_s7" id ="sample_3_s7"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8" name ="sample_3_s8" id ="sample_3_s8"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9" name ="sample_3_s9" id ="sample_3_s9"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10" name ="sample_3_s10" id ="sample_3_s10"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11" name ="sample_3_s11" id ="sample_3_s11"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12" name ="sample_3_s12" id ="sample_3_s12"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">4.</td>
                <td style="padding: 8px;"><input type = "text" class ="standard" name ="sample_4" id ="sample_4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_4_s1" id ="sample_4_s1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_4_s2" id ="sample_4_s2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_4_s3" id ="sample_4_s3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_4_s4" id ="sample_4_s4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_4_s5" id ="sample_4_s5"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_4_s6" id ="sample_4_s6"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7" name ="sample_4_s7" id ="sample_4_s7"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8" name ="sample_4_s8" id ="sample_4_s8"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9" name ="sample_4_s9" id ="sample_4_s9"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10" name ="sample_4_s10" id ="sample_4_s10"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11" name ="sample_4_s11" id ="sample_4_s11"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12" name ="sample_4_s12" id ="sample_4_s12"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">5.</td>
                <td style="padding: 8px;"><input type = "text" class ="standard" name ="sample_5" id ="sample_5" onchange ="avg_standard()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_5_s1" id ="sample_5_s1" onchange ="avg_sample1()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_5_s2" id ="sample_5_s2" onchange ="avg_sample2()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_5_s3" id ="sample_5_s3" onchange ="avg_sample3()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_5_s4" id ="sample_5_s4" onchange ="avg_sample4()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_5_s5" id ="sample_5_s5" onchange ="avg_sample5()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_5_s6" id ="sample_5_s6" onchange ="avg_sample6()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7" name ="sample_5_s7" id ="sample_5_s7" onchange ="avg_sample7()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8" name ="sample_5_s8" id ="sample_5_s8" onchange ="avg_sample8()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9" name ="sample_5_s9" id ="sample_5_s9" onchange ="avg_sample9()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10" name ="sample_5_s10" id ="sample_5_s10" onchange ="avg_sample10()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11" name ="sample_5_s11" id ="sample_5_s11" onchange ="avg_sample11()"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12" name ="sample_5_s12" id ="sample_5_s12" onchange ="avg_sample12()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Average</td>
                <td style="padding: 8px;"><input type = "text" class ="standard_avg" name ="avg" id ="avg"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_1_avg" name ="avg_s1" id ="avg_s1"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_2_avg" name ="avg_s2" id ="avg_s2"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_3_avg" name ="avg_s3" id ="avg_s3"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_4_avg" name ="avg_s4" id ="avg_s4"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_5_avg" name ="avg_s5" id ="avg_s5"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_6_avg" name ="avg_s6" id ="avg_s6"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_7_avg" name ="avg_s7" id ="avg_s7"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_8_avg" name ="avg_s8" id ="avg_s8"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_9_avg" name ="avg_s9" id ="avg_s9"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_10_avg" name ="avg_s10" id ="avg_s10"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_11_avg" name ="avg_s11" id ="avg_s11"></td>
                <td style="padding: 8px;"><input type = "text" class ="sample_12_avg" name ="avg_s12" id ="avg_s12"></td>
              </tr>
         </table>
         </div>
        </td>
      </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_1_pkt" id ="det_1_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_wstd" id ="det_1_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_df" id ="det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_potency" id ="det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_1_pkstd" id ="det_1_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_awt" id ="det_1_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_1_lc" id ="det_1_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="determination_1" id ="determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_2_pkt" id="det_2_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_wstd" id ="det_2_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_df"id="det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_potency" id ="det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_2_pkstd" id ="det_2_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_awt" id ="det_2_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_2_lc" id ="det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_2"id ="determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_3_pkt" id ="det_3_pkt"size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_wstd" id ="det_3_wstd"size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_df" id ="det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_potency" id ="det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_3_pkstd" id ="det_3_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_awt" id ="det_3_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_3_lc" id ="det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_3" id ="determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_4_pkt" id ="det_4_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_wstd" id ="det_4_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_df" id ="det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_potency" id ="det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_4_pkstd" id ="det_4_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_awt" id ="det_4_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_4_lc" id ="det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_4" id ="determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_5_pkt" id ="det_5_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_wstd" id ="det_5_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_df" id ="det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_potency" id ="det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_5_pkstd" id ="det_5_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_awt" id ="det_5_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_5_lc" id ="det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_5" id ="determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_6_pkt" id ="det_6_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_wstd" id ="det_6_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_df" id ="det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_potency" id ="det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_6_pkstd" id ="det_6_pkstd" size ="10" placeholder="PKSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_awt" id ="det_6_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="det_6_lc" id ="det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_6" id ="determination_6" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center"colspan ="6"style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="average" id = "determination_avg"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="equivalent" id = "equivalent"></td>
      </tr>
       <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" size = "5" id = "range_min" name="range_min" > to <input type ="text" size = "5" id = "range_max" name="range_max"></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rsd" id = "determination_rsd"></td>
      </tr>
 <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;" ><b>Component 2: <input type ="text" name ="component_2"></td>
      </tr>
      <tr>
        <td align="center" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>After <input type ="text" name ="minutes_2"> minutes</td>
      </tr>
      <tr><td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
      <tr>
       <td colspan ="6">
          <div class="scroll">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
            <tr>
              <td><b></b></td>
              <td align="center" style="padding: 8px;"><b>Std 1</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 7</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 8</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 9</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 10</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 11</b></td>
              <td align="center" style="padding: 8px;"><b>Sample 12</b></td>
            </tr>
         
            <tr>
              <td align="center"style="padding: 8px;">1.</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard" name ="second_sample_1" id ="second_sample_1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1"name ="second_sample_1_s1" id ="second_sample_1_s1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2"name ="second_sample_1_s2" id ="second_sample_1_s2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3"name ="second_sample_1_s3" id ="second_sample_1_s3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4"name ="second_sample_1_s4" id ="second_sample_1_s4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5"name ="second_sample_1_s5" id ="second_sample_1_s5"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6"name ="second_sample_1_s6" id ="second_sample_1_s6"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7"name ="second_sample_1_s7" id ="second_sample_1_s7"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8"name ="second_sample_1_s8" id ="second_sample_1_s8"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9"name ="second_sample_1_s9" id ="second_sample_1_s9"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10"name ="second_sample_1_s10" id ="second_sample_1_s10"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11"name ="second_sample_1_s11" id ="second_sample_1_s11"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12"name ="second_sample_1_s12" id ="second_sample_1_s12"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">2.</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard" name ="second_sample_2" id ="second_sample_2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1"name ="second_sample_2_s1" id ="second_sample_2_s1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2"name ="second_sample_2_s2" id ="second_sample_2_s2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3"name ="second_sample_2_s3" id ="second_sample_2_s3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4"name ="second_sample_2_s4" id ="second_sample_2_s4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5"name ="second_sample_2_s5" id ="second_sample_2_s5"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6"name ="second_sample_2_s6" id ="second_sample_2_s6"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7"name ="second_sample_2_s7" id ="second_sample_2_s7"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8"name ="second_sample_2_s8" id ="second_sample_2_s8"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9"name ="second_sample_2_s9" id ="second_sample_2_s9"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10"name ="second_sample_2_s10" id ="second_sample_2_s10"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11"name ="second_sample_2_s11" id ="second_sample_2_s11"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12"name ="second_sample_2_s12" id ="second_sample_2_s12"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">3.</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard" name ="second_sample_3" id ="second_sample_3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1"name ="second_sample_3_s1" id ="second_sample_3_s1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2"name ="second_sample_3_s2" id ="second_sample_3_s2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3"name ="second_sample_3_s3" id ="second_sample_3_s3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4"name ="second_sample_3_s4" id ="second_sample_3_s4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5"name ="second_sample_3_s5" id ="second_sample_3_s5"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6"name ="second_sample_3_s6" id ="second_sample_3_s6"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7"name ="second_sample_3_s7" id ="second_sample_3_s7"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8"name ="second_sample_3_s8" id ="second_sample_3_s8"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9"name ="second_sample_3_s9" id ="second_sample_3_s9"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10"name ="second_sample_3_s10" id ="second_sample_3_s10"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11"name ="second_sample_3_s11" id ="second_sample_3_s11"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12"name ="second_sample_3_s12" id ="second_sample_3_s12"></td>
            </tr>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">4.</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard" name ="second_sample_4" id ="second_sample_4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1"name ="second_sample_4_s1" id ="second_sample_4_s1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2"name ="second_sample_4_s2" id ="second_sample_4_s2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3"name ="second_sample_4_s3" id ="second_sample_4_s3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4"name ="second_sample_4_s4" id ="second_sample_4_s4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5"name ="second_sample_4_s5" id ="second_sample_4_s5"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6"name ="second_sample_4_s6" id ="second_sample_4_s6"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7"name ="second_sample_4_s7" id ="second_sample_4_s7"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8"name ="second_sample_4_s8" id ="second_sample_4_s8"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9"name ="second_sample_4_s9" id ="second_sample_4_s9"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10"name ="second_sample_4_s10" id ="second_sample_4_s10"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11"name ="second_sample_4_s11" id ="second_sample_4_s11"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12"name ="second_sample_4_s12" id ="second_sample_4_s12"></td>
            </tr>
             <tr>
              <td align="center"style="padding: 8px;">5.</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard" name ="second_sample_5" id ="second_sample_5" onchange ="second_avg_standard()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1"name ="second_sample_5_s1" id ="second_sample_5_s1" onchange ="second_avg_sample1()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2"name ="second_sample_5_s2" id ="second_sample_5_s2" onchange ="second_avg_sample2()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3"name ="second_sample_5_s3" id ="second_sample_5_s3" onchange ="second_avg_sample3()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4"name ="second_sample_5_s4" id ="second_sample_5_s4" onchange ="second_avg_sample4()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5"name ="second_sample_5_s5" id ="second_sample_5_s5" onchange ="second_avg_sample5()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6"name ="second_sample_5_s6" id ="second_sample_5_s6" onchange ="second_avg_sample6()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7" name ="second_sample_5_s7" id ="second_sample_5_s7" onchange ="second_avg_sample7()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8"name ="second_sample_5_s8" id ="second_sample_5_s8" onchange ="second_avg_sample8()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9"name ="second_sample_5_s9" id ="second_sample_5_s9" onchange ="second_avg_sample9()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10"name ="second_sample_5_s10" id ="second_sample_5_s10" onchange ="second_avg_sample10()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11"name ="second_sample_5_s11" id ="second_sample_5_s11" onchange ="second_avg_sample11()"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12"name ="second_sample_5_s12" id ="second_sample_5_s12" onchange ="second_avg_sample12()"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">Average</td>
              <td style="padding: 8px;"><input type = "text" class = "second_standard_avg" name ="second_avg" id = "second_avg"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_1_avg" name ="second_avg_s1" id = "second_avg_s1"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_2_avg" name ="second_avg_s2" id = "second_avg_s2"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_3_avg" name ="second_avg_s3" id = "second_avg_s3"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_4_avg" name ="second_avg_s4" id = "second_avg_s4"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_5_avg" name ="second_avg_s5" id = "second_avg_s5"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_6_avg" name ="second_avg_s6" id = "second_avg_s6"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_7_avg" name ="second_avg_s7" id = "second_avg_s7"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_8_avg" name ="second_avg_s8" id = "second_avg_s8"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_9_avg" name ="second_avg_s9" id = "second_avg_s9"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_10_avg" name ="second_avg_s10" id = "second_avg_s10"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_11_avg" name ="second_avg_s11" id = "second_avg_s11"></td>
              <td style="padding: 8px;"><input type = "text" class ="second_sample_12_avg" name ="second_avg_s12" id = "second_avg_s12"></td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_1_pkt" id ="second_det_1_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_1_wstd" id ="second_det_1_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_1_df" id ="second_det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_1_potency" id ="second_det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_1_pkstd" id ="second_det_1_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_1_awt" id ="second_det_1_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_1_lc" id ="second_det_1_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_1" id ="second_determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_2_pkt" id="second_det_2_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_2_wstd" id ="second_det_2_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_2_df"id="second_det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_2_potency" id ="second_det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_2_pkstd" id ="second_det_2_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_2_awt" id ="second_det_2_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_2_lc" id ="second_det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_2"id ="second_determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_3_pkt" id ="second_det_3_pkt"size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_3_wstd" id ="second_det_3_wstd"size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_3_df" id ="second_det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_3_potency" id ="second_det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_3_pkstd" id ="second_det_3_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_3_awt" id ="second_det_3_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_3_lc" id ="second_det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_3" id ="second_determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_4_pkt" id ="second_det_4_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_4_wstd" id ="second_det_4_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_4_df" id ="second_det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_4_potency" id ="second_det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_4_pkstd" id ="second_det_4_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_4_awt" id ="second_det_4_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_4_lc" id ="second_det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_4" id ="second_determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_5_pkt" id ="second_det_5_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_5_wstd" id ="second_det_5_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_5_df" id ="second_det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_5_potency" id ="second_det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_5_pkstd" id ="second_det_5_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_5_awt" id ="second_det_5_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_5_lc" id ="second_det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_5" id ="second_determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_6_pkt" id ="second_det_6_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_6_wstd" id ="second_det_6_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_6_df" id ="second_det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_6_potency" id ="second_det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="second_det_6_pkstd" id ="second_det_6_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="second_det_6_awt" id ="second_det_6_awt" size ="10" placeholder="AWT" onchange="calculation_determinations()">
          <input type ="text" name="second_det_6_lc" id ="second_det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_6" id ="second_determination_6" size ="10">% LC </td>
      </tr>  
      <tr> 
        <td align="center"colspan ="6"style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "second_determination_avg" name="second_average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="second_equivalent" id = "second_equivalent"></td>
      </tr>
       <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" size = "5" id = "s_range_min" name="s_range_min" > to <input type ="text" size = "5" id = "s_range_max" name="s_range_max"></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "second_determination_rsd" name="second_rsd"></td>
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
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance" placeholder="min%" size="5"  onChange="calc_determination()" /></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="nlt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance_comment" name="min_tolerance_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="max" />Not Greater than Tolerance</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance" placeholder="max%" size="5"  onChange="calc_determination()"/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="ngt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' name="content_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="range" />Tolerance Range</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_from" placeholder="min%" size="5"> - <input type="text" range="tolerance_range" name="content_to" placeholder="max%" size="5"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_comment" disable/></td>
            </tr>

            <tr>
              <td>SD</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
            </tr>
            <tr>
              <td>RSD %</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disable/></td>
            </tr>
          </table>
        </td>
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
          <table border="0" width="30%" cellpadding="8px" align="center">
            <tr>    
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:right;">PASS</input></td>
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="1"></input></td>
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:right;">FAIL</input></td>
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="0"></input></td>
            </tr>
          </table>
         </tr>
         <tr>
       <td colspan="8" style="padding:8px;">
        <table border="0" width="90%" cellpadding="8px" align="center">
          <tr>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Supervisor <input type="text" id="supervisor" name="supervisor"></td>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date <input type="date"  id="date" name="date"></td>
          </tr>
          
          <tr>
            <td colspan="2" style="padding:4px;">Further Comments:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5" name ="further_comments"></textarea></td>
          </tr>
        </table>
      </td>
    </tr>
      <tr>
        <td style ="padding: 8px;"colspan = "6" align ="center"> <input type ="submit" name ="save_two_components_hplc" value ="Save Dissolution Data"></td>
      </tr>
    </table>
   </form> 
 </div>
</div>
  </body>
  </html>