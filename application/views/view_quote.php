<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
  <link href="<?php echo base_url().'style/core.css';?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url().'style/forms.css';?>" rel="stylesheet" type="text/css" />
   
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/demo_table.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'datatables/extensions/Tabletools/css/dataTables.tableTools.css';?>" type="text/css" rel="stylesheet"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url().'style/jquery-ui.css';?>">
  
  
  <!-- bootstrap reference css library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <!-- Datepicker reference js library -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>

  
  <!-- bootstrap reference js library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  
  <!-- custom js reference js library -->
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
 
  <!-- printing reference js library -->
  <script src="<?php echo base_url().'datatables/media/js/jquery.dataTables.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'datatables/extensions/TableTools/js/dataTables.tableTools.js';?>" type="text/javascript"></script>
  
  <script src="<?php echo base_url().'js/calculations.js';?>"></script>

  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').DataTable({
     "sScrollY": "100%",
     "sScrollX": "100%",
     "bSort": false,
     "sDom": "T lfrtip",
     "oTableTools": {
      "aButtons": [      
      
      {
        "sExtends": "collection",
        "sButtonText": 'Save',
        "aButtons": ["csv", "xls", "pdf"]
      }
      ],
      "sSwfPath": "<?php echo base_url().'datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf';?>"
    }
    });
   });
  </script>
  
