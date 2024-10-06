<?php
class FooterCustomizationAdmin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_footer_customization_submenu'));
        add_action('admin_init', array($this, 'register_footer_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_footer_scripts'));
    }

    public function add_footer_customization_submenu() {
        add_submenu_page(
            'themes.php',
            'Footer Customization',
            'Footer Customization',
            'manage_options',
            'footer-customization',
            array($this, 'render_footer_customization_page')
        );
    }

    public function render_footer_customization_page() {
        ?>
        <div class="wrap">
            <h1>Footer Customization Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('footer_customization_group');
                do_settings_sections('footer-customization');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_footer_settings() {
        register_setting('footer_customization_group', 'footer_customization_options', array($this, 'validate_input'));

        // Titles for each section
        add_settings_section('footer_titles_section', 'Footer Column Titles', null, 'footer-customization');
        add_settings_field('footer_about_us_title', 'About Us Title', array($this, 'text_field_callback'), 'footer-customization', 'footer_titles_section', ['label_for' => 'about_us_title']);
        add_settings_field('footer_market_title', 'Market Title', array($this, 'text_field_callback'), 'footer-customization', 'footer_titles_section', ['label_for' => 'market_title']);
        add_settings_field('footer_social_feed_title', 'Social Feed Title', array($this, 'text_field_callback'), 'footer-customization', 'footer_titles_section', ['label_for' => 'social_feed_title']);
        add_settings_field('footer_follow_us_title', 'Follow Us Title', array($this, 'text_field_callback'), 'footer-customization', 'footer_titles_section', ['label_for' => 'follow_us_title']);
        
        // Additional texts for the 4th column
        add_settings_field('footer_numbers_text', 'Numbers Text', array($this, 'text_field_callback'), 'footer-customization', 'footer_follow_us_section', ['label_for' => 'numbers_text']);
        add_settings_field('footer_freelancers_count', 'Freelancers Count', array($this, 'text_field_callback'), 'footer-customization', 'footer_follow_us_section', ['label_for' => 'freelancers_count']);
        add_settings_field('footer_transactions_count', 'Transactions Count', array($this, 'text_field_callback'), 'footer-customization', 'footer_follow_us_section', ['label_for' => 'transactions_count']);

        // Links and Social Icons Sections
        add_settings_section('footer_about_us_section', 'About Us Links', null, 'footer-customization');
        add_settings_field('footer_about_us_links', 'Links (Label and URL)', array($this, 'repeatable_links_callback'), 'footer-customization', 'footer_about_us_section', ['label_for' => 'about_us_links']);

        add_settings_section('footer_market_section', 'Market Links', null, 'footer-customization');
        add_settings_field('footer_market_links', 'Links (Label and URL)', array($this, 'repeatable_links_callback'), 'footer-customization', 'footer_market_section', ['label_for' => 'market_links']);

        add_settings_section('footer_social_feed_section', 'Social Feed', null, 'footer-customization');
        add_settings_field('footer_social_feed', 'Feed Items (Text)', array($this, 'repeatable_text_callback'), 'footer-customization', 'footer_social_feed_section', ['label_for' => 'social_feed']);

        add_settings_section('footer_follow_us_section', 'Follow Us Links', null, 'footer-customization');
        add_settings_field('footer_social_icons', 'Social Media Icons (Icon and URL)', array($this, 'repeatable_social_icons_callback'), 'footer-customization', 'footer_follow_us_section', ['label_for' => 'social_icons']);
    }

    // Callback for text fields (Titles and Additional Text)
    public function text_field_callback($args) {
        $options = get_option('footer_customization_options');
        $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
        echo "<input type='text' class='regular-text' id='{$args['label_for']}' name='footer_customization_options[{$args['label_for']}]' value='{$value}' />";
    }

    // Callback for repeatable link fields (Label and URL)
    public function repeatable_links_callback($args) {
        $options = get_option('footer_customization_options');
        $links = isset($options[$args['label_for']]) ? $options[$args['label_for']] : array(array('label' => '', 'url' => ''));

        echo '<div class="repeatable-links-wrapper">';
        foreach ($links as $index => $link) {
            echo '<div class="repeatable-link-row">';
            echo "<input type='text' class='regular-text' name='footer_customization_options[{$args['label_for']}][$index][label]' value='" . esc_attr($link['label']) . "' placeholder='Link Label' />";
            echo "<input type='url' class='regular-text' name='footer_customization_options[{$args['label_for']}][$index][url]' value='" . esc_url($link['url']) . "' placeholder='Link URL' />";
            echo '<button type="button" class="remove-link button">Remove</button>';
            echo '</div>';
        }
        echo '<button type="button" class="add-link button" data-section="' . $args['label_for'] . '">Add Link</button>';
        echo '</div>';
    }

    // Callback for repeatable text fields (Social Feed Texts)
    public function repeatable_text_callback($args) {
        $options = get_option('footer_customization_options');
        $items = isset($options[$args['label_for']]) ? $options[$args['label_for']] : array('');

        echo '<div class="repeatable-text-wrapper">';
        foreach ($items as $index => $item) {
            echo '<div class="repeatable-text-row">';
            echo "<input type='text' class='regular-text' name='footer_customization_options[{$args['label_for']}][$index]' value='" . esc_attr($item) . "' placeholder='Feed Text' />";
            echo '<button type="button" class="remove-text button">Remove</button>';
            echo '</div>';
        }
        echo '<button type="button" class="add-text button">Add Text</button>';
        echo '</div>';
    }

    // Callback for repeatable social media icons (Icon and URL)
    public function repeatable_social_icons_callback($args) {
        $options = get_option('footer_customization_options');
        $icons = isset($options[$args['label_for']]) ? $options[$args['label_for']] : array(array('icon' => '', 'url' => ''));

        echo '<div class="repeatable-social-icons-wrapper">';
        foreach ($icons as $index => $icon) {
            echo '<div class="repeatable-social-icon-row">';
            echo "<input type='text' class='regular-text' name='footer_customization_options[{$args['label_for']}][$index][icon]' value='" . esc_attr($icon['icon']) . "' placeholder='FontAwesome Icon Class' />";
            echo "<input type='url' class='regular-text' name='footer_customization_options[{$args['label_for']}][$index][url]' value='" . esc_url($icon['url']) . "' placeholder='Social Media URL' />";
            echo '<button type="button" class="remove-icon button">Remove</button>';
            echo '</div>';
        }
        echo '<button type="button" class="add-icon button">Add Social Media Icon</button>';
        echo '</div>';
    }

    public function validate_input($input) {
        return $input;
    }

    public function enqueue_footer_scripts() {
        wp_enqueue_script('footer-customization-js', get_template_directory_uri() . '/public/theme/js/footer-admin.js', array('jquery'), null, true);
    }
}
