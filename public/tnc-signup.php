<?php
    /**
 * Template Name: TNC Signup Page
 * Description: Custom Signup page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');
?>

<div class="wrapper signupBgImage" style=" margin-top:100px;">
    
    <div class="row m-0 ">

        <div class="col-lg-12 offset-lg-0">
            <div class="container col-lg-5 col-md-6 col-sm-10 col-12 singUpContainer mb-5">
                <h5 class="font-weight-bold my-2 text-secondary">Sign Up</h5>
                <form class="border border-secondary rounded p-4">
                    <div class="form-group mb-4">
                        <input type="email" class="form-control rounded border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control rounded border border-secondary" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" class="form-control rounded border border-secondary" id="exampleInputPassword1" placeholder="Verify Password">
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
                        <button type="submit" class="btn bg-white text-dark border border-secondary w-100 roundedPill text-dark">Sign Up</button>
        
                    </div>
        
                    <div class="text-center signupIcon">
                        <a href="" class="text-dark">
                            <i class="fab fa-facebook-square mx-2"></i>
                        </a>
                        <a href="" class="text-dark">
                            <i class="fab fa-google mx-2"></i>
                        </a>
                        
                        <!-- <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/signupIcon.png" alt=""> -->
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