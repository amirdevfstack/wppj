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

    $(document).on('click', '.upload_image_button', function(e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
    });

    var slideIndex = $('.product-slide').length;

    $('#addNewSlide').click(function() {
        var newSlideHtml = `
            <div class='product-slide' data-index='${slideIndex}'>
                <p><input type='text' name='products_slider_data[${slideIndex}][name]' placeholder='Product Name'></p>
                <p><input type='text' name='products_slider_data[${slideIndex}][description]' placeholder='Product Description'></p>
                <p><input type='text' name='products_slider_data[${slideIndex}][link]' placeholder='Product Link'></p>
                <p><input type='text' name='products_slider_data[${slideIndex}][image]' placeholder='Product Image URL' class='image-url-field-${slideIndex}'></p>
                <p><button type='button' class='button upload_image_button' data-input='products_slider_data[${slideIndex}][image]' data-preview-image='.image-preview-${slideIndex}'>Upload Image</button></p>
                <p><img src='' class='image-preview image-preview-${slideIndex}' style='max-width: 100px; display: none;'></p>
                <p><button type='button' class='button-secondary removeSlide'>Remove Slide</button></p>
            </div>
        `;

        $(this).before(newSlideHtml);
        slideIndex++;	
    });

    $(document).on('click', '.removeSlide', function() {
        $(this).closest('.product-slide').remove();
    });
});
