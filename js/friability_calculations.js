$(document).ready(function(){

  $('.difference').keyup(function() {

    var differencea=(Math.abs(document.getElementById('a').value) - Math.abs(document.getElementById('b').value));
    var differenceb=(Math.abs(document.getElementById('a1').value) - Math.abs(document.getElementById('b1').value));
    
    var difference1 = differencea.toFixed(5);
    var difference2 = differenceb.toFixed(5);
    $('.total_amount1').val(difference1);
    $('.total_amount2').val(difference2);

    var loss_in_weight=(((difference1 - difference2)/difference1)*100);
    $('.loss_in_weight').val(loss_in_weight.toFixed(5));    
    });
});