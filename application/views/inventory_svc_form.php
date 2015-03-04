<div id="analysis_request" class="analysis_request" >
	<script>
	// function calc() {
 //  	var total = document.getElementById('quantity').value - document.getElementById('quantity_issued').value;
 //  	document.getElementById('balance').value = total;
	
	// }
	$(document).ready(function(){
        $('#quantity_issued').keyup(function(){
          $('#balance').val(($('#quantity').val()-$('#quantity_issued').val()).toFixed(2));
          alert('gfd');
        });
	
        $('#requisition').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#requisition_1').show();
            $('#requisition_r').hide();
          }else{
            $('#requisition_1').hide();
            $('#requisition_r').show();
          }
        })
    	$('#lpo').change('live',function(){
              if ($.trim(this.value)!=""){
                $('#lpo_1').show();
                $('#lpo_r').hide();
              }else{
                $('#lpo_1').hide();
                $('#lpo_r').show();
    lpo_r          }
        })
        $('#received_by').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#received_by_1').show();
            $('#received_by_r').hide();
          }else{
            $('#received_by_1').hide();
            $('#received_by_r').show();
          }
        })
	$('#issued_by').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#issued_by_1').show();
            $('#issued_by_r').hide();
          }else{
            $('#issued_by_1').hide();
            $('#issued_by_r').show();
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
        })
	$('#quantity_issued').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#quantity_issued_1').show();
            $('#quantity_issued_r').hide();
          }else{
            $('#quantity_issued_1').hide();
            $('#quantity_issued_r').show();
          }
        })
	$('#balance').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#balance_1').show();
            $('#balance_r').hide();
          }else{
            $('#balance_1').hide();
            $('#balance_r').show();
          }
        });
	$('#submit_i').click(function(){         
            count =0;
            $('.fieldis').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All field as on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>inventory_standard_vial_card/save",
                data:$('#inventory_svc_form').serialize(),
                success:function(data){
		    redirect_url = "<?php echo base_url();?>inventory_svc_records/Get/"
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
	 <?php echo validation_errors(); ?>
    <?php echo form_open('inventory_standard_vial_card/save/',array('name'=>'inventory_svc_form'));?>
    <form action="<?php echo base_url().'inventory_standard_vial_card/save/'?>" method="POST" >
    <table class="table_form" width="950px" height="250px" bgcolor="#c4c4ff" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="item_name" value="<?php echo $item_name;?>"/>
<tr>	    <td colspan="12" style="text-align:right;background-color:#ffffff;text-color:#00ff00;"><a href="<?php echo base_url().'inventory_standard_vial_card/get/'.$id.'/'.$item_name;?>"><img src="<?php echo base_url().'images/icons/back.png'?>" height="20px" wieght="20px"><b>Back</b></a></td>
	</tr>
	<tr>
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <tr>
	    <td colspan="8" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 10px #d5d5ff;color: #0000fb;background-color: #e8e8ff;">
                <b><h3>Standard Vial Card Inventory Form</h3></b>
            </td>
	</tr>
	<tr>
		<td height="5px" colspan ="2" align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Requisition Number</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="requisition" id ="requisition" class = "fieldis"/>
	    	<span id="requisition_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="requisition_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td> 

	    <td height="5px"colspan ="2" align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>LPO</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="lpo" id ="lpo"class = "fieldis"/>
	    	<span id="lpo_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="lpo_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
	    </tr>
	<tr>    
	    <td colspan ="2"style="align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Received By</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="received_by" id ="recieved_by"class = "fieldis">
	    	<span id="received_by_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="received_by_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>

	    <td colspan ="2"style="align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;"><b>Issued by</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;border-top: dotted 1px #bfbfbf;">
	    	<input type="text" name="issued_by" id ="issued_by" class = "fieldis">
	    	<span id="issued_by_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="issued_by_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
	    
	</tr>
	<tr>		    
	    <td height="5px" colspan ="2"align="left"  style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Current Quantity</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type = "text" id ="quantity" name ="quantity" class = "fieldis" value = "<?php echo $query['quantity'];?>" >
	    	<span id="quantity_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="quantity_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
	   
	    <td height="5px" colspan ="2"align="left" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Quantity Issued</b></td>
	    <td colspan ="2"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type="text" id ="quantity_issued" name="quantity_issued" class = "fieldis" onChange="calc()")/>
	    	<span id="quantity_issued_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="quantity_issued_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
	</tr>
	<tr>
	    <td height="5px" width="300px" align="right"  colspan ="4" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Balance</b></td>
	    <td align="left"  colspan ="4"style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
	    	<input type = "text" id ="balance" name ="balance" class = "fieldis">
	    	<span id="balance_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
	    	<span id="balance_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>

	</tr>
	<tr>
	    <td  style="background-color:#ffffff;text-align: center;" colspan="8" ><input id ="submit_i" type="submit" name="submit_i" value="Submit"></td>
	</tr>
    </table>
</div>