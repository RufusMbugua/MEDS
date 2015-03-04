<script>
      function calc3(){
      
      var a= parseInt(document.getElementById('s_min_temp').value);
      var b= parseInt(document.getElementById('s_standard_min_temp').value);
	    var total = a+b;
	    document.getElementById('s_min_temp_corrected').value = total;
	    
      }

      function calc4(){
	    
      var a= parseInt(document.getElementById('s_max_temp').value);
      var b= parseInt(document.getElementById('s_standard_max_temp').value);
      var total = a+b;
	    document.getElementById('s_max_temp_corrected').value = total;
      
      }

      function calc5(){
      
      var a = parseInt(document.getElementById('s_min_humidity').value);
      var b = parseInt(document.getElementById('s_standard_min_humidity').value);
	    var total =  a+b;
	    document.getElementById('s_min_humidity_corrected').value = total;
	    
      }
      function calc6(){
	    
      var a = parseInt(document.getElementById('s_max_humidity').value);
      var b = parseInt(document.getElementById('s_standard_max_humidity').value);
      var total = a+b;
	    document.getElementById('s_max_humidity_corrected').value = total;
      
      }
</script>
<script>
  //   $(document).ready(function(){
  
        
  // $('#s_min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_min_temp_g').show();
  //           $('#s_min_temp_r').hide();
  //         }else{
  //           $('#s_min_temp_g').hide();
  //           $('#s_min_temp_r').show();
  //         }
  //       })
        
  
  // $('#s_max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_max_temp_g').show();
  //           $('#s_max_temp_r').hide();
  //         }else{
  //           $('#s_max_temp_g').hide();
  //           $('#s_max_temp_r').show();
  //         }
  //       })
  // $('#s_min_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_min_humidity_g').show();
  //           $('#s_min_humidity_r').hide();
  //         }else{
  //           $('#s_min_humidity_g').hide();
  //           $('#s_min_humidity_r').show();
  //         }
  //       })        
  
  // $('#s_max_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_max_humidity_g').show();
  //           $('#s_max_humidity_r').hide();
  //         }else{
  //           $('#s_max_humidity_g').hide();
  //           $('#s_max_humidity_r').show();
  //         }
  //       })          
  
  // $('#s_standard_max_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_standard_max_temp_g').show();
  //           $('#s_standard_max_temp_r').hide();
  //         }else{
  //           $('#s_standard_max_temp_g').hide();
  //           $('#s_standard_max_temp_r').show();
  //         }
  //       })
  // $('#s_standard_min_temp').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_standard_min_temp_g').show();
  //           $('#s_standard_min_temp_r').hide();
  //         }else{
  //           $('#s_standard_min_temp_g').hide();
  //           $('#s_standard_min_temp_r').show();
  //         }
  //       })
       
  // $('#s_standard_min_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_standard_min_humidity_g').show();
  //           $('#s_standard_min_humidity_r').hide();
  //         }else{
  //           $('#s_standard_min_humidity_g').hide();
  //           $('#s_standard_min_humidity_r').show();
  //         }
  //       })
  
  // $('#s_standard_max_humidity').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_standard_max_humidity_g').show();
  //           $('#s_standard_max_humidity_r').hide();
  //         }else{
  //           $('#s_standard_max_humidity_g').hide();
  //           $('#s_standard_max_humidity_r').show();
  //         }
  //       })
  // $('#s_equipment_used').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_equipment_used_g').show();
  //           $('#s_equipment_used_r').hide();
  //         }else{
  //           $('#s_equipment_used_g').hide();
  //           $('#s_equipment_used_r').show();
  //         }
  //       })
  // $('#s_ht_date').change('live',function(){
  //         if ($.trim(this.value)!=""){
  //           $('#s_ht_date_g').show();
  //           $('#s_ht_date_r').hide();
  //         }else{
  //           $('#s_ht_date_g').hide();
  //           $('#s_ht_date_r').show();
  //         }
  //       });
  // $('#save_sample').click(function(){         
  //           count =0;
  //           $('.fieldsample').each(function(){
  //              if ($.trim(this.value)=="")
  //              count ++;
  //           });
  //           if(count >0){
  //             alert( count+' field(s) are not filled. ')
  //              return false;
  //           }else{
              
  //           $.ajax({
  //               type:"post",
  //               url:"<?php echo base_url();?>temperature_humidity/submit",
  //               data:$('#sample_store_form').serialize(),
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
   $id_temp=1;
   $var_min_temp=-1;
   $var_max_temp=5;
   //var_dump($user);
    if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
  ?>
  
