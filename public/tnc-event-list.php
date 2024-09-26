<?php
    /**
    * Template Name: TNC Event List Page
    * Description: Custom Event List page template from TNC.
    */

    include get_theme_file_path('/public/tnc-header.php');
?>
<div class="wrapper" style=" margin-top:60px;">
    
    <section class="padding-10 d-flex align-items-end" style="background-image:url('<?php echo get_template_directory_uri() ?>/public/theme/images/images.jpg');background-repeat:no-repeat;background-size: cover;background-position:center center;height:500px;">
        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-2 col-md-4">
                    <div id="datepicker" class=""></div>
                </div>
            </div>
        </div>
    </section>

    <section class="paginationContainer padding-10 py-4">
        <div class="container px-2">
            <div class="row p-0">
                <div class="col-md-6 text-lg-left text-md-left text-sm-center text-center">
                    <span>Events with a <span class="font-weight-bold">purpose</span>...</span>
                </div>
                <div class="col-md-6 text-lg-right text-md-right text-sm-center text-center mt-lg-0 mt-md-0 mt-sm-2 mt-2">
                    <a href="" class="text-info font-weight-bold mr-3"><< prev</a>
                    <a href="" class="text-info font-weight-bold mx-1">1</a>
                    <a href="" class="text-info font-weight-bold mx-1">2</a>
                    <a href="" class="text-info font-weight-bold mx-1">3</a>
                    <a href="" class="text-info font-weight-bold mx-1">4</a>
                    <a href="" class="text-info font-weight-bold mx-1">5</a>
                    <a href="" class="text-info font-weight-bold mx-1">6</a>
                    <a href="" class="text-info font-weight-bold mx-1">7</a>
                    <a href="" class="text-info font-weight-bold mx-1">8</a>
                    <a href="" class="text-info font-weight-bold mx-1">9</a>
                    <a href="" class="text-info font-weight-bold mx-1">10</a>
                    <a href="" class="text-info font-weight-bold ml-3">next >></a>
                </div>
            </div>

        </div>
    </section>

    <section class="homePageSlider padding-10">
        <div class="container p-0">
            <div class="slickSlider">
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 1">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 2">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 3">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 4">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 5">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                </div>
            </div>
        </div>

    </section>

    <section class="homePageSlider padding-10 pt-5">
        <div class="container px-2">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 1">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 2">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 3">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 4">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 5">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-6 mb-3">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                </div>
            </div>
        </div>

    </section>

</div>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>

<script>
       $(document).ready(function() {
    $('.slickSlider').slick({
        slidesToShow: 6,  
        slidesToScroll: 1, 
        dots: true,       
        infinite: true,   
        autoplay: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
});  
</script>
