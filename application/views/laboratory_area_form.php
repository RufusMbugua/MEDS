<script>
       function calc(){

       	var a = parseInt(document.getElementById('lab_min_temp').value);
       	var b = parseInt(document.getElementById('lab_standard_min_temp').value);
	    var total =  a-b;

	    document.getElementById('lab_min_temp_corrected').value = total;
       }
       function calc2(){
       	var a= parseInt(document.getElementById('lab_max_temp').value);
       	var b= parseInt(document.getElementById('lab_standard_max_temp').value);

	    var total =  a-b;
	    document.getElementById('lab_max_temp_corrected').value = total;
       }

       function calc_min(){
	    
	    var a= parseInt(document.getElementById('l_min_humidity').value);
	    var b= parseInt(document.getElementById('l_standard_min_humidity').value);
	    
	    var total = a-b;
	    document.getElementById('l_min_humidity_corrected').value = total;
	    
       }
       function calc_max(){
	    
	    var a= parseInt(document.getElementById('l_max_humidity').value);
	    var b= parseInt(document.getElementById('l_standard_max_humidity').value);

	    var total =  a-b;
	    document.getElementById('l_max_humidity_corrected').value = total;
       }
   </script>
<script>
//     $(document).ready(function(){
	
        
// 	$('#lab_min_temp').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#lab_min_temp_g').show();
//             $('#lab_min_temp_r').hide();
//           }else{
//             $('#lab_min_temp_g').hide();
//             $('#lab_min_temp_r').show();
//           }
//         })
        
	
// 	$('#lab_max_temp').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#lab_max_temp_g').show();
//             $('#lab_max_temp_r').hide();
//           }else{
//             $('#lab_max_temp_g').hide();
//             $('#lab_max_temp_r').show();
//           }
//         })
// 	$('#lab_standard_min_temp').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#lab_standard_min_temp_g').show();
//             $('#lab_standard_min_temp_r').hide();
//           }else{
//             $('#lab_standard_min_temp_g').hide();
//             $('#lab_standard_min_temp_r').show();
//           }
//         })
        
	
// 	$('#lab_standard_max_temp').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#lab_standard_max_temp_g').show();
//             $('#lab_standard_max_temp_r').hide();
//           }else{
//             $('#lab_standard_max_temp_g').hide();
//             $('#lab_standard_max_temp_r').show();
//           }
//         })
// 	$('#lab_equipment_used').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#lab_equipment_used_g').show();
//             $('#lab_equipment_used_r').hide();
//           }else{
//             $('#lab_equipment_used_g').hide();
//             $('#lab_equipment_used_r').show();
//           }
//         })
// 	$('#ht_date').change('live',function(){
//           if ($.trim(this.value)!=""){
//             $('#ht_date_g').show();
//             $('#ht_date_r').hide();
//           }else{
//             $('#ht_date_g').hide();
//             $('#ht_date_r').show();
//           }
//         });
// 	$('#save_humidtemp').click(function(){         
//             count =0;
//             $('.fieldlab').each(function(){
//                if ($.trim(this.value)=="")
//                count ++;
//             });
//             if(count >0){
//               alert( count+'  field(s) are not filled. ')
//                return false;
//             }else{
              
//             $.ajax({
//                 type:"post",
//                 url:"<?php echo base_url();?>temperature_humidity/submit",
//                 data:$('#laboratory_area_form').serialize(),
//                 success:function(data){
// 		    redirect_url = "<?temperature_humidity_list/records/'.$id_temp"
//                     data='Success';
//                     window.location.href = redirect_url;
//                 },
//                 //error:function(){
//                   // alert('an error occured'); 
//                //}
//             })
//             }
//             })
//     })
// </script>
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

       }
  ?>
