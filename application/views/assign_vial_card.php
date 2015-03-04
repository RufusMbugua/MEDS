<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>MEDS Admin Account</title>
   <link rel="icon" href="" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/sidenav.css';?>" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url().'style/style.css';?>" rel="stylesheet" type="text/css"/>
   
   <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.js';?>"></script>
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
 <div>
<?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   
   //var_dump($user);
  ?></div>
<div id="analysis_request" class="analysis_request" >
   <?php echo validation_errors(); ?>
   <form action="<?php echo base_url().'standard_vial_card/assignsave/';?>" method="POST" >
    <table class="table_form" width="100%" bgcolor="#c4c4ff" height="100px" border="0" cellpadding="4px" align="center">
	<input type="text" name="id" value="<?php echo $query['id']; ?>"/>
	<tr>
            <td colspan="5" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'standard_register_records/Get';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
        </tr>
	<tr>
            <td colspan="5" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;">
                <b><h3>Reference Standard Register Details</h3></b>
            </td>
        </tr>
	<tr>
	    <td height="5px" width="450px" align="center"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Batch Number</b></td>
	    <td height="5px" width="450px" align="center"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reference Number</b></td>
	    <td height="5px" width="450px" align="center"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Certificate Number</b></td>
	    <td height="5px" width="450px" align="center"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Item Description</b></td>
	    <td height="5px" width="450px" align="center"  style="padding: 8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Physical appearance</b></td>
	    
        </tr>
	<tr>
	    <td height="5px" style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;background-color: #95ff95;"><?php echo $query['batch_number'];?></td>
	    <td height="5px" style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;background-color: #95ff95;"><?php echo $query['reference_number'];?></td>
	    <td height="5px" style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;background-color: #95ff95;"><?php echo $query['certificate_number'];?></td>
	    <td height="5px" style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;background-color: #95ff95;"><?php echo $query['item_description'];?></td>
	    <td height="5px" style="text-align: center;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;background-color: #95ff95;"><?php echo $query['physical_appearance'];?></td>
	    
	</tr>
	</table>
	<table class="table_form" width="100%" bgcolor="#f0f0ff" height="40px" border="0" cellpadding="4px" align="center">
	<tr>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td height="20px" width="180px" style="text-align: center;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><a href="javascript:slide('assigned');">Assigned Vial Cards</td>  
	    <td height="20px" width="140px" style="text-align: center;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><a href="javascript:slide('assign_form');">Assign Vial Card</a></td>
	</tr>
	</table>
	<div id="assign_form" name="menu"
	     <?php
	     if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0){
	       echo"style='display:block;'";
	     }else{
	       echo"style='display:none;'";
	     }
	     ?>
	     ><?php include_once "application/views/vial_card_assign.php";?></div>  
        <div id="assigned" name="menu"
	     <?php
	     if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0){
	       echo"style='display:none;'";
	     }else{
	       echo"style='display:block;'";
	     }
	     ?>><?php include_once "application/views/assigned_vial_card_list.php";?></div>    
    </table>
	
    </form>
</div>
</body>
</html>
