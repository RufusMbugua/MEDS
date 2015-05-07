<table width="100%">
  <tr>
    <td align="center" style="border-bottom: solid 10px #c4c4ff;color: #0000fb;background-color: #e8e8ff;"><h5>Unassigned Analysis Test Requests</h5></td>
  </tr>
</table>
<table id="list" class="list_view_header" width="100%" bgcolor="#ffffff" cellpadding="4px">
     
    <thead bgcolor="#efefef">
       <tr>
            <th style="text-align:center;border-right: dotted 1px #ddddff;"></th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Lab Reg.No</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Sample Name</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Batch No</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Client</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?> 
            >Quantity Submitted</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==5){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Quantity Issued</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Quantity Remaining</th>
            <th style="text-align:center;border-right: dotted 1px #ddddff;">Date Requested</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6 ){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Qoute</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==5){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Print Label</th>
            <th 
            <?php
              if($user['logged_in']['user_type']==6){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Assign</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Edit</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Print</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==6){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Logs</th>
            <th
            <?php 
              if($user['logged_in']['user_type']==5){
                echo"style='dsiplay:block;text-align:center;border-right: dotted 1px #ddddff;'";
              }else{
                echo"style='display:none;'";
              }
            ?>
            >Test</th>  
       </tr>
    </thead>
    <tbody>
    <?php
      $i=1;
      foreach ($query as $row):     
    ?>
    <tr>
       <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px"><?php echo $i;?>.</td>
       <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->laboratory_number;?></td>
       <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->active_ingredients;?></td>
       <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->batch_lot_number;?></td>
       <td style="text-align: left;border-bottom: solid 1px #c0c0c0;"><?php echo $row->applicant_name;?></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><?php echo $row->quantity_submitted;?></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==5){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><?php echo $row->sample_issued;?></td>
       
       <td
        <?php 
          if($user['logged_in']['user_type']==6){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><?php echo $row->quantity_remaining;?></td>
       <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo substr($row->date_time,0,-8);?></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6 ){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
            ?>>
            <a href="<?php echo base_url().'finance/index/'.$row->id;?>">Quote</a>
            <?php
          }else{
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";?>>
            Quoted
            <?php
          }
        ?>
       </td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==5){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><a href="<?php echo base_url().'print_label/generate_label/'.$row->id;?>">Print</a></td>
       <td
       <?php
        if($user['logged_in']['user_type']==6){
          echo"style='display:block;'";
        }else{
          echo"style='display:none;'";
        }
       ?>>
          <div
              <?php
              if($row->quantity_remaining=="0"){
                  echo"style='display:block;text-align: center;'>";
              ?><a href="<?php echo base_url().'worksheet/'.$row->id;?>">Worksheet</a>
          </div>
              <?php
              }elseif($row->quantity_remaining!="0"){
              ?>
          <div
              <?php
                  echo"style='display:block;text-align: center;'>";
              ?><a href="<?php echo base_url().'assignment/index/'.$row->id;?>">Assign</a>
          </div>
            <?php
            }
            ?>
       </td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><a href="<?php echo base_url().'update_request_record/Update/'.$row->id.'/'.$user_type_id.'/'.$department_id;?>">edit</a></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6||$user['logged_in']['user_type']==7){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><a href="<?php echo base_url().'update_request_record/print_testrequestform/'.$row->id;?>">print</a></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==6){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><a href="<?php echo base_url().'view_logs/logs/'.$row->id;?>">Log</a></td>
       <td
        <?php 
          if($user['logged_in']['user_type']==5){
            echo"style='dsiplay:block;text-align:center;border-bottom: solid 1px #c0c0c0;'";
          }else{
            echo"style='display:none;'";
          }
        ?>
       ><a href="<?php echo base_url().'test/index/'.$row->id.'/'.$row->test_type_id;?>">Test</a></td>
       <?php
         $i++;
       ?>
       </tr>
           <?php endforeach; ?>
     </tbody>           
</table>
