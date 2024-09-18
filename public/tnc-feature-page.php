<?php

/**
 * Template Name: TNC Feature Page
 * Description: Custom feature page template from TNC events.
 */

include get_theme_file_path('/public/tnc-header.php');

$business_logo_long = BusinessAdmin::get_business_info_by_slug('business-logo-long');

?>
<div class="wrapper">
    <!-- CARROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" style="margin-top: -78px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="page-header header-filter">
                    <div class="page-header-image section-image"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/AdobeStock_142515887-min-scaled.jpg');">
                    </div>
                    <div class="content-center">
                        <div class="container">
                            <div class="content-center">
                                <div class="row">
                                    <div class="col-md-10 ml-auto mr-auto text-center">
                                        <img class="m-auto"
                                            style="" src="<?php
                                            if (!empty($business_logo_long)) {
                                                echo esc_attr($business_logo_long);
                                            } ?>" />
                                            <div><small>SPONSORED BY:</small></div>
                                            <a href="https://shophighseason.com/"><img class="m-auto" style="" src='<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/high_season.png' /></a>
                                        <h1 style="margin-top: 25px;" class="description">SATURDAY MAY 4TH 2024</h1>
                                        <h2 style="margin-top: 25px;" class="description">ONTARIO TOYOTA ARENA</h2>
                                        <h2 style="margin-top: 25px;" class="description">ALL TIME HIGH TOUR</h2>
                                        <div class="buttons">
                                            <a href="https://www.ticketmaster.com/event/090060459F285DF6"
                                                class="btn btn-danger mt-2 btn-lg">
                                                BUY TICKETS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="page-header header-filter">
                    <div class="page-header-image section-image"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/AdobeStock_235307631-scaled.jpg');">
                    </div>
                    <div class="content-center">
                        <div class="container text-left">
                            <div class="content-center">
                                <div class="container">
                                    <div class="content-center">
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <img class="m-auto"
                                                style="" src="<?php
                                                    if (!empty($business_logo_long)) {
                                                        echo esc_attr($business_logo_long);
                                                    } ?>" />
                                                <h1 class="title">ALL TIME HIGH Tour</h1>
                                                <h4 class="description ">Set for May 4th at Toyota Arena, Ontario, CA,
                                                    the tour celebrates iconic 90s and early 2000s hip-hop with
                                                    performances by Cypress Hill and Bone Thugs-N-Harmony, under the
                                                    electrifying host Dr. Greenthumb, presented by Bobby Dee.</h4>
                                                <br>
                                                <div class="buttons">
                                                    <a href="https://www.ticketmaster.com/event/090060459F285DF6"
                                                        class="btn btn-danger mt-2 btn-lg">
                                                        BUY TICKETS
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="page-header header-filter">
                    <div class="page-header-image section-image"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/AdobeStock_309492578-scaled.jpg');">
                    </div>
                    <div class="content-center">
                        <div class="container">
                            <div class="content-center">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <img class="m-auto"
                                        style="" src="<?php
                                            if (!empty($business_logo_long)) {
                                                echo esc_attr($business_logo_long);
                                            } ?>" />
                                        <h1 class="title">ALL TIME HIGH Tour Showcase</h1>
                                        <h4 class="description ">On May 4th at Toyota Arena, Ontario, CA, Dr. Greenthumb
                                            hosts a legendary lineup featuring Cypress Hill, Bone Thugs-N-Harmony, and
                                            more, celebrating the iconic sounds of 90s and early 2000s hip-hop with
                                            unforgettable performances.</h4>
                                        <br>
                                        <div class="buttons">
                                            <a href="https://www.ticketmaster.com/event/090060459F285DF6"
                                                class="btn btn-danger mt-2 btn-lg">
                                                BUY TICKETS
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="page-header header-filter">
                    <div class="page-header-image section-image"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/AdobeStock_309492578-scaled.jpg');">
                    </div>
                    <div class="content-center">
                        <div class="container text-left">
                            <div class="content-center">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="iframe-container">
                                            <iframe height="350"
                                                src="https://www.youtube.com/embed/IsYaPMsYly0?si=cov4TAbEvakjHZZ-?rel=0&amp;controls=0&amp;showinfo=0"
                                                frameborder="0" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ml-auto mr-auto text-right">
                                        <h1 class="title">ALL TIME HIGH</h1>
                                        <h4 class="description ">Set for May 4th at Toyota Arena, Ontario, CA,
                                                    the tour celebrates iconic 90s and early 2000s hip-hop with
                                                    performances by Cypress Hill and Bone Thugs-N-Harmony, under the
                                                    electrifying host Dr. Greenthumb, presented by Bobby Dee.</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="now-ui-icons arrows-1_minimal-right"></i>
        </a>
    </div>
    <!-- FLYER -->
    <div class="features-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="title">ALL TIME HIGH</h2>
                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title">SATURDAY MAY 4TH 2024</h4>
                            <p>ONTARIO TOYOTA ARENA</p>
                            <p>Catch Cypress Hill and Bone Thugs at the ALL TIME HIGH Tour in Ontario, CA—pure old
                                school!</p>
                            <ul>
                                <li>Event Starts- 7:00 PM</li>
                                <li>Doors Open - 6:00 PM</li>
                            </ul>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title">LEGENDARY LINEUP</h4>
                            <p>Cypress Hill headlines, Dr. Greenthumb hosts. Don’t miss this epic throwback journey!</p>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="description">
                            <h4 class="info-title">PARKING</h4>
                            <ul>
                                <li><text class="text-default" style="font-weight: 750;">IN ADVANCE:</text> $25</li>
                                <li><text class="text-default" style="font-weight: 750;">VIP:</text> $50</li>
                                <li><text class="text-default" style="font-weight: 750;">DAY OF SHOW:</text> $35</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center" style="margin-top: 25px;">
                            <a class="btn btn-danger btn-lg text-center"
                                href="https://www.ticketmaster.com/event/090060459F285DF6">BUY TICKETS</a>
                        </div>
                        <div class="col-md-6 text-center" style="margin-top: 25px;">
                            <a class="btn btn-default btn-lg text-center"
                                href="https://www.ticketmaster.com/event/090060459FC96016">BUY PARKING</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>Sponsored By:</p>
                    <a href="https://shophighseason.com/"><img class="m-auto" style="" src='<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/high_season.png' /></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tablet-container">
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/ath-social-announcement-4x5-copy-scaled-1.webp">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GRID -->
    <div class="row">
        <div class="col-md-12 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/cypresshill.webp'); height: 950px;">
                <div class="card-body" style="padding-top: 20%;">
                    <h1 class="card-title">CYPRESS HILL</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/Bone-Thugs-N-Harmony.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">BONE THUGS-N-HARMONY</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/Three-6-Mafia.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">THREE 6 MAFIA</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-raised card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/berner.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">BERNER</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/Pharcyde.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">THE PHARCYDE</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/dilated-peoples.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">DIALATED PEOPLES</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/souls.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">THE SOULS OF MISCHIEF</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/psycho-realm.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">PSYCHO REALM</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-0">
            <div class="card card-background card-background-product card-no-shadow"
                style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/Ghostface-Killah.webp'); height: 700px;">
                <div class="card-body" style="padding-top: 25%;">
                    <h1 class="card-title">GHOSTFACE KILLAH</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- BRANDS -->
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
        <a href="https://shophighseason.com/"><img class="m-auto" style="" src='<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/high_season_purple.png' /></a>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-05.png">
        </div>
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-02-e1713161040343.png">
        </div>
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-03.png">
        </div>
    </div>
    <div class="row">

        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-04.png">
        </div>

        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-06.png">
        </div>

        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-07.png">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-08.png">
        </div>
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-09.png">
        </div>
        <div class="col-md-4">
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/HHM-10.png">
        </div>
    </div>
    <!-- PRICING -->
    <div class="pricing-5 section-pricing-5 section-image" id="pricing-5"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/public/theme/images/ath/unnamed.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="title">GET BEHIND THE SCENE ACCESS</h2>
                    <div style="margin: 85px 0px;">
                        <a class="btn-lg btn-danger" href="https://www.ticketmaster.com/event/090060459F725FFC"
                            role="tablist">
                            BUY VIP TICKETS
                        </a>
                    </div>
                    <div style="margin: 85px 0px;">
                        <a class="btn btn-default btn-lg" href="https://www.toyota-arena.com/premium-seating/vip-club"
                            role="tablist">
                            VIP CLUB INFO
                        </a>
                    </div>
                    <div class="col-md-7 ml-auto mr-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    include get_theme_file_path('/public/tnc-footer.php');

    ?>