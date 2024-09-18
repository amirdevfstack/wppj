<?php
   /**
    * Template Name: TNC Private Page
    */
   
   include get_theme_file_path('/public/tnc-header.php');
   ?>
<div class="section">
   <div class="container">
      <div class="row">
         <?php
            if (is_user_logged_in()) {
               
                ?>
         <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
         <?php
            } else {?>
         <div class="col-md-8 ml-auto mr-auto mt-5">
            <h2 class="text-center">Login/Register</h2>

            <?php
               
               echo do_shortcode('[tnc_authentication_form]'); 
               }
               ?>
         </div>
      </div>
   </div>
</div>
<?php
   include get_theme_file_path('/public/tnc-footer.php');
   ?>
