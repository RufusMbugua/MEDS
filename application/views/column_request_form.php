<script>
    $(document).ready(function(){
        $('#column_type').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#column_type_1').show();
            $('#id_number_r').hide();
          }else{
            $('#column_type_1').hide();
            $('#column_type_r').show();
          }
        })
        $('#serial_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#serial_number_1').show();
            $('#serial_number_r').hide();
          }else{
            $('#serial_number_1').hide();
            $('#serial_number_r').show();
          }
        })
        $('#column_dimensions').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#column_dimensions_1').show();
            $('#column_dimensions_r').hide();
          }else{
            $('#column_dimensions_1').hide();
            $('#column_dimensions_r').show();
          }
        })
        $('#manufacturer').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#manufacturer_1').show();
            $('#manufacturer_r').hide();
          }else{
            $('#manufacturer_1').hide();
            $('#manufacturer_r').show();
          }
        })
        $('#column_status').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#column_status_1').show();
            $('#column_status_r').hide();
          }else{
            $('#column_status_1').hide();
            $('#column_status_r').show();
          }
        })
	$('#column_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#column_number_1').show();
            $('#column_number_r').hide();
          }else{
            $('#column_number_1').hide();
            $('#column_number_r').show();
          }
        })
	$('#reserved_for').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#reserved_for_1').show();
            $('#reserved_for_r').hide();
          }else{
            $('#reserved_for_1').hide();
            $('#reserved_for_r').show();
          }
        })
	$('#issued_to').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#issued_to_1').show();
            $('#issued_to_r').hide();
          }else{
            $('#issued_to_1').hide();
            $('#issued_to_r').show();
          }
        })
	$('#comment').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#comment_1').show();
            $('#comment_r').hide();
          }else{
            $('#comment_1').hide();
            $('#comment_r').show();
          }
        });
        $('#submit').click(function(){         
            count =0;
            $('.field').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count>0){
              alert(count+'Fields Not filled')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>columns_request/save",
                data:$('#column_request_form').serialize(),
                success:function(data){
                    data='Success';
                    alert(data);
                },
                error:function(){
                   alert('an error occured'); 
                }
                
            })
           
            }
           
            })
        })
</script>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="meds">Columns Record Form</h4>

    <?php echo validation_errors(); ?>
    <?php echo form_open('columns_request/save',array('id'=>'column_request_form'));?>
<table class="" width="100%" bgcolor="#c4c4ff" border="0" cellpadding="4" align="center">
  <tr>
    <td colspan="8" style="padding:8px;">
      <table width="100%" align="center">
        <tr> 
          <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
          <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>DOCUMENT: OFFICIAL FORM</b></td>
          <td width="150px" height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
          <td colspan="3" style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
            <input type="text" id="reference_number" name="reference_number" value="MEDS/QC/RE/01-01" class="field"/>
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
  </div>
  <tr>
      <td colspan="8" height="25px" align="center" style="border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #c4c4ff;">
      </td>
  </tr>
      <tr>
    <td colspan="8" style="padding:8px;text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #f0f0ff;color: #0000fb;background-color: #ffffff;"></td>
      </tr>
      <div class="modal-body">
	<tr>
	    <td colspan="8" align="center" style="text-align:center;background-color:#ffffff;padding-right:40px;border-bottom: solid 1px #ffffff;color: #0000fb;background-color: #e8e8ff;">
      </td>
	</tr>
  <tr>
      <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Column Name</b></td>
      <td colspan ="2" style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="column_name" id="column_name" class="field"/><span id="column_type_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="column_type_r" style="color:red; display:none">Fill this</span></td>
  
      <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Laboratory Number</b></td>
      <td colspan ="3" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="laboratory_number" id="laboratory_number" class="field"/><span id="serial_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="serial_number_r" style="color:red; display:none">Fill this</span></td>   
  </tr>
	<tr>
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Column Type</b></td>
	    <td colspan ="2" style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="column_type" id="column_type" class="field"/><span id="column_type_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="column_type_r" style="color:red; display:none">Fill this</span></td>
	
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Serial Number</b></td>
	    <td colspan ="3" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="serial_number" id="serial_number" class="field"/><span id="serial_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="serial_number_r" style="color:red; display:none">Fill this</span></td>   
	</tr>
	<tr>
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Column Dimensions</b></td>
	    <td colspan ="2" style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="column_dimensions" id="column_dimensions" class="field"/><span id="column_dimensions_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="column_dimensions_r" style="color:red; display:none">Fill this</span></td>
	
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Manufacturer</b></td>
	    <td colspan ="3"style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="manufacturer" id="manufacturer" class="field"/><span id="manufacturer_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="manufacturer_r" style="color:red; display:none">Fill this</span></td>
	</tr>
	<tr>
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Column Status</b></td>
	    <td colspan ="2" style="background-color:#ffffff;border-right: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="column_status" id="column_status" class="field"/><span id="column_status_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="column_status_r" style="color:red; display:none">Fill this</span></td>
	
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Column Number</b></td>
	    <td colspan ="3"style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="column_number" id="column_number" class="field"/><span id="column_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="column_number_r" style="color:red; display:none">Fill this</span></td>

	</tr>
  <tr>
	    <td style="padding:4px; text-align:left;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><b>Comment</b></td><span id="comment_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="20px" width="20px"></span><span id="comment_r" style="color:red; display:none">Fill this</span>
	</tr>
  <tr>
      <td colspan="8" style="background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><textarea cols="50" rows="4" name="comment" id="comment" class="field"></textarea></td>
  </tr>
	  <div class="modal-footer">
      <tr>
        <td colspan="8"  style="padding:4px;background-color:#ffffff;text-align: center;" align="right"><input class = "btn"id ="submit" type="submit" name="submit" value="Submit"/></td>
      </tr>
      </div> 
    </table>
</div>