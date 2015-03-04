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

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <style>
    .hide_data {
      display: none; 
    }
  </style>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
     $("#equipment_make").change(function(){
         var id_number=$(this).val();
         //append to textbox
         $("#equipment_number").val(id_number);
    });
     $('#samplepowder').change(function() {
    if($('#samplepowder').is(':checked')){
       $("table[samplepowder='powders']").show();
       $('#sampleliquid').prop('disabled', true);
    } else {
        $("table[samplepowder='powders']").hide();
       $('#sampleliquid').prop('disabled', false);
    }
  }).change();
  $('#sampleliquid').change(function() {
    if($('#sampleliquid').is(':checked')){
       $("table[sampleliquid='liquids']").show();
       $('#samplepowder').prop('disabled', true);
    } else {
        $("table[sampleliquid='liquids']").hide();
       $('#samplepowder').prop('disabled', false);
    }
  }).change();

  $("#determination").click(function(){
    $("#determinations").toggle();
  });
  $("#determination_no_std").click(function(){
    $("#determinations_no_std").toggle();
  });
  $("#sample_data").click(function(){
    $("#sample_table").toggle();
  });
  
  $("#difference_standard").change(function()       {
        var text_std = $("#difference_standard").val();     

        $("#det_1_pkstd").val(text_std);
        $("#det_2_pkstd").val(text_std);
        $("#det_3_pkstd").val(text_std); 
        $("#det_4_pkstd").val(text_std); 
        $("#det_5_pkstd").val(text_std); 
        $("#det_6_pkstd").val(text_std);
        $("#det_7_pkstd").val(text_std);
        $("#det_8_pkstd").val(text_std);
        $("#det_9_pkstd").val(text_std); 
        $("#det_10_pkstd").val(text_std); 
        $("#det_11_pkstd").val(text_std); 
        $("#det_12_pkstd").val(text_std); 
   }); 
   $("#difference_s1").change(function()       {
      var text_wstd = $("#difference_s1").val();     

      $("#det_1_pkt").val(text_wstd);
      $("#second_det_1_pkt").val(text_wstd);
    });

     $("#difference_s2").change(function()       {
      var text_wstd = $("#difference_s2").val();     

      $("#det_2_pkt").val(text_wstd);
      $("#second_det_2_pkt").val(text_wstd);
    });

    $("#difference_s3").change(function()       {
      var text_wstd = $("#difference_s3").val();     

      $("#det_3_pkt").val(text_wstd);
      $("#second_det_3_pkt").val(text_wstd);
    });

    $("#difference_s4").change(function()       {
      var text_wstd = $("#difference_s4").val();     

      $("#det_4_pkt").val(text_wstd);
      $("#second_det_4_pkt").val(text_wstd);
    });

    $("#difference_s5").change(function()       {
      var text_wstd = $("#difference_s5").val();     

      $("#det_5_pkt").val(text_wstd);
      $("#second_det_5_pkt").val(text_wstd);
    });
    $("#difference_s6").change(function()       {
      var text_wstd = $("#difference_s6").val();     

      $("#det_6_pkt").val(text_wstd);
      $("#second_det_6_pkt").val(text_wstd);
    });
    $("#difference_s7").change(function()       {
      var text_wstd = $("#difference_s7").val();     

      $("#det_7_pkt").val(text_wstd);
      $("#second_det_7_pkt").val(text_wstd);
    });

     $("#difference_s8").change(function()       {
      var text_wstd = $("#difference_s8").val();     

      $("#det_8_pkt").val(text_wstd);
      $("#second_det_8_pkt").val(text_wstd);
    });

    $("#difference_s9").change(function()       {
      var text_wstd = $("#difference_s9").val();     

      $("#det_9_pkt").val(text_wstd);
      $("#second_det_9_pkt").val(text_wstd);
    });

    $("#difference_s10").change(function()       {
      var text_wstd = $("#difference_s10").val();     

      $("#det_10_pkt").val(text_wstd);
      $("#second_det_10_pkt").val(text_wstd);
    });

    $("#difference_s11").change(function()       {
      var text_wstd = $("#difference_s11").val();     

      $("#det_11_pkt").val(text_wstd);
      $("#second_det_11_pkt").val(text_wstd);
    });
    $("#difference_s12").change(function()       {
      var text_wstd = $("#difference_s12").val();     

      $("#det_12_pkt").val(text_wstd);
      $("#second_det_12_pkt").val(text_wstd);
    });
    $("#det_1_potency").change(function(){

        var text_potency = $("#det_1_potency").val();
       $("#det_2_potency").val(text_potency); $("#det_3_potency").val(text_potency); $("#det_4_potency").val(text_potency); $("#det_5_potency").val(text_potency); $("#det_6_potency").val(text_potency);
       $("#det_7_potency").val(text_potency); $("#det_8_potency").val(text_potency); $("#det_9_potency").val(text_potency); $("#det_10_potency").val(text_potency); $("#det_11_potency").val(text_potency);$("#det_12_potency").val(text_potency);
      });
