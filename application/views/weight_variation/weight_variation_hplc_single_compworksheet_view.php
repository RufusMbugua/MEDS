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

  <script type="text/javascript" src="<?php echo base_url().'js/calculations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.autosave.js';?>"></script>
  
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
    <div id="form_wrapper">
     <div id="forms">
      <?php echo validation_errors(); ?>
      <?php echo form_open('weight_variation/save_weight_variation_hplc_single_comp',array('id'=>'weight_variation_hplc_single_compworksheet'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>    
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'].'/';?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table class="table_form" border="0" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td rowspan="0" style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?><input type="hidden" name="test_specification" value="<?php echo $query['test_specification'];?>"></td>
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
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:8px;">
                <table class="table_form" border="0" align="center" cellpadding="8px" width="100%">
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
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" name="analysis_date" value="<?php echo date("d/m/Y");?>"></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5><b>Weight Variation HPLC Single Component</b></h5></td>
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
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight Variation(WV)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <table border="0" class="inner_table" width="30%" cellpadding="8px" align="center">
                  <tr>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Sample Description</td>
                      <td  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><?php echo $query['active_ingredients'];?></td>
                      
                  </tr>
                  <tr>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      </td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Assay Results</td>
                      <?php
                      if(empty($assay_hplc_internal_method[0]['average_determination'])){
                        
                      }else{
                        $a=$assay_hplc_internal_method[0]['average_determination'];
                        $new_a = number_format($a,1);
                      
                      ?>
                       <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="hidden" class="av_det" name="av_det" id="av_det" value="<?php echo $new_a;?>"><?php echo $new_a;?></td>
                      <?php
                      }
                      ?>
                  </tr>
                   <tr>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      </td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Wt of Tablet*(g)</td>
                       <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Estimated % Content**</td>
                  </tr>
                  <tr>
                    <input type="hidden" class="uniformity_average" id="uniformity_average" name="uniformity_average" value="<?php echo $uniformity_of_dosage[0]['average'];?>">
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="wt_one" name="wt_one" class="wv"></td>
                      <td><input type="text" id="est_one" name="est_one" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="wt_two" name="wt_two" class="wv"></td>
                      <td><input type="text" id="est_two" name="est_two" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="wt_three" name="wt_three" class="wv"></td>
                      <td><input type="text" id="est_three" name="est_three" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="wt_four" name="wt_four" class="wv"></td>
                      <td><input type="text" id="est_four" name="est_four" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="wt_five" name="wt_five" class="wv"></td>
                      <td><input type="text" id="est_five" name="est_five" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="wt_six" name="wt_six" class="wv"></td>
                      <td><input type="text" id="est_six" name="est_six" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">7.</td>
                      <td><input type="text" id="wt_seven" name="wt_seven" class="wv"></td>
                      <td><input type="text" id="est_seven" name="est_seven" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">8.</td>
                      <td><input type="text" id="wt_eight" name="wt_eight" class="wv"></td>
                      <td><input type="text" id="est_eight" name="est_eight" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">9.</td>
                      <td><input type="text" id="wt_nine" name="wt_nine" class="wv"></td>
                      <td><input type="text" id="est_nine" name="est_nine" class="est"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">10.</td>
                      <td><input type="text" id="wt_ten" name="wt_ten" class="wv"></td>
                      <td><input type="text" id="est_ten" name="est_ten" class="est"></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;text-align:center;">Average</td>
                      <td style="color:#0000ff;"><input type="text" id="mean" name="mean" class="meanwv" ></td>
                      <td style="color:#0000ff;"><input type="text" id="estmean" name="estmean" class="meanest" ></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;"></td>
                      <td style="color:#0000ff;text-align:right;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;">SD</td>
                      <td style="color:#0000ff;"><input type="text" id="standard_dev_est" name="standard_dev_est" class="standard_dev_est" ></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;"></td>
                      <td style="color:#0000ff;text-align:right;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;">RSD</td>
                      <td style="color:#0000ff;"><input type="text" id="rsd_est" name="rsd_est" class="rsd_est" ></td>
                    </tr>
                 
                </table>
              </td>
            </tr>
            <tr>
                <td colspan="8" class="singlecomponent" style="padding:8px;">
                  <table width="90%" align="center" class="table_form">
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Variable</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Definition</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Conditions</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Value</td>
                    </tr>
                    <tr>
                      <td rowspan="3" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">M (Case 1) to be applied when T <= 101.5% </td>
                      <td rowspan="3" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Reference Value</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">If 98.5% <= X <= 101.5%</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">M = X , <p>(AV=Ks)</p></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">If X < 98.5%, then</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">M= 98.5% , <p>(AV = 98.5 - X + Ks)</p></td>
                    </tr>
                    <tr>
                       <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">If X > 101.5%, then</td>
                        <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">M= 101.5% ,<p>(AV = X - 101.5 + Ks)</td>
                    </tr>

                    <tr>
                      <td rowspan="3" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">M (Case 2) to be applied when T > 101.5% </td>
                      <td rowspan="3" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Reference Value</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">If 98.5% <= X <= T, then</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">M= X,<p>(AV = Ks)</p></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">If X < 98.5%, then</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">M = 98.5%,<p>(AV =98.5% -X + Ks)</p></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">If X > T, then</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">M= T%,<p>(AV = X - T + Ks)</p></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table border="0" class="inner_table" width="100%" cellpadding="8px" align="center">
                   <tr>
                      <td colspan="8" class="singlecomponent" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Value</b></td>
                   </tr>
                   <tr>
                      <td colspan="8" class="singlecomponent" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                        <table border="0" cellpadding="8px" width="80%" align="center">
                          <tr>
                            <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">T(Average of specified limits in the monograph)</td>
                            <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">M</td>
                          </tr>
                          <tr>
                            <td style="color:#000;padding:8px;"><input type="text" name="t" id="t" value="98.5"></td>
                            <td style="color:#000;padding:8px;"><input type="text" name="m" id="m" value="100"></td>
                          </tr>
                        </table>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="8" class="singlecomponent" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
                        <table border="0" cellpadding="8px" width="80%" align="center">
                          <tr>
                            <td style="background-color:#ffffff;color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Acceptance Value of 10 units</td>
                            <td style="background-color:#ffffff;color:#000;border-bottom:solid 1px #c4c4ff;padding:8px;"><input type="text" name="acceptance_value_of_ten" id="acceptance_value_of_ten" class=""></td>
                          </tr>
                        </table>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="8" class="singlecomponent" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
                    </tr>
                    <tr>
                      <td colspan="8" class="singlecomponent" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
                        <table border="0"  class="table_form" width="100%" cellpadding="8px" align="center">
                          <tr>    
                            <td style="color:#00CC00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;">Method <input type="text" id="method" name="method" size="30" /></td>
                          </tr>
                          <tr>    
                            <td style="color:#00CC00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" id="test_conclusion" name="test_conclusion" size="30" /></td>
                          </tr>
                        </table>
                    </tr>
                </table>
            </td>
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
