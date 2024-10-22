const noticeUpdated = ($this, data) => {
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "notice";
  } else {
    alert(data.message);
  }
};
