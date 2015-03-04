<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>
  
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>  
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/calculations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.autosave.js';?>"></script>
  <script>
  $(document).ready(function() {
/* Init DataTables */
  $('#clear_form').hide();

  $('#list').dataTable({
   "sScrollY":"270px",
   "sScrollX":"100%"
  });

   tinymce.init({
  selector: "textarea"
  });

  $('#save_identification').click(function(){ 
     // $('#save_identification').hide();     

        // post_ajax();
     
     $("#component_name option:selected").attr('disabled','disabled')

     a = $('#assignment').val();
     t = $('#test_request').val();

      length_ = $("#component_name").find('option').length;
      length_2 = $("#component_name").find('option[disabled = "disabled"]').length;

console.log(length_-length_2);
post_ajax();
      if ((length_-length_2)==1 ){
        //redirect location when all components are selected
      
         window.location.href = "<?php echo base_url();?>test/index/"+a+"/"+t
      
      } 

  });
function post_ajax(){
  //post via ajax
  form_data = $('#assay_hplc_area_method_two_components').serialize();
console.log(form_data);
     if ( $('#test_conclusion').val()=="" ||  $('#component_name').val()=="") {
      alert('Please fill all the neccesary fields')
     }else{

      $.ajax({
         url:"<?php echo base_url();?>assay/save_multicomponent_area_method",
        type:"POST",
        data:form_data,
        success: function(){

           alert('Successful!'); 
          $('#clear_form').show();
       },fail:function(){

          alert('An error occured')
        }
      });
  }
    
}

  $('#clear_form').click(function(){
    $('#save_assay_multicomponent').show();
    $('.all_input').val('');

    var tinymce_editor_id = $('._text_areas'); 
    tinymce.get(tinymce_editor_id).setContent('');


});

//   $("#component_name").change(function(){
     
//      $("#component_name option:selected").attr('disabled','disabled')
// });
      
  
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
      <?php echo form_open('assay/save_multicomponent_area_method',array('id'=>'assay_hplc_area_method_two_components'));?>
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
                  <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">DOCUMENT: Analytical Worksheet</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">TITLE: <?php echo $query['active_ingredients']." "." ".$query['test_specification'];?><input type="hidden" name="test_specification" value="<?php echo $query['test_specification'];?>"></td>
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
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">BATCH/LOT NO.</td>
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
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>HPLC Area Method Multicomponents</h5></td>
          </tr>
          <tr><td colspan="8" style="padding:8px;"></td></tr>
           <tr>
              <td colspan="8" align="left" style="padding:8px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Components</b>
               <select id="component_name" name="component_name">
                  <?php
                   foreach($components as $c_name):
                  ?>
                    <option style="padding:4px;" value="<?php echo $c_name['component'];?>" class = "all_input"><?php echo $c_name['component'];?></option>  
                  <?php
                  endforeach
                  ?>
                </select>
              </td>
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
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            <tr>
              <td colspan="8">
                <div class="scroll">
                <table border="0" class="table_form" width="80%" cellpadding="8px" align="center">
                  <tr>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"></td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 1</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Weight 2</td>
                      <td  align="center" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">weight 3</td>
                  </tr>
                  <tr>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample + container(g)</td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_one" name="weight_sample_container_one" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_two" name="weight_sample_container_two" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_container_three" name="weight_sample_container_three" size="10"></td>
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Container(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_one" name="weight_container_one" onChange="calculate_difference()" size="10"></td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_two" name="weight_container_two" onChange="calculate_difference()" size="10"></td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_three" name="weight_container_three" onChange="calculate_difference()" size="10"></td>
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_one" name="weight_sample_one" onChange="calculate_difference()" size="10"></td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_two" name="weight_sample_two" onChange="calculate_difference()" size="10"></td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_three" name="weight_sample_three" onChange="calculate_difference()" size="10"></td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Dilution Preparation: </td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea rows="5" cols="160" name="sample_weight_dilution_preparation"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Dilution Calculation</b></td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <table align="center" border="0"align="center" width="100%" cellpadding="4px" class="dynatable">
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
              </div>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Standard Preparation</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td>
                        <textarea name="standard_preparation" cols="140" rows="8"></textarea>
                      </td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          
          <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Component</b> <input type="text" name="component_one" value="<?php echo $components[0]['component']?>"></td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="dynatable" width="80%" border="0" align="center" cellpadding="8px"> 
                  <tr>
                      <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                      <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;" class="id" >
                        <select id="standard_description_one" name="standard_description_one" >
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
                      <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Potency</td>
                      <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="potency_one" name="potency_one" size="20" class="potency_one"></td>
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of standard + container(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="weight_standard_container_of_std_one" id="weight_standard_container_of_std_one" size="20" class="standard_calculation_compo"></td>
                    
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of container(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="weight_container_of_std_one" id="weight_container_of_std_one" size="20" class="standard_calculation_compo"></td>
                      
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of standard(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="weight_of_standard_one" id="weight_of_standard_one" size="20" class="weight_of_standard_one"></td>
                  </tr>
                  <tr>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  </tr>  
                  <tr>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;"><textarea type="text" name="dilution_preparation_standard_one" row="4" cols="40" class="id"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="3"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Dilution Calculation</b></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_e" name="value_e" size="10" class="standard_dilution"> X <input type="text" id="value_f" name="value_f" size="10" class="standard_dilution"></td>
                    <td style="text-align:left;padding:8px;">= <input type="text" id="value_h" name="standard_calculation_dilution_one" size="10" class="value_h "></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center;padding:8px;"><input type="text" id="value_g" name="value_g" size="10" class="standard_dilution"> </td>
                    <td style="text-align:center;padding:8px;"></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align:center;padding:8px;"></td>
                  </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Component</b> <input type="text" name="component_two" value="<?php echo $components[1]['component']?>"></td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="dynatable" width="80%" border="0" align="center" cellpadding="8px"> 
                  <tr>
                      <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                      <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;" class="id" >
                        <select id="standard_description_one" name="standard_description_one" >
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
                      <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Potency</td>
                      <td height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="potency_two" name="potency_two" size="20" class="potency_two"></td>
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of standard + container(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="sc_component" id="sc_component" size="20" class="standard_weight"></td>
                    
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of container(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="c_component" id="c_component" size="20" class="standard_weight"></td>
                      
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of standard(g)</td>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" name="standard_difference" id="standard_difference" size="20" class="standard_difference"></td>
                  </tr>
                  <tr>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">Dilution:</td>
                  </tr>  
                  <tr>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;"><textarea type="text" name="dilution_preparation_standard_two" row="4" cols="40" class="id"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="3"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><b>Dilution Calculation</b></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_m" name="value_m" size="10" class="standard_calculation"> X <input type="text" id="value_n" name="value_n" size="10" class="standard_calculation"></td>
                    <td style="text-align:left;padding:8px;">= <input type="text" id="value_p" name="value_p" size="10" class="value_p "></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center;padding:8px;"><input type="text" id="value_o" name="value_o" size="10" class="standard_calculation"> </td>
                    <td style="text-align:center;padding:8px;"></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="text-align:center;padding:8px;"></td>
                  </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="100%" align="center" cellpadding="8px">
                  <tr>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment Make</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" size="80" id="equipmentmake" name="equipmentmake"></input></td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Equipment ID Number</td>
                    <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="make_id" name="make_id" >
                      <option selected></option>
                       <?php
                       foreach($sql_equipment as $bl_name):
                      ?>
                       
                       <option value="<?php  echo $bl_name['id_number'];?>" data-equipmentmake="<?php echo $bl_name['description']; ?>"><?php  echo $bl_name['id_number'];?></option>
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
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="dynatable" width="80%" border="0" align="center" cellpadding="8px"> 
                  <div id="reagents_form">
                  <form name="reagents" action="">
                    <tr>
                        <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Reagent Description:</td>
                        <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                          <select id="reagent_description" name="reagent_description" >
                          <option selected></option>
                           <?php
                           foreach($reagents as $r_name):
                          ?>
                           
                           <option value="<?php  echo $r_name['item_description'];?>" data-reagentslotnumber="<?php  echo $r_name['batch_number'];?>" data-reagentsrefnumber="<?php  echo $r_name['card_number'];?>" data-potencynumber="<?php  echo $r_name['potency_number'];?>"><?php  echo $r_name['item_description'];?></option>
                            <?php
                            endforeach
                            ?>
                          </select>
                        </td>
                    </tr>
                     <tr>
                        <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Reagent + Container (ml)</td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_container_one" id="weight_reagent_container_one" size="10"></td>
                    </tr>
                    <tr>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Container (ml)</td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="container_one" id="container_aone" onChange="calculate_reagent_difference()" size="10"></td>                        
                    </tr>
                    <tr>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        Weight of Reagent (ml)</td>
                        <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <input type="text" name="weight_reagent_one" id="weight_reagent_one" size="10"></td>                        
                    </tr>
                    <tr>
                      <td colspan="3" style="text-align:center;padding:8px;"><input class="btn" type="submit" name="submit_r" id="submit_r" value="Submit"></td>
                    </tr>
                  </form>
                </div>
              </table>
            </td>
          </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Mobile Phase Preparation:</b></td>
            </tr>
            <tr>
                <td colspan="8" align="center" style="padding:8px;">
                  <table class="inner_table" width="80%" align="center" cellpadding="8px">
                    <tr>
                      <td style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                        <textarea cols="140" rows="8" type="text" name="mobile_phase_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System-Suitability requirements</b></td>
            </tr>

            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"> From Chromatograms <td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="dynatable" border="0" width="80%" cellpadding="8px" align="center">
                      <tr>
                        <td colspan="6" align="left" style="padding:8px;"></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>No.</b></td>
                        <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Retention time (minutes)</b></td>
                        <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Peak Area</b></td>
                        <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Asymmetry</b></td>
                        <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Resolution</b></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                        <td><input type="text" id="retention_time_one" name="retention_time_one"></input></td>
                        <td><input type="text" id="peak_area_one" name="peak_area_one"></input></td>
                        <td><input type="text" id="asymmetry_one" name="asymmetry_one"></input></td>
                        <td><input type="text" id="resolution_one" name="resolution_one"></input></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                        <td><input type="text" id="retention_time_two" name="retention_time_two" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="peak_area_two" name="peak_area_two" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="asymmetry_two" name="asymmetry_two" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="resolution_two" name="resolution_two" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                        <td><input type="text" id="retention_time_three" name="retention_time_three" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="peak_area_three" name="peak_area_three" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="asymmetry_three" name="asymmetry_three" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="resolution_three" name="resolution_three" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                        <td><input type="text" id="retention_time_four" name="retention_time_four" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="peak_area_four" name="peak_area_four" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="asymmetry_four" name="asymmetry_four" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="resolution_four" name="resolution_four" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                        <td><input type="text" id="retention_time_five" name="retention_time_five" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="peak_area_five" name="peak_area_five" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="asymmetry_five" name="asymmetry_five" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="resolution_five" name="resolution_five" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                        <td><input type="text" id="retention_time_six" name="retention_time_six" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="peak_area_six" name="peak_area_six" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="asymmetry_six" name="asymmetry_six" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="resolution_six" name="resolution_six" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                        <td><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="average_asymmetry" name="average_asymmetry" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="average_resolution" name="average_resolution" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                        <td><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" ></input></td>
                        <td><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="standard_dev_asymmetry" name="standard_dev_asymmetry" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="standard_dev_resolution" name="standard_dev_resolution" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                        <td><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="rsd_asymmetry" name="rsd_asymmetry" onChange="calculator_average()"></input></td>
                        <td><input type="text" id="rsd_resolution" name="rsd_resolution" onChange="calculator_average()"></input></td>
                      </tr>
                      <tr>
                        <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                        <td><input type="text" name="a_ac" id="a_ac" onChange="calculator_average()" class="retention_time_acceptance_criteria"></td>
                        <td><input type="text" name="b_ac" id="b_ac" onChange="calculator_average()" class="peak_area_acceptance_criteria"></td>
                        <td><input type="text" name="c_ac" id="c_ac" onChange="calculator_average()" class="asymmetry_acceptance_criteria"></td>
                        <td><input type="text" name="d_ac" id="d_ac" onChange="calculator_average()" class="resolution_acceptance_criteria"></td>
                      </tr>
                      <tr>
                        <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                        <td><input type="text" id="comment_retention_time" name="comment_retention_time" class="comment_retention_time"></input></td>
                        <td><input type="text" id="comment_peak_area" name="comment_peak_area" class="comment_peak_area"></input></td>
                        <td><input type="text" id="comment_asymmetry" name="comment_asymmetry" class="comment_asymmetry"></input></td>
                        <td><input type="text" id="comment_resolution" name="comment_resolution" class="comment_resolution"></input></td>
                      </tr>
                      <tr>
                        <td style="padding:8px;text-align:center;"></td>
                      </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic Conditions</b></td>
            </tr>
            <tr>
                <td colspan="8" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" width="80%" align="center">
                  <tr>
                    <td rowspan="4" align="left" style="color:#000;padding:8px;color: #0000fb;background-color: #ffffff;">
                    -A stainless Steel Column</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Name:</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">
                      <select id="column_name" name="column_name" >
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
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Length:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_dimensions" name="column_dimensions"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Lot/Serial No.</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_serial_number" name="column_serial_number"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Manufacturer:</td>
                    <td style="text-align:center;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><input type="text" id="column_manufacturer" name="column_manufacturer"></input></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
             <td colspan="8" style="padding:8px;">
                <table width="90%" class="inner_table" border="0" cellpadding="8px" align="center">
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Pressure</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_pressure"/> <select name="column_pressure_units">
                      <option></option><option value="Bar">Bar</option><option value="MPA">MPA</option><option value="PSI">PSI</option></select></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Column Oven Temperature</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_oven_temperature"/> <select name="column_oven_temperature_units">
                      <option></option><option value="Celsius">Celsius</option><option value="Fahrenheit">Fahrenheit</option><select></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate (ml/min)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_mp_flow_rate"></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength (nm)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_detection_wavelength"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000ff;background-color: #ffffff;">Chromatographic System- As Per System Stability</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Peak Area From Chromatograms</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <div class="scroll">
                  <table border="0" class="inner_table dynatable" width="80%" cellpadding="8px" align="center">
                    
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Component <input type="text" name="component_one" value="<?php echo $components[0]['component'];?>"></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="dynatable" border="0" width="70%" cellpadding="8" align="center">
                     <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" class="std" name="std_one" id="std" size="10"></td>
                      <td><input type="text" class="sample_one" id="sample_a_one" name="sample_a_one" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_one" name="sample_b_one" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_one" name="sample_c_one" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" class="std" id="std_two" name="std_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_one" id="sample_a_two" name="sample_a_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_two" name="sample_b_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_two" name="sample_c_two" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" class="std" id="std_three" name="std_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_one" id="sample_a_three" name="sample_a_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_three" name="sample_b_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_three" name="sample_c_three" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" class="std" id="std_four" name="std_four" onChange="" size="10"></td>
                      <td><input type="text" class="sample_one" id="sample_a_four" name="sample_a_four" onChange=" " size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_four" name="sample_b_four" onChange="" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_four" name="sample_c_four" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" class="std" id="std_five" name="std_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_one" id="sample_a_five" name="sample_a_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_five" name="sample_d_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_five" name="sample_c_five" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text"  class="std_average" id="std_average" name="std_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_one_average" id="sample_a_average" name="sample_a_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_two_average" id="sample_b_average" name="sample_b_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_three_average" id="sample_c_average" name="sample_c_average" onChange="" size="10" disabled></td>
                    </tr>
                    <tr>
                        <td style="color:#0000ff;padding:8px;text-align:right;"><b>Where:</b></td>
                        <td  colspan="2" style="color:#0000ff;padding:8px;">relative retention =</td>
                        <td  colspan="3" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">retention time of peak of interest</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="2"></td>
                        <td colspan="3" style="color:#0000ff;padding:8px;">Retention time of reference peak</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="color:#0000ff;padding:8px;text-align:right;"><b></b></td>
                        <td  colspan="2" style="padding:8px;"><input type="text" id="rr" name="rr" class="relative_retention"> =</td>
                        <td  colspan="3" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><input type="text" id="rpk" name="rpk" class="relative_retention_time"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="2"></td>
                        <td colspan="3" style="padding:8px;"><input type="text" id="rrp" name="rrp" class="relative_retention_time"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                      <tr>
                        <td colspan="8" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">AREA OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOXPOTENCY =</td>
                        <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;text-align:center;">AREA OF STANDARD x WT OF SAMPLE TAKEN x LABEL CLAIM</td>
                      </tr>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                      <tr>
                        <td  colspan="9" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
                      </tr>
                       <tr>
                        <td  colspan="9" style="padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>AWT</b>-Average Weight Taken From Uniformty of dosage <b><?php if (empty($uniformity_of_dosage_multicomponent[0]['average'])){echo "Uniformity of dosage not Done!";}else{ echo $uniformity_of_dosage_multicomponent[0]['average'];}?> </b></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_one_pkt" name="d_one_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_one_wstd" name="d_one_wstd" placeholder="(WSTD)" size="5" class="wstd"> x <input type="text" id="d_one_awt" name="d_one_awt" placeholder="(AWT)" size="5" onChange="calc_determination()"class="id"> x 100 x <input type="text" id="d_one_df" name="d_one_df" placeholder="(DF)" size="5" class="value_h"> x <input type="text" id="d_one_potency" name="d_one_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_one_p_lc" name="d_one_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_one_pkstd" name="d_one_pkstd" placeholder="(PKSTD)" size="5" class="id"> x <input type="text" id="d_one_wt" name="d_one_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_one_lc" name="d_one_lc" placeholder="(LC)" size="5" value="<?php echo $components[0]['label_claim'];?>" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_two_pkt" name="d_two_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_two_wstd" name="d_two_wstd" placeholder="(WSTD)" size="5" class="wstd"> x <input type="text" id="d_two_awt" name="d_two_awt" onChange="calc_determination()" placeholder="(AWT)" size="5" class="id"> x 100 x <input type="text" id="d_two_df" name="d_two_df" placeholder="(DF)" size="5" class="value_h"> x <input type="text" id="d_two_potency" name="d_two_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_two_p_lc" name="d_two_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_two_pkstd" name="d_two_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_two_wt" name="d_two_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_two_lc" name="d_two_lc" value="<?php echo $components[0]['label_claim'];?>" placeholder="(LC)" size="5" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_three_pkt" name="d_three_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_three_wstd" name="d_three_wstd" placeholder="(WSTD)" size="5" class="wstd"> x <input type="text" id="d_three_awt" name="d_three_awt" placeholder="(AWT)" onChange="calc_determination()" size="5" class="id"> x 100 x <input type="text" id="d_three_df" name="d_three_df" placeholder="(DF)" size="5" class="value_h"> x <input type="text" id="d_three_potency" name="d_three_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_three_p_lc" name="d_three_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_three_pkstd" name="d_three_pkstd" placeholder="(PKSTD)" size="5" class="id"> x <input type="text" id="d_three_wt" name="d_three_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_three_lc" name="d_three_lc" value="<?php echo $components[0]['label_claim'];?>" placeholder="(LC)" size="5" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_average" name="determination_average" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="determination_equivalent_to" class="id"></input></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_sd" name="determination_sd" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_rsd" name="determination_rsd" class="id"></td>
                      </tr>
                      <tr>
                          <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                          <td colspan="3"  style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                          <td colspan="4"  style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
                      </tr>
                      <tr>
                        <td colspan="2">Range</td>
                        <td colspan="2" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="new_min_tolerance_det" name="content_from" placeholder="min%" size="5" onChange="calc_determination()"> - <input type="text" range="tolerance_range" id="new_max_tolerance_det" name="content_to" placeholder="max%" size="5" onChange="calc_determination()"/></td>
                        <td colspan="2" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" /></td>
                        <td colspan="3" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_tolerance_comment" name="range_tolerance_comment" /></td>
                      </tr>
                      <tr>
                        <td>SD</td>
                        <td style="color:#0000ff;padding:8px;"></td>
                        <td colspan="4" style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_sd" name="determination_sd"  disabled/></td>
                        <td colspan="4" style="padding:8px;"><input type="text" name="sd_results"></td>
                      </tr>
                      <tr>
                        <td>RSD %</td>
                        <td style="color:#0000ff;padding:8px;"></td>
                        <td colspan="4" style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_rsd" name="determination_rsd"  disabled/></td>
                        <td colspan="4" style="padding:8px;"><input type="text" name="rsd_comment" disable/></td>
                      </tr>
                      <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">Component <input type="text" name="component_two" value="<?php echo $components[1]['component'];?>"></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="dynatable" border="0" width="70%" cellpadding="8" align="center">
                     <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" class="std_two" name="std_two" id="std_two" size="10"></td>
                      <td><input type="text" class="sample_four" id="sample_d_one" name="sample_d_one" size="10"></td>
                      <td><input type="text" class="sample_five" id="sample_e_one" name="sample_e_one" size="10"></td>
                      <td><input type="text" class="sample_six" id="sample_f_one" name="sample_f_one" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" class="std_two" id="std_two" name="std_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_four" id="sample_d_two" name="sample_d_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_five" id="sample_e_two" name="sample_e_two" onChange="" size="10"></td>
                      <td><input type="text" class="sample_six" id="sample_f_two" name="sample_f_two" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" class="std_two" id="std_three" name="std_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_four" id="sample_d_three" name="sample_d_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_five" id="sample_e_three" name="sample_e_three" onChange="" size="10"></td>
                      <td><input type="text" class="sample_six" id="sample_f_three" name="sample_f_three" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" class="std_two" id="std_four" name="std_four" onChange="" size="10"></td>
                      <td><input type="text" class="sample_four" id="sample_d_four" name="sample_d_four" onChange=" " size="10"></td>
                      <td><input type="text" class="sample_five" id="sample_e_four" name="sample_e_four" onChange="" size="10"></td>
                      <td><input type="text" class="sample_six" id="sample_f_four" name="sample_f_four" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" class="std_two" id="std_five" name="std_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_four" id="sample_d_five" name="sample_d_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_five" id="sample_e_five" name="sample_e_five" onChange="" size="10"></td>
                      <td><input type="text" class="sample_six" id="sample_f_five" name="sample_f_five" onChange="" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text"  class="std_two_average" id="std_two_average" name="std_two_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_four_average" id="sample_d_average" name="sample_d_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_five_average" id="sample_e_average" name="sample_e_average" onChange="" size="10" disabled></td>
                      <td><input type="text"  class="sample_six_average" id="sample_f_average" name="sample_f_average" onChange="" size="10" disabled></td>
                    </tr>
                    <tr>
                        <td style="color:#0000ff;padding:8px;text-align:right;"><b>Where:</b></td>
                        <td  colspan="2" style="color:#0000ff;padding:8px;">relative retention =</td>
                        <td  colspan="3" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">retention time of peak of interest</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="2"></td>
                        <td colspan="3" style="color:#0000ff;padding:8px;">Retention time of reference peak</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="color:#0000ff;padding:8px;text-align:right;"><b></b></td>
                        <td  colspan="2" style="padding:8px;"><input type="text" id="rr" name="rr" class="relative_retention"> =</td>
                        <td  colspan="3" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><input type="text" id="rpk" name="rpk" class="relative_retention_time"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="2"></td>
                        <td colspan="3" style="padding:8px;"><input type="text" id="rrp" name="rrp" class="relative_retention_time"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                      <tr>
                        <td colspan="8" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">AREA OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTOXPOTENCY =</td>
                        <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;text-align:center;">AREA OF STANDARD x WT OF SAMPLE TAKEN x LABEL CLAIM</td>
                      </tr>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                      <tr>
                        <td  colspan="9" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations</b></td>
                      </tr>
                       <tr>
                        <td  colspan="9" style="padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>AWT</b>-Average Weight Taken From Uniformty of dosage <b><?php if (empty($uniformity_of_dosage_multicomponent[0]['average'])){echo "Uniformity of dosage not Done!";}else{ echo $uniformity_of_dosage_multicomponent[0]['average'];}?> </b></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_four_pkt" name="d_four_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_four_wstd" name="d_four_wstd" placeholder="(WSTD)" size="5" class="standard_difference"> x <input type="text" id="d_four_awt" name="d_four_awt" placeholder="(AWT)" size="5" onChange="calc_determination()"class="id"> x 100 x <input type="text" id="d_four_df" name="d_four_df" placeholder="(DF)" size="5" class="value_p"> x <input type="text" id="d_four_potency" name="d_four_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_four_p_lc" name="d_four_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_four_pkstd" name="d_four_pkstd" placeholder="(PKSTD)" size="5" class="id"> x <input type="text" id="d_four_wt" name="d_four_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_four_lc" name="d_four_lc" placeholder="(LC)" size="5" value="<?php echo $components[1]['label_claim']; ?>" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_five_pkt" name="d_five_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_five_wstd" name="d_five_wstd" placeholder="(WSTD)" size="5" class="standard_difference"> x <input type="text" id="d_five_awt" name="d_five_awt" onChange="calc_determination()" placeholder="(AWT)" size="5" class="id"> x 100 x <input type="text" id="d_five_df" name="d_five_df" placeholder="(DF)" size="5" class="value_p"> x <input type="text" id="d_five_potency" name="d_five_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_five_p_lc" name="d_five_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_five_pkstd" name="d_five_pkstd" placeholder="(PKSTD)" size="5"> x <input type="text" id="d_five_wt" name="d_five_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_two_lc" name="d_two_lc" value="<?php echo $components[1]['label_claim']; ?>" placeholder="(LC)" size="5" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                      </tr>
                      <tr>
                        <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_six_pkt" name="d_six_pkt"  placeholder="(PKT)" size="5" class="id"> x <input type="text" id="d_six_wstd" name="d_six_wstd" placeholder="(WSTD)" size="5" class="standard_difference"> x <input type="text" id="d_six_awt" name="d_six_awt" placeholder="(AWT)" onChange="calc_determination()" size="5" class="id"> x 100 x <input type="text" id="d_six_df" name="d_six_df" placeholder="(DF)" size="5" class="value_p"> x <input type="text" id="d_six_potency" name="d_six_potency" placeholder="(P)" size="5" class="id"></td>
                        <td style="padding:8px;">=<input type="text" id="d_six_p_lc" name="d_six_p_lc" onChange="calc_determination()" placeholder="(%LC)" size="10" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="padding:8px;text-align:center;"><input type="text" id="d_six_pkstd" name="d_six_pkstd" placeholder="(PKSTD)" size="5" class="id"> x <input type="text" id="d_six_wt" name="d_six_wt" placeholder="(WT)" size="5" class="id"> x <input type="text" id="d_six_lc" name="d_six_lc" value="<?php echo $components[1]['label_claim']; ?>" placeholder="(LC)" size="5" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_average" name="determination_average_two" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">Equivalent To &nbsp;<input type="text" name="determination_equivalent_to_two" class="id"></input></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">SD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_sd" name="determination_sd_two" class="id"></td>
                      </tr>
                      <tr>
                        <td colspan="9" style="color:#0000ff;padding:8px;">RSD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_rsd" name="determination_rsd_two" class="id"></td>
                      </tr>
                      <tr>
                          <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                          <td colspan="3"  style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                          <td colspan="4"  style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
                      </tr>
                      <tr>
                        <td colspan="2">Range</td>
                        <td colspan="2" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="new_min_tolerance_det_two" name="content_from" placeholder="min%" size="5" onChange="calc_determination()"> - <input type="text" range="tolerance_range" id="new_max_tolerance_det" name="content_to" placeholder="max%" size="5" onChange="calc_determination()"/></td>
                        <td colspan="2" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_min_tolerance_det_two" name="det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled/> - <input type="text" id="range_max_tolerance_det" range="tolerance_range" name="det_max" size="4" placeholder="max%" onChange="calc_determination()" /></td>
                        <td colspan="3" style="color:#0000ff;padding:8px;"><input type="text" range="tolerance_range" id="range_tolerance_comment_two" name="range_tolerance_comment" /></td>
                      </tr>
                      <tr>
                        <td>SD</td>
                        <td style="color:#0000ff;padding:8px;"></td>
                        <td colspan="4" style="color:#ff0000;padding:8px;"></td>
                        <td colspan="4" style="padding:8px;"><input type="text" name="sd_results_two"></td>
                      </tr>
                      <tr>
                        <td>RSD %</td>
                        <td style="color:#0000ff;padding:8px;"></td>
                        <td colspan="4" style="color:#ff0000;padding:8px;"></td>
                        <td colspan="4" style="padding:8px;"><input type="text" name="rsd_comment_two" disable/></td>
                      </tr>
                      <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
                      </tr>
                       <tr>
                        <td colspan="9"  style="color:#0000ff;padding:8px;"></td>
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
                <table border="0"  class="table_form" width="100%" cellpadding="8px" align="center">
                  <tr>    
                    <td style="color:#00CC00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;"><input type="text" id="test_conclusion" name="test_conclusion" class="all_input"></td>
                  </tr>
                </table>
            </tr>
            <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="save_assay_multicomponent" id="save_assay_multicomponent" value="Submit"><input type ="button" class="btn" id="clear_form" name ="" value ="Clear Form"></td>
            </tr>
       </table>
      </form>
      <p id="message"></p>
</div>
</div>
<script>
$(document).ready(function() { 


      $(".std").keyup(function(){
        var text_avg_std = $("#std_average").val();

        $("#d_one_pkstd").val(text_avg_std);$("#d_two_pkstd").val(text_avg_std);$("#d_three_pkstd").val(text_avg_std);   

       }); 
      $(".std_two").keyup(function(){
        var text_avg_std = $("#std_two_average").val();

        $("#d_four_pkstd").val(text_avg_std);$("#d_five_pkstd").val(text_avg_std);$("#d_six_pkstd").val(text_avg_std);   

       }); 

       $(".sample_one").keyup(function(){
        var text_avg_sample_one = $("#sample_a_average").val();
        $("#d_one_pkt").val(text_avg_sample_one);

       }); 

       $(".sample_two").keyup(function(){
        var text_avg_sample_two = $("#sample_b_average").val();  
        $("#d_two_pkt").val(text_avg_sample_two); 
         
       });

       $(".sample_three").keyup(function(){
        var text_avg_sample_three = $("#sample_c_average").val(); 
        $("#d_three_pkt").val(text_avg_sample_three); 
         
        });

       $(".sample_four").keyup(function(){
        var text_avg_sample_four = $("#sample_d_average").val();
        $("#d_four_pkt").val(text_avg_sample_four);

       }); 

       $(".sample_five").keyup(function(){
        var text_avg_sample_five = $("#sample_e_average").val();  
        $("#d_five_pkt").val(text_avg_sample_five); 
         
       });

       $(".sample_six").keyup(function(){
        var text_avg_sample_six = $("#sample_f_average").val(); 
        $("#d_six_pkt").val(text_avg_sample_six); 
         
        });


       $(".potency_one").keyup(function(){
        var text_potency = $("#potency_one").val();
        $("#d_one_potency").val(text_potency); $("#d_two_potency").val(text_potency);$("#d_three_potency").val(text_potency); 
         
        });

        $(".potency_two").keyup(function(){
        var text_potency = $("#potency_two").val();
        $("#d_four_potency").val(text_potency); $("#d_five_potency").val(text_potency);$("#d_six_potency").val(text_potency); 
         
        });

        $("#d_one_lc").change(function(){

        var text_awt = $("#d_one_awt").val();     
            
        var text_wt = $("#d_one_wt").val();     
        var text_lc = $("#d_one_lc").val();     

        $("#d_two_awt").val(text_awt);$("#d_two_wt").val(text_wt);
        $("#d_three_awt").val(text_awt);$("#d_three_wt").val(text_wt);
    
        });

        // $.ajax({
        //   type: "POST",
        //   url: "/process.php",
        //   data: dataString,
        //   success: function() {
        //     $('#reagents_form').html("<div id='message'></div>");
        //     $('#message').html("<h2>Contact Form Submitted!</h2>")
        //     .append("<p>We will be in touch soon.</p>")
        //     .hide()
        //     .fadeIn(1500, function() {
        //       $('#message').append("<img id='checkmark' src='images/check.png' />");
        //     });
        //   }
        // });
        // return false; 
    });
</script>
</body>
</html>
