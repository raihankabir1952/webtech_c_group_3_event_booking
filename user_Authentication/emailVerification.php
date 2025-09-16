<?php
include '../database/config.php';
session_start(); // Start session

$message = "";
$messageColor = "";
//php validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); 

    if (empty($email)) {
        $message = "❌ Email is required!";
        $messageColor = "red";
    } else {
      //database
        $sql = "SELECT * FROM table1 WHERE email='$email'"; // table1 used
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email; // store email in session
            $message = "✅ Email found in database!";
            $messageColor = "green";
        } else {
            $message = "❌ Email not found!";
            $messageColor = "red";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
  <link rel="stylesheet" href="emailVerification.css">
</head>
<body>
  <div class="container">
    <h2>Email Verification</h2>
    <form action="" method="POST" onsubmit="return validEmail()">
      <input type="email" id="email" name="email" placeholder="Enter your email (abc@gmail.com)">
      <button type="submit">Verify Email</button><br><br>

      <!-- PHP message -->
      <div class="msg" id="msg" style="color:<?php echo $messageColor; ?>;">
        <?php if(!empty($message)) echo $message; ?>
      </div>
    </form>

    <!-- Reset Password Button -->
    <br>
    <form action="reset.php" method="POST">
        <input type="hidden" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
        <button type="submit">Reset Password</button>
    </form>
  </div>

  <!-- Link external JS file -->
  <script src="emailVerification.js"></script>
</body>
</html>
