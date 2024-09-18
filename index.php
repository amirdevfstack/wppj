<?php

/**
 * Template Name: TNC Archive Page
 * Description: Custom front page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');

?>

<div class="main" style="margin-top: 50px;">
    <div class="container">
        <div class="section">
            <?php 
            // Define the custom query
            $custom_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1));
            if ($custom_query->have_posts()) : ?>
                <div class="row">
                    <?php
                    $counter = 0; // Counter to track post iterations
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                        // Every 3 posts, close and open a new row.
                        if ($counter % 3 == 0 && $counter != 0): ?>
                            </div><div class="row">
                        <?php endif; ?>

                        <div class="col-md-4">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()): ?>
                                            <img class="img rounded img-raised" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info"><?php the_category(', '); ?></h6>
                                    <h4 class="card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <p class="card-description">
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>">Read More</a>
                                    </p>
                                    <div class="author">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                                        <span><?php the_author(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endwhile; wp_reset_postdata(); // Reset custom query ?>
                </div>
            <?php else: ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Additional sections can go here -->
</div>

<?php
include get_theme_file_path('/public/tnc-footer.php');
?>
