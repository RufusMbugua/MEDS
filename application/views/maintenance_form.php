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
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  
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
      <table class="table_form"  bgcolor="#c4c4ff" width="80%" height="40px" border="0" cellpadding="4px" align="center">
      <tr>
        <td>
          <table class="table_form"  bgcolor="#c4c4ff" width="100%" height="40px" border="0" cellpadding="4px" align="center">
             <input type="hidden" name="id" value="<?php echo $query['id'];?>">
        	  <tr>
              <td colspan="4" style="padding:4px;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:left;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'maintenance/print_maintenance_records/'.$query['id'];?>"><img src="<?php echo base_url().'images/icons/pdf.png'?>" height="20px" wieght="20px">Print in PDF</a></td>
          	    <td colspan="1" style="padding:4px;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px">Back</a></td>
        	  </tr>
          	<tr>
        	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-right: solid  1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>ID Number</b></td>
        	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Description</b></td>
        	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Manufacturer</b></td>
        	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Serial Number</b></td>
        	    <td height="25px"  style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Model</b></td>     
      	    </tr>
        	  <tr>
              <td height="15px" style="padding:4px;text-align: center;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;"><?php echo $query['id_number'];?></td>
        	    <td height="15px" style="padding:4px;text-align: center;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;"><?php echo $query['description'];?></td>
        	    <td height="15px" style="padding:4px;text-align: center;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;"><?php echo $query['manufacturer'];?></td>
        	    <td height="15px" style="padding:4px;text-align: center;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;"><?php echo $query['serial_number'];?></td>
        	    <td height="15px" style="padding:4px;text-align: center;border-left: dotted 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;background-color:#ffff40;"><?php echo $query['model'];?></td>
            </tr>
      	 </table>
        </td>
      </tr>
      <tr>
        <td>
          <table class="table_form" bgcolor="#c4c4ff" width="100%" height="20px" border="0" cellpadding="4px" align="center">
            <tr> 
        	    <td colspan="2" style="padding:4px;text-align: left;background-color:#ffffff;border-bottom: solid 10px #bfbfbf;">
                <a href="javascript:slide('maintenace_history');">Maintenance History</a>&nbsp;
                <a href="javascript:slide('calibration_history');">&nbsp;Calibration History</a>
              </td>
              <td colspan="2" style="padding:4px;text-align: center;background-color:#ffffff;border-bottom: solid 10px #bfbfbf;">
                <a class ="current" href="javascript:slide('calibration_maintenance_list');">Calibration and Maintenance List</a>
                <a class ="current" href="javascript:slide('calibration_maintenance');">Calibration and Maintenance </a>
                
              </td>
        	    <td colspan="2" 

        	    <?php
        	    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0 ){
        	       echo"style='display:none;'";
        	    }else{
        	       echo"style='padding:4px;display:block;text-align: right;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;'";
        	    }

        	    ?>><a class="current" href="javascript:slide('performance_form');">Schedule Maintenance&nbsp;</a>
              </td>
        	  </tr>
          </table>
       </td>
      </tr>
	</table>  
   <div id="performance_form" name="menu" style="display:none;"><?php include_once "application/views/performance_form.php";?></div>  
   <div id="calibration_form" name="menu" style="display:none;"><?php include_once "application/views/calibration_schedule_form.php";?></div>  
   <div id="maintenace_history" name="menu" style="display:block;"><?php include_once "application/views/performance_schedule_list.php";?></div>  
   <div id="calibration_history" name="menu" style="display:none;"><?php include_once "application/views/calibration_schedule_list.php";?></div>  
   <div id="calibration_maintenance" name="menu" style="display:none;"><?php include_once "application/views/calibration_maintenance.php";?></div>  
   <div id="calibration_maintenance_list" name="menu" style="display:none;"><?php include_once "application/views/calibration_maintenance_list.php";?></div>  
   
</form>
</div>
</body>
</html>