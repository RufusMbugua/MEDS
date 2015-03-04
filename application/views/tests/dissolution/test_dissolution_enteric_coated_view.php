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
  
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equationstwo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
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
     $('#save_enteric_coated_hplc').click(function(){ 
     $('#save_enteric_coated_hplc').hide();    
        post_ajax();

  });
function post_ajax(){
  //post via ajax
  form_data = $('#test_enteric_dissolution_view').serialize();
  console.log(form_data);


  if ( $('#choice').val()=="" ||  $('#component_name').val()=="") {
  alert('Please fill all the neccesary fields')
  }else{

    $.ajax({
    url:"<?php echo base_url();?>test_dissolution/worksheet_enteric_coated_hplc",
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
    $('#save_enteric_coated_hplc').show();
   // $('.all_input').val('');

    var tinymce_editor_id = $('._text_areas'); 
    //tinymce.get(tinymce_editor_id).setContent('');


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
<?php //echo form_open('test_dissolution/worksheet_enteric_coated_hplc', array('id'=>'test_enteric_dissolution_view'));?>
<form method="method" id="test_enteric_dissolution_view">
  <table width="75%"  class="table_form" border="0" cellpadding="4px" align="center">
     <input type="hidden" name ="assignment" id="assignment" value ="<?php echo $assignment;?>">
     <input type="hidden" name ="test_request" id="test_request" value ="<?php echo $test_request;?>">
      <input type="hidden" name ="analyst" value ="<?php echo $user['logged_in']['fname']." ".$user['logged_in']['lname'];?>"> 
      <input type ="hidden" id = "label_claim" value=" <?php echo $results['label_claim'];?>">
      <tr>
       <td colspan="6"  style="padding: 8px;text-align:right;background-color:#fdfdfd;padding:8px;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$assignment.'/'.$test_request?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back to Test Lists</a></td>
    </tr>
    <tr>
      <td colspan ="6" style="padding:8px;">
       <table width="100%" bgcolor="#c4c4ff" class="table_form" cellpadding="8px" border="0" align ="center">
       <tr>
          <td colspan ="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
          <td colspan="6" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
      </tr>
      <tr>    
          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Document: Analytical Worksheet</td>
          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">Title: <?php echo $results['active_ingredients'];?> <?php echo $results['test_specification'] ;?></td>
          <td height="25px" colspan="" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
          <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><input type="text" id="reference_number" name="reference_number" class="field"/><span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="reference_number_r" style="color:red; display:none">Fill this field</span></td>
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
          <td colspan="6"  align="center" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"> MEDS Dissolution Test Form: Enteric Coated Capsules</td>
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
      
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="equipment_number" id="equipmentid"></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Preparation of Dissolution Medium</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name = "dissolution_prepaparation"></textarea></td>
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
        <td colspan = "6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;"><b>Weight of Standard</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name ="standard_weight"></textarea></td>
      </tr>
      <tr>
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Balance Make:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
            <select id ="equipment_balance" name="balance_make">
              <option selected></option>
               <?php
               foreach($query_e as $equipment):
              ?>
               
               <option value="<?php echo $equipment['id_number'];?>" data-idnumber="<?php echo $equipment['description'];?>"><?php echo $equipment['id_number'];?></option>
                <?php
                endforeach
                ?> 
              
            </select>
         </td>    
      
        <td colspan=""align="center" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID Number:</td>
        <td colspan = "2" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" name ="balance_number" id="idnumber"></td>
      </tr>
      <tr>
        <td align="left" colspan = "2" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Standard Description:</b></td>
        <td colspan = "4" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
            <select id="standard_description" name="standard_description" >
              <option selected></option>
               <?php
               foreach($sql_standards as $s_name):
              ?>
               
               <option value="<?php  echo $s_name['item_description'];?>" data-potency="<?php  echo $s_name['potency'];?>"data-idno="<?php  echo $s_name['reference_number'];?>" data-lotno="<?php  echo $s_name['batch_number'];?>"><?php  echo $s_name['item_description'];?></option>
                <?php
                endforeach
                ?>
            </select>
          </td>
      </tr>
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Potency:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="potency" id="potency"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot No.:</td>
        <td colspan = "" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="lot_no" id ="lot_no"> </td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">ID No.:</td>
        <td colspan = ""style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="id_no" id ="id_no"> </td>
      </tr>
       <tr>
        <td colspan ="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard + container (g)</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_container" id = "standard_container"> </td>
      </tr>
      <tr>  
        <td colspan ="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of container (g) </td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="container" id ="container"> </td>
      </tr>
      <tr>
        <td colspan ="2"align="center" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Weight of standard (g)</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="standard_weight_1" id ="standard_weight_1"> </td>
       </tr>  
      <tr>  
        <td colspan ="6"align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Dilution</td>
       </tr>  
      <tr>
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="standard_dilution"></textarea> </td>
      </tr>  
      <tr>
        <td colspan="6"align="left" style="padding: 12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"><b>Sample Preparation</b></td>
      </tr> 
      <tr> 
        <td colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <textarea rows ="4" cols ="80" name ="sample_preparation"></textarea> </td>
      </tr> 
      <tr>        
        <td colspan = "4" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">Dilution Factor: [<input type ="text" name = "df_1" id = "df_1" size = "10"> X <input type ="text" name = "df_2" id = "df_2" size = "10">] / <input type ="text" name = "df_3" id = "df_3" size = "10"></td>
        <td colspan = "2" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <input type ="text" name = "dilution_factor" id = "dilution_factor" size = "10"> </td>
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" ><b>Determination of content- HPLC</b></td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color: #0000fb;" >System suitability </td>
      </tr> 
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Mobile Phase Preparation</b></td>
      </tr>
       <tr>
        <td colspan = "6"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name = "mobile_phase"></textarea></td>
      </tr>
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>The chromatographic conditions:</b></td>
      </tr>
      <tr>
        <td rowspan = "2" colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>A stainless steel column:</b></td>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Name:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
          <select id="name" name="name" >
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
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Length:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="length" id ="length"> </td>       
      </tr> 
      <tr>
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Lot/Serial No.:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="serial_no" id ="serial_no"> </td>       
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Manufacturer:</td>
        <td style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;"> <input type ="text" name="manufacturer" id ="manufacturer"> </td>       
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Pressure:</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_pressure">  <select name="column_pressure_select"><option value="Bar">Bar</option><option value="MPA">MPA</option><option value="PSI">PSI</option></select> </td>       
      </tr> 
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Column Oven Pressure:</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="column_oven_pressure">  <select name="column_oven_pressure_select"><option value="F">F</option><option value="C">C</option></select> </td>       
      </tr>
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Mobile Phase Flow rate:</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="flow_rate"> ml/min</td>       
      </tr> 
      <tr>
        <td colspan ="2"align="right" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Detection of Wavelength:</td>
        <td colspan ="4"style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" name="wavelength"> nm</td>       
      </tr>  
      <tr>
        <td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Suitability summary</b><br/>From chromatograms on -  </td>
      </tr> 
      <tr>
        <td colspan ="6">
        <table align="center" width="80%" cellpadding="8px" class="inner_table" border="0">      
          <tr>
            <td align="center"><b></b></td>
            <td align="center"><b>Retention Time (minutes)</b></td>
            <td align="center"><b>Peak Area</b></td>
            <td align="center"><b>Asymmetry</b></td>
            <td align="center"><b>Resolution</b></td>
            <td align="center"><b>Others</b></td>
          </tr>
       
         <tr>
            <td align="center"style="padding: 8px;">1.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_1" id ="rt_1"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_1" id ="peak_area_1"></td >
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_1" id="asymmetry_1"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_1" id ="resolution_1"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_1" id ="other_1"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">2.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_2" id ="rt_2" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_2" id ="peak_area_2" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_2" id="asymmetry_2" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_2" id ="resolution_2" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_2" id ="other_2" onchange="calculation_average(); calculation_sd()"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">3.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_3" id ="rt_3" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_3" id ="peak_area_3" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_3" id="asymmetry_3" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_3" id ="resolution_3" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_3" id ="other_3" onchange="calculation_average(); calculation_sd()"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">4.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_4" id ="rt_4" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_4" id ="peak_area_4" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_4" id="asymmetry_4" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_4" id ="resolution_4" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_4" id ="other_4" onchange="calculation_average(); calculation_sd()"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">5.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_5" id="rt_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_5" id ="peak_area_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_5" id="asymmetry_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_5" id ="resolution_5"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_5" id ="other_5"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">6.</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_6" id="rt_6" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_6" id ="peak_area_6" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_6" id ="asymmetry_6" onchange="calculation_average(); calculation_sd()"</td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_6"id ="resolution_6" onchange="calculation_average(); calculation_sd()"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_6"id ="other_6"onchange="calculation_average(); calculation_sd()"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Average</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_avg" id ="rt_avg"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_avg" id ="peak_area_avg" ></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_avg" id="asymmetry_avg"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_avg" id ="resolution_avg"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_avg" id ="other_avg"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">SD</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_sd" id="rt_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_sd" id ="peak_area_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_sd" id ="asymmetry_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_sd" id ="resolution_sd"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_sd" id ="other_sd"></td>
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">RSD</td>
              <td style="padding: 8px;"><input type = "text" name ="rt_rsd" id ="rt_rsd" value=></td>
              <td style="padding: 8px;"><input type = "text" class = "peak_area_rsd" name ="peak_area_rsd" id ="peak_area_rsd" value=></td>
              <td style="padding: 8px;"><input type = "text" name ="asymmetry_rsd" id ="asymmetry_rsd" value=></td>
              <td style="padding: 8px;"><input type = "text" name ="resolution_rsd" id ="resolution_rsd" value=></td>
              <td style="padding: 8px;"><input type = "text" name ="other_rsd" id ="other_rsd" value=></td>
            </tr>
          <tr>
            <td align="center"style="padding: 8px;">Acceptance Criteria</td>
            <td style="padding: 8px;"><input type="text" name="other_ac" id="rt_ac" placeholder="NMT"></td>
            <td style="padding: 8px;"><input type="text" name="other_ac" id="peak_area_ac" placeholder="NmT"></td>
            <td style="padding: 8px;"><input type="text" name="other_ac" id="assymetry_ac" placeholder="NMT"></td>
            <td style="padding: 8px;"><input type="text" name="other_ac" id="resolution_ac" placeholder="NLT"></td>
            <td style="padding: 8px;"><input type="text" name="other_ac" id="other_ac" placeholder="NLT"></td>
            
          </tr>
          <tr>
            <td align="center"style="padding: 8px;">Comment</td>
            <td style="padding: 8px;"><input type = "text" name ="rt_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="peak_area_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="asymmetry_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="resolution_comment"></td>
            <td style="padding: 8px;"><input type = "text" name ="other_comment" id ="other_comment"></td>
          </tr>
        </table>
      </td>
      </tr>
      <tr>
        <td align="center" colspan ="6" style="padding: 14px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Acid Stage</td>
      </tr>
      <tr><td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
        <tr>
          <td colspan="6" style="padding:8px;">
            <div class="scroll">
            <table border="0" class="inner_table" cellpadding="8px" align="center">
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
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="sample_1" id ="sample_1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_1_s1" id ="sample_1_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_1_s2" id ="sample_1_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_1_s3" id ="sample_1_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_1_s4" id ="sample_1_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_1_s5" id ="sample_1_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_1_s6" id ="sample_1_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">2.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="sample_2" id ="sample_2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_2_s1" id ="sample_2_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_2_s2" id ="sample_2_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_2_s3" id ="sample_2_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_2_s4" id ="sample_2_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_2_s5" id ="sample_2_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_2_s6" id ="sample_2_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">3.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="sample_3" id ="sample_3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_3_s1" id ="sample_3_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_3_s2" id ="sample_3_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_3_s3" id ="sample_3_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_3_s4" id ="sample_3_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_3_s5" id ="sample_3_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_3_s6" id ="sample_3_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">4.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="sample_4" id ="sample_4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_4_s1" id ="sample_4_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_4_s2" id ="sample_4_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_4_s3" id ="sample_4_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_4_s4" id ="sample_4_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_4_s5" id ="sample_4_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_4_s6" id ="sample_4_s6"></td>
                </tr>
                 <tr>
                  <td align="center"style="padding: 8px;">5.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="sample_5" id ="sample_5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="sample_5_s1" id ="sample_5_s1" onchange ="avg_sample1()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="sample_5_s2" id ="sample_5_s2" onchange ="avg_sample2()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="sample_5_s3" id ="sample_5_s3" onchange ="avg_sample3()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="sample_5_s4" id ="sample_5_s4" onchange ="avg_sample4()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="sample_5_s5" id ="sample_5_s5" onchange ="avg_sample5()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="sample_5_s6" id ="sample_5_s6" onchange ="avg_sample6()"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">Average</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard_avg" name ="avg" id ="avg"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1_avg" name ="avg_s1" id ="avg_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2_avg" name ="avg_s2" id ="avg_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3_avg" name ="avg_s3" id ="avg_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4_avg" name ="avg_s4" id ="avg_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5_avg" name ="avg_s5" id ="avg_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6_avg" name ="avg_s6" id ="avg_s6"></td>
                </tr>
         </table>
        </div>
       </td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">            
            <tr>        
              <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">RETENTION TIME: <input type = "text" name ="sample_rrt_avg" id ="sample_value" placeholder="RT of SAMPLE"> / <input type = "text" name ="sample_rrt_avg" id ="std_value" placeholder ="RT of STD"></td>
              <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> =<input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>
            </tr>             
          </table>
          </td>
        </tr>
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_1_pkt" id ="det_1_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_wstd" id ="det_1_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_df" id ="det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_potency" id ="det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_1_pkstd" id ="det_1_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_1_lc" id ="det_1_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="determination_1" id ="determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_2_pkt" id="det_2_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_wstd" id ="det_2_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_df"id="det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_potency" id ="det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_2_pkstd" id ="det_2_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_2_lc" id ="det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_2"id ="determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_3_pkt" id ="det_3_pkt"size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_wstd" id ="det_3_wstd"size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_df" id ="det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_potency" id ="det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_3_pkstd" id ="det_3_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_3_lc" id ="det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_3" id ="determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_4_pkt" id ="det_4_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_wstd" id ="det_4_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_df" id ="det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_potency" id ="det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_4_pkstd" id ="det_4_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_4_lc" id ="det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_4" id ="determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_5_pkt" id ="det_5_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_wstd" id ="det_5_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_df" id ="det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_potency" id ="det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_5_pkstd" id ="det_5_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_5_lc" id ="det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_5" id ="determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="det_6_pkt" id ="det_6_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_wstd" id ="det_6_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_df" id ="det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_potency" id ="det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="det_6_pkstd" id ="det_6_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="det_6_lc" id ="det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="determination_6" id ="determination_6" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center"colspan ="6"style="padding: 8px;padding: 8px;background-color: #e8e8ff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_avg" name="average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "equivalent" name="equivalent"></td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <input type ="text" size = "5" id = "range_min" name="range_min" > to <input type ="text" size = "5" id = "range_max" name="range_max"></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_rsd" name="rsd"></td>
      </tr>

      <tr>
        <td align="center" colspan ="6" style="padding: 14px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Buffer Stage</td>
      </tr>
      <tr><td align="left" colspan ="6" style="padding: 8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:#0000fb;" ><b>Peak Area from chromatograms - </b></td>
      </tr> 
        <tr>
          <td colspan="6" style="padding:8px;">
            <div class="scroll">
            <table border="0" class="inner_table" cellpadding="8px" align="center">
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
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="buffer_sample_1" id ="sample_1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="buffer_sample_1_s1" id ="sample_1_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="buffer_sample_1_s2" id ="sample_1_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="buffer_sample_1_s3" id ="sample_1_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="buffer_sample_1_s4" id ="sample_1_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="buffer_sample_1_s5" id ="sample_1_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="buffer_sample_1_s6" id ="sample_1_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">2.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="buffer_sample_2" id ="sample_2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="buffer_sample_2_s1" id ="sample_2_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="buffer_sample_2_s2" id ="sample_2_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="buffer_sample_2_s3" id ="sample_2_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="buffer_sample_2_s4" id ="sample_2_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="buffer_sample_2_s5" id ="sample_2_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="buffer_sample_2_s6" id ="sample_2_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">3.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="buffer_sample_3" id ="sample_3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="buffer_sample_3_s1" id ="sample_3_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="buffer_sample_3_s2" id ="sample_3_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="buffer_sample_3_s3" id ="sample_3_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="buffer_sample_3_s4" id ="sample_3_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="buffer_sample_3_s5" id ="sample_3_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="buffer_sample_3_s6" id ="sample_3_s6"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">4.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="buffer_sample_4" id ="sample_4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="buffer_sample_4_s1" id ="sample_4_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="buffer_sample_4_s2" id ="sample_4_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="buffer_sample_4_s3" id ="sample_4_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="buffer_sample_4_s4" id ="sample_4_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="buffer_sample_4_s5" id ="sample_4_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="buffer_sample_4_s6" id ="sample_4_s6"></td>
                </tr>
                 <tr>
                  <td align="center"style="padding: 8px;">5.</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard" name ="buffer_sample_5" id ="sample_5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1" name ="buffer_sample_5_s1" id ="sample_5_s1" onchange ="avg_sample1()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2" name ="buffer_sample_5_s2" id ="sample_5_s2" onchange ="avg_sample2()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3" name ="buffer_sample_5_s3" id ="sample_5_s3" onchange ="avg_sample3()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4" name ="buffer_sample_5_s4" id ="sample_5_s4" onchange ="avg_sample4()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5" name ="buffer_sample_5_s5" id ="sample_5_s5" onchange ="avg_sample5()"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6" name ="buffer_sample_5_s6" id ="sample_5_s6" onchange ="avg_sample6()"></td>
                </tr>
                <tr>
                  <td align="center"style="padding: 8px;">Average</td>
                  <td style="padding: 8px;"><input type = "text" class = "standard_avg" name ="buffer_avg" id ="avg"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_1_avg" name ="buffer_avg_s1" id ="avg_s1"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_2_avg" name ="buffer_avg_s2" id ="avg_s2"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_3_avg" name ="buffer_avg_s3" id ="avg_s3"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_4_avg" name ="buffer_avg_s4" id ="avg_s4"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_5_avg" name ="buffer_avg_s5" id ="avg_s5"></td>
                  <td style="padding: 8px;"><input type = "text" class ="sample_6_avg" name ="buffer_avg_s6" id ="avg_s6"></td>
                </tr>
         </table>
        </div>
       </td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">            
            <tr>        
              <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;">RETENTION TIME: <input type = "text" name ="sample_rrt_avg" id ="sample_value" placeholder="RT of SAMPLE"> / <input type = "text" name ="sample_rrt_avg" id ="std_value" placeholder ="RT of STD"></td>
              <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> =<input type = "text" name ="sample_rrt_avg" id ="sample_rrt_avg"></td>
            </tr>             
          </table>
          </td>
        </tr> 
      <tr>        
        <td colspan = "6" align = "center"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;color:#0000fb;"> <u>PEAK OF SAMPLE (PKT) * WT OF STANDARD IN FINAL DILUTION * DILUTION FACTOR(DF) * 100 * POTENCY (P) </u> <br/> PEAK AREA OF STANDARD(PKSTD) * LABEL CLAIM (LC)</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 1</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_1_pkt" id ="det_1_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_1_wstd" id ="det_1_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_1_df" id ="det_1_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_1_potency" id ="det_1_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_1_pkstd" id ="det_1_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_1_lc" id ="det_1_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>
        <td> =&nbsp &nbsp<input type ="text" name="buffer_determination_1" id ="determination_1" size ="10"> % LC</td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 2</u></b></td>
      </tr>
      <tr>
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_2_pkt" id="det_2_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_2_wstd" id ="det_2_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_2_df"id="det_2_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_2_potency" id ="det_2_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_2_pkstd" id ="det_2_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_2_lc" id ="det_2_lc" size ="10" placeholder="LC"onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="buffer_determination_2"id ="determination_2" size ="10">% LC </td>
      </tr>
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 3</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_3_pkt" id ="det_3_pkt"size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_3_wstd" id ="det_3_wstd"size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_3_df" id ="det_3_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_3_potency" id ="det_3_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_3_pkstd" id ="det_3_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_3_lc" id ="det_3_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="buffer_determination_3" id ="determination_3" size ="10">% LC </td>
      </tr>
      <tr>
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 4</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_4_pkt" id ="det_4_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_4_wstd" id ="det_4_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_4_df" id ="det_4_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_4_potency" id ="det_4_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_4_pkstd" id ="det_4_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_4_lc" id ="det_4_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="buffer_determination_4" id ="determination_4" size ="10">% LC </td>
      </tr> 
      <tr>  
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 5</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_5_pkt" id ="det_5_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_5_wstd" id ="det_5_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_5_df" id ="det_5_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_5_potency" id ="det_5_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_5_pkstd" id ="det_5_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_5_lc" id ="det_5_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="buffer_determination_5" id ="determination_5" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center" colspan = "6"style="padding: 12px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> <b><u>Determination 6</u></b></td>
      </tr> 
      <tr>  
        <td colspan ="4" align ="center" style="padding: 12px;">
          <input type ="text" name="buffer_det_6_pkt" id ="det_6_pkt" size ="10" placeholder="PKT" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_6_wstd" id ="det_6_wstd" size ="10" placeholder="WSTD">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_6_df" id ="det_6_df" size ="10" placeholder="DF">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_6_potency" id ="det_6_potency" size ="10" placeholder="Potency">*100 <br/><br/>
          <input type ="text" name="buffer_det_6_pkstd" id ="det_6_pkstd" size ="10" placeholder="PKSTD" onchange="calculation_determinations()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type ="text" name="buffer_det_6_lc" id ="det_6_lc" size ="10" placeholder="LC" onchange="calculation_determinations()"></td>        
        <td>=&nbsp &nbsp <input type ="text" name="buffer_determination_6" id ="determination_6" size ="10">% LC </td>
      </tr> 
      <tr> 
        <td align="center"colspan ="6"style="padding: 12px;padding: 8px;background-color: #e8e8ff;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"> </td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Average % </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_avg" name="buffer_average"></td>
    
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Equivalent to</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "equivalent" name="buffer_equivalent"></td>
      </tr>
      <tr> 
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Range </td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">  <input type ="text" size = "5" id = "range_min" name="buffer_range_min" > to <input type ="text" size = "5" id = "range_max" name="buffer_range_max"></td>
      
        <td align="left" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> RSD</td>
        <td colspan = "3"style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> <input type ="text" id = "determination_rsd" name="buffer_rsd"></td>
      </tr>
      <tr> 
        <td align="center"colspan ="6"style="padding: 12px;padding: 8px;background-color: #ffff;border-top: solid 1px #bfbfbf;color:#0000fb;"> </td>
      </tr>
       <tr>
        <td colspan="8" style="padding:8px;">
          <table border="0" width="80%" cellpadding="8px" align="center">
          <tr>
              <td colspan ="3" align="center" style="color:#0000ff;padding:8px;border-top:dotted 1px #c4c4ff;border-bottom:dotted 1px #c4c4ff;"> 
              <?php
                $ac =explode(';', $specs[0]['monograph_specifications']);
                echo $ac[0].'<br/>'.$ac[1];
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
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance" name="min_tolerance" placeholder="min%" size="5"  onChange="calc_determination()" /></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="nlt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" min="min_tolerance" id="nlt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" min="min_tolerance" id="min_tolerance_comment" name="min_tolerance_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="max" />Not Greater than Tolerance</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="max_tolerance" name="max_tolerance" placeholder="max%" size="5"  onChange="calc_determination()"/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' id="ngt_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" max="max_tolerance" id="ngt_max_tolerance_det" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" max='max_tolerance' name="content_comment" disable/></td>
            </tr>
            <tr>
              <td><input type="checkbox" id="range" />Tolerance Range</td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_from" placeholder="min%" size="5"> - <input type="text" range="tolerance_range" name="content_to" placeholder="max%" size="5"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" name="content_comment" disable/></td>
            </tr>

            <tr>
              <td>SD</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_sd_2" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="sd_results"></input></td>
            </tr>
            <tr>
              <td>RSD %</td>
              <td style="color:#0000ff;padding:8px;"></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_rsd_2" name="determination_sd" onChange="calculator()" disabled/></td>
              <td style="color:#0000ff;padding:8px;"><input type="text" name="rsd_comment" disabled /></td>
            </tr>
          </table>
        </td>
    </tr>      
      <tr>
        <td colspan="8" style="padding:8px;color:#0000ff;border-bottom:solid 1px #c4c4ff;"><b>Chromatography Check List</b></td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
          <table border="0" cellpadding="8px" width="60%" align="center">
            <tr>
              <td style="color:#0000ff;border-bottom:solid 1px #c4c4ff;padding:8px;">Requirement</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Tick</td>
              <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">Comment</td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">System Suitability Sequence</td>
              <td style="color:#000;padding:8px;"><input type="checkbox" name="sysytem_suitability_sequence" value="Sysytem Suitability Sequence"></input></td>
              <td style="color:#000;padding:8px;"><input type="text" name="sysytem_suitability_sequence_comment" size="50"></input></td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">Sample Injection sequence</td>
              <td style="color:#000;padding:8px;"><input type="checkbox" name="sample_injection_sequence" value="Sample Injection Sequence"></input></td>
              <td style="color:#000;padding:8px;"><input type="text" name="Sample_injection_sequence_comment" size="50"></input></td>
            </tr>
            <tr>
              <td style="color:#000;padding:8px;">Chromatograms Attached</td>
              <td style="color:#000;padding:8px;"><input type="checkbox" name="chromatograms_attached" value="Chromatograms Attached"></input></td>
              <td style="color:#000;padding:8px;"><input type="text" name="chromatograms_attached_comment" size="50"></input></td>
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
              <td style="border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" name="choice" id="choice"></td>
              </tr>
          </table>
         </tr>
     
      <tr>
         <td colspan = "6" align ="center"> <a class="btn" name ="save_enteric_coated_hplc" id="save_enteric_coated_hplc">Submit</a>
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