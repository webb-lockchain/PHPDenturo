<?php
session_start();
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    (new DotEnv(__DIR__ . '/.env'))->load();
    $server = getenv('server');
    $user = getenv('login');
    $password = getenv('password');
    $database = getenv('database');
    $tableName = "users";

    $conn = new mysqli($server, $user, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $tableName = "users";
        // echo "Connected successfully";
        $validation=$conn->query("SELECT * FROM users WHERE email= '$email' AND pwd='$password'");        
        
        if ($validation->num_rows> 0) {
            $_SESSION['message'] ="Login successfully!";  
            $users=$validation->fetch_assoc();
            $_SESSION['user']=$users['firstName'].' '.$users['lastName'];
            $_SESSION['email']=$email;
            $conn->close();
            // header("Location: fur-patienten.php?data=$data");
            echo 'success';
            // header("Location: /fur-zahnarzte.php");
            exit;

        } 
        else{
            $_SESSION['message'] ="Login Failed!";
            $conn->close();
            echo 'error';
        }
    }

} else {
    // If the form is not submitted, redirect to an error page or display an error message
    echo "Form submission error";
}
?>