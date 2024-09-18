<?php

class OpenGraphAdmin
{

    private $adminComponent;
    public function __construct($adminComponent)
    {
        $this->adminComponent = $adminComponent;
        add_action('admin_menu', array($this, 'add_opengraph_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

   
    public function add_opengraph_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage OpenGraph Section',
            'OpenGraph',
            'manage_options',
            'business-opengraph',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h1>OpenGraph Section</h1>
            <form method="post" action="options.php" novalidate>
                <?php
                settings_fields('business-opengraph-group');
                
                do_settings_sections('business-opengraph');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('business-opengraph-group', 'business_opengraph', array($this, 'validate_input'));
        add_settings_section('opengraph_media', 'OpenGraph Links', null, 'business-opengraph');
        $general_fields = [
            ['id' => 'og_title', 'title' => 'Name of Business'],
            ['id' => 'og_type', 'title' => 'Business Type'],
            ['id' => 'og_image', 'title' => 'Url To Image'],
            ['id' => 'og_url', 'title' => 'Website Url'],
            ['id' => 'og_description', 'title' => 'Description'],
            ['id' => 'og_site_name', 'title' => 'Your Business Name'],
            ['id' => 'og_locale', 'title' => 'Country'],
            
        ];

        $this->register_fields($general_fields, 'opengraph_media');
      
    }

    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                isset($field['callback']) ? array($this, $field['callback']) : array($this, 'input_field_callback'),
                'business-opengraph',
                $section,
                array('label_for' => $field['id'])
            );
        }
    }

    public function checkbox_field_callback($args)
    {
        $options = get_option('business_opengraph');
        $checked = isset($options[$args['label_for']]) && $options[$args['label_for']] ? 'checked' : '';
        echo "<input type='checkbox' id='{$args['label_for']}' name='business_opengraph[{$args['label_for']}]' value='1' {$checked} />";
        echo "<label for='{$args['label_for']}'>" . (isset($args['description']) ? $args['description'] : '') . "</label>";
    }

    public function input_field_callback($args)
    {
        
        $options = get_option('business_opengraph');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_opengraph[{$args['label_for']}]' value='" . $value . "' />";
    }

    public function validate_input($input)
    {
        $new_input = array();
        foreach ($input as $key => $value) {
            if (in_array($key, ['og_image', 'og_url'])) {
            
                $new_input[$key] = esc_url_raw($value);
            } else {
              
                $new_input[$key] = sanitize_text_field($value);
            }
        }
        return $new_input;
    }
    

    public function readonly_field_callback($args)
    {
        $options = get_option('business_opengraph');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
     
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='business_opengraph[{$args['label_for']}]' value='" . $value . "' readonly/>";
    }

   
    public function textarea_field_callback($args)
    {
        $options = get_option('business_opengraph');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
       
        echo "<textarea class='large-text' rows='5' id='{$args['label_for']}' name='business_opengraph[{$args['label_for']}]'>" . $value . "</textarea>";
    }

    

    public static function get_opengraph_info_by_slug($slug)
    {
        $field_slugs = array(
            'og-title' => 'og_title',
            'og-type' => 'og_type',
            'og-image' => 'og_image',
            'og-url' => 'og_url',
            'og-description' => 'og_description',
            'og-site-name' => 'og_site_name',
            'og-locale' => 'og_locale',
            
        );
    
        
        $opengraph_info = get_option('business_opengraph');
        $field_id = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;
    
        return isset($opengraph_info[$field_id]) ? $opengraph_info[$field_id] : null;
    }
    

}

