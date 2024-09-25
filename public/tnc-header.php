<?php
    $operating_hours = BusinessAdmin::get_business_info_by_slug('operating-hours');
    $business_name = BusinessAdmin::get_business_info_by_slug('business-name');
    $address = BusinessAdmin::get_business_info_by_slug('address');
    $street = BusinessAdmin::get_business_info_by_slug('street');
    $street2 = BusinessAdmin::get_business_info_by_slug('street2');
    $city = BusinessAdmin::get_business_info_by_slug('city');
    $state = BusinessAdmin::get_business_info_by_slug('state');
    $postal_code = BusinessAdmin::get_business_info_by_slug('postal-code');
    $country = BusinessAdmin::get_business_info_by_slug('country');
    $phone_number = BusinessAdmin::get_business_info_by_slug('phone-number');
    $email = BusinessAdmin::get_business_info_by_slug('email');
    $og_title = OpenGraphAdmin::get_opengraph_info_by_slug('og-title');
    $og_type = OpenGraphAdmin::get_opengraph_info_by_slug('og-type');
    $og_image = OpenGraphAdmin::get_opengraph_info_by_slug('og-image');
    $og_url = OpenGraphAdmin::get_opengraph_info_by_slug('og-url');
    $og_description = OpenGraphAdmin::get_opengraph_info_by_slug('og-description');
    $og_site_name = OpenGraphAdmin::get_opengraph_info_by_slug('og-site-name');
    $og_locale = OpenGraphAdmin::get_opengraph_info_by_slug('og-locale');
?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
        <?php if(!empty($og_title) ){?>
        <meta property="og:title" content="<?= $og_title ; ?>">
        <?php } ?>
        <?php if(!empty($og_type) ){?>
        <meta property="og:type" content="<?= $og_type ; ?>">
        <?php } ?>
        <?php if(!empty($og_image) ){?>
        <meta property="og:image" content="<?= $og_image ; ?>">
        <?php } ?>
        <?php if(!empty($og_url)) {?>
        <meta property="og:url" content="<?= $og_url ; ?>">
        <?php } ?>
        <?php if(!empty($og_description) ){?>
        <meta property="og:description" content="<?= $og_description ; ?>">
        <?php } ?>
        <?php if(!empty($og_site_name) ){?>
        <meta property="og:site_name" content="<?= $og_site_name ; ?>">
        <?php } ?>
        <?php if(!empty($og_locale)){?>
        <meta property="og:locale" content="<?= $og_locale ; ?>">
        <?php } ?>
        <?php if(!empty($address)){?>
        <meta property="business:contact_data:street_address" content="<?= $address ; ?>">
        <?php } ?>
        <?php if(!empty($city)){?>
        <meta property="business:contact_data:locality" content="<?= $city ; ?>">
        <?php } ?>
        <?php if(!empty($state)){?>
        <meta property="business:contact_data:region" content="<?= $state ; ?>">
        <?php } ?>
        <?php if(!empty($postal_code)){?>
        <meta property="business:contact_data:postal_code" content="<?= $postal_code ; ?>">
        <?php } ?>
        <?php if(!empty($country)){?>
        <meta property="business:contact_data:country_name" content="<?= $country ; ?>">
        <?php } ?>
        <?php if(!empty($email)){?>
        <meta property="business:contact_data:email" content="<?= $email ; ?>">
        <?php } ?>
        <?php if(!empty($address)){?>
        <meta property="business:contact_data:phone_number" content="<?= $phone_number ; ?>">
        <?php } ?>
        <?php if(!empty($og_url)){?>
        <meta property="business:contact_data:website" content="<?= $og_url ; ?>">
        <?php } ?>
       
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
        <div class="dropdown button-dropdown">
<a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
<span class="button-bar"></span>
<span class="button-bar"></span>
<span class="button-bar"></span>
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-header">Dropdown header</a>
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Separated link</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">One more separated link</a>
</div>
</div>
    </nav>

    