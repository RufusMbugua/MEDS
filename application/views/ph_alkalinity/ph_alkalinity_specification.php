<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <title>MEDS</title>
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
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
       <div id="account_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open('ph_alkalinity/save_specifications',array('id'=>'ph_alkalinity_specifications_form'));?>
       <table class="table_form" width="75%" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
          <tr>
            <td colspan="8" style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="25px" width="20px">Back</a></td>
          </tr>
          <tr>
              <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
          </tr>
          <tr>    
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">DOCUMENT:ANALYTICAL WORKSHEET SPECIFICATION FORM</td>
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
                <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NO.</td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php if(empty($sql[0]['serial_number'])){echo 'Does Not Exist.';}else{echo $sql[0]['serial_number'];}?></td>
                <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">BATCH/LOT NO.</td>
                <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></input></td>
                
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;background-color: #c4c4ff;border-right:solid 1px#c4c4ff;"></td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>pH Specification Details</h5></td>
            </tr>
            <tr>
              <td colspan="8" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                Please fill in the test specifications as per the information on the monograph, Thank you.
              </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="100%" cellpadding="8px" align="center">
                   
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Solution Specification Range</td>  
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <textarea rows="15" cols="180" name="monograph_specifications"></textarea>
              </td>
            </tr>
            <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
       </table>
      </form>
    
     </div>
   </div>