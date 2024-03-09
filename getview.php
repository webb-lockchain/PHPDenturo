<?php
session_start();
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the form data
    $position = $_POST['position'];
    $role = $_POST['role'];
    (new DotEnv(__DIR__ . '/.env'))->load();
    $server = getenv('server');
    $user = getenv('login');
    $password = getenv('password');
    $database = getenv('database');

    $conn = new mysqli($server, $user, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        if (isset($_GET['where'])) {
            $where = $_GET['where'];
            if(strpos($where, 'id_') !== false) {
                $parts = explode("_", $where);
                if (count($parts) == 2 && $parts[0] == "id") {
                    $id = $parts[1];
                    $validation = $conn->query("UPDATE quote SET qstatus=2 WHERE id = $id");

                    $validation = $conn->query("SELECT orgName AS orgname,changedName AS changedname ,CONCAT('https://denturo.at/uploads/', changedName) AS url FROM `filelist` WHERE detailid = $id");
                    $filelistData = array();
                    while ($row = $validation->fetch_assoc()) {
                        $filelistData[] = $row;
                    }
                    $validation = $conn->query("SELECT quote.id, quote.msg AS usermsg,
                    CONCAT(users.firstName, ' ', users.lastName) AS fname,
                    quote.email, users.phoneNumber AS phone,
                    users.uaddress AS address 
                    FROM quote 
                    JOIN users ON users.email = quote.email
                    WHERE quote.id = $id;");
                    $quoteData = $validation->fetch_assoc();
                    $combinedData = array(
                        'userfile' => $filelistData,
                        'quote' => $quoteData
                    );
                    $jsonData = json_encode($combinedData);
                    echo json_encode($jsonData);
                }
            }
            else{
                if($where=="rnq"){
                    $validation=$conn->query("SELECT 
                    CONCAT(users.firstName, ' ', users.lastName) AS writer, 
                    quote.created, 
                    quote.msg, 
                    quote.id, 
                    TIMEDIFF(NOW(), quote.created) AS passed
                    FROM users 
                    JOIN quote ON users.email = quote.email
                    WHERE quote.qstatus = 1 ;");     
                }
                else if($where=="cq") {
                    $validation=$conn->query("SELECT 
                    CONCAT(users.firstName, ' ', users.lastName) AS writer, 
                    quote.created, 
                    quote.msg, 
                    quote.id, 
                    TIMEDIFF(NOW(), quote.created) AS passed
                    FROM users 
                    JOIN quote ON users.email = quote.email
                    WHERE quote.qstatus=2;");   
                } 
                else if($where=="so"){
                    $validation=$conn->query("SELECT 
                    CONCAT(users.firstName, ' ', users.lastName) AS writer, 
                    quote.created, 
                    quote.msg, 
                    quote.id, 
                    TIMEDIFF(NOW(), quote.created) AS passed
                    FROM users 
                    JOIN quote ON users.email = quote.email
                    WHERE quote.qstatus = 1 ;");     
                }   
                if ($validation) {
                    $resultArray = array();
                    while ($row = $validation->fetch_assoc()) {
                        $resultArray[] = $row;
                    }
                    echo json_encode($resultArray);
                }          
            }

            
        
        } else {
            // 'where' parameter is not set
            echo "Missing 'where' parameter";
        }


       
        $conn->close();
    }

} else {
    // If the form is not submitted, redirect to an error page or display an error message
    echo "Form submission error";
}
?>