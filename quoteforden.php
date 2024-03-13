<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
$server = getenv('server');
$user = getenv('login');
$password = getenv('password');
$database = getenv('database');
function encrypt($data, $password)
{
    $method = "aes-256-cbc";
    $salt = openssl_random_pseudo_bytes(16);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
    $key = openssl_pbkdf2($password, $salt, 32, 10000, 'sha256');
    $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
    $encoded = base64_encode($salt . $iv . $encrypted);
    return $encoded;
}
$conn = new mysqli($server, $user, $password, $database);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = $_POST["email"];
    $message = $_POST["message"];
    $position = $_POST["position"];
    $roles = $_POST["roles"];
    $detailid = $_POST["detailid"];
    $timestamp = time(); // Get the current timestamp
    $targetDirectory = "denturo.at/uploads/"; // Specify the directory where uploaded files will be stored
    $i = 0;
    $fn = array();
    foreach ($_FILES['files']['name'] as $key => $val) {
        $filename = uniqid() . '_' . $_FILES['files']['name'][$key];
        if (move_uploaded_file($_FILES['files']['tmp_name'][$key], 'uploads/' . $filename)){
            $fn[]= $filename;
            $i++;
        }
    }
    $fileName = $_FILES["files"]["name"];  
    $fileNames = $_FILES["files"]["name"];
    $filenames = array();
    $fileextensions = array();
    $targetFile= array();
    foreach ($fileNames as $fileName) {
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $name = pathinfo($fileName, PATHINFO_FILENAME);
        $filenames[] = $name;
        $fileextensions[] = $extension;
        $newFileName = md5(time()) . "." . $extension;
        $targetFile[] = $targetDirectory . $newFileName; // Get the file name
    }


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $tableName = "quote";
        // echo "Connected successfully"; 
        $reg_date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO filelist (id,detailid, orgName, changedName)\n"."VALUES";
        for($j=0;$j<count($targetFile);$j++) {    
            $id=uniqid();        
            $sql=$sql." ('$id','$detailid','$filenames[$j]', '$fn[$j]'),";
        }
        
        // Check if the last character is a comma
        if (substr($sql, -1) === ',') {
            // Replace the last comma with a semicolon
            $sql = substr($sql, 0, -1) . ';';
        }


        $result = $conn->query($sql);
        $sql = "INSERT INTO quote (id, email, msg, qstatus,qposition,created)
                VALUES ('$detailid', '$email', '$message',1,'$position','$reg_date')";
        $result = $conn->query($sql);
    }

    $conn->close();
    $message = "Upload successfully!";

    // Displaying a simple toast using HTML and JavaScript

    $data = encrypt('ss', 'iloveyou');

    // header("Location: fur-patienten.php?data=$data");
    header("Location: /fur-patienten.php");
    exit;

} 
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else { 
        $validation="";
        $where=$_GET['where'];
        if (strpos($where, 'allquotes_')===0){
            $parts = explode("_",$where);
            $email=$parts[1];        
            $validation=$conn->query("SELECT 
            created, 
            msg, 
            id, 
            qstatus - 1 AS statuss,
            CASE
                WHEN TIMESTAMPDIFF(HOUR, quote.created, NOW()) >= 24 
                THEN CONCAT(FLOOR(TIMESTAMPDIFF(HOUR, quote.created, NOW()) / 24) + 1, ' days')
                ELSE TIMEDIFF(NOW(), quote.created)
            END AS passed
            FROM quote 
            WHERE email = '$email' ORDER BY created DESC;"); 
        }
        else{    
            if(strpos($where, 'o_')===0){
                $validation = $conn->query("SELECT orgName AS orgname,changedName AS changedname ,CONCAT('https://denturo.at/uploads/', changedName) AS url FROM `filelist` WHERE detailid = '$where'");
                $filelistData = array();
                while ($row = $validation->fetch_assoc()) {
                    $filelistData[] = $row;
                }
                
                $validation=$conn->query("SELECT 
                created, 
                msg
                FROM offers 
                WHERE id = '$where';");    
                $quoteData = $validation->fetch_assoc();
                $combinedData = array(
                    'userfile' => $filelistData,
                    'quote' => $quoteData,
                );
                $jsonData = json_encode($combinedData);
                echo json_encode($jsonData);
                exit ;        
            }
            if(strpos($where, 'q_')===0){
                $ids= explode("_",$where);
                $id=$ids[1];
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
                    'quote' => $quoteData,
                );
                $jsonData = json_encode($combinedData);
                echo json_encode($jsonData);
                exit ;
            }
            if(strpos($where, 'ordertoggle_')===0){
                $ids= explode("_",$where);
                $id=$ids[1];
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
                    'quote' => $quoteData,
                );
                $jsonData = json_encode($combinedData);
                echo json_encode($jsonData);
                exit ;
            }
        }        
        if ($validation) {
            $resultArray = array();
            while ($row = $validation->fetch_assoc()) {
                $resultArray[] = $row;
            }
            echo json_encode($resultArray);
        }  
    }
}
?>