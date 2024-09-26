<?php

define('DEV.TREES_N_CLOUDS_VERSION', '1.0.1');

// Theme
require_once get_template_directory() . '/theme/theme-settings.php';
require_once get_template_directory() . '/theme/theme-styles.php';
require_once get_template_directory() . '/theme/theme-scripts.php';

//  _______                
// |__   __|               
//    | |_ __ ___  ___ ____
//    | | '__/ _ \/ _ \_  /
//    | | | |  __/  __// / 
//    |_|_|  \___|\___/___|                        

// _____       _     _ _      
// |  __ \     | |   | (_)     
// | |__) |   _| |__ | |_  ___ 
// |  ___/ | | | '_ \| | |/ __|
// | |   | |_| | |_) | | | (__ 
// |_|    \__,_|_.__/|_|_|\___|                            

// Pull All Public Classes
require_once get_template_directory() . '/public/template/nav-walker.php';
require_once get_template_directory() . '/public/template/account-profile.php';
require_once get_template_directory() . '/public/template/account-transactions.php';
require_once get_template_directory() . '/public/template/public-authentication-form.php';


$publicProfile = new AccountProfile();
$publicTransactions = new AccountTransaction();
$publicAuthenticationForm = new PublicAuthenticationForm();

// Pull All Admin Classes
// Admin
require_once get_template_directory() . '/component/component-admin.php';
require_once get_template_directory() . '/admin/business-admin.php';
require_once get_template_directory() . '/admin/verification-admin.php';
require_once get_template_directory() . '/admin/social-admin.php';
require_once get_template_directory() . '/admin/about-admin.php';
require_once get_template_directory() . '/admin/header-admin.php';
require_once get_template_directory() . '/admin/footer-admin.php';
require_once get_template_directory() . '/admin/authenticate-admin.php';
require_once get_template_directory() . '/admin/opengraph-admin.php';
require_once get_template_directory() . '/admin/brand-admin.php';
require_once get_template_directory() . '/admin/product-admin.php';
require_once get_template_directory() . '/admin/listing-admin.php';
require_once get_template_directory() . '/admin/event-admin.php';
require_once get_template_directory() . '/admin/feature-slider.php';
require_once get_template_directory() . '/admin/theme-admin.php';

$adminComponent = new AdminComponents('AIzaSyDvVpM5D9iQR6Q89DPhlUBVZGvlW75aBac');
$businessAdmin = new BusinessAdmin($adminComponent);
$verificationAdmin = new VerificationAdmin($adminComponent);
$socialAdmin = new SocialAdmin($adminComponent);
$aboutAdmin = new AboutAdmin($adminComponent);
$headerAdmin = new HeaderAdmin($adminComponent);
$featuresliderAdmin = new FeatureSlider($adminComponent);
$footerAdmin = new FooterAdmin($adminComponent);
$authenticateAdmin = new AuthenticateAdmin($adminComponent);
$opengraphAdmin = new OpenGraphAdmin($adminComponent);
$brandAdmin = new BrandAdmin($adminComponent);
$productAdmin = new ProductAdmin($adminComponent);
$listingAdmin = new ListingAdmin($adminComponent);
$eventAdmin = new EventAdmin($adminComponent);
$themeAdmin = new ThemeColorCustomizer($adminComponent);

function enqueue_authenticate_admin_styles() {
    // Enqueue CSS only on the authenticate section page
    $screen = get_current_screen();
    if ($screen->id === 'business-info_page_authenticate-section') {
        wp_enqueue_style('authenticate-admin-css', get_template_directory_uri() . '/path/to/your/css/file.css');
    }
}
add_action('admin_enqueue_scripts', 'enqueue_authenticate_admin_styles');
function enqueue_slick_carousel_assets() {
    wp_deregister_script('jquery');
    wp_register_script(
        'jquery','https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('jquery'); 
    wp_enqueue_style(
        'slick-carousel-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null);
    wp_enqueue_style(
        'slick-carousel-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array('slick-carousel-css'), null);
    wp_enqueue_script(
        'slick-carousel-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
          wp_enqueue_script('jquery-ui','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), null, true);
        wp_enqueue_style('jquery-ui-css','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_carousel_assets');

