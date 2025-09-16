function validatePassword() { 
    const newPassword = document.getElementById("newPassword").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();
    const msg = document.getElementById("msg");

    if (newPassword === "" || confirmPassword === "") {
        msg.textContent = "❌ Both fields are required!";
        msg.style.color = "red";
        return false;
    }

    if (newPassword.length < 6) {
        msg.textContent = "❌ Password must be at least 6 characters!";
        msg.style.color = "red";
        return false;
    }

    if (newPassword !== confirmPassword) {
        msg.textContent = "❌ Passwords do not match!";
        msg.style.color = "red";
        return false;
    }

    msg.textContent = ""; // clear message if validation passes
    return true; // allow form submission
}
