<script>
    $(document).ready(function(){  
       
      $('#fifth_reading').change(function(){       
        
         values = [$('#first_reading').val(),$('#second_reading').val(),$('#third_reading').val(),$('#fourth_reading').val(),$('#fifth_reading').val()];
         var highest_value =Math.max.apply(Math,values);
         var lowest_value =Math.min.apply(Math,values);
         minimum =$('#range_from').val()
         maximum =$('#range_to').val()

         // alert(lowest_value)

         if(minimum<=lowest_value && maximum>= highest_value){
          comment = "Within range ";
         // alert(comment)

        }else{
          comment = "Out of range";
        }

         if (maximum <minimum ) {
          alert("Maximum range is less than the minimum range");
          comment = "Check your ranges"
         } 
         
         $('.comment').val(comment);

      }); 
      $('#first_reading').change('live',function(){
          frequency = $('#calibration_interval').val();
          var start_date = $('#calibration_schedule_start').val();
          alert($('#calibration_interval').val())

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
          $('#next_calibration').val(tomorrow);

          if ($.trim(this.value)!=""){
            $('#first_reading_g').show();
            $('#first_reading_r').hide();
          }else{
            $('#first_reading_g').hide();
            $('#first_reading_r').show();
          }
        })      

    });
</script>
<?php echo validation_errors(); ?>
<?php echo form_open('maintenance/save',array('id'=>'calibration_maintenance_form'));?>
<table class="table_form" bgcolor="#c4c4ff" width="80%" border="0" cellpadding="4px" align="center">
<input type="hidden" name="equipment_id" value="<?php echo $query['id']; ?>"/>
<input type="hidden" name="person_reporting" value="<?php echo $user['logged_in']['fname'].' '.$user['logged_in']['lname'] ?>"/>
<input type="text" name="calibration_interval" id="calibration_interval" value="<?php echo $query['calibration_interval_start']; ?>"/>
<input type="text" name="next_date" id="next_calibration"/>
<tr>
  <td colspan="6">
    <table class="table_form" width="100%" bgcolor="#ffffff" cellpadding="4px" border="0" align="center">     
    <tr>
        <td rowspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="70px" width="90px"/></td>
        <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">Document: Form</td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;color:#0000fb;">TITLE: EQUIPMENT CALIBRATION FORM</td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">REFERENCE:</td>
    </tr>
    <tr>
        <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">REVISION NUMBER</td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">PAGE 1 of 1</td>
    </tr>
    <tr>
        <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">Form Authorized By:</td>
        <td style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;">USER TYPE</td>
        <td colspan="2" style="padding:4px;border-left: solid 1px #bfbfbf;border-bottom: solid 1px #bfbfbf;background-color:#ffffff;"><?php echo("".$user['logged_in']['role']);?></td>
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
  <td colspan="6">
    <table class="table_form" width="100%" bgcolor="#ffffff" cellpadding="4px" border="0" align="center">     
    
    <tr>
        <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Start Date</td>
        <td style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;"><input type="text" id="calibration_schedule_start" class="fieldc" value="<?php echo date("m/d/Y"); ?>"  name="calibration_date"/><span id="calibration_schedule_start_g" style="color:Green; display:none;"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="calibration_schedule_start_r" style="color:white;background-color:red;padding:4px;display:none;">field required</span></td>        
    </tr>
    <tr>
        <td colspan="6" style="padding:8px;background-color:#ffffff;border-left: solid 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">Service Type</td>
    </tr>
    <tr>
        <td colspan="6">
        <table class ="inner_table" bgcolor="#c4c4ff" width="98%" cellpadding="8px" height="150px" align="center" border="0">
            <tr>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='Service'>Service </td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification'  value='Check'>Check</td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='Withdrawn'>Withdrawn </td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='Relocation'>Relocation</td>
           </tr>
            <tr>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='General cleaning'>General cleaning</td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification'  value='Before use'>Before use </td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='System performance qualification'>System performance qualification</td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='After repair and replacement of major component'>After repair and replacement of major component </td>
            </tr>
            <tr>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='When energy levels are low'>When energy levels are low</td>
               <td style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='specification' value='When theres a leakage'>When there's a leakage</td> 
               <td colspan="2" style="padding:8px;background-color:#ffffff;"><input type='checkbox' name='calibration_specification'  value='Calibration with polystyrene film at time of use'>Calibration with polystyrene film at time of use</td>
               
            </tr>
        </table>
        </td>
    </tr>
     <tr>
      <td colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Equipment Readings</b>           
    <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">First Reading</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="first_reading" id="first_reading"><span id="first_reading_g" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="first_reading_r" style="color:white;background-color:red;padding:4px;display:none">field required</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">Second Reading</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="second_reading" id="second_reading"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">Third Reading</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="third_reading" id="third_reading"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">Fourth Reading</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="fourth_reading" id="fourth_reading"></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">Fifth Reading</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="fifth_reading" id="fifth_reading"></td>
    </tr>
   <tr>
      <td colspan="2" align="center" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;">Standard Reading Range</td>
      <td colspan="4" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><input type="text" name="range_from" id="range_from" value="<?php echo $query['range_from']; ?>"> to <input type="text" name="range_to" id="range_to" value="<?php echo $query['range_to']; ?>"></td>
    </tr>
    <tr>
      <td colspan="6" style="padding:8px;background-color:#ffffff;border-bottom: dotted 1px #bfbfbf; border-right: dotted 1px #bfbfbf;"><b>Comments</b></td>    
    </tr>
    <tr>
        <td colspan="6"style="padding:8px;text-align: center;background-color:#fdfdfd;border-left:dashed 1px #bfbfbf;border-bottom: dotted 1px #bfbfbf;">
            <textarea type="text" cols="100" rows="4" id="commentsc" class="fieldc comment" name="comments"/></textarea></td>
    </tr>
    </table>
  </td>
</tr>
<tr>
    <td colspan="6" align="center" style="background-color:#ffffff;"><input  id="submit_cm" class="btn" type="submit" name="submit_cm" value="Submit"></td>
</tr>
</table>
