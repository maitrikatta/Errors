export default function getFormData(ev) {
  const errTxt = document.getElementById("error-text");
  const displayMessage = document.getElementById("displayMessage");

  displayMessage.style.visibility = "visible";
  displayMessage.classList.remove("animateErrors");

  let name = ev.target["fullname"].value;
  let email = ev.target["email"].value;
  let pass = ev.target["password"].value;
  name = name.trim();
  email = email.trim();
  pass = pass.trim();

  if (name === "" || name === "undefined") {
    errTxt.innerText = "Name field can't be null.";
    displayMessage.classList.add("animateErrors");
    ev.target["fullname"].focus();
    return [false, false]; // halts program here.
  }
  if (name.length < 4) {
    errTxt.innerText = "Name field value must be greater than 3.";
    ev.target["fullname"].focus();
    displayMessage.classList.add("animateErrors");
    return [false, false];
  }
  if (email === "" || email === "undefined") {
    errTxt.innerText = "Email field can't be null.";
    ev.target["email"].focus();
    displayMessage.classList.add("animateErrors");
    return [false, false]; // halts
  }
  if (pass === "" || pass === "undefined") {
    errTxt.innerText = "Password field can't be null.";
    ev.target["password"].focus();
    displayMessage.classList.add("animateErrors");
    return [false, false]; // halts
  }
  if (pass.length < 6) {
    errTxt.innerText = "Password must be greater than 5 characters.";
    ev.target["password"].focus();
    displayMessage.classList.add("animateErrors");
    return [false, false];
  }

  const formData = new FormData();
  formData.append("fullName", name);
  formData.append("email", email);
  formData.append("password", pass);

  return [formData, true];
}
