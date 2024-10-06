<?php
class CenterHeroSectionAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_center_hero_section_submenu'));
        add_action('admin_init', array($this, 'register_center_hero_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_hero_scripts'));
    }

    // Add Center Hero Section as a submenu under "Home Page"
    public function add_center_hero_section_submenu() {
        add_submenu_page(
            'home-page-customization',    // Parent slug (Home Page)
            'Center Hero Section',        // Page title
            'Center Hero Section',        // Menu title
            'manage_options',             // Capability
            'center-hero-section',        // Menu slug
            array($this, 'render_center_hero_section_page') // Callback to render the page
        );
    }

    // Render the Center Hero Section settings page
    public function render_center_hero_section_page() {
        ?>
        <div class="wrap">
            <h1>Center Hero Section Settings</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('center_hero_section_group');
                do_settings_sections('center-hero-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register settings for the center hero section
    public function register_center_hero_settings() {
        register_setting('center_hero_section_group', 'center_hero_section_options', array($this, 'validate_input'));

        add_settings_section('center_hero_main_section', 'Main Settings', null, 'center-hero-section');
        
        // Add fields for background image, title, description, "Connect with us on" text, and social media links
        add_settings_field('hero_bg_image', 'Background Image', array($this, 'image_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_bg_image']);
        add_settings_field('hero_title', 'Title', array($this, 'text_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_title']);
        add_settings_field('hero_description', 'Description', array($this, 'textarea_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_description']);
        add_settings_field('hero_connect_text', 'Social Media Heading', array($this, 'text_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_connect_text']);
        
        // Social Media Links (optional)
        add_settings_field('hero_twitter', 'Twitter URL', array($this, 'url_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_twitter']);
        add_settings_field('hero_facebook', 'Facebook URL', array($this, 'url_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_facebook']);
        add_settings_field('hero_instagram', 'Instagram URL', array($this, 'url_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_instagram']);
        add_settings_field('hero_googleplus', 'Google+ URL', array($this, 'url_field_callback'), 'center-hero-section', 'center_hero_main_section', ['label_for' => 'hero_googleplus']);
    }

    // Callback for text fields (Title, "Connect with us on" text)
    public function text_field_callback($args) {
        $options = get_option('center_hero_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='center_hero_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for textarea (Description)
    public function textarea_field_callback($args) {
        $options = get_option('center_hero_section_options');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        echo "<textarea id='{$args['label_for']}' name='center_hero_section_options[{$args['label_for']}]' rows='5' cols='50'>{$value}</textarea>";
    }

    // Callback for URL fields (Social Media Links)
    public function url_field_callback($args) {
        $options = get_option('center_hero_section_options');
        $value = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        echo "<input type='url' class='regular-text' id='{$args['label_for']}' name='center_hero_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for image upload fields (Background Image)
    public function image_field_callback($args) {
        $options = get_option('center_hero_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        
        echo "<div class='media-upload-wrapper'>";
        echo "<input type='button' class='button hero-image-upload-button' value='Upload Image' data-input-id='{$args['label_for']}' />";
        echo "<input type='button' class='button remove-hero-image-button' value='Remove Image' data-input-id='{$args['label_for']}' style='display:" . (!empty($image_url) ? 'inline' : 'none') . ";color:red;' />";
        echo "</div>";
        echo "<input type='hidden' id='{$args['label_for']}' name='center_hero_section_options[{$args['label_for']}]' value='{$image_url}' />";
        echo "<div id='{$args['label_for']}_preview' class='image-preview'>";
        if (!empty($image_url)) {
            echo "<img src='{$image_url}' style='max-width: 200px; max-height: 200px;'>";
        }
        echo "</div>";
    }

    // Enqueue media uploader script and feature section specific JS
    public function enqueue_hero_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('center-hero-admin-js', get_template_directory_uri() . '/public/theme/js/center-hero-admin.js', array('jquery'), null, true);
    }

    // Input validation
    public function validate_input($input) {
        return $input;
    }
}

