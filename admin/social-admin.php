<?php

class SocialAdmin
{

    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_social_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

   
    public function add_social_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Social Section',
            'Social Media',
            'manage_options',
            'social-media',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h1>Social Section</h1>
            <form method="post" action="options.php" novalidate>
                <?php
                settings_fields('business-social-group');
                
                do_settings_sections('business-social');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('business-social-group', 'business_social', array($this, 'validate_input'));
        // Social Media Section
        add_settings_section('social_media', 'Social Media Links', null, 'business-social');
        $social_fields = [
            ['id' => 'facebook_url', 'title' => 'Facebook URL'],
            ['id' => 'instagram_url', 'title' => 'Instagram URL'],
            ['id' => 'twitter_url', 'title' => 'Twitter URL'],
            ['id' => 'tiktok_url', 'title' => 'TikTok URL'],
            ['id' => 'yelp_url', 'title' => 'Yelp URL'],
            ['id' => 'google_url', 'title' => 'Google URL']
        ];

        // Register fields by section
        $this->register_fields($social_fields, 'social_media');
      
    }

    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                isset($field['callback']) ? array($this, $field['callback']) : array($this, 'input_field_callback'),
                'business-social',
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
        // Notice the change here from 'business_info' to 'business_social'
        $options = get_option('business_social');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_social[{$args['label_for']}]' value='" . $value . "' />";
    }

    public function validate_input($input)
    {
        $new_input = array();
        foreach ($input as $key => $value) {
            if (in_array($key, ['facebook_url', 'instagram_url', 'twitter_url', 'tiktok_url', 'yelp_url', 'google_url'])) {
            
                $new_input[$key] = esc_url_raw($value);
            } else {
              
                $new_input[$key] = sanitize_text_field($value);
            }
        }
        return $new_input;
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

    

    public static function get_social_info_by_slug($slug)
    {
        $field_slugs = array(
            'facebook-url' => 'facebook_url',
            'instagram-url' => 'instagram_url',
            'twitter-url' => 'twitter_url',
            'tiktok-url' => 'tiktok_url',
            'yelp-url' => 'yelp_url',
            'google-url' => 'google_url',
            // Add other slugs and their corresponding option keys as needed
        );
    
        // Fetch the 'business_social' option instead of 'business_info'
        $social_info = get_option('business_social');
        $field_id = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;
    
        return isset($social_info[$field_id]) ? $social_info[$field_id] : null;
    }
    

}

