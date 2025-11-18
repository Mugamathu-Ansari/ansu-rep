jQuery(function($) {
    "use strict";

    // Scroll to top functionality
    $(window).on('scroll', function() {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    });

    $('#return-to-top').on('click', function() {
        $('body,html').animate({ scrollTop: 0 }, 500);
    });

    // Side navigation toggle
    $('.gb_toggle').on('click', function() {
        appliance_ecommerce_store_Keyboard_loop($('.side_gb_nav'));
    });

    // Preloader fade out
    setTimeout(function() {
        $(".loader").fadeOut("slow");
    }, 1000);

});

// Mobile responsive menu
function appliance_ecommerce_store_menu_open_nav() {
    jQuery(".sidenav").addClass('open');
}

function appliance_ecommerce_store_menu_close_nav() {
    jQuery(".sidenav").removeClass('open');
}

// our product
jQuery(document).ready(function($) {
  $(document).ready(function() {
    $('#slider .slides.left-side.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: true,
      rtl: false,
      items: 1,
      autoplay: false,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
    });
  });
});

jQuery(document).ready(function($) {
   // Slider
  $(document).ready(function() {
    $('#slider .slides.middle-side.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      rtl: false,
      items: 1,
      autoplay: false,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
    });
  });
});

// offer sec
jQuery(document).ready(function($) {
  $('.offer-product.owl-carousel').owlCarousel({
    loop: true,
    margin: 25,
    nav: false,
    dots: false,
    rtl: false,
    responsive: {
      0: { items: 1 },
      768: { items: 2 },
      1024: { items: 3 },
      1400: { items: 3 }
    },
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
  });
});

// Dropdown category
jQuery(document).ready(function() {
    jQuery(".category-dropdown").hide();

    jQuery("button.category-btn").on('click', function() {
        jQuery(".category-dropdown").toggle();
    });

    // Handle focus using Tab and Shift+Tab
    jQuery(".category-btn, .category-dropdown").on("keydown", function(e) {
        var dropdownItems = jQuery(".category-dropdown").find("a"); // Assuming dropdown items are represented by <a> tags

        if (e.key === "Tab") { // Handle Tab key
            if (!e.shiftKey && document.activeElement === dropdownItems.last()[0]) {
                e.preventDefault();
                jQuery(".category-btn").focus();
            } else if (e.shiftKey && document.activeElement === dropdownItems.first()[0]) {
                e.preventDefault();
                jQuery(".category-btn").focus();
            }
        }
    });
});