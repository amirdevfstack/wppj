<?php

/**
 * Template Name: TNC Landing Page
 * Description: Custom Landing page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');


?>

<style>
    .firstHomeContainer, .loveWithAndWithOut, .featuredSpeakerImage, .downloadAppSection {
        /* background-image:url("https://www.picsum.photos/100/100"); */
        background-image:url("<?php echo get_template_directory_uri() ?>/public/theme/images/images.jpg");
        background-repeat:no-repeat;
        background-size: cover;
        background-position:center center;
    }
</style>

<main class="wrapper" style=" margin-top:50px;">

    <section class="firstHomeContainer padding-common">
        <div class="container">
            <div class="row pb-4">

                <div class="col-md-6 px-0 d-flex flex-column justify-content-end align-items-lg-start align-items-md-start align-items-sm-center align-items-center">
                    <h4 class="m-0">Love is Contagious</h4>
                    <h4 class="font-weight-bold my-0">Love is Infectious</h4>
                    <div class="mt-4">
                        <a href="" class="btn py-1 startBtn btn-primary text-white">START NOW</a>
                    </div>
                </div>
                <div class="col-md-6 px-0 d-flex flex-column align-items-end">
                    <div class="mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                        <div class="font-weight-bold text-secondary mb-2">Next Event</div>
                        <video class="videoPlay" src="<?php echo get_template_directory_uri() ?>/public/theme/videos/video.mp4" controls muted>
                        </video>
                    </div>

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

    <section class="featuredSection padding-common marginTop">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-6 order-lg-1 order-md-1 order-sm-2 order-2 mt-lg-0 mt-md-3 mt-sm-3 mt-3">
                    <h3 class="text-secondary font-weight-bold mb-2">Feature Section</h3>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                    <div class="mt-md-5">
                        <h3 class="m-0">Love is Contagious</h3>
                        <h3 class="font-weight-bold my-0">Love is Infectious</h3>
                        <div class="mt-md-4">
                            <a href="" class="btn py-1 text-white startBtn bg-primary">START NOW</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/featureLogo.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 order-lg-2 order-md-2 order-sm-1 order-1">
                    <div class="featuredImage">
                        <img src="https://www.picsum.photos/100/100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="loveWithAndWithOut padding-common marginTop">
        <div class="">
            <h3 class="font-weight-bold text-secondary m-0 text-center">Love Within</h3>
            <h2 class="font-weight-bold m-0 text-center">Love Without</h2>
            <div class="mt-4 text-center">
                <a href="" class="btn py-1 text-white bg-primary startBtn rounded">START NOW</a>
            </div>
        </div>
    </section>

    <section class="featuredSpeakerSection py-5 padding-common">
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-md-5">
                    <div class="featuredSpeakerImage p-2 rounded">
                        <div class="featuredContent">
                            <h4 class="mb-1 mt-0">Featured Quote</h4>
                            <p class="">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-1">
                    <h2 class="text-white font-weight-bold mb-2 mt-lg-0 mt-md-0 mt-sm-2 mt-2">Featured Speaker</h2>
                    <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                    <div class="mt-4">
                        <a href="" class="btn py-1 text-white bg-primary startBtn rounded">START NOW</a>
                    </div>
                    <div class="cardContainer">
                        <div class="cardBox">
                            <img class="rounded" src="https://www.picsum.photos/100/100" alt="">
                            <h6 class="text-white text-center mt-1">Person Name</h6>
                        </div>
                        <div class="cardBox">
                            <img class="rounded" src="https://www.picsum.photos/100/100" alt="">
                            <h6 class="text-white text-center mt-1">Person Name</h6>
                        </div>
                        <div class="cardBox">
                            <img class="rounded" src="https://www.picsum.photos/100/100" alt="">
                            <h6 class="text-white text-center mt-1">Person Name</h6>
                        </div>
                        <div class="cardBox">
                            <img class="rounded" src="https://www.picsum.photos/100/100" alt="">
                            <h6 class="text-white text-center mt-1">Person Name</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="paginationContainer padding-10 mx-2">
        <div class="container p-0 py-4">
            <div class="row p-0">
                <div class="col-md-6 text-lg-left text-md-left text-sm-center text-center">
                    <span>Latest featured <span class="font-weight-bold">posts</span>...</span>
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
            <div class="slickSliderPost">
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 1">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 2">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 3">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 4">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 5">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
                <div class="mx-2">
                    <img class="rounded border border-secondary" src="https://www.picsum.photos/100/100" alt="Image 6">
                    <h6 class="text-center text-secondary mt-2">Post Title</h6>
                </div>
            </div>
        </div>

    </section>

    <section class="downloadAppSection py-5 mt-4 padding-common">
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-md-6 offset-md-1 d-flex align-items-center order-lg-1 order-md-1 order-sm-2 order-2">
                    <div class="">
                        <h1 class="mt-0 mb-2 font-weight-bold text-lg-left text-ms-left text-sm-center text-center">Download the App...</h1>
                        <p class="text-lg-left text-ms-left text-sm-center text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                        <div class="mt-md-4 text-lg-left text-ms-left text-sm-center text-center">
                            <a href="" class="btn py-1 text-white bg-primary startBtn rounded">START NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center mb-lg-0 mb-md-0 mb-sm-4 mb-4 order-lg-2 order-md-2 order-sm-1 order-1">
                    <img style="width:70%; border-radius:50px;" class="" src="<?php echo get_template_directory_uri() ?>/public/theme/images/mobileImage.png">
                </div>
            </div>
        </div>
    </section>
    




</main>

<?php 

include get_theme_file_path('/public/tnc-footer.php');

?>


<script type="text/javascript">
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

    $(document).ready(function(){
        $('.slickSliderPost').slick({
            slidesToShow: 6,  
            slidesToScroll: 1, 
            dots: false,       
            infinite: true,   
            autoplay: false,
            arrows: false ,
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
