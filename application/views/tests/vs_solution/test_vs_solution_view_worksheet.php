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
     $("#balance_make").change(function(){
         var id_number=$(this).val();
         //append to textbox
         $("#balance_number").val(id_number);
    });
   });  
        function standard_weight_calc(){
        var total = document.getElementById('standard_container').value - document.getElementById('container').value;
        document.getElementById('standard_weight').value = total;
       }

       function standard_weight_calc_2(){
        var total = document.getElementById('standard_container_1').value - document.getElementById('container_1').value;
        document.getElementById('standard_weight_1').value = total;
       }
       function standard_weight_calc_3(){
        var total = document.getElementById('standard_container_2').value - document.getElementById('container_2').value;
        document.getElementById('standard_weight_2').value = total;
       }
       function titration_calc(){
        var total = document.getElementById('final_reading').value - document.getElementById('initial_reading').value;
        document.getElementById('volume').value = total;
       }
       function titration_calc_1(){
        var total = document.getElementById('final_reading_1').value - document.getElementById('initial_reading_1').value;
        document.getElementById('volume_1').value = total;
       }
       function titration_calc_2(){
        var total = document.getElementById('final_reading_2').value - document.getElementById('initial_reading_2').value;
        document.getElementById('volume_2').value = total;
       }
        function determination_calc_1(){
        var upper = (parseInt(document.getElementById('det_1_weight').value) * parseInt(document.getElementById('det_1_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('det_1_equiv_weight').value);

                    document.getElementById('determination_1').value = total;
       }
       function determination_calc_2(){
        var upper = (parseInt(document.getElementById('det_2_weight').value) * parseInt(document.getElementById('det_2_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('det_2_equiv_weight').value);

                    document.getElementById('determination_2').value = total;
       }
       function determination_calc_3(){
        var upper = (parseInt(document.getElementById('det_3_weight').value) * parseInt(document.getElementById('det_3_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('det_3_equiv_weight').value);
       }          

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
    <?php echo form_open('test_vs_solution/worksheet', array('id'=>'test_vs_solution_view'));?>

    <table width="950" class = "table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>">
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
          <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Volumetric Solution Test Form</td>
    </tr> 
           
     <tr> 
      <td colspan ="6" align ="left" style="padding: 12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> <b>Monograph</b></td>
     </tr> 
     <tr> 
      <td colspan ="6" align ="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid #f0f0ff;"><?php echo $query_monograph['monograph'];?> </td>
     </tr> 
    </tr> 
    <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Equipment to be used:</b></td>
    </tr>
    
    <tr>
        <td colspan = ""align="center" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Make:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['balance_make'];?></td>          
        <td align="center" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Number:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['balance_number'];?></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Standardization of<?php echo $query_e['standardization'];?>M HCl using anhydrous Sodium carbonate</b></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Weight of anhydrous Sodium carbonate (g)</b></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 1</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 2 </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 3 </td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_container'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_container_1'];?> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_container_2'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['container'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['container_1'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['container_2'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['standard_weight_1'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['standard_weight_2'];?></td>
        </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Titration volumes</b></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Final burette reading (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['final_reading'];?> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['final_reading_1'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['final_reading_2'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Initial burette reading (ml) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['initial_reading'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['initial_reading_1'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['initial_reading_2'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Volume used. (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['volume'];?> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['volume_1'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['volume_2'];?></td>
      </tr>
        <tr>
        <td colspan = "6" align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><u>CALCULATION OF FACTOR = WEIGHT TAKEN</u><br/>VOLUME USED X EQUIVALENT WEIGHT</td>
      </tr>
       
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['det_1_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['det_1_volume'];?>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['det_1_equiv_weight'];?></td>        
        <td> =&nbsp; &nbsp;<?php echo $query_e['determination_1'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['det_2_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['det_2_volume'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['det_2_equiv_weight'];?></td>        
        <td> =&nbsp &nbsp<?php echo $query_e['determination_2'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['det_3_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['det_3_volume'];?>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['det_3_equiv_weight'];?></td>        
        <td> =&nbsp &nbsp<?php echo $query_e['determination_3'];?>% LC</td>
      </tr>
       <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['average'];?></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> SD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['equivalent'];?></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['rsd'];?></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td align="center"colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Acceptance Criteria</td>
        <td align="center"colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Results</td>
        <td align="left"colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Comments</td>
      </tr>
      <tr>  
        <td colspan = "2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">RSD </td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rsd_acceptance_criteria'];?></td>  
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rsd_results'];?></td>  
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['rsd_comments'];?></td>  
      </tr>
      <tr>      
        <td colspan = "2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">SD</td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['sd_acceptance_criteria'];?></td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['sd_results'];?></td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['sd_comments'];?></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Standardization of<?php echo $query_e['sodium_hydroxide'];?> M Sodium hydroxide using <?php echo $query_e['hcl_vs'];?>M HCL VS</b></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Titration volumes of <?php echo $query_e['hcl_solution'];?> M HCL solution against <?php echo $query_e['sodium_hydroxide_ml'];?>ml of <?php echo $query_e['sodium_hydroxide'];?> M Sodium hydroxide </b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Final burette reading (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['final_burette_3'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['final_burette_4'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['final_burette_5'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Initial burette reading (ml) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['initial_reading_3'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['initial_reading_4'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['initial_reading_5'];?></td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Volume used. (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['volume_3'];?></td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['volume_4'];?></td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['volume_5'];?></td>
      </tr>
      <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"> Use the formula to calculate the factor = M1X V1X F1 = M2 X V2 X F2</td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['second_det_1_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['second_det_1_volume'];?>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['second_det_1_equiv_weight'];?></td>        
        <td> =&nbsp; &nbsp;<?php echo $query_e['second_determination_1'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['second_det_2_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['second_det_2_volume'];?>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['second_det_2_equiv_weight'];?></td>        
        <td> =&nbsp &nbsp<?php echo $query_e['second_determination_2'];?> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<?php echo $query_e['second_det_3_weight'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $query_e['second_det_3_volume'];?>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X 100 <br/><br/>
          <?php echo $query_e['second_det_3_equiv_weight'];?></td>        
        <td> =&nbsp &nbsp<?php echo $query_e['second_determination_3'];?>% LC</td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['second_average'];?></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> SD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['second_equivalent'];?></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['second_rsd'];?></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td colspan ="2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
        <td colspan =""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Acceptance Criteria</td>
        <td align="center"colspan = "" style="padding: 8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Results</td>
        <td align="center"colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Comments</td>
      </tr>
      <tr>  
        <td colspan ="2"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">RSD </td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['second_acceptance_criteria'];?></td>  
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['second_results'];?></td>  
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['second_comments'];?></td>  
      </tr>
      <tr>      
        <td colspan ="2"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">SD</td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['second_acceptance_criteria_1'];?></td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <?php echo $query_e['second_results_1'];?></td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query_e['second_comments_1'];?></td>
      </tr>
       <tr>
        <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><?php echo $query_e['choice'];?></td>
      </tr>
      <tr>
       <td colspan="8" style="padding:8px;">
        <table border="0" width="90%" cellpadding="8px" align="center">
          <tr>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Supervisor: <?php echo $query_e['supervisor'];?></td>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Date: <?php echo $query_e['date'];?></td>
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