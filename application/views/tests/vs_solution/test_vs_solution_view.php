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
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
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
       $(class_+"_final").val(total);
       // alert(class_)
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
       function second_titration_calc(){
        var total = document.getElementById('final_burette_3').value - document.getElementById('initial_reading_3').value;
        document.getElementById('volume_3').value = total;
       }
       function titration_calc_1(){
        var total = document.getElementById('final_reading_1').value - document.getElementById('initial_reading_1').value;
        document.getElementById('volume_1').value = total;
       }
       function second_titration_calc_1(){
        var total = document.getElementById('final_burette_4').value - document.getElementById('initial_reading_4').value;
        document.getElementById('volume_4').value = total;
       }
       function titration_calc_2(){
        var total = document.getElementById('final_reading_2').value - document.getElementById('initial_reading_2').value;
        document.getElementById('volume_2').value = total;
       }
       function second_titration_calc_2(){
        var total = document.getElementById('final_burette_5').value - document.getElementById('initial_reading_5').value;
        document.getElementById('volume_5').value = total;
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

            document.getElementById('determination_3').value = total;
       }  
       function second_determination_calc_1(){
        var upper = (parseInt(document.getElementById('second_det_1_weight').value) * parseInt(document.getElementById('second_det_1_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('second_det_1_equiv_weight').value);

                    document.getElementById('second_determination_1').value = total;
       }
       function second_determination_calc_2(){
        var upper = (parseInt(document.getElementById('second_det_2_weight').value) * parseInt(document.getElementById('second_det_2_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('second_det_2_equiv_weight').value);

                    document.getElementById('second_determination_2').value = total;
       }
       function second_determination_calc_3(){
        var upper = (parseInt(document.getElementById('second_det_3_weight').value) * parseInt(document.getElementById('second_det_3_volume').value))*100;          
        var total = upper/parseInt(document.getElementById('second_det_3_equiv_weight').value);

            document.getElementById('second_determination_3').value = total;
       }          

  </script>
<script type="text/javascript">
  
      $(function() {
          $('#container').keyup(function() {
                
                $('#standard_weight').val((parseInt($('#standard_container').val())) - (parseInt($('#container').val())));
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
    <?php echo form_open('test_vs_solution/worksheet', array('id'=>'test_vs_solution_view'));?>

    <table width="950" class = "table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>">
      <tr>
        <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
     <td colspan ="6">
      <table width="100%" class = "table_form" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
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
        <table border="0" class = "table_form" align="center" cellpadding="8px" width="100%">
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
    </tr> 
    <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Equipment to be used:</b></td>
    </tr>
    
    <tr>
        <td colspan = ""align="center" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Make:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id="equipment_make" name="balance_make">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>" data-equipmentid="<?php echo $equipment['description']; ?>"><?php echo $equipment['id_number'];?></option>
                <?php
                endforeach
                ?>
              
            </select>
         </td>    
      
        <td align="center" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Number:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="balance_number" id="equipmentid"></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Standardization of<input type = "text" name ="standardization">M HCl using anhydrous Sodium carbonate</b></td>
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
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container"   class="container_1" id ="standard_container"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_1" class="container_2" id ="standard_container_1"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container_2" class="container_3" id ="standard_container_2"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container"  id ="container_1" class="compute container_1"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_1"id ="container_2" class="compute container_2"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_2" class=" compute container_3"id ="container_3"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight"  class="container_1_final" > </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1"class="container_2_final"  id ="standard_weight_1" > </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_2"  class="container_3_final"id ="standard_weight_2"> </td>
        </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Titration volumes</b></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Final burette reading (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_reading" id ="final_reading"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_reading_1" id ="final_reading_1"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_reading_2" id ="final_reading_2"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Initial burette reading (ml) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading" id ="initial_reading" onchange ="titration_calc()"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading_1" id="initial_reading_1" onchange ="titration_calc_1()"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading_2" id ="initial_reading_2" onchange ="titration_calc_2()"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Volume used. (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume" id ="volume"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume_1" id ="volume_1"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume_2" id ="volume_2"> </td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">            
            <tr>
              <td colspan = "2" align="right"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb">CALCULATION OF FACTOR = </td><td align="left" style="color:#0000fb;padding: 12px;"><u>WEIGHT TAKEN X VOLUME USED</u> <br/> EQUIVALENT WEIGHT</td>
            </tr>       
          </table>
        </td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<input type ="text" name="det_1_weight" id ="det_1_weight"size ="10" placeholder="WEIGHT TAKEN">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_volume" id ="det_1_volume"size ="10" placeholder="VOLUME USED">]&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>
          <input type ="text" name="det_1_equiv_weight" id ="det_1_equiv_weight" size ="10" placeholder="EQUIVALENT WEIGHT" onchange="determination_calc_1()"></td>        
        <td> =&nbsp &nbsp<input type ="text" name="determination_1" id ="determination_1" size ="10"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<input type ="text" name="det_2_weight" id ="det_2_weight"size ="10" placeholder="WEIGHT TAKEN">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_volume" id ="det_2_volume"size ="10" placeholder="VOLUME USED">]&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>
          <input type ="text" name="det_2_equiv_weight" id ="det_2_equiv_weight" size ="10" placeholder="EQUIVALENT WEIGHT" onchange="determination_calc_2()"></td>        
        <td> =&nbsp &nbsp<input type ="text" name="determination_2" id ="determination_2" size ="10"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
     <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          [<input type ="text" name="det_3_weight" id ="det_3_weight"size ="10" placeholder="WEIGHT TAKEN">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_volume" id ="det_3_volume"size ="10" placeholder="VOLUME USED">]&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>
          <input type ="text" name="det_3_equiv_weight" id ="det_3_equiv_weight" size ="10" placeholder="EQUIVALENT WEIGHT" onchange="determination_calc_3()"></td>        
        <td> =&nbsp &nbsp<input type ="text" name="determination_3" id ="determination_3" size ="10"> </td>
      </tr>
       <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> SD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="equivalent"></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rsd"></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
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
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd_2" name="determination_sd" onChange="calculator()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
                    </tr>
                    <tr>
                      <td>RSD %</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_rsd_2" name="determination_sd" onChange="calculator()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disable/></td>
                    </tr>
                  </table>
                </td>
            </tr>    
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;" ><b>Standardization of <input type ="text" name ="sodium_hydroxide"> M Sodium hydroxide using <input type ="text" name ="hcl_vs"> M HCL VS</b></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Titration volumes of <input type ="text" name ="hcl_solution" size="5"> M HCL solution against <input type ="text" name ="sodium_hydroxide_ml" size="5"> ml of <input type ="text" name ="sodium_hydroxide" size="5"> M Sodium hydroxide </b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Final burette reading (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_burette_3" id ="final_burette_3"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_burette_4" id ="final_burette_4"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="final_burette_5" id ="final_burette_5"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Initial burette reading (ml) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading_3" id ="initial_reading_3" onchange ="second_titration_calc()"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading_4" id ="initial_reading_4" onchange ="second_titration_calc_1()"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="initial_reading_5" id ="initial_reading_5" onchange ="second_titration_calc_2()"> </td>
      </tr>
       <tr>  
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Volume used. (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume_3" id ="volume_3"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume_4" id="volume_4"> </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="volume_5" id ="volume_5"> </td>
      </tr>
      <tr>  
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"> Use the formula to calculate the factor = M1X V1X F1 = M2 X V2 X F2</td>
      </tr>
      <tr>
        <td align="left" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="determination_calc"></textarea> </td>        
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_1" id ="second_determination_1" size ="10"></td>
      </tr>
      <tr>
        <td align="left" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="determination_calc_2"></textarea> </td>        
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_2" id ="second_determination_2" size ="10"></td>
      </tr>
      <tr>
        <td align="left" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="determination_calc_3"></textarea> </td>        
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_3" id ="second_determination_3" size ="10"></td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="second_average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> SD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="second_equivalent" ></td>
      </tr>
       <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "5"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="second_rsd"></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
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
                      <td><input type="checkbox" id="min_2" />Not Less than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min_2="min_tolerance_2" id="min_tolerance_2_2" name="min_tolerance_2" placeholder="min%" size="5"  onChange="calculation_determinations()" /></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min_2="min_tolerance_2" id="nlt_min_tolerance_det_2" name="det_min_2" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min_2="min_tolerance_2" id="min_tolerance_comment_2" name="min_tolerance_comment_2" disable/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="max_2" />Not Greater than Tolerance</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max_2='max_tolerance_2' id="max_tolerance_2" name="max_tolerance_2" placeholder="max%" size="5"  onChange="calculation_determinations()"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max_2='max_tolerance_2' id="ngt_min_tolerance_det_2" name="det_min_2" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max_2='max_tolerance_2' id ="max_tolerance_comment_2" name="max_tolerance_comment_2" disable/></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" id="range_2" />Tolerance Range</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range_2="tolerance_range_2" id = "tolerance_range_from_2" name="tolerance_range_from_2" placeholder="min%" size="5" onChange="calculation_determinations()"> - <input type="text" range="tolerance_range" name="tolerance_range_to" id = "tolerance_range_to" placeholder="max%" size="5" onChange="calculation_determinations()"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range_2="tolerance_range_2" id="range_min_tolerance_det_2" name="det_min_2" size="4" placeholder="min%" onChange="calculation_determinations()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calculation_determinations()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range_2="tolerance_range_2" name="tolerance_range_2" id ="tolerance_range_2" disable/></td>
                    </tr>

                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd_2" name="determination_sd" onChange="calculator()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
                    </tr>
                    <tr>
                      <td>RSD %</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_rsd_2" name="determination_sd" onChange="calculator()" disabled/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disable/></td>
                    </tr>
                  </table>
                </td>
            </tr>  
       <tr>
        <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
       <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">
            <tr>    
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" name="choice" id = "choice" disabled></input></td>
            </tr>
          </table>
          </td>
         </tr>
         <tr>
         <td colspan="8" style="padding:8px;">
          <table border="0" class="table_form" width="100%" cellpadding="8px" align="center">
          <tr>
            <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:cente;">Done by: <input type="hidden" id="done_by" name="done_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
            <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date conducted: <input type="hidden"  id="date" name="date_done" value="<?php echo date("d/m/Y")?>"><?php echo date("d/M/Y")?></td>
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
        <td style ="padding: 8px;"colspan = "8" align ="center"> <input type ="submit" class="btn" name ="save_vs_solution" value ="Submit"></td>
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
        $('#max').prop('disabled', true);
        $('#min').prop('disabled', true);
    } else {
        $("input[range='tolerance_range']").hide();
        $('#max').prop('disabled', false);
        $('#min').prop('disabled', false);
    }
  }).change();

  //Second acceptance criteria
  $('#min_2').change(function() {
    if($('#min_2').is(':checked')){
       $("input[min_2='min_tolerance_2']").show();
       $('#max_2').prop('disabled', true);
       $('#range_2').prop('disabled', true);
    } else {
        $("input[min_2='min_tolerance_2']").hide();
       $('#max_2').prop('disabled', false);
       $('#range_2').prop('disabled', false);
    }
  }).change();
  $('#max_2').change(function() {
    if($('#max_2').is(':checked')){
       $("input[max_2='max_tolerance_2']").show();
       $('#min_2').prop('disabled', true);
       $('#range_2').prop('disabled', true);
    } else {
        $("input[max_2='max_tolerance_2']").hide();
        $('#min_2').prop('disabled', false);
        $('#range_2').prop('disabled', false);
    }
  }).change();
  $('#range_2').change(function() {
    if($('#range_2').is(':checked')){
       $("input[range_2='tolerance_range_2']").show();
        $('#max_2').prop('disabled', true);
        $('#min_2').prop('disabled', true);
    } else {
        $("input[range_2='tolerance_range_2']").hide();
        $('#max_2').prop('disabled', false);
        $('#min_2').prop('disabled', false);
    }
  }).change();
</script>
  </html>