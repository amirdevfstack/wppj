<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
       
    <meta property="og:title" content="Your OG Title Here">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://yourdomain.com/path/to/image.jpg">
    <meta property="og:url" content="https://yourdomain.com">
    <meta property="og:description" content="Your website description here.">
    <meta property="og:site_name" content="Your Site Name">
    <meta property="og:locale" content="en_US"> 
    <meta property="business:contact_data:street_address" content="123 Main St">
    <meta property="business:contact_data:locality" content="Your City">
    <meta property="business:contact_data:region" content="Your State">
    <meta property="business:contact_data:postal_code" content="12345">
    <meta property="business:contact_data:country_name" content="Your Country">
    <meta property="business:contact_data:email" content="email@domain.com">
    <meta property="business:contact_data:phone_number" content="+1234567890">
    <meta property="business:contact_data:website" content="https://yourdomain.com">
       
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri(); ?>/public/theme/public/theme/images/apple-icon.png">
    <link rel="icon" type="image/png"
        href="<?php echo get_template_directory_uri(); ?>/public/theme/public/theme/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php wp_head(); ?>
    <link href="<?php echo get_template_directory_uri(); ?>/public/theme/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/public/theme/css/demo.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/public/theme/css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    
   
</head>

<body <?php body_class('landing-page'); ?>>
 
    <nav class="navbar navbar-expand-lg mainHeader bg-dark fixed-top padding-common">
   
            <div class="container px-0"> 
                <div class="navbar-translate">
                <h4 class="m-0 heading d-lg-none text-primary">AMPLIFY 528</h4>
                <a class="navbar-brand" href="<?php echo home_url('/'); ?>" rel="tooltip" title=""
                    data-placement="bottom" data-original-title="<?php $business_name = BusinessAdmin::get_business_info_by_slug('business-name');
                    if (!empty ($business_name)) {
                        echo esc_html($business_name);
                    } ?>">
                    <?php $business_name = BusinessAdmin::get_business_info_by_slug('business-name');
                    if (!empty ($business_name)) {
                        echo esc_html($business_name);
                    } ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav ml-auto',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new Custom_Nav_Walker()
                    )
                );
                ?>
                        <div class="container pt-lg-0 pt-md-3 pt-sm-3 pt-3 px-2">
                            <div class="row">
                                <div class="col-lg-6 d-flex justify-content-start  align-items-center pl-0">
                                    <h4 class="px-3 m-0 heading text-primary" >AMPLIFY 528</h4>
                                </div>
                    
                                <div class="col-lg-6">
                                    <ul class="nav d-flex flex-lg-row flex-md-column flex-sm-column flex-column justify-content-end align-items-lg-center align-items-md-start align-items-sm-start align-items-start">
                                        <li class="nav-item">
                                            <a class="nav-link px-lg-2 px-md-0 px-sm-0 px-0" href="#">LOGIN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn py-1 text-white startBtn bg-primary" href="#">START NOW</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

            </div>
        </div>
      
    </nav>

    