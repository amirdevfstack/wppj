<?php

/**
 * Template Name: TNC Landing Page
 * Description: Custom Landing page template from TNC.
 */

include get_theme_file_path('/public/tnc-header.php');


?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<style>
    .firstHomeContainer, .loveWithAndWithOut, .featuredSpeakerImage, .downloadAppSection {
        background-image:url("https://www.picsum.photos/100/100");
        /* background-image:url("<?php echo get_template_directory_uri() ?>/public/theme/images/images.jpg"); */
        background-repeat:no-repeat;
        background-size: cover;
    }
</style>

<main class="wrapper" style=" margin-top:50px;">

    <section class="firstHomeContainer padding-common">
        <div class="container">
            <div class="row pb-4">

                <div class="col-lg-6 px-0 d-flex flex-column justify-content-end">
                    <h4 class="m-0">Love is Contagious</h4>
                    <h4 class="font-weight-bold my-0">Love is Infectious</h4>
                    <div class="mt-4">
                        <a href="" class="btn py-1 text-dark startBtn border border-dark">START NOW</a>
                    </div>
                </div>
                <div class="col-lg-6 px-0 d-flex flex-column align-items-end">
                    <div class="">
                        <div class="font-weight-bold text-secondary mb-2">Next Event</div>
                        <!-- <video width="320" height="240" controls autoplay muted>
                            <source src="<?php echo get_template_directory_uri() ?>/public/theme/videos/video.mp4" >
                        </video> -->
                        <video class="" src="<?php echo get_template_directory_uri() ?>/public/theme/videos/video.mp4" controls muted width="500">
                        </video>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="paginationContainer padding-10 mx-2 py-4">
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-lg-6">
                    <span>Events with a <span class="font-weight-bold">purpose</span>...</span>
                </div>
                <div class="col-lg-6 text-right">
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
                <div class="col-lg-6">
                    <h3 class="text-secondary font-weight-bold mb-2">Feature Section</h3>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                    <div class="mt-5">
                        <h3 class="m-0">Love is Contagious</h3>
                        <h3 class="font-weight-bold my-0">Love is Infectious</h3>
                        <div class="mt-4">
                            <a href="" class="btn py-1 text-dark startBtn border border-dark">START NOW</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/featureLogo.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
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
                <a href="" class="btn py-1 text-dark startBtn rounded border border-dark">START NOW</a>
            </div>
        </div>
    </section>

    <section class="featuredSpeakerSection py-5 padding-common">
        <div class="container p-0">
            <div class="row p-0">
                <div class="col-lg-5">
                    <div class="featuredSpeakerImage p-2 rounded">
                        <div class="featuredContent">
                            <h4 class="mb-1 mt-0">Featured Quote</h4>
                            <p class="">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula."</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h2 class="text-white font-weight-bold mb-2">Featured Speaker</h2>
                    <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                    <div class="mt-4">
                        <a href="" class="btn py-1 text-dark startBtn rounded border border-dark">START NOW</a>
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
                <div class="col-lg-6">
                    <span>Latest featured <span class="font-weight-bold">posts</span>...</span>
                </div>
                <div class="col-lg-6 text-right">
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
                <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                    <div class="">
                        <h1 class="mt-0 mb-2 font-weight-bold">Download the App...</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                        <div class="mt-4">
                            <a href="" class="btn py-1 text-dark startBtn rounded border border-dark">START NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <img style="width:70%; border-radius:50px;" class="" src="<?php echo get_template_directory_uri() ?>/public/theme/images/mobileImage.png">
                </div>
            </div>
        </div>
    </section>

</main>

<?php

include get_theme_file_path('/public/tnc-footer.php');

?>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Slider JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slickSlider').slick({
            slidesToShow: 6,  
            slidesToScroll: 1, 
            dots: true,       
            infinite: true,   
            autoplay: false,
            arrows: false      
        });
    });
    $(document).ready(function(){
        $('.slickSliderPost').slick({
            slidesToShow: 6,  
            slidesToScroll: 1, 
            dots: false,       
            infinite: true,   
            autoplay: false,
            arrows: false      
        });
    });
</script>
