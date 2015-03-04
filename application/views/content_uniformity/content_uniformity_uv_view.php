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
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.autosave.js';?>"></script>
  
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
    <div id="form_wrapper_lists">
     <div id="account_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open('content_uniformity/save_worksheet_uv',array('id'=>'assay_view'));?>
       <table width="70%" class="table_form" cellpadding="4px" border="0" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
          <tr>
            <td colspan="8" style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'content_uniformity/content_uniformity_tests/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="25px" width="20px">Back</a></td>
          </tr>
          <tr>
            <td colspan="8" style="text-align:center;padding:8px;">
              <table width="100%" class="table_form" cellpadding="4px" border="0" align="center">
                <tr>
                    <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                    <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
                </tr>
                <tr>    
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">DOCUMENT: ANALYTICAL WORKSHEET</td>
                    <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">TITLE: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?></td>
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
                      <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $monograph[0]['serial_number']?></td>
                      <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                      <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></td>
                      
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
                <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5><b>Content Uniformity By UV (ULTRAVIOLET)</b></h5></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Balance Details</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance Make</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="80" id="equipmentbalance" name="equipmentbalance"></input></td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance ID Number</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="equipment_id" name="equipment_id" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['id_number'];?>" data-equipmentbalance="<?php echo $bl_name['description']; ?>"><?php  echo $bl_name['id_number'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>    
                      <!-- <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 4</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 5</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 6</td> -->
                  </tr>
                  <tr>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_one" name="weight_sample_container_one" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_two" name="weight_sample_container_two" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_three" name="weight_sample_container_three" size="10"></td><!-- 
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_four" name="weight_sample_container_four" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_five" name="weight_sample_container_five" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_six" name="weight_sample_container_six" size="10"></td> -->
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_one" name="weight_container_one" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_two" name="weight_container_two" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_three" name="weight_container_three" onChange="calculate_difference()" size="10"></td><!-- 
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_four" name="weight_container_four" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_five" name="weight_container_five" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_six" name="weight_container_six" onChange="calculate_difference()" size="10"></td> -->
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_one" name="weight_sample_one" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_two" name="weight_sample_two" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_three" name="weight_sample_three" onChange="calculate_difference()" size="10"></td><!-- 
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_four" name="weight_sample_four" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_five" name="weight_sample_five" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_six" name="weight_sample_six" onChange="calculate_difference()" size="10"></td> -->
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Dilution Preparation: </td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea rows="5" cols="160" name="dilution_one"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Sample Dilution Result <input type="text" id="dilution_result" name="dilution_result"></td>
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
                <table border="0" class="inner_table" width="85%" cellpadding="8px" align="center">
                  <tr>
                    <td>
                      <textarea name="weight_of_standard_preparation" cols="160" rows="8"></textarea>
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
                      <select id="standard_description_one" name="standard_description_one" >
                      <option selected></option>
                       <?php
                       foreach($sql_standards as $s_name):
                      ?>
                       
                       <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                    <!-- <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="standard_description_two" name="standard_description_two" >
                      <option selected></option>
                       <?php
                       foreach($sql_standards as $s_name):
                      ?>
                       
                       <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumbertwo="<?php echo $s_name['batch_number'];?>" data-stdrefnumbertwo="<?php echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td> -->
                </tr>
                 <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Lot Number</td>
                    <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdlotnumber" name="std_lot_number" value=""></input></td>
                    <!-- <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdlotnumbertwo" name="std_lot_number" value=""></input></td> -->
                </tr>
                <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    ID Number</td>
                    <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdrefnumber" name="std_id_number" value=""></input></td>
                    <!-- <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdrefnumbertwo" name="std_id_number" value=""></input></td> -->
                </tr>
                <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="potency_one" name="potency_one"></input></td>
                    <!-- <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="potency_two" name="potency_two"></input></td> -->
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_container_one" id="weight_standard_container_one"></td>
                    <!-- <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_container_two" id="weight_standard_container_two"></td> -->
                  
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_of_std_one" id="container_one" onChange="calculate_sample_difference()"></td>
                    <!-- <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_of_std_two" id="container_two" onChange="calculate_sample_difference()"></td> 
                     -->
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_one" id="weight_standard_one" onChange="calculate_sample_difference()"></td>
                    <!-- <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_two" id="weight_standard_two" ></td>
                     -->
                </tr>
                <tr>
                  <td colspan="4" height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;">Dilution:</td>
                </tr>
                <tr>
                  
                  <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="dilution_one" row="8" cols="40"></textarea></td>
                  <!-- <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="dilution_two" row="8" cols="40"></textarea></td> -->
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
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="80" id="equipmentmake" name="equipmentmake"></input></td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment ID Number</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="make_id" name="make_id" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['id_number'];?>" data-equipmentmake="<?php echo $bl_name['description']; ?>"><?php  echo $bl_name['id_number'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
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
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 4</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 5</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 6</td>
                    </tr>
                    <tr>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Sample + container(g)</td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_one" id="weight_reagent_container_one" size="10"></td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_two" id="weight_reagent_container_two" size="10"></td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_three" id="weight_reagent_container_three" size="10"></td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_four" id="weight_reagent_container_four" size="10"></td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_five" id="weight_reagent_container_five" size="10"></td>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_six" id="weight_reagent_container_six" size="10"></td>
                      
                    </tr>
                    <tr>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of container(g)</td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_one_reagent" id="container_aone" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_two_reagent" id="container_btwo" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_three_reagent" id="container_three" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_four_reagent" id="container_four" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_five_reagent" id="container_five" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_container_six_reagent" id="container_six" onChange="calculate_reagent_difference()" size="10"></td>
                        
                    </tr>
                    <tr>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Sample(g)</td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_one" id="weight_reagent_one" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_two" id="weight_reagent_two" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_three" id="weight_reagent_three" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_four" id="weight_reagent_four" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_five" id="weight_reagent_five" onChange="calculate_reagent_difference()" size="10"></td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_six" id="weight_reagent_six" onChange="calculate_reagent_difference()" size="10"></td>
                        
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
                      <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="160" rows="8" type="text" name="mobile_phase_preparation"></textarea>
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
                  <table class="inner_table" border="0" widt="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>No.</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Retention time (minutes)</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Peak Area</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Asymmetry</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Resolution</b></td>
                      <!-- <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Relative retention time</b></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="retention_time_one" name="retention_time_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="peak_area_one"></input></td>
                      <td><input type="text" id="asymmetry_one" name="asymmetry_one"></input></td>
                      <td><input type="text" id="resolution_one" name="resolution_one"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_one" name="relative_retention_time_one"></input></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="retention_time_two" name="retention_time_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_two" name="peak_area_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_two" name="asymmetry_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_two" name="resolution_two" onChange="calculator_average()"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_two" name="relative_retention_time_two" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="retention_time_three" name="retention_time_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_three" name="peak_area_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_three" name="asymmetry_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_three" name="resolution_three" onChange="calculator_average()"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_three" name="relative_retention_time_three" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="retention_time_four" name="retention_time_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_four" name="peak_area_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_four" name="asymmetry_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_four" name="resolution_four" onChange="calculator_average()"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_four" name="relative_retention_time_four" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="retention_time_five" name="retention_time_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_five" name="peak_area_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_five" name="asymmetry_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_five" name="resolution_five" onChange="calculator_average()"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_five" name="relative_retention_time_five" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="retention_time_six" name="retention_time_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_six" name="peak_area_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_six" name="asymmetry_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_six" name="resolution_six" onChange="calculator_average()"></input></td>
                      <!-- <td><input type="text" id="relative_retention_time_six" name="relative_retention_time_six" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td style="color:#0000ff;"><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_asymmetry" name="average_asymmetry" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="average_resolution" name="average_resolution" onChange="calculator_average()" disabled></input></td>
                      <!-- <td><input type="text" id="average_relative_retention_time" name="average_relative_retention_time" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_asymmetry" name="standard_dev_asymmetry" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_resolution" name="standard_dev_resolution" onChange="calculator_average()" disabled></input></td>
                      <!-- <td><input type="text" id="standard_dev_relative_retention_time" name="standard_dev_relative_retention_time" onChange=""></input></td> -->
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_asymmetry" name="rsd_asymmetry" onChange="calculator_average()" disabled></input></td>
                      <td style="color:#0000ff;" ><input type="text" id="rsd_resolution" name="rsd_resolution" onChange="calculator_average()" disabled></input></td>
                      <!-- <td><input type="text" id="rsd_relative_retention_time" name="rsd_relative_retention_time" onChange="calculator_average()"></input></td> -->
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NLT 5.0%</td>
                      <!-- <td style="padding:4px;text-align:center;">95% to 105%</td> -->
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td style="color:#0000ff;"><input type="text" id="comment_retention_time" name="comment_retention_time" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="comment_peak_area" name="comment_peak_area" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="comment_asymmetry" name="comment_asymmetry" disabled></input></td>
                      <td style="color:#0000ff;"><input type="text" id="comment_resolution" name="comment_resolution" disabled></input></td>
                      <!-- <td><input type="text" id="comment_relative_retention_time" name="comment_relative_retention_time"></input></td> -->
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
                  <table border="0" width="50%" class="inner_table" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" class="std" name="std_one" id="std_one" size="10"></input></td> 
                      <td><input type="text" class="sample_one" id="sample_a_one" name="sample_a_one" size="10"></input></td>
                      <td><input type="text" class="sample_two" id="sample_b_one" name="sample_b_one" size="10"></input></td>
                      <td><input type="text" class="sample_three" id="sample_c_one" name="sample_c_one" size="10"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" class="std" id="std_two" name="std_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_one" id="sample_a_two" name="sample_a_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_two" id="sample_b_two" name="sample_b_two" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_three" id="sample_c_two" name="sample_c_two" onChange="" size="10"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" class="std" id="std_three" name="std_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_one" id="sample_a_three" name="sample_a_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_two" id="sample_b_three" name="sample_b_three" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_three" id="sample_c_three" name="sample_c_three" onChange="" size="10"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" class="std" id="std_four" name="std_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_one" id="sample_a_four" name="sample_a_four" onChange=" " size="10"></input></td>
                      <td><input type="text" class="sample_two" id="sample_b_four" name="sample_b_four" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_three" id="sample_c_four" name="sample_c_four" onChange="" size="10"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" class="std" id="std_five" name="std_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_one" id="sample_a_five" name="sample_a_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_two" id="sample_b_five" name="sample_d_five" onChange="" size="10"></input></td>
                      <td><input type="text" class="sample_three" id="sample_c_five" name="sample_c_five" onChange="" size="10"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>

                      <td><input type="text"  class="std_average" id="std_average" name="std_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="sample_one_average" id="sample_a_average" name="sample_a_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="sample_two_average" id="sample_b_average" name="sample_b_average" onChange="" size="10" disabled></input></td>
                      <td><input type="text"  class="sample_three_average" id="sample_c_average" name="sample_c_average" onChange="" size="10" disabled></td>
                    </tr>
                  </table>
                </div>
                </td>
            </tr>        
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><b>Calculations</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Absorbance of Sample x 10 x Dilution Factor x Average WT =</td>
                      <td style="color:#0000ff;padding:8px;">LC%</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:center;">A(1%, 1CM)1000 x Weight Taken x Label Claim</td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_absorbance_one" name="d_absorbance_one"  placeholder="(Absor)" size="5"/ disabled> x 10 x <input type="text" id="d_one_df" name="d_one_df" placeholder="(DF)" size="5" disabled/>X <input type="text" id="d_one_awt" name="d_one_awt" onChange="calc_determination()" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_one_p_lc" name="d_one_p_lc"  placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;text-align:center;">A(1%, 1cm)1000 x <input type="text" id="d_one_wt" name="d_one_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_one_lc" name="d_one_lc" value="<?php echo $query['strength_concentration']?>" placeholder="(LC)" size="5"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_absorbance_two" name="d_absorbance_two" placeholder="(Absor)" size="5"  disabled/> x 10 X <input type="text" id="d_two_df" name="d_two_df" placeholder="(DF)" size="5"/> x <input type="text" id="d_two_awt" name="d_two_awt" onChange="calc_determination()" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_two_p_lc" name="d_two_p_lc"  placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;text-align:center;">A(1%, 1cm)1000 x <input type="text" id="d_two_wt" name="d_two_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_two_lc" name="d_two_lc" value="<?php echo $query['strength_concentration']?>" placeholder="(LC)" size="5"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_absorbance_three" name="d_absorbance_three" placeholder="(Absor)" size="5"  disabled/> x 10 X <input type="text" id="d_three_df" name="d_three_df" placeholder="(Df)" size="5"/> x <input type="text" id="d_three_awt" name="d_three_awt" onChange="calc_determination()" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/></td>
                      <td style="padding:8px;">=<input type="text" id="d_three_p_lc" name="d_three_p_lc" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;text-align:center;">A(1%, 1cm)1000 x <input type="text" id="d_three_wt" name="d_three_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_three_lc" name="d_three_lc" value="<?php echo $query['strength_concentration']?>" placeholder="(LC)" size="5"/></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_average" name="determination_average"  disabled></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">Equivalent To &nbsp;<input type="hidden" id="equivalent_to_lc" value="<?php echo $query['strength_concentration']?>" /><input type="text" id="determination_equivalent_to" name="determination_equivalent_to" disabled/></td>
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
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                <table class="table_form" border="0" width="100%" cellpadding="8px" align="center">
                  <tr>
                    <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" name="conclusion"></td>
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
