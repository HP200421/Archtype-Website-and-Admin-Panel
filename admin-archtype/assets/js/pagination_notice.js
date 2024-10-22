$(document).ready(function () {
  $(".pagination").on("click", "a.page-link", function (e) {
    e.preventDefault();
    var page = $(this).data("page");
    loadPage(page);
  });
  $("form").on("submit", function (e) {
    e.preventDefault();
    loadPage(1);
  });

  function loadPage(page) {
    var searchTerm = $("input[name='search']").val();

    $.ajax({
      url: "notice/index",
      type: "GET",
      data: { page: page, search: searchTerm },
      success: function (response) {
        $("#notice-list").html($(response).find("#notice-list").html());
        $(".pagination").html($(response).find(".pagination").html());
      },
    });
  }
});
