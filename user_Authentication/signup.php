<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="signup.css"> <!-- External CSS -->
</head>
<body>
  <div class="container">
    <h2>Signup</h2>
    <form id="signupForm" action="signupCheck.php" method="post" onsubmit="return validateSignup()">
      
      <label for="name">Username</label>
      <input type="text" id="name" name="name">
      <p id="emsg" style="color:red; margin-top: 0;"></p>

      <label for="email">Email</label>
      <input type="email" id="email" name="email">

      <label for="password">Password</label>
      <input type="password" id="password" name="password">

      <label for="gender">Gender</label>
      <select id="gender" name="gender">
        <option value="">--Select Gender--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label for="address">Address</label>
      <textarea id="address" name="address" rows="3"></textarea>

      <button type="submit">Signup</button>
      <div class="message" id="message"></div>
    </form>

    <div class="link">
      <a href="login.php">Already have an account? Login</a>
    </div>
  </div>

  <!-- Link external JS -->
  <script src="signup.js"></script>
</body>
</html>
