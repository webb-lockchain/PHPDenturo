<!DOCTYPE html>
<html data-wf-page="64f81980aa4a07bb1aca3cd5" data-wf-site="64ca1f0ebcad6b7ae9d95e37" lang="de">
<?php include("header.php");
?>

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

.w3-modal-content {
    max-width: 650px !important;
}

.w3-container {
    padding: 0.01em 30px !important
}

.aa {
    z-index: 0 !important;
    transition: transform 0.2s ease;
}

.send {
    background-color: #018f9b !important;

}


.aa:hover {
    transform: scale(1.1);
    /* Scale the button to 110% of its original size */
}

.makequote {}

/* Button used to open the chat form - fixed at the bottom of the page */
.closed {
    margin: 15px;
}

.open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 99;
    width: 300px;
}

/* Add styles to the form container */
.form-container {
    width: 100%;
    padding: 10px;
    background-color: white;
}

/* Full-width textarea */
.form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: 1px solid gray;
    background: #f1f1f1;
    resize: none;
    min-height: 50px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
    background-color: #ddd;
    outline: none;
}


/* Full-width textarea */
.form-container input {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: 1px solid gray;
    background: #f1f1f1;
    resize: none;
    min-height: 50px;
}

/* When the textarea gets focus, do something */
.form-container input:focus {
    background-color: #ddd;
    outline: none;
}




#drop_zone {
    /* border: 5px solid blue; */
    width: 100%;
    background: #f1f1f1;
    margin: 5px 0 22px 0;
    height: 200px;
}

/* Set a style for the submit/send button */
.form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    /* width: 100%; */
    margin-bottom: 10px;
    opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
    background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover,
.open-button:hover {
    opacity: 1;
}

.image-container {
    position: relative;
    display: inline-block;
}

.image-container img {
    width: 50px;
    height: 50px;
    border: 1px solid black;
    margin: 5px;
}

.image-container button {
    position: absolute;
    top: -10px;
    /* Adjust the top position as needed */
    right: -10px;
    /* Adjust the right position as needed */
    background: none;
    border: none;
    cursor: pointer;
    color: red;
    /* Change the color of the cancel icon as needed */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

#drop_file_zone {
    background-color: #EEE;
    border: #999 5px dashed;
    width: 100%;
    height: 200px;
    padding: 8px;
    margin-bottom: 30px;
    font-size: 18px;
}

#drag_upload_file {
    width: 50%;
    margin: 0 auto;
}

#drag_upload_file p {
    text-align: center;
}

#drag_upload_file #selectfile {
    display: none;
}

#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {
        bottom: 0;
        opacity: 0;
    }

    to {
        bottom: 30px;
        opacity: 1;
    }
}

@keyframes fadein {
    from {
        bottom: 0;
        opacity: 0;
    }

    to {
        bottom: 30px;
        opacity: 1;
    }
}

@-webkit-keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1;
    }

    to {
        bottom: 0;
        opacity: 0;
    }
}

@keyframes fadeout {
    from {
        bottom: 30px;
        opacity: 1;
    }

    to {
        bottom: 0;
        opacity: 0;
    }
}
</style>



