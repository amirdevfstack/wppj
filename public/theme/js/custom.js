jQuery(document).ready(function($) {
   var swiperOne = new Swiper(".swiperSliderOne", {
             spaceBetween: 10,
             mousewheel: {
               invert: false,
               forceToAxis: true,
               },
             keyboard: true,
             cssMode:false,
             loop:true,
             speed:1000,
            //  autoplay: {
            //         delay: 2000,
            //         disableOnInteraction: false
            //     },
             pagination: {
               el: ".swiperSliderOneMain .swiper-pagination",
               clickable: true,
             },
             navigation: {
               nextEl: ".swiperSliderOneMain .swiper-button-next",
               prevEl: ".swiperSliderOneMain .swiper-button-prev",
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
   
           var swiperTwo = new Swiper(".swiperSliderTwo", {
               spaceBetween: 10,
               mousewheel: {
               invert: false,
               forceToAxis: true,
               },
               keyboard: true,
               cssMode: false,  // Disable cssMode
               loop: true,
               speed: 1000,
               pagination: {
               el: ".swiperSliderTwo .swiper-pagination",
               clickable: true,
               },
               navigation: {
               nextEl: ".swiperSliderTwo .swiper-button-next",
               prevEl: ".swiperSliderTwo .swiper-button-prev",
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
             mousewheel: {
               invert: false,
               forceToAxis: true,
               },
             keyboard: true,
             cssMode:false,
             slidesPerView: 4,
             loop:true,
             speed:1000,
             pagination: {
               el: ".speakerSlider .swiper-pagination",
               clickable: true,
             },
          
             navigation: {
               nextEl: ".speakerSlider .swiper-button-next",
               prevEl: ".speakerSlider .swiper-button-prev",
           },
               
           });
   
        });