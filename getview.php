<?php
session_start();
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $position = $_POST['position'];
    $role = $_POST['role'];
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
        $tableName = "";
        if($position=="rnq"||$position=="cq"){
            $tableName ="quote";
        }
        else if($position=="so"){
            $tableName ="offers";
        }
        else if($position=="rno"){
            $tableName ="orders";
        }



        // echo "Connected successfully";
        $validation=$conn->query("SELECT * FROM '$tableName' WHERE email= '$email' AND pwd='$password'");        
        
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

    // $conn->close();
    // // header("Location: fur-patienten.php?data=$data");
    // header("Location: /fur-zahnarzte.php");
    


} else {
    // If the form is not submitted, redirect to an error page or display an error message
    echo "Form submission error";
}
?>