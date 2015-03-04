<script>
    $(document).ready(function() {
        /* Init DataTables */
        $('#listc').dataTable({
            "sScrollY":"270px",
            "sScrollX":"100%"
        });
        
    });
 </script>
<table class="table_form"  bgcolor="#c4c4ff" width="80%" height="30px" border="0" cellpadding="4px" align="center">
      <tr>
	    <td colspan="5" width="100px" style="border-top: solid 1px #bfbfbf;border-left: solid 1px #bfbfbf;border-right: solid 1px #bfbfbf;text-align:center;background-color:#e8e8ff;border-bottom: solid 8px #c4c4ff;color: #0000fb;">
	       <h5>Calibration Schedule</h5>
	   </td>
	</tr>
<div id="c">
<tr>
  <td>
    <table border='0' id="listc" class="list_view_header" width="1080px" align="center" bgcolor="#ffffff" cellpadding="4px">
        <thead bgcolor="#efefef">
            <tr>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">No</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Requirement</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Specification</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Interval</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Calibration Start Date</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Next Calibration Date</th>  
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Action</th>
            </tr>
        </thead>
        <tbody>
         <?php
           $i=1;
            if (is_array($calib))
                    foreach($calib as $row):
           
           if($i==0){     
         ?>
         <tr>
          <?php
          }
          ?>
            <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" width="20px"><?php echo $i;?>.</td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['c_requirement'];?></td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['c_interval'];?></td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['c_specification'];?></td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['c_start_date'];?></td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['c_next_date'];?></td>
            <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php //echo if($query['calibration_start'];){echo "";}else if(){echo"";}?></td>
            <?php
              $i++;
            ?>
            </tr>
              <?php endforeach; ?>  
           </tbody>           
    </table>
   </td>
  </tr>
<div>
</table>
