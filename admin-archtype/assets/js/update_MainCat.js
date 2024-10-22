const updateMainCat = ($this, data) => {
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "mainCategory";
  } else {
    alert(data.message);
  }
};
