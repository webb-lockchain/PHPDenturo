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
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="section-mittig1">
  <div class="flex justify-end w-full">
    <div id="logined">
      <script>
        localStorage.setItem("user", "<?php echo $_SESSION['user']; ?>");
        localStorage.setItem("email", "<?php echo $_SESSION['email']; ?>");
      </script>
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
          localStorage.setItem("email", "");
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
  <div class="inhalt-nebeneinander1">

    <div data-w-id="db7c6774-6cf6-4ef3-c7d3-24034ff2f767" style="opacity:0" class="inhalt-untereinander1">

      <h1 data-w-id="db7c6774-6cf6-4ef3-c7d3-24034ff2f768" style="opacity:0" class="heading-links1 heading-font1 ZvD">
      </h1>
      <p class="text-links1 paragraph-font" id="EikG"></p>
      <h2 class="heading-links-klein1 heading-font2 heading-color-1" id="WSE"></h2>
      <p class="text-links1 paragraph-font" id="WbI"></p>
    </div>
    <div class="feature-image-mask"><img class="feature-image" src="images/AdobeStock_197373009.webp"
        alt="Zahnarzt und Patient in der Zahnarztpraxis" style="opacity:0"
        sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
        data-w-id="db7c6774-6cf6-4ef3-c7d3-24034ff2f77a" loading="lazy"
        srcset="images/AdobeStock_197373009-p-500.webp 500w, images/AdobeStock_197373009-p-800.webp 800w, images/AdobeStock_197373009-p-1080.webp 1080w, images/AdobeStock_197373009.webp 1500w">
    </div>
  </div>
</div>
<div>
  <div class="w-layout-grid _3c-grid-nospace _4er switch">
    <div id="w-node-af32dfc9-4c1c-f74a-2893-e223f735d8c8-21b18653" class="image-wrapper"><img
        src="images/AdobeStock_100592748.webp" loading="lazy" sizes="100vw"
        srcset="images/AdobeStock_100592748-p-500.webp 500w, images/AdobeStock_100592748-p-800.webp 800w, images/AdobeStock_100592748-p-1080.webp 1080w, images/AdobeStock_100592748.webp 1500w"
        alt="Zahnarzt untersucht die Zähne eines Patienten" class="img-100 rechts"></div>
    <div id="w-node-af32dfc9-4c1c-f74a-2893-e223f735d8ca-21b18653" class="column-links1 secondary-color midde"><img
        src="images/Denturo.webp" alt="Symbol" loading="lazy" class="icon1">
      <h3 data-w-id="af32dfc9-4c1c-f74a-2893-e223f735d8cc" style="opacity:0"
        class="heading-mitting1-small heading-font1 heading-color" id="GGd"></h3>
      <p class="text-links1 paragraph-font" id="ZESi"></p>
    </div>
  </div>
</div>
<div class="section-mittig1 zweitfarbe-2">
  <div class="inhalt-nebeneinander1">
    <div data-w-id="6884d5f2-2a36-ae1b-7762-d2671a6748e3" style="opacity:0" class="inhalt-untereinander1">
      <h2 data-w-id="ee283730-4d41-a3ba-8e4f-46905f272067" style="opacity:0" class="heading-links1 heading-font1 ZvD">
      </h2>
      <h3 data-w-id="4ec4a697-6eb8-a323-b919-22669764ebd4" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="Gng"></h3>
      <p class="text-links1 paragraph-font" id="NhS"></p>
      <h3 data-w-id="b4a96d40-d1a3-e7d1-fc65-d2b2bf24689e" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="AN"></h3>
      <p class="text-links1 paragraph-font" id="WSmI"></p>
      <h3 data-w-id="8817e937-32ba-da6e-a337-4448d33ccdcc" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="Inf"></h3>
      <p class="text-links1 paragraph-font" id="Sek"></p>
    </div>
    <div class="feature-image-mask"><img class="feature-image" src="images/AdobeStock_237676628.webp"
        alt="Nahaufnahme von Zahnprothesen beim Zahnarzt, der in der Klinik am Tisch arbeitet." style="opacity:0"
        sizes="(max-width: 479px) 100vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
        data-w-id="6884d5f2-2a36-ae1b-7762-d2671a6748e2" loading="lazy"
        srcset="images/AdobeStock_237676628-p-500.webp 500w, images/AdobeStock_237676628-p-800.webp 800w, images/AdobeStock_237676628-p-1080.webp 1080w, images/AdobeStock_237676628.webp 1500w">
    </div>
  </div>
  <div class="inhalt-nebeneinander1">
    <div class="feature-image-mask"><img class="feature-image" src="images/AdobeStock_276055916.webp"
        alt="Der Zahnarzt hält Zahnersatz in seinen Händen" style="opacity:0"
        sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
        data-w-id="1aca73ae-477b-662f-f523-01d0da5d3fce" loading="lazy"
        srcset="images/AdobeStock_276055916-p-500.webp 500w, images/AdobeStock_276055916-p-800.webp 800w, images/AdobeStock_276055916-p-1080.webp 1080w, images/AdobeStock_276055916.webp 1500w">
    </div>
    <div data-w-id="1aca73ae-477b-662f-f523-01d0da5d3fbb" style="opacity:0" class="inhalt-untereinander1">
      <h3 data-w-id="1aca73ae-477b-662f-f523-01d0da5d3fbe" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="PS"></h3>
      <p class="text-links1 paragraph-font" id="ZES"></p>
      <h3 data-w-id="1aca73ae-477b-662f-f523-01d0da5d3fc3" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="DP"></h3>
      <p class="text-links1 paragraph-font" id="Sdg"></p>
    </div>
  </div>
