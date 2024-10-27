$(document).ready(function () {
  // Load parent categories (main categories)

  function addField() {
    // Create a new div for the field group
    const fieldGroup = $("<div>", { class: "field-group mt-2" });

    // Create the new input field for the image
    const imageInput = $("<input>", {
      type: "file",
      name: "post_files[]",
      class: "form-control mb-1",
      accept: "image/*",
      required: true,
    });

    // Create the textarea for the description
    const textArea = $("<textarea>", {
      name: "descriptions[]",
      class: "form-control mb-1",
      rows: 2,
      placeholder: "Enter description",
      required: true,
    });

    // Create the remove button
    const removeButton = $("<button>", {
      type: "button",
      class: "btn btn-sm btn-danger mb-1",
      text: "Remove",
      click: function () {
        $(this).parent(".field-group").remove();
      },
    });

    // Append the input, textarea, and button to the field group
    fieldGroup.append(imageInput, textArea, removeButton);

    // Append the field group to the container
    $("#image-field-container").append(fieldGroup);
  }

  // Add initial click event for add button
  $("#add-image-field").on("click", addField);

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

        // Set the selected main category for edit
        let selectedMainCategory = $("#parentCategory").data("value");
        $("#parentCategory").val(selectedMainCategory);

        // Load the subcategories based on the selected main category for edit
        loadSubCategories(selectedMainCategory);
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

        // Set the selected subcategory for edit
        let selectedSubCategory = $("#subCategory").data("value");
        $("#subCategory").val(selectedSubCategory);
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

  // Check if it's edit mode based on action input and load categories accordingly
  let isEdit = $("input[name='action']").val();
  if (isEdit) {
    loadParentCategories();
  }
});