<!-- <script src="js/notification.js"></script> -->
<div class="section-mittig1">
    <?php
  // Start the session
  if (isset($_GET["data"])) {
    $data = decrypt($_GET["data"], 'iloveyou');
    if ($data == 'ss') {
      echo '<script>';

      echo 'window.onload = function() {';
      echo '  setTimeout(function() {';
      echo 'if (window.Notification && window.Notification.permission === "granted") {';
      echo 'var notification = new Notification("Notification", {';
      echo ' body: "Upload success!!!",';
      echo 'icon: "path_to_icon/icon.png"'; // Provide the path to your icon
      echo '});';
      echo '} else if (window.Notification && window.Notification.permission !== "denied") {';
      echo 'Notification.requestPermission(function (status) {';
      echo 'if (status === "granted") {';
      echo 'var notification = new Notification("Title", {';
      echo 'body: "This is a Windows toast notification!",';
      echo 'icon: "path_to_icon/icon.png"'; // Provide the path to your icon
      echo '});';
      echo ' }';
      echo ' });';
      echo '}';

      echo '  }, 1000);';
      echo '}';
      echo '</script>';
    }
  }

  function decrypt($encryptedData, $password)
  {
    $method = "aes-256-cbc";
    $data = base64_decode($encryptedData);
    $salt = substr($data, 0, 16);
    $iv = substr($data, 16, openssl_cipher_iv_length($method));
    $encrypted = substr($data, 16 + openssl_cipher_iv_length($method));
    $key = openssl_pbkdf2($password, $salt, 32, 10000, 'sha256');
    $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
  }
  ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <div class="inhalt-nebeneinander1">
        <div data-w-id="205c9aa6-414f-20b2-43e9-591ab9d62088" style="opacity:0" class="inhalt-untereinander1">
            <h1 data-w-id="205c9aa6-414f-20b2-43e9-591ab9d62089" style="opacity:0" class="heading-links1 heading-font1"
                id="izs"></h1>
            <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e1d-1aca3cd5"
                class="w-layout-layout stack wf-layout-layout">
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e1e-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e20-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="u5m"></p>
                </div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e23-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e25-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="j5g"></p>
                </div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e28-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e2a-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list flie-text" id="iuai"></p>
                </div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e2d-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e2f-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="sbia"></p>
                </div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e32-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-cf245335-408b-96f8-8bf6-287cb1441e34-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="pb2"></p>
                </div>
                <div id="w-node-_952d224d-1f9d-bfa7-cbe2-da61e08ae2c4-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-_1f0c4006-70d9-70ad-9dba-cab0b1ea568e-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="bia"></p>
                </div>
                <div id="w-node-_06b84ba7-67d1-0411-f5b0-f7a5a66718b6-1aca3cd5" class="w-layout-cell"><img
                        src="images/tooth.webp" alt="Symbol" loading="lazy" class="icon1-tooth"></div>
                <div id="w-node-_99c8cd72-af29-1aba-25b6-23066714ff5d-1aca3cd5" class="w-layout-cell cell-2">
                    <p class="text-links-list paragraph-font" id="kzn"></p>
                </div>
            </div>
        </div>
        <div class="feature-image-mask"><img class="feature-image"
                src="images/AdobeStock_230677493_visu_1AdobeStock_230677493_visu.webp"
                alt="Erwachsene Frau beim Zahnarztbesuch" style="opacity:0"
                sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
                data-w-id="205c9aa6-414f-20b2-43e9-591ab9d620a3" loading="lazy"
                srcset="images/AdobeStock_230677493_visu_1-p-500.jpeg 500w, images/AdobeStock_230677493_visu_1-p-1080.jpeg 1080w, images/AdobeStock_230677493_visu_1AdobeStock_230677493_visu.webp 1502w">
        </div>
    </div>
</div>
<div class="section-mittig1 zweitfarbe-2">
    <div class="inhalt-nebeneinander1 switch">
        <div class="feature-image-mask"><img class="feature-image" src="images/AdobeStock_197373009.webp"
                alt="Zahnarzt und Patient in der Zahnarztpraxis" style="opacity:0"
                sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
                data-w-id="de5f9d4d-b33c-37f7-7bba-353473c9879d" loading="lazy"
                srcset="images/AdobeStock_197373009-p-500.webp 500w, images/AdobeStock_197373009-p-800.webp 800w, images/AdobeStock_197373009-p-1080.webp 1080w, images/AdobeStock_197373009.webp 1500w">
        </div>
        <div data-w-id="de5f9d4d-b33c-37f7-7bba-353473c9878c" style="opacity:0" class="inhalt-untereinander1">
            <h2 data-w-id="de5f9d4d-b33c-37f7-7bba-353473c9878d" style="opacity:0" class="heading-links1 heading-font1"
                id="pbzi"></h2>
            <h3 class="heading-links-klein1 heading-font2 heading-color-1" id="fafl"></h3>
            <p class="text-links1 paragraph-font" id="skbv"></p>
            <h3 class="heading-links-klein1 heading-font2 heading-color-1" id="Quv"></h3>
            <p class="text-links1 paragraph-font" id="naw"></p>
        </div>
    </div>
