// $(document).ready(function () {
//   $("body").on("change", ".delete-checkbox", function () {
//     var checkbox = $(this);
//     var filePath = checkbox.val();

//     if (checkbox.is(":checked")) {
//       // Send an AJAX request to remove the file from the server
//       $.ajax({
//         url: "<?= LINK ?>notice/deleteFile", // Ensure this URL points to the correct controller action
//         method: "POST",
//         data: {
//           file: filePath,
//         },
//         success: function (response) {
//           if (response.success) {
//             checkbox.closest(".card").css("border-color", "red");
//           } else {
//             alert("Failed to delete file.");
//           }
//         },
//         error: function () {
//           alert("Error in server communication.");
//         },
//       });
//     } else {
//       checkbox.closest(".card").css("border-color", ""); // Reset border color if unchecked
//     }
//   });
// });
