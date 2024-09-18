jQuery(document).ready(function($) {
    // Check if the user has already verified their age
    if (!Cookies.get('ageVerified')) {
        $('#ageVerificationModal').modal({
            backdrop: 'static', 
            keyboard: false 
        });
    }

    $('#verifyAge').click(function() {
      
        Cookies.set('ageVerified', 'true', { expires: 30 }); 
        $('#ageVerificationModal').modal('hide');
    });

    $('#denyAge').click(function() {

        $('#ageVerificationModal').modal('hide');
    });
});


