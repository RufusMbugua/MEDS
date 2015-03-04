<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <script src="<?php echo base_url().'js/jquery.js';?>"></script>
  <script src="<?php echo base_url().'js/jquery-ui.js';?>"></script>
  <link href="<?php echo base_url().'style/jquery.tooltip.css';?>" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url().'style/jquery-ui.css';?>" rel="stylesheet" type="text/css"/>
<style type="text/css">
    .dynatable {
            border: solid 1px #000;
            border-collapse: collapse;
        }

            .dynatable th,
            .dynatable td {
                border: solid 1px #000;
                padding: 2px 10px;
                width: 170px;
                text-align: center;
            }

            .dynatable .prototype {
                /*display: none;*/
            }
</style>
   <script>
$(document).ready(function () {
    var id = 0;

    // Add button functionality
    $("table.dynatable button.add").click(function () {
        id++;
        var master = $(this).closest("table.dynatable");
        // Get a new row based on the prototype row
        var prot = master.find("tr.prototype").clone();
        prot.attr("class", "")
        prot.find(".id").attr("value", id);
        master.find("tbody").append(prot);
    });
    
    //Remove button functionality
    $("table.dynatable button.remove").click(function () {
        $(this).parent("tr").remove();
        
    });
    
        // initialize
    $('.standard_weight').first().attr('data-count',1);
    $('.standard_container').first().attr('data-count',1);
    $('.container').first().attr('data-count',1);
 calculate();
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
 calculate();

                
        });
    });

    
    function calculate(){
        $('.container').keyup(function(){  
            count = $(this).attr('data-count');
            standard_weight=$('.standard_weight[data-count='+count+']');
            standard_container=$('.standard_container[data-count='+count+']');
            container=$('.container[data-count='+count+']');
            console.log(container);
            standard_weight.val(standard_container.val()-container.val());
      
    });
    }
});
</script> 
</head>
<body>
    <table  class="dynatable">
    <thead>
        <tr>
            <th></th>
            <th><button style="width: 100px; height: 25px" class="addColumn">Add Column</button></th>
            <th><button style="width: 100px; height: 25px" class="remove">Remove Column</button></th>
        </tr>
    </thead>
    <tbody>
        <tr class="prototype">
            <td>Standard</td>
            <td><input type="text" name="standard_description[]" id="standard_description[]" class="id" /></td> 
        </tr>
         <tr class="prototype">
            <td>Potency</td>
            <td><input type="text" name="potency[]" id="potency[]" class="id" /></td> 
        </tr>
         <tr class="prototype">
            <td>ID No.</td>
            <td><input type="text" name="id_no[]" id="id_no[]" class="id" /></td> 
        </tr>
         <tr class="prototype">
            <td>Lot No.</td>
            <td><input type="text" name="lot_no[]" id="lot_no[]" class="id" /></td> 
        </tr>
         <tr class="prototype">
            <td>Weight of standard + container</td>
            <td><input type="text" name="standard_container[]" id="standard_container[]" class="standard_container" /></td> 
        </tr>
         <tr class="prototype">
            <td>Weight of container</td>
            <td><input type="text" name="container[]" id="container[]" class="container compute" /></td> 
        </tr>
         <tr class="prototype">
            <td>Weight of standard</td>
            <td><input type="text" name="standard_weight[]" id="standard_weight[]" class="standard_weight" /></td> 
        </tr>
    </tbody>
</table>
<table  class="dynatable_1">
    <thead>
        <tr>
            <th><!-- <button class="add">Add</button> --></th>    
            <th><button style="width: 100px; height: 25px" class="addColumn">Add Column</button></th>
        </tr>
    </thead>
    <tbody>
        <tr class="prototype_2">
            <td>Standard</td>
            <td><input type="text" name="standard_description[]" value="0" id="standard_description" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>Potency</td>
            <td><input type="text" name="potency[]" value="0" id="potency" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>ID No.</td>
            <td><input type="text" name="id_no[]" value="0" id="id_no" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>Lot No.</td>
            <td><input type="text" name="lot_no[]" value="0" id="lot_no[]" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>Weight of standard + container</td>
            <td><input type="text" name="standard_container[]" id="standard_container[]" value="0" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>Weight of container</td>
            <td><input type="text" name="container[]" value="0" id="container[]" class="id" /></td> 
        </tr>
         <tr class="prototype_2">
            <td>Weight of standard</td>
            <td><input type="text" name="standard_weight[]" id="standard_weight[]" value="0" class="id" /></td> 
        </tr>
    </tbody>
</table>
</body>
</html>