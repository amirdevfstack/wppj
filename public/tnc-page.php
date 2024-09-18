<?php
/*
Template Name: TNC Page
*/

include get_theme_file_path('/public/tnc-header.php');

?>

<div class="section">
    <div class="container">

        <?php
        // Start the loop.
        while (have_posts()):
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h3 class="title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Display the content.
                    the_content();

                    // WP Link Pages is used for paginating page content if <!--nextpage--> is used.
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
                            'after' => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->

                <?php
                // If comments are open or there is at least one comment, load the comment template.
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
                ?>

            </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // End the loop.
        endwhile;
        ?>
        </main><!-- #main -->
    </div><!-- #primary -->

</div>
<?php

// Include the footer.
include get_theme_file_path('/public/tnc-footer.php');

?>