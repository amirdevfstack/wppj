<?php
    /**
 * Template Name: TNC Signup Page
 * Description: Custom Signup page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');
?>
<style> 
    .signupBgImage{
        background-image:url("<?php echo get_template_directory_uri() ?>/public/theme/images/bg18.jpg");
        background-repeat:no-repeat;
        background-size:cover;

    }
</style>
<div class="wrapper signupBgImage container-fluid" style=" margin-top:60px;">
    
    <div class="row m-0 height-100vh align-items-center justify-content-end marginRight">

        <div class="col-lg-4 " >
            <div class="singUpContainer">
            <div class="card card-signup py-4">
                <div class="card-body">
                <h4 class="card-title text-center">Sign Up</h4>
                <div class="social text-center">
                <button class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
                </button>
                <button class="btn btn-icon btn-round btn-dribbble">
                <i class="fab fa-dribbble"></i>
                </button>
                <button class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"> </i>
                </button>
                <h5 class="card-description"> or be classical </h5>
                </div>
                <form class="form" method="" action="">
                <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Email..." autocomplete="email">
                </div>
                <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="now-ui-icons text_caps-small"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Password..." autocomplete="password">
                </div>
                <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="now-ui-icons ui-1_email-85"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Verify Password..." autocomplete="password">
                </div>

                <div class="form-check d-flex d-flex justify-content-between">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    Terms of Service
                    </label>
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    Privacy Policy
                    </label>
                </div>
                <div class="card-footer text-center">
                <a href="#pablo" class="btn btn-primary btn-round btn-lg">Sign Up</a>
                </div>
                </form>
                </div>
                </div>
            </div>

        </div>
    </div>

</div>





<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<script type="application/ld+json">

</script>