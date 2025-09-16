<?php
include '../database/config.php'; 
session_start();

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['name']);
    $password = trim($_POST['password']);
    $email    = trim($_POST['email']);
    $gender   = trim($_POST['gender']);
    $address  = trim($_POST['address']);

    
    if (empty($username) || empty($password) || empty($email) || empty($gender) || empty($address)) {
        $error = "❌ All fields are required!";
    } else {
        // Check if username already exists
        $check = "SELECT * FROM table1 WHERE username='$username'";
        $res = mysqli_query($conn, $check);

        if (mysqli_num_rows($res) > 0) {
            $error = "❌ Username already exists!";
        } else {
            // Insert 
            $sql = "INSERT INTO table1 (username, password, email, gender, address) 
                    VALUES ('$username','$password','$email','$gender','$address')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['username'] = $username;
                header("Location: login.php?success=account_created");
                exit();
            } else {
                $error = "❌ Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<h2>Sign Up</h2>
<form method="POST" action="">
    Username: <input type="text" id="username" name="name"><br><br>
    Password: <input type="password" id="password" name="password"><br><br>
    Email: <input type="email" id="email" name="email"><br><br>
    Gender: <input type="text" id="gender" name="gender"><br><br>
    Address: <input type="text" id="address" name="address"><br><br>
    <input type="submit" value="Register">
</form>

<p style="color:red;"><?php echo $error; ?></p>
<p style="color:green;"><?php echo $success; ?></p>
<p>Already have an account? <a href="login.php">Login</a></p>
