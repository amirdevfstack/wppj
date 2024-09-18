<?php
/**
 * Theme setup functions for Trees N Clouds theme
 */

@ini_set( 'upload_max_size' , '130M' );
@ini_set( 'post_max_size', '130M');
@ini_set( 'max_execution_time', '300' );

function trees_n_clouds_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register header and footer menus
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );

    // Remove admin bar
    show_admin_bar(false);

    // Register a custom setting for menu ID
    add_option('menu_id_option', '');
    register_setting('general', 'menu_id_option', 'esc_attr');
}

add_action('after_setup_theme', 'trees_n_clouds_setup');