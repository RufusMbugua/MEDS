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
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
   $(document).ready(function() {

    tinymce.init({
    selector: "textarea"
    });

    // Add button functionality
    var id=2;
    $(document).on('click','#add_stage',function () {
  
        var html='<tr><td colspan="3" style="padding:8px;color: #0000fb;border-bottom:solid 1px #c4c4ff;background-color:#fdc4c8;">Stage '+id+'<input type="hidden" id="stage" name="stage[]" value="'+id+'"/></td></tr><tr><td style="padding:8px;"><input type="checkbox" name="min'+id+'" id="min'+id+'" />Minimum Value</td><td style="padding:8px;"><input type="checkbox" name="max'+id+'" id="max'+id+'" />Maximum Value</td><td style="padding:8px;"><input type="checkbox" name="range" id="range'+id+'" />Range of Values</td></tr><tr><td style="color:#0000ff;padding:8px;"><input type="text" min'+id+'="min_tolerance'+id+'" id="min_tolerance'+id+'" name="min_tolerance[]" placeholder="min%" size="5"/></td><td style="color:#0000ff;padding:8px;"><input type="text" max'+id+'="max_tolerance'+id+'" id="max_tolerance'+id+'" name="max_tolerance[]" placeholder="max%" size="5"/></td><td style="color:#0000ff;padding:8px;"><input type="text" range'+id+'="tolerance_range'+id+'" id="tolerance_range_from'+id+'" name="tolerance_range_from[]" placeholder="min%" size="5"> - <input type="text" range'+id+'="tolerance_range'+id+'" name="tolerance_range_to[]" id ="tolerance_range_to'+id+'" placeholder="max%" size="5"></td></tr><tr><td align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: dotted 1px #c4c4ff;background-color: #ffffff;">Duration/Time</td><td colspan="2" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="7" name="time_value[]" id="time" placeholder="eg. 60"> <select name="time_name[]"><option value="Minutes">Minutes</option><option value="Hours">Hours</option></select></td></tr>';
        var master = $(this).closest("table.spectable");
     
         master.find("tbody").append(html);
        //alert('egfdeg')
        id++;
    });

   });
  </script>
 </head>
 <body>
  <?php
   $user=$this->session->userdata;
   // $test_request_id=$user['logged_in']['test_request_id'];
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=1;
   //var_dump($user);
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
      <?php echo form_open('test_dissolution/save_delayed_release_monograph',array('id'=>'dissolution_delayed release'));?>
       
       <table class="table_form" width="75%" border="0" cellpadding="4px" align="center">
            <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
            <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
          <tr>
              <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
          </tr>
           <tr>
            <td colspan ="6" style="padding:8px;">
             <table width="100%" bgcolor="#c4c4ff" class="table_form" cellpadding="8px" border="0" align ="center">
               <tr>
                    <td rowspan="2" colspan ="" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                    <td colspan="4" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
                </tr>
                <tr>    
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">DISSOLUTION ANALYTICAL WORKSHEET</td>
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
                    <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'];?></td>
                </tr>
                <tr>
                      <td colspan="2" width ="80px"style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
                      <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
                      <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
                      <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
                </tr>
                <tr>
                      <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NUMBER</td>
                      <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $monograph[0]['serial_number'] ;?></input></td>
                      <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">BATCH/LOT NUMBER</td>
                      <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number'] ;?></td>          
                </tr>
               </table>   
              </td>
            </tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Monograph Details</h5></td>
            </tr>
            <tr>
              <td colspan="8" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                Delayed Release Tablets: HPLC Specification Details
              </td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;">
                <table border="0" class="spectable" width="80%" cellpadding="8px" align="center">
                  <thead>
                    <td colspan="3" align="right"><input type="button" id="add_stage" class=" btn" value="Add"></td>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="3" style="padding:8px;color: #0000fb;border-bottom:solid 1px #c4c4ff;background-color:#fdc4c8;">Stage 1 <input type="hidden" id="stage" name="stage[]" value="1"/></td>
                    </tr>
                    <tr>
                      <td style="padding:8px;"><input type="checkbox" id="min" name="min"/>Minimum Value</td>
                      <td style="padding:8px;"><input type="checkbox" id="max" name="max"/>Maximum Value</td>
                      <td style="padding:8px;"><input type="checkbox" id="range" name="range"/>Range of Values</td>
                    </tr>
                    <tr>
                      <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance[]" placeholder="min%" size="5"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance[]" placeholder="max%" size="5"/></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id = "tolerance_range_from" name="tolerance_range_from[]" placeholder="min%" size="5"> - <input type="text" range="tolerance_range" name="tolerance_range_to[]" id = "tolerance_range_to" placeholder="max%" size="5" ></td>
                    </tr>
                    <tr>
                      <td align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: dotted 1px #c4c4ff;background-color: #ffffff;">
                       Duration/Time
                      </td>
                      <td colspan="2" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;border-top: dotted 1px #c4c4ff;background-color: #ffffff;">
                       <input type="text" size="7" name="time_value[]" id="time_value" placeholder="eg. 60"> 
                       <select name="time_name[]">
                          <option value="Minutes">Minutes</option>
                          <option value="Hours">Hours</option>
                       </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="save_delayed_release" id="save_delayed_release" value="Submit"></td>
            </tr>
       </table>
      </form>
    
     </div>
   </div></body>
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

  $('#min2').change(function() {
    if($('#min2').is(':checked')){
       $("input[min2='min_tolerance2']").show();
       $('#max2').prop('disabled', true);
       $('#range2').prop('disabled', true);
    } else {
        $("input[min2='min_tolerance2']").hide();
       $('#max2').prop('disabled', false);
       $('#range2').prop('disabled', false);
    }
  }).change();

  $('#min3').change(function() {
    if($('#min3').is(':checked')){
       $("input[min3='min_tolerance3']").show();
       $('#max3').prop('disabled', true);
       $('#range3').prop('disabled', true);
    } else {
        $("input[min3='min_tolerance3']").hide();
       $('#max3').prop('disabled', false);
       $('#range3').prop('disabled', false);
    }
  }).change();

    $('#min4').change(function() {
    if($('#min4').is(':checked')){
       $("input[min4='min_tolerance4']").show();
       $('#max4').prop('disabled', true);
       $('#range4').prop('disabled', true);
    } else {
        $("input[min4='min_tolerance4']").hide();
       $('#max4').prop('disabled', false);
       $('#range4').prop('disabled', false);
    }
  }).change();

    $('#min5').change(function() {
    if($('#min5').is(':checked')){
       $("input[min5='min_tolerance5']").show();
       $('#max5').prop('disabled', true);
       $('#range5').prop('disabled', true);
    } else {
        $("input[min5='min_tolerance5']").hide();
       $('#max5').prop('disabled', false);
       $('#range5').prop('disabled', false);
    }
  }).change();

  $('#min6').change(function() {
    if($('#min6').is(':checked')){
       $("input[min6='min_tolerance6']").show();
       $('#max6').prop('disabled', true);
       $('#range6').prop('disabled', true);
    } else {
        $("input[min6='min_tolerance6']").hide();
       $('#max6').prop('disabled', false);
       $('#range6').prop('disabled', false);
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

  $('#max2').change(function() {
    if($('#max2').is(':checked')){
       $("input[max2='max_tolerance2']").show();
       $('#min2').prop('disabled', true);
       $('#range2').prop('disabled', true);
    } else {
        $("input[max2='max_tolerance2']").hide();
        $('#min2').prop('disabled', false);
        $('#range2').prop('disabled', false);
    }
  }).change();


  $('#max3').change(function() {
    if($('#max3').is(':checked')){
       $("input[max3='max_tolerance3']").show();
       $('#min3').prop('disabled', true);
       $('#range3').prop('disabled', true);
    } else {
        $("input[max3='max_tolerance3']").hide();
        $('#min3').prop('disabled', false);
        $('#range3').prop('disabled', false);
    }
  }).change();


  $('#max4').change(function() {
    if($('#max4').is(':checked')){
       $("input[max4='max_tolerance4']").show();
       $('#min4').prop('disabled', true);
       $('#range4').prop('disabled', true);
    } else {
        $("input[max4='max_tolerance4']").hide();
        $('#min4').prop('disabled', false);
        $('#range4').prop('disabled', false);
    }
  }).change();


  $('#max5').change(function() {
    if($('#max5').is(':checked')){
       $("input[max5='max_tolerance5']").show();
       $('#min5').prop('disabled', true);
       $('#range5').prop('disabled', true);
    } else {
        $("input[max5='max_tolerance5']").hide();
        $('#min5').prop('disabled', false);
        $('#range5').prop('disabled', false);
    }
  }).change();


  $('#max6').change(function() {
    if($('#max6').is(':checked')){
       $("input[max6='max_tolerance6']").show();
       $('#min6').prop('disabled', true);
       $('#range6').prop('disabled', true);
    } else {
        $("input[max6='max_tolerance6']").hide();
        $('#min6').prop('disabled', false);
        $('#range6').prop('disabled', false);
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

  $('#range2').change(function() {
    if($('#range2').is(':checked')){
       $("input[range2='tolerance_range2']").show();
        $('#max2').prop('disabled', true);
        $('#min2').prop('disabled', true);
    } else {
        $("input[range2='tolerance_range2']").hide();
        $('#max2').prop('disabled', false);
        $('#min2').prop('disabled', false);
    }
  }).change();

  $('#range3').change(function() {
    if($('#range3').is(':checked')){
       $("input[range3='tolerance_range3']").show();
        $('#max3').prop('disabled', true);
        $('#min3').prop('disabled', true);
    } else {
        $("input[range3='tolerance_range3']").hide();
        $('#max3').prop('disabled', false);
        $('#min3').prop('disabled', false);
    }
  }).change();

  $('#range4').change(function() {
    if($('#range4').is(':checked')){
       $("input[range4='tolerance_range4']").show();
        $('#max4').prop('disabled', true);
        $('#min4').prop('disabled', true);
    } else {
        $("input[range4='tolerance_range4']").hide();
        $('#max4').prop('disabled', false);
        $('#min4').prop('disabled', false);
    }
  }).change();

  $('#range5').change(function() {
    if($('#range5').is(':checked')){
       $("input[range5='tolerance_range5']").show();
        $('#max5').prop('disabled', true);
        $('#min5').prop('disabled', true);
    } else {
        $("input[range5='tolerance_range5']").hide();
        $('#max5').prop('disabled', false);
        $('#min5').prop('disabled', false);
    }
  }).change();

  $('#range6').change(function() {
    if($('#range6').is(':checked')){
       $("input[range6='tolerance_range6']").show();
        $('#max6').prop('disabled', true);
        $('#min6').prop('disabled', true);
    } else {
        $("input[range6='tolerance_range6']").hide();
        $('#max6').prop('disabled', false);
        $('#min6').prop('disabled', false);
    }
  }).change();

</script></html