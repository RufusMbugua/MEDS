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
  <script type="text/javascript" src="<?php echo base_url().'js/jquery.validate.js';?>"></script>

  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script src="<?php echo base_url().'js/calculations.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
   });
  </script>
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
            count =0;
            $('.field').each(function(){
               if ($.trim(this.value)=="")
               count ++;
            });
            if(count >0){
              alert( count+' All field as on this form are MANDATORY ')
               return false;
            }else{
              
            $.ajax({
                type:"post",
                url:"<?php echo base_url();?>finance/submit",
                data:$('#invoice_form').serialize(),
                success:function(data){
                redirect_url = "<?php echo base_url();?>finance/index"
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
<script>
          
      $(document).ready(function(){

        var wrapper = $("#wrapper");
        var addForm = $("#add-form");
        var index = 0;


       $("#myinvoice").validate({
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                rules: {}
            });


        var getForm = function(index, action) { //returns set of form fields as a string

       
        return $('\
            <table id="tbl' + index +'" align="center" width="120%" border="0">\
            <tr>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Customer Reference</b></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Enquiry Date</b></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Tender Date</b></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Expiry Date</b></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Ship Date</b></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;color: #0000fb;"><b>Amount In</b></td>\
            </tr>\
            <tr>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="customer_reference" name="customer_reference"/></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="date" id="enquiry_date" name="enquiry_date" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="date" id="tender_date" name="tender_date" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;ext-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input  type="date" id="expiry_date" name="expiry_date" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="date" id="ship_date" name="ship_date" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;border-right:dotted 1px #bfbfbf;text-align:left;padding:4px;border-bottom:solid 1px #bfbfbf;">\
                <select name="amount_in">\
                  <option value="KShs">KShs</option>\
                  <option value="Dollars">Dollars</option>\
                  <option value="Euros">Euros</option>\
                  <option value="Pounds">Pounds</option>\
                  <option value="Pounds">Japanese Yen</option>\
                </select>\
              </td>\
            </tr>\
            <tr>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>S/N</b></td>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Item Code</b></td>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Description</b></td>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Quantity</b></td>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Unit Price</b></td>\
              <td style="text-align:center;padding:4px;border-right:solid 1px #bfbfbf;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Amount</b></td>\
            </tr>\
            <tr>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="serial_number" name="serial_number"/></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="item_code" name="item_code" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="description" name="description" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;ext-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input id="quantity" type="text" name="quantity" onchange="calc()"/></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input id="unit_price" type="text" name="unit_price" onchange="calc()"/></td>\
              <td style="border-left:dotted 1px #bfbfbf;border-right:dotted 1px #bfbfbf;text-align:left;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="amount" name="amount" /></td>\
              <td style="padding:4px;border-bottom: solid 1px #c4c4ff;background-color:#ffffff;text-align: center;" colspan="0" ><input  id="submit" class="btn" type="submit" name="submit" value="Submit"></td>\
              <td style="border-right:dotted 1px #bfbfbf;text-align:left;padding:4px;border-bottom:solid 1px #bfbfbf;"><a href="#" id="remove-form' + index + '" data-index="' + index + '"><img src="<?php echo base_url().'images/icons/delete.png';?>" height="10px" width="10px"></a></td>\
            </tr>\
            </table>\
            ');
        }//getForm()

        addForm.on("click", function() {
            var form = getForm(++index)

            form.find(".remove-form").on("click", function() {
                $(this).parent().remove();
            }); //form.find()
            $("#wrapper").append(form);

            $("#remove-form"+index).on("click", function() {
            var currentIndex = $(this).data( "index" );
                $("#tbl" + currentIndex).remove();
            });
        });

  }); //$(document).ready
  function calc(){
              var total = document.getElementById('quantity').value * document.getElementById('unit_price').value;
              document.getElementById('amount').value = total;
          }
    
</script>
</head>
<body>
  <?php
   $user=$this->session->userdata;
   $test_request_id=$user['logged_in']['test_request_id'];
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
              <li><a href="<?php echo base_url().'account_settings/index/'.$test_request_id.'/'.$user_type_id.'/'.$user_id.'/'.$department_id;?>"><i class="icon-wrench"></i> Settings <img src="<?php echo base_url().'images/icons/settings2.png';?>" height="20px" width="20px"></a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url().'home/logout'?>"><i class="icon-share"></i>Logout</b> <img src="<?php echo base_url().'images/icons/door.png';?>" height="25px" width="25px"></a></li>
            </ul>
          </div>
        </td>
      </tr>
  </table> 
  </div>
   </div>
   <?php 
    echo "<div id='system_nav'";
      if($user['logged_in']['user_type'] !=6 && $user['logged_in']['user_type'] !=8){
       echo"style='display:none'";
      }
      else{
       echo "style='display:block;'>";
      }
     ?>
     <a href="<?php echo base_url().'user_accounts/Get';?>" class="system_nav system_nav_link ">User Accounts</a>
     <a href="<?php echo base_url().'client_list/Get';?>" class="system_nav system_nav_link">Client List</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==0){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="current sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>" class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==7 && $user['logged_in']['department_id'] ==1){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==6 && $user['logged_in']['department_id'] ==8){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link active">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="current sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'complaints_list/records';?>"class="sub_menu sub_menu_link first_link">Complaints</a>
        <a href="<?php echo base_url().'coa_list/records';?>"class="sub_menu sub_menu_link first_link">Certificate of Analysis</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==3){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'reagents_inventory_record/Get';?>"class="sub_menu sub_menu_link first_link">Reagents & Inventory</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="current sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==2){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="current sub_menu sub_menu_link first_link">Equipment & Maintenance</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
    </div>    
    <?php
    echo"<div id='sub_menu'";
    if($user['logged_in']['user_type'] ==5 && $user['logged_in']['department_id'] ==4){
       echo"style='display:block;'>";
      }
      else{
          echo "style='display:none'>";
      }
     ?>
        <a href="<?php echo base_url().'home';?>"class="sub_menu sub_menu_link first_link">Analysis Test Request</a>
        <a href="<?php echo base_url().'equipment_maintenance_records/Get';?>"class="current sub_menu sub_menu_link first_link">Equipment</a>
        <a href="<?php echo base_url().'standard_register_records/Get';?>"class="sub_menu sub_menu_link first_link">Standard Register</a>
        <a href="<?php echo base_url().'outoftolerance_list/records';?>"class="sub_menu sub_menu_link first_link">Out of Tolerance</a>
        <a href="<?php echo base_url().'temperature_humidity_list/records/'.$id_temp;?>"class="sub_menu sub_menu_link first_link">Temperature & Humidity</a>
    </div>
  <div id="form_wrapper">
   <?php echo validation_errors(); ?>
   <?php echo form_open('client_billing/print_page',array('id'=>'proforma_invoice_form'));?>
   <table class="table_form"  bgcolor="#c4c4ff" width="80%"  border="0" cellpadding="4px" align="center">
        <tr>
          <td colspan="8" style="padding:8px;">
            <table width="100%" >
              <tr>
                <td style="padding:8px;text-align:left;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/><br>
                  <h4><b>Mission for Essential Drigs and Supplies</b></h4>
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
                  <td rowspan="2" style="text-align:left;padding:8px;border-bottom: solid 1px #c4c4ff;border-right: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;border-left: solid 1px #c4c4ff;"><textarea rows="3" cols="50" name=""></textarea></td>
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
          <?php echo form_open('client_billing/submit',array('id'=>'proforma_invoice_form'));?>
            <td colspan="7" style="text-align:right;padding:4px;border-bottom:dotted 1px #bfbfbf;"><div id="wrapper"></div>
              <a href="#" class="btn" id="add-form"><img src="<?php echo base_url().'images/icons/add_field.png';?>" height="10px" width="10px">Add</a>
            </td>
          </form>
        </tr>
        
        <tr>
          <td colspan="8" style="text-align:center;padding:8px;border-bottom: solid 10px #c4c4ff;background-color:#ffffff;"><b><h5>PROFORMA INVOICE</h5></b><td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center;padding:2px;border-bottom: solid 0px #c4c4ff;background-color:#ffffff;"><td>
        </tr>
        <tr>
            <td colspan="8">
               <table id="list" width="100%" class="list_view_header"   bgcolor="#ffffff" cellpadding="4px">
                  <thead>
                      <tr>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">S/N</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Item Code</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Quantity</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Unit Price</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Amount</th>
                          
                      </tr>
                  </thead>
             
                  <tbody>
                  <?php
                  $i=1;
                  foreach($query as $row):
                      
                  if($i==0){
                   
                  echo"<tr>";
                  }
                  ?>  
                  
                      <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="16px"><?php echo $row->serial_number;?>.</td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->item_code;?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->quantity;?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->unit_price;?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row->amount;?></td>
                      
                  <?php
                   
                  $i++;  
                  ?>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
            </td>
        </tr>
      </table>
      <table width="100%">
         <tr>
           <td colspan="7" style="text-align: center;padding:8px;border-bottom: solid 1px #c0c0c0;"><input type="submit" class="btn" id="print" name="print" value="Print Invoice"></td>                       
         </tr> 
      </table>
      </form>
    </div>
  </div>
</body>
</html>
