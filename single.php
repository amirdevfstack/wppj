<?php

include get_theme_file_path('/public/tnc-header.php');

// Start the loop.
while (have_posts()):
    the_post();
    ?>

    <?php if (has_post_thumbnail()): ?>
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true"
                style="z-index: 0; background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
            </div>
            <div class="content-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); // Ensure heading tag consistency       ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="section" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); // Ensure heading tag consistency       ?>
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
                </div><!-- .col-md-8 -->
            </div><!-- .row -->
        </div><!-- .container -->
        <?php
    // End the loop.
endwhile;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-tags">
                            Tags:
                            <?php
                            $tags_list = get_the_tag_list('', ', '); // Separate tags with space
                            if ($tags_list) {
                                echo $tags_list; // Output tags
                            } else {
                                echo '<span>No Tags Found</span>'; // Fallback text if no tags found
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="#pablo" class="btn btn-google btn-round pull-right">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#pablo" class="btn btn-twitter btn-round pull-right">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#pablo" class="btn btn-facebook btn-round pull-right">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card card-profile card-plain">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card-avatar">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 97); ?>
                                </a>
                                <div class="ripple-container"></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title text-left">
                                <?php the_author(); ?>
                            </h5>
                            <p class="description text-left">
                                <?php the_author_meta('description'); ?>
                            </p> <!-- Author bio -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .section -->

<?php
include get_theme_file_path('/public/tnc-footer.php');
?>