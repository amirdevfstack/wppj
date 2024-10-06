<?php
class DownloadAppSectionAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_download_app_section_submenu'));
        add_action('admin_init', array($this, 'register_download_app_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_download_app_scripts'));
    }

    // Add Download App Section as a submenu under "Home Page"
    public function add_download_app_section_submenu() {
        add_submenu_page(
            'home-page-customization',    // Parent slug (Home Page)
            'Download App Section',       // Page title
            'Download App Section',       // Menu title
            'manage_options',             // Capability
            'download-app-section',       // Menu slug
            array($this, 'render_download_app_section_page') // Callback to render the page
        );
    }

    // Render the Download App Section settings page
    public function render_download_app_section_page() {
        ?>
        <div class="wrap">
            <h1>Download App Section Settings</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('download_app_section_group');
                do_settings_sections('download-app-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register settings for the download app section
    public function register_download_app_settings() {
        register_setting('download_app_section_group', 'download_app_section_options', array($this, 'validate_input'));

        add_settings_section('download_app_main_section', 'Main Settings', null, 'download-app-section');
        
        // Add fields for title, description, button text, button URL, and image
        add_settings_field('app_title', 'Title', array($this, 'text_field_callback'), 'download-app-section', 'download_app_main_section', ['label_for' => 'app_title']);
        add_settings_field('app_description', 'Description', array($this, 'textarea_field_callback'), 'download-app-section', 'download_app_main_section', ['label_for' => 'app_description']);
        add_settings_field('app_button_text', 'Button Text', array($this, 'text_field_callback'), 'download-app-section', 'download_app_main_section', ['label_for' => 'app_button_text']);
        add_settings_field('app_button_url', 'Button URL', array($this, 'url_field_callback'), 'download-app-section', 'download_app_main_section', ['label_for' => 'app_button_url']);
        add_settings_field('app_image', 'App Image', array($this, 'image_field_callback'), 'download-app-section', 'download_app_main_section', ['label_for' => 'app_image']);
    }

    // Callback for text fields (Title, Button Text)
    public function text_field_callback($args) {
        $options = get_option('download_app_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='download_app_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for textarea (Description)
    public function textarea_field_callback($args) {
        $options = get_option('download_app_section_options');
        $value = isset($options[$args['label_for']]) ? esc_textarea($options[$args['label_for']]) : '';
        echo "<textarea id='{$args['label_for']}' name='download_app_section_options[{$args['label_for']}]' rows='5' cols='50'>{$value}</textarea>";
    }

    // Callback for URL fields (Button URL)
    public function url_field_callback($args) {
        $options = get_option('download_app_section_options');
        $value = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        echo "<input type='url' class='regular-text' id='{$args['label_for']}' name='download_app_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for image upload fields (App Image)
    public function image_field_callback($args) {
        $options = get_option('download_app_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        
        echo "<div class='media-upload-wrapper'>";
        echo "<input type='button' class='button app-image-upload-button' value='Upload Image' data-input-id='{$args['label_for']}' />";
        echo "<input type='button' class='button remove-app-image-button' value='Remove Image' data-input-id='{$args['label_for']}' style='display:" . (!empty($image_url) ? 'inline' : 'none') . ";color:red;' />";
        echo "</div>";
        echo "<input type='hidden' id='{$args['label_for']}' name='download_app_section_options[{$args['label_for']}]' value='{$image_url}' />";
        echo "<div id='{$args['label_for']}_preview' class='image-preview'>";
        if (!empty($image_url)) {
            echo "<img src='{$image_url}' style='max-width: 200px; max-height: 200px;'>";
        }
        echo "</div>";
    }

    // Enqueue media uploader script and download app section specific JS
    public function enqueue_download_app_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('download-app-admin-js', get_template_directory_uri() . '/public/theme/js/download-app-admin.js', array('jquery'), null, true);
    }

    // Input validation
    public function validate_input($input) {
        return $input;
    }
}

