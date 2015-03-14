<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>MEDS</title>
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
  
  <!-- bootstrap reference library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/Jquery-datatables/jquery.dataTables.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
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
    <div id="form_wrapper_lists">
       <div id="account_lists">
      <?php echo validation_errors(); ?>
      <?php echo form_open_multipart('test/save_monograph',array('id'=>'monograph_form'));?>
       <table class="table_form" width="70%" border="0" cellpadding="4px" align="center">
        <input type="hidden" name="tr_id" value="<?php echo $query['tr'];?>"></input>
        <input type="hidden" name="assignment_id" value="<?php echo $request[0]['a'];?>"></input>
          <tr>
            <td colspan="8" style="text-align:right;padding:4px;backgroun-color:#fffff;border-bottom:solid 1px #bfbfbf;"><a href="<?php echo base_url().'test/index/'.$request[0]['a'].'/'.$query['tr'];?>"><img src="<?php echo base_url().'images/icons/back.png';?>" height="25px" width="20px">Back</a></td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;">
              <table width="100%"  align="center" class="table_form">
                <tr>
                    <td style="border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;"><img src="<?php echo base_url().'images/meds_logo.png';?>" height="80px" width="90px"/></td>
                    <td colspan="7" style="padding:4px;color:#0000ff;border-left:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;text-align:center;background-color:#ffffff;">MISSION FOR ESSENTIAL DRUGS AND SUPPLIES</td>
                </tr>
                <tr>    
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">DOCUMENT: ANALYTICAL MONOGRAPH WORKSHEET</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">TITLE:</td>
                    <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;"><?php echo $query['active_ingredients']." "." ".$query['test_specification'];?></td>
                    <td height="25px" colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;color:#000000;">REFERENCE NUMBER</td>
                    <td style="padding:4px;border-right:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;"><?php echo $query['reference_number'];?></td>
                </tr>
                <tr>
                    <td style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">EFFECTIVE DATE: <?php echo date("d/m/Y")?></td>
                    <td colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-left:solid 1px #bfbfbf;">ISSUE/REV 2/2</td>
                    <td height="25px"colspan="2" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SUPERSEDES: 2/1</td>
                    <td height="25px" colspan="3" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">PAGE 1 of 1</td>
                </tr>
                <tr>
                    <td height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;border-left:solid 1px #bfbfbf;border-right:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;">SERIAL NO.</td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><input type="text" name="serial_number"></input></td>
                    <td colspan="2" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;">BATCH/LOT NO.</td>
                    <td colspan="3" height="25px" style="padding:4px;border-bottom:solid 1px #bfbfbf;text-align:left;background-color:#ffffff;border-right:solid 1px #bfbfbf;"><?php echo $query['batch_lot_number']?></input></td>    
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;">
              <table width="100%">
                <tr>
                  <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><b><h5>Monograph Details</h5></b></td> 
                </tr>
                <tr>
                  <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;">
                  <b>Tests Requested as per Client Test Request Form</b></td> 
                </tr>
                <tr>
                  <td colspan="8" align="center" style="padding:4px;border-bottom: solid 1px #c4c4ff;">
                    <table width="100%" align="center" cellpaddding="4px">
                        <?php include_once('application/views/tests_requested.php');?>
                    </table>
                  </td> 
                </tr>
                <tr>
                  <td colspan="8" align="left" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Number of Components</h5></td> 
                </tr>
                <tr>
                  <td colspan="8" align="left" style="padding:4px;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="checkbox" name="singlecomponent" id="singlecomponent" value="1"> Single Component</td>
                </tr>
                <tr>  
                  <td colspan="8" style="padding:8px;">
                    <table width="100%" id="tbl_singlecomp"  align="center" cellpadding="4px">
                      <tr>
                        <td>Component <input type="text" name="single_component" id="single_component"></td>
                        <td>Label Claim (mg) <input type="text" name="single_lc_component" id="single_lc_component" class="id"></td>
                      </tr>
                    </table>
                    <table class="" id="tbl_singlecomp" width="80%" border="0" align="center" cellpadding="4px">
                      <thead>
                        <td style="padding:8px;" colspan="2" align="center"><b>SELECT SINGLE COMPONENT TESTS AS PER MONOGRAPH</b></td>
                      </thead>
                      <tbody>
                        <tr>
                          <tr >
                          <?php
                            $i=1;
                            foreach ($subtests_single as $row):     
                          ?>
                           <td style="padding:8px;border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px"><?php echo $i;?>.</td>
                           <td style="padding:8px;text-align: left;border-bottom: solid 1px #c0c0c0;"><input type="checkbox" id="subtests[]" name="subtests[]" value="<?php echo $row['id'];?>"> <?php echo $row['name'];?></td>
                           <?php
                             $i++;
                           ?>
                        </tr>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                    </table>
                  </td>  
                </tr>
                <tr>  
                  <td colspan="8" align="left" style="padding:4px;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="checkbox" name="multicomponent" id="multicomponent" Value="2"> Multicomponent</td>  
                </tr>
                <tr>  
                  <td colspan="8" style="padding:8px;">
                    <table width="80%" id="tbl_components" class="dynatable" border="0" align="center" cellpadding="4px">
                      <thead>
                        <td colspan="2" align="right"><input type="button" id="add_row" class=" btn" value="Add"></td>
                      </thead>
                      <tbody>
                        <tr class="prototype">
                          <td>Component 1 <input type="text" name="component[]" id="component_one" class="id"></td>
                          <td>Label Claim (mg) <input type="text" name="lc_component[]" id="lc_component" class="id"></td>
                        </tr>
                    </tbody>
                  </table>
                  <table class="" id="tbl_components" width="80%" border="0" align="center" cellpadding="4px">
                      <thead>
                        <td style="padding:8px;border-bottom:solid 1px #c4c4ff;border-top:solid 1px #c4c4ff;border-left:solid 1px #c4c4ff;border-right:solid 1px #c4c4ff;" colspan="2" align="center"><b>SELECT MULTICOMPONENT TESTS AS PER MONOGRAPH</b></td>
                      </thead>
                      <tbody>
                        <tr >
                          <?php
                            $i=1;
                            foreach ($subtests_multicomponent as $row):     
                          ?>
                           <td style="padding:8px;border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px"><?php echo $i;?>.</td>
                           <td style="padding:8px;text-align: left;border-bottom: solid 1px #c0c0c0;"><input type="checkbox" id="subtests[]" name="subtests[]" value="<?php echo $row['id'];?>"> <?php echo $row['name']." ".$row['id'];?></td>
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
                  <td colspan="8" align="left" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5>Please chose where appropriate, Thank you.</h5></td> 
                </tr>
                <tr>
                  <td colspan="8" align="left" style="padding:4px;sborder-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="checkbox"  id="uplaod_file" name="upload_document" value="1"> Upload Document</td>
                </tr>
                <tr>
                  <td colspan="8" style="padding:8px;">
                      <table width="50%" id="uplaod_file"> 
                        <tr>
                            <td align="left" style="padding:8px;color: #0000fb;background-color: #ffffff;" >
                              <input type="file" name="userfile" upload="uplaod_file" value="File" size="20">
                            </td>
                        </tr>
                      </table>
                  </td>
                </tr>
                <tr>
                  <td colspan="8" align="left" style="padding:4px;border-bottom: solid 1px #c4c4ff;border-top: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><input type="checkbox" id="copypaste" name="copy_paste" value="2"> Copy&Paste Work.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="8" style="padding:8px;">
              <table width="100%" height="100%" id="copy_paste">
                <tr>
                  <td colspan="8" align="center" style="padding:8px;color: #0000fb;background-color: #ffffff;">
                    <textarea rows="800" cols="180"  copypaste="copy_paste" name="copypaste"></textarea>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
              <td  height="25px" style="padding:4px;background-color:#ffffff;border-top: solid 1px #bfbfbf;text-align: center;" colspan="8" ><input class="btn" type="submit" name="upload" id="submit" value="Submit"></td>
          </tr>
      </table>
    </form>
  </div>
