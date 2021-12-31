(function($) {
    "use strict";


		jQuery(document).ready(function ($) {
			
		var sidemenuoption = $('.sidemenuoption');
		var menuoption_open = $('.sidemenuoption-open');
		var menuoption_close = $('.menuoption-close');
		var overlay = $('.body-overlay');
		var is_closed = true;
		menuoption_open.on('click', function(e) {
			e.preventDefault();
			if (is_closed == true) {
				is_closed = false;
				sidemenuoption.removeClass('themelazer-close');
				sidemenuoption.addClass('themelazer-open');
				overlay.addClass('overlay-show');
			} else {
				is_closed = true;
				sidemenuoption.removeClass('themelazer-open');
				sidemenuoption.addClass('themelazer-close');
				overlay.removeClass('overlay-show');
			}
		}); 
		menuoption_close.add(overlay).on('click', function(e) {
			e.preventDefault();
			sidemenuoption.removeClass('themelazer-open');
			sidemenuoption.addClass('themelazer-close');
			overlay.removeClass('overlay-show');
			is_closed = true;
		});
		
		});
	
	
	var ennlilWidgetsScripts = function( $scope, $ ) {

		// Init
		initFlickity();
		
		setTimeout(() => {
            $('#flickity-thumbs').flickity('reloadCells');
        }, 500);

		/* Flickity Slider
		-------------------------------------------------------*/
		function initFlickity() {

			// 1st carousel, main
			$('#theme-flickity-box-slider').flickity({
			  cellAlign: 'left',
			  contain: true,
			  pageDots: false,
			  prevNextButtons: true,
			  draggable: false,
			  fade: true,
			  imagesLoaded: true,
			});

			// 2nd carousel, navigation
			$('#flickity-thumbs').flickity({
			  cellAlign: 'left',
			  asNavFor: '#theme-flickity-box-slider',
			  imagesLoaded: true,
			  contain: true,
			  pageDots: false,
			  prevNextButtons: false,
			  // draggable: false
			});

		}

	    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/global', ennlilWidgetsScripts);
    });
	
	
	
	    jQuery('.mainmenu ul.menu').slicknav({
            allowParentLinks: true,
			prependTo: '.ennlil-responsive-menu',
        });

	/* ----------------------------------------------------------- */
	/*  Sticky Header
	/* ----------------------------------------------------------- */
	$(window).on('scroll', function () {

      /**Fixed header**/
      if ($(window).scrollTop() > 250) {
      $('.navbar-sticky').addClass('sticky fade_down_effect');
      } else {
      $('.navbar-sticky').removeClass('sticky fade_down_effect');
      }
});


	jQuery(window).load(function() {
        jQuery("#preloader").fadeOut();
    });


	jQuery(window).load(function() {
	
		if (jQuery('.frontpage-slider-two').length) {
		jQuery('.frontpage-slider-two').owlCarousel({
			center: true,
			items: 2,
			autoplay: false,
			autoplayTimeout: 3000,
			smartSpeed: 800,
			loop: true,
			margin: 20,
			singleItem : true,
			dots: false,
			nav: true,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				280: {
					items: 1
				},
				576: {
					items: 2
				},
				768: {
					items: 2
				}
			}
		});   
	}		
	
	
	if (jQuery('.main-slider').length) {
		jQuery('.main-slider').owlCarousel({
			items: 1,
            loop: true,
			autoplay: false,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
            mouseDrag: true,
			smartSpeed: 1100,
			margin: 30,
			dots: true,
			nav: false,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				280: {
					items: 1
				},
				576: {
					items: 1
				},
				768: {
					items: 1
				}
			}
		});   
	}	
	
	
	if (jQuery('.widget-post-slider').length) {
		jQuery('.widget-post-slider').owlCarousel({
			items: 1,
            loop: true,
			autoplay: false,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
            mouseDrag: true,
			smartSpeed: 1100,
			margin: 0,
			dots: true,
			nav: false,
			navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
			responsive: {
				280: {
					items: 1
				},
				576: {
					items: 1
				},
				768: {
					items: 1
				}
			}
		});   
	}	
	
	
	/* ----------------------------------------------------------- */
	/*  Trending Slider
	/* ----------------------------------------------------------- */
   
   
   if (jQuery('.trending-slider').length > 0) {
	jQuery('.trending-slider').owlCarousel({
		dots: false,
		items: 4,
		autoplay: false,
		margin: 30,
		reponsiveClass: true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		autoplayHoverPause: true,
		loop:true,
		responsive: {
			// breakpoint from 0 up
			0: {
				items: 1,
			},
			// breakpoint from 480 up
			480: {
				items: 1,
			},
			// breakpoint from 768 up
			768: {
				items: 2,
			},
			// breakpoint from 768 up
			1200: {
				items: 4,
			}
		}
	});
}

});	

   /* ----------------------------------------------------------- */
   /*  Video popup
   /* ----------------------------------------------------------- */

  if ($('.video-play-btn').length > 0) {
   $('.video-play-btn').magnificPopup({
       type: 'iframe',
       mainClass: 'mfp-with-zoom',
       zoom: {
           enabled: true, // By default it's false, so don't forget to enable it

           duration: 300, // duration of the effect, in milliseconds
           easing: 'ease-in-out', // CSS transition easing function

           opener: function (openerElement) {
               return openerElement.is('img') ? openerElement : openerElement.find('img');
           }
       }
   });
}

