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

.send {
    background-color: #018f9b !important;

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
    z-index: 0 !important;
    transition: transform 0.2s ease;
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
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    font-family: Raleway, sans-serif !important;
    font-weight: bold !important;
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
            color: #050505;
        }
    }

    .active a {
        background: #018f9b;
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
    background: #018f9b;
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

.termin-button-new.heading-font3.highlights {
    margin-top: none !important;
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
    color: rgba(100, 100, 100, 0.5);
    transition: all 0.25s ease;
    -webkit-backface-visibility: hidden;
    pointer-events: none;
    font-size: 22px;

    .req {
        margin: 2px;
        color: rgba(100, 100, 100, 0.5);
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
    /* color: #ffffff; */
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
    max-width: 600px;
}

.cncl {
    color: #018f9b !important;

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<div class="section-mittig1">
    <div class="flex justify-end w-full">
        <div id="logined">
            <script>
            localStorage.setItem("user", "<?php echo $_SESSION['user']; ?>");
            localStorage.setItem("email", "<?php echo $_SESSION['email']; ?>");
            </script>
            <div id="loginButton" class="flex items-center p-8">
                <div class="termin-button-new heading-font3 highlights w-button aa" onclick="utadata()" id="uta">Request
                    a Quote
                </div>
                <div class="dropdown mr-12 ml-8 mt-[20px]">
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
            <script>
            setNoti()
            </script>
        </div>
        <div id="new">
            <div id="loginButton" class="p-8">
                <div class="termin-button-new heading-font3 highlights w-button aa mb-10 mt-0"
                    onclick="document.getElementById('offer-popup').style.display='block'">Login</div>
            </div>
        </div>
        <script>
        function setNoti() {
            alert("dddd")
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 5000);
        }
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
                localStorage.setItem("email", "");
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

        function setNoti() {
            alert("dddd")
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 5000);
        }
        </script>








    </div>
    <div class="inhalt-nebeneinander1">

        <div data-w-id="db7c6774-6cf6-4ef3-c7d3-24034ff2f767" style="opacity:0" class="inhalt-untereinander1">

            <h1 data-w-id="db7c6774-6cf6-4ef3-c7d3-24034ff2f768" style="opacity:0"
                class="heading-links1 heading-font1 ZvD">
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
            <h2 data-w-id="ee283730-4d41-a3ba-8e4f-46905f272067" style="opacity:0"
                class="heading-links1 heading-font1 ZvD">
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
                alt="Nahaufnahme von Zahnprothesen beim Zahnarzt, der in der Klinik am Tisch arbeitet."
                style="opacity:0"
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
                            <div class="flip-box-front"><img src="images/denture.webp" loading="lazy" alt="Symbol"
                                    class="image-101">
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
                            <div class="flip-box-front"><img src="images/fixing.webp" loading="lazy" alt="Symbol"
                                    class="image-101">
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
                            <div class="flip-box-front"><img src="images/dental-implant.webp" loading="lazy"
                                    alt="Symbol" class="image-101">
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
            <div class=" w3-display-topright">
                <span><a href="https://run.briskinvoicing.com/help/quotes_help.html" class="underline">Help</a></span>

                <span onclick="document.getElementById('offer-popup').style.display='none'"
                    class="w3-button">&times;</span>
            </div>
            <div id="bb">
                <div>
                    <div class="forma">
                        <ul class="tab-group">
                            <li class="tab active"><a href="#login">Log In</a></li>
                            <li class="tab "><a href="#signup">Sign Up</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="login">
                                <h1 class="snup">Welcome Back!</h1>
                                <form action="login.php" method="post">
                                    <div class="field-wrap">
                                        <input type="email" name="email" id="email" placeholder="Email Address" required
                                            autocomplete="off" />
                                    </div>
                                    <div class="field-wrap">
                                        <input type="password" name="pwd" id="pwd" placeholder="Password" required
                                            autocomplete="off" />
                                    </div>
                                    <p class="forgot"><a href="#">Forgot Password?</a></p>
                                    <button class="button button-block">Log In</button>
                                </form>
                                <p class="warning-text text-white mt-4"></p>
                                <script>
                                $(document).ready(function() {
                                    $('form').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'login.php',
                                            data: $(this).serialize(),
                                            success: function(response) {
                                                if (response == 'success') {
                                                    // Close the login modal
                                                    document.getElementById('offer-popup')
                                                        .style.display = 'none'
                                                    window.location.href =
                                                        "fur-zahnarzte.php";
                                                    // $('.offer-popup').hide();
                                                } else {
                                                    // Show warning text
                                                    $('#email').val('');
                                                    $('#pwd').val('');
                                                    $('.warning-text').text(
                                                        'Invalid email or password. Please try again.'
                                                    );
                                                }
                                            }
                                        });
                                    });
                                });
                                </script>

                            </div>
                            <div id="signup">
                                <h1 class="snup">Sign Up for Free</h1>
                                <form class="auth-form" action="signup.php" method="post">
                                    <div class="top-row">
                                        <div class="field-wrap">

                                            <input type="text" id="first" name="first" placeholder="First Name" required
                                                autocomplete="off" />
                                        </div>
                                        <div class="field-wrap">
                                            <input type="text" id="last" name="last" placeholder="Last Name" required
                                                autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="field-wrap">
                                        <input type="email" id="email" name="email" placeholder="Email Address" required
                                            autocomplete="off" />
                                    </div>


                                    <div class="field-wrap">
                                        <input type="text" id="uaddress" name="uaddress" placeholder="Address" required
                                            autocomplete="off" />
                                    </div>
                                    <div class="field-wrap">
                                        <input type="text" id="phoneNumber" name="phoneNumber"
                                            placeholder=" Phone Number" required autocomplete="off" />
                                    </div>


                                    <div class="field-wrap">
                                        <input type="password" id="pwd" name="pwd" placeholder="Set A Password" required
                                            autocomplete="off" />
                                    </div>
                                    <button type="submit" class="button button-block">Get Started</button>
                                </form>
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
            <div class=" w3-display-topright">
                <span><a href="https://run.briskinvoicing.com/help/quotes_help.html" class="underline">Help</a></span>

                <span onclick="document.getElementById('chat-popup').style.display='none'"
                    class="w3-button">&times;</span>
            </div>

            <form class="form-container" method="POST" enctype="multipart/form-data" id="quoteForm" class="w-full">
                <div class="w-full">
                    <a href="index.php" aria-current="page">
                        <img src="images/DenturoLogo.png" alt="Logo" loading="lazy" class=" mt-8 logo-img  w-20 h-20">
                    </a>
                </div>
                <h1 class="m-4 text-center" style="font-family: Raleway,sans-serif !important;
                font-weight: bold;!important">Request a quote</h1>
                <div class="w-full bg-blue-100 p-4 border-green-500 border-2 mb-8">
                    <h3>Get Started</h3>
                    <h4>This is the moment for requesting a quote. Your sent data will be private and we will send
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


