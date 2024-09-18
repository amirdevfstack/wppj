<?php

/**
 * Template Name: TNC Landing Page
 * Description: Custom Landing page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');
$header_data = HeaderAdmin::get_header_data();
$header_bg_image = isset($header_data['header_bg_image']) ? $header_data['header_bg_image'] : '';
$footer_data = FooterAdmin::get_footer_data();
$footer_bg_image_url = isset($footer_data['footer_bg_image']) ? esc_url($footer_data['footer_bg_image']) : '';
$business_logo_long = BusinessAdmin::get_business_info_by_slug('business-logo-long');
$business_logo_short = BusinessAdmin::get_business_info_by_slug('business-logo-short');
$header_logo_long = isset($header_data['header_image_show_long']) ? $header_data['header_image_show_long'] : '';
$header_logo_short = isset($header_data['header_image_show_short']) ? $header_data['header_image_show_short'] : '';
$business_name = BusinessAdmin::get_business_info_by_slug('business-name');
$business_logo_long = BusinessAdmin::get_business_info_by_slug('business-logo-long');
$business_logo_short = BusinessAdmin::get_business_info_by_slug('business-logo-short');
$address = BusinessAdmin::get_business_info_by_slug('address');
$street = BusinessAdmin::get_business_info_by_slug('street');
$street2 = BusinessAdmin::get_business_info_by_slug('street2');
$city = BusinessAdmin::get_business_info_by_slug('city');
$state = BusinessAdmin::get_business_info_by_slug('state');
$postal_code = BusinessAdmin::get_business_info_by_slug('postal-code');
$country = BusinessAdmin::get_business_info_by_slug('country');
$latitude = BusinessAdmin::get_business_info_by_slug('latitude');
$longitude = BusinessAdmin::get_business_info_by_slug('longitude');
$phone_number = BusinessAdmin::get_business_info_by_slug('phone-number');
$email = BusinessAdmin::get_business_info_by_slug('email');
$license_number = BusinessAdmin::get_business_info_by_slug('license-number');
$facebook_url = SocialAdmin::get_social_info_by_slug('facebook-url');
$instagram_url = SocialAdmin::get_social_info_by_slug('instagram-url');
$twitter_url = SocialAdmin::get_social_info_by_slug('twitter-url');
$tiktok_url = SocialAdmin::get_social_info_by_slug('tiktok-url');
$yelp_url = SocialAdmin::get_social_info_by_slug('yelp-url');
$google_url = SocialAdmin::get_social_info_by_slug('google-url');
$article_active = AboutAdmin::get_business_about_by_slug('article-active');
$article_title = AboutAdmin::get_business_about_by_slug('article-title');
$article_sub_title = AboutAdmin::get_business_about_by_slug('article-sub-title');
$article_quote = AboutAdmin::get_business_about_by_slug('article-quote');
$article_heading = AboutAdmin::get_business_about_by_slug('article-heading');
$article_body = AboutAdmin::get_business_about_by_slug('article-body');
$footer_title = AboutAdmin::get_business_about_by_slug('footer-title');
$footer_body = AboutAdmin::get_business_about_by_slug('footer-body');
$address_active = BusinessAdmin::get_business_info_by_slug('address-active');
$phone_active = BusinessAdmin::get_business_info_by_slug('phone-active');

$card_data = array();
for ($i = 1; $i <= 3; $i++) {
    $card_data[$i] = HeaderAdmin::get_card_data($i);
}

?>
<div class="wrapper">
    <!-- Custom Content for the Front Page -->
    <div class="page-header page-header-large d-none d-md-block">
        <div class="page-header-image" data-parallax="true"
            style=" background-image: url('<?= $header_bg_image; ?>') ;  ">
        </div>
        <div class="page-header-image" data-parallax="true"></div>
        <div class="content-center">
            <?php
            if ($header_logo_short == "1") {


                ?> <img style="height: 350px; widht: auto;" src="<?php
                 if (!empty($business_logo_short)) {
                     echo esc_html($business_logo_short);
                 } ?>" />

                <?php
            }
            if ($header_logo_long == "1") {


                ?>
                <img style="margin: 15px 0px;" src="<?php
                if (!empty($business_logo_long)) {
                    echo esc_html($business_logo_long);
                } ?>" />
                <?php
            }
            ?>
            <ul class="nav nav-pills nav-pills-success justify-content-center" style="padding-bottom:25px;"
                role="tablist">
                <?php if ($address_active == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tablist">
                            <?php $business_address = BusinessAdmin::get_business_info_by_slug('address');
                            if (!empty($business_address)) {
                                echo esc_html($business_address);
                            } ?>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($phone_active == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="tel:+ <?php
                        if (!empty($phone_number)) {
                            echo esc_html($phone_number);
                        } ?>" role="tablist">
                            <?php
                            if (!empty($phone_number)) {
                                echo esc_html($phone_number);
                            } ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <div class="row">
                <?php foreach ($card_data as $card_number => $card): ?>
                    <div class="col-md-4">
                        <div class="card card-background card-raised" data-background-color=""
                            style="background-image: url('<?php echo $card['bg_image']; ?>')">
                            <div class="info">
                                <div class="icon icon-white">
                                    <?php if (!empty($card['icon_class'])): ?>
                                        <i class="<?php echo $card['icon_class']; ?>"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="description">
                                    <h4 class="info-title"><?php echo $card['title']; ?></h4>
                                    <p><?php echo $card['text']; ?></p>
                                    <a type="submit" class="btn btn-success btn-round ml-3"
                                        href="<?php echo $card['link']; ?>"><?php echo $card['btn_text']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row d-block d-md-none" style="background-color: #2c2c2c;">
        <img class="m-auto" style="padding: 80px 25px 20px;" src="<?php
        if (!empty($business_logo_long)) {
            echo esc_attr($business_logo_long);
        } ?>" />
    </div>
    <div class="section">
        <?php
        // Start the loop.
        while (have_posts()):
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h3 class="title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Display the content.
                    the_content();
                    ?>
                </div><!-- .entry-content -->

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // End the loop.
        endwhile;
        ?>
    </div>
    <div class="testimonials-1 section-image"
        style="background-image: url('<?= $footer_bg_image_url; ?>')">
        <div class="features-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">
                            <?php
                            if (!empty ($footer_title)) {
                                echo esc_html($footer_title);
                            } ?>
                        </h2>
                        <h4 class="description">
                            <?php
                            if (!empty ($footer_body)) {
                                echo esc_html($footer_body);
                            } ?>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        $card_data = FooterAdmin::get_card_data($i);
                        $image_url = isset($card_data['bg_image']) ? $card_data['bg_image'] : '';
                        $icon_class = isset($card_data['icon_class']) ? $card_data['icon_class'] : '';
                        $title = isset($card_data['title']) ? $card_data['title'] : '';
                        $footer_text = isset($card_data['text']) ? $card_data['text'] : '';
                        $link = isset($card_data['link']) ? $card_data['link'] : '';
                        $button_text = isset($card_data['btn_text']) ? $card_data['btn_text'] : '';
                        ?>
                        <div class="col-md-4">
                            <div class="card card-background card-raised" data-background-color=""
                                style="background-image: url('<?php echo esc_url($image_url); ?>')">
                                <div class="info">
                                    <div class="icon icon-white">
                                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title text-white"><?php echo esc_html($title); ?></h4>
                                        <p class="text-white"><?php echo $footer_text; ?></p>
                                        <a  class="btn btn-success btn-round ml-3" href="<?php echo $link; ?>"><?php echo esc_html($button_text); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<script type="application/ld+json">

</script>