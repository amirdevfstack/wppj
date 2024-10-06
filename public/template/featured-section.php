<?php
$feature_options = get_option('feature_section_options');
$feature_title = isset($feature_options['feature_title']) ? esc_html($feature_options['feature_title']) : 'Feature Section';
$feature_content = isset($feature_options['feature_content']) ? esc_html($feature_options['feature_content']) : '';
$feature_image = isset($feature_options['feature_image']) ? esc_url($feature_options['feature_image']) : '';
$feature_logo = isset($feature_options['feature_logo']) ? esc_url($feature_options['feature_logo']) : '';
$feature_button_text = isset($feature_options['feature_button_text']) ? esc_html($feature_options['feature_button_text']) : 'Start Now';
$feature_button_url = isset($feature_options['feature_button_url']) ? esc_url($feature_options['feature_button_url']) : '#';
$feature_love_contagious = isset($feature_options['feature_love_contagious']) ? esc_html($feature_options['feature_love_contagious']) : 'Love is Contagious';
$feature_love_infectious = isset($feature_options['feature_love_infectious']) ? esc_html($feature_options['feature_love_infectious']) : 'Love is Infectious';
?>
<section class="featuredSection padding-common marginTop">
    <div class="container p-0">
        <div class="row">
            <div class="col-md-6 order-lg-1 order-md-1 order-sm-2 order-2 mt-lg-0 mt-md-3 mt-sm-3 mt-3">
                <h2 class="text-secondary font-weight-bold mb-2"><?php echo $feature_title; ?></h2>
                <p class="lead"><?php echo $feature_content; ?></p>
                <div class="mt-md-5">
                <h3 class="m-0"><?php echo $feature_love_contagious; ?></h3>
                <h3 class="font-weight-bold my-0"><?php echo $feature_love_infectious; ?></h3>
                    <div class="mt-md-4">
                        <a href="<?php echo $feature_button_url; ?>" class="btn btn-primary btn-lg btn-round"><?php echo $feature_button_text; ?></a>
                    </div>
                </div>
                <?php if (!empty($feature_logo)) : ?>
                    <div class="mt-4">
                        <img src="<?php echo $feature_logo; ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 order-lg-2 order-md-2 order-sm-1 order-1">
                <div class="featuredImage">
                    <?php if (!empty($feature_image)) : ?>
                        <img src="<?php echo $feature_image; ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>