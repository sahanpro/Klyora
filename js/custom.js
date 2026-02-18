/* -------------------------------------------------------

[ Custom settings ]

01. ScrollIt
02. Navbar scrolling background
03. Close navbar-collapse when a  clicked
04. Sections background image from data background 
05. Animations
06. YouTubePopUp
07. Slider & Slider Fade OwlCarousel
08. Testimonials owlCarousel
09. Barber Services owlCarousel
10. Barber Services 2 owlCarousel
11. First-Class Services owlCarousel
12. News owlCarousel
13. Team owlCarousel
14. Clients owlCarousel
15. MagnificPopup Gallery
16. Smooth Scrolling
17. Scroll back to top
18. Select2
19. Datepicker
20. Pricing Tabs
21. Pricing Accordion
22. Accordion Box (for Faqs)
23. Preloader

------------------------------------------------------- */
$(function () {
    "use strict";
    var wind = $(window);
    // ScrollIt *
    $.scrollIt({
        upKey: 38, // key code to navigate to the next section
        downKey: 40, // key code to navigate to the previous section
        easing: 'swing', // the easing function for animation
        scrollTime: 600, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -70 // offste (in px) for fixed top navigation
    });
    
    // Navbar scrolling background 
    wind.on("scroll", function () {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo> img");
        if (bodyScroll > 100) {
            navbar.addClass("nav-scroll");
            logo.attr('src', 'https://shtheme.com/demosd/perukar/wp-content/uploads/2023/02/logo.png');
        } else {
            navbar.removeClass("nav-scroll");
            logo.attr('src', 'https://shtheme.com/demosd/perukar/wp-content/uploads/2023/02/logo.png');
        }
    });
    

    // Close navbar-collapse when a  clicked 
    $(".navbar-nav .dropdown-item a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });
    
    // Sections background image from data background 
    var pageSection = $(".bg-img, section");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });
    
    // Animations *
    var contentWayPoint = function () {
        var i = 0;
        $('.animate-box').waypoint(function (direction) {
            if (direction === 'down' && !$(this.element).hasClass('animated')) {
                i++;
                $(this.element).addClass('item-animate');
                setTimeout(function () {
                    $('body .animate-box.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            } else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            } else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            } else {
                                el.addClass('fadeInUp animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, {
            offset: '85%'
        });
    };
    $(function () {
        contentWayPoint();
    });
    
    // YouTubePopUp 
    $("a.vid").YouTubePopUp();
    
    // Slider & Slider Fade OwlCarousel 
    var owl = $('.header .owl-carousel');
    // Slider owlCarousel - (Inner Page Slider)
    $('.slider .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 5000,
        nav: false,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                dots: true
            },
            600: {
                dots: true
            },
            1000: {
                dots: true
            }
        }
    });
    // Slider owlCarousel (Homepage Slider)
    $('.slider-fade .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        margin: 0,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        nav: true,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                dots: true
            },
            600: {
                dots: true
            },
            1000: {
                dots: true
            }
        }
    });
    owl.on('changed.owl.carousel', function (event) {
        var item = event.item.index - 2; // Position of the current item
        $('span.icon').removeClass('animated fadeInUp');
        $('h6').removeClass('animated fadeInUp');
        $('h4').removeClass('animated fadeInUp');
        $('h1').removeClass('animated fadeInUp');
        $('p').removeClass('animated fadeInUp');
        $('.button-1').removeClass('animated fadeInUp');
        $('.button-2').removeClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('span.icon').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h6').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('.button-1').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('.button-2').addClass('animated fadeInUp');
    });

    $('.rooms2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    });
    
    // Testimonials owlCarousel 
    $('.testimonials .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        autoplayTimeout: 9000,
        dots: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    // Barber Services owlCarousel 
    $('.barber-services .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Barber Services 2 owlCarousel 
    $('.barber-services-2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    // Services 1 owlCarousel 
    $('.services-1 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // First-Class Services owlCarousel 
    $('.first-class-services .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // News owlCarousel 
    $('.news .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    

    
    // Team owlCarousel 
    $('.team .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        mouseDrag: true,
        autoplay: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Clients owlCarousel 
    $('.clients .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        dots: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    
    // MagnificPopup Gallery
    $('.gallery').magnificPopup({
        delegate: '.popimg',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    $(".img-zoom").magnificPopup({
        type: "image",
        closeOnContentClick: !0,
        mainClass: "mfp-fade",
        gallery: {
            enabled: !0,
            navigateByImgClick: !0,
            preload: [0, 1]
        }
    })
    $('.magnific-youtube, .magnific-vimeo, .magnific-custom').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300,
        preloader: false,
        fixedContentPos: false
    });
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
    
    // Smooth Scrolling
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]').not('[href="#0"]').not('.no-scroll').click(function (event) {
            // On-page links
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
    
    //  Scroll back to top
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });
    jQuery('.progress-wrap').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    })
    
    // Select2
    $('.select2').select2({
        minimumResultsForSearch: Infinity,
    });
    
    // Datepicker
    $(".datepicker").datepicker({
        orientation: "top"
    });
    
    //  Pricing Tabs
    var wind = $(window);
    $('.tabs .tab-links').on('click', '.item-link', function () {
        var tab_id = $(this).attr('data-tab');
        $('.tabs .tab-links .item-link').removeClass('current');
        $(this).addClass('current');
        $('.tab-content').slideUp();
        $("#" + tab_id).slideDown();
    });
    $('.tabs-fade .tab-links').on('click', '.item-link', function () {
        var tab2_id = $(this).attr('data-tab');
        $('.tabs-fade .tab-links .item-link').removeClass('current');
        $(this).addClass('current');
        $('.tab-content').fadeOut();
        $("#" + tab2_id).fadeIn();
    });
    
    //  Pricing Accordion
    $(".accordion").on("click", ".title", function () {
        $(this).next().slideDown();
        $(".accordion-info").not($(this).next()).slideUp();
    });
    $(".accordion").on("click", ".item", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    
    // Accordion Box (for Faqs)
    if ($(".accordion-box").length) {
        $(".accordion-box").on("click", ".acc-btn", function () {
            var outerBox = $(this).parents(".accordion-box");
            var target = $(this).parents(".accordion");
            if ($(this).next(".acc-content").is(":visible")) {
                //return false;
                $(this).removeClass("active");
                $(this).next(".acc-content").slideUp(300);
                $(outerBox).children(".accordion").removeClass("active-block");
            } else {
                $(outerBox).find(".accordion .acc-btn").removeClass("active");
                $(this).addClass("active");
                $(outerBox).children(".accordion").removeClass("active-block");
                $(outerBox).find(".accordion").children(".acc-content").slideUp(300);
                target.addClass("active-block");
                $(this).next(".acc-content").slideDown(300);
            }
        });
    }
    $(function () {
        $('.popup-img').magnificPopup({
            type: 'image',
            image: {
                markup: '<div class="mfp-figure">' + '<div class="close-btn close-icon" role="button">&#215;</div>' + '<div class="mfp-img"></div>' + '<div class="close-btn close-bottom" role="button">閉じる</div>' + '</div>',
            },
            callbacks: {
                open: function () {
                    closeBtn();
                },
            }
        });
    });
    // close-btn
    function closeBtn() {
        $('.close-btn').on('click', function () {
            $('.popup-img').magnificPopup('close');
        });
    }
     
    
    // Preloader
    $("#preloader").fadeOut(800);
    $(".preloader-bg").delay(800).fadeOut(800);
    
    // Contact Form
    var form = $('.contact__form'),
        message = $('.contact__msg'),
        form_data;
    // success function
    function done_func(response) {
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        form.find('input:not([type="submit"]), textarea').val('');
    }
    // fail function
    function fail_func(data) {
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
    form.submit(function (e) {
        e.preventDefault();
        form_data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form_data
        })
        .done(done_func)
        .fail(fail_func);
    });

    function initQuantityButtons() {
    // Handle minus button
    $(document).on('click', '.qty-minus', function(e) {
      e.preventDefault();
      var input = $(this).closest('.quantity').find('.qty');
      var currentVal = parseFloat(input.val()) || 0;
      var step = parseFloat(input.attr('step')) || 1;
      var min = parseFloat(input.attr('min')) || 0;
      
      // Set the new value
      var newVal = Math.max(currentVal - step, min);
      
      // Update input value
      input.val(newVal);
      
      // Trigger events for WooCommerce
      input.trigger('change');
      input.trigger('input');
    });
    
    // Handle plus button
    $(document).on('click', '.qty-plus', function(e) {
      e.preventDefault();
      var input = $(this).closest('.quantity').find('.qty');
      var currentVal = parseFloat(input.val()) || 0;
      var step = parseFloat(input.attr('step')) || 1;
      var max = parseFloat(input.attr('max')) || Infinity;
      
      // Set the new value
      var newVal = Math.min(currentVal + step, max);
      
      // Update input value
      input.val(newVal);
      
      // Trigger events for WooCommerce
      input.trigger('change');
      input.trigger('input');
    });
  }
  
  // ======================================
  // 8. Gallery & Swiper
  // ======================================
  
  // Initialize gallery with Swiper
  function initGallery() {
    if ($('.gallery-main').length && $('.gallery-thumbs').length) {
      // Initialize thumbnail swiper first
      var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true, // Important for tracking active slides
        loop: true,
        loopedSlides: $('.gallery-thumbs .swiper-slide').length // Ensure loop works correctly
      });

      // Initialize main swiper and connect with thumbs
      var galleryMain = new Swiper('.gallery-main', {
        spaceBetween: 10,
        loop: true,
        loopedSlides: $('.gallery-main .swiper-slide').length, // Ensure loop works correctly
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: galleryThumbs
        }
      });

      // Ensure size updates after all images have loaded
      $(window).on('load', function() {
        galleryMain.update();
        galleryThumbs.update();
      });
    }
  }
  
  // ======================================
  // 9. Modal Handlers
  // ======================================
  
  // Initialize and handle product modal functionality
  function initProductModal() {
    // Pre-initialize all modals on page load
    $('.modal').each(function() {
      var $modal = $(this);
      if (!$modal.data('modal-initialized')) {
        $modal.modal({ show: false });
        $modal.data('modal-initialized', true);
      }
    });
    
    // Handle icon button click
    $('.icon-btn').on('click', function(e) {
      e.preventDefault(); // Prevent any default action
      
      var targetModal = $(this).data('target');
      var $modalElement = $(targetModal);
      
      // Make sure modal is initialized
      if (!$modalElement.data('modal-initialized')) {
        $modalElement.modal({ show: false });
        $modalElement.data('modal-initialized', true);
      }

      // Get slider elements
      var mainSlider = $modalElement.find('.product-main-slider')[0];
      var thumbSlider = $modalElement.find('.product-thumbnail-slider')[0];

      // If sliders not found, just show modal immediately
      if (!mainSlider || !thumbSlider) {
        setTimeout(function() {
          $modalElement.modal('show');
        }, 10);
        return;
      }

      // Get existing swiper instances if already created
      var mainSwiper = $modalElement.data('mainSwiper');
      var thumbSwiper = $modalElement.data('thumbSwiper');

      // Function to show modal with slight delay to ensure DOM is ready
      function showModal() {
        setTimeout(function() {
          $modalElement.modal('show');
        }, 10);
      }

      // Initialize swipers if not already done
      if (!mainSwiper || !thumbSwiper) {
        // Initialize thumbnail swiper first
        thumbSwiper = new Swiper(thumbSlider, {
          loop: true,
          spaceBetween: 10,
          slidesPerView: 4,
          freeMode: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
        });

        // Store thumbSwiper immediately
        $modalElement.data('thumbSwiper', thumbSwiper);
        
        // Initialize main swiper with thumbs swiper
        mainSwiper = new Swiper(mainSlider, {
          loop: true,
          spaceBetween: 10,
          navigation: {
            nextEl: $modalElement.find('.swiper-button-next')[0],
            prevEl: $modalElement.find('.swiper-button-prev')[0],
          },
          pagination: {
            el: $modalElement.find('.swiper-pagination')[0],
            clickable: true,
          },
          thumbs: {
            swiper: thumbSwiper
          }
        });

        // Store mainSwiper
        $modalElement.data('mainSwiper', mainSwiper);
        
        // Show modal now that swipers are initialized
        showModal();
      } else {
        // Update existing swipers and show modal
        mainSwiper.update();
        thumbSwiper.update();
        showModal();
      }
    });

    // Handle modal close
    $(document).on('click', '[data-dismiss="modal"]', function() {
      var modal = $(this).closest('.modal');
      modal.modal('hide');
    });
  }

  function init() {
    initQuantityButtons();
    initGallery();
    initProductModal();
  }
  
  // Run initialization
  init();
    
});