$('.third_det_6_lc').change(function() {   

          var determination_6 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_6 = (($('#det_6_pkt').val()) * ($('#det_6_df').val()) * ($('#det_6_potency').val()) * 100) / (($('#det_6_pkstd').val()) * ($('#det_6_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_6 = (($('#second_det_6_pkt').val()) * ($('#second_det_6_df').val()) * 10 * 100) / (0.001* ($('#second_det_6_lc').val()));  
           }
         $('.third_determination_6').val(determination_6);          
         
      });
$('.det_7_lc').change(function() {   
          var determination_7 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_7 = (($('#det_7_pkt').val()) * ($('#det_7_df').val()) * ($('#det_7_potency').val()) * 100) / (($('#det_7_pkstd').val()) * ($('#det_7_lc').val()));  
          //alert(determination_7);
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_7 = (($('#second_det_7_pkt').val()) * ($('#second_det_7_df').val()) * 10 * 100) / (0.001* ($('#second_det_7_lc').val()));  
           }
         $('.determination_7').val(determination_7);
           
          // $('#second_determination_1').val(determination_1);
        });
        $('.det_8_lc').change(function() {   
          var determination_8 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_8 = (($('#det_8_pkt').val()) * ($('#det_8_df').val()) * ($('#det_8_potency').val()) * 100) / (($('#det_8_pkstd').val()) * ($('#det_8_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_8 = (($('#second_det_8_pkt').val()) * ($('#second_det_8_df').val()) * 10 * 100) / (0.001* ($('#second_det_8_lc').val()));  
           }
         $('.determination_8').val(determination_8);
           
          // alert(determination_8)
        });
        $('.det_9_lc').change(function() {   
          var determination_9 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_9 = (($('#det_9_pkt').val()) * ($('#det_9_df').val()) * ($('#det_9_potency').val()) * 100) / (($('#det_9_pkstd').val()) * ($('#det_9_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_9 = (($('#second_det_9_pkt').val()) * ($('#second_det_9_df').val()) * 10 * 100) / (0.001* ($('#second_det_9_lc').val()));  
           }
         $('.determination_9').val(determination_9);
           
          // $('#second_determination_1').val(determination_1);
        });
        $('.det_10_lc').change(function() {   
          var determination_10 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_10 = (($('#det_10_pkt').val()) * ($('#det_10_df').val()) * ($('#det_10_potency').val()) * 100) / (($('#det_10_pkstd').val()) * ($('#det_10_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_10 = (($('#second_det_10_pkt').val()) * ($('#second_det_10_df').val()) * 10 * 100) / (0.001* ($('#second_det_10_lc').val()));  
           }
         $('.determination_10').val(determination_10);
           
          // $('#second_determination_1').val(determination_1);
        });
        $('.det_11_lc').change(function() {   
          var determination_11 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_11 = (($('#det_11_pkt').val()) * ($('#det_11_df').val()) * ($('#det_11_potency').val()) * 100) / (($('#det_11_pkstd').val()) * ($('#det_11_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_11 = (($('#second_det_11_pkt').val()) * ($('#second_det_11_df').val()) * 10 * 100) / (0.001* ($('#second_det_11_lc').val()));  
           }
         $('.determination_11').val(determination_11);
           
          // $('#second_determination_1').val(determination_1);
        });        
        $('.det_12_lc').change(function() {   

          var determination_12 = 0;
          if ($('#samplepowder').is(':checked')) {
          determination_12 = (($('#det_12_pkt').val()) * ($('#det_12_df').val()) * ($('#det_12_potency').val()) * 100) / (($('#det_12_pkstd').val()) * ($('#det_12_lc').val()));  
          
          }else 
          if($('#sampleliquid').is(':checked')){
            determination_12 = (($('#second_det_12_pkt').val()) * ($('#second_det_12_df').val()) * 10 * 100) / (0.001* ($('#second_det_12_lc').val()));  
           }
          var average_determination = (parseInt($('.determination_1').val()) + parseInt($('.determination_2').val()) + parseInt($('.determination_3').val()) + parseInt($('.determination_4').val()) + parseInt($('.determination_5').val())+ parseInt($('.third_determination_6').val()) +parseInt($('.determination_7').val()) + parseInt($('.determination_8').val()) + parseInt($('.determination_9').val()) + parseInt($('.determination_10').val()) + parseInt($('.determination_11').val())+ determination_12)/6;  
          // alert($('.determination_').val());

          var samples_det = [($('.determination_1').val()), ($('.determination_2').val()), ($('.determination_3').val()), ($('.determination_4').val()), ($('.determination_5').val()), ($('.third_determination_6').val()),($('.determination_7').val()), ($('.determination_8').val()), ($('.determination_9').val()), ($('.determination_10').val()), ($('.determination_11').val()), determination_12];
          
          var variance_det = 0;

             for(var i=0;i<samples_det.length; i++){
            variance_det += Math.pow((samples_det [i]-average_determination),2);
             
          }

          var n = i-1;
          var sample_sd_det = Math.sqrt((variance_det)/n);
          var sample_det_rsd = (sample_sd_det/average_determination)*100;

          var highest_value =Math.max.apply(Math,samples_det);
          var lowest_value =Math.min.apply(Math,samples_det);
          var equivalent_to = (Math.abs(document.getElementById('label_claim').value)*average_determination)/100; 


          $('.determination_12').val(determination_12);
          $('#determination_avg').val(average_determination.toFixed(3));
          $('#determination_rsd').val(sample_det_rsd.toFixed(3));
          $('#range_min').val(lowest_value.toFixed(3));
          $('#range_max').val(highest_value.toFixed(3));
          $('#equivalent').val(equivalent_to.toFixed(3));
          $('#determination_rsd_2').val(sample_det_rsd.toFixed(3));
          $('#determination_sd').val(sample_sd_det.toFixed(3));
          $('#nlt_min_tolerance_det').val(lowest_value.toFixed(3));
          $('#nlt_max_tolerance_det').val(highest_value.toFixed(3));
          $('#ngt_min_tolerance_det').val(lowest_value.toFixed(3));
          $('#ngt_max_tolerance_det').val(highest_value.toFixed(3));
          $('#range_min_tolerance_det').val(lowest_value.toFixed(3));
          $('#range_max_tolerance_det').val(highest_value.toFixed(3));
      });
});
   tinymce.init({
    selector: "textarea"
   });
   
  </script>

  </head
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
       
      redirect('login','location');  //loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; 

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
<?php echo form_open('test_dissolution/worksheet_second_stage', array('id'=>'test_dissolution_view'));?>

<table width="950" class ="table_form" border="0" cellpadding="4px" align="center">
   <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>"><input type="hidden" name ="test_request" value ="<?php echo $test_request;?>">
   <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>">
      <input type ="hidden" id = "uv_type" value=" <?php echo $sql_dissolution_det['uv_type'];?>">
      <input type ="hidden" id = "label_claim" value=" <?php echo $results['label_claim'];?>">
   <tr>
     <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
     <tr>
     <td colspan ="6">
      <table width="100%" class="table_form" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
        <tr>
            <td rowspan="2" colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="6" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
        </tr>
        <tr>    
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
            <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'] ;?></td>
        </tr>
        <tr>
              <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
              <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
              <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
              <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
        </tr>
        <tr>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL No.</td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number'] ;?></td>          
        </tr>
        <tr>
              <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
              <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">USER TYPE</td>
              <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $user['logged_in']['role'];?></td>
        </tr>
       </table>
     </td>
    </tr>
     <tr>
      <td colspan="6" align="center" style="padding:8px;">
        <table border="0" class="table_form" align="center" cellpadding="8px" width="100%">
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Registration Number: <?php echo $results['laboratory_number'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Request Date: <?php echo $results['date_time'];?></td>
            </tr>
            <tr>
              <td colspan="8" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Label Claim: <?php echo $results['active_ingredients'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Brand Name: <?php echo $results['brand_name'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Method/Specifications: <?php echo $results['test_specification'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Details:<br><br> <?php echo $results['manufacturer_name'];?><br><?php echo $results['manufacturer_address'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Clients Details:<br><br> <?php echo $results['applicant_name'];?><br><?php echo $results['applicant_address'];?> </td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Date: <?php echo $results['date_manufactured'];?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Expiry Date: <?php echo $results['expiry_date'];?></td>
            </tr>
            <tr>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis Start Date: <?php echo date("d/m/Y")?></td>
              <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" value="<?php echo date("d/m/Y");?>"></td>
            </tr>
        </table>
      </td>
    </tr> 
    <tr> 
          <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Dissolution Test Form: By UV</td>
    </tr>    
    <tr>
           <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"></td>
    </tr>
    
    <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Equipment to be used:</b></td>
    </tr>
    
    <tr>
        <td colspan = "" align="center" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id="equipment_make" name="equipment_make" value = "<?php echo $sql_dissolution['equipment_make']?>">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>"><?php echo $equipment['model'];?></option>
                <?php
                endforeach
                ?>
              
            </select>
         </td>    
      
        <td align="left" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  Equipment Number:</td>
        <td colspan = "2" style="background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="equipment_number" id="equipment_number" value = "<?php echo $sql_dissolution['equipment_number']?>"></td>
      </tr>
       <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Medium Preparation</b></td>
      </tr>
       <tr>
        <td align="center" colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "hcl_prepaparation"> <?php echo $sql_dissolution['hcl_prepaparation']?></textarea></td>
      </tr>
      
      <tr>
        <td align = "" colspan = "2"style="padding: 8px;" ><b>Requirements</b></td><td align = "center"style="padding: 8px;" ><b>Actual</b></td><td align = "left"style="padding: 8px;" colspan = "6"><b>Comment</b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Apparatus</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus" value = "<?php echo $sql_dissolution['apparatus']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="actual_apparatus" value = "<?php echo $sql_dissolution['actual_apparatus']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus_comment" value = "<?php echo $sql_dissolution['apparatus_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Rotation</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation" value = "<?php echo $sql_dissolution['rotation']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_rotation" value = "<?php echo $sql_dissolution['actual_rotation']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation_comment" value = "<?php echo $sql_dissolution['rotation_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Time</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time" value = "<?php echo $sql_dissolution['time']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_time" value = "<?php echo $sql_dissolution['actual_time']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time_comment" value = "<?php echo $sql_dissolution['time_comment']?>"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Temperarture</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature" value = "<?php echo $sql_dissolution['temperature']?>"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_temperature" value = "<?php echo $sql_dissolution['actual_temperature']?>"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature_comment" value = "<?php echo $sql_dissolution['temperature_comment']?>"> </td>
      </tr>    
       <tr>
        <td colspan="6" 
        <?php 
          if($sql_dissolution_det['uv_type']=="std"){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>>
          <table border="0" class="inner_table" samplepowder ="std" width="80%" cellpadding="8px" align="center">        
          <tr>
            <td colspan ="3" style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;color:#0000fb;"><input type="checkbox" id="samplepowder" name="uv_type" value="std" checked /><b>With Standards</b></td>            
          </tr>
          <tr>
          <td colspan = "" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Number:</td>
          <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
              <select id="equipment_make_1" name="equipment_number">
                <option selected></option>
                 <?php
                 foreach($query_e as $equipment):
                ?>
                 
                 <option value="<?php echo $equipment['id_number'];?>" data-equipmentid_1="<?php echo $equipment['description']; ?>"><?php echo $equipment['id_number'];?></option>
                  <?php
                  endforeach
                  ?>
                
              </select>
           </td>    
        
          <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equipment Make:</td>
          <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="equipment_make" id="equipmentid_1"></td>
        </tr>
       <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6"align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name ="standard_weight"><?php echo $sql_dissolution['standard_weight']?></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
            <select id="standard_description" name="standard_description" value = "<?php echo $sql_dissolution['standard_description']?>">
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
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency" value = "<?php echo $sql_dissolution['potency']?>"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no" value = "<?php echo $sql_dissolution['lot_no']?>"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no" value = "<?php echo $sql_dissolution['id_no']?>"> </td>
      </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency_standard_container" id ="standard_container" value = "<?php echo $sql_dissolution['potency_standard_container']?>"> </td>
      </tr>  
      <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency_container" id ="container" value = "<?php echo $sql_dissolution['potency_container']?>" onchange="standard_weight_calc()"> </td>
      </tr>  
      <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1" id ="standard_weight_1" value = "<?php echo $sql_dissolution['standard_weight_1']?>"> </td>
      </tr>  
      <tr> 
        <td colpans = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution </td>
      </tr>  
      <tr>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea rows ="4" cols ="80" name ="standard_dilution"> <?php echo $sql_dissolution['standard_dilution']?></textarea> </td>
      </tr>  
        </table>
        </td>
      </tr>
       <tr>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Sample Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6" align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "sample_preparation"><?php echo $sql_dissolution['sample_preparation']?></textarea></td>
      </tr>
      <tr>        
        <td colspan = "4" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><b>Dilution Factor:</b> [<input type ="text" name = "df_1" id = "df_1" size = "10"> X <input type ="text" name = "df_2" id = "df_2" size = "10">] / <input type ="text" name = "df_3" id = "df_3" size = "10"></td>
        <td colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">= <input type ="text" name = "dilution_factor" id = "dilution_factor" size = "10"> </td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr> 
      <tr>
        <td colspan = "6" style="padding: 8px;color:#0000fb;"><b>Data Collected from Stage 1 (S1) and Stage 2 (S2)</b><input type="button" id="sample_data" value="+" class ="btn" size="20" /></td>
      </tr>
      <tr>
       <td colspan ="6">
          <div class="scroll hide_data" id="sample_table">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
            <tr>
              <td colspan = "6" align="center" style="padding: 8px;">Absorbance at <input type ="text" name="first_absorbance" value = "<?php echo $sql_dissolution['first_absorbance']?>"> nm and <input type ="text" name="second_absorbance" value = "<?php echo $sql_dissolution['second_absorbance']?>"> nm</td>
            </tr>            
            <tr>
              <td align="center" style="padding: 8px;"><b>Absorbance</b></td>
              <td align="center" style="padding: 8px;">Std 1</td>
              <td align="center" style="padding: 8px;">Sample 1</td>
              <td align="center" style="padding: 8px;">Sample 2</td>
              <td align="center" style="padding: 8px;">Sample 3</td>
              <td align="center" style="padding: 8px;">Sample 4</td>
              <td align="center" style="padding: 8px;">Sample 5</td>
              <td align="center" style="padding: 8px;">Sample 6</td>
            </tr>
         
            <tr>
              <td style="padding: 8px;"><b>Wavelength (Stage 1)</b></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_standard" value = "<?php echo $sql_dissolution['difference_standard']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s1" value = "<?php echo $sql_dissolution['difference_s1']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s2" value = "<?php echo $sql_dissolution['difference_s2']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s3" value = "<?php echo $sql_dissolution['difference_s3']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s4" value = "<?php echo $sql_dissolution['difference_s4']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s5" value = "<?php echo $sql_dissolution['difference_s5']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s6" value = "<?php echo $sql_dissolution['difference_s6']?>"></td>
            </tr>
            <tr>  
              <td style="padding: 8px;"><b>Wavelength (Stage 2)</b></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_standard" value = "<?php echo $sql_dissolution['difference_standard']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s1" value = "<?php echo $sql_dissolution['difference_s1']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s2" value = "<?php echo $sql_dissolution['difference_s2']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s3" value = "<?php echo $sql_dissolution['difference_s3']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s4" value = "<?php echo $sql_dissolution['difference_s4']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s5" value = "<?php echo $sql_dissolution['difference_s5']?>"></td>
              <td style="padding: 8px;"><input type = "text" name ="difference_s6" value = "<?php echo $sql_dissolution['difference_s6']?>"></td>            
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <td colspan ="6">
          <div class="scroll ">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">   
             <tr>
              <td colspan = "6" style="padding: 8px;color:#0000fb;"><b>Data Collected from Stage three</b></td>
            </tr>
             <tr>
              <td colspan = "6"align="center" style="padding: 8px;">Absorbance at <input type ="text" name="first_absorbance" value = "<?php echo $sql_dissolution['first_absorbance']?>"> nm and <input type ="text" name="second_absorbance" value = "<?php echo $sql_dissolution['second_absorbance']?>"> nm</td>
            </tr>
            <tr>
              <td align="center" style="padding: 8px;"><b>Absorbance</b></td>
              <td align="center" style="padding: 8px;">Std 1</td>
              <td align="center" style="padding: 8px;">Sample 1</td>
              <td align="center" style="padding: 8px;">Sample 2</td>
              <td align="center" style="padding: 8px;">Sample 3</td>
              <td align="center" style="padding: 8px;">Sample 4</td>
              <td align="center" style="padding: 8px;">Sample 5</td>
              <td align="center" style="padding: 8px;">Sample 6</td>              
              <td align="center" style="padding: 8px;">Sample 7</td>
              <td align="center" style="padding: 8px;">Sample 8</td>
              <td align="center" style="padding: 8px;">Sample 9</td>
              <td align="center" style="padding: 8px;">Sample 10</td>
              <td align="center" style="padding: 8px;">Sample 11</td>
              <td align="center" style="padding: 8px;">Sample 12</td>
            </tr>
         
            <tr>
              <td style="padding: 8px;"><b>Wavelength</b></td>
              <td style="padding: 8px;"><input type = "text" id="difference_standard" name ="difference_standard"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s1" name ="difference_s1"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s2" name ="difference_s2"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s3" name ="difference_s3"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s4" name ="difference_s4"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s5" name ="difference_s5"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s6" name ="difference_s6"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s7" name ="difference_s7"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s8" name ="difference_s8"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s9" name ="difference_s9"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s10" name ="difference_s10"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s11" name ="difference_s11"></td>
              <td style="padding: 8px;"><input type = "text" id="difference_s12" name ="difference_s12"></td>
            </tr>
          </table>
         </div>
        </td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
      <td colspan="6" 
      <?php 
          if($sql_dissolution_det['uv_type']=="std"){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>>
      <table border="0" class="inner_table" style="padding: 8px;background-color:#ffffff;" samplepowder ="std" width="80%" cellpadding="8px" align="center">          
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>ABSORBANCE OF SAMPLE (ASAMPLE)* DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> ABSORBANCE OF STANDARD(ASTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 8px; color:#0000fb;"><b>Determination Data collected from Stage one:</b></td>                
        <td colspan="3" style="padding: 8px; color:#0000fb;"><b>Determination Data collected from Stage two:</b> <input type="button" id="determination" value="+" class ="btn" size="20" /></td>
      </tr> 
      <tr><td colspan="6">
      <div class="hide_data" id="determinations">
      <table border="0" class="inner_table" style="padding: 8px;background-color:#ffffff;"  width="100%" cellpadding="8px" align="center">          
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination one:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_1_pkt']?> x <?php echo $sql_dissolution_det['det_1_wstd']?> x <?php echo $sql_dissolution_det['det_1_df']?> x 
             <?php echo $sql_dissolution_det['det_1_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_1_pkstd']?> x <?php echo $sql_dissolution_det['det_1_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_1']?> % LC</td>   
             <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_1_pkt']?> x <?php echo $sql_dissolution_det['det_1_wstd']?> x <?php echo $sql_dissolution_det['det_1_df']?> x 
             <?php echo $sql_dissolution_det['det_1_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_1_pkstd']?> x <?php echo $sql_dissolution_det['det_1_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_1']?> % LC</td>      
          </tr> 
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination two:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_2_pkt']?> x <?php echo $sql_dissolution_det['det_2_wstd']?> x <?php echo $sql_dissolution_det['det_2_df']?> x 
             <?php echo $sql_dissolution_det['det_2_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_2_pkstd']?> x <?php echo $sql_dissolution_det['det_2_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_2']?> % LC</td> 
             <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_2_pkt']?> x <?php echo $sql_dissolution_det['det_2_wstd']?> x <?php echo $sql_dissolution_det['det_2_df']?> x 
             <?php echo $sql_dissolution_det['det_2_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_2_pkstd']?> x <?php echo $sql_dissolution_det['det_2_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_2']?> % LC</td>      
          </tr> 
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination three:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_3_pkt']?> x <?php echo $sql_dissolution_det['det_3_wstd']?> x <?php echo $sql_dissolution_det['det_3_df']?> x 
             <?php echo $sql_dissolution_det['det_3_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_3_pkstd']?> x <?php echo $sql_dissolution_det['det_3_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_3']?> % LC</td> 
             <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_3_pkt']?> x <?php echo $sql_dissolution_det['det_3_wstd']?> x <?php echo $sql_dissolution_det['det_3_df']?> x 
             <?php echo $sql_dissolution_det['det_3_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_3_pkstd']?> x <?php echo $sql_dissolution_det['det_3_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_3']?> % LC</td>      
          </tr> 
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination four:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_4_pkt']?> x <?php echo $sql_dissolution_det['det_4_wstd']?> x <?php echo $sql_dissolution_det['det_4_df']?> x 
             <?php echo $sql_dissolution_det['det_4_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_4_pkstd']?> x <?php echo $sql_dissolution_det['det_4_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_4']?> % LC</td>  
             <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_4_pkt']?> x <?php echo $sql_dissolution_det['det_4_wstd']?> x <?php echo $sql_dissolution_det['det_4_df']?> x 
             <?php echo $sql_dissolution_det['det_4_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_4_pkstd']?> x <?php echo $sql_dissolution_det['det_4_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_4']?> % LC</td>      
          </tr> 
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination five:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_5_pkt']?> x <?php echo $sql_dissolution_det['det_5_wstd']?> x <?php echo $sql_dissolution_det['det_5_df']?> x 
             <?php echo $sql_dissolution_det['det_5_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_5_pkstd']?> x <?php echo $sql_dissolution_det['det_5_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_5']?> % LC</td>
              <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_5_pkt']?> x <?php echo $sql_dissolution_det['det_5_wstd']?> x <?php echo $sql_dissolution_det['det_5_df']?> x 
             <?php echo $sql_dissolution_det['det_5_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_5_pkstd']?> x <?php echo $sql_dissolution_det['det_5_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_5']?> % LC</td>      
          </tr> 
          <tr>
            <td align ="center" style="padding: 8px; color:#0000fb;">Determination six:</td>                
            <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_6_pkt']?> x <?php echo $sql_dissolution_det['det_6_wstd']?> x <?php echo $sql_dissolution_det['det_6_df']?> x 
             <?php echo $sql_dissolution_det['det_6_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_6_pkstd']?> x <?php echo $sql_dissolution_det['det_6_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_6']?> % LC</td> 
             <td colspan ="2" align ="center" style="padding: 12px;">
             <?php echo $sql_dissolution_det['det_6_pkt']?> x <?php echo $sql_dissolution_det['det_6_wstd']?> x <?php echo $sql_dissolution_det['det_6_df']?> x 
             <?php echo $sql_dissolution_det['det_6_potency']?> x 100 <br/><hr/><?php echo $sql_dissolution_det['det_6_pkstd']?> x <?php echo $sql_dissolution_det['det_6_lc']?>
             <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['determination_6']?> % LC</td>      
          </tr> 
          </table>
      </div>
      </td></tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Content</td>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="content"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 13</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_1_pkt" id ="det_1_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_df" id ="det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_potency" id ="det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_1_pkstd" id ="det_1_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_lc" id ="det_1_lc" class="det_1_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="determination_1" id ="determination_1" class="determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 14</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_2_pkt" id="det_2_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_df"id="det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_potency" id ="det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_2_pkstd" id ="det_2_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_lc" id ="det_2_lc" class="det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_2"id ="determination_2" class="determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 15</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_3_pkt" id ="det_3_pkt"size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_df" id ="det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_potency" id ="det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_3_pkstd" id ="det_3_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_lc" id ="det_3_lc" class="det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_3" class="determination_3" id ="determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 16</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_4_pkt" id ="det_4_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_df" id ="det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_potency" id ="det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_4_pkstd" id ="det_4_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_lc" id ="det_4_lc" class="det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_4" class="determination_4" id ="determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 17</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_5_pkt" id ="det_5_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_df" id ="det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_potency" id ="det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_5_pkstd" id ="det_5_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_lc" id ="det_5_lc" class="det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_5" id ="determination_5" class="determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 18</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_6_pkt" id ="det_6_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_df" id ="det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_potency" id ="det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_6_pkstd" id ="det_6_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_lc" id ="det_6_lc" class="third_det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_6" id ="determination_6" class="third_determination_6" size ="10">% LC </td>
      </tr>

      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 19</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_7_pkt" id ="det_7_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_7_df" id ="det_7_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_7_potency" id ="det_7_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_7_pkstd" id ="det_7_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_7_lc" id ="det_7_lc" class="det_7_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="determination_7" id ="determination_7" class="determination_7" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 20</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_8_pkt" id="det_8_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_8_df"id="det_8_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_8_potency" id ="det_8_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_8_pkstd" id ="det_8_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_8_lc" id ="det_8_lc" class="det_8_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_8"id ="determination_8" class="determination_8" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 21</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_9_pkt" id ="det_9_pkt"size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_9_df" id ="det_9_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_9_potency" id ="det_9_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_9_pkstd" id ="det_9_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_9_lc" id ="det_9_lc" class="det_9_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_9" id ="determination_9" class="determination_9" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 22</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_10_pkt" id ="det_10_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_10_df" id ="det_10_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_10_potency" id ="det_10_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_10_pkstd" id ="det_10_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_10_lc" id ="det_10_lc" class="det_10_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_10" id ="determination_10" class="determination_10" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 23</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_11_pkt" id ="det_11_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_11_df" id ="det_11_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_11_potency" id ="det_11_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_11_pkstd" id ="det_11_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_11_lc" id ="det_11_lc" class="det_11_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_11" class="determination_11" id ="determination_11" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 24</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_12_pkt" id ="det_12_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_12_df" id ="det_12_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_12_potency" id ="det_12_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_12_pkstd" id ="det_12_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_12_lc" id ="det_12_lc" class="det_12_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_12" class="determination_12" id ="determination_12" size ="10">% LC </td>
      </tr>
    </table>
    </td>
    </tr> 
    <tr>
    <td colspan="6"
    <?php 
          if($sql_dissolution_det['uv_type']=="no_std"){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>>
    <table border="0" class="inner_table" style="padding: 12px;background-color:#ffffff;"  sampleliquid ="liquids" width="80%" cellpadding="8px" align="center">        
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>ABSORBANCE OF SAMPLE (ASAMPLE) x 10 x DILUTION FACTOR(DF) x 100</u> <br/> A(1%, 1cm)/1000 x LABEL CLAIM (LC)</td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td colspan="3" style="padding: 8px; color:#0000fb;"><b>Determination Data collected from Stage one:</b></td>                
        <td colspan="3" style="padding: 8px; color:#0000fb;"><b>Determination Data collected from Stage two:</b><input type="button" id="determination_no_std" value="+" class ="btn" size="20" /></td>
      </tr> 
      <tr>
      <td colspan="6">
      <div class="hide_data" id="determinations_no_std">
      <table border="0" class="inner_table" style="padding: 8px;background-color:#ffffff;"  width="100%" cellpadding="8px" align="center">          
          
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination one:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_1_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_1_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_1_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_1']?> % LC</td> 
         <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_1_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_1_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_1_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_1']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination two:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_2_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_2_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_2_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_2']?> % LC</td>
         <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_2_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_2_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_2_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_2']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination three:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_3_pkt']?> x 10 x <?php echo $sql_dissolution_det['det_3_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_3_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_3']?> % LC</td> 
         <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_3_pkt']?> x 10 x <?php echo $sql_dissolution_det['det_3_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_3_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_3']?> % LC</td>      
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination four:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_4_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_4_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_4_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_4']?> % LC</td>      
      </tr> 
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination five:</td>                
       <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_5_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_5_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_5_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_5']?> % LC</td> 
         <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_5_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_5_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_5_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_5']?> % LC</td>      
      </tr>
      <tr>
        <td align ="center" style="padding: 8px; color:#0000fb;">Determination six:</td>                
        <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_6_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_6_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_6_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_6']?> % LC</td>    
         <td colspan ="2" align ="center" style="padding: 12px;">
         <?php echo $sql_dissolution_det['second_det_6_pkt']?> x 10 x <?php echo $sql_dissolution_det['second_det_6_df']?> x 100
          <br/><hr/>A(1%, 1cm)/1000 x <?php echo $sql_dissolution_det['second_det_6_lc']?>
         <td> =&nbsp &nbsp <?php echo $sql_dissolution_det['second_determination_6']?> % LC</td>      
      </tr> 
      </table>
      </div>
      </td>
      </tr>     
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Content</td>
        <td colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="content"> </td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 13</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_1_pkt" id ="second_det_1_pkt" size ="10" placeholder="A(SAMPLE)" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_1_df" id ="second_det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100<br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_1_lc" id ="second_det_1_lc" class ="det_1_lc"size ="10" placeholder="LC" ></td>
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_1" class="determination_1" id ="second_determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 14</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_2_pkt" id="second_det_2_pkt" size ="10" placeholder="A(SAMPLE)" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_2_df"id="second_det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_2_lc" id ="second_det_2_lc" class="det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_2"id ="second_determination_2" class="determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 15</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_3_pkt" id ="second_det_3_pkt"size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_3_df" id ="second_det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_3_lc" id ="second_det_3_lc" class="det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_3" id ="second_determination_3" class="determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 16</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>

      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_4_pkt" id ="second_det_4_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_4_df" id ="second_det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_4_lc" id ="second_det_4_lc" class="det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_4" id ="second_determination_4" class="determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 17</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">

          <input type ="text" name="second_det_5_pkt" id ="second_det_5_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_5_df" id ="second_det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_5_lc" id ="second_det_5_lc" class="det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_5" id ="second_determination_5" class="determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 18</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_6_pkt" id ="second_det_6_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_6_df" id ="second_det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_6_lc" id ="second_det_6_lc" class="third_det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_6" id ="third_second_determination_6" class="determination_6" size ="10">% LC </td>
      </tr> 
       <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 19</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_7_pkt" id ="second_det_7_pkt" size ="10" placeholder="A(SAMPLE)" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_7_df" id ="second_det_7_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100<br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_7_lc" id ="second_det_7_lc" class ="det_7_lc"size ="10" placeholder="LC" ></td>
        <td> =&nbsp &nbsp<input type ="text" name="second_determination_7" class="determination_7" id ="second_determination_7" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 20/u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_8_pkt" id="second_det_8_pkt" size ="10" placeholder="A(SAMPLE)" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_8_df"id="second_det_8_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_8_lc" id ="second_det_8_lc" class="det_8_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_8"id ="second_determination_8" class="determination_8" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 21</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_9_pkt" id ="second_det_9_pkt"size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_9_df" id ="second_det_9_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_9_lc" id ="second_det_9_lc" class="det_9_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_9" id ="second_determination_9" class="determination_9" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 22</u></b></td>
        <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>

      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_10_pkt" id ="second_det_10_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_10_df" id ="second_det_10_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_10_lc" id ="second_det_10_lc" class="det_10_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_10" id ="second_determination_10" class="determination_10" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 23</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">

          <input type ="text" name="second_det_11_pkt" id ="second_det_11_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_11_df" id ="second_det_11_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_11_lc" id ="second_det_11_lc" class="det_11_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_11" id ="second_determination_11" class="determination_11" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 24</u></b></td>
        <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="second_det_12_pkt" id ="second_det_12_pkt" size ="10" placeholder="A(SAMPLE)" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 10
          <input type ="text" name="second_det_12_df" id ="second_det_12_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp x 100 <br/><br/>A(1%, 1cm)/1000 x 
          <input type ="text" name="second_det_12_lc" id ="second_det_12_lc" class="det_12_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="second_determination_12" id ="second_determination_12" class="determination_12" size ="10">% LC </td>
      </tr> 
      </table>
      </td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>

      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_avg" name="average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="equivalent" id ="equivalent"></td>
      </tr>
       <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" size = "5" id = "range_min" name="range_min" > to <input type ="text" size = "5" id = "range_max" name="range_max"></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "2"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_rsd" name="rsd"></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6" style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> </td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;">
          <table border="0" width="80%" cellpadding="8px" align="center">
             <tr>
              <td colspan ="3" align="center" style="color:#0000ff;padding:8px;border-top:dotted 1px #c4c4ff;border-bottom:dotted 1px #c4c4ff;"> 
              <?php

              if (!empty($specs[0]['min_tolerance'])){
              echo "Not less than ".$specs[0]['min_tolerance'].": ". $specs[0]['monograph_specifications']; 

              }elseif (!empty($specs[0]['max_tolerance'])){
              echo "Not more than ".$specs[0]['max_tolerance'].": ". $specs[0]['monograph_specifications']; 

              }elseif (!empty($specs[0]['tolerance_range_from']) || !empty($specs[0]['tolerance_range_to'])){
              echo "Between ".$specs[0]['tolerance_range_from']." to ". $specs[0]['tolerance_range_to'].": ". $specs[0]['monograph_specifications']; 

              }else{
                echo "No specifications specified.";
              }
              ?> </td>
              <td colspan ="" align = "center"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Method  <input type ="text" name="method" placeholder="e.g BP 2014"> </td>        
          </tr>
            <tr>
              <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="min" />Not Less than Tolerance</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance" placeholder="min%" size="5"  /></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="nlt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance_comment" name="min_tolerance_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="max" />Not Greater than Tolerance</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance" placeholder="max%" size="5" /></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="ngt_min_tolerance_det" name="det_min" size="4" placeholder="min%" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance_comment" name="content_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="range" />Tolerance Range</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_from" placeholder="min%" size="5"> - <input type="text" range="tolerance_range" name="content_to" placeholder="max%" size="5"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_comment" disable/></td>
            </tr>

            <tr>
              <td>SD</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
            </tr>
            <tr>
              <td>RSD %</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disable/></td>
            </tr>
          </table>
        </td>
    </tr> 
      <tr>
        <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" class="table_form" width="100%" cellpadding="8px" align="center">
            <tr>    
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" name="choice" id="choice"></td>
              </tr>
          </table>
         </tr>
         <tr>
       <td colspan="8" style="padding:8px;">
        <table border="0" class="table_form" width="100%" cellpadding="8px" align="center">
          <tr>
            <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:cente;">Done by: <input type="hidden" id="done_by" name="done_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
            <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date conducted: <input type="hidden"  id="date" name="date_done" value="<?php echo date("d/m/Y")?>"><?php echo date("d/M/Y")?></td>
          </tr>
          <tr>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:left;">Approved by: 
            <select id="name" name="name" >
            <option selected></option>
             <?php
             foreach($sql_approved as $user):
            ?>
             <option value="<?php  echo $user['fname'];?>"><?php  echo $user['fname'], "&nbsp;",$user['lname'];?></option>
              <?php
              endforeach
              ?>
          </select></td>
            <td style="border-bottom: dotted 1px #c4c4ff;padding:4px;text-align:right;">Date <input type="text"  class="datepicker" name="date"></td>
          </tr>
          
          <tr>
            <td colspan="2" style="padding:4px;">Further Comments:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5" name ="further_comments"></textarea></td>
          </tr>
        </table>
      </td>
    </tr>
      <tr>
        <td style ="padding: 8px;"colspan = "6" align ="center"> <input type ="submit" name ="save_dissolution" value ="Save Dissolution Data"></td>
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
       $('#max').prop('disabled', true);
       $('#range').prop('disabled', true);
    } else {
        $("input[min='min_tolerance']").hide();
       $('#max').prop('disabled', false);
       $('#range').prop('disabled', false);
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
</script>
  </html>