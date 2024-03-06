<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
// Include your database connection file or define the connection here
// Example: include 'db_connection.php';

// Check if the ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tablename = $_GET['table'];
    (new DotEnv(__DIR__ . '/.env'))->load();
    // Connect to your database
    $servername = getenv('server');
    $username = getenv('login');
    $password = getenv('password');
    $dbname = getenv('database');

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a SQL query to delete the row with the provided ID
    $sql = "DELETE FROM $tablename WHERE id = $id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If the deletion is successful, send a success message back to the JavaScript function
        echo "success";
    } else {
        // If the deletion fails, send an error message back to the JavaScript function
        echo "error";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the ID parameter is not provided, send an error message back to the JavaScript function
    echo "error";
}
?>
