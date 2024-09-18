<?php
/**
 * The template for displaying comments
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Check if the post is password protected and still needs a password.
if (post_password_required()) {
    return;
}
?>

<div class="section section-comments">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <?php if (have_comments()) : ?>
                    <div class="media-area">
                        <h3 class="title text-center">
                            <?php
                            $comments_number = get_comments_number();
                            echo esc_html($comments_number . ' ' . _n('Comment', 'Comments', $comments_number, 'text-domain'));
                            ?>
                        </h3>

                        <?php
                        wp_list_comments([
                            'style'       => 'div', // Use 'div' instead of 'ol' for easier Bootstrap styling
                            'short_ping'  => true,
                            'avatar_size' => 64, // Adjust the avatar size
                            'callback'    => null, // Optional: Define if you have a custom callback function for individual comments
                        ]);
                        ?>

                        <?php the_comments_navigation(); ?>
                    </div>
                <?php endif; ?>

                <?php
                // If comments are closed and there are comments, show a note.
                if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
                    <p class="no-comments text-center"><?php esc_html_e('Comments are closed.', 'text-domain'); ?></p>
                <?php endif; ?>

                <h3 class="title text-center">Post your comment</h3>
                <?php
                comment_form([
                    'class_form'           => 'media media-post', // Apply custom classes for styling
                    'title_reply_before'   => '<div class="title text-center"><h3>',
                    'title_reply_after'    => '</h3></div>',
                    'comment_field'        => '<div class="media-body"><textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Write a nice reply or go home..."></textarea></div>',
                    'class_submit'         => 'btn btn-primary pull-right', // Class for the submit button
                    'label_submit'         => 'Reply', // Text for the submit button
                    'submit_button'        => '<div class="media-footer"><button type="submit" class="%2$s">%4$s</button></div>',
                    'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
                    'logged_in_as'         => '<div class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'text-domain'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</div>',
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
