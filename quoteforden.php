<!-- uploading action for dentist -->
<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
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
    (new DotEnv(__DIR__ . '/.env'))->load();
    $server = getenv('server');
    $user = getenv('login');
    $password = getenv('password');
    $database = getenv('database');

    $conn = new mysqli($server, $user, $password, $database);
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



} else {
    // If the form is not submitted, redirect to an error page or display an error message
    echo "Form submission error";
}
?>