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
          frequency = $('#maintenance_interval').val();
          var start_date = $('#maintenance_schedule_start').val();

          if (frequency == "Daily") {
            var tomorrow = new Date(start_date);
            tomorrow.setDate(tomorrow.getDate() + 1);           

          }else if (frequency == "Monthly") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 1);
            
          }else if (frequency == "Quaterly") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 4);
            
          }else if (frequency == "Biannually") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 6);
            
          }else if (frequency == "Yearly") {
            var tomorrow = new Date(start_date);
            tomorrow.setYear(tomorrow.getYear() + 1);
          }

          $('#next_maintenance_schedule_start').val(tomorrow);

          if ($.trim(this.value)!=""){
            $('#maintenance_interval_g').show();
            $('#maintenance_interval_r').hide();
          }else{
            $('#maintenance_interval_g').hide();
            $('#maintenance_interval_r').show();
          }
        })
$('#calibration_interval').change('live',function(){
          frequency = $('#calibration_interval').val();
          var start_date = $('#calibration_schedule_start').val();

          if (frequency == "Daily") {
            var tomorrow = new Date(start_date);
            tomorrow.setDate(tomorrow.getDate() + 1);           

          }else if (frequency == "Monthly") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 1);
            
          }else if (frequency == "Quaterly") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 4);
            
          }else if (frequency == "Biannually") {
            var tomorrow = new Date(start_date);
            tomorrow.setMonth(tomorrow.getMonth() + 6);
            
          }else if (frequency == "Yearly") {
            var tomorrow = new Date(start_date);
            tomorrow.setYear(tomorrow.getYear() + 1);
          }

          $('#next_calibration_schedule_start').val(tomorrow);

          if ($.trim(this.value)!=""){
            $('#calibration_interval_g').show();
            $('#calibration_interval_r').hide();
          }else{
            $('#calibration_interval_g').hide();
            $('#calibration_interval_r').show();
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
        });
    $("#maintenance_btn").click(function(){
        $("#maintenance_table").toggle();
      }); 
    $("#calibration_btn").click(function(){
        $("#calibration_table").toggle();
      }); 
    });
</script>

<div id="maintenance">
<?php echo validation_errors(); ?>
<?php echo form_open('maintenance/save',array('id'=>'performance_form'));?>
<table class="table_form" bgcolor="#c4c4ff" width="98%"  border="0" cellpadding="4px" align="center">
<input type="hidden" name="id" value="<?php echo $query['id']; ?>"/>
<tr>
  <td colspan="6">
    <table class="table_form" width="100%" bgcolor="#ffffff" cellpadding="4px" border="0" align="center">
      <tr>
        <td rowspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></td>
        <td style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">Document: Form</td>
        <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;color:#0000fb;">TITLE: EQUIPMENT MAINTENANCE FORM</td>
        <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">REFERENCE:</td>
      </tr>
      <tr>
          <td style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
          <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">REVISION NUMBER</td>
          <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">PAGE 1 of 1</td>
      </tr>
      <tr>
          <td style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
          <td style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
          <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">USER TYPE</td>
          <td colspan="2" style="border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo("".$user['logged_in']['role']);?></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
    <td colspan="6" width="100px" style="text-align:center;background-color:#bbffbb;border-bottom: solid 1px #f4f4f4;color: #0000fb;">
       <b><h4>Equipment Maintenance and Calibration Schedule Form</h4></b>
   </td>
