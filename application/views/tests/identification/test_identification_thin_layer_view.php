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
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <style>
    .hide_data {
      display: none; 

    }
    .reagent{
     width:150px; 
   }
  </style>
  <script>
   $(document).ready(function() {
    $('#clear_form').hide();
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
     tinymce.init({
    selector: "textarea"
   });
       $("#reagent_data").click(function(){
    $("#reagent_table").toggle();
  }); 
  $('#samplepowder').change(function() {
    if($('#samplepowder').is(':checked')){
       $("table[samplepowder='std']").show();
       $('#sampleliquid').prop('disabled', true);
    } else {
        $("table[samplepowder='std']").hide();
       $('#sampleliquid').prop('disabled', false);
    }
  }).change();
  $('#sampleliquid').change(function() {
    if($('#sampleliquid').is(':checked')){
       $("table[sampleliquid='no_std']").show();
       $('#samplepowder').prop('disabled', true);
    } else {
        $("table[sampleliquid='no_std']").hide();
       $('#samplepowder').prop('disabled', false);
    }
  }).change();
     $('#save_identification').click(function(){ 
     $('#save_identification').hide();    
        post_ajax();

  });
function post_ajax(){
  //post via ajax
  form_data = $('#test_thin_layer_view').serialize();
  console.log(form_data);


  if ( $('#choice').val()=="" ||  $('#component_name').val()=="") {
  alert('Please fill all the neccesary fields')
  }else{

    $.ajax({
    url:"<?php echo base_url();?>test_identification/worksheet_thin_layer",
    type:"POST",
    async:false,
    data:form_data,
    success: function(){

      $("#component_name option:selected").attr('disabled','disabled')
      var a = $('#assignment').val();
      var t = $('#test_request').val();

      var length_ = $("#component_name").find('option').length;
      var  length_2 = $("#component_name").find('option[disabled = "disabled"]').length;
      if ((length_-length_2)==1) {
        //redirect location when all components are selected
        window.location.href = "<?php echo base_url();?>test/index/"+a+"/"+t

      } 
      
      alert('Successful!'); 
      $('#clear_form').show();
    },fail:function(){

      alert('An error occured')
    }
    });
  }
    
}

  $('#clear_form').click(function(){
    $('#save_identification').show();
   // $('.all_input').val('');

    var tinymce_editor_id = $('._text_areas'); 
   // tinymce.get(tinymce_editor_id).setContent('');


});  
   });
  </script>
  
  </head>
  <body>
      <?php
   $user=$this->session->userdata;
   //$test_request_id=$user['logged_in']['test_request_id'];
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   // $acc_status=$user['logged_in']['acc_status'];
   // $id_temp=1;
   //var_dump($user);
   $assignment = $this->uri->segment(3);
   $test_request = $this->uri->segment(4);
      
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
    <form id="test_thin_layer_view" method="post">
    <table width="950" class="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" value ="<?php echo $assignment;?>" id="assignment">
     <input type="hidden" name ="test_request" id="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <tr>
        <td colspan="8"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
      <td colspan ="8" style="padding:8px;">
       <table width="100%" class="table_form" bgcolor="#c4c4ff" cellpadding="8px" border="0" align ="center">
         <tr>
            <td colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="4" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
        </tr>
        <tr>    
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
            <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
            <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
            <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'] ;?></td>
        </tr>
        <tr>
              <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
              <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
              <td height="25px"style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
              <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
        </tr>
        <tr>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NUMBER</td>
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $full_monograph[0]['serial_number'] ;?></td>
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot No.</td>
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number'] ;?></td>          
        </tr>
        <tr>
              <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
              <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
              <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">USER TYPE</td>
              <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $user['logged_in']['role'];?></td>
        </tr> 
       </table>   
        </td>
     </tr>
     <tr>
      <td colspan="8" align="center" style="padding:8px;">
        <table border="0" align="center" class="table_form" cellpadding="8px" width="100%">
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
          <td colspan ="8" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Identification by Thin Layer Chromatography Test Form</td>
    </tr>
    <tr>
        <td align="left"colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Components:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">          
          <select id="component_name" name="component_name" >
          <option selected> </option>
               <?php
               foreach($component_names as $c):
              ?>
               
               <option value="<?php echo $c['component'];?>" class = "all_input" data-status="<?php  //echo $c['status'];?>"><?php  echo $c['component'];?></option>
                <?php
                endforeach
                ?>
            </select>
        </td>
      </tr>
    <tr>
        <td colspan="2"align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Number:</td>
        <td style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_make" name="equipment_make">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>" data-equipmentid="<?php echo $equipment['description']; ?>"><?php echo $equipment['id_number'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
        <td align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "4" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type = "text" name = "balance_number" id ="equipmentid" size="40"></td>
      </tr>   
    <tr>
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color: #0000fb;"><b>Weight of Sample taken</b></td>
    </tr>
    <tr>
        <td colspan = "3" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of sample + container (g)</td>
        <td colspan = "5" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="sample_weight_container" id ="sample_weight_container"> </td>
    </tr>
    <tr>
        <td colspan = "3" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan = "5" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="sample_container" id ="sample_container"> </td>
    </tr>
    <tr>
        <td colspan = "3" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of sample (g)</td>
        <td colspan = "5" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="sample_weight" id ="sample_weight" > </td>
    </tr>   
    <tr>  
        <td colspan = "8" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
    </tr>
    <tr>
        <td colspan ="8" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea rows ="4" cols ="50" name ="sample_dilution"></textarea></td>
      </tr>
      <tr>  
        <td colspan ="8"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Standards</td>
      </tr>
      <tr>
        <td align="center" colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Standard Description:</td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">          
          <select id="standard_description" name="standard_description" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"data-idno="<?php  echo $s_name['reference_number'];?>" data-lotno="<?php  echo $s_name['batch_number'];?>"data-potency="<?php  echo $s_name['potency'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select>
        </td>        
    </tr>
      <tr>
        <td colspan="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency" id="potency"> </td>
       </tr>
       <tr>
        <td colspan="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no" id="lot_no"> </td>
        </tr>
       <tr>
        <td colspan="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td colspan="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no" id ="id_no"> </td>
      </tr>
       <tr>
        <td colspan ="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container" id ="standard_container"> </td>
      </tr>        
      <tr>
        <td colspan ="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container" id ="container"> </td>
      </tr>        
      <tr>  
        <td colspan ="2" align="center" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan ="4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight" id ="standard_weight_1" > </td>
      </tr>      
      <tr>
        <td colspan ="8" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "8"align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "mobile_phase"></textarea></td>
      </tr>    
      <tr> 
        <td align="left"colspan ="6" style="padding: 8px;padding: 8px;background-color: #ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Reagents Preparation</b><input type="button" id="reagent_data" value="+" class ="btn" size="20" /> </td>
      </tr>
       <tr><td colspan="6">
        <div class="hide_data" id="reagent_table">
        <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">  
        <tr>
        <td colspan ="3" style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;color:#0000fb;"><input type="checkbox" id="samplepowder" name="uv_type" value="std" /><b>For Powders</b></td>
        <td colspan ="3" style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;color:#0000fb;"><input type="checkbox" id="sampleliquid" name="uv_type" value="no_std" /><b>For Liquids</b></td>
        </tr>             
        <tr> 
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reagent Description</b></td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">          
          <select id="reagent_1" class ="reagent"  name="reagent_1">
              <option selected></option>
               <?php
               foreach($sql_reagents as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select>
        </td>
        <td colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">          
          <select id="reagent_2" class ="reagent"  name="reagent_2">
              <option selected></option>
               <?php
               foreach($sql_reagents as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select>
        </td>
      </tr> 
      <tr><td colspan="6">
        <table border="0" align="center" class ="inner_table" samplepowder ="std" cellpadding="8px" width="100%">  
       <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><u>Powder form</u></td>
       </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of reagent + container (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="reagent_container" id="reagent_weight_container_1"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="reagent_container_2" id="reagent_weight_container_2"> </td>
        </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container" id ="reagent_container_1"> </td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container_2" id ="reagent_container_2"> </td>
       </tr>
       <tr>
        <td colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of reagent (g)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="reagent_weight" id ="reagent_weight_1"> </td>
         <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="reagent_weight_2" id ="reagent_weight_2"> </td>
       </tr>
       </table></td></tr>     
       <tr><td colspan="6">
        <table border="0" align="center" class ="inner_table" sampleliquid="no_std" cellpadding="8px" width="100%">  
      <tr>
        <td colspan ="6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><u>Liquid form</u></td>
       </tr>
       <tr>
        <td colspan ="2"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Volume of reagent (ml)</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="uv_reagent_volume"   id ="reagent_volume_1"> </td>
       </tr>
       </table></td></tr>      
       </table></div></td></tr>    
      <tr>
        <td colspan ="8" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>From chromatograms</b></td>
      </tr>
       <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">              
          <tr>        
            <td colspan = "8" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> Calculate the Rf value of the substance or Rr value of substance against reference substance </td>
          </tr>
          <tr>        
            <td colspan = "3" align = "right"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><b> Rf value</b> = </td>
            <td colspan = "5" align = "left"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><u>Distance moved by the substance (mm)</u><br/>Distance of solvent front (mm)</td>
          </tr>
          <tr>        
            <td colspan = "3" align = "right"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><b> Rr value</b> = </td>
            <td colspan = "5" align = "left"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><u>Rf value of sample</u><br/>Rf value of standard</td>
          </tr>          
          </table>
        </td>
       </tr> 
      <tr>
        <td colspan ="6">
           <table border="0" align="center" class ="inner_table" cellpadding="8px" width="80%">             
            <tr>
              <td align="center"></td>
              <td align="center"><input type="text" name="standard_1" id="standard_1" placeholder ="Standard 1"></td>
              <td align="center"><input type="text" name="standard_2" id="standard_2" placeholder ="Standard 2"></td>
              <td align="center"><input type="text" name="sample_1" id="sample_1" placeholder ="Sample 1"></td>
              <td align="center"><input type="text" name="sample_2" id="sample_2" placeholder ="Sample 2"></td>
              <td align="center"><input type="text" name="impurity_1" id="impurity_1" placeholder ="Impurity"></td>
              <td align="center"><input type="text" name="impurity_2" id="impurity_2" placeholder ="Impurity"></td>
            </tr>
         
            <tr>
              <td align="center"style="padding: 8px;">Distance of solvent front (mm)</td>
              <td style="padding: 8px;"><input type = "text" name ="solvent_std_1" class="solvent_std" id ="solvent_std_1"></td>
              <td style="padding: 8px;"><input type = "text" name ="solvent_std_2" class="solvent_std" id ="solvent_std_2"></td >
              <td style="padding: 8px;"><input type = "text" name ="solvent_sample" id="solvent_sample"></td>
              <td style="padding: 8px;"><input type = "text" name ="solvent_sample_2" id="solvent_sample_2"></td>
              <td style="padding: 8px;"><input type = "text" name ="solvent_impurity_1" id ="solvent_impurity_1"></td>
              <td style="padding: 8px;"><input type = "text" name ="solvent_impurity_2" id ="solvent_impurity_2"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">Distance moved by the substance (mm)</td>
              <td style="padding: 8px;"><input type = "text" name ="substance_std_1" class="substance_std" id ="substance_std_1" ></td>
              <td style="padding: 8px;"><input type = "text" name ="substance_std_2" class="substance_std" id ="substance_std_2"></td>
              <td style="padding: 8px;"><input type = "text" name ="substance_sample" id="substance_sample"></td>
              <td style="padding: 8px;"><input type = "text" name ="substance_sample_2" id="substance_sample_2"></td>
              <td style="padding: 8px;"><input type = "text" name ="substance_impurity_1" id ="substance_impurity_1"></td>
              <td style="padding: 8px;"><input type = "text" name ="substance_impurity_2" id ="substance_impurity_2"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">Rf Value</td>
              <td style="padding: 8px;"><input type = "text" name ="rf_std_1" class="rf_std" id ="rf_std_1"></td>
              <td style="padding: 8px;"><input type = "text" name ="rf_std_2" class="rf_std" id ="rf_std_2"></td>
              <td style="padding: 8px;"><input type = "text" name ="rf_sample" id="rf_sample"></td>
              <td style="padding: 8px;"><input type = "text" name ="rf_sample_2" id="rf_sample_2"></td>
              <td style="padding: 8px;"><input type = "text" name ="rf_impurity_1" id ="rf_impurity_1"></td>
              <td style="padding: 8px;"><input type = "text" name ="rf_impurity_2" id ="rf_impurity_2"></td>
            </tr>

            <tr>
              <td align="center"style="padding: 8px;">Rr value</td>
              <td style="padding: 8px;"><input type = "text" name ="rr_value" id ="rr_value" placeholder="RR for Sample 1"></td>
              <td style="padding: 8px;"><input type = "text" name ="rr_value_2" id ="rr_value_2" placeholder="RR for Sample 2"></td>
            </tr>
            </td>
           </table>
        </td>
      </tr>          
       <tr>
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Acceptance Criteria</b></td>
       </tr>
      <tr> 
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
          <?php 
        if (($specs =="No info")){
          echo "No Information";
         }else{
            echo $specs['monograph_specifications'];
        }?>
        </td>
        <td colspan = "4" align="center" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Method <input type="text" name="method" size="40" placeholder ="e.g BP 2014"> </td>
      </tr>
      <tr> 
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Results</b> </td>
       </tr>
      <tr> 
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea cols ="50" rows="3" name="results"></textarea> </td>  
      </tr>
      <tr>      
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;"><b>Comments</b></td>
       </tr>
      <tr> 
        <td colspan = "8"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <textarea cols ="90" rows="3" name="comment"></textarea> </td>
      </tr>           
     <tr>
        <td colspan="8"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">
            <tr>    
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><select name="choice" id="choice"><option>----</option><option>Complies</option><option>Failed</option></td>
            </tr>
          </table>
      </tr>
      <tr>
        <td colspan = "6" align ="center"> <a class="btn" name ="save_identification" id="save_identification">Submit</a>
        <input type ="button" class="btn" id="clear_form" name ="" value ="Clear Form"></td>        
      </tr>
    </table>
   </form> 
 </div>
</div>
  </body>
  </html>