</div>
<div class="section-mittig1">
  <div id="w-node-dc44177f-cb34-a120-fca7-3ee20fc01428-21b18653"
    class="w-layout-layout quick-stack _4er wf-layout-layout">
    <div id="w-node-dc44177f-cb34-a120-fca7-3ee20fc01429-21b18653" class="w-layout-cell cell-white">
      <div href="#" class="flip-card">
        <div class="div-block-161">
          <div data-w-id="dc44177f-cb34-a120-fca7-3ee20fc0142c" class="flip-wrapper">
            <div class="flip-box">
              <div class="flip-box-front"><img src="images/denture.webp" loading="lazy" alt="Symbol" class="image-101">
                <h3 class="heading-links-klein1 heading-font2 heading-color" id="VZP"></h3>
                <p class="text-links1 paragraph-font mittig" id="MZb"></p>
              </div>
              <div class="flip-box-back">
                <p class="text-links1 paragraph-font mittig" id="MZa"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="w-node-dc44177f-cb34-a120-fca7-3ee20fc01437-21b18653" class="w-layout-cell cell-white">
      <div href="#" class="flip-card">
        <div class="div-block-161">
          <div data-w-id="dc44177f-cb34-a120-fca7-3ee20fc0143a" class="flip-wrapper">
            <div class="flip-box">
              <div class="flip-box-front"><img src="images/fixing.webp" loading="lazy" alt="Symbol" class="image-101">
                <h3 class="heading-links-klein1 heading-font2 heading-color" id="imp"></h3>
                <p class="text-links1 paragraph-font mittig" id="ZII"></p>
              </div>
              <div class="flip-box-back">
                <p class="text-links1 paragraph-font mittig" id="ZIa"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="w-node-dc44177f-cb34-a120-fca7-3ee20fc01445-21b18653" class="w-layout-cell cell-white">
      <div href="#" class="flip-card">
        <div class="div-block-161">
          <div data-w-id="dc44177f-cb34-a120-fca7-3ee20fc01448" class="flip-wrapper">
            <div class="flip-box">
              <div class="flip-box-front"><img src="images/dental-implant.webp" loading="lazy" alt="Symbol"
                  class="image-101">
                <h3 class="heading-links-klein1 heading-font2 heading-color">CAD/CAM</h3>
                <p class="text-links1 paragraph-font mittig" id="IHT"></p>
              </div>
              <div class="flip-box-back">
                <p class="text-links1 paragraph-font mittig" id="CCT"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="w-node-dc44177f-cb34-a120-fca7-3ee20fc01453-21b18653" class="w-layout-cell cell-white">
      <div href="#" class="flip-card">
        <div class="div-block-161">
          <div data-w-id="dc44177f-cb34-a120-fca7-3ee20fc01456" class="flip-wrapper">
            <div class="flip-box">
              <div class="flip-box-front"><img src="images/prosthetic.webp" loading="lazy" alt="Symbol"
                  class="image-101">
                <h3 class="heading-links-klein1 heading-font2 heading-color" id="Pro"></h3>
                <p class="text-links1 paragraph-font mittig" id="NZi"></p>
              </div>
              <div class="flip-box-back">
                <p class="text-links1 paragraph-font mittig" id="ITu"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bild-cover1 hintergrund">
  <div class="inhalt-nebeneinander1">
    <div data-w-id="7e252f9b-013e-8dc9-9bf3-dfa141b3c8df" style="opacity:0" class="inhalt-untereinander1 mittig">
      <h2 data-w-id="7e252f9b-013e-8dc9-9bf3-dfa141b3c8e0" style="opacity:0"
        class="heading-links1 heading-font1 heading-color sfy"></h2>
      <h2 class="heading-links-klein1 heading-font2 heading-color mittig sfydetail">
        <h2 class="heading-links-klein1 heading-font2 heading-color mittig">
          <a href="tel:0681/41095956" class="link-10">0681/41095956<br></a>
          <a href="mailto:info@denturo.de" class="link-10">info@denturo.de</a><br><br>
          <div class="wl"></div>
        </h2>
    </div>
  </div>
  <a data-w-id="7e252f9b-013e-8dc9-9bf3-dfa141b3c8f2" href="kontakt.php"
    class="termin-button-new heading-font3 highlights w-button aa" id="Aa"></a>


