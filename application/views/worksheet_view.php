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
  <link href="<?php echo base_url().'datatables/extensions/Tabletools/css/dataTables.tableTools.css';?>" type="text/css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"> -->
  <link rel="stylesheet" href="<?php echo base_url().'style/jquery-ui.css';?>">

  <!-- bootstrap reference css library -->
  <link href="<?php echo base_url().'bootstrap/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url().'js/jquery-1.11.0.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <!-- Datepicker reference js library -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/datepicker.js';?>"></script>
 
  <!-- Tinymce reference js library -->
  <script type="text/javascript" src="<?php echo base_url().'tinymce/tinymce.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'tinymce/textarea_script.js';?>"></script>
  
  <!-- bootstrap reference js library -->
  <script src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
  
  <!-- custom js reference js library -->
  <script type="text/javascript" src="<?php echo base_url().'js/tabs.js';?>"></script>
 
  <!-- printing reference js library -->
  <script src="<?php echo base_url().'datatables/media/js/jquery.dataTables.js';?>" type="text/javascript"></script>
  <script src="<?php echo base_url().'datatables/extensions/TableTools/js/dataTables.tableTools.js';?>" type="text/javascript"></script>
  
  <script>
   $(document).ready(function() {
    /* Init DataTables */
    $('#list').DataTable({
    
     "sScrollY": "100%",
     "sScrollX": "100%",
     "iDisplayLength": 100,
     "bSort": false,
     "pagingType": "full_numbers",
     "sDom": "T lfrtip",
     "oTableTools": {
      "aButtons": [      
      
      {
        "sExtends": "collection",
        "sButtonText": 'Save',
        "aButtons": ["csv", "xls", "pdf"],
        "sPdfOrientation" : "landscape",
        "sPdfSize" : "A4",
      }
      ],
      "sSwfPath": "<?php echo base_url().'datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf';?>"
    }
    });
    $('#chemical_test_link').click(function(){
         var tests = prompt("Please specify number of tests",1);
         if(tests != null){
          var url = "<?php echo base_url().'test_identification/index_chemical/'.$query['a'].'/'.$request[0]['tr'].'/'; ?>"+tests;
          window.location=url;
         }
        //
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
    <div id="form_wrapper_lists">
      <div id="account_lists">
        <input type="hidden" id="assignment_" value="<?php echo $query['a'];?>">
        <input type="hidden" id="test_request_id" value="<?php echo $request[0]['tr'];?>">
        
         <table class="subdivider" border="0" bgcolor="#ffffff" width="100%" cellpadding="8px" align="center">
           <tr>
             <td align="right" style="padding:4px;border-bottom: solid 1px #c4c4ff;color: #0000fb;background-color: #ffffff;"><a href="<?php echo base_url().'home';?>"><img src="<?php echo base_url().'images/icons/assign.png';?>" height="20px" width="20px">Back To Assigned Test Requests</a></td>
           </tr>
            <tr>
             <td  align="center" style="border-bottom: solid 5px #c4c4ff;color: #0000fb;background-color: #ffffff;"><h5><?php echo $request[0]['active_ingredients']." "."Samples Issued"." ".$query['sample_issued']?></h5></td>
           </tr>
        </table>
        <table id="list" border="0" width="100%" bgcolor="#ffffff" cellpadding="4px">
          <thead bgcolor="#efefef">
            <tr>
              <th style="text-align:center;padding:4px;background-color:#ffffff;border-top: solid 1px #ddddff;"><?php 
              if(!empty($monograph)){
                $monograph_id = $monograph[0]['id']; 
                ?><a class="monograph" href="<?php echo base_url().'test/view_monograph/'.$query['a'].'/'.$request[0]['tr'].'/'.$monograph_id;?>">View Monograph</a>
                <?php
              }else{  
              ?>
              <a class="monograph" href="<?php echo base_url().'test/monograph/'.$query['a'].'/'.$request[0]['tr'];?>"><img src="<?php echo base_url().'images/icons/add.png';?>" height="20px" width="20px">Add Monograph</a>
              <?php
              }
              ?></th>
              <th style="text-align:left;padding:4px;background-color:#ffffff;border-top: solid 1px #ddddff;"></th>
              <th style="text-align:left;padding:4px;background-color:#ffffff;border-top: solid 1px #ddddff;"></th>
              <th style="text-align:right;padding:4px;background-color:#ffffff;border-top: solid 1px #ddddff;"></th>
              <th style="text-align:right;padding:4px;background-color:#ffffff;border-top: solid 1px #ddddff;"><a class="coa" href="<?php echo base_url().'coa/view/'.$query['a'].'/'.$request[0]['tr'];?>">Generate a Certificate Of Analysis(COA)</a></th>
              </tr>
            <tr>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Test Name</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Monograph</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Specify Components</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">View Worksheet</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;background-color:#ffeea0;">Status</th>
            </tr>
            
          </thead>
          <tbody>
          <?php
          if($monograph==0){}else{
            if(in_array('1', $tests)){
              ?>
               <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Identification</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
               </tr>  
              <?php              
                
              if(in_array('24', $tests_done)){
                $t = 24;
              ?>
               <tr >
                    <td style="text-align:center;padding:4px;"><b></b></td>
                    <td
                    <?php
                      if(in_array('24', $monograph_specifications)){
                        echo'style="text-align:left;padding:4px;">';
                    ?>
                      <a href="<?php echo base_url().'test_identification/monograph_assay/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">View Identification By Assay Specification</a>
                    <?php
                      }else{
                    ?>
                      <td style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_identification/monograph_assay/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Identification By Assay Specifications</a></td>
                    <?php
                      }
                    ?>
                                       
                 <?php              

                  if(empty($identification_assay)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_identification/index/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Identification Assay Test</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Identification Assay 
                <?php
                }             
                ?>
                </td>
                    <td <?php 
                      if(empty($identification_assay)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                         style='text-align:center;padding:4px;'><a href='<?php echo base_url().'test_identification/view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>'>View Worksheet</a>
                     <?php   
                     }
                     ?>
                    </td>
                    <td 
                      <?php 
                      if(empty($identification_assay)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>                     
                    </td>
              </tr>
              <?php
                }else{}
              ?>
              <?php
                if(in_array('26',$tests_done)){
              ?>
              <tr>
                  <td style="text-align:center;padding:4px;"></td>
                  <td
                    <?php
                      if(in_array('26', $monograph_specifications)){
                      echo'style="text-align:left;padding:4px;">';
                    ?>
                    <a href="<?php echo base_url().'test_identification/monograph_uv/'.$query['a'].'/'.$request[0]['tr'];?>">View Identification By UV Specifications</a>
                    <?php
                      }else{
                       echo'style="text-align:center;padding:4px;">';  
                    ?>
                      <a href="<?php echo base_url().'test_identification/monograph_uv/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill in Test Specifications</a>
                    <?php
                      }
                    ?>
                  </td>
                    
                  <?php              
                  if(empty($identification_uv)){
                  ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_identification/index_uv/'.$query['a'].'/'.$request[0]['tr'];?>">Identification By UV Test</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Identification By UV Test 
                <?php
                }             
                ?>
                    <td 
                    <?php 
                      if(empty($identification_uv)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                         style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/view_worksheet_uv/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>                    
                    <td 
                      <?php 
                      if(empty($identification_uv)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                     
                    </td>
              </tr>
              <?php }else{}?>
              <?php
                if(in_array('34',$tests_done)){
              ?>
              <tr>
                    <td style="text-align:center;padding:4px;"></td>
                    <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/monograph_infrared/'.$query['a'].'/'.$request[0]['tr'];?>">Specification</a></td>
                    <?php              

                      if(in_array('34', $monograph_specifications)){
                        ?>
                        <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_identification/index_infrared/'.$query['a'].'/'.$request[0]['tr'];?>">Infrared</a>
                     <?php     
                     }else{                         
                      ?>
                        <td style='text-align:left;padding:4px;'>Please fill in Infrared Specification  
                    <?php
                    }             
                    ?>
                    <td 
                    <?php 
                      if(empty($identification_infrared)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                         style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/view_worksheet_infrared/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>                    
                    <td 
                      <?php 
                      if(empty($identification_infrared)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf';>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf';>";
                         echo "Complete";
                     }?>
                     
                    </td>
              </tr>
              <?php
              }else{}
              ?>
              <?php
                if(in_array('28',$tests_done)){
              ?>
              <tr>
                    <td style="text-align:center;padding:4px;"></td>
                    <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/monograph_thin_layer/'.$query['a'].'/'.$request[0]['tr'];?>">Specifications</a></td>
                    <?php              

                      if(in_array('28', $monograph_specifications)){
                        ?>
                        <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_identification/index_thin_layer/'.$query['a'].'/'.$request[0]['tr'];?>">Thin Layer</a>
                     <?php     
                     }else{                         
                      ?>
                        <td style='text-align:left;padding:4px;'>Please fill in Thin Layer Specification  
                    <?php
                    }             
                    ?>
                    <td 
                    <?php 
                      if(empty($identification_thin_layer)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                        style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/view_worksheet_thin_layer/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
                    
                    <td 
                      <?php 
                      if(empty($identification_thin_layer)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf';>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf';>";
                         echo "Complete";
                     }?>
                     
                    </td>
              </tr>
              <?php
              }else{}
              ?>
              <?php
                if(in_array('30',$tests_done)){
                  $t = 30;
              ?>
              <tr>
                    <td style="text-align:center;padding:4px;"></td>
                    <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/monograph_hplc/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Specifications</a></td>
                    <?php              

                      if(in_array('30', $monograph_specifications)){
                        ?>
                        <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_identification/index_hplc/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Identification By HPLC</a>
                     <?php     
                     }else{                         
                      ?>
                        <td style='text-align:left;padding:4px;'>Please fill in HPLC Specification  
                    <?php
                    }             
                    ?>
                    <td 
                    <?php 
                      if(empty($identification_hplc)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                        style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/view_worksheet_hplc/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
                    <td 
                      <?php 
                      if(empty($identification_hplc)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                     
                    </td>
              </tr>
              <?php
              }else{}
              ?>
              <?php
                if(in_array('32',$tests_done)){
              ?>
              <tr>
                    <td style="text-align:center;padding:4px;"></td>
                    <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/monograph_chemical/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Specifications</a></td>
                    <?php              

                      if(in_array('32', $monograph_specifications)){
                        ?>
                        <td style='text-align:left;padding:4px;'><a id="chemical_test_link"  href="#">Chemical Method</a>
                     <?php     
                     }else{                         
                      ?>
                        <td style='text-align:left;padding:4px;'>Please fill in Chemical Method Specification  
                    <?php
                    }             
                    ?>
                    <td 
                    <?php 
                      if(empty($identification_chemical_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                       style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_identification/view_worksheet_chemical/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
                    <td 
                      <?php 
                      if(empty($identification_chemical_method)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                     
                    </td>
              </tr>
              <?php
              }else{}
              ?>
             <?php
           }else{
              
              
             }
             ?>
          <?php
            if(in_array('6', $tests)){
              ?>
            <?php
                if(in_array('36',$tests_done)){
                  $t = 36;
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"><b>Dissolution</b></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/monograph_uv/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Specification</a></td>
                <td 
                <?php              

                  if(in_array('36', $monograph_specifications)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_dissolution/index/'.$query['a'].'/'.$request[0]['tr'].'/'.$t;?>">Normal Tablet: UV</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in UV Specification  
                <?php
                }             
                ?>
                <td 
                <?php 
                      if(empty($diss_uv)){
                    
                          echo"style='text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                     style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/view_worksheet_uv/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
              <td 
                <?php 
                      if(empty($diss_uv)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$diss_uv[0]['choice']==1 && @$diss_uv[0]['status']==1|| @$diss_uv[0]['choice']==0 && @$diss_uv[0]['status']==0){                  
                      
                          echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Normal Tablet (UV): Second Stage";
                          
                     }
                     else{
                      ?>
                        style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_second_stage_uv/'.$query['a'].'/'.$request[0]['tr'];?>">Normal Tablet (UV): Second Stage</a></td>
                     <?php   
                     }
                     ?>
              <td></td>
              <td></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$diss_uv[0]['choice']==0 && @$diss_uv[0]['status']==2 || @$diss_uv[0]['choice']==0 && @$diss_uv[0]['status']==3 || @$diss_uv[0]['choice']==1 && @$diss_uv[0]['status']==3 ){                  
                      
                      ?>style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_third_stage_uv/'.$query['a'].'/'.$request[0]['tr'];?>">Normal Tablet (UV): Third Stage</a></td>
                      <?php
                     }else{
                        
                         echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Normal Tablet (UV): Third Stage";
                     } ?>
                <td></td>
              <td></td>
            </tr>
            <?php 
            }else{}
            ?>
            <?php
            if(in_array('7', $tests)){
              ?>
               <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Dissolution</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
               </tr>  
            <?php
              if(in_array('38',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php
                  if(empty($dissolution_delayed) && in_array('38', $monograph_specifications) ){
                    echo'style="text-align:left;padding:4px;">';
                    ?>
                    <a href="<?php echo base_url().'test_dissolution/monograph_delayed_release/'.$query['a'].'/'.$request[0]['tr'];?>">Dissolution Delayed Release Tablets HPLS Specifications</a>
                    <?php
                  }else{
                    echo'style="text-align:left;padding:4px;">';
                    ?>
                    <a href="<?php echo base_url().'test_dissolution/monograph_delayed_release/'.$query['a'].'/'.$request[0]['tr'];?>">View Dissolution Delayed Release Tablets HPLS Specifications</a>
                <?php
                  }
                ?>
                </td>  
                <td 
                <?php              

                  if(in_array('38', $monograph_specifications)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_dissolution/index_delayed_release/'.$query['a'].'/'.$request[0]['tr'];?>">Delayed Release Tablets: HPLC </a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Delayed Release Specification  
                <?php
                }             
                ?>
                <td 
                <?php 
                      if(empty($dissolution_delayed)){
                    
                          echo"style='text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                     style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/view_worksheet_delayed_release/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
              <td 
                <?php 
                      if(empty($dissolution_delayed)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_delayed[0]['choice']==1 && @$dissolution_delayed[0]['status']==1|| @$dissolution_delayed[0]['choice']==0 && @$dissolution_delayed[0]['status']==0){                  
                      
                          echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Delayed Release (HPLC): Second Stage";
                          
                     }
                     else{
                      ?>
                        style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_delayed_release_second_stage/'.$query['a'].'/'.$request[0]['tr'];?>">Delayed Release (HPLC): Second Stage</a></td>
                     <?php   
                     }
                     ?>
                <td></td>
              <td></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_delayed[0]['choice']==0 && @$dissolution_delayed[0]['status']==2 || @$dissolution_delayed[0]['choice']==0 && @$dissolution_delayed[0]['status']==3 || @$dissolution_delayed[0]['choice']==1 && @$dissolution_delayed[0]['status']==3 ){                  
                      
                      ?>style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_delayed_release_third_stage/'.$query['a'].'/'.$request[0]['tr'];?>"> Delayed Release (HPLC): Third Stage</a></td><?php
                     }else{
                        
                         echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                         echo " Delayed Release (HPLC):Third Stage";
                     } ?>
                <td></td>
              <td></td>
            </tr>
            <?php 
              }else{}
                    }else{}
            ?>
            <?php
                if(in_array('44',$tests_done)){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/monograph_enteric_coated/'.$query['a'].'/'.$request[0]['tr'];?>">Specification</a></td>
                <?php              

                  if(in_array('44', $monograph_specifications)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_dissolution/index_enteric_coated/'.$query['a'].'/'.$request[0]['tr'];?>">Enteric Coated Tablet: Single Component, HPLC</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Enteric Coated Specification  
                <?php
                }             
                ?>
                <td 
                <?php 
                      if(empty($dissolution_enteric_coated)){
                    
                          echo"style='text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                      style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/view_worksheet_enteric_coated/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
              <td 
                <?php 
                      if(empty($dissolution_enteric_coated)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_enteric_coated[0]['choice']==1 && @$dissolution_enteric_coated[0]['status']==1|| @$dissolution_enteric_coated[0]['choice']==0 && @$dissolution_enteric_coated[0]['status']==0){                  
                      
                          echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Enteric Coated (Single, HPLC): Second Stage";
                          
                     }
                     else{
                      ?>
                        style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_enteric_coated_second_stage/'.$query['a'].'/'.$request[0]['tr'];?>">Enteric Coated (HPLC): Second Stage</a></td>
                     <?php   
                     }
                     ?>
                <td></td>
              <td></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_enteric_coated[0]['choice']==0 && @$dissolution_enteric_coated[0]['status']==2 || @$dissolution_enteric_coated[0]['choice']==0 && @$dissolution_enteric_coated[0]['status']==3 || @$dissolution_enteric_coated[0]['choice']==1 && @$dissolution_enteric_coated[0]['status']==3 ){                  
                      
                      ?>style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_enteric_coated_third_stage/'.$query['a'].'/'.$request[0]['tr'];?>"> Enteric Coated (HPLC): Third Stage</a></td><?php
                     }else{
                        
                         echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";echo " Enteric Coated (HPLC):Third Stage";
                     } ?>
                <td></td>
              <td></td>
            </tr>
            <?php 
              }else{}
            ?>
            <?php
                if(in_array('56',$tests_done)){

              ?>
              <tr>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b>Dissolution</b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/monograph_normal_hplc/'.$query['a'].'/'.$request[0]['tr'];?>">Specification</a></td>
                <td  
                 <?php              

                  if(in_array('56', $monograph_specifications)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_dissolution/index_normal/'.$query['a'].'/'.$request[0]['tr'];?>">Dissolution Normal Tablet: HPLC</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Dissolution Normal Tablets Specification  
                <?php
                }             
                ?>
                <td 
                <?php 
                      if(empty($dissolution_normal_hplc)){
                    
                          echo"style='text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                       style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_dissolution/view_worksheet_normal/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?>
              <td 
                <?php 
                      if(empty($dissolution_normal_hplc)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_normal_hplc[0]['choice']==1 && @$dissolution_normal_hplc[0]['status']==1|| @$dissolution_normal_hplc[0]['choice']==0 && @$dissolution_normal_hplc[0]['status']==0){                  
                      
                          echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Normal Tablets (HPLC): ";
                          
                     }
                     else{
                      ?>
                        style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_second_normal/'.$query['a'].'/'.$request[0]['tr'];?>">Normal Tablets (HPLC): Second Stage</a></td>
                     <?php   
                     }
                     ?>
                <td></td>
              <td></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                <?php 
                      if(@$dissolution_normal_hplc[0]['choice']==0 && @$dissolution_normal_hplc[0]['status']==2 || @$dissolution_normal_hplc[0]['choice']==0 && @$dissolution_normal_hplc[0]['status']==3 || @$dissolution_normal_hplc[0]['choice']==1 && @$dissolution_normal_hplc[0]['status']==3 ){                  
                      
                      ?>style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_dissolution/index_third_normal/'.$query['a'].'/'.$request[0]['tr'];?>">Normal Tablets ( HPLC): Third Stage</a></td><?php
                     }else{
                        
                         echo"style='text-align:left;padding:4px;color:#000;border-bottom:solid 1px #bfbfbf;'>";echo "Normal Tablets (HPLC): Third Stage";
                     } ?>
                <td></td>
              <td></td>
            </tr>
            <?php }else{}?>
            <?php }else{}?>
           

           <?php
            if(in_array('11', $tests)){
            ?>

            <tr>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b>Uniformity of Dosage</b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td></td>
            </tr>
            <?php 
              if($monograph[0]['components']==1){
            ?>
            <tr>
              <?php
              if(in_array('52',$tests_done)){
              ?>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(!in_array('52', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_specifications_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View Uniformity of Dosage Test Specification</a>&nbsp;&nbsp;
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(in_array('52', $monograph_specifications) && empty($uniformity_dosage)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage/'.$query['a'].'/'.$request[0]['tr'];?>"> Uniformity of Dosage Test Single Component</a> 
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     Uniformity of Dosage Test Single Component
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(in_array('Weight Variation', $uniformity_of_dosage)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                        <a href="<?php echo base_url().'content_uniformity/worksheet_uniformity_of_dosage_view/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a>  
                     <?php     
                     }elseif(in_array('Content Uniformity', $uniformity_of_dosage)){
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet_uniformity_of_dosage_view/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a>
                <?php
                }else{
                 echo"style='text-align:center;padding:4px;'>";
                 ?>
                 View Worksheet
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($uniformity_of_dosage)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }
                     ?>
                </td>
            </tr>
            <?php
              }else{} }else{}
            ?>

            <?php 
              if($monograph[0]['components']==2){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(!in_array('j', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_specifications_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view specification</a>&nbsp;&nbsp;
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(in_array('j', $monograph_specifications) && empty($uniformity_of_dosage_multicomponent)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_multicomponent/'.$query['a'].'/'.$request[0]['tr'];?>"> Uniformity of Dosage Test Multicomponent</a> 

                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     Uniformity of Dosage Test Multicomponent
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(in_array('Weight Variation', $uniformity_of_dosage_multicomponent_m1)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                        <a href="<?php echo base_url().'content_uniformity/worksheet_uniformity_of_dosage_view/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>  
                     <?php     
                     }elseif(in_array('Content Uniformity', $uniformity_of_dosage_multicomponent_m1)){
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet_uniformity_of_dosage_view/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }else{
                 echo"style='text-align:center;padding:4px;'>";
                 ?>
                 view worksheet
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($uniformity_of_dosage_multicomponent)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }
                     ?>
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php
            if(in_array('9', $tests)){
            ?>

            <tr>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b>Content Uniformity</b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td></td>
            </tr>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('52',$tests_done)){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td style='text-align:left;padding:4px;'>
                  <?php 
                  if(empty($uniformity_of_dosage)){  
                  ?>
                    First Conduct Uniformity of Dosage Test
                  <?php       
                  }elseif(!empty($uniformity_of_dosage) && in_array('Weight Variation', $uniformity_of_dosage)){
                  ?>
                    <a href="<?php echo base_url().'assay/assay_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Assay Test specifications</a>
                  <?php
                  }elseif(!empty($uniformity_of_dosage) && in_array('Content Uniformity', $uniformity_of_dosage)){
                  ?>
                    <a href="<?php echo base_url().'assay/assay_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Content Uniformity Test Specification</a>
                  <?php
                  }else{
                    ?>
                    <a href="<?php echo base_url().'assay/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view Assay specifications</a>
                    <?php
                  }
                  ?>
                </td>
                <td style="text-align:left;padding:4px;">
                   <?php 
                    if(!in_array('1',$hplc_internal_method))
                      {
                        ?>
                        <a href="<?php echo base_url().'assay/assay_tests/'.$query['a'].'/'.$request[0]['tr'];?>">Assay Test Single Component</a>&nbsp;
                    <?php 
                  }elseif(!in_array('0',$hplc_internal_method) || empty($hplc_internal_method ) && in_array('1',$hplc_internal_method)){
                   ?>
                     Assay Test Single Component
                   <?php
                    }
                   ?>
                </td>
                <td
                 <?php 
                      if(!in_array('1',$hplc_internal_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($hplc_internal_method)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
                      }else{}
                            }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td style='text-align:left;padding:4px;'>
                  <?php 
                  if(empty($uniformity_of_dosage_multicomponent_m1)){  
                  ?>
                    First Conduct Uniformity of Dosage Test
                  <?php       
                  }elseif(!empty($uniformity_of_dosage_multicomponent_m1) && !in_array('g', $monograph_specifications) && in_array('Content Uniformity', $uniformity_of_dosage_multicomponent_m1)){
                  ?>
                    <a href="<?php echo base_url().'content_uniformity/content_uniformity_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Content Uniformity Test specifications</a>
                  <?php
                  }elseif(!empty($uniformity_of_dosage_multicomponent_m1) && !in_array('k', $monograph_specifications) && !in_array('f', $monograph_specifications) && in_array('Weight Variation', $uniformity_of_dosage_multicomponent_m1)){
                  ?>
                    <a href="<?php echo base_url().'assay/assay_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Assay Test Specification</a>
                  <?php
                  }else{
                    ?>
                    <a href="<?php echo base_url().'assay/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view Assay specifications</a>
                    <?php
                  }
                  ?>
                </td>
                <td style="text-align:left;padding:4px;">
                   <?php 
                    if(!in_array('1',$hplc_internal_method))
                      {
                        ?>
                        <a href="<?php echo base_url().'assay/assay_hplc_areamethod_multicomponent/'.$query['a'].'/'.$request[0]['tr'];?>">Assay HPLC Area Method Test Multicomponent</a>&nbsp;
                    <?php 
                  }elseif(!in_array('0',$assay_hplc_area_method_multicomponent) || empty($assay_hplc_area_method_multicomponent ) && in_array('1',$hplc_internal_method)){
                   ?>
                     Assay Test Multicomponent
                   <?php
                    }
                   ?>
                </td>
                <td
                 <?php 
                      if(!in_array('1',$hplc_internal_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($assay_hplc_area_method_multicomponent)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){

                if(in_array('54',$tests_done)){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b>Weight Variation</b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"><b></b></td>
                <td style="text-align:center;padding:4px; background-color:#ffffff;"></td>
            </tr>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <!-- && in_array('Weight Variation', $uniformity_of_dosage) -->
                <td 
                  <?php 
                      if(in_array('1',$hplc_internal_method) && in_array('54', $monograph_specifications) ){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/weight_variation_specifications_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View Weight Variation Specification</a>
                  <?php       
                     }else if(empty($hplc_internal_method)){
                        echo"style='text-align:left;padding:4px;'>";
                        echo "First Complete Assay Test";
                    ?>
                    <?php
                    }else if(in_array('54', $monograph_specifications)){
                      echo"style='text-align:left;padding:4px;'>";
                    ?>
                    <a href="<?php echo base_url().'content_uniformity/weight_variation_specifications_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View Weight Variation Specification</a>
                    <?php
                    }else{
                      echo"style='text-align:left;padding:4px;'>";
                    ?>
                    <a href="<?php echo base_url().'content_uniformity/weight_variation_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Weight Variation Test specifications</a>
                    <?php
                    }
                  ?>
                </td>
                 <td
                 <?php 
                      if(in_array('54', $monograph_specifications) && empty($weight_variation)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/weight_variation_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Weight Variation Test</a>
                     <?php     
                     }else{
                        echo"style='text-align:left;padding:4px;'>";
                        echo"Weight Variation Test";
                   ?>
                   
                     
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($weight_variation)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo"View Worksheet";
                          ?>
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/weight_variation_worksheet_view/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($weight_variation)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
                    }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(in_array('1',$hplc_internal_method) && !in_array('6', $monograph_specifications) && !in_array('Weight Variation', $uniformity_of_dosage)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/weight_variation_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Weight Variation Test specifications</a>
                  <?php       
                     }elseif(!empty($hplc_internal_method)){
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/weight_variation_specifications_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view Weight Variation specification</a>  
                    <?php
                    }else{
                    ?>
                    First Complete Assay Test
                    <?php
                    }
                  ?>
                </td>
                 <td
                 <?php 
                      if(in_array('21', $monograph_specifications) && in_array('Weight Variation', $uniformity_of_dosage)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/weight_variation_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Weight Variation Test</a>
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                   Weight Variation Test
                     
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($weight_variation_hplc_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/weight_variation_worksheet_view/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($weight_variation_hplc_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($weight_variation_hplc_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('12',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_hplc_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity Hplc Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity Hplc Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($content_uniformity_hplc_single_component)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($content_uniformity_hplc_single_component)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($content_uniformity_hplc_single_component[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
                      }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                  ?>
                      <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_hplc_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>  
                    <a href="<?php echo base_url().'assay/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
    
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity Hplc Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity Hplc Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($weight_variation_hplc_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($content_uniformity_hplc_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($content_uniformity_hplc_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('14',$tests_done)){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_titra_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_titration_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_titra_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity Titration Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity Titration Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($content_uniformity_titration_single_component)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($content_uniformity_titration_single_component)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($content_uniformity_titration_single_component[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_titra_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_titration_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_titra_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity Titration Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity Titration Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($content_uniformity_titration_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($content_uniformity_titration_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($content_uniformity_titration_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('16',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_uv_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_uv_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>&nbsp;&nbsp;
                      <a href="<?php echo base_url().'content_uniformity/uniformity_of_dosage_unit_single_component_uv_single_wavelength/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Uniformity of Dosage Unit Single Component (UV) Single Wavelength</a> 
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_uv_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity UV Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity UV Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($content_uniformity_uv_single_component)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                  if(empty($content_uniformity_uv_single_component)){
                    echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                    echo "Not Done";
                      
                 }else if ($content_uniformity_uv_single_component[0]['test_status']==1){
                     echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                     echo "Complete"; 
                 }?>
              </td>
            </tr>
            <?php
              }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(empty($uniformity_monograp_content_uniformity_uv_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'content_uniformity/monograph_content_uniformity_uv_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'content_uniformity/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>&nbsp;&nbsp;
                      <a href="<?php echo base_url().'content_uniformity/monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Uniformity of Dosage Unit Two Components (UV) Single Wavelength</a>  
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($uniformity_monograp_content_uniformity_uv_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Content Uniformity UV Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Content Uniformity UV Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($content_uniformity_uv_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'content_uniformity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td 
                <?php 
                      if(empty($content_uniformity_uv_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($content_uniformity_uv_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
            <?php
            }else{}
           }else{}
            ?>

          <?php
            if(in_array('8', $tests)){
             ?>
             <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Assay</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
            </tr>
             <?php  
              if($monograph[0]['components']==1){
                if(in_array('6',$tests_done)){
             ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($monograph)){
                      echo"style='text-align:left;padding:4px;'>Test Specification";  
                      }
                      else if(in_array('6',$monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                      <a href="<?php echo base_url().'assay/view_monograph_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View Assay Test Specification</a>    
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/assay_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Test specification</a>
                      
                     <?php
                     }
                     ?>
                </td>
                <td
                 <?php 
                      if(empty($monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Internal Method Single Component
                     <?php     
                     }elseif(!empty($assay_hplc_internal_method)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Internal Method Single Component has been Conducted 
                     <?php     
                     }
                     else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/assay_tests/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Hplc Internal Method Single Component</a>&nbsp; 
                     <?php
                     if($hplc_internal_method==1.2){
                    ?>
                    <a href="<?php echo base_url().'assay/worksheet_internal_method_single_component_stg2/'.$query['a'].'/'.$request[0]['tr'].'/';?>">STG2-REPEAT</a>&nbsp; 
                    <?php
                     }elseif($hplc_internal_method==2.2){
                     ?>
                     <a href="<?php echo base_url().'assay/worksheet_internal_method_single_component_stg3/'.$query['a'].'/'.$request[0]['tr'].'/';?>">STG3-REPEAT</a> 
                     <?php 
                     }
                     ?>
                <?php
                }
                ?>
                </td>
                 <td
                 <?php 
                      if(empty($hplc_internal_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method_single_component/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
              <td
                <?php 
                      if(empty($hplc_internal_method)){
                        echo"style='text-align:center;padding:4px;border-top:bottom 1px #bfbfbf;background-color:#ffeea0;'>";
                        echo "Not Done";
                          
                     }else if (!empty($hplc_internal_method)){
                         echo"style='text-align:center;padding:4px;border-top:solid 1px #bfbfbf;background-color:#98ff98;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            
            </tr>
            <?php 
              }else{}
                    }else{}
                           }else{} 
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_internal_method_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_internal_method_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/view_monograph_hplc_internal_method_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                     <?php
                     }
                     ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_internal_method_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Internal Method Two Components
                     <?php     
                     }else if(!empty($assay_monograph_hplc_internal_method_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/worksheet_internal_method_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Hplc Internal Method Two Components</a> 
                          
                     <?php     
                     }
                     else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                        Hplc Internal Method Two Components has been Conducted 
                     <?php
                }
                ?>
                </td>
                 <td
                 <?php 
                      if(empty($hplc_internal_method_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
              <td
                <?php 
                      if(empty($hplc_internal_method_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;border-top:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if (!empty($hplc_internal_method_two_components)){
                         echo"style='text-align:center;padding:4px;border-bottom:solid 1px #bfbfbf;background-color:#98ff98;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{}
            ?>

            <?php 
              if($monograph[0]['components']==1){
                if(in_array('1',$tests_done)){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                 <?php
                    if( !empty($uniformity_of_dosage)||empty($uniformity_of_dosage) && in_array('Weight Variation', $uniformity_of_dosage)){
                  
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/assay_specifications/'.$query['a'].'/'.$request[0]['tr'].'/';?>">Please Fill Assay Test specifications</a>
                  <?php       
                      }else{
                        echo"style='text-align:left;padding:4px;'>";
                     ?>
                    <a href="<?php echo base_url().'assay/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View Assay specifications</a>
 
                    <?php
                     }
                    ?>
                </td>
                <td
                <?php 
                    if(in_array('6',$monograph_specifications) && empty($hplc_internal_method )){

                        echo"style='text-align:left;padding:4px;'>";
                        ?>
                        <a href="<?php echo base_url().'assay/assay_tests/'.$query['a'].'/'.$request[0]['tr'];?>">Assay Test Single Component</a>&nbsp;
                    <?php 
                  }else{
                    echo"style='text-align:left;padding:4px;'>";
                    echo "Assay Test Single Component";
                    }
                   ?>
                </td>
                <td
                 <?php 
                      if(empty($hplc_internal_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          View Worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a>
                <?php
                }
                ?>
                </td>
                <td 
                <?php 
                      if(empty($hplc_internal_method)){
                        echo "style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else{
                         echo "style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>
                </td>
            </tr>
             <?php
            }else{} 
                  }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_area_method_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                      <a href="<?php echo base_url().'assay/view_monograph_area_method_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">View specification</a>
                    <?php
                    }
                    ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                        <a href="<?php echo base_url().'assay/worksheet_area_method_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Two Components</a>     
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_area_method_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_two_components)){
                        echo "style='text-align:center;padding:4px;background-color:#ffeea0;border-top:solid 1px #bfbfbf;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if($assay_hplc_area_method_two_components[0]['test_status']==1){
                         echo "style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
              </td>
            </tr>
            <?php
            }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_two_components_dif_methods)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_two_components_dif_methods/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                      <a href="<?php echo base_url().'assay/view_monograph_hplc_area_method_two_components_dif_methods/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                     <?php
                      }
                     ?> 
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_two_components_dif_methods)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Two Components Different Methods
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_area_method_two_components_different_methods/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Two Components Different Methods</a>
                <?php
                }
                ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_hplc_area_method_two_components_different_methods)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_two_components_different_methods)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_two_components_different_methods[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>  
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){

                if(in_array('4',$tests_done)){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_oral_liquids_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_two_oral_liquids_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                         ?>
                         <a href="<?php echo base_url().'assay/view_monograph_hplc_area_method_two_oral_liquids_single_component/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                     <?php
                     }
                     ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_oral_liquids_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Oral Liquids Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_oral_liquids_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Oral Liquids Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_oral_liquids_single_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_oral_liquids_single_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_oral_liquids_single_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>   
                </td>
            </tr> 
            <?php
            }else{}
                  }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_oral_liquids_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_two_oral_liquids_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                      <a href="<?php echo base_url().'assay/view_monograph_hplc_area_method_two_oral_liquids_two_components/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                    <?php
                      }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_oral_liquids_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Oral Liquids Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_oral_liquids_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Oral Liquids Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_oral_liquids_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_oral_liquids_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_oral_liquids_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('58',$tests_done)){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_powder_for_oral_liquids)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_powder_for_oral_liquids/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                     <a href="<?php echo base_url().'assay/view_monograph_hplc_area_method_powder_for_oral_liquids/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_powder_for_oral_liquids)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Powder for Oral Liquids
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_powder_for_oral_liquids/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Powder for Oral Liquids</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_powder_for_oral_liquids)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_powder_for_oral_liquids)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_powder_for_oral_liquids[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('8',$tests_done)){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_injection_powder_single_comp)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_injection_powder_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                     <a href="<?php echo base_url().'assay/view_monograph_hplc_area_method_injection_powder_single_component/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                     <?php
                     }
                     ?> 
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_injection_powder_single_comp)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Injection Powder Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_injection_powder_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Injection Powder Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_injection_powder_single_component)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_area_method_injection_powder_single_component)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_injection_powder_single_component[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_area_method_injection_powder_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_area_method_injection_powder_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                     <a href="<?php echo base_url().'assay//'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_area_method_injection_powder_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Hplc Area Method Injection Powder Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_injection_powder_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Hplc Area Method Injection powder Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_injection_powder_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_area_method_injection_powder_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_area_method_injection_powder_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('14',$tests_done)){
            ?> 
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_titration)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_titration/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                     <a href="<?php echo base_url().'assay/view_monograph_titration/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_titration)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Assay General Titration
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_titration/'.$query['a'].'/'.$request[0]['tr'];?>">Assay General Titration</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_titration)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($assay_titration)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_titration[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>  
                </td>
            </tr>
            <?php
            }else{}}else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('59',$tests_done)){
            ?>
             <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_titration)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_indometric_titration/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                          
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                     ?>
                     <a href="<?php echo base_url().'assay/view_monograph_indometric_titration/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a>&nbsp;&nbsp;
                     <a href="<?php echo base_url().'test_vs_solution/index/'.$query['a'].'/'.$request[0]['tr'];?>">Volumetric Solution</a>
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_indometric_titration)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Idometric Titration
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_indometric_titration/'.$query['a'].'/'.$request[0]['tr'];?>">Assay Idometric Titration</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_indometric_titration)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($assay_indometric_titration)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_indometric_titration[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?>  
                </td>
            </tr>
            <?php
            }else{}
                  }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('10',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_ultraviolet_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_ultraviolet_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_ultraviolet_single_component_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_monograph_ultraviolet_single_component)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          (UV) ultraviolet Single Component
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_ultravioletv_single_component/'.$query['a'].'/'.$request[0]['tr'];?>">(UV) ultraviolet Single Component</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_ultraviolet_single_component)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_single_component_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_ultraviolet_single_component)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_ultraviolet_single_component[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==2){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_ultraviolet_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_ultraviolet_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_ultraviolet_two_components_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_monograph_ultraviolet_two_components)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          (UV) ultraviolet Two Components
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_ultravioletv_two_components/'.$query['a'].'/'.$request[0]['tr'];?>">(UV) ultraviolet Two Components</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_ultraviolet_two_components)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_internal_method/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_ultraviolet_two_components)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_ultraviolet_two_components[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{}
            ?>

            <?php 
              if($monograph[0]['components']==1){
                if(in_array('61',$tests_done)){
            ?>

            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_injections)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_injections/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_hplc_injections_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_monograph_hplc_injections)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Assay Injections
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_injections/'.$query['a'].'/'.$request[0]['tr'];?>">Assay Injections</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_injections)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_injections/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_injections)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_injections[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{}}else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('63',$tests_done)){
              ?>
            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_cream)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_cream/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_hplc_cream_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_monograph_hplc_cream)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Assay cream
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_cream/'.$query['a'].'/'.$request[0]['tr'];?>">Assay cream</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_cream)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_cream/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_cream)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_cream[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
            }else{} }else{}
            ?>
            <?php 
              if($monograph[0]['components']==1){
                if(in_array('65',$tests_done)){
              ?> 

            <tr>
                <td style="text-align:center;padding:4px;"></a></td>
                <td 
                  <?php 
                      if(empty($assay_monograph_hplc_ointment)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'assay/monograph_hplc_ointment/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                      <a href="<?php echo base_url().'assay/monograph_hplc_ointment_view/'.$query['a'].'/'.$request[0]['tr'].'/';?>">View specification</a> 
                    <?php
                    }
                    ?>
                </td>
                 <td
                 <?php 
                      if(empty($assay_monograph_hplc_ointment)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          Assay ointment
                     <?php     
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/worksheet_ointment/'.$query['a'].'/'.$request[0]['tr'];?>">Assay ointment</a>
                <?php
                }
                ?>
                </td>
                <td
                 <?php 
                      if(empty($assay_hplc_ointment)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'assay/full_worksheet_hplc_ointment/'.$query['a'].'/'.$request[0]['tr'].'/';?>">view worksheet</a>
                <?php
                }
                ?>
                </td>
                <td
                <?php 
                      if(empty($assay_hplc_ointment)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done";
                          
                     }else if ($assay_hplc_ointment[0]['test_status']==1){
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete"; 
                     }?> 
                </td>
            </tr>
            <?php
           }else{} }else{}
           ?>      

           <?php 
            if(in_array('2', $tests)){
                ?>
            <tr>
              <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Friability</b></td>
              <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
              <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
              <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
              <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
            </tr>
            <?php 
            if(in_array('18',$tests_done)){
            ?>
            <tr>
              <td style="text-align:center;padding:4px;"></td>
              <td 
                  <?php 
                      if(!in_array('b', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'friability/friability_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>  
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                     <a href="<?php echo base_url().'friability/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">View specification</a>
                    <?php
                    }
                    ?>
              </td>
              <td style='text-align:left;padding:4px;'>
                 <?php 
                    if(in_array('b', $monograph_specifications)){
                  ?>
                  <a href="<?php echo base_url().'friability/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Friability</a>
                  <?php     
                    }if(in_array('1', $friability)){
                   ?>
                    Friability
                <?php
                }else{}
                ?>
                </td>
                <td
                 <?php 
                      if(in_array('1',$friability)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'friability/friability_complete_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     view worksheet
                <?php
                }
                ?>
              </td>
              <td
               <?php 
                      if(in_array('1',$friability)){
                        echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";

                          
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                        echo "Not Done"; 
                     }?> 
              </td>
            </tr>    
             <?php
             }else{} }else{}
           ?>
            <?php
            if(in_array('4', $tests)){
              if(in_array('22',$tests_done)){
             ?>
              <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>ph</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
              </tr>
              <?php
              
              ?>
              <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td 
                  <?php 
                      if(in_array('22', $tests_done)){
                          echo"style='text-align:left;padding:4px;'>";
                    ?>
                     <a href="<?php echo base_url().'ph_alkalinity/ph_alkalinity_specifications_view/'.$query['a'].'/'.$request[0]['tr'];?>">View ph Specification</a>
                    <?php
                             
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'ph_alkalinity/ph_alkalinity_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>  
                  <?php    
                    }
                    ?>
              </td>
              <td style='text-align:left;padding:4px;'>
                  <?php 
                    if(in_array('22', $tests_done)){
                  ?>
                    pH
                  <?php     
                    }else{
                  ?>
                    <a href="<?php echo base_url().'ph_alkalinity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">ph</a>
                  <?php
                    }
                  ?>
                </td>
                <td
                 <?php 
                      if(empty($ph_alkalinity)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'ph_alkalinity/ph_complete_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($ph_alkalinity)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>  
                </td>
            </tr> 
            <?php
             }else{} }else{}
             ?>
             <?php
            if(in_array('4', $tests)){
               if(in_array('20',$tests_done)){
              ?>
              <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>General Tests</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
              </tr>
              <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td 
                  <?php 
                      if(!in_array('o', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'acidity_alkalinity/acidity_alkalinity_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>  
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                     <a href="<?php echo base_url().'acidity_alkalinity/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view specification</a>
                    <?php
                    }
                    ?>
              </td>
              <td style='text-align:left;padding:4px;'>
                  <?php 
                    if(in_array('o', $monograph_specifications)){
                  ?>
                    <a href="<?php echo base_url().'acidity_alkalinity/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Acidity/Akalinity</a>
                  <?php     
                    }else{
                  ?>
                    Acidity/Akalinity 
                  <?php
                    }
                  ?>
                </td>
                <td
                 <?php 
                      if(empty($acidity_alkalinity)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'acidity_alkalinity/acidity_alkalinity_complete_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($acidity_alkalinity)){
                         echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>  
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php 
              if(in_array('67',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td 
                  <?php 
                      if(!in_array('p', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'oxidisable/oxidisable_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>  
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                     <a href="<?php echo base_url().'oxidisable/specifications_view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view specification</a>
                    <?php
                    }
                    ?>
              </td>
              <td style='text-align:left;padding:4px;'>
                  <?php 
                    if(in_array('p', $monograph_specifications) && empty($oxidisables[0]['status'])){
                  ?>
                    <a href="<?php echo base_url().'oxidisable/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Oxidisable</a>
                  <?php     
                    }else{
                  ?>
                    Oxidisable 
                  <?php
                    }
                  ?>
                </td>
                <td
                 <?php 
                      if(empty($oxidisables)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'oxidisable/oxidisable_complete_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($oxidisables)){
                         echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>  
                </td>
            </tr>
            <?php
              }else{}
            ?>
            <?php
            if(in_array('69',$tests_done)){
            ?>
            <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td 
                  <?php 
                      if(!in_array('q', $monograph_specifications)){
                    
                          echo"style='text-align:left;padding:4px;'>";
                          ?>
                          <a href="<?php echo base_url().'chlorides/chlorides_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a>  
                  <?php       
                     }else{
                         echo"style='text-align:left;padding:4px;'>";
                    ?>
                     <a href="<?php echo base_url().'chlorides/chlorides_specifications/'.$query['a'].'/'.$request[0]['tr'];?>">view specification</a>
                    <?php
                    }
                    ?>
              </td>
              <td style='text-align:left;padding:4px;'>
                  <?php 
                    if(in_array('q', $monograph_specifications) && empty($chlorides[0]['status'])){
                  ?>
                    <a href="<?php echo base_url().'chlorides/worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">Chlorides</a>
                  <?php     
                    }else{
                  ?>
                    Chlorides 
                  <?php
                    }
                  ?>
                </td>
                <td
                 <?php 
                      if(empty($chlorides)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          ?>
                          view worksheet
                     <?php     
                     }else{
                         echo"style='text-align:center;padding:4px;'>";
                   ?>
                     <a href="<?php echo base_url().'chlorides/chlorides_complete_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                <?php
                }
                ?>
              </td>
              <td
                <?php 
                      if(empty($chlorides)){
                        echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>  
                </td>
            </tr>
            <?php  
             }else{} }else{}
             ?>

             <?php
            if(in_array('3', $tests)){
                if(in_array('46',$tests_done)){
             ?>
           <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Disintegration</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
           </tr>
           <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_disintergration/monograph/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a></td>
                <td 
                 <?php              
                  if(in_array('3', $monograph_specifications)){
                    ?>
                     <td style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_disintergration/index/'.$query['a'].'/'.$request[0]['tr'];?>">Specify Components</a></td>
                    
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Disintegration Specification  
                <?php
                }             
                ?></td>
                <td 
                <?php 
                      if(empty($query_six)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                      ?>
                        style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_disintergration/view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                     <?php   
                     }
                     ?> 
              <td 
                <?php 
                      if(empty($query_six)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
           <?php 
           }else{}}else{}
           ?>

           <?php
            if(in_array('12', $tests)){
              if(in_array('50',$tests_done)){
             ?>
          <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Karl Fisher (Water Method)</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
           </tr>
           <tr>                
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td <?php 
                    
                     if(in_array('41', $monograph_specifications)){
                        ?>
                         style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_water/index/'.$query['a'].'/'.$request[0]['tr'];?>">Karl Fisher</a>
                     <?php     
                     }else{                         
                        echo"style='text-align:left;padding:4px;'>";
                      ?>                        
                        Please fill in Karl Fisher Specification  
                    <?php
                    }             
                    ?>
                </td>
                <td 
                <?php 
                      if(empty($water_method)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                         ?>
                        style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_water/view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a>
                </td>
                      <?php
                      }
                     ?>
              <td 
                <?php 
                      if(empty($water_method)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
          <?php
           }else{}
                  }else{}
           ?>
           <?php
            if(in_array('14', $tests)){
              if(in_array('47', $tests)){
             ?>
           <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Loss on Drying</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
           </tr>
           <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_loss_drying/monograph/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a></td>
                <td 
              <?php              

                  if(in_array('14', $monograph_specifications)){
                    ?>
                    <td style='text-align:left;padding:4px;'><a href="<?php echo base_url().'test_loss_drying/index/'.$query['a'].'/'.$request[0]['tr'];?>">Loss Drying</a>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Loss Drying Specification  
                <?php
                }             
                ?>
                </td>
                <td 
                <?php 
                      if(empty($query_twelve)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                         ?>
                      style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_loss_drying/view_worksheet/'.$query['a'].'/'.$request[0]['tr'];?>">View Worksheet</a></td>
                      <?php
                      }
                      ?>
                <td 
                <?php 
                      if(empty($query_twelve)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
          <?php
           }else{}
                  }else{}
           ?>
           <?php
            if(in_array('5', $tests)){

              if(in_array('48',$tests_done)){
            ?>
          <tr>
                <td style="text-align:center;padding:4px;background-color:#ffffff;"><b>Related Substances</b></td>
                <td style='text-align:left;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
                <td style='text-align:center;padding:4px;background-color:#ffffff;'></td>
           </tr>
           <tr>
                <td style="text-align:center;padding:4px;"><b></b></a></td>
                <td style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_related_substances/monograph/'.$query['a'].'/'.$request[0]['tr'];?>">Please Fill Test specification</a></td>
                <td 
                <?php              

                  if(in_array('5', $monograph_specifications)){
                    ?>
                     <td style="text-align:left;padding:4px;"><a href="<?php echo base_url().'test_related_substances/index/'.$query['a'].'/'.$request[0]['tr'];?>">Specify Components</a></td>
                 <?php     
                 }else{                         
                  ?>
                    <td style='text-align:left;padding:4px;'>Please fill in Related Substances Specification  
                <?php
                }             
                ?>
                </td>
                <td 
                 <?php 
                      if(empty($query_eleven)){
                    
                          echo"style='text-align:center;padding:4px;'>";
                          echo "View Worksheet";
                     }else{
                         ?>
                      style="text-align:center;padding:4px;"><a href="<?php echo base_url().'test_related_substances/view_worksheet_related_substances/'.$query['a'].'/'.$request[0]['tr'];?>">view worksheet</a></td>
                      <?php
                      }
                      ?>
              <td 
                <?php 
                      if(empty($query_eleven)){
                    
                          echo"style='text-align:center;padding:4px;background-color:#ffeea0;border-bottom:solid 1px #bfbfbf;'>";
                          echo "Not Done";
                     }else{
                         echo"style='text-align:center;padding:4px;background-color:#98ff98;border-bottom:solid 1px #bfbfbf;'>";
                         echo "Complete";
                     }?>
                </td>
            </tr>
            <?php  
           }else{} }else{}
         }
           ?>
            </tbody>           
          </table>
      </div>
    </div>
  </body>
</html>