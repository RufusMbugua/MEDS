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
  ?>
   <?php include_once('application/views/header_links.php') ?>
<div id="form_wrapper_lists">
     <div id="account_lists">
       <table class="subdivider" border="0" bgcolor="#ffffff" width="100%" cellpadding="8px" align="center">
	<tr>
	  <td colspan="2" align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Out of Tolerance Records</h5></td>
	</tr>
	</table>
	<table id="list" class="list_view_header" width="98%" cellpadding="4px" align="center">
		<thead bgcolor="#efefef">
			<tr>
				<th style="text-align:center;border-right: dotted 1px #ddddff;">No.</th>
        <th style="text-align:center;border-right: dotted 1px #ddddff;">Reference Number</th>
				<th style="text-align:center;border-right: dotted 1px #ddddff;">Equipment ID Number</th>
				<th style="text-align:center;border-right: dotted 1px #ddddff;">Instrument State</th>
				<th style="text-align:center;border-right: dotted 1px #ddddff;">Person Reporting</th>
				<th style="text-align:center;border-right: dotted 1px #ddddff;">Details</th>
        <th style="text-align:center;border-right: dotted 1px #ddddff;">Edit</th>
        <th style="text-align:center;border-right: dotted 1px #ddddff;">Logs</th>
        <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration/Maintenance</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			//Query the db as an array
			foreach ($query as $row=>$value): 

				if ($i ==0) {
					 echo "<tr>";
				}
			?>
				<td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $i;?>.</td>
        <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $value['ref_no'];?></td>
				<td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $value['equipment_name'];?></td>
				<td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $value['instrument_state'];?></td>
				<td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $value['reporter'];?></td>
				<td>
				    <div
				    <?php
			    
				      if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2 ||$user['logged_in']['user_type'] ==6){
					 echo "style='display:block;text-align: center;'"; 
				      }else{
					echo"style='display:none;'";
				      }
				    ?>><a href=" <?php echo base_url().'outoftolerance/details/'.$value['out_id'].'/'.$value['equipment_maintenance_id'];?>"><img src="<?php echo base_url().'images/icons/view_a.png';?>" height="20px" width="20px"/>Details</a>
				    </div>
				</td>
        <td>
            <div
            <?php
          
              if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2 ||$user['logged_in']['user_type'] ==6){
           echo "style='display:block;text-align: center;'"; 
              }else{
          echo"style='display:none;'";
              }
            ?>>
               <a href=" <?php echo base_url().'outoftolerance/edit/'.$value['out_id'].'/'.$value['equipment_maintenance_id'];?>"><img src="<?php echo base_url().'images/icons/edit.png';?>" height="20px" width="20px"/>Edit</a>
               </div>
        </td>
        <td>
            <div
            <?php
          
              if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2 ||$user['logged_in']['user_type'] ==6){
           echo "style='display:block;text-align: center;'"; 
              }else{
          echo"style='display:none;'";
              }
            ?>>
               <a href=" <?php echo base_url().'outoftolerance/logs/'.$value['out_id'].'/'.$value['equipment_maintenance_id'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="20px" width="20px"/>Logs</a>
            </div>
        </td>
        <td>
            <div
            <?php
          
              if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2 ||$user['logged_in']['user_type'] ==6){
           echo "style='display:block;text-align: center;'"; 
              }else{
          echo"style='display:none;'";
              }
            ?>>
               <a href="<?php echo base_url().'maintenance/index/'.$value['equipment_maintenance_id'];?>"><img src="<?php echo base_url().'images/icons/c_m.png';?>" height="20px" width="20px"/>Calibration & Maintenance</a>
            </div>
        </td>
				<?php $i++; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
		
	</div>

</body>
</html>