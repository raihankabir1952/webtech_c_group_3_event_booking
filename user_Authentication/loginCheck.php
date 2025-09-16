<?php
include '../database/config.php';
session_start();
header('Content-Type: application/json');

$response = ["status"=>"error","message"=>"Invalid request"];

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $username = mysqli_real_escape_string($conn, trim($data['username']));
    $password = mysqli_real_escape_string($conn, trim($data['password']));

    if($username === "" || $password === ""){
        $response["message"] = "❌ Username or password cannot be empty!";
    } else {
        $sql = "SELECT * FROM table1 WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['status'] = 1;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            $response["status"] = "success";
            $response["message"] = "✅ Login successful!";
        } else {
            $response["message"] = "❌ Invalid username or password!";
        }
    }
}

echo json_encode($response);
?>
