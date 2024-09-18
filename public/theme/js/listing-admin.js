jQuery(document).ready(function ($) {
    // Function to handle media uploader
    function openMediaUploader(button) {
        var frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false  // Set to true if you want to allow multiple files to be selected
        });

        frame.on('select', function () {
            // Get selected image's URL and assign it to the appropriate input field
            var attachment = frame.state().get('selection').first().toJSON();
            var inputFieldSelector = "input[name='" + button.attr('data-input-name') + "']";
            $(inputFieldSelector).val(attachment.url);

            // Optionally, update the image preview
            var previewSelector = button.attr('data-preview-image');
            $(previewSelector).attr('src', attachment.url).css('display', 'block');
        });

        frame.open();
    }

    // Handling the click event on the custom upload button
    $(document).on('click', '.upload_image_button', function (e) {
        e.preventDefault();
        var button = $(this);
        openMediaUploader(button);
    });

    var listingIndex = $('.listing').length; // Dynamically set the index based on existing listings

    $('#addNewListing').click(function() {
        var newListingHtml = `
    <div class='listing' data-index='${listingIndex}' style='margin-bottom: 20px; padding: 20px; border: 1px solid #ccc; background-color: #f9f9f9; border-radius: 5px;'>
        <!-- Basic Info Section -->
        <div style='margin-bottom: 20px;'>
            <h3>Basic Info</h3>
            <div style='margin-bottom: 10px;'>
                <label style='display: block;'>Business Name:</label>
                <input type='text' name='business_listings_data[${listingIndex}][name]' placeholder='Business Name' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
            </div>
            <div>
                <label style='display: block;'>Description:</label>
                <textarea name='business_listings_data[${listingIndex}][description]' placeholder='Description' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'></textarea>
            </div>
        </div>

        <!-- Contact, Address, and Service Info -->
        <div style='display: flex; justify-content: space-between; margin-bottom: 20px;'>
            <!-- Contact Info -->
            <div style='flex: 1; margin-right: 20px;'>
                <h3>Contact Info</h3>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>Phone Number:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][phone]' placeholder='Phone Number' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>Email Address:</label>
                    <input type='email' name='business_listings_data[${listingIndex}][email]' placeholder='Email Address' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div>
                    <label style='display: block;'>Website URL:</label>
                    <input type='url' name='business_listings_data[${listingIndex}][url]' placeholder='Website URL' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
            </div>

            <!-- Address Info -->
            <div style='flex: 1;'>
                <h3>Address Info</h3>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>Street:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][street]' placeholder='Street' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>Street 2:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][street2]' placeholder='Street 2' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>City:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][city]' placeholder='City' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>State:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][state]' class='cst_state' data-index='${listingIndex}' placeholder='State' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div style='margin-bottom: 10px;'>
                    <label style='display: block;'>Postal Code:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][postal_code]' placeholder='Postal Code' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
                <div>
                    <label style='display: block;'>Country:</label>
                    <input type='text' name='business_listings_data[${listingIndex}][country]' class='cst_country' data-index='${listingIndex}' placeholder='Country' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                </div>
            </div>
        </div>

        <!-- Service Options -->
        <div style='margin-bottom: 20px;'>
            <h3>Service Options</h3>
            <div style='margin-bottom: 10px;'>
                <label><input type='checkbox' name='business_listings_data[${listingIndex}][delivery]' value='1'> Delivery</label>
            </div>
            <div style='margin-bottom: 10px;'>
                <label><input type='checkbox' name='business_listings_data[${listingIndex}][pickup]' value='1'> Pick Up</label>
            </div>
            <div>
                <label><input type='checkbox' name='business_listings_data[${listingIndex}][curbside]' value='1'> Curbside</label>
            </div>
        </div>

        <!-- Operational Details -->
        <div style='margin-bottom: 20px;'>
            <h3>Operational Details</h3>
            <div style='margin-bottom: 10px;'>
                <label style='display: block;'>Hours of Operation:</label>
                <input type='text' name='business_listings_data[${listingIndex}][hours]' placeholder='Hours of Operation' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
            </div>
            <div style='margin-bottom: 10px;'>
                <label style='display: block;'>Latitude:</label>
                <input type='text' name='business_listings_data[${listingIndex}][latitude]' class='cst_lat' placeholder='Latitude' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;' readonly>
            </div>
            <div>
                <label style='display: block;'>Longitude:</label>
                <input type='text' name='business_listings_data[${listingIndex}][longitude]' class='cst_long' placeholder='Longitude' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'readonly>
            </div>
			
        </div>

        <!-- Online Presence -->
        <div style='margin-bottom: 20px;'>
            <h3>Online Presence</h3>
            <div style='margin-bottom: 10px;'>
                <label style='display: block;'>Google Street View URL:</label>
                <input type='url' name='business_listings_data[${listingIndex}][google_street_view]' placeholder='Google Street View URL' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
            </div>
            <div>
                <label style='display: block;'>License #:</label>
                <input type='text' name='business_listings_data[${listingIndex}][license]' placeholder='License #' style='width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
            </div>
        </div>

        <!-- Image Upload Section -->
        <div style='margin-bottom: 20px;'>
            <label style='display: block;'>Image URL:</label>
            <div style='display: flex; margin-bottom: 10px;'>
                <input type='text' class='image-url-field-${listingIndex}' name='business_listings_data[${listingIndex}][image]' placeholder='Image URL' style='flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 3px;'>
                <button type='button' class='button upload_image_button' data-input-name='business_listings_data[${listingIndex}][image]' data-preview-image='.image-preview-${listingIndex}' style='margin-left: 10px; padding: 8px 15px; border: none; background-color: #007bff; color: #fff; border-radius: 3px; cursor: pointer;'>Upload Image</button>
            </div>
            <img src='' class='image-preview image-preview-${listingIndex}' style='max-width: 100px; display: none; border: 1px solid #ccc; border-radius: 3px;'>
        </div>
              <fieldset style='display: flex; margin-bottom: 20px;'>
    <div style='flex: 1; padding-left: 10px;'>
        <label style='font-weight: bold;'>Select @Type</label><br>
        <select id='fieldType' name='business_listings_data[${listingIndex}][type_select]' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
            <option value='Restaurant' >Restaurant</option>
            <option value='PostalAddress' >PostalAddress</option>
            <option value='Review' >Review</option>
            <option value='Rating'>Rating</option>
            <option value='Person' >Person</option>
            <option value='GeoCoordinates' >GeoCoordinates</option>
            <option value='OpeningHoursSpecification'>OpeningHoursSpecification</option>
        </select><br>
        <label style='font-weight: bold;'>Author Name:</label>
        <input type='text' name='business_listings_data[${listingIndex}][author_name]'  style='width: 100%; padding: 8px; margin-bottom: 10px;'><br>
        <div class='schedule-container' style='display: flex;'>
        <div class='schedule-item'>
            
            <div id='day-range-container-${listingIndex}'><div class='day-range'>
                <label for='day'>Day:</label>
                <select id='day' name='business_listings_data[${listingIndex}][day_range][0][]' multiple style='width: 100%; padding: 8px; margin-bottom: 10px;'>
                    <option value='Monday' selected>Monday</option>
                    <option value='Tuesday'>Tuesday</option>
                    <option value='Wednesday'>Wednesday</option>
                    <option value='Thursday'>Thursday</option>
                    <option value='Friday'>Friday</option>
                    <option value='Saturday'>Saturday</option>
                    <option value='Sunday'>Sunday</option>
                </select>
                 <div class='schedule-item'>
                <label for='open-time'>Open Time(Please enter a time in 24-hour format (HH:MM)):</label>

                <input type='text' id='open-time' placeholder='HH:MM' value="00:00" pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]' name='business_listings_data[${listingIndex}][opening_hours][0][]'   style='width: 100%; padding: 8px; margin-bottom: 10px;'>
            </div>
            <div class='schedule-item'>
                <label for='close-time'>Close Time(Please enter a time in 24-hour format (HH:MM)):</label>
                <input type='text' id='close-time' placeholder='HH:MM' value="23:00" pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]' name='business_listings_data[${listingIndex}][closing_hours][0][]'  style='width: 100%; padding: 8px; margin-bottom: 10px;'>
            </div>
            </div>
             </div>
           <button type='button' class='add-day-range' data-id='${listingIndex}'>Add Day Range</button>
        </div>
            
            
        </div>
    </div>
    <div style='flex: 1; padding-left: 10px;'>
        <label style='font-weight: bold;'>Review Ratings</label>
        <input type='number' name='business_listings_data[${listingIndex}][review_rating]'  style='width: 100%; padding: 8px; margin-bottom: 10px;' min='1' max='5'>
        
        <label style='font-weight: bold;'>Menu url</label>
        <input type='text' name='business_listings_data[${listingIndex}][menu_url]' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
        <label style='font-weight: bold;'>Price Range</label><br>
    <select id='fieldType' name='business_listings_data[${listingIndex}][dropdown_price]' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
        <option value='$'>$</option>
        <option value='$$'>$$</option>
        <option value='$$$'>$$$</option>
        <option value='$$$$'>$$$$</option>
    </select><br>    
    </div>
</fieldset>
        <!-- Removal Button -->
        <div>
            <button type='button' class='button-secondary removeListing' style='padding: 8px 15px; border: none; background-color: #dc3545; color: #fff; border-radius: 3px; cursor: pointer;'>Remove Listing</button>
        </div>
    </div>
`;

    
        // Insert the new listing HTML before the "Add New Listing" button
        $('#addNewListing').before(newListingHtml);
        // Increment the index for the next listing
         // if(listingIndex==0){
//         setTimeout(function(){

                var dayRangeIndex = 1;

               jQuery('.add-day-range').on('click', function() { 
                // e.preventDefault();
                    var indx=$(this).data('id');
                     var dayRangeContainer = document.getElementById('day-range-container-'+indx+'');
                    var newDayRange = document.createElement('div');
                    newDayRange.classList.add('day-range');
                    newDayRange.innerHTML = `<div class='day-range'>
                        <select name='business_listings_data[${indx}][day_range][`+dayRangeIndex+`][]' id='day-range-`+dayRangeIndex+`' style='width: 100%; padding: 8px; margin-bottom: 10px;' multiple>
                           <option value='Monday' selected>Monday</option>
                            <option value='Tuesday'>Tuesday</option>
                            <option value='Wednesday'>Wednesday</option>
                            <option value='Thursday'>Thursday</option>
                            <option value='Friday'>Friday</option>
                            <option value='Saturday'>Saturday</option>
                            <option value='Sunday'>Sunday</option>
                        </select>
                        <br>
                        <label for='open-time'>Open Time:</label>
                        <input type='text' name='business_listings_data[${indx}][opening_hours][${dayRangeIndex}][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]' value='12:00'  title='Please enter a time in 24-hour format (HH:MM)'>
                        <label for='close-time'>Close Time:</label>
                        <input type='text' name='business_listings_data[${indx}][closing_hours][${dayRangeIndex}][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]'  value='23:00' title='Please enter a time in 24-hour format (HH:MM)' >
                   </div>  `;
                    dayRangeContainer.appendChild(newDayRange);
                    dayRangeIndex=dayRangeIndex+1;
                });
// },1000);
         // }

 listingIndex++;
    
    });
    


    // Handling the event to remove a listing
    $(document).on('click', '.removeListing', function () {
        $(this).closest('.listing').remove();
    });

   
                var dayRangeIndex = 1;

               jQuery('.add-day-range').on('click', function() { 
                // e.preventDefault();
                    var indx=$(this).data('id'); 
                     var dayRangeContainer = document.getElementById('day-range-container-'+indx+'');
                    var newDayRange = document.createElement('div');
                    newDayRange.classList.add('day-range');
                    newDayRange.innerHTML = `<div class='day-range'>
                        <select name='business_listings_data[${indx}][day_range][`+dayRangeIndex+`][]' id='day-range-`+dayRangeIndex+`' style='width: 100%; padding: 8px; margin-bottom: 10px;' multiple>
                           <option value='Monday' selected>Monday</option>
                            <option value='Tuesday'>Tuesday</option>
                            <option value='Wednesday'>Wednesday</option>
                            <option value='Thursday'>Thursday</option>
                            <option value='Friday'>Friday</option>
                            <option value='Saturday'>Saturday</option>
                            <option value='Sunday'>Sunday</option>
                        </select>
                        <br>
                        <label for='open-time'>Open Time:</label>
                        <input type='text' name='business_listings_data[${indx}][opening_hours][${dayRangeIndex}][]' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]'  value='12:00' title='Please enter a time in 24-hour format (HH:MM)' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
                        <label for='close-time'>Close Time:</label>
                        <input type='text' name='business_listings_data[${indx}][closing_hours][${dayRangeIndex}][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' value='23:00' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]'  title='Please enter a time in 24-hour format (HH:MM)' >
                   </div>  `;
                   // var countt=indx+1;
                   // alert();
                  // document.querySelector('.day-range-container:nth-child('+${indx}+')').appendChild(newDayRange);
                    dayRangeContainer.appendChild(newDayRange);
                    dayRangeIndex=dayRangeIndex+1;
                });

           

});
