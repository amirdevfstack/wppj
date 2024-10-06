<?php
class FeatureSectionAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_feature_section_submenu'));
        add_action('admin_init', array($this, 'register_feature_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_feature_scripts'));
    }

    // Add Feature Section as a submenu under "Home Page"
    public function add_feature_section_submenu() {
        add_submenu_page(
            'home-page-customization',    // Parent slug (Home Page)
            'Feature Section',            // Page title
            'Feature Section',            // Menu title
            'manage_options',             // Capability
            'feature-section',            // Menu slug
            array($this, 'render_feature_section_page') // Callback to render the page
        );
    }

    // Render the Feature Section settings page
    public function render_feature_section_page() {
        ?>
        <div class="wrap">
            <h1>Feature Section Settings</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('feature_section_group');
                do_settings_sections('feature-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register settings for the feature section
    public function register_feature_settings() {
        register_setting('feature_section_group', 'feature_section_options', array($this, 'validate_input'));

        add_settings_section('feature_main_section', 'Main Settings', null, 'feature-section');
        
        // Add fields for feature title, content, images, text customization, button text, and URL
        add_settings_field('feature_title', 'Feature Title', array($this, 'text_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_title']);
        add_settings_field('feature_content', 'Feature Content', array($this, 'textarea_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_content']);
        add_settings_field('feature_image', 'Feature Background Image', array($this, 'image_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_image']);
        add_settings_field('feature_logo', 'Feature Logo Image', array($this, 'image_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_logo']);
        add_settings_field('feature_love_contagious', '"Quote1" Text', array($this, 'text_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_love_contagious']);
        add_settings_field('feature_love_infectious', '"Quote2" Text', array($this, 'text_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_love_infectious']);
        add_settings_field('feature_button_text', 'Button Text', array($this, 'text_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_button_text']);
        add_settings_field('feature_button_url', 'Button URL', array($this, 'url_field_callback'), 'feature-section', 'feature_main_section', ['label_for' => 'feature_button_url']);
        
    }

    // Callback for text fields (Title, Button Text, "Love" Texts)
    public function text_field_callback($args) {
        $options = get_option('feature_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='feature_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for textarea (Content)
    public function textarea_field_callback($args) {
        $options = get_option('feature_section_options');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        echo "<textarea id='{$args['label_for']}' name='feature_section_options[{$args['label_for']}]' rows='5' cols='50'>{$value}</textarea>";
    }

    // Callback for URL fields (Button URL)
    public function url_field_callback($args) {
        $options = get_option('feature_section_options');
        $value = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        echo "<input type='url' class='regular-text' id='{$args['label_for']}' name='feature_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for image upload fields (Image, Logo)
    public function image_field_callback($args) {
        $options = get_option('feature_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        
        echo "<div class='media-upload-wrapper'>";
        echo "<input type='button' class='button feature-image-upload-button' value='Upload Image' data-input-id='{$args['label_for']}' />";
        echo "<input type='button' class='button remove-feature-image-button' value='Remove Image' data-input-id='{$args['label_for']}' style='display:" . (!empty($image_url) ? 'inline' : 'none') . ";color:red;' />";
        echo "</div>";
        echo "<input type='hidden' id='{$args['label_for']}' name='feature_section_options[{$args['label_for']}]' value='{$image_url}' />";
        echo "<div id='{$args['label_for']}_preview' class='image-preview'>";
        if (!empty($image_url)) {
            echo "<img src='{$image_url}' style='max-width: 200px; max-height: 200px;'>";
        }
        echo "</div>";
    }

    // Enqueue media uploader script and feature section specific JS
    public function enqueue_feature_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('feature-admin-js', get_template_directory_uri() . '/public/theme/js/feature-admin.js', array('jquery'), null, true);
    }

    // Input validation
    public function validate_input($input) {
        return $input;
    }
}
