<?php

/**
 * Template Name: TNC Front Page
 * Description: Custom front page template from TNC.
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

// FeatureSlider

$feature_slider_show_slider = FeatureSlider::get_feature_info_by_slug('slider_status');

$feature_slider_showslide = FeatureSlider::get_feature_info_by_slug('showslide');

$feature_slider_description = FeatureSlider::get_feature_info_by_slug('description');
  
$feature_slider_image = FeatureSlider::get_feature_info_by_slug('image');

$feature_slider_show_slider = FeatureSlider::get_feature_info_by_slug('slider_status');
$feature_slider_button_link = FeatureSlider::get_feature_info_by_slug('button_link');
$feature_slider_button_text = FeatureSlider::get_feature_info_by_slug('button_text');
$feature_slider_videoembededlink = FeatureSlider::get_feature_info_by_slug('videoembededlink');
$feature_slider_videodescription = FeatureSlider::get_feature_info_by_slug('videodescription');
$feature_slider_imagecaption = FeatureSlider::get_feature_info_by_slug('imagecaption');

$feature_slider_imagedescription = FeatureSlider::get_feature_info_by_slug('imagedescription');
$feature_slider_name = FeatureSlider::get_feature_info_by_slug('name');

// feture slider End
$card_data = array();
for ($i = 1; $i <= 3; $i++) {
    $card_data[$i] = HeaderAdmin::get_card_data($i);
}

?>
<div class="wrapper">
    <!-- Custom Content for the Front Page -->
   <?php if(empty($feature_slider_show_slider[0])){  ?>
    <div class="page-header page-header-large d-none d-md-block">
        <div class="page-header-image" data-parallax="true"
            style=" background-image: url('<?= $header_bg_image; ?>') ;  ">
        </div>
        <div class="page-header-image" data-parallax="true"></div>
        <div class="content-center">
           <?php 
            if ($header_logo_short=="1" ) {
                
             
           ?> <img style="height: 350px; widht: auto;" src="<?php
            if (!empty ($business_logo_short) ) {
                echo esc_html($business_logo_short);
            } ?>" />

            <?php 
             } 
            if ($header_logo_long=="1") {
               
           
           ?>
            <img style="margin: 15px 0px;" src="<?php
            if (!empty ($business_logo_long)) {
                echo esc_html($business_logo_long);
            } ?>" />
             <?php 
             } 
             ?>
            <ul class="nav nav-pills nav-pills-success justify-content-center" style="padding-bottom:25px;"
                role="tablist">
                <?php  if($address_active == true) {  ?>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tablist">
                        <?php $business_address = BusinessAdmin::get_business_info_by_slug('address');
                        if (!empty ($business_address)) {
                            echo esc_html($business_address);
                        } ?>
                    </a>
                </li>
                <?php  }?> 
                <?php  if($phone_active == true) {  ?>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="tel:+ <?php
                    if (!empty ($phone_number)) {
                        echo esc_html($phone_number);
                    } ?>" role="tablist">
                        <?php
                        if (!empty ($phone_number)) {
                            echo esc_html($phone_number);
                        } ?>
                    </a>
                </li>
                <?php  }?> 
            </ul>
            <div class="row">
            <?php foreach ($card_data as $card_number => $card) : ?>
                <div class="col-md-4">
                    <div class="card card-background card-raised" data-background-color="" style="background-image: url('<?php echo $card['bg_image']; ?>')">
                        <div class="info">
                            <div class="icon icon-white">
                                <?php if (!empty($card['icon_class'])) : ?>
                                    <i class="<?php echo $card['icon_class']; ?>"></i>
                                <?php endif; ?>
                            </div>
                            <div class="description">
                                <h4 class="info-title"><?php echo $card['title']; ?></h4>
                                <p><?php echo $card['text']; ?></p>
                                <a type="submit" class="btn btn-success btn-round ml-3" href="<?php echo $card['link']; ?>"><?php echo $card['btn_text']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php } else{ 
     ?>
     <div id="carouselExampleIndicators" class="carousel slide" style="margin-top: -78px;">
   <ol class="carousel-indicators">      <?php $numeri=0;
    foreach($feature_slider_showslide as $key => $value){
        
        if(!empty($feature_slider_showslide[$key])){
            
       
    ?>
    
        
            <li data-target="#carouselExampleIndicators" data-slide-to="$key" <?php if($numeri==0){ echo 'class="active"' ; } else{ echo 'class=""' ;} ?>></li>
       <?php  $numeri++; }   } ?>
        </ol>   <div class="carousel-inner" role="listbox">
     <?php $numeri=0;
    foreach($feature_slider_showslide as $key => $value){
        
        
         if(!empty($feature_slider_showslide[$key])){
    ?>
    
    
    
      
     
            <div class="carousel-item <?php if($numeri==0){ echo 'active' ; } ?>">
                <div class="page-header header-filter">
                    <div class="page-header-image section-image"
                        style="background-image: url('<?php if (!empty($feature_slider_image[$key])) { echo $feature_slider_image[$key]; } ?>');">
                    </div>
                    <div class="content-center">
                        <div class="container">
                            <div class="content-center">
                                <div class="row">
                                    <div class="col-md-10 ml-auto mr-auto text-center">
                                        <?php if (!empty($feature_slider_videoembededlink[$key])) { ?>
                                        
                                        <div class="iframe-container">
                                            <iframe height="350"
                                                src="<?php echo $feature_slider_videoembededlink[$key]; ?>"
                                                frameborder="0" allowfullscreen=""></iframe>
                                        </div>
                                        
                                        <?php } else {?>
                                        <img class="m-auto"
                                            style="" src="<?php
                                            if (!empty($business_logo_long)) {
                                                echo esc_attr($business_logo_long);
                                            } ?>" />
                                            <?php } ?>
                                        <h1 style="margin-top: 25px;" class="description"><?php echo $feature_slider_description[$key]; ?></h1>
                                        <h2 style="margin-top: 25px;" class="description"><?php echo $feature_slider_videodescription[$key] ; ?></h2>
                                        <h2 style="margin-top: 25px;" class="description"><?php echo $feature_slider_imagedescription[$key] ; ?></h2>
                                        <div class="buttons">
                                            <a href=" <?php echo $feature_slider_button_link[$key] ; ?>"
                                                class="btn btn-danger mt-2 btn-lg">
                                             <?php echo $feature_slider_button_text[$key] ; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        
    
    
    
    
    
    
    <?php $numeri++; }  } ?>
        </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="now-ui-icons arrows-1_minimal-right"></i>
        </a>
    </div>
    <?php
    }   ?>
    <div class="row d-block d-md-none" style="background-color: #2c2c2c;">
        <img class="m-auto" style="padding: 80px 25px 20px;" src="<?php
        if (!empty ($business_logo_long)) {
            echo esc_attr($business_logo_long); 
        } ?>" />
    </div>
    <main id="main">
    <?php
    // Start the loop.
    while (have_posts()):
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php
                // Display the content.
                the_content();

                // WP Link Pages is used for paginating page content if <!--nextpage--> is used.
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
                        'after' => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

            <?php
            // If comments are open or there is at least one comment, load the comment template.
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
            ?>

        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // End the loop.
    endwhile;
    ?>
    </main>
    <?php
    if($article_active == true) {
?>
    <div class="section section-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">
                        <?php
                        if (!empty ($article_title)) {
                            echo esc_html($article_title);
                        } ?>
                    </h2>
                    <h5 class="description">
                        <?php
                        if (!empty ($article_sub_title)) {
                            echo esc_html($article_sub_title);
                        } ?>
                    </h5>
                </div>
            </div>
            <div class="separator separator-success"></div>
            <div class="section-story-overview">
                <div class="row">
                    <div class="col-md-6">
                        <!-- First image on the left side -->
                        <div class="image-container image-left"
                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/min/cannabis-1-min.jpg')">
                            <p class="blockquote blockquote-success">
                                <?php
                                if (!empty ($article_quote)) {
                                    echo esc_html($article_quote);
                                } ?>
                                <br>
                            </p>
                        </div>
                        <!-- Second image on the left side of the article -->
                        <div class="image-container image-left-bottom"
                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/min/cannabis-2-min.jpg')">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- First image on the right side, above the article -->
                        <div class="image-container image-right"
                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/min/cannabis-3-min.jpg')">
                        </div>
                        <h3>
                            <?php
                            if (!empty ($article_heading)) {
                                echo esc_html($article_heading);
                            } ?>
                        </h3>
                        <p>
                            <?php
                            if (!empty ($article_heading)) {
                                echo esc_html($article_body);
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
}
             ?>
            <?php include get_theme_file_path('/public/template/brand-slider.php'); ?>
        </div>
    </div>
    <?php include get_theme_file_path('/public/template/product-slider.php'); ?>
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
    <div class="contactus-2">
        <div id="contactUs2Map" data-coordinates="<?php
        if (!empty ($latitude)) {
            echo esc_html($latitude);
        } ?>, <?php
         if (!empty ($longitude)) {
             echo esc_html($longitude);
         } ?>" class="map" style="overflow: hidden;">
            <div
                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                <div class="gm-err-container">
                    <div class="gm-err-content">
                        <div class="gm-err-icon"><img
                                src="https://maps.gstatic.com/mapfiles/api-3/public/theme/images/icon_error.png" alt=""
                                draggable="false" style="user-select: none;"></div>
                        <div class="gm-err-title">Oops! Something went wrong.</div>
                        <div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript
                            console for technical details.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-10">
            <div class="card card-contact card-raised" style="background-color: rgba(0,0,0,.85)">
                <form role="form" id="contact-form-map" method="post">
                    <div class="card-header text-center">
                        <h4 class="card-title text-white">Contact Us</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info info-horizontal">
                                    <div class="icon icon-success">
                                        <i class="now-ui-icons tech_mobile"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title text-white">
                                            <?php $business_phone = BusinessAdmin::get_business_info_by_slug('phone-number');
                                            if (!empty ($business_phone)) {
                                                echo esc_html($business_phone);
                                            } ?>
                                        </h5>
                                        <p class="text-white"> Retail Hours </br>
                                            <?php
                                            for ($i = 0; $i < 7; $i++) {
                                                $day_slug = strtolower(date('l', strtotime("Sunday +{$i} days"))) . '-hours';
                                                $hours = BusinessAdmin::get_business_info_by_slug($day_slug);
                                                if (!empty($hours)) {
                                                    echo ucfirst(date('l', strtotime("Sunday +{$i} days"))) . ': ' . $hours . '<br>';
                                                }
                                            }
                                           
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info info-horizontal">
                                    <div class="icon icon-success">
                                        <i class="now-ui-icons location_pin"></i>
                                    </div>
                                    <div class="description">
                                        <h5 class="info-title text-white">Visit Our Location:</h5>
                                        <p class="text-white">
                                            <?php $business_address = BusinessAdmin::get_business_info_by_slug('address');
                                            if (!empty ($business_address)) {
                                                echo esc_html($business_address);
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
</div>
<div class="social-line social-line-big-icons social-line-black" styles="maring-bottom: 75px;">
    <div class="container">
        <div class="row">
        <?php if (!empty ($twitter_url)) { ?>
            <div class="col-md-2">
                <a href="<?= esc_html($twitter_url); ?>" style="border: 0;" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
            <?php } ?>
            <?php if (!empty ($facebook_url)) { ?>
            <div class="col-md-2">
                <a href="<?=  esc_html($facebook_url);  ?>" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </div>
            <?php } ?>
            <?php if (!empty ($google_url)) { ?>
            <div class="col-md-2">
                <a href="<?= esc_html($google_url);   ?>" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-google-plus"></i>
                </a>
            </div>
            <?php }?>
            <?php if (!empty ($dribble_url)) {?>
            <div class="col-md-2">
                <a href="<?= esc_html($dribble_url);  ?>" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-dribbble"></i>
                </a>
            </div>
            <?php }?>

            <?php if (!empty ($youtube_url)) {  ?>
            <div class="col-md-2">
                <a href="<?= esc_html($youtube_url);   ?>" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
            <?php }?>
            <?php if (!empty ($instagram_url)) { ?>
            <div class="col-md-2">
                <a href="<?= esc_html($instagram_url);   ?>" style="border: 0;" class="btn btn-simple btn-icon btn-footer">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<script type="application/ld+json">
    
</script>