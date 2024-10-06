jQuery(document).ready(function ($) {
    var mediaUploader;

    // Image Upload
    $('.app-image-upload-button').click(function (e) {
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
            $('.remove-app-image-button[data-input-id="' + inputId + '"]').show(); // Show remove button
        });

        mediaUploader.open();
    });

    // Remove Image
    $('.remove-app-image-button').click(function (e) {
        e.preventDefault();

        var inputId = $(this).data('input-id');
        $('#' + inputId).val(''); // Clear the hidden input field
        $('#' + inputId + '_preview').html(''); // Clear the preview image
        $(this).hide(); // Hide the remove button
    });
});
