<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $firstName = $_POST["first"];
    $email = $_POST["email"];
    $lastName = $_POST["last"];
    $phoneNumber = $_POST["phoneNumber"];
    $uaddress = $_POST["uaddress"];
    $password = $_POST["pwd"];
    $reg_date = date("Y-m-d H:i:s");
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
        $validation=$conn->query("SELECT * FROM users WHERE email= '$email'");        
        if ($validation->num_rows == 0) {
            $sql = "INSERT INTO users (firstName,lastName,email,pwd,reg_date,phoneNumber,uaddress) 
                    VALUES( '$firstName','$lastName','$email','$password','$reg_date','$phoneNumber','$uaddress')";
            if($conn->query($sql)===TRUE){
                $message = "Sighup successfully!";
            }
            else{
                $message = "Sighup Failed!";
            }
        } 
    }

    $conn->close();
    

    // header("Location: fur-patienten.php?data=$data");
    header("Location: /fur-zahnarzte.php");
    exit;



} else {
    // If the form is not submitted, redirect to an error page or display an error message
    echo "Form submission error";
}
?>