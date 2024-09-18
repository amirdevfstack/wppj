<?php
class AuthenticateAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_authenticate_section_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_authenticate_admin_scripts'));
    }

    public function add_authenticate_section_submenu() {
        add_submenu_page(
            'business-info',
            'Manage Authenticate Section',
            'Authentication',
            'manage_options',
            'authenticate-section',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>Authenticate Section</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('authenticate-section-group');
                do_settings_sections('authenticate-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    public function enqueue_authenticate_admin_scripts($hook_suffix)
    {
        wp_enqueue_media();
        wp_enqueue_script('authenticate-admin-js', get_template_directory_uri() . '/public/theme/js/authenticate-admin.js', array('jquery'), null, true);
    }
    public function register_settings() {
        register_setting('authenticate-section-group', 'authenticate_section_options', array($this, 'validate_input'));
    
        add_settings_section('authenticate_main_settings', 'Main Authenticate Settings', null, 'authenticate-section');
        add_settings_field('authenticate_bg_image', 'Authenticate Background Image', array($this, 'image_field_callback'), 'authenticate-section', 'authenticate_main_settings', ['label_for' => 'authenticate_bg_image']);
        for ($i = 1; $i <= 3; $i++) {
            add_settings_section("card_{$i}", "Card {$i}", null, 'authenticate-section');
            add_settings_field("card_{$i}_bg_image", "Background Image", array($this, 'image_field_callback'), 'authenticate-section', "card_{$i}", ['label_for' => "card_{$i}_bg_image"]);
            add_settings_field("card_{$i}_title", "Title", array($this, 'input_field_callback'), 'authenticate-section', "card_{$i}", ['label_for' => "card_{$i}_title"]);
            add_settings_field("card_{$i}_text", "Text", array($this, 'input_field_callback'), 'authenticate-section', "card_{$i}", ['label_for' => "card_{$i}_text", 'index' => $i]);
            add_settings_field("card_{$i}_icon_class","Icon", array($this, 'font_awesome_icon_field_callback'), 'authenticate-section', "card_{$i}", array('card_number' => $i));
        }
    }
    
    public function input_field_callback($args) {
        $options = get_option('authenticate_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        $i = isset($args['index']) ? $args['index'] : '';
        
        if ($i !== '' && $args['label_for'] === "card_{$i}_text") {
            echo "<textarea id='{$args['label_for']}' name='authenticate_section_options[{$args['label_for']}]' rows='5' cols='50'>$value</textarea>";
        } else {
            echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='authenticate_section_options[{$args['label_for']}]' value='{$value}' />";
        }
    }
    
    public function image_field_callback($args) {
        $options = get_option('authenticate_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        ?>
        <input type="button" class="button authenticate-image-upload-button" value="Upload Image" data-input-id="<?php echo $args['label_for']; ?>" data-preview-id="<?php echo $args['label_for']; ?>_preview">
        <input type="hidden" id="<?php echo $args['label_for']; ?>" name="authenticate_section_options[<?php echo $args['label_for']; ?>]" value="<?php echo $image_url; ?>">
        <div id="<?php echo $args['label_for']; ?>_preview" class="image-preview">
            <?php if (!empty($image_url)) : ?>
                <img src="<?php echo $image_url; ?>" style="max-width: 200px; max-height: 200px;">
            <?php endif; ?>
        </div>
        <?php
    }
    
    
    public function validate_input($input) {
        return $input;
    }
    public function enqueue_media_uploader() {
        if (isset($_GET['page']) && $_GET['page'] == 'authenticate-section') {
            wp_enqueue_media();
        }
    }

    public function display_selected_images() {
        $options = get_option('authenticate_section_options');
        foreach ($options as $key => $image_url) {
            if (!empty($image_url)) {
                echo '<img src="' . $image_url . '" style="max-width: 200px; max-height: 200px; margin-right: 10px;">';
            }
        }
    }

    public static function get_authenticate_data() {
        return get_option('authenticate_section_options');
    }

    public static function get_card_data($card_number) {
        $options = self::get_authenticate_data();
        $card_data = array();
        $card_bg_image = isset($options["card_{$card_number}_bg_image"]) ? $options["card_{$card_number}_bg_image"] : '';
        $card_title = isset($options["card_{$card_number}_title"]) ? $options["card_{$card_number}_title"] : '';
        $card_text = isset($options["card_{$card_number}_text"]) ? $options["card_{$card_number}_text"] : '';
        $card_icon_class = isset($options["card_{$card_number}_icon_class"]) ? $options["card_{$card_number}_icon_class"] : '';
    
        $card_data = array(
            'bg_image' => $card_bg_image,
            'title' => $card_title,
            'text' => $card_text,
            'icon_class' => $card_icon_class
        );
    
        return $card_data;
    }
    
    public static function get_font_awesome_icons() {
      
        $icons = array(
            'now-ui-icons media-2_sound-wave' => 'Media Wave',
            'now-ui-icons media-1_button-pause' => 'Pause Button',
            'now-ui-icons users_single-02' => 'User',
           
        );

        return $icons;
    }

    public function font_awesome_icon_field_callback($args) {
        $options = get_option('authenticate_section_options');
        $selected_icon = isset($options["card_{$args['card_number']}_icon_class"]) ? $options["card_{$args['card_number']}_icon_class"] : '';
        $icons = AuthenticateAdmin::get_font_awesome_icons();
        ?>
        <select id="<?php echo "card_{$args['card_number']}_icon_class"; ?>" name="authenticate_section_options[<?php echo "card_{$args['card_number']}_icon_class"; ?>]">
            <option value="">Select an Icon</option>
            <?php foreach ($icons as $class => $label) : ?>
                <option value="<?php echo $class; ?>" <?php selected($selected_icon, $class); ?>><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }
    
}





