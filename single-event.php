<?php

include get_theme_file_path('/public/tnc-header.php');
while (have_posts()):
    the_post();

    // Here, you can start adding your custom fields and content for the event.
    $start_date = get_post_meta(get_the_ID(), 'start_date', true);
    $end_date = get_post_meta(get_the_ID(), 'end_date', true);
    $location_name = get_post_meta(get_the_ID(), 'location_name', true);
    $location_address = get_post_meta(get_the_ID(), 'location_address', true);
    $latitude = get_post_meta(get_the_ID(), 'latitude', true);
    $longitude = get_post_meta(get_the_ID(), 'longitude', true);
    $organizer_phone = get_post_meta(get_the_ID(), 'organizer_phone', true);
    $organizer_email = get_post_meta(get_the_ID(), 'organizer_email', true);
    $organizer = get_post_meta(get_the_ID(), 'organizer_name', true);
    $business_logo_short = BusinessAdmin::get_business_info_by_slug('business-logo-short');
    $organizer_url = get_post_meta(get_the_ID(), 'organizer_url', true);
    $cover_image_url = get_post_meta(get_the_ID(), 'cover_image_url', true);
    $event_url = get_post_meta(get_the_ID(), 'event_url', true);
    $category = get_post_meta(get_the_ID(), 'category', true);
    $ticket_url = get_post_meta(get_the_ID(), 'ticket_url', true);
    $status = get_post_meta(get_the_ID(), 'status', true);
    $price = get_post_meta(get_the_ID(), 'price', true);
    $currency = get_post_meta(get_the_ID(), 'currency', true);
    $eventAttendanceMode = get_post_meta(get_the_ID(), 'event_attendance_mode', true);
    $performer_name = get_post_meta(get_the_ID(), 'performer_name', true);
    $performer_type = get_post_meta(get_the_ID(), 'performer_type', true);


    // Retrieve social link URLs from post meta
    $social_links = array(
        'facebook' => get_post_meta(get_the_ID(), 'facebook', true),
        'instagram' => get_post_meta(get_the_ID(), 'instagram', true),
        'google' => get_post_meta(get_the_ID(), 'google', true),
        'tiktok' => get_post_meta(get_the_ID(), 'tiktok', true),
        'twitter' => get_post_meta(get_the_ID(), 'twitter', true),
        'linkedin' => get_post_meta(get_the_ID(), 'linkedin', true),
    );

    // Mapping platforms to their FontAwesome icons
    $platform_icons = array(
        'facebook' => 'fa fa-facebook-f',
        'instagram' => 'fa fa-instagram',
        'google' => 'fa fa-google',
        'tiktok' => 'fa fa-music',
        'twitter' => 'fa fa-twitter',
        'linkedin' => 'fa fa-linkedin',
    );

    // Add other event details here.

    ?>
    <article class="wrapper" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="page-header page-header-large" filter-color="orange">
            <div class="page-header-image" data-parallax="true"
                style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>); transform: translate3d(0px, 0px, 0px);">
            </div>
            <div class="content-center" style="padding-top: 75px;">
                <div class="photo-container">
                    <img style="height: 150px; width: auto;" src="<?php
                    if (!empty($business_logo_short)) {
                        echo esc_html($business_logo_short);
                    } ?>" alt="">
                </div>
                <h3 class="title">
                    <?php echo $location_name; ?>
                </h3>
                <h5 class="sub-title">
                    <?php echo $location_address; ?>
                </h5>
                <div class="content">
                    <div class="social-description">
                        <h2>
                            <?php echo date('F j, Y, g:i a', strtotime($start_date)); ?>
                        </h2>
                        <p style="font-weight: bold;">Start</p>
                    </div>
                    <div class="social-description">
                        <h2>
                            <?php echo date('F j, Y, g:i a', strtotime($end_date)); ?>
                        </h2>
                        <p style="font-weight: bold;">End</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container">
                    <?php

                    foreach ($social_links as $platform => $url) {
                        if (!empty($url)) {
                            $icon = isset($platform_icons[$platform]) ? $platform_icons[$platform] : 'fa fa-link';
                            echo '<a href="' . esc_url($url) . '" class="btn btn-default btn-round btn-lg btn-icon btn-primary" rel="tooltip" title="Follow us on ' . ucfirst($platform) . '"><i class="' . esc_attr($icon) . '"></i></a> ';
                        }
                    }

                    ?>
                </div>
                <?php the_title('<h3 class="title">', '</h3>'); ?>
                <p class="description text-center">
                    <?php the_content(); ?>
                </p>
                <hr />
                <div class="event-details">
                    <?php
                    if (!empty($location_name) || !empty($location_address)) {
                        echo '<p><strong class="text-primary">Location:</strong> ' . esc_html($location_name);
                        if (!empty($location_address)) {
                            echo ' - ' . esc_html($location_address);
                        }
                        echo '</p>';
                    }
                    if (!empty($organizer)) {
                        echo '<p><strong class="text-primary">Organizer:</strong> ' . esc_html($organizer) . '</p>';
                    }
                    if (!empty($start_date)) {
                        echo '<p><strong class="text-primary">Start Date:</strong> ' . date('F j, Y, g:i a', strtotime($start_date)) . '</p>';
                    }
                    if (!empty($end_date)) {
                        echo '<p><strong class="text-primary">End Date:</strong> ' . date('F j, Y, g:i a', strtotime($end_date)) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--     *********    CONTACT US 2     *********      -->
        <div class="contactus-2">
            <div id="contactUs2Map" data-coordinates="<?php
            if (!empty($latitude)) {
                echo esc_html($latitude);
            } ?>, <?php
             if (!empty($longitude)) {
                 echo esc_html($longitude);
             } ?>" class="map" style="overflow: hidden;">
                <div
                    style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                    <div class="gm-err-container">
                        <div class="gm-err-content">
                            <div class="gm-err-icon"><img
                                    src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt=""
                                    draggable="false" style="user-select: none;"></div>
                            <div class="gm-err-title">Oops! Something went wrong.</div>
                            <div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript
                                console for technical details.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="card card-contact card-raised">
                    <form role="form" id="contact-form" method="post">
                        <div class="card-header text-center">
                            <h4 class="card-title">Contact Us</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="now-ui-icons tech_mobile"></i>
                                        </div>
                                        <div class="description">
                                            <h5 class="info-title">Hit us up!</h5>
                                            <p>
                                                <?php if ($location_name) {
                                                    echo $location_name;
                                                } ?>
                                                <?php if ($organizer_phone != '') {
                                                    echo ' <br> Phone: ' . $organizer_phone . '';
                                                } ?>
                                                <?php if ($organizer_email != '') {
                                                    echo ' <br> Email: ' . $organizer_email . '';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="now-ui-icons location_pin"></i>
                                        </div>
                                        <div class="description">
                                            <h5 class="info-title">Find us at the office</h5>
                                            <p>
                                                <?php if ($location_address != '') {
                                                    echo $location_address;
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $json_ld = json_encode(
            array(
                "@context" => "http://schema.org",
                "@type" => "Event",
                "name" => get_the_title(),
                "startDate" => date('c', strtotime($start_date)),
                "endDate" => date('c', strtotime($end_date)),
                "location" => array(
                    "@type" => "Place",
                    "name" => $location_name,
                    "address" => $location_address
                ),
                "organizer" => array(
                    "@type" => "Organization",
                    "name" => $organizer,
                    "url" => $organizer_url
                ),
                "image" => $cover_image_url, // Adjusted to use cover_image_url
                "description" => wp_strip_all_tags(get_the_excerpt()),
                "url" => $event_url, // Adjusted to use event_url instead of get_permalink()
                "eventAttendanceMode" => "http://schema.org/" . $eventAttendanceMode,
                "eventStatus" => "http://schema.org/" . $status,
                "offers" => array(
                    "@type" => "Offer",
                    "url" => $ticket_url,
                    "price" => $price,
                    "priceCurrency" => $currency,
                    "availability" => "http://schema.org/InStock" // Consider adjusting this based on actual availability
                ),
                "performer" => array(
                    "@type" => $performer_type,
                    "name" => $performer_name
                )
            ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        echo "<script type='application/ld+json'>" . $json_ld . "</script>";
        ?>


        <?php
        // If comments are open or there is at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()):
            comments_template();
        endif;

endwhile; // End of the loop.
?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
include get_theme_file_path('/public/tnc-footer.php');
?>