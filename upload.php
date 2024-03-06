<?php
include("conf.php");
$message = '';
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDirectory = "uploads/"; // Specify the directory where uploaded files will be stored
    $fileName = $_FILES["fileToUpload"]["name"];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time()) . "." . $fileExtension;

    $targetFile = $targetDirectory . $newFileName; // Get the file name


    (new DotEnv(__DIR__ . '/.env'))->load();
    $server = getenv('server');
    $user = getenv('login');
    $password = getenv('password');
    $database = getenv('database');
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        // echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $conn = new mysqli($server, $user, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $tableName ="userdata";
            // echo "Connected successfully";
            $result = $conn->query("SHOW TABLES LIKE '$tableName'");

            if($result->num_rows > 0) {
            } else {
                $sql = "CREATE TABLE userdata (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    origin VARCHAR(50) NOT NULL,
                    filena VARCHAR(50) NOT NULL,
                    email VARCHAR(50)
                    )";
                $conn->query($sql);
            }       
            $reg_date=date("Y/m/d");     
            $sql = "INSERT INTO userdata (origin, filena, email,reg_date)
                    VALUES ('$fileName', '$targetFile', 'john@example.com','$reg_date')";
            // echo "AAA".$sql;
            $result=$conn->query($sql);
        }

        $conn->close();
        $message = "Upload successfully!";

        // Displaying a simple toast using HTML and JavaScript

        $data = encrypt('ss', 'iloveyou');

        header("Location: fur-patienten.php?data=$data");
    } else {
        $message = "User cannot upload file";
        echo "Sorry, there was an error uploading your file.";

    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data['title'] = "Upload status!";
    $data['icon'] = 'https://webdamn.com/demo/build-push-notification-system-php-mysql-demo/avatar.png';
    $data['message'] = $message;
    // if ($message !== "")
    echo json_encode($data);
}
exit();
?>