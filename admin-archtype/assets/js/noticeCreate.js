const noticeCreated = ($this, data) => {
  console.log("Notice created: ", data);
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "notice";
  } else {
    alert(data.message);
  }
};
