const LINK = $('input[name="LINK"]').val();
const beforeBtn = (btn) => {
  let btnHtml = btn.html();
  let btnAttr = btn.attr("btn_load");
  btn.attr("disabled", true);
  btn.html(btnAttr);
  btn.attr("btn_load", btnHtml);
};
const RevertBtn = (btn) => {
  let btnHtml = btn.html();
  let btnAttr = btn.attr("btn_load");
  btn.attr("disabled", false);
  btn.html(btnAttr);
  btn.attr(btnHtml);
};
$(document).ready(function () {
  // Summernote initialization
  $("#your_summernote").summernote({
    height: 300,
    placeholder: "Start writing...",
    toolbar: [
      ["style", ["style", "bold", "italic", "underline", "clear"]],
      ["para", ["ul", "ol", "paragraph"]],
    ],
    styleTags: ["p", "h1", "h2", "h3", "h4", "h5", "h6"],
  });
  $(".dropdown-toggle").dropdown();

  $(".ajaxForm").on("submit", function (e) {
    e.preventDefault();
    const btn = $(this).find("button[type=submit]");
    let callBack = $(this).attr("callback");
    var formData = new FormData(this);
    // for (var pair of formData.entries()) {
    //   console.log(pair[0] + ": " + pair[1]);
    // }
    var isValid = true;

    $(".error-message").text("");

    $(this)
      .find('[vali="yes"]')
      .each(function () {
        var value = $(this).val().trim();
        var errorMessage = "";
        if (value === "") {
          errorMessage = "This field is required.";
          isValid = false;
        }

        if (errorMessage !== "") {
          $(this).next(".error-message").text(errorMessage);
        }
      });

    if (isValid) {
      $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
          beforeBtn(btn);
        },
        success: function (response) {
          RevertBtn(btn);
          var res = JSON.stringify(response);
          var data = JSON.parse(res);
          if (callBack) {
            eval(callBack)($(this), data);
          } else {
            // If not callback function is provided, do nothing.
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          RevertBtn(btn);
          console.log("AJAX error: ", textStatus, errorThrown);
          alert("An error occurred. Please try again.");
        },
      });
    }
  });
});
