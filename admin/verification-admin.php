<?php

class VerificationAdmin
{

    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_verification_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_verification_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Verification Section',
            'Verification Modal',
            'manage_options',
            'varification_modal',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h1>Verification Information</h1>
            <form method="post" action="options.php" novalidate>
                <?php
                settings_fields('business-verification-group');
              
                do_settings_sections('business-verification');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('business-verification-group', 'business_verification', array($this, 'validate_input'));
        // Age Verification Section
        add_settings_section('verification_verification', 'Verification Information', null, 'business-verification');
        $verificaiton_fields = [
            ['id' => 'verification_active', 'title' => 'Verification Active', 'callback' => 'checkbox_field_callback'],
            ['id' => 'verification_background_image', 'title' => 'Verification Background Image', 'callback' => 'upload_field_callback'],
            ['id' => 'verification_title', 'title' => 'Verification Title'],
            ['id' => 'verification_sub_title', 'title' => 'Verification Sub-Title'],
            ['id' => 'verification_accept_button', 'title' => 'Verification Accept Button'],
            ['id' => 'verification_deny_button', 'title' => 'Verification Deny Button'],
            ['id' => 'verification_deny_button_link', 'title' => 'Verification Deny Button Link'],
            ['id' => 'verification_footer', 'title' => 'Verification Footer Text'],
            ['id' => 'verification_link', 'title' => 'Verification Footer Link'],
        ];
        // Register fields by section
        $this->register_fields($verificaiton_fields, 'verification_verification');
    }

    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                isset($field['callback']) ? array($this, $field['callback']) : array($this, 'input_field_callback'),
                'business-verification',
                $section,
                array('label_for' => $field['id'])
            );
        }
    }

    public function checkbox_field_callback($args)
    {
        $options = get_option('business_verification');
        // Check if the option is set to true (1), if so, make the checkbox checked
        $checked = isset($options[$args['label_for']]) && $options[$args['label_for']] ? 'checked' : '';

        // Echo out the checkbox input field, making sure to keep the admin styles consistent
        echo "<input type='checkbox' id='{$args['label_for']}' name='business_verification[{$args['label_for']}]' value='1' {$checked} />";
        echo "<label for='{$args['label_for']}'>" . (isset($args['description']) ? $args['description'] : '') . "</label>";
    }

    public function input_field_callback($args)
    {
        $options = get_option('business_verification');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_verification[{$args['label_for']}]' value='" . $value . "' />";
    }

    public function readonly_field_callback($args)
    {
        $options = get_option('business_verification');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_verification[{$args['label_for']}]' value='" . $value . "' readonly/>";
    }

    // Updated textarea_field_callback
    public function textarea_field_callback($args)
    {
        $options = get_option('business_verification');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        // Match the textarea styling to the text input fields
        echo "<textarea class='large-text' rows='5' id='{$args['label_for']}' name='business_verification[{$args['label_for']}]'>" . $value . "</textarea>";
    }

    public function upload_field_callback($args)
    {
        $options = get_option('business_verification');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Input for the URL
        echo "<input type='hidden' id='{$args['label_for']}' name='business_verification[{$args['label_for']}]' value='" . $value . "' />";
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
            if (in_array($key, ['street', 'street2', 'city', 'state', 'postal_code', 'country'])) {
                $new_input[$key] = sanitize_text_field($value);
                $address_parts[$key] = $new_input[$key];
            } else {
                switch ($key) {
                    case 'verification_title':
                    case 'verification_active':
                    case 'verification_sub_title':
                    case 'verification_accept_button':
                    case 'verification_deny_button':
                    case 'verification_deny_button_link':
                    case 'verification_footer':
                    case 'verification_link':
                    case 'operating_hours':
                        $new_input[$key] = sanitize_text_field($value);
                        break;
                    case 'business_logo_long':
                    case 'business_logo_short':
                    case 'verification_background_image':
                        $new_input[$key] = esc_url_raw($value);
                        break;
                        $new_input[$key] = sanitize_textarea_field($value);
                        break;
                }
            }
        }

        if (!empty($address_parts)) {
            $full_address = implode(', ', array_filter($address_parts));
            $new_input['address'] = $full_address;
            $geoResult = $this->adminComponent->geolocation($full_address);

            // Decode the JSON string into an associative array
            $geoResultArray = json_decode($geoResult, true);

            // Check if latitude and longitude are set in the decoded array
            if (isset($geoResultArray['latitude']) && isset($geoResultArray['longitude'])) {
                $new_input['latitude'] = $geoResultArray['latitude'];
                $new_input['longitude'] = $geoResultArray['longitude'];
            }
        }

        // After collecting all individual address parts, concatenate them to form the full address
        if (!empty($address_parts)) {
            $new_input['address'] = implode(', ', array_filter($address_parts));
        }
        return $new_input;
    }

    public static function get_business_verification_by_slug($slug)
    {
        $field_slugs = array(
            'verification-active' => 'verification_active',
            'verification-background-image' => 'verification_background_image',
            'verification-title' => 'verification_title',
            'verification-sub-title' => 'verification_sub_title',
            'verification-accept-button' => 'verification_accept_button',
            'verification-footer' => 'verification_footer',
            'verification-deny-button' => 'verification_deny_button',
            'verification-deny-button-link' => 'verification_deny_button_link',
            'verification-link' => 'verification_link',
        );

        $business_verification = get_option('business_verification');
        $field_id = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;

        return isset($business_verification[$field_id]) ? $business_verification[$field_id] : null;
    }
}

