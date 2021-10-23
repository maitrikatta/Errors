import Request from "./handleAjax.js";
import getFormData from "./validation.js";

const form = document.getElementById("myForm");
form.addEventListener("submit", (ev) => {
  ev.preventDefault();
  const [formData, trueFalse] = getFormData(ev);
  if (trueFalse) {
    //if data is valid checked by 'validation.js' then only make AjaxRequest.
    const errTxt = document.getElementById("error-text");
    const newRequest = new Request("SignupHandle.php", errTxt, formData);
    console.log(trueFalse);
    newRequest.makeRequest();
  } else {
    //handle wrong inputs again
  }
});