</div>
<div class="section-mittig1">
    <div class="inhalt-nebeneinander1">
        <div data-w-id="de5f9d4d-b33c-37f7-7bba-353473c987a2" style="opacity:0" class="inhalt-untereinander1">
            <h2 class="heading-links-klein1 heading-font2 heading-color-1" id="ssbi"></h2>
            <p class="text-links1 paragraph-font" id="etdh"></p>
            <h2 class="heading-links-klein1 heading-font2 heading-color-1" id="vasu"></h2>
            <p class="text-links1 paragraph-font" id="ddea"></p>
            <h2 class="heading-links-klein1 heading-font2 heading-color-1" id="pzbz"></h2>
            <p class="text-links1 paragraph-font" id="sesn"></p>
        </div>
        <div class="feature-image-mask"><img class="feature-image" src="images/AdobeStock_141940237.webp"
                alt="Hübscher Zahnarzt mit junger Assistentin in Uniform, die sich auf den Job vorbereitet"
                style="opacity:0"
                sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
                data-w-id="de5f9d4d-b33c-37f7-7bba-353473c987a1" loading="lazy"
                srcset="images/AdobeStock_141940237-p-500.webp 500w, images/AdobeStock_141940237-p-800.webp 800w, images/AdobeStock_141940237-p-1080.webp 1080w, images/AdobeStock_141940237.webp 1500w">
        </div>
    </div>
</div>
<div class="bild-cover1 hintergrund">
    <div class="inhalt-nebeneinander1">
        <div data-w-id="2696ffa6-5714-def9-3d7d-3c46415460f6" class="inhalt-untereinander1 mittig">
            <h2 data-w-id="2696ffa6-5714-def9-3d7d-3c46415460f7" class="heading-links1 heading-font1 heading-color"
                id="sfy">
            </h2>
            <h2 class="heading-links-klein1 heading-font2 heading-color mittig" id='sfydetail'>
                <a href="tel:0681/41095956" class="link-10">0681/41095956<br></a>
                <a href="mailto:info@denturo.de" class="link-10">info@denturo.de</a><br><br>
                <div id='wl'></div>
            </h2>
        </div>
    </div>
    <!--   
  <a href="kontakt.php" data-w-id="2696ffa6-5714-def9-3d7d-3c4641546109"
    class="termin-button-new heading-font3 highlights w-button aa" id="uta"></a> -->
    <div id="snackbar">Please check your email and verify your uploaded data.</div>
    <div class="termin-button-new heading-font3 highlights w-button aa" onclick="utadata()" id="uta"></div>
    <!-- <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <div id="chat-popup" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <div class=" w3-display-topright">
                    <span><a href="https://run.briskinvoicing.com/help/quotes_help.html"
                            class="underline">Help</a></span>

                    <span onclick="document.getElementById('chat-popup').style.display='none'"
                        class="w3-button">&times;</span>
                </div>


                <form action="/quoteforpat.php" class="form-container" method="POST" enctype="multipart/form-data"
                    id="quoteForm">
                    <h1 class="m-8 text-center" style="font-family: Raleway,sans-serif !important;
    font-weight: bold;!important">Request a quote</h1>
                    <div class="w-full bg-blue-100 p-4 border-green-500 border-2 mb-8">
                        <h3>Get Started</h3>
                        <h4>This is the moment for requesting a quote. Your sent data will be private and we will send
                            offer via
                            email as soon as possible.</h4>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:justify-between">
                        <div class="max-w-[300px]">
                            <label for="fullName"><b>Full Name</b></label>
                            <input type="text" placeholder="Enter your full name" name="fullName" id="fullNameInput"
                                required>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter your email" name="email" id="email" required>

                            <label for="address"><b>Address</b></label>
                            <input type="text" placeholder="Enter your address" name="address" id="address" required>

                            <label for="phoneNumber"><b>Phone Number</b></label>
                            <input type="text" placeholder="Enter your phone number" name="phoneNumber" id="phoneNumber"
                                required>
                        </div>
                        <div class="max-w-[400px]">
                            <label for="message"><b>Message</b></label>
                            <textarea placeholder="Enter your message" name="message" id="messageTextarea"
                                required></textarea>

                            <label for="attachment" class=" text-sm text-gray-700 relative"><b>Attach Files (Drag
                                    here)</b></label>
                            <div id="drop_file_zone" ondrop="dropHandler(event)" ondragover="dragoverHandler(event)"
                                class="hover:cursor-pointer h-fit flex flex-wrap gap-2 justify-center items-center">
                                <ul id="file_list" class="flex flex-row flex-wrap gap-2"></ul>
                            </div>
                            <label for="quoteId">Your quote ID: <b id="qid"></b></label>
                        </div>
                    </div>
                    <div class="w-full sm:w-2/3 mx-auto">
                        <div class="flex flex-row justify-between">

                            <button type="button" class="btn w-2/5 aa send" onclick="uploadSelectedFiles()">
                                <div id="sending"></div>
                                <!-- <img src="images/icons/loading.gif" class="w-8 h-8 z-20"/> -->
                            </button>

                            <button type="button" class="btn w-2/5 cancel aa" onclick="closeForm()">Close</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>
