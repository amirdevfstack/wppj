<?php
    /**
    * Template Name: TNC Event Page
    * Description: Custom Event page template from TNC.
    */

    include get_theme_file_path('/public/tnc-header.php');
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    #datepicker {
        font-size: 16px;
        width: auto;
        margin-top: 20px;
    }
    .ui-datepicker {
        width: 100%;
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
    }
</style>

<div class="wrapper" style=" margin-top:60px;">
    
    <section class="padding-10 d-flex align-items-end" style="background-image:url('<?php echo get_template_directory_uri() ?>/public/theme/images/images.jpg');background-repeat:no-repeat;background-size: cover;background-position:center center;height:500px;">
        <!-- <div class="container mb-4">
            <div class="row">
                <div class="col-lg-2 col-md-4">
                    <div id="datepicker" class=""></div>
                </div>
            </div>
        </div> -->
    </section>

    <section class="padding-common my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-secondary mb-2">Event Details</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                    <div class="row">
                        <div class="col-12">
                            <div id="datepicker" class=""></div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="" class="btn py-1 startBtn btn-primary text-white">START NOW</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://www.picsum.photos/600/600" style="width:100%; height:auto;">
                </div>
            </div>
        </div>
    </section>


</div>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

    $(function() {
        // Initialize the datepicker and always show it
        $("#datepicker").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'MM yy'
        }).datepicker("show"); // Ensures it is always displayed
    });

    
</script>