if ($('.ennlil_video_post_Button').length > 0) {
   $('.ennlil_video_post_Button').magnificPopup({
       type: 'iframe',
       mainClass: 'mfp-with-zoom',
       zoom: {
           enabled: true, // By default it's false, so don't forget to enable it

           duration: 300, // duration of the effect, in milliseconds
           easing: 'ease-in-out', // CSS transition easing function

           opener: function (openerElement) {
               return openerElement.is('img') ? openerElement : openerElement.find('img');
           }
       }
   });
}


   
        // Search Popup JS
        $('.close-btn').on('click',function() {
            $('.search_box__Wrap').fadeOut();
            $('.search-btn').show();
            $('.close-btn').removeClass('active');
        });
        $('.search-btn').on('click',function() {
            $(this).hide();
            $('.search_box__Wrap').fadeIn();
            $('.close-btn').addClass('active');
        });
	
	$(".popular-grid-slider").owlCarousel(
           {
            items: 2,
            dots: false,
            loop: true,
            nav: true,
            margin: 30,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                // breakpoint from 0 up
                0: {
                    items: 1,
                },
                // breakpoint from 480 up
                480: {
                    items: 2,
                },
                // breakpoint from 768 up
                768: {
                    items: 2,
                },
                // breakpoint from 768 up
                1200: {
                    items: 2,
                }
            }
        }
    );
	
	
	
	/* ----------------------------------------------------------- */
	/*  Back to top
	/* ----------------------------------------------------------- */

		$(window).scroll(function () {
			if ($(this).scrollTop() > 300) {
				 $('.backto').fadeIn();
			} else {
				 $('.backto').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.backto').on('click', function () {
			 $('.backto').tooltip('hide');
			 $('body,html').animate({
				  scrollTop: 0
			 }, 800);
			 return false;
		});
		
		$('.backto').tooltip('hide');
	
	
	setTimeout(function()
    {
        $('#preloader').delay(150).fadeOut('slow');
    }, 10000);
	



jQuery(window).load(function() {

    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
	  virtualTranslate: true,
	  
	  
	 breakpoints: {
			// when window width is >= 320px
			320: {
			  slidesPerView: 1,
			  spaceBetween: 10
			},
			// when window width is >= 480px
			480: {
			  slidesPerView: 2,
			  spaceBetween: 10
			},
			// when window width is >= 640px
			640: {
			  slidesPerView: 2,
			  spaceBetween: 10
			},
			
			991: {
			  slidesPerView: 3,
			  spaceBetween: 10
			},
			
			1300: {
			  slidesPerView: 4,
			  spaceBetween: 10
			}
			
			
	}
	  
	  
	  
	  
    });
	

	
	
	
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
	  effect: 'fade',
      thumbs: {
        swiper: galleryThumbs,
      },
    });

});


	/* ----------------------------------------------------------- */
	/*  Sticky Header
	/* ----------------------------------------------------------- */	
		
	$(window).on("scroll", function () {
		
	if ( $( '#theme-header' ).hasClass( "stick-top" ) ) {
		
		if ($(window).scrollTop() > 200) {
            $(".site-navigation").addClass("sticky animated slideInDown");
        } else {
            $(".site-navigation").removeClass("sticky animated slideInDown");
        }	
	}
	
	if ( $( '#common-theme-header' ).hasClass( "stick-top" ) ) {
		
		if ($(window).scrollTop() > 200) {
            $(".header-three-area").addClass("sticky animated slideInDown");
        } else {
            $(".header-three-area").removeClass("sticky animated slideInDown");
        }	
	}
	
	if ( $( '#common-theme-header-four' ).hasClass( "stick-top" ) ) {
		
		if ($(window).scrollTop() > 200) {
            $(".header-three-area").addClass("sticky animated slideInDown");
        } else {
            $(".header-three-area").removeClass("sticky animated slideInDown");
        }	
	}
	
	
    });
	
	
	//Create the cookie object
    var cookieStorage = {
        setCookie: function setCookie(key, value, time, path) {
            var expires = new Date();
            expires.setTime(expires.getTime() + time);
            var pathValue = '';
            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }
            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        },
        removeCookie: function removeCookie(key) {
            document.cookie = key + '=; Max-Age=0; path=/';
        }
    };

    //Click on dark mode icon. Add dark mode classes and wrappers. Store user preference through sessions
    $('.wpnm-button').click(function() {
        //Show either moon or sun
        $('.wpnm-button').toggleClass('active');
        //If dark mode is selected
        if ($('.wpnm-button').hasClass('active')) {
            //Add dark mode class to the body
            $('body').addClass('dark-mode');
            cookieStorage.setCookie('yonkovNightMode', 'true', 2628000000, '/');
        } else {
            $('body').removeClass('dark-mode');
            setTimeout(function() {
                cookieStorage.removeCookie('yonkovNightMode');
            }, 100);
        }
    })

    //Check Storage. Display user preference 
    if (cookieStorage.getCookie('yonkovNightMode')) {
        $('body').addClass('dark-mode');
        $('.wpnm-button').addClass('active');
    }








})(jQuery);