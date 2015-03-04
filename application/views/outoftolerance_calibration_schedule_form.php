<script>
    $(document).ready(function(){
  
        $('#calibration_requirement').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#calibration_requirement_g').show();
            $('#calibration_requirement_r').hide();
          }else{
            $('#calibration_requirement_g').hide();
            $('#calibration_requirement_r').show();
          }
        })
        $('#calibration_schedule_start').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#calibration_schedule_start_g').show();
            $('#calibration_schedule_start_r').hide();
          }else{
            $('#calibration_schedule_start_g').hide();
            $('#calibration_schedule_start_r').show();
          }
        })
        $('#next_calibration_schedule_start').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#next_calibration_schedule_start_g').show();
            $('#next_calibration_schedule_start_r').hide();
          }else{
            $('#next_calibration_schedule_start_g').hide();
            $('#next_calibration_schedule_start_r').show();
          }
        })
        $('#calibration_interval').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#calibration_interval_g').show();
            $('#calibration_interval_r').hide();
          }else{
            $('#calibration_interval_g').hide();
            $('#calibration_interval_r').show();
          }
        })
          
        $('#commentsc').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#commentsc_g').show();
            $('#commentsc_r').hide();
          }else{
            $('#commentsc_g').hide();
            $('#commentsc_r').show();
          }
        });
        $('#submit_c').click(function(){         
            count =0;
            $('.fieldc').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All fields on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>maintenance/save",
                data:$('#calibration_schedule_form').serialize(),
                success:function(data){
                redirect_url = "<?php echo base_url();?>maintenance_records/Get/"
                    data='Success';
                    window.location.href = redirect_url;
                },
                //error:function(){
                   //alert('an error occured'); 
               //}
            })
            }
        })
    });
</script>
<?php echo validation_errors(); ?>
<?php echo form_open('maintenance/saveoutoftolerance',array('id'=>'calibration_schedule_form'));?>
<table class="table_form"  bgcolor="#c4c4ff" width="80%" border="0" cellpadding="4px" align="center">
<input type="hidden" name="id" value="<?php echo $query['id']; ?>"/>
<input type="hidden" name="out_id" value="<?php echo $query['out_id']; ?>"/>
<tr>
  <td colspan="6">
    <table width="98%" class="inner_table" cellpadding="4px" align="center">
      <tr>
          <td rowspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></td>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>Document: Form</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;color:#0000fb;"><b>TITLE: EQUIPMENT CALIBRATION FORM</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;background-color:#ffffff;"><b>REFERENCE:</b></td>
      </tr>
      <tr>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
      </tr>
      <tr>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>USER TYPE</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
      </tr>
    </table>
  </td>
</tr>

<tr>
    <td colspan="6" width="100px" style="text-align:center;background-color:#bbffbb;border-bottom: solid 1px #f4f4f4;color: #0000fb;">
       <b><h4>Equipment Calibration Form</h4></b>
   </td>
</tr>
<tr>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Calibration Requirement</td>
    <td colspan="5" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
      <input type="text" id="calibration_requirement" class="fieldc" size="50" name="calibration_requirement"/><span id="calibration_requirement_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_requirement_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>
</tr>
<tr>
    <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Create Calibration Frequency Schedule</b></td>
</tr>
<tr>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Start Date</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" id="calibration_schedule_start" class="fieldc datepicker"  name="calibration_schedule_start"/><span id="calibration_schedule_start_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>

    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Frequency Interval</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
        <select type="text" id ="calibration_interval" class="fieldc" name="calibration_interval"/>
        <option value="Daily" slected="selected">-----</option>
        <option value="Daily">Daily</option>
        <option value="Monthly">Monthly</option>
        <option value="Yearly">Yearly</option>
        <option value="Anually">Anually</option>
        <option value="Biannually">Biannually</option>
        <option value="Quaterly">Quaterly</option>
        </select>
        <span id="calibration_interval_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_interval_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span>
    </td>
     <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Next Date</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldc datepicker"  id="next_calibration_schedule_start" name="next_calibration_schedule_start"/><span id="next_calibration_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="next_calibration_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
    
</tr>
<tr>
    <td colspan="6">
    <table class ="inner_table" bgcolor="#c4c4ff" width="100%" cellpadding="8px" height="150px" align="center" border="0">
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='Service'>&nbsp;Service </td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification'  value='Check'>&nbsp;Check</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='Withdrawn'>&nbsp;Withdrawn </td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='Relocation'>&nbsp;Relocation</td>
        </tr>
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='General cleaning'>&nbsp;General cleaning</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification'  value='Before use'>&nbsp;Before use </td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='System performance qualification'>&nbsp;System performance qualification</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='After repair and replacement of major component'>&nbsp;After repair and replacement of major component </td>
       </tr>
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='When energy levels are low'>&nbspWhen energy levels are low</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' value='When theres a leakage'>&nbspWhen there's a leakage</td> 
           <td colspan="2" style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification'  value='Calibration with polystyrene film at time of use'>&nbspCalibration with polystyrene film at time of use</td>
           
        </tr>
    </table>
    </td>
</tr>
<tr>
    <td colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Comments</b>
        <span id="commentsc_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="commentsc_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span>
    </td>
</tr>
<tr>
    <td colspan="6" style="padding:8px;text-align: center;background-color:#fdfdfd;border-left:dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
        <textarea type="text" cols="100" rows="4" id="commentsc" class="fieldc" name="comments"/></textarea></td>
</tr>
<tr>
    <td colspan="6" align="center" style="background-color:#ffffff;"><input id="submit_c" class="btn" type="submit" name="submit_c" value="Submit"></td>
</tr>
</table>
