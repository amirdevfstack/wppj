<?php

class ProductAdmin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_products_submenu'));
        add_action('admin_init', array($this, 'register_slider_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_products_admin_scripts'));
    }

    public function add_products_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Products Slider',
            'Marquee',
            'manage_options',
            'marquee-section',
            array($this, 'products_slider_page_callback')
        );
    }

    public function register_slider_settings()
    {
        register_setting('products-slider-group', 'products_slider_data');
    }

    public function enqueue_products_admin_scripts($hook_suffix)
    {
        if ('business-info_page_products-slider' !== $hook_suffix) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_script('my-product-js', get_template_directory_uri() . '/public/theme/js/product-slider-admin.js', array('jquery'), null, true);
    }

    public function products_slider_page_callback()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // Get existing slider data from the database and ensure it's an array
        $slider_data_raw = get_option('products_slider_data', '');
        $slider_data = maybe_unserialize($slider_data_raw);
        if (!is_array($slider_data)) {
            $slider_data = [];
        }

        echo '<div class="wrap">';
        echo '<h1>Manage Product Sliders</h1>';
        echo '<form method="post" action="options.php">';
        
        settings_fields('products-slider-group');
        do_settings_sections('products-slider-group');

        foreach ($slider_data as $index => $slide) {
            $this->render_slide_fields($index, $slide);
        }

        echo '<button type="button" class="button-secondary" id="addNewSlide">Add New Slide</button>';
        submit_button();
        echo '</form>';
        echo '</div>';
    }

    protected function render_slide_fields($index, $slide)
    {
        $name = isset($slide['name']) ? $slide['name'] : '';
        $description = isset($slide['description']) ? $slide['description'] : '';
        $link = isset($slide['link']) ? $slide['link'] : '';
        $image = isset($slide['image']) ? $slide['image'] : '';

        echo "<div class='product-slide' data-index='{$index}'>";
        echo "<p><input type='text' name='products_slider_data[{$index}][name]' value='{$name}' placeholder='Product Name' /></p>";
        echo "<p><input type='text' name='products_slider_data[{$index}][description]' value='{$description}' placeholder='Product Description' /></p>";
        echo "<p><input type='text' name='products_slider_data[{$index}][link]' value='{$link}' placeholder='Product Link' /></p>";
        echo "<p><input type='text' class='image-url-field' name='products_slider_data[{$index}][image]' value='{$image}' placeholder='Product Image URL' /></p>";
        echo "<p><button type='button' class='button upload_image_button' data-input='products_slider_data[{$index}][image]'>Upload Image</button></p>";
		if(!empty($image)){echo "<input type='button' class='button remove_slider_upload_image_button' data-input='products_slider_data[{$index}][image]' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>"; }
        echo "<p><img src='{$image}' class='image-preview image-preview-{$index}' data-value='products_slider_data[{$index}][image]'  style='max-width: 100px;". (!empty($image) ? '' : ' display: none;') ."'/></p>";
        echo "<p><button type='button' class='button-secondary removeSlide'>Remove Slide</button></p>";
        echo "</div>";
    }
}