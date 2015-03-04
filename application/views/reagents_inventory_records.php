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
  <link href="<?php echo base_url().'datatables/extensions/Tabletools/css/dataTables.tableTools.css';?>" type="text/css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"> -->
  <link rel="stylesheet" href="<?php echo base_url().'style/jquery-ui.css';?>">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  
  <!-- bootstrap reference css library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <!-- Datepicker reference js library -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
 
  
  
  <!-- Tinymce reference js library -->
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  
  <!-- bootstrap reference js library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  
  <!-- custom js reference js library -->
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
 
  <!-- printing reference js library -->
  <script src="<?php echo base_url().'datatables/media/js/jquery.dataTables.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'datatables/extensions/TableTools/js/dataTables.tableTools.js';?>" type="text/javascript"></script>
 <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
      "sScrollY": "100%",
     "sScrollX": "100%",
     "sDom": "T lfrtip",
     "oTableTools": {
      "aButtons": [      
      
      {
        "sExtends": "collection",
        "sButtonText": 'Save',
        "aButtons": ["csv", "xls", "pdf"]
      }
      ],
      "sSwfPath": "<?php echo base_url().'datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf';?>"
    }
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
   <?php 
    echo "<div id='system_nav'";
      if($user['logged_in']['user_type'] !=6 && $user['logged_in']['user_type'] !=8){
       echo"style='display:none'";
      }
      else{
       echo "style='display:block;'>";
      }
     ?>
     <a href="<?php echo base_url().'user_accounts/Get';?>" class="system_nav system_nav_link ">User Accounts</a>
     <a href="<?php echo base_url().'client_list/Get';?>" class="system_nav system_nav_link">Client List</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="current sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <!-- <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a> -->
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coapresentation/mypresentation.pdf';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==7 && $user['logged_in']['department_id'] ==1){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==8){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="current sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <!-- <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a> -->
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coapresentation/mypresentation.pdf';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a></div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==3){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="current sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="current sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
    </div>    
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==4){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
  <div id="form_wrapper_lists">
    <div id="account_lists">
       <table  class="subdivider" border="0" bgcolor="#ffffff" width="100%" cellpadding="8px" align="center">
          <tr>
               <td align="center">
                <a href="<?php echo base_url().'reagents_inventory_record/Get';?>" class="current sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/equipmentinuse.png';?>" height="20px" width ="20px">Reagents In Use</a>
                <a href="<?php echo base_url().'reagents_inventory_record/Expired';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/withdrawn.png';?>" height="20px" width ="20px">Expired Reagents</a>
                <a href="<?php echo base_url().'reagents_inventory_record/Damaged';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/damaged.png';?>" height="25px" width ="25px">Damaged Reagents</a>
                <a href="<?php echo base_url().'reagents_inventory_record/Exhausted';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/empty.png';?>" height="20px" width ="20px">Exhausted Reagents</a>
               </td>
               <td align="right"
                   <?php
                      if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id']==3){
                       echo "style='padding:4px;display:block;background-color:#ffffff;text-color:#00ff00;'";
                       }else{
                        echo"style='display:none;'";
                      }
                   ?>>
                    <a data-target="#reagent_form" class="btn" role="button" data-toggle="modal"><img src="<?php echo base_url().'images/icons/add_field.png';?>" height="10px" width="10px">Add Reagent</a>
               </td>
               
           </tr>        
       </table>
       <table width="100%">
          <tr>
            <td align="center" colspan = "4"style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Reagent Inventory Records</h5></td>
          </tr>
       </table>
       <table id="list" class="list_view_header" width="100%" cellpadding="4px">
            <thead bgcolor="#efefef">
                <tr>
                    <th style="border-right: dotted 1px #ddddff;" align="center"></th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Batch Number</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Certificate Number</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Card No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Description</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">MSDS(Material Saftey Data Sheet)</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Package Size</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Location</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Expiry Date</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Label</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Log</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Edit</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Inventory</th>
                </tr>
            </thead>
            <tbody bgcolor="#efefef">
              
            <?php
            //$limit=7;
            $i=1;
            foreach($query as $row):
              
            if($i==0){
                ?>
                
                <tr>

            <?php 
            }
            ?>
            
                    <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i; ?>.</td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->batch_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->certificate_number;?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->card_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->item_description;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->msds;?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->package_size;?>&nbsp;<?php echo $row->package_units;?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->location;?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->expiry_date;?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;">
                      <a data-target="#<?php echo $row->id;?>" class="btn" role="button" data-toggle="modal"><b>Print Label</b></a>
                      <!-- <a href="<?php echo base_url().'reagents_inventory/print_labels/'.$row->id;?>"><b>Print Label</b></a> -->
                    </td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><a href="<?php echo base_url().'log_reagents/Logs/'.$row->id;?>"><b>Log</b></a></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><a href="<?php echo base_url().'update_reagents_inventory_record/Update/'.$row->id;?>"><b>Edit</b></a></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><a href="<?php echo base_url().'inventory_record/Get/'.$row->id.'/'.$row->item_description;?>"><b>Inventory</b></a></td>
                <?php
            
                $i++;
                
                ?>
                </tr>
                <div id="<?php echo $row->id;?>" class="modal fade" role="dialog" aria-labelledby="print" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h5 class="modal-title" id="meds">Print Labels Form</h5>
                        </div>
                         <?php echo validation_errors(); ?>
                         <?php echo form_open('reagents_inventory_record/print',array('id'=>'print_form'));?>
                        
                        <div class="modal-body">
                         hi there 
                          <label><?php echo $row->batch_number;?></lable><br>
                          <label><?php echo $row->certificate_number;?></lable><br>
                          <label><?php echo $row->card_number;?></lable><br>
                          <label><?php echo $row->item_description;?></lable><br>
                          <label><?php echo $row->msds;?></lable><br>
                          <label><?php echo $row->location;?></label><br>
                          <label><?php echo $row->expiry_date;?><label>
                            
                            <div class="modal-footer">
                             
                            </div>
                             
                         </div>
                      </div>
                    </div>
                </div>
    
    
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div id="reagent_form" class="modal fade" role="dialog" aria-labelledby="equipment" aria-hidden="true"><?php include_once "application/views/reagents_inventory_record_form.php";?></div>  
</div>
</body>
</html>