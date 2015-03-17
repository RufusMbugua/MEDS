<tbody>
    <tr>
        <td colspan="2" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
        <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
          <select id="standard_description_one" name="standard_description_one" >
          <option selected></option>
           <?php
           foreach($sql_standards as $s_name):
          ?>
           
           <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
            <?php
            endforeach
            ?>
          </select>
        </td>
        
    </tr>
     <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Lot Number</td>
        <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdlotnumber" name="std_lot_number" value=""></td>
       
    </tr>
    <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        ID Number</td>
        <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdrefnumber" name="std_id_number" value=""></td>
       
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Potency</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="potency_one" name="potency_one"></td>
   </tr>
   <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Base</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="higher_factor" name="higher_factor" class="standard_dilution_base"></td>
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Salt</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="lower_factor" name="lower_factor" class="standard_dilution_base"></td>  
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard + container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_container_one" id="weight_standard_container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_container_of_std_one" id="container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_one" id="weight_standard_one" class="standard_difference"></td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;">Standard Dilution Preparation:</td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="standard_dilution_preparation" row="8" cols="40"></textarea></td>
    </tr>
    <tr>
        <td colspan="4"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Dilution Calculation</td>
    </tr>
     <tr>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="salt" id="salt" >If the <b>Sample</b> is already a <b>Salt</b> (Please check the box)</td>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="base" id="base" >If the <b>Sample</b> is a base and needs conversion to a <b>Base</b> (please check the box)</td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;" >
        <table id="salt_calc" width="100%" cellpadding="4px" align="center">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_e" name="value_e" size="10" class="standard_dilution" placeholder="WSTD"> X <input type="text" id="value_f" name="value_f" value="1000" size="10" class="standard_dilution"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = <input type="text" id="value_h" name="standard_dilution_calculation" size="10" class="value_h "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_g" name="value_g" size="10" placeholder="Diluting Volume" class="standard_dilution"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;">
        <table id="base_calc" width="100%" align="center" cellpadding="4px">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_r" name="value_r" size="10" class="standard_dilution_base" placeholder="WSTD"> X <input type="text" id="value_t" name="value_t" size="10" value="1000" class="standard_dilution_base"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = ( <input type="text" id="value_u" name="standard_dilution_calculation" size="10" class="value_u "> ) * { <input type="text" id="value_x" name="value_x" size="10" class="higher " placeholder="Higher Factor"> / <input type="text" id="value_z" name="value_z" size="10" class="lower " placeholder="lower Factor"> } = <input type="text" id="value_wstd" name="value_wstd" size="10" class="wstd_converted "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_y" name="value_y" size="10" placeholder="Diluting Volume" class="standard_dilution_base"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
  </tbody>
<tbody>
    <tr>
        <td colspan="2" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
        <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
          <select id="standard_description_one" name="standard_description_one" >
          <option selected></option>
           <?php
           foreach($sql_standards as $s_name):
          ?>
           
           <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
            <?php
            endforeach
            ?>
          </select>
        </td>
        
    </tr>
     <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Lot Number</td>
        <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdlotnumber" name="std_lot_number" value=""></td>
       
    </tr>
    <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        ID Number</td>
        <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdrefnumber" name="std_id_number" value=""></td>
       
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Potency</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="potency_one" name="potency_one"></td>
   </tr>
   <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Base</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="higher_factor" name="higher_factor" class="standard_dilution_base"></td>
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Salt</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="lower_factor" name="lower_factor" class="standard_dilution_base"></td>  
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard + container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_container_one" id="weight_standard_container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_container_of_std_one" id="container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_one" id="weight_standard_one" class="standard_difference"></td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;">Standard Dilution Preparation:</td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="standard_dilution_preparation" row="8" cols="40"></textarea></td>
    </tr>
    <tr>
        <td colspan="4"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Dilution Calculation</td>
    </tr>
     <tr>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="salt" id="salt" >If the <b>Sample</b> is already a <b>Salt</b> (Please check the box)</td>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="base" id="base" >If the <b>Sample</b> is a base and needs conversion to a <b>Base</b> (please check the box)</td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;" >
        <table id="salt_calc" width="100%" cellpadding="4px" align="center">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_e" name="value_e" size="10" class="standard_dilution" placeholder="WSTD"> X <input type="text" id="value_f" name="value_f" value="1000" size="10" class="standard_dilution"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = <input type="text" id="value_h" name="standard_dilution_calculation" size="10" class="value_h "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_g" name="value_g" size="10" placeholder="Diluting Volume" class="standard_dilution"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;">
        <table id="base_calc" width="100%" align="center" cellpadding="4px">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_r" name="value_r" size="10" class="standard_dilution_base" placeholder="WSTD"> X <input type="text" id="value_t" name="value_t" size="10" value="1000" class="standard_dilution_base"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = ( <input type="text" id="value_u" name="standard_dilution_calculation" size="10" class="value_u "> ) * { <input type="text" id="value_x" name="value_x" size="10" class="higher " placeholder="Higher Factor"> / <input type="text" id="value_z" name="value_z" size="10" class="lower " placeholder="lower Factor"> } = <input type="text" id="value_wstd" name="value_wstd" size="10" class="wstd_converted "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_y" name="value_y" size="10" placeholder="Diluting Volume" class="standard_dilution_base"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
  </tbody>
