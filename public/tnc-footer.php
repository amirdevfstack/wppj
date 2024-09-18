<!-- <div style="padding-top: 79px; background-color: #2c2c2c;"></div> -->

<!-- Footer -->
<footer class="footer fixed-bottom text-left" data-background-color="black">
    <div class="container">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container' => false,
                'menu_class' => 'nav d-inline',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new Custom_Nav_Walker()
            )
        );
        ?>
        <div class="copyright">
            &copy;
            <script>document.write(new Date().getFullYear())</script>, Built for
            <a href="#">
                <?php $business_name = BusinessAdmin::get_business_info_by_slug('business-name');
                if (!empty ($business_name)) {
                    echo esc_html($business_name);
                } ?>
            </a>. Coded by
            <a href="https://www.trees.cloud">Trees N Clouds, Inc.</a>.
        </div>
    </div>
</footer>
<?php include get_theme_file_path('public/template/age-verification-modal.php'); ?>
</body>
<?php wp_footer(); ?>

</html>