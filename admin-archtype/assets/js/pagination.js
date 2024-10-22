$(document).ready(function () {
  // Handle pagination link clicks
  $(".pagination").on("click", "a.page-link", function (e) {
    e.preventDefault();
    var page = $(this).data("page");
    loadPage(page);
  });

  // Handle form submission for search
  $("form").on("submit", function (e) {
    e.preventDefault();
    loadPage(1); // Load the first page on form submit
  });

  // Handle category selection changes
  $("select[name='main_id']").on("change", function () {
    loadPage(1); // Load the first page on category change
  });
  // Handle subcategory selection changes
  $("select[name='sub_id']").on("change", function () {
    loadPage(1); // Load the first page on category change
  });

  // Function to load a specific page
  function loadPage(page) {
    // Get the search term, main category ID, and subcategory ID from the form
    var searchTerm = $("input[name='search']").val();
    var mainCategoryId = $("select[name='main_id']").val();
    var subCategoryId = $("select[name='sub_id']").val(); // Add this if you have a subcategory dropdown

    $.ajax({
      url: "post/index",
      type: "GET",
      data: {
        page: page,
        search: searchTerm,
        main_id: mainCategoryId, // Send main category ID
        sub_id: subCategoryId, // Send subcategory ID if needed
      },
      success: function (response) {
        // Update the event list and pagination
        $("#event-list").html($(response).find("#event-list").html());
        $(".pagination").html($(response).find(".pagination").html());
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: ", status, error); // Log any errors for debugging
      },
    });
  }
});
