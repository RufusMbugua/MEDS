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
  <link href="datatables/extensions/Tabletools/css/dataTables.tableTools.css" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url().'jquery-ui.css';?>">
  
  
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script src="<?php echo base_url().'datatables/extensions/Tabletools/js/dataTables.tableTools.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'datatables/extensions/Tabletools/js/ZeroClipboard.js" type="text/javascript';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%",
     "oTableTools": {
                "aButtons": [
                "copy",
                "print",
                {
                    "sExtends": "collection",
                    "sButtonText": 'Save',
                    "aButtons": ["csv", "xls", "pdf"]
                }
                ],
                "sSwfPath": "<?php echo base_url(); ?>datatables/media/swf/copy_csv_xls_pdf.swf"
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
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="current sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="current sub_menu sub_menu_link first_link">Standard Register</a>
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
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="current sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <!-- <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a> -->
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coapresentation/mypresentation';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
        <a href="<?php echo base_url().'finance/index';?>" class="sub_menu sub_menu_link first_link">Finance/Client Billing</a>
    </div>
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
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
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
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
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
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="current sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
  <div id="form_wrapper_lists">
    <div id="account_lists">
        <table  class="subdivider" border="0" bgcolor="#ffffff"  width="100%" cellpadding="8px" align="center">
            <tr>
                <td align ="center">
                <a href="<?php echo base_url().'standard_register_records/Get';?>" class="current sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/equipmentinuse.png';?>" height="20px" width ="20px">Standards in Use</a>
                <a href="<?php echo base_url().'standard_register_records/getExpired';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/withdrawn.png';?>" height="20px" width ="20px">Expired Standards</a>
                <a href="<?php echo base_url().'standard_register_records/getDamaged';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/damaged.png';?>" height="25px" width ="25px">Damaged Standards</a>
                <a href="<?php echo base_url().'standard_register_records/getExhausted';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/empty.png';?>" height="20px" width ="20px">Exhausted Standards</a>
                </td>
                <td align = "right"
                    <?php
                       if($user['logged_in']['user_type'] ==5 ||$user['logged_in']['user_type'] ==7 ){
                        echo "style='padding:4px;display:block;background-color:#ffffff;text-color:#00ff00;'";
                        } else if($user['logged_in']['user_type'] ==8 || $user['logged_in']['user_type'] !=0 || $user['logged_in']['user_type'] ==7 || $user['logged_in']['user_type'] !=1){
                         echo"style='display:none;'";
                       }
                    ?>
                ><a data-target="#primarystandard_form" class="btn" role="button" data-toggle="modal"><img src="<?php echo base_url().'images/icons/add_field.png';?>" height="10px" width="10px">Add Primary Standard</a>
              </td>
            </tr>
        </table>
        <table width="100%">
          <tr>
              <td align="center" colspan ="4"  style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Reference Standard Register Records In Use</h5></td>
            </tr>
        </table>
        <table id="list" class="list_view_header"  width="100%" cellpadding="4px">

            <thead bgcolor="#efefef">
                <tr>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">No.</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Batch/Lot No</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Reference No</th>                    
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Item Description</th>                    
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Standard Type</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Intended Use</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Initial Qty</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Current Qty</th> 
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Progress Bar</th>                  
                    <th style="border-right: dotted 1px #c0c0c0;center" align="center">log</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Edit</th>
                    <th style="border-right: dotted 1px #c0c0c0;" align="center">Vial Card</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
               $progressbar =0;
                foreach($query as $row):
                  $initial_qtty = $row->initial_quantity;
                  $qtty = $row->quantity;
                  
                  if($initial_qtty >0 && $qtty >0){
                    $progressbar = round((($qtty / $initial_qtty) *100));
                    
                  }else{
                    $progressbar = "Null Value";
                  
                  }
                  
                  
                if($i==0){
                  
                  //echo "$progressbar";

                echo"<tr>";
                }
                ?> 
                    <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i;?>.</td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->batch_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->reference_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->item_description;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php if($row->type==0){echo"Primary Standard";}else{echo"Secondary Standard";}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->intended_use;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;" id="initial_quantity"><?php if($row->initial_quantity==0 || $row->initial_quantity==""){echo"Null Value";}else{echo $row->initial_quantity;}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;" id="current_quantity"><?php if($row->quantity==0 || $row->quantity==""){echo"Null Value";}else{echo$row->quantity;}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;" id="progressbar1"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo "$progressbar";?>%"><?php echo "$progressbar";?>%</div></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;">
                      <a href="<?php echo base_url().'standard_register_log/Logs/'.$row->id;?>">Log</a>
                      </td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;">
                        <a href="<?php echo base_url().'update_standard_register_record/Update/'.$row->id;?>">Edit</a>
                      </td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;">
                        <a href="<?php echo base_url().'inventory_standard_vial_card/get/'.$row->id;?>">Vial Card</a>
                    </td>
                <?php
             
                $i++;
                
                ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tr><td></td></tr>
            
        </table>
    </div>
    <div id="primarystandard_form" class="modal fade" role="dialog" aria-labelledby="equipment" aria-hidden="true"><?php include_once "application/views/standard_register_form.php";?></div>
</div>
</body>
<script>
progressbar_val = $('#progress_bar_val').val();
<input type="hidden" id="progress_bar_val" value="<?php echo "$progressbar";?>">
alert
</script>
</html>