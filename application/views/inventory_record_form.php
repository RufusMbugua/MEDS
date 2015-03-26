<script>
	function calc() {
    var quantity = document.getElementById('quantity').value;
    var quantity_issued =document.getElementById('quantity_issued').value;
        if(quantity > quantity_issued){
        var total = quantity - quantity_issued;
        document.getElementById('balance').value = total;
          }
          else {

                  $('#quantity_issued_e').show();     
          }
  
	}

	//     $(document).ready(function(){
	
 //        $('#requisition').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#requisition_1').show();
 //            $('#requisition_r').hide();
 //          }else{
 //            $('#requisition_1').hide();
 //            $('#requisition_r').show();
 //          }
 //        })
	// $('#lpo').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#lpo_1').show();
 //            $('#lpo_r').hide();
 //          }else{
 //            $('#lpo_1').hide();
 //            $('#lpo_r').show();
 //          }
 //        })
 //        $('#received_by').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#received_by_1').show();
 //            $('#received_by_r').hide();
 //          }else{
 //            $('#received_by_1').hide();
 //            $('#received_by_r').show();
 //          }
 //        })
	// $('#issued_by').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#issued_by_1').show();
 //            $('#issued_by_r').hide();
 //          }
 //          else{
 //            $('#issued_by_1').hide();
 //            $('#issued_by_r').show();
 //          }
 //        })
	// $('#quantity').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#quantity_1').show();
 //            $('#quantity_r').hide();
 //          }else{
 //            $('#quantity_issued_1').hide();
 //            $('#quantity_issued_r').show();
 //          }
 //        })
	
	// $('#balance').change('live',function(){
 //          if ($.trim(this.value)!=""){
 //            $('#balance_1').show();
 //            $('#balance_r').hide();
 //          }else{
 //            $('#balance_1').hide();
 //            $('#balance_r').show();
 //          }
 //        });

	// $('#submit_i').click(function(){         
 //            count =0;
 //            $('.fieldinv').each(function(){
 //               if ($.trim(this.value)=="")
 //               count ++;
 //            });
 //            if(count >0){
 //              alert( count+' All field as on this form are MANDATORY ')
 //               return false;
 //            }else{
              
 //            $.ajax({
 //                type:"post",
 //                url:"<?php echo base_url();?>inventory/save/",
 //                data:$('#inventory_record_form').serialize(),
 //                success:function(data){
	// 	    redirect_url = "<?php echo base_url();?>inventory_records/Get/"
 //                    data='Success';
 //                    window.location.href = redirect_url;
 //                },
 //                //error:function(){
 //                  // alert('an error occured'); 
 //               //}
 //            })
 //            }
 //            })
 //    })

</script>
<div id="form">
  <?php echo validation_errors(); ?>
	<?php echo form_open('inventory/save/'.$id,array('id'=>'inventory_record_form'));?>

  <table class="table_form" width="75%" height="250px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">
  <input type="hidden" name="item_name" value="<?php echo $item_name;?>"/>
  <input type="hidden" name="id" value="<?php echo $id;?>"/>
  <tr>
      <td colspan="8" style="padding:8px;text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'inventory_record/Get/'.$id.'/'.$item_name;?>"><img src="<?php echo base_url().'images/icons/view.png'?>" height="20px" wieght="20px">Back To The Reagent's Inventory List</a></td>
  </tr>
  <tr>
    <td colspan="8" style="padding:8px;text-align:center;">
      <table class="" width="100%"  cellpadding="8px" align="center" border="0">
        <tr>
            <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: Form</b></td>
            <td width="150px" height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
              <input type="text" id="reference_number" name="reference_number" value="MEDS/QC/RE/01-01" class="field"/>
              <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
            <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
            <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
        </tr>
        <tr>
            <td width="150px" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
            <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
            <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
            <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
        </tr>
      </table>
    </td>
  </tr>
	<tr>
      <td colspan="8" align="center" style="text-align:center;background-color:#ffffff;padding:8px;border-bottom: solid 1px #d5d5ff;color: #0000fb;"><b>Reagents Inventory Form</b></td>
	</tr>
	<tr>
		<td height="5px" colspan="2" align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Requisition Number</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="requisition" id = "requisition" class ="fieldinv"/><span id="requisition_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="requisition_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    
	    <td height="5px" colspan="2"align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>LPO</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="lpo" id="lpo" class ="fieldinv"/><span id="lpo_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="lpo_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    
	    </tr>
	<tr>    
	    <td colspan="2"style="align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Received By</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	
	    	<input type="text" name="received_by" id ="received_by" class ="fieldinv"><span id="received_by_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="received_by_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    
	    <td colspan="2"style="align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Issued by</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><input type="text" name="issued_by" id ="issued_by" class ="fieldinv"><span id="issued_by_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="issued_by_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    	    
	</tr>
	<tr>		    
	    <td height="5px" colspan="2"align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Current Quantity</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type = "text" id ="quantity" class ="fieldinv" name ="quantity" value = "<?php echo $query['quantity'];?>" ><span id="quantity_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="quantity_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    	 
	   
	    <td height="5px" colspan="2" align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Quantity Issued</b></td>
	    <td colspan="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type="text" id ="quantity_issued" name="quantity_issued" class ="fieldinv" onChange="calc()")/><span id="quantity_issued_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="quantity_issued_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span><span id="quantity_issued_e" style="color:white;background-color:red;padding:4px;display:none">Enter amount less than Quantity</span></td>    
	    	 
	</tr>
	<tr>
	    <td height="5px" width="300px" align="right"  colspan ="4" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Balance</b></td>
	    <td align="left"  colspan ="4"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type = "text" id ="balance" name ="balance" class ="fieldinv"><span id="balance_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="balance_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>    
	    	
	<div class="modal-footer">
      <tr>
        <td colspan="8"  style="padding:4px;background-color:#ffffff;text-align: center;" align="right"><input class = "btn"id ="submit" type="submit" name="submit" value="Submit"/></td>
      </tr>
      </div> 
    </table>
</div>