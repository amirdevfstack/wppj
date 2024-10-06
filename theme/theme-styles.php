<?php

function trees_n_clouds_enqueue_styles() {
    // Enqueue Google Fonts: Montserrat and Open Sans
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700,200', array(), null);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/public/theme/css/bootstrap.min.css', array(), '4.1.3');

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css', array(), null);

    // Enqueue Theme Custom Css
    wp_enqueue_style('theme-custom-css', get_template_directory_uri() . '/public/theme/css/style.css', array(), array(), null);
    wp_enqueue_script('theme-custom-js', get_template_directory_uri() . '/public/theme/js/custom.js', array('jquery'), null, true);

    
    wp_enqueue_style('jquery-ui-css','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), null);
    wp_enqueue_style('slick-carousel-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
    wp_enqueue_script('slick-carousel-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-ui','https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), null, true);
        

}

add_action('wp_enqueue_scripts', 'trees_n_clouds_enqueue_styles');

function my_admin_enqueue_styles() {
    
    // Enqueue Data Tables
    wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css');
    wp_enqueue_style('datatables-buttons-css', 'https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css');
    
    // Enqueue your custom theme styles for admin panel
    wp_enqueue_style('trees-n-clouds-admin-style', get_stylesheet_directory_uri() . 'admin.css', array(), null);
    // wp_enqueue_style('tnc-admin-style', get_template_directory_uri() . '/public/theme/css/tnc.css', array(), '1.0', 'all');
    wp_enqueue_style('jquery-ui-timepicker-addon', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css');

}

add_action('admin_enqueue_scripts', 'my_admin_enqueue_styles');



