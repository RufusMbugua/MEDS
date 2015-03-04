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
  <style type="text/css">
  .td_style{
      padding:4px;
      border-left: solid 1px #bfbfbf;
      border-bottom: solid 1px #bfbfbf;
      border-top: solid 1px #bfbfbf;
      background-color:#ffffff;
  }
  </style>
  <script>
     function calc(){
      var total = document.getElementById('standard_reading').value - document.getElementById('instrument_reading').value;
      document.getElementById('deviation').value = total;
       }
  </script>
  <script>
    $(document).ready(function(){
  
        $('#ref_no').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#ref_no_1').show();
            $('#ref_no_r').hide();
          }else{
            $('#ref_no_1').hide();
            $('#ref_no_r').show();
          }
        })
    $('#standard_reading').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#standard_reading_1').show();
            $('#standard_reading_r').hide();
          }else{
            $('#standard_reading_1').hide();
            $('#standard_reading_r').show();
          }
        })
        $('#instrument_reading').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#instrument_reading_1').show();
            $('#instrument_reading_r').hide();
          }else{
            $('#instrument_reading_1').hide();
            $('#instrument_reading_r').show();
          }
        })
  $('#deviation').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#deviation_1').show();
            $('#deviation_r').hide();
          }else{
            $('#deviation_1').hide();
            $('#deviation_r').show();
          }
        })
  $('#specification_limits').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#specification_limits_1').show();
            $('#specification_limits_r').hide();
          }else{
            $('#specification_limits_1').hide();
            $('#specification_limits_r').show();
          }
        })
  $('#equipment_used').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#equipment_used_1').show();
            $('#equipment_used_r').hide();
          }else{
            $('#equipment_used_1').hide();
            $('#equipment_used_r').show();
          }
        })
  $('#comments').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#comments_1').show();
            $('#comments_r').hide();
          }else{
            $('#comments_1').hide();
            $('#comments_r').show();
          }
        })
  $('#conducted_by').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#conducted_by_1').show();
            $('#conducted_by_r').hide();
          }else{
            $('#conducted_by_1').hide();
            $('#conducted_by_r').show();
          }
        });
  $('#save_outoftolerance').click(function(){         
            count =0;
            $('.fieldout').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All field as on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>outoftolerance/submit",
                data:$('#outoftolerance_form').serialize(),
                success:function(data){
        redirect_url = "<?php echo base_url();?>outoftolerance_list/index"
                    data='Success';
                    window.location.href = redirect_url;
                },
                //error:function(){
                  // alert('an error occured'); 
               //}
            })
            }
            })
    })
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
<div id="account_lists" style="display: block;" name="menu">
    <?php echo validation_errors();?>
    <?php echo form_open('outoftolerance/submit', array('id'=>'outoftolerance_form'));?>
    <table width="80%" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="8px" align="center">
    <tr>
        <td colspan="4"  style="text-align:right;background-color:#fdfdfd;border-left:0px solid gray;border-right:0px solid gray;border-right:0px solid gray;border-bottom:0px solid gray;border-left:0px solid gray;padding:8px;"><a href="<?php echo base_url().'outoftolerance/oot_list'?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
    </tr>
    <tr>
      <td>
        <table class="inner_table" width="98%" border="0" cellpadding="4px" align="center">
          <tr>
            <td rowspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;background-color:#ffffff;"><b>DOCUMENT: Form</b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;background-color:#ffffff;color:#0000fb;"><b>TITLE: OUT OF TOLERANCE FORM</b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;background-color:#ffffff;border-right: solid 1px #bfbfbf;"><b>REFERENCE:</b></td>
          </tr>
          <tr>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;border-right: solid 1px #bfbfbf;"><b>PAGE 1 of 1</b></td>
          </tr>
          <tr>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
            <input type="hidden" name="user" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>USER TYPE</b></td>
            <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;border-right: solid 1px #bfbfbf;"><?php echo("<b>".$user['logged_in']['role']);?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
       <table width="100%" bgcolor="#c4c4ff" align ="center" cellpadding="8px">
        <thead bgcolor="#efefef">
            <tr>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">No.</th>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">ID Number</th>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Serial Number</th>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Equipment</th>  
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Date Acquired</th>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Last Calibration</th>
                <th style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Location</th>
                <th colspan='2' style="background-color:#80ffff;text-align:center;border-right: dotted 1px #ddddff;">Calibration Interval</th>
            </tr>
        </thead>
        <tbody>
         <?php
          $i = 1;
          //Query the db as an array
          foreach ($query as $row): 

                
        
          ?>
          <tr>
               <input type="hidden" name="equipment_id" value="<?php echo $row->id;?>">
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i;?>.</td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->id_number;?><input type="hidden" name="equipment_name" value="<?php echo $row->id_number;?>"></td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->serial_number;?></td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->description;?></td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo substr($row->date,0,-8);?></td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->calibration_start;?></td>
              <td style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->location;?></td>
              <td colspan='2' style="background-color:#ffffff;text-align: center;border-bottom: solid 1px #c0c0c0; color:#00ff00;"><?php echo $row->calibration_interval_start;?></td>                
          <?php $i++; ?>
          </tr>
          <?php endforeach; ?> 
        </tbody>
        </table>
      </td>
    </tr>  
    <tr>
      <td>
        <table class="inner_table" width="100%" bgcolor="#ffffff" cellpadding="4px">
        <tr>
          <td colspan="8" align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4>Out Of Tolerance Notification Form</h4></td>
        </tr>  
         <tr>
          <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reference Number</b></td>
          <td colspan = "6"style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
            <input type = "text" size="50" name ="ref_no" id="ref_no" class="fieldout">
            <span id="ref_no_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
            <span id="ref_no_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>            
        </tr> 
        <tr>
          <td colspan ="8"style="padding:12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Data Collected From The Calibration</b></td>
        </tr>
        <tr>
            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Standard reading</td>
            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              <input type="text" name="standard_reading" onChange="calc()" id="standard_reading" class="fieldout">
              <span id="standard_reading_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="standard_reading_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Instrument reading</td>
            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              <input type="text" name="instrument_reading" onChange="calc()" id="instrument_reading" class="fieldout">
              <span id="instrument_reading_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="instrument_reading_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Deviation</td>
            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              <input type="text" name="deviation" id="deviation" class="fieldout">
              <span id="deviation_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="deviation_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Specification limits</td>
            <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              <input type="text" name="specification_limits" onChange="calc()" id="specification_limits" class="fieldout">
              <span id="specification_limits_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="specification_limits_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        </tr>
        <tr>          
            <td colspan ="8" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>State of the instruments</b></td>
        </tr>
        <tr>
            <td colspan ="1" align="right" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">a.)</td>
            <td colspan ="7" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <input type='radio' name='instrument_state' id='instrument_state' value='The test instrument was adjusted to meet specifications.'>The test instrument was adjusted to meet specifications.</td>
        </tr>
        <tr>
            <td colspan ="1" align="right" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">b.)</td>
            <td colspan ="7" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <input type='radio' name='instrument_state' id='instrument_state' value='The test instrument is not adjustable and needs repair.'>The test instrument is not adjustable and needs repair.</td>
        </tr>
        <tr>
            <td colspan ="1" align="right" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">c.)</td>
            <td colspan ="7" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <input type='radio' name='instrument_state' id='instrument_state' value='The test instrument is not adjustable or repairable and has been removed from service.'>The test instrument is not adjustable or repairable and has been removed from service.</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Name of person reporting</b></td>
            <td colspan="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <input type="text" name="reporter" id="reporter" value="<?php  echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"/></td>
            <td colspan="2" align="center" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">How was the equipment used?</td>
            <td colspan="2" style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <input type="text" name="equipment_used" id="equipment_used" class="fieldout"/>
                <span id="equipment_used_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                <span id="equipment_used_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        </tr>
        <tr>
            <td colspan ="8" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Comments</td>
        </tr>
        <tr>
            <td align="center" colspan ="8" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                <textarea rows="6" cols="100" name="comments" id="comments" class="fieldout"></textarea>
                <span id="comments_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                <span id="comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>      
        </tr>
        <tr>
            <td colspan="2" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Assesment Conducted by</b></td>
            <td colspan="6" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              <input type="text" name="conducted_by" id="conducted_by" class="fieldout"/>
              <span id="conducted_by_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="conducted_by_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
            
        </tr>
        <tr>
            <td colspan="8" style="text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              <input type = "submit" class="btn" name = "save_outoftolerance" id ="save_outoftolerance" value ="Submit">
            </td>
        </tr>
      </table>
    </td>
  </tr>
  </table>
</form>
</div>
</div>
</body>
</hmtl>
