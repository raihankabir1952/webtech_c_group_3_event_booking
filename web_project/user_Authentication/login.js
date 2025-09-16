function validateLogin() {
  var username = document.getElementById("username").value.trim();
  var password = document.getElementById("password").value.trim();
  var messageDiv = document.getElementById("message");

  // Check empty fields
  if (username === "" || password === "") {
    messageDiv.innerHTML = "Please fill in all fields.";
    messageDiv.style.color = "red";
    return false;
  }

  // Password length check
  if (password.length < 6) {
    messageDiv.innerHTML = "Password must be at least 6 characters long.";
    messageDiv.style.color = "red";
    return false;
  }


  // Allow form submission
  return true; 
}