</div>
<script>
  $('#uplaod_file').change(function() {
    if($('#uplaod_file').is(':checked')){
       $("table[id='uplaod_file']").show();
       $("#copypaste").prop('disabled', true);

    }else {
      $("table[id='uplaod_file']").hide();
      $("#copypaste").prop('disabled', false);
    }
  }).change();
  $('#copypaste').change(function() {
    if($('#copypaste').is(':checked')){
     $("table[id='copy_paste']").show();
     $("#uplaod_file").prop('disabled', true);

    }else {
      $("table[id='copy_paste']").hide();
      $("#uplaod_file").prop('disabled', false);     
    }
  }).change();

  $('#singlecomponent').change(function() {
    if($('#singlecomponent').is(':checked')){
      $("table[id='tbl_singlecomp']").show();
       $("#multicomponent").prop('disabled', true);

    }else {
      $("table[id='tbl_singlecomp']").hide();
      $("#multicomponent").prop('disabled', false);
    }
  }).change();
  $('#multicomponent').change(function() {
    if($('#multicomponent').is(':checked')){
     $("table[id='tbl_components']").show();
     $("#singlecomponent").prop('disabled', true);

    }else {
       $("table[id='tbl_components']").hide();
      $("#singlecomponent").prop('disabled', false);     
    }
  }).change();
  
</script>
<script>
 $(document).ready(function () {
   
   var id=2;

    // Add button functionality
    $(document).on('click','#add_row',function () {
        
        var html='<tr><td>Component '+id+' <input type="text" name="component[]" id="component_'+id+' class="id"></td><td>Label Claim (mg) <input type="text" name="lc_component[]" id="lc_component" class="id"></td></tr>';
        var master = $(this).closest("table.dynatable");
     
         master.find("tbody").append(html);
        //alert('egfdeg')
        id++;
    });
    
   // Remove button functionality
    $("table.dynatable button.remove").click(function () {
        $(this).parents("tr").remove();
        
    });
     $("#test_data").click(function(){
    $("#test_table").toggle();
  });
        // initialize
    $('.standard_weight').first().attr('data-count',1);
    $('.standard_container').first().attr('data-count',1);
    $('.container').first().attr('data-count',1);

    $(".addColumn").click(function () {
        
        counter=0;
        $('tr:first-child > td >input').each(function(){
            counter++;
        });
        $('tr.prototype > td:last-child input').each(function(){
            name = $(this).attr('name');
            id = $(this).attr('id');
            class_val = $(this).attr('class');
            td = $(this).parent().clone();
            td.find('input').attr('name',name);
            td.find('input').attr('id',id);
            td.find('input').attr('data-count',counter);
            td.find('input').attr('class',class_val);
            td.find('input').val(" ");
            $(this).parent().parent().append(td);         
        });
    });
       
  });
</script>
</body>
</html>