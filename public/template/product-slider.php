<?php
// Fetch the slider data from the WordPress options table
$slider_data_raw = get_option('products_slider_data', []);
$slider_data = maybe_unserialize($slider_data_raw);

if (!is_array($slider_data)) {
    $slider_data = [];
}

// Check if there is any slider data. If not, return early.
if (empty ($slider_data)) {
    return;
}

// Duplicate the slider data for a smooth looping effect
$slider_data = array_merge($slider_data, $slider_data);

// If Slider is not empty
if(!empty($slider_data)): 
?>




<div class="marquee-container d-none d-md-block">

    <div class="title text-center">
        <h3>Products</h3>
    </div>
    <div class="row flex-nowrap marquee">
        <?php foreach ($slider_data as $slide): ?>
            <div class="col-sm-12 col-md-3 ">
                <div class="card lgCard">
                    <div class="card-image">
                        <img src="<?php echo esc_url($slide['image']); ?>" class="slider_image img-fluid" />
                    </div>
                    <div class="info text-center">
                        <h4 class="info-title">
                            <?php echo esc_html($slide['name']); ?>
                        </h4>
                        <p class="description">
                            <?php echo esc_html($slide['description']); ?>
                        </p>
                        <div class="icon mt-3">
                            <a href="<?php echo esc_url($slide['link']); ?>" class="btn btn-success btn-lg">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<div id="mobile-slider" class="carousel slide d-block d-md-none" data-ride="carousel">

    <div class="carousel-inner">
        <?php foreach ($slider_data as $index => $slide): ?>
            <div class="carousel-item <?php if ($index === 0) echo 'active'; ?>">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo esc_url($slide['image']); ?>" class="img-fluid" alt="">
                            </div>
                            <div class="info text-center">
                                <h4 class="info-title">
                                    <?php echo esc_html($slide['name']); ?>
                                </h4>
                                <p class="description">
                                    <?php echo esc_html($slide['description']); ?>
                                </p>
                                <div class="icon mt-3">
                                    <a href="<?php echo esc_url($slide['link']); ?>" class="btn btn-success btn-sm">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#mobile-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mobile-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php endif; ?>
