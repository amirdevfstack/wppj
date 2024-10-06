jQuery(document).ready(function ($) {
    var mediaUploaderImage, mediaUploaderVideo;

    // Image Upload
    $('.banner-image-upload-button').click(function (e) {
        e.preventDefault();

        var button = $(this);

        if (mediaUploaderImage) {
            mediaUploaderImage.open();
            return;
        }

        mediaUploaderImage = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploaderImage.on('select', function () {
            var attachment = mediaUploaderImage.state().get('selection').first().toJSON();
            var inputId = button.data('input-id');
            $('#' + inputId).val(attachment.url);
            $('#' + inputId + '_preview').html('<img src="' + attachment.url + '" style="max-width: 200px; max-height: 200px;">');
            $('.remove-banner-image-button').show();
        });

        mediaUploaderImage.open();
    });

    // Remove Image
    $('.remove-banner-image-button').click(function (e) {
        e.preventDefault();

        var inputId = $(this).data('input-id');
        $('#' + inputId).val(''); // Clear the hidden input field
        $('#' + inputId + '_preview').html(''); // Clear the preview image
        $(this).hide(); // Hide the remove button
    });

    // Video Upload
    $('.banner-video-upload-button').click(function (e) {
        e.preventDefault();

        var button = $(this);

        if (mediaUploaderVideo) {
            mediaUploaderVideo.open();
            return;
        }

        mediaUploaderVideo = wp.media.frames.file_frame = wp.media({
            title: 'Choose Video',
            button: {
                text: 'Choose Video'
            },
            multiple: false
        });

        mediaUploaderVideo.on('select', function () {
            var attachment = mediaUploaderVideo.state().get('selection').first().toJSON();
            var inputId = button.data('input-id');
            $('#' + inputId).val(attachment.url);
            $('#' + inputId + '_preview').html('<video src="' + attachment.url + '" controls style="max-width: 200px; max-height: 200px;"></video>');
            $('.remove-banner-video-button').show();
        });

        mediaUploaderVideo.open();
    });

    // Remove Video
    $('.remove-banner-video-button').click(function (e) {
        e.preventDefault();

        var inputId = $(this).data('input-id');
        $('#' + inputId).val(''); // Clear the hidden input field
        $('#' + inputId + '_preview').html(''); // Clear the preview video
        $(this).hide(); // Hide the remove button
    });
});