<?php echo validation_errors();?>
	<?php echo form_open('temperature_humidity/submit', array('id'=>'sample_store_form'));?>
	<table  width="950px" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center" >
		 <input type="hidden" name="ht_location" value="3">
		 <input type="hidden" name ="user" value ="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>">
             <tr>
			<td colspan="6" style="padding:8px;text-align:right;background-color:#ffffff;text-color:#00ff00;">
			<a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="20px" width="20px"><b>Back</b></a></td>
		</tr>
		<tr>
      <td colspan = "6" align ="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h4>Sample Store Humidity and Temperature</h4></td>
    </tr>   
    <tr>
			<td align="center" colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
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
				<input type ="text" name ="ht_date" id ="s_ht_date" class =" datepicker reg fieldsample">
				<span id="s_ht_date_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="s_ht_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Equipment Used</td>
			<td colspan ="2" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
		      <input type="text" id="equipmentuseda" name ="equipmentuseda" class ="reg fieldfreezer" >
         <select id="theremometerused_a" name="theremometerused_a" >
          <option selected></option>
           <?php
           foreach($sql_equipment as $a_name):
          ?>
           
           <option value="<?php  echo $a_name['id_number'];?>" data-equipmentuseda="<?php echo $a_name['description']; ?>"><?php  echo $a_name['id_number'];?></option>
            <?php
            endforeach
            ?>
          </select>
		        <span id="s_equipment_used_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="s_equipment_used_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
		</tr>
		<tr>
			<td colspan ="6" align ="center" style="padding:12px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;">
				<b>Temperature</b>
			</td>
		</tr>
    <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;">
          <table border="0" width="80%" class="table_form" cellpadding="8px" align="center">            
            <tr>
            <td colspan ="6" align ="center" style="padding:8px;text-align:center;padding-right:40px;border-bottom: solid 1px #f0f0ff;color:#0000fb;">
              Standard Temperature Limit: 9 to 25C
            </td>
            </tr>                        
          </table>
        </td>
    </tr> 		
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimun Temperature</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_min_temp" name ="s_min_temp" class ="fieldsample">
				<span id="s_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="s_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_min_temp"  onChange="calc3()" name ="s_standard_min_temp" class ="fieldsample">
		        <span id="s_standard_min_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="s_standard_min_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Temperature Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_min_temp_corrected" name ="s_min_temp_corrected" >
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature	</td>
      <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"   id="s_max_temp" name ="s_max_temp" class ="fieldsample">
				<span id="s_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="s_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_max_temp" onChange="calc4()" name ="s_standard_max_temp" class ="fieldsample">
		        <span id="s_standard_max_temp_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="s_standard_max_temp_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Temperature Corrected</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_max_temp_corrected" name ="s_max_temp_corrected">
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
				<input type ="text"  id="s_min_humidity" name ="s_min_humidity" class ="fieldsample">
				<span id="s_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="s_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_min_humidity" onChange="calc5()" name ="s_standard_min_humidity" class ="fieldsample">
		        <span id="s_standard_min_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="s_standard_min_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Minimum Humidity Corrected</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_min_humidity_corrected" name ="s_min_humidity_corrected">
			</td>
		</tr>
		<tr>
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity</td>	
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text"  id="s_max_humidity" name ="s_max_humidity" class ="fieldsample">
				<span id="s_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
				<span id="s_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>

			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Correction Factor</td>
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type="text" id="s_standard_max_humidity" onChange="calc6()" name ="s_standard_max_humidity"class ="fieldsample">
		        <span id="s_standard_max_humidity_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
		        <span id="s_standard_max_humidity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
	
			<td style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">Maximum Humidity Corrected</td>			
			<td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
				<input type ="text" id="s_max_humidity_corrected" name ="s_max_humidity_corrected"></td>
	
		</tr>
		<tr>
			<td colspan="6" style="padding:8px;text-align:center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
				<input type = "submit" class="btn" name ="save_humidtemp" id ="save_sample"value ="Submit">
			</td>
	
		</tr>
	</table>
	</form>