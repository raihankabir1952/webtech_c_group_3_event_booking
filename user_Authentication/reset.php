
<?php
include '../database/config.php'; 
session_start();

$error = "";
$success = "";

// Ensure email is verified
if (!isset($_SESSION['email'])) {
$error = "❌ Email not verified!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$newPassword = isset($_POST['newPassword']) ? trim($_POST['newPassword']) : '';
$confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
$email = $_SESSION['email'];


if (empty($newPassword) || empty($confirmPassword)) {
$error = "❌ Both fields are required!";
} elseif ($newPassword !== $confirmPassword) {
$error = "❌ Passwords do not match!";
} else {
// Update password in database
$sql = "UPDATE table1 SET password='$newPassword' WHERE email='$email'";
if (mysqli_query($conn, $sql)) {
$success = "✅ Password updated successfully!";
} else {
$error = "❌ Error updating password: " . mysqli_error($conn);
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link rel="stylesheet" href="reset.css">
</head>
<body>
<div class="container">
<h2>Reset Password</h2>

<form method="POST" onsubmit="return validatePassword()">
<label for="newPassword">New Password</label>
<input type="password" id="newPassword" name="newPassword">

<label for="confirmPassword">Confirm Password</label>
<input type="password" id="confirmPassword" name="confirmPassword">

<button type="submit">Reset Password</button>
<div class="message" id="msg"></div>
</form>


<!-- Show PHP messages -->
<?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
<?php if (!empty($success)) { echo "<p style='color:green;'>$success</p>"; } ?>

<div class="link">
<a href="login.php">Back to Login</a>
</div>
</div>

<script src="reset.js"></script>
</body>
</html>