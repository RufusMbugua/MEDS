<script>
    $(document).ready(function(){
	
        $('#maintenance_requirement').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#maintenance_requirement_g').show();
            $('#maintenance_requirement_r').hide();
          }else{
            $('#maintenance_requirement_g').hide();
            $('#maintenance_requirement_r').show();
          }
        })
	$('#maintenance_schedule_start').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#maintenance_schedule_start_g').show();
            $('#maintenance_schedule_start_r').hide();
          }else{
            $('#maintenance_schedule_start_g').hide();
            $('#maintenance_schedule_start_r').show();
          }
        })
        $('#next_maintenance_schedule_start').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#next_maintenance_schedule_start_g').show();
            $('#next_maintenance_schedule_start_r').hide();
          }else{
            $('#next_maintenance_schedule_start_g').hide();
            $('#next_maintenance_schedule_start_r').show();
          }
        })
        $('#maintenance_interval').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#maintenance_interval_g').show();
            $('#maintenance_interval_r').hide();
          }else{
            $('#maintenance_interval_g').hide();
            $('#maintenance_interval_r').show();
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
	$('#submit_m').click(function(){         
            count =0;
            $('.fieldp').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All field as on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>maintenance/save",
                data:$('#performance_form').serialize(),
                success:function(data){
		    redirect_url = "<?php echo base_url();?>maintenance_records/Get/"
                    data='Success';
                    window.location.href = redirect_url;
                },
                //error:function(){
                  // alert('an error occured'); 
               //}
            })
            }
        })
    });
</script>
<?php echo validation_errors(); ?>
<?php echo form_open('maintenance/saveoutoftolerance',array('id'=>'performance_form'));?>
<table class="table_form"  bgcolor="#c4c4ff" width="1080px" border="0" cellpadding="4px" align="center">
<input type="hidden" name="id" value="<?php echo $query['id']; ?>"/>
<input type="hidden" name="out_id" value="<?php echo $query['out_id']; ?>"/>
<tr>
  <td colspan="6">
    <table class="inner_table" width="98%" cellpadding="4px" align="center">
      <tr>
          <td rowspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></td>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>Document: Form</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;color:#0000fb;"><b>TITLE: EQUIPMENT MAINTENANCE FORM</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>REFERENCE:</b></td>
      </tr>
      <tr>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
      </tr>
      <tr>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>Form Authorized By:</b></td>
          <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><b>USER TYPE</b></td>
          <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
    <td colspan="6" width="100px" style="text-align:center;background-color:#bbffbb;border-bottom: solid 1px #f4f4f4;color: #0000fb;">
       <b><h4>Equipment Maintenance Form</h4></b>
   </td>
</tr>
<tr>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Maintenance Requirement</td>
    <td colspan="5" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker" id="maintenance_requirement" name="maintenance_requirement" size="50"/><span id="maintenance_requirement_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="maintenance_requirement_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
</tr>
<tr>
    <td colspan="6" height="20px" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Create Maintenance Frequency Schedule</b></td>
</tr>
<tr>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Start Date</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker"  id="maintenance_schedule_start" name="maintenance_schedule_start"/><span id="maintenance_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="maintenance_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Frequency Interval</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
        <select type="text" id="maintenance_interval" class="fieldp" name="maintenance_interval"/>
        <option value="" slected="selected">-----</option>
        <option value="Daily">Daily</option>
        <option value="Weekly">Weekly</option> 
        <option value="Monthly">Monthly</option>
        <option value="Anually">Anually</option>
        <option value="Biannually">Biannually</option>
        <option value="Quaterly">Quaterly</option>
        </select>
        <span id="maintenance_interval_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="maintenance_interval_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span>
    </td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Next Date</td>
    <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker"  id="next_maintenance_schedule_start" name="next_maintenance_schedule_start"/><span id="next_maintenance_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="next_maintenance_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
    
</tr>
<tr>
    <td colspan="6">
    <table class ="inner_table" bgcolor="#c4c4ff" width="100%" cellpadding="8px" height="150px" align="center" border="0">
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Check'>&nbsp;Check</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Service'>&nbsp;Service</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Withdrawn'>&nbsp;Withdrawn</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Relocation'>&nbsp;Relocation</td>
        </tr>
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='General cleaning'>&nbsp;General cleaning</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Before use'>&nbsp;Before use</td>       
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='When theres a leakage'>&nbsp;When there's a leakage</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='When energy levels are low'>&nbsp;When energy levels are low</td>
        </tr>
        <tr>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='System performance qualification'>&nbsp;System performance qualification</td>
           <td style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='After repair and replacement of major component'>&nbsp;After repair and replacement of major component</td>
           <td colspan="2" style="background-color:#ffffff;"><input type='checkbox' name='maintenance_specification' id='' value='Calibration with polystyrene film at time of use'>&nbsp;Calibration with polystyrene film at time of use</td>
           
            
        </tr>
    </table>
    </td>
</tr>
<tr>
    <td colspan="6" height="20px" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Comments</b><span id="comments_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
</tr>
<tr>
    <td colspan="6" style="padding:8px;text-align: center;background-color:#fdfdfd;border-left:dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="100" rows="4" id="comments" class="fieldp" name="comments"/></textarea></td>
</tr>
<tr>
    <td colspan="6" align="center" style="background-color:#ffffff;"><input type="submit" class="btn" id="submit_m" name="submit_m" value="Submit"></td>
</tr>
</table>
</form>
