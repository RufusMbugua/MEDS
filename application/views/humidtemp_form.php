<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>MEDS </title>
   <link rel="icon" href="" />
   <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
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
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/equipmentinfo.js';?>"></script>
   <script>
  //  $(document).ready(function(){
  
        
  // $('#min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#min_temp_g').show();
  //           $('#min_temp_r').hide();
  //         }else{
  //           $('#min_temp_g').hide();
  //           $('#min_temp_r').show();
  //         }
  //       })
        
  
  // $('#max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#max_temp_g').show();
  //           $('#max_temp_r').hide();
  //         }else{
  //           $('#max_temp_g').hide();
  //           $('#max_temp_r').show();
  //         }
  //       })
  // $('#standard_min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#standard_min_temp_g').show();
  //           $('#standard_min_temp_r').hide();
  //         }else{
  //           $('#standard_min_temp_g').hide();
  //           $('#standard_min_temp_r').show();
  //         }
  //       })
        
  
  // $('#standard_max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#standard_max_temp_g').show();
  //           $('#standard_max_temp_r').hide();
  //         }else{
  //           $('#standard_max_temp_g').hide();
  //           $('#standard_max_temp_r').show();
  //         }
  //       })
  // $('#equipment_used').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#equipment_used_g').show();
  //           $('#equipment_used_r').hide();
  //         }else{
  //           $('#equipment_used_g').hide();
  //           $('#equipment_used_r').show();
  //         }
  //       })
  // $('#freezer_ht_date').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#freezer_ht_date_g').show();
  //           $('#freezer_ht_date_r').hide();
  //         }else{
  //           $('#freezer_ht_date_g').hide();
  //           $('#freezer_ht_date_r').show();
  //         }
  //       });
  // $('#save_freezer_humidtemp').click(function(){         
  //           count =0;
  //           $('.fieldfreezer').each(function(){
  //              if ($.trim(this.value)=="")
  //              count ++;
  //           });
  //           if(count >0){
  //             alert( count+'  field(s) are not filled. ')
  //              return false;
  //           }else{
              
  //           $.ajax({
  //               type:"post",
  //               url:"<?php echo base_url();?>temperature_humidity/submit",
  //               data:$('#humidtemp_form').serialize(),
  //               success:function(data){
  //       redirect_url = "temperature_humidity_list/records/'.$id_temp";
  //                   data='Success';
  //                   window.location.href = redirect_url;
  //               },
  //               //error:function(){
  //                 // alert('an error occured'); 
  //              //}
  //           })
  //           }
  //           })
  //   })
</script>
<style>
 .reg{
    width:200px;
  }
</style>
 </head>
 <body>
<?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=1;
   $var_min_temp=-1;
   $var_max_temp=5;
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
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="current sub_menu sub_menu_link first_link">Temperature & Humidity</a>
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
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="current sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
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
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="current sub_menu sub_menu_link first_link">Temperature & Humidity</a>
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
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="current sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
  <div id="form_wrapper_lists">
   <div id="freezer" name="menu" style="display:block;">
	<?php echo validation_errors();?>
	<?php echo form_open('temperature_humidity/submit', array('id'=>'humidtemp_form'));?>
	<table  width="950px" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center" >
		<input type="hidden" name="ht_location" value="1">
    <input type="hidden" name ="user" value ="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
		<tr>
			<td colspan="4"  style="text-align:right;background-color:#fdfdfd;padding:8px;"><a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
		</tr>
		<tr>
			<td colspan ="4" align ="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4>Freezer Temperature</h4></td>
		</tr>   
		<tr>
			<td align="center" colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<a href="javascript:slide('freezer');" class="current sub_menu sub_menu_link first_link"><b>Freezer</b></a>
			<a href="javascript:slide('sample_store');" class="sub_menu sub_menu_link first_link"><b>Sample Stores</b></a>
			<a href="javascript:slide('laboratory_area');" class="sub_menu sub_menu_link first_link"><b>Laboratory Working Area</b></a>
			<a href="javascript:slide('instrument_room');" class="sub_menu sub_menu_link first_link"><b>Instrument Room</b></a>
      <a href="javascript:slide('refrigerator_form');" class="sub_menu sub_menu_link first_link"><b>Refrigerator</b></a>
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Date</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
  			<input type ="text"  name ="ht_date" id="freezer_ht_date" class ="datepicker fieldfreezer">
  			<span id="freezer_ht_date_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
        <span id="freezer_ht_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

      <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Used</td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <input type="text" id="equipmentused" name ="equipmentused" class ="reg fieldfreezer" >
         <select id="theremometerused" name="theremometerused" >
          <option selected></option>
           <?php
           foreach($sql_equipment as $bl_name):
          ?>
           
           <option value="<?php  echo $bl_name['id_number'];?>" data-equipmentused="<?php echo $bl_name['description']; ?>"><?php  echo $bl_name['id_number'];?></option>
            <?php
            endforeach
            ?>
          </select>
        <span id="equipment_used_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
        <span id="equipment_used_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
		</tr>
		<tr>
			<td colspan ="4" align ="center" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Temperature</b></td>
		</tr>
		<tr>
        <td colspan="4" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="100%" class="table_form" cellpadding="8px" align="center">            
            <tr>
            <td colspan ="6" align ="center" style="padding:8px;text-align:center;padding-right:40px;border-bottom: solid 1px #f0f0ff;color:#0000fb;">
              Standard Temperature Limit: -20 (+/-3)
            </td>
            </tr>                        
          </table>
        </td>
      </tr> 
		<tr>
      <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature</td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
        <input type="text" name ="min_temp" id="min_temp" value="-20" disabled>
        <span id="min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
        <span id="min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
		  <td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature  </td>     
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type ="text" id="max_temp"  name ="max_temp" value="-17"  disabled><span id="max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
    </tr>
    <tr>
      <td style="padding:8px;background-color:#ffffff;border-bottom: solid 1px #bfbfbf;">Current Temperature  </td>     
      <td colspan="3" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type ="text" id="collected_temp"  name ="collected_temp" ><span id="collected_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="collected_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
    </tr>
		<tr>
			<td colspan="4" style="padding:8px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;"><input type = "submit" name ="save_humidtemp" class ="btn" id ="save_freezer_humidtemp"value ="Submit"></td>
		</tr>
	
	</table>
	</form>
      </div>
</div>
       <div id="sample_store" name="menu" style="padding-top:140px;display:none;"><?php include_once "application/views/sample_store_form.php";?></div>
       <div id="laboratory_area" name="menu" style="padding-top:140px;display:none;"><?php include_once "application/views/laboratory_area_form.php";?></div>  
       <div id="instrument_room" name="menu" style="padding-top:140px;display:none;"><?php include_once "application/views/instrument_room_form.php";?></div>
       <div id="refrigerator_form" name="menu" style="padding-top:140px;display:none;"><?php include_once "application/views/refrigerator_form.php";?></div>
</body>		
</html>