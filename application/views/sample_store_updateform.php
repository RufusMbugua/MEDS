<script>
       function calc3(){
	    var total = document.getElementById('s_min_temp').value - document.getElementById('s_standard_min_temp').value;
	    document.getElementById('s_min_temp_corrected').value = total;
	    
       }
       function calc4(){
	    var total = document.getElementById('s_max_temp').value - document.getElementById('s_standard_max_temp').value;
	    document.getElementById('s_max_temp_corrected').value = total;
       }
       function calc5(){
	    var total = document.getElementById('s_min_humidity').value - document.getElementById('s_standard_min_humidity').value;
	    document.getElementById('s_min_humidity_corrected').value = total;
	    
       }
       function calc6(){
	    var total = document.getElementById('s_max_humidity').value - document.getElementById('s_standard_max_humidity').value;
	    document.getElementById('s_max_humidity_corrected').value = total;
       }
</script>
<?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=3;
   $var_min_temp=-1;
   $var_max_temp=5;
   //var_dump($user);
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
  ?>
<?php echo validation_errors();?>
	<?php echo form_open('temperature_humidity_details/sample_stores', array('id'=>'sample_store_form'));?>
	<table  width="950px" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center" >
		 <input type="hidden" name="ht_location" value="3">
		 <input type="hidden" name="ht_id" value="<?php echo $query['ht_id']; ?>"/>
		 <input type="hidden" name"user" value ="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
             <tr>
			<td colspan="6" style="text-align:right;background-color:#ffffff;text-color:#00ff00;">
			<a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
		</tr>
		<tr>
			<td colspan = "6" align ="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"> 
				<h4>Humidity and Temperature</h4>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="6" style="padding:12px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<a href="javascript:slide('freezer');" class="sub_menu sub_menu_link first_link"><b>Freezer</b></a>
			<a href="javascript:slide('sample_store');" class="current sub_menu sub_menu_link first_link"><b>Sample Stores</b></a>
			<a href="javascript:slide('laboratory_area');" class="sub_menu sub_menu_link first_link"><b>Laboratory Working Area</b></a>
      		<a href="javascript:slide('refrigerator_form');" class="sub_menu sub_menu_link first_link"><b>Refrigerator</b></a>
			<a href="javascript:slide('instrument_room');" class="sub_menu sub_menu_link first_link"><b>Instrument Room</b></a>
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Date</td>
			<td colspan ="2"style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="date" name ="ht_date" id ="s_ht_date" value ="<?php echo $query['ht_date'];?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Used</td>
			<td colspan ="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
		        <input type="text" id="s_equipment_used" name ="s_equipment_used" value ="<?php echo $query['equipment_used'];?>"></td>
		</tr>
		<tr>
			<td colspan ="6" style="padding:12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Temperature</b></td>
		</tr>
		
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimun Temperature</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_min_temp" name ="s_min_temp" value ="<?php echo $query['min_temp'];?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_min_temp"  onChange="calc3()" name ="s_standard_min_temp" value="<?php echo $query['standard_min_temp']; ?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_min_temp_corrected" name ="s_min_temp_corrected" value="<?php echo $query['min_temp_corrected']; ?>"> </td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature	</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"   id="s_max_temp" name ="s_max_temp" value="<?php echo $query['max_temp']; ?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_max_temp" onChange="calc4()" name ="s_standard_min_temp" value="<?php echo $query['standard_max_temp']; ?>"></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature Corrected</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_max_temp_corrected" name ="s_max_temp_corrected" value="<?php echo $query['max_temp_corrected']; ?>"></td>
		</tr>
		<tr>
			<td colspan ="6" style="padding:12px;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Humidity</b></td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"  id="s_min_humidity" name ="s_min_humidity" value="<?php echo $query['min_humidity']; ?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_min_humidity" onChange="calc5()" name ="s_standard_min_humidity" value="<?php echo $query['standard_min_humidity']; ?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_min_humidity_corrected" name ="s_min_humidity_corrected" value="<?php echo $query['min_humidity_corrected']; ?>">
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"  id="s_max_humidity" name ="s_max_humidity" value="<?php echo $query['max_humidity']; ?>"></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_max_humidity" onChange="calc6()" name ="s_standard_max_humidity"value="<?php echo $query['standard_max_humidity']; ?>"></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity Corrected</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_max_humidity_corrected" name ="s_max_humidity_corrected" value="<?php echo $query['max_humidity_corrected']; ?>"></td>
	
		</tr>
		<tr>
			<td colspan ="8"style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> Reason for Editing</td>
		</tr>
		<tr>
			<td colspan ="8" align="center" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"> 
				<textarea id ="s_comments" name ="s_comments" rows ="4" cols ="60"><?php echo $query['comments']; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="6" style="padding:8px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
				<input type = "submit" name ="update_humidtemp" class="btn" id ="save_sample"value ="Submit">
			</td>
	
		</tr>
	</table>
	</form>