<div class="section-mittig1 zweitfarbe-2">
    <div id="w-node-_5c6b0864-c92b-0bb8-940e-dcc2f2dd8cd3-06b214e4"
        class="w-layout-layout quick-stack _4er wf-layout-layout">
        <div id="w-node-_5c6b0864-c92b-0bb8-940e-dcc2f2dd8cd4-06b214e4" class="w-layout-cell cell"><img
                src="images/premium-badge.webp" loading="lazy" alt="Symbol" class="image-101">
            <h3 class="heading-links-klein1 heading-font2 heading-color" id="din"></h3>
            <p class="text-links1 paragraph-font mittig" id="dind"></p>
        </div>
        <div id="w-node-_5c6b0864-c92b-0bb8-940e-dcc2f2dd8cda-06b214e4" class="w-layout-cell cell"><img
                src="images/premium-badge.webp" loading="lazy" alt="Symbol" class="image-101">
            <h3 class="heading-links-klein1 heading-font2 heading-color" id="qc"></h3>
            <p class="text-links1 paragraph-font mittig" id="qcd"></p>
        </div>
        <div id="w-node-_5c6b0864-c92b-0bb8-940e-dcc2f2dd8ce0-06b214e4" class="w-layout-cell cell"><img
                src="images/premium-badge.webp" loading="lazy" alt="Symbol" class="image-101">
            <h3 class="heading-links-klein1 heading-font2 heading-color" id="qac"></h3>
            <p class="text-links1 paragraph-font mittig" id="qacd"></p>
        </div>
        <div id="w-node-_5c6b0864-c92b-0bb8-940e-dcc2f2dd8ce6-06b214e4" class="w-layout-cell cell"><img
                src="images/premium-badge.webp" loading="lazy" alt="Symbol" class="image-101">
            <h3 class="heading-links-klein1 heading-font2 heading-color" id="ci"></h3>
            <p class="text-links1 paragraph-font mittig" id="cid"></p>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script>
var qId;
document.getElementById("sending").innerHTML = "Send";

function utadata() {
    document.getElementById('chat-popup').style.display = 'block';
    qId = new Date().valueOf();
    document.getElementById('qid').innerHTML = qId;
}

function file_explorer() {
    // Add your file exploration logic here
    // For example, you can trigger a click event on the file input element
    document.getElementById('selectfile').click();
}

function upload_file(event) {
    event.preventDefault();
    var files = event.dataTransfer.files;
    var file_list = document.getElementById('file_list');

    file_list.innerHTML = ''; // Clear previous file list

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var file_item = document.createElement('li');
        file_item.textContent = file.name;
        file_list.appendChild(file_item);
    }

    // Dynamically set the height of the drag_upload_file container based on the file list height
    var dragUploadFile = document.getElementById('drag_upload_file');
    var fileListHeight = file_list.offsetHeight;
    dragUploadFile.style.height = fileListHeight + 'px';
}

