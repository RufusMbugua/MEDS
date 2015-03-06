<script>
    $(document).ready(function(){
	
        $('#batch_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#batch_number_1').show();
            $('#batch_number_r').hide();
          }else{
            $('#batch_number_1').hide();
            $('#batch_number_r').show();
          }
        })
	$('#location_store').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#location_store_1').show();
            $('#location_store_r').hide();
          }else{
            $('#location_store_1').hide();
            $('#location_store_r').show();
          }
        })
        $('#item_description').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#item_description_1').show();
            $('#item_description_r').hide();
          }else{
            $('#item_description_1').hide();
            $('#item_description_r').show();
          }
        })
	$('#msds').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#msds_1').show();
            $('#msds_r').hide();
          }else{
            $('#msds_1').hide();
            $('#msds_r').show();
          }
        })
	$('#reference_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#reference_number_1').show();
            $('#reference_number_r').hide();
          }else{
            $('#reference_number_1').hide();
            $('#reference_number_r').show();
          }
        })
	$('#certificate_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#certificate_number_1').show();
            $('#certificate_number_r').hide();
          }else{
            $('#certificate_number_1').hide();
            $('#certificate_number_r').show();
          }
        })
	$('#expiry_date').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#expiry_date_1').show();
            $('#expiry_date_r').hide();
          }else{
            $('#expiry_date_1').hide();
            $('#expiry_date_r').show();
          }
        })
	$('#date_received').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#date_received_1').show();
            $('#date_received_r').hide();
          }else{
            $('#date_received_1').hide();
            $('#date_received_r').show();
          }
        })
	$('#source').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#source_1').show();
            $('#source_r').hide();
          }else{
            $('#source_1').hide();
            $('#source_r').show();
          }
        })
	$('#physical_appearance').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#physical_appearance_1').show();
            $('#physical_appearance_r').hide();
          }else{
            $('#physical_appearance_1').hide();
            $('#physical_appearance_r').show();
          }
        })
	$('#intended_use').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#intended_use_1').show();
            $('#intended_use_r').hide();
          }else{
            $('#intended_use_1').hide();
            $('#intended_use_r').show();
          }
        })
		$('#status').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#status_1').show();
            $('#status_r').hide();
          }else{
            $('#status_1').hide();
            $('#status_r').show();
          }
        })
    $('#quantity').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#quantity_1').show();
            $('#quantity_r').hide();
          }else{
            $('#quantity_1').hide();
            $('#quantity_r').show();
          }
        });
	$('#submit').click(function(){         
            count =0;
            $('.fieldsr').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All field as on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>standard_register/save",
                data:$('#standard_register_form').serialize(),
                success:function(data){
		    redirect_url = "<?php echo base_url();?>standard_register_records/Get/"
                    data='Success';
                    window.location.href = redirect_url;
                },
                //error:function(){
                  // alert('an error occured'); 
               //}
            })
            }
            })
    })
