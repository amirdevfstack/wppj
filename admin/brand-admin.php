<?php

class BrandAdmin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_brands_submenu'));
        add_action('admin_init', array($this, 'register_slider_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_brands_admin_scripts'));
    }

    public function add_brands_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Brands Slider',
            'Slider ',
            'manage_options',
            'brands-slider',
            array($this, 'brands_slider_page_callback')
        );
    }

    public function register_slider_settings()
    {
        register_setting('brands-slider-group', 'brands_slider_data');
    }

    public function enqueue_brands_admin_scripts($hook_suffix)
    {
        if ('business-info_page_brands-slider' !== $hook_suffix) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_script('my-brand-js', get_template_directory_uri() . '/public/theme/js/brand-slider-admin.js', array('jquery'), null, true);
    }

    public function brands_slider_page_callback()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // Get existing slider data from the database and ensure it's an array
        $slider_data_raw = get_option('brands_slider_data', '');
        $slider_data = maybe_unserialize($slider_data_raw);
        if (!is_array($slider_data)) {
            $slider_data = [];
        }

        echo '<div class="wrap">';
        echo '<h1>Manage Brand Sliders</h1>';
        echo '<form method="post" action="options.php">';
        
        settings_fields('brands-slider-group');
        do_settings_sections('brands-slider-group');

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

        echo "<div class='brand-slide' data-index='{$index}'>";
        echo "<p><input type='text' name='brands_slider_data[{$index}][name]' value='{$name}' placeholder='Brand Name' /></p>";
        echo "<p><input type='text' name='brands_slider_data[{$index}][description]' value='{$description}' placeholder='Brand Description' /></p>";
        echo "<p><input type='text' name='brands_slider_data[{$index}][link]' value='{$link}' placeholder='Brand Link' /></p>";
        echo "<p><input type='text' class='image-url-field' name='brands_slider_data[{$index}][image]' value='{$image}' placeholder='Brand Image URL' /></p>";
        echo "<p><button type='button' class='button upload_image_button' data-input='brands_slider_data[{$index}][image]' data-preview-image='.image-preview-{$index}'>Upload Image</button></p>";
		if(!empty($image)){ echo "<input type='button' class='button remove_slider_upload_image_button' data-input='brands_slider_data[{$index}][image]' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>";}
        echo "<p><img src='{$image}' class='image-preview image-preview-{$index}' data-value='brands_slider_data[{$index}][image]' style='max-width: 100px;". (!empty($image) ? '' : ' display: none;') ."'/></p>";
        echo "<p><button type='button' class='button-secondary removeSlide'>Remove Slide</button></p>";
        echo "</div>";
    }
}