// Add a resize event listener to adjust the height of the drag_upload_file container
window.addEventListener('resize', function() {
    var file_list = document.getElementById('file_list');
    var dragUploadFile = document.getElementById('drag_upload_file');
    var fileListHeight = file_list.offsetHeight;
    dragUploadFile.style.height = fileListHeight + 'px';
});

function uploadSelectedFiles() {
    // var qId=new Date().valueOf();
    // document.getElementById("qid").innerHTML=qId;
    var fullNameInput = document.getElementById('fullNameInput');
    var messageTextarea = document.getElementById('messageTextarea');
    var email = document.getElementById('email');
    var address = document.getElementById('address');
    var phoneNumber = document.getElementById('phoneNumber');
    if (fullNameInput.value.trim() === '') {
        alert('Please enter your full name');
        fullNameInput.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    if (email.value.trim() === '') {
        alert('Please enter your email');
        email.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    if (address.value.trim() === '') {
        alert('Please enter your address');
        address.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    if (phoneNumber.value.trim() === '') {
        alert('Please enter your phoneNumber');
        phoneNumber.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    if (messageTextarea.value.trim() === '') {
        alert('Please enter your message');
        messageTextarea.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    document.getElementById("sending").innerHTML = '<img src="images/icons/loading.gif" class="mx-auto w-8 h-8 z-20"/>';
    // if (fullNameInput.value.trim() === '') {
    //   alert('Please enter your full name');
    //   fullNameInput.focus(); // Set focus to the full name input field
    //   return false; // Prevent form submission
    // }

    // Set the 'required' attribute for the input fields
    fullNameInput.required = true;
    messageTextarea.required = true;
    const form = document.getElementById('quoteForm');
    const fileInput = document.getElementById('selectfile');
    const files = fileInput.files;

    if (files.length > 0) {
        const formData = new FormData(form);
        formData.append('fullName', document.querySelector('input[name="fullName"]').value);
        formData.append('qId', qId);
        formData.append('email', document.querySelector('input[name="email"]').value);
        formData.append('address', document.querySelector('input[name="address"]').value);
        formData.append('phoneNumber', document.querySelector('input[name="phoneNumber"]').value);
        formData.append('message', document.querySelector('textarea[name="message"]').value);
        formData.append('position', localStorage.getItem("position"));
        formData.append('roles', "user");
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            if (file.type === "image/jpeg" || file.type === "image/jpg" || file.type === "application/msword" || file
                .type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                if (file.size <= 2 * 1024 * 1024) {
                    formData.append('files[]', file);
                } else {
                    alert('File size exceeds 10MB limit:    ' + file.name);
                    return; // Stop further processing if file size exceeds the limit
                }
            } else {
                alert('Invalid file type:    ' + file.name);
                return; // Stop further processing if file type is invalid
            }
        }
        fetch('/quoteforpat.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Handle the server response
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 5000);
                closeForm();
                document.getElementById("sending").innerHTML = "Send";
                document.getElementById('fullNameInput').value = "";
                document.getElementById('messageTextarea').value = "";
                document.getElementById('email').value = "";
                document.getElementById('address').value = "";
                document.getElementById('phoneNumber').value = "";
            })
            .catch(error => {
                // Handle any errors
                console.error('Error uploading files:', error);
            });
    }
}

let droppedFiles = [];

function dragoverHandler(ev) {
    ev.preventDefault();
    ev.dataTransfer.dropEffect = "move";
}

function dragStartHandler(ev) {
    ev.preventDefault(0);
    console.log("==============", ev.target);
    const sourceImage = ev.target;

    // Check if the dragged item is an image file
    if (sourceImage.src.toLowerCase().match(/\.(jpg|jpeg|png|gif)$/)) {
        // Set the data to transfer
        ev.dataTransfer.setData("text/plain", "image"); // Set a data type to identify it as an image file
    } else if (sourceImage.src.toLowerCase().match(/\.(doc|docx|pdf)$/)) {
        // Set the data to transfer
        ev.dataTransfer.setData("text/plain", "document"); // Set a data type to identify it as a document file
    } else {
        // Set a default drag image for other file types
        ev.dataTransfer.setData("text/plain", "other"); // Set a data type to identify it as another file type
    }
}
var i = 0;

function dropHandler(ev) {
    ev.preventDefault();
    if (i < 3) {
        files = null;
        // Access the data type set in the dragStartHandler
        const dataType = ev.dataTransfer.getData("text/plain");

        // Create a new container with flex properties
        const flexContainer = document.createElement("div");
        flexContainer.className = "flex justify-center items-center"; // Add flex properties

        // Create a flex column container
        const flexColumn = document.createElement("div");
        flexColumn.className = "flex flex-col items-center"; // Add flex column properties

        // Create the image container
        const smallImage = document.createElement("div");
        smallImage.className = "image-container"; // Add a class to the image container for styling
        const imageElement = document.createElement("img");
        if (dataType === "image") {
            imageElement.src = "img.png"; // Show img.png for image files
        } else if (dataType === "document") {
            imageElement.src = "doc.png"; // Show doc.png for document files
        } else {
            // Handle other file types
            // For example, you can set a default image or handle them differently
            imageElement.src = "doc.png"; // Show a default image for other file types
        }
        imageElement.style.width = "50px"; // Set the width of the small image
        imageElement.style.height = "50px"; // Set the height of the small image
        imageElement.style.border = "1px solid black"; // Add a border to the small image
        imageElement.style.margin = "5px"; // Add some margin to the small image

        // Create a "cancel" button for removing the image
        const cancelButton = document.createElement("button");
        cancelButton.innerHTML = '<i class="fas closed fa-times"></i>'; // Use the Font Awesome cancel icon
        cancelButton.addEventListener("click", function() {
            flexColumn.remove(); // Remove the flex column when the "cancel" button is clicked
            i = i - 1;
            console.log(flexColumn)
            // Get the file name from the File object
            const fileName = document.createElement("div");
            console.log(fullFileName)
            const file = event.dataTransfer.files[0]; // Assuming only one file is dropped
            const fullFileName = file.name;
            console.log(droppedFiles);
            // Find the index of the file in the droppedFiles array
            const droppedFiles = droppedFiles.filter(file => file.name !== fileName);
            console.log(droppedFiles);

        });

        i = i + 1;
        // Append the image and the "cancel" button to the image container
        smallImage.appendChild(imageElement);
        smallImage.appendChild(cancelButton);

        // Append the image container to the flex column
        flexColumn.appendChild(smallImage);

        // Get the file name from the File object
        const fileName = document.createElement("div");
        const file = event.dataTransfer.files[0]; // Assuming only one file is dropped
        const fullFileName = file.name;
        const shortFileName = fullFileName.substring(0, 6); // Get the first 4 characters of the file name
        fileName.textContent = shortFileName; // Set the short file name
        fileName.title = fullFileName; // Set the full file name as the title for hover

        // Add a class to style the file name
        fileName.className = "file-name text-center";

        // Add a hover effect using CSS
        fileName.style.cursor = "pointer"; // Change cursor to pointer on hover
        fileName.style.textDecoration = "underline"; // Underline the text on hover

        // Show the full file name on hover
        fileName.addEventListener("mouseover", function() {
            fileName.textContent = fullFileName; // Show the full file name on hover
        });

        // Show the short file name on mouseout
        fileName.addEventListener("mouseout", function() {
            fileName.textContent = shortFileName; // Show the short file name on mouseout
        });

        // Append the file name to the flex column
        flexColumn.appendChild(fileName);

        // Append the flex column to the flex container
        flexContainer.appendChild(flexColumn);

        // Append the flex container to the drop target
        ev.target.appendChild(flexContainer);

        // files = event.dataTransfer.files;
        // droppedFiles = Array.from(files);

        droppedFiles.push(file);
        // Handle the dropped files
        console.log(files);
    } else alert("You can attach less than 3 files. ")
}

function openForm() {
    document.getElementById("chat-popup").style.display = "block";
}

function openFileInput() {
    document.getElementById('fileInput').click();
}

function closeForm() {
    document.getElementById("chat-popup").style.display = "none";
    console.log('Files uploaded successfully');
}
</script>

</html>