</tr>
  <tr>
    <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="button" id="maintenance_btn" class="btn" value="+"> Maintenance</td>
  </tr>
  <tr>
    <td colspan="6">
    <div style="display:none" id="maintenance_table">
      <table class="table_form" width="98%" bgcolor="#ffffff" cellpadding="4px" border="0" align="center">
      <tr>
          <td colspan="2" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Maintenance Requirement</td>
          <td colspan="4" style="padding:8px;background-color:#ffffff;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp" id="maintenance_requirement" name="maintenance_requirement" size="50"/><span id="maintenance_requirement_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="maintenance_requirement_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
      </tr>
      <tr>
          <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Create Maintenance Frequency Schedule</b></td>
      </tr>
      <tr>
          <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Start Date</td>
          <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker"  id="maintenance_schedule_start" name="maintenance_schedule_start"/><span id="maintenance_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="maintenance_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
          <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Frequency Interval</td>
          <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
              <select type="text" id="maintenance_interval" class="fieldp" name="maintenance_interval">
              <option value="" slected="selected">-----</option>
              <option value="Daily">Daily</option>  
              <option value="Monthly">Monthly</option>
              <option value="Yearly">Yearly</option>
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
        <td colspan="6" height="20px" style="padding:8px;background-color:#ffffff;border-top: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Comments</b><span id="comments_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
      </tr>
      <tr>
        <td colspan="6" style="padding:8px;text-align: center;background-color:#fdfdfd;border-left:dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="100" rows="4" id="maintenance_comments" class="fieldp" name="maintenance_comments"/></textarea></td>
      </tr> 
    </table>
    </div> 
    </td>
  </tr>
  <tr>
     <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="button"  id="calibration_btn" class="btn" value="+"> Calibration</td>
  </tr>
  <tr>
        <td colspan="6">
        <div class="hide_data" id="calibration_table">
          <table class="table_form" width="98%" bgcolor="#ffffff" cellpadding="4px" border="0" align="center">

          <tr>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Calibration Requirement</td>
              <td colspan="5" style="padding:8px;background-color:#ffffff;border-left: dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp" id="calibration_requirement" name="calibration_requirement" size="50"/><span id="calibration_requirement_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_requirement_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
          </tr>
          <tr>
              <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><b>Create Calibration Frequency Schedule</b></td>
          </tr>
          <tr>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Start Date</td>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker"  id="calibration_schedule_start" name="calibration_schedule_start"/><span id="calibration_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Frequency Interval</td>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
                  <select type="text" id="calibration_interval" class="fieldp" name="calibration_interval">
                  <option value="" slected="selected">-----</option>
                  <option value="Daily">Daily</option>  
                  <option value="Monthly">Monthly</option>
                  <option value="Yearly">Yearly</option>
                  <option value="Biannually">Biannually</option>
                  <option value="Quaterly">Quaterly</option>
                  </select>
                  <span id="calibration_interval_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_interval_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span>
              </td>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Next Date</td>
              <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" class="fieldp datepicker"  id="next_calibration_schedule_start" name="next_calibration_schedule_start"/><span id="next_calibration_schedule_start_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="next_calibration_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none">Field Required</span></td>
              
          </tr>
          <tr>
              <td colspan="6">
              <table class ="inner_table" bgcolor="#c4c4ff" width="100%" cellpadding="8px" height="150px" align="center" border="0">
                  <tr>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Check'>&nbsp;Check</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Service'>&nbsp;Service</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Withdrawn'>&nbsp;Withdrawn</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Relocation'>&nbsp;Relocation</td>
                  </tr>
                  <tr>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='General cleaning'>&nbsp;General cleaning</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Before use'>&nbsp;Before use</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='When theres a leakage'>&nbsp;When there's a leakage</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='When energy levels are low'>&nbsp;When energy levels are low</td>
                  </tr>
                  <tr>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='System performance qualification'>&nbsp;System performance qualification</td>
                     <td style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='After repair and replacement of major component'>&nbsp;After repair and replacement of major component</td>
                     <td colspan="2" style="background-color:#ffffff;"><input type='checkbox' name='calibration_specification' id='' value='Calibration with polystyrene film at time of use'>&nbsp;Calibration with polystyrene film at time of use</td>               
                      
                  </tr>
              </table>
              </td>
          </tr>
          <tr>
            <td colspan="6" height="20px" style="padding:8px;background-color:#ffffff;border-top: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Comments</b><span id="calibration_comments_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_comments_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
          </tr>
          <tr>
            <td colspan="6" style="padding:8px;text-align: center;background-color:#fdfdfd;border-left:dotted 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><textarea type="text" cols="100" rows="4" id="calibration_comments" class="fieldp" name="calibration_comments"/></textarea></td>
          </tr>          
      </table>      
      </div>
    </td>
  </tr>
  <tr>
    <td colspan="6" align="center" style="background-color:#ffffff;"><input type="submit" class="btn" id="submit_c" name="submit" value="Submit"></td>
    </tr>
</table>
</form>
</div>