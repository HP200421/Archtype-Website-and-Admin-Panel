$(document).ready(function () {
  // Load parent categories (main categories)
  function loadParentCategories() {
    if ($("#parentCategory").data("loading")) return;
    $("#parentCategory").data("loading", true);

    $.ajax({
      url: LINK + "mainCategory/getCategories", // Ensure this endpoint returns main categories
      type: "GET",
      success: function (response) {
        var data = JSON.parse(response);
        var options = '<option value="">Select Parent Category</option>';
        $.each(data, function (index, category) {
          options +=
            '<option value="' +
            category.id +
            '">' +
            category.name +
            "</option>";
        });
        $("#parentCategory").html(options);
        let selectedValue = $("#parentCategory").data("value");
        $("#parentCategory").val(selectedValue);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX error: ", textStatus, errorThrown);
        alert("Failed to load parent categories.");
      },
      complete: function () {
        $("#parentCategory").data("loading", false);
      },
    });
  }

  // Load subcategories based on selected main category
  function loadSubCategories(mainCategoryId) {
    if (!mainCategoryId) {
      $("#subCategory").html('<option value="">Select Sub Category</option>');
      return;
    }

    $.ajax({
      url: LINK + "subCategory/getSubCategories/" + mainCategoryId, // Ensure this endpoint fetches subcategories
      type: "GET",
      success: function (response) {
        var data = JSON.parse(response);
        var options = '<option value="">Select a subcategory</option>';
        $.each(data, function (index, subcategory) {
          options +=
            '<option value="' +
            subcategory.id +
            '">' +
            subcategory.name +
            "</option>";
        });
        $("#subCategory").html(options);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX error: ", textStatus, errorThrown);
        alert("Failed to load subcategories.");
      },
    });
  }

  // Trigger parent category loading on document ready
  loadParentCategories();

  // Trigger subcategory loading on main category selection
  $("#parentCategory").on("change", function () {
    var mainCategoryId = $(this).val();
    loadSubCategories(mainCategoryId);
  });

  let isEdit = $("input[name='action']").val();
  if (isEdit) {
    loadParentCategories();
  }
});
