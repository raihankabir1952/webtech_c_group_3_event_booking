<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="/web_project/user_Authentication/login.css">
</head>
<body>
<div class="container" id="login-container">
  <h2>Login</h2>
  <form id="loginForm" onsubmit="return loginAjax()">
    <input type="text" id="username" name="username" placeholder="👤 username">
    <input type="password" id="password" name="password" placeholder="🔒 password">
    <button type="submit">Login</button>
    <div id="message"></div>
  </form>

  <div class="link">
    <h5>Don't have an account?</h5>
    <a href="/web_project/user_Authentication/signup.php">Signup</a>
    <a href="/web_project/user_Authentication/emailVerification.php">Forgot Password?</a>
  </div>
</div>

<!-- Container where landing_page.php will load -->
<div id="landing-page-container"></div>

<script>
function loginAjax() {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const messageDiv = document.getElementById("message");

    if(username === "" || password === "") {
        messageDiv.innerText = "Enter both username and password!";
        messageDiv.style.color = "red";
        return false;
    }

    const data = JSON.stringify({username, password});

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/web_project/user_Authentication/loginCheck.php", true); //request configure
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //data format
    xhttp.send("data=" + data);

    xhttp.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            const res = JSON.parse(this.responseText);
            messageDiv.innerText = res.message;
            messageDiv.style.color = res.status === "success" ? "green" : "red";

            if(res.status === "success") {
               window.location.href =  "/web_project/landing_page/landing_page.php"
            }
        }
    }

    return false;
}
</script>
</body>
</html>
