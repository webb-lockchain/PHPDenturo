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

  /* Full-width textarea */
  .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
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
      <script>localStorage.setItem("user", "<?php echo $_SESSION['user']; ?>");</script>
      <div id="loginButton" class="flex items-center p-8">
        <div class="termin-button-new heading-font3 highlights w-button aa"
          onclick="document.getElementById('chat-popup').style.display='block'">Make a Quote</div>
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
            <div class="p-4 hover:bg-gray-200 hover:cursor-pointer flex flex-row" onclick="handleButtonClick('logout')">
              <img class="w-6 h-6" src="images/icons/logout.png"></img>
              <div class="ml-2">Logout</div>
            </div>
          </div>
        </div>
      </div>
      <div id="snackbar">Please check your email and verify your uploaded data.</div>
      <script>setNoti()</script>
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
      }
      else {
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
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              // Redirect to fur-zahnarzte.php after setting the session value to null
              window.location.href = "fur-zahnarzte.php";
            }
          };
          xhr.send();
        }
        else if (action === 'activity') {
          window.location.href = "activity-page.php";
        }
        else if (action === 'settings') {
          window.location.href = "settings.php";
        }
      }
      function setNoti() {
        alert("dddd")
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
      }
    </script>








  </div>

</div>

<div id="viewtable" style="display:none">
  <div class="-mt-12">
    <div id="progressstatus" class="mx-auto w-full md:w-1/2">
      <div class="w-full flex justify-center items-center">
        <div title="Successfully sent" class="w-24 h-24 rounded-full border-8 border-green-600  hover:cursor-pointer">
        </div>
        <div class="border-4  w-1/3 border-green-500"></div>
        <div title="In progress" class="w-24 h-24 rounded-full border-8 border-gray-600 relative hover:cursor-pointer">
        </div>
        <img src='images/icons/lg.gif' alt="this slowpoke moves" class="absolute -z-20 absolute w-60 mx-auto" />
        <div class="border-4 w-1/3 border-gray-500"></div>
        <div title="Final" class="w-24 h-24 rounded-full border-8 border-gray-600 hover:cursor-pointer"></div>
      </div>
    </div>
  </div>
  <div class="overflow-x-auto mb-4">
    <table class="mx-4" style="margin:auto; margin-top:50px;" id="dataTable">
      <tbody>
        <tr>
          <th>No</th>
          <th>Message</th>
          <th>File Info</th>
          <th>Quote date</th>
          <th>Offer date</th>
          <th>Appointed date</th>
          <th>Delete</th>
        </tr>
        <tr id="row_4" class="viewtable">
          <td>1</td>
          <td>a s</td>
          <td>d@g.com</td>
          <td>a s</td>
          <td>d@g.com</td>
          <td style="text-align: center;" onclick="{alert(&quot;Developing!!!&quot;)}">
            <!-- <img class="w-8 h-8 mx-auto" src="images/icons/reset-password.png" alt="download"> -->
          </td>
          <td style="text-align: center;" onclick="{deleteRow(4)}">
            <img class="mx-auto" src="images/icons/delete.png" alt="download">
          </td>
        </tr>
        <tr id="row_5" class="viewtable1">
          <td>2</td>
          <td>James John</td>
          <td>sayjun0505@gmail.com</td>
          <td>James John</td>
          <td>sayjun0505@gmail.com</td>
          <td style="text-align: center;" onclick="{alert(&quot;Developing!!!&quot;)}">
            <!-- <img class="w-8 h-8 mx-auto" src="images/icons/reset-password.png" alt="download"> -->
          </td>
          <td style="text-align: center;" onclick="{deleteRow(5)}">
            <img class="mx-auto" src="images/icons/delete.png" alt="download">
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php include("footer.php"); ?>
<script>
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
    document.getElementById("offer-popup").style.display = "none";
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
    console.log('Files uploaded successfully');
  }
  $('.form').find('input, textarea').on('keyup blur focus', function (e) {

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
      }
      else if ($this.val() !== '') {
        label.addClass('highlight');
      }
    }

  });

  $('.tab a').on('click', function (e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

  });
</script>

</html>