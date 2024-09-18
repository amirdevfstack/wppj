<?php

class ListingAdmin
{
    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_listings_submenu'));
        add_action('admin_init', array($this, 'register_listings_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }

    public function add_listings_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Business Listings',
            'Listings',
            'manage_options',
            'business-listings',
            array($this, 'listings_page_callback')
        );
    }

    public function register_listings_settings()
    {
        register_setting('business-listings-group', 'business_listings_data', array($this, 'validate_and_update_listings_data'));
    }

    public function validate_and_update_listings_data($listings_data)
    {
        foreach ($listings_data as &$listing) {
            // Check if address is complete and geolocation needs updating
            if ($this->address_is_complete($listing) && (empty($listing['latitude']) || empty($listing['longitude']))) {
                // Assuming you have a method in adminComponent that can update geolocation
                $geoResult = $this->adminComponent->geolocation($this->assemble_address($listing));

                // Decode the JSON string into an associative array
                $geoResultArray = json_decode($geoResult, true);

                // Check if latitude and longitude are set in the decoded array
                if (isset($geoResultArray['latitude']) && isset($geoResultArray['longitude'])) {
                    $listing['latitude'] = $geoResultArray['latitude'];
                    $listing['longitude'] = $geoResultArray['longitude'];
                }
            }
        }
        return $listings_data;
    }

    public function enqueue_admin_scripts($hook_suffix)
    {
        if ('business-info_page_business-listings' !== $hook_suffix) {
            return;
        }

        wp_enqueue_script('my-listings-js', get_template_directory_uri() . '/public/theme/js/listing-admin.js', array('jquery'), null, true);
    }

    public function listings_page_callback()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // Retrieve and maybe unserialize the listings data from the database
        $listings_data = get_option('business_listings_data');
        if (!is_array($listings_data)) {
            $listings_data = maybe_unserialize($listings_data) ?: [];
        }

        echo '<div class="wrap">';
        echo '<h1>Manage Business Listings</h1>';
        echo '<form method="post" action="options.php">';

        settings_fields('business-listings-group');
        do_settings_sections('business-listings-group');

        foreach ($listings_data as $index => $listing) {
            $this->render_listings_fields($index, $listing);
        }

