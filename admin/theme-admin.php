<?php
class ThemeColorCustomizer
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_color_picker_scripts'));
        add_action('admin_menu', array($this, 'add_theme_color_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('wp_head', array($this, 'apply_custom_theme_colors'));

    }

    public function enqueue_color_picker_scripts() {
       
        wp_enqueue_script('jscolor-js', get_template_directory_uri() . '/public/theme/js/jscolor.js', array('jquery'), null, true);
    }

    public function add_theme_color_settings_page() {
        add_menu_page(
            'Theme Color Settings',
            'Theme Colors',
            'manage_options',
            'theme-color-settings',
            array($this, 'theme_color_settings_page_content'),
            'dashicons-admin-customizer',
            61
        );
    }

    public function theme_color_settings_page_content() {
        ?>
        <div class="wrap">
            <h1>Customize Theme Colors</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('theme_color_group');
                do_settings_sections('theme-color-settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings()
    {
        register_setting('theme_color_group', 'theme_colors', array($this, 'validate_input'));
        add_settings_section('bootstrap_colors', 'Bootstrap Theme Colors', null, 'theme-color-settings');
        $color_fields = [
            ['id' => 'primary', 'title' => 'Primary Color'],
            ['id' => 'secondary', 'title' => 'Secondary Color'],
            ['id' => 'success', 'title' => 'Success Color'],
            ['id' => 'danger', 'title' => 'Danger Color'],
            ['id' => 'warning', 'title' => 'Warning Color'],
            ['id' => 'info', 'title' => 'Info Color'],
            ['id' => 'light', 'title' => 'Light Color'],
            ['id' => 'dark', 'title' => 'Dark Color']
        ];
        $this->register_fields($color_fields, 'bootstrap_colors');
    }

    private function register_fields($fields, $section)
    {
        foreach ($fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                array($this, 'color_field_callback'),
                'theme-color-settings',
                $section,
                array('label_for' => $field['id'])
            );
        }
    }

    public function color_field_callback($args)
{
    $options = get_option('theme_colors');
    $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
    echo "<input class='jscolor' type='text' id='{$args['label_for']}' name='theme_colors[{$args['label_for']}]' value='" . $value . "' />";
}

    public function validate_input($input)
    {
        error_log('Input received: ' . print_r($input, true));
        $new_input = array();
        foreach ($input as $key => $value) {
            $new_input[$key] = sanitize_hex_color($value);
          
        }
       
        return $new_input;
    }

    public function apply_custom_theme_colors() {
        $colors = get_option('theme_colors');
        if (!empty($colors)) {
            echo '<style>:root {';
            foreach ($colors as $key => $color) {
                echo "--bs-{$key}: {$color};";  
            }
            if (isset($colors['primary'])) {
                echo '.btn-primary { background-color: ' . $colors['primary'] . '; }';
                echo '.navbar { background-color: ' . $colors['primary'] . '; }';  
            }
            if (isset($colors['success'])) {
                echo '.btn-success { background-color: ' . $colors['success'] . '; }';
            }
            if (isset($colors['secondary'])) {
                echo '.btn-secondary { background-color: ' . $colors['secondary'] . '; }';
            }
            if (isset($colors['danger'])) {
                echo '.btn-danger { background-color: ' . $colors['danger'] . '; }';
            }
            if (isset($colors['warning'])) {
                echo '.btn-warning { background-color: ' . $colors['warning'] . '; }';
            }
            if (isset($colors['info'])) {
                echo '.btn-info { background-color: ' . $colors['info'] . '; }';
            }
            if (isset($colors['dark'])) {
                echo '.btn-dark { background-color: ' . $colors['dark'] . '; }';
            }
            if (isset($colors['light'])) {
                echo '.btn-light { background-color: ' . $colors['light'] . '; }';
            }
            echo '}</style>';
        }
    }
    
    
    
}
