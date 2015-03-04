<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
  <link rel="icon" href="" />
  <link href="<?php echo base_url().'images/meds_logo_icon.png';?>" rel="shortcut icon">
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
  <script type="text/javascript" src="<?php echo base_url().'js/equations.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').dataTable({
     "sScrollY":"270px",
     "sScrollX":"100%"
    });
    $("#balance_id").on('change',function(){
      var equipmentbalance=$(this).find(":selected").data("equipmentbalance");
      $("#equipmentbalance").val(equipmentbalance);
      
    });
     $("#make_id").on('change',function(){
      var equipmentmake=$(this).find(":selected").data("equipmentmake");
      $("#equipmentmake").val(equipmentmake);
      
    });
      $("#equipment_make").on('change',function(){
      var equipmentid=$(this).find(":selected").data("equipmentid");
      $("#equipmentid").val(equipmentid);
    });
     $("#equipment_balance").on('change',function(){
      var idnumber=$(this).find(":selected").data("idnumber");
      $("#idnumber").val(idnumber);
      
    });
      
    
    $("#column_name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#column_dimensions").val(dimensions);
      $("#column_serial_number").val(serial_number);
      $("#column_manufacturer").val(manufacturer);
    });
   });
  </script>
  <script>
  $(document).ready(function(){

    var wrapper = $("#wrapper");
    var addForm = $("#add-form");
    var index = 0;


       $("#myreagents").validate({
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                rules: {}
            });


        var getForm = function(index, action) { //returns set of form fields as a string

       
        return $('\
            <table id="tbl' + index +'" align="center" width="120%" border="0">\
           <tr>\
              <td style="text-align:center;color:#0000ff;padding:8px;"></td>\
              <td style="text-align:center;color:#0000ff;padding:8px;"></td\
              <td style="text-align:center;color:#0000ff;padding:8px;"></td>\
              <td style="text-align:center;color:#0000ff;padding:8px;"></td>\
            </tr>\
            <tr>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="test" name="test"/></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="chemical_reagent" name="chemical_reagent" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input type="text" id="batch_number" name="batch_number" /></td>\
              <td style="border-left:dotted 1px #bfbfbf;ext-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;"><input  type="text" id="manufacturer" name="manufacturer" /></td>\
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
                 return false;
            });

            return false;
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
  ?>
  <div id="header"> 
   <div id="logo" style="padding:8px;color: #0000ff;" align="center"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="35px" width="40px"/><b>MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</b></div>
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
         <td height="10px"  style="border-bottom: solid 1px #c4c4ff;padding:8px;background-color: #ffffff;"></td>
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
     <div id="forms">
      <?php echo validation_errors(); ?>
      <?php echo form_open('reagents/save',array('id'=>'reagents_form'));?>
       <table width="75%" class="table_form" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
        <tr>
            <td colspan="8" style="text-align:right;padding:8px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/view.png';?>" height="25px" width="25px">Back To Test Lists</a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" style="padding:8px;">
            <table class="table_form"0 border="0" align="center" cellpadding="8px" width="100%" >
              <tr>
                  <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                  <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
              </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Registration Number: <?php echo $query['laboratory_number'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Request Date: <?php echo $query['date_time'];?></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Label Claim: <?php echo $query['active_ingredients'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Brand Name: <?php echo $query['brand_name'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Method/Specifications: <?php echo $query['test_specification'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Details:<br><br> <?php echo $query['manufacturer_name'];?><br><?php echo $query['manufacturer_address'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Clients Details:<br><br> <?php echo $query['applicant_name'];?><br><?php echo $query['applicant_address'];?> </td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Manufacturer Date: <?php echo $query['date_manufactured'];?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Expiry Date: <?php echo $query['expiry_date'];?></td>
                    </tr>
                    <tr>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis Start Date: <?php echo date("d/m/Y")?></td>
                      <td height="25px" style="padding:8px;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">Analysis End Date: <input type="text" value="<?php echo date("d/m/Y");?>"></td>
                    </tr>
                </table>
              </td>
            </tr>
            <tr><td colspan="8" style="padding:8px;"></td></tr>
            <tr>
              <td colspan="8" align="center" style="padding:4px;border-bottom: solid 10px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Assay Reagents Form</h5></td>
            </tr>
            <tr>  
              <td colspan="8" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b>Reagents</b></td>
            </tr>
            <tr>
                <td colspan="8" style="padding:8px;">
                  <table border="0" class="table_form" width="60%" cellpadding="8px"  align="center">
                    <tr>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom: solid 1px #c4c4ff;">Test</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom: solid 1px #c4c4ff;">Chemical/Reagent</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom: solid 1px #c4c4ff;">Batch No.</td>
                      <td style="text-align:center;color:#0000ff;padding:8px;border-bottom: solid 1px #c4c4ff;">Manufacturer</td>                      
                    </tr>
                    <tr>
                      <form id="myreagents" name="myreagents" action="" method="post" autocomplete="on">
                        <td colspan="4"><div id="wrapper"></td>
                        <td style="text-align:center;color:#0000ff;padding:8px;"><a href="#" class="btn" id="add-form"><img src="<?php echo base_url().'images/icons/add_field.png';?>" height="10px" width="10px">Add</a></td>
                      </form>  
                    </tr>
                  </table>
                </td>
            </tr>
            <tr>
          <td colspan="8" style="color:#0000ff;text-align:center;padding:8px;border-bottom: solid 10px #c4c4ff;background-color:#ffffff;"><b>Reagent list</b><td>
        </tr>
        <tr>
            <td colspan="8" style="text-align:center;padding:2px;border-bottom: solid 0px #c4c4ff;background-color:#ffffff;"><td>
        </tr>
        <tr>
            <td colspan="8">
               <table id="list" width="100%" class="list_view_header"   bgcolor="#ffffff" cellpadding="4px">
                  <thead>
                      <tr>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">No.</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Test</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Chemical/Reagent</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Batch Number</th>
                          <th style="text-align:center;border-right: dotted 1px #ddddff;" width="">Manufacturer</th>
                      </tr>
                  </thead>
             
                  <tbody>
                  <?php
                  $i=1;
                  foreach($test_reagents as $row):
                      
                  if($i==0){
                   
                  echo"<tr>";
                  }
                  ?>  
                  
                      <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="16px"><?php echo $i; ?>.</td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['test'];?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['chemical_reagent'];?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['batch_number'];?></td>
                      <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['manufacturer'];?></td>
                      
                  <?php
                   
                  $i++;  
                  ?>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
              </table>
            </td>
        </tr>
        <tr>
          <td colspan="8" style="padding:8px;">
            <table  class="table_form"border="0" width="100%" cellpadding="8px" align="center">
              <tr>
                <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:left;">Done By <input type="hidden" id="done_by" name="done_by" value="<?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?>"><?php echo($user['logged_in']['fname']." ".$user['logged_in']['lname']);?></td>
                <td style="background-color:#ededfd;border-bottom: dotted 1px #c4c4ff;padding:8px;text-align:right;">Date Conducted <input type="hidden"  id="date" name="date_done" value="<?php echo date("d/m/Y")?>"><?php echo date("d/m/Y")?></td>
              </tr>
            </table>
          </td>
        </tr>
       </table>
      </form>
</div>
</div>
</body>
</html>
