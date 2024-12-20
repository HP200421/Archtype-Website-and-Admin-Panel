$(document).ready(function () {
  const currentPath = window.location.pathname;

  // Loop through all the anchor tags in the nav
  // $(".nav-list a, .burger-list a, .category-list-item a").each(function () {
  //   // Get the href of each link and remove the base URL from it
  //   const linkPath = $(this).attr("href").replace(window.location.origin, "");

  //   // If the href matches the current path, add the 'active' class
  //   if (linkPath === currentPath) {
  //     console.log(linkPath);
  //     console.log(currentPath);
  //     $(this).addClass("active");
  //   }
  // });
  $(document).ready(function () {
    // Get the current URL path
    const currentPath = window.location.pathname;

    // Loop through all anchor tags in the nav and category list
    $(".nav-list a, .burger-list a, .category-list-item a").each(function () {
      // Get the href of each link and remove the base URL from it
      const linkPath = $(this).attr("href").replace(window.location.origin, "");

      // If the href matches the current path, add the 'active' class
      if (linkPath === currentPath) {
        $(this).addClass("active"); // This adds the 'active' class to the matched link
      }
    });
  });

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

  emailjs.init("RV2wYmdxnLtqTRKzt");

  $("#contact-form").submit(function (e) {
    e.preventDefault();

    var name = $("#name").val().trim();
    var email = $("#email").val().trim();
    var subject = $("#subject").val().trim();
    var message = $("#message").val().trim();

    if (name === "" || email === "" || subject === "" || message === "") {
      $("#form-messages").html(
        '<div class="alert alert-danger">Please fill in all fields.</div>'
      );
      return;
    }

    if (!validateEmail(email)) {
      $("#form-messages").html(
        '<div class="alert alert-danger">Invalid email address.</div>'
      );
      return;
    }

    var serviceID = "service_8sjx6ps";
    var templateID = "template_3nha0sh";

    var templateParams = {
      name: name,
      email: email,
      subject: subject,
      message: message,
    };

    emailjs.send(serviceID, templateID, templateParams).then(
      function (response) {
        $("#form-messages").html(
          '<div class="alert alert-success">Your message has been sent successfully!</div>'
        );
        $("#contact-form")[0].reset();
      },
      function (error) {
        $("#form-messages").html(
          '<div class="alert alert-danger">Failed to send message. Please try again later.</div>'
        );
      }
    );
  });

  function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }
});
