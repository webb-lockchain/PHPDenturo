<?php
session_start();

// Set $_SESSION['user'] to null
$_SESSION['user'] = null;

// Send a response to indicate successful logout
http_response_code(200);
?>
