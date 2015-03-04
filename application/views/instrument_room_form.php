<script>
       function calci3(){
	    var total = document.getElementById('instrument_min_temp').value - document.getElementById('instrument_standard_min_temp').value;
	    document.getElementById('instrument_min_temp_corrected').value = total;
	    
       }
       function calci4(){
	    var total = document.getElementById('instrument_max_temp').value - document.getElementById('instrument_standard_max_temp').value;
	    document.getElementById('instrument_max_temp_corrected').value = total;
       }
       function calci5(){
	    var total = document.getElementById('instrument_min_humidity').value - document.getElementById('instrument_standard_min_humidity').value;
	    document.getElementById('instrument_min_humidity_corrected').value = total;
	    
       }
       function calci6(){
	    var total = document.getElementById('instrument_max_humidity').value - document.getElementById('instrument_standard_max_humidity').value;
	    document.getElementById('instrument_max_humidity_corrected').value = total;
       }
</script>
<script>
  //   $(document).ready(function(){
  
        
  // $('#instrument_min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_min_temp_g').show();
  //           $('#instrument_min_temp_r').hide();
  //         }else{
  //           $('#instrument_min_temp_g').hide();
  //           $('#instrument_min_temp_r').show();
  //         }
  //       })
        
  
  // $('#instrument_max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_max_temp_g').show();
  //           $('#instrument_max_temp_r').hide();
  //         }else{
  //           $('#instrument_max_temp_g').hide();
  //           $('#instrument_max_temp_r').show();
  //         }
  //       })
  // $('#instrument_min_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_min_humidity_g').show();
  //           $('#instrument_min_humidity_r').hide();
  //         }else{
  //           $('#instrument_min_humidity_g').hide();
  //           $('#instrument_min_humidity_r').show();
  //         }
  //       })
        
  
  // $('#instrument_max_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_max_humidity_g').show();
  //           $('#instrument_max_humidity_r').hide();
  //         }else{
  //           $('#instrument_max_humidity_g').hide();
  //           $('#instrument_max_humidity_r').show();
  //         }
  //       })
  // $('#instrument_standard_max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_standard_max_temp_g').show();
  //           $('#instrument_standard_max_temp_r').hide();
  //         }else{
  //           $('#instrument_standard_max_temp_g').hide();
  //           $('#instrument_standard_max_temp_r').show();
  //         }
  //       })
  // $('#instrument_standard_min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_standard_min_temp_g').show();
  //           $('#instrument_standard_min_temp_r').hide();
  //         }else{
  //           $('#instrument_standard_min_temp_g').hide();
  //           $('#instrument_standard_min_temp_r').show();
  //         }
  //       })
       
  // $('#instrument_standard_min_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_standard_min_humidity_g').show();
  //           $('#instrument_standard_min_humidity_r').hide();
  //         }else{
  //           $('#instrument_standard_min_humidity_g').hide();
  //           $('#instrument_standard_min_humidity_r').show();
  //         }
  //       })
  
  // $('#instrument_standard_max_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_standard_max_humidity_g').show();
  //           $('#instrument_standard_max_humidity_r').hide();
  //         }else{
  //           $('#instrument_standard_max_humidity_g').hide();
  //           $('#instrument_standard_max_humidity_r').show();
  //         }
  //       })
  // $('#instrument_equipment_used').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_equipment_used_g').show();
  //           $('#instrument_equipment_used_r').hide();
  //         }else{
  //           $('#instrument_equipment_used_g').hide();
  //           $('#instrument_equipment_used_r').show();
  //         }
  //       })
  // $('#instrument_ht_date').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#instrument_ht_date_g').show();
  //           $('#instrument_ht_date_r').hide();
  //         }else{
  //           $('#instrument_ht_date_g').hide();
  //           $('#instrument_ht_date_r').show();
  //         }
  //       });
  // $('#save_humidtemp_instrument').click(function(){         
  //           count =0;
  //           $('.fieldinstrument').each(function(){
  //              if ($.trim(this.value)=="")
  //              count ++;
  //           });
  //           if(count >0){
  //             alert( count+'  field(s) are not filled.')
  //              return false;
  //           }else{
              
  //           $.ajax({
  //               type:"post",
  //               url:"<?php echo base_url();?>temperature_humidity/submit",
  //               data:$('#instrument_room_form').serialize(),
  //               success:function(data){
  //       redirect_url = "<?temperature_humidity_list/records/'.$id_temp"
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
<?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=4;
   $var_min_temp=-1;
   $var_max_temp=5;
   //var_dump($user);
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
  ?>
