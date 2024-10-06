<?php
$download_app_options = get_option('download_app_section_options');
$app_title = isset($download_app_options['app_title']) ? esc_html($download_app_options['app_title']) : 'Download the App...';
$app_description = isset($download_app_options['app_description']) ? esc_html($download_app_options['app_description']) : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...';
$app_button_text = isset($download_app_options['app_button_text']) ? esc_html($download_app_options['app_button_text']) : 'Start Now';
$app_button_url = isset($download_app_options['app_button_url']) ? esc_url($download_app_options['app_button_url']) : '#';
$app_image = isset($download_app_options['app_image']) ? esc_url($download_app_options['app_image']) : '';
?>

<section class="downloadAppSection py-5 mt-4 padding-common bg-light">
    <div class="container p-0">
        <div class="row p-0">
            <div class="col-md-6 offset-md-1 d-flex align-items-center order-lg-1 order-md-1 order-sm-2 order-2">
                <div class="">
                    <h2 class="mt-0 mb-2 font-weight-bold text-lg-left text-ms-left text-sm-center text-center"><?php echo $app_title; ?></h2>
                    <p class="text-lg-left text-ms-left text-sm-center text-center"><?php echo $app_description; ?></p>
                    <div class="mt-md-4 text-lg-left text-ms-left text-sm-center text-center">
                        <a href="<?php echo $app_button_url; ?>" class="btn btn-primary btn-lg btn-round"><?php echo $app_button_text; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4 order-lg-2 order-md-2 order-sm-1 order-1">
                <?php if (!empty($app_image)) : ?>
                    <img style="width:70%; border-radius:50px;" class="" src="<?php echo $app_image; ?>" alt="App Image">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>