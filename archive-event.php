<?php

/**
 * Template Name: TNC Event Archive Page
 * Description: Custom front page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');

?>

<div class="main" style="margin-top: 50px; min-height: 100vh;">
    <div class="container">
        <div class="section">
            <?php
            // Define the custom query
            $custom_query = new WP_Query(array('post_type' => 'event', 'posts_per_page' => -1));
            if ($custom_query->have_posts()): ?>
                <div class="row">
                    <?php
                    $counter = 0; // Counter to track post iterations
                    while ($custom_query->have_posts()):
                        $custom_query->the_post();
                        // Every 3 posts, close and open a new row.
                        if ($counter % 3 == 0 && $counter != 0): ?>
                        </div>
                        <div class="row">
                        <?php endif; ?>

                        <div class="col-md-4">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()): ?>
                                            <img class="img rounded img-raised" src="<?php the_post_thumbnail_url(); ?>"
                                                alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">
                                        <?php the_category(', '); ?>
                                    </h6>
                                    <h4 class="card-title"><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a></h4>
                                    <div class="event-details">
                                        <?php
                                        $start_date = get_post_meta(get_the_ID(), 'start_date', true);
                                        $end_date = get_post_meta(get_the_ID(), 'end_date', true);
                                        $location = get_post_meta(get_the_ID(), 'location_name', true);
                                        $address = get_post_meta(get_the_ID(), 'location_address', true);
                                        $organizer = get_post_meta(get_the_ID(), 'organizer_name', true);

                                        if (!empty ($start_date)) {
                                            echo '<p><strong>Start Date:</strong> ' . date('F j, Y, g:i a', strtotime($start_date)) . '</p>';
                                        }
                                        if (!empty ($end_date)) {
                                            echo '<p><strong>End Date:</strong> ' . date('F j, Y, g:i a', strtotime($end_date)) . '</p>';
                                        }
                                        if (!empty ($location) || !empty ($address)) {
                                            echo '<p><strong>Location:</strong> ' . esc_html($location);
                                            if (!empty ($address)) {
                                                echo ' - ' . esc_html($address);
                                            }
                                            echo '</p>';
                                        }
                                        if (!empty ($organizer)) {
                                            echo '<p><strong>Organizer:</strong> ' . esc_html($organizer) . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <!-- <p class="card-description">
                                        <?php the_excerpt(); ?>
                                    </p> -->
                                    <a class="btn btn-sm btn-primary" href="<?php the_permalink(); ?>">See Event</a>
                                    <div class="author">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 96); ?><span>
                                            <?php the_author(); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $json_ld = json_encode(
                            array(
                                "@context" => "http://schema.org",
                                "@type" => "Event",
                                "name" => get_the_title(),
                                "startDate" => date('c', strtotime($start_date)),
                                "endDate" => date('c', strtotime($end_date)),
                                "location" => array(
                                    "@type" => "Place",
                                    "name" => $location,
                                    "address" => $address
                                ),
                                "organizer" => array(
                                    "@type" => "Organization",
                                    "name" => $organizer
                                ),
                                "image" => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                                "description" => wp_strip_all_tags(get_the_excerpt()),
                                "url" => get_permalink()
                            ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

                        echo "<script type='application/ld+json'>" . $json_ld . "</script>";
                        ?>


                        <?php $counter++; ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include get_theme_file_path('/public/tnc-footer.php');
?>