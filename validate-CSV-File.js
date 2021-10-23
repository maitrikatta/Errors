window.onload = () => {
  const fileForm = document.getElementById("csv-form");
  fileForm.onsubmit = (ev) => {
    // ev.preventDefault();    // by doing this php doesnt work. //or php will not get form data through POST
    const filesList = ev.target["myCSVfile"].files;
    if (filesList[0].type == "application/vnd.ms-excel") {
      return true;
    } else {
      alert("Wrong file type!");
      return false;
    }
  };
};
