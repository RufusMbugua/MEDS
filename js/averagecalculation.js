$(document).ready(function(){

  $('.total').keyup(function() {
    
    var sum = 0;
    var sum1 = 0;
    var average = 0;
    var average_rounded = 0;
    var lcg=0;
    var lc=$("#dosage").val();
    var lc_one=$("#dosage_one").val();
    var lc_two=$("#dosage_two").val();
    var lcg=(lc/1000);
    var lcg_one=(lc_one/1000);
    var lcg_two=(lc_two/1000);
    var method= new String();

    boxes = $(".total").filter(function() {
                return (this.value.length);
    }).length;

    $('.total').each(function() {
        sum += Number($(this).val());
        sum1 = sum.toFixed(5);
        average = sum1 / boxes;
        average_rounded = average.toFixed(5);
        ratio=((lcg/average_rounded)*100);
        ratio_one=((lcg_one/average_rounded)*100);
        ratio_two=((lcg_two/average_rounded)*100);
    });

    if(ratio_one>=25){
        method="Weight Variation";
        $('.method_one').val(method);
    }else{
        method="Content Uniformity";
        $('.method_one').val(method);
    }
    if(ratio_two>=25){
        method="Weight Variation";
        $('.method_two').val(method);
    }else{
        method="Content Uniformity";
        $('.method_two').val(method);
    }
    $('.average').val(average_rounded);
    $('.lcg').val(lcg);
    $('.lcg_one').val(lcg_one);
    $('.lcg_two').val(lcg_two);
    $('.ratio').val(ratio);
    $('.ratio_one').val(ratio_one);
    $('.ratio_two').val(ratio_two);

    });

    $('.total_two').keyup(function() {
    
    var sum = 0;
    var sum1 = 0;
    var average = 0;
    var lowest=0;
    var highest=0;
    var lower_range=0;
    var upper_range=0;
    var average_rounded = 0;
    var lower_range_rounded=0;
    var upper_range_rounded=0;
    var final_upper_range=0;
    var lc=$("#dosage").val();
    var lcg=(lc/1000);
    var method= new String();

    values = $(".total_two").filter(function() {
        return (this.value);
    });
    values_b= [$("#ar").val(),$("#br").val(),$("#cr").val(),$("#dr").val(),$("#er").val(),$("#fr").val(),$("#gr").val(),$("#hr").val(),$("#ir").val(),$("#jr").val(),
               $("#kr").val(),$("#lr").val(),$("#mr").val(),$("#nr").val(),$("#or").val(),$("#pr").val(),$("#qr").val(),$("#rr").val(),$("#sr").val(),$("#tr").val()];
    

    var highest= Math.max.apply(Math,values_b);
    var lowest= Math.min.apply(Math,values_b);

    boxes = $(".total_two").filter(function() {
        return (this.value.length);
    }).length;
    

    $('.total_two').each(function() {


        sum += Number($(this).val());
        sum1 = sum.toFixed(5);
        average = sum1 / boxes;
        average_rounded = average.toFixed(5);
        ratio=((lcg/average_rounded)*100);
        ratio_rounded=ratio.toFixed(2);
    });

    if(ratio>=25){
        method="Weight Variation";
        $('.method').val(method);
    }else{
        method="Content Uniformity";
        $('.method').val(method);
    }
    $('.average').val(average_rounded);
    $('.lcg').val(lcg);
    $('.ratio').val(ratio_rounded);

    $('#lowest_weight').val(lowest);
    $('#highest_weight').val(highest);

    var lower_range=((average_rounded-lowest)/average_rounded)*100;
    var upper_range=((average_rounded-highest)/average_rounded)*100;

    lower_range_rounded=lower_range.toFixed(2);
    upper_range_rounded=upper_range.toFixed(2);
    

    $('#lower_range').val(lower_range_rounded);
    $('#upper_range').val(upper_range_rounded);

    });
});