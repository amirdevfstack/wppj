jQuery(document).ready(function($) {
 
    function openMediaUploader(button) {
        var frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false
        });
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            var imageUrl = attachment.url;
            var inputId = button.data('input-id'); 
            var previewId = button.data('preview-id');
            $('#' + inputId).val(imageUrl);
            $('#' + previewId).html('<img src="' + imageUrl + '" style="max-width: 200px; max-height: 200px;">');
        });

        frame.open();
    }
    $(document).on('click', '.authenticate-image-upload-button', function(e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
    });
});
