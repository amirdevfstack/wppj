<?php
class HomePageCustomizationAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_homepage_customization_menu'));
        add_action('admin_init', array($this, 'register_banner_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_banner_scripts'));
    }

    public function add_homepage_customization_menu() {
        add_menu_page(
            'Home Page Customization',  
            'Home Page', 
            'manage_options',  
            'home-page-customization',  
            array($this, 'render_homepage_customization_page'),  
            'dashicons-admin-customizer',  
            6  
        );
    
        add_submenu_page(
            'home-page-customization',
            'Banner Section',
            'Banner Section',
            'manage_options',
            'banner-section',
            array($this, 'render_banner_section_page')
        );
    }

    public function enqueue_banner_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('banner-admin-js', get_template_directory_uri() . '/public/theme/js/banner-admin.js', array('jquery'), null, true);
    }

    public function render_homepage_customization_page() {
        echo '<h1>Welcome to Home Page Customization</h1>';
    }

    public function render_banner_section_page() {
        ?>
        <div class="wrap">
            <h1>Banner Section Settings</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('banner_section_group');
                do_settings_sections('banner-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_banner_settings() {
        register_setting('banner_section_group', 'banner_section_options', array($this, 'validate_input'));

        add_settings_section('banner_main_section', 'Main Settings', null, 'banner-section');
        
        add_settings_field('banner_title', 'Banner Title', array($this, 'text_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_title']);
        add_settings_field('banner_subtitle', 'Banner Subtitle', array($this, 'text_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_subtitle']);
        add_settings_field('banner_image', 'Banner Background Image', array($this, 'image_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_image']);
        add_settings_field('banner_video', 'Banner Video', array($this, 'video_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_video']);
        add_settings_field('banner_button_text', 'Button Text', array($this, 'text_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_button_text']);
        add_settings_field('banner_button_url', 'Button URL', array($this, 'url_field_callback'), 'banner-section', 'banner_main_section', ['label_for' => 'banner_button_url']);
    }

    public function text_field_callback($args) {
        $options = get_option('banner_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='banner_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    public function url_field_callback($args) {
        $options = get_option('banner_section_options');
        $value = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        echo "<input type='url' class='regular-text' id='{$args['label_for']}' name='banner_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    public function image_field_callback($args) {
        $options = get_option('banner_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        
        echo "<div class='media-upload-wrapper'>";
        echo "<input type='button' class='button banner-image-upload-button' value='Upload Image' data-input-id='{$args['label_for']}' />";
        echo "<input type='button' class='button remove-banner-image-button' value='Remove Image' data-input-id='{$args['label_for']}' style='display:" . (!empty($image_url) ? 'inline' : 'none') . ";color:red;' />";
        echo "</div>";
        echo "<input type='hidden' id='{$args['label_for']}' name='banner_section_options[{$args['label_for']}]' value='{$image_url}' />";
        echo "<div id='{$args['label_for']}_preview' class='image-preview'>";
        if (!empty($image_url)) {
            echo "<img src='{$image_url}' style='max-width: 200px; max-height: 200px;'>";
        }
        echo "</div>";
    }

    public function video_field_callback($args) {
        $options = get_option('banner_section_options');
        $video_url = isset($options[$args['label_for']]) ? esc_url($options[$args['label_for']]) : '';
        
        echo "<div class='media-upload-wrapper'>";
        echo "<input type='button' class='button banner-video-upload-button' value='Upload Video' data-input-id='{$args['label_for']}' />";
        echo "<input type='button' class='button remove-banner-video-button' value='Remove Video' data-input-id='{$args['label_for']}' style='display:" . (!empty($video_url) ? 'inline' : 'none') . ";color:red;' />";
        echo "</div>";
        echo "<input type='hidden' id='{$args['label_for']}' name='banner_section_options[{$args['label_for']}]' value='{$video_url}' />";
        echo "<div id='{$args['label_for']}_preview' class='video-preview'>";
        if (!empty($video_url)) {
            echo "<video src='{$video_url}' controls style='max-width: 200px; max-height: 200px;'></video>";
        }
        echo "</div>";
    }

    public function validate_input($input) {
        return $input;
    }
}
