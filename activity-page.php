<?php
session_start();
?>
<!DOCTYPE html>
<html data-wf-page="64f819fa17a837c521b18653" data-wf-site="64ca1f0ebcad6b7ae9d95e37" lang="de">
<?php include("header.php"); ?>

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* #viewdetail-offer {
    background-image: url('images/ordered.png');
} */

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

.aa {
    font-size: 20px;
    z-index: 0 !important;
    margin-top: 10px !important;
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
.offer-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 99;
    width: 300px;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab */
.tab {
    overflow: hidden;
    background-color: #f1f1f1;
}

/* Style the tab content */
.tabcontent {
    display: none;
    border-top: none;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

.dropbtn {
    background-color: #4CAF50;
    /* color: white;
    padding: 16px;
    font-size: 16px; */
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-right: 10px;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}





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

.qq {
    max-width: 500px !important;
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

.detail-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 99;
    width: 300px;
}

.detail-offer-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 99;
    width: 300px;
}

/* Full-width textarea */
.form-container input {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
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

th {
    background-color: #d8d8d8;
    padding: 10px;
}

td {
    padding: 4px;
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

.forma {
    background: rgba(19, 35, 47, 0.9) !important;
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 4px;
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3) !important;
}

.tab-group {
    list-style: none;
    padding: 0;
    margin: 0 0 40px 0;

    &:after {
        content: "";
        display: table;
        clear: both;
    }

    li a {
        display: block;
        text-decoration: none;
        padding: 15px;
        background: rgba(160, 179, 176, 0.25);
        color: #a0b3b0;
        font-size: 20px;
        float: left;
        width: 50%;
        text-align: center;
        cursor: pointer;
        transition: .5s ease;

        &:hover {
            background: darken(#1ab188, 5%);
            color: #ffffff;
        }
    }

    .active a {
        background: #1ab188;
        color: #ffffff;
    }
}

.tab-content>div:last-child {
    display: none;
}

.button {
    border: 0;
    outline: none;
    border-radius: 0;
    padding: 15px 0;
    font-size: 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .1em;
    background: #1ab188;
    color: #ffffff;
    transition: all.5s ease;
    -webkit-appearance: none;

    &:hover,
    &:focus {
        background: darken(#1ab188, 5%);
    }
}

.button-block {
    display: block;
    width: 100%;
}

.forgot {
    margin-top: -20px;
    text-align: right;
    color: #fff;
    margin-bottom: 10px;
}

.snup {
    text-align: center;
    color: #ffffff;
    font-weight: 300;
    margin: 0 0 40px;
}

label {
    position: absolute;
    transform: translateY(6px);
    left: 13px;
    color: rgba(255, 255, 255, 0.5);
    transition: all 0.25s ease;
    -webkit-backface-visibility: hidden;
    pointer-events: none;
    font-size: 22px;

    .req {
        margin: 2px;
        color: #1ab188;
    }
}

label.active {
    transform: translateY(50px);
    left: 2px;
    font-size: 14px;

    .req {
        opacity: 0;
    }
}

label.highlight {
    color: #ffffff;
}

input,
textarea {
    font-size: 22px !important;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    color: #ffffff;
    border-radius: 0;
    transition: border-color .25s ease, box-shadow .25s ease;

    &:focus {
        outline: 0;
        border-color: #1ab188;
    }
}

textarea {
    border: 2px solid #a0b3b0;
    resize: vertical;
}

.field-wrap {
    position: relative;
    margin-bottom: 40px;
}

.field-wrap label {
    transition: color 0.3s;
    /* Add a smooth color transition */
}

.field-wrap:hover label {
    color: transparent;
    /* Set the label's font color to transparent on hover */
}

.wwwm {
    background: rgba(19, 35, 47, 1) !important;
    max-width: 600px;
}

.cncl {
    color: white !important;

}

.top-row {
    &:after {
        content: "";
        display: table;
        clear: both;
    }

    >div {
        float: left;
        width: 48%;
        margin-right: 4%;

        &:last-child {
            margin: 0;
        }
    }
}

.section-mittig1 {
    padding-top: 20px !important;
}
</style>
<?php
include("conf.php");
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();
$server = getenv('server');
$user = getenv('login');
$password = getenv('password');
$database = getenv('database');
$conn = new mysqli($server, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  $tableName = "userdata";
}


?>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="section-mittig1">
    <div class="flex justify-end w-full">
        <div id="logined">
            <script>
            localStorage.setItem("user", "<?php echo $_SESSION['user']; ?>");
            </script>
            <div id="loginButton" class="flex items-center p-8">
                <div class="termin-button-new heading-font3 highlights w-button aa" onclick="utadata()" id="uta">Request
                    a Quote
                </div>
                <div class="dropdown mr-12 ml-8">
                    <img class="dropbtn w-14 h-12" src='images/icons/logedin.jpg'></img>
                    <div class="dropdown-content">
                        <div class="p-4 hover:bg-gray-200 hover:cursor-pointer flex flex-row"
                            onclick="handleButtonClick('settings')">
                            <img class="w-6 h-6" src="images/icons/settings.png"></img>
                            <div class="ml-2">Settings</div>
                        </div>
                        <div class="p-4 hover:bg-gray-200 hover:cursor-pointer flex flex-row"
                            onclick="handleButtonClick('activity')">
                            <img class="w-6 h-6" src="images/icons/data.jpg"></img>
                            <div class="ml-2">Activity</div>
                        </div>
                        <div class="p-4 hover:bg-gray-200 hover:cursor-pointer flex flex-row"
                            onclick="handleButtonClick('logout')">
                            <img class="w-6 h-6" src="images/icons/logout.png"></img>
                            <div class="ml-2">Logout</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="snackbar">Please check your email and verify your uploaded data.</div>
        </div>
        <div id="new">
            <div id="loginButton" class="p-8">
                <div class="termin-button-new heading-font3 highlights w-button aa mb-10 mt-0"
                    onclick="document.getElementById('offer-popup').style.display='block'">Login</div>
            </div>
        </div>
        <script>
        if (localStorage.getItem("user") == '') {
            document.getElementById("new").style.display = 'block';
            document.getElementById("logined").style.display = 'none';
        } else {
            document.getElementById("new").style.display = 'none';
            document.getElementById("logined").style.display = 'block';
        }

        function handleButtonClick(action) {
            var button = document.getElementById('loginButton');
            if (action === 'logout') {
                localStorage.setItem("user", "");
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "logout.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Redirect to fur-zahnarzte.php after setting the session value to null
                        window.location.href = "fur-zahnarzte.php";
                    }
                };
                xhr.send();
            } else if (action === 'activity') {
                window.location.href = "activity-page.php";
            } else if (action === 'settings') {
                window.location.href = "settings.php";
            }
        }
        </script>
    </div>
</div>
<div id="viewtable" style="display:none" class="w-full mx-4 md:w-3/5 md:mx-auto">
    <div class="mb-12 w-full border-2 border-gray-200 rounded-xl p-6">
        <div class="panel mt-6 flex flex-col w-full gap-4" id="viewquotes">
        </div>
    </div>
</div>
<div id="detail-popup" class="w3-modal">
    <div class="w3-modal-content qq">
        <div class="w3-container">
            <div class=" w3-display-topright">
                <span><a href="https://run.briskinvoicing.com/help/quotes_help.html" class="underline">Help</a></span>

                <span onclick="document.getElementById('detail-popup').style.display='none'"
                    class="w3-button">&times;</span>
            </div>
            <div class="w-full" id="quoteForm">
                <a href="index.php" aria-current="page" class="flex justify-start w-full w-inline-block"><img
                        src="images/DenturoLogo.png" alt="Logo" loading="lazy" class=" mt-8 logo-img  w-20 h-20"></a>
                <h1 class="mb-6 text-center text-3xl md:text-5xl" style="font-family: Raleway,sans-serif !important;
        font-weight: bold;!important">Requested quote</h1>
                <div id="viewdetail">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="detail-offer-popup" class="w3-modal">
    <div class="w3-modal-content qq">
        <div class="w3-container">
            <div class=" w3-display-topright">
                <span><a href="https://run.briskinvoicing.com/help/quotes_help.html" class="underline">Help</a></span>

                <span onclick="document.getElementById('detail-offer-popup').style.display='none'"
                    class="w3-button">&times;</span>
            </div>
            <div class="w-full" id="quoteForm">
                <a href="index.php" aria-current="page" class="flex justify-start w-full w-inline-block"><img
                        src="images/DenturoLogo.png" alt="Logo" loading="lazy" class=" mt-8 logo-img  w-20 h-20"></a>
                <h1 class="mb-6 text-center text-3xl md:text-5xl" style="font-family: Raleway,sans-serif !important;
        font-weight: bold;!important">Received offer</h1>
                <div class="relative">
                    <div id="viewdetail-offer">
                    </div>
                    <div id="orderstatus" class="absolute bottom-0">
                        <img src="images/ordered.png" class="opacity-20 w-full h-fit" />
                    </div>
                </div>
                <div class=" w-full mb-8 flex justify-end" onclick="toggleorder()">
                    <img src=" images/icons/neworder.gif" alt="Logo" loading="lazy" title="Order me when you click this"
                        class="hover:cursor-pointer -mt-6 mr-4  w-12 h-12">
                </div>
                <div class="flex justify-center items-center gap-2">
                    <button type="button" class="mb-4 py-4 px-6 text-white bg-green-500 rounded-lg mx-auto aa send"
                        onclick="sendstatus()">
                        Send
                    </button>
                    <button type="button" class="mb-4 py-4 px-6 text-white bg-red-500 rounded-lg mx-auto aa send"
                        onclick="document.getElementById('detail-offer-popup').style.display='none'">
                        Cancel
                    </button>
                </div>
            </div>

        </div>
    </div>



    <div id="chat-popup" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <div class=" w3-display-topright">
                    <span><a href="https://run.briskinvoicing.com/help/quotes_help.html"
                            class="underline">Help</a></span>

                    <span onclick="document.getElementById('chat-popup').style.display='none'"
                        class="w3-button">&times;</span>
                </div>

                <form class="form-container" method="POST" enctype="multipart/form-data" id="quoteForm" class="w-full">
                    <div class="w-full">
                        <a href="index.php" aria-current="page">
                            <img src="images/DenturoLogo.png" alt="Logo" loading="lazy"
                                class=" mt-8 logo-img  w-20 h-20">
                        </a>
                    </div>
                    <h1 class="m-4 text-center" style="font-family: Raleway,sans-serif !important;
                font-weight: bold;!important">Request a quote</h1>
                    <div class="w-full bg-blue-100 p-4 border-green-500 border-2 mb-8">
                        <h3>Get Started</h3>
                        <h4>This is the moment for requesting a quote. Your sent data will be private and we will
                            send
                            offer
                            via
                            email as soon as possible.</h4>
                    </div>

                    <div class="">
                        <label for="message" class=" text-sm text-gray-700 relative"><b>Message</b></label>
                        <textarea placeholder="Enter your message" id="messageTextarea"
                            class="h-auto  text-sm text-gray-700" name="message" required></textarea>

                        <label for="attachment" class=" text-sm text-gray-700 relative"><b>Attach Files (Drag
                                here)</b></label>
                        <div id="drop_file_zone" ondrop="dropHandler(event)" ondragover="dragoverHandler(event)"
                            class="hover:cursor-pointer h-fit flex flex-wrap gap-2 justify-center items-center">
                            <ul id="file_list" class="flex flex-row flex-wrap gap-2"></ul>
                        </div>
                        <div class="flex justify-end">Your quote ID: <b id="qid"></b></div>
                    </div>
                    <div class="mt-12 w-full sm:w-2/3 mx-auto">
                        <div class="flex flex-row justify-between">
                            <button type="button" class="btn w-2/5 aa send" onclick="uploadSelectedFiles()">
                                <div id="sending"></div>
                            </button>
                            <button type="button" class="btn w-2/5 cancel aa" onclick="closeForm()">Close</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <script>
    var qId;
    document.getElementById("sending").innerHTML = "Send";
    var allquotes = [];
    let toggle = false;
    document.getElementById("orderstatus").style.display = "none";

    function toggleorder() {
        if (toggle) {
            document.getElementById("orderstatus").style.display = "none";
        } else {
            document.getElementById("orderstatus").style.display = "block";
        }
        toggle = !toggle;
    }

    function sendstatus() {
        console.log(toggle);
        if (toggle) {
            $.ajax({
                type: "GET",
                url: "quoteforden.php",
                data: {
                    where: "ordertoggle_" + toggle
                },
                success: function(data) {
                    temp = JSON.parse(JSON.parse(data));
                    document.getElementById('detail-offer-popup').style.display = 'none';
                }
            })
        }
        document.getElementById('detail-offer-popup').style.display = 'none';

    }

    function getstatusquote(id, s) {
        switch (id) {
            case '0':
                return '<img src="images/icons/view.png" title="Viewed by Lab" class="w-8 h-8 opacity-20" /><img src = "images/icons/offer.png" class = " opacity-10 w-8 h-8" / ><img src = "images/icons/order.png" title = "Sent new order" class = "w-8 h-8 opacity-20" / >';
                break;
            case '1':
                return '<img src="images/icons/view.png" title="Viewed by Lab" class="w-8 h-8" /><img src = "images/icons/offer.png" class = " opacity-10 w-8 h-8" / ><img src = "images/icons/order.png" title = "Sent new order" class = "w-8 h-8 opacity-20" / >';
                break;
            case '2':
                return '<img src="images/icons/view.png" title="Viewed by Lab" class="w-8 h-8" /><img src = "images/icons/offer.png" onclick="viewoffer(' +
                    s +
                    ')" title = "Received new offer" class = "w-8 h-8" / ><img src = "images/icons/order.png" title = "Sent new order" class = "w-8 h-8 opacity-20" / >';
                break;
            case '3':
                return '<img src="images/icons/view.png" title="Viewed by Lab" class="w-8 h-8" /><img src = "images/icons/offer.png" onclick="viewoffer(' +
                    s +
                    ')" title = "Received new offer" class = "w-8 h-8" / ><img src = "images/icons/order.png" onclick="vieworder(' +
                    s + ')" title = "Sent new order" class = "w-8 h-8" / >';
                break;
        }
    }
    var quotescontent = ''

    function refreshallquotes(quotes) {
        if (quotes.length != 0) {
            var firstrow =
                ' <div class=" hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between sm:items-center py-4"><div class="w-full sm:w-2/12 flex flex-col"><div class="text-lg">' +
                quotes[0].created + '</div><div class="text-sm">' + quotes[0].passed + ' ago' +
                '</div></div><div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500" onclick="viewQuote(' +
                quotes[0].id + ')">' + quotes[0].msg +
                '</div><div class="flex flex-row gap-2">' + getstatusquote(quotes[0].statuss, quotes[0]
                    .id) +
                '</div></div>';
            var statusquote = '';
            if (quotes.length == 1) {
                quotescontent = firstrow;
            } else {
                for (let i = 1; i < quotes.length; i++) {
                    quotescontent = quotescontent +
                        ' <div class=" hover:cursor-pointer flex flex-col sm:flex-row w-full justify-between sm:items-center  border-t-2  border-gray-200 py-4"><div class="w-full sm:w-2/12 flex flex-col"><div class="text-lg">' +
                        quotes[i].created + '</div><div class="text-sm">' + quotes[i].passed + ' ago' +
                        '</div></div><div class="mt-2 sm:mt-0 w-full sm:w-6/12 underline text-green-500" onclick="viewQuote(' +
                        quotes[i].id + ')">' + quotes[i].msg +
                        '</div><div class="flex flex-row gap-2">' + getstatusquote(quotes[i].statuss,
                            quotes[i]
                            .id) +
                        '</div></div>';
                }
                quotescontent = firstrow + quotescontent;
            }
        }
        document.getElementById("viewquotes").innerHTML = quotescontent;
    }

    function viewQuote(qid) {
        $.ajax({
            type: "GET",
            url: "quoteforden.php",
            data: {
                where: "q_" + qid
            },
            success: function(data) {
                temp = JSON.parse(JSON.parse(data));
                console.log(temp)
                detail = {
                    userfile: temp.userfile,
                    id: qid,
                    usermsg: temp.quote.usermsg,
                    user: {
                        fname: temp.quote.fname,
                        email: temp.quote.email,
                        phone: temp.quote.phone,
                        address: temp.quote.address
                    }
                };
                var filetag = '';
                for (let i = 0; i < detail.userfile.length; i++) {
                    filetag = filetag + '<a href=' + '"' + detail.userfile[i]
                        .url + '"' +
                        'class="underline text-blue-500 hover:text-blue-400" download>' +
                        detail.userfile[i]
                        .orgname + '</a>';
                }
                document.getElementById('detail-popup').style.display = 'block';
                document.getElementById('viewdetail').innerHTML =
                    '<div class="flex flex-row justify-end mb-8"><div><b>quoteID:</b>&nbsp;' +
                    detail
                    .id +
                    '</div></div><div class="w-full p-8 mb-4 rounded-xl border-2 border-gray-300 "><div class="flex flex-row justify-between"><div id="showoption"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400"  onclick="visible()"></div></div><div class="flex flex-row justify-between"><div id="showoptionM" class=" underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleM()"></div></div><div id="contactinfoM" class="p-6 border-[1px] border-gray-500 mb-8">' +
                    detail.usermsg +
                    '</div><div class="flex flex-row justify-between"><div id="showoptionF"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleF()"></div></div><div id="contactinfoF" class="w-full p-6 border-[1px] border-gray-500 flex justify-center"><div class="grid grid-cols-1 sm:grid-cols-2 gap-6"> ' +
                    filetag + '</div></div >';
            }
        });
    }

    function viewoffer(id) {
        console.log("o_" + id);
        $.ajax({
            type: "GET",
            url: "quoteforden.php",
            data: {
                where: "o_" + id
            },
            success: function(data) {
                temp = JSON.parse(JSON.parse(data));
                console.log(temp)
                detail = {
                    userfile: temp.userfile,
                    id: "o_" + id,
                    created: temp.quote.created,
                    usermsg: temp.quote.msg,
                    user: {
                        fname: temp.quote.fname,
                        email: temp.quote.email,
                        phone: temp.quote.phone,
                        address: temp.quote.address
                    }
                };
                var filetag = '';
                for (let i = 0; i < detail.userfile.length; i++) {
                    filetag = filetag + '<a href=' + '"' + detail.userfile[i]
                        .url + '"' +
                        'class="underline text-blue-500 hover:text-blue-400" download>' +
                        detail.userfile[i]
                        .orgname + '</a>';
                }
                document.getElementById('detail-offer-popup').style.display = 'block';
                document.getElementById('viewdetail-offer').innerHTML =
                    '<div class="flex flex-row justify-end mb-8"><div class="flex flex-col p-2"><div><b>offerID:</b>&nbsp;' +
                    detail
                    .id +
                    '</div><div><b>created in:</b>&nbsp;' + detail
                    .created +
                    '</div></div></div><div id="cont" class="w-full p-8 mb-4 rounded-xl border-2 border-gray-300"><div class="flex flex-row justify-between"><div id="showoption"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400"  onclick="visible()"></div></div><div class="flex flex-row justify-between"><div id="showoptionM" class=" underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleM()"></div></div><div id="contactinfoM" class="p-6 border-[1px] border-gray-500 mb-8">' +
                    detail.usermsg +
                    '</div><div class="flex flex-row justify-between"><div id="showoptionF"  class="underline text-blue-500 hover:cursor-pointer hover:text-blue-400" onclick="visibleF()"></div></div><div id="contactinfoF" class="w-full p-6 border-[1px] border-gray-500 flex justify-center"><div class="grid grid-cols-1 sm:grid-cols-2 gap-6"> ' +
                    filetag + '</div></div >';
            }
        });
    }

    function requestquotes(email) {
        $.ajax({
            type: "GET",
            url: "quoteforden.php",
            data: {
                where: "allquotes_" + email
            },
            success: function(data) {
                allquotes = JSON.parse(data);
                refreshallquotes(allquotes);
            }
        });
    }
    requestquotes(localStorage.getItem("email"));

    function utadata() {
        document.getElementById('chat-popup').style.display = 'block';
        qId = new Date().valueOf();
        document.getElementById('qid').innerHTML = qId;
    }
    if (localStorage.getItem("user") == "") window.location.href = "fur-zahnarzte.php";
    else document.getElementById("viewtable").style.display = "block";

    function file_explorer() {
        // Add your file exploration logic here
        // For example, you can trigger a click event on the file input element
        document.getElementById('selectfile').click();
    }

    function openForm() {
        document.getElementById("offer-popup").style.display = "block";
    }

    function openFileInput() {
        document.getElementById('fileInput').click();
    }

    function closeForm() {
        document.getElementById("chat-popup").style.display = "none";
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 5000);
        console.log('Files uploaded successfully');
    }
    $('.form').find('input, textarea').on('keyup blur focus', function(e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });

    $('.tab a').on('click', function(e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
    </script>

</html>