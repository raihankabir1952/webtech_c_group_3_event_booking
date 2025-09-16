function validEmail() {
    var email = document.getElementById('email').value.trim();
    var msg = document.getElementById('msg');

    // email validation
    if (email === "" || !email.includes("@") || !email.includes(".")) {
        msg.innerText = "❌ Please enter a valid email address!";
        msg.style.color = "red";
        return false; // Prevent form submission
    } else {
        msg.innerText = ""; // clear message if valid
        return true;
    }
}