</head>
<body>
  <?php
   $user=$this->session->userdata;
   $user_type_id=$user['logged_in']['user_type'];
   $user_id=$user['logged_in']['id'];
   $department_id=$user['logged_in']['department_id'];
   $acc_status=$user['logged_in']['acc_status'];
   $id_temp=1;
   //var_dump($user);
   if(empty($user['logged_in']['id'])) {
       
      redirect('login','location');  //1. loads the login page in current page div

      echo '<meta http-equiv=refresh content="0;url=base_url();login">'; //3 doesn't work

       }
  ?>
  <div id="header"> 
   <div id="logo" style="padding:8px;color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="35px" width="40px"/>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</div>
 
  <div id="log_bar">
  <table  border="0" cellpadding="2px" align="center" width="100%">
      <tr>
        
        <td style="border-bottom: solid 1px #c4c4ff;padding:4px;text-align: center;background-color: #ffffff;" width="20px">
           <img src="<?php echo base_url().'images/icons/user_blue.png';?>" height="25px" width="24px">
        </td>
       <td style="border-bottom: solid 1px #c4c4ff;padding:2px;text-align: left;background-color: #ffffff;" width="130px">
          <?php 
           echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);
         ?> 
       </td>
         <td height="10px"  style="border-bottom: solid 1px #c4c4ff;padding:8px;background-color: #ffffff;">
          
        </td>
        <td style="border-bottom: solid 1px #c4c4ff;padding:4px;background-color: #ffffff;" width="200px"></td>
         <td style="background-color:#ffffff;border-bottom: solid 1px #c4c4ff;padding:2px;" >
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> 
              <?php 
               echo($user['logged_in']['role']);
              ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url().'account_settings/index/'.$user_type_id.'/'.$user_id.'/'.$department_id;?>"><i class="icon-wrench"></i> Settings <img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"></a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url().'home/logout'?>"><i class="icon-share"></i>Logout</b> <img src="<?php echo base_url().'images/icons/door.png';?>" height="25px" width="25px"></a></li>
            </ul>
          </div>
        </td>
      </tr>
  </table> 
  </div>
  </div>
  <div id="form_wrapper">
   <table class="table_form"  bgcolor="#c4c4ff" width="80%"  border="0" cellpadding="4px" align="center">
      <input type="hidden" name="" value="<?php echo $request[0]['applicant_ref_number'];?>">
      <input type="hidden" name="" value="<?php echo $request[0]['expiry_date'];?>">
      <input type="hidden" name="" value="<?php echo $request[0]['date_time'];?>">
       <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'home';?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Requests List</a></td>
        </tr>
      	<tr>
          <td colspan="8" style="padding:8px;">
            <table width="100%" >
              <tr>
                <td style="padding:8px;text-align:left;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/><br>
                  <h4><b>Mission for Essential Drugs and Supplies</b></h4>
                  <p>(MEDS Center, Off Mombasa Road, Opposite Nation Press-Kenya)</p>
                  <p style="color:#ff0000;text-align:center;"><b>Assuring Quality of Medicines</b></p>
                  <p style="color:#0000ff;text-align:center;">MEDS Quality Control laboratory is WHO pre-qualified</p>  
                </td>
                <td></td>
                <td style="padding:8px;text-align:right;background-color:#ffffff;">
                  <b>P.O Box 78040</b><br>
                  <b>Viwandani, 00507</b><br>
                  <b>Nairobi, Kenya</b><br>
                  Tel: 3920000/500<br>
                  Telkom Wireless:020<br>
                  2124453,2124455,2460022,2532214,2532216.<br>
                  Mobile: 0722-202106, 0734-600310, 0726-937222<br>
                  Fax: 3920600<br>
                  E-mail:sahibu@africaonline.co.ke<br>
                  lab@meds.or.ke<br>
                  Website:www.meds.or.ke<br>
                </td>
              </tr>
              
          </table>
         </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;text-align:center;">
            <table width="100%">
                <tr>
                  <td rowspan="2" style="text-align:left;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;"><?php echo $request[0]['applicant_name'].'<br>'.$request[0]['applicant_address'];?></td>
                  <td style="padding:8px;text-align:center;"><h1><b>PROFORMA INVOICE</b><h1></td>
                </tr>
                <tr>
                  <td colspan="2" style="padding:8px;color:#0000ff;"><b>For Clients with no credit facility with MEDS, kindly pay upfront or issue an irrevocable Letter of Credit</b></td>
                </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;background-color: #ffffff;"></td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;">
            <table width="100%">   
              <tr>
                    <td style="padding:8px;border-left:solid 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;color: #0000fb;"><b>Customer Reference</b></td>
                    <td style="padding:8px;border-left:dotted 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;color: #0000fb;"><b>Enquiry Date</b></td>
                    <td style="padding:8px;border-left:dotted 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;color: #0000fb;"><b>Tender Date</b></td>
                    <td style="padding:8px;border-left:dotted 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;color: #0000fb;"><b>Expiry Date</b></td>
                    <td style="padding:8px;border-left:dotted 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;color: #0000fb;"><b>Ship Date</b></td>
                    <td style="padding:8px;border-left:dotted 1px #bfbfbf;text-align:center;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;color: #0000fb;"><b>Amount In</b></td>
              </tr>
              <tr>
                    <td style="border-left:solid 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input size="10" type="text" id="customer_reference" name="customer_reference" value="<?php echo $request[0]['applicant_ref_number'];?>"/></td>
                    <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input size="10" type="text" id="enquiry_date" name="enquiry_date" value="<?php echo $request[0]['date_time'];?>"/></td>
                    <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input size="10" type="text" id="tender_date" name="tender_date" value="<?php echo $request[0]['date_time'];?>"/></td>
                    <td style="border-left:dotted 1px #bfbfbf;ext-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input size="10"  type="text" id="expiry_date" name="expiry_date" value="<?php echo $request[0]['expiry_date'];?>" /></td>
                    <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input size="10" type="text" id="ship_date" name="ship_date" value="<?php echo $request[0]['date_time'];?>"/></td>
                    <td style="border-left:dotted 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;">
                      <select name="amount_in">
                        <option value="KShs">Kenya Shillings</option>
                        <option value="Dollars">US Dollars</option>
                        <option value="Euros">Euros</option>
                        <option value="Pounds">Pounds</option>
                        <option value="Pounds">Japanese Yen</option>
                      </select>
                    </td>
              </tr>
            </table>
          </td>
        </tr>   
        <tr>
            <td colspan="8" style="text-align:center;padding:2px;border-bottom: solid 0px #c4c4ff;background-color:#ffffff;"><td>
        </tr>
        <tr>
            <td colspan="8" style="padding:8px;">
               <table id="list" width="100%" class="list_view_header"   bgcolor="#ffffff" cellpadding="4px">
                  <thead>
                    <tr>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">SN</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Reference No.</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Batch No.</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Item/Sample Description</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Test Description</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Quantity</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Unit Price</th>
                      <th style="text-align:center;border-right: dotted 1px #ddddff;padding:8px;" width="">Amount</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <!--Condition for showing all the clients test request and tests-->
                  <?php
                  $i=1;
                  if($request[0]['tr']==0 || $request[0]['tr']=="" || $request[0]['tr']=="NULL" ){
                   
                 }else{
                  ?>
                 
                  <tr>
                    <td style="padding:8px;border-right: dashed 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;" width="20px"><?php echo $i;?>.</td>  
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;'><input type="hidden" name="reference_number"><b><?php echo $request[0]['reference_number'];?></b></td>  
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;'><input type="hidden" name="batch_lot_number"><b><?php echo $request[0]['batch_lot_number'];?></b></td>
                    <td style='text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;'><input type="hidden" name="active_ingredients"><input type="hidden" name="quantity_submitted"><b><?php echo $request[0]['active_ingredients'].' '.$request[0]['quantity_type'].' '.$request[0]['quantity_submitted'];?></b></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;background-color:#ffffff;"></td>
                  </tr>
      
                   <!--Condition for showing all the clients test request in the test request-->
                  <?php
                  if ($request[0]['identification']==0) {
                    # code...
                  }else{
                  ?>
                    <tr> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo "Identification Test";?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_identification_cost" name="unit_price_identification_cost" value="<?php echo $invoice[0]['unit_price_identification_cost'];?>" readonly> <?php echo $invoice[0]['unit_price_identification_cost'];?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden"  id="identification_cost" name="identification_cost" value="<?php echo $invoice[0]['unit_price_identification_cost'];?>" readonly><?php echo $invoice[0]['unit_price_identification_cost'];?></td>
                    </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if ($request[0]['friability']==0) {
                    # code...
                  }else{
                  ?>
                    <tr> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo "Friability Test";?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_friability_cost" name="unit_price_friability_cost" value="<?php echo $invoice[0]['unit_price_friability_cost'];?>" readonly><?php echo $invoice[0]['unit_price_friability_cost'];?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden"  id="friability_cost" name="friability_cost" value="<?php echo $invoice[0]['unit_price_friability_cost'];?>" readonly><?php echo $invoice[0]['unit_price_friability_cost'];?></td>
                    </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['ph_alkalinity']==0){

                  }else{
                  ?>
                    <tr>
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>  
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                      <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'ph Alkalinity Test';?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_ph_alkalinity_cost" name="unit_price_ph_alkalinity_cost" value="<?php echo $invoice[0]['unit_price_ph_alkalinity_cost'];?>" readonly><?php echo $invoice[0]['unit_price_ph_alkalinity_cost'];?></td>
                      <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden"  id="ph_alkalinity_cost" name="ph_alkalinity_cost"value="<?php echo $invoice[0]['unit_price_ph_alkalinity_cost'];?>" readonly><?php echo $invoice[0]['unit_price_ph_alkalinity_cost'];?></td>
                    </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['assay']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>  
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Assay Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_assay_cost" name="unit_price_assay_cost" value="<?php echo $invoice[0]['unit_price_assay_cost'];?>" readonly><?php echo $invoice[0]['unit_price_assay_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden"  id="assay_cost" name="assay_cost" value="<?php echo $invoice[0]['unit_price_assay_cost'];?>"readonly><?php echo $invoice[0]['unit_price_assay_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['disintegration']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Disintegration Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_disintegration_cost" name="unit_price_disintegration_cost" value="<?php echo $invoice[0]['unit_price_disintegration_cost'];?>"readonly><?php echo $invoice[0]['unit_price_disintegration_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="disintegration_cost" name="disintegration_cost" value="<?php echo $invoice[0]['unit_price_disintegration_cost'];?>" readonly><?php echo $invoice[0]['unit_price_disintegration_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['dissolution']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Dissolution Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_dissolution_cost" name="unit_price_dissolution_cost" value="<?php echo $invoice[0]['unit_price_dissolution_cost'];?>" readonly><?php echo $invoice[0]['unit_price_dissolution_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="dissolution_cost" name="dissolution_cost" value="<?php echo $invoice[0]['unit_price_dissolution_cost'];?>" readonly><?php echo $invoice[0]['unit_price_dissolution_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['content_uniformity']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Content Uniformity Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_content_uniformity_cost" name="unit_price_content_uniformity_cost" value="<?php echo $invoice[0]['unit_price_content_uniformity_cost'];?>" readonly><?php echo $invoice[0]['unit_price_content_uniformity_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="content_uniformity_cost" name="content_uniformity_cost" value="<?php echo $invoice[0]['unit_price_content_uniformity_cost'];?>" readonly><?php echo $invoice[0]['unit_price_content_uniformity_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['full_monograph']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Full Monograph Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_full_monograph_cost" name="unit_price_full_monograph_cost" value="<?php echo $invoice[0]['unit_price_full_monograph'];?>" readonly><?php echo $invoice[0]['unit_price_full_monograph'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="full_monograph_cost" name="full_monograph_cost" value="<?php echo $invoice[0]['unit_price_full_monograph'];?>" readonly><?php echo $invoice[0]['unit_price_full_monograph'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['microbiology']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Microbiology Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_microbiology_cost" name="unit_price_microbiology_cost" value="<?php echo $invoice[0]['unit_price_microbiology_cost'];?>" readonly><?php echo $invoice[0]['unit_price_microbiology_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="microbiology_cost" name="microbiology_cost" value="<?php echo $invoice[0]['unit_price_microbiology_cost'];?>"readonly><?php echo $invoice[0]['unit_price_microbiology_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['uniformity_of_dosage']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Uniformity Of Dosage Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_uniformity_of_dosage_cost" name="unit_price_uniformity_of_dosage_cost" value="<?php echo $invoice[0]['unit_price_uniformity_of_dosage_cost'];?>" readonly><?php echo $invoice[0]['unit_price_uniformity_of_dosage_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="uniformity_of_dosage_cost" name="uniformity_of_dosage_cost" value="<?php echo $invoice[0]['unit_price_uniformity_of_dosage_cost'];?>" readonly><?php echo $invoice[0]['unit_price_uniformity_of_dosage_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['weight_variation_mass_uniformity']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Weight Variation / Mass Uniformity Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_weight_variation_cost" name="unit_price_weight_variation_cost" value="<?php echo $invoice[0]['unit_price_weight_variation'];?>" readonly><?php echo $invoice[0]['unit_price_weight_variation'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="weight_variation_cost" name="weight_variation_cost" value="<?php echo $invoice[0]['unit_price_weight_variation'];?>" readonly><?php echo $invoice[0]['unit_price_weight_variation'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['related_substances']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Related Substances Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice"id="unit_price_related_substances_cost" name="unit_price_related_substances_cost"value="<?php echo $invoice[0]['unit_price_related_substances_cost'];?>"readonly><?php echo $invoice[0]['unit_price_related_substances_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="related_substances_cost" name="related_substances_cost" value="<?php echo $invoice[0]['unit_price_related_substances_cost'];?>" readonly><?php echo $invoice[0]['unit_price_related_substances_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['water_method']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'Water Method (Karl Fisher) Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_water_method_cost" name="unit_price_water_method_cost" value="<?php echo $invoice[0]['unit_price_water_method_cost'];?>" readonly><?php echo $invoice[0]['unit_price_water_method_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="water_method_cost" name="water_method_cost" value="<?php echo $invoice[0]['unit_price_water_method_cost'];?>"readonly><?php echo $invoice[0]['unit_price_water_method_cost'];?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <?php
                  if($request[0]['loss_drying']==0){

                  }else{
                  ?>
                  <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo 'loss and Drying Test';?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="invoice" id="unit_price_loss_drying_cost" name="unit_price_loss_drying_cost" value="<?php echo $invoice[0]['unit_price_loss_drying_cost'];?>" readonly><?php echo $invoice[0]['unit_price_loss_drying_cost'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" id="loss_drying_cost" name="loss_drying_cost"value="<?php echo $invoice[0]['unit_price_loss_drying_cost'];?>" readonly><?php echo $invoice[0]['unit_price_loss_drying_cost'];?></td>
                  </tr>

                <?php
                  }
                   $i++;
                ?>
                <tr>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>   
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td> 
                      <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style='text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;'></td>
                    <td style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><b>Total</b></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><?php echo $invoice[0]['amount_in'];?></td>
                    <td style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input size="10" type="hidden" class="total_amount" name="total_amount" value="<?php echo $invoice[0]['total_amount'];?>" readonly><?php echo $invoice[0]['total_amount'];?></td>                       
                </tr> 
                                 
                <?php
                }
                ?>
                  </tbody>
                  <table width="100%">
                    <tr>
                       <td colspan="7" style="text-align: left;padding:8px;border-bottom: solid 1px #c0c0c0;"><b>Additional Comments</b></td>                       
                     </tr>
                     <tr>
                       <td colspan="7" style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><textarea readonly name="comments" cols="50" rows="5"><?php echo $invoice[0]['comments'];?></textarea></td>                       
                     </tr>
                  </table>
            </table>
            
      </form>
    </div>
  </div>
</body>
</html>
