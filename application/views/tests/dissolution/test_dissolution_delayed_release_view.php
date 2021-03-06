<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
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
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
     tinymce.init({
    selector: "textarea"
   });
     $('#alert-4').hide();
     $('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });


     $('.alerts').keyup(function(){
        // var values = [$('#rt_comment').val(),$('#peak_area_comment').val(),$('#asymmetry_comment').val(),$('#resolution_comment').val()];
        boxes = $(".alerts_comment").filter(function() {
                return (this.value.length);
            });
        $('.alerts').each(function(){         
          if($('.alerts_comment').val() == "Ok"){
             $("#alert-4").hide(); 
          }else{
           $("#alert-4").show();
          }

        });
     });
 $('#save_delayed_release_hplc').click(function(){ 
     $('#save_delayed_release_hplc').hide();    
        post_ajax();

  });
function post_ajax(){
  //post via ajax
  form_data = $('#test_delayed_dissolution_view').serialize();
  console.log(form_data);


  if ( $('#choice').val()=="" ||  $('#component_name').val()=="") {
  alert('Please fill all the neccesary fields')
  }else{

    $.ajax({
    url:"<?php echo base_url();?>test_dissolution/worksheet_delayed_release_hplc",
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
   
    $('#save_delayed_release_hplc').show();
    $('.all_input').val('');
    $('#peak_areas :input').val('');
    $('#determinations :input').val('');

    var tinymce_editor_id = $('._text_areas'); 
    tinymce.get(tinymce_editor_id).setContent('');


});  
    
   });
   jQuery(document).ready(function() {
    var count=1;
    jQuery('#addRow').click(function () {
        var clonedtable = jQuery("#imageTable").clone(true);
        clonedtable.appendTo('table#mainTable');
    })
    
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
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; 

       }
       $assignment = $this->uri->segment(3);
   $test_request = $this->uri->segment(4);
   
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

<form method="post" id="test_delayed_dissolution_view">
<table width="75%" class ="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" id="assignment" name ="assignment" value ="<?php echo $assignment;?>">
     <input type="hidden" name ="test_request" id="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <input type ="hidden" id = "label_claim" value=" <?php echo $results['label_claim'];?>">
     <tr>
        <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
      </tr>
     <tr>
       <td colspan ="6" style="padding:8px;">
        <table width="100%" bgcolor="#c4c4ff" class="table_form" cellpadding="8px" border="0" align ="center">
          <tr>
            <td rowspan="2" colspan ="" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="4" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
          </tr>
          <tr>    
            <td colspan="" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">ANALYTICAL WORKSHEET</td>
            <td colspan="" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
            <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
            <td colspan="" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $results['reference_number'];?></td>
          </tr>
          <tr>
            <td colspan="2" width ="80px"style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
            <td colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
            <td height="25px"colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
            <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
          </tr>
          <tr>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NUMBER</td>
            <td colspan="" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $monograph[0]['serial_number'] ;?></input></td>
            <td colspan="" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Batch/Lot NUMBER</td>
            <td colspan="" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $results['batch_lot_number'] ;?></td>          
          </tr>
         </table>   
       </td>
    </tr> 
     <tr>
      <td colspan="6" align="center" style="padding:8px;">
        <table border="0" align="center" class ="table_form" cellpadding="8px" width="100%">
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
          <td colspan ="6" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;background-color: #e8e8ff;"> MEDS Dissolution Test Form:Delayed Release Capsules</td>
    </tr>
    <tr>
        <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"></td>
    </tr>
    <tr>
        <td colspan="6" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Component: 
            <select id ="component_name" name="component_name">
              <option selected></option>
               <?php
               foreach($component_names as $component):
              ?>
               
               <option value="<?php echo $component['component'];?>" data-componentid="<?php echo $component['component']; ?>"><?php echo $component['component'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
        </td>
    </tr>
    <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make :</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" size="70" name ="equipment_number" id="equipmentid"></td>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
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
      
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Preparation of Dissolution Medium</b></td>
      </tr>
       <tr>
        <td colspan = "6" align ="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "dissolution_prepaparation"></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Dissolution System Setup</b></td>
      </tr>
      <tr>
        <td align = "" colspan = "2"style="padding: 8px;" ><b>Requirements</b></td><td align = "center"style="padding: 8px;" ><b>Actual</b></td><td align = "left"style="padding: 8px;" colspan = "6"><b>Comment</b></td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Apparatus</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="actual_apparatus"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name="apparatus_comment"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Rotation</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_rotation"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="rotation_comment"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Time</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_time"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="time_comment"> </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Temperarture</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature"> </td>        
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="actual_temperature"> </td>        
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="temperature_comment"> </td>
      </tr>
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="balance_number_two" size="70" id="idnumber"></td>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_balance" name="balance_make">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>" data-idnumber="<?php echo $equipment['description']; ?>"><?php echo $equipment['id_number'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
      </tr>
      <tr>
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6" align="center"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name ="standard_weight"></textarea></td>
      </tr>
      <tr>
        <td colspan="6" style="padding:8px;">
          <table width="100%" align="center" cellpadding="4px">
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                  <select id="standard_description_one" name="standard_description" >
                    <option selected></option>
                     <?php
                     foreach($sql_standards as $s_name):
                    ?>
                     
                     <option value="<?php  echo $s_name['item_description'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>" data-potency="<?php  echo $s_name['potency'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>"><?php  echo $s_name['item_description'];?></option>
                      <?php
                      endforeach
                      ?>
                  </select>
                </td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type="text" name="lot_no" id="stdlotnumber"> </td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type="text" name="id_no" id="stdrefnumber"> </td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type="text" name="potency" id="potency"></td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type="text" name="standard_container" id="standard_container"> </td>
            </tr>
            <tr>  
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type="text" name="container" id="container" > </td>
            </tr>
            <tr>  
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1" id="standard_weight_1" > </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
      </tr>
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea rows ="4" cols ="80" name ="standard_dilution"></textarea> </td>
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Determination of content- HPLC</b></td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;">System Suitability </td>
      </tr> 
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="balance_number_two" id="idnumbertwo" size="70"></td>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_balance_two" name="balance_make_two">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>" data-idnumbertwo="<?php echo $equipment['description']; ?>"><?php echo $equipment['id_number'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
      </tr> 
      <tr>
          <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
      </tr>
      <tr>
          <td colspan="6">
            <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
            <tr>
                <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                <td  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
          </tr>
            <tr>
                <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                Weight of Sample + container(g)</td>
                <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                <input type="text" id="weight_sample_container_one" name="weight_sample_container_one" size="10"></td>
            </tr>
            <tr>
                <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                Weight of Container(g)</td>
                <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                <input type="text" id="weight_container_one" name="weight_container_one" onChange="calculate_difference()" size="10"></td>
            </tr>
            <tr>
                <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                Weight of Sample(g)</td>
                <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                <input type="text" id="weight_sample_one" name="weight_sample_one" onChange="calculate_difference()" size="10"></td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Sample Dilution Preparation: </td>
            </tr>
            <tr>
              <td colspan="6"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea rows="5" cols="160" name="sample_preparation"></textarea></td>
            </tr>
            <tr>
              <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Sample Dilution Calculation </td>
            </tr>
            <tr>
              <td colspan="6"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table align="center" border="0"align="center" width="50%" cellpadding="44px">
                  <tr>
                    <td style="text-align:right;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_a" name="value_a" size="10" class="simple"> X </td>
                    <td style="text-align:left;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_b" name="value_b" size="10" class="simple"> =</td>
                    <td style="text-align:left;padding:8px;"><input type="text" id="value_d" name="sample_dilution_calculation" size="10" class="value_d"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center;padding:8px;"><input type="text" id="value_c" name="value_c" size="10" class="simple"> </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td align="center"colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="80" rows="4" name = "mobile_phase"></textarea></td>
      </tr>    
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>The chromatographic conditions:</b></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Chromatographic System</b></td>
      </tr>
      <tr>
        <td colspan ="6">
           <table border="0" align="center" cellpadding="8px" width="100%">
            <tr>
              <td colspan ="8"align="left" style="padding: 8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>A stainless steel column:</b></td>
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Name:</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
                <select id="column_name" name="name" >
                  <option selected></option>
                   <?php
                   foreach($sql_columns as $c_name):
                  ?>
                   <option value="<?php  echo $c_name['column_type'];?>" data-dimensions="<?php echo $c_name['column_dimensions']; ?>" data-serialnumber="<?php echo $c_name['serial_number']; ?>" data-manufacturer="<?php echo $c_name['manufacturer']; ?>" ><?php  echo $c_name['column_type'];?></option>
                    <?php
                    endforeach
                    ?>
                </select> 
              </td> 
            </tr>
            <tr>      
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Length:</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="length" id="column_dimensions"> </td>       
            </tr> 
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot/Serial Number:</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="serial_no" id ="column_serial_number"> </td>       
            </tr>
            <tr>
              <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Manufacturer:</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="manufacturer" id ="column_manufacturer"> </td>       
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Pressure:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_pressure"> <select name="column_pressure_select"><option value="Bar">Bar</option><option value="MPA">MPA</option><option value="PSI">PSI</option></select></td>       
      </tr>
      <tr> 
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Oven Temperature:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_oven_temp"> <select name="column_oven_temp_select"><option value="Celsius">Celsius</option><option value="Fahrenheit">Fahrenheit</option></select></td>       
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Mobile Phase Flow rate:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="flow_rate"> ml/min</td>       
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Detection of Wavelength:</td>
        <td colspan ="4"align="left"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="wavelength"> nm</td>       
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Suitability summary</b><br/>From chromatograms on -  </td>
      </tr> 
      <tr>
        <td colspan ="6" style="padding:8px;">
           <table border="1" align="center" class ="inner_table" cellpadding="8px" width="80%">             
            <tr>
              <td align="center" style="text-align:center;padding:8px;"><b>No.</b></td>
              <td align="center"style="text-align:center;padding:8px;"><b>Retention Time (minutes)</b></td>
              <td align="center"style="text-align:center;padding:8px;"><b>Peak Area</b></td>
              <td align="center"style="text-align:center;padding:8px;"><b>Asymmetry</b></td>
              <td align="center"style="text-align:center;padding:8px;"><b>Resolution</b></td>
              <td align="center"style="text-align:center;padding:8px;"><b>Others</b></td>
            </tr>
         
            <tr>
              <td align="center"style="padding: 8px;">1.</td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class ="rt" name ="rt_1" id ="rt_1" ></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class = "peak_area" name ="peak_area_1" id ="peak_area_1"></td >
              <td align="center"style="padding: 8px;"><input type="text" size="10" class="asymmetry" name ="asymmetry_1" id="asymmetry_1"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class="resolution" name ="resolution_1" id ="resolution_1"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" name ="other_1" id ="other_1"></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">2.</td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt" name ="rt_2" id ="rt_2" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area" name ="peak_area_2" id ="peak_area_2" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry" name ="asymmetry_2" id="asymmetry_2" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution" name ="resolution_2" id ="resolution_2" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_2" id ="other_2" ></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">3.</td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt" name ="rt_3" id ="rt_3" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area" name ="peak_area_3" id ="peak_area_3" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry" name ="asymmetry_3" id="asymmetry_3" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution" name ="resolution_3" id ="resolution_3" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_3" id ="other_3" ></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">4.</td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt" name ="rt_4" id ="rt_4" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area" name ="peak_area_4" id ="peak_area_4" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry" name ="asymmetry_4" id="asymmetry_4" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution" name ="resolution_4" id ="resolution_4" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_4" id ="other_4" ></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">5.</td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt" name ="rt_5" id="rt_5" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area" name ="peak_area_5" id ="peak_area_5" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry" name ="asymmetry_5" id="asymmetry_5" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution" name ="resolution_5" id ="resolution_5" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_5" id ="other_5" ></td>
            </tr>
            <tr>
              <td align="center"style="padding: 8px;">6.</td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt" name ="rt_6" id="rt_6" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area" name ="peak_area_6" id ="peak_area_6" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry" name ="asymmetry_6" id="asymmetry_6" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution" name ="resolution_6" id ="resolution_6" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_6" id ="other_6" ></td>
            </tr>
            <tr>
              <td align="left"style="padding: 8px;"><b>Average<b></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt_avg" name ="rt_avg" id ="rt_avg"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area_avg" name ="peak_area_avg" id ="peak_area_avg" ></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry_avg" name ="asymmetry_avg" id="asymmetry_avg"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution_avg" name ="resolution_avg" id ="resolution_avg"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_avg" id ="other_avg"></td>
            </tr>
            <tr>
              <td align="left"style="padding: 8px;"><b>SD</b></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt_sd" name ="rt_sd" id ="rt_sd"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area_sd" name ="peak_area_sd" id ="peak_area_sd"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry_sd" name ="asymmetry_sd" id ="asymmetry_sd"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution_sd" name ="resolution_sd" id ="resolution_sd"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_sd" id ="other_sd"></td>
            </tr>
            <tr>
              <td align="left"style="padding: 8px;"><b>RSD</b></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class ="rt_rsd" name ="rt_rsd" id ="rt_rsd" value=></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class = "peak_area_rsd" name ="peak_area_rsd" id ="peak_area_rsd" value=></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry_rsd" name ="asymmetry_rsd" id ="asymmetry_rsd" value=></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution_rsd" name ="resolution_rsd" id ="resolution_rsd" value=></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_rsd" id ="other_rsd" value=></td>
            </tr>
            <tr>
              <td align="left"style="padding: 8px;"><b>Acceptance Criteria</b></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class ="rt_ac alerts" name="rt_ac" id="rt_ac" placeholder ="NMT RSD"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" name="peak_area_ac alerts" id="peak_area_ac" placeholder ="NMT RSD"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class="asymmetry_ac alerts" name="asymmetry_ac" id="asymmetry_ac" placeholder ="NMT Avg"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" class="resolution_ac alerts" name="resolution_ac" id="resolution_ac" placeholder ="NLT Avg"></td>
              <td align="center"style="padding: 8px;"><input type="text" size="10" name="other_ac" id="other_ac" placeholder ="NLT"> </td>  
            </tr>
            <tr>
              <td align="left"style="padding: 8px;"><b>Comment</b></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="rt_comment alerts_comment" name ="rt_comment" id ="rt_comment"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="peak_area_comment alerts_comment" name ="peak_area_comment" id="peak_area_comment"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="asymmetry_comment alerts_comment" name ="asymmetry_comment" id = "asymmetry_comment"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" class="resolution_comment alerts_comment" name ="resolution_comment" id ="resolution_comment"></td>
              <td align="center"style="padding: 8px;"><input type = "text" size="10" name ="other_comment" id ="other_comment"></td>
            </tr>
          </table>
        </td>
      </tr>      
      <tr>
        <td colspan="6" style="padding:8px;">
          <table border="0" width="80%" class="table_form">
            <tbody>
                <tr>
                  <td colspan="6" align="right" ><input type ="button" class="btn" id="addRow" value="Add" ></td>
                </tr>
                <tr>
                  <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;" ><b>At <input type ="text" name ="minutes"> <select name ="measure"><option value="Minutes">Minutes</option><option value="Hours">Hours</option></select></td>
                </tr>
                <tr>
                  <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;" ><b>Absorbance at <input type ="text" name ="absorbance">nm</td>
                </tr>
                <tr>
                  <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
                </tr>
                <tr>
                  <td colspan ="6">
                    <div class="scroll">
                       <table border="1" align="center" class ="inner_table" cellpadding="8px" width="70%">                 
                        <tr>
                        <td><b></b></td>
                        <td align="center" style="padding: 8px;"><b>Std 1</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 1</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 2</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 3</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 4</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 5</b></td>
                        <td align="center" style="padding: 8px;"><b>Sample 6</b></td>
                      </tr>  
                      <tr>
                        <td align="center"style="padding: 8px;">1.</td>
                        <td style="padding: 8px;"><input type = "text" size="10" class = "standard" name ="sample_1" id ="sample_1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1" name ="sample_1_s1" id ="sample_1_s1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2" name ="sample_1_s2" id ="sample_1_s2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3" name ="sample_1_s3" id ="sample_1_s3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4" name ="sample_1_s4" id ="sample_1_s4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5" name ="sample_1_s5" id ="sample_1_s5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6" name ="sample_1_s6" id ="sample_1_s6"></td>
                      </tr>
                      <tr>
                        <td align="center"style="padding: 8px;">2.</td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="standard" name ="sample_2" id ="sample_2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1" name ="sample_2_s1" id ="sample_2_s1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2" name ="sample_2_s2" id ="sample_2_s2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3" name ="sample_2_s3" id ="sample_2_s3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4" name ="sample_2_s4" id ="sample_2_s4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5" name ="sample_2_s5" id ="sample_2_s5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6" name ="sample_2_s6" id ="sample_2_s6"></td>
                      </tr>
                      <tr>
                        <td align="center"style="padding: 8px;">3.</td>
                        <td style="padding: 8px;"><input type = "text" size="10" class = "standard" name ="sample_3" id ="sample_3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1" name ="sample_3_s1" id ="sample_3_s1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2" name ="sample_3_s2" id ="sample_3_s2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3" name ="sample_3_s3" id ="sample_3_s3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4" name ="sample_3_s4" id ="sample_3_s4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5" name ="sample_3_s5" id ="sample_3_s5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6" name ="sample_3_s6" id ="sample_3_s6"></td>
                      </tr>
                      <tr>
                        <td align="center"style="padding: 8px;">4.</td>
                        <td style="padding: 8px;"><input type = "text" size="10" class = "standard" name ="sample_4" id ="sample_4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1" name ="sample_4_s1" id ="sample_4_s1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2" name ="sample_4_s2" id ="sample_4_s2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3" name ="sample_4_s3" id ="sample_4_s3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4" name ="sample_4_s4" id ="sample_4_s4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5" name ="sample_4_s5" id ="sample_4_s5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6" name ="sample_4_s6" id ="sample_4_s6"></td>
                      </tr>
                       <tr>
                        <td align="center"style="padding: 8px;">5.</td>
                        <td style="padding: 8px;"><input type = "text" size="10" class = "standard" name ="sample_5" id ="sample_5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1" name ="sample_5_s1" id ="sample_5_s1" onchange ="avg_sample1()"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2" name ="sample_5_s2" id ="sample_5_s2" onchange ="avg_sample2()"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3" name ="sample_5_s3" id ="sample_5_s3" onchange ="avg_sample3()"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4" name ="sample_5_s4" id ="sample_5_s4" onchange ="avg_sample4()"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5" name ="sample_5_s5" id ="sample_5_s5" onchange ="avg_sample5()"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6" name ="sample_5_s6" id ="sample_5_s6" onchange ="avg_sample6()"></td>
                      </tr>
                      <tr>
                        <td align="center"style="padding: 8px;"><b>Average</b></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class = "standard_avg" name ="avg" id ="avg"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_1_avg" name ="avg_s1" id ="avg_s1"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_2_avg" name ="avg_s2" id ="avg_s2"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_3_avg" name ="avg_s3" id ="avg_s3"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_4_avg" name ="avg_s4" id ="avg_s4"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_5_avg" name ="avg_s5" id ="avg_s5"></td>
                        <td style="padding: 8px;"><input type = "text" size="10" class ="sample_6_avg" name ="avg_s6" id ="avg_s6"></td>
                      </tr>
                       <tr>        
                        <td colspan="6" align ="center" style="padding:12px;background-color:#ffffff;"> Relative Retention Time: <input type = "text" name ="sample_rrt_avg" id ="sample_value" placeholder="RT of SAMPLE"> / <input type = "text" name ="sample_rrt_avg" id ="std_value" placeholder ="RT of STD"></td>
                        <td colspan="2" align ="left"   style="padding:12px;background-color:#ffffff;"> = <input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>            
                      </tr>
                    </table>
                  </div>
                </td>
              </tr> 
              <tr>        
                <td colspan="6" align="center" style="padding:8px;background-color:#ffffff;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
              </tr>
              <tr>
                <td colspan="6" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td align="center" colspan="4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
                      <td align="center" colspan="2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"></td>
                    </tr>
                    <tr>
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_1_pkt" id ="det_1_pkt" size ="10" placeholder="PKT">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_1_wstd" id ="det_1_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_1_df" id ="det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_1_potency" id ="det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_1_pkstd" id ="det_1_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_1_lc" id ="det_1_lc" class="det_1_lc" size ="10" placeholder="LC" >
                      </td>
                      <td colspan="2"> =&nbsp &nbsp<input type ="text" name="determination_1" id ="determination_1" class="determination_1" size ="10"> % LC</td>
                    </tr>
                    <tr>
                      <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
                      <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
                    </tr>
                    <tr>
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_2_pkt" id="det_2_pkt" size ="10" placeholder="PKT" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_2_wstd" id ="det_2_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_2_df"id="det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_2_potency" id ="det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_2_pkstd" id ="det_2_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_2_lc" id ="det_2_lc" class="det_2_lc" size ="10" placeholder="LC">
                      </td>        
                      <td colspan="2">=&nbsp &nbsp <input type ="text" name="determination_2"id ="determination_2" class="determination_2" size ="10">% LC </td>
                    </tr>
                    <tr>  
                      <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
                      <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
                    </tr> 
                    <tr>  
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_3_pkt" id ="det_3_pkt"size ="10" placeholder="PKT" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_3_wstd" id ="det_3_wstd"size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_3_df" id ="det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_3_potency" id ="det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_3_pkstd" id ="det_3_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_3_lc" id ="det_3_lc" class="det_3_lc" size ="10" placeholder="LC" >
                      </td>        
                      <td colspan="2">=&nbsp &nbsp <input type ="text" name="determination_3" id ="determination_3"class="determination_3" size ="10">% LC </td>
                    </tr>
                    <tr>
                      <td align="center" colspan = "4" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
                      <td align="center" colspan = "2" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
                    </tr> 
                    <tr>  
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_4_pkt" id ="det_4_pkt" size ="10" placeholder="PKT" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_4_wstd" id ="det_4_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_4_df" id ="det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_4_potency" id ="det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_4_pkstd" id ="det_4_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_4_lc" id ="det_4_lc" class="det_4_lc" size ="10" placeholder="LC" >
                      </td>        
                      <td colspan="2">=&nbsp &nbsp <input type ="text" name="determination_4" id ="determination_4"class="determination_4" size ="10">% LC </td>
                    </tr> 
                    <tr>  
                      <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
                      <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
                    </tr> 
                    <tr>  
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_5_pkt" id ="det_5_pkt" size ="10" placeholder="PKT" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_5_wstd" id ="det_5_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_5_df" id ="det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_5_potency" id ="det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_5_pkstd" id ="det_5_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_5_lc" id ="det_5_lc" class="det_5_lc" size ="10" placeholder="LC" ></td>        
                      <td colspan="2">=&nbsp &nbsp <input type ="text" name="determination_5" id ="determination_5" class="determination_5" size ="10">% LC </td>
                    </tr> 
                    <tr> 
                      <td align="center" colspan = "4"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
                      <td align="center" colspan = "2"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"></td>
                    </tr> 
                    <tr>  
                      <td colspan ="4" align ="center" style="padding: 12px;">
                        <input type ="text" name="det_6_pkt" id ="det_6_pkt" size ="10" placeholder="PKT" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_6_wstd" id ="det_6_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_6_df" id ="det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_6_potency" id ="det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
                        <input type ="text" name="det_6_pkstd" id ="det_6_pkstd" size ="10" placeholder="PKSTD" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type ="text" name="det_6_lc" id ="det_6_lc" class="det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations(); ">
                      </td>        
                      <td colspan="2">=&nbsp &nbsp <input type ="text" name="determination_6" id ="determination_6" class="determination_6" size ="10">% LC </td>
                    </tr>
                    <tr> 
                      <td colspan="2" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Average %</b></td>
                      <td colspan="4" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name="average" id ="determination_avg"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Equivalent to</b></td>
                      <td colspan="4" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name="equivalent" id = "equivalent"></td>
                    </tr>
                    <tr> 
                      <td colspan="2" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Range</b></td>
                      <td colspan="4" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" size = "5" id = "range_min" name="range_min" > to <input type ="text" size = "5" id = "range_max" name="range_max"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>RSD</b></td>
                      <td colspan="4" align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name="rsd" id = "determination_rsd"></td>
                    </tr> 
                  </tbody>
          </table>    
        </td>
      </tr>
      <tr>
          <td colspan="8" style="padding:8px;">
            <table border="0" width="100%" cellpadding="8px" align="center">
              <tr>
                <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                <td align="center" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                <td align="center" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
              </tr>
              <tr>
                <td colspan="2" align="left" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"> 
                  <?php echo $specs[0]['monograph_specifications'];?>
                  </td>
                <td align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><input type="text" <input type ="text" name="average" id ="determination_avg"></td>
                <td align="center" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><input type="text" id="comment" name="comment"></td>
              </tr>
            </table>
          </td>
      </tr>

      </table>
      </td>
      </tr>       
      <tr>
        <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
          <table border="0" cellpadding="8px" width="80%" align="center">
            <tr>
              <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Tick</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">System Suitability Sequence</td>
              <td style="color:#000;padding:8px;"><input type="checkbox" name="sysytem_suitability_sequence" value="Sysytem Suitability Sequence"></input></td>
              <td style="color:#000;padding:8px;"><input type="text" name="sysytem_suitability_sequence_comment" size="10"></input></td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">Sample Injection sequence</td>
              <td style="color:#000;padding:8px;"><input type="checkbox" name="sample_injection_sequence" value="Sample Injection Sequence"></input></td>
              <td style="color:#000;padding:8px;"><input type="text" name="sample_injection_sequence_comment" size="10"></input></td>
            </tr>
            <tr>
              <td colspan="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Method Used</td>
              <td style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type ="text" name="method" placeholder="e.g BP 2014" size="10"></td>            
            </tr>
          </table>
        </td>
       </tr>         
      <tr>
        <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Conclusion</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">
            <tr>    
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" name="choice" id = "choice" disableod></input></td>
            </tr>
          </table>
          </td>
         </tr>         
      
      <tr>
        <td colspan = "6" align ="center"> <a  class="btn" id="save_delayed_release_hplc" name ="save_normal_hplc"> Submit</a>
        <input type ="button" class="btn" id="clear_form" name ="" value ="Clear Form"></td>
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