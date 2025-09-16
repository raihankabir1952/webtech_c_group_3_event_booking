<?php
include '../database/config.php';
session_start();

// Check login
if(!isset($_SESSION['status'])) {
  header('location: ../user_Authentication/login.php');
}

$message = "";

// Insert table2 into DB
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['messageText']);

    if (!empty($name) && !empty($email) && !empty($comment)) {
        $sql = "INSERT INTO table2 (username, email, comment) VALUES ('$name', '$email', '$comment')";
        if (mysqli_query($conn, $sql)) {
            $message = "✅ comment added successfully!";
        } else {
            $message = "❌ Error: " . mysqli_error($conn);
        }
    } else {
        $message = "❌ All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="contract.css">
</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>
    
    <!-- table2 Form -->
    <form method="POST">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" >

      <label for="messageText">comment</label>
      <textarea id="messageText" name="messageText" required></textarea>

      <button type="submit">Submit</button>
    </form>

    <!-- Message display -->
    <p style="color:<?php echo strpos($message,'✅')!==false?'green':'red'; ?>">
      <?php echo $message; ?>
    </p>

    <!-- Back Button -->
    <form action="../landing_page/landing_page.php" method="get" style="margin-top: 10px;">
      <button type="submit">Back</button>
    </form>

  </div>
</body>
</html>
