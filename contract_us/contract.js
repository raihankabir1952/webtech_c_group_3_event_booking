// Simple JS validation and confirmation
document.getElementById("contactForm").onsubmit = function() {
  var name = document.getElementById("name").value.trim();
  var email = document.getElementById("email").value.trim();
  var messageText = document.getElementById("messageText").value.trim();
  var confirmation = document.getElementById("confirmation");

  if(name === "" || email === "" || messageText === "") {
    confirmation.textContent = "Please fill all fields!";
    confirmation.style.color = "red";
    return false;
  }

  if(email.indexOf("@") === -1) {
    confirmation.textContent = "Please enter a valid email!";
    confirmation.style.color = "red";
    return false;
  }

  confirmation.textContent = "Thank you! Your message has been sent.";
  confirmation.style.color = "green";
  
  // Prevent actual form submission for demo
  return false;
};
