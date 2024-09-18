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
            // Get selected image's URL and assign it to the appropriate input field
            var attachment = frame.state().get('selection').first().toJSON();
            var inputFieldSelector = "input[name='" + button.attr('data-input') + "']";
            $(inputFieldSelector).val(attachment.url);
            
            // Optionally, update the image preview
            var previewSelector = button.attr('data-preview-image');
            $(previewSelector).attr('src', attachment.url).css('display', 'block');
            $(previewSelector).attr('data-value', button.attr('data-input'));
            $(button).next(".remove_slider_upload_image_button").remove();
            $(button).after('<input type="button" class="button remove_slider_upload_image_button" data-input="'+button.attr('data-input')+'" value="Remove image" style="margin-bottom:10px; margin-left:10px;color:red" >'); 
        });

        frame.open();
    }

    $(document).on('click', '.feature_slider_upload_image_button', function(e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
    });
    
    var slideIndex = $('.brand-slide').length;

    $('#addNewSlide').click(function() {
        var newSlideHtml = `
            <div class='brand-slide' data-index='${slideIndex}'>
                <p><input type='checkbox' name='feature_slider_data[${slideIndex}][showslide]'>Show Slide</p>
                <p><input type='text' required name='feature_slider_data[${slideIndex}][name]' placeholder='Feature Name'></p>
                <p><input type='text'  name='feature_slider_data[${slideIndex}][description]' placeholder='Feature Description'></p>
                <p><input type='url' required  name='feature_slider_data[${slideIndex}][link]' placeholder='Feature Link'></p>
                <p><input type='text' name='feature_slider_data[${slideIndex}][description]' placeholder='Button Text'></p>
                <p><input type='url'  required name='feature_slider_data[${slideIndex}][link]' placeholder='Button Link'></p>
                <p><input type='url' required name='feature_slider_data[${slideIndex}][image]' placeholder='Feature Image URL' class='image-url-field-${slideIndex}'></p>
                <p><button type='button' class='button feature_slider_upload_image_button' data-input='feature_slider_data[${slideIndex}][image]' data-preview-image='.image-preview-${slideIndex}'>Upload Image</button></p>
                <p><img src='' class='image-preview image-preview-${slideIndex}' style='max-width: 100px; display: none;'></p>
                <p><input type='text' name='feature_slider_data[${slideIndex}][imagecaption]' placeholder='Image Caption'> (Optional)</p>
                <p><input type='text' name='feature_slider_data[${slideIndex}][imagedescription]' placeholder='Image Description'> (Optional)</p>
                <p><input type='url'  name='feature_slider_data[${slideIndex}][videoembededlink]' placeholder='Video embeded link'>(Optional)</p>
                <p><input type='text' name='feature_slider_data[${slideIndex}][videodescription]' placeholder='Video Description'> (Optional)</p>
                <p><button type='button' class='button-secondary removeSlide'>Remove Slide</button></p>
            </div>
        `;

        $(this).before(newSlideHtml);
        slideIndex++;
    });

    $(document).on('click', '.removeSlide', function() {
        $(this).closest('.brand-slide').remove();
    });

    // alert(); // I'm not sure why you have this alert here, but I've left it in the code.
});
