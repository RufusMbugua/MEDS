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
    <?php echo form_open('update_standard_register_record/Submit',array('name'=>'update_standard_register_view'));?>
	<table class="table_form" width="80%" bgcolor="#f0f0ff" border="0" cellpadding="4" align="center">
	    <input type="hidden" name="my_id" value="<?php echo $query['id']; ?>"/>
             <tr>
	        <td colspan="4" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'standard_register_records/Get';?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
	   </tr>
     <tr>
		    <td colspan="4" style="text-align:center;padding:8px;border-bottom: solid 1px #bfbfbf;color:#0000fb;border-bottom: solid 10px #f0f0ff;background-color:#e8e8ff;  "><h4><b>Updating Reference Standard Register Record</b></h4></td>
	   </tr>
	   <tr>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reference Number</b></td>
  		<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="reference_number" value="<?php echo $query['reference_number'];?>"></td>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Certificate Number</b></td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="certificate_number" value="<?php echo $query['certificate_number'];?>"></td>
     </tr>
	   <tr>
  		<td style="paddding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>MSDS Material Saftey Data Sheet</b></td>
  		<td style="paddding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="30" rows="2" name="msds"><?php echo $query['msds'];?></textarea></td>
  		<td style="paddding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Item Description</b></td>
      <td style="paddding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="item_description" value="<?php echo $query['item_description'];?>"></td>
    </tr>
    <tr>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Batch No./Lot No</b></td>
  		<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="batch_lot_number" value="<?php echo $query['batch_number'];?>"></td>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Physical Appearance</b></td>
  		<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="physical_appearance" value="<?php echo $query['physical_appearance'];?>"></td>
    </tr>
    <tr>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Location/Store</b></td>
  		<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="location_store" value="<?php echo $query['location_store'];?>"></td>
  		<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Expiry Date</b></td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
        <input type="date" name="expiry_date" id ="expiry_date" class ="fieldsr" value="<?php echo $query['expiry_date'];?>"/>
        <span id="expiry_date_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
        <span id="expiry_date_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>      
    </tr>
    <tr>
      <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Intended Use</b></td>
  		<td colspan="4" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="intended_use" value="<?php echo $query['intended_use'];?>"></td>
	 </tr>
   <tr>
      <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Quantity</b></td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="quantity" value="<?php echo $query['quantity'];?>"></td>
      <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Status</b></td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
        <select type="text" name="status" >
          <option><?php if($query['status']==0){echo"In Use";}elseif($query['status']==1){echo"Expired";}elseif($query['status']==2){echo"Damaged";}elseif($query['status']==3){echo"Exhausted";}?></option>
          <option value = 0> In Use</option>
          <option value = 1> Expired</option>
          <option value = 2> Damaged</option>
          <option value = 3> Exhausted</option>
      </td>     
    </tr>
	  <tr>
		  <td style="padding:8px;background-color:#ffffff;text-align: center;" colspan="4"><input type="submit" class="btn" name="submit" value="Submit"/></td>
	  </tr> 
	</table>
 </form>
</div>
</div>
</body>
</html>
