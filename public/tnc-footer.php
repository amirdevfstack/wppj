<?php
$footer_options = get_option('footer_customization_options');

// Column Titles
$about_us_title = isset($footer_options['about_us_title']) ? esc_html($footer_options['about_us_title']) : 'About Us';
$market_title = isset($footer_options['market_title']) ? esc_html($footer_options['market_title']) : 'Market';
$social_feed_title = isset($footer_options['social_feed_title']) ? esc_html($footer_options['social_feed_title']) : 'Social Feed';
$follow_us_title = isset($footer_options['follow_us_title']) ? esc_html($footer_options['follow_us_title']) : 'Follow Us';

// 4th Column Custom Texts
$numbers_text = isset($footer_options['numbers_text']) ? esc_html($footer_options['numbers_text']) : 'Numbers Don\'t Lie';
$freelancers_count = isset($footer_options['freelancers_count']) ? esc_html($footer_options['freelancers_count']) : '14,521';
$transactions_count = isset($footer_options['transactions_count']) ? esc_html($footer_options['transactions_count']) : '1,423,183';

// About Us and Market Links
$about_us_links = isset($footer_options['about_us_links']) ? $footer_options['about_us_links'] : [];
$market_links = isset($footer_options['market_links']) ? $footer_options['market_links'] : [];

// Social Feed
$social_feed = isset($footer_options['social_feed']) ? $footer_options['social_feed'] : [];

// Social Media Icons
$social_icons = isset($footer_options['social_icons']) ? $footer_options['social_icons'] : [];
?>

<footer class="footer footer-big" data-background-color="black">
   <div class="container">
      <div class="content">
         <div class="row">
            <!-- About Us Section -->
            <div class="col-md-2">
               <h5><?php echo $about_us_title; ?></h5>
               <ul class="links-vertical">
                  <?php foreach ($about_us_links as $link) : ?>
                     <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-muted">
                           <?php echo esc_html($link['label']); ?>
                        </a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </div>

            <!-- Market Section -->
            <div class="col-md-2">
               <h5><?php echo $market_title; ?></h5>
               <ul class="links-vertical">
                  <?php foreach ($market_links as $link) : ?>
                     <li>
                        <a href="<?php echo esc_url($link['url']); ?>" class="text-muted">
                           <?php echo esc_html($link['label']); ?>
                        </a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </div>

            <!-- Social Feed Section -->
            <div class="col-md-4">
               <h5><?php echo $social_feed_title; ?></h5>
               <div class="social-feed">
                  <?php foreach ($social_feed as $feed_item) : ?>
                     <div class="feed-line">
                        <i class="fab fa-twitter"></i>
                        <p><?php echo esc_html($feed_item); ?></p>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>

            <!-- Follow Us Section -->
            <div class="col-md-4">
               <h5><?php echo $follow_us_title; ?></h5>
               <div class="buttons d-flex">
                  <?php foreach ($social_icons as $icon) : ?>
                     <a href="<?php echo esc_url($icon['url']); ?>" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                        <i class="fab <?php echo esc_attr($icon['icon']); ?>"></i>
                     </a>
                  <?php endforeach; ?>
               </div>
               <h5><small><?php echo $numbers_text; ?></small></h5>
               <h5><?php echo $freelancers_count; ?> <small class="text-muted">Freelancers</small></h5>
               <h5><?php echo $transactions_count; ?> <small class="text-muted">Transactions</small></h5>
            </div>
         </div>
      </div>
      <hr>
      <div class="copyright">
         Copyright © <script>document.write(new Date().getFullYear())</script> All Rights Reserved.
      </div>
   </div>
</footer>



</body>
<?php wp_footer(); ?>
</html>
