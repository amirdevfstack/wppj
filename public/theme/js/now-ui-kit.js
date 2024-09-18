/*!

 =========================================================
 * Now-ui-kit-pro - v1.2.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/now-ui-kit-pro
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
  * View License on http://www.creative-tim.com/license

 * Designed by www.invisionapp.com Coded by www.creative-tim.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */

var transparent = true;
var big_image;

var transparentDemo = true;
var fixedTop = false;

var navbar_initialized,
    backgroundOrange = false,
    toggle_initialized = false;

(function ($) {

    $(document).ready(function () {
        //  Activate the Tooltips
        $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

        //    Activate bootstrap-select
        if ($(".selectpicker").length != 0) {
            $(".selectpicker").selectpicker({
                iconBase: "now-ui-icons",
                tickIcon: "ui-1_check"
            });
        };

        if ($(window).width() >= 768) {
            big_image = $('.header[data-parallax="true"]');
            if (big_image.length != 0) {
                $(window).on('scroll', nowuiKit.checkScrollForParallax);
            }
        }

        // Activate Popovers and set color for popovers
        $('[data-toggle="popover"]').each(function () {
            color_class = $(this).data('color');
            $(this).popover({
                template: '<div class="popover popover-' + color_class + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
            });
        });

        // Activate the image for the navbar-collapse
        nowuiKit.initNavbarImage();

        $navbar = $('.navbar[color-on-scroll]');
        scroll_distance = $navbar.attr('color-on-scroll') || 500;

        // Check if we have the class "navbar-color-on-scroll" then add the function to remove the class "navbar-transparent" so it will transform to a plain color.
        if ($('.navbar[color-on-scroll]').length != 0) {
            nowuiKit.checkScrollForTransparentNavbar();
            $(window).on('scroll', nowuiKit.checkScrollForTransparentNavbar)
        }

        $('.form-control').on("focus", function () {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function () {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });

        // Activate bootstrapSwitch
        $('.bootstrap-switch').each(function () {
            $this = $(this);
            data_on_label = $this.data('on-label') || '';
            data_off_label = $this.data('off-label') || '';

            $this.bootstrapSwitch({
                onText: data_on_label,
                offText: data_off_label
            });
        });

        if ($(window).width() >= 992) {
            big_image = $('.page-header-image[data-parallax="true"]');

            $(window).on('scroll', nowuiKit.checkScrollForParallax);
        }

        // Activate Carousel
        $('.carousel').carousel({
            interval: 4000
        });

        if ($(".datetimepicker").length != 0) {
            $('.datetimepicker').datetimepicker({
                icons: {
                    time: "now-ui-icons tech_watch-time",
                    date: "now-ui-icons ui-1_calendar-60",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'now-ui-icons arrows-1_minimal-left',
                    next: 'now-ui-icons arrows-1_minimal-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }

        if ($(".datepicker").length != 0) {
            $('.datepicker').datetimepicker({
                format: 'MM/DD/YYYY',
                icons: {
                    time: "now-ui-icons tech_watch-time",
                    date: "now-ui-icons ui-1_calendar-60",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'now-ui-icons arrows-1_minimal-left',
                    next: 'now-ui-icons arrows-1_minimal-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }

        if ($(".timepicker").length != 0) {
            $('.timepicker').datetimepicker({
                //          format: 'H:mm',    // use this format if you want the 24hours timepicker
                format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
                icons: {
                    time: "now-ui-icons tech_watch-time",
                    date: "now-ui-icons ui-1_calendar-60",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'now-ui-icons arrows-1_minimal-left',
                    next: 'now-ui-icons arrows-1_minimal-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        }
    });

    $(window).on('resize', function () {
        nowuiKit.initNavbarImage();
    });

    $(document).on('click', '.navbar-toggler', function () {
        $toggle = $(this);

        if (nowuiKit.misc.navbar_menu_visible == 1) {
            $('html').removeClass('nav-open');
            nowuiKit.misc.navbar_menu_visible = 0;
            $('#bodyClick').remove();
            setTimeout(function () {
                $toggle.removeClass('toggled');
            }, 550);
        } else {
            setTimeout(function () {
                $toggle.addClass('toggled');
            }, 580);
            div = '<div id="bodyClick"></div>';
            $(div).appendTo('body').click(function () {
                $('html').removeClass('nav-open');
                nowuiKit.misc.navbar_menu_visible = 0;
                setTimeout(function () {
                    $toggle.removeClass('toggled');
                    $('#bodyClick').remove();
                }, 550);
            });

            $('html').addClass('nav-open');
            nowuiKit.misc.navbar_menu_visible = 1;
        }
    });

    nowuiKit = {
        misc: {
            navbar_menu_visible: 0
        },

        checkScrollForTransparentNavbar: debounce(function () {
            if ($(document).scrollTop() > scroll_distance) {
                if (transparent) {
                    transparent = false;
                    $('.navbar[color-on-scroll]').removeClass('navbar-transparent');
                }
            } else {
                if (!transparent) {
                    transparent = true;
                    $('.navbar[color-on-scroll]').addClass('navbar-transparent');
                }
            }
        }, 17),

        initNavbarImage: function () {
            var $navbar = $('.navbar').find('.navbar-translate').siblings('.navbar-collapse');
            var background_image = $navbar.data('nav-image');

            if ($(window).width() < 991 || $('body').hasClass('burger-menu')) {
                if (background_image != undefined) {
                    $navbar.css('background', "url('" + background_image + "')")
                        .removeAttr('data-nav-image')
                        .css('background-size', "cover")
                        .addClass('has-image');
                }
            } else if (background_image != undefined) {
                $navbar.css('background', "")
                    .attr('data-nav-image', '' + background_image + '')
                    .css('background-size', "")
                    .removeClass('has-image');
            }
        },

        initSliders: function () {
            // Sliders for demo purpose in refine cards section
            var slider = document.getElementById('sliderRegular');

            noUiSlider.create(slider, {
                start: 40,
                connect: [true, false],
                range: {
                    min: 0,
                    max: 100
                }
            });

            var slider2 = document.getElementById('sliderDouble');

            noUiSlider.create(slider2, {
                start: [20, 60],
                connect: true,
                range: {
                    min: 0,
                    max: 100
                }
            });
        },

        checkScrollForParallax: debounce(function () {

            oVal = ($(window).scrollTop() / 3);
            big_image.css({
                'transform': 'translate3d(0,' + oVal + 'px,0)',
                '-webkit-transform': 'translate3d(0,' + oVal + 'px,0)',
                '-ms-transform': 'translate3d(0,' + oVal + 'px,0)',
                '-o-transform': 'translate3d(0,' + oVal + 'px,0)'
            });

        }, 6),

        initContactUsMap: function () {
            var coordinates = document.getElementById('contactUsMap').getAttribute('data-coordinates');
            var parts = coordinates.split(',');
            var latitude = parseFloat(parts[0]);
            var longitude = parseFloat(parts[1]);

            // Create a LatLng object with the extracted coordinates
            var myLatlng = new google.maps.LatLng(latitude, longitude);

            var mapOptions = {
                zoom: 13,
                center: myLatlng,
                scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
                styles: [
                  {
                      "featureType": "all",
                      "elementType": "labels",
                      "stylers": [
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "saturation": 36
                          },
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 40
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "visibility": "on"
                          },
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 16
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.icon",
                      "stylers": [
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 20
                          }
                      ]
                  },
                  {
                      "featureType": "administrative",
                      "elementType": "geometry.stroke",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 17
                          },
                          {
                              "weight": 1.2
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.country",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.locality",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#c4c4c4"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.neighborhood",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "landscape",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 20
                          }
                      ]
                  },
                  {
                      "featureType": "poi",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 21
                          },
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "poi.business",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          },
                          {
                              "lightness": "0"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "geometry.stroke",
                      "stylers": [
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#ffffff"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 18
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#575757"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#ffffff"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "color": "#2c2c2c"
                          }
                      ]
                  },
                  {
                      "featureType": "road.local",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 16
                          }
                      ]
                  },
                  {
                      "featureType": "road.local",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#999999"
                          }
                      ]
                  },
                  {
                      "featureType": "transit",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 19
                          }
                      ]
                  },
                  {
                      "featureType": "water",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 17
                          }
                      ]
                  }
              ]
            };

            var map = new google.maps.Map(document.getElementById("contactUsMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title: "Hello World!"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        },


        initContactUs2Map: function () {
            var coordinates = document.getElementById('contactUs2Map').getAttribute('data-coordinates');

            console.log(coordinates, ' HERE HERE ');

            var parts = coordinates.split(',');
            var latitude = parseFloat(parts[0]);
            var longitude = parseFloat(parts[1]);

            // Create a LatLng object with the extracted coordinates
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            
            var mapOptions = {
                zoom: 13,
                center: myLatlng,
                scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
                styles: [
                  {
                      "featureType": "all",
                      "elementType": "labels",
                      "stylers": [
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "saturation": 36
                          },
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 40
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "visibility": "on"
                          },
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 16
                          }
                      ]
                  },
                  {
                      "featureType": "all",
                      "elementType": "labels.icon",
                      "stylers": [
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 20
                          }
                      ]
                  },
                  {
                      "featureType": "administrative",
                      "elementType": "geometry.stroke",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 17
                          },
                          {
                              "weight": 1.2
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.country",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.locality",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#c4c4c4"
                          }
                      ]
                  },
                  {
                      "featureType": "administrative.neighborhood",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "landscape",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 20
                          }
                      ]
                  },
                  {
                      "featureType": "poi",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 21
                          },
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "poi.business",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "visibility": "on"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          },
                          {
                              "lightness": "0"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "geometry.stroke",
                      "stylers": [
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#ffffff"
                          }
                      ]
                  },
                  {
                      "featureType": "road.highway",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "color": "#e5c163"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 18
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "geometry.fill",
                      "stylers": [
                          {
                              "color": "#575757"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#ffffff"
                          }
                      ]
                  },
                  {
                      "featureType": "road.arterial",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "color": "#2c2c2c"
                          }
                      ]
                  },
                  {
                      "featureType": "road.local",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 16
                          }
                      ]
                  },
                  {
                      "featureType": "road.local",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#999999"
                          }
                      ]
                  },
                  {
                      "featureType": "transit",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 19
                          }
                      ]
                  },
                  {
                      "featureType": "water",
                      "elementType": "geometry",
                      "stylers": [
                          {
                              "color": "#000000"
                          },
                          {
                              "lightness": 17
                          }
                      ]
                  }
              ]
            };

            var map = new google.maps.Map(document.getElementById("contactUs2Map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title: "Hello World!"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        }
    }

    // Returns a function, that, as long as it continues to be invoked, will not
    // be triggered. The function will be called after it stops being called for
    // N milliseconds. If `immediate` is passed, trigger the function on the
    // leading edge, instead of the trailing.

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            }, wait);
            if (immediate && !timeout) func.apply(context, args);
        };
    };

    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initContactUs2Map();
    });
})(jQuery);    