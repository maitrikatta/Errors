export default class Request {
  constructor(url, msgPanel, formData) {
    this.url = url;
    this.msgPanel = msgPanel;
    this.formData = formData;
  }
  makeRequest() {
    const displayMessage = document.getElementById("displayMessage");
    displayMessage.style.visibility = "visible";
    displayMessage.classList.add("animateErrors");
    displayMessage.style.backgroundColor = "green";
    displayMessage.style.opacity = "0.7";

    const xhr = new XMLHttpRequest();
    xhr.open("POST", this.url);
    xhr.onreadystatechange = () => {
      if (xhr.status == 200 && xhr.readyState == 4) {
        this.msgPanel.innerHTML = xhr.responseText;
        setInterval(() => {
          location.replace("welcome.php");
        }, 2000);
      }
      if (xhr.status == 404) {
        this.msgPanel.innerText = "oops file not found!";
      }
    };
    xhr.send(this.formData);
  }
}
