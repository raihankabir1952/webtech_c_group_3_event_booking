// forgot.js

function validateForgot() {
  var email = document.getElementById("email").value.trim();
  var messageDiv = document.getElementById("message");

  // Check if email is empty
  if (email === "") {
    messageDiv.textContent = "Please enter your email.";
    messageDiv.style.color = "red";
    return false;
  }

  // Simple check for '@'
  if (email.indexOf("@") === -1) {
    messageDiv.textContent = "Please enter a valid email address.";
    messageDiv.style.color = "red";
    return false;
  }

  // If all checks pass
  messageDiv.textContent = "Reset link sent! Check your email.";
  messageDiv.style.color = "green";
  return false;
}

// Attach validation to form submission
document.getElementById("forgotForm").onsubmit = function() {
  return validateForgot();
};