</script>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="meds">MEDS Reference Standard Register Form</h4>
</div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('standard_register/save',array('name'=>'standard_register_form'));?>
	<table width="100%" bgcolor="#c4c4ff" border="0" cellpadding="4" align="center">
    <tr>
      <td style="padding:8px;">      
          <table width="100%" class="table_form" bgcolor="#c4c4ff" border="0" cellpadding="4" align="center">
            <tr>
                <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>DOCUMENT:OFFICIAL FORM</b></td>
                <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
                <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                  <input type="text" id="reference_number" name="reference_number" value="MEDS/QC/RE/01-01" class="field"/>
                  <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                  <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
                </td>
            </tr>
            <tr>
              <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
              <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b>REVISION NUMBER</b></td>
              <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 OF 1</b></td>
            </tr>
            <tr>
                <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>FORM AUTHORIZED BY:</b></td>
                <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
                <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b>USER TYPE</b></td>
                <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
            </tr>
          </table>
        </td>
      </tr>
    <div class="modal-body">
      <tr>
          <td style="padding:8px;">
             <table width="100%" bgcolor="#c4c4ff" border="0" cellpadding="4" align="center">
              <tr>    
                <td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Standard Type</b></td>
                <td  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
                  <select type="text" name="type" id ="type" class ="fieldsr">
                    <option>-----</option>
                    <option value= "0"> PRIMARY</option>
                    <option value= "1"> SECONDARY</option>
                    <option value= "2"> WORKING</option>
                  </select>
                  <span id="status_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                  <span id="status_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                </td>                     
              </tr>
                <tr> 
              		<td lign="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Batch/Lot Number</b></td>
              		<td  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              			<input type="text" name="batch_number" id ="batch_number" class ="fieldsr"/>
              			<span id="batch_number_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="batch_number_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
                </tr> 
                <tr>
              		<td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Location</b></td>
              		<td  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
              			<input type="text" name="location_store" id ="location_store" class ="fieldsr" class ="fieldsr" />
              			<span id="location_store_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="location_store_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                  </td>	
                </tr> 
                <tr>
                  <td lign="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Reference Number</b></td>
                  <td  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
                    <input type="text" name="reference_number" id ="reference_number" class ="fieldsr"/>
                    <span id="reference_number_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                    <span id="reference_number_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
                </tr> 
                <tr>
                  <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Certificate Number</b></td>
                  <td  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
                    <input type="text" name="certificate_number" id ="certificate_number" class ="fieldsr"/>
                    <span id="certificate_number_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                    <span id="certificate_number_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>  
                </tr>
              	<tr>
              		<td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Item Description</b></td>
              	</tr> 
                <tr>	
                  <td colspan="2"  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              			<textarea rows="3" cols="90" name="item_description" id ="item_description" class ="fieldsr"></textarea>
              			<span id="item_description_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="item_description_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                  </td>
                </tr> 
                <tr>
              		<td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>MSDS (Material Saftey Data Sheet)</b></td>
              	</tr> 
                <tr>
                  <td colspan="2" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
              			<textarea rows="3"  cols="90" name="msds" id ="msds" class ="fieldsr"/></textarea>
              			<span id="msds_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="msds_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
              	</tr>    
              	<tr>
              		<td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Expiry Date</b></td>
              		<td  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              			<input type="text" class="datepicker" name="expiry_date" id ="expiry_date" class ="fieldsr"/>
              			<span id="expiry_date_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="expiry_date_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                  </td>
                </tr> 
                <tr>
              		<td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Date Received</b></td>
              		<td  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
              			<input type="text" class="datepicker" name="date_received" id ="date_received" class ="fieldsr"/>
              			<span id="date_received_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="date_received_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                  </td>	
           	    </tr>
              	<tr>
              		<td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Supplier</b></td>
              		<td  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              			<input type="text" name="source" id ="source" class ="fieldsr"/>
              			<span id="source_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="source_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
              	</tr> 
                <tr>
              		<td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Physical Appearance</b></td>
              	</tr> 
                <tr>
                  <td colspan="2" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
              			<textarea rows="3" cols="90" name="physical_appearance" id="physical_appearance" class ="fieldsr"></textarea>
              			<span id="physical_appearance_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="physical_appearance_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
              	</tr>
              	<tr>
              		<td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Intended Use</b></td>
              	</tr> 
                <tr>	
                  <td colspan="2" style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              			<textarea rows="3" cols="90" name="intended_use" id="intended_use" class ="fieldsr"></textarea>
              			<span id="intended_use_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              			<span id="intended_use_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span>
                  </td> 
                </tr>
                <tr>
                  <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Quantity</b></td>
                  <td  style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
                    <input type="text" name="quantity" id ="quantity" class ="fieldsr"/>
                    <select type="text" name="qty_type" id ="qty_type" class ="fieldsr">
                      <option>-----</option>
                      <option value = "MG"> Mg</option>
                      <option value = "MLs">Mls</option>
                      <option value = "Grams"> Grams</option>
                      <option value = "Liters"> Liters</option>
                  </select>
                    <span id="quantity_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                    <span id="quantity_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>       
              	</tr> 
                <tr>    
                  <td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Status</b></td>
          	      <td  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
          	        <select type="text" name="status" id ="status" class ="fieldsr">
          	          <option>-----</option>
          	          <option value = "0"> In Use</option>
          	          <option value = "1"> Expired</option>
          	          <option value = "2"> Damaged</option>
          	          <option value = "3"> Exhausted</option>
          	      </select>
        	      	<span id="status_1" style="padding:4px;color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
        			    <span id="status_r" style="padding:4px;color:white;background-color:red;padding:4px;display:none">Field Required</span></td>              	     
              	 </tr>
                </div>
                </table>
              </td>
            </tr>
      <div class="modal-footer">
	    <tr>
		    <td   style="padding:4px;background-color:#ffffff;text-align: center;" align="right"><input class = "btn"id ="submit" type="submit" name="submit" value="Submit"/></td>
	    </tr>
      </div> 
	</table>
    </form>
</div>
</div>
