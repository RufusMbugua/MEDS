<script>
       
    $(document).ready(function(){
            $( "#applicant_name" ).autocomplete({
                source: function(request, response) {
                    $.ajax({ url: "http://localhost/MEDS/test_request/suggestions",
                    data: { term: $("#applicant_name").val()},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                    $.each(data,function(i,jsondata){
                        $("#id").val(jsondata.id)
                        $("#applicant_name").val(jsondata.applicant_name)
                        $("#applicant_address").val(jsondata.applicant_address)
                        $("#applicant_reference_number").val(jsondata.applicant_ref_number)
                  			$("#authorizing_name").val(jsondata.authorizing_name)
                        
                    });
                    response(data);
                    }
                });
            },
            minLength: 2,
		
                Delay : 200
            });
	    
   
	
        $('#applicant_name').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#applicant_name_1').show();
             $('#applicant_name_r').hide();
          }else{
             $('#applicant_name_r').show();
            $('#applicant_name_1').hide();
          }
        })
        $( '#applicant_address' ).autocomplete()
             $('#applicant_address').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#applicant_address_1').show();
             $('#applicant_address_r').hide();
          }else{
             $('#applicant_address_r').show();
            $('#applicant_address_1').hide();
          }
        })
        $('#active_ingredients').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#active_ingredients_1').show();
            $('#active_ingredients_r').hide();
          }else{
            $('#active_ingredients_1').hide();
            $('#active_ingredients_r').show();
          }
        })
        $('#manufacturer_name').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#manufacturer_name_1').show();
            $('#manufacturer_name_r').hide();
          }else{
            $('#manufacturer_name_1').hide();
            $('#manufacturer_name_r').show();
          }
        })
        $('#manufacturer_address').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#manufacturer_address_1').show();
            $('#manufacturer_address_r').hide();
          }else{
            $('#manufacturer_address_1').hide();
            $('#manufacturer_address_r').show();
          }
        })
        $('#brand_name').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#brand_name_1').show();
            $('#brand_name_r').hide();
          }else{
            $('#brand_name_1').hide();
            $('#brand_name_r').show();
          }
        })
       
        $('#batch_lot_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#batch_lot_number_1').show();
            $('#batch_lot_number_r').hide();
          }else{
            $('#batch_lot_number_1').hide();
            $('#batch_lot_number_r').show();
          }
        })
        
        $('#expiry_retest_date').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#expiry_retest_date_1').show();
            $('#expiry_retest_date_r').hide();
          }else{
            $('#expiry_retest_date_1').hide();
            $('#expiry_retest_date_r').show();
          }
        })
        
        $('#quantity_submitted').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#quantity_submitted_1').show();
            $('#quantity_submitted_r').hide();
          }else{
            $('#quantity_submitted_1').hide();
            $('#quantity_submitted_r').show();
          }
        })
        $('#sample_source').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#sample_source_1').show();
            $('#sample_source_r').hide();
          }else{
            $('#sample_source_1').hide();
            $('#sample_source_r').show();
          }
        })
        $('#authorizing_name').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#authorizing_name_1').show();
            $('#authorizing_name_r').hide();
          }else{
            $('#authorizing_name_1').hide();
            $('#authorizing_name_r').show();
          }
        })
        $('#designation').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#designation_1').show();
            $('#designation_r').hide();
          }else{
            $('#designation_1').hide();
            $('#designation_r').show();
          }
        })
	$('#lab_reg_number').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#lab_reg_number_1').show();
            $('#lab_reg_number_r').hide();
          }else{
            $('#lab_reg_number_1').hide();
            $('#lab_reg_number_r').show();
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
	$('#findings_comment').change('live',function(){
          if ($.trim(this.value)!=""){
            $('#findings_comment_1').show();
            $('#findings_comment_r').hide();
          }else{
            $('#findings_comment_1').hide();
            $('#findings_comment_r').show();
          }
        });
        
        $('#refresh').click(function(){
         $('.field').each(function(){
             $(this).val("");               
            });   
        });
  
        $('#submit_m').click(function(){         
            count =0;
            $('.field').each(function(){
             if ($.trim(this.value)=="")
               count ++;
            });
            if(count>0){
              alert(count+' fields not filled')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>test_request/save",
                data:$('#test_request_form').serialize(),
                success:function(data){
                    data='Success';
                    alert(data);
                },
                //error:function(){
                   //alert('an error occured'); 
                //}
                
            })
           
            }
           
        })
    });
    

