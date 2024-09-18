<?php

class BusinessAdmin
{

    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_admin_menu()
    {
        add_menu_page(
            'Business Information',
            'Business Info',
            'manage_options',
            'business-info',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h1>Business Information</h1>
            <form method="post" action="options.php" novalidate>
                <?php
                settings_fields('business-info-group');
                $this->display_address_field();
                do_settings_sections('business-info');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('business-info-group', 'business_info', array($this, 'validate_input')); 
        add_settings_section('general_info', 'General Information', null, 'business-info');
        $days_of_week = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

        $general_fields = [];
        
        $general_fields[] =['id' => 'address_active', 'title' => 'Address Active', 'callback' => 'checkbox_field_callback'];
        $general_fields[] =['id' => 'phone_active', 'title' => 'Phone Active', 'callback' => 'checkbox_field_callback'];
        $general_fields[] = ['id' => 'business_name', 'title' => 'Business Name'];
        $general_fields[] = ['id' => 'business_logo_long', 'title' => 'Business Logo (Long)', 'callback' => 'upload_field_callback'];
        $general_fields[] = ['id' => 'business_logo_short', 'title' => 'Business Logo (Short)', 'callback' => 'upload_field_callback'];
        $general_fields[] = ['id' => 'address', 'title' => 'Address', 'callback' => 'readonly_field_callback'];
        $general_fields[] = ['id' => 'street', 'title' => 'Street'];
        $general_fields[] = ['id' => 'street2', 'title' => 'Street 2'];
        $general_fields[] = ['id' => 'city', 'title' => 'City'];
        $general_fields[] = ['id' => 'state', 'title' => 'State'];
        $general_fields[] = ['id' => 'postal_code', 'title' => 'Postal Code'];
        $general_fields[] = ['id' => 'country', 'title' => 'Country'];
        $general_fields[] = ['id' => 'latitude', 'title' => 'Latitude'];
        $general_fields[] = ['id' => 'longitude', 'title' => 'Longitude'];
        $general_fields[] = ['id' => 'phone_number', 'title' => 'Phone Number'];
        $general_fields[] = ['id' => 'email', 'title' => 'Email'];
        $general_fields[] = ['id' => 'license_number', 'title' => 'License Number'];
        $general_fields[] = ['id' => 'display_hours', 'title' => '','callback' => 'display_hours_title_callback'];
        foreach ($days_of_week as $day) {

            $field_id = strtolower($day) . '_hours';
            $general_fields[] = ['id' => $field_id, 'title' => $day . ' Hours'];
        }
        $this->register_fields($general_fields, 'general_info');
   }

    public function display_hours_title_callback()
    {
        echo '<h1>Display Hours</h1>';
    }

 
    // checkbox callback function end
    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                isset($field['callback']) ? array($this, $field['callback']) : array($this, 'input_field_callback'),
                'business-info',
                $section,
                array('label_for' => $field['id'])
            );
        }
    }

    public function checkbox_field_callback($args)
    {
        $options = get_option('business_info');
        // Check if the option is set to true (1), if so, make the checkbox checked
        $checked = isset($options[$args['label_for']]) && $options[$args['label_for']] ? 'checked' : '';

        // Echo out the checkbox input field, making sure to keep the admin styles consistent
        echo "<input type='checkbox' id='{$args['label_for']}' name='business_info[{$args['label_for']}]' value='1' {$checked} />";
        echo "<label for='{$args['label_for']}'>" . (isset($args['description']) ? $args['description'] : '') . "</label>";
    }

    public function input_field_callback($args)
    {
        $options = get_option('business_info');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        $readonly='';
        if($args['label_for']=='latitude' || $args['label_for']=='longitude'){ $readonly='readonly';}
        
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_info[{$args['label_for']}]' value='" . $value . "' {$readonly} />";
    }

    public function readonly_field_callback($args)
    {
        $options = get_option('business_info');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_info[{$args['label_for']}]' value='" . $value . "' readonly/>";
    }

    // Updated textarea_field_callback
    public function textarea_field_callback($args)
    {
        $options = get_option('business_info');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        // Match the textarea styling to the text input fields
        echo "<textarea class='large-text' rows='5' id='{$args['label_for']}' name='business_info[{$args['label_for']}]'>" . $value . "</textarea>";
    }

    private function display_address_field()
    {
        $options = get_option('business_info');
        $address_parts = [
            'street' => isset($options['street']) ? $options['street'] : '',
            'street2' => isset($options['street2']) ? $options['street2'] : '',
            'city' => isset($options['city']) ? $options['city'] : '',
            'state' => isset($options['state']) ? $options['state'] : '',
            'postal_code' => isset($options['postal_code']) ? $options['postal_code'] : '',
            'country' => isset($options['country']) ? $options['country'] : '',
        ];

        // Construct the address display
        $address_display = $address_parts['street'];
        $address_display .= !empty($address_parts['street2']) ? ', ' . $address_parts['street2'] : '';
        $address_display .= ', ' . $address_parts['city'];
        $address_display .= ', ' . $address_parts['state'];
        $address_display .= ' ' . $address_parts['postal_code'];
        $address_display .= ', ' . $address_parts['country'];

        // Save the full address as a hidden field so it gets submitted with the form
        echo "<input type='hidden' name='business_info[address]' value='" . esc_attr($address_display) . "' />";

        // Output the address as read-only
        echo "<h2>Address</h2>";
        echo "<p class='regular-text'>" . esc_html($address_display) . "</p>";
    }


    public function upload_field_callback($args)
    {
        $options = get_option('business_info');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Input for the URL
        echo "<input type='hidden' id='{$args['label_for']}' name='business_info[{$args['label_for']}]' value='" . $value . "' />";
        echo "<div id='preview_{$args['label_for']}' style='margin-bottom: 10px;'>";
        if ($value) {
            echo "<img src='" . $value . "' style='max-width: 250px;'/>";
        }
        echo "</div>";
        // The upload button
        echo "<input type='button' class='button upload_image_button' data-input='{$args['label_for']}' value='Upload Image' />";
        if ($value) {
            echo "<input type='button' class='button remove_upload_image_button' data-input='{$args['label_for']}' value='Remove image' style='margin-left:10px;color:red'/>";
        }
    }

    public function validate_input($input)
    {
        $new_input = array();
        $address_parts = [];
    
        foreach ($input as $key => $value) {
            if (strpos($key, '_hours') !== false) {
                $new_input[$key] = sanitize_text_field($value);
            } else {
                switch ($key) {
                    case 'business_name':
                    case 'phone_number':
                    case 'email':
                    case 'license_number':
                    case 'latitude':
                    case 'longitude':
                    case 'address_active':
                    case 'phone_active':
                        
                    case 'business_logo_long':
                    case 'business_logo_short':
                        // Sanitize other fields
                        $new_input[$key] = sanitize_text_field($value);
                        break;
                    default:
                        // Handle address fields
                        if (in_array($key, ['street', 'street2', 'city', 'state', 'postal_code', 'country'])) {
                            $new_input[$key] = sanitize_text_field($value);
                            $address_parts[$key] = $new_input[$key];
                        }
                        break;
                }
            }
        }
    
        // Process and validate the address fields if they exist
        if (!empty($address_parts)) {
            // Concatenate address parts to form the full address
            $full_address = implode(', ', array_filter($address_parts));
            $new_input['address'] = $full_address;
    
            // Perform geolocation if necessary
            $geoResult = $this->adminComponent->geolocation($full_address);
            $geoResultArray = json_decode($geoResult, true);
    
            // Check if latitude and longitude are set in the geolocation result
            if (isset($geoResultArray['latitude']) && isset($geoResultArray['longitude'])) {
                $new_input['latitude'] = $geoResultArray['latitude'];
                $new_input['longitude'] = $geoResultArray['longitude'];
            }
        }
    
        return $new_input;
    }
    

    public static function get_business_info_by_slug($slug)
{
    $field_slugs = [
        'monday-hours' => 'monday_hours',
        'tuesday-hours' => 'tuesday_hours',
        'wednesday-hours' => 'wednesday_hours',
        'thursday-hours' => 'thursday_hours',
        'friday-hours' => 'friday_hours',
        'saturday-hours' => 'saturday_hours',
        'sunday-hours' => 'sunday_hours',
        'business-name' => 'business_name',
        'business-logo-long' => 'business_logo_long',
        'business-logo-short' => 'business_logo_short',
        'address' => 'address',
        'street' => 'street',
        'street2' => 'street2',
        'city' => 'city',
        'state' => 'state',
        'postal-code' => 'postal_code',
        'country' => 'country',
        'latitude' => 'latitude',
        'longitude' => 'longitude',
        'phone-number' => 'phone_number',
        'email' => 'email',
        'license-number' => 'license_number',
        'address-active' => 'address_active',
        'phone-active' => 'phone_active',
    ];

    $business_info = get_option('business_info');
    $field_value = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;

    return isset($business_info[$field_value]) ? $business_info[$field_value] : null;
}

}