<?php echo validation_errors();?>
	<?php echo form_open('temperature_humidity/submit', array('id'=>'instrument_room_form'));?>
	<table  width="950px" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center" >
		 <input type="hidden" name="ht_location" value="4">
     <input type="hidden" name ="user" value ="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
     <tr>
      <td colspan="6"  style="text-align:right;background-color:#fdfdfd;padding:8px;"><a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
    </tr>    
		<tr>
			<td colspan = "6" align ="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"> 
				<h4>Instrument Room Humidity and Temperature</h4>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<a href="javascript:slide('freezer');" class="sub_menu sub_menu_link first_link"><b>Freezer</b></a>
			<a href="javascript:slide('sample_store');" class="sub_menu sub_menu_link first_link"><b>Sample Stores</b></a>
			<a href="javascript:slide('laboratory_area');" class="sub_menu sub_menu_link first_link"><b>Laboratory Working Area</b></a>
			<a href="javascript:slide('instrument_room');" class="current sub_menu sub_menu_link first_link"><b>Instrument Room</b></a>
      <a href="javascript:slide('refrigerator_form');" class="sub_menu sub_menu_link first_link"><b>Refrigerator</b></a>
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Date</td>
			<td colspan ="2"style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<input type ="text" name ="ht_date" id ="instrument_ht_date" class =" datepicker fieldinstrument">
			<span id="instrument_ht_date_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
			<span id="instrument_ht_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Used</td>
			<td colspan ="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
		        <input type="text" id="equipmentusedc" name ="equipmentusedc" class ="reg fieldfreezer" >
         <select id="theremometerused_c" name="theremometerused_c" >
          <option selected></option>
           <?php
           foreach($sql_equipment as $c_name):
          ?>
           
           <option value="<?php  echo $c_name['id_number'];?>" data-equipmentusedc="<?php echo $c_name['description']; ?>"><?php  echo $c_name['id_number'];?></option>
            <?php
            endforeach
            ?>
          </select>
		        <span id="instrument_equipment_used_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="instrument_equipment_used_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
		</tr>
		<tr>
			<td colspan ="6" align ="center" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Temperature</b></td>
		</tr>
    <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="80%" class="table_form" cellpadding="8px" align="center">            
            <tr>
            <td colspan ="6" align ="center" style="padding:8px;text-align:center;padding-right:40px;border-bottom: solid 1px #f0f0ff;color:#0000fb;">
              Standard Temperature Limit: 16 to 27C
            </tr>                        
          </table>
        </td>
      </tr> 
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" name ="i_min_temp" id="instrument_min_temp" class ="fieldinstrument">
				<span id="instrument_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="instrument_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="instrument_standard_min_temp"  onChange="calci3()" name ="i_standard_min_temp" class ="fieldinstrument">
		        <span id="instrument_standard_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="instrument_standard_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_min_temp_corrected" id="instrument_min_temp_corrected"></td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature	</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_max_temp" id="instrument_max_temp" class ="fieldinstrument">
				<span id="instrument_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="instrument_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="instrument_standard_max_temp" onChange="calci4()" name ="i_standard_min_temp" class ="fieldinstrument">
		        <span id="instrument_standard_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="instrument_standard_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature Corrected</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_max_temp_corrected" id="instrument_max_temp_corrected">
			</td>
		</tr>
		<tr>
			<td colspan ="6" align ="center" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Humidity</b></td>
		</tr>
    <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="80%" class="table_form" cellpadding="8px" align="center">            
            <tr>
            <td colspan ="6" align ="center" style="padding:8px;text-align:center;padding-right:40px;border-bottom: solid 1px #f0f0ff;color:#0000fb;">
               Standard Humidity Limit: 65% (+/-5%)
            </td>
            </tr>                        
          </table>
        </td>
      </tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_min_humidity" id="instrument_min_humidity" class ="fieldinstrument">
				<span id="instrument_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="instrument_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="instrument_standard_min_humidity" onChange="calci5()" name ="i_standard_min_temp" class ="fieldinstrument">
		        <span id="instrument_standard_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="instrument_standard_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>	

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_min_humidity_corrected" id="instrument_min_humidity_corrected">
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_max_humidity" id ="instrument_max_humidity" class ="fieldinstrument">	
				<span id="instrument_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="instrument_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="instrument_standard_max_humidity" onChange="calci6()" name ="i_standard_max_humidity"class ="fieldinstrument">
		        <span id="instrument_standard_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="instrument_standard_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity Corrected</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="i_max_humidity_corrected" id ="instrument_max_humidity_corrected">	</td>
	
		</tr>
		<tr>
			<td colspan="6" style="padding:8px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
				<input type = "submit" name ="save_humidtemp" class="btn" id ="save_humidtemp_instrument"value ="Submit">
			</td>
	
		</tr>
	
	</table>
	</form>