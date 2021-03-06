<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <title>MEDS</title>

  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>
  
  <!-- bootstrap reference library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>

  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>  
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.autosave.js';?>"></script>
  <script>
  $(document).ready(function() {
        /* Init DataTables */
        
        
        
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
  <?php echo form_open('coa/coa_pdf/'.$test_request_id,array('id'=>'coa_view'));?>
  <table bgcolor="#c4c4ff" class="table_form"  width="50%" border="0" cellpadding="8px" align="center">
   <input type="hidden" name ="test_request" value ="<?php echo $test_request_id;?>">
    <tr>
        <td colspan="8" style="padding:8px;text-align:center;">
          <table width="100%" bgcolor="#ffffff" cellpadding="8px" align="center" border="1">
             <tr>
                <td colspan="8" style="padding:4px;"><img src="<?php echo base_url().'images/header.png';?>" height="280px" width="1000px"/></td>
             </tr>
            </table>
        </td>
    </tr>
    <tr>
      <td colspan="8" align="center" style="padding:8px;">
        <table align="center" callpadding="4px" border="0" width="100%">
          <tr>
              <td align="left" colspan="2" style="padding:8px;background-color:#ffffff;"><b><u>REGISTRATION NUMBER:</u></b> <?php echo " ".$query['laboratory_number'] ?></td>
              <td align="left" colspan="2" style="padding:8px;background-color:#ffffff;"><b><u>Request Date:</u></b> <?php echo " ".substr($query['date_time'],0,10)?></td>
              <td align="left" colspan="2" style="padding:8px;background-color:#ffffff;"><b><u>Test Date:</u></b> <?php echo " ".date("d/m/Y")?></td>
          </tr>  
          <tr>
               <td colspan="6" align="left" style="padding:8px;background-color:#ffffff;"><b><u>NAME OF PRODUCT:</u></b>&nbsp;&nbsp;&nbsp; <b><?php echo $query['active_ingredients']." ".$query['brand_name'];?></b></td>       
          </tr>
          <tr>
              <td colspan="3" align="left" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>CLIENT:</u></b></br></br><?php echo $query['applicant_name']."</br>".$query['applicant_address'];?></td>       
              <td colspan="3" align="left" style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><b><u>MANUFACTURER:</u></b></br></br><?php echo $query['manufacturer_name']."</br>".$query['manufacturer_address'];?></td>
          </tr>
          <tr>
            <td colspan="6"style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;"><b><u>LABEL CLAIM:</u></b></td>
          </tr>
          <tr><td colspan="6" style ="text-align:left;padding:8px;"><?php echo $query['label_claim']?>&nbsp;,<?php echo $query['batch_lot_number']?>&nbsp;,Manufactured <?php echo $query['date_manufactured']?>&nbsp;,Expires <?php echo $query['expiry_date']?></td></tr>
        </table>
      </td>
    </tr>
    <tr>
      <td align= "center" colspan ="6" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #f0f0ff;color: #0000fb;">
        <u><h3><b>RESULTS OF ANALYSIS</b></h3></u></td>      
    </tr>
    <tr>
      <td colspan="6"align="left" style="padding:8px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;"><b>Appearance:</br></b>&nbsp;<?php echo $full_monograph[0]['appearance']?></td>
    </tr>
     <tr>
      <td colspan="6" style="padding:8px">
      <table width="950px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">

        <thead>
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;"></th>     
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;">TEST</th>
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;">METHOD</th> 
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;">SPECIFICATIONS</th>  
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;">RESULTS</th>
          <th align="left" style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;color:#0000ff;">REMARKS</th>     

        </thead>
        <tbody>
          <?php
            $i = 1;

            if(empty($tests)){
                  echo "There's no data currently for display!";
            }else{

            }
            foreach ($tests as $row): 

              if ($i ==0) {
                 echo "<tr>";
              }
            ?>
          <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $i?>.</td>      
          <td style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $row['test_name'];?> </td>      
          <td style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $row['method'];?></td>       
          <td style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $row['specifications'];?></td>
          <td style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $row['results'];?></td>      
          <td style="padding:8px;background-color:#ffffff;border-right: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-top: solid 1px #bfbfbf;"><?php echo $row['remarks'];?></td>
          <?php $i++; ?>

      </tr>

      <?php endforeach; ?>

        </tbody>
      </table>     
      </td>     
      </tr>
      <tr>
          <td colspan="6"align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>CONCLUSION:*<b></td> 
      </tr>
      <tr>
        <td colspan="6" style ="text-align:center;padding:8px;"><?php echo $coa[0]['conclusions'];?></td>
      </tr>
      <tr>    
         <td colspan="2" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Prepared by: <?php echo $coa[0]['done_by'];?></td>
         <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reviewed by: <?php echo $coa[0]['supervisor'];?>
         <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Approved by: Stephen Kigera
          <input type="hidden" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>" name ="approved_by">
          <input type="hidden" value="<?php echo date('d/m/Y');?>" name="date_approved"></td>   
      </tr>
      <tr>
        <td colspan="6"align="center" style="padding:12px;background-color:#ffffff;padding-top:40px;border-top: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><br><b>A Joint Service of the Kenya Episcopal Conference and Christian Health Association of Kenya <b></td> 
      </tr>
      <tr>
        <td colspan="3"align="left" style="padding:12px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>P.O. Box 78040, VIWANDANI 00507<br>NAIROBI, KENYA<br>Website: <u>www.meds.or.ke<u></b></td>
        <td colspan="3"align="right" style="padding:12px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>TEL: (+254) 20-3920000, 0734-600310, 0722-202106, 0726-937222<br>WIRELESS: 0202124453, 0202532216, 0202460022, 02032214<br>E-mail: sahibu@africaonline.co.ke,lab@meds.or.ke</b></td>
      </tr>   
      <tr>
        <td colspan="6"align="center" style="padding:12px;background-color:#ffffff;border-top: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><br><b>MEDS Quality Control Laboratory is Pre-Qualified by WHO<br>ISO 9001:2008 Certified<b></td> 
      <tr>
        <td colspan="6" style="padding:12px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="submit" class="btn" name="save_coa_model"  id="slave_coa_model" value ="Print"></td>
      </tr>
    </table>
  </form>
  </div>
  </div>
</body>
</html>
