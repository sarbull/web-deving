$(document).ready(function() {
    
    get_emails();
    
    setInterval(function () {
        refresh_emails();
    }, 10000);
    
    $('#emails .email .click_me').live('click', function() {
        var email = $(this).parent().parent();
        if($(this).is(":checked")) {
            email.addClass("selected");
        } else {
            email.removeClass('selected');
        }
    });
});