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
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"200px",
     "sScrollX":"950px"
    });
   });
     function calc(){
      var total = document.getElementById('standard_reading').value - document.getElementById('instrument_reading').value;
      document.getElementById('deviation').value = total;
       }
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
  ?>
    <?php include_once('application/views/header_links.php') ?>
    <div id="form_wrapper_lists">
    <div id="account_lists" style="display: block" name="menu">
    <?php echo validation_errors();?>
    <?php echo form_open('outoftolerance/update', array('id'=>'outoftolerance_detailsform'));?>
   <table width="80%" class="table_form"  bgcolor="#c4c4ff" border="0" cellpadding="8px" align="center">
        <tr>
            <td colspan="4"  style="text-align:right;background-color:#fdfdfd;border-left:0px solid gray;border-right:0px solid gray;border-right:0px solid gray;border-bottom:0px solid gray;border-left:0px solid gray;padding:8px;"><a href="<?php echo base_url().'outoftolerance/oot_list'?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;text-align:center;">
            <table class="table_form" width="100%"  cellpadding="8px" align="center" border="0">
              <tr>
                  <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: Out of Tolerance Edit  Form</b></td>
                  <td width="150px" height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
                  <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                    <input type="text" id="reference_number" name="reference_number" class="field"/>
                    <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                    <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
                  </td>
              </tr>
              <tr>
                  <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
                  <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
                  <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
              </tr>
              <tr>
                  <td width="150px" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
                  <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
                  <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
                  <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
            <input type="hidden" name="out_id" value="<?php echo $query['out_id']; ?>"/>
            <td colspan="4" align="center" style="text-align:center;border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4>Equipment Details</h4></td>
        </tr>
        </table>
        <table  width="80%" class="table_form" bgcolor="#c4c4ff" align ="center" cellpadding="8px">
         <thead bgcolor="#efefef">
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">No.</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">ID No.</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Serial Number</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Equipment</th>  
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Acquired Date</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Last Calibration</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Location</th>
             <th style="padding:8px;background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Calibration Interval</th>
         </thead>
         <tbody>
           <?php
               $i = 1;
               //Query the db as an array
               if (is_array($sql))
               foreach ($sql as $row):                   
               ?>
               <tr>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i;?>.</td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['id_number'];?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['serial_number'];?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['description'];?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo substr($row['date'],0,-8);?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['calibration_start'];?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['location'];?></td>
                 <td style="padding:8px;background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['calibration_interval_start'];?></td>                
               <?php $i++; ?>
               </tr>
           <?php
               endforeach;
           ?>   
         </tbody>
            <tr>
                <td align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">REF No:</td>
                <td colspan ="7" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type = "text" name ="ref_no" id "ref_no" value="<?php echo $query['ref_no']; ?>"></td>                    
            </tr>
           <tr>
               <td colspan="3" style="padding:8px;background-color:#ffffff;color:#0000fb;" height="25px" align="right"><b>This Out of Tolerance Report was </b></td>
               <td colspan="5" style="padding:8px;background-color:#ffffff;color:#0000fb;" height="25px" align="left"><b><?php if($query['approved']=="Yes"){echo"raised";}?> By <?php echo $query['conducted_by']; ?> on <?php echo $query['timestamp']; ?></b></td>
            </tr>
            <tr>
                <td colspan ="8" align="left" style="padding:12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb">Data Collected From The Calibration Worksheet</td>
            </tr>
            <tr>
                <td align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Standard reading</td>
                <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="standard_reading" onChange="calc()" id="standard_reading" class="fieldout"value="<?php echo $query['standard_reading']; ?>"></td>
                <td align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Instrument reading</td>
                <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="instrument_reading" onChange="calc()" id="instrument_reading" class="fieldout" value="<?php echo $query['instrument_reading']; ?>"></td>
                <td align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Deviation</td>
                <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="deviation" id="deviation" class="fieldout"value="<?php echo $query['deviation']; ?>"></td>
                <td align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Specification limits</td>
                <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="specification_limits" onChange="calc()" id="specification_limits" class="fieldout" value="<?php echo $query['specification_limits']; ?>"></td>
            </tr>
            <tr>
                <td align="left" colspan ="8" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;">State of the instruments (Select the options as applicable)</td>
            </tr>    
            <tr>
                <td colspan ="8"align = "center" style="padding:12px;"><?php echo $query['instrument_state']; ?></td>
            </tr>
            <tr>                    
                <td colspan ="8" height="5px" align="left" style="padding:12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"style="border-right:solid 1px #f2f2f2;text-align:center;"><input type='radio' checked ="checked" name='instrument_state' id='instrument_state' value="The test instrument was adjusted to meet specifications.">The test instrument was adjusted to meet specifications.</td>
            </tr>
            <tr>
                <td colspan ="8" height="5px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"style="border-right:solid 1px #f2f2f2;text-align:center;"><input type='radio' name='instrument_state' id='instrument_state' value="The test instrument is not adjustable and needs repair.">The test instrument is not adjustable and needs repair.</td>
            </tr>
            <tr>
                <td colspan ="8" height="5px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"style="border-right:solid 1px #f2f2f2;text-align:center;"><input type='radio' name='instrument_state' id='instrument_state' value="The test instrument is not adjustable or repairable and has been removed from service.">The test instrument is not adjustable or repairable and has been removed from service.</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb">Name of rerson reporting</td>
                <td colspan="3" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="reporter" id="reporter" value="<?php echo $query['reporter']; ?>"/></td>
                <td colspan="2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;">How was the equipment used?</td>
                <td colspan="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="equipment_used" id="equipment_used" value="<?php echo $query['equipment_used']; ?>"/></td>
            </tr>
            <tr>
                <td colspan ="8" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;">Comments</td>            
            </tr>
            <tr>
                <td colspan ="8" align="center" style="padding:12px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea rows="6" cols="90" name="comments" id="comments" ><?php echo $query['comments']; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="8" style="text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type = "submit" class="btn" name = "update_outoftolerance" value ="Update"></td>
            </tr>
        </table>
    </form>
</div>
</div>
</body>
</hmtl>

