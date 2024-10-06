<?php
$banner_options = get_option('banner_section_options');
$banner_image = isset($banner_options['banner_image']) ? esc_url($banner_options['banner_image']) : '';
$banner_title = isset($banner_options['banner_title']) ? esc_html($banner_options['banner_title']) : 'Love is Contagious';
$banner_subtitle = isset($banner_options['banner_subtitle']) ? esc_html($banner_options['banner_subtitle']) : 'Love is Infectious';
$banner_button_text = isset($banner_options['banner_button_text']) ? esc_html($banner_options['banner_button_text']) : 'Start Now';
$banner_button_url = isset($banner_options['banner_button_url']) ? esc_url($banner_options['banner_button_url']) : '#';
$banner_video = isset($banner_options['banner_video']) ? esc_url($banner_options['banner_video']) : '';
?>
<section class="firstHomeContainer padding-common" style="background-image:url('<?php echo $banner_image; ?>'); background-repeat:no-repeat; background-size: cover; background-position:center center;">
      <div class="container">
        <div class="row pb-4">
            <div class="col-md-6 px-0 d-flex flex-column justify-content-end align-items-lg-start align-items-md-start align-items-sm-center align-items-center">
                <h1 class="m-0 font-weight-bold text-white text-lg-left text-md-left text-sm-start text-center"><?php echo $banner_title; ?></h1>
                <h4 class="font-weight-bold my-0 text-white"><?php echo $banner_subtitle; ?></h4>
                <div class="mt-4">
                    <a href="<?php echo $banner_button_url; ?>" class="btn btn-primary btn-lg btn-round"><?php echo $banner_button_text; ?></a>
                </div>
            </div>
            <div class="col-md-6 px-0 d-flex flex-column align-items-end">
                <div class="mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                    <div class="font-weight-bold text-secondary mb-2">Next Event</div>
                    <video class="videoPlay" src="<?php echo $banner_video; ?>" controls muted></video>
                </div>
            </div>
        </div>
    </div>
   </section>