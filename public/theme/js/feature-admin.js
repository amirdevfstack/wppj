jQuery(document).ready(function ($) {

    // Image Upload
    $('.feature-image-upload-button').click(function (e) {
        e.preventDefault();

        var button = $(this);
        var mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            var inputId = button.data('input-id');
            $('#' + inputId).val(attachment.url);
            $('#' + inputId + '_preview').html('<img src="' + attachment.url + '" style="max-width: 200px; max-height: 200px;">');
            $('.remove-feature-image-button[data-input-id="' + inputId + '"]').show(); // Show remove button
        });

        mediaUploader.open();
    });

    // Remove Image
    $('.remove-feature-image-button').click(function (e) {
        e.preventDefault();

        var inputId = $(this).data('input-id');
        $('#' + inputId).val(''); // Clear the hidden input field
        $('#' + inputId + '_preview').html(''); // Clear the preview image
        $(this).hide(); // Hide the remove button
    });

});
