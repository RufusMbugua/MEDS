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
      <?php echo form_open('content_uniformity/save',array('id'=>'content_uniformity_view'));?>
       <table width="100%"  cellpadding="8px" border="0" align="center">
         <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
         <tr>
            <td style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="25px" width="20px">Back</a></td>
          </tr>
       </table>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
          <tr>
              <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
          </tr>
          <tr>    
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
              <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?></td>
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
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></input></td>
                
            </tr>
            <tr>
              <td colspan="6" height="25px" align="center" style="padding:8px;border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Content Uniformity Test By HPLC</h5></td>
            </tr>
            <tr>
              <td colspan="8" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;">
                <a href="<?php echo base_url().'content_uniformity/worksheet/'.$request[0]['a'].'/'.$query['tr'];?>"class="current mid_sub_menu mid_sub_menu_link first_link">By HPLC</a>
                <a href="<?php echo base_url().'content_uniformity/worksheet_uv/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link">By UV</a>
                <a href="<?php echo base_url().'content_uniformity/worksheet_titration/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link ">By Titration</a>
                <a href="<?php echo base_url().'content_uniformity/worksheet_karl_fisher/'.$request[0]['a'].'/'.$query['tr'];?>"class="mid_sub_menu mid_sub_menu_link first_link ">By Karl Fisher</a></td>
            </tr>
            
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>System Stability</b></td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table align="center" width="80%" border="0" cellpadding="8px">
                <tr>
                  <td height="25px" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Balance Make</td>
                  <td height="25px" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;"><input name="balance" type="text" size="40"></input></td>
                  <td height="25px" align="center" style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">ID Number</td>
                  <td height="25px" align="center" style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;"><input name="number" type="text" size="30"></input></td>
                </tr>
              </table>
              </td>
            </tr>  
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Preparation</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea name="sample_preparation" cols="160" rows="4"></textarea></td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="standard_description" size="100"></input></td>
                </tr>
                 <tr>
                    <td  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td  height="20px" align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="potency" size="100" ></input></td>
                </tr>
                <tr>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_one"></td>
                  
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_two"></td>
                    
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_three"></td>
                    
                </tr>
                <tr>
                  <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="dilution" size="30"></input></td>
                </tr>
              </table>
            </td>
          </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System</b></td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="80%" align="center" cellpadding="8px">
                  <tr>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="equipment_make" size="50"></input></td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">ID Number</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="id_number" size="50"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Mobile Phase Preparation</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea rows="4" cols="160" name="c_mobile_phase"></textarea></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic Conditions</b></td>
            </tr>
            <tr>
                <td colspan="8" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" cellpadding="8px" width="80%" align="center">
                  <tr>
                    <td rowspan="4" align="center" style="color:#000;padding:8px;color: #0000fb;">
                    -A stainless Steel Column</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Name:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" name="column_name"></input></td>
                  </tr>

                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Length:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" name="column_lenght"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Lot/Serial No.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" name="column_lotserial_number"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Manufacturer:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" name="column_manufacturer"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table width="80%" class="inner_table" border="0" cellpadding="8px" align="center">
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;">Column Pressure</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_pressure"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;">Column Oven Temperature</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="c_over_temperature"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;">Mobile Phase Flow Rate</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="mp_flow_rate"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;">Detection Wavelength</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="d_wavelength"></input></td>
                  </tr>
                </table>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System Stability requirements</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-solid: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">From Chromatograms</td>
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
                      <td style="border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NMT 2.0%</td>
                      <td style="text-align:center;">NLT 3.0%</td>
                      <td style="text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
                  <tr>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Balance Make</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="balance_make" size="50"></input></td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">ID Number</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="id_number" size="50"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
             <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8" align="center">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                   <tr>
                    <td colspan="1" style="padding:8px;border-bottom:solid 1px #c4c4ff;">Weight of Tables in grams</td>
                   <tr>
                   <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">7.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">8.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">9.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">10.</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Mean of 10 samples</td>
                      <td><input type="" name=""></input></td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Preparation</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea name="sample_preparation" cols="160" rows="4"></textarea></td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="standard_description" size="100"></input></td>
                </tr>
                 <tr>
                    <td  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Potency</td>
                    <td  height="20px" align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="potency" size="100" ></input></td>
                </tr>
                <tr>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_one"></td>
                  
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_two"></td>
                    
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="bf_rotation_three"></td>
                    
                </tr>
                <tr>
                  <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="dilution" size="30"></input></td>
                </tr>
              </table>
            </td>
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
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                      <td style="text-align:center;padding:8px;">Sample 4</td>
                      <td style="text-align:center;padding:8px;">Sample 5</td>
                      <td style="text-align:center;padding:8px;">Sample 6</td>
                      <td style="text-align:center;padding:8px;">Sample 7</td>
                      <td style="text-align:center;padding:8px;">Sample 8</td>
                      <td style="text-align:center;padding:8px;">Sample 9</td>
                      <td style="text-align:center;padding:8px;">Sample 10</td>
                      <td style="text-align:center;padding:8px;">Relative retention 95%-105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
                      <td><input type="" name=""></input></td>
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
                      <td colspan="2" style="color:#0000ff;text-align:center;">PEAK AREA OF STANDARD x WT OF POWDER TAKEN x LABEL CLAIM</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 1 &nbsp;<input type="text" name="determination_one"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 2 &nbsp;<input type="text" name="determination_two"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 3 &nbsp;<input type="text" name="determination_three"></input></td>
                    </tr>
                    <tr>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 4 &nbsp;<input type="text" name="determination_four"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 5 &nbsp;<input type="text" name="determination_five"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 6 &nbsp;<input type="text" name="determination_six"></input></td>
                    </tr>
                    <tr>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 7 &nbsp;<input type="text" name="determination_seven"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 8 &nbsp;<input type="text" name="determination_eight"></input></td>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 9 &nbsp;<input type="text" name="determination_nine"></input></td>
                    </tr>
                    <tr>
                      <td  style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;">Determination 10 &nbsp;<input type="text" name="determination_ten"></input></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="color:#0000ff;padding:8px;">Mean(X) % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="average"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="equivalent_to"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">Range: &nbsp;&nbsp;&nbsp;<input type="text" name="range"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sd"></input></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rsd"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
             <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Calculate the acceptable value (AV) using the formula below which fulfill the conditions</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
                    <table class="inner_table" align="center" width="90%" border="0" >
                      <tr>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;">Variable</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">Definition</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">conditions</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">Value</td>
                      </tr>
                      <tr>
                        <td rowspan="3" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M (Case 1) to be applied when T <= 101.5</td>
                        <td rowspan="3" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">Reference Value</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if 98.5% <=x<=101.5%, then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = X (AV = Ks)</td>
                      </tr>
                      <tr>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if X < 98.5%, then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = 98.5% (AV = 98.5 - X + Ks)</td>
                      </tr>
                      <tr>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if X < 101.5%, then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = 101.5% (AV = X - 101.5 X + Ks)</td>
                      </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
                    <table class="inner_table" align="center" width="90%" border="0" >
                      <tr>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;">Variable</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">Definition</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">conditions</td>
                        <td style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff">Value</td>
                      </tr>
                      <tr>
                        <td rowspan="3" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M (Case 2) to be applied when T > 101.5</td>
                        <td rowspan="3" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">Reference Value</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if 98.5% <=x<=T, then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = X (AV = Ks)</td>
                      </tr>
                      <tr>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if X > 98.5%, then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = 98.5% (AV = 98.5 - X + Ks)</td>
                      </tr>
                      <tr>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">if X > T then</td>
                        <td style="padding:8px;text-align:center;background-color:#ffffff;border-bottom:dotted 1px #c4c4ff;">M = 101.5% <br> (AV = X - 101.5 X + Ks)</td>
                      </tr>
                    </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Value:</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                  <table border="0" width="90%" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">T(average of specified limits in the monograph)</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">M</td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;"><input type="text" name="avg_specified_mon" size="50"></input></td>
                      <td style="color:#000;padding:8px;"><input type="text" name="M" size="50"></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Where: M value dependent on the value of T (average of specified limits in the monograph = 100 ) and X (mean of estimated content)<br> K =2.4 which is acceptability for 10 units and 2.0 for 30 units.<br> S = Sample Standard Deviation</b></td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><textarea cols="160" rows="5" name="acceptance_value"></textarea></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" width="90%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Specification</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Results</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;">Comment</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;">Content</td>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;"><input type="text" name="content" size="40"></input></td>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;"><input type="text" name="content" size="40"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;">Acceptance Value</td>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;"><input type="text" name="acceptance_value" size="40"></input></td>
                      <td style="text-align:center;border-bottom:dotted 1px #c4c4ff;background-color:#ffffff;padding:8px;"><input type="text" name="content" size="40"></input></td>
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
      
</div>
</div>
</body>
</html>