<tbody>
    <tr>
        <td colspan="2" align="left"  style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Description:</td>
        <td colspan="6"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
          <select id="standard_description_one" name="standard_description_one" >
          <option selected></option>
           <?php
           foreach($sql_standards as $s_name):
          ?>
           
           <option value="<?php  echo $s_name['item_description'];?>" data-stdlotnumber="<?php  echo $s_name['batch_number'];?>" data-stdrefnumber="<?php  echo $s_name['reference_number'];?>"><?php  echo $s_name['item_description'];?></option>
            <?php
            endforeach
            ?>
          </select>
        </td>
        
    </tr>
     <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Lot Number</td>
        <td colspan="3" height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdlotnumber" name="std_lot_number" value=""></td>
       
    </tr>
    <tr>
        <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        ID Number</td>
        <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" id="stdrefnumber" name="std_id_number" value=""></td>
       
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Potency</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="potency_one" name="potency_one"></td>
   </tr>
   <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Base</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="higher_factor" name="higher_factor" class="standard_dilution_base"></td>
    </tr>
    <tr>
      <td align="left"  style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      Molecular Weight Salt</td>
      <td colspan="3"  height="20px" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
      <input type="text" id="lower_factor" name="lower_factor" class="standard_dilution_base"></td>  
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard + container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_container_one" id="weight_standard_container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of container(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_container_of_std_one" id="container_one" class="standard_difference"></td>
    </tr>
    <tr>
        <td height="25px"  align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        Weight of standard(g)</td>
        <td colspan="3"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">
        <input type="text" name="weight_standard_one" id="weight_standard_one" class="standard_difference"></td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;background-color: #ffffff;">Standard Dilution Preparation:</td>
    </tr>
    <tr>
      <td colspan="4"  height="25px" align="left" style="color:#000;padding:8px;border-bottom: solid 1px #c4c4ff;background-color: #ffffff;"><textarea type="text" name="standard_dilution_preparation" row="8" cols="40"></textarea></td>
    </tr>
    <tr>
        <td colspan="4"  align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;">Standard Dilution Calculation</td>
    </tr>
     <tr>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="salt" id="salt" >If the <b>Sample</b> is already a <b>Salt</b> (Please check the box)</td>
        <td colspan="2" align="left" style="padding:8px;border-bottom: dotted 1px #c4c4ff;background-color: #ffffff;"><input type="checkbox" name="base" id="base" >If the <b>Sample</b> is a base and needs conversion to a <b>Base</b> (please check the box)</td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;" >
        <table id="salt_calc" width="100%" cellpadding="4px" align="center">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_e" name="value_e" size="10" class="standard_dilution" placeholder="WSTD"> X <input type="text" id="value_f" name="value_f" value="1000" size="10" class="standard_dilution"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = <input type="text" id="value_h" name="standard_dilution_calculation" size="10" class="value_h "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_g" name="value_g" size="10" placeholder="Diluting Volume" class="standard_dilution"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="4" style="padding:8px;">
        <table id="base_calc" width="100%" align="center" cellpadding="4px">
          <tr>
            <td colspan="2" style="text-align:center;background:#ffffff;padding:8px;border-bottom: solid 1px #c4c4ff;"><input type="text" id="value_r" name="value_r" size="10" class="standard_dilution_base" placeholder="WSTD"> X <input type="text" id="value_t" name="value_t" size="10" value="1000" class="standard_dilution_base"></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"> = ( <input type="text" id="value_u" name="standard_dilution_calculation" size="10" class="value_u "> ) * { <input type="text" id="value_x" name="value_x" size="10" class="higher " placeholder="Higher Factor"> / <input type="text" id="value_z" name="value_z" size="10" class="lower " placeholder="lower Factor"> } = <input type="text" id="value_wstd" name="value_wstd" size="10" class="wstd_converted "></td>
            <td style="text-align:left;padding:8px;border-bottom: dotted 1px #c4c4ff;background:#ffffff;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"><input type="text" id="value_y" name="value_y" size="10" placeholder="Diluting Volume" class="standard_dilution_base"> </td>
            <td colspan="2" style="text-align:center;padding:8px;background:#ffffff;"></td>
          </tr>
        </table>
      </td>
    </tr>
  </tbody>
