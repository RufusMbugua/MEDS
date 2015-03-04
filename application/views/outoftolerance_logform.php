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
        $('#lista').dataTable({
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
  <?php include_once('application/views/header_links.php') ?>
   <div id="form_wrapper_lists">
    <div id="account_lists" style="display: block" name="menu">
            <table class="rl_header" border="0" bgcolor="#ffffff" width="100%" cellpadding="8px" align="center">
                <tr>
                    <td align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4><b>Out of Tolerance Log List</b></h4></td>
                </tr>
                <tr>
                    <td class="subdivider" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'outoftolerance_list/records';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
                </tr>
            </table>
        <table id="lista" class="list_view_header" width="100%" cellpadding="4px">
            <thead bgcolor="#efefef">
                <tr>
                    <th style="border-right: dotted 1px #ddddff;" align="center"></th>   
                      <th style="border-right: dotted 1px #ddddff;" align="center">New Reference No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Reference No</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Instrument State</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Instrument State</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Reporter</th>                    
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Reporter</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Comments</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Comments</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Use of Equipment</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Use of EQuipment</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Conducted By</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Conducted By</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Assessment Date</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Updated Approved</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">New Approved</th> 
                    <th style="border-right: dotted 1px #ddddff;" align="center">Old Approved</th>                                    
                    <th  align="center">Edited By</th>
                    <th style="border-right: dotted 1px #ddddff;" align="center">Action</th>
                </tr>
            </thead>
            
            <tbody>        
            <?php
            
                $i=1;
                foreach($query as $row):
                        
                //if($i==0){
                     
                    echo"<tr>";
                //}
            ?>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $i;?>.</td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_ref_no']=="NULL"){echo"Not Yet Set";}elseif($row['new_ref_no']=="0"){echo "Not Yet Set";}elseif($row['new_ref_no']==""){echo"No Previous Data";}else{echo $row['new_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['old_ref_no']=="NULL"){echo"Not Yet Set";}elseif($row['old_ref_no']=="0"){echo "Not Yet Set";}elseif($row['old_ref_no']==""){echo"No Previous Data";}else{echo $row['old_ref_no'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_status']=="NULL"){echo"Not Yet Set";}elseif($row['new_status']=="0"){echo "Not Yet Set";}elseif($row['new_status']==""){echo"No Previous Data";}else{echo $row['new_status'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['old_status']=="NULL"){echo"Not Yet Set";}elseif($row['old_status']=="0"){echo "Not Yet Set";}elseif($row['old_status']==""){echo"No Previous Data";}else{echo $row['old_status'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_reporter']=="NULL"){echo"Not Yet Set";}elseif($row['new_reporter']=="0"){echo "Not Yet Set";}elseif($row['new_reporter']==""){echo"No Previous Data";}else{echo $row['new_reporter'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_reporter']=="NULL"){echo"Not Yet Set";}elseif($row['old_reporter']=="0"){echo "Not Yet Set";}elseif($row['old_reporter']==""){echo"No Previous Data";}else{echo $row['old_reporter'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_comments']=="NULL"){echo"Not Yet Set";}elseif($row['new_comments']=="0"){echo "Not Yet Set";}elseif($row['new_comments']==""){echo"No Previous Data";}else{echo $row['new_comments'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_comments']=="NULL"){echo"Not Yet Set";}elseif($row['old_comments']=="0"){echo "Not Yet Set";}elseif($row['old_comments']==""){echo"No Previous Data";}else{echo $row['old_comments'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['new_equipment_used']=="NULL"){echo"Not Yet Set";}elseif($row['new_equipment_used']=="0"){echo "Not Yet Set";}elseif($row['new_equipment_used']==""){echo"No Previous Data";}else{echo $row['new_equipment_used'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_equipment_used']=="NULL"){echo"Not Yet Set";}elseif($row['old_equipment_used']=="0"){echo "Not Yet Set";}elseif($row['old_equipment_used']==""){echo"No Previous Data";}else{echo $row['old_equipment_used'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['new_conducted_by']=="NULL"){echo"Not Yet Set";}elseif($row['new_conducted_by']=="0"){echo "Not Yet Set";}elseif($row['new_conducted_by']==""){echo"No Previous Data";}else{echo $row['new_conducted_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['old_conducted_by']=="NULL"){echo"Not Yet Set";}elseif($row['old_conducted_by']=="0"){echo "Not Yet Set";}elseif($row['old_conducted_by']==""){echo"No Previous Data";}else{echo $row['old_conducted_by'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['new_assessment_date']=="NULL"){echo"Not Yet Set";}elseif($row['new_assessment_date']=="0000-00-00"){echo "Not Assessed Yet";}elseif($row['new_assessment_date']==""){echo"No Previous Data";}else{echo $row['new_assessment_date'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#f0fff0;"><?php if($row['old_assessment_date']=="NULL"){echo"Not Yet Set";}elseif($row['old_assessment_date']=="0"){echo "Not Yet Set";}elseif($row['old_assessment_date']==""){echo"No Previous Data";}else{echo $row['old_assessment_date'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php if($row['new_approved']=="NULL"){echo"Not Yet Set";}elseif($row['new_approved']=="0"){echo "Not Yet Set";}elseif($row['new_approved']==""){echo"No Previous Data";}else{echo $row['new_approved'];}?></td>
                    <td style="text-align: left;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php if($row['old_approved']=="NULL"){echo"Not Yet Set";}elseif($row['old_approved']=="0"){echo "Not Yet Set";}elseif($row['old_approved']==""){echo"No Previous Data";}else{echo $row['old_approved'];}?></td>                    
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"><?php echo $row['old_who']?></td>
                    <td style="text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#e1ffe1;"><?php echo $row['action'];?></td>

            <?php             
                $i++;
            ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>
</body>
</html>