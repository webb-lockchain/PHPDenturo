<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDirectory = "denturo.at/uploads/"; // Specify the directory where uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Get the file name
    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
    } else {
        // Attempt to upload the file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";

        }
    }
} else {
    // If the form was not submitted or fileToUpload is not set
    echo "Please select a file to upload.";
}
?>
