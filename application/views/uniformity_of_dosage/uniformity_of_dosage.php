<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
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
  <script type="text/javascript" src="<?php echo base_url().'js/averagecalculation.js';?>"></script>
  <script>
    //function to prevent submitting the form when enter button is pressed.
    $('form input').keydown(function (e) {
        if (e.keyCode == 26) {
            var inputs = $(this).parents("form").eq(0).find(":input");
            if (inputs[inputs.index(this) + 1] != null) {                    
                inputs[inputs.index(this) + 1].focus();
            }
            e.preventDefault();
            return false;
        }
    });
  </script>
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
      <?php echo form_open('content_uniformity/save_uniformity_of_dosage',array('id'=>'uniformity_of_dosage'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table class="table_form" border="0" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td  style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">ANALYTICAL WORSHEEK</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['active_ingredients']." "." ".$query['test_specification'];?></td>
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
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NUMBER</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $monograph[0]['serial_number'];?></input></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number'];?></td>
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
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                        Request Date: <?php echo $query['date_time'];?></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                        Label Claim: <?php echo $query['active_ingredients'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Brand Name: <?php echo $query['brand_name'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                        Method/Specifications: <?php echo $query['test_specification'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Details:<br><br> <?php echo $query['manufacturer_name'];?><br><?php echo $query['manufacturer_address'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Clients Details:<br><br> 
                        <?php echo $query['applicant_name'];?><br><?php echo $query['applicant_address'];?> </td>
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
            <tr>
              <td colspan="8" style="padding:8px;">
                <table align="center" class="inner_table" width="60%" cellpadding="4px" border="0">
                  <tr>
                    <td colspan="2" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Please <b>check</b> Where Appropriate</td>
                  </tr>
                  <tr>
                    <td style="padding:8px;text-align:center;"><input type="checkbox" id="uniformity" name="uniformity" id="" value="1"> Uniformity of Dosage Test</td>
                    <td style="padding:8px;text-align:center;"><input type="checkbox" id="mass" name="mass" id="" value="2"> Mass Uniformity Test</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table id="uniformity_form" align="center" width="100%" cellpadding="4px">
                  <tr>
                    <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5><b>Uniformity of Dosage Unit</b></h5></td>
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
                              <select id="balance_id" name="balance_id" >
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
                      <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Tablets (g)</b></td>
                    </tr>
                    <tr>
                      <td colspan="8">
                        <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">1.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_one"class="total"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              11.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_eleven"class="total"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">2.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_two" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              12.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_twelve" class="total" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">3.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_three" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              13.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_thirteen" class="total" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">4.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_four"class="total"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              14.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_fourteen"class="total"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">5.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_five" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              15.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_fifteen" class="total" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">6.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_six" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              16.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_sixteen" class="total" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">7.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_seven"class="total"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              17.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_seventeen"class="total"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">8.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_eight" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              18.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_eighteen" class="total" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">9.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_nine" class="total" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              19.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_nineteen" class="total" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">10.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_ten"class="total"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              20.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="weight_tablet_twenty"class="total"></td>
                          </tr>
                          <tr>
                              <td colspan="2" height="25px" align="right" style="color:#0000ff;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Average</td>
                              <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="average"class="average"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table id="mass_form" align="center" width="100%" cellpadding="4px">
                  <tr>
                    <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5><b>Mass Uniformity</b></h5></td>
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
                              <select id="balance_id" name="balance_id" >
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
                      <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Tablets (g)</b></td>
                    </tr>
                    <tr>
                      <td colspan="8">
                        <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">1.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="ar" name="weight_tablet_one"class="total_two"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              11.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="kr" name="weight_tablet_eleven"class="total_two"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">2.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="br" name="weight_tablet_two" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              12.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="lr" name="weight_tablet_twelve" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">3.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="cr" name="weight_tablet_three" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              13.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="mr" name="weight_tablet_thirteen" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">4.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="dr" name="weight_tablet_four"class="total_two"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              14.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="nr" name="weight_tablet_fourteen"class="total_two"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">5.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="er" name="weight_tablet_five" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              15.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="or" name="weight_tablet_fifteen" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">6.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="fr" name="weight_tablet_six" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              16.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="pr" name="weight_tablet_sixteen" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">7.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="gr" name="weight_tablet_seven"class="total_two"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              17.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="qr" name="weight_tablet_seventeen"class="total_two"></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">8.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="hr" name="weight_tablet_eight" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              18.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="rr" name="weight_tablet_eighteen" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">9.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="ir" name="weight_tablet_nine" class="total_two" ></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              19.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="sr" name="weight_tablet_nineteen" class="total_two" ></td>
                          </tr>
                          <tr>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">10.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="jr" name="weight_tablet_ten"class="total_two"></td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              20.</td>
                              <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="tr" name="weight_tablet_twenty"class="total_two"></td>
                          </tr>
                          <tr>
                              <td colspan="2" height="25px" align="right" style="color:#0000ff;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Average</td>
                              <td colspan="2" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                              <input type="text" id="" name="average"class="average"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="8" style="padding:8px;">
                        <table width="100%">
                          <tr>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Average Weight(a)</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Lowest Weight</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">[(a-b)/a]*100</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Comment</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="average" class="average"></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" id="lowest_weight" name="lowest_weight" ></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="lower_range" id="lower_range"></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="comment_low" class="comment_low"></td>
                          </tr>
                          <tr>
                            <td colspan="4"></td>
                          </tr>
                          <tr>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Average Weight(a)</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Upper Weight</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">[(a-b)/a]*100</td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Comment</td>
                          </tr>
                          <tr>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="average" class="average"></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" id="highest_weight" name="highest_weight" ></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="upper_range" id="upper_range"></td>
                            <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="comment_upper" class="comment_upper"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Determining Method for Uniformity of Dosage</b></td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table width="100%">
                    <tr>
                      <td rowspan="2" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">DosageForm</td>
                      <td rowspan="2" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Type</td>
                      <td rowspan="2" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Subtype</td>
                      <td colspan="2" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Dosage & Ratio of Drug</td>
                    </tr>
                     <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">NMT 25mg & NMT 25%</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">NLT 25mg or NLT 25%</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="hidden" name="dosage_form" value="<?php echo $monograph_specifications[0]['dosage_form'];?>"><?php echo $monograph_specifications[0]['dosage_form'];?></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="hidden" id="type" name="type" value="<?php echo $monograph_specifications[0]['type'];?>"><?php echo $monograph_specifications[0]['type'];?></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="hidden" name="subtype" value="<?php echo $monograph_specifications[0]['subtype'];?>"><?php echo $monograph_specifications[0]['subtype'];?></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Weight variation</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Content Uniformity</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table width="100%">
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Average wt of tablets(a)</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Dosage(b) [Label Claim](g)</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;">Ratio(b)*100(a)</td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;">Method To be Used</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="average" class="average"></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" id="dosage" name="dosage" value="<?php echo $query['strength_concentration'];?>" ><input type="text" class="lcg" name="lcg" id="lcg" disabled></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="ratio" class="ratio"></td>
                      <td style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="method" class="method"></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                  <td colspan="8" style="text-align:center;color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;background-color: #ffffff;"> Method <input type="text" name="method_coa" id="method_coa" placeholder="eg. USP 2013"></td>
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
$('#uniformity').change(function() {
    if($('#uniformity').is(':checked')){
       $("table[id='uniformity_form']").show();
       $("#mass").prop('disabled', true);

    } else {
        $("table[id='uniformity_form']").hide();
        $("#mass").prop('disabled', false);
    }
  }).change();

  $('#mass').change(function() {
    if($('#mass').is(':checked')){
       $("table[id='mass_form']").show();
       $("#uniformity").prop('disabled', true);

    } else {
        $("table[id='mass_form']").hide();
        $("#uniformity").prop('disabled', false);
    }
  }).change();
</script>
</html>
