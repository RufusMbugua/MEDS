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
     $("#equipment_balance").on('change',function(){
      var idnumber=$(this).find(":selected").data("idnumber");
      $("#idnumber").val(idnumber);
      
    });
      $("#theremometerused").on('change',function(){
      var equipmentused=$(this).find(":selected").data("equipmentused");
      $("#equipmentused").val(equipmentused);
      
    });
      $("#theremometerused_a").on('change',function(){
      var equipmentuseda=$(this).find(":selected").data("equipmentuseda");
      $("#equipmentuseda").val(equipmentuseda);
      
    });
      $("#theremometerused_b").on('change',function(){
      var equipmentusedb=$(this).find(":selected").data("equipmentusedb");
      $("#equipmentusedb").val(equipmentusedb);
      
    });
      $("#theremometerused_c").on('change',function(){
      var equipmentusedc=$(this).find(":selected").data("equipmentusedc");
      $("#equipmentusedc").val(equipmentusedc);
      
    });
      $("#theremometerused_d").on('change',function(){
      var equipmentusedd=$(this).find(":selected").data("equipmentusedd");
      $("#equipmentusedd").val(equipmentusedd);
      
    });
     $("#equipment_id").on('change',function(){
      var equipmentbalance=$(this).find(":selected").data("equipmentbalance");
      $("#equipmentbalance").val(equipmentbalance);
      
    });
     $("#standard_description_one").on('change',function(){
      var stdlotnumber=$(this).find(":selected").data("stdlotnumber");
      var stdrefnumber=$(this).find(":selected").data("stdrefnumber");
      $("#stdlotnumber").val(stdlotnumber);
      $("#stdrefnumber").val(stdrefnumber);
      
    });
     $("#reagents_1").on('change',function(){
      var reagentlotnumber_1=$(this).find(":selected").data("reagentlotnumber_1");
      var reagentcardnumber_1=$(this).find(":selected").data("reagentcardnumber_1");
      $("#reagentlotnumber_1").val(reagentlotnumber_1);
      $("#reagentcardnumber_1").val(reagentcardnumber_1);
      
    });
     $("#reagents_2").on('change',function(){
      var reagentlotnumber_2=$(this).find(":selected").data("reagentlotnumber_2");
      var reagentcardnumber_2=$(this).find(":selected").data("reagentcardnumber_2");
      $("#reagentlotnumber_2").val(reagentlotnumber_2);
      $("#reagentcardnumber_2").val(reagentcardnumber_2);
      
    });
     $("#reagents_3").on('change',function(){
      var reagentlotnumber_3=$(this).find(":selected").data("reagentlotnumber_3");
      var reagentcardnumber_3=$(this).find(":selected").data("reagentcardnumber_3");
      $("#reagentlotnumber_3").val(reagentlotnumber_3);
      $("#reagentcardnumber_3").val(reagentcardnumber_3);
      
    });
     $("#reagents_4").on('change',function(){
      var reagentlotnumber_4=$(this).find(":selected").data("reagentlotnumber_4");
      var reagentcardnumber_4=$(this).find(":selected").data("reagentcardnumber_4");
      $("#reagentlotnumber_4").val(reagentlotnumber_4);
      $("#reagentcardnumber_4").val(reagentcardnumber_4);
      
    });
     $("#reagents_5").on('change',function(){
      var reagentlotnumber_5=$(this).find(":selected").data("reagentlotnumber_5");
      var reagentcardnumber_5=$(this).find(":selected").data("reagentcardnumber_5");
      $("#reagentlotnumber_5").val(reagentlotnumber_5);
      $("#reagentcardnumber_5").val(reagentcardnumber_5);
      
    });
     $("#reagents_6").on('change',function(){
      var reagentlotnumber_6=$(this).find(":selected").data("reagentlotnumber_6");
      var reagentcardnumber_6=$(this).find(":selected").data("reagentcardnumber_6");
      $("#reagentlotnumber_6").val(reagentlotnumber_6);
      $("#reagentcardnumber_6").val(reagentcardnumber_6);
      
    });
     $("#reagent_description").on('change',function(){
      var reagentslotnumber=$(this).find(":selected").data("reagentslotnumber");
      var reagentsrefnumber=$(this).find(":selected").data("reagentsrefnumber");
      var potencynumber=$(this).find(":selected").data("potencynumber");
      $("#reagentslotnumber").val(reagentslotnumber);
      $("#reagentsrefnumber").val(reagentsrefnumber);
      $("#potencynumber").val(potencynumber);
      
    });
     $("#standard_description_two").on('change',function(){
      var stdlotnumbertwo=$(this).find(":selected").data("stdlotnumbertwo");
      var stdrefnumbertwo=$(this).find(":selected").data("stdrefnumbertwo");
      $("#stdlotnumbertwo").val(stdlotnumbertwo);
      $("#stdrefnumbertwo").val(stdrefnumbertwo);
      
    });
     $("#make_id").on('change',function(){
      var equipmentmake=$(this).find(":selected").data("equipmentmake");
      $("#equipmentmake").val(equipmentmake);
      
    });
      $("#equipment_make").on('change',function(){
      var equipmentid=$(this).find(":selected").data("equipmentid");
      $("#equipmentid").val(equipmentid);
    });
      $("#equipment_make_1").on('change',function(){
      var equipmentid_1=$(this).find(":selected").data("equipmentid-1");
      $("#equipmentid_1").val(equipmentid_1);
    });
    
    $("#column_name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#column_dimensions").val(dimensions);
      $("#column_serial_number").val(serial_number);
      $("#column_manufacturer").val(manufacturer);
    });
    $("#analyst").on('change',function(){
      var assigneruserid=$(this).find(":selected").data("assigneruserid");
      $("#assigneruserid").val(assigneruserid);
      
    });
    $("#standard_description").on('change',function(){
      var idno=$(this).find(":selected").data("idno");
      var lotno=$(this).find(":selected").data("lotno");
      var potency=$(this).find(":selected").data("potency");
      $("#id_no").val(idno);
      $("#lot_no").val(lotno);
      $("#potency").val(potency);
      $("#det_1_potency").val(potency); $("#det_2_potency").val(potency); $("#det_3_potency").val(potency); $("#det_4_potency").val(potency); $("#det_5_potency").val(potency); $("#det_6_potency").val(potency);

    });
    $("#name").on('change',function(){
      var dimensions=$(this).find(":selected").data("dimensions");
      var serial_number=$(this).find(":selected").data("serialnumber");
      var manufacturer=$(this).find(":selected").data("manufacturer");
      $("#length").val(dimensions);
      $("#serial_no").val(serial_number);
      $("#manufacturer").val(manufacturer);
    });
  });