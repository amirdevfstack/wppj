
jQuery(document).ready(function($) {
    $('#reset-password-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        var currentPageURL = window.location.origin + window.location.pathname;
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            success: function(response) {
                if (response.success === true) {
                    alert(response.data);
                    window.location.href = currentPageURL;
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                $('#error-message').text('An error occurred. Please try again.'); 
            }
        }).done(function(response) {
            if (response.success === false) {
                $('#error-message').text(response.data); 
            }
        });
    });
});



