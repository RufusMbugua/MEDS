function createNoty(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert">';    
    html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#noty-holder').slideDown();
};

function myFunction() {
    //createNoty('success', 'success');
    $(' #company_profile').submit(function(e) {
        e.preventDefault();
       // $('.page-alert .close').click(function()){
        //$(this).closest('.page-alert').slideUp();
        // window.location.href='".base_url().'/company_profile/Get'."';
        // }
        var n  = noty({
            type : "warning",
            text : "success"
        })
//save to ajax
        n;
    });

}