        echo '<button type="button" class="button-secondary" id="addNewListing">Add New Listing</button>';
        submit_button('Save Listings');
        echo '</form>';
        echo '</div>';
    }

    private function address_is_complete($listing)
    {
        // Example check for required address fields
        return isset($listing['street'], $listing['city'], $listing['state'], $listing['postal_code'], $listing['country']);
    }

    private function assemble_address($listing)
    {
        // Concatenate address parts into a full address string
        return implode(', ', array_filter([$listing['street'], $listing['city'], $listing['state'], $listing['postal_code'], $listing['country']]));
    }

    protected function render_listings_fields($index, $listing)
    {
        // Expanded existing fields
        $name = $listing['name'] ?? '';
        $description = $listing['description'] ?? '';
        $phone = $listing['phone'] ?? '';
        $email = $listing['email'] ?? '';
        $website = $listing['website'] ?? '';
        $street = $listing['street'] ?? '';
        $street2 = $listing['street2'] ?? '';
        $city = $listing['city'] ?? '';
        $state = $listing['state'] ?? '';
        $postal_code = $listing['postal_code'] ?? '';
        $country = $listing['country'] ?? '';
        $delivery = $listing['delivery'] ?? '';
        $pickup = $listing['pickup'] ?? '';
        $curbside = $listing['curbside'] ?? '';
        $hours = $listing['hours'] ?? '';
        $latitude = $listing['latitude'] ?? '';
        $longitude = $listing['longitude'] ?? '';
        $google_street_view = $listing['google_street_view'] ?? '';
        $license = $listing['license'] ?? '';
  
        $type_select = $listing['type_select'] ?? '';
        $review_rating = $listing['review_rating'] ?? '';
        $author_name = $listing['author_name'] ?? '';
        $cuisine  = $listing['cuisine'] ?? '';
        $dropdown_price= $listing['dropdown_price'] ?? '';
        $opening_hours = $listing['opening_hours'] ?? '';
        $cuisine  = $listing['cuisine'] ?? '';
        $menu_url= $listing['menu_url'] ?? '';
        $opening_day= $listing['menu_url'] ?? '';
        $opening_hours  = $listing['opening_hours'] ?? '';
        $closing_hours= $listing['closing_hours'] ?? '';
        $day_range= $listing['day_range'] ?? '';
   
        //
       echo "<div class='listing' data-index='{$index}' style='border: 1px solid #eee; padding: 15px; margin-bottom: 20px; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);'>";

// Basic Info Section
echo "<fieldset style='margin-bottom: 20px;'><legend style='font-size: 1.2em; margin-bottom: 10px; font-weight: bold;'>Basic Info</legend>";
echo "<label style='font-weight: bold;'>Business Name:</label><input type='text' name='business_listings_data[{$index}][name]' value='" . esc_attr($name) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Description:</label><textarea name='business_listings_data[{$index}][description]' style='width: 100%; padding: 8px;'>" . esc_textarea($description) . "</textarea>";
echo "</fieldset>";

// Service Options
echo "<fieldset style='margin-bottom: 20px;'><legend style='font-size: 1.2em; margin-bottom: 10px; font-weight: bold;'>Service Options</legend>";
echo "<label><input type='checkbox' name='business_listings_data[{$index}][delivery]' value='1' " . checked(1, $delivery, false) . "> Delivery</label>";
echo "<label><input type='checkbox' name='business_listings_data[{$index}][pickup]' value='1' " . checked(1, $pickup, false) . "> Pick Up</label>";
echo "<label><input type='checkbox' name='business_listings_data[{$index}][curbside]' value='1' " . checked(1, $curbside, false) . "> Curbside</label>";
echo "</fieldset>";

// Contact & Address Info Section, in two columns
echo "<fieldset style='display: flex; margin-bottom: 20px;'>";
echo "<legend style='font-size: 1.2em; margin-bottom: 10px; font-weight: bold;'>Contact & Address Info</legend>";

// Left column
echo "<div style='flex: 1; padding-right: 10px;'>";
echo "<label style='font-weight: bold;'>Phone Number:</label><input type='text' name='business_listings_data[{$index}][phone]' value='" . esc_attr($phone) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Email Address:</label><input type='email' name='business_listings_data[{$index}][email]' value='" . esc_attr($email) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Website URL:</label><input type='url' name='business_listings_data[{$index}][website]' value='" . esc_attr($website) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Google Street View URL:</label><input type='url' name='business_listings_data[{$index}][google_street_view]' value='" . esc_attr($google_street_view) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>License #:</label><input type='text' name='business_listings_data[{$index}][license]' value='" . esc_attr($license) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "</div>";

// Right column
echo "<div style='flex: 1; padding-left: 10px;'>";
echo "<label style='font-weight: bold;'>Street:</label><input type='text' name='business_listings_data[{$index}][street]' value='" . esc_attr($street) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Street 2:</label><input type='text' name='business_listings_data[{$index}][street2]' value='" . esc_attr($street2) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>City:</label><input type='text' name='business_listings_data[{$index}][city]' value='" . esc_attr($city) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>State:</label><input type='text'  class='cst_state' data-index='$index' name='business_listings_data[{$index}][state]' value='" . esc_attr($state) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Postal Code:</label><input type='text'  name='business_listings_data[{$index}][postal_code]' value='" . esc_attr($postal_code) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Country:</label><input type='text'  class='cst_country' data-index='$index' name='business_listings_data[{$index}][country]' value='" . esc_attr($country) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "<label style='font-weight: bold;'>Latitude:</label><input type='text' class='cst_lat' name='business_listings_data[{$index}][latitude]' value='" . esc_attr($latitude) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;' readonly>";
echo "<label style='font-weight: bold;'>Longitude:</label><input type='text' class='cst_long' name='business_listings_data[{$index}][longitude]' value='" . esc_attr($longitude) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;' readonly>";
//echo "<input type='button' class='cst_getlang_lat' value='Get Latitude Longitude'>";
echo "</div>";
echo "</fieldset>";
// gurpreet code
echo "<fieldset style='display: flex; margin-bottom: 20px;'>";
echo "<div style='flex: 1; padding-left: 10px;'>";
echo "<label style='font-weight: bold;'>Select @Type</label><br>
<select id='fieldType' name='business_listings_data[{$index}][type_select]' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
        <option value='Restaurant' ".(($type_select=='Restaurant') ? 'selected' : '').">Restaurant</option>
        <option value='PostalAddress' ".(($type_select=='PostalAddress') ? 'selected' : '').">PostalAddress</option>
        <option value='Review' ".(($type_select=='Review') ? 'selected' : '').">Review</option>
        <option value='Rating' ".(($type_select=='Rating') ? 'selected' : '').">Rating</option>
        <option value='Person' ".(($type_select=='Person') ? 'selected' : '').">Person</option>
        <option value='GeoCoordinates' ".(($type_select=='GeoCoordinates') ? 'selected' : '').">GeoCoordinates</option>
        <option value='OpeningHoursSpecification' ".(($type_select=='OpeningHoursSpecification') ? 'selected' : '').">OpeningHoursSpecification</option>
    </select><br>";
echo "<label style='font-weight: bold;'>Author Name:</label><input type='text'  name='business_listings_data[{$index}][author_name]' value='" . esc_attr($author_name) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'><br>";
$html="";
if(empty($day_range)){
     $html.="<div class='day-range'>
                     <select name='business_listings_data[{$index}][day_range][0][]' id='day-range-{0}' style='width: 100%; padding: 8px; margin-bottom: 10px;' multiple>
                         <option value='Monday'>Monday</option>
                        <option value='Tuesday'> Tuesday</option>
                        <option value='Wednesday'>Wednesday</option>
                        <option value='Thursday'>Thursday</option>
                        <option value='Friday' >Friday</option>
                        <option value='Saturday' >Saturday</option>
                        <option value='Sunday' >Sunday</option>
                    </select><br>
                    <label for='open-time'>Open Time(Please enter a time in 24-hour format (HH:MM)):</label>
                    <input type='text' name='business_listings_data[{$index}][opening_hours][0][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' placeholder='HH:MM'  pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]'  title='Please enter a time in 24-hour format (HH:MM)'>
                    <label for='close-time'>Close Time(Please enter a time in 24-hour format (HH:MM)):</label>
                    <input type='text' name='business_listings_data[{$index}][closing_hours][0][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' placeholder='HH:MM' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]'  title='Please enter a time in 24-hour format (HH:MM)'>
                </div>";
}
else{
foreach ($day_range as $key => $value) {

   $html.="<div class='day-range'>
                     <select name='business_listings_data[{$index}][day_range][{$key}][]' id='day-range-{$key}' style='width: 100%; padding: 8px; margin-bottom: 10px;' multiple>
                         <option value='Monday' ".((in_array('Monday', $value)) ? 'selected' : '').">Monday</option>
                        <option value='Tuesday' ".((in_array('Tuesday', $value)) ? 'selected' : '')."> Tuesday</option>
                        <option value='Wednesday' ".((in_array('Wednesday', $value)) ? 'selected' : '').">Wednesday</option>
                        <option value='Thursday' ".((in_array('Thursday', $value)) ? 'selected' : '').">Thursday</option>
                        <option value='Friday' ".((in_array('Friday', $value)) ? 'selected' : '').">Friday</option>
                        <option value='Saturday' ".((in_array('Saturday',$value)) ? 'selected' : '').">Saturday</option>
                        <option value='Sunday' ".((in_array('Sunday', $value)) ? 'selected' : '').">Sunday</option>
                    </select><br>
                    <label for='open-time'>Open Time(Please enter a time in 24-hour format (HH:MM)):</label>
                    <input type='text' name='business_listings_data[{$index}][opening_hours][0][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' placeholder='HH:MM'  pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]' value='".$listing['opening_hours'][0][$key]."' title='Please enter a time in 24-hour format (HH:MM)'>
                    <label for='close-time'>Close Time(Please enter a time in 24-hour format (HH:MM)):</label>
                    <input type='text' name='business_listings_data[{$index}][closing_hours][0][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' placeholder='HH:MM' pattern='([01]?[0-9]|2[0-3]):[0-5][0-9]' value='".$listing['closing_hours'][0][$key]."' title='Please enter a time in 24-hour format (HH:MM)'>
                </div>";
}
}
echo "<div class='schedule-container' style='display: flex;'>
        <div class='schedule-item'>
            <label for='day'>Day Range:</label>
            <div id='day-range-container-{$index}' >
                 {$html}
            </div>
            <input type='hidden' class='check_click_count'>
            <button type='button' class='add-day-range' data-id='{$index}'>Add Day Range</button>
        </div>
    </div>
    <script>
    </script>";