</div>


<div id="offer-popup" class="w3-modal w-fit h-fit">
  <div class="w3-modal-content wwwm">
    <div class="w3-container">
      <span onclick="document.getElementById('offer-popup').style.display='none'"
        class="w3-button w3-display-topright cncl">&times;</span>
      <div id="bb">
        <div>
          <div class="forma">
            <ul class="tab-group">
              <li class="tab active"><a href="#signup">Sign Up</a></li>
              <li class="tab"><a href="#login">Log In</a></li>
            </ul>

            <div class="tab-content">
              <div id="signup">
                <h1 class="snup">Sign Up for Free</h1>
                <form class="auth-form" action="signup.php" method="post">
                  <div class="top-row">
                    <div class="field-wrap">
                      <label>
                        First Name<span class="req">*</span>
                      </label>
                      <input type="text" id="first" name="first" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                      <label>
                        Last Name<span class="req">*</span>
                      </label>
                      <input type="text" id="last" name="last" required autocomplete="off" />
                    </div>
                  </div>
                  <div class="field-wrap">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" id="email" name="email" required autocomplete="off" />
                  </div>


                  <div class="field-wrap">
                    <label>
                      Address<span class="req">*</span>
                    </label>
                    <input type="text" id="uaddress" name="uaddress" required autocomplete="off" />
                  </div>
                  <div class="field-wrap">
                    <label>
                      Phone Number<span class="req">*</span>
                    </label>
                    <input type="text" id="phoneNumber" name="phoneNumber" required autocomplete="off" />
                  </div>


                  <div class="field-wrap">
                    <label>
                      Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" id="pwd" name="pwd" required autocomplete="off" />
                  </div>
                  <button type="submit" class="button button-block">Get Started</button>
                </form>
              </div>
              <div id="login">
                <h1 class="snup">Welcome Back!</h1>
                <form action="login.php" method="post">
                  <div class="field-wrap">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" id="email" required autocomplete="off" />
                  </div>
                  <div class="field-wrap">
                    <label>
                      Password<span class="req">*</span>
                    </label>
                    <input type="password" name="pwd" id="pwd" required autocomplete="off" />
                  </div>
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  <button class="button button-block">Log In</button>
                </form>
                <p class="warning-text text-white mt-4"></p>
                <script>
                  $(document).ready(function () {
                    $('form').submit(function (e) {
                      e.preventDefault();
                      $.ajax({
                        type: 'POST',
                        url: 'login.php',
                        data: $(this).serialize(),
                        success: function (response) {
                          if (response == 'success') {
                            // Close the login modal
                            $('.modal').hide();

                          } else {
                            // Show warning text
                            $('#email').val('');
                            $('#pwd').val('');
                            $('.warning-text').text('Invalid email or password. Please try again.');
                          }
                        }
                      });
                    });
                  });
                </script>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="chat-popup" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('chat-popup').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>


      <form action="/quoteforpat.php" class="form-container" method="POST" enctype="multipart/form-data" id="quoteForm">
        <h1 class="m-8 text-center">Make a quote</h1>

        <div class="mx-4">
          <label for="message" class=" text-sm text-gray-700 relative"><b>Message</b></label>
          <textarea placeholder="Enter your message" class="h-auto  text-sm text-gray-700" name="message"
            required></textarea>

          <label for="attachment" class=" text-sm text-gray-700 relative"><b>Attach Files (Drag
              here)</b></label>
          <!-- Rest of the form -->
          <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
            <div id="drag_upload_file">
              <p>Drop file(s) here</p>
              <p>or</p>
              <p><input type="button" value="Select File(s)" class="text-gray-700" onclick="file_explorer();" /></p>
              <input type="file" id="selectfile" multiple accept=".jpg,.jpeg,.doc,.docx,.png" />
            </div>
          </div>
        </div>
        <div class="w-full sm:w-2/3 mx-auto">
          <div class="flex flex-row justify-between">
            <button type="button" class="btn w-2/5" onclick="uploadSelectedFiles()">Send</button>
            <button type="button" class="btn w-2/5 cancel" onclick="closechatForm()">Close</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="section-mittig1 zweitfarbe-2">
  <div class="inhalt-nebeneinander1">
    <div data-w-id="86fcc30f-d767-e7fc-a622-2381529ad7da" style="opacity:0" class="inhalt-untereinander1">
      <h2 data-w-id="86fcc30f-d767-e7fc-a622-2381529ad7db" style="opacity:0" class="heading-links1 heading-font1 sfy">
      </h2>
      <p class="text-links1 paragraph-font" id="a"></p>
      <h3 class="heading-links-klein1 heading-font2 heading-color-1" id="b"></h3>
      <p id="c"></p>
      <p class="text-links1 paragraph-font">
        <a href="tel:0681/41095956" class="link-9">0681/ 41095956<br></a><br>
      <div class="wl"></div>
      </p>
    </div>
    <div class="feature-image-mask"><img class="feature-image" src="images/attachment_1-1.webp"
        alt="Dentalgeräte von Denturo" style="opacity:0"
        sizes="(max-width: 479px) 92vw, (max-width: 767px) 90vw, (max-width: 991px) 88vw, 45vw"
        data-w-id="86fcc30f-d767-e7fc-a622-2381529ad7e6" loading="lazy"
        srcset="images/attachment_1-1-p-500.webp 500w, images/attachment_1-1-p-800.webp 800w, images/attachment_1-1-p-1080.webp 1080w, images/attachment_1-1.webp 1500w">
    </div>
  </div>
