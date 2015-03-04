$(document).ready(function(){

  $('.invoice').keyup(function() {
    
    var sum = 0;
    var sum1 = 0;
    var average = 0;
    var average_rounded = 0;
    var identification=0;
    var friability=0;
    var disintegration=0;
    var ph_alkalinity=0;
    var dissolution=0;
    var assay=0;
    var content_uniformity=0;
    var full_monograph=0;
    var microbiology=0;
    var uniformity_of_dosage=0;
    var weight_variation=0;
    var related_substances=0;
    var water_method=0;
    var loss_drying=0;

    boxes = $(".invoice").filter(function() {
                return (this.value.length);
    }).length;

    $('.invoice').each(function() {
        sum += Number($(this).val());
        sum1 = sum.toFixed(2);
        average = sum1 / boxes;
        average_rounded = average.toFixed(2);
    });

    $('.total_amount').val(sum1);


    var identification= $("#unit_price_identification_cost").val();
    var friability= $("#unit_price_friability_cost").val();
    var disintegration= $("#unit_price_disintegration_cost").val();
    var ph_alkalinity= $("#unit_price_ph_alkalinity_cost").val();
    var dissolution= $("#unit_price_dissolution_cost").val();
    var assay= $("#unit_price_assay_cost").val();
    var content_uniformity= $("#unit_price_content_uniformity_cost").val();
    var full_monograph= $("#unit_price_full_monograph_cost").val();
    var microbiology= $("#unit_price_microbiology_cost").val();
    var uniformity_of_dosage= $("#unit_price_uniformity_of_dosage_cost").val();
    var weight_variation= $("#unit_price_weight_variation_cost").val();
    var related_substances= $("#unit_price_related_substances_cost").val();
    var water_method= $("#unit_price_water_method_cost").val();
    var loss_drying= $("#unit_price_loss_drying_cost").val();

    $("#identification_cost").val(identification);
    $("#friability_cost").val(friability);
    $("#disintegration_cost").val(disintegration);
    $("#ph_alkalinity_cost").val(ph_alkalinity);
    $("#dissolution_cost").val(dissolution);
    $("#assay_cost").val(assay);
    $("#content_uniformity_cost").val(content_uniformity);
    $("#full_monograph_cost").val(full_monograph);
    $("#microbiology_cost").val(microbiology);
    $("#uniformity_of_dosage_cost").val(uniformity_of_dosage);
    $("#weight_variation_cost").val(weight_variation);
    $("#related_substances_cost").val(related_substances);
    $("#water_method_cost").val(water_method);
    $("#loss_drying_cost").val(loss_drying);

    });

    $('.wv').keyup(function() {
    
    var sum = 0;
    var sum1 = 0;
    var average = 0;
    var average_rounded = 0;

    var suma = 0;
    var sum2 = 0;
    var average2 = 0;
    var average_rounded2 = 0;

    var averagewt=0;
    var av_dt=0
    var av_det_rounded=0;
    
    var av_one=0;
    var av_two=0;
    var av_three=0;
    var av_four=0;
    var av_five=0;
    var av_six=0;
    var av_seven=0;
    var av_eight=0;
    var av_nine=0;
    var av_ten=0;

    var est_one=0;
    var est_two=0;
    var est_three=0;
    var est_four=0;
    var est_five=0;
    var est_six=0;
    var est_seven=0;
    var est_eight=0;
    var est_nine=0;
    var est_ten=0;

    var dif1=0;
    var dif2=0;
    var dif3=0;
    var dif4=0;
    var dif5=0;
    var dif6=0;
    var dif7=0;
    var dif8=0;
    var dif9=0;
    var dif10=0;

    var sumb=0;
    var standard_dev=0;
    var relative_standard_dev=0;
    var standard_dev_rounded=0;
    var relative_standard_dev_rounded=0;
    var ac=0;

    var M= 0;
    var T= 0;
    var k= 2.4;

    boxes = $(".wv").filter(function() {
                return (this.value.length);
            }).length;

    $('.wv').each(function() {
        sum += Number($(this).val());
        sum1 = sum.toFixed(5);
        average = sum1 / boxes;
        average_rounded = average.toFixed(5);
    });

    
    $('.meanwv').val(average_rounded);
     var uniformity_average=$(".uniformity_average").val();
     var avdet=$(".av_det").val();

     var wt_one= $("#wt_one").val();
     var est_one=(wt_one/uniformity_average)*avdet;
     var est_one_rounded=est_one.toFixed(5);   
     
     if(est_one_rounded!=0){
        $('#est_one').val(est_one_rounded);   
     }  
    
     var wt_two=$("#wt_two").val();
     var est_two=(wt_two/uniformity_average)*avdet;
     var est_two_rounded=est_two.toFixed(5);

    
    if(est_two_rounded!=0){
     $('#est_two').val(est_two_rounded);
    }
     var wt_three=$("#wt_three").val();
     var est_three=(wt_three/uniformity_average)*avdet;
     var est_three_rounded=est_three.toFixed(5);
    
    if(est_three_rounded!=0){
     $('#est_three').val(est_three_rounded);
    }
     var wt_four=$("#wt_four").val();
     var est_four=(wt_four/uniformity_average)*avdet;
     var est_four_rounded=est_four.toFixed(5);
    
    if(est_four_rounded!=0){
     $('#est_four').val(est_four_rounded);
    }
     var wt_five=$("#wt_five").val();
     var est_five=(wt_five/uniformity_average)*avdet;
     var est_five_rounded=est_five.toFixed(5);
    
    if(est_five_rounded!=0){
     $('#est_five').val(est_five_rounded);
    }
     var wt_six=$("#wt_six").val();
     var est_six=(wt_six/uniformity_average)*avdet;
     var est_six_rounded=est_six.toFixed(5);
    
    if(est_six_rounded!=0){
     $('#est_six').val(est_six_rounded);
    }
     var wt_seven=$("#wt_seven").val();
     var est_seven=(wt_seven/uniformity_average)*avdet;
     var est_seven_rounded=est_seven.toFixed(5);
    
    if(est_seven_rounded!=0){
     $('#est_seven').val(est_seven_rounded);
    }
     var wt_eight=$("#wt_eight").val();
     var est_eight=(wt_eight/uniformity_average)*avdet;
     var est_eight_rounded=est_eight.toFixed(5);
    
    if(est_eight_rounded!=0){
     $('#est_eight').val(est_eight_rounded);
    }
     var wt_nine=$("#wt_nine").val();
     var est_nine=(wt_nine/uniformity_average)*avdet;
     var est_nine_rounded=est_nine.toFixed(5);

    if(est_nine_rounded!=0){
     $('#est_nine').val(est_nine_rounded);
     }

     var wt_ten=$("#wt_ten").val();
     var est_ten=(wt_ten/uniformity_average)*avdet;
     var est_ten_rounded=est_ten.toFixed(5);
    if(est_ten_rounded!=0){
     $('#est_ten').val(est_ten_rounded);
    }

   boxes = $(".est").filter(function() {
                return (this.value.length);
            }).length;

    $('.est').each(function() {
        suma += Number($(this).val());
        sum2 = suma.toFixed(5);
        average2 = sum2 / boxes;
        average_rounded2 = average2.toFixed(5);
    });
    $('.meanest').val(average_rounded2 );

     var est_one=$("#est_one").val();
     var est_two=$("#est_two").val();
     var est_three=$("#est_three").val();
     var est_four=$("#est_four").val();
     var est_five=$("#est_five").val();
     var est_six=$("#est_six").val();
     var est_seven=$("#est_seven").val();
     var est_eight=$("#est_eight").val();
     var est_nine=$("#est_nine").val();
     var est_ten=$("#est_ten").val();

     var dif1=Math.pow((est_one-average_rounded2),2);
     var dif2=Math.pow((est_two-average_rounded2),2);
     var dif3=Math.pow((est_three-average_rounded2),2);
     var dif4=Math.pow((est_four-average_rounded2),2);
     var dif5=Math.pow((est_five-average_rounded2),2);
     var dif6=Math.pow((est_six-average_rounded2),2);
     var dif7=Math.pow((est_seven-average_rounded2),2);
     var dif8=Math.pow((est_eight-average_rounded2),2);
     var dif9=Math.pow((est_nine-average_rounded2),2);
     var dif10=Math.pow((est_ten-average_rounded2),2);

     var sumb=(dif1+dif2+dif3+dif4+dif5+dif6+dif7+dif8+dif9+dif10);
     var standard_dev=Math.sqrt((sumb)/9);
     var relative_standard_dev=(standard_dev/average_rounded2)*100;

     var standard_dev_rounded=standard_dev.toFixed(5);
     var relative_standard_dev_rounded=relative_standard_dev.toFixed(5);

     $('.standard_dev_est').val(standard_dev_rounded);
     $('.rsd_est').val(relative_standard_dev_rounded);

    var M= $("#m").val();
    var T= $("#t").val();

     if( T<101.5 || T==101.5){

        if(average_rounded2 >98.5 || average_rounded2 == 98.5 && average_rounded2 <101.5 || average_rounded2 ==101.5 ){
                        
            var ac=(k*standard_dev_rounded);
            var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);
        }else if(average_rounded2<98.5){
            var ac=(98.5-average_rounded2+(k*standard_dev_rounded));
            var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);
        }else if(average_rounded2>101.5){
            var ac=average_rounded2-101.5+(k*standard_dev_rounded);
            var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);
        }
        
    }
    if(T>101.5){
        if(average_rounded2 >98.5 || average_rounded2 == 98.5 && average_rounded2 <T || average_rounded2 ==T ){
          var ac=(k*standard_dev_rounded);
           var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);  
        }else if(average_rounded2<98.5){
          var ac=(98.5-standard_dev_rounded+(k*standard_dev_rounded));
           var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);  

        }else if(average_rounded2>T){
          var ac=(average_rounded2-T(k*standard_dev_rounded));
           var ac_rounded=ac.toFixed(1);
            $("#acceptance_value_of_ten").val(ac_rounded);  
        }
        
    }

    
    });
    
    $('.simple').keyup(function() {
    
    var result = 0;

    var a= $("#value_a").val();
    var b= $("#value_b").val();
    var c= $("#value_c").val();

    result=(a*b)/c;
    result_rounded = result.toFixed(5);

    $('.value_d').val(result_rounded);
    $('.df').val(result_rounded);
    

    });
   
});