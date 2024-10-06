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
require_once get_template_directory() . '/component/component-admin.php';
require_once get_template_directory() . '/admin/business-admin.php';
require_once get_template_directory() . '/admin/authenticate-admin.php';
require_once get_template_directory() . '/admin/event-admin.php';
require_once get_template_directory() . '/admin/theme-admin.php';
// Include the HomePage Customization Class
require_once get_template_directory() . '/admin/homepage-customization-admin.php';
require_once get_template_directory() . '/admin/feature-admin.php';
require_once get_template_directory() . '/admin/center-hero-admin.php';
require_once get_template_directory() . '/admin/download-app-admin.php';
require_once get_template_directory() . '/admin/footer-admin.php';

$adminComponent = new AdminComponents('AIzaSyDvVpM5D9iQR6Q89DPhlUBVZGvlW75aBac');
$businessAdmin = new BusinessAdmin($adminComponent);

$authenticateAdmin = new AuthenticateAdmin($adminComponent);
$eventAdmin = new EventAdmin($adminComponent);
$themeAdmin = new ThemeColorCustomizer($adminComponent);
// Instantiate the HomePage Customization 
$homePageAdmin = new HomePageCustomizationAdmin();
$featureSectionAdmin = new FeatureSectionAdmin();
$centerHeroAdmin = new CenterHeroSectionAdmin();
$downloadappSectionAdmin = new DownloadAppSectionAdmin();
$footerAdmin = new FooterCustomizationAdmin();



