<?php
class FeatureSlider
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_feature_submenu'));
        add_action('admin_init', array($this, 'register_slider_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_brands_admin_scripts'));
    }

    public function add_feature_submenu()
    {
        add_submenu_page(
            'business-info',
            'Manage Feature Slider',
            'Feature Slider',
            'manage_options',
            'feature-slider',
            array($this, 'feature_slider_page_callback')
        );
    }

    public function register_slider_settings()
    {
        register_setting('feature-slider-group', 'feature_slider_data');
    }

    public function enqueue_brands_admin_scripts($hook_suffix)
    {
        if ('business-info_page_feature-slider' !== $hook_suffix) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_script('feature-slider-js', get_template_directory_uri() . '/public/theme/js/feature-slider-js.js', array('jquery'), null, true);
    }

    public function feature_slider_page_callback()
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        // Get existing slider data from the database and ensure it's an array
        $slider_data_raw = get_option('feature_slider_data', '');
        $slider_data = maybe_unserialize($slider_data_raw);
        if (!is_array($slider_data)) {
            $slider_data = [];
        }

        echo '<div class="wrap">';
        echo '<h1>Manage Feature Slider </h1>';
        echo '<form method="post" action="options.php" validate>';
        
        settings_fields('feature-slider-group');
        do_settings_sections('feature-slider-group');

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
        $showslide = isset($slide['showslide']) ? $slide['showslide'] : '';
        $checked = !empty($showslide) ? 'checked' : '';
        
        $showsliderr = isset($slide['slider_status']) ? $slide['slider_status'] : '';
        $checked_slider = !empty($showsliderr) ? 'checked' : '';
        $description = isset($slide['description']) ? $slide['description'] : '';
        $link = isset($slide['link']) ? $slide['link'] : '';
        $image = isset($slide['image']) ? $slide['image'] : '';
        $imagecaption = isset($slide['imagecaption']) ? $slide['imagecaption'] : '';
        $imagedescription = isset($slide['imagedescription']) ? $slide['imagedescription'] : '';
        $videoembededlink = isset($slide['videoembededlink']) ? $slide['videoembededlink'] : '';
        $videodescription = isset($slide['videodescription']) ? $slide['videodescription'] : '';
        $index = isset($index) ? $index : 0;
            
        echo "<div class='brand-slide' data-index='{$index}'>";
          if($index==0){  echo "<p
            ><input type='checkbox' id='slider_status' name='feature_slider_data[0][slider_status]' value='1' {$checked_slider}  / >Show All Slider</p>";
          }
        echo " <p><input type='checkbox' name='feature_slider_data[{$index}][showslide]' value='1' {$checked}>Show Slide</p><p><input type='text' name='feature_slider_data[{$index}][name]' value='{$name}' placeholder='Feature Name' required /></p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][description]' value='{$description}' placeholder='Feature Description' /></p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][button_text]' value='{$link}' placeholder='Button Text' /></p>";
        echo "<p><input type='url' name='feature_slider_data[{$index}][button_link]' value='{$link}' placeholder='Button Link' /></p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][link]' value='{$link}' placeholder='Feature Link' /></p>";
        echo "<p><input type='url' required class='image-url-field' name='feature_slider_data[{$index}][image]' value='{$image}' placeholder='Feature Image URL' /></p>";
        echo "<p><button type='button' class='button feature_slider_upload_image_button' data-input='feature_slider_data[{$index}][image]' data-preview-image='.image-preview-{$index}'>Upload Image</button></p>";
        if(!empty($image)){
            echo "<input type='button' class='button remove_slider_upload_image_button' data-input='feature_slider_data[{$index}][image]' value='Remove image' style='margin-bottom:10px; margin-left:10px;color:red'/>";
        }
        echo "<p><img src='{$image}' class='image-preview image-preview-{$index}' data-value='feature_slider_data[{$index}][image]' style='max-width: 100px;" . (!empty($image) ? '' : ' display: none;') . "'/></p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][imagecaption]' value='{$imagecaption}' placeholder='Image Caption' />(Optional)</p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][imagedescription]' value='{$imagedescription}' placeholder='Image Description' />(Optional)</p>";
        echo "<p><input type='url' name='feature_slider_data[{$index}][videoembededlink]' value='{$videoembededlink}' placeholder='Video embeded link'  /></p>";
        echo "<p><input type='text' name='feature_slider_data[{$index}][videodescription]' value='{$videodescription}' placeholder='Video Description' />(Optional)</p>";
        echo "<p><button type='button' class='button-secondary removeSlide'>Remove Slide</button></p>";
        echo "</div>";

    }

     public static function get_feature_info_by_slug($slug)
{
    $field_slugs = [
        'slider_status'=>'slider_status',
        'showslide' => 'showslide',
        'description' => 'description',
        'image' => 'image',
        'button_text' => 'button_text',
        'button_link' => 'button_link',
        'videoembededlink' => 'videoembededlink',
        'videodescription' => 'videodescription',
        'imagecaption' => 'imagecaption',
        'imagedescription' => 'imagedescription',
        'name' => 'name',
    ];

    $feature_slider_data = get_option('feature_slider_data');
    $field_value = isset($field_slugs[$slug]) ? $field_slugs[$slug] : null;

    $field_dynamic = array();
                    foreach ($feature_slider_data as $item) {
                        $field_dynamic[] = $item[$field_value];
                    }

       return isset($field_dynamic) ? $field_dynamic : null;

}
}