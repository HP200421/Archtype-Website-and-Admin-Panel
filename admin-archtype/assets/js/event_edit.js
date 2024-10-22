const eventUpdate = ($this, data) => {
  if (data.success) {
    alert(data.message);
    window.location.href = LINK + "eventList";
  } else {
    alert(data.message);
  }
};
