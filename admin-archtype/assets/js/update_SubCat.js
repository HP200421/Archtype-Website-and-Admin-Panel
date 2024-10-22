const updateSubCat = ($this, data) => {
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "subCategory";
  } else {
    alert(data.message);
  }
};
