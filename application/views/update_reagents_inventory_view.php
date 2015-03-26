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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
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
  ?>
  <div id="header"> 
   <div id="logo" style="padding:8px;color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="35px" width="40px"/>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</div>
 
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
         <td height="10px"  style="border-bottom: solid 1px #c4c4ff;padding:8px;background-color: #ffffff;">
          
        </td>
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
        <div id="form">
            <?php echo validation_errors(); ?>
            <form action="<?php echo base_url().'update_reagents_inventory_record/Submit';?>" method="POST" >
            <table class="table_form" width="70%" bgcolor="#e8e8ff" border="0" cellpadding="8px" align="center">
                <input type="hidden" name="my_id" value="<?php echo $query['id']; ?>"/>
                <tr>
                  <td colspan="8" style="padding:8px;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'reagents_inventory_record/Get';?>"><img src="<?php echo base_url().'images/icons/view.png'?>" height="20px" width="20px">Back To Reagents & Inventory Lists</a></td>
               </tr>
               <tr>
                  <td colspan="8" style="padding:8px;text-align:center;">
                    <table class="" width="100%"  cellpadding="8px" align="center" border="0">
                      <tr>
                          <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: Form</b></td>
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
                 <td colspan="4" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">
                  
                 </td>
               </tr>
               <tr>
                    <td colspan="4" style="padding:8px;">
                        <table  width="100%" cellpadding="8px">
                           <tr>
                             <td height="5px" align="left"  style="padding:4px;background-color:#ffffff;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Batch Number</b><span id="batch_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="batch_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                             <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="batch_number" name="batch_number" class="field" value="<?php echo $query['batch_number'];?>"/></td>
                             <td height="5px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Certificate Number</b><span id="certificate_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="certificate_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                             <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="certificate_number" name="certificate_number" value="<?php echo $query['certificate_number'];?>" class="field"/></td>
                           </tr>
                           <tr>
                             <td height="5px" align="left"  style="padding:4px;background-color:#ffffff;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Card Number</b><span id="card_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="card_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                             <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="card_number" name="card_number" class="field" value="<?php echo $query['card_number'];?>"/></td>
                             <td height="5px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Manufacturer/Supplier</b><span id="manufacturer_supplier_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_supplier_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                             <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="manufacturer_supplier" name="manufacturer_supplier" class="field" value="<?php echo $query['manufacturer_supplier'];?>"/></td>
                           </tr>
                           <tr>
                             <td colspan="4" height="5px" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Item Description</b><span id="item_description_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="item_description_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                            <tr/>
                            <tr>
                             <td colspan="4" style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea rows="4" cols="130" id="item_description" name="item_description" class="field"><?php echo $query['item_description'];?></textarea></td>
                            </tr>
                        </table>
                  </td>
               </tr>
                <tr>   
                  <td colspan="2" height="5px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;color:red;"><b style ="color:black;">MSDS (Material Saftey Data Sheet)</b> (Tick as appropriate)<span id="msds_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="msds_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                  <td colspan ="2"style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><?php echo $query['msds'];?></td>
               </tr>
               <tr>
                  <td colspan="4" style="padding:8px;">
                    <table class="inner_table" width="100%" cellpadding="8px">
                      <?php
                        if($query['msds']=='Flammable'){
                      ?>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Flammable" checked> Flammable</td>
                        </tr>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Toxic"> Toxic </td>   
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Non-Toxic"> Non-Toxic</td>          
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value = "Corrosive"> Corrosive</td>          
                       </tr>
                       <?php
                        }else if($query['msds']=='Toxic'){
                       ?>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Flammable"> Flammable</td>
                        </tr>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Toxic" checked> Toxic </td>   
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Non-Toxic"> Non-Toxic</td>          
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value = "Corrosive"> Corrosive</td>          
                       </tr>
                       <?php
                        }else if($query['msds']=='Non-Toxic'){
                       ?>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Flammable"> Flammable</td>
                        </tr>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Toxic"> Toxic </td>   
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Non-Toxic" checked> Non-Toxic</td>          
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value = "Corrosive"> Corrosive</td>          
                       </tr>
                       <?php
                        }else if($query['msds']=='Corrosive'){
                       ?>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Flammable"> Flammable</td>
                        </tr>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Toxic"> Toxic </td>   
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Non-Toxic"> Non-Toxic</td>          
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value = "Corrosive" checked> Corrosive</td>          
                       </tr>
                       <?php
                       }else{
                       ?>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Flammable"> Flammable</td>
                        </tr>
                        <tr>
                            <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Toxic"> Toxic </td>   
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value ="Non-Toxic"> Non-Toxic</td>          
                        </tr>
                        <tr>
                          <td colspan="4"style="padding:4px;"><input type = "checkbox" name="msds[]" value = "Corrosive"> Corrosive</td>          
                       </tr>
                       <?php
                        }
                       ?>
                    </table>
                  </td>
               </tr>
               <tr>
                   <td height="5px"  align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;color:red;"><b style ="color:black;">Location</b>  (Tick as appropriate)<span id="location_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="location_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                   <td colspan ="3"style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><?php echo $query['location'];?></td>   
                </tr>
                <tr>
                    <td colspan="4" style="padding:8px;">
                        <table class="inner_table" width="100%" cellpadding="8px">
                           <?php
                              if($query['location']=='Toxic Store'){
                                ?>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Toxic Store" checked/> Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Non-Toxic Store" /> Non-Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Inflammable Store"/> Inflammable Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Fridge"/> Fridge</td>
                                  </tr>
                              <?php

                              }else if($query['location']=='Non-Toxic Store'){
                                ?>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Toxic Store"/> Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Non-Toxic Store" checked/> Non-Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Inflammable Store"/> Inflammable Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Fridge"/> Fridge</td>
                                  </tr>
                              <?php
                            }else if($query['location']=='Inflammable Store'){
                                ?>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Toxic Store" /> Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Non-Toxic Store" /> Non-Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Inflammable Store" checked/> Inflammable Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Fridge"/> Fridge</td>
                                  </tr>
                              <?php
                              }else if($query['location']=='Fridge'){
                                ?>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Toxic Store" /> Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Non-Toxic Store" /> Non-Toxic Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Inflammable Store"/> Inflammable Store</td>
                                  </tr>
                                  <tr>
                                      <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Fridge" checked/> Fridge</td>
                                  </tr>
                              <?php
                              }else{
                              ?>
                              <tr>
                                 <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Toxic Store" /> Toxic Store</td>
                              </tr>
                              <tr>
                                  <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Non-Toxic Store" /> Non-Toxic Store</td>
                              </tr>
                              <tr>
                                  <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Inflammable Store"/> Inflammable Store</td>
                              </tr>
                              <tr>
                                  <td colspan="2" style="padding:4px;"><input type="radio" name="location" value="Fridge"/> Fridge</td>
                              </tr>
                              <?php
                                }
                              ?>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4" style="padding:8px;">
                        <table  width="100%" cellpadding="8px">
                             <tr>
                               <td height="5px" align="left" style="padding:4px;border-top: dotted 1px #bfbfbf;border-left: dotted 1px #bfbfbf;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Package Size</b><span id="package_size_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="package_size_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                               <td style="padding:4px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" id="package_size" name="package_size" class="field" value="<?php echo $query['package_size'];?>"/>
                                  <select  type="text" name="package_units" >
                                      <option><?php echo $query['package_units'];?></option>
                                      <option value = "Kgs"> Kgs</option>
                                      <option value = "Grams"> Grams</option>
                                      <option value = "Litres"> Litres</option>
                                      <option value = "Mls"> Mls</option>
                                  </select>
                                </td>
                                <td height="5px" align="left" style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Re-order Quantity</b><span id="reorder_quantity_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="reorder_quantity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span>
                                <input type="text" id="reorder_quantity" name="reorder_quantity" class="field" value="<?php echo $query['reorder_quantity'];?>"/>

                                  <select type="text" name="reorder_units" >
                                      <option><?php echo $query['reorder_units'];?></option>
                                      <option value = "Kgs"> Kgs</option>
                                      <option value = "Grams"> Grams</option>
                                      <option value = "Litres"> Litres</option>
                                      <option value = "Mls"> Mls</option>
                                  </select>
                              </td>           
                           </tr>
                           <tr>
                               <td height="5px"  align="left" style="padding:4px;background-color:#ffffff;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Expiry Date</b><span id="expiry_date_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="expiry_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                               <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="datepicker" id="expiry_date" name="expiry_date" class="field" value="<?php echo $query['expiry_date'];?>"/></td>
                               <td colspan ="2"style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Quantity</b> <input type ="text" name="quantity" value ="<?php echo $query['quantity'];?>"></td>
                           </tr>
                           <tr>
                               <td colspan="4" height="5px" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Comments</b><span id="comments_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
                           </tr>
                           <tr>
                               <td colspan="4" style="padding:4px;text-align:left;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea  rows="4" cols="130" id="comments" name="comments" class="field"/><?php echo $query['comments'];?></textarea></td>
                           </tr>
                        </table>
                     </td>
                 </tr>
                 <tr>
                     <td colspan="4" style="padding:4px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;"><input id="submit" type="submit" class="btn" name="submit" value="Submit"></td>
                 </tr>
            </table>
        </div>
      </div>
 </body>
</html>