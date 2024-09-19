<?php
    /**
 * Template Name: TNC SignIn Page
 * Description: Custom SignIn page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');
?>

<div class="wrapper signupBgImage" style=" margin-top:100px;">
    
<div class="row m-0">
    <div class="col-12">
        <div class="container col-lg-5 col-md-6 col-sm-10 col-12 singUpContainer mb-5">
            <h5 class="font-weight-bold my-2 text-secondary">Sign In</h5>
            <form class="border border-secondary rounded p-4">
                <div class="form-group mb-4">
                    <input type="email" class="form-control rounded border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control rounded border border-secondary" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group mb-4">
                    <button type="submit" class="btn bg-white text-dark border border-secondary w-100 roundedPill text-dark">Sign In</button>
        
                </div>
        
                <div class="text-center signupIcon mb-4">
                    <a href="" class="text-dark">
                        <i class="fab fa-facebook-square mx-2"></i>
                    </a>
                    <a href="" class="text-dark">
                        <i class="fab fa-google mx-2"></i>
                    </a>
                    
                    <!-- <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/signupIcon.png" alt=""> -->
                </div>
        
                <div class="">
                    <a href="" class="text-dark">Forget Password?</a>
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