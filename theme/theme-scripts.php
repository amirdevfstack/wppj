<?php

function trees_n_clouds_enqueue_scripts()
{
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Popper.js first since Bootstrap depends on it
    wp_enqueue_script('popper-js', get_template_directory_uri() . '/public/theme/js/core/popper.min.js', array('jquery'), '1.0', true);

    // Enqueue Google Maps Script
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVpM5D9iQR6Q89DPhlUBVZGvlW75aBac', array('jquery'), null, true);

    // Enqueue UI KIT
    wp_enqueue_script('now-ui-kit', get_template_directory_uri() . '/public/theme/js/now-ui-kit.js', array('jquery', 'google-maps'), null, true);

    // Enqueue Bootstrap JavaScript
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3', true);

    // Enqueue Age Gate JS
    wp_enqueue_script('age-verification-js', get_template_directory_uri() . '/public/theme/js/age-verification.js', array('jquery'), '', true);
    wp_localize_script('age-verification-js', 'ageVerificationParams', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    )
    );

    // Enqueue JS Cookie
    wp_enqueue_script('js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js', array(), '', true);

    // Conditionally enqueue the listing-map.js for tnc-listings.php template
    if (is_page_template('public/tnc-listing.php')) {
        wp_enqueue_script('listing-map', get_template_directory_uri() . '/public/theme/js/listing-map.js', array('jquery', 'google-maps'), null, true);
    }
}

function enqueue_admin()
{
    wp_enqueue_media();
    wp_enqueue_style('jquery-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('jquery-ui-timepicker-addon', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js', array('jquery', 'jquery-ui-datepicker'), null, true);
    wp_enqueue_script('my-admin-js', get_template_directory_uri() . '/public/theme/js/upload-media.js', array('jquery'), null, true);

    $screen = get_current_screen();

    if ( isset( $screen->post_type ) && 'event' == $screen->post_type ) {
        wp_enqueue_script('event-admin-js', get_template_directory_uri() . '/public/theme/js/event-admin.js', array('jquery', 'jquery-ui-datepicker'), null, true);
    }
}

// function redirect_from_admin_dashboard()
// {
//     global $pagenow;

//     // Check if we are on the dashboard ('index.php') page and if the user has the capability you desire
//     if ($pagenow == 'index.php') {
//         // Redirect to 'profile.php' or any other admin page
//         wp_redirect(admin_url('admin.php?page=trees-n-clouds-settings'));
//         exit;
//     }
// }

function remove_dashboard_menu()
{
    remove_menu_page('index.php'); // Removes the Dashboard menu item
}

add_action('wp_enqueue_scripts', 'trees_n_clouds_enqueue_scripts');
add_action('admin_enqueue_scripts', 'enqueue_admin');
// add_action('admin_init', 'redirect_from_admin_dashboard');