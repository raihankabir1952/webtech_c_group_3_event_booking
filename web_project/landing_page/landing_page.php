<?php
include '../database/config.php';
session_start();

$status = isset($_SESSION['status']) ? $_SESSION['status'] : 0;
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email    = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Booking</title>
  <!-- Absolute paths -->
  <link rel="stylesheet" href="../landing_page/landing_page.css">
</head>
<body>

  <div class="navbar">
    <h1>Event Booking</h1>
    <div class="nav-links">
      <a href="#home">Home</a>
      <a href="#features">Features</a>
      <a href="#testimonials">Testimonials</a>

      <?php
        if ($status == 1) {
            echo '<a href="#">'.$username.'</a>';
            echo '<a href="../user_Authentication/logout.php">Logout</a>';
        } else {
            echo '<a href="../user_Authentication/login.php">Login</a>';
        }
      ?>

      <a href="../contract_us/contract.php">Contact us</a>
    </div>
  </div>

  <div class="upper" id="home">
    <h2>Welcome to Event Booking</h2>
    <p>Book your favorite events anytime!</p>
    <!-- Example background image -->
    <img src="../landing_page/bg.jpg" alt="background" style="width:100%;">
  </div>

  <div class="features" id="features">
    <div class="feature-card">🎟 <h3>Easy Booking</h3><p>Book events in just a few clicks.</p></div>
    <div class="feature-card">📋 <h3>Waitlist</h3><p>Join the waitlist if tickets are sold out.</p></div>
    <div class="feature-card">⚡ <h3>Priority Queue</h3><p>VIP, Regular & Student priorities available.</p></div>
    <div class="feature-card">💸 <h3>Refund</h3><p>Easy refund request for cancellations.</p></div>
  </div>

  <div class="testimonials" id="testimonials">
    <h2>What Our Users Say</h2>
    <?php
      $result = mysqli_query($conn, "SELECT username, comment FROM table2 ORDER BY id DESC LIMIT 5");
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="testimonial-card">';
              echo '<p>"' . htmlspecialchars($row['comment']) . '"</p>';
              echo '<span>– ' . htmlspecialchars($row['username']) . '</span>';
              echo '</div>';
          }
      } else {
          echo "<p>No comment yet. Be the first to comment!</p>";
      }
    ?>
    <div class="link">
      <a href="/try/contract_us/contract.php">Add Your comment</a>
    </div>
  </div>

  <footer id="contact">
    <p>📧 Contact us: support@eventbooking.com | ☎ +880 1234 567890</p>
    <p>© 2025 Event Booking System</p>
  </footer>

</body>
</html>
