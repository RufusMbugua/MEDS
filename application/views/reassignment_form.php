<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
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
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>

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
              <li><a href="<?php echo base_url().'account_settings/index/'.$user_type_id.'/'.$user_id.'/'.$department_id;?>"><i class="icon-wrench"></i> Settings <img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"></a></li>
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
     <div id="analysis_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open('update_request_record/reset/'.$request[0]['tid'].'/',array('id'=>'reassignment_form'));?>
           <table class="table_form" align="center" bgcolor="#f0f0ff" width="70%" border="0" cellpadding="4px">
          <input type="hidden" name="user_name" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"></input>
          <input type="hidden" name="user_id" value="<?php echo $user['logged_in']['id'];?>"></input>
          <input type="hidden" name="tr_id" value="<?php echo $request[0]['tid'];?>"></input>
          <input type="hidden" name="client_id" value="<?php echo $request[0]['client_id'];?>"></input>
          <input type="hidden" name="request_type" value="<?php echo $request[0]['request_type'];?>"></input>
          <input type="hidden" name="sample_quantity" value="<?php echo $request[0]['quantity_submitted'];?>"></input>
          <input type="hidden" name="quantity_remaining" value="<?php echo $request[0]['quantity_remaining'];?>"></input>
          <input type="hidden" name="samples_issued" value="<?php echo $assigned[0]['sample_issued'];?>"></input>
          <input type="hidden" name="analyst_name" value="<?php echo $assigned[0]['analyst_name'];?>"></input>
          <tr>
            <td colspan="8" align="right" style="padding:8px;border-bottom: solid 1px #bfbfbf;color:#ffffff;background-color:#ffffff;"><a href="<?php echo base_url().'home';?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"/>Back</a></td>
          </tr>
          <tr>
          <td colspan="8" style="padding:8px;text-align:center;">
            <table class="table_form" width="100%"  cellpadding="8px" align="center" border="0"> 
                <tr>
                    <td rowspan="2" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                    <td colspan="2" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>DOCUMENT: FORM</b></td>
                    <td width="150px" height="25px" colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
                    <td colspan="3" style="padding:8px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                      <input type="text" id="reference_number" name="reference_number" value="MEDS/QC/RE/01-01" class="fieldc"/>
                      <span id="creference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                      <span id="creference_number_r" style="color:red; display:none">Fill this field</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
                    <td height="25px"colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
                    <td height="25px" colspan="3" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
                </tr>
                <tr>
                    <td width="150px" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>AUTHORIZED BY:</b></td>
                    <td colspan="2" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
                    <td colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
                    <td colspan="3" style="padding:8px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
                </tr>
              </table>
            </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;text-align:center;">
            <table class="" width="100%"  cellpadding="8px" align="center" border="0"> 
                 <tr>
                   <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Tests</b></td>
                </tr>
                <!-- <tr>
                  <td colspan="6" style="padding:8px;">
                    <table class="inner_table" width="100%" align="center" cellpadding="4px" border="0">
                      <?php
                        if(in_array('1', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Identification</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('2', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Friablility</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('3', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Disintegration</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('4', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>ph/Alkalinity</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('5', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Related Substances</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('6', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Weight Variation/ Mass uniformity</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('7', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Dissolution</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('8', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Assay</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('9', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Content Uniformity</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('10', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Uniformity of Dosage</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('11', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Karl Fisher</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('12', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Microbiology</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('13', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Loss and Drying</b></td>
                      </tr>
                      <?php
                    }else{}
                    if(in_array('14', $tests)){
                      ?>
                      <tr>
                        <td height="25px" colspan="6" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Tests</b></td>
                      </tr>
                      <?php
                    }else{}
                      ?>
                    </table>
                  </td>
                </tr> -->
                <tr>
                   <td height="25px" colspan="2" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Samples Available</b></td>
                   <td height="25px" colspan="" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Samples to Issue</b></td>
                   <td height="25px" colspan="" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Analyst</b></td>
                </tr>
                <tr>

                   <td height="25px" colspan="2" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><?php echo $request[0]['quantity_remaining'].$request[0]['quantity_type']?></td> 
                   <td height="25px" colspan="" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><?php echo $assigned[0]['sample_issued'].$request[0]['quantity_type']?></td>
                   <td height="25px" colspan="" style="padding:8px;text-align:center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><?php echo $assigned[0]['analyst_name']?></td>
               </tr>
              </table>
            </td>
          </tr>
          <tr>
           <td  style="padding:8px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;text-align: center;" colspan="8"  ><input class="btn" type="submit" id='submit' name="submit" value="Reset"></td>
          </tr>
      </table>
      </form>
     </div>
  </div>
 </body>
</html>