echo "<label style='font-weight: bold;'>Menu url</label><input type='text'  name='business_listings_data[{$index}][menu_url]' value='" . esc_attr($menu_url) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;'>";
echo "</div>";
echo "<div style='flex: 1; padding-left: 10px;'>";
echo "<label style='font-weight: bold;'>Review Ratings</label><input type='number'  name='business_listings_data[{$index}][review_rating]' value='" . esc_attr($review_rating) . "' style='width: 100%; padding: 8px; margin-bottom: 10px;' min='1' max='5'>";

// echo "<label style='font-weight: bold;'>Cuisine Type</label><br>
//     <select  name='business_listings_data[{$index}][cuisine][]' style='width: 100%; padding: 8px; margin-bottom: 10px;' multiple>
//         <option value='American' ".((in_array('American', $cuisine)) ? 'selected' : '').">American</option>
//         <option value='Italian' ".((in_array('Italian', $cuisine)) ? 'selected' : '').">Italian</option>
//         <option value='Chinese' ".((in_array('Chinese', $cuisine)) ? 'selected' : '').">Chinese</option>
//     </select><br>";
echo "<label style='font-weight: bold;'>Price Range</label><br>
    <select id='fieldType' name='business_listings_data[{$index}][dropdown_price]' style='width: 100%; padding: 8px; margin-bottom: 10px;'>
        <option value='$' ".(($dropdown_price=='$') ? 'selected' : '').">$</option>
        <option value='$$' ".(($dropdown_price=='$$') ? 'selected' : '').">$$</option>
        <option value='$$$' ".(($dropdown_price=='$$$') ? 'selected' : '').">$$$</option>
        <option value='$$$$' ".(($dropdown_price=='$$$$') ? 'selected' : '').">$$$$</option>
    </select><br>";

echo "</div>";

echo "</fieldset>";
// gurpreet code
// Remove Listing Button
echo "<p style='text-align: right;'><button type='button' class='button-secondary removeListing' data-index='{$index}'>Remove Listing</button></p>";

// End listing container
echo "</div>";

    }
}
