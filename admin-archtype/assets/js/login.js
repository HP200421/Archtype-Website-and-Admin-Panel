$(document).ready(function () {
  $(".ajaxCall").on("submit", function (e) {
    e.preventDefault();

    console.log("Link: ", LINK);
    $.ajax({
      url: LINK + "login",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        console.log("Server response: ", response);
        const res = JSON.parse(response);

        if (res.success) {
          window.location.href = LINK + "mainCategory";
        } else {
          // console.log("Error: ", res.message);
          alert(res.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX error: ", textStatus, errorThrown);
      },
    });
  });
});
