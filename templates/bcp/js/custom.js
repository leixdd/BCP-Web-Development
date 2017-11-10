(function($) {

    "use strict";

    // caching selectors
    var mainWindow           = $(window),
        mainHeader           = $('header'),
        mainBody             = $('body'),
		stickyMenu           = $('#sticky'),
        mainStatus           = $('#status'),
        mainPreloader        = $('#preloader'),
        slideCarousel        = $('.slide-carousel'),
        testimonialCarousel  = $('.all-testimonial'),
        productimageCarousel = $('.all-product-image'),
        galleryPhoto         = $('.gallery-photo'),
        scrollUp             = $('.scrollup'),
		navMobile            = $('nav#mobile-nav'),
        mainCounter          = $('.counter');


    mainWindow.on('load', function() {

	//mobile menu
	navMobile.meanmenu();

	//Sticky Menu
	$(window).on('scroll', function(){
		if( $(window).scrollTop() > 0 ){
			stickyMenu.addClass('stick');
          //  stickyMenu.removeClass("hd-c-text"); //lei lei
            //stickyMenu.addClass("hd-c-text2");
			} else {
			stickyMenu.removeClass('stick');
            stickyMenu.addClass("hd-c-text");
      //      stickyMenu.removeClass("hd-c-text2")
		}
	});
        // Testimonial Crousel
        testimonialCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
			navigation:false,
            responsiveClass: true,
			margin: 25,
            navText: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                992: {
                    items: 2,
                    nav: true,
                    loop: true
                },
				1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        });
		// Product Image  Crousel
        productimageCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
			navigation:false,
            responsiveClass: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });


        // Preloader
        mainStatus.fadeOut();
        mainPreloader.delay(350).fadeOut('slow');
        mainBody.delay(350).css({
            'overflow': 'visible'
        });

        // Slider
        slideCarousel.owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
            responsiveClass: true,
            mouseDrag: false,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });


        slideCarousel.on('translate.owl.carousel', function () {
            $('.this-item h2').removeClass('fadeInUp animated').hide();
            $('.this-item h3').removeClass('fadeInUp animated').hide();
            $('.this-item p').removeClass('fadeInUp animated').hide();
        });

        slideCarousel.on('translated.owl.carousel', function () {
            $('.this-item h2').addClass('fadeInUp animated').show();
            $('.this-item h3').addClass('fadeInUp animated').show();
            $('.this-item p').addClass('fadeInUp animated').show();
        });

        // Magnific Popup
        galleryPhoto.magnificPopup({
            type: 'image',
            gallery: {
              enabled: true
            },
        });

        // Scroll to Top
        mainWindow.on("scroll", function() {
            if ($(this).scrollTop() > 200){
                mainHeader.addClass("sticky");

                mainBody.addClass("sticky");
                scrollUp.show();
            }
            else{
                mainHeader.removeClass("sticky");
                mainBody.addClass("sticky");
                scrollUp.hide();
            }
        });

        // Click event to scroll to top
        scrollUp.on("click", function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        // Counter
        mainCounter.counterUp({
            delay: 10,
            time: 1000
        });

    });

})(jQuery);
