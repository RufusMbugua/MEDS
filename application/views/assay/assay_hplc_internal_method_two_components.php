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
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/calculations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script>
  $(document).ready(function(){

    $('#clear_form').hide();

    //function to prevent submitting the form when enter button is pressed.
    $('form input').keydown(function (e){
      if (e.keyCode == 13) {
          var inputs = $(this).parents("form").eq(0).find(":input");
          if (inputs[inputs.index(this) + 1] != null) {                    
              inputs[inputs.index(this) + 1].focus();
          }
          e.preventDefault();
          return false;
      }
    });

    //function to post data when submit link is pressed
    $('#save_assay_internal_multi').click(function(){ 
     $('#save_assay_internal_multi').hide();

        post_ajax();
    });
  function post_ajax(){
  //post via ajax
  form_data = $('#assay_internal_method_multi_form').serialize();
  console.log(form_data);

   if ( $('#test_conclusion').val()=="" ||  $('#component_name').val()=="") {
      alert('Please fill all the neccesary fields')
    }else{ 

      $.ajax({
            url:"<?php echo base_url();?>assay/save_hplc_internal_method_multicomponents",
            type:"POST",
            dataType:'json',
            async:true,
            data:form_data,

            success: function(j){

                $("#component_name option:selected").attr('disabled','disabled')
                var a = $('#assignment').val();
                var t = $('#test_request').val();
                
                //Gets length of Component Selection to determine how many components are being tested
                var total_components = $("#component_name").find('option').length;
                //Gets length of Tested Components in dropdown Selection to determine how many components have been already tested
                var components_tested = $("#component_name").find('option[disabled = "disabled"]').length;
                
                //Gives remaining components not done
                var remaining_components= (total_components-components_tested);

                if (remaining_components==1) {
                //redirect location when all components are selected
                  window.location.href = "<?php echo base_url();?>test/index/"+a+"/"+t;

                }

                alert('Successful! Please ensure that all components are selected.');
                $('#clear_form').show(); 
            },
            error:function(){
              alert('An error occured')
            }
          });
    }
  }
  $('#clear_form').click(function(){
    $('#save_normal_hplc').show();
    $('.all_input').val('');
    $('#peak_areas :input').val('');
    $('#determinations :input').val('');
    $('#suitability :input').val('');

    //var tinymce_editor_id = $('._text_areas'); 
    //tinymce.get(tinymce_editor_id).setContent('');
  });  
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
      <form method="post" id="assay_internal_method_multi_form">
       <table width="70%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" id="test_request" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" id="assignment" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>    
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'].'/';?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table class="table_form" border="0" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
              <tr>    
                  <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">ANALYTICAL WORKSHEET</td>
                  <td colspan="4" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['active_ingredients']." "." ".$query['test_specification'];?><input type="hidden" name="test_specification" value="<?php echo $query['test_specification'];?>"></td>
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
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NUMBER.</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $monograph[0]['serial_number']?></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">BATCH/LOT NUMBER.</td>
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
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>HPLC Internal Method Multicomponents</h5></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Balance Details</b></td>
          </tr>
          <tr>
              <td align="left"colspan ="2" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Components:</b></td>
              <td align="left"colspan = "6" style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">          
                <select id="component_name" name="component_z_name" >
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
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Sample taken (g)</b></td>
            </tr>
            
            <tr>
              <td colspan="8">
                <table border="0" class="inner_table" width="80%" cellpadding="8px" align="center">
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
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_one" name="weight_container_one" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_two" name="weight_container_two" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_container_three" name="weight_container_three" onChange="calculate_difference()" size="10"></td>
                  </tr>
                  <tr>
                      <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      Weight of Sample(g)</td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_one" name="weight_sample_one" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_two" name="weight_sample_two" onChange="calculate_difference()" size="10"></td>
                      <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <input type="text" id="weight_sample_three" name="weight_sample_three" onChange="calculate_difference()" size="10"></td
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Sample Dilution Preparation: </td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><textarea rows="5" cols="160" name="sample_dilution_preparation"></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">Sample Dilution Calculation </td>
                  </tr>
                  <tr>
                    <td colspan="7"  align="center" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
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
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;color:#000;">Preparation:</td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;">
                <table border="0" class="inner_table" width="85%" cellpadding="8px" align="center">
                  <tr>
                    <td>
                      <textarea name="weight_of_standard_preparation" cols="160" rows="8"></textarea>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="8"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Weight of Standard</b></td>
            </tr>
          <tr>
            <td colspan="8" style="padding:8px;border-bottom:dotted 1px #c4c4ff;">
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
                    <td colspan="3" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="standard_description_one" name="standard_description_one" >
                      <option selected></option>
                       <?php
                       foreach($sql_standards as $s_name):
                      ?>
                       
                       <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
                        <?php
                        endforeach
                        ?>
                      </select>
                    </td>
                    
                </tr>
                 <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Lot Number</td>
                    <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdlotnumber" name="std_lot_number" value=""></td>
                   
                </tr>
                <tr>
                    <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    ID Number</td>
                    <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" id="stdrefnumber" name="std_id_number" value=""></td>
                   
                </tr>
                <tr>
                  <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  Potency</td>
                  <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  <input type="text" id="potency_one" name="potency_one"></td>
               </tr>
               <tr>
                  <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  Molecular Weight Base</td>
                  <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  <input type="text" id="higher_factor" name="higher_factor" class="standard_dilution_base"></td>
                </tr>
                <tr>
                  <td align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  Molecular Weight Salt</td>
                  <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                  <input type="text" id="lower_factor" name="lower_factor" class="standard_dilution_base"></td>  
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard + container(g)</td>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_container_one" id="weight_standard_container_one" class="standard_difference"></td>
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of container(g)</td>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_of_std_one" id="container_one" class="standard_difference"></td>
                </tr>
                <tr>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Weight of standard(g)</td>
                    <td colspan="3" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_standard_one" id="weight_standard_one" class="standard_difference"></td>
                </tr>
                <tr>
                  <td colspan="4" height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;">Standard Dilution Preparation:</td>
                </tr>
                <tr>
                  <td colspan="4" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="standard_dilution_preparation" row="8" cols="40"></textarea></td>
                </tr>
                <tr>
                    <td colspan="4"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Dilution Calculation</td>
                </tr>
                 <tr>
                    <td colspan="2"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="salt" id="salt" >If the <b>Sample</b> is already a <b>Salt</b> (Please check the box)</td>
                    <td colspan="2"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="base" id="base" >If the <b>Sample</b> is a base and needs conversion to a <b>Base</b> (please check the box)</td>
                </tr>
                <tr>
                  <td colspan="4" style="padding:8px;">
                    <table id="salt_calc" width="100%" cellpadding="4px" align="center">
                      <tr>
                        <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_e" name="value_e" size="10" class="standard_dilution" placeholder="WSTD"> X <input type="text" id="value_f" name="value_f" value="1000" size="10" class="standard_dilution"></td>
                        <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = <input type="text" id="value_h" name="standard_dilution_calculation" size="10" class="value_h "></td>
                        <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_g" name="value_g" size="10" placeholder="Diluting Volume" class="standard_dilution"> </td>
                        <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" style="padding:8px;">
                    <table id="base_calc" width="100%" align="center" cellpadding="4px">
                      <tr>
                        <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_r" name="value_r" size="10" class="standard_dilution_base" placeholder="WSTD"> X <input type="text" id="value_t" name="value_t" size="10" value="1000" class="standard_dilution_base"></td>
                        <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = ( <input type="text" id="value_u" name="standard_dilution_calculation" size="10" class="value_u "> ) * { <input type="text" id="value_x" name="value_x" size="10" class="higher " placeholder="Higher Factor"> / <input type="text" id="value_z" name="value_z" size="10" class="lower " placeholder="lower Factor"> } = <input type="text" id="value_wstd" name="value_wstd" size="10" class="wstd_converted "></td>
                        <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_y" name="value_y" size="10" placeholder="Diluting Volume" class="standard_dilution_base"> </td>
                        <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Chromatographic System</b></td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;">
                <table class="inner_table" width="90%" align="center" cellpadding="8px">
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
              <table class="inner_table" width="80%" border="0" align="center" cellpadding="8px"> 
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Reagent Description:</td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Reagent + Container (mlg)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Container(mlg)</td>
                    <td height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    Reagent (mlg)</td>
                </tr>
                <tr>
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_one" id="weight_reagent_container_one" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_one_reagent" id="weight_container_one_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_one" id="weight_reagent_one" size="10">
                    </td>
                    
                </tr>
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="reagent_description_two" name="reagent_description_two" >
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_two" id="weight_reagent_container_two" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_two_reagent" id="weight_container_two_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_two" id="weight_reagent_two" size="10">
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="reagent_description_three" name="reagent_description_three" >
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_three" id="weight_reagent_container_three" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_three_reagent" id="weight_container_one_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_three" id="weight_reagent_three" size="10">
                    </td>
                    
                </tr>
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="reagent_description_four" name="reagent_description_four" >
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_four" id="weight_reagent_container_four" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_four_reagent" id="weight_container_four_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_four" id="weight_reagent_four" size="10">
                    </td>
                    
                </tr>
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="reagent_description_five" name="reagent_description_five" >
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_five" id="weight_reagent_container_five" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_five_reagent" id="weight_container_five_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_five" id="weight_reagent_five" size="10">
                    </td>
                    
                </tr>
                <tr>
                    <td align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                      <select id="reagent_description_six" name="reagent_description_six" >
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
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_container_six" id="weight_reagent_container_six" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_container_six_reagent" id="weight_container_six_reagent" size="10">
                    </td>
                    <td  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
                    <input type="text" name="weight_reagent_six" id="weight_reagent_six" size="10">
                    </td>
                    
                </tr>
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
                        <textarea cols="160" rows="8" type="text" name="mobile_phase_preparation"></textarea>
                      </td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>The Chromatographic System-Suitability requirements</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;">From Chromatograms</td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table class="inner_table" border="0" widt="80%" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>No.</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Retention time (minutes)</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Peak Area</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Asymmetry</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Resolution</b></td>
                      <td style="text-align:center;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Relative retention time</b></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" id="retention_time_one" name="retention_time_one"></input></td>
                      <td><input type="text" id="peak_area_one" name="peak_area_one"></input></td>
                      <td><input type="text" id="asymmetry_one" name="asymmetry_one"></input></td>
                      <td><input type="text" id="resolution_one" name="resolution_one"></input></td>
                      <td><input type="text" id="relative_retention_time_one" name="relative_retention_time_one"></input></td> 
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" id="retention_time_two" name="retention_time_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_two" name="peak_area_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_two" name="asymmetry_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_two" name="resolution_two" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="relative_retention_time_two" name="relative_retention_time_two" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" id="retention_time_three" name="retention_time_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_three" name="peak_area_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_three" name="asymmetry_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_three" name="resolution_three" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="relative_retention_time_three" name="relative_retention_time_three" onChange="calculator_average()"></input></td> 
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" id="retention_time_four" name="retention_time_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_four" name="peak_area_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_four" name="asymmetry_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_four" name="resolution_four" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="relative_retention_time_four" name="relative_retention_time_four" onChange="calculator_average()"></input></td>                     </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" id="retention_time_five" name="retention_time_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_five" name="peak_area_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_five" name="asymmetry_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_five" name="resolution_five" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="relative_retention_time_five" name="relative_retention_time_five" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">6.</td>
                      <td><input type="text" id="retention_time_six" name="retention_time_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="peak_area_six" name="peak_area_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="asymmetry_six" name="asymmetry_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="resolution_six" name="resolution_six" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="relative_retention_time_six" name="relative_retention_time_six" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text" id="average_retention_time" name="average_retention_time" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="average_peak_area" name="average_peak_area" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="average_asymmetry" name="average_asymmetry" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="average_resolution" name="average_resolution" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="average_relative_retention_time" name="average_relative_retention_time" onChange="calculator_average()"></input></td> 
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">SD</td>
                      <td><input type="text" id="standard_dev_retention_time" name="standard_dev_retention_time" onChange="calculator_average()" ></input></td>
                      <td><input type="text" id="standard_dev_peak_area" name="standard_dev_peak_area" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="standard_dev_asymmetry" name="standard_dev_asymmetry" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="standard_dev_resolution" name="standard_dev_resolution" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="standard_dev_relative_retention_time" name="standard_dev_relative_retention_time" onChange=""></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">RSD</td>
                      <td><input type="text" id="rsd_retention_time" name="rsd_retention_time" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="rsd_peak_area" name="rsd_peak_area" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="rsd_asymmetry" name="rsd_asymmetry" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="rsd_resolution" name="rsd_resolution" onChange="calculator_average()"></input></td>
                      <td><input type="text" id="rsd_relative_retention_time" name="rsd_relative_retention_time" onChange="calculator_average()"></input></td>
                    </tr>
                    <tr>
                      <td style="padding:4px;border-bottom:solid 1px #c4c4ff;">Acceptance Criteria</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NMT 2.0%</td>
                      <td style="padding:4px;text-align:center;">NLT 5.0%</td>
                      <td style="padding:4px;text-align:center;">95% to 105%</td>
                    </tr>
                    <tr>
                      <td style="border-bottom:solid 1px #c4c4ff;">Comment</td>
                      <td><input type="text" id="comment_retention_time" name="comment_retention_time"></input></td>
                      <td><input type="text" id="comment_peak_area" name="comment_peak_area"></input></td>
                      <td><input type="text" id="comment_asymmetry" name="comment_asymmetry"></input></td>
                      <td><input type="text" id="comment_resolution" name="comment_resolution"></input></td>
                      <td><input type="text" id="comment_relative_retention_time" name="comment_relative_retention_time"></input></td>
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
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Mobile Phase Flow Rate (mls/min)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_mp_flow_rate"></input></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Detection Wavelength (nm)</td>
                    <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="text" name="column_detection_wavelength"></input></td>
                  </tr>
                </table>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #000;background-color: #ffffff;"><b>Calculations</b></td>
            </tr>
            <tr>
              <td colspan="8" height="25px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000ff;background-color: #ffffff;"><b>Peak Area From Chromatograms Component One<b/></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <div class="scroll">
                  <table border="0" class="inner_table" cellpadding="8px" align="center">
                    <tr>
                      <td style="text-align:center;padding:8px;"></td>
                      <td style="text-align:center;padding:8px;">Std 1</td>
                      <td style="text-align:center;padding:8px;">Sample 1</td>
                      <td style="text-align:center;padding:8px;">Sample 2</td>
                      <td style="text-align:center;padding:8px;">Sample 3</td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">1.</td>
                      <td><input type="text" class="std" name="std_one" id="std_one" size="10"></td>
                      <td><input type="text" class="sample_one" name="sample_a_one" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_one" name="sample_b_one" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_one" name="sample_c_one" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">2.</td>
                      <td><input type="text" class="std" id="std_two" name="std_two" size="10"></td>
                      <td><input type="text" class="sample_one" name="sample_a_two" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_two" name="sample_b_two" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_two" name="sample_c_two" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">3.</td>
                      <td><input type="text" class="std" id="std_three" name="std_three" size="10"></td>
                      <td><input type="text" class="sample_one" name="sample_a_three" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_three" name="sample_b_three" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_three" name="sample_c_three" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">4.</td>
                      <td><input type="text" class="std" id="std_four" name="std_four" size="10"></td>
                      <td><input type="text" class="sample_one"  name="sample_a_four" onChange=" " size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_four" name="sample_b_four" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_four" name="sample_c_four" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">5.</td>
                      <td><input type="text" class="std" id="std_five" name="std_five" size="10"></td>
                      <td><input type="text" class="sample_one"  name="sample_a_five" size="10"></td>
                      <td><input type="text" class="sample_two" id="sample_b_five" name="sample_d_five" size="10"></td>
                      <td><input type="text" class="sample_three" id="sample_c_five" name="sample_c_five" size="10"></td>
                    </tr>
                    <tr>
                      <td style="text-align:center;border-bottom:solid 1px #c4c4ff;">Average</td>
                      <td><input type="text"  class="std_average" id="std_average" name="std_average" size="10" disabled></td>
                      <td><input type="text"  class="sample_one_average" name="sample_a_average" size="10" disabled></td>
                      <td><input type="text"  class="sample_two_average" id="sample_b_average" name="sample_b_average" size="10" disabled></td>
                      <td><input type="text"  class="sample_three_average" id="sample_c_average" name="sample_c_average" size="10" disabled></td>
                    </tr>

                  </table>
                </div>
                </td>
            </tr>
            <tr>
              <td colspan="8" styel"padding:8px;">
                <table width="50%" align="center">
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
                        <td  colspan="3" style="padding:8px;border-bottom:solid 1px #c4c4ff;"><input type="text" id="rpk" name="rpk" class="relative_retention_time"> x 100</td>
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
                </table>
              </td>
            </tr>
            
            <tr>
              <td  colspan="8" style="color:#0000ff;padding:8px;border-bottom:dotted 1px #c4c4ff;"><b>Calculation of Determinations Component One</b></td>
            </tr>
             <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">PK AREA RATIO OF SAMPLE x WEIGHT OF STANDARD IN FINAL DILUTION x AVERAGE WT x 100 x DILUTION FACTO X POTENCY =</td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;">%LC</td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:#0000ff;text-align:center;">(PEAK AREA RATIO OF STANDARD x WT TAKEN x LABEL CLAIM</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;border-bottom:solid 1pf #c4c4ff;">
                  <table border="0" cellpadding="8px" align="center">
                    <tr>
                      <td style="color:#0000ff;text-align:center;padding:8px;">Sample Dilution Factor <input type="text" id="determination_dilution_result" name="determination_dilution_result" size="5" class="value_d" disabled></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8" align="center">
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 1</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_one_pkt" name="d_one_pkt" placeholder="(PKT)" size="5" > x <input type="text"  id="d_one_wstd" name="d_one_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_one_awt" name="d_one_awt" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/> x 100 x <input type="text" id="d_one_df" name="d_one_df" placeholder="(DF)" size="5" onChange="calc_determination()"> x <input type="text" id="d_one_potency" name="d_one_potency" placeholder="(P)" size="5" disabled/></td>
                      <td style="padding:8px;">=<input type="text" id="d_one_p_lc" name="d_one_p_lc" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_one_pkstd" name="d_one_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_one_wt" name="d_one_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_one_lc" name="d_one_lc" onchange="calc_determination" value="" placeholder="(LC)" size="5"></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 2</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_two_pkt" name="d_two_pkt"  placeholder="(PKT)" size="5"  disabled/> x <input type="text" id="d_two_wstd" name="d_two_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_two_awt" name="d_two_awt" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/> x 100 x <input type="text" id="d_two_df" name="d_two_df" placeholder="(DF)" size="5" onChange="calc_determination()"/> x <input type="text" id="d_two_potency" name="d_two_potency" placeholder="(P)" size="5" disabled></td>
                      <td style="padding:8px;">=<input type="text" id="d_two_p_lc" name="d_two_p_lc"  placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_two_pkstd" name="d_two_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_two_wt" name="d_two_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_two_lc" name="d_two_lc" value="" onchange="calc_determination" placeholder="(LC)" size="5"/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;color:#0000ff;text-align:left;border-bottom:solid 1px #c4c4ff;">Determination 3</td>
                    </tr>
                    <tr>
                      <td style="padding:8px;border-bottom:dotted 1px #c4c4ff; text-align:center;"><input type="text" id="d_three_pkt" name="d_three_pkt" placeholder="(PKT)" size="5"  disabled/> x <input type="text" id="d_three_wstd" name="d_three_wstd" placeholder="(WSTD)" size="5"/> x <input type="text" id="d_three_awt" name="d_three_awt" placeholder="(AWT)" value="<?php if(empty($uniformity_of_dosage)){}else{echo $uniformity_of_dosage[0]['average'];}?>" size="5"/> x 100 x <input type="text" id="d_three_df" name="d_three_df" placeholder="(DF)" size="5" onChange="calc_determination()"/> x <input type="text" id="d_three_potency" name="d_three_potency" placeholder="(P)" size="5" disabled/></td>
                      <td style="padding:8px;">=<input type="text" id="d_three_p_lc" name="d_three_p_lc" placeholder="(%LC)" size="10" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="2" style="padding:8px;text-align:center;"><input type="text" id="d_three_pkstd" name="d_three_pkstd" placeholder="(PKSTD)" size="5" disabled> x <input type="text" id="d_three_wt" name="d_three_wt" placeholder="(WT)" size="5" disabled> x <input type="text" id="d_three_lc" name="d_three_lc" value="" onchange="calc_determination" placeholder="(LC)" size="5"/></td>
                    </tr>
                    <tr>
                      <td colspan="3" style="padding:8px;">Average % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_average" name="determination_average"  disabled></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">Equivalent To &nbsp;<input type="hidden" id="equivalent_to_lc"/><input type="text" id="determination_equivalent_to" name="determination_equivalent_to" disabled/></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">Range %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="det_min" name="range_det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled> - <input type="text" id="det_max" name="range_det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">SD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_sd" name="determination_sd" disabled></td>
                    </tr>
                    <tr>
                      <td colspan="6" style="padding:8px;">RSD %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="determination_rsd" name="determination_rsd" onChange="calculator()" disabled></input></td>
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" width="80%" cellpadding="8px" align="center">
                    <tr>
                      <td colspan="2" style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Acceptance Criteria</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Results</b></td>
                      <td style="color:#0000ff;padding:8px;border-bottom:solid 1px #c4c4ff;"><b>Comment</b></td>
                    </tr>
                    <tr>
                      <td>Tolerance Range</td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="det_min" name="range_det_min" size="4" placeholder="min%" onChange="calc_determination()" disabled> - <input type="text" id="det_max" name="range_det_max" size="4" placeholder="max%" onChange="calc_determination()" disabled></td>
                      <td style="color:#0000ff;padding:8px;"><input type="text" id="determination_average" name="determination_average" class="determination_average" disabled></td>
                      <td style="color:#0000ff;padding:8px;">
                      <select name="range_tolerance_comment" id="range_tolerance_comment">
                        <option></option>
                        <option value="Okay">Okay</option>
                        <option value="Not Okay">Not Okay</option>
                      </select>
                     </td>
                    </tr>
                    <tr>
                      <td>SD</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_sd" name="determination_sd"  disabled/></td>
                      <td style="padding:8px;"><input type="text" name="sd_results"></td>
                    </tr>
                    <tr>
                      <td>RSD %</td>
                      <td style="color:#0000ff;padding:8px;"></td>
                      <td style="color:#ff0000;padding:8px;"><input type="text" id="results_determination_rsd" name="determination_rsd"  disabled/></td>
                      <td style="padding:8px;"><input type="text" name="rsd_comment"/></td>
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
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="sysytem_suitability_sequence" value="Sysytem Suitability Sequence"></td>
                      <td style="color:#000;padding:8px;">
                        <select name="sysytem_suitability_sequence_comment">
                            <option></option>
                            <option value="Done">DONE</option>
                            <option value="NOT DONE">NOT DONE</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Sample Injection sequence</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="sample_injection_sequence" value="Sample Injection Sequence"></td>
                      <td style="color:#000;padding:8px;">
                        <select name="Sample_injection_sequence_comment">
                            <option></option>
                            <option value="Done">DONE</option>
                            <option value="NOT DONE">NOT DONE</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="color:#000;padding:8px;">Chromatograms Data Used</td>
                      <td style="color:#000;padding:8px;"><input type="checkbox" name="chromatograms_attached" value="Chromatograms Attached"></td>
                      <td style="color:#000;padding:8px;">
                        <select name="chromatograms_attached_comment">
                            <option></option>
                            <option value="Done">DONE</option>
                            <option value="NOT DONE">NOT DONE</option>
                        </select>
                      </td>
                    </tr>
                     <tr>
                      <td style="color:#000;padding:8px;">Method Used</td>
                      <td style="color:#000;padding:8px;"></td>
                      <td colspan="2" style="color:#000;padding:8px;"><input type="text" id="method" name="method" placeholder="eg. BP 2013"></td>
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
                    <td style="color:#00CC00;border-bottom:dottted 1px #c4c4ff;padding:8px;text-align:center;">
                        <select type="text" id="test_conclusion" name="test_conclusion" class="field"><span id="test_conclusion_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="test_conclusion_r" style="color:red; display:none">Fill this</span>
                        <option></option>
                        <option value="COMPLIES"> COMPLIES</option>
                        <option value="DOSE NOT COMPLy">DOES NOT COMPLY</option>
                      </select>
                    </td>
                  </tr>
                </table>
            </tr>
            <tr>
              <td colspan = "8" align ="center"> <a class="btn" name ="save_assay_internal_multi" id="save_assay_internal_multi">Submit</a>
              <input type ="button" class="btn" id="clear_form" name ="" value ="Clear Form"></td>        
            </tr>
            
<!--             <tr>
              <td colspan="8" style="padding:8px;">
                <table  class="table_form"border="0" width="100%" cellpadding="8px" align="center">
                  <tr>
                    <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:left;">Done By <input type="hidden" id="done_by" name="done_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
                    <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date Conducted <input type="hidden"  id="date" name="date_done" value="<?php echo date("d/m/Y")?>"><?php echo date("d/M/Y")?></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:left;">Approved By <input type="text" id="supervisor" name="supervisor"></td>
                    <td style="border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date Approved <input type="text"  id="datepicker" name="date_appproved"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:4px;">Further Comments:</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:4px;text-align:center;"><textarea cols="140" rows="5" name="further_comments"></textarea></td>
                  </tr>
                </table>
              </td>
            </tr> -->
            
            <!-- <tr>
                <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="submit" id="submit" value="Submit"></td>
            </tr> -->
       </table>
      </form>
</div>
</div>
</body>
<script>
$(document).ready(function() {
        
      $(".std").keyup(function(){
        var text_avg_std = $("#std_average").val();

        $("#d_one_pkstd").val(text_avg_std);$("#d_two_pkstd").val(text_avg_std);$("#d_three_pkstd").val(text_avg_std);   

        }); 

       

       $("#potency_one").keyup(function(){
        var text_potency = $("#potency_one").val();
        $("#d_one_potency").val(text_potency); $("#d_two_potency").val(text_potency);$("#d_three_potency").val(text_potency); 
         
        });

        $(".standard_dilution").keyup(function(){
        var wstd = $("#value_h").val();
        $("#d_one_wstd").val(wstd); $("#d_two_wstd").val(wstd);$("#d_three_wstd").val(wstd); 
         
        });

        $("#factor").change(function(){
        var text_df = $("#d_factor").val();    

        $("#d_one_df").val(text_df);$("#d_two_df").val(text_df); $("#d_three_df").val(text_df);
        }); 

        $("#d_one_lc").change(function(){

        var text_wstd = $("#d_one_wstd").val();
        var text_awt = $("#d_one_awt").val();     
            
        var text_wt = $("#d_one_wt").val();     
        var text_lc = $("#d_one_lc").val();     

        $("#d_two_wstd").val(text_wstd);$("#d_two_awt").val(text_awt);$("#d_two_wt").val(text_wt);$("#d_two_lc").val(text_lc);$("#equivalent_to_lc").val(text_lc);
        $("#d_three_wstd").val(text_wstd);$("#d_three_awt").val(text_awt);$("#d_three_wt").val(text_wt);$("#d_three_lc").val(text_lc);
        }); 
    });
</script>
<script>
$(document).ready(function(){
    $("#d_one_lc").change(function()       {
    var text_wstd = $("#d_one_wstd").val();
    var text_awt = $("#d_one_awt").val();     
    var text_df = $("#d_one_df").val();     
    var text_potency = $("#d_one_potency").val();
    var text_pkstd = $("#d_one_pkstd").val();
    var text_wt = $("#d_one_wt").val();     
    var text_lc = $("#d_one_lc").val();     


    $("#d_two_wstd").val(text_wstd);$("#d_two_awt").val(text_awt); $("#d_two_df").val(text_df); $("#d_two_potency").val(text_potency);$("#d_two_pkstd").val(text_pkstd);$("#d_two_wt").val(text_wt);$("#d_two_lc").val(text_lc);$("#equivalent_to_lc").val(text_lc);
    $("#d_three_wstd").val(text_wstd);$("#d_three_awt").val(text_awt); $("#d_three_df").val(text_df); $("#d_three_potency").val(text_potency);$("#d_three_pkstd").val(text_pkstd);$("#d_three_wt").val(text_wt);$("#d_three_lc").val(text_lc);
    $("#d_four_wstd").val(text_wstd);$("#d_four_awt").val(text_awt); $("#d_four_df").val(text_df); $("#d_four_potency").val(text_potency);$("#d_four_pkstd").val(text_pkstd);$("#d_four_wt").val(text_wt);$("#d_four_lc").val(text_lc);
    $("#d_five_wstd").val(text_wstd);$("#d_five_awt").val(text_awt); $("#d_five_df").val(text_df); $("#d_five_potency").val(text_potency);$("#d_five_pkstd").val(text_pkstd);$("#d_five_wt").val(text_wt);$("#d_five_lc").val(text_lc);
    $("#d_six_wstd").val(text_wstd);$("#d_six_awt").val(text_awt); $("#d_six_df").val(text_df); $("#d_six_potency").val(text_potency);$("#d_six_pkstd").val(text_pkstd);$("#d_six_wt").val(text_wt);$("#d_six_lc").val(text_lc);
        }); 
});
</script>
<script>
  $('#base').change(function() {
    if($('#base').is(':checked')){
       $("table[id='base_calc']").show();
       $("#salt").prop('disabled', true);

    } else {
        $("table[id='base_calc']").hide();
        $("#salt").prop('disabled', false);
    }
  }).change();

  $('#salt').change(function() {
    if($('#salt').is(':checked')){
       $("table[id='salt_calc']").show();
       $("#base").prop('disabled', true);

    } else {
        $("table[id='salt_calc']").hide();
        $("#base").prop('disabled', false);
    }
  }).change();
  $('#min').change(function() {
    if($('#min').is(':checked')){
       $("input[min='min_tolerance']").show();
    } else {
        $("input[min='min_tolerance']").hide();
    }
  }).change();
  $('#max').change(function() {
    if($('#max').is(':checked')){
       $("input[max='max_tolerance']").show();
    } else {
        $("input[max='max_tolerance']").hide();
    }
  }).change();
  $('#range').change(function() {
    if($('#range').is(':checked')){
       $("input[range='tolerance_range']").show();
    } else {
        $("input[range='tolerance_range']").hide();
    }
  }).change();
</script>
</html>
