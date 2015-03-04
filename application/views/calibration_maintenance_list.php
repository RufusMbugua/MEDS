<script>
    $(document).ready(function() {
        /* Init DataTables */
        $('#listb').dataTable({
            "sScrollY":"270px",
            "sScrollX":"100%"
        });
        $('#print_btn').click(function(){
          var no_of_prints = 1;
          no_of_prints = $('#no_of_prints').val();

          window.location = "<?php echo base_url().'maintenance/print_label/'.$query['id'].'/';?>"+no_of_prints;
        })
        
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
    <table border='0' id="listb" class="list_view_header" width="1080px" align="center" bgcolor="#ffffff" cellpadding="4px">
        <thead bgcolor="#efefef">
            <tr>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">No</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Date</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">First Reading</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Second Reading</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Third Reading</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Next Calibration Date</th>  
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Comment</th>
                <th style="text-align:center;border-right: dotted 1px #ddddff;">Print Label</th>
            </tr>
        </thead>
          <?php           
              if (is_array($calib_main))
                      foreach($calib_main as $row):          
             
           ?> 
         <tbody>
            <tr>
              <td style="border-right: dotted 1px #c0c0c0;text-align: center;border-bottom: solid 1px #c0c0c0;" ><?php echo $i;?>.</td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['calibration_date'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['first_reading'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['second_reading'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['third_reading'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['next_date'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><?php echo $row['comments'];?></td>
              <td style="text-align: center;border-bottom: solid 1px #c0c0c0;"><a href="#<?php echo $row['id'];?>">Print Label</a></td> 
            </tr>              
          </tbody> 

           <div class="modal-dialog-print" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                         
              <div class="modal-content">

                <div class="modal-header">
                  <a href="#close" title="Close" class="close">X</a>
                  <h4 class="modal-title" style="color:#000;"><?php echo $query['id_number'];?><br/></h4>
                </div>

                <div class="modal-body" style="font-size: 14px;color:#000;">
                  <div style="text-align:center;padding:12px;"> <?php echo $query['model'];?></div>
                  <div class="table">
                    <div class="left">Service</div><div class="right">Calibration</div>
                    <div class="left">Start Date <?php echo $row['calibration_date'];?></div><div class="right">Next Date <?php echo$row['next_date'];?></div>
                    <div style="text-align:center;padding:12px;" ><?php echo $row['person_reporting']; ?> </div>
                  </div>
                </div>
                <style type="text/css">
                  .left,.right{
                    width:50%;
                    padding: 8px;
                    display:inline-block;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                  }
                  .right{
                    float: right;
                  }
                  h6,h4{
                    text-align: center;
                  }
                </style>
                <div class="modal-footer" >
                <div style="text-align:center;padding:12px;" >  Labels to print: <input type="text" name="no_of_prints" id="no_of_prints"></div>
                <div style="text-align:center;padding:12px;" ><input type="button" name="print_btn" id="print_btn" value="Print" class="btn"> </div>
                </div>
               
              </div><!-- /.modal-content -->                                       

          </div><!-- /.modal -->            
        <?php endforeach; ?>  

    </table>
   </td>
  </tr>
<div>
</table>


