<?php
class HeaderAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_header_section_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_header_admin_scripts'));
    }

    public function add_header_section_submenu() {
        add_submenu_page(
            'business-info',
            'Manage Header Section',
            'Header',
            'manage_options',
            'header-section',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page() {
        ?>
        <style>
                        .wrap h1 {
                    text-align: center;
                    font-weight: 600;
                }
            tbody {
                    display: flex;
                    flex-wrap: wrap;
                    width: 96%;
                    padding: 24px;
                    margin-bottom: 20px;
                }
            input ,select{
                border-radius: 3px !important;
            }
            tr {
                width: 50%;
            }
            .wrap{
                    background: white;
            }
            form {
                    padding: 20px;
                }
                table.form-table {
    border-bottom: 1px solid black;
}
                select {
                    padding: 5px !IMPORTANT;
                    padding-right:44px !important;
                }
                input {
                    padding: 5px !IMPORTANT;
                }
        </style>
        <div class="wrap">
            <h1>Header Section</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('header-section-group');
                do_settings_sections('header-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    public function enqueue_header_admin_scripts($hook_suffix)
    {
        wp_enqueue_media();
        wp_enqueue_script('my-header-js', get_template_directory_uri() . '/public/theme/js/header-admin.js', array('jquery'), null, true);
            wp_enqueue_style('my-header-css', get_template_directory_uri() . 'admin.css');

    }
    public function register_settings() {
        register_setting('header-section-group', 'header_section_options', array($this, 'validate_input'));
     add_settings_field('header_image_show_long', 'Show Image Long', array($this, 'checkbox_field_callback'), 'header-section', 'header_main_settings', ['label_for' => 'header_image_show_long']);
     add_settings_field('header_image_show_short', 'Show Image Short', array($this, 'checkbox_field_callback'), 'header-section', 'header_main_settings', ['label_for' => 'header_image_show_short']);
        add_settings_section('header_main_settings', 'Main Header Settings', null, 'header-section');
        add_settings_field('header_bg_image', 'Header Background Image (Long)', array($this, 'image_field_callback'), 'header-section', 'header_main_settings', ['label_for' => 'header_bg_image']);
        // add_settings_field('header_bg_image_short', 'Header Background Image (Short)', array($this, 'image_field_callback'), 'header-section', 'header_main_settings', ['label_for' => 'header_bg_image_short']);
        add_settings_field('header_text', 'Header Text', array($this, 'input_field_callback'), 'header-section', 'header_main_settings', ['label_for' => 'header_text']);
        for ($i = 1; $i <= 3; $i++) {
            add_settings_section("card_{$i}", "Card {$i}", null, 'header-section');
            add_settings_field("card_{$i}_bg_image", "Background Image", array($this, 'image_field_callback'), 'header-section', "card_{$i}", ['label_for' => "card_{$i}_bg_image"]);
            add_settings_field("card_{$i}_title", "Title", array($this, 'input_field_callback'), 'header-section', "card_{$i}", ['label_for' => "card_{$i}_title"]);
            add_settings_field("card_{$i}_text", "Text", array($this, 'input_field_callback'), 'header-section', "card_{$i}", ['label_for' => "card_{$i}_text"]);
            add_settings_field("card_{$i}_link_text", " Button Text", array($this, 'input_field_callback'), 'header-section', "card_{$i}", ['label_for' => "card_{$i}_link_text"]);
            add_settings_field("card_{$i}_link", "Button URL", array($this, 'input_field_callback'), 'header-section', "card_{$i}", ['label_for' => "card_{$i}_link"]);
            add_settings_field("card_{$i}_icon_class","Icon", array($this, 'font_awesome_icon_field_callback'), 'header-section', "card_{$i}", array('card_number' => $i));
        }
    }
    public function checkbox_field_callback($args)
    {
        $options = get_option('header_section_options');
        // Check if the option is set to true (1), if so, make the checkbox checked
        $checked = isset($options[$args['label_for']]) && $options[$args['label_for']] ? 'checked' : '';

        // Echo out the checkbox input field, making sure to keep the admin styles consistent
        echo "<input type='checkbox' id='{$args['label_for']}' name='header_section_options[{$args['label_for']}]' value='1' {$checked} />";
        echo "<label for='{$args['label_for']}'>" . (isset($args['description']) ? $args['description'] : '') . "</label>";
    }
    public function input_field_callback($args) {
        $options = get_option('header_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='header_section_options[{$args['label_for']}]' value='{$value}' />";
    }


    public function image_field_callback($args) {
        $options = get_option('header_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        
		?>
		
        <input type="button" class="button header-image-upload-button" value="Upload Image" data-input-id="<?php echo $args['label_for']; ?>" data-preview-id="<?php echo $args['label_for']; ?>_preview">
        <?php 
		if (!empty($image_url)) {
            echo "<input type='button' class='button remove_upload_image_button_header' data-input='{$args['label_for']}' data-input='{$args['label_for']}' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>";
        }
		?>
		
		<input type="hidden" id="<?php echo $args['label_for']; ?>" name="header_section_options[<?php echo $args['label_for']; ?>]" value="<?php echo $image_url; ?>">
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
        if (isset($_GET['page']) && $_GET['page'] == 'header-section') {
            wp_enqueue_media();
        }
    }

    public function display_selected_images() {
        $options = get_option('header_section_options');
        foreach ($options as $key => $image_url) {
            if (!empty($image_url)) {
                echo '<img src="' . $image_url . '" style="max-width: 200px; max-height: 200px; margin-right: 10px;">';
            }
        }
    }

    public static function get_header_data() {
        return get_option('header_section_options');
    }

    public static function get_card_data($card_number) {
        $options = self::get_header_data();
        $card_data = array();
        $card_bg_image = isset($options["card_{$card_number}_bg_image"]) ? $options["card_{$card_number}_bg_image"] : '';
        $card_title = isset($options["card_{$card_number}_title"]) ? $options["card_{$card_number}_title"] : '';
        $card_text = isset($options["card_{$card_number}_text"]) ? $options["card_{$card_number}_text"] : '';
        $card_link_text = isset($options["card_{$card_number}_link_text"]) ? $options["card_{$card_number}_link_text"] : '';
        $card_link = isset($options["card_{$card_number}_link"]) ? $options["card_{$card_number}_link"] : '';
        $card_icon_class = isset($options["card_{$card_number}_icon_class"]) ? $options["card_{$card_number}_icon_class"] : '';
    
        $card_data = array(
            'bg_image' => $card_bg_image,
            'title' => $card_title,
            'text' => $card_text,
            'btn_text' => $card_link_text,
            'link' => $card_link,
            'icon_class' => $card_icon_class
        );
    
        return $card_data;
    }
    
    public static function get_font_awesome_icons() {
      
        $icons = array(
            'now-ui-icons business_badge' => 'Busines Badge',
            'now-ui-icons shopping_box' => 'Shopping Box',
            'now-ui-icons shopping_delivery-fast' => 'Delivery',
           
        );

        return $icons;
    }

    public function font_awesome_icon_field_callback($args) {
        $options = get_option('header_section_options');
        $selected_icon = isset($options["card_{$args['card_number']}_icon_class"]) ? $options["card_{$args['card_number']}_icon_class"] : '';
        $icons = HeaderAdmin::get_font_awesome_icons();
        ?>
        <select id="<?php echo "card_{$args['card_number']}_icon_class"; ?>" name="header_section_options[<?php echo "card_{$args['card_number']}_icon_class"; ?>]">
            <option value="">Select an Icon</option>
            <?php foreach ($icons as $class => $label) : ?>
                <option value="<?php echo $class; ?>" <?php selected($selected_icon, $class); ?>><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }
    
}





