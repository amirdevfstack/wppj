<?php
    /**
 * Template Name: TNC Signup Page
 * Description: Custom Signup page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');
?>
<style> 
    .signupBgImage{
        background-image:url("<?php echo get_template_directory_uri() ?>/public/theme/images/images.jpg");
        background-repeat:no-repeat;
        background-size:cover;

    }
</style>
<div class="wrapper signupBgImage container-fluid" style=" margin-top:60px;">
    
    <div class="row m-0 height-100vh align-items-center justify-content-end marginRight">

        <div class="col-lg-4">
            <div class="singUpContainer">
                <h5 class="font-weight-bold my-2 text-secondary">Sign Up</h5>
                <form class="border border-secondary rounded p-4">
                    <div class="form-group mb-4">
                        <input type="email" class="form-control rounded border border-secondary" id="email" aria-describedby="emailHelp" placeholder="email">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control rounded border border-secondary" id="password" placeholder="Password">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control rounded border border-secondary" id="verifyPassword" placeholder="Verify Password">
                    </div>
        
                    <div class="form-check d-flex justify-content-between mb-4">
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
                    <div class="form-group mb-4">
                        <button type="submit" class="btn bg-white text-dark btn-round border border-secondary w-100 text-dark">Sign Up</button>
                    </div>
        
                    <div class="text-center signupIcon">
                        <a href="" class="text-dark">
                            <i class="fab fa-facebook-square mx-2"></i>
                        </a>
                        <a href="" class="text-dark">
                            <i class="fab fa-google mx-2"></i>
                        </a>
                        
                        <!-- <img src="http://localhost/pjwordpress/wp-content/themes/wppj/public/theme/images/signupIcon.png" alt=""> -->
                    </div>
        
                </form>
            </div>

        </div>
    </div>

</div>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<script type="application/ld+json">

</script>