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
  <table  border="0" class="table_form" cellpadding="2px" align="center" width="100%">
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
    <?php echo validation_errors();?>
    <?php echo form_open('details/Update');?>
    <table width="950px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">
      <tr>
        <td colspan="4" style="padding:8px;text-align:right;background-color:#ffffff;text-color:#00ff00;">
        <a href="<?php echo base_url().'complaints_list/records'?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
      </tr>
      <tr>        
        <td colspan="4" align="center" style="padding:8px;border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;">
        <h4><b>Complaints Details</b></h4></td>
      </tr>
      <input type="hidden" name="cid" value="<?php echo $query['cid']; ?>"/>
      <input type="hidden" name="status" value="1"/>
      <tr>
        <td height="5px"align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Reference Number</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['ref_no'];?>
        </td>
        <td  height="5px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Customer Name</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['client_name'];?>
        </td>
      </tr>
      <tr>
        <td  height="5px" width="300px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Complaint received from</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['received_by'];?>
        </td>
        <td  height="5px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Complaint's Address</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['address'];?>
        </td>
      </tr>
      <tr>
        <td  height="5px" width="300px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Telephone Number</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['telephone_no'];?>
        </td>
        <td  height="5px"  align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Email Address</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['email'];?>
        </td>
      </tr>
      <tr>    
        <td  height="5px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Order REF No.</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['order_ref_no'];?>
        </td>
        <td  height="5px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Nature of Complaint</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['complaint_nature'];?>
        </td>
      </tr>
      <tr>
        <td  height="5px" align="left" colspan="4" 
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Details of Complaint</b></td>
      </tr>
      <tr height="80px" align="center">
        <td colspan="4" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['complaint_details'];?></td>
      </tr>
      <tr>
        <td colspan="4" align="center" 
        style="padding:8px;border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;">
        <h4><b>INVESTIGATION DETAILS</b></h4>
        </td>
      </tr>
      <tr height = "20px">
        <td  height="5px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Responsible Person</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <?php echo $query['responsible_person'];?>
        </td>
        <td  height="5px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Investigated by</b></td>
        <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['investigated_by'];?>
        </td>
      </tr>
      <tr height = "20px">
        <td colspan="4" width="450px" align="left"  
        style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <b>Action Taken</b></td>
      </tr>
      <tr>
        <td colspan="4" align="center" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><?php echo $query['action_taken'];?>
        </td>
      </tr>
    </table>
    </form>
    
  </div>
    </div>

</body>
</html>