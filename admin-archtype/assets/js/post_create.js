const postCreate = ($this, data) => {
  console.log("Event created: ", data);
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "post";
  } else {
    alert(data.message);
  }
};
