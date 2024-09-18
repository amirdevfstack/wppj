<?php

class AboutAdmin
{

    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_about_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_about_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage About Section',
            'About',
            'manage_options',
            'business-about',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h1>About Information</h1>
            <form method="post" action="options.php" novalidate>
                <?php
                settings_fields('business-about-group');
              
                do_settings_sections('business-about');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('business-about-group', 'business_about', array($this, 'validate_input'));
        // Additional Information Section
        add_settings_section('additional_about', 'Additional Information', null, 'business-about');
        $additional_fields = [
            ['id' => 'article_active', 'title' => 'Article Active', 'callback' => 'checkbox_field_callback'],
            ['id' => 'article_title', 'title' => 'Article Title'],
            ['id' => 'article_sub_title', 'title' => 'Article Sub-Title', 'callback' => 'textarea_field_callback'],
            ['id' => 'article_quote', 'title' => 'Article Quote'],
            ['id' => 'article_heading', 'title' => 'Article Heading'],
            ['id' => 'article_body', 'title' => 'Article Body', 'callback' => 'textarea_field_callback'],
            ['id' => 'footer_title', 'title' => 'Footer Title'],
            ['id' => 'footer_body', 'title' => 'Footer Body', 'callback' => 'textarea_field_callback']
        ];
     
        $this->register_fields($additional_fields, 'additional_about');
        
    }

    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                isset($field['callback']) ? array($this, $field['callback']) : array($this, 'input_field_callback'),
                'business-about',
                $section,
                array('label_for' => $field['id'])
            );
        }
    }

    public function checkbox_field_callback($args)
    {
        $options = get_option('business_about');
        // Check if the option is set to true (1), if so, make the checkbox checked
        $checked = isset($options[$args['label_for']]) && $options[$args['label_for']] ? 'checked' : '';

        // Echo out the checkbox input field, making sure to keep the admin styles consistent
        echo "<input type='checkbox' id='{$args['label_for']}' name='business_about[{$args['label_for']}]' value='1' {$checked} />";
        echo "<label for='{$args['label_for']}'>" . (isset($args['description']) ? $args['description'] : '') . "</label>";
    }

    public function input_field_callback($args)
    {
        $options = get_option('business_about');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_about[{$args['label_for']}]' value='" . $value . "' />";
    }

    public function readonly_field_callback($args)
    {
        $options = get_option('business_about');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        // Use WordPress's built-in admin styles for form fields
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_about[{$args['label_for']}]' value='" . $value . "' readonly/>";
    }

    // Updated textarea_field_callback
    public function textarea_field_callback($args)
    {
        $options = get_option('business_about');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        // Match the textarea styling to the text input fields
        echo "<textarea class='large-text' rows='5' id='{$args['label_for']}' name='business_about[{$args['label_for']}]'>" . $value . "</textarea>";
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
                    case 'article_active':
                    case 'article_title':
                    case 'article_sub_title':
                    case 'article_quote':
                    case 'footer_title':
                    case 'operating_hours':
                        $new_input[$key] = sanitize_text_field($value);
                        break;
                    case 'business_logo_long':
                    case 'business_logo_short':
                    case 'verification_background_image':
                        $new_input[$key] = esc_url_raw($value);
                        break;
                    case 'article_heading':
                    case 'article_body':
                    case 'footer_body':
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

    public static function get_business_about_by_slug($slug)
    {
        $field_slugs = array( 

            'article-active' => 'article_active',
            'article-title' => 'article_title',
            'article-sub-title' => 'article_sub_title',
            'article-quote' => 'article_quote',
            'article-heading' => 'article_heading',
            'article-body' => 'article_body',
            'footer-title' => 'footer_title',
            'footer-body' => 'footer_body', 
        );

        $business_about = get_option('business_about');
        $field_id = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;

        return isset($business_about[$field_id]) ? $business_about[$field_id] : null;
    }
}

