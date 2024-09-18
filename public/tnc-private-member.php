<?php
/*
Template Name: TNC Private Member Page
*/

include get_theme_file_path('/public/tnc-header.php'); 



if (!is_user_logged_in()) {
    require_once(get_template_directory() . "/public/template/public-register.php");
} else {
    $publicProfile->renderProfile();
    $publicTransactions->renderTable();
}

include get_theme_file_path('/public/tnc-footer.php'); 
