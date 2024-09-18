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
			$(button).next(".remove_upload_image_button_header").remove();
			$(button).after("<input type='button' class='button remove_upload_image_button_header' data-input='"+inputId+"' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>")
        });
			
        frame.open();
    }

  
    $(document).on('click', '.header-image-upload-button', function(e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
		
    });
});