</script>
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-body">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="meds">MEDS Analysis Test Request Form</h4>

<?php echo validation_errors(); ?>
<?php echo form_open('test_request/save',array('id'=>'test_request_form'));?>
<table bgcolor="#c4c4ff" width="100%"  border="0" cellpadding="8px" align="center">
  <input type="hidden" id="id" value="<?php echo"$user_type_id";?>" class="id" name="id"/>
  <input type="hidden" id="id" value="<?php echo"$user_id";?>" class="id" name="user_id"/>
	<tr>
    <td colspan="8" style="padding:8px;text-align:center;">
      <table class="table_form" width="100%"  cellpadding="8px" align="center" border="0"> 
          <tr>
              <td rowspan="2" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
              <td colspan="2" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>DOCUMENT: FORM</b></td>
              <td width="150px" height="25px" colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;"><b>REFERENCE NUMBER</b></td>
              <td colspan="3" style="padding:8px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">
                <input type="text" id="reference_number" name="reference_number" value="MEDS/QC/RE/01-01" class="fieldc"/>
                <span id="creference_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                <span id="creference_number_r" style="color:red; display:none">Fill this field</span>
              </td>
          </tr>
          <tr>
              <td colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>EFFECTIVE DATE: <?php echo date("d/m/Y")?></b></td>
              <td height="25px"colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>REVISION NUMBER</b></td>
              <td height="25px" colspan="3" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>PAGE 1 of 1</b></td>
          </tr>
          <tr>
              <td width="150px" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><b>AUTHORIZED BY:</b></td>
              <td colspan="2" height="25px" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><b><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></b></td>
              <td colspan="2" style="padding:8px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><b>USER TYPE</b></td>
              <td colspan="3" style="padding:8px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo("<b>".$user['logged_in']['role']);?></td>
          </tr>
        </table>
      </td>
  </tr>
	</div>
    <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;text-align:left;"><b>CLIENT INFORMATION</b></td>
    </tr>
    <tr>
      <td colspan="8" style="padding:8px;">
        <table width="100%" class="inner_table">
          <tr>
            <td height="25px" colspan="2" style="padding:8px;">Name of Applicant</td>
            <td height="25px" colspan="6" style="padding:8px;"><input type="text" id="applicant_name" class="field" size="80" name="applicant_name"/><span id="applicant_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png'?>" height="10px" width="10px"></span><span id="applicant_name_r" style="color:red; display:none">Fill in this field</span></td>
          </tr>
          <tr>
            <td height="25px" colspan="2" style="padding:8px;">Address of Applicant</td>
            <td height="25px" colspan="6" style="padding:8px;"><input type="text" class="field" size="80"  id="applicant_address" name="applicant_address" value=""/><span id="applicant_address_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="applicant_address_r" style="color:red; display:none">Fill in this field</span></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
        <td colspan="8" style="padding:8px;border-bottom:solid 1px #c4c4ff;background-color:#ffffff;text-align:left;"><b>SAMPLE DESCRIPTION</b></td>
    </tr>
    <tr>
        <td height="25px" style="padding:8px;border-bottom:dashed 1px #c4c4ff;background-color:#ffffff;text-align: center;text-align:left;" colspan="8"><b>(*Provide International Non-Proprietary Name of Active Ingredient'(s) if available)</b></td>
    </tr>
    <tr>
        <td colspan="8" style="padding:8px;text-align:center;border-bottom:solid 1px #c4c4ff;">
          <table  class="inner_table" width="100%"  cellpadding="8px" align="center" border="0">
              <tr>
                  <td height="25px" width="200px" style="padding:8px;text-align:left;">Active ingredient(s)</td>
                  <td height="25px" colspan="4" style="padding:8px;text-align:left;"><input type="text"  class="field" size="80" name="active_ingredients" id="active_ingredients"><span id="active_ingredients_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="active_ingredients_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              
              <tr>
                  <td height="25px" width="200px" style="padding:8px;text-align: left;">Label Claim</td>
                  <td height="25px" colspan="4" style="padding:8px;text-align:left;"><input type="text" class="field" size="80" name="label_claim" id="label_claim"><span id="lable_claim_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="lable_claim_r" style="color:red; display:none">Fill this</span></td>
              </tr>
              <tr>
                <td colspan="8" style="padding:8px;">
                  <table width="100%" cellpadding="8px" align="center" border="0">
                       <tr>
                          <td height="25px" style="padding:8px;text-align: left;">Dosage Form</td>
                          <td height="25px" style="padding:8px;text-align: left;">
                            <select name="dosage_form" id="dosage_form" class="field"><span id="dosage_from_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="dosage_from_r" style="color:red; display:none">Fill this</span>
                                <option selected></option>
                                <option value="LIQUID">LIQUID</option>
                                <option value="SOLID">SOLID</option>
                                <option value="POWDER">POWDER</option>
                                <option value="GEL">GEL</option>
                                <option value="CREAM">CREAM</option>
                                <option value="OINTMENT">OINTMENT</option>
                            </select>
                          </td>
                          <td style="padding:8px;"></td>
                          <td height="25px" style="padding:8px;text-align: left;">Strength/Concentration</td>
                          <td style="padding:8px;text-align:center;"><input type="text" size="5" class="field" name="strength_concentration"  id="strength_concentration"/>
                          <select name="measure">
                            <option selected></option>
                            <option value="MILLIGRAMS">Mg</option>
                            <option value="GRAMS">grms</option>
                            <option value="MILLILITER">Mls</option>
                            <option value="LITERS">ls</option>
                          </select>
                          </td>
                      </tr>
                      <tr>    
                          <td height="25px" style="padding:8px;text-align: left;">Pack Size</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="field" id="pack_size" name="pack_size"/><span id="pack_size_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="pack_size_r" style="color:red; display:none">Fill this</span></td>
                          <td style="padding:8px;"></td>
                          <td height="25px" style="padding:8px;text-align: left;">Manufacturer</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="field" name="manufacturer_name"  id="manufacturer_name"/><span id="manufacturer_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_name_r" style="color:red; display:none">Fill this</span></td>
                          
                      </tr>
                      <tr>    
                          <td height="25px" style="padding:8px;text-align: left;">Manufacturer Address</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="field" id="manufacturer_address" name="manufacturer_address"/><span id="manufacturer_address_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="manufacturer_address_r" style="color:red; display:none">Fill this</span></td>
                          <td height="25px" style="padding:8px;"></td>
                          <td height="25px" style="padding:8px;text-align: left;">Brand</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="field" name="brand_name" id="brand_name"><span id="cbrand_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="brand_name_r" style="color:red; display:none">Fill this</span></td>
                          
                      </tr>
                      <tr>   
                          <td height="25px" style="padding:8px;text-align: left;">Marketing Authorization Number</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text"  id="marketing_authorization_number" name="marketing_authorization_number"></td>
                          <td style="padding:8px;"></td>
                          <td height="25px" style="padding:8px;text-align: left;">Batch Number</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="field" name="batch_lot_number" id="batch_lot_number"><span id="batch_lot_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="batch_lot_number_r" style="color:red; display:none">Fill this</span></td>
                          
                      </tr>
                      <tr>
                          <td height="25px" style="padding:8px;text-align: left;">Manufacture Date</td>
                          <td height="25px" style="padding:8px;text-align: left;"><input type="text" class="datepicker" name="date_of_manufacture" id="datepicker"><span id="date_of_manufacture_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="date_of_manufacture_r" style="color:red; display:none">Fill this</span></td>
                          <td style="padding:8px;"></td>
                          <td style="padding:8px;text-align: left;">Expiry/Retest Date</td>
                          <td style="padding:8px;text-align: left;"><input type="text" class="field datepicker" id="" name="expiry_retest_date"><span id="expiry_retest_date_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="expiry_retest_date_r" style="color:red; display:none">Fill this</span></td>
                          
                      <tr>
                      </tr>
                          <td style="padding:8px;text-align:left;">Quantity Submitted</td>
                          <td colspan="2" style="padding:8px;text-align:left;"><input type="text" size="7" class="field" id="quantity_submitted" name="quantity_submitted"><span id="quantity_submitted_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="quantity_submitted_r" style="color:red; display:none">Fill this</span>
                            <select name="quantity_type">
                              <option>-------</option>
                              <option value="TABLETS">TABLETS</option>
                              <option value="CAPSULES">CAPSULES</option>
                              <option value="AMPOULES">AMPOULES</option>
                              <option value="VIALS">VIALS</option>
                              <option value="TUBES">TUBES</option>
                              <option value="BOTTLES">BOTTLES</option>
                            </select>
                          </td>
                          <td style="padding:8px;text-align:left;">Storage Conditions</td>
                          <td style="padding:8px;text-align:left;"><input type="text" id="storage_conditions" name="storage_conditions"></td>
                      </tr>
                          <td style="padding:8px;text-align: left;">Applicant's Reference Number</td>
                          <td colspan="4" style="padding:8px;text-align: left;"><input type="text" id="applicant_reference_number" name="applicant_reference_number"></td>
                      </tr>
                  </table>
                </td>
              </tr>
              <tr>
                  <td height="25px" style="padding:8px;text-align:left;">Sample Source</td>
                  <td height="25px" colspan="4" style="padding:8px;text-align:left;"><input type="text" size="80" class="field" id="sample_source" name="sample_source"><span id="csample_source_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="csample_source_r" style="color:red; display:none">Fill this</span></td>
              </tr>
          </table>
        </td>
    </tr>
      <tr>
        <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:dashed 1px #c4c4ff;"><b>Reason for Requesting Analysis</b> (Select as appropriate)</td>
      </tr>
      <tr>
          <td colspan="8" style="padding:8px;background-color:#ffffff;">
            <table class="inner_table" width="100%">
            <tr>
              <td style="padding:8px;"><input type='radio' checked="checked" name='reason' id='compliance_testing' value="Compliance Testing">Compliance Testing</td>
            </tr>
            <tr>
              <td style="padding:8px;"><input type='radio' name='reason' id='investigative_testing' value="Investigative Testing">Investigative Testing</td>
            </tr>
            </table>  
      </tr>
      <tr>
         <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;"><b>Other(Please Specify)</b></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align:center;padding:8px;background-color:#ffffff;">
          <table align="center" width="100%" border="0">
            <tr>
              <td><textarea rows="3" cols="130" name='other_reason' id='other_reason'></textarea></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><b>Test(s) Required:</b> (Select as appropriate)</td>
      </tr>
      <tr>
        <td colspan="8" style="padding:8px;background-color:#ffffff;">
            <table class ="inner_table" width="100%" cellpadding="8px" height="150px" align="center" border="0">
                <tr>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>No</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Test</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Requirement</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>No</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Test</b></td>
                    <td style="padding:2px;border-bottom:solid 1px #f2f2f2;text-align:center;"><b>Requirement</b></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">i.</td>
                  <td>Identification</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='1'></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">vii.</td>
                  <td>Dissolution</td>
                  <td style="border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='7'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">ii.</td>
                  <td>Friability</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='2'></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">viii.</td>
                  <td>Assay</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='8'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">iii.</td>
                  <td>Disintegration</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='3'></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">ix.</td>
                  <td>Content Uniformity</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='9'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">iv.</td>
                  <td>ph(Acidity/Alkalinity)</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='4'></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;">x.</td>
                  <td>Full Monograph</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='10'></td>
                </tr>
                 <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">v.</td>
                  <td>Related Substances</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='5'></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xi.</td>
                  <td>Uniformity of Dosage</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='11'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">vi</td>
                  <td>Weight Variation/Mass Uniformity</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='6'></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xii.</td>
                  <td>Karl Fisher</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='12'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xiii.</td>
                  <td>Microbiology</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='13'></td>
                </tr>
                <tr>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td></td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"></td>
                  <td style="padding:2px;border-left:solid 1px #f2f2f2;border-right:solid 1px #f2f2f2;text-align:center;">xiv.</td>
                  <td>Loss and Drying</td>
                  <td style="padding:2px;border-right:solid 1px #f2f2f2;text-align:center;"><input type='checkbox' name='tests[]' id='tests[]' value='14'></td>
                </tr>
                <tr>
                  <td height="25px" colspan="8"  style="padding:8px;"><b>Other(Please specify)</b></td>
                </tr>
                <tr>
                  <td colspan="8" style="padding:8px;"><textarea rows="3" cols="130" name="other_test" id="other_test" ></textarea></td>
                </tr>
            </table>
        </td>
      </tr>
      
      <tr>
        <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:dashed 1px #c4c4ff;"><b>Specifications to be used for testing:</b>(Select as appropriate)</td>
      </tr>
      <tr>
       <td colspan="8" style="padding:8px;text-align:center;">
        <table class ="inner_table" width="100%"  cellpadding="8px" align="center" border="0">
          <tr>
            <td colspan="8" style="padding:8px;text-align:left;"><input type='radio' checked="checked" name='specification' id='usp' value='USP'>USP</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;text-align:left;"><input type='radio' name='specification' id='bp' value='BP'>BP</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;text-align:left;"><input type='radio' name='specification' id='european_pharmacopeia' value='European Pharmacopoeia'>European Pharmacopoeia</td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;text-align:left;"><input type='radio' name='specification' id='international_pharmacopeia' value='International Pharmacopoeia'>International Pharmacopoeia</td>
          </tr>
          <tr>
              <td colspan="8" style="padding:8px;text-align:left;"><input type='radio' name='specification' id='manufacturers_specs' value='Manufacturer's Specifications'>Manufacturer's Specifications</td>
          </tr>
          <tr>
            <td height="25px" colspan="8" style="padding:8px;text-align:left;"><b>Other(Please specify)</b></td>
          </tr>
          <tr>
              <td colspan="8" style="text-align:center;padding:8px;"><textarea rows="3" cols="130" id="other_specification" name="other_specification"></textarea></td>
          </tr>
          <tr>
            <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><h5><b><p>Note:</b> If manufacturer's or 'other', please provide methods of analysis and specifications</p></h5></td>
          </tr>
        </table>
        </td>
      </tr>
      </div>  
      <tr>
        <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><b>DETAILS OF PERSON AUTHORIZING REQUEST FOR ANALYSIS</b></td>
      </tr>
      <tr>
        <td height="25px" colspan="8" style="padding:8px;background-color:#ffffff;">
          <table class="inner_table" width="100%" border="0">
            <tr>
              <td height="25px" style="padding:8px;">Name: <input type="text" class="field" id="authorizing_name" name="authorizing_name"/><span id="authorizing_name_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="authorizing_name_r" style="color:red; display:none">Fill this</span></td>
              <td height="25px" style="padding:8px;text-align:right;;">Designation: 
                <input class="field" id="designation" name="designation"/><span id="designation_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="designation_r" style="color:red; display:none">Fill this</span>
              </td>
              <td height="25px" style="padding:8px;text-align:left;">Lab Reg Number: <input type="text" class="field" id="lab_reg_number" name="lab_reg_number"/><span id="lab_reg_number_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span>
                <span id="lab_reg_number_r" style="color:red; display:none">Fill this</span></td>
                <input type="hidden" id="creceived_by" name="creceived_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"/>
            </tr>
            <tr>
              <td height="25px" colspan="3" style="padding:8px;text-align:left;background-color:#ffffff;border-bottom:solid 1px #c4c4ff;"><b>Comments</b> <span id="findings_comment_1" style="color:Green; display:none"><img src="<?php echo base_url().'images/done.png';?>" height="10px" width="10px"></span><span id="findings_comment_r" style="color:red; display:none">Fill this</span></td>
            </tr>
             <tr>
              <td height="25px" colspan="3" style="padding:8px;"><textarea rows="3" cols="130" type="text" class="field" id="findings_comment" name="findings_comment"/></textarea></td>  
            </tr>
          </table>
        </td>
      </tr>
      <div class="modal-footer">
        <tr>
          <td height="25px" style="padding:8px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input type="submit" name="submit" id="submit" value="Submit"></td>
        </tr>
      </div>
    </table>
  </div>
</form>
</div>
</div>  