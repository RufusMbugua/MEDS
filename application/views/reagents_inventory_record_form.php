<script>
function calc() {
    var total = document.getElementById('package_size').value * document.getElementById('quantity').value;
    document.getElementById('total_quantity').value = total;
}
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
	$('#certificate_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#certificate_number_1').show();
            $('#certificate_number_r').hide();
          }else{
            $('#certificate_number_1').hide();
            $('#certificate_number_r').show();
          }
        })
	$('#card_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#card_number_1').show();
            $('#card_number_r').hide();
          }else{
            $('#card_number_1').hide();
            $('#card_number_r').show();
          }
        })
	$('#manufacturer_supplier').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#manufacturer_supplier_1').show();
            $('#manufacturer_supplier_r').hide();
          }else{
            $('#manufacturer_supplier_1').hide();
            $('#manufacturer_supplier_r').show();
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
	$('#location').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#location_1').show();
            $('#location_r').hide();
          }else{
            $('#location_1').hide();
            $('#location_r').show();
          }
        })
        
        $('#package_size').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#package_size_1').show();
            $('#package_size_r').hide();
          }else{
            $('#package_size_1').hide();
            $('#package_size_r').show();
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
        $('#reorder_quantity').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#reorder_quantity_1').show();
            $('#reorder_quantitymodel_r').hide();
          }else{
            $('#reorder_quantity_1').hide();
            $('#reorder_quantity_r').show();
          }
        })
	$('#comments').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#comments_1').show();
            $('#comments_r').hide();
          }else{
            $('#comments_1').hide();
            $('#comments_r').show();
          }
        })
	;
        $('#submit').click(function(){         
            count =0;
            $('.field').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count>0){
              alert(count+' Fields Have Not yet been filled, All fields on this form are MANDATORY')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>reagents_inventory/save",
                data:$('#reagents_inventory_record_form').serialize(),
                success:function(data){
		    redirect_url = "<?php echo base_url();?>reagents_inventory_record/Get"
                    data='Success';
                    window.location.href = redirect_url;
                },
                //error:function(){
                   //alert('an error occured'); 
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
    <h5 class="modal-title" id="meds">Reagents Record Form</h5>
</div>
   <?php echo validation_errors(); ?>
   <?php echo form_open('reagents_inventory/save',array('id'=>'reagents_inventory_record_form'));?>
<table  width="950px" height="250px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">
	<tr>
    <td colspan="4" style="padding:8px;">
      <table class="table_form" width="100%" border="0" cellpadding="4px" align="center">
        <tr>
            <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document:Official Form</b></td>
            <td width="150px" height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
              <input type="text" id="reference_number" name="reference_number" class="field"/>
              <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
            <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b>REVISION NUMBER</b></td>
            <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
        </tr>
        <tr>
              <td width="150px" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
              <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
              <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b>USER TYPE</b></td>
              <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
        </tr>
      </table>
    </td>
  </tr>
      <div class="modal-body">

  <tr>
    <td colspan="4" style="padding:8px;">
      <table width="100%" border="0" align="center">
          <tr>
      	    <td height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Batch Number</b><span id="batch_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="batch_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
      	    <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="batch_number" name="batch_number" class="field" /></td>
      	    <td height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Certificate Number</b><span id="certificate_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="certificate_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
      	    <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="certificate_number" name="certificate_number" class="field"/></td>
    	    </tr>
        	<tr>
        	    <td height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Card Number</b><span id="card_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="card_number_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	    <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="card_number" name="card_number" class="field"/></td>
        	    <td height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Manufacturer/Supplier</b><span id="manufacturer_supplier_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_supplier_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	    <td style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" id="manufacturer_supplier" name="manufacturer_supplier" class="field"/></td>
        	</tr>
        	</tr>
        	    <td colspan="4" height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Item Description</b><span id="item_description_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="item_description_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	    </tr><tr><td colspan="4" style="padding:8px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><textarea rows="6" cols="90" id="item_description" name="item_description" class="field"></textarea></td>
        	</tr>
        	<tr>
        	    <td colspan="4" height="5px" width="450px" align="left"  style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>MSDS (Material Saftey Data Sheet)</b><span id="msds_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="msds_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	</tr>
        	<tr>
        	    <td colspan="4" style="padding:8px;">
              		<table bgcolor ="#ffffff" width = "100%">
              		    <tr>
              			<td style="background-color:#ffffff;"><input type = "checkbox" name="msds[]" value = "Flammable"> Flammable</td>
              	
              		    </tr>
              		    <tr>
              			<td style="background-color:#ffffff;"><input type = "checkbox" name="msds[]" value = "Toxic"> Toxic </td>
              	
              		    </tr>
              		    <tr>
              			<td style="background-color:#ffffff;;"><input type = "checkbox" name="msds[]" value = "Flammable"> Non-Toxic</td>
              	
              		    </tr>
              		    <tr>
              			<td style="background-color:#ffffff;"><input type = "checkbox" name="msds[]" value = "Toxic"> Corrosive</td>
              	
              		    </tr>
              		</table>
        	    </td>
        	</tr>
        	<tr>
        	    <td colspan="4" height="5px" width="450px" align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Location</b><span id="location_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="location_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	</tr>
        	<tr>
        	   <td colspan="4" style="padding:8px;">
            		<table width="100%" bgcolor="#ffffff">
            		    <tr>
            			<td colspan="2"><input type="radio" name="location" value="Toxic Store"/> Toxic Store</td>
            		    </tr>
            		    <tr>
            			<td colspan="2"><input type="radio" name="location" value="Non-Toxic Store"/> Non-Toxic Store</td>
            		    </tr>
            		    <tr>
            			<td colspan="2"><input type="radio" name="location" value="Inflammable Store"/> Inflammable Store</td>
            		    </tr>
            		    <tr>
            			<td colspan="2"><input type="radio" name="location" value="Fridge"/> Fridge</td>
            		    </tr>
            		</table>
        	    </td>
        	</tr>
        	<tr>
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Package Size</b><span id="reorder_quantity_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="reorder_quantity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" id="package_size" name="package_size" /></td>
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Quantity <input type="text" onChange="calc()" id="quantity" name="quantity"/> <input type="hidden" id="total_quantity" name="total_quantity"/></td> 
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"> <select type="text" name="package_units" >
        	          <option selected></option>
        	          <option value = "Kgs"> Kgs</option>
        	          <option value = "Grams"> Grams</option>
        	          <option value = "Litres"> Litres</option>
        	          <option value = "Mls"> Mls</option></td>
               </select>

        	</tr>
        	<tr>
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Re-order Quantity:</b><span id="reorder_quantity_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="reorder_quantity_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	    <td height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" id="reorder_quantity" name="reorder_quantity"/></td>
              <td colspan="2" height="5px"  align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">
        		  <select type="text" name="reorder_units" >
        	          <option selected></option>
        	          <option value = "Kgs"> Kgs</option>
        	          <option value = "Grams"> Grams</option>
        	          <option value = "Litres"> Litres</option>
        	          <option value = "Mls"> Mls</option>
               </select>
              </td>
        	</tr>
        	<tr>
            <td height="5px"  align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Expiry Date</b><span id="expiry_date_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="expiry_date_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
            <td style="padding:4px;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="datepicker" id="expiry_date" name="expiry_date" class="field" /></td>                
            <td></td>
            <td></td>
          </tr>
        	
        	<tr>
        	    <td colspan="4" height="5px" width="450px" align="left" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Comments</b><span id="comments_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
        	</tr>
        	<tr>
        	    <td colspan="4" style="padding:8px;text-align: center;background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea  rows="4" cols="100" id="comments" name="comments" class="field"/></textarea></td>
        	</tr>
    
          <div class="modal-footer">
            <tr>
              <td colspan="4"  style="padding:8px;background-color:#ffffff;text-align: center;" align="right"><input class = "btn"id ="submit" type="submit" name="submit" value="Submit"/></td>
            </tr>
          </div>
        </table>
      </td>
  </tr> 
  </table>
</div>
</div>