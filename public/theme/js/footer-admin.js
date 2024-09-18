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
    $(document).on('click', '.footer-image-upload-button', function(e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
    });
    // Gurpreet Singh js start
    // For '.remove_upload_image_button' elements
jQuery(document).on('click', '.remove_upload_image_button', function() {
    var data_input = jQuery(this).attr("data-input");
    console.log('#preview_'+data_input+' img');
    jQuery('#preview_'+data_input+' img').remove();
    jQuery('#'+data_input).val("");
    jQuery(this).hide();
});

// For '.remove_upload_image_button_header' elements
jQuery(document).on('click', '.remove_upload_image_button_header', function() {
    var data_input = jQuery(this).attr("data-input");
    console.log('#'+data_input+'_preview img');
    jQuery('#'+data_input+'_preview img').remove();
    jQuery('#'+data_input).val("");
    jQuery(this).hide();
});

jQuery(document).on('click', '.remove_slider_upload_image_button', function() {
    var data_input = jQuery(this).attr("data-input");
    jQuery("img[data-value='" + data_input + "']").remove();

    console.log('.image-preview.' + data_input);
    var inputFieldSelector = "input[name='" + data_input + "']";
    jQuery(inputFieldSelector).val('');
    jQuery(this).hide();
});

// jQuery('.cst_getlang_lat').on('click',function(){
//   var street = $('input[name="business_listings_data[0][street]"]').val();
// var street2 = $('input[name="business_listings_data[0][street2]"]').val();
// var city = $('input[name="business_listings_data[0][city]"]').val();
//     var state = $('input[name="business_listings_data[0][state]"]').val();
//     var countryValue = $('input[name="business_listings_data[0][country]"]').val();
//     var postal_code = $('input[name="business_listings_data[0][postal_code]"]').val();

//     var adderss= street + " " +street2 + " "  + city+  " " + state+ " "  + countryValue;
    

// var encodedAddress = encodeURIComponent(adderss);
// console.log(encodedAddress);
// // Construct the URL
// var url = `https://maps.googleapis.com/maps/api/geocode/json?address=`+encodedAddress+`&key=AIzaSyDvVpM5D9iQR6Q89DPhlUBVZGvlW75aBac`;

// // Make the API request using fetch
// fetch(url)
//     .then(response => {
//         // Check if the response is successful (status 200)
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         // Parse JSON response
//         return response.json();
//     })
//     .then(data => {
//         var latitude = data.results[0].geometry.location.lat;
//         $('.cst_lat').val(latitude);
// var longitude = data.results[0].geometry.location.lng;
//  $('.cst_long').val(longitude);
// // console.log(longitude+"  "+latitude);

//     })
//     .catch(error => {
//         // Handle errors
//         console.error('There was a problem with the fetch operation:', error);
//     });
// });

 jQuery(document).on('input', '#country, #state', function() {
        jQuery('#latitude').val('');
     jQuery('#longitude').val('');
    });

 jQuery(document).on('input', '.cst_state, .cst_country', function() {
       var index=jQuery(this).attr('data-index');
     console.log(index);
    jQuery('input[name="business_listings_data['+index+'][latitude]"]').val('');
     jQuery('input[name="business_listings_data['+index+'][longitude]"]').val('');
    });

 jQuery(document).on('input', '#location_address', function() {
         jQuery('#latitude').val('');
      jQuery('#longitude').val('');
     });
     jQuery(document).on('input', '#location_address', function() {
        var address=jQuery('#location_address').val();
        var encodedAddress = encodeURIComponent(address);
   
   var url = `https://maps.googleapis.com/maps/api/geocode/json?address=`+encodedAddress+`&key=AIzaSyDvVpM5D9iQR6Q89DPhlUBVZGvlW75aBac`;
   
   // Make the API request using fetch
   fetch(url)
       .then(response => {
           // Check if the response is successful (status 200)
           if (!response.ok) {
               throw new Error('Network response was not ok');
           }
           // Parse JSON response
           return response.json();
       })
       .then(data => {
           var latitude = data.results[0].geometry.location.lat;
           jQuery('#latitude').val(latitude);
   var longitude = data.results[0].geometry.location.lng;
    jQuery('#longitude').val(longitude);
       })
       .catch(error => {
           // Handle errors
           console.error('There was a problem with the fetch operation:', error);
       });
       });
 
    // Gurpreet Singh js end
});
