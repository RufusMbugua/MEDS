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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
      var idnumberb=$(this).find(":selected").data("idnumberb");
      $("#idnumberb").val(idnumberb);
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
      <?php echo form_open('assay/save',array('id'=>'assay_view'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table border="0" align="center" cellpadding="8px" width="100%" >
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
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></input></td>
                </tr>
            </table>
          </td>
        </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table border="0" align="center" cellpadding="8px" width="100%">
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
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" value="<?php echo date("d/m/Y");?>"></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>(UV) UltraViolet Single Component</h5></td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  colspan="0" align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>
                  </tr>
                  <tr>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_one" name="weight_sample_container_one"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_two" name="weight_sample_container_two"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_three" name="weight_sample_container_three" ></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_one" name="weight_container_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_two" name="weight_container_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_three" name="weight_container_three" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                      <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_one" name="weight_sample_one" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_two" name="weight_sample_two" onChange="calculate_difference()"></td>
                      <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_three" name="weight_sample_three" onChange="calculate_difference()"></td>
                  </tr>
                  <tr>
                    <td colspan="4"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Dilution: &nbsp;<input type="text" name="dilution" size="40"></td>
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
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                    <td>
                      <textarea name="sample_preparation" cols="140" rows="8"></textarea>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td colspan="0"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td colspan="0"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="standard_description" name="standard_description" >
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
                    <td  colspan="0" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td  colspan="0" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="potency"></input></td>
                </tr>
                <tr>
                    <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_container" id="weight_standard_container"></td>
                  
                </tr>
                <tr>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container" id="weight_container" onChange="calculate_difference()"></td>
                    
                </tr>
                <tr>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard" id="weight_standard" onChange="calculate_difference()"></td>
                    
                </tr>
                <tr>
                  <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="dilution" size="30"></input></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="equipment_make" name="equipment_make" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['description'];?>" data-idnumberb="<?php echo $bl_name['id_number']; ?>"><?php  echo $bl_name['description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">ID Number</td>
                    <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" id="idnumberb" name="idnumberb"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
              <td colspan="8" align="center">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
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
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_container_one_one" id="weight_sample_container_one_one"></td>
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_container_two_one" id="weight_sample_container_two_one"></td>
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_container_three_one" id="weight_sample_container_three_one"></td>
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_container_four_one" id="weight_sample_container_four_one"></td>
                        <td  colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_container_five_one" id="weight_sample_container_five_one"></td>
                      
                    </tr>
                    <tr>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of container(g)</td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_one_two" id="weight_container_one_two" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_two_two" id="weight_container_two_two" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_three_two" id="weight_container_three_two" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_four_two" id="weight_container_four_two" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_five_two" id="weight_container_five_two" onChange="calculate_difference()"></td>
                        
                    </tr>
                    <tr>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Sample(g)</td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_one_three" id="weight_sample_one_three" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_two_three" id="weight_sample_two_three" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_three_three" id="weight_sample_three_three" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_four_three" id="weight_sample_four_three" onChange="calculate_difference()"></td>
                        <td colspan="0" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_sample_five_three" id="weight_sample_five_three" onChange="calculate_difference()"></td>
                        
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Mobile Phase Preparation:</b></td>
            </tr>
            <tr>
                <td colspan="8" align="center" style="padding:8px;">
                  <table class="inner_table" width="80%" align="center" cellpadding="8px">
                    <tr>
                      <td colspan="0" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="140" rows="8" type="text" name="mobile_phase_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System-Suitability requirements</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">From Chromatograms<br><br> Component 1 <input type="text" name="component_one"></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" widt="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;">No.</td>
                      <td style="text-align:center;padding:8px;">Retention time (minutes)</td>
                      <td style="text-align:center;padding:8px;">Peak Area</td>
                      <td style="text-align:center;padding:8px;">Asymmetry</td>
                      <td style="text-align:center;padding:8px;">Resolution</td>
                      <td style="text-align:center;padding:8px;">Relative retention time</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="retention_time_one" name="retention_time_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="peak_area_one"></input></td>
                      <td><input type="text" id="asymmetry_one" name="asymmetry_one"></input></td>
                      <td><input type="text" id="resolution_one" name="resolution_one"></input></td>
                      <td><input type="text" id="relative_retention_time_one" name="relative_retention_time_one"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="retention_time_two" name="retention_time_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="peak_area_two" name="peak_area_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="asymmetry_two" name="asymmetry_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="resolution_two" name="resolution_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="relative_retention_time_two" name="relative_retention_time_two" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="retention_time_three" name="retention_time_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="peak_area_three" name="peak_area_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="asymmetry_three" name="asymmetry_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="resolution_three" name="resolution_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="relative_retention_time_three" name="relative_retention_time_three" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="retention_time_four" name="retention_time_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="peak_area_four" name="peak_area_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="asymmetry_four" name="asymmetry_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="resolution_four" name="resolution_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="relative_retention_time_four" name="relative_retention_time_four" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="retention_time_five" name="retention_time_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="peak_area_five" name="peak_area_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="asymmetry_five" name="asymmetry_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="resolution_five" name="resolution_five" onChange="calc_avg_resolution()"></input></td>
                      <td><input type="text" id="relative_retention_time_five" name="relative_retention_time_five" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="retention_time_six" name="retention_time_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="peak_area_six" name="peak_area_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="asymmetry_six" name="asymmetry_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="resolution_six" name="resolution_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="relative_retention_time_six" name="relative_retention_time_six" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator()"></input></td>
                      <td><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="average_asymmetry" name="average_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="average_resolution" name="average_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="average_relative_retention_time" name="average_relative_retention_time" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator()" ></input></td>
                      <td><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="standard_dev_asymmetry" name="standard_dev_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="standard_dev_resolution" name="standard_dev_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="standard_dev_relative_retention_time" name="standard_dev_relative_retention_time" onChange=""></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator()"></input></td>
                      <td><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="rsd_asymmetry" name="rsd_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="rsd_resolution" name="rsd_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="rsd_relative_retention_time" name="rsd_relative_retention_time" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NLT 3.0%</td>
                      <td style="padding:4px;text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>

            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Component 2  <input type="text" name="component_two"></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" widt="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;">No.</td>
                      <td style="text-align:center;padding:8px;">Retention time (minutes)</td>
                      <td style="text-align:center;padding:8px;">Peak Area</td>
                      <td style="text-align:center;padding:8px;">Asymmetry</td>
                      <td style="text-align:center;padding:8px;">Resolution</td>
                      <td style="text-align:center;padding:8px;">Relative retention time</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="c2_retention_time_one" name="c2_retention_time_one"></input></td>
                      <td><input type="text" id="c2_peak_area_one" name="c2_peak_area_one"0></input></td>
                      <td><input type="text" id="c2_asymmetry_one" name="c2_asymmetry_one"></input></td>
                      <td><input type="text" id="c2_resolution_one" name="c2_resolution_one"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_one" name="c2_relative_retention_time_one"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="c2_retention_time_two" name="c2_retention_time_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_peak_area_two" name="c2_peak_area_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_asymmetry_two" name="c2_asymmetry_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_resolution_two" name="c2_resolution_two" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_two" name="c2_relative_retention_time_two" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="c2_retention_time_three" name="c2_retention_time_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_peak_area_three" name="c2_peak_area_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_asymmetry_three" name="c2_asymmetry_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_resolution_three" name="c2_resolution_three" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_three" name="c2_relative_retention_time_three" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="c2_retention_time_four" name="c2_retention_time_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_peak_area_four" name="c2_peak_area_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_asymmetry_four" name="c2_asymmetry_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_resolution_four" name="c2_resolution_four" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_four" name="c2_relative_retention_time_four" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="c2_retention_time_five" name="c2_retention_time_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_peak_area_five" name="c2_peak_area_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_asymmetry_five" name="c2_asymmetry_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_resolution_five" name="c2_resolution_five" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_five" name="c2_relative_retention_time_five" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="c2_retention_time_six" name="c2_retention_time_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_peak_area_six" name="c2_peak_area_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_asymmetry_six" name="c2_asymmetry_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_resolution_six" name="c2_resolution_six" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_relative_retention_time_six" name="c2_relative_retention_time_six" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="c2_average_retention_time" name="c2_average_retention_time" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_average_peak_area" name="c2_average_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_average_asymmetry" name="c2_average_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_average_resolution" name="c2_average_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_average_relative_retention_time" name="c2_average_relative_retention_time" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td><input type="text" id="c2_standard_dev_retention_time" name="c2_standard_dev_retention_time" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_standard_dev_peak_area" name="c2_standard_dev_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_standard_dev_asymmetry" name="c2_standard_dev_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_standard_dev_resolution" name="c2_standard_dev_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_standard_dev_relative_retention_time" name="c2_standard_dev_relative_retention_time" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td><input type="text" id="c2_rsd_retention_time" name="c2_rsd_retention_time" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_rsd_peak_area" name="c2_rsd_peak_area" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_rsd_asymmetry" name="c2_rsd_asymmetry" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_rsd_resolution" name="c2_rsd_resolution" onChange="calculator()"></input></td>
                      <td><input type="text" id="c2_rsd_relative_retention_time" name="c2_rsd_relative_retention_time" onChange="calculator()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NLT 3.0%</td>
                      <td style="padding:4px;text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
                      <td><input type="text" id="" name=""></input></td>
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
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Pressure</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_pressure"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Oven Temperature</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_over_temperature"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="mp_flow_rate"></input></td>
                  </tr>
                  <tr>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength</td>
                    <td colspan="0" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="d_wavelength"></input></td>
                  </tr>
                </table>
            </tr>
            
             
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Chromatographic System- As Per System Stability</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Component 1 <input type="text" name="component_one"></input></td>
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
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Sample 4</td>
                      <td style="text-align:center;padding:8px;">Sample 5</td>
                      <td style="text-align:center;padding:8px;">Sample 6</td>
                      <td style="text-align:center;padding:8px;">Relative retention 95%-105%</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="std_one" name="std_one"></input></td>
                      <td><input type="text" id="sample_one_one" name="sample_one_one"></input></td>
                      <td><input type="text" id="sample_one_two" name="sample_one_two"></input></td>
                      <td><input type="text" id="sample_one_three" name="sample_one_three"></input></td>
                      <td><input type="text" id="sample_one_four" name="sample_one_four"></input></td>
                      <td><input type="text" id="sample_one_five" name="sample_one_five"></input></td>
                      <td><input type="text" id="sample_one_six" name="sample_one_six"></input></td>
                      <td><input type="text" id="relative_one" name="relative_one"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="std_two" name="std_two" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_two_one" name="sample_two_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_two_two" name="sample_two_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_two_three" name="sample_two_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="sample_two_four" name="sample_two_four" onChange="calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="sample_two_five" name="sample_two_five" onChange="calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="sample_two_six" name="sample_two_six" onChange="calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="relative_two" name="relative_two" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="std_three" name="std_three" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_three_one" name="sample_three_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_three_two" name="sample_three_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_three_three" name="sample_three_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="sample_three_four" name="sample_three_four" onChange="calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="sample_three_five" name="sample_three_five" onChange="calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="sample_three_six" name="sample_three_six" onChange="calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="relative_three" name="relative_three" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="std_four" name="std_four" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_four_one" name="sample_four_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_four_two" name="sample_four_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_four_three" name="sample_four_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="sample_four_four" name="sample_four_four" onChange="calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="sample_four_five" name="sample_four_five" onChange="calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="sample_four_six" name="sample_four_six" onChange="calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="relative_four" name="relative_four" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="std_five" name="std_five" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_five_one" name="sample_five_one" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_five_two" name="sample_five_two" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_five_three" name="sample_five_three" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="sample_five_four" name="sample_five_four" onChange="calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="sample_five_five" name="sample_five_five" onChange="calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="sample_five_six" name="sample_five_six" onChange="calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="relative_five" name="relative_five" onChange="calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="std_average" name="std_average" onChange="calc_avg_std()"></input></td>
                      <td><input type="text" id="sample_one_average" name="sample_one_average" onChange="calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="sample_two_average" name="sample_two_average" onChange="calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="sample_three_average" name="sample_three_average" onChange="calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="sample_four_average" name="sample_four_average" onChange="calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="sample_five_average" name="sample_five_average" onChange="calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="sample_six_average" name="sample_six_average" onChange="calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="relative_average" name="relative_average" onChange="calc_avg_relative()"></input></td>
                    </tr>
                  </table>
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;"><b>Where:</b></td>
                      <td style="color:#0000ff;padding:8px;">relative retention =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">retention time of peak of interest</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></input></td>
                      <td style="color:#0000ff;padding:8px;">Retention time of reference peak</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
            </tr>
             <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOXPOTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;text-align:center;">(PEAK AREA OF STANDARD x WT OF POWDER TAKEN x LABEL CLAIM</td>
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
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_one_pkt" name="d_one_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_one_wstd" name="d_one_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_one_awt" name="d_one_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_one_df" name="d_one_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_one_potency" name="d_one_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_one_p_lc" name="d_one_p_lc" onCHange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_one_pkstd" name="d_one_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_one_wt" name="d_one_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_one_lc" name="d_one_lc" placeholder="(LC)" size="5" onCHange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_two_pkt" name="d_two_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_two_wstd" name="d_two_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_two_awt" name="d_two_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_two_df" name="d_two_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_two_potency" name="d_two_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_two_p_lc" name="d_two_p_lc" onCHange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_two_pkstd" name="d_two_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_two_wt" name="d_two_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_two_lc" name="d_two_lc" placeholder="(LC)" size="5" onCHange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_three_pkt" name="d_three_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_three_wstd" name="d_three_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_three_awt" name="d_three_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_three_df" name="d_three_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_three_potency" name="d_three_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_three_p_lc" name="d_three_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_three_pkstd" name="d_three_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_three_wt" name="d_three_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_three_lc" name="d_three_lc" placeholder="(LC)" size="5" onChange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 4</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_four_pkt" name="d_four_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_four_wstd" name="d_four_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_four_awt" name="d_four_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_four_df" name="d_four_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_four_potency" name="d_four_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_four_p_lc" name="d_four_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_four_pkstd" name="d_four_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_four_wt" name="d_four_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_four_lc" name="d_four_lc" placeholder="(LC)" size="5" onChange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 5</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_five_pkt" name="d_five_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_five_wstd" name="d_five_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_five_awt" name="d_five_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_five_df" name="d_five_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_five_potency" name="d_five_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_five_p_lc" name="d_five_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_five_pkstd" name="d_five_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_five_wt" name="d_five_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_five_lc" name="d_five_lc" placeholder="(LC)" size="5" onChange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 6</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_six_pkt" name="d_six_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="d_six_wstd" name="d_six_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_six_awt" name="d_six_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="d_six_df" name="d_six_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_six_potency" name="d_six_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_six_p_lc" name="d_six_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_six_pkstd" name="d_six_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_six_wt" name="d_six_wt" placeholder="(WT)" size="5"> x <input type="text" id="d_six_lc" name="d_six_lc" placeholder="(LC)" size="5" onChange="calc_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="average"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="equivalent_to"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sd"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rsd"></input></td>
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
                      <td>Content</td>
                      <td style="color:#0000ff;padding:8px;">92.5 to 107.5% of the stated amount</input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                    <tr>
                      <td>RSD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
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

            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Component 2 <input type="text" name="component_two"></input></td>
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
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Sample 4</td>
                      <td style="text-align:center;padding:8px;">Sample 5</td>
                      <td style="text-align:center;padding:8px;">Sample 6</td>
                      <td style="text-align:center;padding:8px;">Relative retention 95%-105%</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="c2_std_one" name="c2_std_one"></input></td>
                      <td><input type="text" id="c2_sample_one_one" name="c2_sample_one_one"></input></td>
                      <td><input type="text" id="c2_sample_one_two" name="c2_sample_one_two"></input></td>
                      <td><input type="text" id="c2_sample_one_three" name="c2_sample_one_three"></input></td>
                      <td><input type="text" id="c2_sample_one_four" name="c2_sample_one_four"></input></td>
                      <td><input type="text" id="c2_sample_one_five" name="c2_sample_one_five"></input></td>
                      <td><input type="text" id="c2_sample_one_six" name="c2_sample_one_six"></input></td>
                      <td><input type="text" id="c2_relative_one" name="c2_relative_one"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="c2_std_two" name="c2_std_two" onChange="c2_calc_avg_std()"></input></td>
                      <td><input type="text" id="c2_sample_two_one" name="c2_sample_two_one" onChange="c2_calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="c2_sample_two_two" name="c2_sample_two_two" onChange="c2_calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="c2_sample_two_three" name="c2_sample_two_three" onChange="c2_calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="c2_sample_two_four" name="c2_sample_two_four" onChange="c2_calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="c2_sample_two_five" name="c2_sample_two_five" onChange="c2_calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="c2_sample_two_six" name="c2_sample_two_six" onChange="c2_calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="c2_relative_two" name="c2_relative_two" onChange="c2_calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="c2_std_three" name="c2_std_three" onChange="c2_calc_avg_std()"></input></td>
                      <td><input type="text" id="c2_sample_three_one" name="c2_sample_three_one" onChange="c2_calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="c2_sample_three_two" name="c2_sample_three_two" onChange="c2_calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="c2_sample_three_three" name="c2_sample_three_three" onChange="c2_calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="c2_sample_three_four" name="c2_sample_three_four" onChange="c2_calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="c2_sample_three_five" name="c2_sample_three_five" onChange="c2_calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="c2_sample_three_six" name="c2_sample_three_six" onChange="c2_calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="c2_relative_three" name="c2_relative_three" onChange="c2_calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="c2_std_four" name="c2_std_four" onChange="c2_calc_avg_std()"></input></td>
                      <td><input type="text" id="c2_sample_four_one" name="c2_sample_four_one" onChange="c2_calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="c2_sample_four_two" name="c2_sample_four_two" onChange="c2_calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="c2_sample_four_three" name="c2_sample_four_three" onChange="c2_calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="c2_sample_four_four" name="c2_sample_four_four" onChange="c2_calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="c2_sample_four_five" name="c2_sample_four_five" onChange="c2_calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="c2_sample_four_six" name="c2_sample_four_six" onChange="c2_calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="c2_relative_four" name="c2_relative_four" onChange="c2_calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="c2_std_five" name="c2_std_five" onChange="c2_calc_avg_std()"></input></td>
                      <td><input type="text" id="c2_sample_five_one" name="c2_sample_five_one" onChange="c2_calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="c2_sample_five_two" name="c2_sample_five_two" onChange="c2_calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="c2_sample_five_three" name="c2_sample_five_three" onChange="c2_calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="c2_sample_five_four" name="c2_sample_five_four" onChange="c2_calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="c2_sample_five_five" name="c2_sample_five_five" onChange="c2_calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="c2_sample_five_six" name="c2_sample_five_six" onChange="c2_calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="c2_relative_five" name="c2_relative_five" onChange="c2_calc_avg_relative()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="c2_std_average" name="c2_std_average" onChange="c2_calc_avg_std()"></input></td>
                      <td><input type="text" id="c2_sample_one_average" name="c2_sample_one_average" onChange="c2_calc_avg_sample_one()"></input></td>
                      <td><input type="text" id="c2_sample_two_average" name="c2_sample_two_average" onChange="c2_calc_avg_sample_two()"></input></td>
                      <td><input type="text" id="c2_sample_three_average" name="c2_sample_three_average" onChange="c2_calc_avg_sample_three()"></input></td>
                      <td><input type="text" id="c2_sample_four_average" name="c2_sample_four_average" onChange="c2_calc_avg_sample_four()"></input></td>
                      <td><input type="text" id="c2_sample_five_average" name="c2_sample_five_average" onChange="c2_calc_avg_sample_five()"></input></td>
                      <td><input type="text" id="c2_sample_six_average" name="c2_sample_six_average" onChange="c2_calc_avg_sample_six()"></input></td>
                      <td><input type="text" id="c2_relative_average" name="c2_relative_average" onChange="c2_calc_avg_relative()"></input></td>
                    </tr>
                  </table>
                </div>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;"><b>Where:</b></td>
                      <td style="color:#0000ff;padding:8px;">relative retention =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">retention time of peak of interest</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td style="color:#0000ff;padding:8px;">Retention time of reference peak</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
            </tr>
             <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOXPOTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;text-align:center;">PEAK AREA OF STANDARD x WT OF POWDER TAKEN x LABEL CLAIM</td>
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
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_one_pkt" name="c2_d_one_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_one_wstd" name="c2_d_one_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_one_awt" name="c2_d_one_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_one_df" name="c2_d_one_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_one_potency" name="c2_d_one_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_one_p_lc" name="c2_d_one_p_lc" onCHange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_one_pkstd" name="c2_d_one_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_one_wt" name="c2_d_one_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_one_lc" name="c2_d_one_lc" placeholder="(LC)" size="5" onCHange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_two_pkt" name="c2_d_two_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_two_wstd" name="c2_d_two_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_two_awt" name="c2_d_two_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_two_df" name="c2_d_two_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_two_potency" name="c2_d_two_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_two_p_lc" name="c2_d_two_p_lc" onCHange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_two_pkstd" name="c2_d_two_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_two_wt" name="c2_d_two_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_two_lc" name="c2_d_two_lc" placeholder="(LC)" size="5" onCHange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_three_pkt" name="c2_d_three_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_three_wstd" name="c2_d_three_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_three_awt" name="c2_d_three_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_three_df" name="c2_d_three_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_three_potency" name="c2_d_three_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_three_p_lc" name="c2_d_three_p_lc" onChange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_three_pkstd" name="c2_d_three_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_three_wt" name="c2_d_three_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_three_lc" name="c2_d_three_lc" placeholder="(LC)" size="5" onChange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 4</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_four_pkt" name="c2_d_four_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_four_wstd" name="c2_d_four_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_four_awt" name="c2_d_four_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_four_df" name="c2_d_four_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_four_potency" name="c2_d_four_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_four_p_lc" name="c2_d_four_p_lc" onChange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_four_pkstd" name="c2_d_four_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_four_wt" name="c2_d_four_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_four_lc" name="c2_d_four_lc" placeholder="(LC)" size="5" onChange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 5</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_five_pkt" name="c2_d_five_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_five_wstd" name="c2_d_five_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_five_awt" name="c2_d_five_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_five_df" name="c2_d_five_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_five_potency" name="c2_d_five_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_five_p_lc" name="c2_d_five_p_lc" onChange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_five_pkstd" name="c2_d_five_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_five_wt" name="c2_d_five_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_five_lc" name="c2_d_five_lc" placeholder="(LC)" size="5" onChange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 6</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="c2_d_six_pkt" name="c2_d_six_pkt"  placeholder="(PKT)" size="5"/> x <input type="text" id="c2_d_six_wstd" name="c2_d_six_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="c2_d_six_awt" name="c2_d_six_awt" placeholder="(AWT)" size="5"/> x 100 x <input type="text" id="c2_d_six_df" name="c2_d_six_df" placeholder="(DF)" size="5"/> x <input type="text" id="c2_d_six_potency" name="c2_d_six_potency" placeholder="(P)" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="c2_d_six_p_lc" name="c2_d_six_p_lc" onChange="calc_c2_determination()" placeholder="(%LC)" size="10"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="c2_d_six_pkstd" name="c2_d_six_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="c2_d_six_wt" name="c2_d_six_wt" placeholder="(WT)" size="5"> x <input type="text" id="c2_d_six_lc" name="c2_d_six_lc" placeholder="(LC)" size="5" onChange="calc_c2_determination()"></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="average"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="equivalent_to"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sd"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rsd"></input></td>
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
                      <td>Content</td>
                      <td style="color:#0000ff;padding:8px;">92.5 to 107.5% of the stated amount</input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                    </tr>
                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                    </tr>
                    <tr>
                      <td>RSD</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" name="c2_"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Tick</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">System Suitability Sequence</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="c2_sysytem_suitability_sequence" value="Sysytem Suitability Sequence"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="c2_sysytem_suitability_sequence_comment" size="50"></input></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Sample Injection sequence</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="c2_sample_injection_sequence" value="Sample Injection Sequence"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="c2_Sample_injection_sequence_comment" size="50"></input></td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Chromatograms Attached</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="c2_chromatograms_attached" value="Chromatograms Attached"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="c2_chromatograms_attached_comment" size="50"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>  
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Test</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Chemical/Reagent</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Batch No.</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Manufacturer</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                      <td style="border-bottom:dottted 1px #c4c4ff;"><input type="" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
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
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
       </table>
      </form>
</div>
</div>
</body>
</html>
