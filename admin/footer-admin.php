<?php
class FooterAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_footer_section_submenu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_footer_admin_scripts'));
    }

    public function add_footer_section_submenu() {
        add_submenu_page(
            'business-info',
            'Manage Footer Section',
            'Footer',
            'manage_options',
            'footer-section',
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
            <h1>Footer Section</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
                settings_fields('footer-section-group');
                do_settings_sections('footer-section');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
    public function enqueue_footer_admin_scripts($hook_suffix)
    {
        wp_enqueue_media();
        wp_enqueue_script('footer-admin-js', get_template_directory_uri() . '/public/theme/js/footer-admin.js', array('jquery'), null, true);
    }
    public function register_settings() {
        register_setting('footer-section-group', 'footer_section_options', array($this, 'validate_input'));
    
        add_settings_section('footer_main_settings', 'Main Footer Settings', null, 'footer-section');
        add_settings_field('footer_bg_image', 'Footer Background Image', array($this, 'image_field_callback'), 'footer-section', 'footer_main_settings', ['label_for' => 'footer_bg_image']);
        add_settings_field('footer_text', 'Footer Text', array($this, 'input_field_callback'), 'footer-section', 'footer_main_settings', ['label_for' => 'footer_text']);
        for ($i = 1; $i <= 3; $i++) {
            add_settings_section("card_{$i}", "Card {$i}", null, 'footer-section');
            add_settings_field("card_{$i}_bg_image", "Background Image", array($this, 'image_field_callback'), 'footer-section', "card_{$i}", ['label_for' => "card_{$i}_bg_image"]);
            add_settings_field("card_{$i}_title", "Title", array($this, 'input_field_callback'), 'footer-section', "card_{$i}", ['label_for' => "card_{$i}_title"]);
            add_settings_field("card_{$i}_text", "Text", array($this, 'input_field_callback'), 'footer-section', "card_{$i}", ['label_for' => "card_{$i}_text"]);
            add_settings_field("card_{$i}_link_text", " Button Text", array($this, 'input_field_callback'), 'footer-section', "card_{$i}", ['label_for' => "card_{$i}_link_text"]);
            add_settings_field("card_{$i}_link", "Button URL", array($this, 'input_field_callback'), 'footer-section', "card_{$i}", ['label_for' => "card_{$i}_link"]);
            add_settings_field("card_{$i}_icon_class","Icon", array($this, 'font_awesome_icon_field_callback'), 'footer-section', "card_{$i}", array('card_number' => $i));
        }
    }
    
    public function input_field_callback($args) {
        $options = get_option('footer_section_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='footer_section_options[{$args['label_for']}]' value='{$value}' />";
    }

    public function image_field_callback($args) {
        $options = get_option('footer_section_options');
        $image_url = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        ?>
        <input type="button" class="button footer-image-upload-button" value="Upload Image" data-input-id="<?php echo $args['label_for']; ?>" data-preview-id="<?php echo $args['label_for']; ?>_preview">
<?php 
        if (!empty($image_url)) {
            echo "<input type='button' class='button remove_upload_image_button_header' data-input='{$args['label_for']}' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>";
        }
        ?>

        
        <input type="hidden" id="<?php echo $args['label_for']; ?>" name="footer_section_options[<?php echo $args['label_for']; ?>]" value="<?php echo $image_url; ?>">
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
        if (isset($_GET['page']) && $_GET['page'] == 'footer-section') {
            wp_enqueue_media();
        }
    }

    public function display_selected_images() {
        $options = get_option('footer_section_options');
        foreach ($options as $key => $image_url) {
            if (!empty($image_url)) {
                echo '<img src="' . $image_url . '" style="max-width: 200px; max-height: 200px; margin-right: 10px;">';
            }
        }
    }

    public static function get_footer_data() {
        return get_option('footer_section_options');
    }

    public static function get_card_data($card_number) {
        $options = self::get_footer_data();
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
            'now-ui-icons shopping_delivery-fast' => 'Delivery',
            'now-ui-icons shopping_box' => 'Shopping Box',
            'icon icon-white now-ui-icons ui-2_favourite-28' => 'Heart',
           
        );

        return $icons;
    }

    public function font_awesome_icon_field_callback($args) {
        $options = get_option('footer_section_options');
        $selected_icon = isset($options["card_{$args['card_number']}_icon_class"]) ? $options["card_{$args['card_number']}_icon_class"] : '';
        $icons = FooterAdmin::get_font_awesome_icons();
        ?>
        <select id="<?php echo "card_{$args['card_number']}_icon_class"; ?>" name="footer_section_options[<?php echo "card_{$args['card_number']}_icon_class"; ?>]">
            <option value="">Select an Icon</option>
            <?php foreach ($icons as $class => $label) : ?>
                <option value="<?php echo $class; ?>" <?php selected($selected_icon, $class); ?>><?php echo $label; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }
    
}





