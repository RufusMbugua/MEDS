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
  
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  
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
   <?php include_once('application/views/header_links.php') ?>
  <div id="form_wrapper_lists">
    <div id="account_lists" style="display: block;" name="menu">

      <table  class="subdivider" border="0" bgcolor="#ffffff"  width="100%" cellpadding="8px" align="center">
          
          <tr>
             <td align ="right">
                  <a href="<?php echo base_url().'equipment_maintenance_records/get';?>" class="current sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/equipmentinuse.png';?>" height="20px" width ="20px">Equipment In Use</a>
                  <a href="<?php echo base_url().'equipment_maintenance_records/get_damaged';?>" class=" sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/withdrawn.png';?>" height="20px" width ="20px">Withdrawn/Damaged Equipment</a>
                  <a href="<?php echo base_url().'equipment_maintenance_records/get_scheduled_maintenance_calibration';?>" class="sub_menu sub_menu_link first_link"><img src="<?php echo base_url().'images/icons/maintenance.png';?>" height="20px" width ="20px">Equipment Scheduled for Maintenance/Calibration</a>
              </td>
              <td align="right"<?php
                  if($user['logged_in']['user_type'] ==6 || $user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2 ){
                   echo "style='padding:8px;display:block;background-color:#ffffff;text-color:#00ff00;'";
                   } else{
                    echo"style='display:none;'";
                  }
               ?>>
             <a data-target="#equipment_form" class="btn" role="button" data-toggle="modal"><img src="<?php echo base_url().'images/icons/add_field.png'?>" height="10px" width="10px">Add Equipment</a>
             <a href="<?php echo base_url().'columns/Get';?>"><img src="<?php echo base_url().'images/icons/view.png'?>" height="25px" width="25px">Columns</a>
             <a href="<?php echo base_url().'equipment_report/index';?>"><img src="<?php echo base_url().'images/icons/reports.png';?>" height="25px" width ="25px">Reports</a>
             </td>
          </tr>
      </table>
       <table width="100%">
          <tr>
            <td colspan="2" align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Equipment Records Scheduled for Maintenance/Calibration</h5></td>
          </tr>
      </table>
        <table id="list" class="list_view_header" width="100%"  border='0'cellpadding="4px">
            <thead bgcolor="#efefef">
               <tr>
                    <th style="border-right: dotted 1px #ddddff;" align="center"></th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Id Number</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Description</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Manufacturer</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Serial No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Model</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Comments</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Date</th>
                    <th
                    <?php
                     if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==3){
                       echo "  style='text-align:center;'";
                     }else{
                       echo " style='display:none;'";
                     }
                     ?>>Action
                    </th>
                    <th
                    <?php
                     if($user['logged_in']['user_type'] ==5  && $user['logged_in']['department_id'] ==2){
                       echo "  style='text-align:center;'";
                     }else{
                       echo " style='display:none;'";
                     }
                     ?>>Action
                    </th>
                    <th
                    <?php
                     if($user['logged_in']['user_type'] ==6  && $user['logged_in']['department_id'] ==0){
                       echo "  style='text-align:center;'";
                     }else{
                       echo " style='display:none;'";
                     }
                     ?>>Action
                    </th>
               </tr>
            </thead>
            <tbody>
                <?php
            
                $i=1;
                foreach($query as $row):
                        
                if($i==0){
                     
                    echo"<tr>";
                }
                ?>
                    <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $i; ?>.</td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;" ><?php echo $row->id_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->description;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->manufacturer;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->serial_number;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->model;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->comments;?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo substr($row->date,0,-8);?></td>
                    <td
                     <?php
                     if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==3){
                        echo "style='display:block;text-align: center;'";
                     }else{
                          echo "style='display:none;'";
                     }
                     ?>><a href="<?php echo base_url().'outoftolerance/index/'.$row->id;?>">Out of Tolerance</a>&nbsp;
                     </td>
                     <td 
                     <?php
                     if($user['logged_in']['user_type'] ==5  && $user['logged_in']['department_id'] ==2){
                       echo "style='display:text-align: center;'";
                     }else{
                       echo " style='display:none;'";
                     }
                     ?>>
                     <a href="<?php echo base_url().'equipment_maintenance_records/update/'.$row->id;?>">Edit</a>&nbsp;
                     <a href="<?php echo base_url().'view_equipment_maintenance_logs/logs/'.$row->id;?>">Log</a>&nbsp;
                     <a href="<?php echo base_url().'outoftolerance/index/'.$row->id;?>">Out of Tolerance</a>&nbsp;
                     <a href="<?php echo base_url().'maintenance/index/'.$row->id;?>">Calibration & Maintenance</a>
                    </td>
                    <td
                     <?php
                     if($user['logged_in']['user_type'] ==6  && $user['logged_in']['department_id'] ==0){
                       echo " style='display:block;text-align: center;'";
                     }else{
                       echo " style='display:none;'";
                     }
                     ?>>
                     <a href="<?php echo base_url().'equipment_maintenance_records/update/'.$row->id;?>">Edit</a>&nbsp;
                     <a href="<?php echo base_url().'view_equipment_maintenance_logs/logs/'.$row->id;?>">Log</a>&nbsp;
                     <a href="<?php echo base_url().'maintenance/index/'.$row->id;?>">Calibration & Maintenance</a>
                     </td>
                <?php
                $i++;
                ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <div id="equipment_form" class="modal fade" role="dialog" aria-labelledby="equipment" aria-hidden="true"><?php include_once "application/views/equipment_maintenance_form.php";?></div>
    </div>
</div>
</body>
</html>