</div>
<div class="bild-cover1 mittig">
  <div class="inhalt-nebeneinander1">
    <div data-w-id="844d0dc9-a345-7570-8ffa-4951696c9d02" style="opacity:0" class="inhalt-untereinander1 mittig">
      <h2 data-w-id="844d0dc9-a345-7570-8ffa-4951696c9d03" style="opacity:0"
        class="heading-links1 heading-font1 heading-color" id="WBIE"></h2>
      <h2 class="heading-links-klein1 heading-font2 heading-color" id="Gvw"></h2>
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
  function file_explorer() {
    // Add your file exploration logic here
    // For example, you can trigger a click event on the file input element
    document.getElementById('selectfile').click();
  }
  function uploadSelectedFiles() {
    const form = document.getElementById('quoteForm');
    const fileInput = document.getElementById('selectfile');
    const files = fileInput.files;

    if (files.length > 0) {
      const formData = new FormData(form);
      formData.append('email', localStorage.getItem("email"));
      formData.append('message', document.querySelector('textarea[name="message"]').value);
      formData.append('position', localStorage.getItem("position"));
      formData.append('roles', "dentist");
      for (let i = 0; i < files.length; i++) {
        let file = files[i];
        if (file.type === "image/jpeg" || file.type === "image/jpg" || file.type === "application/msword" || file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
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
      fetch('/quoteforden.php', {
        method: 'POST',
        body: formData
      })
        .then(response => {
          // Handle the server response
          closechatForm();

        })
        .catch(error => {
          // Handle any errors
          console.error('Error uploading files:', error);
        });
    }
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
  function closechatForm() {
    document.getElementById("chat-popup").style.display = "none";
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
    console.log('Files uploaded successfully');
  }
  // Check if user field exists in local 
  /*
  if (localStorage.getItem('user')) {
    document.getElementById('aa').style.display = 'block';
    document.getElementById('bb').style.display = 'none';

  } else {
    document.getElementById('aa').style.display = 'none';
    document.getElementById('bb').style.display = 'block';
  }
*/
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