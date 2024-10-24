$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    // items: 4,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    smartSpeed: 1000,
    autoplayHoverPause: false,
    mouseDrag: false,
    touchDrag: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
    animateOut: "fadeOut",
    animateIn: "fadeIn",
  });

  $("#burgerButton").click(function () {
    $("#burgerNav").slideToggle("hidden");
    $("#category-list").fadeToggle("categoryListVisible categoryListHidden");
  });
});