<?php echo validation_errors();?>
<?php echo form_open('temperature_humidity/submit',array('id'=>'laboratory_area_form'));?>
	
	<table  width="950px" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center" >
		 <input type="hidden" name="ht_location" value="2">
		 <input type="hidden" name ="user" value ="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
                <tr>
			<td colspan="6"  style="text-align:right;background-color:#fdfdfd;padding:8px;"><a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
		</tr>
		<tr>
	      <td colspan = "6" align ="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4>Laboratory Working Area Humidity and Temperature</h4></td>
	    </tr> 
		<tr>
			<td align="center" colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<a href="javascript:slide('freezer');" class="sub_menu sub_menu_link first_link"><b>Freezer</b></a>
			<a href="javascript:slide('sample_store');" class="sub_menu sub_menu_link first_link"><b>Sample Stores</b></a>
			<a href="javascript:slide('laboratory_area');" class="current sub_menu sub_menu_link first_link"><b>Laboratory Working Area</b></a>
			<a href="javascript:slide('instrument_room');" class="sub_menu sub_menu_link first_link"><b>Instrument Room</b></a>
      <a href="javascript:slide('refrigerator_form');" class="sub_menu sub_menu_link first_link"><b>Refrigerator</b></a>
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Date</td>
			<td colspan ="2"style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
			<input type ="text" name ="ht_date" id ="ht_date" class ="datepicker fieldlab">
			<span id="ht_date_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
			<span id="ht_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span>
			</td>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Used</td>
			<td colspan ="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	        <input type="text" id="equipmentusedb" name ="equipmentusedb" class ="reg fieldfreezer" >
         <select id="theremometerused_b" name="theremometerused_b" >
          <option selected></option>
           <?php
           foreach($sql_equipment as $b_name):
          ?>
           
           <option value="<?php  echo $b_name['id_number'];?>" data-equipmentusedb="<?php echo $b_name['description']; ?>"><?php  echo $b_name['id_number'];?></option>
            <?php
            endforeach
            ?>
          </select>
	        <span id="lab_equipment_used_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	        <span id="lab_equipment_used_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
		</tr>
		<tr>
			<td colspan ="6" align ="center" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;;"><b>Temperature</b></td>
		</tr>
		<tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="80%" class="table_form" cellpadding="8px" align="center">            
            <tr>
            <td colspan ="6" align ="center" style="padding:8px;text-align:center;padding-right:40px;border-bottom: solid 1px #f0f0ff;color:#0000fb;">
              Standard Temperature Limit: 15 to 25C
            </td>
            </tr>                        
          </table>
        </td>
      </tr> 
		<tr>			
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" name ="l_min_temp"  id ="lab_min_temp" class ="fieldlab" >
				<span id="lab_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="lab_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="lab_standard_min_temp" onChange="calc()" name ="l_standard_min_temp" class ="fieldlab">
		        <span id="lab_standard_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="lab_standard_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature Corrected</td>
			<td style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="l_min_temp_corrected" id ="lab_min_temp_corrected" >
				</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature	</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="l_max_temp" id ="lab_max_temp" class ="fieldlab" >	
				<span id="lab_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="lab_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="lab_standard_max_temp" name ="l_standard_max_temp" onChange="calc2()" class ="fieldlab">
		        <span id="lab_standard_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="lab_standard_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
			
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature Corrected</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" name ="l_max_temp_corrected" id ="lab_max_temp_corrected" >
				</td>
		</tr>
		<tr>
			<td colspan ="6" align ="center" style="padding:12px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;"><b>Humidity</b></td>
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
				<input type ="text"  id="l_min_humidity" name ="l_min_humidity" class ="fieldlab">
				<span id="l_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="l_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="l_standard_min_humidity" onChange="calc_min()" name ="l_standard_min_humidity" class ="fieldlab">
		        <span id="l_standard_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="l_standard_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="l_min_humidity_corrected" name ="l_min_humidity_corrected">
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"  id="l_max_humidity" name ="l_max_humidity" class ="fieldlab">
				<span id="l_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="l_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="l_standard_max_humidity" onChange="calc_max()" name ="l_standard_max_humidity"class ="fieldlab">
		        <span id="l_standard_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="l_standard_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity Corrected</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="l_max_humidity_corrected" name ="l_max_humidity_corrected"></td>
	
		</tr>
		
		<tr>
			<td colspan="6" style="padding:8px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
				<input type = "submit" name ="save_humidtemp" class="btn" id ="save_humidtemp" value ="Submit">
			</td>
	
		</tr>
	
	</table>
	</form>