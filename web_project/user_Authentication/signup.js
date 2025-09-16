function validateSignup() {
  var name = document.getElementById("name").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value.trim();
  var messageDiv = document.getElementById("message");
  var gendererror = document.getElementById("gendererror");

  // Check for empty fields
  if (name === "" || email === "" || password === "") {
    messageDiv.innerText = "All fields must be filled.";
    messageDiv.style.color = "red";
    return false;
  }


  // Simple email validation
  if (email.indexOf("@") === -1) {
    messageDiv.innerText = "Please enter a valid email address.";
    messageDiv.style.color = "red";
    return false;
  }

  // Password length validation
  if (password.length < 6) {
    messageDiv.innerText = "Password must be at least 6 characters long.";
    messageDiv.style.color = "red";
    return false;
  }

  // --- Gender Validation ---
  const genderSelected =
    document.getElementById("male").checked ||
    document.getElementById("female").checked ||
    document.getElementById("other").checked;

  if (!genderSelected) {
    gendererror.innerText = "Gender must be selected.";
    return false;
  } else {
    gendererror.innerText = "";
  }

  // All validations passed
  messageDiv.innerText = "Signup successful!";
  messageDiv.style.color = "green";

  return false; // Prevent actual form submission
}
