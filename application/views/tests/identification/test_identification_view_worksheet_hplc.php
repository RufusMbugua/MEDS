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
<?php echo form_open('test_identification/worksheet_hplc', array('id'=>'test_identification_hplc_view'));?>

<table width="950" class ="table_form " border="0" cellpadding="4px" align="center">
   <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <tr>
       <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
      <td colspan ="6" style="padding:8px;">
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
    <tr> 
        <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Identification by HPLC Test Form</td>
    </tr>
    <tr> 
      <td colspan ="6" align ="left" style="padding: 12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> <b>Monograph</b></td>
    </tr> 
    <tr> 
      <td colspan ="6" align ="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid #f0f0ff;"><?php echo $query_monograph['monograph'];?> </td>
    </tr> 
    <tr>
        <td colspan = "6"align="left" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Weight of Sample taken</b></td>
      </tr>
    <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of sample + container (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['sample_container'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['container'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of sample (g)</td>
        <td colspan =""style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['sample_weight'];?></td>
       </tr>   
      <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="5" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_dilution'];?></td>
      </tr>   
      
       <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6" align ="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_weight'];?></td>
      </tr>
      <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
        <td colspan ="5" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_dilution_2'];?></td>
      </tr>
      <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_description'];?></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>        
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['potency'];?> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.: <?php echo $query_e['lot_no'];?><br/> ID No.: <?php echo $query_e['id_no'];?></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.: <?php echo $query_e['lot_no_2'];?><br/> ID No.: <?php echo $query_e['id_no_2'];?> </td>
      </tr>
       <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_container_2'];?></td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_container_3'];?></td>
       </tr>        
      <tr>  
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['container_2'];?></td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['container_3'];?></td>
      </tr>        
      <tr> 
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight_2'];?></td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight_3'];?></td>
      </tr>        
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" >Chromatographic System </td>
      </tr> 
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_make" name="equipment_make">
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
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="equipment_number" id="balance_number"></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" >Reagents </td>
      </tr> 
      <tr>
        <td colspan=""align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents Description:<b></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents 1:<b></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents 2:<b></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents 3:<b></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents 4:<b></td>
        
      </tr>
      <tr>
        <td align="center" colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="standard_description" name="reagents" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select></td>
            <td align="left"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="standard_description" name="reagents_2" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select></td>
            <td align="left"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="standard_description" name="reagents_3" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select></td>
            <td align="left"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="standard_description" name="reagents_4" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select></td>        
        <td colspan = ""align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
       <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>          
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_4" id ="standard_container_4"> </td>          
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_5" id ="standard_container_5"> </td>          
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_6" id ="standard_container_6"> </td>         
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_7" id ="standard_container_7"> </td> 
      </tr>
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_4" id ="container_4" onchange ="standard_weight_calc_4()"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_5" id ="container_5" onchange ="standard_weight_calc_5()"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_6" id ="container_6" onchange ="standard_weight_calc_6()"> </td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_7" id ="container_7" onchange ="standard_weight_calc_7()"> </td>
      </tr>
      <tr>
        <td colspan="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_4" id ="standard_weight_4"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_5" id ="standard_weight_5"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_6" id ="standard_weight_6"> </td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_7" id ="standard_weight_7"> </td>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name = "mobile_phase"></textarea></td>
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
              <select id="name" name="name" >
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
            <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Length:</td>
            <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="length" id ="length"> </td>       
          </tr> 
          <tr>
            <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot/Serial No.:</td>
            <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="serial_no" id ="serial_no"> </td>       
            <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Manufacturer:</td>
            <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="manufacturer" id="manufacturer"> </td>       
          </tr>
         </table>
        </td>
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Pressure:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_pressure"> </td>       
      </tr>  
      <tr> 
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Oven Pressure:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_oven_pressure"> </td>       
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Mobile Phase Flow rate:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="flow_rate"> </td>       
      </tr>  
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Detection of Wavelength:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="wavelength"> </td>       
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Calculations<br/>Chromatographic System Suitability</b>  </td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Standard</b><br/>From chromatograms on -  </td>
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
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">1.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_1" id ="rt_1"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_1" id ="peak_area_1"></td >
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_1" id="asymmetry_1"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_1" id ="resolution_1"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">2.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_2" id ="rt_2"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_2" id ="peak_area_2"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_2" id="asymmetry_2"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_2" id ="resolution_2"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">3.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_3" id ="rt_3"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_3" id ="peak_area_3"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_3" id="asymmetry_3"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_3" id ="resolution_3"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">4.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_4" id ="rt_4"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_4" id ="peak_area_4"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_4" id="asymmetry_4"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_4" id ="resolution_4"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">5.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_5" id="rt_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_5" id ="peak_area_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_5" id="asymmetry_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_5" id ="resolution_5"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">6.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_6" id="rt_6" onchange="average_retention_time(); sd_retention_time()"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_6" id ="peak_area_6" onchange ="average_peak_area(); sd_peak_area()"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_6" id ="asymmetry_6" onchange ="average_asymmetry(); sd_asymmetry()"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_6"id ="resolution_6"onchange ="average_resolution(); sd_resolution()"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Average</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_avg" id ="rt_avg"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_avg" id ="peak_area_avg" ></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_avg" id="asymmetry_avg"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_avg" id ="resolution_avg"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">SD</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_sd" id ="rt_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_sd" id ="peak_area_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_sd" id ="asymmetry_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_sd" id ="resolution_sd"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">RSD</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_rsd"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_rsd"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_rsd"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_rsd"></td>
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
            <td style="padding: 8px;"><input type = "text" name ="rt_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_comment"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Sample</b><br/>From chromatograms on -  </td>
      </tr> 
      <tr>
       <td colspan ="6">
          <div class="scroll">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
              <tr>
                <td align="center"><b></b></td>
                <td align="center"><b>Retention Time (minutes)</b></td>
                <td align="center"><b>Peak Area</b></td>
                <td align="center"><b>Asymmetry</b></td>
                <td align="center"><b>Theoretical Plates</b></td>
                <td align="center"><b>Resolution</b></td>
                <td align="center"><b>Relative Retention Time</b></td>
              </tr>
           
              <tr>
                <td align="center"style="padding: 8px;">1.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_1" id ="sample_rt_1"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_1" id ="sample_peak_area_1"></td >
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_1" id="sample_asymmetry_1"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_1" id ="sample_theoretical_1"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_1" id ="sample_resolution_1"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_1" id ="sample_rrt_1"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">2.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_2" id ="sample_rt_2"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_2" id ="sample_peak_area_2"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_2" id="sample_asymmetry_2"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_2" id ="sample_theoretical_2"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_2" id ="sample_resolution_2"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_2" id ="sample_rrt_2"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">3.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_3" id ="sample_rt_3"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_3" id ="sample_peak_area_3"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_3" id="sample_asymmetry_3"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_3" id ="sample_theoretical_3"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_3" id ="sample_resolution_3"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_3" id ="sample_rrt_3"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">4.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_4" id ="sample_rt_4"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_4" id ="sample_peak_area_4"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_4" id="sample_asymmetry_4"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_4" id ="sample_theoretical_4"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_4" id ="sample_resolution_4"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_4" id ="sample_rrt_4"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">5.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_5" id="sample_rt_5" ></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_5" id ="sample_peak_area_5"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_5" id ="sample_asymmetry_5" ></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_5" id ="sample_theoretical_5"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_5"id ="sample_resolution_5"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_5" id ="sample_rrt_5"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">6.</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_6" id="sample_rt_6" onchange="sample_average_retention_time(); sample_sd_retention_time()"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_6" id ="sample_peak_area_6" onchange ="sample_average_peak_area();sample_sd_peak_area()"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_6" id="sample_asymmetry_6" onchange ="sample_average_asymmetry(); sample_sd_asymmetry()"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_6" id ="sample_theoretical_6"onchange ="sample_average_theoretical(); sample_sd_theoretical()"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_6" id ="sample_resolution_6" onchange ="sample_average_resolution(); sample_sd_resolution()"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_6" id ="sample_rrt_6" onchange="sample_average_rrt(); sample_sd_rrt()"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Average</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_avg" id ="sample_rt_avg"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_avg" id ="sample_peak_area_avg" ></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_avg" id="sample_asymmetry_avg"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_avg" id ="sample_theoretical_avg"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_avg" id ="sample_resolution_avg"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">SD</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_sd" id ="sample_rt_sd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_sd" id="sample_peak_area_sd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_sd" id="sample_asymmetry_sd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_sd" id ="sample_theoretical_sd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_sd" id ="sample_resolution_sd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_sd" id ="sample_rrt_sd"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">RSD</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_rsd" id ="sample_rt_rsd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_rsd" id ="sample_peak_area_rsd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_rsd" id ="sample_asymmetry_rsd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_rsd" id ="sample_theoretical_rsd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_rsd" id ="sample_resolution_rsd"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Acceptance Criteria</td>
                <td style="padding: 8px;"><2.0%</td>
                <td style="padding: 8px;"><2.0%</td>
                <td style="padding: 8px;"><2.0%</td>
                <td style="padding: 8px;">>1000</td>
                <td style="padding: 8px;">>2.0%</td>
                <td style="padding: 8px;">95% to 105%</td>
                
              </tr>
              <tr>
                <td align="center"style="padding: 8px;">Comment</td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rt_comment" id ="sample_rt_comment"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_peak_area_comment" id  ="sample_peak_area_comment"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_asymmetry_comment" id ="sample_asymmetry_comment"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_theoretical_comment" id ="sample_theoretical_comment"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_resolution_comment" id ="sample_resolution_comment"></td>
                <td style="padding: 8px;"><input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>
              </tr>
            </table>
         </div>
        </td>
      </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> RELATIVE RETENTION TIME =   <u>RETENTION TIME OF SAMPLE</u> * 100<br/> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRETENTION TIME OF STANDARD</td>
      </tr>     
       <tr>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Acceptance Criteria</td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols ="50" rows="3" name="acceptance_criteria"></textarea> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Results </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea cols ="50" rows="3" name="results"></textarea> </td>  
      </tr>
      <tr>      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Comments</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea cols ="90" rows="3" name="comment"></textarea> </td>
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
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="pass"></input></td>
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:right;">FAIL</input></td>
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:left;"><input type="radio" name="choice" value="fail"></input></td>
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
            <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5"></textarea></td>
          </tr>
        </table>
      </td>
    </tr>
      <tr>
        <td style ="padding: 8px;"colspan = "8" align ="center"> <input type ="submit" name ="save_hplc_method" value ="Save HPLC Data"></td>
      </tr>
    </table>
   </form> 
 </div>
</div>
  </body>
  </html>