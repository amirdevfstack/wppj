<?php
$hero_options = get_option('center_hero_section_options');
$hero_bg_image = isset($hero_options['hero_bg_image']) ? esc_url($hero_options['hero_bg_image']) : '';
$hero_title = isset($hero_options['hero_title']) ? esc_html($hero_options['hero_title']) : 'Your Title Here';
$hero_description = isset($hero_options['hero_description']) ? esc_html($hero_options['hero_description']) : 'Your Description Here';
$hero_twitter = isset($hero_options['hero_twitter']) ? esc_url($hero_options['hero_twitter']) : '';
$hero_facebook = isset($hero_options['hero_facebook']) ? esc_url($hero_options['hero_facebook']) : '';
$hero_instagram = isset($hero_options['hero_instagram']) ? esc_url($hero_options['hero_instagram']) : '';
$hero_googleplus = isset($hero_options['hero_googleplus']) ? esc_url($hero_options['hero_googleplus']) : '';
$hero_connect_text = isset($hero_options['hero_connect_text']) ? esc_html($hero_options['hero_connect_text']) : 'Connect with us on:';
?>
<div class="header-3">
    <div id="carouselExampleIndicators" class="my-5">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="page-header header-filter">
                    <div class="page-header-image" style="background-image: url('<?php echo $hero_bg_image; ?>');"></div>
                    <div class="container">
                        <div class="content-center">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto text-center">
                                    <h1 class="title"><?php echo $hero_title; ?></h1>
                                    <h4 class="description"><?php echo $hero_description; ?></h4>
                                    <br>
                                    <h5><?php echo $hero_connect_text; ?></h5>
                                    <div class="buttons d-flex justify-content-center">
                                        <?php if (!empty($hero_twitter)) : ?>
                                            <a href="<?php echo $hero_twitter; ?>" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($hero_facebook)) : ?>
                                            <a href="<?php echo $hero_facebook; ?>" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($hero_googleplus)) : ?>
                                            <a href="<?php echo $hero_googleplus; ?>" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                                <i class="fab fa-google-plus"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($hero_instagram)) : ?>
                                            <a href="<?php echo $hero_instagram; ?>" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>