function checkForm() {
  let name = document.getElementById("name").value.trim();
  let mail = document.getElementById("mail").value.trim();
  let pass = document.getElementById("pass").value;
  let confirm = document.getElementById("confirm").value;
  let output = document.getElementById("output");

  let nameRegex = /^[a-zA-Z ]+$/;
  let mailRegex = /^\S+@\S+\.\S+$/;
  let passRegex = /^[^\s]{4,12}$/;

  let notes = [];

  if (!nameRegex.test(name)) {
    notes.push("Username must be letters and spaces only.");
  }

  if (!mailRegex.test(mail)) {
    notes.push("Email format is not valid.");
  }

  if (!passRegex.test(pass)) {
    notes.push("Password must be 4-12 characters without spaces.");
  }

  if (pass !== confirm) {
    notes.push("Passwords do not match.");
  }

  if (notes.length > 0) {
    output.innerHTML = notes.map(e => "<li>" + e + "</li>").join("");
    return false;
  }

  output.innerHTML = "";
  alert("Account created successfully!");
  return true;
}