<div class="section-mittig1 zweitfarbe-2">
    <div class="inhalt-nebeneinander1">
        <div data-w-id="86fcc30f-d767-e7fc-a622-2381529ad7da" style="opacity:0" class="inhalt-untereinander1">
            <h2 data-w-id="86fcc30f-d767-e7fc-a622-2381529ad7db" style="opacity:0"
                class="heading-links1 heading-font1 sfy">
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

function uploadSelectedFiles() {
    const form = document.getElementById('quoteForm');
    // const fileInput = document.getElementById('selectfile');
    // const files = fileInput.files;
    const files = droppedFiles;

    var messageTextarea = document.getElementById('messageTextarea');
    if (messageTextarea.value.trim() === '') {
        alert('Please enter your message');
        messageTextarea.focus(); // Set focus to the full name input field
        return false; // Prevent form submission
    }
    document.getElementById("sending").innerHTML = '<img src="images/icons/loading.gif" class="mx-auto w-8 h-8 z-20"/>';
    if (files.length > 0) {
        const formData = new FormData(form);
        formData.append('email', localStorage.getItem("email"));
        formData.append('message', document.querySelector('textarea[name="message"]').value);
        formData.append('position', localStorage.getItem("position"));
        formData.append('roles', "dentist");
        formData.append('detailid', document.getElementById('qid').innerHTML);
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
        fetch('/quoteforden.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Handle the server response
                document.getElementById("sending").innerHTML = "Send";
                document.getElementById('messageTextarea').value = "";
                closechatForm();
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
    document.getElementById("offer-popup").style.display = "block";
}

function openFileInput() {
    document.getElementById('fileInput').click();
}

function closeForm() {
    document.getElementById("chat-popup").style.display = "none";
    console.log('Files uploaded successfully');
}

function closechatForm() {
    document.getElementById("chat-popup").style.display = "none";
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 5000);
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