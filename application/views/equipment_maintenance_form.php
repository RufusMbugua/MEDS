<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
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
<script>
    $(document).ready(function(){
	$('#reference_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#reference_number_1').show();
            $('#reference_number_r').hide();
          }else{
            $('#reference_number_1').hide();
            $('#reference_number_r').show();
          }
        })
  $('#id_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#id_number_g').show();
            $('#id_number_r').hide();
          }else{
            $('#id_number_g').hide();
            $('#id_number_r').show();
          }
        })
	$('#serial_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#serial_number_g').show();
            $('#serial_number_r').hide();
          }else{
            $('#serial_number_g').hide();
            $('#serial_number_r').show();
          }
        })
	$('#manufacturer').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#manufacturer_g').show();
            $('#manufacturer_r').hide();
          }else{
            $('#manufacturer_g').hide();
            $('#manufacturer_r').show();
          }
        })
        $('#model').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#model_g').show();
            $('#model_r').hide();
          }else{
            $('#model_g').hide();
            $('#model_r').show();
          }
        })
        $('#description').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#description_g').show();
            $('#description_r').hide();
          }else{
            $('#description_g').hide();
            $('#description_r').show();
          }
        })
	$('#comments').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#comments_g').show();
            $('#comments_r').hide();
          }else{
            $('#comments_g').hide();
            $('#comments_r').show();
          }
        });
	$('#submit').click(function(){         
      //       count =0;
      //       $('.field').each(function(){
      //          if ($.trim(this.value)=="")
      //          count ++;
      //       });
      //       if(count >0){
      //         alert( count+' All field as on this form are MANDATORY ')
      //          return false;
      //       }else{
              
      //       $.ajax({
      //           type:"post",
      //           url:"<?php echo base_url();?>equipment_maintenance/save",
      //           data:$('#equipment_maintenance_form').serialize(),
      //           success:function(data){
		    // redirect_url = "<?php echo base_url();?>equipment_maintenance_records/Get/"
      //               data='Success';
      //               window.location.href = redirect_url;
      //           },
      //           //error:function(){
      //              //alert('an error occured'); 
      //          //}
      //       })
      //       }
        })
    });
</script>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="equipment">MEDS Equipment Maintenance Form</h4>
</div>
 <?php echo validation_errors(); ?>
 <?php echo form_open('maintenance/save',array('id'=>'equipment_maintenance_form'));?>
<table bgcolor="#c4c4ff" width="100%" border="0" cellpadding="8px" align="center">
  <div class="modal-body">  
  <tr>
    <td style="padding:8px;text-align:center;">
      <table class="" width="100%"  cellpadding="8px" align="center" border="0">
        <tr>
            <td rowspan="2" style="padding:4px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>Document: Form</b></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
            <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
              <input type="text" id="reference_number" name="reference_number" class="field"/>
              <span id="reference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
              <span id="reference_number_r" style="color:red; display:none">Fill this field</span>
            </td>
        </tr>
        <tr>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
        </tr>
        <tr>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
            <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
            <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="padding:8px;text-align:center;">
      <table class="" width="100%"  cellpadding="8px" align="center" border="0">
          <tr>
              <td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">ID Number</td>
              <td style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" size="30" id="id_number" class="field" name="id_number"/><span id="id_number_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="id_number_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
              <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Serial Number</td>
              <td style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" size="30" id="serial_number" class="field" name="serial_number"/><span id="serial_number_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="serial_number_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
        	</tr>
          <tr>
              <td align="left" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Manufacturer</td>
              <td style="padding:4px;background-color:#ffffff;"><input type="text" size="30" id="manufacturer" class="field" name="manufacturer"/><span id="manufacturer_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
              <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Model</td>
              <td style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" size="30" id="model" class="field" name="model"/><span id="model_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="model_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
          </tr>
          <tr>
              <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Equipment Type</td>
              <td style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><select name="equipment_type" id="equipment_type">
                <option>-----------</option>
                <option value="balance">Balances</option>
                <option value="temperature">Temperature Equipment</option>
                <option value="ph_meter">pH Meter</option>
                <option value="other">Other</option>
              </select></td>
              <td align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Calibration Readings</td>
              <td style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><input type="text" name="std_range_from" id="std_range_from" size="10"> to <input type="text" name="std_range_to" id="std_range_to" size="10"></td>
          </tr>
          <tr>
        	    <td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Description<span id="maintenance_description" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="description_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
        	    <td colspan="2" align="left"  style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;">Comments<span id="maintenance_comments" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="comments_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
        	</tr>
        	<tr>
        	    <td colspan="2" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="50" rows="4" id="description" class="field" name="description"></textarea></td>
        	    <td colspan="2" style="padding:4px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="50" rows="4" id="comments" class="field" name="comments"></textarea></td>
          </tr>   
      </table>
    </td>
  </tr>
  </div>
  <div class="modal-footer">
  <tr>
      <td style="padding:4px;background-color:#ffffff;text-align: center;"><input  id="submit" class="btn" type="submit" name="submit" value="Submit"></td>
  </tr>
  </div>
  </table>
  </form>
  </div> 
</div>
