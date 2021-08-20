/*
 * All Scripts Used in this Obira Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
jQuery(document).ready(function($) {
  "use strict";
  //Obra Sticky Header Script
  $('.obra-header-sticky').ObiraSticky ({
    topSpacing: 0,
    zIndex: 4
  });

  $('p:empty').remove();

  if ($('.obra-nav ul.dropdown-nav li').hasClass('has-dropdown')) {
    $('.obra-nav ul.dropdown-nav li.has-dropdown').addClass('sub');
  }

  // Mean Menu
  var $navmenu = $('header nav');
  var $menu_starts = ($navmenu.data('nav') !== undefined) ? $navmenu.data('nav') : 991;
  $('header nav').meanmenu({
    meanMenuContainer: '.obra-header >.container',
    meanMenuOpen: '<span></span><span></span><span></span>',
    meanMenuClose: '<span></span><span></span><span></span>',
    meanExpand: '<i class="fa fa-angle-down"></i>',
    meanContract: '<i class="fa fa-angle-up"></i>',
    meanScreenWidth: $menu_starts,

  });

  //Obra Parallax Navigation Script
  $('.obra-parallax-nav ul li a').on('click', function() {
    var scrollAnchor = $(this).attr('data-scroll'),
    scrollPoint = $('.data-scroll[data-anchor="' + scrollAnchor + '"]').offset().top -100;
    $('body,html').animate({
      scrollTop: scrollPoint
    }, 1000);
    return false;
  });
  $(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 620) {
      $('.data-scroll').each(function(i) {
        if ($(this).position().top <= windscroll -0) {
          $('.obra-parallax-nav ul li a.active').removeClass('active');
          $('.obra-parallax-nav ul li a').eq(i).addClass('active');
        }
      });
    }
    else {
      $('.obra-parallax-nav ul li .active').removeClass('active');
      $('.obra-parallax-nav ul li a:first').addClass('active');
    }
  }).scroll();

  //Obra FAQ Sticky Sidebar Navigation Script
  if ($('div').hasClass('faq-categories')) {
  function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var footer_top = $('.obra-footer').offset().top;
    var div_top = $('.faq-categories').offset().top;
    var div_height = $('.widget-quick-navigation').height();
    var padding = 100;
    if (window_top + div_height > footer_top - padding)
    $('.widget-quick-navigation').css ({
      top: (window_top + div_height - footer_top + padding) * -1
    })
      else if (window_top > div_top) {
        $('.widget-quick-navigation').addClass('fixed');
        $('.widget-quick-navigation').css ({
          top: 0
        })
      }
      else {
        $('.widget-quick-navigation').removeClass('fixed');
      }
  }
  $(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
  });
}
   // Accordion Active Only One At a Time.
  $('.collapse-others').each(function() {
    var $this = $(this);
    $('.collapse', $this).on('show.bs.collapse', function (e) {
      var all = $this.find('.collapse');
      var actives = $this.find('.collapsing, .collapse.in');
      all.each(function (index, element) {
        $(element).collapse('hide');
      })
      actives.each(function (index, element) {
        $(element).collapse('show');
      })
    });
  });

  //Obra Navigation Hover Script
  $('.has-dropdown').on ({
    mouseenter : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).fadeIn(300);
    },
    mouseleave : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).fadeOut(300);
    }
  });

  //Obra Search Box Script
  $('.close-icon').hide();
  $('html').on('click', function() {
    $('.search-icon').show();
    $('.close-icon').hide();
    $('.search-link-wrap .search-box').fadeOut(400);
  });
  $('.close-icon').on('click', function() {
    $('.search-icon').show();
    $('.close-icon').hide();
    $('.search-link-wrap .search-box').fadeOut(400);
  });
  $('.search-link-wrap').on('click', function(e) {
    e.stopPropagation();
    $('.search-link-wrap .search-box').find('input[type="text"]').focus();
  });
  $('.search-link-wrap .search-link').on('click', function() {
    $('.search-icon').toggle();
    $('.close-icon').toggle();
    $('.search-link-wrap .search-box').fadeToggle(400);
  });

  //Obra Add Class CSS Script
  $('.obra-toggle-link').on('click', function () {
    $(this).toggleClass('active');
    $('.obra-nav').slideToggle();
  });

  //Obra Get Element Margin Script
  $(window).resize(function() {
    if (screen.width >= 992) {
      $('.sticky-footer .main-wrap-inner').css('margin-bottom', $('.obra-footer').height());
    }
    if (screen.width >= 768) {
      jQuery('.obra-404-error').height(jQuery(window).height() - $('.obra-header').outerHeight() - $('.obra-footer').outerHeight() -1);
    }

    // Obra Parallax Script
    if (screen.width >= 768) {
      $('.obra-parallax').jarallax ({
        speed: 0.6,
      })
    }

  });
  $(window).trigger('resize');

  //Obra Browser Detect Script
  if (navigator.userAgent.search('Safari') >= 0) {
    $('html').addClass('safari')
  }

  //Obra Set Equal Height Script
  $('.obra-item').matchHeight ({
    property: 'height'
  });
  $('.obra-inner-item').matchHeight ({
    property: 'height'
  });

  $(window).load(function() {

    // onpage nave hash link animation
    var headerheight;
    var $wpAdminBar = $('#wpadminbar');
    if ($wpAdminBar.length) {
      headerheight = $(".obra-header").outerHeight()+$wpAdminBar.height();
    } else {
      headerheight = $(".obra-header").outerHeight();
    }

    $(".obra-parallax-scroll a[href^='#']").click(function(e) {
      var position = $($(this).attr("href")).offset().top-headerheight;
      $("body, html").animate({
        scrollTop: position
      }, 1000 );
      e.preventDefault();
    });

    $(".obra-parallax-scroll .mean-container a[href^='#']").click(function(e) {
      $(".meanmenu-reveal").click();
    });

    //Obira Write Erase Script
    Typed.new('#typed', {
      stringsElement: document.getElementById('typed-strings'),
      typeSpeed: 100,
      backDelay: 1500,
      loop: true,
      contentType: 'html',
      loopCount: null,
      cursorChar:"",
      callback: function() {
        foo();
      },
      resetCallback: function() {
        newTyped();
      }
    });
    var resetElement = document.querySelector('.reset');
    if(resetElement) {
      resetElement.addEventListener('click', function() {
        document.getElementById('typed')._typed.reset();
      });
    }
    function newTyped() {}
    function foo() {
      console.log('Callback');
    }

    //Obra Get Window Height Script
    var $window = jQuery(window);
    if ($window.width() > 992) {
      jQuery('.obra-windowheight').height(jQuery(window).height());
    }

    // Mean Nav open
    $('.meanmenu-reveal').on( 'click', function() {
      $('.mean-container').toggleClass('meanclose');
    });
    //Obra Owl Carousel Slider Script
    $('.owl-carousel').each( function() {
      var $carousel = $(this);
      var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
      var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 1;
      var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 1;
      var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
      $carousel.owlCarousel ({
        loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
        items : $carousel.data('items'),
        margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
        dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
        nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
        navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
        autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
        autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
        animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
        mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
        autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
        autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
        center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
        responsiveClass: true,
        dotsEachNumber: true,
        smartSpeed: 600,
        responsive : {
          0 : {
            items : $items_mobile_portrait,
            nav : false,
            autoplay : true,
          },
          480 : {
            items : $items_mobile_landscape,
            nav : false,
            autoplay : true,
          },
          768 : {
            items : $items_tablet,
          },
          1024 : {
            items : $items,
          }
        }
      });
      var totLength = $('.owl-dot', $carousel).length;
      $('.total-no', $carousel).html(totLength);
      $('.current-no', $carousel).html(totLength);
      $carousel.owlCarousel();
      $('.current-no', $carousel).html(1);
      $carousel.on('changed.owl.carousel', function(event) {
        var total_items = event.page.count;
        var currentNum = event.page.index + 1;
        $('.total-no', $carousel ).html(total_items);
        $('.current-no', $carousel).html(currentNum);
      });
    });

    //Obra Hover Script
    $('.feature-item, .workflow-item, .testimonial-item, .plan-item, .client-item, .app-work-item, .career-item, .glance-item, .service-item, .mate-item, .portfolio-item, .obra-share-link, .product-wrap, .blog-item').on ({
      mouseenter : function() {
        $(this).addClass('obra-hover');
      },
      mouseleave : function() {
        $(this).removeClass('obra-hover');
      }
    });

    $('.plan-schedule.active').each( function() {
      var $plan = $(this);
      var $one = ($plan.data('one') !== undefined) ? $plan.data('one') : '';
      var $two = ($plan.data('two') !== undefined) ? $plan.data('two') : '';
      //Obra Plan Type Script
      $($one).addClass('active');
      $('#plan-switch').change(function() {
        if ($(this).is(':checked')) {
          $($two).slideDown("slow");
          $($one).slideUp("slow");
        }
        else {
          $($two).slideUp();
          $($one).slideDown();
        }
      });
    });

    //Obra Masonry Script
    var $grid = $('.obra-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
    $('.masonry-filters').on( 'click', 'li a', function() {
      var filterValue = $( this ).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    $('.masonry-filters').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });

    //Obra Loader Script
    $('.obra-preloader').fadeOut(500);

    if (screen.width >= 650) {
      var maxheight = 0;
      $('.blog-style-one .blog-item .blog-info-wrap').each(function () {
        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
      });
      $('.blog-style-one .blog-item .blog-info-wrap').height(maxheight);

      $('.testimonial-wrap').each(function () {
        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
      });
      $('.testimonial-wrap').height(maxheight);
    }

    // Infinite Scroll Icon
    $('.load-posts').each( function() {
      var $paging = $(this);
      var paging_type = ($paging.data('paging') !== undefined) ? $paging.data('paging') : '';
      var paging_icon = ($paging.data('iconn') !== undefined) ? $paging.data('iconn') : '';
      if (paging_type === 'infinite-scroll'){
        $('.loader-inner').addClass(paging_icon);
        $('.obra-preloader img').hide();
      } else {
        $('.obra-preloader img').show();
      }
    });
    (function(a){var b={"ball-pulse":3,"ball-grid-pulse":9,"ball-clip-rotate":1,"ball-clip-rotate-pulse":2,"square-spin":1,"ball-clip-rotate-multiple":2,"ball-pulse-rise":5,"ball-rotate":1,"cube-transition":2,"ball-zig-zag":2,"ball-zig-zag-deflect":2,"ball-triangle-path":3,"ball-scale":1,"line-scale":5,"line-scale-party":4,"ball-scale-multiple":3,"ball-pulse-sync":3,"ball-beat":3,"line-scale-pulse-out":5,"line-scale-pulse-out-rapid":5,"ball-scale-ripple":1,"ball-scale-ripple-multiple":3,"ball-spin-fade-loader":8,"line-spin-fade-loader":8,"triangle-skew-spin":1,pacman:5,"ball-grid-beat":9,"semi-circle-spin":1,"ball-scale-random":3},c=function(a){var b=[];for(i=1;i<=a;i++)b.push("<div></div>");return b};a.fn.loaders=function(){return this.each(function(){var d=a(this);a.each(b,function(a,b){d.hasClass(a)&&d.html(c(b))})})},a(function(){a.each(b,function(b,d){a(".loader-inner."+b).html(c(d))})})}).call(window,window.$||window.jQuery||window.Zepto);

  // ParticlesJS Config.
  if ($('div').hasClass('aws-template')) {
  var $obira_particles = $('.obra-banner div[id]');
  if($obira_particles.length) {
   particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 1580
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true,
    "config_demo": {
          "hide_card": false,
          "background_color": "#434462",

          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }

    });
  }
}

  });

  //Obra Scroll Animation Script
  AOS.init();

  //Obra Parallax Scroll Script
  $('.obra-parallax-arrow a, .obra-btns-wrap a').on('click', function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    )
    {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        event.preventDefault();
        $('html, body').animate ({
          scrollTop: target.offset().top
        },1000,function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(':focus')) {
            return false;
          }
          else {
            $target.focus();
          };
        });
      }
    }
  });

  //Obra Has Content Script
  $('.obra-banner:has(.obra-template-image)').addClass('has-template-image');

  //Obra Counter Script
  $('.obra-counter').counterUp ({
    delay: 1,
    time: 1000,
  });

  //Obra Popup Picture Script
  $('.obra-popup').magnificPopup ({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true,
      arrowMarkup:'<div title="%title%" class="mfp-arrow mfp-arrow-%dir%"></div>',
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('*');
      }
    }
  });

  //Obra Popup Video Script
  $('.obra-popup-video').magnificPopup ({
    mainClass: 'mfp-fade',
    type: 'iframe',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: function(url) {
            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
            if ( !m || !m[1] ) return null;
            return m[1];
          },
          src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: function(url) {
            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
            if ( !m || !m[5] ) return null;
            return m[5];
          },
          src: 'https://player.vimeo.com/video/%id%?autoplay=1'
        }
      }
    }
  });

  //Obra Sticky Sidebar Script
  $('.obra-sticky-sidebar').theiaStickySidebar ({
    additionalMarginTop: 150
  });

  //Obra Hover Direction Animtion Script
  $('.direction-hover .portfolio-item').hoverdir ({
    hoverElem: '.portfolio-info'
  });

  //Obra Nice Select Script
  $('select').niceSelect();

  //Obra Responsive Tabs Script
  $('.woocommerce-tabs').responsiveTabs ({
    collapsible: false,
    animation: 'fade',
    duration: 0,
    active: 0,
  });

  //Obra Rating Script
  $('.obra-rating').rateYo ({
    rating: 3.6,
    starWidth: '14px',
    spacing: '2px',
    ratedFill: '#444444',
    normalFill  : '#c3c3c3'
  });

  //Obra Payment Method Radio Script
  $('.payment_method_cod').change(function() {
    var idx = $(this).index()-1;
    $('.payment_box').slideToggle(400);
  });

  //Obra Onclick Add Class Script
  $('.obra-comments-area .comments-title a').on('click', function() {
    $(this).toggleClass('active');
    $('.obra-comments-area .comments').slideToggle();
  });

  //Obra Back Top Script
  var backtop = $('.obra-back-top');
  // var position = backtop.offset().top;
  $(window).scroll(function() {
    var windowposition = $(window).scrollTop();
    if(windowposition + $(window).height() == $(document).height()) {
      backtop.removeClass('active');
    }
    else if (windowposition > 150) {
      backtop.addClass('active');
    }
    else {
      backtop.removeClass('active');
    }

    //Obra Floating Sidebar Script
    var $window = jQuery(window),
    $flotingbar = jQuery('.obra-floating-sidebar'),
    offset = jQuery('.obra-mid-wrap').offset(),
    $scrolling = jQuery('.obra-primary, .obra-floating-parent').height(),
    $offsetHeight = jQuery('.obra-primary, .obra-floating-parent').offset(),
    $topHeight = 0;
    if (jQuery('.obra-floating-sidebar').length > 0) {
      if ($window.width() > 1199) {
        if (($window.scrollTop() + $topHeight) > offset.top) {
          if ($window.scrollTop() + $topHeight + $flotingbar.height() + 50 < $offsetHeight.top + $scrolling) {
            $flotingbar.stop().animate ({
              marginTop: ($window.scrollTop() - offset.top) + $topHeight + 35,
            });
          }
          else {
            $flotingbar.stop().animate ({
              marginTop: ($scrolling - $flotingbar.height() - 80) + 35,
            });
          }
        }
        else {
          $flotingbar.stop().animate ({
            marginTop: 0,
          });
        }
      }
      else {
        $flotingbar.css('margin-top', 0);
      }
    }
  });
  jQuery('.obra-back-top a').on('click', function() {
    jQuery('body,html').animate ({
      scrollTop: 0
    }, 2000);
    return false;
  });

  // Hovering parent then previous child's also need to active state
  $('.obra-item-act-wrap').on ({
    mouseenter : function() {
      $(this).prevAll(".obra-item-act-wrap").addClass("hover-active");
    },
    mouseleave : function() {
      $(this).prevAll(".obra-item-act-wrap").removeClass("hover-active");
    }
  });
  // $(".obra-item-act-wrap").on('mouseenter', function() {
  //   $(this).prevAll(".obra-item-act-wrap").toggleClass("hover-active");
  // });


});