jQuery(document).ready(function($) {
    // When the upload button is clicked
    $('.upload_image_button').click(function(e) {
        e.preventDefault();

        var button = $(this);
        var id = button.attr('data-input'); // Get the ID of the input this button is associated with
        var customUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image' // Button text
            },
            multiple: false // Allow or disallow multiple selections
        }).on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#' + id).val(attachment.url); // Update the hidden input with the selected image's URL
            $('#preview_' + id).html('<img src="' + attachment.url + '" style="max-width: 250px;"/>'); // Update the preview image
			$(button).next(".remove_upload_image_button").remove();
					$(button).after('<input type="button" class="button remove_upload_image_button" data-input="'+id+'" value="Remove image" style="margin-left:10px;color:red" fdprocessedid="596up7">')

        }).open();
    });
});