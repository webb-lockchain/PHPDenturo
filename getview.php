<?php
session_start();
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
$server = getenv('server');
$user = getenv('login');
$password = getenv('password');
$database = getenv('database');

$conn = new mysqli($server, $user, $password, $database);
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the form data
    $position = $_POST['position'];
    $role = $_POST['role'];    
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
                else if(count($parts) == 3 && $parts[1] == "o"){
                    $id = $parts[2];
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
                    //need offer message and filelist.
                    $oid="o_".$id;
                    $validation = $conn->query("SELECT orgName AS orgname,changedName AS changedname ,CONCAT('https://denturo.at/uploads/', changedName) AS url FROM `filelist` WHERE detailid = '$oid'");   
                                 
                    $offerfilelistData = array();
                    while ($row = $validation->fetch_assoc()) {
                        $offerfilelistData[] = $row;
                    }
                    $validation = $conn->query("SELECT msg FROM offers WHERE id='$oid'; ");
                    $offermsg = $validation->fetch_assoc();
                    
                    $combinedData = array(
                        'userfile' => $filelistData,
                        'quote' => $quoteData,
                        'offermsg'=>$offermsg,
                        'offerfilelistData' => $offerfilelistData
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
                    'laboratary' AS writer, 
                    created, 
                    msg, 
                    id, 
                    TIMEDIFF(NOW(), created) AS passed
                    FROM offers ;");     
                }   
                if ($validation) {
                    $resultArray = array();
                    while ($row = $validation->fetch_assoc()) {
                        $resultArray[] = $row;
                    }
                    echo json_encode($resultArray);
                }          
            }
            if($where=="cq_"){
                $formData= $_GET['formData'];
                print_r($formData);
            }
            
        
        } 
        
        else {
            // 'where' parameter is not set
            echo "Missing 'where' parameter";
        }
        $conn->close();
    }

} 
else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['message'])&&isset($_FILES['files']) && !empty($_FILES['files'])) {
        $targetDirectory = "denturo.at/uploads/";
        $detailid='o_'.$_POST['detailid'];
        $message=$_POST['message'];
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
        } 
        else {
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
            $quoteid=substr($detailid, strpos($detailid, '_') + 1);
            $sql ="SELECT u.pwd
            FROM users u
            JOIN quote q ON u.email = q.email
            WHERE q.id ='$quoteid'; ";
            $result = $conn->query($sql);
            $role = $result->fetch_assoc();
            if($role['pwd']==""){
                $sql = "INSERT INTO offers (id, role, msg, created)
                VALUES ('$detailid', 'user', '$message','$reg_date')";
            }
            else{
                $sql = "INSERT INTO offers (id, role, msg, created)
                VALUES ('$detailid', 'dentist', '$message','$reg_date')";
            }
            $result = $conn->query($sql);   
            $validation = $conn->query("UPDATE quote SET qstatus=3 WHERE id = $quoteid"); 
            $validation=$conn->query("SELECT 
                'laboratary' AS writer, 
                created, 
                msg, 
                id, 
                TIMEDIFF(NOW(), created) AS passed
                FROM offers ;");  
            if ($validation) {
                $resultArray = array();
                while ($row = $validation->fetch_assoc()) {
                    $resultArray[] = $row;
                }
                echo json_encode($resultArray);
            }                 
            
        }
    }
}
// else {
//     // If the form is not submitted, redirect to an error page or display an error message
//     echo "Form submission error";
// }
?>