<?php
   /**
    * Template Name: TNC Landing Page
    * Description: Custom Landing page template from TNC.
    */
   
   include get_theme_file_path('/public/tnc-header.php');
   ?>

<main class="wrapper" style=" margin-top:50px;">
   <section class="firstHomeContainer padding-common" style="background-image:url('<?php echo get_template_directory_uri() ?>/public/theme/images/first.jpg');
   background-repeat:no-repeat; background-size: cover; background-position:center center;">
      <div class="container">
         <div class="row pb-4">
            <div class="col-md-6 px-0 d-flex flex-column justify-content-end align-items-lg-start align-items-md-start align-items-sm-center align-items-center">
               <h1 class="m-0 font-weight-bold text-white text-lg-left text-md-left text-sm-start text-center">Love is Contagious</h1>
               <h4 class="font-weight-bold my-0 text-white">Love is Infectious</h4>
               <div class="mt-4">
                  <a href="#pablo" class="btn btn-primary btn-lg btn-round">Start Now</a>
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
               <div class="pagination-container d-flex justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                  <ul class="pagination pagination-primary">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item active"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="homePageSlider padding-10">
      <div class="container p-0 swiper swiperSliderOne">
         <div class="swiper-wrapper">
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 1">
               <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 2">
               <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 3">
                 <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 4">
                 <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 5">
                 <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 6">
                 <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
            <div class="swiper-slide rounded border border-secondary blogDiv">
               <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="Image 6">
                 <div class="blogDetail w-100 px-2">
                  <h4 class="m-0 text-white font-weight-bold">Event Name</h4>
                  <div class="d-flex justify-content-between">
                     <h5 class="m-0 txt-white">MONTH XX</h5>
                     <h5 class="m-0 txt-white">XX EST</h5>
                  </div>
               </div>
            </div>
         </div>
        </div>                 
        <hr class="border border-secondary" width="300">
        <div class="swiper-pagination firstSwiperPagination"></div>
        <hr class="border border-secondary" width="300">
   </section>
   <section class="featuredSection padding-common marginTop">
      <div class="container p-0">
         <div class="row">
            <div class="col-md-6 order-lg-1 order-md-1 order-sm-2 order-2 mt-lg-0 mt-md-3 mt-sm-3 mt-3">
               <h2 class="text-secondary font-weight-bold mb-2">Feature Section</h2>
               <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
               <div class="mt-md-5">
                  <h3 class="m-0">Love is Contagious</h3>
                  <h3 class="font-weight-bold my-0">Love is Infectious</h3>
                  <div class="mt-md-4">
                     <a href="#pablo" class="btn btn-primary btn-lg btn-round">Start Now</a>
                  </div>
               </div>
               <div class="mt-4">
                  <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/featureLogo.png" alt="">
               </div>
            </div>
            <div class="col-md-6 order-lg-2 order-md-2 order-sm-1 order-1">
               <div class="featuredImage">
                  <img src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg18.jpg" alt="">
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="header-3">
      <div id="carouselExampleIndicators" class="my-5">
         <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
               <div class="page-header header-filter">
                  <div class="page-header-image" style="background-image: url('<?php echo get_template_directory_uri() ?>/public/theme/images/bg15.jpg');"></div>
                  <div class="container">
                     <div class="content-center">
                        <div class="row">
                           <div class="col-md-8 ml-auto mr-auto text-center">
                              <h1 class="title">Island of legends.</h1>
                              <h4 class="description ">The islands of Malta and Gozo are brilliant for a family holiday, packed with fun places to visit whatever your children’s ages. The islands’ small size means everywhere is within easy reach.</h4>
                              <br>
                              <h5>Connect with us on:</h5>
                              <div class="buttons d-flex justify-content-center">
                                 <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                 <i class="fab fa-twitter"></i>
                                 </a>
                                 <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                 <i class="fab fa-facebook-square"></i>
                                 </a>
                                 <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round mt-2 mx-1 d-flex justify-content-center align-items-center">
                                 <i class="fab fa-google-plus"></i>
                                 </a>
                                 <a href="#pablo" class="btn btn-icon btn-neutral btn-danger btn-round  mt-2 mx-1 d-flex justify-content-center align-items-center">
                                 <i class="fab fa-instagram"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="featuredSpeakerSection py-5 padding-common" >
      <div class="container p-0">
         <div class="row p-0">
            <div class="col-md-5">
               <div class="featuredSpeakerImage p-2 rounded" style="background-image:url('<?php echo get_template_directory_uri() ?>/public/theme/images/bg15.jpg');
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position:center center;">
                  <div class="featuredContent px-3">
                     <h4 class="mb-1 mt-0 text-white">Featured Quote</h4>
                     <p class="text-white">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula."</p>
                  </div>
               </div>
            </div>
            <div class="col-md-6 offset-md-1">
               <h2 class="text-white font-weight-bold mb-2 mt-lg-0 mt-md-0 mt-sm-2 mt-2">Featured Speaker</h2>
               <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
               <div class="mt-4">
                  <a href="#pablo" class="btn btn-primary btn-lg btn-round">Start Now</a>
               </div>
               <div class="swiper speakerSlider cardContainer">
                  <div class=" swiper-wrapper">
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                     <div class=" swiper-slide">
                        <img class="rounded" src="<?php echo get_template_directory_uri() ?>/public/theme/images/james.jpg" alt="">
                        <h6 class="text-white text-center mt-1">Person Name</h6>
                     </div>
                  </div>
                  <div class="swiperButton">
                     <div class="swiper-button-prev swiperBtn rounded-circle" data-background-color="black"></div>
                     <div class="swiper-button-next swiperBtn rounded-circle" data-background-color="black"></div>
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
               <div class="pagination-container d-flex justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center">
                  <ul class="pagination pagination-primary">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
                        </a>
                     </li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item active"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="homePageSlider padding-10 ">
      <div class="container p-0 swiperSliderOne">
         <div class="slickSliderPost swiper-wrapper">
            <div class="mx-2 swiper-slide">
               <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
            <div class="mx-2 swiper-slide">
            <div class="blogDiv rounded border border-secondary">
                  <img class="rounded border border-secondary" src="<?php echo get_template_directory_uri() ?>/public/theme/images/bg24.jpg" alt="Image 1">
                  <div class="blogDetail px-2">
                     <h4 class="m-0 text-white font-weight-bold">Blog Title</h4>
                     <h5 class="m-0 txt-white">BLOG DATE</h5>
                  </div>
               </div>
               <h6 class="text-center text-secondary mt-2">Post Title</h6>
            </div>
         </div>
      </div>
   </section>
   <section class="downloadAppSection py-5 mt-4 padding-common bg-light">
      <div class="container p-0">
         <div class="row p-0">
            <div class="col-md-6 offset-md-1 d-flex align-items-center order-lg-1 order-md-1 order-sm-2 order-2">
               <div class="">
                  <h2 class="mt-0 mb-2 font-weight-bold text-lg-left text-ms-left text-sm-center text-center">Download the App...</h2>
                  <p class="text-lg-left text-ms-left text-sm-center text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis, elit quis egestas rhoncus, lacus erat ultricies turpis, in hendrerit erat lectus quis est. Phasellus aliquet et nibh vitae cursus. Integer iaculis tempus ipsum et ultricies. Sed faucibus ex nibh, non laoreet velit tempor et. Curabitur luctus cursus lectus sed condimentum. Donec tincidunt mi a dui volutpat, eu gravida sem tempor. Suspendisse aliquam volutpat vehicula.</p>
                  <div class="mt-md-4 text-lg-left text-ms-left text-sm-center text-center">
                     <a href="#pablo" class="btn btn-primary btn-lg btn-round">Start Now</a>
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
<script>
   var swiper = new Swiper(".swiperSliderOne", {
             spaceBetween: 10,
             mousewheel: true,
             keyboard: true,
             cssMode:true,
             loop:true,
             speed:1000,
            //  autoplay: {
            //         delay: 2000,
            //         disableOnInteraction: false
            //     },
             pagination: {
               el: ".swiper-pagination",
               clickable: true,
             },
             navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
               breakpoints: {
                   320: {
                       slidesPerView: 2,
                   },
                   400: {
                       slidesPerView: 2,
                   },
                   768: {
                       slidesPerView: 4,
                   },
                   1200: {
                       slidesPerView: 6,
                   },
               },
           });
   
   
           var speakerSlider = new Swiper(".speakerSlider", {
             spaceBetween: 10,
             mousewheel: true,
             keyboard: true,
             cssMode:true,
             slidesPerView: 4,
             loop:true,
             speed:1000,
             pagination: {
               el: ".swiper-pagination",
               clickable: true,
             },
             navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
           },
               
           });
   
   
     
</script>
